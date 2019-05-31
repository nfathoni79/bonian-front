<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 * @property \App\Controller\Component\ApiComponent $Api
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AuthController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Login',
                'action' => 'auth',
                'prefix' => false
            ],
            'loginRedirect_' => false,
            'authorize_' => 'Api',
            'authenticate_' => [
                'Api' => [
                    //'finder' => 'auth',
                    'userModel' => 'Customers',
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'flash' => [
                'element' => 'error'
            ],
            'authError' => 'Sesi login berakhir, silahkan login kembali.',
            'unauthorizedRedirectx' => [
                'controller' => 'Login',
                'action' => 'auth',
                'prefix' => false
            ],
            'storage' => [
                'className' => 'Session',
                'key' => 'Auth.Customers',
            ],
        ]);

        $this->Auth->allow('logout');
    }

    public function logout()
    {
        $this->disableAutoRender();
        $this->Auth->logout();
        return $this->redirect('/');
    }

}
