<!-- start: header part -->
<div class="c-header__bg" style="z-index:0;">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-home"></i></a></li>
                <?php
                    foreach ($details['data']['categories'] as $crumb) {
                        echo '<li><a href="'.$this->Url->build(['controller' => 'Search', 'action' => 'index', '?' => ['category_id' => $crumb['id']]]).'">'.$crumb['name'].'</a></li>';
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
                                        <img itemprop="image" class="product-image-zoom" src="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" data-zoom-image="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" data-image-name="<?= $image;?>" title="<?php echo $details['data']['name']; ?>" alt="<?php echo $details['data']['name']; ?>">
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
                                    <input type="hidden" name="stock_id" value="" id="stockId">
                                    <input type="hidden" name="price_id" value="" id="priceId">
                                    <input type="hidden" name="type" value="force" >
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="title-product">
                                                <h1><?php echo $details['data']['name']; ?></h1>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
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

                                            <div class="rating">
                                                <div class="rating-box">

                                                    <?php
                                                    $rate = $details['data']['rating'];
                                                    for ($x = 0; $x < $rate; $x++) {
                                                        echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> ';
                                                    }
                                                    for ($x = 0; $x < 5-$rate; $x++) {
                                                    echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> ';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                                                        <input class="form-control" type="text" name="qty" value="1">
                                                        <input type="hidden" name="product_id" id="productId" value="<?= $details['data']['id'];?>">
                                                        <span class="input-group-addon product_quantity_up">+</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($details['data']['use_coupon']):?>
                                    <div class="row vcenter">
                                        <div class="col-sm-3"><span class="zl-text">Kupon</span></div>
                                        <div class="col-sm-9">
                                            <div class="coupon-wrapper">
                                                <div class="coupon-left">
                                                    <span>Rp. <?php echo $this->Number->format($details['data']['coupon_price']);?></span>
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
                                    <?php endif;?>

                                    <div class="row vcenter">
                                        <div class="col-sm-3"><span class="zl-text">Model</span></div>
                                        <div class="col-sm-9">
                                            <span class="zl-text"><?= $details['data']['model'];?></span>
                                        </div>
                                    </div>

                                    <div class="row vcenter notification" style="display:none;">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <div class="message"></div>
                                        </div>
                                    </div>
<?php
$branch = array();
foreach($details['data']['variant'] as $vals){
    foreach($vals['stocks'] as $val){
        if(!in_array($val['branch_name'],$branch)){
            $branch[] = $val['branch_name'];
        }
    }
}
$branches = array();
foreach($branch as $k => $vals){
    $total = 0;
    foreach($details['data']['variant'] as $val){
        foreach($val['stocks'] as $v){
            if($v['branch_name'] == $vals){
                $total += $v['stock'];
            }
        }
    }
    $branches[$k]['name'] = $vals;
    $branches[$k]['total'] = $total;
}
?>
                                    <?php $i = 0;?>
                                    <?php foreach($details['data']['options'] as $key => $vals):?>
                                    <div class="row vcenter">
                                        <div class="col-sm-3"><span class="zl-text"><?= $key;?></span></div>
                                        <div class="col-sm-9">
                                            <div class="color-form-wrapper">
                                                <div class="form-group">
                                                    <?php foreach($vals as $k => $v):?>
                                                        <!-- active - inactive-->
                                                        <div class="color-item zl-color <?php echo $key;?>" data-item="<?php echo $i;?>" data-option="<?php echo $key;?>" data-label="<?php echo $v;?>">
                                                            <input type="radio" name="<?php echo strtolower($key);?>" value="<?= $v;?>">
                                                            <label class="color-name"><?= $v;?></label>
                                                        </div>
                                                    <?php endforeach;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $i++;?>
                                    <?php endforeach;?>
                                    <div class="row vcenter add-price" style="display:none;">
                                        <div class="col-sm-3"><span class="zl-text">Tambahan harga</span></div>
                                        <div class="col-sm-9">
                                            <span class="zl-text text-add-price"></span>
                                        </div>
                                    </div>
                                    <div class="row vcenter">
                                        <div class="col-sm-3"><span class="zl-text">Stok Tersedia</span></div>
                                        <div class="col-sm-9">
                                            <?php foreach($branches as $vals):?>
                                                <?php $status = ($vals['total'] <= 0) ? 'inactive': '';?>
                                                <div class="col-sm-4 wh-wrapper <?= $status;?>">
                                                    <div class="wh-item">
                                                        <span class="wh-label">
                                                            <label><?= $vals['name'];?></label>
                                                            <input type="radio" name="stock" value="<?= $vals['name'];?>">
                                                        </span>
                                                        <span class="wh-stock"><?= $vals['total'];?> Stok</span>
                                                    </div>
                                                </div>
                                            <?php endforeach;?>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="btn btn-lg btn-radius btn-danger btn-pay">Bayar sekarang</a>
                                        <a class="btn btn-lg btn-radius btn-add"><i class="fa fa-shopping-cart"></i> Tambah ke keranjang</a>
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