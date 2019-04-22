<?php
namespace App\Controller;

use App\Controller\AuthController;
use Cake\Core\Configure;
use Cake\Routing\Router;

class SearchController  extends AuthController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['get', 'history', 'index']);
    }


    public function index()
    {
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

    public function get(){
        $this->disableAutoRender();
        if($this->request->is('Ajax')){
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

            //modified search API
            if (isset($search[1]) && isset($search[1]['data'])) {
                foreach($search[1]['data'] as $key => &$val) {
                    $val['primary'] = $this->highlight($val['primary'], $keyword) .
                        ' di <span class="search-category">' . $val['product_category']['name'] . '</span>';
                    $val['url'] = Router::url([
                        'controller' => 'Search',
                        'action' => 'index',
                        'prefix' => false,
                        '?' => [
                            'q' => $keyword,
                            'category_id' => $val['product_category']['id']
                        ]
                    ]);
                }
            }

            if (isset($search[2]) && isset($search[2]['data'])) {
                foreach($search[2]['data'] as $key => &$val) {
                    $val['primary'] = $this->highlight($val['primary'], $keyword);
                    if (isset($val['product_images']) && isset($val['product_images'][0])) {
                        $val['image'] = rtrim(Configure::read('Images.url'), '/')  . '/images/40x40/' . $val['product_images'][0]['name'];
                    }
                    $val['url'] = Router::url([
                        'controller' => 'Products',
                        'action' => 'detail',
                        'prefix' => false,
                        $val['slug']
                    ]);
                }
            }


            //debug($search);exit;
        }
//        $this->set(compact('promotion'));

//        $arr = array (
//            0 =>
//                array (
//                    'header' =>
//                        array (
//                            'title' => 'Fruits',
//                            'num' => 2,
//                            'limit' => 5,
//                        ),
//                    'data' =>
//                        array (
//                            0 =>
//                                array (
//                                    'primary' => 'Pear',
//                                    'secondary' => 'Pears are delicious fruits.',
//                                    'image' => '/zolaku-front/images/fruits/pear.jpg',
//                                    'onclick' => 'alert(\'You clicked on the Pear fruit!\');',
//                                    'fill_text' => 'pear',
//                                ),
//                            1 =>
//                                array (
//                                    'primary' => 'Tamarind',
//                                    'secondary' => 'The bright green, pinnate foliage is dense and feathery in appearance.',
//                                    'image' => '/zolaku-front/images/fruits/tamarind.jpg',
//                                    'onclick' => 'alert(\'You clicked on the Tamarind fruit!\');',
//                                    'fill_text' => 'tamarind',
//                                ),
//                        ),
//                ),
//            1 =>
//                array (
//                    'header' =>
//                        array (
//                            'title' => 'Vegetables',
//                            'num' => 3,
//                            'limit' => 5,
//                        ),
//                    'data' =>
//                        array (
//                            0 =>
//                                array (
//                                    'primary' => 'Artichoke',
//                                    'secondary' => 'One medium artichoke cooked with no added salt has 3.47 grams protein.',
//                                    'image' => '/zolaku-front/images/fruits/artichoke.jpg',
//                                    'onclick' => 'alert(\'You clicked on the Artichoke vegetable!\');',
//                                    'fill_text' => 'artichoke',
//                                ),
//                            1 =>
//                                array (
//                                    'primary' => 'Asparagus',
//                                    'secondary' => 'Half cup (about 6 spears) cooked with no added salt contains 2.16 grams of protein.',
//                                    'image' => '/zolaku-front/images/fruits/asparagus.jpg',
//                                    'onclick' => 'alert(\'You clicked on the Asparagus vegetable!\');',
//                                    'fill_text' => 'asparagus',
//                                ),
//                            2 =>
//                                array (
//                                    'primary' => 'Carrots',
//                                    'secondary' => 'Half cup cooked with no added salt contains 0.59 grams protein.',
//                                    'image' => '/zolaku-front/images/fruits/carrots.jpg',
//                                    'onclick' => 'alert(\'You clicked on the Carrots vegetable!\');',
//                                    'fill_text' => 'carrots',
//                                ),
//                        ),
//                ),
//        );

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($search));
    }


}