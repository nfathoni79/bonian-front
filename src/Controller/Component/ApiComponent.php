<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use GuzzleHttp\Client;
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

    /**
     * initialize components
     * @param array $config
     *
     */
    public function initialize(array $config)
    {
        $this->_defaultConfig += $config;
    }

    /**
     * @param null $withToken
     * @return Client
     */
    public function makeRequest($withToken = null)
    {
        $api = Configure::read('Api');
        $this->base_uri = rtrim($api[$this->_defaultConfig['provider']], '/') . '/';

        $headers = [
            'User-Agent' => 'zolaku/1.0'
        ];

        if ($withToken) {
            $headers['Authorization'] = 'Bearer ' . $withToken;
        }

        return new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->base_uri,
            // You can set any number of default request options.
            'timeout'  => 30.0,
            'headers' => $headers
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


    public function parse()
    {
        return json_decode($this->_response, true);
    }


}
