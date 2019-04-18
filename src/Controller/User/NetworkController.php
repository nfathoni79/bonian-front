<?php
namespace App\Controller\User;

use App\Controller\AuthController;

class NetworkController extends AuthController{

    public function index(){

        if($this->request->is('Ajax')){
            $this->autoRender = false;

            try {
                $network = $this->Api->makeRequest($this->Auth->user('token'))
                    ->get('v1/web/networks');
                if ($response = $this->Api->success($network)) {
                    $json = $response->parse();
                    $network = $json['result'];
                    $pagging = $json['paging'];
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $this->Api->handle($e);
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                if (isset($error['error'])) {
                    $network->setErrors($error['error']);
                }
            }
            return $this->response->withType('application/json')
                ->withStringBody(json_encode($network));
        }
    }

}
