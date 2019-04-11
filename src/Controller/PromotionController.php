<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Promotion Controller
 *
 *
 */
class PromotionController extends AppController
{

    public function index($slug = null){

        $this->viewBuilder()->setLayout('promotion');
        //get promotion by slug
        try {
            $promotion = $this->Api->makeRequest()
                ->get('v1/promotions/'.$slug.'?limit=10');
            if ($response = $this->Api->success($promotion)) {
                $json = $response->parse();
                $promotion = $json['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {

        }
        $this->set(compact('promotion'));
    }

}