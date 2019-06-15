<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Validation\Validator;

/**
 * Register Controller controller
 *
 */
class RegisterController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function index()
   {
       $this->disableAutoRender();
       $this->request->allowMethod('post');

       $error = ['error' => []];

       $secret = Configure::read('GoogleCaptcha.secretKey');
       $gResponse = $this->request->getData('g-recaptcha-response');
       $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$gResponse);
       $res = json_decode($verify);

       if($res->success){
           try {
               $getData = $this->request->getData();

               $getData['activation_url'] = \Cake\Routing\Router::url([
                   'controller' => 'Register',
                   'action' => 'activation',
                   'prefix' => false
               ], true);

               $login = $this->Api->makeRequest()
                   ->post('v1/registers', [
                       'form_params' => $getData
                   ]);
               if ($response = $this->Api->success($login)) {
                   $error = $response->parse();
               }
           } catch(\GuzzleHttp\Exception\ClientException $e) {
               $error = json_decode($e->getResponse()->getBody()->getContents(), true);
           }
       }else{
           $response = [
               "status" => "ERROR",
               "code" => 406,
               "message" => "Failed to registers",
               "error" => [
                   "g-recaptcha-response" => [
                       "_empty" => "Invalid captcha"
                   ]
               ]
           ];
           $error = $response;
       }


       return $this->response->withType('application/json')
           ->withStringBody(json_encode($error));
   }

    /**
     * @param null $code
     * @return \Cake\Http\Response|null
     */
   public function activation($code = null)
   {

       try {
           $verify = $this->Api->makeRequest()
               ->get('v1/registers/verification', [
                   'query' => [
                       'code' => $code
                   ]
               ]);
           if ($response = $this->Api->success($verify)) {
               $json = $response->parse();
               $this->Flash->success(__('Proses verifikasi email berhasil.'));
           }
       } catch(\GuzzleHttp\Exception\ClientException $e) {
           $this->Flash->error(__('Proses verifikasi email gagal.'));
       }
       return $this->redirect([
           'controller' => 'Login',
           'action' => 'auth'
       ]);
   }

   public function otp()
   {
       $this->disableAutoRender();
       $this->request->allowMethod('post');

       $error = ['error' => []];

       $validator = new Validator();

       $validator->requirePresence('phone')
           ->notBlank('phone', 'Nomor telepon harus diisi')
           ->regex('phone', '/^\+\d{11,13}$/i', 'Nomor telepon tidak valid');

       $error['error'] = $validator->errors($this->request->getData());

       if (empty($error['error'])) {
           try {
               $login = $this->Api->makeRequest()
                   ->post('v1/registers/sendcode', [
                       'form_params' => [
                           'phone' => $this->request->getData('phone')
                       ]
                   ]);
               if ($response = $this->Api->success($login)) {
                   $json = $response->parse();
               }
           } catch(\GuzzleHttp\Exception\ClientException $e) {
               $error = json_decode($e->getResponse()->getBody()->getContents(), true);
               $error['error'] = [
                   'phone' => [
                       '_invalid' => $error['message']
                   ]
               ];
           }
       }



       return $this->response->withType('application/json')
           ->withStringBody(json_encode($error));
   }

}
