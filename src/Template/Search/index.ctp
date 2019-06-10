<!-- start: main container -->
<div class="main-container product-listing container">
    <div class="row">
        <!-- start: breadcumb -->

        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li><a href="#" class="o-breadcumbs-item">Home</i></a></li>
            </ul>


        </div>
        <!-- end: breadcumb -->

        <!-- start: bagian kiri -->
        <div class="card col-lg-3 content-aside left_column sidebar-offcanvas c-filter pd-15-force">

            <div class="accordion" id="accordionExample275">

              <div class="z-depth-0 bordered">
                <div id="headingOne">
                  <div class="block-categories module mg-b-20-force pd-0-force br-none bs-none">
                      <h3 class="modtitle tx-mont">
                        <button class="btn btn-link tx-bold zl-tx-black pd-0" type="button" data-toggle="collapse" data-target="#collapseOne"
                      aria-expanded="true" aria-controls="collapseOne">
                        Berdasarkan Category
                      </button>
                    </h3>
                  </div>
                </div>
                <div id="collapseOne" class="collapse in" aria-labelledby="headingOne"
                  data-parent="#accordionExample275">
                    <!-- start: componen category -->
                    <div class="table_layout filter-shopby">
                        <div class="table_row">
                            <!-- - - - - - - - - - - - - - category - - - - - - - - - - - - - - - - -->
                            <div class="table_cell mg-0-force pd-0-force">
                                <div id="category_view"></div>
                            </div>
                            <!--/ .table_cell -->
                            <!-- - - - - - - - - - - - - - End category - - - - - - - - - - - - - - - - -->
                        </div>
                    </div>
                    <!-- end: componen category -->
                </div>
              </div>

              <div class="z-depth-0 bordered">
                <div id="headingTwo">
                  <div class="block-categories module mg-b-20-force pd-0-force br-none bs-none">
                      <h3 class="modtitle tx-mont">
                        <button class="btn btn-link tx-bold zl-tx-black pd-0" type="button" data-toggle="collapse" data-target="#collapseTwo"
                      aria-expanded="true" aria-controls="collapseTwo">
                        Berdasarkan harga
                      </button>
                    </h3>
                  </div>
                </div>
                <div id="collapseTwo" class="collapse in" aria-labelledby="headingTwo"
                  data-parent="#accordionExample275">
                    <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->
                    <div class="table_cell pd-20 pd-t-0-force pd-b-0-force">
                        <fieldset>
                            <div id="pricing-range"
                                 class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                <span class="ui-slider-handle ui-state-default ui-corner-all"></span>
                                <span class="ui-slider-handle ui-state-default ui-corner-all"></span>
                            </div>
                            <div class="form-inline range">
                                <div class="form-group" style="margin-bottom: 5px;">
                                    <label class="sr-only" for="filter-input-price-min">Amount (in dollars)</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Rp.</div>
                                        <input type="text"  class="form-control text-right min_value" id="filter-input-price-min" placeholder="Harga minimal" name="min_price" class="min_value" value="<?= $pricing['min_price']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="filter-input-price-max">Amount (in dollars)</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Rp.</div>
                                        <input type="text" class="form-control text-right max_value" id="filter-input-price-max" placeholder="Harga maksimal" name="max_price" class="max_value" value="<?= $pricing['max_price']; ?>">
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 10px;">
                                    <button type="button" class="btn btn-danger hide" id="apply-filter-price">Terapkan filter</button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->
                </div>
              </div>

              <!-- start: componen Brand -->
              <div class="z-depth-0 bordered filter-by-brand">
                <div id="headingThree">
                  <div class="block-categories module mg-b-20-force pd-0-force br-none bs-none">
                      <h3 class="modtitle tx-mont">
                        <button class="btn btn-link tx-bold zl-tx-black pd-0" type="button" data-toggle="collapse" data-target="#collapseThree"
                      aria-expanded="true" aria-controls="collapseThree">
                        Berdasarkan Brand
                      </button>
                    </h3>
                  </div>
                </div>
                <div id="collapseThree" class="collapse in" aria-labelledby="headingThree"
                  data-parent="#accordionExample275">
                    <!-- - - - - - - - - - - - - - Brand - - - - - - - - - - - - - - - - -->
                    <div class="table_cell scrollable pd-20 pd-t-0-force" style="max-height: 175px; overflow: auto;">
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach($brands as $value) : ?>
                                    <div>
                                        <div class="pretty p-svg p-curve zl-tx-black">
                                            <input type="checkbox" data-id="<?= $value['brand_id']; ?>" class="brand-value" <?= in_array($value['brand_id'], array_values((array) $this->request->getQuery('brands'))) ? 'checked' : ''; ?> />
                                            <div class="state p-danger">
                                                <!-- svg path -->
                                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                </svg>
                                                <label><?= $value['name']; ?> <span class="category-counter">(<?= $value['total']; ?>)</span></label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- - - - - - - - - - - - - - End Brand - - - - - - - - - - - - - - - - -->
                </div>
              </div>

              <?php foreach($variants as $variant) : ?>
              <!-- start: componen variant -->
              <div class="z-depth-0 bordered filter-by-variant">
                <div id="headingFour-<?= $variant['Options']['id']; ?>">
                  <div class="block-categories module mg-b-20-force pd-0-force br-none bs-none">
                      <h3 class="modtitle tx-mont">
                        <button class="btn btn-link tx-bold zl-tx-black pd-0" type="button" data-toggle="collapse" data-target="#collapseFour-<?= $variant['Options']['id']; ?>"
                      aria-expanded="true" aria-controls="collapseThree">
                        Berdasarkan <?= $variant['Options']['name']; ?>
                      </button>
                    </h3>
                  </div>
                </div>
                <div id="collapseFour-<?= $variant['Options']['id']; ?>" class="collapse in" aria-labelledby="headingFour-<?= $variant['Options']['id']; ?>"
                  data-parent="#accordionExample275">
                              <!-- - - - - - - - - - - - - - variant - - - - - - - - - - - - - - - - -->
                              <div class="table_cell scrollable pd-20 pd-t-0-force" style="max-height: 175px; overflow: auto;">
                                  <div class="row">
                                      <?php foreach(array_chunk($variant['values'], ceil(count($variant['values']) / 1)) as $group) : ?>
                                          <div class="col-sm-12">
                                              <?php foreach($group as $value) : ?>
                                              <div>
                                                  <div class="pretty p-svg p-curve zl-tx-black">
                                                      <input type="checkbox" data-id="<?= $value['option_value_id']; ?>" class="variant-value" <?= in_array($value['option_value_id'], array_values((array) $this->request->getQuery('variants'))) ? 'checked' : ''; ?> />
                                                      <div class="state p-danger">
                                                          <!-- svg path -->
                                                          <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                              <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                          </svg>
                                                          <label><?= $value['name']; ?> <?php /*<span class="variant-counter">(<?= $value['total']; ?>)</span>*/ ?></label>
                                                      </div>
                                                  </div>
                                              </div>
                                              <?php endforeach; ?>

                                          </div>
                                      <?php endforeach; ?>
                                  </div>
                              </div>
                              <!--/ .table_cell -->
                              <!-- - - - - - - - - - - - - - End variant - - - - - - - - - - - - - - - - -->
                </div>
              </div>
              <!-- end: componen variant -->
              <?php endforeach; ?>

            </div>

            <?php /*
            <!-- start: componen fitur -->
            <div class="module">
                <h3 class="modtitle o-filter-title">Berdasarkan fitur</span> </h3>
                <div class="table_layout filter-shopby">
                    <div class="table_row">
                        <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->

                        <div class="table_cell" style="padding-top:20px;">
                            <fieldset>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <ul class="simple_vertical_list">
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_1">
                                                <label for="color_btn_1"
                                                       class="color_btn red">Popularitas</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_2">
                                                <label for="color_btn_2" class="color_btn red">Item
                                                    Promosi</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_4">
                                                <label for="color_btn_4" class="color_btn red">Item
                                                    Diskon</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_5">
                                                <label for="color_btn_5" class="color_btn red">Hot
                                                    Products</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_6">
                                                <label for="color_btn_6" class="color_btn red">Penjualan
                                                    Terbaik</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_7">
                                                <label for="color_btn_7" class="color_btn red">Rating
                                                    tertinggi</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_7">
                                                <label for="color_btn_7" class="color_btn red">Sale</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </fieldset>

                        </div>
                        <!--/ .table_cell -->

                        <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->
                    </div>
                </div>
            </div>
            <!-- end: componen fitur -->
            */ ?>


        </div>
        <!-- end: bagian kiri -->

        <!-- start: bagian kanan -->
        <div id="content" class="col-md-9 col-sm-12">
            <div class="products-category c-main-content banner">
                <?php if ($banners) : ?>
                <!-- start: banner atas -->
                <div class="mg-b-30 card pd-0">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="banners">
                                <div class="module sohomepage-slider ">
                                    <div class="yt-content-slider"  data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">

                                        <?php foreach($banners as $banner) : ?>
                                            <div class="yt-content-slide">
                                                <a href="<?php echo $banner['url'];?>"><img src="<?= $this->Url->build($_basePath . 'images/870x290/' . $banner['name']); ?>" alt="slide img" class="responsive"></a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="loadeding"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
                <!-- end: banner atas -->

            <div class="products-category c-main-content card">
                <!-- start:filter produk -->
                <div class="row">
                    <div class="col-md-7">
                        <?php if ($query = $this->request->getQuery('q')) : ?>
                        <h3 class="title-category">Hasil pencarian untuk <span class="search-keyword"><?= h($query); ?></span></h3>
                        <?php endif; ?>
                    </div>

                    <div class="short-by-show form-inline text-right col-md-5 col-sm-9 col-xs-12">
                        <div class="form-group short-by">
                            <label class="control-label o-control-label" for="input-sort">Urutkan
                                berdasarkan</label>
                            <select id="input-sort" class="form-control">
                                <option value="">--</option>
                                <option value="rating:desc">Rating tertinggi</option>
                                <option value="rating:asc">Rating terendah</option>
                                <option value="price:desc">Harga tertinggi</option>
                                <option value="price:asc">Harga terendah</option>
                            </select>
                        </div>
                    </div>
                    <?php /*
                    <div class="col-md-2 col-sm-3 col-xs-12 view-mode">

                        <div class="list-view">
                            <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"
                                    data-original-title="Grid" style="margin-right:10px;">
                                <i class="fa fa-th"></i>
                            </button>
                            <button class="btn btn-default list" data-view="list" data-toggle="tooltip"
                                    data-original-title="List">
                                <i class="fa fa-th-list"></i>
                            </button>
                        </div>

                    </div> */ ?>
                </div>
                <!-- end: filter produk -->

                <!-- start: list produk -->
                <div id="product-container-layout">
                <?php if (isset($products)) : ?>
                <div class="products-list row nopadding-xs so-filter-gird" style="margin-top: 15px;">
                    <?php foreach($products as $product) : ?>
                        <!-- start: item Produk -->
                        <div class="product-layout products col-lg-3 col-md-4 col-sm-4 col-xxs-6 col-xs-12">
                            <div class="product-item-container">
                                <div class="left-block left-b">
                                    <div class="product-card__gallery product-card__left">
                                        <?php foreach($product['images'] as $key => $image) :  ?>
                                            <div class="item-img" data-src="<?= $this->Url->build($_basePath . 'images/195x195/' . $image); ?>">
                                                <img src="<?= $this->Url->build($_basePath . 'images/46x46/' . $image); ?>" data-image-name="<?= $image; ?>"  alt="image">
                                            </div>

                                            <?php if ($key > 1) {break;} endforeach; ?>
                                    </div>
                                    <div class="product-image-container">
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $product['slug']]); ?>" title="<?= h($product['name']); ?>">
                                            <?php foreach($product['images'] as $image) : ?>
                                                <img src="<?= $this->Url->build($_basePath . 'images/195x195/' . $image); ?>" data-image-name="<?= $image; ?>"  class="img-responsive" alt="image">
                                            <?php break; endforeach; ?>
                                        </a>
                                        <?php /*<button class="product-wishlist <?= !empty($product['wishlist_id']) ? 'in-wish' : 'not-wish'; ?>" data-product-id="<?= $product['id']; ?>" data-wishlist-id="<?= $product['wishlist_id']; ?>"></button>*/ ?>
                                    </div>
                                    <div class="box">
                                        <?php if ($product['is_new']) : ?>
                                            <div class="ribbon ribbon-top-left"><span>NEW</span></div>
                                        <?php endif; ?>
                                    </div>
                                    <?php $dics = 100 - (($product['price_sale'] / $product['price']) * 100);?>
                                    <?php if($product['price_sale'] != $product['price']):?>
                                        <span class="product-ribbon"> <?php echo  $this->Number->precision($dics, 0);?>% </span>
                                    <?php endif;?>
                                </div>
                                <div class="right-block right-b">
                                    <?php /*<div class="row">
                                        <div class="col-lg-7"  style="width: 52% !important; display: inline-block;">
                                            <div class="rating" style="">
                                                <?php
                                                $rate = $product['rating'];
                                                for ($x = 0; $x < $rate; $x++) {
                                                    echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>';
                                                }
                                                for ($x = 0; $x < 5-$rate; $x++) {
                                                    echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>';
                                                }
                                                ?>
                                            </div>

                                        </div>
                                        <div class="col-lg-5" style="width: 46% !important; display: inline-block;"><span style="margin-top: 0; padding: 5px 10px;" class="badge <?= $this->Badge->format($product['point']); ?> "><?= $product['point']; ?> Poin</span></div>
                                    </div>*/ ?>
                                    <?php /*
                                    <ul class="colorswatch">
                                        <li class="item-img active"
                                            data-src="image/catalog/demo/product/electronic/600x600/9.jpg"><a
                                                    href="javascript:void(0);" title="gray"><img
                                                        src="image/demo/colors/gray.jpg" alt="image"></a></li>
                                        <li class="item-img"
                                            data-src="image/catalog/demo/product/electronic/600x600/10.jpg"><a
                                                    href="javascript:void(0);" title="pink"><img
                                                        src="image/demo/colors/pink.jpg" alt="image"></a></li>
                                        <li class="item-img"
                                            data-src="image/catalog/demo/product/electronic/600x600/11.jpg"><a
                                                    href="javascript:void(0);" title="black"><img
                                                        src="image/demo/colors/black.jpg" alt="image"></a>
                                        </li>
                                    </ul> */ ?>
                                    <div class="caption tx-left">
                                        <h4>
                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $product['slug']]); ?>" title="<?= h($product['name']); ?>">
                                                <?php echo $this->Text->truncate(
                                                    h($product['name']),
                                                    30,
                                                    [
                                                        'ellipsis' => '...',
                                                        'exact' => false
                                                    ]
                                                );?>
                                            </a>
                                        </h4>
                                        <div class="rate-history">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <?php
                                                    $rate = (int) $product['rating'];
                                                    for ($x = 0; $x < $rate; $x++) {
                                                        echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>';
                                                    }
                                                    for ($x = 0; $x < 5-$rate; $x++) {
                                                        echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>';
                                                    }
                                                    ?>
                                                </div>
                                                <a class="rating-num" href="#" target="_blank">(<?= $product['rating_count']; ?>)</a>
                                            </div>
                                            <div class="order-num">Orders (<?= $product['item_sold']; ?>)</div>
                                        </div>
                                        <div class="price">
                                            <span class="price-new tx-13-force">Rp. <?= $this->Number->format($product['price_sale']); ?></span>
                                        </div>
                                        <div class="button-group so-quickview cartinfo--static share-container">
                                            <span class="col-md-12 zl-tx-red tx-medium">Bagikan produk ini</span>
                                            <div class="row pd-0">
                                                <button type="button" class="btn-share b-fb fbShare" data-url="" data-title="" data-price=""><i class="fab fa-facebook"></i></button>
                                                <button type="button" class="btn-share b-wa waShare" data-url="" data-title="" data-price=""><i class="fab fa-whatsapp"></i></button>
                                                <button type="button" class="btn-share b-ln lineShare" data-url="" data-title="" data-price=""><i class="fab fa-line"></i></button>
                                                <button type="button" class="btn-share b-tw twitterShare" data-url="" data-title="" data-price=""><i class="fab fa-twitter"></i></button>
                                            </div>

                                        </div>

                                        <?php /*
                                        <div class="list-block">
                                            <button class="addToCart btn-button" type="button" title="Add to Cart"
                                                    onclick="cart.add('101', '1');"><i
                                                        class="fa fa-shopping-basket"></i>
                                            </button>
                                            <button class="wishlist btn-button" type="button"
                                                    title="Add to Wish List" onclick="wishlist.add('101');"><i
                                                        class="fa fa-heart"></i>
                                            </button>
                                            <button class="compare btn-button" type="button"
                                                    title="Compare this Product" onclick="compare.add('101');"><i
                                                        class="fa fa-refresh"></i>
                                            </button>
                                            <!--quickview-->
                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                               href="quickview.html" title="Quick view"
                                               data-fancybox-type="iframe"><i class="fa fa-eye"></i></a>
                                            <!--end quickview-->
                                        </div>
                                         */ ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: item produk -->
                    <?php endforeach; ?>
                <?php else : ?>
                    Product tidak di temukan
                <?php endif; ?>
                </div>
                <!-- end: list produk -->

                <!-- start: bottom nav produk -->
                <div class="product-filter product-filter-bottom filters-panel">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <!-- start pagination -->
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    if (isset($pagination) && $pagination instanceof \Pagination\Pagination) :
                                        //get indexes in page
                                        $indexes = $pagination->getIndexes(new \Pagination\StrategySimple(5));
                                        $iterator = $indexes->getIterator();
                                        if ($iterator->count() > 1) :
                                            ?>
                                            <nav aria-label="Page navigation" style="margin: 0 auto; text-align: center;">
                                                <ul class="pagination ajax-pagination">
                                                    <li>
                                                        <a href="<?= $this->Url->build([
                                                            'controller' => $this->request->getParam('controller'),
                                                            'action' => $this->request->getParam('action'),
                                                            'prefix' => false,
                                                            '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getFirstPage()])
                                                        ]); ?>" aria-label="First">
                                                            <span aria-hidden="true">First</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= $this->Url->build([
                                                            'controller' => $this->request->getParam('controller'),
                                                            'action' => $this->request->getParam('action'),
                                                            'prefix' => false,
                                                            '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getPreviousPage()])
                                                        ]); ?>" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                        </a>
                                                    </li>
                                                    <?php while ($iterator->valid()): ?>
                                                        <?php
                                                        $isActive = $this->request->getQuery('page') == $iterator->current();
                                                        ?>
                                                        <li class="<?= $isActive ? 'active': ''; ?>">
                                                            <a href="<?= $this->Url->build([
                                                                'controller' => $this->request->getParam('controller'),
                                                                'action' => $this->request->getParam('action'),
                                                                'prefix' => false,
                                                                '?' => array_merge($this->request->getQuery(), ['page' => $iterator->current()])
                                                            ]); ?>">
                                                                <?php echo $iterator->current() ?>
                                                            </a>
                                                        </li>
                                                        <?php $iterator->next(); endwhile; ?>
                                                    <li>
                                                        <a href="<?= $this->Url->build([
                                                            'controller' => $this->request->getParam('controller'),
                                                            'action' => $this->request->getParam('action'),
                                                            'prefix' => false,
                                                            '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getNextPage()])
                                                        ]); ?>" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= $this->Url->build([
                                                            'controller' => $this->request->getParam('controller'),
                                                            'action' => $this->request->getParam('action'),
                                                            'prefix' => false,
                                                            '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getLastPage()])
                                                        ]); ?>" aria-label="Last">
                                                            <span aria-hidden="true">Last</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- end pagination -->
                        </div>
                    </div>
                </div>
                <!-- end: bottom nav produk -->
                </div>

            </div>
        </div>
        <!-- end: bagian kanan -->

    </div>
