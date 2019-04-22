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
                            <li class="item active"><a data-toggle="tab" href="#tab-1">Pulsa</a></li>
                            <li class="item"><a data-toggle="tab" href="#tab-2">Paket Data</a></li>
                            <li class="item"><a data-toggle="tab" href="#tab-3">Listrik</a></li>
                            <li class="item"><a data-toggle="tab" href="#tab-4">Tagihan</a></li>
                            <li class="item"><a data-toggle="tab" href="#tab-5">PDAM</a></li>
                            <li class="item"><a data-toggle="tab" href="#tab-6">BPJS</a></li>
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
                                <hr style="clear: both;">
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


                                <section class="mt-5 mb-5 logo-operator" style="float: left;width: 100%;">
                                    <div class="col-sm-12 logo-operator-wrapper">
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
                                    </div>
                                </section>


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