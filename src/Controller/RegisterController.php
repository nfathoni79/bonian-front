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
       try {
           $login = $this->Api->makeRequest()
               ->post('v1/registers', [
                   'form_params' => $this->request->getData()
               ]);
           if ($response = $this->Api->success($login)) {
               $error = $response->parse();
           }
       } catch(\GuzzleHttp\Exception\ClientException $e) {
           $error = json_decode($e->getResponse()->getBody()->getContents(), true);
       }


       return $this->response->withType('application/json')
           ->withStringBody(json_encode($error));
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
                       '_invalid' => 'Tunggu 15 menit sampai habis.'
                   ]
               ];
           }
       }



       return $this->response->withType('application/json')
           ->withStringBody(json_encode($error));
   }

}
