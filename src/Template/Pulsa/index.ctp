<style type="text/css">
    
.fullwidth-section{
    background: #fff;
    width: 100%;
    left: 0;
}
.fullwidth-section .container{
    padding-bottom: 75px;
}
.dp-pulsa-content div .dp-pulsa-text{
    text-align: center;
}
.dp-pulsa-content div .dp-pulsa-text h2{
    color: #777;
    font-weight: 700;
}
.dp-pulsa-content div .img-item{
    margin: 75px 0 25px 0; 
}
.dp-pulsa-content div .img-item img{
    height: 200px;
}
.dp-pulsa-content{
    margin-top: 75px;
}
.dp-pulsa-content h1{
    font-size: 2.35em;
    text-transform: uppercase;
    font-weight: 700;
    color: #222;
}

</style>

<!-- start: header part -->
<div class="c-header__bg" style="z-index:0;">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-home"></i></a></li>
                <li><a >Halaman</a></li>
                <li><a href="">Produk Digital</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- end: header part -->

<div class="c-dp-main mb-5">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-12 item-article">
                <!-- Product Tabs -->
                <div class="producttab">
                    <div class="tabsslider horizontal-tabs col-xs-12">
                        <ul class="nav nav-tabs">
                            <li class="item pulsa active"><a data-toggle="tab" href="#tab-1"><img src="images/digital_product/pulsa.svg">Pulsa</a></li>
                            <li class="item paket-data"><a data-toggle="tab" href="#tab-2"><img src="images/digital_product/paket-data.svg">Paket Data</a></li>
                            <li class="item listrik"><a data-toggle="tab" href="#tab-3"><img src="images/digital_product/listrik.svg">Listrik</a></li>
                            <li class="item tagihan"><a data-toggle="tab" href="#tab-4"><img src="images/digital_product/tagihan.svg">Tagihan</a></li>
                            <li class="item pdam"><a data-toggle="tab" href="#tab-5"><img src="images/digital_product/pdam.svg">PDAM</a></li>
                            <li class="item bpjs"><a data-toggle="tab" href="#tab-6"><img src="images/digital_product/bpjs.svg">BPJS</a></li>
                        </ul>
                        <div class="tab-content p-0">
                            <div id="tab-1" class="tab-pane fade active in">
                                <section class="pane-top">
                                    <div class="row">
                                        <div class="col-sm-6 p-0 form-group">
                                            <label class="control-label " for="input-email">No. Handphone</label>
                                            <input type="text" name="phone" value="" id="input-phone" class="form-control" placeholder="Contoh 081234567890">
                                            <span class="zl-provider"></span>
                                            <div class="help-block"></div>
                                        </div>
                                        <div class="col-sm-6 radio jenispulsa pl-5">

                                        </div>
                                    </div>
                                    <div class="row result">
                                        <form id="package-price" class="form-package">

                                        </form>
                                    </div>
                                </section>

                                <section class="pane-bottom p-5 bottom-pulsa"  style="display:none;">
                                    <div class="bottom-container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="col-sm-4 img-wrapper">
                                                    <div class="img-provider"></div>
                                                </div>
                                                <div class="col-sm-8 pt-5 pb-5">
                                                    <h1 class="bottom-title title-provider"></h1>
                                                    <p class="p-0 m-0 point-provider"></p>
                                                </div>

                                            </div>
                                            <div class="col-sm-3 price-wrapper">
                                                <p class="text">Harga</p>
                                                <h1 class="price-total price-provider"></h1>
                                            </div>
                                            <div class="col-sm-2 btn-wrapper">
                                                <div><button type="submit" id ="submitForm" class="btn btn-danger btn-lg btn-block btn-radius" disabled >Beli Sekarang</button></div>
                                            </div>
                                        </div>
                                    </div>

                                </section>

                                <!-- <section class="mt-5 mb-5 logo-operator" style="float: left;width: 100%;"> -->
                                    <!-- <div class="col-sm-12 logo-operator-wrapper">
                                        <div class="logo-item">
                                            <img src="<?= $this->Url->build($_basePath . 'img/provider/simpati_2.png'); ?>"  class="img-responsive" alt="telkomsel"  width="83">
                                        </div>
                                        <div class="logo-item">
                                            <img src="<?= $this->Url->build($_basePath . 'img/provider/mentari_2.png'); ?>"  class="img-responsive" alt="indosat"  width="83">
                                        </div>
                                        <div class="logo-item">
                                            <img src="<?= $this->Url->build($_basePath . 'img/provider/xl_3.png'); ?>"  class="img-responsive" alt="xl"  width="83">
                                        </div>
                                        <div class="logo-item">
                                            <img src="<?= $this->Url->build($_basePath . 'img/provider/axis_2.png'); ?>"  class="img-responsive" alt="axis"  width="83">
                                        </div>
                                        <div class="logo-item">
                                            <img src="<?= $this->Url->build($_basePath . 'img/provider/tri_2.png'); ?>"  class="img-responsive" alt="tri"  width="83">
                                        </div>
                                        <div class="logo-item">
                                            <img src="<?= $this->Url->build($_basePath . 'img/provider/smartfren_3.png'); ?>"  class="img-responsive" alt="smartfren"  width="83">
                                        </div>
                                    </div> -->

                                    <!-- <div class="block block_8">
                                        <div class="slider-brands" style="padding: 10px 30px;">
                                            <div class="top-brand arrow-default yt-content-slider contentslider" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="6" data-items_column1="5" data-items_column2="3" data-items_column3="3" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes" style="padding: 20px !important;">


                                                <div class="item logo-item">
                                                    <img src="<?= $this->Url->build($_basePath . 'img/provider/simpati_2.png'); ?>"  class="img-responsive" alt="telkomsel"  width="83">
                                                </div>
                                                <div class="item logo-item">
                                                    <img src="<?= $this->Url->build($_basePath . 'img/provider/mentari_2.png'); ?>"  class="img-responsive" alt="indosat"  width="83">
                                                </div>
                                                <div class="item logo-item">
                                                    <img src="<?= $this->Url->build($_basePath . 'img/provider/xl_3.png'); ?>"  class="img-responsive" alt="xl"  width="83">
                                                </div>
                                                <div class="item logo-item">
                                                    <img src="<?= $this->Url->build($_basePath . 'img/provider/axis_2.png'); ?>"  class="img-responsive" alt="axis"  width="83">
                                                </div>
                                                <div class="item logo-item">
                                                    <img src="<?= $this->Url->build($_basePath . 'img/provider/tri_2.png'); ?>"  class="img-responsive" alt="tri"  width="83">
                                                </div>
                                                <div class="item logo-item">
                                                    <img src="<?= $this->Url->build($_basePath . 'img/provider/smartfren_3.png'); ?>"  class="img-responsive" alt="smartfren"  width="83">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section> -->

                            </div>
                            <div id="tab-2" class="tab-pane fade">
                                <form>
                                    <div style="height: 600px; text-align: center;">
                                        <h1 style="margin-top: 200px;">Coming Soon</h1>
                                    </div>
                                </form>
                            </div>
                            <div id="tab-3" class="tab-pane fade">
                                <form>
                                    <div style="height: 600px; text-align: center;">
                                        <h1 style="margin-top: 200px;">Coming Soon</h1>
                                    </div>
                                </form>
                            </div>
                            <div id="tab-4" class="tab-pane fade">
                                <form>
                                    <div style="height: 600px; text-align: center;">
                                        <h1 style="margin-top: 200px;">Coming Soon</h1>
                                    </div>
                                </form>
                            </div>
                            <div id="tab-5" class="tab-pane fade">
                                <form>
                                    <div style="height: 600px; text-align: center;">
                                        <h1 style="margin-top: 200px;">Coming Soon</h1>
                                    </div>
                                </form>
                            </div>
                            <div id="tab-6" class="tab-pane fade">
                                <form>
                                    <div style="height: 600px; text-align: center;">
                                        <h1 style="margin-top: 200px;">Coming Soon</h1>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fullwidth-section">
    <div class="bg-content">
        <div class="container" > 
            <div class="dp-pulsa-content">

                <div class="row">
                    <h1 class="text-center">Mengapa Beli Pulsa di Zolaku ?</h1>
                    <div class="col-sm-4">
                        <div class="img-item">
                            <img src="images/digital_product/img-pulsa/img-1.png"  class="img-responsive">
                        </div>
                        <div class="dp-pulsa-text">
                            <h2>Praktis dan Cepat</h2>
                            <p>Beli pulsa online lebih mudah dan cepat kapan pun dan dimana pun.</p>
                        </div>
                    </div>
                    <div class="col-sm-4 middle">
                        <div class="img-item">
                            <img src="images/digital_product/img-pulsa/img-2.png"  class="img-responsive">
                        </div>
                        <div class="dp-pulsa-text">
                            <h2>Aman dan Terpercaya</h2>
                            <p>Pilih metode pembayaran dari berbagai layanan dan bank. Terima konfirmasi pembayaran dan pengisian pulsa secara instan.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="img-item">
                            <img src="images/digital_product/img-pulsa/img-3.png"  class="img-responsive">
                        </div>
                        <div class="dp-pulsa-text">
                            <h2>Pilihan Operator Lengkap</h2>
                            <p>Temukan pilihan nominal dan paket dari seluruh operator, harga yang bersaing dan berbagai promo menarik.</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div>
                        <h2>Keuntungan Isi Pulsa Langsung di Zolaku</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pulvinar mattis nunc sed blandit libero volutpat sed cras. Platea dictumst quisque sagittis purus sit amet volutpat consequat. Accumsan tortor posuere ac ut consequat. In ante metus dictum at. Pulvinar etiam non quam lacus suspendisse. Purus sit amet volutpat consequat. Gravida arcu ac tortor dignissim convallis aenean et tortor at. Magna sit amet purus gravida quis blandit. Pharetra sit amet aliquam id diam. Ante metus dictum at tempor commodo. Maecenas sed enim ut sem viverra aliquet. Id nibh tortor id aliquet lectus proin nibh. Massa enim nec dui nunc mattis enim.</p>

                        <p>Id velit ut tortor pretium viverra. Quis blandit turpis cursus in. Nec sagittis aliquam malesuada bibendum arcu vitae elementum. Egestas integer eget aliquet nibh. Laoreet id donec ultrices tincidunt arcu. Sed elementum tempus egestas sed sed risus pretium quam vulputate. Molestie ac feugiat sed lectus. Morbi quis commodo odio aenean sed. Nam libero justo laoreet sit amet cursus sit. Semper eget duis at tellus at urna condimentum mattis pellentesque. Aliquet nec ullamcorper sit amet. Sem integer vitae justo eget magna fermentum iaculis eu. Quam viverra orci sagittis eu volutpat odio facilisis mauris sit.</p>

                        <p>Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. Eget nunc lobortis mattis aliquam faucibus purus. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. At ultrices mi tempus imperdiet. Urna porttitor rhoncus dolor purus non enim. Tempor nec feugiat nisl pretium fusce id velit. Mauris vitae ultricies leo integer malesuada nunc vel risus. Eu nisl nunc mi ipsum. Sit amet nisl purus in mollis nunc sed. Cras adipiscing enim eu turpis egestas pretium aenean. Nibh ipsum consequat nisl vel pretium. Urna duis convallis convallis tellus id interdum.</p>
                    </div>
                </div>

                <?= $this->element('Partials/Home/top_products', ['topProducts' => $topProducts]); ?>

            </div>
        </div>
    </div>
