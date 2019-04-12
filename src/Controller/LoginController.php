<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Cookie\CookieInterface;
use Cake\Utility\Security;
use Cake\Http\Cookie\Cookie;

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
       $error = ['error' => []];

       try {
           $this->Api->addHeader('bid', $this->request->getCookie('bid'));
           $login = $this->Api->makeRequest()
               ->post('v1/web/login', [
                   'form_params' => [
                       'email' => $email,
                       'password' => $password,
                   ]
               ]);
           if ($response = $this->Api->success($login)) {
               $json = $response->parse();
               /* set user to Auth */
               $this->Auth->setUser($json['result']['data']);

               try {
                   $this->Api->makeRequest($json['result']['data']['token'])
                       ->post('v1/web/customers/save-browser', [
                           'form_params' => [
                               'ip' => env('REMOTE_ADDR'),
                               'browser' => env('HTTP_USER_AGENT'),
                           ]
                       ]);
               } catch(\GuzzleHttp\Exception\ClientException $e) {

               }

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
