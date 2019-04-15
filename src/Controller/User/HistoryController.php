<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use Pagination\Pagination;

class HistoryController extends AuthController
{

    public function index(){
        $response = [];
        try {
            $orders = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/orders', [
                    'query' => [
                        'limit' => 1,
                        'page' => $this->request->getQuery('page', 1)
                    ]
                ]);
            if ($response = $this->Api->success($orders)) {
                $response = $response->parse();
                $orders = $response['result']['data'];
                $paging = $response['paging'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        $pagination = new Pagination($paging['pageCount'], $paging['perPage'], $paging['page']);
        //debug($paging);exit;


        $transaction_statuses = [
            'pending' => 'Pending',
            'settlement' => 'Success',
            'capture' => 'Success'
        ];

        $this->set(compact('orders', 'transaction_statuses', 'pagination'));
    }
}