</div>

<?php $this->append('script'); ?>
<script>
    $(document).ready(function(){

        $("#input-phone").on('keyup',function(){
            $.ajax({
                url : "<?php echo $this->Url->build(['action' => 'getprovider']);?>",
                data:{phone:$(this).val(),_csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'},
                dataType:'json',
                type:'post',
                success:function(response){
                    if(response.is_error)
                    {
                        $('#input-phone').closest('.form-group').addClass('has-error');
                        $('.help-block').html(response.message);
                        $('.zl-provider').hide();
                        $('.help-block').show();
                        $('#submitForm').prop("disabled", true);
                        $('.form-package').html('');
                        $('.bottom-pulsa').hide();
                    }
                    else
                    {
                        $('#input-phone').closest('.form-group').removeClass('has-error');
                        $('#input-phone').closest('.form-group').addClass('has-success');
                        $('.zl-provider').html('<img src="<?= $this->Url->build($_basePath); ?>/img/provider/'+response.data.logo+'"  class="img-responsive" alt="provider" style="height: 41px !important;">');
                        $('.zl-provider').show();
                        $('.help-block').hide();
                        $('#submitForm').prop("disabled", false);
                        var opt = '<span class="result-title">Pilih nominal pulsa</span>';
                        $.each(response.data.options, function(k,v){
                            opt += '<div class="package col-sm-4"> <div class="col-sm-12 radio"> <div class="left-content"> <label> <input type="radio" class="price" name="price" data-provider="'+v.operator+'"  data-point="'+v.point+'" data-denom="'+v.denom+'" value="'+v.price+'"> Pulsa '+parseInt(v.denom).format(0, 3, '.', ',')+'</label> <span class="badge">'+v.point+' Poin</span> </div> <div class="right-content"> <label>Harga<br><span class="result-price">Rp '+parseInt(v.price).format(0, 3, '.', ',')+'</span></label> </div> </div> </div>';
                        });

                        $('.form-package').html(opt);
                        $('.price').on('click',function(){
                            $('.radio').removeClass("active");
                            $(this).closest(".radio").addClass("active");
                            $('.img-provider').html('<img src="<?= $this->Url->build($_basePath); ?>/img/provider/'+response.data.logo+'"  class="img-responsive" alt="provider"  style="width:83px !important;">');
                            $('.title-provider').html($(this).data('provider')+' '+parseInt($(this).data('denom')).format(0, 3, '.', ',') );
                            $('.point-provider').html('Point didapatkan sebesar '+$(this).data('point')+' Point.');
                            $('.price-provider').html('Rp. '+parseInt($(this).val()).format(0, 3, '.', ',')+',-');
                            $('.bottom-pulsa').show();
                        });
                        $("input:radio:first").prop("checked", true).trigger("click");
                    }
                }
            })
        });
    });

</script>
<?php $this->end(); ?>