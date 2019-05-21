<?php
namespace App\Controller;

use App\Controller\AuthController;
use Cake\Validation\Validator;

class PaymentController  extends AuthController
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
        //$this->layout = 'secure';
        $this->viewBuilder()->setLayout('secure');

        $query = $this->request->getQueryParams();


        $errors = [];
        try {
            $claim = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/payment', [
                    'query' => $query
                ]);
            if ($response = $this->Api->success($claim)) {
                $json = $response->parse();
                $data = $json['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            return $this->redirect(['controller' => 'Home', 'prefix' => false]);
        }


        //list credit card
        try {
            $creditcard = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/cards');
            if ($response = $this->Api->success($creditcard)) {
                $json = $response->parse();
                $creditcards = $json['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
        }

        //debug($data);exit;

        $this->set(compact('data','address', 'creditcards'));

    }

    public function createToken()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        $error = ['error' => []];
        try {
            $card = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/payment/create-token', [
                    'form_params' => $this->request->getData()
                ]); //print_r($card->getBody()->getContents());exit;
            if ($response = $this->Api->success($card)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);

        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }

    public function finish($invoice)
    {
        $this->viewBuilder()->setLayout('secure');
    }

    public function process()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        $error = ['error' => []];
        try {
            $card = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/payment/process', [
                    'form_params' => $this->request->getData()
                ]);
            if ($response = $this->Api->success($card)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $this->response = $this->response->withStatus(406);
            if (!empty($error['error'])) {
                foreach($error['error'] as $key => $val) {
                    $error['message'] = array_values($val)[0];
                    break;
                }
            }
            $this->response = $this->response->withStatus($e->getResponse()->getStatusCode());
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }

    public function gopayStatus()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        $content = [];
        if ($transaction_id = $this->request->getData('transaction_id')) {
            try {
                $status = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/payment/gopay-status', [
                        'form_params' => $this->request->getData()
                    ]);
                if ($response = $this->Api->success($status)) {
                    $parse = $response->parse();
                    if (isset($parse['result']['data']) && isset($parse['result']['data']['status_code'])) {
                        $content['status_code'] = $parse['result']['data']['status_code'];
                        $content['order_id'] = $parse['result']['data']['order_id'];
                    }
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $this->Api->handle($e);
                $this->response = $this->response->withStatus($e->getResponse()->getStatusCode());
            }
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($content));

    }

    public function addCard()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        $error = ['error' => []];
        try {
            $card = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/cards/add', [
                    'form_params' => $this->request->getData()
                ]); //print_r($card->getBody()->getContents());exit;
            if ($response = $this->Api->success($card)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);

        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }


    function confirmation($invoice)
    {
        $this->viewBuilder()->setLayout('secure');

        try {
            $card = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/orders/get-pending-invoice/' . $invoice);
            if ($response = $this->Api->success($card)) {
                $error = $response->parse();
                $data = $error['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            return $this->redirect(['controller' => 'History', 'prefix' => 'user']);

        }

        //debug($data);exit;
        $this->set(compact('data'));

    }
}