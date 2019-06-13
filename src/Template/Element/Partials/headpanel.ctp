<!-- Header Container  -->
<header id="header" class=" typeheader-6">
    <!-- Header Top -->
    <div class="header-top hidden-compact">
        <div class="container">
            <div class="row">
                <div class="header-top-left  col-lg-5 col-sm-5 col-md-6 hidden-xs">
                    <?php if ($this->request->getSession()->check('Auth.Customers')) : ?>
                    <ul class="list-inlines">
                        <li class="hidden-xs">
                            Happy Shopping, <?= $this->request->getSession()->read('Auth.Customers.first_name'); ?>!
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="header-top-right collapsed-block col-lg-7 col-md-6 col-sm-7 col-xs-12">
                    <ul class="top-link list-inline">
                        <li><a class="link-lg" href="<?php echo $this->Url->build(['controller' => 'Pages', 'action' => 'index', 'keuntungan-menjadi-member','prefix' => false]);?>">Menjadi Member Bonian</a></li>
                        <li><a class="link-lg" href="<?= $this->Url->build(['controller' => 'Promotion', 'action' => 'pointRedeem', 'prefix' => false]);?>">Penukaran Point</a></li>

                        <?php if (!$this->request->getSession()->check('Auth.Customers')) : ?>
                        <li><a class="link-lg" data-toggle="modal" data-target="#login-popup">Login</a></li>
                        <li><a class="link-lg" data-toggle="modal" data-target="#modal-register">Daftar</a></li>
                        <?php else : ?>
                        <li class="zl-notif">
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div id="bs-example-navbar-collapse-1">
                                <ul>
                                    <li class="dropdown">
                                        <span class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell mg-r-10"></i>Notifikasi (<span class="notification-count"><?= $_notifications; ?></span>)</span>
                                        <ul class="dropdown-menu notify-drop">
                                            <?php /*<div class="notify-drop-title">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6">Notifikasi (<b><?= $_notifications['count']; ?></b>)</div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="Baca semua"><i class="fa fa-dot-circle-o"></i></a></div>
                                                </div>
                                            </div>
                                            <!-- end notify title -->
                                            <!-- notify content -->
                                            <div class="drop-content">
                                                <?php if ($_notifications['count'] > 0) : ?>
                                                <?php foreach($_notifications['data'] as $notification) : ?>
                                                <li>
                                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                                        <div class="notify-img">
                                                            <img src="https://placehold.it/45x45" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9 col-xs-9 pd-l0">
                                                         <?= h($notification['title']); ?><a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                                                        <p><?= $notification['message']; ?></p>
                                                        <hr>
                                                        <p class="time"></p>
                                                    </div>
                                                </li>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="notify-drop-footer text-center">
                                                <a href="<?= $this->Url->build(['controller' => 'Notification', 'prefix' => 'user']); ?>"><i class="fa fa-eye"></i> Lihat semua notifikasi</a>
                                            </div> */ ?>
                                            <div class="notify-drop-loading">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        Loading ...
                                                    </div>
                                                </div>
                                            </div>

                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </li>
                        <li class="account" id="my_account">
                            <a href="#" title="My Account " class="btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs">My Account </span> <span class="fa fa-angle-down"></span></a>
                            <ul class="dropdown-menu ">
                                <li><a href="<?= $this->Url->build(['controller' => 'Profile', 'prefix' => 'user']); ?>">My Account </a></li>
                                <li><a href="<?= $this->Url->build('/auth/logout'); ?>">Logout</a></li>

                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- //Header Top -->


    <!-- Header center -->
    <div id="header-fixed" class="header-center">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="navbar-logo col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="logo"><a href="/"><?php echo $this->Html->image('/images/png/logo/logo-wide.png', ['alt' => 'Bonian', 'width' => '155']); ?></a></div>
                </div>
                <!-- //end Logo -->

                <!-- Main menu -->
                <div class="header-center-right col-lg-10 col-md-10 col-sm-12 col-xs-12 mg-t-8-force">
                    <!-- Search -->
                    <div class="header_search">
                        <div id="sosearchpro" class="sosearchpro-wrapper so-search">
                            <form method="POST" action="<?= $this->Url->build(['controller' => 'Search', 'action' => 'index', 'prefix' => false]); ?>">
                                <div id="search0" class="search input-group form-group">
                                    <input class="autosearch-input form-control" type="text" value="" id="zolaku-search-panel" size="50"  placeholder="Pencarian" name="q"><ul class="dropdown-menu" style="display: none;"></ul>
                                    <span class="input-group-btn">
                                        <button type="submit" class="button-search btn btn-lg zl-bg-red" name="submit_search"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                                <input type="hidden" name="_csrfToken" value="<?= $this->request->getParam('_csrfToken'); ?>" />
                                <!-- <input type="hidden" name="category_id" value=""> -->
                            </form>
                        </div>
                    </div>

                    <div class="block_link hidden-sm hidden-xs">
                        <a href="<?= $this->Url->build(['controller' => 'Wishlist', 'prefix' => 'user']); ?>" id="wishlist-total" class="top-link-wishlist zl-btn-reversed-force zl-btn-hover-red-force" title="Wish List (0) "><i class="fa fa-heart"></i></a>
                    </div>
                    <!--cart-->
                    <div class="block-cart">
                        <div class="shopping_cart">
                            <div id="cart" class="btn-shopping-cart">
                                <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <div class="shopcart">
                                        <span class="handle pull-left zl-bg-red"></span>
                                        <p class="title-cart-h6">Keranjang Belanja</p>
                                        <span class="total-shopping-cart cart-total-full">
                                            <span class="items_cart"><?php echo ($_carts['pagging']['count'] > 0) ? $_carts['pagging']['count'] : '0'; ?></span> <span class="items_cart1">item(s)</span>
                                        </span>
                                    </div>
                                </a>

                                <ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
                                    <li>
                                        <table class="table table-striped" id="cart-table">
                                            <tr class="cart-empty" style="display:none;">
                                                <td class="text-center" colspan="5">
                                                    Keranjang belanja kosong.
                                                </td>
                                            </tr>
                                            <?php if(!empty($_carts['carts'])):?>
                                            <?php foreach($_carts['carts'] as $key => $cart):?>
                                            <tr class="products-cart cart-<?php echo $key ;?> <?php echo $cart['sku']; ;?>" id="<?php echo $cart['sku']; ;?>">
                                                <td class="text-center" style="width:70px">
                                                    <a href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'detail',$cart['slug'] ]);?>">
                                                        <?php foreach($cart['images'] as $image):?>
                                                        <img src="<?= $this->Url->build($_basePath . 'images/60x60/' . $image); ?>" data-zoom-image="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" data-image-name="<?= $image;?>" title="<?php echo $cart['name']; ?>" alt="<?php echo $cart['name']; ?>" class="preview">
                                                        <?php break;?>
                                                        <?php endforeach;?>
                                                    </a>
                                                </td>
                                                <td class="text-left">
                                                    <a class="cart_product_name" href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'detail',$cart['slug'] ]);?>">
                                                        <?php echo $this->Text->truncate(
                                                        h($cart['name']),
                                                        25,
                                                        [
                                                        'ellipsis' => '...',
                                                        'exact' => false
                                                        ]
                                                        );?>
                                                    </a>
                                                </td>
                                                <td class="text-center">x<span class="cart-qty"><?= $cart['qty'];?></span></td>
                                                <td class="text-center cart-price">Rp. <?php echo $this->Number->format($cart['total']);?></td>
                                                <td class="text-right">
                                                    <a onclick="cart.remove('<?php echo $cart['cartid']?>', 'cart-<?php echo $key ;?>', this);" class="fa fa-times fa-delete"></a>
                                                </td>
                                            </tr>
                                            <tr class="cart-<?php echo $key ;?> <?php echo $cart['sku']; ;?>">
                                                <td class="text-left" style="width:70px" colspan="5">
                                                    Varian <?= $cart['variant'];?>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                            <?php endif;?>
                                            <tr class="cart-button"  style="display:none;">
                                                <td class="text-center" colspan="5">
                                                    <a class="btn view-cart zl-btn-hover-red-force" href="<?php echo $this->Url->build(['controller' => 'cart', 'action' => 'index', 'prefix' => false ]);?>"><i class="fa fa-shopping-cart"></i>Keranjang belanja</a>&nbsp;
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!--//cart-->
                </div>
                <!-- //end Main menu -->
            </div>
        </div>
    </div>
    <!-- //Header center -->


