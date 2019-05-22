<!-- start: list produk -->
<div class="products-list row nopadding-xs so-filter-gird grid" style="margin-top: 15px;">
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
                    <div class="product-image-container overflow-hidden">
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $product['slug']]); ?>" title="<?= h($product['name']); ?>">
                            <?php foreach($product['images'] as $image) : ?>
                                <img src="<?= $this->Url->build($_basePath . 'images/195x195/' . $image); ?>" data-image-name="<?= $image; ?>"  class="img-responsive" alt="image">
                                <?php break; endforeach; ?>
                        </a>
                        <?php /*<button class="product-wishlist <?= !empty($product['wishlist_id']) ? 'in-wish' : 'not-wish'; ?>" data-product-id="<?= $product['id']; ?>" data-wishlist-id="<?= $product['wishlist_id']; ?>"></button>*/ ?>
                        <span class="product-ribbon"> 20% </span>
                    </div>
                    <div class="box">
                        <?php if ($product['is_new']) : ?>
                            <div class="ribbon ribbon-top-left"><span>NEW</span></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="right-block right-b">
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
                    <div class="caption">
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
                            <div class="order-num">Orders (0)</div>
                        </div>
                        <div class="price">
                            <span class="price-new">Rp. <?= $this->Number->format($product['price_sale']); ?></span>
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