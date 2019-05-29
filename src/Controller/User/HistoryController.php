<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use Cake\Core\Configure;
use Pagination\Pagination;

class HistoryController extends AuthController
{

    protected $transaction_statuses = [
        'pending' => 'Pending',
        'settlement' => 'Success',
        'capture' => 'Success',
        'expire' => 'Expire'
    ];

    public function index(){


        $params = $this->request->getQueryParams();
        $params['page'] = $this->request->getQuery('page', 1);
        $params['status'] = $this->request->getQuery('status', 'semua');

        if($this->request->is('Post')){
            $search = explode(' - ',$this->request->getData('datefilter'));
            $params['start'] = $search[0];
            $params['end'] = $search[1];
            $params['search'] = $this->request->getData('invoice', '');
            $params['page'] = 1;

            return $this->redirect(['action' => 'index', 'prefix' => 'user', '?' => $params]);
        }

        $params['limit'] = 5;

        $response = [];
        try {
            $orders = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/orders', [
                    'query' => $params
                ]);
            if ($response = $this->Api->success($orders)) {
                $response = $response->parse();
                $orders = $response['result']['data'];
                $paging = $response['paging'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        if ($paging && $paging['count'] > 0) {
            $pagination = new Pagination($paging['count'], $paging['perPage'], $paging['page']);
        }

        $payment_status = [
            '1' => 'Pending',
            '2' => 'Success',
            '3' => 'Failed',
            '4' => 'Expired',
            '5' => 'Refund',
            '6' => 'Cancel'
        ];

        $digital_status = [
            '0' => 'Pending',
            '1' => 'Success',
            '2' => 'Failed',
        ];

        $shipping_status = [
            '1' => 'Menunggu Pembayaran',
            '2' => 'Diproses',
            '3' => 'Dikirim',
            '4' => 'Selesai',
            '5' => 'Dibatalkan',
        ];

        $transaction_statuses = $this->transaction_statuses;


        $this->set(compact(
            'orders',
            'transaction_statuses',
            'pagination',
            'payment_status',
            'shipping_status',
            'digital_status'
        ));
    }

    public function detail($invoice = null){
        Configure::write('debug',0);
        $response = [];
        try {
            $orders = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/orders/view/'.$invoice);
            if ($response = $this->Api->success($orders)) {
                $response = $response->parse();
                $orders = $response['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }


        $digital_status = [
            '0' => 'Pending',
            '1' => 'Success',
            '2' => 'Failed',
        ];

        $shipping_status = [
            '1' => 'Menunggu Pembayaran',
            '2' => 'Diproses',
            '3' => 'Dikirim',
            '4' => 'Selesai',
        ];

        $transaction_statuses = $this->transaction_statuses;
        
        $this->set(compact('orders', 'transaction_statuses','shipping_status','digital_status'));
    }


    public function getShipping(){

        $this->disableAutoRender();
        $errors = [];
        if($this->request->is('Ajax')){
            try {
                $shipping = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/orders/get-shipping/', [
                        'form_params' => $this->request->getData()
                    ]);
                if ($response = $this->Api->success($shipping)) {
                    $json = $response->parse();
                    if(isset($json['error'])){
                        $errors = ['is_error' => true, 'status' => 'OK', 'message' => 'Maaf, AWB tidak terdaftar'];
                    }else{
                        $errors = ['is_error' => false, 'status' => 'OK', 'data' => $json['result']['data']['rajaongkir']];
                    }
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $errors = ['is_error' => true, 'status' => 'OK',  'message' => 'Maaf, AWB tidak terdaftar'];

            }
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($errors));
    }


}