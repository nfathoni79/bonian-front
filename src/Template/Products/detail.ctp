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
        flex-direction: row;
        margin: 10px 0;
    }
    .vcenter div span.zl-text{
        color: #444;
        font-weight: 600;
    }
    .vcenter div .box-info-product{
        margin: 0 !important;
    }
    .left-content-product .content-product-right .box-info-product .quantity .quantity-control span.product_quantity_down{
        background: none repeat scroll 0 0 #fff6f6;
        font-size: 13px;
        padding: 0 4px;
        position: relative;
        top: unset;
        width: 25px;
        height: 35px;
        line-height: 35px;
        right: unset;
        border: 1px solid #ddd;
        color: #444;
        border-right: 0;
        border-radius: 5px  0 0 5px;
        margin: 0;
    }
    .left-content-product .content-product-right .box-info-product .quantity .quantity-control input.form-control{
        min-width: 50px;
        width: 50px;
        text-align: center;
    }
    .left-content-product .content-product-right .box-info-product .quantity .quantity-control span.product_quantity_up{
        background: none repeat scroll 0 0 #fff6f6;
        font-size: 13px;
        padding: 0 4px;
        position: relative;
        top: unset;
        width: 25px;
        height: 35px;
        line-height: 35px;
        right: unset;
        border: 1px solid #ddd;
        color: #444;
        border-left: 0;
        border-radius: 0 5px 5px 0;
        margin: 0;
    }
    .coupon-left, .coupon-right{
        display: flex;
        border: 2px solid #65bc54;
        vertical-align: middle;
        float: left;
        padding: 5px 20px;
    }
    .coupon-left{
        color: #65bc54 ;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 1.115em;
    }
    .coupon-right{
        background: #65bc54;
        color: #fff;
        font-weight: 700;
        text-transform: uppercase;
    }
    .help-btn a{
        padding: 20px;
        font-size: 20px;
        vertical-align: middle;
    }
    .color-form-wrapper .form-group{
        display: flex;
        margin-bottom: 0;
    }
    .color-form-wrapper .form-group .color-item{
        width: 70px;
        padding: 5px;
        margin: auto 0px;
        border:1px solid #F0F0F0;
        text-align: center;
    }
    .color-form-wrapper .form-group .color-item.active, .color-form-wrapper .form-group .color-item:hover{
        background: #c93535;
        border: 1px solid #c93535;
        color: #fff;
    }
    .color-form-wrapper .form-group .color-item.inactive, .color-form-wrapper .form-group .color-item.inactive:hover{
        background: #fff;
        border: 1px solid #F0F0F0;
        color: #eaeaea;
    }
    .color-form-wrapper .form-group .color-item input{
        display:none;
    }
    label.color-name{
        margin: auto 0px;
    }
    .wh-wrapper{
        border: 1px solid #ddd;
        padding: 5px 10px;
        border-radius: 5px;
        margin-right: 5px;
        margin-bottom: 5px;
        float: left;
    }
    .wh-wrapper .wh-item .wh-label{
        float: left;
    }
    .wh-wrapper .wh-item .wh-label label{
        margin: 0;
        font-weight: 700;
    }
    .wh-wrapper .wh-item .wh-stock{
        float: right;
        padding: 0px 5px;
        background: #97aa55;
        border-radius: 5px;
        color: #fff;
        font-weight: 700;
    }
    .wh-wrapper .wh-item .wh-label input{
        display: none;
    }
    .wh-wrapper.active{
        background: #fff6f6;
        border: 1px solid #f78181;
    }
    .wh-wrapper.inactive .wh-item .wh-stock{
        background: #ddd;
    }
    .panel-danger{
        background: #fff6f6;
        border: 1px solid #ddd;
    }
    .btn-pay{
        padding: 15px 40px;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 600;
        margin-right: 10px;
    }
    .btn-add{
        padding: .875em 40px;
        font-size: 14px;
        font-weight: 600;
        background: #fff;
        border: 1px solid #d9534f;
        color: #d9534f;
    }
    .btn-add:hover{
        color: #d9534f;
    }
    .btn-add i{
        font-size: 24px;
        margin-right: 8px;
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
                                            <strong><a href="javascript:void(0);" class="lokasi" data-container="body" data-toggle="popover" data-placement="right" tabindex="0"><i class="fa fa-question-circle"></i></a></strong>
                                        </span>

                                    </div>
                                </div>
                                <div class="row vcenter">
                                    <div class="col-sm-3"><span class="zl-text">Warna</span></div>
                                    <div class="col-sm-9">
                                        <div class="color-form-wrapper">
                                            <div class="form-group">
                                                <div class="color-item">
                                                    <input type="radio" name="color" value="1">
                                                    <label class="color-name">Merah</label>
                                                </div>
                                                <div class="color-item active">
                                                    <input type="radio" name="color" value="1">
                                                    <label class="color-name">Putih</label>
                                                </div>
                                                <div class="color-item">
                                                    <input type="radio" name="color" value="1">
                                                    <label class="color-name">Abu</label>
                                                </div>
                                                <div class="color-item inactive">
                                                    <input type="radio" name="color" value="1" disabled>
                                                    <label class="color-name">Hitam</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row vcenter">
                                    <div class="col-sm-3"><span class="zl-text">Ukuran</span></div>
                                    <div class="col-sm-9">
                                        <div class="color-form-wrapper">
                                            <div class="form-group">
                                                <div class="color-item inactive">
                                                    <input type="radio" name="color" value="1">
                                                    <label class="color-name">S</label>
                                                </div>
                                                <div class="color-item">
                                                    <input type="radio" name="color" value="1">
                                                    <label class="color-name">M</label>
                                                </div>
                                                <div class="color-item active">
                                                    <input type="radio" name="color" value="1">
                                                    <label class="color-name">L</label>
                                                </div>
                                                <div class="color-item">
                                                    <input type="radio" name="color" value="1">
                                                    <label class="color-name">XL</label>
                                                </div>
                                                <div class="color-item inactive">
                                                    <input type="radio" name="color" value="1">
                                                    <label class="color-name">XXL</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

                            </div>

                        <?php endif;?>

                    </div>
                </div>
                <!-- Product Tabs -->
                
                
            </div>
        </div>
    </div>
</div>