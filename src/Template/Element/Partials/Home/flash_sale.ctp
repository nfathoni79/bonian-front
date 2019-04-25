<?php if ($flashSales['end']) : ?>
<!-- flash sale Products -->
<div class="card-wrapper">
    <div class="card-wrapper-title"><i class="fa fa-tags"></i> Flash sale <small class="contertime" style="font-size: 12px; padding-left: 10px;">Berakhir dalam </small><span id="flashsale-timer" data-timer="<?= $flashSales['end']; ?>"></div>
    <div class="related flash-sale titleLine products-list grid module " style="margin-top: 20px;">
        <div id="so_extra_slider_1" class="so-extraslider" >
            <div class="releate-products yt-content-slider products-list" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="yes" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="20" data-items_column0="5" data-items_column1="3" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
                <?php foreach($flashSales['product_deal_details'] as $flash_sale) : ?>
                <div class="item products">
                    <div class="product-layout">
                        <div class="product-item-container">
                            <div class="left-block left-b">
                                <?php /*
                                <div class="product-card__gallery product-card__left">
                                    <div class="item-img thumb-active" data-src="image/catalog/demo/product/electronic/600x600/9.jpg"><img src="image/catalog/demo/product/electronic/90x90/9.jpg"  alt="image"></div>
                                    <div class="item-img" data-src="image/catalog/demo/product/electronic/600x600/10.jpg"><img src="image/catalog/demo/product/electronic/90x90/10.jpg"  alt="image"></div>
                                    <div class="item-img" data-src="image/catalog/demo/product/electronic/600x600/11.jpg"><img src="image/catalog/demo/product/electronic/90x90/11.jpg"  alt="image"></div>
                                </div>*/ ?>
                                <div class="product-image-container">
                                    <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $flash_sale['product']['slug']]); ?>" title="<?= h($flash_sale['product']['name']); ?>" target="_self">
                                        <?php foreach($flash_sale['product']['images'] as $image) : ?>
                                            <img src="<?= $this->Url->build($_basePath . 'images/213x150/' . $image); ?>" data-image-name="<?= $image; ?>"  class="img-responsive" alt="image">
                                            <?php break; endforeach; ?>
                                    </a>
                                </div>
                                <div class="box-label"> <span class="label-product label-sale"> <?= $flash_sale['product']['percent']; ?>% </span></div>

                                <!--quickview-->
                                <a class="iframe-link btn-button quickview quickview_handler visible-lg" style="margin-left:-40px;" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                <button type="button" style="margin-left:10px;" onclick="wishlist.add('<?= $flash_sale['product']['id']; ?>', this);" class="iframe-link btn-button quickview quickview_handler visible-lg" title="Wishlist" data-fancybox-type="iframe"><i class="fa fa-heart"></i><span></span></button>
                                <!--end quickview-->
                            </div>
                            <div class="right-block right-b" style="min-height: 160px;">
                                <?php /*<ul class="colorswatch">
                                    <li class="item-img active" data-src="image/catalog/demo/product/electronic/600x600/9.jpg"><a href="javascript:void(0);" title="gray"><img src="image/demo/colors/gray.jpg"  alt="image"></a></li>
                                    <li class="item-img" data-src="image/catalog/demo/product/electronic/600x600/10.jpg"><a href="javascript:void(0);" title="pink"><img src="image/demo/colors/pink.jpg"  alt="image"></a></li>
                                    <li class="item-img" data-src="image/catalog/demo/product/electronic/600x600/11.jpg"><a href="javascript:void(0);" title="black"><img src="image/demo/colors/black.jpg"  alt="image"></a></li>
                                </ul>*/ ?>

                                <div class="caption">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="progress" style="margin-top: 10px;margin-bottom: 0px; height: 10px !important;">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?= $flash_sale['product']['salestock']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= $flash_sale['product']['salestock']; ?>%"></div>
                                            </div>
                                            <small><?= $flash_sale['product']['noted']; ?></small>
                                        </div>
                                        <div class="col-lg-5"><span class="badge u-bg--badge__blue"><?= $flash_sale['product']['point']; ?> Poin</span></div>
                                    </div>
                                    <h4 class="text-justify"><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $flash_sale['product']['slug']]); ?>" title="<?= h($flash_sale['product']['name']); ?>" target="_self">
                                            <?php echo $this->Text->truncate(
                                                h($flash_sale['product']['name']),
                                                25,
                                                [
                                                    'ellipsis' => '...',
                                                    'exact' => false
                                                ]
                                            );?>
                                        </a></h4>

                                    <div class="price text-left">
                                        <span class="price-new">Rp. <?= $this->Number->format($flash_sale['product']['price_sale']); ?></span>
                                        <?php if($flash_sale['product']['price_sale'] != $flash_sale['product']['price']):?>
                                            <span class="price-old">Rp. <?= $this->Number->format($flash_sale['product']['price']); ?></span>
                                        <?php endif;?>
                                    </div>
                                    <div class="button-group so-quickview cartinfo--static share-container" style="margin-left: 10px; width: 90%;">
                                        <button type="button" class="btn-share" style="background-color:#2c558b; padding-left: 12px; padding-right: 12px;" title="Share" onclick=""><i class="fa fa-facebook"></i><span> </span>
                                        </button>
                                        <button type="button" class="btn-share" style="background-color:#1e99d0; padding-left: 9px; padding-right: 9px;" title="Share" onclick=""><i class="fa fa-twitter"></i>
                                        </button>
                                        <button type="button" class="btn-share" style="background-color:#6e5f4c; padding-left: 10px; padding-right: 10px;" title="Share" onclick=""><i class="fa fa-instagram"></i>
                                        </button>
                                        <button type="button" class="btn-share" style="background-color:#79bc25; padding-left: 10px; padding-right: 10px;" title="Share" onclick=""><i class="fa fa-whatsapp"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>

<!-- end flash sale  Products-->
<?php $this->append('script'); ?>
<script>
    var flash_sale = $('#flashsale-timer');
    flash_sale.countdown(new Date(flash_sale.data('timer')), function(event) {
        $(this).text(
            event.strftime('%D days %H:%M:%S')
        );
    }).on('finish.countdown', function(event) {

    });
</script>
<?php $this->end(); ?>
<?php endif; ?>