</header>
<!-- //Header Container  -->

<!-- modal login -->
<!-- Modal -->
<div class="modal fade" id="login-popup" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="login-popupLabel">
    <div class="modal-dialog login-popup" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="login-popupLabel" style="text-align: center;"><img src="<?= $this->Url->build('/images/png/logo/logo-wide.png'); ?>" width="120px" alt="logo" /></h4>
            </div>
            <div class="modal-body">
                <h3 style="margin-top: 5px;">Masuk ke akun anda</h3>

                <div class="render-alert"></div>

                <?= $this->Form->create(null, [
                'url' => [
                'controller' => 'Login',
                'action' => 'index',
                'prefix' => false
                ],
                'id' => 'login-form',
                'class' => 'ajax-helper'
                ]); ?>
                <div class="form-group">
                    <label for="input-email">Email atau nomor HP</label>
                    <input type="text" name="email" value="" placeholder="Masukan nomor telepon di awali +62" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="input-email">Password</label>
                    <input type="password" name="password" value="" placeholder="Masukkan password" class="form-control" />
                </div>

                <div class="form-group">
                    <label></label>
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                </div>
                <?= $this->Form->end(); ?>

                <div style="width: 100%; height: 13px; border-bottom: 1px solid #d1d1d1; text-align: center; margin: 25px auto;">
                      <span style="font-size: 13px; background-color: #ffffff; padding: 0 10px;">
                        Atau masuk dengan
                      </span>
                </div>

                <div class="row social-media-button">
                    <div class="col-md-6">
                        <a class="btn btn-primary btn-block google" href="<?= $this->Url->build(['controller' => 'Oauth', 'prefix' => false, '?' => ['provider' => 'google', 'redirect_url' => $this->Url->build()]]); ?>">
                            <img src="<?= $this->Url->build('/images/png/logo-media-social/google.png'); ?>" /> Google
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-primary btn-block facebook login-with-facebook" href="<?= $this->Url->build(['controller' => 'Oauth', 'prefix' => false, '?' => ['provider' => 'facebook', 'redirect_url' => $this->Url->build()]]); ?>">
                            Facebook
                        </a>
                    </div>
                </div>

                <div class="text-center forgot-password-text">
                    <a id="forgot-password">Lupa Password?</a>
                </div>


            </div>
            <div class="modal-footer">
                Belum memiliki akun Bonian? <a data-toggle="modal" data-target="#modal-register" data-dismiss="modal">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</div>
