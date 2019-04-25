<style type="text/css">
    .producttab .tabsslider.horizontal-tabs .tab-content{
        padding: 0;
        border: unset;
    }
    .nav-promo li{
        background: #c93535;
    } 
    .product-listing .row {
        background: #fff;
        padding: 10px;
        -webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.12);
        -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.12);
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.12);
        margin: 40px 0;
    }
</style>


<div id="content" style="background: #FFF6F6; background-color: #dc5053; padding: 20px;">
    <div class="container">
        <div class="block">
            <div class="module sohomepage-slider ">
                <div class="yt-content-slider"  data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                    <div class="yt-content-slide">
                        <a title="slide1" href="#"><div class="yt-content-slide"><img src="<?= $this->Url->build($_basePath . 'images/1170x400/32da38b66749491f81da01357f78a5f3.jpg'); ?>" class="responsive"></div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
<!-- Promotion Tabs -->
<div class="producttab clearfix">

    <div class="tabsslider horizontal-tabs col-xs-12">
        <ul class="nav nav-tabs nav-promo">
            <li class="active" data-active-content=".items-category-71"><a data-toggle="tab" href="#tab-product">Tentang Promo</a></li>
            <li class="item_nonactive" data-active-content=".items-category-72"><a data-toggle="tab" href="#tab-rules">Syarat & Ketentuan</a></li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content promo-content">
            <div id="tab-product" class="tab-pane fade active in">

                <div class="product-listing">
                
                    <?php foreach($promotion['voucher_details'] as $vals):?>
                    <!-- loop-1 -->
                    <div class="row">

                        <div class="box-title font-ct" style="width: 204px; display:inline-block !important;">
                            <h2 class="modtitle">Produk Teratas</h2>
                        </div>

                        <h3 class="modtitles" style="display:inline-block!important;"><span>Kategori <?php echo $vals['product_category']['name']; ?> Pada Fashion Wanita</span></h3>
                        <?php
                            $chunk = array_chunk($vals['product_category']['products'],10);
                        ?>
                        <?php foreach($chunk as $val):?>
                        <div class="products-list nopadding-xs so-filter-grid grid">

                            <!--Begin Items-->
                            <?php foreach($val as $v):?>
                            <div class="product-layout col-lg-3 col-md-4 col-sm-4 col-xxs-6 col-xs-12">
                                <div class="product-item-container">
                                    <div class="left-block left-b">
                                        <div class="product-image-container">
                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $v['product']['slug']]); ?>" target="_self" title="<?= h($v['product']['name']); ?>">
                                                <?php foreach($v['product']['images'] as $image) : ?>
                                                <img src="<?= $this->Url->build($_basePath . 'images/213x150/' . $image); ?>" data-image-name="<?= $image; ?>"  class="img-responsive" alt="image">
                                                <?php break; endforeach; ?>
                                            </a>
                                        </div>

                                        <div class="box-label">
                                            <?php $dics = 100 - (($v['product']['price_sale'] / $v['product']['price']) * 100);?>
                                            <?php if($v['product']['price_sale'] != $v['product']['price']):?>
                                            <span class="label-product label-sale"> <?php echo  $this->Number->precision($dics, 0);?>% </span>
                                            <?php endif;?>
                                            <?php if($v['product']['is_new']): ?>
                                            <span class="label-product label-new"> New </span>
                                            <?php endif;?>
                                        </div>
                                        <!--quickview-->
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $v['product']['slug']]); ?>" title="<?= h($v['product']['name']); ?>" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                        <!--end quickview-->
                                    </div>
                                    <div class="right-block right-b">

                                        <div class="caption">
                                            <h4><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $v['product']['slug']]); ?>" title="<?= h($v['product']['name']); ?>" target="_self">  <?php echo $this->Text->truncate(
                                                h($v['product']['name']),
                                                30,
                                                [
                                                'ellipsis' => '...',
                                                'exact' => false
                                                ]
                                                );?>
                                            </a></h4>
                                            <div class="price">
                                                <span class="price-new">Rp. <?= $this->Number->format($v['product']['price_sale']); ?></span>
                                                <?php if($v['product']['price_sale'] != $v['product']['price']):?>
                                                <span class="price-old">Rp. <?= $this->Number->format($v['product']['price']); ?></span>
                                                <?php endif;?>
                                            </div>
                                            <div class="button-group so-quickview cartinfo--static">
                                                <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('<?= ($v['product']['id']); ?>', this);">  <i class="fa fa-shopping-basket"></i>
                                                    <span>Add to cart </span>
                                                </button>
                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('<?= ($v['product']['id']); ?>', this);"><i class="fa fa-heart"></i><span></span>
                                                </button>
                                                <button type="button" class="compare btn-button" title="Share this Product "><i class="fa fa-share-alt"></i><span></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <!--//End Begin Items-->
                        </div>
                        <?php endforeach;?>
                    </div>
                    <?php endforeach;?>
                </div>

            </div>
            <div id="tab-rules" class="tab-pane fade">
                <div class="short_description form-group">
                    <h3 class="pd-l-20">SYARAT & KETENTUAN UMUM :</h3>
                    <div class="pd-l-20 pd-b-10"><?php echo $promotion['tos'];?></div>

                    <div class="alert alert-warning">
                        Dengan mengikuti promo ini, customer dianggap mengerti dan menyetujui semua syarat & ketentuan berlaku.<br><br>
                        Zolaku.com berhak secara sepihak membatalkan pesanan dan/atau menonaktifkan voucher apabila tidak sesuai syarat & ketentuan berlaku dan/atau ditemukan adanya indikasi kecurangan/pelanggaran yang merugikan pihak Zolaku.com.
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab Content -->
    </div>

</div>
<!-- //Promotion Tabs -->
</div>