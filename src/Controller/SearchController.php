<?php
namespace App\Controller;

use App\Controller\AuthController;

class SearchController  extends AuthController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['get']);
    }

    public function get(){
        $this->disableAutoRender();
        if($this->request->is('Ajax')){
            try {
                $this->Api->addHeader('bid', $this->request->getCookie('bid'));
                $search = $this->Api->makeRequest()
                    ->get('v1/products/search', [
                        'query' => [
                            'keywords' => $this->request->getQuery('q')
                        ]
                    ]);
                if ($response = $this->Api->success($search)) {
                    $json = $response->parse();
                    $search = $json['result']['data'];
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {

            }
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