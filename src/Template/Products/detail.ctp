<!-- start: header part -->
<div class="c-header__bg" style="z-index:0;">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-home"></i></a></li>
                <?php
                    foreach ($details['data']['categories'] as $crumb) {
                        echo '<li><a href="#">'.$crumb['name'].'</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="c-dp-main mb-5">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-12 item-article" style="padding: 50px;">

                <div class="product-view row">
                    <div class="left-content-product">
                        <?php if($details['is_error']):?>
                            Produk tidak ditemukan

                        <?php else:?>

                            <div class="content-product-left class-honizol col-md-5 col-sm-12 col-xs-12">
                                <div class="large-image">
                                    <?php foreach($details['data']['images'] as $image):?>
                                        <img itemprop="image" class="product-image-zoom" src="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" data-zoom-image="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" title="<?php echo $details['data']['name']; ?>" alt="<?php echo $details['data']['name']; ?>">
                                        <?php break;?>
                                    <?php endforeach;?>
                                </div>
                                <?php if(!empty($details['data']['video_url'])):?>
                                    <a class="thumb-video pull-left" href="<?php echo $details['data']['video_url']; ?>"><i class="fa fa-youtube-play"></i></a>
                                <?php endif;?>
                                <div id="thumb-slider" class="yt-content-slider full_slider owl-drag" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="4" data-items_column1="3" data-items_column2="5"  data-items_column3="3" data-items_column4="2" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

                                    <?php foreach($details['data']['images'] as $k => $image):?>
                                    <a data-index="<?php echo $k;?>" class="img thumbnail " data-image="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" title="Chicken swinesha">
                                        <img src="<?= $this->Url->build($_basePath . 'images/90x90/' . $image); ?>" title="<?php echo $details['data']['name']; ?>" alt="<?php echo $details['data']['name']; ?>">
                                    </a>
                                    <?php endforeach;?>
                                </div>

                            </div>

                            <div class="content-product-right col-md-7 col-sm-12 col-xs-12">

                                <form id="form-cart">
                                    <div class="pull-left">
                                        <div class="title-product">
                                            <h1><?php echo $details['data']['name']; ?></h1>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <?php
                                            $badge = [
                                                'silver' => [
                                                    'min' => 1,
                                                    'max' => 30
                                                ],
                                                'blue' => [
                                                    'min' => 31,
                                                    'max' => 50
                                                ],
                                                'gold' => [
                                                    'min' => 51,
                                                    'max' => 100
                                                ],
                                                'diamond' => [
                                                    'min' => 1,
                                                    'max' => 100
                                                ],
                                            ];
                                        ?>
                                        <span class="badge u-bg--badge__blue">150 Point</span>
                                        <!--Jenis badge-->
                                        <!--.u-bg&#45;&#45;badge__silver -> 1-30-->
                                        <!--.u-bg&#45;&#45;badge__blue -> 31-50-->
                                        <!--.u-bg&#45;&#45;badge__gold -> 51-100-->
                                        <!--.u-bg&#45;&#45;badge__diamond -> >100-->

                                        <div class="rating">
                                            <div class="rating-box">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>


                                    <!-- Review ---->
                                    <div class="box-review">
                                        <span class="">SKU : <span class="zl-sku"><?php echo $details['data']['sku']; ?></span></span>
                                        <span class="">Kategori : <?php echo @$details['data']['categories'][0]['name'];?></span>
                                    </div>
                                    <div class="product_page_price price" itemprop="offerDetails" itemscope="">
                                        <span class="price-new"><span itemprop="price" id="price-special">Rp.<?php echo $this->Number->format($details['data']['price_sale']); ?></span></span>
                                        <span class="price-old" id="price-old">Rp.<?php echo $this->Number->format($details['data']['price']); ?></span>
                                        <span class="label-product label-sale"><?= $details['data']['percent']; ?>%</span>
                                    </div>
                                    <div class="panel panel-danger">
                                        <div class="panel-body">
                                            <p>Bagikan produk ini</p>
                                            <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-default btn-lg btn-whatsapp"><i class="fa fa-whatsapp"></i> Whatsapp</button>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-default btn-lg btn-instagram"><i class="fa fa-instagram"></i> Instagram</button>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-default btn-lg btn-facebook"><i class="fa fa-facebook"></i> Facebook</button>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-default btn-lg btn-sms"><i class="fa fa-commenting"></i> Sms</button>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-default btn-lg btn-line"><i class="fa fa-facebook"></i>  Line</button>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-default btn-lg btn-twitter"><i class="fa fa-twitter"></i> Twitter</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row vcenter">
                                        <div class="col-sm-3"><span class="zl-text">Jumlah</span></div>
                                        <div class="col-sm-9">
                                            <div class="form-group box-info-product">
                                                <div class="option quantity">
                                                    <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
                                                        <span class="input-group-addon product_quantity_down">−</span>
                                                        <input class="form-control" type="text" name="quantity" value="1">
                                                        <input type="hidden" name="product_id" value="50">
                                                        <span class="input-group-addon product_quantity_up">+</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row vcenter">
                                        <div class="col-sm-3"><span class="zl-text">Kupon</span></div>
                                        <div class="col-sm-9">
                                            <div class="coupon-wrapper">
                                                <div class="coupon-left">
                                                    <span>Rp. 25.000</span>
                                                </div>
                                                <div class="coupon-right">
                                                    <span>Dapatkan Sekarang</span>
                                                </div>
                                            </div>
                                            <span class="help-btn">
                                                <strong><a href="javascript:void(0);" class="question" data-container="body" data-toggle="popover" data-placement="top" tabindex="0"><i class="fa fa-question-circle"></i></a></strong>
                                            </span>

                                        </div>
                                    </div>
                                    <?php foreach($details['data']['options'] as $key => $vals):?>
                                    <div class="row vcenter">
                                        <div class="col-sm-3"><span class="zl-text"><?= $key;?></span></div>
                                        <div class="col-sm-9">
                                            <div class="color-form-wrapper">
                                                <div class="form-group">
                                                    <?php foreach($vals as $k => $v):?>
                                                        <!-- active - inactive-->
                                                        <div class="color-item zl-color" data-option="<?php echo strtolower($key);?>" data-label="<?php echo strtolower($v);?>">
                                                            <input type="radio" name="<?php echo strtolower($key);?>" value="<?= $v;?>">
                                                            <label class="color-name"><?= $v;?></label>
                                                        </div>
                                                    <?php endforeach;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                    <div class="row vcenter">
                                        <div class="col-sm-3"><span class="zl-text">Stok Tersedia</span></div>
                                        <div class="col-sm-9">
                                            <div class="col-sm-4 wh-wrapper">
                                                <div class="wh-item">
                                                    <span class="wh-label">
                                                        <label>Jakarta</label>
                                                        <input type="radio" name="stock" value="jakarta">
                                                    </span>
                                                    <span class="wh-stock">18 Stok</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 wh-wrapper active">
                                                <div class="wh-item">
                                                    <span class="wh-label">
                                                        <label>Bandung</label>
                                                        <input type="radio" name="stock" value="jakarta">
                                                    </span>
                                                    <span class="wh-stock">18 Stok</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 wh-wrapper inactive">
                                                <div class="wh-item">
                                                    <span class="wh-label">
                                                        <label>Surabaya</label>
                                                        <input type="radio" name="stock" value="jakarta">
                                                    </span>
                                                    <span class="wh-stock">18 Stok</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 wh-wrapper">
                                                <div class="wh-item">
                                                    <span class="wh-label">
                                                        <label>Malang</label>
                                                        <input type="radio" name="stock" value="jakarta" disabled>
                                                    </span>
                                                    <span class="wh-stock">18 Stok</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-lg btn-radius btn-danger btn-pay">Bayar sekarang</button>
                                        <button class="btn btn-lg btn-radius btn-add"><i class="fa fa-shopping-cart"></i> Tambah ke keranjang</button>
                                    </div>
                                    <!-- end box info product -->
                                </form>
                            </div>

                        <?php endif;?>

                    </div>
                </div>
                <!-- Product Tabs -->
            </div>
        </div>
    </div>
</div>



<div id="template-popover-question" style="display:none">
    <div class="leaderboard-popover">
        Lorem ipsum dolor sit amet
    </div>
</div>

<?php $this->append('script'); ?>
<?php
$this->Html->css([
'/css/product-detail.css',
], ['block' => true]);
?>
<?php
$this->Html->script([
'/js/product-detail.js',
], ['block' => true]);
?>
<?php $this->end(); ?>