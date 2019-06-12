<?php
namespace App\Controller\User;

use App\Controller\AuthController;
use Cake\Core\Configure;
use Pagination\Pagination;

class ChatController extends AuthController
{
    public function listInvoice(){
        try {
            $orders = $this->Api->makeRequest($this->Auth->user('token'))
                ->get('v1/web/orders/list-invoice');
            if ($response = $this->Api->success($orders)) {
                $response = $response->parse();
                $orders = $response['result']['data'];
            }
        } catch(\Exception $e) {

        }
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($orders));
    }

}