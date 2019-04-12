<?php
namespace App\Controller\User;

use App\Controller\AuthController;

class PointController extends AuthController
{
    public function index(){
        if($this->request->is('Ajax')){
            $this->autoRender = false;

            try {
                $point = $this->Api->makeRequest($this->Auth->user('token'))
                    ->get('v1/web/profile/points?page=1');
                if ($response = $this->Api->success($point)) {
                    $json = $response->parse();
                    $point = $json['result']['data'];
                    $pagging = $json['paging'];
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $this->Api->handle($e);
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                if (isset($error['error'])) {
                    $point->setErrors($error['error']);
                }
            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode($point));
        }
//        debug($pagging);
//        debug($point);
//        exit;
//        $this->set(compact('point','pagging'));
    }
}