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

        try {
            $province = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/addresses/get-province');
            if ($response = $this->Api->success($province)) {
                $json = $response->parse();
                $province = $json['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            if (isset($error['error'])) {
                $province->setErrors($error['error']);
            }
        }
        $this->set(compact('address','province'));



    }

    public function getCity(){
        $this->autoRender = false;
        if($this->request->getData('id')){
            try {
                $city = $this->Api->makeRequest($this->Auth->user('token'))
                    ->get('v1/web/addresses/get-city/'.$this->request->getData('id'));
                if ($response = $this->Api->success($city)) {
                    $json = $response->parse();
                    $city = $json['result']['data'];
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $this->Api->handle($e);
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                if (isset($error['error'])) {
                    $city->setErrors($error['error']);
                }
            }
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($city));

    }

    public function getDistrict(){
        $this->autoRender = false;
        if($this->request->getData('id')){
            try {
                $district = $this->Api->makeRequest($this->Auth->user('token'))
                    ->get('v1/web/addresses/get-district/'.$this->request->getData('id'));
                if ($response = $this->Api->success($district)) {
                    $json = $response->parse();
                    $district = $json['result']['data'];
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $this->Api->handle($e);
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                if (isset($error['error'])) {
                    $district->setErrors($error['error']);
                }
            }
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($district));

    }

    public function deleteAddress($address_id)
    {
        $this->disableAutoRender();
        $this->request->allowMethod('get');

        try {
            $delete = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/addresses/delete', [
                    'form_params' => [
                        'address_id' => $address_id
                    ]
                ]);
            if ($response = $this->Api->success($delete)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        return $this->redirect(['action' => 'address']);
    }

    public function setPrimaryAddress($address_id)
    {
        $this->disableAutoRender();
        $this->request->allowMethod('get');

        try {
            $delete = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/addresses/set-primary/' . $address_id, [
                    'form_params' => []
                ]);
            if ($response = $this->Api->success($delete)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        return $this->redirect(['action' => 'address']);
    }

    public function addAddress(){

        $this->disableAutoRender();
        $this->request->allowMethod('post');

        $error = ['error' => []];
        try {
            $addAddress = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/addresses/add', [
                    'form_params' => $this->request->getData()
                ]);
            if ($response = $this->Api->success($addAddress)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }


        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }

    public function setAlamat($id = null){

    }

}