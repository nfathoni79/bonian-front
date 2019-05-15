<?php
namespace App\Controller\User;

use App\Controller\AuthController;

class NotificationController extends AuthController{

    public function index()
    {
        
    }

    public function getData()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        $data = [];
        try {
            $notification = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/notifications/head');
            if ($response = $this->Api->success($notification)) {
                $json = $response->parse();
                $data = $json;

            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->response = $this->response->withStatus($e->getResponse()->getStatusCode());
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
    }


    public function update()
    {

    }

}
