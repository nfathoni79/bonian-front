<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use Pagination\Pagination;

class HistoryController extends AuthController
{

    public function index(){
        $response = [];
        try {
            $orders = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/orders', [
                    'query' => [
                        'limit' => 6,
                        'page' => $this->request->getQuery('page', 1)
                    ]
                ]);
            if ($response = $this->Api->success($orders)) {
                $response = $response->parse();
//                debug($response);
//                exit;
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
        $transaction_statuses = [
            'pending' => 'Pending',
            'settlement' => 'Success',
            'capture' => 'Success'
        ];

        $this->set(compact('orders', 'transaction_statuses', 'pagination','payment_status'));
    }

    public function detail($invoice = null){

        $response = [];
        try {
            $orders = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/orders/view/'.$invoice);
            if ($response = $this->Api->success($orders)) {
                $response = $response->parse();
//                debug($response);
//                exit;
                $orders = $response['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }


        $shipping_status = [
            '1' => 'Menunggu Pembayaran',
            '2' => 'Diproses',
            '3' => 'Dikirim',
            '4' => 'Selesai',
        ];

        $transaction_statuses = [
            'pending' => 'Pending',
            'settlement' => 'Success',
            'capture' => 'Success'
        ];
        $this->set(compact('orders', 'transaction_statuses','shipping_status'));
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
    //                print_r($shipping->getBody()->getContents());
    //                exit;
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