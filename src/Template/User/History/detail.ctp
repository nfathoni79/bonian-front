<div class="container">
	<div class="mg-t-30-force pd-10">
	    <div class="row">
	        <div class="col-sm-12">
	                <div class="mg-t-10 mg-b-10">
	                	<span class="ft-left tx-20 pd-r-10"><a href="<?= $this->Url->build(['action' => 'index']);?>" ><i class="fas fa-arrow-left"></i> Kembali</a></span>
	                </div>
	         </div>
	    </div>
	</div>
	<div class="row mg-t-30">
		<div class="col-sm-8 col-sm-8 col-sm-12 col-xs-12">
			<div class="card overflow-hidden pd-0">
				<div class="oh-detail zl-bg-red pd-10 tx-white pd-l-20">
					<h4 class="tx-medium tx-18">Rincian Belanja</h4>
				</div>
				<div class="oh-content-detail">
					<?php $shipping_price = 0;?>
					<?php if(!empty($orders['order_digital'])):?>
						<!-- Produk Digital -->
						<?php
							/* PULSA */
							if($orders['order_digital']['digital_detail']['digital_id'] == '1'):
						?>
							<div class="overflow-hidden mg-20">
								<div class="oh-title zl-bg-pink pd-10 zl-tx-black bd">
									<div class="col-sm-12"><h4 class="tx-medium tx-18">Order ID : <?= $orders['invoice'];?>-<?= $orders['order_digital']['id'];?></h4></div>
								</div>
								<div class="col-sm-12 bd bd-t-0 pd-b-20">
									<div class="row mg-0 pd-b-20 oh-content">
										<div class="row mg-0 mg-b-10">
											<div class="mg-10 mg-t-30">
												<div class="col-sm-6">
													<dl class="dl-horizontal">
														<dt>Order ID</dt>
														<dd><?= $orders['invoice']; ?>-<?= $orders['order_digital']['id']; ?></dd>
														<dt>Tipe Produk </dt>
														<dd><?= $orders['order_digital']['digital_detail']['operator']; ?> <?= ucfirst($orders['order_digital']['digital_detail']['type']); ?></dd>
														<dt>Status Transaksi</dt>
														<dd><?= $digital_status[$orders['order_digital']['status']]; ?></dd>
													</dl>
												</div>
												<div class="col-sm-6">
													<dl class="dl-horizontal">
														<dt>Nomor Tujuan</dt>
														<dd><?= $orders['order_digital']['customer_number']; ?></dd>
														<dt>Denom</dt>
														<dd><?= $this->Number->format($orders['order_digital']['digital_detail']['denom']); ?></dd>
														<dt>Serial Number</dt>
														<?php $raw = json_decode($orders['order_digital']['raw_response'],true);?>
														<dd><?= @$raw['serial_number'] ? $raw['serial_number'] : '-'; ?></dd>
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php else :?>
							<div class="overflow-hidden mg-20">
								<div class="oh-title zl-bg-pink pd-10 zl-tx-black bd">
									<div class="col-sm-12">Undefined Product Digitals</div>
								</div>
							</div>
						<?php endif;?>


					<?php else: ?>
						<?php foreach($orders['details'] as $vals):?>
						<?php $shipping_price += $vals['shipping_cost'];?>

						<div class="overflow-hidden mg-20">

							<div class="oh-title zl-bg-pink pd-10 zl-tx-black bd">
								<div class="col-sm-6"><h4 class="tx-medium tx-18">Order ID : <?= $orders['invoice'];?>-<?= $vals['id'];?></h4></div>
								<div class="col-sm-6 tx-right"><h4 class="tx-medium tx-14"> Shipping Origin : <strong><?= $vals['origin_name'];?></strong></h4></div>
							</div>

							<div class="col-sm-12 bd bd-t-0 pd-b-20">

								<?php foreach($vals['products'] as $val):?>
								<div class="row mg-0 pd-b-20 bd-b oh-content">
									<div class="row mg-0 mg-b-10">
										<div class="mg-10 mg-t-30">
											<div class="col-sm-2 pd-0">
												<?php foreach($val['images'] as $image):?>
												<img class="img-responsive" src="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" >
												<?php break;?>
												<?php endforeach;?>
											</div>
											<div class="col-sm-10 mg-0 pd-0 tx-medium zl-tx-black product-detail">
												<div class="row mg-0">
													<div class="col-sm-9 pd-r-0">
														<h4 class="zl-tx-black tx-bold tx-16 mg-t-0"><?= $val['name'];?></h4>
													</div>
													<div class="col-sm-3"><span class="badge mg-t-0 ft-right <?= $this->Badge->format($val['point']);?>"><?= $this->Number->format($val['point']);?> Point</span></div>
												</div>
												<hr class="mg-t-5 mg-l-0 mg-l-10 mg-b-15">
												<div class="row mg-0">
													<div class="col-sm-4 pd-r-0 lh-3">
														<span><?= $val['variant'];?></span>
													</div>
													<div class="col-sm-5 pd-r-0 lh-3">
														<div class="col-sm-6">
															<span class="tx-bold d-lg-block">Rp. <?= $this->Number->format($val['price']);?></span>
															<span><?= $val['weight']; ?> Gr</span>
														</div>
														<div class="col-sm-6 text-center"><span class="tx-bold d-lg-block">Qty : <?= $val['qty'];?> </span> </div>
													</div>
													<div class="col-sm-3 pd-r-0 tx-16 tx-bold tx-right">Rp. <?= $this->Number->format($val['total']);?></div>
												</div>
											</div>
										</div>
									</div>
									<div class="row mg-0">
										<div class="row mg-0 mg-l-10 lh-4">
											<div class="col-sm-2 pd-0">
												<div class="zl-tx-black tx-bold">
													Catatan barang:
												</div>
											</div>
											<div class="col-sm-10 tx-medium">
												<?= $val['comment'];?>
											</div>
										</div>
										<div class="row mg-0"></div>
									</div>
								</div>
								<?php endforeach;?>

								<div class="row mg-0 ft-left wd-100p bd-b">
									<div class="col-sm-12 mg-0 tx-medium zl-tx-black tx-13 pd-10 lh-3 tx-center">
										<div class="col-sm-4 tx-left">
											<span class="col-sm-12 pd-0">Berat Total</span>
											<span class="col-sm-12 pd-0 tx-bold"><?= $this->Number->format($vals['shipping_weight']);?> Gr</span>
										</div>
										<div class="col-sm-4">
											<span class="col-sm-12 pd-0">Estimasi waktu</span>
											<span class="col-sm-12 pd-0 tx-bold">2-3 hari kerja</span>
										</div>
										<div class="col-sm-4 tx-right">
											<span class="col-sm-12 pd-0">Ongkos kirim</span>
											<span class="col-sm-12 pd-0 tx-bold">Rp. <?= $this->Number->format($vals['shipping_cost']);?></span>
										</div>
									</div>
								</div>

								<div class="row mg-0 ft-left wd-100p bd-b pd-t-10 pd-b-10">
									<div class="col-sm-12 mg-0 tx-medium zl-tx-black tx-13 pd-10 tx-left">
										<ul class="col-sm-12 list-unstyled multi-steps">
											<?php foreach($shipping_status as $keys => $value):?>
											<li <?php echo $vals['shipping_status']['code'] ==  $keys ? 'class="is-active"' : '';?>><?php echo $value;?></li>
											<?php endforeach;?>
										</ul>
									</div>
								</div>


								<div class="row mg-0 ft-left wd-100p bd-b">
									<div class="col-sm-12 mg-0 tx-semibold zl-tx-black tx-13 pd-10 zl-bg-pink tx-center">
										<div class="col-sm-4 tx-left bd-r">
											<span class="col-sm-12 pd-0">Pengiriman</span>
											<?php

											$rename = [
												'CTC' => 'reg',
											'CTCYES' => 'yes',
											];
											?>
											<?php
												if(array_key_exists($vals['shipping_service'],$rename )) {
													$label = $rename[$vals['shipping_service']];
												}else{
													$label = $vals['shipping_service'];
												}
											?>
											<span class="col-sm-12 pd-0 tx-16 zl-tx-red--light"><?= $vals['shipping_code']?> <?= strtoupper($label);?></span>
										</div>
										<div class="col-sm-4 bd-r">
											<span class="col-sm-12 pd-0">No. Resi</span>
											<span class="col-sm-12 pd-0 tx-16 zl-tx-red--light"><?= !empty($vals['awb']) ? $vals['awb'] : '-';?></span>
										</div>
										<div class="col-sm-4 tx-right">
											<a class="col-sm-12 mg-t-10 btn btn-danger btn-radius btn-sm"  data-toggle="modal" data-target="#modalTracking" onclick="shipping('<?= $vals['shipping_code']?>', '<?= $vals['awb']?>')">Detil Pengiriman</a>
										</div>
									</div>
								</div>

							</div>

						</div>
						<!-- End content -->
						<?php endforeach;?>
					<?php endif;?>



				</div>
			
			</div>	
		</div>
		<div class="col-sm-4 col-sm-4 col-sm-12 col-xs-12">
			<div class="card overflow-hidden pd-0">
				<div class="oh-detail zl-bg-red pd-10 tx-white pd-l-20">
					<h4 class="tx-medium tx-18">Rincian Pembayaran</h4>
				</div>

				<div class="oh-payment-detail zl-tx-black lh-3">
					<div class="row mg-0 pd-20">
						<div class="col-sm-12 pd-0 bd-b pd-t-10 pd-b-10">
							<div class="w-100p tx-medium tx-12">Invoice No.</div>
							<div class="w-100p tx-semibold tx-16"><?= $orders['invoice'];?></div>
						</div>
						<div class="col-sm-12 pd-0 bd-b pd-t-10 pd-b-10">
							<div class="w-100p tx-medium tx-12">Tanggal Pesanan</div>
							<div class="w-100p tx-semibold tx-16"><?= date('d M Y H:i', strtotime($orders['created'])); ?></div>
						</div>
						<div class="col-sm-12 pd-0 bd-b pd-t-10 pd-b-10">
							<div class="w-100p tx-medium tx-12">Status Invoice</div>
							<div class="w-100p tx-semibold tx-16"> <?= isset($orders['transactions'][0]) && isset($transaction_statuses[$orders['transactions'][0]['transaction_status']]) ? $transaction_statuses[$orders['transactions'][0]['transaction_status']] : 'Pending'; ?></div>
						</div>

						<?php if(empty($orders['order_digital'])):?>
						<div class="col-sm-12 pd-0 bd-b pd-t-10 pd-b-10">
							<div class="w-100p tx-medium tx-12">Voucher</div>
							<div class="w-100p tx-semibold tx-16"><?= isset($orders['voucher']['code_voucher']) ? $orders['voucher']['code_voucher'] : '-'; ?></div>
							<div class="w-100p tx-medium tx-12 zl-tx-red--light">Potongan harga Rp. <?= isset($orders['voucher']['code_voucher']) ? $this->Number->format($orders['discount_voucher']) : '-'; ?></div>
						</div>
						<div class="col-sm-12 bd-b pd-l-0 pd-r-0 pd-t-10 pd-b-10">
							<div class="w-100p tx-medium tx-14">
								<div class="col-sm-6 pd-0">
									Total Belanja
								</div>
								<div class="col-sm-6 tx-right">
									Rp. <?= $this->Number->format($orders['gross_total'] - $shipping_price);?>
								</div>
							</div>

							<div class="w-100p tx-medium tx-14">
								<div class="col-sm-6 pd-0">
									Total ongkos kirim
								</div>
								<div class="col-sm-6 tx-right">
									Rp. <?= isset($shipping_price) ? $this->Number->format($shipping_price) : '-';?>
								</div>
							</div>
						</div>
						<div class="col-sm-12 bd-b pd-l-0 pd-r-0 pd-t-10 pd-b-10">
							<div class="w-100p tx-medium tx-14">
								<div class="col-sm-6 pd-0">
									Subtotal
								</div>
								<div class="col-sm-6 tx-right">
									Rp. <?= isset($orders['gross_total']) ? $this->Number->format($orders['gross_total']) : '-';?>
								</div>
							</div>
						</div>
						<div class="col-sm-12 bd-b pd-l-0 pd-r-0 pd-t-10 pd-b-10">
							<div class="w-100p tx-medium tx-14">
								<div class="col-sm-6 pd-0">
									Potongan Voucher
								</div>
								<div class="col-sm-6 tx-right">
									Rp. <?= isset($orders['discount_voucher']) ? $this->Number->format($orders['discount_voucher']) : '-';?>
								</div>
							</div>
							<div class="w-100p tx-medium tx-14">
								<div class="col-sm-6 pd-0">
									Potongan Kupon
								</div>
								<div class="col-sm-6 tx-right">
									Rp. <?= isset($orders['discount_kupon']) ? $this->Number->format($orders['discount_kupon']) : '-';?>
								</div>
							</div>
							<div class="w-100p tx-medium tx-14">
								<div class="col-sm-6 pd-0">
									Potongan Point
								</div>
								<div class="col-sm-6 tx-right">
									<?= isset($orders['use_point']) ? $this->Number->format($orders['use_point']) : '-';?>
								</div>
							</div>
						</div>
						<?php endif;?>
						<div class="col-sm-12 bd-b pd-l-0 pd-r-0 pd-t-10 pd-b-10">
							<div class="w-100p tx-bold tx-14">
								<div class="col-sm-6 pd-0">
									Total Bayar
								</div>
								<div class="col-sm-6 tx-right">
									Rp. <?= $this->Number->format(($orders['total']));?>
								</div>
							</div>
						</div>
						<?php $alias = ['gopay' => 'Gopay', 'bank_transfer' => 'Bank Transfer', 'credit_card' => 'Kartu Kredit']; ?>
						<div class="col-sm-12 pd-0 bd-b pd-t-10 pd-b-10">
							<div class="w-100p tx-medium tx-12">Metode Bayar</div>
							<div class="w-100p tx-semibold tx-16">
								<?= $alias[$orders['transactions'][0]['payment_type']];?> - <?= strtoupper($orders['transactions'][0]['bank']); ?>
								<?= $orders['transactions'][0]['payment_type'] == 'credit_card' ? '[ '.$orders['transactions'][0]['masked_card'].' ]' : '' ; ?>
							</div>
						</div>
						<?php if(empty($orders['order_digital'])):?>
						<div class="col-sm-12 pd-0 bd-b pd-t-10 pd-b-10">
							<div class="w-100p tx-medium tx-12">Alamat Kirim</div>
							<div class="w-100p tx-semibold tx-16 pd-t-5 pd-b-5"><?= ucfirst($orders['recipient_name']); ?></div>
							<div class="w-100p tx-medium tx-12 lh-5">
								<?= ucfirst($orders['address']); ?>, <?= ucfirst($orders['subdistrict']['name']); ?>, <?= ucfirst($orders['city']['name']); ?> <?= ucfirst($orders['province']['name']); ?><br>
								<?= ucfirst($orders['recipient_phone']); ?>
							</div>
						</div>
						<?php endif;?>
					</div>
				</div>
			</div>				
		</div>
	</div>
