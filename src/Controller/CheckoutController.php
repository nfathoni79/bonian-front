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

    public function index()
    {
        /*validation*/
        /* LAYOUT SECURE NO CART */

        $errors = [];
        if ($this->request->is('ajax')) {
            try {
                $claim = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/checkout', [
                        'form_params' => $this->request->getData()
                    ]);
                if ($response = $this->Api->success($claim)) {
                    $json = $response->parse();

                    //debug($json);
                    //exit;
                    if(isset($json['error'])){
                        $errors = ['is_error' => true, 'status' => 'OK', 'message' => 'Maaf, kode ini tidak sah. Mohon coba kembali.'];
                    }else{
                        $errors = ['is_error' => false, 'status' => 'OK'];
                    }
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
                //debug($error);
                //exit;
                //$errors = ['is_error' => true, 'status' => 'OK', 'message' => 'Maaf, kode ini tidak sah. Mohon coba kembali.'];


            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode($json));

        }
        
    }

    function confirmation(){


    }
}