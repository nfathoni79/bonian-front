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
        $this->Auth->allow(['index', 'cb']);
    }


    /**
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->disableAutoRender();

        $query = $this->request->getQueryParams();
        $provider = $this->request->getQuery('provider');
        if ($provider) {
            $callback = parse_url(Router::url(null, true));
            $callback_url = $callback['scheme'] . '://' . $callback['host'] . $callback['path'] . '/cb/' . $provider;

            try {
                $this->Api->addHeader('bid', $this->request->getCookie('bid'));
                $this->Api->addHeader('User-Agent', env('HTTP_USER_AGENT'));
                $this->Api->addHeader('callback', $callback_url);
                $login = $this->Api->makeRequest()
                    ->get('v1/web/oauth', [
                        'query' => $query,
                        'on_stats' => function (TransferStats $stats) use (&$url) {
                            if (in_array($stats->getResponse()->getStatusCode(), [301, 302])) {
                                $url = (string)$stats->getEffectiveUri();
                            }

                        }
                    ]);

                if ($response = $this->Api->success($login)) {
                    $json = $response->parse();
                    $redirect = $json['result']['redirect'];
                    if ($redirect) {
                        return $this->redirect($redirect);
                    }
                }



            } catch(\GuzzleHttp\Exception\ClientException $e) {
                //print_r($e->getResponse()->getBody()->getContents());exit;
                return $this->redirect($this->request->getQuery('redirect_url', '/'));
            }
        }

    }

    /**
     * @param $provider
     * @return \Cake\Http\Response|null
     * @throws \Exception
     */
    public function cb($provider)
    {
        $this->disableAutoRender();
        $query = $this->request->getQueryParams();
		$callback = parse_url(Router::url(null, true));
        $callback_url = $callback['scheme'] . '://' . $callback['host'] . $callback['path'];

        try {
            $this->Api->addHeader('bid', $this->request->getCookie('bid'));
            $this->Api->addHeader('User-Agent', env('HTTP_USER_AGENT'));
			$this->Api->addHeader('callback', $callback_url);
            $login = $this->Api->makeRequest()
                ->get('v1/web/oauth/cb/' . $provider, [
                    'query' => $query,
                    'on_stats' => function (TransferStats $stats) use (&$url) {
                        if (in_array($stats->getResponse()->getStatusCode(), [301, 302])) {
                            $url = (string)$stats->getEffectiveUri();
                        }

                    }
                ]);

            if ($response = $this->Api->success($login)) {
                $json = $response->parse();
                $oauth = $json['result']['oauth'];

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
            //print_r($e->getResponse()->getBody()->getContents());exit;
            return $this->redirect($this->request->getQuery('redirect_url', '/'));
        }
    }

}
