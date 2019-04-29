
<div class="c-header__bg" style="z-index:0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 text-left">
                <h1 class="o-header-title">keranjang belanja</h1>
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
                    </div>
                    <!-- end: card item #1 -->

                </div>
                <!-- end: card alamat -->
                <?php $i = 1;?>
                <?php $total = 0;?>
                <?php $totalOngkir = 0;?>
                <?php $totalPoint = 0;?>
                <?php foreach($data['carts'] as $vals):?>
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

                                    <div class="col-lg-12 text-left">
                                        <h2 class="tx-bold tx-16 mg-0 zl-tx-black"> <?php echo $val['name']; ?> </h2>
                                    </div>

                                    <div class="col-lg-2 ">
                                        <?php $totalPoint += $val['totalpoint'];?>
                                        <div class="badge <?= $this->Badge->format($val['totalpoint']); ?> mg-t-10 mg-b-10"><span id="zl-point-0"><?php echo $val['totalpoint']; ?></span> poin</div>
                                    </div>

                                    <div class="col-lg-6 d-lg-flex mg-b-10 mg-t-10 mg-l-10">
                                        <div class="row c-kupon-desc tx-11">
                                            <div class=" c-kupon-kiri-desc">
                                                diskon
                                            </div>
                                            <div class="c-kupon-kanan-desc wd-60p tx-center tx-white">
                                                Rp.15.000
                                            </div>
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <i class="fas fa-question-circle c-question mg-l-10 mg-t-5 tx-18"></i>
                                        </div>
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
                                                    <div class="col-lg-12 text-center tx-black">
                                                        <?php echo $val['weight']; ?>g
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="row text-center">
                                                    <div class="col-lg-12 text-center" style="color : #212121">
                                                        Harga
                                                    </div>
                                                    <div class="col-lg-12 text-center tx-black">
                                                        Rp. <?php echo $this->Number->format($val['price']); ?>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-1">
                                                <div class="row text-center">
                                                    <div class="col-lg-12 text-center" style="color : #212121">
                                                        Qty
                                                    </div>
                                                    <div class="col-lg-12 text-center tx-black">
                                                        <?php echo $this->Number->format($val['qty']); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="row text-center">
                                                    <div class="col-lg-12 text-center" style="color : #212121">
                                                        Total
                                                    </div>
                                                    <div class="col-lg-12 text-center tx-black">
                                                        <?php $total += $val['total'];?>
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
                                <h5 class="tx-black">Catatan Barang</h5>

                                <div class="col-lg-12 c-catatan-detail">
                                    <p>
                                        Tidak ada catatan
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>

                    <?php endforeach;?>

                    <div class="c-checkout-card__pengiriman u-mt-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="tx-bold-force">
                                    opsi pengiriman
                                </h5>
                                <div class="form-group">
                                    <select class="form-control shipping-option"  data-id="<?= $i;?>" >
                                        <?php foreach($vals['shipping_options'] as $shipping):?>
                                        <option value="<?= $shipping['code'];?>" data-cost="<?= $shipping['cost'];?>" data-etd="<?= $shipping['etd'];?>"><?= $shipping['name'];?></option>
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
                                <h5 class="tx-black tx-15"> RP.<span class="zl-total"><?php echo $this->Number->format($total);?></span> </h5>
                            </div>

                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:15px;"></div>
                            </div>

                            <div class="col-lg-7">
                                <h3 class="tx-15">Ongkos kirim</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <h5 class="tx-black tx-15"> Rp.<span class="zl-total-ongkir"><?php echo $this->Number->format($totalOngkir);?></span> </h5>
                            </div>

                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:15px;"></div>
                            </div>

                            <div class="col-lg-7">
                                <h3 class="tx-15">Voucher</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <label class="label label-danger"><?php echo $data['code_voucher']; ?></label>
                            </div>

                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:15px;"></div>
                            </div>

                            <div class="col-lg-7">
                                <h3 class="tx-15">Use Point</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <h5 class="tx-black tx-15"> <?php echo (empty($data['point']))  ? '0' : $data['point']; ?> Point </h5>
                            </div>

                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:15px;"></div>
                            </div>

                            <div class="col-lg-7">
                                <h3>Total tagihan</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <h5 class="sub-total tx-black tx-18">
                                    Rp.<span class="zl-subtotal"><?php echo $this->Number->format($total + $totalOngkir);?></span>
                                </h5>
                            </div>

                            <!--<div class="col-lg-4">
                                <h3>Kupon</h3>
                            </div>
                            <div class="col-lg-6">
                                <div class="row c-kupon">
                                    <div class="col-lg-6 u-flex-center c-kupon-kiri">
                                        diskon
                                    </div>
                                    <div class="col-lg-6 u-flex-center c-kupon-kanan">
                                        Rp.15.000
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-center">
                                <i class="fas fa-question-circle c-question"></i>
                            </div>

                            <div class="col-lg-12 text-right" style="opacity: 0.5; padding: 1em;">
                                <span>
                                    *Min. pembelajaan Rp.200.000
                                </span>
                            </div> -->

                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:15px;"></div>
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
                                        <div class="row" style="padding: 20px">
                                            <div class="col-lg-2 text-center">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="bank"  value="bca_va">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <img src="<?php echo $this->Url->build('/images/logo_bank/bca.png'); ?>" alt="Bank BCA" class="img-responsive">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="tx-bank">
                                                            Bank BCA
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p>
                                                            Hanya menerima pembayaran melalui Bank BCA dan
                                                            dikonfirmasi otomatis
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end:item #1-->

                                        <!-- start:item #2-->
                                        <div class="row" style="padding: 20px">
                                            <div class="col-lg-2 text-center">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="bank"  value="permata_va">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <img src="<?php echo $this->Url->build('/images/logo_bank/mandiri.png'); ?>" alt="Bank Mandiri" class="img-responsive">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="tx-bank">
                                                            Bank Mandiri
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p>
                                                            Hanya menerima pembayaran melalui Bank Mandiri dan
                                                            dikonfirmasi otomatis
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end:item #2-->

                                        <!-- start:item #3-->
                                        <div class="row" style="padding: 20px">
                                            <div class="col-lg-2 text-center">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="bank"  value="bni_va">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <img src="<?php echo $this->Url->build('/images/logo_bank/bni.png'); ?>" alt="logo bank" class="img-responsive">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="tx-bank">
                                                            Bank BRI
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p>
                                                            Hanya menerima pembayaran melalui Bank BNI dan
                                                            dikonfirmasi otomatis
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="padding: 20px">
                                            <div class="col-lg-2 text-center">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="bank"  value="permata_va">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <img src="<?php echo $this->Url->build('/images/logo_bank/bri.png'); ?>" alt="logo bank" class="img-responsive">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="tx-bank">
                                                            Bank BRI
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p>
                                                            Hanya menerima pembayaran melalui Bank BRI dan
                                                            dikonfirmasi otomatis
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="padding: 20px">
                                            <div class="col-lg-2 text-center">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="bank"  value="permata_va">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <img src="<?php echo $this->Url->build('/images/logo_bank/permata.png'); ?>" alt="logo bank" class="img-responsive">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="tx-bank">
                                                            Bank BRI
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p>
                                                            Hanya menerima pembayaran melalui Bank Permata dan
                                                            dikonfirmasi otomatis
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end:item #3-->

                                        <!-- start: title -->
                                        <div>
                                            <h5 class="c-card-pembayaran__title tx-black tx-bold-force">
                                                Kartu kredit
                                            </h5>
                                        </div>
                                        <!-- end: title -->

                                        <!-- start:item #1-->
                                        <div class="row" style="padding: 20px">
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
                                        <div class="row" style="padding: 20px">
                                            <div class="col-lg-2 text-center">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionGopay" id="optionGopay" value="gopay">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <img src="<?php echo $this->Url->build('/images/logo_bank/gopay.png'); ?>" alt="logo bank" class="img-responsive">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5 class="tx-bank">
                                                            Saldo Go-Pay
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

                                    </div>
                                    <!-- end: content -->

                                </div>
                            </div>
                            <!-- end: metode pembayaran -->

                            <div class="col-lg-12 text-center">
                                <button type="button" class="btn btn-danger btn-lg btn-block c-pembayaran-button rounded-5">
                                    Bayar sekarang ( 3 item )
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

            <div class="modal-header">
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
                    <hr>
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="c-modal-item__name ">
                                <strong>
                                    <span><?php echo $vals['recipient_name'];?></span>
                                    <span>(<?php echo $vals['title'];?>)</span>
                                </strong>
                            </h5>
                            <p class="c-modal-item__address">
                                <span><?php echo $vals['address'];?></span>,
                                <span><?php echo $vals['postal_code'];?></span>
                            </p>
                            <p class="c-modal-item__phone">
                                <span><?php echo $vals['recipient_phone'];?></span>
                            </p>
                        </div>
                        <div class="col-lg-4 text-center valign-middle-force">
                            <a href="#" class="btn btn-danger btn-block btn-radius o-modal-item__btn u-flex-center selected-address" data-id="<?php echo $vals['id'];?>" data-title="<?php echo $vals['title'];?>" data-recipent="<?php echo $vals['recipient_name'];?>" data-phone="<?php echo $vals['recipient_phone'];?>" data-address="<?php echo $vals['address'];?>" data-postalcode="<?php echo $vals['postal_code'];?>">
                                Pilih alamat ini
                            </a>
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
<div class="modal fade" id="modalTambahKartuKredit" tabindex="-1" role="dialog"
    aria-labelledby="modalTambahKartuKredit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times-circle"></i>
                    </span>
                </button>
                <h4 class="modal-title" id="modalTitle">
                    Tambah Kartu Kredit
                </h4>
            </div>

            <div class="modal-body">

                <form action="">

                    <!-- start: form item #1 -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputNamaKartu">Nama pemilik kartu</label>
                                <input type="text" class="form-control" id="inputNamaKartu"
                                    placeholder="Input nama pemilik kartu kredit">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="inputNomorKartu">Nomor kartu kredit</label>
                                <input type="number" class="form-control" id="inputNomorKartu"
                                    placeholder="Input nomor kartu kredit">
                            </div>
                        </div>

                        <div class="col-lg-6" style="margin-top: 2em;">

                            <img src="assets/img/logo-bank-group.png" alt="logo kartu kredit"
                                class="img-responsive">
                        </div>

                    </div>
                    <!-- end: form item #1 -->

                    <!-- start: form item #2 -->
                    <div class="row">

                        <div class="col-lg-4">
                            <label for="inputMasaKartu">Masa Berlaku</label>
                            <div class="form-group">
                                <div class="row text-center">
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" id="inputMasaKartu"
                                            placeholder="MM">
                                    </div>

                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" id="inputMasaKartu"
                                            placeholder="YY">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="inputCvv">CVV</label>
                                <input type="number" class="form-control" id="inputCvv" placeholder="000">
                            </div>
                        </div>

                    </div>
                    <!-- end: form item #2 -->

                </form>

            </div>


            <div class="modal-footer u-mt-10">
                <div class="row">

                    <div class="col-lg-4">
                        <button type="button" class="btn btn-danger btn-block o-modal-item__btn"
                            style="margin-top: 0px !important;">
                            <i class="fas fa-save"></i> &nbsp;
                            Tambahkan Kartu
                        </button>
                    </div>

                    <div class="col-lg-4">
                        <button type="button" class="btn btn-default btn-block" style="min-height: 40px;">
                            Batal
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- end: modal tambah kartu kredit -->


<?php $this->append('script'); ?>
<?php
$this->Html->css([
'/css/plugin.min.css',
'/css/checkout.css',
], ['block' => true]);
?>
<?php
$this->Html->script([
'/js/checkout.js',
], ['block' => true]);
?>
<?php $this->end(); ?>
