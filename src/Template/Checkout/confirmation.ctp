<style type="text/css">
	.payment-container{
		width: 780px;
		margin: 0 auto;
	}
	.payment-img{
		margin-top: -3px;
	}
	.line{
		border-top: none;
		border-left: none;
		border-right: none;
		border-bottom: 2px dashed #dedede;
	}
	.payment-container .accordion-inner{
		background: #fff6f6 !important;
	}
	.payment-container ul.yt-accordion li.accordion-group h3.accordion-heading:hover{
		background: #dc5054;
	}
	.payment-container ul.yt-accordion li.accordion-group h3.accordion-heading:hover .fa{
		background: #c93535;
	}
	ol.payment-list li{
		list-style: decimal;
	}
</style>

<div class="payment-container card mg-t-30-force pd-10">
    <div class="row">
        <div class="col-sm-12">
                <div class="mg-t-10 mg-b-10">
                	<span class="ft-left tx-20 pd-l-10"><a href="<?= $this->Url->build(['controller' => 'History', 'action' => 'detail', 'prefix' => 'user', $data['order']['invoice']]); ?>" class="zl-btn-hover-red"><i class="fas fa-arrow-left"></i></a></span>
                    <h2 class="text-center mg-0 tx-mont tx-bold">Pembayaran</h2>
                </div>
         </div>
    </div>
</div>


<div class="payment-container card mg-t-30-force">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12">
                	<div class="row pd-10">
	                    <div class="payment-title pd-t-20 pd-b-10">
	                    	<!-- <img class="pd-r-10 payment-img" src="/zolaku-front/images/logo_bank/bca.png" alt="logo bca" width="100"> -->
	                    	<h2 class="d-lg-inline-block tx-medium tx-18 mg-0">Bank <?= $data['bank']; ?> (Dicek Otomatis)</h2>
	                    </div>
                	</div>
                    <hr class="line">
                    <div class="row pd-10">
	                    <div class="col-lg-8 col-md-8 col-sm-6  pd-0">
		                    <div class="tx-medium">
		                    	No. Virtual Account:
		                    </div>
	                    	<div class="tx-24 tx-bold zl-tx-red">
		                    	<?= $data['va_number']; ?>
	                    	</div>
	                    </div>
                    	<div class="col-lg-4 col-md-4 col-sm-6  mg-t-8">
                    		<a href="#" class="btn zl-btn-default wd-100p zl-btn-hover-red ">Salin</a>
                    	</div>
	                </div>
                    <hr class="line">
                    <div class="payment-note">
                    	<span class="zl-tx-red tx-medium tx-12">Pembayaran akan di cek otomatis dalam 10 menit setelah pembayaran diterima. </span>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>

<?= $this->element('Partials/Checkout/' . $data['bank']); ?>