<!-- end modal login -->

<!-- modal login -->
<!-- Modal -->
<div class="modal fade" id="modal-register" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="login-popupLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?= $this->Url->build('/images/png/logo/logo-wide.png'); ?>" width="120px" alt="logo" />
                    </div>
                    <div class="col-md-4">
                        <h4>Registrasi akun anda</h4>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <?= $this->Form->create(null, [
                'url' => [
                'controller' => 'Register',
                'action' => 'index',
                'prefix' => false
                ],
                'id' => 'form-register',
                'class' => 'ajax-helper_'
                ]); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="container-register-phone">
                            <div class="form-group">
                                <label for="input-email">Nomor telepon</label>
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="text" name="phone" value="" placeholder="Nomor telepon anda" class="form-control phone-number" />
                                    </div>
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-block btn-primary btn-danger btn-otp" disabled>Kirim Kode</button>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="input-email">Masukan kode OTP</label>
                                <input type="text" name="auth_code" value="" placeholder="Masukan kode OTP" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-email">Email</label>
                            <input type="text" name="email" value="" placeholder="Email" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="input-email">Username</label>
                            <input type="text" name="username" value="" placeholder="Username" class="form-control" />
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="input-email">Nama depan</label>
                            <input type="text" name="first_name" value="" placeholder="Nama depan" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="input-email">Nama belakang</label>
                            <input type="text" name="last_name" value="" placeholder="Nama belakang" class="form-control" />
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input-email">Password</label>
                                    <input type="password" name="password" value="" placeholder="Password" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input-email">Ulangi password</label>
                                    <input type="password" name="cpassword" value="" placeholder="Ulangi password" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="g-recaptcha" data-sitekey="<?= \Cake\Core\Configure::read('GoogleCaptcha.siteKey'); ?>"></div>

                        <div class="form-group">
                            <label for="input-email"></label>
                            <button type="submit" class="btn btn-block btn-danger">Daftar</button>
                        </div>

                    </div>
                </div>

                <?= $this->Form->end(); ?>

            </div>
            <div class="modal-footer">
                <div class="row social-media-button">
                    <div class="col-md-4">
                        Atau daftar dengan
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-primary btn-block google">
                            <img src="<?= $this->Url->build('/images/png/logo-media-social/google.png'); ?>" /> Google
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-primary btn-block facebook">
                            Facebook
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal login -->

