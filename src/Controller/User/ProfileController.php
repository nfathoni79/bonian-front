<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use App\Form\CustomerForm;

class ProfileController extends AuthController
{

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

    public function index()
    {
        $profile = $this->getProfile();
        $this->set(compact('profile'));
    }

    public function edit()
    {
        $customer = new CustomerForm();
        if ($this->request->is('post')) {
            if ($customer->execute($this->request->getData())) {
                try {
                    $edit = $this->Api->makeRequest($this->Auth->user('token'))
                        ->post('v1/web/profile/edit', [
                            'form_params' => $this->request->getData()
                        ]);
                    if ($response = $this->Api->success($edit)) {
                        $json = $response->parse();


                    }
                } catch(\GuzzleHttp\Exception\ClientException $e) {
                    $this->Api->handle($e);
                    $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                    if (isset($error['error'])) {
                        $customer->setErrors($error['error']);
                    }
                }
            }
        }
        $profile = $this->getProfile();
        $customer->setData($profile);
        $this->set(compact('customer'));
    }

    public function address()
    {

    }
}