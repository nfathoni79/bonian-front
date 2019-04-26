
<div class="c-header__bg" style="z-index:0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 text-left">
                <h1 class="o-header-title">keranjang belanja</h1>
            </div>
            <div class="col-lg-3 text-center">
                <button onclick="location.href='<?php echo $this->Url->build(['controller' => 'Search', 'action' => 'index']);?>'" type="button" class="btn btn-danger btn-lg btn-block c-header-button">
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


                    <?php $totalPoint = 0;?>
                    <?php $subtotal = 0;?>
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
                        <div class="row">

                            <!-- start: konten kiri -->
                            <div class="col-lg-1">
                                <div class="pretty p-svg p-curve p-smooth p-bigger">
                                    <input type="checkbox" class="checkboxes" name="cartid[<?= $k;?>]" value="<?= $cart['cartid'];?>" />
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
                            <div class="col-lg-11 p-0">

                                <!-- start: card item content -->
                                <div class="row">

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

                                                        <div class="button-group so-quickview cartinfo--static share-container" style="margin-left: 10px; width: 90%; padding: 5px;">
                                                            <button type="button" class="btn-share" style="background-color:#2c558b; padding-left: 12px; padding-right: 12px;" title="Share" onclick=""><i class="fab fa-facebook"></i><span> </span>
                                                            </button>
                                                            <button type="button" class="btn-share" style="background-color:#1e99d0; padding-left: 9px; padding-right: 9px;" title="Share" onclick=""><i class="fab fa-twitter"></i>
                                                            </button>
                                                            <button type="button" class="btn-share" style="background-color:#6e5f4c; padding-left: 10px; padding-right: 10px;" title="Share" onclick=""><i class="fab fa-instagram"></i>
                                                            </button>
                                                            <button type="button" class="btn-share" style="background-color:#79bc25; padding-left: 10px; padding-right: 10px;" title="Share" onclick=""><i class="fab fa-whatsapp"></i>
                                                            </button>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-3 p-0">
                                                        <div class="text-center" style="padding: 0px; padding-right: 15px;">
                                                            <div class="form-group box-info-product">
                                                                <div class="option quantity">
                                                                    <div class="input-group quantity-controls" unselectable="on" style="-webkit-user-select: none;">
                                                                        <span class="input-group-addon product_quantity_down sub" data-id="<?= $k;?>">−</span>
                                                                        <input class="form-control zl-qty" type="text" name="qty" value="<?php echo $cart['qty']; ?>"  id="zl-qty-<?= $k;?>" data-id="<?= $k;?>" min="1" max="<?php echo $cart['product_option_stock']['stock']; ?>">
                                                                        <span class="input-group-addon product_quantity_up add" data-id="<?= $k;?>">+</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <p class="mb-1">Harga satuan</p>
                                                    <h4 class="mt-0">Rp.<span id="zl-satuan-<?= $k;?>" data-value="<?= $cart['price'];?>"><?php echo $this->Number->format($cart['price']); ?></span></h4>
                                                </div>
                                                <div class="col-lg-3">
                                                    <?php if($cart['add_price'] > 0):?>
                                                        <p class="mb-1">Harga tambahan</p>
                                                        <h4 class="mt-0"> Rp. <span id="zl-addprice-<?= $k;?>" data-value="<?= $cart['add_price'];?>"><?php echo $this->Number->format($cart['add_price']); ?></span></h4>
                                                    <?php endif;?>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="mb-1">Total harga</p>
                                                    <h4 class="mt-0">Rp.<span id="zl-total-<?= $k;?>" class="zl-total"><?php echo $this->Number->format($cart['total']); ?></span></h4>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="mb-1">Total point</p>
                                                    <h4 class="mt-0 total-point" id="zl-total-point-<?= $k;?>"><?php echo $this->Number->format($cart['totalpoint']); ?></h4>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end: card item content -->

                                <div class="col-lg-12 c-card__item-catatan">
                                    catatan barang
                                    <div class="col-lg-12 o-item-catatan">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                        commodo
                                        ligula eget dolor. Aenean massa. Cum sociis
                                        natoque penatibus et magnis dis parturient montes, nascetur
                                        ridiculus
                                        mus.
                                    </div>
                                </div>


                            </div>
                            <!-- end: konten tengah -->


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
                                <h5 id="subtotal-point"><?php echo $this->Number->format($totalPoint);?></h5>
                            </div>
                            <div class="col-lg-12">
                                <div style="border:1px dashed #E2E2E2; margin-top:15px;"></div>
                            </div>
                            <div class="col-lg-7">
                                <h3>sub total</h3>
                            </div>
                            <div class="col-lg-5">
                                <h5 class="sub-total">
                                    Rp.<span id="subtotal"><?php echo $this->Number->format($subtotal);?></span>
                                </h5>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="button"class="btn btn-danger btn-lg btn-block c-ringkasan-button">
                                    Bayar Sekarang (2 Item)
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
                                <div class="col-lg-12">
                                    <h5><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['product']['slug']]); ?>" title="<?= h($vals['product']['name']); ?>" target="_self">
                                        <?php echo $this->Text->truncate(
                                        h($vals['product']['name']),
                                        25,
                                        [
                                        'ellipsis' => '...',
                                        'exact' => false
                                        ]
                                        );?>
                                    </a></h5>
                                </div>
                                <div class="col-lg-12 text-left">
                                    <div class="price">
                                        <span class="price-new">Rp. <?= $this->Number->format($vals['product']['price_sale']);?></span>
                                        <span class="price-old">Rp. <?= $this->Number->format($vals['product']['price']);?></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-left">
                                    <div class="rate-history">
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <?php
                                                    $rate = (int) $vals['product']['rating'];
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
                                </div>
                            </div>
                            <div class="col-lg-8 mt-3 text-center">
                                <div class="button-group so-quickview cartinfo--static share-container" style="margin-left: 10px; width: 90%; padding: 5px;">
                                    <button type="button" class="btn-share" style="background-color:#2c558b; padding-left: 12px; padding-right: 12px;" title="Share" onclick=""><i class="fab fa-facebook"></i><span> </span>
                                    </button>
                                    <button type="button" class="btn-share" style="background-color:#1e99d0; padding-left: 9px; padding-right: 9px;" title="Share" onclick=""><i class="fab fa-twitter"></i>
                                    </button>
                                    <button type="button" class="btn-share" style="background-color:#6e5f4c; padding-left: 10px; padding-right: 10px;" title="Share" onclick=""><i class="fab fa-instagram"></i>
                                    </button>
                                    <button type="button" class="btn-share" style="background-color:#79bc25; padding-left: 10px; padding-right: 10px;" title="Share" onclick=""><i class="fab fa-whatsapp"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-lg-4 mt-3 text-center">
                                <div class="badge <?= $this->Badge->format($vals['product']['point']); ?>"><?= $vals['product']['point']; ?> poin</div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <?php endforeach;?>
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
], ['block' => true]);
?>
<?php
$this->Html->script([
'/js/cart.js',
], ['block' => true]);
?>
<?php $this->end(); ?>