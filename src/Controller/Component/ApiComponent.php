<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\RequestOptions;

/**
 * Api component
 */
class ApiComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'provider' => 'development'
    ];

    /**
     * @var string
     */
    protected $base_uri = '';

    /**
     * @var \GuzzleHttp\Psr7\Stream
     */
    protected $_response = null;

    /**
     * Default Request
     * @var array
     */
    protected $_defaultRequest = [

    ];

    protected $_headers = [];

    protected $_cookies = [];

    /**
     * initialize components
     * @param array $config
     *
     */
    public function initialize(array $config)
    {
        $this->_defaultConfig += $config;
    }

    public function addHeader($name, $value)
    {
        $this->_headers[$name] = $value;
        return $this;
    }

    public function addCookies($cookie, $domain = '/') {
        $api = Configure::read('Api');
        $parse_url = parse_url($api[$this->_defaultConfig['provider']]);
        $domain = isset($parse_url['host']) ? $parse_url['host'] : $domain;
        $this->_cookies = CookieJar::fromArray($cookie, $domain);
        return $this->_cookies;
    }

    /**
     * @param null $withToken
     * @param null $withCustomer
     * @return Client
     */
    public function makeRequest($withToken = null, $withCustomer = false)
    {
        $api = Configure::read('Api');
        $this->base_uri = rtrim($api[$this->_defaultConfig['provider']], '/') . '/';

        $headers = [
            'User-Agent' => 'zolaku/1.0'
        ];

        if ($withToken) {
            $headers['Authorization'] = 'Bearer ' . $withToken;
        }

        if ($withCustomer) {
            if ($customer_id = $this->getController()->request->getSession()->read('Auth.Customers.id')) {
                $headers['customer-id'] = $customer_id;
            }
        }

        $headers = array_merge($headers, $this->_headers);


        return new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->base_uri,
            // You can set any number of default request options.
            'timeout'  => 30.0,
            'headers' => $headers,
            'cookies' => $this->_cookies,
			'verify' => false
        ]);
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $http
     * @return $this
     */
    public function success(\Psr\Http\Message\ResponseInterface $http)
    {
        if ($http->getStatusCode() == 200) {
            $this->_response = $http->getBody()->getContents();
            return $this;
        }
    }

    /**
     * @param \Exception $e
     * @param \Exception $return
     * @return \Cake\Http\Response|null|array
     */
    public function handle(\Exception $e, $return = false)
    {
        if ($e->getCode() == 401) {
            $this->getController()->Auth->logout();
            return $this->getController()->redirect(['controller' => 'Home', 'prefix' => false]);
        }

        if ($return && $e instanceof \GuzzleHttp\Exception\ClientException) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }

    }


    public function parse()
    {
        return json_decode($this->_response, true);
    }


}
