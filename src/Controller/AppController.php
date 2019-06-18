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

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Http\Cookie\Cookie;
use Cake\Utility\Security;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 * @property \App\Controller\Component\ApiComponent $Api
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     * @throws \Exception
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Api', [
            'provider' => 'development'
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    /**
     * @param Event $event
     * @return \Cake\Http\Response|null
     * @throws \Exception
     */
    public function beforeFilter(Event $event)
    {

        if (!$this->request->getCookie('bid')) {
            if (property_exists($this, 'Api')) {
                try {
                    $browser = $this->Api->makeRequest()
                        ->post('v1/browsers', [
                            'form_params' => [
                                'user_agent' => env('HTTP_USER_AGENT')
                            ]
                        ]);

                    if ($response = $this->Api->success($browser)) {
                        $json = $response->parse();
                        $browser = $json['result']['data'];
                        if ($browser && isset($browser['bid'])) {
                            $randomString = $browser['bid'] ? $browser['bid'] : Security::randomString();
                            $cookie = new Cookie(
                                'bid',
                                $randomString,
                                (new \DateTime())->add(new \DateInterval('P5Y')),
                                '/' //$this->request->getAttribute('base')
                            );
                            $this->response = $this->response->withCookie($cookie);
                        }
                    }
                } catch(\Exception $e) {
                    //TODO set log
                }


            }
        }

        if ($this->request->getSession()->check('Auth.Customers')) {
            if ($this->request->getParam('controller') != 'Auth' && $this->request->getParam('action') != 'logout') {
                if ($this->request->getSession()->read('Auth.Customers.phone') == '' || $this->request->getSession()->read('Auth.Customers.is_verified') != '1') {
                    if ($this->request->getParam('controller') != 'Verifications'
                        && !in_array($this->request->getParam('action'), ['phone', 'phoneOtp'])) {
                        return $this->redirect(['controller' => 'Verifications', 'action' => 'phone', 'prefix' => 'user']);
                    }
                }  else if ($this->request->getSession()->read('Auth.Customers.username') == '') {
                    if ($this->request->getParam('controller') != 'Verifications'
                        && $this->request->getParam('action') != 'username') {
                        return $this->redirect(['controller' => 'Verifications', 'action' => 'username', 'prefix' => 'user']);
                    }
                }
            }
        }

        return parent::beforeFilter($event);
    }


    public function beforeRender(Event $event)
    {
        $_basePath = Configure::read('Images.url');
        if (property_exists($this, 'Api')) {
            $_categories = $this->getCategories();
            $_banners = $this->getTopHomeBanner();
            $_carts = $this->getCart();
            $_notifications = $this->getNotificationCount();
            $_profile = $this->getProfiles();
        }


        $this->set(compact('_categories', '_banners', '_basePath', '_carts', '_notifications', '_profile'));

        return parent::beforeRender($event);
    }

    protected function getProfiles()
    {

        if ($this->request->getSession()->check('Auth.Customers.token')) {
            try {
                $customer = $this->Api->makeRequest($this->request->getSession()->read('Auth.Customers.token'))
                    ->get('v1/web/profile');
                if ($response = $this->Api->success($customer)) {
                    $response = $response->parse();
                    return $response['result']['data'];
                }
            } catch(\Exception $e) {
                //TODO set log
            }
        }
    }

    protected function getCategories()
    {
        try {
            $category = $this->Api->makeRequest()
                ->get('v1/categories/view');

            if ($response = $this->Api->success($category)) {
                $json = $response->parse();
                $categories = $json['result']['categories'];
                return $categories;

            }
        } catch(\Exception $e) {
            //TODO set log
        }
    }

    protected function getCart()
    {
        if ($this->request->getSession()->check('Auth.Customers.token')) {
            try {
                $carts = $this->Api->makeRequest($this->request->getSession()->read('Auth.Customers.token'))
                    ->get('v1/web/cart/view?limit=5');

                if ($response = $this->Api->success($carts)) {
                    $json = $response->parse();
                    if ($json['result']) {
                        $carts = ['carts' => $json['result']['data'], 'pagging' => $json['paging']];
                        return $carts;
                    }

                }
            } catch(\Exception $e) {
                //TODO set log
            }
        }

    }

    protected function getTopHomeBanner()
    {
        try {
            $banner = $this->Api->makeRequest()
                ->get('v1/banner/top');
            if ($response = $this->Api->success($banner)) {
                $json = $response->parse();
                $banners = $json['result']['banner'];
                return $banners;

            }
        } catch(\Exception $e) {
            //TODO set log
        }
    }

    protected function getNotificationCount()
    {
        if ($this->request->getSession()->check('Auth.Customers.token')) {
            try {
                $carts = $this->Api->makeRequest($this->request->getSession()->read('Auth.Customers.token'))
                    ->get('v1/web/notifications/count');
                if ($response = $this->Api->success($carts)) {
                    $json = $response->parse();
                    if ($json['result']) {
                        $notifications = $json['result']['count'];
                        return $notifications;
                    }

                }
            } catch(\Exception $e) {
                //TODO set log
            }
        }

    }
}
