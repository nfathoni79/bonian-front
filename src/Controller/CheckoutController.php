<?php
namespace App\Controller;

use App\Controller\AuthController;
use Cake\Validation\Validator;

class CheckoutController  extends AuthController
{


    public function initialize()
    {
        parent::initialize();
    }


    public function validation()
    {
        $this->disableAutoRender();
        $errors = [];
        if ($this->request->is('ajax')) {
            try {
                $claim = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/checkout/cart', [
                        'form_params' => $this->request->getData()
                    ]);
                if ($response = $this->Api->success($claim)) {
                    $json = $response->parse();
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $this->Api->handle($e);
                $json = json_decode($e->getResponse()->getBody()->getContents(), true);
                $this->response = $this->response->withStatus(406);
                if (!empty($json['error'])) {
                    foreach($json['error'] as $key => $val) {
                        $json['message'] = array_values($val)[0];
                        break;
                    }
                }
            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode($json));

        }
    }

    public function index()
    {
        /*validation*/
        /* LAYOUT SECURE NO CART */
        $errors = [];
        try {
            $claim = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/checkout', [
                    'form_params' => []
                ]);
            if ($response = $this->Api->success($claim)) {
                $json = $response->parse();
                $data = $json['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $json = json_decode($e->getResponse()->getBody()->getContents(), true);
            $this->response = $this->response->withStatus(406);
            if (!empty($json['error'])) {
                foreach($json['error'] as $key => $val) {
                    $json['message'] = array_values($val)[0];
                    break;
                }
            }
        }

        /* LIST ALAMAT */
        try {
            $address = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/addresses');
            if ($response = $this->Api->success($address)) {
                $json = $response->parse();
                $address = $json['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            if (isset($error['error'])) {
                $address->setErrors($error['error']);
            }
        }

        $this->set(compact('data','address'));

    }

    function changeAddress(){

        $this->disableAutoRender();

        $errors = [];
        if ($this->request->is('ajax')) {
            try {
                $changeAddress = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/checkout/change-address', [
                        'form_params' => $this->request->getData()
                    ]);
                if ($response = $this->Api->success($changeAddress)) {
                    $json = $response->parse();
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {

            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode($json));

        }




    }

    function confirmation(){


    }
}