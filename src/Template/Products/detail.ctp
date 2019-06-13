
<?php $this->append('style'); ?>
<?php
$this->Html->css([
'/css/custom/product-detail.css',
], ['block' => true]);
?>
<?php $this->end(); ?>

<?php $this->assign('title', trim($details['data']['name'])); ?>

<?php
    foreach($details['data']['images'] as $image){
        $img = $image;
        break;
    }
?>

<?php
$description = $this->Text->truncate($details['data']['highlight_text'],200,['ellipsis' => '...','exact' => false]);
$this->Html->meta('description',$description, ['block' => true]);
$this->Html->meta('image', $this->Url->build($_basePath . 'images/150x150/' . $img) , ['block' => true]);
$this->Html->meta('name', $details['data']['name'] , ['block' => true]);
$this->Html->meta('twitter:card', 'summary' , ['block' => true]);
$this->Html->meta('twitter:title', trim($details['data']['name']) , ['block' => true]);
$this->Html->meta('twitter:description', $description , ['block' => true]);
$this->Html->meta('og:title', trim($details['data']['name']), ['block' => true]);
$this->Html->meta('og:description', $description, ['block' => true]);
$this->Html->meta('og:image', $this->Url->build($_basePath . 'images/150x150/' . $img), ['block' => true]);
$this->Html->meta('og:url', $this->Url->build(), ['block' => true]);
$this->Html->meta('og:site_name', 'Bonian', ['block' => true]);
$this->Html->meta('og:type', 'product', ['block' => true]);
$this->Html->meta('product:price:amount', 'Rp.'.$this->Number->format($details['data']['price_sale']), ['block' => true]);
?>

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
                                        <img itemprop="image" class="product-image-zoom" src="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" data-zoom-image="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" data-image-name="<?= $image;?>" data-price="<?=  $details['data']['price_sale'];?>" title="<?php echo $details['data']['name']; ?>" alt="<?php echo $details['data']['name']; ?>">
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

                            <div class="content-product-right col-md-7 col-sm-12 col-xs-12 tx-mont">

                                <form id="form-cart">
                                    <input type="hidden" name="stock_id" value="" id="stockId">
                                    <input type="hidden" name="price_id" value="" id="priceId">
                                    <input type="hidden" name="sku" value="" id="sku">
                                    <input type="hidden" name="type" value="force" >
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="title-product">
                                                <h1><?php echo $details['data']['name']; ?></h1>
                                            </div>
                                            <div class="rating">
                                                <div class="rating-box">

                                                    <?php
                                                    $rate = ceil($details['data']['rating']);
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
                                        <div class="col-sm-3">
                                            <span class="badge mg-t-0 ft-right <?= $this->Badge->format($details['data']['point']); ?>"><?php echo $details['data']['point']; ?> Point</span>
                                        </div>
                                    </div>

                                    <!-- Review ---->
                                    <div class="box-review">
                                        <span class="">SKU : <span class="zl-sku"><?php echo $details['data']['sku']; ?></span></span>
                                        <span class="">Kategori : <?php echo @$details['data']['categories'][0]['name'];?></span>
                                    </div>
                                    <div class="product_page_price price" itemprop="offerDetails" itemscope="">
                                        <span class="price-new"><span itemprop="price" id="price-special">Rp.<?php echo $this->Number->format($details['data']['price_sale']); ?></span></span>
                                        <span class="price-old mg-t-3" id="price-old">Rp.<?php echo $this->Number->format($details['data']['price']); ?></span>
                                        <span class="label-product label-sale"><?= $details['data']['percent']; ?>%</span>

                                        <?php if($details['data']['is_flash_sale']):?>
                                            <span class="label-product label-sale">On flash sale now</span>
                                        <?php endif;?>

                                    </div>
                                    <div class="panel panel-danger">
                                        <div class="panel-body">
                                            <p class="tx-medium tx-mont zl-tx-black tx-14">Bagikan produk ini</p>
                                            <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-default btn-lg btn-whatsapp waShare" data-url="<?php echo $this->Url->build('',true);?>" data-title="<?= $details['data']['name'];?>" data-price="<?= $details['data']['price_sale'];?>" data-diskon="<?= $details['data']['percent']; ?>" data-point="<?= $details['data']['point']; ?>"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                                                </div>
                                                <!--
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-default btn-lg btn-instagram igShare" data-url="<?php echo $this->Url->build('',true);?>" data-title="<?= $details['data']['name'];?>" data-price="<?= $details['data']['price_sale'];?>" data-diskon="<?= $details['data']['percent']; ?>" data-point="<?= $details['data']['point']; ?>"><i class="fab fa-instagram"></i> Instagram</a>
                                                </div>-->
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-default btn-lg btn-facebook fbShare" data-url="<?php echo $this->Url->build('',true);?>" data-title="<?= $details['data']['name'];?>" data-price="<?= $details['data']['price_sale'];?>" data-diskon="<?= $details['data']['percent']; ?>" data-point="<?= $details['data']['point']; ?>"><i class="fab fa-facebook"></i> Facebook</a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-default btn-lg btn-sms smsShare" data-url="<?php echo $this->Url->build('',true);?>" data-title="<?= $details['data']['name'];?>" data-price="<?= $details['data']['price_sale'];?>" data-diskon="<?= $details['data']['percent']; ?>" data-point="<?= $details['data']['point']; ?>"><i class="fa fa-commenting"></i> Sms</a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-default btn-lg btn-line lineShare" data-url="<?php echo $this->Url->build('',true);?>" data-title="<?= $details['data']['name'];?>" data-price="<?= $details['data']['price_sale'];?>" data-diskon="<?= $details['data']['percent']; ?>" data-point="<?= $details['data']['point']; ?>"><i class="fab fa-line"></i>  Line</a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-default btn-lg btn-twitter twitterShare" data-url="<?php echo $this->Url->build('',true);?>" data-title="<?= $details['data']['name'];?>" data-price="<?= $details['data']['price_sale'];?>" data-diskon="<?= $details['data']['percent']; ?>" data-point="<?= $details['data']['point']; ?>"><i class="fab fa-twitter"></i> Twitter</a>
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
                                                        <input class="form-control" type="text" name="qty" value="1" id="qty">
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
                                            <!--
                                            <span class="help-btn">
                                                <strong><a href="javascript:void(0);" class="question" data-container="body" data-toggle="popover" data-placement="top" tabindex="0"><i class="fa fa-question-circle"></i></a></strong>
                                            </span>
                                            -->

                                        </div>
                                    </div>
                                    <?php endif;?>

                                    <div class="row vcenter">
                                        <div class="col-sm-3"><span class="zl-text">Model</span></div>
                                        <div class="col-sm-9">
                                            <span class="zl-tx-gray tx-13 tx-medium"><?= $details['data']['model'];?></span>
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
                                                        <span class="wh-stock wh-<?= $vals['name'];?>"><?= $vals['total'];?> Stok</span>
                                                    </div>
                                                </div>
                                            <?php endforeach;?>
                                        </div>
                                    </div>

                                    <div class="mg-t-40">
                                        <button type="button" class="btn btn-lg btn-radius btn-wishlist zl-tx-red--light tx-medium <?= !empty($details['data']['wishlist_id']) ? 'in-wish' : ''; ?>" data-wishlist-id="<?= $details['data']['wishlist_id']; ?>" data-product-id="<?= $details['data']['id']; ?>">
                                            <i class="<?= !empty($details['data']['wishlist_id']) ? 'fas' : 'far'; ?> fa-heart"></i>
                                            <span class="wish-count"><?= $details['data']['wishlist_count']; ?></span>
                                            Wishlist
                                        </button>
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

