<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Number;
/**
 * Home Controller
 *
 *
 */
class ProductsController extends AuthController
{


    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['detail','comment']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function detail($slug , $reff = null)
    {
        $this->viewBuilder()->setLayout('detail');
        try {
            $login = $this->Api->makeRequest()
                ->get('v1/products/'.$slug);
            if ($response = $this->Api->success($login)) {
                $json = $response->parse();
                $details = ['is_error' => false, 'data' => $json['result']['data'], 'variant' => ['warna', 'ukuran']];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $details = ['is_error' => true, 'message' => 'Produk tidak ditemukan'];
        }
        if($this->request->is('Ajax')){
            $this->disableAutoRender();
            return $this->response->withType('application/json')
                ->withStringBody(json_encode($details));
        }else{
            $this->set(compact('details'));
        }

        if(!empty($details['data'])){
            try {
                $discuss = $this->Api->makeRequest()
                    ->post('v1/discussion?limit=100', [
                        'form_params' => [
                            'product_id' => $details['data']['id'],
                        ]
                    ]);
                if ($response = $this->Api->success($discuss)) {
                    $json = $response->parse();
                    $comment = ['is_error' => false, 'data' => $json['result']['data'], 'paginate' => $json['paging']];
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {

            }
            $this->set(compact('comment'));
        }

    }


    public function comment(){

        $this->disableAutoRender();
        $this->request->allowMethod('post');
        $error = [];
        try {
            $comment = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/discussion/add', [
                    'form_params' => $this->request->getData()
                ]);
            if ($response = $this->Api->success($comment)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }

    public function deleteComment(){

        $this->disableAutoRender();
        $this->request->allowMethod('post');
        try {
            $comment = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/discussion/delete', [
                    'form_params' => $this->request->getData()
                ]);
            if ($response = $this->Api->success($comment)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }

}
