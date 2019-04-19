
<div class="ltabs-items-inner ltabs-slider">
    <?php foreach($topProducts as $vals):?>
    <div class="ltabs-item products">
        <div class="item-inner product-thumb transition product-layout">
            <div class="product-item-container">
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
                    <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug']]); ?>" title="<?= h($vals['name']); ?>" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                    <!--end quickview-->
                </div>
                <div class="right-block right-b">

                    <div class="row">
                        <div class="col-lg-7">
                            <div class="rating">
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
                        <div class="col-lg-5"><span class="badge"><?= $vals['point']; ?> Poin</span></div>
                    </div>
                    <div class="caption">
                        <h4>
                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['slug']]); ?>" title="<?= h($vals['name']); ?>" target="_self">
                                <?php echo $this->Text->truncate(
                                    h($vals['name']),
                                    30,
                                    [
                                    'ellipsis' => '...',
                                    'exact' => false
                                    ]
                                );?>
                            </a>
                        </h4>

                        <div class="price">
                            <span class="price-new">Rp. <?= $this->Number->format($vals['price_sale']); ?></span>
                            <?php if($vals['price_sale'] != $vals['price']):?>
                            <span class="price-old">Rp. <?= $this->Number->format($vals['price']); ?></span>
                            <?php endif;?>
                        </div>

                        <div class="button-group so-quickview cartinfo--static">
                            <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('<?= ($vals['id']); ?>', this);">  <i class="fa fa-shopping-basket"></i>
                                <span>Add to cart </span>
                            </button>
                            <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('<?= ($vals['id']); ?>', this);"><i class="fa fa-heart"></i><span></span>
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