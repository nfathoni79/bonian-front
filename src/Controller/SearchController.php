<?php
namespace App\Controller;

use App\Controller\AuthController;
use Cake\Http\Client;
use Cake\Http\Client\Response;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Pagination\Pagination;


class SearchController  extends AuthController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['get', 'history', 'index', 'removeHistory', 'loadCategory', 'loadBrand', 'fetch']);
    }

    public function locator(){

        $this->disableAutoRender();
        if($this->request->is('ajax')){
            $fullAddress = $this->request->getData('province') .' '.$this->request->getData('city');

            $http = new Client();
            $response = $http->get('https://maps.googleapis.com/maps/api/geocode/json', [
                'address' => $fullAddress,
                'sennsor' => false,
                'key' => 'AIzaSyATYUOKzvV7zsw3dZ8tvziH2oGtbxFUhJY'
            ]);
            $response = json_decode($response->getBody()->getContents(), true);
            if($response['status'] == 'OK'){
                $location = ['lat' => $response['results'][0]['geometry']['location']['lat'], 'lang' => $response['results'][0]['geometry']['location']['lng']];
            }else{
                $location = ['lat' => '0', 'lang' => '0'];
            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode($location));
        }
    }

    public function poi(){

        $this->disableAutoRender();
        if($this->request->is('ajax')){
            $latlng = $this->request->getData('lat') .','.$this->request->getData('lng');

            $http = new Client();
            $response = $http->get('https://maps.googleapis.com/maps/api/geocode/json', [
                'latlng' => $latlng,
                'key' => 'AIzaSyATYUOKzvV7zsw3dZ8tvziH2oGtbxFUhJY'
            ]);
            $response = json_decode($response->getBody()->getContents(), true);
            if($response['status'] == 'OK'){
                $address = $response['results'][0]['formatted_address'];
            }else{
                $address = 'unknown address';
            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode($address));
        }
    }


    protected function saveSearch($keyword, $category_id = null)
    {
        try {
            $this->Api->addHeader('bid', $this->request->getCookie('bid'));
            $search = $this->Api->makeRequest()
                ->post('v1/products/save-search', [
                    'form_params' => array_filter([
                        'keyword' => $keyword,
                        'category_id' => $category_id
                    ])
                ]); //print_r($search->getBody()->getContents());exit;
            if ($response = $this->Api->success($search)) {
                $json = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            //debug($e->getResponse()->getBody()->getContents());exit;
        }
    }

    public function removeHistory()
    {
        $this->disableAutoRender();
        $delete = [];

        try {
            $this->Api->addHeader('bid', $this->request->getCookie('bid'));
            $delete = $this->Api->makeRequest()
                ->post('v1/products/delete-history', [
                    'form_params' => array_filter([
                        'term_id' => $this->request->getData('term_id'),
                    ])
                ]);
            if ($response = $this->Api->success($delete)) {
                $json = $response->parse();
                $delete = $json;
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            //debug($e->getResponse()->getBody()->getContents());exit;
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($delete));
    }

    public function fetch()
    {
        try {
            $this->Api->addHeader('bid', $this->request->getCookie('bid'));
            $search = $this->Api->makeRequest()
                ->get('v1/product-filters', [
                    'query' => array_filter($this->request->getQueryParams())
                ]); //print_r($search->getBody()->getContents());exit;
            if ($response = $this->Api->success($search)) {
                $response = $response->parse();
                $products = $response['result']['data'];
                $paging = $response['paging'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            //debug($e->getResponse()->getBody()->getContents());exit;
        }

        if (isset($paging) && $paging['count'] > 0) {
            $pagination = new Pagination($paging['count'], $paging['perPage'], $paging['page']);
        } else {

        }

        $this->set(compact('products', 'pagination'));
    }


    protected function _index($query_string) {
        try {
            $query_string['limit'] = 16;
            $this->Api->addHeader('bid', $this->request->getCookie('bid'));
            $search = $this->Api->makeRequest()
                ->get('v1/product-filters', [
                    'query' => array_filter($query_string)
                ]); //print_r($search->getBody()->getContents());exit;
            if ($response = $this->Api->success($search)) {
                $response = $response->parse();
                $products = $response['result']['data'];
                $paging = $response['paging'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            //debug($e->getResponse()->getBody()->getContents());exit;
            return false;
        }

        return [
          'products' => $products,
          'paging' => $paging
        ];
    }

    public function index()
    {
        $query_string = $this->request->getQueryParams();
        if ($this->request->is('ajax')) {
            $data = $this->_index($query_string);
            $this->viewBuilder()->setTemplate('fetch');
        } else if ($this->request->is('post')) {
            $this->saveSearch($this->request->getData('q'));
            $query_string['q'] = $this->request->getData('q');
            return $this->redirect([
                '?' => $query_string
            ]);
        } else if ($this->request->getQuery('source') == 'click') {
            $this->saveSearch($this->request->getQuery('q'), $this->request->getQuery('category_id', null));
            unset($query_string['source']);
            return $this->redirect([
                '?' => $query_string
            ]);
        } else {
            $data = $this->_index($query_string);
        }

        if ($data) {
            $products = $data['products'];
            $paging = $data['paging'];
        } else {
            $this->Flash->error('Product tidak di temukan');
        }



        if (isset($paging) && $paging['count'] > 0) {
            $pagination = new Pagination($paging['count'], $paging['perPage'], $paging['page']);
        } else {

        }


        if (!isset($query_string['min_price']) && !isset($query_string['max_price'])) {
            $pricing = $this->_price($query_string);
        } else {
            $pricing = [
                'min_price' => $query_string['min_price'],
                'max_price' => $query_string['max_price'],
            ];
        }

        $variants = $this->_variant($query_string);
        $brands = $this->_brand($query_string);

        $this->set(compact('products', 'pagination', 'pricing', 'variants', 'brands'));

    }

    public function loadCategory()
    {
        $this->disableAutoRender();
        $query_string = $this->request->getQueryParams();
        try {
            $this->Api->addHeader('bid', $this->request->getCookie('bid'));
            $category = $this->Api->makeRequest()
                ->get('v1/product-filters/categories', [
                    'query' => array_filter($query_string)
                ]);
            if ($response = $this->Api->success($category)) {
                $json = $response->parse();
                $category = $json['result']['categories'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            //debug($e->getResponse()->getBody()->getContents());exit;
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($category));
    }


    protected function _price($query_string)
    {
        try {
            $this->Api->addHeader('bid', $this->request->getCookie('bid'));
            $data = $this->Api->makeRequest()
                ->get('v1/product-filters/price-range', [
                    'query' => array_filter($query_string)
                ]);
            if ($response = $this->Api->success($data)) {
                $json = $response->parse();
                $data = $json['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            //debug($e->getResponse()->getBody()->getContents());exit;
        }
        return $data;
    }

    public function loadPrice()
    {
        $this->disableAutoRender();
        $query_string = $this->request->getQueryParams();
        $data = $this->_price($query_string);
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
    }

    protected function _variant($query_string)
    {
        $data = [];
        try {
            $this->Api->addHeader('bid', $this->request->getCookie('bid'));
            $data = $this->Api->makeRequest()
                ->get('v1/product-filters/variant', [
                    'query' => array_filter($query_string)
                ]);
            if ($response = $this->Api->success($data)) {
                $json = $response->parse();
                $data = $json['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            //debug($e->getResponse()->getBody()->getContents());exit;
        }
        return $data;
    }

    protected function _brand($query_string)
    {
        $data = [];
        try {
            $this->Api->addHeader('bid', $this->request->getCookie('bid'));
            $data = $this->Api->makeRequest()
                ->get('v1/product-filters/brand', [
                    'query' => array_filter($query_string)
                ]);
            if ($response = $this->Api->success($data)) {
                $json = $response->parse();
                $data = $json['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            //debug($e->getResponse()->getBody()->getContents());exit;
        }
        return $data;
    }

    public function loadVariant()
    {
        $this->disableAutoRender();
        $query_string = $this->request->getQueryParams();
        $data = $this->_variant($query_string);
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
    }

    public function loadBrand()
    {
        //$this->disableAutoRender();
        $query_string = $this->request->getQueryParams();
        $brands = $this->_brand($query_string);
        $this->set(compact('brands'));
    }


    public function history()
    {
        $this->disableAutoRender();
        if($this->request->is('ajax')){
            try {
                $this->Api->addHeader('bid', $this->request->getCookie('bid'));
                $search = $this->Api->makeRequest()
                    ->get('v1/products/search-history', [
                        'query' => []
                    ]);
                if ($response = $this->Api->success($search)) {
                    $json = $response->parse();
                    $search = $json['result']['data'];
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {

            }
            return $this->response->withType('application/json')
                ->withStringBody(json_encode($search));
        }
    }

    protected function highlight($text, $words)
    {
        preg_match_all('~\w+~', $words, $m);
        if(!$m)
            return $text;
        $re = '~\\b(' . implode('|', $m[0]) . ')\\b~i';
        return preg_replace($re, '<span class="search-highlight">$0</span>', $text);
    }

    public function get()
    {
        if($this->request->is('ajax')) {
            $keyword = $this->request->getQuery('q');
            try {
                $this->Api->addHeader('bid', $this->request->getCookie('bid'));
                $search = $this->Api->makeRequest()
                    ->get('v1/products/search', [
                        'query' => [
                            'keywords' => $keyword
                        ]
                    ]);//debug($search->getBody()->getContents());exit;
                if ($response = $this->Api->success($search)) {
                    $json = $response->parse();
                    $search = $json['result']['data'];
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {

            }
        }

        $this->viewBuilder()->setClassName('Json');
        $this->set(compact('search', 'keyword'));
    }


}