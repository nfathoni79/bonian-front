<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Cookie\CookieInterface;
use Cake\Routing\Router;
use Cake\Utility\Security;
use Cake\Http\Cookie\Cookie;
use GuzzleHttp\TransferStats;

/**
 * Login Controller controller
 *
 */
class OauthController extends AuthController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('index');
    }

    /**
     * @return \Cake\Http\Response
     * @throws \Exception
     */
    public function index()
   {
       $this->disableAutoRender();


       $query = $this->request->getQueryParams();

       $callback = parse_url(Router::url(null, true));
       $callback_url = $callback['scheme'] . '://' . $callback['host'] . $callback['path'] . '?' . http_build_query(['provider' => $this->request->getQuery('provider')]);


       try {
           $this->Api->addHeader('bid', $this->request->getCookie('bid'));
           $this->Api->addHeader('User-Agent', env('HTTP_USER_AGENT'));
           $this->Api->addHeader('callback', $callback_url);
           $login = $this->Api->makeRequest()
               ->get('v1/web/oauth', [
                   'query' => $query,
                   'on_stats' => function (TransferStats $stats) use (&$url) {
                        if (in_array($stats->getResponse()->getStatusCode(), [301, 302])) {
                            $url = (string) $stats->getEffectiveUri();
                        }

                   }
               ]);

           if (!isset($query['code'])) {
               $headers = $login->getHeaders();

               foreach($headers as $key => $values) {
                   foreach($values as $value) {
                       $this->response = $this->response->withHeader($key, $value);
                   }
               }



               if ($url) {
                   return $this->redirect($url);
               }
           }


           if ($response = $this->Api->success($login)) {
               $json = $response->parse();
               $data = $json['result']['data'];
               $tokens = $json['result']['tokens'];


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

               return $this->redirect($this->request->getQuery('redirect_url', '/'));


           }
       } catch(\GuzzleHttp\Exception\ClientException $e) {
		   print_r($e->getResponse()->getBody()->getContents());
           //return $this->redirect($this->request->getQuery('redirect_url', '/'));
       }



   }

}
