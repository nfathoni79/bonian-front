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
$this->Html->meta('og:site_name', 'Zolaku', ['block' => true]);
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

                            <div class="content-product-right col-md-7 col-sm-12 col-xs-12">

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
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="badge <?= $this->Badge->format($details['data']['point']); ?>"><?php echo $details['data']['point']; ?> Point</span>

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

                                        <?php if($details['data']['is_flash_sale']):?>
                                            <span class="label-product label-sale">On flash sale now</span>
                                        <?php endif;?>

                                    </div>
                                    <div class="panel panel-danger">
                                        <div class="panel-body">
                                            <p>Bagikan produk ini</p>
                                            <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-default btn-lg btn-whatsapp waShare" data-url="<?php echo $this->Url->build('',true);?>" data-title="<?= $details['data']['name'];?>" data-price="<?= $details['data']['price_sale'];?>"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-default btn-lg btn-instagram igShare" data-url="<?php echo $this->Url->build('',true);?>" data-title="<?= $details['data']['name'];?>" data-price="<?= $details['data']['price_sale'];?>"><i class="fab fa-instagram"></i> Instagram</a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-default btn-lg btn-facebook fbShare" data-url="<?php echo $this->Url->build('',true);?>" data-title="<?= $details['data']['name'];?>" data-price="<?= $details['data']['price_sale'];?>"><i class="fab fa-facebook"></i> Facebook</a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-default btn-lg btn-sms smsShare" data-url="<?php echo $this->Url->build('',true);?>" data-title="<?= $details['data']['name'];?>" data-price="<?= $details['data']['price_sale'];?>"><i class="fa fa-commenting"></i> Sms</a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-default btn-lg btn-line lineShare" data-url="<?php echo $this->Url->build('',true);?>" data-title="<?= $details['data']['name'];?>" data-price="<?= $details['data']['price_sale'];?>"><i class="fab fa-line"></i>  Line</a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-default btn-lg btn-twitter twitterShare" data-url="<?php echo $this->Url->build('',true);?>" data-title="<?= $details['data']['name'];?>" data-price="<?= $details['data']['price_sale'];?>"><i class="fab fa-twitter"></i> Twitter</a>
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
                                                        <span class="wh-stock wh-<?= $vals['name'];?>"><?= $vals['total'];?> Stok</span>
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

