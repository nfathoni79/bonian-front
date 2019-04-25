
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


<!-- start: cart -->
<div class="c-cart-main">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <!-- start: card kanan -->
                <div class="c-cart-card">

                    <!-- start: card item #1 -->
                    <div class="c-cart-card__item">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="pretty p-svg p-curve p-smooth p-bigger">
                                    <input type="checkbox" id="check-all" />
                                    <div class="state p-success">
                                        <!-- svg path -->
                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z"
                                                    style="stroke: white;fill:white;"></path>
                                        </svg>
                                        <label class="o-card__item-checkbox" style="padding-left:10px;">
                                            Pilih semua produk
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4 text-right">
                                <a href="#" class="o-card__item-hapus"> hapus </a>
                            </div>
                        </div>
                    </div>
                    <!-- end: card item #1 -->

                    <!-- start: card item #2 -->
                    <?php foreach($carts['carts'] as $cart):?>
                    <div class="c-cart-card__item u-mt-10">
                        <div class="row">

                            <!-- start: konten kiri -->
                            <div class="col-lg-1">
                                <div class="pretty p-svg p-curve p-smooth p-bigger">
                                    <input type="checkbox" class="checkboxes" />
                                    <div class="state p-success">
                                        <!-- svg path -->
                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z"
                                                    style="stroke: white;fill:white;"></path>
                                        </svg>
                                        <label class="o-card__item-checkbox" style="padding-left:10px;">

                                        </label>
                                    </div>
                                </div>

                            </div>
                            <!-- end: konten kiri -->

                            <!-- start: konten tengah -->
                            <div class="col-lg-9">

                                <!-- start: card item content -->
                                <div class="row">

                                    <div class="col-lg-3">

                                        <?php foreach($cart['images'] as $image):?>
                                              <img class="img-responsive" src="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" data-zoom-image="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" data-image-name="<?= $image;?>" title="<?php echo $cart['name']; ?>" alt="<?php echo $cart['name']; ?>">
                                        <?php break;?>
                                        <?php endforeach;?>
                                    </div>
                                    <div class="col-lg-9">

                                        <div class="o-card__item-content">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h5><?php echo h($cart['name']); ?></h5>
                                                </div>

                                                <div class="col-lg-5 text-left">
                                                    <p>SKU : <?php echo $cart['sku']; ?></p>
                                                </div>

                                                <div class="col-lg-7 text-left">
                                                    <p>Product origin : Gudang <?php echo $cart['product_option_stock']['branch']['name']; ?></p>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="c-card__item-point">
                                                                <h5>
                                                                    <?php echo $cart['point']; ?> poin
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <button type="button"
                                                                    class="btn btn-danger c-card__item-button">
                                                                bagikan
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-lg-12">
                                                    <h2>RP.<?php echo $this->Number->format($cart['price']); ?></h2>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end: card item content -->

                                <!-- start: tulis catatan content -->
                                <div class="col-lg-12 c-card__item-catatan">
                                    <i class="fas fa-pen" style="padding-right: 10px;"></i>
                                    tulis catatan barang
                                </div>
                                <!-- end: tulis catatan content -->



                            </div>
                            <!-- end: konten tengah -->

                            <!-- start: konten kanan -->
                            <div class="col-lg-2 text-center" style="padding: 0px; padding-right: 15px;">
                                <a href="#" data-toggle="modal" data-target="#modalProduct">
                                    <i class="fas fa-trash-alt" style="font-size: 1.5em;"></i>
                                </a>

                                <!-- start: button increment decrement -->
                                <div class="input-group" style="margin-top: 5em;">
                                            <span class="input-group-btn">
                                                <input type="button" class="btn btn-default" value='-' id='qtyminus'
                                                       field='quantity'>
                                            </span>

                                    <input type="text" class="form-control text-center" name="quantity"
                                           class="qty" value="<?php echo $cart['qty']; ?>">

                                    <span class="input-group-btn">
                                                <input type="button" class="btn btn-default" value="+" id="qtyplus"
                                                       field="quantity">+</input>
                                            </span>
                                </div>
                                <!-- end: button increment decrement -->

                            </div>
                            <!-- start: konten kanan -->

                            <!-- start: product modal item -->
                            <div class="modal fade" id="modalProduct" tabindex="-1" role="dialog"
                                 aria-labelledby="modalProductLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content c-modal-product">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">
                                                            <i class="fas fa-times"></i>
                                                        </span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12 u-flex-center">
                                                    <img src="assets/img/item-img-3.png" alt="image item">
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="o-modal-product-wording">
                                                        Anda akan menghapus Samsung Galaxy Gear VR
                                                        version 1/
                                                        SM-R322-Intl dari keranjang belanja ?
                                                    </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <a class="btn-danger btn-lg btn-block c-modal-product-button"
                                                       href="#" role="button">
                                                        Hapus & tambah ke wishlist
                                                    </a>
                                                </div>
                                                <div class="col-lg-4">
                                                    <a class="btn btn-block btn-link c-modal-product-button--hapus"
                                                       href="#" role="button">
                                                        Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- end: product modal item -->
                        </div>
                    </div>

                    <?php endforeach; ?>
                    <!-- end: card item #2-->


                </div>
                <!-- end: card kanan -->

            </div>

            <div class="col-lg-4">
                <!-- start: card RINGKASAN -->
                <div class="c-cart-card-ringkasan">
                    <!-- start: title -->
                    <div class="c-cart-card-ringkasan__title text-center">
                        <h5>ringkasan belanja</h5>
                    </div>
                    <!-- end: title -->

                    <!-- start: card ringkasan content -->
                    <div class="c-cart-card-ringkasan__content">
                        <div class="row">
                            <div class="col-lg-7">
                                <h3>total poin reward</h3>
                            </div>
                            <div class="col-lg-5">
                                <h5> 1000 </h5>
                            </div>
                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:15px;"></div>
                            </div>
                            <div class="col-lg-7">
                                <h3>sub total</h3>
                            </div>
                            <div class="col-lg-5">
                                <h5 class="sub-total">
                                    Rp.1.108.500
                                </h5>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="button"
                                        class="btn btn-danger btn-lg btn-block c-ringkasan-button">
                                    lanjut berbelanja
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- end: card ringkasan content -->
                </div>
                <!-- end: card RINGKASAN -->

                <!-- start: card wishlist -->
                <div class="c-cart-card-wishlist">
                    <!-- start: title -->
                    <div class="c-cart-card-wishlist__title text-center">
                        <h5>wishlist</h5>
                    </div>
                    <!-- end: title -->

                    <!-- start: card wishlist content -->
                    <div class="c-cart-card-wishlist__content">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="text-left">
                                    Samsung Galaxy Gear VR version 1 / SM-R...
                                </h4>
                            </div>
                            <div class="col-lg-6 text-left">
                                <h5 style="margin-top:5px !important;">
                                    SKU : ZL-0001BRJ-02
                                </h5>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-card__item-point">
                                    <h5>
                                        152 poin
                                    </h5>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h5
                                        style="text-align:left; margin-top:1em !important; margin-bottom: 1.5em !important">
                                    Product origin : Gudang Surabaya
                                </h5>
                            </div>
                            <div style="margin-top: 2em;">
                                <div class="col-lg-5">

                                    <!-- start: button increment decrement -->
                                    <div class="input-group">
                                                <span class="input-group-btn">
                                                    <input type="button" class="btn btn-default" value='-' id='qtyminus'
                                                           field='quantity'>
                                                </span>

                                        <input type="text" class="form-control text-center" name="quantity"
                                               class="qty" value="0">

                                        <span class="input-group-btn">
                                                    <input type="button" class="btn btn-default" value="+" id="qtyplus"
                                                           field="quantity">+</input>
                                                </span>
                                    </div>
                                    <!-- end: button increment decrement -->

                                </div>
                                <div class="col-lg-7">
                                    <a class="btn btn-default c-wishlist-button" href="#"
                                       role="button">Tambahkan produk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: card wishlist content -->

                    <!-- start: card wishlist content -->
                    <div class="c-cart-card-wishlist__content">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="text-left">
                                    Samsung Galaxy Gear VR version 1 / SM-R...
                                </h4>
                            </div>
                            <div class="col-lg-6 text-left">
                                <h5 style="margin-top:5px !important;">
                                    SKU : ZL-0001BRJ-02
                                </h5>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-card__item-point">
                                    <h5>
                                        152 poin
                                    </h5>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h5
                                        style="text-align:left; margin-top:1em !important; margin-bottom: 1.5em !important">
                                    Product origin : Gudang Surabaya
                                </h5>
                            </div>
                            <div style="margin-top: 2em;">
                                <div class="col-lg-5">

                                    <!-- start: button increment decrement -->
                                    <div class="input-group">
                                                <span class="input-group-btn">
                                                    <input type="button" class="btn btn-default" value='-' id='qtyminus'
                                                           field='quantity'>
                                                </span>

                                        <input type="text" class="form-control text-center" name="quantity"
                                               class="qty" value="0">

                                        <span class="input-group-btn">
                                                    <input type="button" class="btn btn-default" value="+" id="qtyplus"
                                                           field="quantity">+</input>
                                                </span>
                                    </div>
                                    <!-- end: button increment decrement -->

                                </div>
                                <div class="col-lg-7">
                                    <a class="btn btn-default c-wishlist-button" href="#"
                                       role="button">Tambahkan produk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: card wishlist content -->

                    <!-- start: card wishlist content -->
                    <div class="c-cart-card-wishlist__content">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="text-left">
                                    Samsung Galaxy Gear VR version 1 / SM-R...
                                </h4>
                            </div>
                            <div class="col-lg-6 text-left">
                                <h5 style="margin-top:5px !important;">
                                    SKU : ZL-0001BRJ-02
                                </h5>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-card__item-point">
                                    <h5>
                                        152 poin
                                    </h5>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h5
                                        style="text-align:left; margin-top:1em !important; margin-bottom: 1.5em !important">
                                    Product origin : Gudang Surabaya
                                </h5>
                            </div>
                            <div style="margin-top: 2em;">
                                <div class="col-lg-5">

                                    <!-- start: button increment decrement -->
                                    <div class="input-group">
                                                <span class="input-group-btn">
                                                    <input type="button" class="btn btn-default" value='-' id='qtyminus'
                                                           field='quantity'>
                                                </span>

                                        <input type="text" class="form-control text-center" name="quantity"
                                               class="qty" value="0">

                                        <span class="input-group-btn">
                                                    <input type="button" class="btn btn-default" value="+" id="qtyplus"
                                                           field="quantity">+</input>
                                                </span>
                                    </div>
                                    <!-- end: button increment decrement -->

                                </div>
                                <div class="col-lg-7">
                                    <a class="btn btn-default c-wishlist-button" href="#"
                                       role="button">Tambahkan produk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: card wishlist content -->

                    <!-- start: card wishlist content -->
                    <div class="c-cart-card-wishlist__content">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <a class="btn btn-link c-wishlist-button-more" href="#" role="button">
                                    lihat semua wishlist
                                </a>
                            </div>
                        </div>
                        <!-- end: card wishlist content -->

                    </div>
                    <!-- end: card wishlist -->

                </div>

            </div>
        </div>
    </div>
</div>
<!-- end: cart -->

<?php $this->append('script'); ?>
<?php
$this->Html->css([
'/css/plugin.min.css',
], ['block' => true]);
?>
<?php
$this->Html->script([
'/js/cart.js',
], ['block' => true]);
?>
<?php $this->end(); ?>