<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use App\Form\RefferalForm;
use Pagination\Pagination;

class LeaderboardController extends AuthController{

    protected function getProfile()
    {
        try {
            $customer = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/profile');
            if ($response = $this->Api->success($customer)) {
                $response = $response->parse();
                return $response['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }

    public function index(){

        $reff_cus_id = $this->getProfile()['refferal_customer_id'];

        $response = [];
        try {
            $leaderboard = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/leaderboards', [
                    'query' => [
                        'limit' => 100,
                        'page' => $this->request->getQuery('page', 1)
                    ]
                ]);
            if ($response = $this->Api->success($leaderboard)) {
                $response = $response->parse();
                $leaderboard = $response['result']['data'];
                $paging = $response['paging'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }
        $pagination = new Pagination($paging['count'], $paging['perPage'], $paging['page']);
        $this->set(compact('leaderboard', 'pagination','reff_cus_id'));

    }

    public function follow(){

        $this->disableAutoRender();
        if ($this->request->is('post')) {
            $error = ['error' => []];
            try {
                $leaderboards = $this->Api->makeRequest($this->Auth->user('token'))
                        ->post('v1/web/leaderboards/follow', [
                            'form_params' => $this->request->getData()
                        ]);
                    if ($response = $this->Api->success($leaderboards)) {
                        $error = $response->parse();
                    }
            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode($error));
        }

    }

}