<div class="container mg-r-auto mg-l-auto pd-0">

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pd-l-0">
        <div class="card product-detail pd-0">
            <div class="panel mb-0">
                <div class="producttab clearfix mg-0">
                    <div class="tabsslider horizontal-tabs col-xs-12">
                        <ul class="nav nav-tabs zl-bg-white bd-none" id="myTab">
                            <li class="active"><a data-toggle="tab" href="#tab-deskripsi" class="pd-15-force"><i class="fa fa-file-text"></i> Deskripsi Produk</a></li>
                            <li class="item_nonactive"><a data-toggle="tab" href="#tab-highlight" class="pd-15-force"><i class="fab fa-dropbox"></i> Highlight Produk</a></li>
                            <li class="item_nonactive"><a data-toggle="tab" href="#tab-diskusi" class="pd-15-force"><i class="fa fa-comments"></i> Diskusi Produk</a></li>
                            <li class="item_nonactive"><a data-toggle="tab" href="#tab-ulasan" class="pd-15-force"><i class="fa fa-edit"></i> Ulasan Produk</a></li>
                        </ul>
                        <div class="tab-content bd-none-force">
                            <div id="tab-deskripsi" class="tab-pane fade active in">
                                <div class="row">
                                    <div class="col-sm-12 ht-300">
                                        <h4><strong>Tentang Produk</strong></h4>
                                        <p>
                                            <?php echo $details['data']['profile']; ?>
                                        </p>
                                        <h4><strong>Spesifikasi</strong></h4>
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
                                        <h4><strong>Highlight Produk</strong></h4>
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
                                <?php if($this->request->getSession()->check('Auth')):?>
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
                                        <div class="col-md-12">
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
                                                                <?php if($this->request->getSession()->check('Auth')):?>
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
                                                                            <div><img src="<?= $this->Url->build($_basePath . 'files/Customers/avatar/' . $val['customer']['avatar']); ?>" class="img-rounded"></div>
                                                                        </div>
                                                                        <div class="col-sm-11">
                                                                            <div>
                                                                                <span>
                                                                                    <strong><?= $val['customer']['full_name']?> </strong>  |
                                                                                    <i class="fa fa-clock"></i> <?php
                                                                                        echo $this->Time->timeAgoInWords(
                                                                                               $val['created'], array(
                                                                                                'end' => '+10 year',
                                                                                                'format' => 'F jS, Y',
                                                                                                'accuracy' => array('second' => 'second')
                                                                                            )
                                                                                        );
                                                                                    ?>
                                                                                    <?php if($this->request->getSession()->check('Auth')):?>
                                                                                    | <a href="javascript:void(0);" class="label label-danger reply-msg" data-for-name="<?= $vals['customer']['full_name']?>" data-for-id="<?= $vals['id']?>"> Reply </a>
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
                                <h4><i class="fa fa-pencil"></i><strong> Rating & Ulasan Produk</strong></h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <br />
                                        <div class="bg-red margin-b-10">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-3 pd-0">
                                                                <span><h1><b> 4 / 5 </b></h1></span>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <span class="pull-left"> 4 dari 5 </span>
                                                                <br />
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
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <span> 5 </span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="30" style="width:80%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <div> 25 </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <span> 4 </span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="30" style="width:80%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <div> 17 </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <span> 3 </span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="30" style="width:80%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <div> 11 </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <span> 2 </span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="30" style="width:80%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <div> 8 </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <span> 1 </span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="30" style="width:80%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <div> 6 </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-1">
                                                            <div><img src="http://localhost/zolaku-front/images/jpeg/users-profile/user-1.jpg" class="img-rounded"></div>
                                                        </div>
                                                        <div class="col-sm-11">
                                                            <?php echo $this->Form->control('comment', ['type' => 'textarea', 'class' => 'form-control', 'label' => false, 'div' => false,'placeholder' => 'Tulis komentar anda disini'])?>
                                                            <br />
                                                            <button class="btn btn-default btn-radius btn-sm pull-left btn-unggah" style="margin-right: 5px;"><i class="fa fa-upload"></i><strong> Unggah dokumen pendukung </strong></button>
                                                            <div class="rating">
                                                                <span> Tambahkan rating </span>
                                                                <div class="rating-box" style="padding-left: 55px;">
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                </div>
                                                            </div>
                                                            <br />
                                                            <button class="btn btn-danger btn-radius btn-sm pull-left" style="margin-right: 10px; margin-bottom: 10px;"><i class="fa fa-send"></i><strong> KIRIM KOMENTAR </strong></button>
                                                            <button class="btn btn-secondary btn-radius btn-sm pull-left" style="margin-bottom: 10px;"><strong> HAPUS </strong></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                    </div>
                                </div>
                                <h4> 2 ulasan untuk <strong> <?php echo $details['data']['name']; ?> </strong></h4>
                                <br />
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="bg-red margin-b-10">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div><img src="http://localhost/zolaku-front/images/jpeg/users-profile/user-1.jpg" class="img-rounded"></div>
                                                </div>
                                                <div class="col-sm-11">
                                                    <div class="row">
                                                        <span><strong>Axl Calvin Pearl</strong> 21 April 2019   Pukul 11:30</span>
                                                        <div class="rating pull-right">
                                                            <div class="rating-box star-box">
                                                                <span class="fa fa-stack star-rating"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack star-rating"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack star-rating"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack star-rating"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack star-rating"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            </div>
                                                        </div>
                                                        <br />
                                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="bg-red margin-b-10">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div><img src="http://localhost/zolaku-front/images/jpeg/users-profile/user-1.jpg" class="img-rounded"></div>
                                                </div>
                                                <div class="col-sm-11">
                                                    <div class="row">
                                                        <span><strong>Axl Calvin Pearl</strong> 21 April 2019   Pukul 11:30</span>
                                                        <div class="rating pull-right">
                                                            <div class="rating-box star-box">
                                                                <span class="fa fa-stack star-rating"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack star-rating"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack star-rating"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack star-rating"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack star-rating"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            </div>
                                                        </div>
                                                        <br />
                                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Product Tabs -->
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pd-r-0">
        <div class="card product-detail">
            <div class="panel mb-0">
                <div class="producttab clearfix">asdw</div>
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