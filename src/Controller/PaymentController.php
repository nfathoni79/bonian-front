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
        //$error = '{"status":"OK","code":200,"result":{"data":{"payment_method":"gopay","payment_amount":158000,"payment_status":"pending","payment":{"status_code":"201","status_message":"GO-PAY transaction is created","transaction_id":"cdad60b5-efd2-42e5-88fc-40ceb0368568","order_id":"1905030901661C","gross_amount":"158000.00","currency":"IDR","payment_type":"gopay","transaction_time":"2019-05-03 16:27:03","transaction_status":"pending","fraud_status":"accept","actions":[{"name":"generate-qr-code","method":"GET","url":"https:\/\/api.sandbox.veritrans.co.id\/v2\/gopay\/cdad60b5-efd2-42e5-88fc-40ceb0368568\/qr-code"},{"name":"deeplink-redirect","method":"GET","url":"https:\/\/simulator.sandbox.midtrans.com\/gopay\/ui\/checkout?referenceid=Q6ttJG1N5K"},{"name":"get-status","method":"GET","url":"https:\/\/api.sandbox.veritrans.co.id\/v2\/cdad60b5-efd2-42e5-88fc-40ceb0368568\/status"},{"name":"cancel","method":"POST","url":"https:\/\/api.sandbox.veritrans.co.id\/v2\/cdad60b5-efd2-42e5-88fc-40ceb0368568\/cancel"}]}}}}';
        //return $this->response->withType('application/json')
        //    ->withStringBody($error);
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