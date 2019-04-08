
<div class="ltabs-items-inner ltabs-slider">
    <?php foreach($topProducts as $vals):?>
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