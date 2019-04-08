
<div class="block block_3">
    <!-- Listing tabs -->
    <div class="module custom-listingtab default-nav">
        <div class="box-title font-ct">
            <h2 class="modtitle">Top Products</h2>
        </div>
        <div class="modcontent">
            <div id="so_listing_tabs_1" class="so-listing-tabs first-load">
                <div class="loadeding"></div>
                <div class="ltabs-wrap">
                    <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="5" data-md="4" data-sm="3"  data-xxs="3" data-xs="1" data-margin="0">
                        <!--Begin Tabs-->
                        <div class="ltabs-tabs-wrap">
                            <span class="ltabs-tab-selected">Best sellers</span> <span class="ltabs-tab-arrow">▼</span>
                            <ul class="ltabs-tabs cf font-ct list-sub-cat">
                                <li class="ltabs-tab tab-sel" data-category-id="bestseller" data-url="home/top/" data-active-content=".items-category-11"> <span class="ltabs-tab-label">Best sellers</span> </li>
                                <li class="ltabs-tab" data-category-id="mostratting" data-url="home/top/" data-active-content=".items-category-12"> <span class="ltabs-tab-label">Most Rating</span> </li>
                                <li class="ltabs-tab" data-category-id="arrivals" data-url="home/top/" data-active-content=".items-category-13"> <span class="ltabs-tab-label">New Arrivals</span> </li>
                            </ul>

                        </div>
                        <!-- End Tabs-->
                    </div>
                    <div class="wap-listing-tabs products-list grid">
                            <!--Begin Items-->
                            <div class="ltabs-items ltabs-items-selected items-category-11" data-total="16">

                                <div class="ltabs-items-inner ltabs-slider">
                                    <?php foreach($topProducts['new_arrivals'] as $vals):?>
                                    <div class="ltabs-item">
                                        <div class="item-inner product-thumb transition product-layout">
                                            <div class="product-item-container">
                                                <div class="left-block left-b">
                                                    <div class="product-image-container">
                                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug']]); ?>" target="_self" title="<?= h($vals['name']); ?>">
                                                            <?php foreach($vals['images'] as $image) : ?>
                                                            <img src="<?= $this->Url->build($_basePath . 'images/213x150/' . $image); ?>"  class="img-responsive" alt="image">
                                                            <?php break; endforeach; ?>
                                                        </a>
                                                    </div>

                                                    <!--quickview-->
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug']]); ?>" title="<?= h($vals['name']); ?>" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                                    <!--end quickview-->
                                                </div>
                                                <div class="right-block right-b">

                                                    <div class="caption">
                                                        <h4><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug']]); ?>" title="<?= h($vals['name']); ?>" target="_self"><?= h($vals['name']); ?> </a></h4>

                                                        <div class="price">
                                                            <span class="price-new">Rp. <?= $this->Number->format($vals['price_sale']); ?></span>
                                                            <span class="price-old">Rp. <?= $this->Number->format($vals['price']); ?></span>
                                                        </div>

                                                        <div class="button-group so-quickview cartinfo--static">
                                                            <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('<?= ($vals['id']); ?>');">  <i class="fa fa-shopping-basket"></i>
                                                                <span>Add to cart </span>
                                                            </button>
                                                            <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('<?= ($vals['id']); ?>');"><i class="fa fa-heart"></i><span></span>
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
                            </div>
                            <div class="ltabs-items items-category-12 grid" data-total="16">
                                <div class="ltabs-loading"></div>

                            </div>
                            <div class="ltabs-items  items-category-13 grid" data-total="16">
                                <div class="ltabs-loading"></div>
                            </div>
                            <!--End Items-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Listing tabs -->
</div>