
<div class="c-header__bg" style="z-index:0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 text-left">
                <h1 class="o-header-title">keranjang belanja</h1>
            </div>
            <div class="col-lg-3 text-center">
                <button onclick="location.href='<?php echo $this->Url->build(['controller' => 'Search', 'action' => 'index']);?>'" type="button" class="btn zl-btn-hover-red btn-lg btn-block c-header-button">
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
                    <?php if(!empty($carts['carts'])):?>
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
                                    <a href="#" class="o-card__item-hapus hapus-selected"><i class="fa fa-trash" style="font-size: 1.5em;"></i> hapus </a>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="c-cart-card__item">
                            <div class="row">
                                <div class="col-lg-12 text-center">

                                    Keranjang belanja kosong

                                </div>
                            </div>
                        </div>
                    <?php endif;?>


                    <?php $allowCart = [1,5];?>
                    <?php $totalPoint = 0;?>
                    <?php $subtotal = 0;?>
                    <?php if(!empty($carts['carts'])):?>
                    <?php foreach($carts['carts'] as $k => $cart):?>
                    <?php $totalPoint += $cart['totalpoint'];?>
                    <?php $subtotal += $cart['total'];?>
                    <div class="c-cart-card__item u-mt-10" id="cart-item-<?= $cart['sku'];?>">
                        <form id="cart-<?= $k;?>">
                            <input type="hidden" name="stock_id" value="<?= $cart['stock_id'];?>">
                            <input type="hidden" name="price_id" value="<?= $cart['price_id'];?>">
                            <input type="hidden" name="sku" value="<?= $cart['sku'];?>" id="sku-<?= $k;?>">
                            <input type="hidden" name="product_id" value="<?= $cart['product_id'];?>" >
                            <input type="hidden" name="stock" value="<?= $cart['origin'];?>" >
                            <input type="hidden" name="type" value="force" >
                        </form>
                        <div class="row wrapper-cart">
                            <!-- start: konten kiri -->
                            <div class="col-lg-1">
                                <?php if(in_array($cart['status'], $allowCart)):?>
                                <div class="pretty p-svg p-curve p-smooth p-bigger">
                                    <input type="checkbox" class="checkboxes" name="cart[<?= $k;?>][id]" value="<?= $cart['cartid'];?>"  data-stock-id="<?= $cart['product_option_stock_id'];?>" data-product-id="<?= $cart['product_id'];?>" data-key="<?= $k;?>" />
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
                                <?php endif;?>

                            </div>
                            <!-- end: konten kiri -->

                            <!-- start: konten tengah -->
                            <div class="col-lg-11 p-0">

                                <!-- start: card item content -->
                                <div class="row">

                                    <?php if(!in_array($cart['status'], $allowCart)):?>
                                    <div class="col-lg-12">
                                        <?php if($cart['status'] == 2):?>
                                        <div class="alert alert-danger pd-5">Masa belaku promo untuk produk telah habis.</div>
                                        <?php elseif($cart['status'] == 3):?>
                                        <div class="alert alert-danger pd-5">Stok produk habis.</div>
                                        <?php endif;?>
                                    </div>
                                    <?php endif;?>
                                    <div class="col-lg-3 p-0">
                                        <?php foreach($cart['images'] as $image):?>
                                              <img class="img-responsive img-<?= $k;?>" src="<?= $this->Url->build($_basePath . 'images/132x132/' . $image); ?>" data-zoom-image="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" data-image-name="<?= $image;?>" title="<?php echo $cart['name']; ?>" alt="<?php echo $cart['name']; ?>">
                                        <?php break;?>
                                        <?php endforeach;?>
                                    </div>
                                    <div class="col-lg-9 pl-0">

                                        <div class="o-card__item-content">

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-10 p-0">
                                                        <h5>
                                                            <a class="cart_product_name" href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'detail',$cart['slug'] ]);?>">
                                                                <?php echo h($cart['name']);?>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-2 text-center p-0">
                                                        <a href="#" data-toggle="modal" class="delete-cart" data-product-id="<?= $cart['product_id']; ?>" data-cart-id="<?= $k; ?>" data-cart-key="<?= $cart['cartid']; ?>" data-cart-sku="<?= $cart['sku']; ?>" data-target="#modalProduct">
                                                            <i class="fa fa-trash" style="font-size: 1.5em;"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-4 text-left p-0">
                                                        <p>SKU : <?php echo $cart['sku']; ?></p>
                                                    </div>

                                                    <div class="col-lg-3 text-left p-0">
                                                        <p>Origin : <?php echo $cart['product_option_stock']['branch']['name']; ?></p>
                                                    </div>

                                                    <div class="col-lg-5 text-left pl-0">
                                                        <p><?php echo $cart['variant']; ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-2 p-0">
                                                        <div class="badge <?= $this->Badge->format($cart['point']); ?>"><span id="zl-point-<?= $k;?>"><?php echo $cart['point']; ?></span> poin</div>
                                                    </div>
                                                    <div class="col-lg-7 text-center p-0">

                                                        <div class="button-group so-quickview cartinfo--static share-container zl-bg-none" style="margin-left: 10px; width: 90%; padding: 5px;">

                                                            <button type="button" class="btn-share fbShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $cart['slug'],'prefix' => false],true);?>" data-title="<?= $cart['name'];?>" data-price="<?= $cart['price'];?>" style="background-color:#2c558b; padding-left: 12px; padding-right: 12px;" title="Share" onclick=""><i class="fab fa-facebook"></i><span> </span>
                                                            </button>
                                                            <button type="button" class="btn-share twitterShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $cart['slug'],'prefix' => false],true);?>" data-title="<?= $cart['name'];?>" data-price="<?= $cart['price'];?>" style="background-color:#1e99d0; padding-left: 9px; padding-right: 9px;" title="Share" onclick=""><i class="fab fa-twitter"></i>
                                                            </button>
                                                            <button type="button" class="btn-share igShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $cart['slug'],'prefix' => false],true);?>" data-title="<?= $cart['name'];?>" data-price="<?= $cart['price'];?>" style="background-color:#6e5f4c; padding-left: 10px; padding-right: 10px;" title="Share" onclick=""><i class="fab fa-instagram"></i>
                                                            </button>
                                                            <button type="button" class="btn-share waShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $cart['slug'],'prefix' => false],true);?>" data-title="<?= $cart['name'];?>" data-price="<?= $cart['price'];?>" style="background-color:#79bc25; padding-left: 10px; padding-right: 10px;" title="Share" onclick=""><i class="fab fa-whatsapp"></i>
                                                            </button>

                                                        </div>

                                                    </div>
                                                    <div class="col-lg-3 p-0">
                                                        <?php if(in_array($cart['status'], $allowCart)):?>
                                                        <div class="text-center" style="padding: 0px; padding-right: 15px;">
                                                            <div class="form-group box-info-product">
                                                                <div class="option quantity">
                                                                    <div class="input-group quantity-controls" unselectable="on" style="-webkit-user-select: none;">
                                                                        <span class="input-group-addon product_quantity_down sub" data-id="<?= $k;?>">−</span>
                                                                        <input class="form-control zl-qty" type="text" name="cart[<?= $k;?>][qty]" value="<?php echo $cart['qty']; ?>"  id="zl-qty-<?= $k;?>" data-id="<?= $k;?>" min="1" max="<?php echo $cart['product_option_stock']['stock']; ?>">
                                                                        <span class="input-group-addon product_quantity_up add" data-id="<?= $k;?>">+</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endif;?>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <p class="mb-1">Harga satuan</p>
                                                    <h4 class="mt-0 zl-tx-red--light">Rp.<span id="zl-satuan-<?= $k;?>" data-value="<?= $cart['price'];?>"><?php echo $this->Number->format($cart['price']); ?></span></h4>
                                                </div>
                                                <div class="col-lg-3">
                                                    <?php if($cart['add_price'] > 0):?>
                                                        <p class="mb-1">Harga tambahan</p>
                                                        <h4 class="mt-0 zl-tx-red--light"> Rp. <span id="zl-addprice-<?= $k;?>" data-value="<?= $cart['add_price'];?>"><?php echo $this->Number->format($cart['add_price']); ?></span></h4>
                                                    <?php endif;?>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="mb-1">Total harga</p>
                                                    <h4 class="mt-0 zl-tx-red--light">Rp.<span id="zl-total-<?= $k;?>" class="zl-total" data-cat="<?= $cart['product_category_id'];?>"><?php echo $this->Number->format($cart['total']); ?></span></h4>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="mb-1">Total point</p>
                                                    <h4 class="mt-0 zl-tx-red--light total-point" id="zl-total-point-<?= $k;?>"><?php echo $this->Number->format($cart['totalpoint']); ?></h4>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end: card item content -->

                                <div class="col-lg-12 c-card__item-catatan">
                                    <a href="JavaScript:void(0);" class="zl-tx-red--light zl-note" data-id="<?= $cart['cartid'];?>"><i class="fa fa-pencil-alt"></i> catatan barang</a>
                                    <div class="col-lg-12 zl-note-<?= $cart['cartid'];?>" style="display: none;">
                                        <div class="form-group">
                                            <textarea class="form-control note tx-12 tx-medium pd-10" name="note[<?= $cart['cartid'];?>]" placeholder="Tulis Catatan Barang" value="<?= $cart['comment'];?>"><?= $cart['comment'];?></textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- end: konten tengah -->

                        </div>
                    </div>

                    <?php endforeach; ?>
                    <?php endif;?>
                    <!-- end: card item #2-->


                    <!-- start: product modal item -->
                    <div class="modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-labelledby="login-popupLabel">
                        <div class="modal-dialog modal-md address-edit" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #d9534f;color: #ffffff;border-top-left-radius:6px;border-top-right-radius:6px;">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span></button>
                                    <h4 class="modal-title" id="login-popupLabel" style="text-align: left;">Konfirmasi hapus</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 u-flex-center image-modal"></div>
                                        <div class="col-lg-12">
                                            <p class="o-modal-product-wording text-center mt-2">Anda akan menghapus <strong><span class="title-modal"></span></strong> dari keranjang belanja ?</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <button class="btn-danger btn-lg btn-block zl-whistlist" href="#"  data-product-id="" data-cart-key="" data-cart-sku="" role="button">Hapus & tambah ke wishlist</button>
                                        </div>
                                        <div class="col-lg-4">
                                            <button class="btn btn-default btn-lg btn-block zl-hapus" href="#" role="button"  data-product-id="" data-cart-key="" data-cart-sku="">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: product modal item -->


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


                    <!-- start: product voucher modal item -->
                    <div class="modal fade" id="modalvoucher" tabindex="-1" role="dialog" aria-labelledby="login-popupLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #d9534f;color: #ffffff;border-top-left-radius:6px;border-top-right-radius:6px;">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="fas fa-times-circle"></i>
                                        </span>
                                    </button>
                                    <h4 class="modal-title" id="login-popupLabel" style="text-align: left;">Pilih Voucher</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 mg-b-15">
                                            <div class="well" style="margin: 0px !important;">

                                                <?= $this->Form->create(null, [
                                                'url' => [
                                                'controller' => 'Voucher',
                                                'action' => 'iclaim',
                                                'prefix' => 'user'
                                                ],
                                                'id' => 'claim-form',
                                                'class' => 'ajax-helpers'
                                                ]); ?>
                                                    <div class="form-group row" style="margin: 2px !important;">
                                                        <label class="col-lg-4 col-form-label text-right">Kode voucher</label>
                                                        <div class="col-lg-6">
                                                            <input class="form-control" name="voucher" id="voucher" type="text" placeholder="Input kode voucher" required="">
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <input type="submit" value="Simpan" class="btn btn-danger btn-md btn-radius" disabled="disabled">
                                                        </div>
                                                    </div>
                                                <?= $this->Form->end(); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" style="overflow: auto;height: 300px;">

                                            <?php
                                            $colored = ['1' => 'v-colored-box', '2' => 'v-colored-box-off', '3' => 'v-colored-box-off'];
                                            $texted = ['1' => 'label-danger', '2' => 'label-default', '3' => 'label-default'];
                                            $end = ['1' => 'v-end', '2' => 'v-end-off', '3' => 'v-end-off'];
                                            ?>
                                            <?php if(!empty($voucher)):?>
                                                <?php foreach($voucher as $vals):?>

                                                <div class="panel panel-default <?php echo ($vals['active']) ? 'active-voucher' : 'inactive-voucher';?>">
                                                    <div class="panel-body" style="padding:0px;">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="v-colored-box" style="height: 10.25rem !important;">
                                                                    <div class="v-text-discount"><?= $vals['voucher']['percent'];?>%</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-7 v-text-box">
                                                                Ekstra Diskon sebesar <?= $vals['voucher']['percent'];?>% dengan Max Rp <?php  echo $this->Number->precision($vals['voucher']['value'], 0);?>.
                                                                <?php if(!empty($vals['category_name'])):?>
                                                                Berlaku untuk produk kategori <?php echo implode(', ', $vals['category_name']);?>.
                                                                <?php endif;?>
                                                                <div class="v-code"><span class="label <?php echo $texted[$vals['status']];?>">Kode: <?= $vals['voucher']['code_voucher'];?></span></div>
                                                                <span class="<?php echo $end[$vals['status']];?>">Berakhir Dlm:
                                                                    <?= $this->Time->timeAgoInWords($vals['expired'], [
                                                                    'accuracy' => ['month' => 'month'],
                                                                    'end' => '1 year'
                                                                    ]); ?>
                                                                </span>
                                                            </div>
                                                            <div class="col-md-2 mg-t-45">
                                                                <?php if($vals['active']):?>
                                                                    <?php $group = implode(',', $vals['category']);?>
                                                                    <div class="pretty p-default p-round p-pulse p-bigger">
                                                                        <input type="radio" name="voucher" value="<?php echo $vals['id'];?>" data-code="<?php echo $vals['voucher']['code_voucher'];?>" data-price="<?php echo $vals['voucher']['value'];?>" data-diskon="<?php echo $vals['voucher']['percent'];?>" data-group="<?php echo $group;?>">
                                                                        <div class="state p-danger">
                                                                            <label>Pilih</label>
                                                                        </div>
                                                                    </div>
                                                                <?php endif;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach;?>
                                            <?php else:?>
                                                <div class="panel panel-default">
                                                    <div class="panel-body" style="padding:0px;">
                                                        <div class="row">
                                                            <div class="col-md-12 text-center">
                                                                Anda tidak memiliki voucher
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <button class="btn btn-default btn-lg btn-block btn-radius"  data-dismiss="modal">Nanti saja</button>
                                        </div>
                                        <div class="col-lg-4">
                                            <button class="btn btn-danger btn-lg btn-block btn-radius btn-v-ok" >Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: product voucher modal item -->

                    <!-- start: product coupon modal item -->
                    <div class="modal fade" id="modalCoupon" tabindex="-1" role="dialog" aria-labelledby="login-popupLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #d9534f;color: #ffffff;border-top-left-radius:6px;border-top-right-radius:6px;">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="fas fa-times-circle"></i>
                                        </span>
                                    </button>
                                    <h4 class="modal-title" id="kupon-popupLabel" style="text-align: left;">Pilih Kupon</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 wrapper-coupon" style="overflow: auto;height: 300px;">
                                            <!-- Wrapper Coupon-->
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer ">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <button class="btn btn-default btn-lg btn-block btn-radius" data-dismiss="modal">Nanti saja</button>
                                        </div>
                                        <div class="col-lg-4">
                                            <button class="btn btn-danger btn-lg btn-block btn-radius btn-c-ok" >Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: product modal item -->

                    <!-- start: card ringkasan content -->
                    <div class="c-cart-card-ringkasan__content">

                        <?php if(!empty($carts['carts'])):?>
                        <div class="row">
                            <div class="col-lg-7">
                                <h3>Voucher</h3>
                            </div>
                            <div class="col-lg-5 p-3">
                                <a href="JavaScript:void(0);" class="btn btn-default btn-sm btn-voucher" data-target="#modalvoucher" data-toggle="modal">Pilih voucher</a>
                            </div>
                            <div class="col-lg-7">
                                <h3>Kupon</h3>
                            </div>
                            <div class="col-lg-5 p-3">
                                <a href="JavaScript:void(0);" class="btn btn-default btn-sm btn-kupon" data-target="#modalCoupon" data-toggle="modal">Pilih kupon</a>
                            </div>
                            <div class="col-lg-7">
                                <h3>Gunakan Poin</h3>
                                <h5 style="margin-top: 0px; font-size:0.8em; padding-right: 0px; text-align: left;">
                                    Anda memiliki <?php echo $this->Number->format($point);?> poin
                                </h5>
                            </div>
                            <div class="col-lg-5">
                                <?php if($point > 0):?>
                                    <input type="number" id="point" class="form-control text-center number-box" style="margin-top: 20px;" placeholder="Input poin" min="0" max="<?php echo $point;?>">
                                <?php endif;?>
                            </div>
                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:15px;"></div>
                            </div>
                            <div class="col-lg-7">
                                <h3>sub total</h3>
                            </div>
                            <div class="col-lg-5">
                                <h5 class="sub-total">
                                    Rp.<span id="subtotal">0</span>
                                </h5>
                            </div>
                            <?php if(!empty($voucher)):?>
                                <div class="col-lg-7">
                                    <h3>Potongan Voucher</h3>
                                </div>
                                <div class="col-lg-5">
                                    <h5 class="sub-total">
                                        Rp.<span id="voucher-price">0</span>
                                    </h5>
                                </div>
                            <?php endif;?>
                            <div class="col-lg-7">
                                <h3>Potongan Kupon</h3>
                            </div>
                            <div class="col-lg-5">
                                <h5 class="sub-total">
                                    Rp.<span id="coupon-price">0</span>
                                </h5>
                            </div>

                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:15px;"></div>
                            </div>

                            <div class="col-lg-7">
                                <h3>grand total</h3>
                            </div>
                            <div class="col-lg-5">
                                <h5 class="sub-total">
                                    Rp.<span id="grandtotal">0</span>
                                </h5>
                            </div>

                            <div class="col-lg-7">
                                <h3>total poin bonus</h3>
                            </div>

                            <div class="col-lg-5">
                                <h5 id="subtotal-point"><?php echo $this->Number->format($totalPoint);?></h5>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="button"class="btn btn-danger btn-lg btn-block c-ringkasan-button zl-checkout">
                                    Bayar Sekarang
                                </button>
                            </div>
                        </div>
                        <?php else:?>

                            <div class="col-lg-12 text-center">
                                <h3>Tidak ada ringkasan belanja</h3>
                            </div>
                        <?php endif;?>
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
                    <?php if(!empty($wishlists)):?>
                    <?php foreach($wishlists as $vals):?>
                    <div class="c-cart-card__item m-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <?php foreach($vals['product']['images'] as $image):?>
                                <img class="img-responsive" src="<?= $this->Url->build($_basePath . 'images/132x132/' . $image); ?>"  >
                                <?php break;?>
                                <?php endforeach;?>
                            </div>
                            <div class="col-lg-8 p-0">
                                <div class="col-lg-12 text-left">
                                    <div class="col-lg-8 rate-history pd-0">
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <?php
                                                    $rate = ceil($vals['product']['rating']);
                                                    for ($x = 0; $x < $rate; $x++) {
                                                        echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>';
                                                }
                                                for ($x = 0; $x < 5-$rate; $x++) {
                                                echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>';
                                                }
                                                ?>

                                            </div>
                                            <a class="rating-num" href="#" target="_blank">(<?= $vals['product']['rating_count']; ?>)</a>
                                        </div>
                                        <!-- <div class="order-num">Orders (0)</div> -->
                                    </div>
                                    <div class="col-lg-4 pd-0 mg-0 text-center">
                                        <div class="mg-0 badge <?= $this->Badge->format($vals['product']['point']); ?>"><?= $vals['product']['point']; ?> poin</div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h4><a class="zl-tx-black tx-medium" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['product']['slug']]); ?>" title="<?= h($vals['product']['name']); ?>" target="_self">
                                        <?php echo $this->Text->truncate(
                                        h($vals['product']['name']),
                                        25,
                                        [
                                        'ellipsis' => '...',
                                        'exact' => false
                                        ]
                                        );?>
                                    </a></h4>
                                </div>
                                <div class="col-lg-12 text-left">
                                    <div class="price">
                                        <span class="price-new">Rp. <?= $this->Number->format($vals['product']['price_sale']);?></span>
                                        <span class="price-old">Rp. <?= $this->Number->format($vals['product']['price']);?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3 text-center">
                                <div class="button-group so-quickview cartinfo--static share-container zl-bg-none" style="margin-left: 10px; width: 90%; padding: 5px;">
                                    <button type="button" class="btn-share fbShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['product']['slug'],'prefix' => false],true);?>" data-title="<?= $vals['product']['name'];?>" data-price="<?= $vals['product']['price_sale'];?>" style="background-color:#2c558b; padding-left: 12px; padding-right: 12px;" title="Share" onclick=""><i class="fab fa-facebook"></i><span> </span>
                                    </button>
                                    <button type="button" class="btn-share twitterShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['product']['slug'],'prefix' => false],true);?>" data-title="<?= $vals['product']['name'];?>" data-price="<?= $vals['product']['price_sale'];?>" style="background-color:#1e99d0; padding-left: 9px; padding-right: 9px;" title="Share" onclick=""><i class="fab fa-twitter"></i>
                                    </button>
                                    <button type="button" class="btn-share igShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['product']['slug'],'prefix' => false],true);?>" data-title="<?= $vals['product']['name'];?>" data-price="<?= $vals['product']['price_sale'];?>" style="background-color:#6e5f4c; padding-left: 10px; padding-right: 10px;" title="Share" onclick=""><i class="fab fa-instagram"></i>
                                    </button>
                                    <button type="button" class="btn-share waShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['product']['slug'],'prefix' => false],true);?>" data-title="<?= $vals['product']['name'];?>" data-price="<?= $vals['product']['price_sale'];?>" style="background-color:#79bc25; padding-left: 10px; padding-right: 10px;" title="Share" onclick=""><i class="fab fa-whatsapp"></i>
                                    </button>
                                </div>
                            </div>

                            

                        </div>
                    </div>
                    <hr>
                    <?php endforeach;?>

                    <div class="row">
                        <div class="col-lg-12  mb-4 text-center">
                            <?php echo $this->Html->link('Daftar whislist', ['controller' => 'Wishlist', 'action' => 'index', 'prefix' => 'user'],['class' => 'btn btn-danger btn-sm btn-radius']);?>
                        </div>
                    </div>

                    <?php else: ?>

                    <div class="c-cart-card__item m-4">
                        <div class="row">
                            <div class="col-lg-12">
                                    Daftar whistlist kosong
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
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
'/css/cart.css',
], ['block' => true]);
?>
<?php
$this->Html->script([
'/js/cart.js',
], ['block' => true]);
?>
<?php $this->end(); ?>