<div class="container mg-r-auto mg-l-auto pd-0">

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pd-l-0">
        <div class="card product-detail pd-0">
            <div class="panel mb-0">
                <div class="producttab clearfix mg-0">
                    <div class="tabsslider horizontal-tabs col-xs-12">
                        <ul class="nav nav-tabs zl-bg-white bd-none" id="myTab">
                            <li class="active zl-bg-gray"><a data-toggle="tab" href="#tab-deskripsi" class="pd-15-force"><i class="fa fa-file-text tx-18 mg-r-10"></i> Deskripsi Produk</a></li>
                            <li class="item_nonactive zl-bg-gray"><a data-toggle="tab" href="#tab-highlight" class="pd-15-force"><i class="fab fa-dropbox tx-18 mg-r-10"></i> Highlight Produk</a></li>
                            <li class="item_nonactive zl-bg-gray"><a data-toggle="tab" href="#tab-diskusi" class="pd-15-force"><i class="fa fa-comments tx-18 mg-r-10"></i> Diskusi Produk</a></li>
                            <li class="item_nonactive zl-bg-gray"><a data-toggle="tab" href="#tab-ulasan" class="pd-15-force"><i class="fa fa-edit tx-18 mg-r-10"></i> Ulasan Produk</a></li>
                        </ul>
                        <div class="tab-content bd-none-force">
                            <div id="tab-deskripsi" class="tab-pane fade active in">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="tx-mont tx-semibold zl-tx-black tx-16 mg-b-20"><strong>Tentang Produk</strong></h4>
                                        <hr>
                                        <p>
                                            <?php echo $details['data']['profile']; ?>
                                        </p>
                                        <br>
                                        <h4 class="tx-mont tx-semibold zl-tx-black tx-16 mg-b-20"><strong>Spesifikasi</strong></h4>
                                        <table class="table table-hover">
                                            <?php foreach($details['data']['attributes'] as $key => $vals): ?>
                                            <tr>
                                                <td><?php echo $key; ?></td>
                                                <td><?php echo $vals; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-highlight" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="tx-mont tx-semibold zl-tx-black tx-16 mg-b-20"><strong>Highlight Produk</strong></h4>
                                        <p>
                                            <?php echo $details['data']['highlight']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-diskusi" class="tab-pane fade">
                                <h4><i class="fa fa-comments zl-tx-black"></i><span class="tx-medium tx-mont zl-tx-black"> Punya pertanyaan mengenai produk ini?</span></h4>
                                <br />

                                <!-- FORM -->
                                <?php if($this->request->getSession()->check('Auth.Customers.email')):?>
                                <form id="comment" class="ajax-helper">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="bg-red margin-b-10">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div><img src="<?= $this->Url->build($_basePath . 'files/Customers/avatar/'.$this->request->getSession()->read('Auth.Customers.avatar') ); ?>" class="img-rounded"></div>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <span class="msg-for" style="display:none;"></span>
                                                        <input type="hidden" id="forId" name="parent_id" value="">
                                                        <input type="hidden"  name="product_id" value="<?php echo $details['data']['id']; ?>">
                                                        <div class="form-group">
                                                            <?php echo $this->Form->control('comment', ['type' => 'textarea', 'class' => 'form-control ', 'label' => false, 'div' => false,'placeholder' => 'Tulis diskusi anda disini', 'id' => 'komentar'])?>
                                                        </div>
                                                        <br />
                                                        <button class="btn btn-danger btn-radius btn-md pull-right btn-kirim-komen" style="margin-left: 10px;"><i class="fa fa-send"></i><strong> Kirim </strong></button>
                                                        <button type="button" class="btn btn-radius btn-md pull-right btn-hapus-comment"><strong> Hapus </strong></button>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                </form>
                                <?php endif;?>
                                <!-- END FORM-->

                                <?php if(!empty($comment['data'])):?>
                                    <div class="row">
                                        <div class="col-md-12 discuss-list">
                                            <?php foreach($comment['data'] as $key => $vals):?>
                                            <div class="bg-red mb-5">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div><img src="<?= $this->Url->build($_basePath . 'files/Customers/avatar/' . $vals['customer']['avatar']); ?>" class="img-rounded"></div>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <div class="row">
                                                            <span>
                                                                <strong><?= $vals['customer']['full_name']?></strong> |
                                                                <i class="fa fa-clock"></i> <?php
                                                                    echo $this->Time->timeAgoInWords(
                                                                           $vals['created'], array(
                                                                            'end' => '+10 year',
                                                                            'format' => 'F jS, Y',
                                                                            'accuracy' => array('second' => 'second')
                                                                        )
                                                                    );
                                                                ?>
                                                                <?php if($this->request->getSession()->check('Auth.Customers.email')):?>
                                                                | <a href="javascript:void(0);" class="label label-danger reply-msg" data-for-name="<?= $vals['customer']['full_name']?>" data-for-id="<?= $vals['id']?>"> Reply </a>
                                                                <?php endif;?>
                                                                <?php if($this->request->getSession()->read('Auth.Customers.email') == $vals['customer']['email']):?>
                                                                 <a href="javascript:void(0);" class="label label-danger delete-msg ml-2" data-for-name="<?= $vals['customer']['full_name']?>" data-for-id="<?= $vals['id']?>"> Delete </a>
                                                                <?php endif;?>
                                                            </span>
                                                            <br />
                                                            <p><?= $vals['comment']?></p>
                                                        </div>
                                                        <?php if(!empty($vals['children'])):?>
                                                            <?php foreach($vals['children'] as $val):?>
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-sm-1">
                                                                            <?php $img = $val['is_admin'] ? 'avatar.jpg' : $val['customer']['avatar'];?>
                                                                            <div><img src="<?= $this->Url->build($_basePath . 'files/Customers/avatar/' . $img); ?>" class="img-rounded"></div>
                                                                        </div>
                                                                        <div class="col-sm-11">
                                                                            <div>
                                                                                <span>
                                                                                    <strong>
                                                                                    <?= $val['is_admin'] ? 'Administrator - '.$val['user']['first_name'] : $val['customer']['full_name'];?>
                                                                                    </strong>  |
                                                                                    <i class="fa fa-clock"></i> <?php
                                                                                        echo $this->Time->timeAgoInWords(
                                                                                               $val['created'], array(
                                                                                                'end' => '+10 year',
                                                                                                'format' => 'F jS, Y',
                                                                                                'accuracy' => array('second' => 'second')
                                                                                            )
                                                                                        );
                                                                                    ?>
                                                                                    <?php if($this->request->getSession()->check('Auth.Customers.email')):?>
                                                                                    <?php $name = $val['is_admin'] ? 'Administrator - '.$val['user']['first_name'] : $val['customer']['full_name'];?>
                                                                                    | <a href="javascript:void(0);" class="label label-danger reply-msg" data-for-name="<?= $name;?>" data-for-id="<?= $vals['id']?>"> Reply </a>
                                                                                    <?php endif;?>
                                                                                    <?php if($this->request->getSession()->read('Auth.Customers.email') == $val['customer']['email']):?>
                                                                                     <a href="javascript:void(0);" class="label label-danger delete-msg ml-2" data-for-name="<?= $val['customer']['full_name']?>" data-for-id="<?= $val['id']?>"> Delete </a>
                                                                                    <?php endif;?>
                                                                                </span>
                                                                                <br />
                                                                                <p><?= $val['comment']?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach;?>
                                            <div class="show-more text-center">Show more</div>
                                        </div>
                                    </div>
                                <?php else :?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="bg-red margin-b-10">
                                                <p>Belum ada diskusi untuk produk ini.</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </div>
                            <div id="tab-ulasan" class="tab-pane fade">
                                <h4 class="tx-mont tx-semibold zl-tx-black tx-16 mg-b-20"><i class="fas fa-pencil-alt mg-r-10"></i><strong> Rating & Ulasan Produk</strong></h4>


                                <div class="row">
                                    <div class="col-md-12">
                                        <br />
                                        <div class="bg-red margin-b-10">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-2 tx-center">
                                                                <h1 class="zl-tx-red--light"><?php echo round($details['data']['rating'],1);?> <small>dari 5</small></h1>
                                                                <div class="rating">
                                                                    <div class="rating-box">
                                                                        <?php
                                                                            $max = 5;
                                                                            $sisa = $max - ceil($details['data']['rating']);
                                                                            for($i=0;$i<=(ceil($details['data']['rating']) -1 );$i++){
                                                                                echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
                                                                        }
                                                                        for($i=0;$i<= ($sisa -1);$i++){
                                                                        echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10 mg-t-20">

                                                                <a href="<?= $this->Url->build([
                                                                    'controller' => 'Products',
                                                                    'action' => 'detail',
                                                                    $details['data']['slug'],
                                                                    'prefix' => false,
                                                                    '#' => 'tab-ulasan',
                                                                    '?' => ['rating' => 'ulasan']
                                                                ]); ?>" class="btn btn-default btn-lg mg-t-15">
                                                                    Semua
                                                                </a>
                                                                <a href="<?= $this->Url->build([
                                                                    'controller' => 'Products',
                                                                    'action' => 'detail',
                                                                    $details['data']['slug'],
                                                                    'prefix' => false,
                                                                    '#' => 'tab-ulasan',
                                                                    '?' => ['rating' => '5']
                                                                ]); ?>" class="btn btn-default btn-lg mg-t-15">
                                                                    5 Bintang
                                                                </a>
                                                                <a href="<?= $this->Url->build([
                                                                    'controller' => 'Products',
                                                                    'action' => 'detail',
                                                                    $details['data']['slug'],
                                                                    'prefix' => false,
                                                                    '#' => 'tab-ulasan',
                                                                    '?' => ['rating' => '4']
                                                                ]); ?>" class="btn btn-default btn-lg mg-t-15">
                                                                    4 Bintang
                                                                </a>
                                                                <a href="<?= $this->Url->build([
                                                                    'controller' => 'Products',
                                                                    'action' => 'detail',
                                                                    $details['data']['slug'],
                                                                    'prefix' => false,
                                                                    '#' => 'tab-ulasan',
                                                                    '?' => ['rating' => '3']
                                                                ]); ?>" class="btn btn-default btn-lg mg-t-15">
                                                                    3 Bintang
                                                                </a>
                                                                <a href="<?= $this->Url->build([
                                                                    'controller' => 'Products',
                                                                    'action' => 'detail',
                                                                    $details['data']['slug'],
                                                                    'prefix' => false,
                                                                    '#' => 'tab-ulasan',
                                                                    '?' => ['rating' => '2']
                                                                ]); ?>" class="btn btn-default btn-lg mg-t-15">
                                                                    2 Bintang
                                                                </a>
                                                                <a href="<?= $this->Url->build([
                                                                    'controller' => 'Products',
                                                                    'action' => 'detail',
                                                                    $details['data']['slug'],
                                                                    'prefix' => false,
                                                                    '#' => 'tab-ulasan',
                                                                    '?' => ['rating' => '1']
                                                                ]); ?>" class="btn btn-default btn-lg mg-t-15">
                                                                    1 Bintang
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br />
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                    </div>
                                </div>
                                <?php if(!empty($review)):?>
                                <?php foreach($review as $vals):?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="bg-red margin-b-10">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div><img src="<?= $this->Url->build($_basePath . 'files/Customers/avatar/' . $vals['customer']['avatar']); ?>" class="img-rounded"></div>
                                                </div>
                                                <div class="col-sm-11">
                                                    <div class="row">
                                                        <span><strong><?= $vals['customer']['full_name'];?></strong> |
                                                        <i class="fa fa-clock"></i> <?php
                                                            echo $this->Time->timeAgoInWords(
                                                                   $vals['created'], array(
                                                                    'end' => '+10 year',
                                                                    'format' => 'F jS, Y',
                                                                    'accuracy' => array('second' => 'second')
                                                                )
                                                            );
                                                        ?></span>

                                                        <div class="rating pull-right">
                                                            <div class="rating-box star-box">

                                                                <?php
                                                                $max = 5;
                                                                $sisa = $max - $vals['rating'];
                                                                for($i=0;$i<=($vals['rating'] -1 );$i++){
                                                                    echo '<span class="fa fa-stack star-rating"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
                                                                }
                                                                for($i=0;$i<= ($sisa -1);$i++){
                                                                echo '<span class="fa fa-stack star-rating"><i class="fa fa-star-o fa-stack-1x"></i></span>';
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                        <br />
                                                        <p><?= $vals['comment']?></p>
                                                        <?php if(!empty($vals['product_rating_images'])): ?>
                                                            <?php foreach($vals['product_rating_images'] as $val ):?>
                                                                <div class="col-sm-3">
                                                                    <div class="thumbnail">
                                                                        <a class="image-popup-vertical-fit" href="<?= $this->Url->build($_basePath . 'files/ProductRatingImages/' . $val['name']); ?>">
                                                                            <img class="img-responsive" src="<?= $this->Url->build($_basePath . 'files/ProductRatingImages/' . $val['name']); ?>" >
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                    </div>
                                </div>
                                <?php endforeach;?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                if (isset($paginationReview) && $paginationReview instanceof \Pagination\Pagination) :
                                    //get indexes in page
                                    $indexes = $paginationReview->getIndexes(new \Pagination\StrategySimple(5));
                                        $iterator = $indexes->getIterator();
                                        if ($iterator->count() > 1) :
                                        ?>
                                        <nav aria-label="Page navigation" style="margin: 0 auto; text-align: center;">
                                            <ul class="pagination">
                                                <li>
                                                    <a href="<?= $this->Url->build([
                                                'controller' => 'Products',
                                                'action' => 'detail',
                                                $details['data']['slug'],
                                                'prefix' => false,
                                                '#' => 'tab-ulasan',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $paginationReview->getFirstPage(), 'content' => 'ulasan'])
                                            ]); ?>" aria-label="First">
                                                        <span aria-hidden="true">First</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= $this->Url->build([
                                                'controller' => 'Products',
                                                'action' => 'detail',
                                                $details['data']['slug'],
                                                'prefix' => false,
                                                '#' => 'tab-ulasan',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $paginationReview->getPreviousPage(), 'content' => 'ulasan'])
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
                                                    'controller' => 'Products',
                                                    'action' => 'detail',
                                                    $details['data']['slug'],
                                                    'prefix' => false,
                                                '#' => 'tab-ulasan',
                                                    '?' => array_merge($this->request->getQuery(), ['page' => $iterator->current(), 'content' => 'ulasan'])
                                                ]); ?>">
                                                        <?php echo $iterator->current() ?>
                                                    </a>
                                                </li>
                                                <?php $iterator->next(); endwhile; ?>
                                                <li>
                                                    <a href="<?= $this->Url->build([
                                                'controller' => 'Products',
                                                'action' => 'detail',
                                                $details['data']['slug'],
                                                'prefix' => false,
                                                '#' => 'tab-ulasan',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $paginationReview->getNextPage(), 'content' => 'ulasan'])
                                            ]); ?>" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= $this->Url->build([
                                                'controller' => 'Products',
                                                'action' => 'detail',
                                                $details['data']['slug'],
                                                'prefix' => false,
                                                '#' => 'tab-ulasan',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $paginationReview->getLastPage(), 'content' => 'ulasan'])
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
                                <?php else :?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="bg-red margin-b-10">
                                            <p>Belum ada ulasan untuk produk ini.</p>
                                        </div>
                                    </div>
                                </div>
                                <?php endif;?>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Product Tabs -->
            </div>
        </div>


        <div class="card-wrapper c-flash-wrapper">
            <div class="card-wrapper-title mg-l-0 mg-t-0">Produk Terkait</div>
            <div class="related flash-sale titleLine products-list grid module " style="padding: 20px;">
                <div id="so_extra_slider_1" class="so-extraslider" >
                    <div class="releate-products yt-content-slider products-list" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="yes" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="20" data-items_column0="4" data-items_column1="3" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">

                        <?php foreach($releted as $vals):?>
                        <div class="item products">
                            <div class="product-layout">
                                <div class="product-item-container">
                                    <div class="left-block left-b">
                                        <div class="product-image-container">
                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['product']['slug']]); ?>" title="" target="_self">
                                                <?php  foreach($vals['product']['images'] as $image) : ?>
                                                <img src="<?= $this->Url->build($_basePath . 'images/213x150/' . $image); ?>" data-image-name="<?= $image; ?>"  class="img-responsive" alt="image">
                                                <?php  break; endforeach; ?>
                                            </a>
                                        </div>
                                        <div class="box-label"> <span class="product-ribbon"> <?= $vals['product']['percent']; ?>% </span></div>

                                    </div>
                                    <div class="right-block right-b">

                                        <div class="caption tx-left">
                                            <div class="row mg-l-0">
                                                <h4 class="tx-bold"><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail',$vals['product']['slug']]); ?>" title="title" target="_self">
                                                    <?php echo $this->Text->truncate(
                                                    h($vals['product']['name']),
                                                    25,
                                                    [
                                                    'ellipsis' => '...',
                                                    'exact' => false
                                                    ]
                                                    );?>
                                                </a></h4>

                                                <div class="col-lg-12 price text-left p-0">
                                                    <span class="price-new tx-13-force">Rp. <?= $this->Number->format($vals['product']['price_sale']); ?></span>
                                                    <?php if($vals['product']['price_sale'] != $vals['product']['price']):?>
                                                    <span class="price-old tx-11-force">Rp. <?= $this->Number->format($vals['product']['price']); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="button-group so-quickview cartinfo--static share-container">
                                                <div class="row pd-0">
                                                    <button type="button" class="btn-share b-fb fbShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['product']['slug'],'prefix' => false],true);?>" data-title="<?= $vals['product']['name'];?>" data-price="<?= $vals['product']['price_sale'];?>"><i class="fab fa-facebook"></i></button>
                                                    <button type="button" class="btn-share b-wa waShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['product']['slug'],'prefix' => false],true);?>" data-title="<?= $vals['product']['name'];?>" data-price="<?= $vals['product']['price_sale'];?>"><i class="fab fa-whatsapp"></i></button>
                                                    <button type="button" class="btn-share b-ln lineShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['product']['slug'],'prefix' => false],true);?>" data-title="<?= $vals['product']['name'];?>" data-price="<?= $vals['product']['price_sale'];?>"><i class="fab fa-line"></i></button>
                                                    <button type="button" class="btn-share b-tw twitterShare" data-url="<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'detail', $vals['product']['slug'],'prefix' => false],true);?>" data-title="<?= $vals['product']['name'];?>" data-price="<?= $vals['product']['price_sale'];?>"><i class="fab fa-twitter"></i></button>
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
            </div>
        </div>


    </div>

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pd-r-0">
        <div class="card product-detail ">
            <div class="panel mb-0">
                <div class="producttab">
                    <h5 class="tx-black mg-t-m25">Metode Pembayaran</h5>
                    <div class="dash-line"></div>
                    <div class="row pd-t-25">
                        <div class="col-lg-6">
                            <?php echo $this->Html->image('/images/logo_bank/bca.png', ['alt' => 'logo bca', 'width' => '77']); ?>
                        </div>
                        <div class="col-lg-6">
                            <span class="mg-t-5 tx-black">Bank BCA</span>
                        </div>
                    </div>
                    <div class="row pd-t-25">
                        <div class="col-lg-6">
                            <?php echo $this->Html->image('/images/logo_bank/mandiri.png', ['alt' => 'logo mandiri', 'width' => '83']); ?>
                        </div>
                        <div class="col-lg-6">
                            <span class="mg-t-5 tx-black">Bank Mandiri</span>
                        </div>
                    </div>
                    <div class="row pd-t-25">
                        <div class="col-lg-6">
                            <?php echo $this->Html->image('/images/logo_bank/bni.png', ['alt' => 'logo bni', 'width' => '77']); ?>
                        </div>
                        <div class="col-lg-6">
                            <span class="mg-t-5 tx-black">Bank BNI</span>
                        </div>
                    </div>
                    <div class="row pd-t-25">
                        <div class="col-lg-6">
                            <?php echo $this->Html->image('/images/logo_other_payment/gopay.png', ['alt' => 'logo gopay', 'width' => '77']); ?>
                        </div>
                        <div class="col-lg-6">
                            <span class="mg-t-5 tx-black">GO PAY</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="card product-detail ">
            <div class="panel mb-0">
                <div class="producttab">
                    <h5 class="tx-black mg-t-m25">Metode Pengiriman</h5>
                    <div class="dash-line"></div>
                    <div class="row pd-t-25">
                        <div class="col-lg-6">
                            <?php echo $this->Html->image('/images/logo_courier/jne.png', ['alt' => 'logo jne']); ?>
                        </div>
                        <div class="col-lg-6">
                            <?php echo $this->Html->image('/images/logo_courier/tiki.png', ['alt' => 'logo tiki']); ?>
                        </div>
                    </div>
                    <div class="row pd-t-25">
                        <div class="col-lg-6">
                            <?php echo $this->Html->image('/images/logo_courier/jnt.png', ['alt' => 'logo jnt']); ?>
                        </div>
                        <div class="col-lg-6">
                            <?php echo $this->Html->image('/images/logo_courier/gosend.png', ['alt' => 'logo gosend']); ?>
                        </div>
                    </div>
                </div>
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
