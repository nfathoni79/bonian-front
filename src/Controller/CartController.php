<?php
namespace App\Controller;

use App\Controller\AuthController;
use Pagination\Pagination;

class CartController  extends AuthController
{


    public function initialize()
    {
        parent::initialize();
    }

    public function add()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        try {
            $update = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/cart/add', [
                    'form_params' => $this->request->getData()
                ]);
            if ($response = $this->Api->success($update)) {
                $error = $response->parse(); 
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }

    public function delete()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        try {
            $delete = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/cart/delete', [
                    'form_params' => $this->request->getData()
                ]);
            if ($response = $this->Api->success($delete)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }

    public function deleteAll(){
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        $cartList = $this->request->getData('cartid');
        $success = true;
        foreach($cartList as $vals){
            try {
                $delete = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/cart/delete', [
                        'form_params' => [
                            'cartid' => $vals
                        ]
                    ]);
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $success = false;
            }
        }
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($success));
    }

    public function index(){

        try {
            $carts = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/cart/view');
            if ($response = $this->Api->success($carts)) {
                $json = $response->parse();
                if(!empty($json['result']['data'])){
                    $carts = ['carts' => $json['result']['data'], 'pagging' => $json['paging']];
                }else{
                    $carts = [];
                }
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            //TODO set log
        }

        try {
            $coupon = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/cart/coupon');
            if ($response = $this->Api->success($coupon)) {
                $json = $response->parse();
                if(!empty($json['result']['data'])){
                    $coupon = $json['result']['data'];
                }else{
                    $coupon = [];
                }
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            //TODO set log
        }

        $this->set(compact('carts', 'coupon'));

        $response = [];
        try {
            $wishlists = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/wishlists', [
                    'query' => [
                        'limit' => 3,
                        'page' => $this->request->getQuery('page', 1)
                    ]
                ]);
            if ($response = $this->Api->success($wishlists)) {
                $response = $response->parse();
                $wishlists = $response['result']['data'];
                $paging = $response['paging'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        if ($paging && $paging['count'] > 0) {
            $pagination = new Pagination($paging['count'], $paging['perPage'], $paging['page']);
        }


        try {
            $voucher = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/vouchers', [
                    'query' => [
                        'limit' => 100,
                        'page' => $this->request->getQuery('page', 1),
                        'type' => $this->request->getQuery('type', 1),
                    ]
                ]);
            if ($response = $this->Api->success($voucher)) {
                $response = $response->parse();
                $voucher = $response['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        try {
            $customer = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/profile');
            if ($response = $this->Api->success($customer)) {
                $response = $response->parse();
                $point = $response['result']['data']['point_balance'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
        }


        $this->set(compact('wishlists', 'pagination', 'voucher','point'));
    }
}