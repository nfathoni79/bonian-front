<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use Pagination\Pagination;

class ActionsController  extends AuthController
{

    public function claim(){
        $this->disableAutoRender();
        $errors = [];

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
        /* SEND REQUEST TO API CLAIM*/
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($errors));
    }
}