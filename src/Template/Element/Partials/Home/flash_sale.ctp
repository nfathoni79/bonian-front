<?php $this->append('style'); ?>
<?php
$this->Html->css([
'/css/custom/flash-sale.css',
], ['block' => true]);
?>
<?php $this->end(); ?>


<?php if ($flashSales['end']) : ?>
<!-- flash sale Products -->
<div class="card-wrapper c-flash-wrapper">
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
                                <!-- <div class="wishlist-label">
                                  <button type="button" onclick="wishlist.add('<?= $flash_sale['product']['id']; ?>', this);" class="iframe-link btn-button zl-bg-red-light bd-0 tx-white" title="Wishlist" data-fancybox-type="iframe"><i class="fa fa-heart"></i><span></span></button>
                                </div> -->
                                <div class="box-label"> <span class="product-ribbon"> <?= $flash_sale['product']['percent']; ?>% </span></div>

                                <!--quickview-->
                                <!--end quickview-->
                            </div>
                            <div class="right-block right-b">
                                <?php /*<ul class="colorswatch">
                                    <li class="item-img active" data-src="image/catalog/demo/product/electronic/600x600/9.jpg"><a href="javascript:void(0);" title="gray"><img src="image/demo/colors/gray.jpg"  alt="image"></a></li>
                                    <li class="item-img" data-src="image/catalog/demo/product/electronic/600x600/10.jpg"><a href="javascript:void(0);" title="pink"><img src="image/demo/colors/pink.jpg"  alt="image"></a></li>
                                    <li class="item-img" data-src="image/catalog/demo/product/electronic/600x600/11.jpg"><a href="javascript:void(0);" title="black"><img src="image/demo/colors/black.jpg"  alt="image"></a></li>
                                </ul>*/ ?>

                                <div class="caption">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?= $flash_sale['product']['salestock']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= $flash_sale['product']['salestock']; ?>%"></div>
                                            </div>
                                            <small><?= $flash_sale['product']['noted']; ?></small>
                                        </div>
                                    </div>
                                    <div class="row mg-l-0">
                                      <h4 class="tx-bold"><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $flash_sale['product']['slug']]); ?>" title="<?= h($flash_sale['product']['name']); ?>" target="_self">
                                              <?php echo $this->Text->truncate(
                                                  h($flash_sale['product']['name']),
                                                  30,
                                                  [
                                                      'ellipsis' => '...',
                                                      'exact' => false
                                                  ]
                                              );?>
                                          </a></h4>

                                      <div class="col-lg-12 price text-left p-0">
                                          <span class="price-new tx-14-force">Rp. <?= $this->Number->format($flash_sale['product']['price_sale']); ?></span>
                                          <?php if($flash_sale['product']['price_sale'] != $flash_sale['product']['price']):?>
                                              <span class="price-old tx-12-force">Rp. <?= $this->Number->format($flash_sale['product']['price']); ?></span>
                                          <?php endif;?>
                                      </div>
                                    </div>

                                    <div class="button-group so-quickview cartinfo--static share-container">
                                        <div class="row pd-0">
                                          <button type="button" class="btn-share b-fb fbShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $flash_sale['product']['slug'],'prefix' => false],true);?>" data-title="<?= $flash_sale['product']['name'];?>" data-price="<?= $flash_sale['product']['price_sale'];?>"><i class="fab fa-facebook"></i></button>
                                          <button type="button" class="btn-share b-wa waShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $flash_sale['product']['slug'],'prefix' => false],true);?>" data-title="<?= $flash_sale['product']['name'];?>" data-price="<?= $flash_sale['product']['price_sale'];?>"><i class="fab fa-whatsapp"></i></button>
                                          <button type="button" class="btn-share b-ln lineShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $flash_sale['product']['slug'],'prefix' => false],true);?>" data-title="<?= $flash_sale['product']['name'];?>" data-price="<?= $flash_sale['product']['price_sale'];?>"><i class="fab fa-line"></i></button>
                                          <button type="button" class="btn-share b-tw twitterShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $flash_sale['product']['slug'],'prefix' => false],true);?>" data-title="<?= $flash_sale['product']['name'];?>" data-price="<?= $flash_sale['product']['price_sale'];?>"><i class="fab fa-twitter"></i></button>
                                        </div>
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
