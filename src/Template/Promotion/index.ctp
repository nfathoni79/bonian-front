<style type="text/css">
    .producttab .tabsslider.horizontal-tabs .tab-content{
        padding: 0;
        border: unset;
    }
    .producttab .tabsslider.horizontal-tabs .nav-tabs li {
        margin: -1px 0 0 0px;
        list-style: none;
        cursor: pointer;
        font-size: 16px;
        text-transform: uppercase;
        border-right: 0px solid #e1e1e1;
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
        border-radius: 8px;
    }
    .box-title h2{
        background: #dc5054;
        background: linear-gradient(160deg,#dc5054 0%, #a41d21 100%);
        background: -webkit-linear-gradient(160deg,#dc5054 0%, #a41d21 100%);
        background: -moz-linear-gradient(160deg,#dc5054 0%, #a41d21 100%);
    }
    .box-title h2 {
        line-height: 48px;
        background-color: #ff5e00;
        font-size: 18px;
        padding: 0 16px;
        color: #fff;
        margin-left: -10px;
        margin-top: 8px;;
        margin-bottom: 12px;
        font-weight: bold;
        border-radius: 0 7px 0 0;
        position: relative;
        text-transform: uppercase;
        box-shadow: 0 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .box-title h2:before {
        content: '';
        width: 0;
        height: 0;
        border-bottom: 8px solid transparent;
        bottom: -8px;
        position: absolute;
        border-right: 8px solid #cc4b00;
        left: 1px;
    }
    .box-title {
        position: relative;
        top: -18px;
        left: -9px;
    }
    .pd-l-20{
        padding-left: 20px;
    }
    .pd-b-10{
        padding-bottom: 10px;
    }
    .l-detail{
        color: #dc5054;
        font-size: 13px;
        top: 50%;
        bottom: 50%;
        margin-right: 2%;
        margin-top: 5px;
    }
    .terms-wrapper{
        background: #fff;
        padding: 14px;
        margin-top: 0px;
        margin-bottom: 50px;
        border-radius: 0px 0px 10px 10px;
        -webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.12);
        -moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.12);
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.12);
    }
    .products-list.grid .product-item-container .right-block{
        text-align: left;
    }
    .producttab .tabsslider.horizontal-tabs .nav-tabs li.active a{
        background: #c93535;
    }
    .producttab .tabsslider.horizontal-tabs .nav-tabs li.item_nonactive a{
        background: #fff;   
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
            <li class="active" style="float:left!important; width:50%; text-align: center;" data-active-content=".items-category-71"><a data-toggle="tab" href="#tab-product">Tentang Promo</a></li>
            <li class="item_nonactive" style="float:right!important; width:50%; text-align: center;" data-active-content=".items-category-72"><a data-toggle="tab" href="#tab-rules">Syarat & Ketentuan</a></li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content promo-content">
            <div id="tab-product" class="tab-pane fade active in">

                <div class="product-listing">
                    <?php if($promotion['voucher_details']):?>
                    <?php foreach($promotion['voucher_details'] as $vals):?>
                    <!-- loop-1 -->
                    <div class="row">

                        <div class="box-title font-ct" style="display:inline-block !important;">
                            <h2 class="modtitle"><span>Kategori <?php echo $vals['product_category']['name']; ?> Pada Fashion Wanita</span></h2>
                        </div>
                        <a class="l-detail" href="" style="display:inline-block !important; float:right;">Lihat Selengkapnya</a>
                        <?php
                            $chunk = array_chunk($vals['product_category']['products'],10);
                        ?>
                        <?php foreach($chunk as $val):?>
                        <div class="products-list nopadding-xs so-filter-grid grid">

                            <!--Begin Items-->
                            <?php foreach($val as $v):?>
                            <div class="product-layout five-items">
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
                                                25,
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
                    <?php endif;?>
                </div>

            </div>
            <div id="tab-rules" class="tab-pane fade">
              <div class="terms-wrapper">
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

        </div>
        <!-- Tab Content -->
    </div>

</div>
<!-- //Promotion Tabs -->
</div>
