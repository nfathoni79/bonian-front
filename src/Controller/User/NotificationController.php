<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use Pagination\Pagination;

class NotificationController extends AuthController{

    public function index($type = 1)
    {
        $data = [];
        try {
            $notification = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/notifications' . (is_numeric($type) ? '/index/' . $type : ''), [
                    'query' => [
                        'limit' => 10,
                        'page' => $this->request->getQuery('page', 1)
                    ]
                ]);
            if ($response = $this->Api->success($notification)) {
                $json = $response->parse();
                $notifications = $json['result']['data'];
                $notification_categories = $json['result']['categories'];
                $notification_title = $json['result']['title'];
                $paging = $json['paging'];

            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->response = $this->response->withStatus($e->getResponse()->getStatusCode());
        }

        if ($paging && $paging['count'] > 0) {
            $pagination = new Pagination($paging['count'], $paging['perPage'], $paging['page']);
        }

        //debug($notifications);exit;
        $this->set(compact('notifications', 'pagination', 'notification_categories', 'notification_title'));
    }

    public function mark()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        $data = [];
        try {
            $notification = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/notifications/mark-all', [
                    //'form_params' => $this->request->getData()
                ]);
            if ($response = $this->Api->success($notification)) {
                $json = $response->parse();
                $data = $json;

            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->response = $this->response->withStatus($e->getResponse()->getStatusCode());
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
    }

    public function getData()
    {
        $this->disableAutoRender();
        $this->request->allowMethod('post');
        $data = [];
        try {
            $notification = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/notifications/head');
            if ($response = $this->Api->success($notification)) {
                $json = $response->parse();
                $data = $json;

            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->response = $this->response->withStatus($e->getResponse()->getStatusCode());
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
    }


    public function update()
    {

    }

}
