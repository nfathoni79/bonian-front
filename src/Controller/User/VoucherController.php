<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use Pagination\Pagination;
use Cake\I18n\Number;
use Cake\I18n\Time;


class VoucherController  extends AuthController
{

    public function index()
    {
        try {
            $voucher = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/vouchers', [
                    'query' => [
                        'limit' => 10,
                        'page' => $this->request->getQuery('page', 1),
                        'type' => $this->request->getQuery('type', 1),
                    ]
                ]);
            if ($response = $this->Api->success($voucher)) {
                $response = $response->parse();
                $voucher = $response['result']['data'];
                $paging = $response['paging'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }
        if ($paging && $paging['count'] > 0) {
            $pagination = new Pagination($paging['count'], $paging['perPage'], $paging['page']);
        }
        $this->set(compact('voucher', 'pagination'));
    }

    public function iclaim(){
        $this->disableAutoRender();
        $errors = [];
        if($this->request->is('Ajax')){

            try {
                $claim = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/claim/iclaim', [
                        'form_params' => $this->request->getData()
                    ]);
                if ($response = $this->Api->success($claim)) {
                    $json = $response->parse();

                    if(isset($json['error'])){
                        $errors = ['is_error' => true, 'status' => 'OK', 'message' => 'Maaf, kode ini tidak sah. Mohon coba kembali.'];
                    }else{
                        $errors = ['is_error' => false, 'status' => 'OK'];
                    }
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $this->Api->handle($e);
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);

                $errors = ['is_error' => true, 'status' => 'OK', 'message' => 'Maaf, kode ini tidak sah. Mohon coba kembali.'];

            }
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($errors));
    }


}