<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use Pagination\Pagination;
use Cake\I18n\Number;


class VoucherController  extends AuthController
{

    public function index()
    {
        try {
            $voucher = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/vouchers', [
                    'query' => [
                        'limit' => 2,
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


}