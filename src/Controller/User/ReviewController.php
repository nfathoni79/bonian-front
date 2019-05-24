<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use Cake\Core\Configure;
use Pagination\Pagination;

class ReviewController extends AuthController
{

    protected $transaction_statuses = [
        'pending' => 'Pending',
        'settlement' => 'Success',
        'capture' => 'Success',
        'expire' => 'Expire'
    ];

    public function index(){


        $params = $this->request->getQueryParams();
        $params['page'] = $this->request->getQuery('page', 1);
        $params['status'] = $this->request->getQuery('status', 'semua');

        if($this->request->is('Post')){
            $search = explode(' - ',$this->request->getData('datefilter'));
            $params['start'] = $search[0];
            $params['end'] = $search[1];
            $params['search'] = $this->request->getData('invoice', '');
            $params['page'] = 1;

            return $this->redirect(['action' => 'index', 'prefix' => 'user', '?' => $params]);
        }

        $params['limit'] = 4;

        $response = [];
        try {
            $orders = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/product-ratings', [
                    'query' => $params
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

        if ($paging && $paging['count'] > 0) {
            $pagination = new Pagination($paging['count'], $paging['perPage'], $paging['page']);
        }

        $payment_status = [
            '1' => 'Pending',
            '2' => 'Success',
            '3' => 'Failed',
            '4' => 'Expired',
            '5' => 'Refund',
            '6' => 'Cancel'
        ];

        $digital_status = [
            '0' => 'Pending',
            '1' => 'Success',
            '2' => 'Failed',
        ];

        $shipping_status = [
            '1' => 'Menunggu Pembayaran',
            '2' => 'Diproses',
            '3' => 'Dikirim',
            '4' => 'Selesai',
        ];

        $transaction_statuses = $this->transaction_statuses;

        $this->set(compact(
            'orders',
            'transaction_statuses',
            'pagination',
            'payment_status',
            'shipping_status',
            'digital_status'
        ));
    }

    function add($order_id, $id = null){
        try {
            $rating = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/product-ratings/view', [
                    'form_params' => [
                        'order_id' => $order_id,
                        'id' => $id,
                    ]
                ]);
            if ($response = $this->Api->success($rating)) {
                $response = $response->parse();
                $rating = $response['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $rating = json_decode($e->getResponse()->getBody()->getContents(), true);
        }
        $this->set(compact('rating'));
    }

    function view(){

    }

    function history(){

    }

}