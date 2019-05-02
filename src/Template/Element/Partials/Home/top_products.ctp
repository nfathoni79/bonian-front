<style>
  div.module.custom-listingtab .owl2-controls .owl2-nav {
        position: absolute;
        top: -12px;
        right: 15px;
  }
  .products-list .product-layout .product-item-container{
        box-shadow:none !important;
        max-height: 270px;
        min-height: 170px;
        margin: 10px !important;
  }
</style>
<div class="card-wrapper" >
    <!-- Listing tabs -->
    <div class="module custom-listingtab top-product-home default-nav" style="margin-top: -20px; margin-left: -20px">
      <div class="box-title font-ct">
            <h2 class="modtitle">Produk Teratas</h2>
        </div>
        <div class="modcontent">
            <div id="so_listing_tabs_1" class="so-listing-tabs first-load">
                <div class="loadeding"></div>
                <div class="ltabs-wrap">
                    <div class="ltabs-tabs-container" style="; margin-bottom: 30px;" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="5" data-md="4" data-sm="3"  data-xxs="3" data-xs="1" data-margin="20" data-autoheight="yes">
                        <!--Begin Tabs-->
                        <div class="ltabs-tabs-wrap">
                            <span class="ltabs-tab-selected">Penjualan Terbaik</span> <span class="ltabs-tab-arrow">▼</span>
                            <ul class="ltabs-tabs cf font-ct list-sub-cat">
                                <li class="ltabs-tab tab-sel toptab"data-category-id="bestseller" data-url="home/top/" data-active-content=".items-category-bestseller"> <span class="ltabs-tab-label">Penjualan Terbaik</span> </li>
                                <li class="ltabs-tab toptab" data-category-id="popularproduct" data-url="home/top/" data-active-content=".items-category-popularproduct"> <span class="ltabs-tab-label">Produk Populer</span> </li>
                                <li class="ltabs-tab toptab" data-category-id="arrivals" data-url="home/top/" data-active-content=".items-category-arrivals"> <span class="ltabs-tab-label">Produk Terbaru</span> </li>
                            </ul>

                        </div>
                        <!-- End Tabs-->
                    </div>
                    <div class="wap-listing-tabs products-list grid">
                        <div class="ltabs-items-container">
                            <!--Begin Items-->

                            <!-- Best seller-->
                            <div class="ltabs-items ltabs-items-selected items-category-bestseller" data-total="16">
                                <div class="ltabs-items-inner ltabs-slider">
                                    <?php foreach($topProducts as $vals): ?>
                                    <div class="ltabs-item products">
                                        <div class="item-inner product-thumb transition product-layout">
                                            <div class="product-item-container" style="min-height: 200px; ">
                                                <div class="left-block left-b">
                                                    <div class="product-image-container">
                                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug']]); ?>" target="_self" title="<?= h($vals['name']); ?>">
                                                            <?php foreach($vals['images'] as $image) : ?>
                                                            <img src="<?= $this->Url->build($_basePath . 'images/213x150/' . $image); ?>" data-image-name="<?= $image; ?>"  class="img-responsive" alt="image">
                                                            <?php break; endforeach; ?>
                                                        </a>
                                                    </div>
                                                    <div class="box-label">
                                                        <?php $dics = 100 - (($vals['price_sale'] / $vals['price']) * 100);?>
                                                        <?php if($vals['price_sale'] != $vals['price']):?>
                                                        <span class="label-product label-sale"> <?php echo  $this->Number->precision($dics, 0);?>% </span>
                                                        <?php endif;?>
                                                        <?php if($vals['is_new']): ?>
                                                        <span class="label-product label-new"> New </span>
                                                        <?php endif;?>
                                                    </div>
                                                    <!--quickview-->
                                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" style="margin-left:-40px;" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                                        <button type="button" onclick="wishlist.add('<?= ($vals['id']); ?>', this);" class="iframe-link btn-button quickview quickview_handler visible-lg" style="margin-left:10px;" title="Wishlist" data-fancybox-type="iframe"><i class="fa fa-heart"></i><span></span></button>
                                                    <!--end quickview-->
                                                </div>

                                                <div class="right-block right-b" style="min-height: 120px;">
                                                    <div class="row">
                                                        <div class="col-lg-7"  style="width: 47.333333%!important; display: inline-block;">
                                                            <div class="rating" style="margin-left: 15px;">
                                                                <?php
                                                                    $rate = $vals['rating'];
                                                                    for ($x = 0; $x < $rate; $x++) {
                                                                        echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>';
                                                                    }
                                                                    for ($x = 0; $x < 5-$rate; $x++) {
                                                                    echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>';
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5" style="width: 50.333333%!important display: inline-block;"><span class="badge" style="margin-top: 0px !important;"><?= $vals['point']; ?> Poin</span></div>
                                                    </div>
                                                    <div class="caption">
                                                        <h4><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug']]); ?>" title="<?= h($vals['name']); ?>" target="_self">  <?php echo $this->Text->truncate(
                                                            h($vals['name']),
                                                            25,
                                                            [
                                                            'ellipsis' => '...',
                                                            'exact' => false
                                                            ]
                                                            );?>
                                                        </a></h4>

                                                        <div class="price">
                                                            <span class="price-new">Rp. <?= $this->Number->format($vals['price_sale']); ?></span>
                                                            <?php if($vals['price_sale'] != $vals['price']):?>
                                                            <span class="price-old">Rp. <?= $this->Number->format($vals['price']); ?></span>
                                                            <?php endif;?>
                                                        </div>

                                                        <div class="button-group so-quickview cartinfo--static share-container">
                                                            <span class="zl-tx-red tx-medium">Bagikan produk ini</span>
                                                            <div class="row pd-0">
                                                              <button type="button" class="btn-share b-ig igShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-instagram"></i></button>
                                                              <button type="button" class="btn-share b-fb fbShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-facebook"></i></button>
                                                              <button type="button" class="btn-share b-wc smsShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fas fa-comment-dots"></i></button>
                                                            </div>
                                                            <div class="row pd-0">
                                                              <button type="button" class="btn-share b-wa waShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-whatsapp"></i></button>
                                                              <button type="button" class="btn-share b-ln lineShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-line"></i></button>
                                                              <button type="button" class="btn-share b-tw twitterShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-twitter"></i></button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>

                            <!-- Popular Products -->
                            <div class="ltabs-items items-category-popularproduct grid" data-total="16" >
                              <div class="ltabs-items-inner ltabs-slider">
                                  <?php foreach($popularProducts as $vals): ?>
                                  <div class="ltabs-item products">
                                      <div class="item-inner product-thumb transition product-layout">
                                          <div class="product-item-container" style="min-height: 200px; ">
                                              <div class="left-block left-b">
                                                  <div class="product-image-container">
                                                      <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug']]); ?>" target="_self" title="<?= h($vals['name']); ?>">
                                                          <?php foreach($vals['images'] as $image) : ?>
                                                          <img src="<?= $this->Url->build($_basePath . 'images/213x150/' . $image); ?>" data-image-name="<?= $image; ?>"  class="img-responsive" alt="image">
                                                          <?php break; endforeach; ?>
                                                      </a>
                                                  </div>
                                                  <div class="box-label">
                                                      <?php $dics = 100 - (($vals['price_sale'] / $vals['price']) * 100);?>
                                                      <?php if($vals['price_sale'] != $vals['price']):?>
                                                      <span class="label-product label-sale"> <?php echo  $this->Number->precision($dics, 0);?>% </span>
                                                      <?php endif;?>
                                                      <?php if($vals['is_new']): ?>
                                                      <span class="label-product label-new"> New </span>
                                                      <?php endif;?>
                                                  </div>
                                                  <!--quickview-->
                                                      <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" style="margin-left:-40px;" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                                      <button type="button" onclick="wishlist.add('<?= ($vals['id']); ?>', this);" class="iframe-link btn-button quickview quickview_handler visible-lg" style="margin-left:10px;" title="Wishlist" data-fancybox-type="iframe"><i class="fa fa-heart"></i><span></span></button>
                                                  <!--end quickview-->
                                              </div>

                                              <div class="right-block right-b" style="min-height: 120px;">
                                                  <div class="row">
                                                      <div class="col-lg-7"  style="width: 47.333333%!important; display: inline-block;">
                                                          <div class="rating" style="margin-left: 15px;">
                                                              <?php
                                                                  $rate = $vals['rating'];
                                                                  for ($x = 0; $x < $rate; $x++) {
                                                                      echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>';
                                                                  }
                                                                  for ($x = 0; $x < 5-$rate; $x++) {
                                                                  echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>';
                                                                  }
                                                              ?>
                                                          </div>
                                                      </div>
                                                      <div class="col-lg-5" style="width: 50.333333%!important display: inline-block;"><span class="badge" style="margin-top: 0px !important;"><?= $vals['point']; ?> Poin</span></div>
                                                  </div>
                                                  <div class="caption">
                                                      <h4><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug']]); ?>" title="<?= h($vals['name']); ?>" target="_self">  <?php echo $this->Text->truncate(
                                                          h($vals['name']),
                                                          30,
                                                          [
                                                          'ellipsis' => '...',
                                                          'exact' => false
                                                          ]
                                                          );?>
                                                      </a></h4>

                                                      <div class="price">
                                                          <span class="price-new">Rp. <?= $this->Number->format($vals['price_sale']); ?></span>
                                                          <?php if($vals['price_sale'] != $vals['price']):?>
                                                          <span class="price-old">Rp. <?= $this->Number->format($vals['price']); ?></span>
                                                          <?php endif;?>
                                                      </div>

                                                      <div class="button-group so-quickview cartinfo--static share-container">
                                                          <span class="zl-tx-red tx-medium">Bagikan produk ini</span>
                                                          <div class="row pd-0">
                                                            <button type="button" class="btn-share b-ig igShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-instagram"></i></button>
                                                            <button type="button" class="btn-share b-fb fbShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-facebook"></i></button>
                                                            <button type="button" class="btn-share b-wc smsShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fas fa-comment-dots"></i></button>
                                                          </div>
                                                          <div class="row pd-0">
                                                            <button type="button" class="btn-share b-wa waShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-whatsapp"></i></button>
                                                            <button type="button" class="btn-share b-ln lineShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-line"></i></button>
                                                            <button type="button" class="btn-share b-tw twitterShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-twitter"></i></button>
                                                          </div>

                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <?php endforeach;?>
                              </div>
                            </div>


                            <!-- New Arrivals -->
                            <div class="ltabs-items  items-category-arrivals grid" data-total="16">
                              <div class="ltabs-items-inner ltabs-slider">
                                  <?php foreach($newProducts as $vals): ?>
                                  <div class="ltabs-item products">
                                      <div class="item-inner product-thumb transition product-layout">
                                          <div class="product-item-container" style="min-height: 200px;">
                                              <div class="left-block left-b">
                                                  <div class="product-image-container">
                                                      <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug']]); ?>" target="_self" title="<?= h($vals['name']); ?>">
                                                          <?php foreach($vals['images'] as $image) : ?>
                                                          <img src="<?= $this->Url->build($_basePath . 'images/213x150/' . $image); ?>" data-image-name="<?= $image; ?>"  class="img-responsive" alt="image">
                                                          <?php break; endforeach; ?>
                                                      </a>
                                                  </div>
                                                  <div class="box-label">
                                                      <?php $dics = 100 - (($vals['price_sale'] / $vals['price']) * 100);?>
                                                      <?php if($vals['price_sale'] != $vals['price']):?>
                                                      <span class="label-product label-sale"> <?php echo  $this->Number->precision($dics, 0);?>% </span>
                                                      <?php endif;?>
                                                      <?php if($vals['is_new']): ?>
                                                      <span class="label-product label-new"> New </span>
                                                      <?php endif;?>
                                                  </div>
                                                  <!--quickview-->
                                                      <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" style="margin-left:-40px;" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                                      <button type="button" onclick="wishlist.add('<?= ($vals['id']); ?>', this);" class="iframe-link btn-button quickview quickview_handler visible-lg" style="margin-left:10px;" title="Wishlist" data-fancybox-type="iframe"><i class="fa fa-heart"></i><span></span></button>
                                                  <!--end quickview-->
                                              </div>

                                              <div class="right-block right-b" style="min-height: 120px;">
                                                  <div class="row">
                                                      <div class="col-lg-7"  style="width: 47.333333%!important; display: inline-block;">
                                                          <div class="rating" style="margin-left: 15px;">
                                                              <?php
                                                                  $rate = $vals['rating'];
                                                                  for ($x = 0; $x < $rate; $x++) {
                                                                      echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>';
                                                                  }
                                                                  for ($x = 0; $x < 5-$rate; $x++) {
                                                                  echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>';
                                                                  }
                                                              ?>
                                                          </div>
                                                      </div>
                                                      <div class="col-lg-5" style="width: 50.333333%!important display: inline-block;"><span class="badge" style="margin-top: 0px !important;"><?= $vals['point']; ?> Poin</span></div>
                                                  </div>
                                                  <div class="caption">
                                                      <h4><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug']]); ?>" title="<?= h($vals['name']); ?>" target="_self">  <?php echo $this->Text->truncate(
                                                          h($vals['name']),
                                                          30,
                                                          [
                                                          'ellipsis' => '...',
                                                          'exact' => false
                                                          ]
                                                          );?>
                                                      </a></h4>

                                                      <div class="price">
                                                          <span class="price-new">Rp. <?= $this->Number->format($vals['price_sale']); ?></span>
                                                          <?php if($vals['price_sale'] != $vals['price']):?>
                                                          <span class="price-old">Rp. <?= $this->Number->format($vals['price']); ?></span>
                                                          <?php endif;?>
                                                      </div>

                                                      <div class="button-group so-quickview cartinfo--static share-container">
                                                          <button type="button" class="btn-share b-ig igShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-instagram"></i></button>
                                                          <button type="button" class="btn-share b-fb fbShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-facebook"></i></button>
                                                          <button type="button" class="btn-share b-wc smsShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fas fa-comment-dots"></i></button>
                                                          <button type="button" class="btn-share b-wa waShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-whatsapp"></i></button>
                                                          <button type="button" class="btn-share b-ln lineShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-line"></i></button>
                                                          <button type="button" class="btn-share b-tw twitterShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug'],'prefix' => false],true);?>" data-title="<?= $vals['name'];?>" data-price="<?= $vals['price_sale'];?>"><i class="fab fa-twitter"></i></button>

                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <?php endforeach;?>
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
