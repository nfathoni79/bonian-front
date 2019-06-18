<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use App\Form\CustomerForm;
use Pagination\Pagination;

class VerificationsController extends AuthController
{

    public function index() {
        $this->disableAutoRender();
    }

    public function phone()
    {
        //$this->viewBuilder()->setLayout('secure');
        $customer = new CustomerForm();

        if ($this->request->is('post')) {
            if ($customer->execute($this->request->getData())) {
                try {
                    $post = $this->Api->makeRequest($this->Auth->user('token'))
                        ->post('v1/web/verification/set-phone', [
                            'form_params' => $this->request->getData()
                        ]);
                    if ($response = $this->Api->success($post)) {
                        $json = $response->parse();

                        $this->request->getSession()->write('Auth.Customers.phone', $json['result']['data']['phone']);

                        return $this->redirect(['action' => 'phoneOtp']);

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


        $this->set(compact('customer'));
    }

    public function phoneOtp()
    {
        $customer = new CustomerForm();

        if ($this->request->is('post')) {
            if ($customer->execute($this->request->getData())) {
                try {
                    $post = $this->Api->makeRequest($this->Auth->user('token'))
                        ->post('v1/web/verification/phone-otp', [
                            'form_params' => $this->request->getData()
                        ]);
                    if ($response = $this->Api->success($post)) {
                        $json = $response->parse();
                        $this->request->getSession()->write('Auth.Customers.is_verified', 1);
                        return $this->redirect('/');

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

        $this->set(compact('customer'));
    }

    public function username()
    {
        $customer = new CustomerForm();

        if ($this->request->is('post')) {
            if ($customer->execute($this->request->getData())) {
                try {
                    $post = $this->Api->makeRequest($this->Auth->user('token'))
                        ->post('v1/web/verification/set-username', [
                            'form_params' => $this->request->getData()
                        ]);
                    if ($response = $this->Api->success($post)) {
                        $json = $response->parse();
                        $this->request->getSession()->write('Auth.Customers.username', $json['result']['data']['username']);
                        return $this->redirect('/');

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

        $this->set(compact('customer'));
    }


}