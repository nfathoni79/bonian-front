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
        $this->Auth->allow(['index','auth']);
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

       try {
           $this->Api->addHeader('bid', $this->request->getCookie('bid'));
           $this->Api->addHeader('User-Agent', env('HTTP_USER_AGENT'));
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

               }

           }
       } catch(\GuzzleHttp\Exception\ClientException $e) {
           $error = json_decode($e->getResponse()->getBody()->getContents(), true);
       }




       return $this->response->withType('application/json')
           ->withStringBody(json_encode($error));
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
}
