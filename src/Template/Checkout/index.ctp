
<div class="c-header__bg" style="z-index:0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 text-left">
                <div class="col-lg-6 pd-0 text-left">
                    <button onclick="location.href='<?php echo $this->Url->build(['controller' => 'Cart', 'action' => 'index']);?>'" type="button" class="btn btn-danger btn-lg btn-block c-header-button">
                        <i class="fas fa-arrow-left"></i> Kembali ke keranjang belanja
                    </button>
                </div>
            </div>
            <div class="col-lg-3 text-center">
                <button type="button" class="btn btn-danger btn-lg btn-block c-header-button">
                    lanjut berbelanja
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end: header part -->



<!-- start: checkout -->
<div class="c-checkout-main tx-medium">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <!-- start: card alamat -->
                <div class="c-checkout-card">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-card__item-title tx-bold-force">
                                alamat pengiriman
                            </div>
                        </div>

                    </div>
                    <!-- start: card item #1 -->
                    <div class="c-checkout-card__item">
                        <?php if(empty($data['customer_address']['recipient_name'])):?>
                        <div class="row">
                            <div class="col-lg-8">
                                Daftar alamat tidak di temukan
                            </div>
                            <div class="col-lg-4 text-right">
                                <?php echo $this->Html->link('Tambah alamat baru', ['controller' => 'Profile', 'action' => 'address', 'prefix' => 'user'], ['class' => 'btn btn-danger btn-sm btn-block o-card__address-btn']);?>
                            </div>
                        </div>
                        <?php else:?>
                        <input type="hidden" name="address_id" id="addressId" value="<?php echo $data['customer_address']['id'];?>">
                        <div class="row">
                            <div class="col-lg-9">

                                <h1 class="c-card__user-name tx-16 tx-bold zl-tx-black tx-mont mt-0">
                                    <span class="zl-address-name"><?php echo $data['customer_address']['recipient_name'];?></span>
                                    <span class="tx-14 zl-tx-gray tx-medium zl-address-title"> - (<?php echo $data['customer_address']['title'];?>) </span>
                                </h1>
                                <p class="c-card__item-address">
                                    <span class="zl-address-address"><?php echo $data['customer_address']['address'];?></span>,
                                    <span class="zl-address-postalcode"><?php echo $data['customer_address']['postal_code'];?></span>
                                </p>
                                <p class="c-card__item-phone">
                                    <span class="zl-address-phone"><?php echo $data['customer_address']['recipient_phone'];?></span>
                                </p>
                            </div>
                            <div class="col-lg-3 text-right">
                                <a href="#" class="btn btn-danger btn-block o-card__address-btn" data-toggle="modal" data-target="#modalAlamat">
                                    Ganti Alamat
                                </a>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                    <!-- end: card item #1 -->

                </div>
                <!-- end: card alamat -->
                <?php $i = 1;?>
                <?php $total = 0;?>
                <?php $totalOngkir = 0;?>
                <?php $totalPoint = 0;?>
                <?php foreach($data['carts'] as $origin_id => $vals):?>
                <div class="c-checkout-card-product">

                    <div class="row zl-tx-gray ">
                        <div class="col-lg-12">
                            <div class="col-lg-6 tx-16 tx-bold zl-tx-black tx-mont text-left p-0">
                                <p>Produk belanja <?php echo $i;?></p>
                            </div>
                            <div class="col-lg-6 text-right">
                                <span><i class="fas fa-warehouse pd-r-10 tx-16"></i> Shipping origin : <span class="tx-bold"><?php echo $vals['origin'];?></span></span>
                            </div>
                        </div>
                    </div>

                    <?php foreach($vals['data'] as $val):?>

                    <?php $totalPoint += $val['totalpoint'];?>
                    <div class="c-checkout-card__item">

                        <div class="row">

                            <div class="col-lg-2">
                                <?php foreach($val['images'] as $image):?>
                                <img class="img-responsive img-0 mx-ht-lg-55p" src="<?= $this->Url->build($_basePath . 'images/132x132/' . $image); ?>" data-zoom-image="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" data-image-name="<?= $image;?>" title="<?php echo $val['name']; ?>" alt="<?php echo $val['name']; ?>">
                                <?php break;?>
                                <?php endforeach;?>
                            </div>

                            <div class="col-lg-10 c-card-item__description">
                                <div class="row">

                                    <div class="col-lg-12 mg-b-15 text-left">
                                        <h2 class="tx-bold tx-16 mg-0 zl-tx-black">
                                            <a class="cart_product_name" href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'detail',$val['slug'] ]);?>">
                                                <?php echo h($val['name']);?>
                                            </a>
                                        </h2>
                                    </div>

                                    <!-- start : deskripsi produk -->
                                    <div class="col-lg-12 tx-12" >
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="row text-left" >
                                                    <div class="col-lg-12">
                                                        SKU : <?php echo $val['sku']; ?>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        Harga tambahan : Rp.<?php echo $this->Number->format($val['add_price']); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-1">
                                                <div class="row text-center">
                                                    <div class="col-lg-12 text-center" style="color : #212121">
                                                        Berat
                                                    </div>
                                                    <div class="col-lg-12 text-center zl-tx-red--light">
                                                        <?php echo $val['weight']; ?>g
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="row text-center">
                                                    <div class="col-lg-12 text-center" style="color : #212121">
                                                        Harga
                                                    </div>
                                                    <div class="col-lg-12 text-center zl-tx-red--light">
                                                        Rp. <?php echo $this->Number->format($val['price']); ?>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-1">
                                                <div class="row text-center">
                                                    <div class="col-lg-12 text-center" style="color : #212121">
                                                        Qty
                                                    </div>
                                                    <div class="col-lg-12 text-center zl-tx-red--light">
                                                        <?php echo $this->Number->format($val['qty']); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="row text-center">
                                                    <div class="col-lg-12 text-center" style="color : #212121">
                                                        Total
                                                    </div>
                                                    <div class="col-lg-12 text-center zl-tx-red--light">

                                                        Rp. <?php echo $this->Number->format($val['total']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end : deskripsi produk -->

                                </div>
                            </div>

                            <div class="col-lg-12 c-card-item__catatan mg-l-115 wd-85p">
                                <h5 class="zl-tx-red--light">Catatan Barang</h5>
                                <p>
                                    <?php if(!empty($val['comment'])):?>
                                    <?php echo $val['comment'];?>
                                    <?php else:?>
                                    Tidak ada catatan
                                    <?php endif;?>
                                </p>
                            </div>


                        </div>
                    </div>

                    <?php endforeach;?>

                    <div class="c-checkout-card__pengiriman u-mt-10">
                        <div class="row">
                            <?php if(empty($data['customer_address']['recipient_name'])):?>
                            <div class="col-lg-6">
                                <h5 class="tx-bold-force">
                                    Alamat pengiriman tidak ditemukan
                                </h5>
                            </div>
                            <?php else:?>
                            <div class="col-lg-6">
                                <h5 class="tx-bold-force">
                                    opsi pengiriman
                                </h5>
                                <div class="form-group">
                                    <select class="form-control shipping-option"  data-id="<?= $i;?>" data-origin-id="<?= $origin_id; ?>" >
                                        <?php foreach($vals['shipping_options'] as $shipping):?>
                                        <option value="<?= $shipping['code'];?>" data-cost="<?= $shipping['cost'];?>" data-etd="<?= $shipping['etd'];?>" data-service="<?= $shipping['service'];?>"><?= $shipping['name'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <h5 class="u-mt-10 tx-semibold-force tx-gray-force">
                                    <?php foreach($vals['shipping_options'] as $shipping):?>
                                    <span class="shipping-etd-<?= $i;?>"> Estimasi waktu <?php echo $shipping['etd'];?> hari kerja</span>
                                    <?php break;?>
                                    <?php endforeach;?>
                                </h5>
                            </div>

                            <div class="col-lg-6 c-ongkos">
                                <div class="row">
                                    <div class="col-lg-6 text-left tx-bold-force">
                                        Berat Total
                                    </div>
                                    <div class="col-lg-6 text-right tx-bold-force">
                                        <?php echo $this->Number->format(($vals['total_weight'] / 1000));?> Kg
                                    </div>
                                    <div class="col-lg-12 o-ongkos-divider">
                                    </div>
                                    <div class="col-lg-6 text-lef tx-bold-force">
                                        Ongkos kirim
                                    </div>
                                    <div class="col-lg-6 text-right tx-bold-force">
                                        <?php foreach($vals['shipping_options'] as $shipping):?>
                                        <?php $totalOngkir += $shipping['cost'];?>
                                        Rp.<span class="shipping-cost shipping-cost-<?= $i;?>"><?php echo $this->Number->format($shipping['cost']);?></span>
                                        <?php break;?>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <?php $i++;?>
                <?php endforeach;?>

            </div>

            <div class="col-lg-4">
                <!-- start: card Pembayaran -->
                <div class="c-cart-card-pembayaran mg-t-mq10">
                    <!-- start: title -->
                    <div class="c-cart-card-pembayaran__title text-center mg-t-m35">
                        <h5 class="title-pembayaran">Detail pembayaran</h5>
                    </div>
                    <!-- end: title -->

                    <!-- start: card pembayaran content -->
                    <div class="c-cart-card-pembayaran__content">
                        <div class="row">
                            <div class="col-lg-7">
                                <h3 class="tx-15">Total harga</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <h5 class="tx-black tx-15"> RP.<span class="zl-total" data-net-total="<?= $data['total']; ?>"><?php echo $this->Number->format($data['gross_total']);?></span> </h5>
                            </div>

                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:1px;"></div>
                            </div>

                            <div class="col-lg-7">
                                <h3 class="tx-15">Ongkos kirim</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <h5 class="tx-black tx-15"> Rp.<span class="zl-total-ongkir"><?php echo $this->Number->format($totalOngkir);?></span> </h5>
                            </div>

                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:1px;"></div>
                            </div>
                            <?php if (isset($data['code_voucher'])) : ?>
                            <div class="col-lg-7">
                                <h3 class="tx-15">Voucher</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <label class="label label-danger"><?php echo $data['code_voucher']; ?></label>
                            </div>
                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:1px;"></div>
                            </div>
                            <div class="col-lg-7">
                                <h3 class="tx-15">Potongan Voucher</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <h5 class="tx-black tx-15"> Rp.<span class="zl-total-voucher"><?php echo $this->Number->format($data['potongan_voucher']);?></span> </h5>
                            </div>

                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:1px;"></div>
                            </div>
                            <?php endif; ?>
                            <?php if (isset($data['potongan_kupon'])) : ?>
                            <div class="col-lg-7">
                                <h3 class="tx-15">Potongan Kupon</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <h5 class="tx-black tx-15"> Rp.<span class="zl-total-kupon"><?php echo $this->Number->format($data['potongan_kupon']);?></span> </h5>
                            </div>
                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:1px;"></div>
                            </div>
                            <?php endif; ?>

                            <div class="col-lg-7">
                                <h3 class="tx-15">Use Point</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <h5 class="tx-black tx-15"> <?php echo (empty($data['point']))  ? '0' : $data['point']; ?> Point </h5>
                            </div>

                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:1px;"></div>
                            </div>

                            <div class="col-lg-7">
                                <h3>Total tagihan</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <h5 class="sub-total tx-black tx-18">
                                    Rp.<span class="zl-subtotal"><?php echo $this->Number->format($data['total'] + $totalOngkir);?></span>
                                </h5>
                            </div>

                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:1px;"></div>
                            </div>

                            <div class="col-lg-7">
                                <h3 class="tx-15">Bonus Point</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <h5 class="tx-black tx-15"> <?php echo (empty($totalPoint))  ? '0' : $totalPoint; ?> Point </h5>
                            </div>

                            <!-- start: metode Pembayaran -->
                            <div class="col-lg-12">
                                <div class="c-card-pembayaran__metode">

                                    <!-- start: title -->
                                    <div class="c-cart-card-pembayaran__title text-center">
                                        <h5 class="title-pembayaran mg-t-0">Metode pembayaran</h5>
                                    </div>
                                    <!-- end: title -->

                                    <!-- start:content -->
                                    <div class="row c-card-pembayaran__content" style="padding: 10px;">

                                        <!-- start: title -->
                                        <div>
                                            <h5 class="c-card-pembayaran__title tx-bold-force tx-black">
                                                Bank Transfer
                                            </h5>
                                        </div>
                                        <!-- end: title -->

                                        <!-- start:item #1-->
                                        <div class="row pd-t-5 pd-l-20 pd-r-20 pd-b-5" >
                                            <div class="col-lg-2 pd-t-10 text-center">
                                                <div class="pretty p-default p-round p-pulse p-bigger">
                                                    <input type="radio" name="payment_method"  value="bca_va">
                                                    <div class="state p-danger">
                                                        <label> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 text-center">
                                                <div class="row pd-t-10">
                                                    <div class="col-lg-4">
                                                        <img src="<?php echo $this->Url->build('/images/logo_bank/bca.png'); ?>" alt="Bank BCA" class="img-responsive">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="tx-bank">
                                                            Bank BCA
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="p-0 m-0">

                                        <div class="row pd-t-5 pd-l-20 pd-r-20 pd-b-5">
                                            <div class="col-lg-2 pd-t-10 text-center">
                                                <div class="pretty p-default p-round p-pulse p-bigger">
                                                    <input type="radio" name="payment_method"  value="permata_va">
                                                    <div class="state p-danger">
                                                        <label> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 text-center">
                                                <div class="row pd-t-10">
                                                    <div class="col-lg-4">
                                                        <img src="<?php echo $this->Url->build('/images/logo_bank/mandiri.png'); ?>" alt="Bank Mandiri" class="img-responsive">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="tx-bank">
                                                            Bank Mandiri
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="p-0 mg-0">

                                        <div class="row pd-t-5 pd-l-20 pd-r-20 pd-b-5">
                                            <div class="col-lg-2 pd-t-10 text-center">
                                                <div class="pretty p-default p-round p-pulse p-bigger">
                                                    <input type="radio" name="payment_method"  value="bni_va">
                                                    <div class="state p-danger">
                                                        <label> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 text-center">
                                                <div class="row pd-t-10">
                                                    <div class="col-lg-4">
                                                        <img src="<?php echo $this->Url->build('/images/logo_bank/bni.png'); ?>" alt="Bank BNI" class="img-responsive">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="tx-bank">
                                                            Bank BNI
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="p-0 mg-0">

                                        <div>
                                            <h5 class="c-card-pembayaran__title credit-card-input-wrapper tx-black tx-bold-force">
                                                Kartu kredit
                                            </h5>
                                        </div>
                                        <!-- end: title -->

                                        <?php foreach($creditcards as $creditcard) : ?>
                                        <!-- start:item-->
                                        <div class="row" style="padding: 5px 20px">
                                            <div class="col-lg-2 pd-t-10 text-center">
                                                <div class="pretty p-default p-round p-pulse p-bigger">
                                                    <input type="radio" name="payment_method"  value="credit_card" data-id="<?= $creditcard['id']; ?>">
                                                    <div class="state p-danger">
                                                        <label> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 pd-t-10">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <img src="<?php echo $this->Url->build('/images/logo_cc/128x80/'. $creditcard['type'] .'.png'); ?>" alt="cc" class="img-responsive">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="tx-bank">
                                                            <?= $this->Tools->formatCC($creditcard['masked_card']); ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="p-0 mg-0">
                                        <?php endforeach; ?>

                                        <!-- start:item #1-->
                                        <div class="row" style="padding: 5px 20px">
                                            <div class="col-lg-12">
                                                <button type="button" class="btn btn-default btn-block" style="min-height: 45px;" data-toggle="modal" data-target="#modalTambahKartuKredit">
                                                    <i class="fas fa-plus-circle"></i> &nbsp;
                                                    TAMBAH KARTU
                                                </button>
                                            </div>
                                        </div>
                                        <!-- end:item #1-->

                                        <!-- start: title -->
                                        <div>
                                            <h5 class="c-card-pembayaran__title tx-black tx-bold-force">
                                                Go-Pay
                                            </h5>
                                        </div>
                                        <!-- end: title -->

                                        <!-- start:item #1-->
                                        <div class="row" style="padding: 5px 20px">
                                            <div class="col-lg-2 pd-t-10 text-center">
                                                <div class="pretty p-default p-round p-pulse p-bigger">
                                                    <input type="radio" name="payment_method"  value="gopay">
                                                    <div class="state p-danger">
                                                        <label> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 pd-t-10">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <img src="<?php echo $this->Url->build('/images/logo_other_payment/gopay.png'); ?>" alt="Go Pay" class="img-responsive">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="tx-bank">
                                                            Go-Pay
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p>
                                                            Menerima pembayaran melalui aplikasi Go-Jek dan
                                                            dikonfirmasi otomatis
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end:item #1-->


                                        <?php if ($balance > 0) : ?>
                                        <!-- start: title -->
                                        <div>
                                            <h5 class="c-card-pembayaran__title tx-black tx-bold-force">
                                                Saldo
                                            </h5>
                                        </div>
                                        <!-- end: title -->

                                        <!-- start:item #1-->
                                        <div class="row" style="padding: 5px 20px">
                                            <div class="col-lg-2 pd-t-10 text-center">
                                                <div class="pretty p-default p-round p-pulse p-bigger">
                                                    <input type="radio" name="payment_method"  value="wallet">
                                                    <div class="state p-danger">
                                                        <label> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 pd-t-10">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5 class="tx-bank" style="text-align:left !important;">Rp. <?= $this->Number->format($balance); ?></h5>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <p>
                                                            Pembayaran instant menggunakan saldo balance anda.

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end:item #1-->
                                        <?php endif; ?>

                                    </div>
                                    <!-- end: content -->

                                </div>
                            </div>
                            <!-- end: metode pembayaran -->

                            <div class="col-lg-12 text-center">
                                <button type="button" id="pay-now" style="margin-top: 10px;" class="btn btn-danger btn-lg btn-block c-pembayaran-button rounded-5" <?php echo (empty($data['customer_address']['recipient_name'])) ? 'disabled' : '';?>>
                                Bayar sekarang
                                </button>
                            </div>

                        </div>
                    </div>
                    <!-- end: card pembayaran content -->

                </div>
                <!-- end: card Pembayaran -->

            </div>

        </div>
    </div>
</div>
<!-- end: checkout -->



<!-- start: modal alamat -->
<div class="modal fade" id="modalAlamat" tabindex="-1" role="dialog" aria-labelledby="modalAlamat">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d9534f;color: #ffffff;border-top-left-radius:6px;border-top-right-radius:6px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times-circle"></i>
                    </span>
                </button>
                <h4 class="modal-title" id="modalTitle">
                    Daftar alamat
                </h4>
            </div>

            <div class="modal-body">

                <!-- start: modal item #1 -->
                <div class="c-modal-item">
                    <?php foreach($address as $vals):?>
                    <div class="panel panel-danger">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-8">
                                    <h5 class="c-modal-item__name ">
                                        <strong>
                                            <span><?php echo $vals['recipient_name'];?></span>
                                            <span>(<?php echo $vals['title'];?>)</span>
                                            <span><?php echo $vals['recipient_phone'];?></span>
                                        </strong>
                                    </h5>
                                    <p class="c-modal-item__address">
                                        <span><?php echo $vals['address'];?></span>,
                                        <span><?php echo $vals['postal_code'];?></span>
                                    </p>
                                </div>
                                <div class="col-lg-4 text-center mg-t-20">
                                    <a href="#" class="btn btn-danger btn-block btn-radius o-modal-item__btn u-flex-center selected-address" data-id="<?php echo $vals['id'];?>" data-title="<?php echo $vals['title'];?>" data-recipent="<?php echo $vals['recipient_name'];?>" data-phone="<?php echo $vals['recipient_phone'];?>" data-address="<?php echo $vals['address'];?>" data-postalcode="<?php echo $vals['postal_code'];?>">
                                        Pilih alamat ini
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <!-- end: modal item #1 -->

            </div>


            <div class="modal-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="c-info text-left">
                            <h5>
                                <i class="fas fa-info-circle"></i> &nbsp;
                                Pilih salah satu alamat diatas sebagai alamat tujuan pengiriman
                            </h5>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- end: modal alamat -->


<!-- start:modal tambah kartu kredit -->
<div class="modal fade" id="modalTambahKartuKredit" tabindex="-1" role="dialog" aria-labelledby="login-popupLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d9534f;color: #ffffff;border-top-left-radius:6px;border-top-right-radius:6px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times-circle"></i>
                    </span>
                </button>
                <h4 class="modal-title" id="modalTitle">
                    Tambah Kartu Kredit
                </h4>
            </div>

            <?= $this->Form->create(null, ['url' => ['controller' => 'Checkout', 'action' => 'addCard', 'prefix' => false], 'id' => 'add-credit-card-form', 'class' => 'ajax-helper']); ?>
            <div class="modal-body mg-b-20">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="inputNamaKartu">Nama pemilik kartu</label>
                            <input type="text" class="form-control" id="input-card-hold-name" placeholder="Input nama pemilik kartu kredit">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="inputNomorKartu">Nomor kartu kredit</label>
                            <input type="text" name="number" class="form-control" id="input-card-number" autocomplete="false"  placeholder="Input nomor kartu kredit">
                        </div>
                    </div>

                    <div class="col-lg-6 credit-card-logo-wrapper" style="margin-top: 30px;">
                        <img style="width:50px;" src="<?= $this->Url->build('/images/logo_cc/128x80/visa.png'); ?>" alt="logo kartu kredit visa" class="credit-card visa disabled">
                        <img style="width:50px;" src="<?= $this->Url->build('/images/logo_cc/128x80/mastercard.png'); ?>" alt="logo kartu kredit mastercard" class="credit-card mastercard disabled">
                        <img style="width:50px;" src="<?= $this->Url->build('/images/logo_cc/128x80/jcb.png'); ?>" alt="logo kartu kredit jcb"   class="credit-card jcb disabled">
                        <img style="width:50px;" src="<?= $this->Url->build('/images/logo_cc/128x80/amex.png'); ?>" alt="logo kartu kredit amex" class="credit-card amex disabled">
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Masa Berlaku</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="exp_month" class="form-control" id="input-card-expired-month" placeholder="MM">
                                </div>

                                <div class="col-lg-6">
                                    <input type="text" name="exp_year" class="form-control" id="input-card-expired-year" placeholder="YYYY">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="inputCvv">CVV</label>
                            <input type="text" name="cvv" class="form-control" id="input-card-cvv" placeholder="000">
                        </div>
                    </div>
                </div>


            </div>


            <div class="modal-footer" style="border-top:1px solid #e5e5e5 !important;padding: 15px !important;;">
                <div class="row">
                    <div class="col-lg-8">
                        <button class="btn btn-danger btn-lg btn-block btn-radius" type="submit" ><i class="fas fa-save"></i> Tambahkan Kartu</button>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="btn btn-default btn-lg btn-block btn-radius " data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>

            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>
<!-- end: modal tambah kartu kredit -->


<div class="modal fade modal-confirm-cc-payment" id="modalTambahKartuKredit" tabindex="-1" role="dialog"
     aria-labelledby="modalTambahKartuKredit">
    <div class="modal-dialog" role="document" style="width: 485px;">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times-circle"></i>
                    </span>
                </button>
                <h4 class="modal-title" id="modalTitle">
                    Konfirmasi Kartu kredit
                </h4>
            </div>

            <?= $this->Form->create(null, ['url' => ['controller' => 'Checkout', 'action' => 'createToken', 'prefix' => false], 'id' => 'token-credit-card-payment', 'class' => 'ajax-helper']); ?>
            <div class="modal-body">
                <!-- start: form item #1 -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nomor kartu kredit</label>
                            <input type="text" name="number" class="form-control" id="input-card-number-confirm" autocomplete="false"
                                   placeholder="Input nomor kartu kredit" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2 credit-card-logo-wrapper" style="margin-top: 30px; text-align: left;">
                    </div>
                </div>
                <!-- end: form item #1 -->

                <!-- start: form item #2 -->
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="inputCvv">CVV</label>
                            <input type="text" name="cvv" class="form-control" id="input-card-cvv-confirm" placeholder="000">
                        </div>
                    </div>

                </div>
                <!-- end: form item #2 -->
            </div>
            <div class="modal-footer u-mt-10">
                <div class="row">

                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-danger btn-block o-modal-item__btn"
                                style="margin-top: 0px !important;">
                            <i class="fas fa-save"></i> &nbsp;
                            Proses Pembayaran
                        </button>
                    </div>
                </div>
            </div>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>

<div class="modal fade modal-box-template" id="modalTambahKartuKredit" tabindex="-1" role="dialog"
     aria-labelledby="modalTambahKartuKredit">
    <div class="modal-dialog" role="document" style="width: 900px;">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times-circle"></i>
                    </span>
                </button>
                <h4 class="modal-title" id="modalTitle">

                </h4>
            </div>


            <div class="modal-body"></div>
            <div class="modal-footer u-mt-10">

            </div>
        </div>
    </div>
</div>


<?php $this->append('script'); ?>
<?php
$this->Html->css([
'/css/plugin.min.css',
'/css/custom/checkout.css',
'/css/jquery.fancybox.min.css',
], ['block' => true]);
?>
<?php
$this->Html->script([
'/js/jquery.fancybox.min.js',
'/js/checkout.js',
], ['block' => true]);
?>

<?php $this->end(); ?>
