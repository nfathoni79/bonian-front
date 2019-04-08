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

        $this->set(compact('bannerLeft','bannerRight'));
    }


}
