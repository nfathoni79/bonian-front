<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Number;
/**
 * Home Controller
 *
 *
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function detail($slug = null)
    {

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
    }

}
