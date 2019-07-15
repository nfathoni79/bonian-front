<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use Cake\Core\Configure;
use Pagination\Pagination;
use Cake\Validation\Validator;

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
        $params['limit'] = 5;

        if($this->request->is('post')){
            $search = explode(' - ',$this->request->getData('datefilter'));
            if ($search) {
                $params['start'] = $search[0];
                $params['end'] = $search[1];
            }

            $params['search'] = $this->request->getData('invoice', '');
            $params['page'] = 1;
			$params['limit'] = 50;

            return $this->redirect(['action' => 'index', 'prefix' => 'user', '?' => $params]);
        }


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

    function view($order_id, $id = null){
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

    function history(){


        $params = $this->request->getQueryParams();
        $params['page'] = $this->request->getQuery('page', 1);
        $params['status'] = $this->request->getQuery('status', 'semua');
        $params['limit'] = 5;

        if($this->request->is('Post')){
            $search = explode(' - ',$this->request->getData('datefilter'));
            if ($search) {
                $params['start'] = $search[0];
                $params['end'] = $search[1];
            }

            $params['search'] = $this->request->getData('invoice', '');
            $params['page'] = 1;
			$params['limit'] = 50;

            return $this->redirect(['action' => 'history', 'prefix' => 'user', '?' => $params]);
        }


        $response = [];
        try {
            $orders = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/product-ratings/view-list', [
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

    function validate(){

        $this->disableAutoRender();
        $this->request->allowMethod('post');
        $error = ['error' => []];

        $getData = $this->request->getData();

        if (isset($getData['images'])) {
            foreach($getData['images'] as $key => $val) {
                if (is_string($val)) {
                    $object = json_decode($val, true);
                    if ($object) {
                        $tmp_name = tempnam(sys_get_temp_dir(), "review");
                        $size = file_put_contents($tmp_name, base64_decode($object['data']));
                        $tmp_file = [
                            'name' => $object['name'],
                            'type' => $object['type'],
                            'size' => $size,
                            'error' => 0,
                            'tmp_name' => $tmp_name

                        ];

                        $getData['images'][$key] = $tmp_file;
                    }


                }
            }
        }



        $validator = new Validator();
        $validator->requirePresence('rating')
            ->notBlank('rating','Silahkan berikan rating terhadap produk');
        $validator->requirePresence('comment')
            ->notBlank('comment','Komentar tidak boleh kosong');

        $images = new Validator();
        foreach($getData['images'] as $vals){
            $images
                ->notBlank('images')
                ->add('images', 'file', [
                    'rule' => ['uploadedFile', ['types' => ['image/png', 'image/jpeg', 'image/jpg']]], // It's what I expect to check
                    'message' => "Format yang di ijinkan : .jpg, .png"
                ]);
        }


        $validator->addNestedMany('images', $images);
        $error['error'] = $validator->errors($getData);

        $errors = [];
        if (empty($error['error'])) {

            try {

                $ratings = $this->Api->makeRequest($this->Auth->user('token'))
                    ->post('v1/web/product-ratings/add', [
                        'form_params' => $getData
                    ]);

                if ($response = $this->Api->success($ratings)) {
                    $json = $response->parse();

                    if(!empty($json['error'])){
                        foreach($json['error'] as $val){
                            $errors['error']['data'] = $val['validExtension'];
                            break;
                        }
                    }else{

                        $this->Flash->success(__('Ulasan berhasil disimpan, Terima kasih telah memberikan ulasan.'));
                        $errors['error']['data'] = ['is_error' => false];
                    }

                }

            } catch(\GuzzleHttp\Exception\ClientException $e) {
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                $errors['error']['data'] =  ['is_error' => true, 'message' =>  $error['message']];

            }
        }else{
            foreach($error['error'] as $key => $vals){
                if($key != 'images'){
                    $errors['error']['data']= ['is_error' => true, 'message' => $vals['_empty']];
                }else{
                    foreach($vals as $k => $value){
                        if(!empty($value['images']['_required'])){
                            $errors['error']['data'] = ['is_error' => true, 'message' => 'Gambar ke '.($k+1).' '.$value['images']['_required']];
                        }else{
                            $errors['error']['data'] =  ['is_error' => true, 'message' =>  'Format gambar atau ukuran tidak sesuai'];
                        }
                    }
                }
                break;
            }
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($errors));
    }


}