<?php $this->append('css'); ?>
<style>
    .grecaptcha-badge{
        margin : 0 auto 30px auto;
    }
</style>
<?php $this->end(); ?>
<?php
$this->Html->script([
'https://www.google.com/recaptcha/api.js'
], ['block' => true]);
?>

<?php $this->append('script'); ?>
<script>
    $(document).ready(function() {

        function render_error_message(message) {
            $('#login-popup').find('.render-alert').html(`<div class="alert alert-danger alert-dismissible hide" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="error-message">${message}</span>
                </div>`);
        }

        function loadContentForgotPassword(url, session_id) {
            $.ajax({
                type: 'GET',
                url: url || '<?= $this->Url->build(['controller' => 'Login', 'action' => 'forgotPassword']); ?>',
                success: function (content) {
                    bootbox.dialog({
                        className: "forgot-passwordx medium-size",
                        title: "Lupa password",
                        message: content,
                        size: "oke",
                        buttons: {
                            cancel: {
                                label: 'Batal',
                                className: 'btn-default'
                            },
                            confirm: {
                                label: 'Lanjutkan',
                                className: 'btn-danger',
                                callback: function() {
                                    var form = $(this).find('form');
                                    if (session_id) {
                                        form.find('input[name="session_id"]').val(session_id)
                                    }

                                    var ajaxRequest = new ajaxValidation(form); //serializeArray form.find(':input,:hidden')
                                    ajaxRequest.post(form.attr('action'), form.serializeArray(), function(response, data) {
                                        if (response.success) {
                                            if (data.result.url) {
                                                bootbox.hideAll();
                                                loadContentForgotPassword(data.result.url, data.result.data ? data.result.data.session_id : null);
                                            }
                                            if (data.result.data && data.result.data.finish) {
                                                bootbox.hideAll();
                                                $("#login-popup").modal('show');
                                            }

                                        } else {

                                        }
                                    });
                                    return false; // important to prevent close of dialog box
                                }
                            }
                        },
                        callback: function (result) {

                        }
                    });
                }
            });
        }

        $("#forgot-password").click(function() {
            loadContentForgotPassword();
            $("#login-popup").modal('hide')

        })



        //sticky header
        $(window).scroll(function() {
            var sticky = $('#header-fixed'),
                scroll = $(window).scrollTop();
            if (scroll > 50) sticky.addClass('fixed');
            else sticky.removeClass('fixed');
        });

        //login-form
        var formEl = $("#login-form");
        formEl.submit(function(e) {
            var ajaxRequest = new ajaxValidation(formEl);
            ajaxRequest.post(formEl.attr('action'), formEl.find(':input'), function(response, data) {
                if (response.success) {
                    location.href = '<?= $this->Url->build(); ?>';
                } else {
                    //render_error_message(data.error.message);
                    //var alert = $("#login-popup .alert");
                    //alert.removeClass('hide');
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });

        //register-form
        var formReg = $("#form-register");

        formReg.find('.phone-number').keyup(function(){
            var phone = $(this).val();
            var btn_otp = formReg.find('.btn-otp');
            if (btn_otp.attr('wait') === '1') {
                btn_otp.attr('disabled', true);
            }
            else if (phone.match(/^0\d{9,11}$/)) {
                $(this).val('+62' + phone.substring(1));
                btn_otp.attr('disabled', false);
            } else if (phone.match(/^\+\d{11,}$/)) {
                btn_otp.attr('disabled', false);
            } else {
                btn_otp.attr('disabled', true);
            }
        });



        formReg.find('.btn-otp').click(function() {
            $(this).attr('disabled', true);
            var self = this;
            var ajaxOtp = new ajaxValidation(formReg);
            ajaxOtp.post('<?= $this->Url->build(['controller' => 'Register', 'action' => 'otp']); ?>', formReg.find('.phone-number'), function(response, data) {
                if (response.success) {
                    $(self).countdown(new Date((new Date()).getTime() + 1000 * 90), function(event) {
                        $(this).attr('wait', 1).text(
                            'Ulangi ' + event.strftime('%M:%S')
                        );
                    }).on('finish.countdown', function(event) {
                        $(this).attr('disabled', false)
                            .removeAttr('wait')
                            .text('Kirim Ulang');
                    });
                } else {
                    console.log('ajax error');
                }
            });


        });

        formReg.submit(function(e) {
            var ajaxRequest = new ajaxValidation(formReg);
            ajaxRequest.post(formReg.attr('action'), formReg.find(':input'), function(response, data) {
                if (response.success) {
                    location.href = '<?= $this->Url->build(); ?>';
                } else {

                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });


        var searchPanel = $('#zolaku-search-panel');
        searchPanel.smartSuggest({
            src: "<?php echo $this->Url->build(['controller' => 'search', 'action' => 'get', 'prefix' => false])?>"
        });

        function remove_search_history(e) {

            var that = $(this);
            $.ajax({
                url: '<?= $this->Url->build(['controller' => 'Search', 'action' => 'removeHistory', 'prefix' => false]); ?>',
                type : 'POST',
                data : {
                    term_id : $(this).data('term-id'),
                    _csrfToken: $('meta[name="_csrfToken"]').attr('content')
                },
                //dataType : 'json',
                success: function(response){
                    console.log('oke')
                    that.parents('li.ss-result').remove();
                    searchPanel.data('cache-search-history', $('ul#zolaku-search-panel-suggestions').html());
                    //var box = $('#' + searchPanel.attr('id') + '-suggestions').show();
                },
                error: function () {

                }
            });
            e.preventDefault();
        }

        searchPanel.focus(function() {
            var inputObj = $(this);
            var box = $('#' + $(this).attr('id') + '-suggestions');

            if (inputObj.val().trim() === "") {
                box.css('position', 'absolute');
                box.css('top', inputObj.outerHeight());
                box.css('width', inputObj.outerWidth());
                var cache = inputObj.data('cache-search-history');
                if (cache) {
                    box.html(cache).find('.search-history-remove').click(remove_search_history);;
                    box.fadeIn();
                } else {
                    $.getJSON('<?php echo $this->Url->build(['controller' => 'search', 'action' => 'history', 'prefix' => false])?>', function(data, textStatus) {
                        if (textStatus === 'success') {
                            var list = `<li class="ss-header">
                            <p class="ss-header-text">Riwayat Pencarian</p>
                            </li>`;

                            data.forEach(function(o) {
                                var query = {q: o.search_term.words};

                                var searchTermWord = o.search_term.words;
                                if (typeof o.product_category != 'undefined' && o.product_category != null) {
                                    searchTermWord += ` di <span class="search-category">${o.product_category.name}</span>`;
                                    query.category_id = o.product_category.id;
                                }
                                var queryString = '?' + $.param( query );
                                list += `<li class="ss-result">
                                        <a href="<?= $this->Url->build(['controller' => 'search', 'action' => 'index', 'prefix' => false]); ?>${queryString}">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody>
                                        <tr>
                                        <td><span class="ss-result-title pull-left">${searchTermWord}</span> <a data-term-id="${o.search_term_id}" class="pull-right search-history-remove"></a></td>
                                        </tr>
                                        </tbody>
                                        </table></a> </li>`;
                            });
                            inputObj.data('cache-search-history', list);
                            box.html(list).find('.search-history-remove').click(remove_search_history);
                            box.fadeIn();
                        }
                    });
                }
            }
        });

        $('[data-tooltip="tooltip"]').tooltip();




    });
</script>
<?php $this->end();
