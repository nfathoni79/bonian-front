<?php

namespace App\Controller;

use Cake\Core\Configure;

/**
 * Login Controller controller
 *
 */
class LoginController extends AuthController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('index');
    }

    public function index()
   {
       $this->disableAutoRender();
       $this->request->allowMethod('post');

       $email = $this->request->getData('email');
       $password = $this->request->getData('password');
       //$error = ['error' => []];
       try {
           $login = $this->Api->makeRequest()
               ->post('v1/web/login', [
                   'form_params' => [
                       'email' => $email,
                       'password' => $password
                   ]
               ]);
           if ($response = $this->Api->success($login)) {
               $json = $response->parse();
               /* set user to Auth */
               $this->Auth->setUser($json['result']['data']);

           }
       } catch(\GuzzleHttp\Exception\ClientException $e) {
           $error = json_decode($e->getResponse()->getBody()->getContents(), true);
       }


       return $this->response->withType('application/json')
           ->withStringBody(json_encode($error));
   }


   public function test()
   {
       $this->disableAutoRender();
       debug($this->Auth->user());
   }
}
