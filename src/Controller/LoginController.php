<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Cookie\CookieInterface;
use Cake\Routing\Route;
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
        $this->Auth->allow([
            'index',
            'auth',
            'forgotPassword',
            'showOtp',
            'setPassword'
        ]);
    }

    /**
     * @return \Cake\Http\Response
     * @throws \Exception
     */
    public function index()
   {
       $this->disableAutoRender();
       $this->request->allowMethod('post');

       $email = $this->request->getData('email');
       $password = $this->request->getData('password');
       $error = ['error' => []];
       $success = true;
       try {
           $this->Api->addHeader('bid', $this->request->getCookie('bid'));
           $this->Api->addHeader('User-Agent', env('HTTP_USER_AGENT'));
           $this->Api->addHeader('ip', env('REMOTE_ADDR'));
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

               if (!empty($json['result']['data']['reffcode'])) {
                   $cookie = new Cookie(
                       'reffcode',
                       $json['result']['data']['reffcode'],
                       (new \DateTime())->add(new \DateInterval('P1M')),
                       $this->request->getAttribute('base')
                   );
                   $this->response = $this->response->withCookie($cookie);
               }



               try {
                   $this->Api->makeRequest($json['result']['data']['token'])
                       ->post('v1/web/customers/save-browser', [
                           'form_params' => [
                               'ip' => env('REMOTE_ADDR'),
                               //'browser' => env('HTTP_USER_AGENT'),
                           ]
                       ]);
               } catch(\GuzzleHttp\Exception\ClientException $e) {
                   $success = false;
               }

           }
       } catch(\GuzzleHttp\Exception\ClientException $e) {
           $error = json_decode($e->getResponse()->getBody()->getContents(), true);
           $success = false;
       }


        if($this->request->is('Ajax')){
            return $this->response->withType('application/json')
                ->withStringBody(json_encode($error));
        }else{
            if($success){
                $this->redirect(['controller' => 'Home', 'action' => 'index']);
            }else{
                $this->Flash->error(__('Kombinasi username dan password salah'));
                $this->redirect(['action' => 'auth']);
            }
        }

   }


   public function auth()
   {
//       $this->disableAutoRender();
//       debug($this->Auth->user());
//        exit;
        $this->viewBuilder()->setLayout('auth');
        if($this->Auth->user()){
            $this->redirect(['controller' => 'Home', 'action' => 'index']);
        }



   }

   public function endPoint()
   {
       $this->disableAutoRender();
       $this->request->allowMethod('post');
       $endpoint = [];

       try {
           $pusher = $this->Api->makeRequest($this->Auth->user('token'))
               ->post('v1/web/login/end-point', [
                   'form_params' => $this->request->getData()
               ]);
           if ($response = $this->Api->success($pusher)) {
               $endpoint = $response->parse();
               $endpoint = $endpoint['result'];
           }
       } catch(\GuzzleHttp\Exception\ClientException $e) {
           $this->Api->handle($e);
           $this->response = $this->response->withStatus($e->getResponse()->getStatusCode(), $e->getResponse()->getReasonPhrase());
           $endpoint = json_decode($e->getResponse()->getBody()->getContents(), true);
       }


       return $this->response->withType('application/json')
           ->withStringBody(json_encode($endpoint));
   }


   public function setPassword()
   {
       if ($this->request->is('ajax') && $this->request->is('post')) {
           try {
               $login = $this->Api->makeRequest()
                   ->post('v1/forgot-password/set-password', [
                       'form_params' => $this->request->getData()
                   ]);
               if ($response = $this->Api->success($login)) {
                   $error = $response->parse();


               }
           } catch(\GuzzleHttp\Exception\ClientException $e) {
               $error = $this->Api->handle($e, true);
           }
           return $this->response->withType('application/json')
               ->withStringBody(json_encode($error));
       }
   }


   public function showOtp()
   {
       $this->getRequest()->getSession()->start();
       $session_id = $this->getRequest()->getSession()->id();


       if ($this->request->is('ajax') && $this->request->is('post')) {
           try {
               $login = $this->Api->makeRequest()
                   ->post('v1/forgot-password/otp', [
                       'form_params' => [
                           'otp' => $this->request->getData('otp'),
                           'session_id' => $this->request->getData('session_id')
                       ]
                   ]);
               if ($response = $this->Api->success($login)) {
                   $error = $response->parse();
                   $error['result'] += [
                       'url' => \Cake\Routing\Router::url([
                           'action' => 'setPassword'
                       ])
                   ];

               }
           } catch(\GuzzleHttp\Exception\ClientException $e) {
               $error = $this->Api->handle($e, true);
           }
           return $this->response->withType('application/json')
               ->withStringBody(json_encode($error));
       }


   }

   public function forgotPassword()
   {

       ///$this->getRequest()->getSession()->start();
       //$session_id = $this->getRequest()->getSession()->id();

        if ($this->request->is('ajax') && $this->request->is('post')) {
            try {
                $login = $this->Api->makeRequest()
                    ->post('v1/forgot-password', [
                        'form_params' => [
                            'email' => $this->request->getData('email'),
                            //'session_id' => $session_id
                        ]
                    ]);
                if ($response = $this->Api->success($login)) {
                    $error = $response->parse();
                    $error['result'] += [
                        'url' => \Cake\Routing\Router::url([
                            'action' => 'showOtp'
                        ])
                    ];

                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $error = $this->Api->handle($e, true);
            }
            return $this->response->withType('application/json')
                ->withStringBody(json_encode($error));
        }
   }
}
