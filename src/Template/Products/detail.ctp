<style>
    .zl-sku {
        margin-right: 30px;
    }
    span.fa-stack{
        font-size: 20px;
    }
    .rating .rating-box{
        font-size: 35px;
    }
    .left-content-product .content-product-right .box-review{
        font-size: 1.3rem;
    }
    .btn-group>.btn-group:not(:first-child):not(:last-child)>.btn{
        border-radius: 0px !important;
    }
    .btn-default{
        border-radius:0px !important;
        font-size: 12px;
        border-color:unset;
        border:0px !important;
    }
    .btn-default:hover{
        background-color: unset;
        color: unset;
    }
    .btn-whatsapp,.btn-whatsapp:hover{
        background-color: #65bc54;
        color: #ffffff;
    }
    .btn-facebook,.btn-facebook:hover{
        background-color: #2861ac;
        color: #ffffff;
    }
    .btn-twitter,.btn-twitter:hover{
        background-color: #37b3db;
        color: #ffffff;
    }
    .btn-line,.btn-line:hover{
        background-color: #3acd01;
        color: #ffffff;
    }
    .btn-sms,.btn-sms:hover{
        background-color: #1b8ba8;
        color: #ffffff;
    }
    .btn-instagram,.btn-instagram:hover{
        background-image: linear-gradient(to bottom, #d44088 0%, #f38c4d 51%,#f6d365 100%);
        color: #ffffff;
    }
    .vcenter {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
    }
</style>

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
                                <div class="pull-left">
                                    <div class="title-product">
                                        <h1><?php echo $details['data']['name']; ?></h1>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <span class="label label-primary label-point">150 Point</span>
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
                                    <div class="col-sm-2"><span class="text-">Jumlah</span></div>
                                    <div class="col-sm-8">
                                        <div class="form-group box-info-product">
                                            <div class="option quantity">
                                                <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
                                                    <input class="form-control" type="text" name="quantity" value="1">
                                                    <input type="hidden" name="product_id" value="50">
                                                    <span class="input-group-addon product_quantity_down">−</span>
                                                    <span class="input-group-addon product_quantity_up">+</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-box-desc">
                                    <div class="inner-box-desc">

                                        <div class="brand">
                                        </div>
                                        <div class="brand"><span>Brand:</span><a href="#"> SamSung</a>		</div>
                                        <div class="model"><span>Product Code:</span> 23UC97</div>
                                        <div class="stock"><span>Availability:</span> <i class="fa fa-check-square-o"></i> In Stock</div>

                                    </div>
                                </div>

                                <div class="short_description form-group">
                                    <h3>OverView</h3>

                                    The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provid...
                                </div>
                                <div id="product">
                                    <h4>Available Options</h4>
                                    <div class="image_option_type form-group required">
                                        <label class="control-label">Colors</label>
                                        <ul class="product-options clearfix" id="input-option231">
                                            <li class="radio">
                                                <label>
                                                    <input class="image_radio" type="radio" name="option[231]" value="33">
                                                    <img src="/zolaku-front/images/demo/colors/blue.jpg" data-original-title="blue +$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
                                                    <label> </label>
                                                </label>
                                            </li>
                                            <li class="radio">
                                                <label>
                                                    <input class="image_radio" type="radio" name="option[231]" value="34">
                                                    <img src="/zolaku-front/images/demo/colors/brown.jpg" data-original-title="brown -$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
                                                    <label> </label>
                                                </label>
                                            </li>
                                            <li class="radio">
                                                <label>
                                                    <input class="image_radio" type="radio" name="option[231]" value="35"> <img src="/zolaku-front/images/demo/colors/green.jpg"
                                                                                                                                data-original-title="green +$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
                                                    <label> </label>
                                                </label>
                                            </li>
                                            <li class="selected-option">
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="form-group box-info-product">
                                        <div class="option quantity">
                                            <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">

                                                <input class="form-control" type="text" name="quantity"
                                                       value="1">
                                                <input type="hidden" name="product_id" value="50">
                                                <span class="input-group-addon product_quantity_down">−</span>
                                                <span class="input-group-addon product_quantity_up">+</span>
                                            </div>
                                        </div>
                                        <div class="cart">
                                            <input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" onclick="cart.add('42', '1');" data-original-title="Add to Cart">
                                        </div>
                                        <div class="add-to-links wish_comp">
                                            <ul class="blank list-inline">
                                                <li class="wishlist">
                                                    <a class="icon" data-toggle="tooltip" title=""
                                                       onclick="wishlist.add('50');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li class="compare">
                                                    <a class="icon" data-toggle="tooltip" title=""
                                                       onclick="compare.add('50');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>

                                </div>
                                <!-- end box info product -->

                            </div>

                        <?php endif;?>

                    </div>
                </div>
                <!-- Product Tabs -->
                
                
            </div>
        </div>
    </div>
</div>