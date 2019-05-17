<div id="content">
    <div class="jumbotron jumbotron-fluid pd-0">
        <div class="block">
            <div class="module sohomepage-slider">
                <div class="yt-content-slider"  data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                    <div class="yt-content-slide">
                        <a title="slide1" href="#"><div class="yt-content-slide"><img src="<?= $this->Url->build($_basePath . 'images/1170x400/'. $banner['banner']['image']); ?>" class="responsive wd-100p"></div></a>
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
            <li class="ft-left wd-50p tx-center item active" data-active-content=".items-category-71"><a data-toggle="tab" href="#tab-product">Tentang Promo</a></li>
            <li class="ft-left wd-50p tx-center item" data-active-content=".items-category-72"><a data-toggle="tab" href="#tab-rules">Syarat & Ketentuan</a></li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content promo-content">
            <div id="tab-product" class="tab-pane fade active in">

                <div class="product-listing">
                    <?php if($promotion['voucher_details']):?>
                    <?php foreach($promotion['voucher_details'] as $vals):?>
                    <!-- loop-1 -->
                    <div class="row card mg-t-30 mg-l-0 mg-r-0">

                        <div class="box-title font-ct d-lg-inline-block" >
                            <h2 class="modtitle"><span>Kategori <?php echo $vals['product_category']['name']; ?> Pada Fashion Wanita</span></h2>
                        </div>
                        <a class="l-detail tx-medium ft-right d-lg-inline-block" href="" >Lihat Selengkapnya</a>
                        <?php
                            $chunk = array_chunk($vals['product_category']['products'],10);
                        ?>
                        <?php foreach($chunk as $val):?>
                        <div class="products-list nopadding-xs so-filter-grid grid">

                            <!--Begin Items-->
                            <?php foreach($val as $v):?>
                            <?php if(!empty($v['product']['name'])):?>
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
                                            <span class="product-ribbon"> <?php echo  $this->Number->precision($dics, 0);?>% </span>
                                            <?php endif;?>
                                            <?php if($vals['is_new']): ?>
                                            <div class="box">
                                              <div class="ribbon ribbon-top-left"><span>NEW</span></div>
                                            </div>
                                            <?php endif;?>
                                        </div>

                                        <!--quickview-->
                                        <!-- <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $v['product']['slug']]); ?>" title="<?= h($v['product']['name']); ?>" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a> -->
                                        <!--end quickview-->

                                    </div>
                                    <div class="right-block right-b">

                                        <div class="caption">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="rating">
                                                        <?php
                                                            $rate = $v['product']['rating'];
                                                            for ($x = 0; $x < $rate; $x++) {
                                                                echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>';
                                                            }
                                                            for ($x = 0; $x < 5-$rate; $x++) {
                                                            echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>';
                                                            }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-5"><span class="mg-t-0-force float-right badge <?= $this->Badge->format($v['product']['point']); ?> "><?= $v['product']['point']; ?> Poin</span></div>

                                            </div>
                                            <h4><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $v['product']['slug']]); ?>" title="<?= h($v['product']['name']); ?>" target="_self">  <?php echo $this->Text->truncate(
                                                h($v['product']['name']),
                                                26,
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
                                            <div class="button-group so-quickview cartinfo--static share-container pd-t-5-force">
                                                <span class="col-md-12 zl-tx-red tx-medium">Bagikan produk ini</span>
                                                <div class="row pd-0">
                                                  <button type="button" class="btn-share b-fb fbShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-facebook"></i></button>
                                                  <button type="button" class="btn-share b-wa waShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-whatsapp"></i></button>
                                                  <button type="button" class="btn-share b-ln lineShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-line"></i></button>
                                                  <button type="button" class="btn-share b-tw twitterShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-twitter"></i></button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
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
