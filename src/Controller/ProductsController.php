<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Http\Cookie\Cookie;
use Cake\I18n\Number;
use Pagination\Pagination;
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
        $this->Auth->allow(['detail','comment','getDetail']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
	 
	public function getDetail($slug= null){
		$this->disableAutoRender();
		if($this->request->is('Ajax')){
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
            return $this->response->withType('application/json')
                ->withStringBody(json_encode($details)); 
        }
	}
	
	 
    public function detail($slug , $media = null, $reff = null)
    {
		//Configure::write('debug',0);

        $this->viewBuilder()->setLayout('detail');
        try {
            $login = $this->Api->makeRequest(null, true)
                ->get('v1/products/'.$slug);
            if ($response = $this->Api->success($login)) {
                $json = $response->parse();
                $details = ['is_error' => false, 'data' => $json['result']['data'], 'variant' => ['warna', 'ukuran']];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $details = ['is_error' => true, 'message' => 'Produk tidak ditemukan'];
        }//debug($this->request->getSession()->read());exit;
        //debug($details);exit;
 
		$this->set(compact('details')); 

        if(!empty($details['data'])){

            //process share statistic
            //debug($this->referer());
            if ($media && $reff) {
                try {
                    $share = $this->Api->makeRequest()
                        ->post('v1/products/share', [
                            'form_params' => [
                                'product_id' => $details['data']['id'],
                                'media_type' => $media,
                                'reffcode' => $reff,
                                'clicked' => $this->referer() == '/' ? 0 : 1
                            ]
                        ]);
                    if ($response = $this->Api->success($share)) {
                        $json = $response->parse();
                        $cookie = new Cookie(
                            'share_product',
                            $json['result']['data'],
                            (new \DateTime())->add(new \DateInterval('P7D')),
                            '/' //$this->request->getAttribute('base')
                        );
                        $this->response = $this->response->withCookie($cookie);
                    }
                } catch(\GuzzleHttp\Exception\ClientException $e) {

                }

                if ($this->referer() != '/') {
                    return $this->redirect([
                        'action' => 'detail',
                        $slug
                    ]);
                }
            }


            try {
                $discuss = $this->Api->makeRequest()
                    ->post('v1/discussion?limit=50', [
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

            try {
                $review = $this->Api->makeRequest()
                    ->get('v1/product-ratings/'.$details['data']['id'], [
                        'query' => [
                            'limit' => 10,
                            'page' => $this->request->getQuery('page', 1),
                            'rating' => $this->request->getQuery('rating')
                        ]
                    ]);
                if ($response = $this->Api->success($review)) {
                    $json = $response->parse();
                    $review = $json['result']['data'];
                    $paging = $json['paging'];
                }
            } catch(\GuzzleHttp\Exception\ClientException $e) {

            }

            if ($paging && $paging['count'] > 0) {
                $paginationReview = new Pagination($paging['count'], $paging['perPage'], $paging['page']);
            }
            $this->set(compact('review','paginationReview'));
        }

        $category = end($details['data']['categories']);

        try {
            $releted = $this->Api->makeRequest()
                ->get('v1/products/releted/'.$category['id'], [
                    'query' => [
                        'except_product_id' => $details['data']['id']
                    ]
                ]);

            if ($response = $this->Api->success($releted)) {
                $json = $response->parse();
                $releted = $json['result']['data'];
            }
        } catch(\Exception $e) {
            //TODO set log
        }

        $this->set(compact('releted'));
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


    public function rating(){
        /* data json */
    }

}
