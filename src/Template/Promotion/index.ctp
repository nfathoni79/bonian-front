<style>
    .module h3.modtitles{
        background: #f2f2f2;
        line-height: 100%;
        padding: 10px 0 9px 30px;
        border-bottom: 1px solid #e8e8e8;
        margin-bottom: 0;
        margin-top: 0;
        text-transform: uppercase;
        color: #222;
        font-size: 16px;
        font-weight: bold;
        margin-top: 20px;
        margin-bottom: 20px
        margin-right: auto;
        border: 1px solid #e8e8e8;
        width: 100vw;
        left: 50%;
        right: 50%;
        margin-left: -2vw;
        margin-right: -50vw;
    }

    .box-title h2 {
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
    margin: 0;
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
    top: -5px;
    min-width: 205px;
    left: -9px;    
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
                <div class="loadeding"></div>
            </div>
        </div>
    </div>
</div>

<div class="container">

<div class="block block_4">
    <!-- Listing tabs -->
    <div class="module custom_listingtab_h5 default-nav">
        <div class="modcontent">
            <div id="so_listing_tabs_4" class="so-listing-tabs first-load">
                <div class="loadeding"></div>
                <div class="ltabs-wrap products-list grid">
                    <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="5" data-md="4" data-sm="3"  data-xxs="3" data-xs="1" data-margin="0">
                        <!--Begin Tabs-->
                        <div class="ltabs-tabs-wrap">
                            <span class="ltabs-tab-selected">Tentang Promo</span> <span class="ltabs-tab-arrow">▼</span>
                            <ul class="ltabs-tabs cf font-ct list-sub-cat">
                                <li class="ltabs-tab tab-sel" data-active-content=".items-category-71"> <span class="ltabs-tab-label">Tentang Promo</span> </li>
                                <li class="ltabs-tab"  data-active-content=".items-category-72"> <span class="ltabs-tab-label">Syarat & Ketentuan</span> </li>
                            </ul>

                        </div>
                        <!-- End Tabs-->
                    </div>
                    <div class="wap-listing-tabs products-list grid">
                        <div class="ltabs-items-container" style="position: unset !important; margin-bottom: 20px;">
                            <!--Begin Items-->
                            <div class="ltabs-items ltabs-items-selected items-category-71" data-total="8">
                                <?php foreach($promotion['voucher_details'] as $vals):?>
                                  <div class="box-title font-ct" style="width: 204px; display:inline-block !important;">
                                        <h2 class="modtitle">Produk Teratas</h2>
                                    </div>

                                    <h3 class="modtitles" style="display:inline-block!important;"><span>Kategori <?php echo $vals['product_category']['name']; ?> Pada Fashion Wanita</span></h3>

                                <?php
                                    $chunk = array_chunk($vals['product_category']['products'],5);
                                ?>
                                <?php foreach($chunk as $val):?>
                                <div class="ltabs-items-inner ltabs-slider">

                                    <?php foreach($val as $v):?>
                                    <div class="ltabs-item products">
                                        <div class="item-inner product-thumb transition product-layout">
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
                                    </div>

                                    <?php endforeach;?>

                                </div>
                                <?php endforeach;?>
                                <?php endforeach;?>
                            </div>
                            <div class="ltabs-items items-category-72 grid" data-total="8">
                                <div class="ltabs-loading"></div>
                                <div class="short_description form-group">
                                    <h3>SYARAT & KETENTUAN UMUM :</h3>
                                    <?php echo $promotion['tos'];?>

                                    <div class="alert alert-warning">
                                        Dengan mengikuti promo ini, customer dianggap mengerti dan menyetujui semua syarat & ketentuan berlaku.<br><br>
                                        Zolaku.com berhak secara sepihak membatalkan pesanan dan/atau menonaktifkan voucher apabila tidak sesuai syarat & ketentuan berlaku dan/atau ditemukan adanya indikasi kecurangan/pelanggaran yang merugikan pihak Zolaku.com.
                                    </div>
                                </div>
                            </div>
                            <!--End Items-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Listing tabs -->
</div>
</div>
