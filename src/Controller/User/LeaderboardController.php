<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use App\Form\RefferalForm;

class LeaderboardController extends AuthController{

    protected function getProfile()
    {
        try {
            $customer = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/profile');
            if ($response = $this->Api->success($customer)) {
                $response = $response->parse();
                return $response['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }

    public function index(){

        $reff_cus_id = $this->getProfile()['refferal_customer_id'];
        $this->set(compact('reff_cus_id'));

        if($this->request->is('Ajax')){
            $this->autoRender = false;

            try {
                $leaderboard = $this->Api->makeRequest($this->Auth->user('token'))
                    ->get('v1/web/leaderboards');
                if ($response = $this->Api->success($leaderboard)) {
                    $json = $response->parse();
                    $leaderboard = $json['result'];
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $this->Api->handle($e);
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                if (isset($error['error'])) {
                    $leaderboard->setErrors($error['error']);
                }
            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode($leaderboard));
        }

    }

    public function follow(){

        $this->disableAutoRender();
        if ($this->request->is('post')) {
            $error = ['error' => []];
            try {
                $leaderboards = $this->Api->makeRequest($this->Auth->user('token'))
                        ->post('v1/web/leaderboards/follow', [
                            'form_params' => $this->request->getData()
                        ]);
                    if ($response = $this->Api->success($leaderboards)) {
                        $error = $response->parse();
                    }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode($error));
        }

    }

}