</div>



<div class="modal fade" id="modalTracking" tabindex="-1" role="dialog" aria-labelledby="tracking-popupLabel">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #d9534f;color: #ffffff;border-top-left-radius:6px;border-top-right-radius:6px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span></button>
				<h4 class="modal-title" id="login-popupLabel" style="text-align: left;">Detil Pengiriman</h4>
			</div>
			<div class="modal-body"  style="overflow: auto;height: 300px;">
				<div class="alert alert-info">
					Kurir : <span class="courier"></span> <span class="status"></span><br>
					No. Resi : <span class="resi"></span>
				</div>
				<ul class="timeline">
				</ul>
			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col-lg-8">
					</div>
					<div class="col-lg-4">
						<button class="btn btn-danger btn-block btn-radius" data-dismiss="modal">Tutup</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->append('script'); ?>
<script>
    function shipping(courier, awb){
		var basePath = $('meta[name="_basePath"]').attr('content');
		$.ajax({
			url: "<?= $this->Url->build(['action' => 'getShipping', 'prefix' => 'user']);?>",
			type : 'POST',
			data : {
                _csrfToken : $('meta[name="_csrfToken"]').attr('content'),
			    courier : courier.toLowerCase(),
				awb : awb
			},
			dataType : 'json',
			success: function(response){
			    if(response.is_error){
			        return false;
				}
			    $('.courier').html(response.data.result.summary.courier_code.toUpperCase());
			    $('.service').html(response.data.result.summary.service_code.toUpperCase());
			    $('.resi').html(response.data.result.summary.waybill_number.toUpperCase());
			    $('.status').html('['+response.data.result.delivery_status.status.toUpperCase()+']');
				var manifest = '';
				for(var i=(response.data.result.manifest.length - 1);i >= 0; i--){
                    manifest += '\n' +
                        '<li>\n' +
                        '<p class="mg-b-0">'+response.data.result.manifest[i].manifest_description+'</p>\n' +
                        '<small>'+response.data.result.manifest[i].manifest_date+' '+response.data.result.manifest[i].manifest_time+'</small>\n' +
                        '</li>';
				}
				$('.timeline').html(manifest);
			}
		});
    }
</script>
<?php $this->end(); ?>