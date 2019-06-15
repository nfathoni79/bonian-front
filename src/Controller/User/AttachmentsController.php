<?php
namespace App\Controller\User;

use App\Controller\AuthController;


class AttachmentsController extends AuthController
{

    public function image() {
        $this->disableAutoRender();
        $this->request->allowMethod(['delete', 'post', 'get']);

        $image = $this->request->getData('image');
        try {
            $attachment = $this->Api->makeRequest($this->Auth->user('token'))
                ->post('v1/web/attachments/image', [
                    'multipart' => [
                        [
                            'name'     => 'image',
                            'filename' => $image['name'],
                            'contents' => fopen($image['tmp_name'], 'r')
                        ],
                    ]
                ]);
            if ($response = $this->Api->success($attachment)) {
                $response = $response->parse();
                $data = $response['result']['data'];
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->Api->handle($e);
            $data = json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
    }



}