<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Validation\Validator;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PulsaController extends AuthController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index', 'getprovider']);
    }

    public function payment()
    {
        $this->disableAutoRender();
        $response = [];
        if ($this->request->is('post')) {
            try {
                $this->Api->addHeader('bid', $this->request->getCookie('bid'));
                $inquiry = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/pulsa/create-inquiry', [
                        'form_params' => $this->request->getData(),
                    ]);

                if ($response = $this->Api->success($inquiry)) {
                    $json = $response->parse();
                    $response = $json;
                }



            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $this->response = $this->response->withStatus($e->getCode(), $e->getMessage());
                $response = json_decode($e->getResponse()->getBody()->getContents());
            }
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function index()
    {

    }

    public function getprovider(){
        $this->disableAutoRender();
        $this->request->allowMethod('post');

        $error = ['error' => []];

        $validator = new Validator();
        $validator
            ->requirePresence('phone')
            ->notEmpty('phone', 'Nomor telpon tidak boleh kosong')
            ->numeric('phone','Nomor hanya boleh mengandung angka')
            ->maxLength('phone', '14','Nomor terlalu panjang, maksimal 14 karakter')
            ->minLength('phone','10','Nomor terlalu pendek, minimal 10 karakter')
            ->regex('phone', '/^08\d{8,11}/i', 'Nomor hanya boleh mengandung angka');

        $error['error'] = $validator->errors($this->request->getData());

        if (empty($error['error'])) {

            try {
                $login = $this->Api->makeRequest()
                    ->post('v1/pulsa/provider', [
                        'form_params' => [
                            'phone' => $this->request->getData('phone')
                        ]
                    ]);
                if ($response = $this->Api->success($login)) {
                    $json = $response->parse();
                    $response = ['is_error' => false, 'data' => $json['result']['data']];
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                $response = ['is_error' => true, 'message' => 'Provider tidak terdaftar'];
            }


        }else{
            foreach($error['error']['phone'] as $vals){
                $response = ['is_error' => true, 'message' => $vals];
                break;
            }
        }


        return $this->response->withType('application/json')
            ->withStringBody(json_encode($response));
    }
}