</div>
<!-- end: main container -->

<?php

$this->Html->css([
    '/css/bootstrap-treeview',
    '/css/plugin.min.css'
], ['block' => true]);


$this->Html->script([
    '/js/bootstrap-treeview.min',
], ['block' => true]);
?>
<?php $this->append('script'); ?>
<script type="text/javascript">
    // Check if Cookie exists
    if ($.cookie('display')) {
        view = $.cookie('display');
    } else {
        view = 'grid';
    }
    if (view) display(view);
</script>
<script>

    $(document).ready(function(){


        //filter-by-brand
        function initialScrollbarBrand() {
            if ($('.filter-by-brand').find('.table_cell').length) {
                var tableCell = $('.filter-by-brand').find('.table_cell');
                var height = tableCell.innerHeight();
                if (height > 165) {
                    tableCell.css('height', 165)
                        .css('overflow', 'auto');
                    new PerfectScrollbar(tableCell[0], {
                        suppressScrollX: true,
                    })
                }

            }
        }
        //initialScrollbarBrand();

        function refreshPage(target, updateCategory, updateBrand, updateVariant) {
            //var parsed = queryString.parse(location.search, {arrayFormat: 'bracket'});
            target = target || location.search;
            $.ajax({
                url: target,
                type : 'POST',
                data : {
                    _csrfToken: $('meta[name="_csrfToken"]').attr('content')
                },
                success: function(response){
                    $("#product-container-layout").hide().html(response).fadeIn('show');
                    history.replaceState(null, null, target);
                    paginationClicked()
                },
                error: function () {

                }
            });


            if (updateCategory) {
                generateTree('<?= $this->Url->build(['action' => 'loadCategory', 'prefix' => false]); ?>' + location.search);
            }
            if (updateBrand) {
                loadBrands('<?= $this->Url->build(['action' => 'loadBrand', 'prefix' => false]); ?>' + location.search);
            }
            if (updateVariant) {
                loadVariants('<?= $this->Url->build(['action' => 'loadVariant', 'prefix' => false]); ?>' + location.search);
            }


        }

        function querystringParse()
        {
            parsed = queryString.parse(location.search, {arrayFormat: 'index'});
            if (parsed.page) {
                delete parsed.page;
            }
            return parsed;
        }

        $(document.body).on('mouseenter', '.product-card__gallery .item-img' ,function(){
            $(this).addClass('thumb-active').siblings().removeClass('thumb-active');
            var thumb_src = $(this).attr("data-src");
            $(this).closest('.product-item-container').find('img.img-responsive').attr("src",thumb_src);
        });

        function paginationClicked() {
            $('.ajax-pagination a').click(function(e) {
                e.preventDefault();
                if (e.target.href) {
                    refreshPage(e.target.href, false, false);
                }
            });
            $('body,html').animate({scrollTop:0}, 1200);
        }
        paginationClicked();


        function paginationClick() {
            var container = document.querySelector('.ajax-pagination');
            if (container) {
                container.addEventListener('click', function(e) {
                    if (e.target != e.currentTarget) {
                        e.preventDefault();
                        refreshPage(e.target.href, false, false);
                    }
                    e.stopPropagation();
                }, false);
            }

        }
        //paginationClick();


    function loadBrands(target) {
        //filter-by-brand
        $.ajax({
            url: target || location.search,
            type : 'POST',
            data : {
                _csrfToken: $('meta[name="_csrfToken"]').attr('content')
            },
            success: function(response){
                $("#collapseThree").html(response);
                //initialScrollbarBrand();
            },
            error: function () {

            }
        });
    }

    function loadVariants(target) {
        $.ajax({
            url: target || location.search,
            type : 'POST',
            data : {
                _csrfToken: $('meta[name="_csrfToken"]').attr('content')
            },
            success: function(response){
                $(".filter-by-variant").remove();
                $(response).insertAfter( ".content-aside .filter-by-brand" );
            },
            error: function () {

            }
        });
    }

    function loadBanners(target) {
        $.ajax({
            url: target || location.search,
            type : 'POST',
            data : {
                _csrfToken: $('meta[name="_csrfToken"]').attr('content')
            },
            success: function(response) {
                var containerBanner = $(".products-category.c-main-content.banner");
                if (response === '') {
                    containerBanner.fadeOut('slow');
                } else {
                    containerBanner.hide().html(response).fadeIn('slow');
                }

                //$(".products-category.c-main-content.banner").hide().html(response).fadeIn('slow');
                buildSliderBanner();
            },
            error: function () {

            }
        });
    }

    function buildSliderBanner() {
        $('.yt-content-slider').each(function () {
            var $slider = $(this),
                $panels = $slider.children('div'),
                data = $slider.data();
            // Remove unwanted br's
            //$slider.children(':not(.yt-content-slide)').remove();
            // Apply Owl Carousel

            $slider.owlCarousel2({
                responsiveClass: true,
                mouseDrag: true,
                video:true,
                lazyLoad: (data.lazyload == 'yes') ? true : false,
                autoplay: (data.autoplay == 'yes') ? true : false,
                autoHeight: (data.autoheight == 'yes') ? true : false,
                autoplayTimeout: data.delay * 1000,
                smartSpeed: data.speed * 1000,
                autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
                center: (data.center == 'yes') ? true : false,
                loop: (data.loop == 'yes') ? true : false,
                dots: (data.pagination == 'yes') ? true : false,
                nav: (data.arrows == 'yes') ? true : false,
                dotClass: "owl2-dot",
                dotsClass: "owl2-dots",
                margin: data.margin,
                navText: ['',''],

                responsive: {
                    0: {
                        items: data.items_column4
                    },
                    480: {
                        items: data.items_column3
                    },
                    768: {
                        items: data.items_column2
                    },
                    992: {
                        items: data.items_column1
                    },
                    1200: {
                        items: data.items_column0
                    }
                }
            });

        });
    }


    function generateTree(url) {
        var $tree = $('#category_view').treeview({
            color: '#000000', // '#000000',
            backColor: '#FFFFFF', // '#FFFFFF',
            showBorder: false,
            levels: 1,
            injectStyle: true,
            options: {
                color: '#888888'
            },
            expandIcon: 'fa fa-angle-down pull-right',
            collapseIcon: 'fa fa-angle-up pull-right',
            onhoverColor: '#ffffff',
            selectedColor: '#000000',
            selectedBackColor: '#ffffff',
            enableLinks: true,
            //data: data,
            wrapNodeText: true,
            //showCheckbox: true,
            dataUrl: {
                url: url || '<?= $this->Url->build(['action' => 'loadCategory', 'prefix' => false, '?' => $this->request->getQueryParams()], ['escape' => false]); ?>'
            },
            onNodeRendered: function (event, node) {
                node.total = node.total > 1000 ? numeral(node.total).format('0.0a') : node.total;
                $(node.$el[0]).find('.text').text(truncate(node.text, 28, {ellipsis: '...'})).attr('title', node.text);
                node.$el.append($(`<span class="category-counter">(${node.total})</span>`));
            },
            onNodeSelected: function (event, data) {
                /*(function checkedNode(arg) {
                    var x = $tree.treeview('getParents', arg);
                    if (x != undefined) {
                        x.forEach(function(o) {
                            //$(o.$el[0]).addClass('node-checked');
                            checkedNode(o);
                        });

                    }
                })(data);*/
                $tree.treeview('checkNode', [data, {silent: false}]);
                parsed = querystringParse();
                parsed.category_id = $(data.$el[0]).attr('id');
                history.replaceState(null, null, '?' + queryString.stringify(parsed, {
                    strict: true,
                    arrayFormat: 'index'
                }));
                refreshPage(null, false, true, true);
                loadBanners('<?= $this->Url->build(['action' => 'loadBanner', 'prefix' => false]); ?>' + location.search);

            },
            onNodeUnselected: function (event, data) {
                // Your logic goes here


                if (typeof $tree != 'undefined') {

                    /*(function uncheckedNodes(arg) {
                        var x = $tree.treeview('getParents', arg);
                        if (x != undefined) {
                            x.forEach(function(o) {
                                //$tree.treeview('uncheckNode', [ o, { silent: false } ]);
                                //$tree.treeview('unselectNode', [ o, { silent: false } ]);
                                //$(o.$el[0])
                                //    .removeClass('node-selected');
                                uncheckedNodes(o);
                            });

                        }
                    })(data);*/
                    $(data.$el)
                        .removeClass('node-selected')
                        .removeClass('node-checked')
                        .find('.check-icon')
                        .removeClass('glyphicon-check')
                        .addClass('glyphicon-unchecked');


                }
            }
        });
    }

        generateTree();


        $(document.body).on('change', 'input.variant-value', function() {
            parsed = querystringParse();
            parsed.variants = parsed.variants || [];
            var value = String($(this).data('id'));
            if(this.checked) {
                if (parsed.variants.indexOf(value) === -1) {
                    parsed.variants.push(value);
                }
            } else {
                var index = parsed.variants.indexOf(value);
                if (index > -1) {
                    parsed.variants.splice(index, 1);
                }
            }
            history.replaceState(null, null, '?' + queryString.stringify(parsed, {strict: true, arrayFormat: 'index'}));
            refreshPage(null, true, true, false);
        });

        $(document.body).on('change', 'input.brand-value', function() {
            parsed = querystringParse();
            parsed.brands = parsed.brands || [];
            var value = String($(this).data('id'));
            if(this.checked) {
                if (parsed.brands.indexOf(value) === -1) {
                    parsed.brands.push(value);
                }
            } else {
                var index = parsed.brands.indexOf(value);
                if (index > -1) {
                    parsed.brands.splice(index, 1);
                }
            }
            history.replaceState(null, null, '?' + queryString.stringify(parsed, {strict: true, arrayFormat: 'index'}));
            refreshPage(null, true, false, true);
        });


        $(document.body).on('change', '#input-sort', function() {
           var sorting = $(this).val().split(':');
           if (sorting.length === 2) {
               parsed = querystringParse();
               parsed.sortBy = sorting[0];
               parsed.order = sorting[1];
               history.replaceState(null, null, '?' + queryString.stringify(parsed, {strict: true, arrayFormat: 'index'}));
               refreshPage(null, false, false, false);
           }
        });


        if($('#pricing-range').length) {
            var min_price = parseInt(numeral($('input[name="min_price"]').val()).value());
            var max_price = parseInt(numeral($('input[name="max_price"]').val()).value());

            window.startRangeValues = [min_price, max_price];
            var slider = $('#pricing-range').slider({

                range : true,
                //min : min_price >= 1000 ? (min_price - 1000) : min_price ,
                //max : max_price + 1000 ,
                min: 0,
                max: max_price,
                values : window.startRangeValues,
                step : 10000,

                slide : function(event, ui){

                    var min = ui.values[0],
                        max = ui.values[1],
                        range = $(this).siblings('.range');

                    range.find('.min_value').val(numeral(min).format('0,0'));
                    range.find('.max_value').val(numeral(max).format('0,0'));

                },
                stop: function(event, ui) {
                    //console.log('released handle');
                    parsed =querystringParse();
                    if (parsed.page) {
                        delete parsed.page;
                    }
                    parsed.min_price = $(this).slider("values", 0);
                    parsed.max_price = $(this).slider("values", 1);
                    history.replaceState(null, null, '?' + queryString.stringify(parsed, {strict: true, arrayFormat: 'index'}));
                    refreshPage(null, true, true, true);

                },
                create : function(event, ui){
                    var $this = $(this),
                        min = $this.slider("values", 0),
                        max = $this.slider("values", 1),
                        range = $this.siblings('.range');
                    range.find('.min_value').val(numeral(min).format('0,0'));
                    range.find('.max_value').val(numeral(max).format('0,0'));

                }

            });

            $("#filter-input-price-min").keyup(function() {
                var val = $(this);
                val.val(numeral(val.val()).format('0,0'))
            }).change(function(){
                var min = slider.slider('values', 0);
                var max = slider.slider('values', 1);
                var current = numeral($(this).val()).value();
                if (current > max) {
                    $(this).val(numeral(min).format('0,0'));
                } else {
                    slider.slider('option', 'min', current);
                }
                $(this).parents('.range').find('button').removeClass('hide');
            });
            $("#filter-input-price-max").keyup(function() {
                var val = $(this);
                val.val(numeral(val.val()).format('0,0'))
            }).change(function(){
                var min = slider.slider('values', 0);
                var max = slider.slider('values', 1);
                var current = numeral($(this).val()).value();
                if (current < min) {
                    $(this).val(numeral(max).format('0,0'));
                } else {
                    slider.slider('option', 'max', current + 10000);
                    if (current < 1000) {
                        slider.slider('option', 'step', 50);
                    } else {
                        slider.slider('option', 'step', 1000);
                    }
                }
                $(this).parents('.range').find('button').removeClass('hide');
            });

            $("#apply-filter-price").click(function() {
                slider.slider('value', 0, numeral($("#filter-input-price-min").val()).value())
                    .slider('value', 1, numeral($("#filter-input-price-max").val()).value());

                parsed =querystringParse();
                if (parsed.page) {
                    delete parsed.page;
                }
                parsed.min_price = slider.slider("values", 0);
                parsed.max_price = slider.slider("values", 1);
                history.replaceState(null, null, '?' + queryString.stringify(parsed, {strict: true, arrayFormat: 'index'}));
                refreshPage(null, true, true, true);
                $(this).addClass('hide');

            })

        }


    });
</script>
<?php $this->end(); ?>