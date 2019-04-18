<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use Pagination\Pagination;

class WishlistController extends AuthController
{

    public function index() {
        $response = [];
        try {
            $wishlists = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/wishlists', [
                    'query' => [
                        'limit' => 10,
                        'page' => $this->request->getQuery('page', 1)
                    ]
                ]);
            if ($response = $this->Api->success($wishlists)) {
                $response = $response->parse();
                $wishlists = $response['result']['data'];
                $paging = $response['paging'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        $pagination = new Pagination($paging['count'], $paging['perPage'], $paging['page']);

        $this->set(compact('wishlists', 'pagination'));
    }


    public function delete()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        try {
            $update = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/wishlists/delete', [
                    'form_params' => [
                        'wishlist_id' => $this->request->getData('wishlist_id')
                    ]
                ]);
            if ($response = $this->Api->success($update)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }

    public function add()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        try {
            $update = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/wishlists/add', [
                    'form_params' => [
                        'product_id' => $this->request->getData('product_id')
                    ]
                ]);
            if ($response = $this->Api->success($update)) {
                $error = $response->parse();
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($error));
    }
}