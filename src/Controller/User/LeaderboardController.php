<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use App\Form\RefferalForm;
use Pagination\Pagination;

class LeaderboardController extends AuthController{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['follow']);
    }

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

        $params = $this->request->getQuery('search', '');

        if($this->request->is('Post')){
            $params['search'] = $this->request->getData('search', '');
            return $this->redirect(['action' => 'index', 'prefix' => 'user', '?' => $params]);
        }

        $response = [];
        try {
            $leaderboard = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/leaderboards', [
                    'query' => [
                        'limit' => 5,
                        'page' => $this->request->getQuery('page', 1),
                        'search' => $params
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

        if ($paging && $paging['count'] > 0) {
            $pagination = new Pagination($paging['count'], $paging['perPage'], $paging['page']);
        }

        $this->set(compact('leaderboard', 'pagination','reff_cus_id'));

    }

    public function follow(){

        $this->disableAutoRender();
        $errors = [];
        if($this->Auth->user('token')){
            try {
                $leaderboards = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/leaderboards/follow', [
                        'form_params' => $this->request->getData()
                    ]);
                if ($response = $this->Api->success($leaderboards)) {
                    $error = $response->parse();
                    if(isset($error['error'])){
                        if(is_array($error['error'])){
                            foreach($error['error'] as $vals){
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
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                $errors = ['is_error' => true, 'message' => $error['message']];
            }

        }else{
            $errors = ['is_error' => true, 'message' => 'Maaf, Silahkan login terlebih dahulu.'];
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($errors));

    }

}