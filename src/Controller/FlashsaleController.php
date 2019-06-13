<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.3.4
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Controller\AppController;

/**
 * Error Handling Controller
 *
 * Controller used by ExceptionRenderer to render error responses.
 */
class FlashsaleController extends AppController
{
    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function index()
    {
        try {
            $time_sale = $this->Api->makeRequest()
                ->get('v1/flash-sale/time');
            if ($response = $this->Api->success($time_sale)) {
                $json = $response->parse();
                $time_sale = $json['result']['timeList'];
            }
        } catch(\Exception $e) {
            //TODO set log
        }

        try {
            $banner = $this->Api->makeRequest()
                ->get('v1/banner/flash-sale');
            if ($response = $this->Api->success($banner)) {
                $json = $response->parse();
                $banner_sale = $json['result']['banner'];
            }
        } catch(\Exception $e) {
            //TODO set log
        }
        $this->set(compact('time_sale','banner_sale'));
    }

    public function getList($id_product_deals = null)
    {
        $this->disableAutoRender();
        if($this->request->is('Ajax')){

            try {
                $listProduct = $this->Api->makeRequest()
                    ->get('v1/flash-sale/by-id/'.$id_product_deals);
                if ($response = $this->Api->success($listProduct)) {
                    $json = $response->parse();
                    $listProduct = $json['result']['flashsale'];
                }
            } catch(\Exception $e) {
                //TODO set log
            }
            return $this->response->withType('application/json')
                ->withStringBody(json_encode($listProduct));
        }
    }
}
