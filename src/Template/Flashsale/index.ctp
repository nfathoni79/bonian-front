<?php $this->append('style'); ?>
<?php
$this->Html->css([
'/css/custom/flashsale.css',
'/css/aos',
], ['block' => true]);
?>
<?php $this->end(); ?>

<!-- start: header part -->
<div class="c-header__bg" style="z-index:0;"> 
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-home"></i></a></li>
                <li>Flashsale</li>
            </ul>
        </div>
    </div>
</div>
<!-- end: header part -->


<div class="c-dp-main mb-5 flashsale-content">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-12 item-article">

                <!-- <div class="pd-25">
                    <img src="images/flashsale-banner/banner.jpg" width="100%">
                </div> -->

                <div class="module sohomepage-slider pd-25">
                    <div class="yt-content-slider"  data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                        <!-- <div class="yt-content-slide">
                            <a title="slide1" href="#"><div class="yt-content-slide"><img src="<?= $this->Url->build($_basePath . 'images/1150x317/'. $banner['banner']['image']); ?>" class="responsive wd-100p"></div></a>
                        </div> -->
                        <div class="yt-content-slide">
                            <a title="slide1" href="#"><div class="yt-content-slide"><img src="images/flashsale-banner/banner.jpg" class="responsive wd-100p"></div></a>
                        </div>
                        <div class="yt-content-slide">
                            <a title="slide1" href="#"><div class="yt-content-slide"><img src="images/flashsale-banner/banner.jpg" class="responsive wd-100p"></div></a>
                        </div>
                        <div class="yt-content-slide">
                            <a title="slide1" href="#"><div class="yt-content-slide"><img src="images/flashsale-banner/banner.jpg" class="responsive wd-100p"></div></a>
                        </div>
                    </div>
                </div>

                <div class="tabs effect-3 br-10 overflow-hidden">

                    <?php foreach($time_sale as $key => $vals):?>
                    <input type="radio" id="tab-<?= $vals['id']?>" name="tab" value="<?= $vals['id']?>">
                    <span href="#tab-item-<?= $vals['id']?>">
                        <div class="current-sale lh-1 pd-20">
                            <div class="sale-time tx-32 tx-bold">
                                <?= $vals['time']?>
                            </div>
                            <div class="sale-text tx-medium">
                                <?= $key == 0 ? 'Sedang Berjalan' : 'Akan Datang';?>
                            </div>
                        </div>
                    </span>
                    <?php endforeach;?>

                    <div class="line ease"></div>

                    <!-- notif-tab-content -->
                    <div class="notif-tab-content bd-0">

                        <?php foreach($time_sale as $key => $vals):?>
                        <section id="tab-item-<?= $vals['id']?>">


                        </section>
                        <?php endforeach;?>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php
