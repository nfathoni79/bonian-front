
<div class="module best-seller best-seller-custom" style="margin-top: 20px;">
    <h3 class="modtitle" style="padding: 10px !important;">
        <span>Flash Sale <small class="contertime">Berakhir dalam 01:00:00</small></span>
    </h3> 
    <div class="modcontent" style="background-color: #ffffff;">
        <div id="so_extra_slider_1" class="so-extraslider" >
            <!-- Begin extraslider-inner -->
            <div class="yt-content-slider extraslider-inner" data-rtl="yes" data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="5" data-items_column1="5" data-items_column2="4" data-items_column3="3" data-items_column4="2" data-arrows="yes" data-lazyload="yes" data-loop="no" data-buttonpage="top">
                <?php foreach($flashSales['product_deal_details'] as $flash_sale) : ?>
                <div class="item ">
                    <div class="item-wrap style1">
                        <div class="item-wrap-inner">

                            <div class="media-body">
                                <div class="product-item-container">
                                    <div class="left-block left-b">
                                        <div class="product-image-container">
                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $flash_sale['product']['slug']]); ?>" title="<?= h($flash_sale['product']['name']); ?>" target="_self">
                                                <?php foreach($flash_sale['product']['images'] as $image) : ?>
                                                <img src="<?= $this->Url->build($_basePath . 'images/213x150/' . $image); ?>"  class="img-responsive" alt="image">
                                                <?php break; endforeach; ?>
                                            </a>
                                        </div>
                                        <!--quickview-->
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                        <!--end quickview-->
                                    </div>
                                    <div class="right-block right-b">
                                        <div class="box-label"> <span class="label-product label-sale"> <?= $flash_sale['product']['percent']; ?>% </span></div>
                                        <div class="caption">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="progress" style="margin-top: 10px;margin-bottom: 0px; height: 10px !important;">
                                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?= $flash_sale['product']['salestock']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= $flash_sale['product']['salestock']; ?>%"></div>
                                                    </div>
                                                    <small><?= $flash_sale['product']['noted']; ?></small>
                                                </div>
                                                <div class="col-lg-5"><span class="badge"><?= $flash_sale['product']['point']; ?> Poin</span></div>
                                            </div>

                                            <h4><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $flash_sale['product']['slug']]); ?>" title="<?= h($flash_sale['product']['name']); ?>" target="_self"><?= $flash_sale['product']['name']; ?></a></h4>
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <div class="price">
                                                        <span class="price-old">Rp. <?= $this->Number->format($flash_sale['product']['price']); ?></span><br/>
                                                        <span class="price-new">Rp. <?= $this->Number->format($flash_sale['product']['price_sale']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-share-alt"></i></button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End item-info -->
                        </div>
                    </div>
                    <!-- End item-wrap -->
                </div>
                <?php endforeach; ?>
            </div>
            <!--End extraslider-inner -->
        </div>
    </div>
</div>


