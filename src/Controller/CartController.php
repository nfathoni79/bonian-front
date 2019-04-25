<?php
namespace App\Controller;

use App\Controller\AuthController;

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


    public function index(){

        try {
            $carts = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/cart/view');
            if ($response = $this->Api->success($carts)) {
                $json = $response->parse();
                $carts = ['carts' => $json['result']['data'], 'pagging' => $json['paging']];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            //TODO set log
        }
//        debug($carts);exit;
        $this->set(compact('carts'));
    }
}