$this->Html->script([
    '/js/aos.js',
    ], ['block' => true]);
    ?>
    <?php $this->append('script'); ?>
    <script>
        $(document).ready(function () {
            $("input:radio").on('change',function(){
                var active = $(this).val();
                if(active){
                    var basePath = $('meta[name="_basePath"]').attr('content');
                    $.ajax({
                        url: "<?php echo $this->Url->build(['action' => 'get-list']);?>/"+active,
                        type : 'GET',
                        dataType : 'json',
                        success: function(response){
                            var productList = '';
                            productList += '<div id="product-container-layout"><div class="products-list row nopadding-xs so-filter-gird grid mg-t-15">';

                            $.each(response.product_deal_details, function(key, value){
                                productList += '<div class="product-layout products col-2dot4" data-aos="fade-up">\n' +
                                    '<div class="product-item-container">';
                                productList += '<div class="left-block left-b">';
                                productList += '<div class="product-card__gallery product-card__left">';
                                $.each(value.product.images, function(k, v){
                                    if(k <= 2){
                                        productList += '\n' +
                                            '<div class="item-img" data-src="<?= $_basePath;?>images/195x195/'+v+'">\n' +
                                            '<img src="<?= $_basePath;?>images/46x46/'+v+'" data-image-name="'+v+'" alt="image">\n' +
                                            '</div>';
                                    }else{
                                        return false;
                                    }
                                });
                                productList += '</div>';
                                productList += '<div class="product-image-container">';
                                $.each(value.product.images, function(k, v){
                                    productList += '<a href="'+basePath+'/products/detail/'+value.product.slug+'" title="'+value.product.name+'">\n' +
                                        '<img src="<?= $_basePath;?>images/195x195/'+v+'" data-image-name="'+v+'" class="img-responsive" alt="image">\n' +
                                        '</a>';
                                    return false;
                                });
                                productList += '<div class="box"></div><span class="product-ribbon"> '+value.product.percent+'% </span>';
                                productList += '</div>';
                                productList += '</div>';
                                productList += '<div class="right-block right-b"><div class="caption tx-left">';
                                productList += '<div class="progress mg-b-0" style="height: 10px !important;"><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="'+value.product.salestock+'" aria-valuemin="0" aria-valuemax="100" style="width:'+value.product.salestock+'%"></div>\n' +
                                    '</div><small>'+value.product.noted+'</small>';
                                productList += '<h4> <a href="'+basePath+'/products/detail/'+value.product.slug+'" title="'+value.product.name+'"> '+value.product.name+'</a> </h4>';

                                productList += '<div class="price text-left p-0">\n' +
                                    '<span class="price-new tx-13-force">Rp. '+numeral(value.product.price_sale).format('0,0')+'</span>\n' +
                                    '<span class="price-old tx-11-force">Rp. '+numeral(value.product.price).format('0,0')+'</span>\n' +
                                    '</div>';

                                productList += '<div class="button-group so-quickview cartinfo--static share-container"><div class="row pd-0"><button type="button" class="btn-share b-fb fbShare" data-url="'+basePath+'/products/detail/'+value.product.slug+'" data-title="'+value.product.name+'" data-price="'+value.product.price_sale+'"><i class="fab fa-facebook"></i></button><button type="button" class="btn-share b-wa waShare" data-url="'+basePath+'/products/detail/'+value.product.slug+'" data-title="'+value.product.name+'" data-price="'+value.product.price_sale+'"><i class="fab fa-whatsapp"></i></button><button type="button" class="btn-share b-ln lineShare" data-url="'+basePath+'/products/detail/'+value.product.slug+'" data-title="'+value.product.name+'" data-price="'+value.product.price_sale+'"><i class="fab fa-line"></i></button><button type="button" class="btn-share b-tw twitterShare" data-url="'+basePath+'/products/detail/'+value.product.slug+'" data-title="'+value.product.name+'" data-price="'+value.product.price_sale+'"><i class="fab fa-twitter"></i></button></div></div>';

                                productList += '</div></div>';
                                productList += '</div></div>';
                            });
                            productList += '</div></div>';
                            $('#tab-item-'+active).html(productList);

                            AOS.init();
                        }
                    })
                }
            });
            $("#tab-1").trigger('click');
        })

        $(document.body).on('mouseenter', '.product-card__gallery .item-img' ,function(){
            $(this).addClass('thumb-active').siblings().removeClass('thumb-active');
            var thumb_src = $(this).attr("data-src");
            $(this).closest('.product-item-container').find('img.img-responsive').attr("src",thumb_src);
        });

        var reffcode = $.cookie('reffcode');
        var reff;
        if(reffcode != undefined){
            reff = reffcode;
        }else{
            reff = '';
        }

        $(document.body).on('click', '.waShare' ,function(){
            window.open('https://api.whatsapp.com/send?text=Beli '+$(this).data('title')+' '+$(this).data('url')+'/'+reff+'/wa Harga Promo Rp. '+numeral($(this).data('price')).format('0,0')+' hanya di Bonian! Dapatkan Bonus Point '+numeral($(this).data('point')).format('0,0')+' serta dapatkan Potongan Kupon dan Voucher Diskon, Beli Sekarang ! ','_blank','width=600, height=368');
            return false;
        });

        $(document.body).on('click', '.fbShare' ,function(){
            window.open('https://www.facebook.com/sharer.php?u='+$(this).data('url')+'/'+reff+'/fb','_blank','width=600, height=368');
            return false;
        });

        $(document.body).on('click', '.lineShare' ,function(){
            window.open('https://lineit.line.me/share/ui?url='+$(this).data('url')+'/'+reff+'/line&text=Beli '+$(this).data('title')+' Harga Promo Rp. '+numeral($(this).data('price')).format('0,0')+' hanya di Bonian! Dapatkan Bonus Point '+numeral($(this).data('point')).format('0,0')+' serta dapatkan Potongan Kupon dan Voucher Diskon, Beli Sekarang ! ','_blank','width=600, height=368');
            return false;
        });

        $(document.body).on('click', '.twitterShare' ,function(){
            window.open('https://twitter.com/share?url='+$(this).data('url')+'/'+reff+'/twitter&text=Beli '+$(this).data('title')+' Harga Promo Rp. '+numeral($(this).data('price')).format('0,0')+' hanya di Bonian! Dapatkan Bonus Point '+numeral($(this).data('point')).format('0,0')+' serta dapatkan Potongan Kupon dan Voucher Diskon, Beli Sekarang ! ','_blank','width=600, height=368');
            return false;
        });

    </script>
    <?php $this->end(); ?>