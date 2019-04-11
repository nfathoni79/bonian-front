<?php
namespace App\Controller\User;

use App\Controller\AuthController;

class ProfileController extends AuthController
{

    public function index()
    {

        try {
            $customer = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/profile');
            if ($response = $this->Api->success($customer)) {
                $response = $response->parse();
                $profile = $response['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }



        $this->set(compact('profile'));
    }

    public function address()
    {

    }
}