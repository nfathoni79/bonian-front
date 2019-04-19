<?php
namespace App\Controller;

use App\Controller\AuthController;
use Cake\Http\Client;
use Cake\Http\Client\Response;

class SearchController  extends AuthController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['get', 'history']);
    }

    public function locator(){

        $this->disableAutoRender();
        if($this->request->is('ajax')){
            $fullAddress = $this->request->getData('province') .' '.$this->request->getData('city'). ' '.$this->request->getData('subdistrict');

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