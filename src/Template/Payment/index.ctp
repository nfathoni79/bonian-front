
<div class="c-header__bg" style="z-index:0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 text-left">
                <h1 class="o-header-title">Konfirmasi pembayaran</h1>
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
                                Informasi detail
                            </div>
                        </div>

                    </div>
                    <!-- start: card item #1 -->
                    <div class="c-checkout-card__pengiriman">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    switch($this->request->getQuery('type')) {
                                        case 'pulsa':
                                            echo $this->element('Partials/Payment/type/pulsa');
                                        break;
                                    }

                                ?>
                            </div>

                        </div>
                    </div>
                    <!-- end: card item #1 -->

                </div>
                <!-- end: card alamat -->


                <!-- start: metode Pembayaran -->
                <div class="col-lg-12 pd-0">
                    <div class="c-checkout-card-product c-card-pembayaran__metode">

                        <!-- start: title -->
                        <div class="c-card__item-title tx-bold-force">
                            Metode Pembayaran
                        </div>
                        <!-- end: title -->

                        <div class="row mg-0 mg-b-40">
                            <div class="mg-b-20">

                                <div class="col-sm-12 block block_0">
                                    <div class="block-categories module mg-b-20-force">
                                        <h3 class="modtitle tx-mont"><span>Bank Transfer</span></h3>
                                    </div>
                                </div>

                                <!-- start:item-->
                                <div class="col-sm-12 flex-container">

                                    <div>
                                        <div class="col-sm-12 bd br-10 pd-10">
                                            <div class="col-lg-2">
                                                <div class="pretty p-default p-round p-pulse p-bigger">
                                                    <input type="radio" name="payment_method"  value="bca_va">
                                                    <div class="state p-danger">
                                                        <label> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 pd-l-30 pd-t-15">
                                                <div class="row">
                                                    <img src="<?php echo $this->Url->build('/images/logo_bank/bca.png'); ?>" alt="Bank BCA" class="img-responsive mg-l-0">
                                                </div>
                                                <div class="row">
                                                    <h5 class="tx-bank">
                                                        Bank BCA
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="col-sm-12 bd br-10 pd-10">
                                            <div class="col-lg-2">
                                                <div class="pretty p-default p-round p-pulse p-bigger">
                                                    <input type="radio" name="payment_method"  value="permata_va">
                                                    <div class="state p-danger">
                                                        <label> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 pd-l-30 pd-t-15">
                                                <div class="row">
                                                    <img src="<?php echo $this->Url->build('/images/logo_bank/mandiri.png'); ?>" alt="Bank Mandiri" class="img-responsive mg-l-0">
                                                </div>
                                                <div class="row">
                                                    <h5 class="tx-bank">
                                                        Bank Mandiri
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="col-sm-12 bd br-10 pd-10">
                                            <div class="col-lg-2">
                                                <div class="pretty p-default p-round p-pulse p-bigger">
                                                    <input type="radio" name="payment_method"  value="bni_va">
                                                    <div class="state p-danger">
                                                        <label> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 pd-l-30 pd-t-15">
                                                <div class="row">
                                                    <img src="<?php echo $this->Url->build('/images/logo_bank/bni.png'); ?>" alt="Bank BNI" class="img-responsive mg-l-0">
                                                </div>
                                                <div class="row">
                                                    <h5 class="tx-bank">
                                                        Bank BNI
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- end:item-->

                            </div>
                        </div>

                        <div class="row mg-0 mg-b-40">

                            <div class="col-sm-12 block block_0">
                                <div class="block-categories module mg-b-20-force">
                                    <h3 class="modtitle tx-mont"><span>Kartu Kredit</span></h3>
                                </div>
                            </div>

                            <?php foreach($creditcards as $creditcard) : ?>
                                <div class="col-sm-6">
                                    <div class="col-lg-2">
                                        <div class="col-lg-2 pd-t-10 text-center">
                                            <div class="pretty p-default p-round p-pulse p-bigger">
                                                <input type="radio" name="payment_method"  value="credit_card" data-id="<?= $creditcard['id']; ?>">
                                                <div class="state p-danger">
                                                    <label> </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo $this->Url->build('/images/logo_cc/128x80/'. $creditcard['type'] .'.png'); ?>" alt="cc" class="img-responsive">
                                    </div>
                                    <div class="col-lg-6">
                                        <h5 class="tx-bank">
                                            <?= $creditcard['masked_card']; ?>
                                        </h5>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <div class="col-lg-6 mg-t-15">
                                <button type="button" class="btn btn-default btn-block" style="min-height: 45px;" data-toggle="modal" data-target="#modalTambahKartuKredit">
                                    <i class="fas fa-plus-circle"></i> &nbsp;
                                    TAMBAH KARTU
                                </button>
                            </div>


                        </div>

                        <div class="row mg-0 mg-b-40">
                            <div class="mg-b-20">

                                <div class="col-sm-12 block block_0">
                                    <div class="block-categories module mg-b-20-force">
                                        <h3 class="modtitle tx-mont"><span>Go-Pay</span></h3>
                                    </div>
                                </div>

                                <!-- start:item-->
                                <div class="col-sm-12 flex-container">

                                    <div class="wd-100p-force">
                                        <div class="col-sm-12 bd br-10 pd-10">
                                            <div class="col-sm-1" style="line-height: 68px;">
                                                <div class="pretty p-default p-round p-pulse p-bigger">
                                                    <input type="radio" name="payment_method"  value="bca_va">
                                                    <div class="state p-danger">
                                                        <label> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-11 pd-t-15">
                                                <div class="col-sm-3">
                                                    <div class="row">
                                                        <img src="<?php echo $this->Url->build('/images/logo_other_payment/gopay.png'); ?>" alt="Go-Pay" class="img-responsive mg-l-0">
                                                    </div>
                                                    <div class="row">
                                                        <h5 class="tx-bank">
                                                            Go-Pay
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="tx-left lh-base tx-13 tx-medium">
                                                        Menerima pembayaran melalui aplikasi Go-Jek dan
                                                        dikonfirmasi otomatis
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>


                    </div>
                </div>
                <!-- end: metode pembayaran -->

            </div>

            <div class="col-lg-4 sidebar">
                <!-- start: card Pembayaran -->
                <div class="c-cart-card-pembayaran mg-t-10">
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
                                    Rp.<span class="zl-subtotal"><?php echo $this->Number->format($data['total']);?></span>
                                </h5>
                            </div>

                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:1px;"></div>
                            </div>

                            <div class="col-lg-7">
                                <h3 class="tx-15">Bonus Point</h3>
                            </div>
                            <div class="col-lg-5 mg-t-15">
                                <h5 class="tx-black tx-15"> <?php echo (empty($data['bonus_point']))  ? '0' : $data['bonus_point']; ?> Point </h5>
                            </div>


                            <div class="col-lg-12 text-center">
                                <button type="button" id="pay-now" style="margin-top: 10px;" class="btn btn-danger btn-lg btn-block c-pembayaran-button rounded-5">
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

            <?= $this->Form->create(null, ['url' => ['controller' => 'Payment', 'action' => 'addCard', 'prefix' => false], 'id' => 'add-credit-card-form', 'class' => 'ajax-helper']); ?>
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

            <?= $this->Form->create(null, ['url' => ['controller' => 'Payment', 'action' => 'createToken', 'prefix' => false], 'id' => 'token-credit-card-payment', 'class' => 'ajax-helper']); ?>
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
'/js/payment.js',
], ['block' => true]);
?>

<?php $this->end(); ?>
