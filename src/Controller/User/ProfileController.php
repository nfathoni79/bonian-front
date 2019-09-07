<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use App\Form\CustomerForm;
use Cake\Validation\Validator;

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

    public function uploadImage(){

        $this->disableAutoRender();
        $this->request->allowMethod('post');
        $error = ['error' => []];


        $validator = new Validator();
        $validator
            ->requirePresence('avatar')
            ->add('avatar', 'file', [
                'rule' => ['uploadedFile', ['types' => ['image/png', 'image/jpeg']]], // It's what I expect to check
                'message' => __("Format yang di ijinkan : .jpg, .png")
            ])
            ->add('avatar', 'file', [
                'rule' => ['uploadedFile', ['maxSize' => ['1024']]], // It's what I expect to check
                'message' => __("Ukuran file terlalu besar")
            ]);


        $error['error'] = $validator->errors($this->request->getData());
        if (empty($error['error'])) {

            try {

                $avatar = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/profile/upload-image', [
                        'form_params' => $this->request->getData()
                    ]);
                if ($response = $this->Api->success($avatar)) {
                    $json = $response->parse();

                    if(!empty($json['error'])){
                        foreach($json['error'] as $val){
                            $error['error']['data'] = $val['validExtension'];
                            break;
                        }
                    }else{
                        $fileAvatar = $json['result']['data'];
                        $session = $this->request->getSession()->write('Auth.Customers.avatar', $fileAvatar);
                    }

                }

            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            }
        }else{
            $error['error']['data'] = $error['error']['avatar']['file'];
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
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
                        $this->Flash->success('Update profile berhasil');
                        return $this->redirect([
                            'action' => 'index'
                        ]);

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
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        return $this->redirect(['action' => 'address']);
    }


    public function secure()
    {
        $response = [];
        try {
            $history = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/customers/login-history');
            if ($response = $this->Api->success($history)) {
                $response = $response->parse();
                $histories = $response['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        $this->set(compact('histories'));
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
            $this->Api->handle($e);
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
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }


        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }
    public function editAddress($id = null){

        $this->disableAutoRender();
        $this->request->allowMethod('post');

        $error = ['error' => []];
        try {
            $updateAddress = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/addresses/update/'.$id, [
                    'form_params' => $this->request->getData()
                ]);
            if ($response = $this->Api->success($updateAddress)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }


        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }

    public function getAddress($id = null){

        $this->autoRender = false;
        if($id){
            try {
                $getAddress = $this->Api->makeRequest($this->Auth->user('token'))
                    ->get('v1/web/addresses/view/'.$id);
                if ($response = $this->Api->success($getAddress)) {
                    $json = $response->parse();
                    $getAddress = $json['result']['data'];
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $this->Api->handle($e);
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);

            }
        }
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($getAddress));
    }

    public function changePassword()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');

        $data = $this->request->getData();
        $data['dont_request_token'] = 1;

        $error = ['error' => []];
        try {
            $updateAddress = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/profile/change-password', [
                    'form_params' => $data
                ]);
            if ($response = $this->Api->success($updateAddress)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }


        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }

    public function changePass(){
        $customer = new CustomerForm();
        $this->set(compact('customer'));
    }

    protected function _unmask($number)
    {
        if (preg_match('/(\d{6})-(\d+)/', $number, $matched)) {
            //debug(substr($matched[1], 0, 4));
            return substr($matched[1], 0, 4) .
                ' ' .
                substr($matched[1], 4, 2) . str_repeat('*', 2) .
                ' ' .
                str_repeat('*', 4) .
                ' ' .
                $matched[2];
        }
        return $number;
    }



    public function setPrimaryCc()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        try {
            $update = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/cards/set-primary', [
                    'form_params' => [
                        'card_id' => $this->request->getData('card_id')
                    ]
                ]);
            if ($response = $this->Api->success($update)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));

    }

    public function deleteCc()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        try {
            $update = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/cards/delete', [
                    'form_params' => [
                        'card_id' => $this->request->getData('card_id')
                    ]
                ]);
            if ($response = $this->Api->success($update)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }


    public function payment()
    {
        try {
            $cards = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/cards');
            if ($response = $this->Api->success($cards)) {
                $json = $response->parse();
                $cards = $json['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $cards = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        if ($cards && is_array($cards)) {
            foreach($cards as &$card) {
                $card['mask'] = $this->_unmask($card['masked_card']);
            }
        }


        //debug($cards);exit;
        $this->set(compact('cards'));
    }

    public function verification(){
        $profile = $this->getProfile();
        if(($profile['is_email_verified']) && ($profile['is_verified'] == 1)){
            $this->redirect(['action' => 'index']);
        }
    }
    public function verifyEmail(){
        $this->disableAutoRender();
        if($this->request->is('Ajax')){
            $profile = $this->getProfile();


            $profile['activation_url'] = \Cake\Routing\Router::url([
                'controller' => 'Register',
                'action' => 'activation',
                'prefix' => false
            ], true);
            try {
                $update = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/verification/email', [
                        'form_params' => [
                            'email' => $profile['email'],
                            'activation_url' => $profile['activation_url'],
                        ]
                    ]);
                if ($response = $this->Api->success($update)) {
                    $error = $response->parse();
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $this->Api->handle($e);
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode($error));
        }
    }


    protected function makeRequestChange(CustomerForm $customer, $url = 'change-phone', $action = 'changePhone')
    {
        try {
            $edit = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/' . $url, [
                    'form_params' => $this->request->getData() + ['session_id' => $this->request->getSession()->id()]
                ]);//debug($edit->getBody()->getContents());
            if ($response = $this->Api->success($edit)) {
                $json = $response->parse();
                return $json;
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $error = $this->Api->handle($e, true);//debug($e->getResponse()->getBody()->getContents());
            if ($e->getResponse()->getStatusCode() == 404) {
                return $this->redirect(['action' => $action]);
            }
            if (isset($error['error'])) {
                $customer->setErrors($error['error']);
            }
        }
    }

    public function changePhone()
    {
        $customer = new CustomerForm();

        $url_wizard = [
            '1' => 'change-phone',
            '2' => 'change-phone/set-phone',
            '3' => 'change-phone/verification',
            '4' => '',
        ];

        if ($this->request->is('post')) {
            if ($customer->execute($this->request->getData()) && isset($url_wizard[$this->request->getQuery('step', '1')])) {
                $data = $this->makeRequestChange($customer, $url_wizard[$this->request->getQuery('step', '1')]);
                //debug($url_wizard[$this->request->getQuery('step', '1')]);
                //debug($data);
                //debug($customer->getErrors());
                if (is_array($data) && isset($data['result']['data'])) {
                    return $this->redirect([
                        '?' => [
                            'step' => $data['result']['data']['step']
                        ]
                    ]);
                }
            }
        } else if ($this->request->getQuery('step', '1') >= 2) {
            try {
                $edit = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/change-phone/get-step/' . $this->request->getQuery('step', '1'), [
                        'form_params' => ['session_id' => $this->request->getSession()->id()]
                    ]);//debug($edit->getBody()->getContents());exit;
                if ($response = $this->Api->success($edit)) {
                    $data = $response->parse();
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $error = $this->Api->handle($e, true);
                if ($e->getResponse()->getStatusCode() == 404) {
                    return $this->redirect(['action' => 'changePhone']);
                }
            }

            if ($this->request->getQuery('step') == 2) {
                try {
                    $edit = $this->Api->makeRequest($this->Auth->user('token'))
                        ->get('v1/web/' . $url_wizard[$this->request->getQuery('step', '1')]);
                    if ($response = $this->Api->success($edit)) {
                        $data = $response->parse();
                        $customer->setData(['old_phone' => $data['result']['data']['phone']]);
                    }
                } catch(\GuzzleHttp\Exception\ClientException $e) {
                    $error = $this->Api->handle($e, true);//debug($e->getResponse()->getBody()->getContents());

                }
            }
        }


        $this->set(compact('customer', 'data'));
    }


    public function changeEmail()
    {
        //debug(\Cake\Utility\Inflector::variable('keren-bgt'));
        $customer = new CustomerForm();

        $url_wizard = [
            '1' => 'change-email',
            '2' => 'change-email/set-email',
            '3' => '',
        ];

        if ($this->request->is('post')) {
            if ($customer->execute($this->request->getData()) && isset($url_wizard[$this->request->getQuery('step', '1')])) {
                $data = $this->makeRequestChange($customer, $url_wizard[$this->request->getQuery('step', '1')], 'changeEmail');
                //debug($url_wizard[$this->request->getQuery('step', '1')]);
                //debug($data);
                //debug($customer->getErrors());
                if (is_array($data) && isset($data['result']['data'])) {
                    return $this->redirect([
                        '?' => [
                            'step' => $data['result']['data']['step']
                        ]
                    ]);
                }
            }
        } else if ($this->request->getQuery('step', '1') >= 2) {
            try {
                $edit = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/change-email/get-step/' . $this->request->getQuery('step', '1'), [
                        'form_params' => ['session_id' => $this->request->getSession()->id()]
                    ]);
                if ($response = $this->Api->success($edit)) {
                    $data = $response->parse();
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $error = $this->Api->handle($e, true);
                if ($e->getResponse()->getStatusCode() == 404) {
                    return $this->redirect(['action' => 'changeEmail']);
                }
            }

        }


        $this->set(compact('customer', 'data'));
    }


    public function deleteRoom()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        try {
            $edit = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/chatkit/delete-room/' . $this->request->getData('room_id'), [
                    'form_params' => []
                ]);
            if ($response = $this->Api->success($edit)) {
                $data = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $data = $this->Api->handle($e, true);
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
    }
}