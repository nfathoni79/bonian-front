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

    public function index(){

        try {
            $cart = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/cart/view');
            if ($response = $this->Api->success($cart)) {
                $json = $response->parse();
//                debug($json);
//                exit;
//                $details = ['is_error' => false, 'data' => $json['result']['data'], 'variant' => ['warna', 'ukuran']];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
//            $details = ['is_error' => true, 'message' => 'Produk tidak ditemukan'];
        }

//        if($this->request->is('Ajax')){
//            $this->disableAutoRender();
//            return $this->response->withType('application/json')
//                ->withStringBody(json_encode($details));
//        }else{
//            $this->set(compact('details'));
//        }
    }
}