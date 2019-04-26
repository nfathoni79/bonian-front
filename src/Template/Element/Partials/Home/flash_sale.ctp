<style>
    .progress{
          height: 10px !important;
          margin-bottom: 0;
    }
    .card-wrapper-title {
          background-image: linear-gradient(to right, #e22b2b, #8f1b1d);
          width: 360px;
          padding: 12px;
          padding-left: 20px;
          margin-top: -20px;
          margin-left: -20px;
          border: 5px;
          border-radius: 10px 0px 15px 0px;
          -webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.12);
          -moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.12);
          box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.12);
          color: white;
          font-size: 18px;
    }
    .products-list.grid .product-item-container .right-block {
          clear: both;
          padding: 10px 5px 20px 4px;
          text-align: left;
          position: relative;
    }
    .badge-wrapper {
          text-align: right;
          right: 10px;
    }
    .badge {
          min-width: 63px;
          padding: 5px 10px;
          margin-top: 0;
          border-radius: 20px;
    }
    div.col-lg-7{
          padding: 0;
    }
    .share-container{
          background: #fff;
          bottom: 0px !important;
          box-shadow: unset;
          width: 100%;
          height: 100%;
          border: 0px !important;
          border-radius: 0px !important;
    }
    .btn-share {
          width: 30%;
          height: 50%;
          margin:  2px;
          border: none;
          color: white;
          text-align: center;
          text-decoration: none;
          font-size: 200%;
          padding-left: 10px;
          padding-right: 10px;
          cursor: pointer;
          border-radius: 4px;
      }
      .b-ig{
          background-image: linear-gradient(#ee3381, #b2568d, #f6944a);
      }
      .b-fb{
          background-color: #2861aa;
      }
      .b-wc{
          background-color: #1c8aa6;
      }
      .b-wa{
          background-color: #64bb54;
      }
      .b-ln{
          background-color: #3acd03;
      }
      .b-tw{
          background-color: #37b2db;
      }
</style>

<?php if ($flashSales['end']) : ?>
<!-- flash sale Products -->
<div class="card-wrapper c-flash-wrapper">
    <div class="card-wrapper-title"><i class="fa fa-tags"></i> Flash sale <small class="contertime" style="font-size: 12px; padding-left: 10px;">Berakhir dalam </small><span id="flashsale-timer" data-timer="<?= $flashSales['end']; ?>"></div>
    <div class="related flash-sale titleLine products-list grid module " style="margin-top: 20px;">
        <div id="so_extra_slider_1" class="so-extraslider" >
            <div class="releate-products yt-content-slider products-list" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="yes" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="20" data-items_column0="4" data-items_column1="3" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
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
                            <div class="right-block right-b">
                                <?php /*<ul class="colorswatch">
                                    <li class="item-img active" data-src="image/catalog/demo/product/electronic/600x600/9.jpg"><a href="javascript:void(0);" title="gray"><img src="image/demo/colors/gray.jpg"  alt="image"></a></li>
                                    <li class="item-img" data-src="image/catalog/demo/product/electronic/600x600/10.jpg"><a href="javascript:void(0);" title="pink"><img src="image/demo/colors/pink.jpg"  alt="image"></a></li>
                                    <li class="item-img" data-src="image/catalog/demo/product/electronic/600x600/11.jpg"><a href="javascript:void(0);" title="black"><img src="image/demo/colors/black.jpg"  alt="image"></a></li>
                                </ul>*/ ?>

                                <div class="caption">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?= $flash_sale['product']['salestock']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= $flash_sale['product']['salestock']; ?>%"></div>
                                            </div>
                                            <small><?= $flash_sale['product']['noted']; ?></small>
                                        </div>
                                        <div class="col-lg-5 badge-wrapper p-0">
                                            <span class="badge u-bg--badge__blue"><?= $flash_sale['product']['point']; ?> Poin</span>
                                        </div>
                                    </div>
                                    <h4 class="text-justify"><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $flash_sale['product']['slug']]); ?>" title="<?= h($flash_sale['product']['name']); ?>" target="_self">
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
                                        <span class="price-new">Rp. <?= $this->Number->format($flash_sale['product']['price_sale']); ?></span>
                                        <?php if($flash_sale['product']['price_sale'] != $flash_sale['product']['price']):?>
                                            <span class="price-old">Rp. <?= $this->Number->format($flash_sale['product']['price']); ?></span>
                                        <?php endif;?>
                                    </div>
                                    <div class="button-group so-quickview cartinfo--static share-container">
                                        <button class="btn-share b-ig"><i class="fab fa-instagram"></i></button>
                                        <button class="btn-share b-fb"><i class="fab fa-facebook"></i></button>
                                        <button class="btn-share b-wc"><i class="fas fa-comment-dots"></i></button>
                                        <button class="btn-share b-wa"><i class="fab fa-whatsapp"></i></button>
                                        <button class="btn-share b-ln"><i class="fab fa-line"></i></button>
                                        <button class="btn-share b-tw"><i class="fab fa-twitter"></i></button>
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
