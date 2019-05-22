<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Home Controller
 *
 *
 */
class HomeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {


        try {
            $bannerLeft = $this->Api->makeRequest()
                ->get('v1/banner/bleft');
            if ($response = $this->Api->success($bannerLeft)) {
                $json = $response->parse();
                $bannerLeft = $json['result']['banner'];
            }
        } catch(\Exception $e) {
            //TODO set log
        }

        try {
            $bannerRight = $this->Api->makeRequest()
                ->get('v1/banner/bright');
            if ($response = $this->Api->success($bannerRight)) {
                $json = $response->parse();
                $bannerRight = $json['result']['banner'];
            }
        } catch(\Exception $e) {
            //TODO set log
        }

        //flash sale
        try {
            $flashSales = $this->Api->makeRequest()
                ->get('v1/flash-sale');
            if ($response = $this->Api->success($flashSales)) {
                $json = $response->parse();
                $flashSales = $json['result']['flashsale'];
            }
        } catch(\Exception $e) {
            //TODO set log
        }

        //new arrivals
        try {
            $topProducts = $this->Api->makeRequest(null, true)
                ->get('v1/products/best-sellers');
            if ($response = $this->Api->success($topProducts)) {
                $json = $response->parse();
                $topProducts = $json['result']['data'];
            }
        } catch(\Exception $e) {
            //TODO set log
        }

        try {
            $popularProducts = $this->Api->makeRequest(null, true)
                ->get('v1/products/popular-products');
            if ($response = $this->Api->success($popularProducts)) {
                $json = $response->parse();
                $popularProducts = $json['result']['data'];
            }
        } catch(\Exception $e) {
            //TODO set log
        }


        try {
            $newProducts = $this->Api->makeRequest(null, true)
                ->get('v1/products/new-arrivals');
            if ($response = $this->Api->success($newProducts)) {
                $json = $response->parse();
                $newProducts = $json['result']['data'];
            }
        } catch(\Exception $e) {
            //TODO set log
        }

        //top brand

        try {
            $topBrands = $this->Api->makeRequest()
                ->get('v1/brands');
            if ($response = $this->Api->success($topBrands)) {
                $json = $response->parse();
                $topBrands = $json['result']['data'];
            }
        } catch(\Exception $e) {
            //TODO set log
        }

        $this->set(compact('bannerLeft','bannerRight', 'flashSales','topProducts','popularProducts','newProducts', 'topBrands'));
    }

    function top($type = null){

        $this->viewBuilder()->enableAutoLayout(false);
        try {
            switch ($type) {
                case 'arrivals':
                    $topProducts = $this->Api->makeRequest()
                        ->get('v1/products/new-arrivals');
                break;
                case 'popularproduct':
                    $topProducts = $this->Api->makeRequest()
                        ->get('v1/products/popular-products');

                 break;
                case 'bestseller':
                    $topProducts = $this->Api->makeRequest()
                        ->get('v1/products/best-sellers');
                break;
            }
            if ($response = $this->Api->success($topProducts)) {
                $json = $response->parse();
                $topProducts = $json['result']['data'];
            }
        } catch(\Exception $e) {
            //TODO set log
        }
        $this->set(compact('topProducts'));
    }
}
