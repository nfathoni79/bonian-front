<?php
namespace App\Controller;


use Cake\Log\Log;


/**
 * Sepulsa callback url controller
 * This controller will render views from Template/Ipn/
 * 
 */
class SepulsaController extends AppController
{

    public function initialize()
    {

    }


    /**
     * sepulsa callback URL
     */
	public function index()
    {
		$this->disableAutoRender();
        Log::info(json_encode($this->request->getData()), ['scope' => ['sepulsa']]);
	}
	

}
