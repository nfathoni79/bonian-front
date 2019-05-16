<?php
namespace App\Controller;

use App\Controller\AuthController;

class PromotionController  extends AuthController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index','pointRedeem','claim']);
    }

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
        try {
            $banner = $this->Api->makeRequest()
                ->get('v1/banner/promotion/'.$slug);

            if ($response = $this->Api->success($banner)) {
                $json = $response->parse();
                $banner = $json['result'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {

        }
        $this->set(compact('promotion','banner'));
    }

    public function pointRedeem(){
        $this->viewBuilder()->setLayout('pages');
        try {
            $point = $this->Api->makeRequest()
                ->get('v1/point-redeem');
            if ($response = $this->Api->success($point)) {
                $json = $response->parse();
                $point = $json['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {

        }
        $this->set(compact('point'));
    }

    public function claim(){
        $this->disableAutoRender();
        $errors = [];
        if($this->Auth->user('token')){
            try {
                $claim = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/claim', [
                        'form_params' => $this->request->getData()
                    ]);
                if ($response = $this->Api->success($claim)) {
                    $json = $response->parse();

                    if(isset($json['error'])){
                        if(is_array($json['error'])){
                            foreach($json['error'] as $vals){
                                foreach($vals as $val){
                                    $errors = ['is_error' => true, 'message' => $val];
                                    break;
                                }
                            }
                        }
                    }else{
                        $errors = ['is_error' => false];
                    }
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $this->Api->handle($e);
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                $errors = ['is_error' => true, 'message' => $error['message']];
            }
        }else{
            $errors = ['is_error' => true, 'message' => 'Maaf, Silahkan login terlebih dahulu.'];
        }
        /* SEND REQUEST TO API CLAIM*/
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($errors));
    }

}