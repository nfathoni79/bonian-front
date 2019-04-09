
<!-- Header Container  -->
<header id="header" class=" typeheader-6">
    <!-- Header Top -->
    <div class="header-top hidden-compact">
        <div class="container">
            <div class="row">
                <div class="header-top-left  col-lg-6 col-sm-5 col-md-6 hidden-xs">
                    <ul class="list-inlines">
                        <li class="hidden-xs">
                            Default welcome msg!
                        </li>
                    </ul>
                </div>
                <div class="header-top-right collapsed-block col-lg-6 col-md-6 col-sm-7 col-xs-12">
                    <ul class="top-link list-inline">
                        <li><a class="link-lg" href="#">Menjadi Member Zolaku</a></li>
                        <li><a class="link-lg" href="#">Penukaran Point</a></li>
                        <li><a class="link-lg" href="#">Lacak Pengiriman</a></li>
                        <?php if (!$this->request->getSession()->check('Auth.Customers')) : ?>
                        <li><a class="link-lg" data-toggle="modal" data-target="#login-popup">Login</a></li>
                        <li><a class="link-lg" href="#">Daftar</a></li>
                        <?php else : ?>
                        <li><?= $this->request->getSession()->read('Auth.Customers.first_name'); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- //Header Top -->


    <!-- Header center -->
    <div class="header-center">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="navbar-logo col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="logo"><a href="/"><?php echo $this->Html->image('/images/png/logo/logo-wide.png', ['alt' => 'Zolaku', 'width' => '155']); ?></a></div>
                </div>
                <!-- //end Logo -->

                <!-- Main menu -->
                <div class="header-center-right col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <!-- Search -->
                    <div class="header_search">
                        <div id="sosearchpro" class="sosearchpro-wrapper so-search">
                            <form method="GET" action="index.php">
                                <div id="search0" class="search input-group form-group">
                                    <div class="select_category filter_type  icon-select">
                                        <select name="category_id" onchange="" onclick="return false;" id="" class="no-border">
                                            <option value="">Semua Kategori</option>
                                            <?php foreach($categories as $category) : ?>
                                            <option value="<?= $category['id']; ?>"><?= $this->Text->truncate($category['name'], 23); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="search"><ul class="dropdown-menu" style="display: none;"></ul>
                                    <span class="input-group-btn">
                                                <button type="submit" class="button-search btn btn-default btn-lg" name="submit_search"><i class="fa fa-search"></i></button>
                                            </span>
                                </div>
                                <input type="hidden" name="route" value="product/search">
                            </form>
                        </div>
                    </div>

                    <div class="block_link hidden-sm hidden-xs">
                        <a href="wishlist.html" id="wishlist-total" class="top-link-wishlist" title="Wish List (0) "><i class="fa fa-heart-o"></i></a>
                    </div>
                    <!--cart-->
                    <div class="block-cart">
                        <div class="shopping_cart">
                            <div id="cart" class="btn-shopping-cart">
                                <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <div class="shopcart">
                                        <span class="handle pull-left"></span>
                                        <p class="title-cart-h6">Keranjang Belanja</p>
                                        <span class="total-shopping-cart cart-total-full">
                                                <span class="items_cart">2 </span><span class="items_cart1">item(s)</span>
                                            </span>
                                    </div>
                                </a>

                                <ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
                                    <li>
                                        <table class="table table-striped">
                                            <tbody>
                                            <tr>
                                                <td class="text-center" style="width:70px">
                                                    <a href="product.html">
                                                        <img src="image/catalog/demo/product/80/1.jpg" style="width:70px" alt="Yutculpa ullamcon" title="Yutculpa ullamco" class="preview">
                                                    </a>
                                                </td>
                                                <td class="text-left"> <a class="cart_product_name" href="product.html">Yutculpa ullamco</a>
                                                </td>
                                                <td class="text-center">x1</td>
                                                <td class="text-center">$80.00</td>
                                                <td class="text-right">
                                                    <a href="product.html" class="fa fa-edit"></a>
                                                </td>
                                                <td class="text-right">
                                                    <a onclick="cart.remove('2');" class="fa fa-times fa-delete"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" style="width:70px">
                                                    <a href="product.html">
                                                        <img src="image/catalog/demo/product/80/2.jpg" style="width:70px" alt="Xancetta bresao" title="Xancetta bresao" class="preview">
                                                    </a>
                                                </td>
                                                <td class="text-left"> <a class="cart_product_name" href="product.html">Xancetta bresao</a>
                                                </td>
                                                <td class="text-center">x1</td>
                                                <td class="text-center">$60.00</td>
                                                <td class="text-right">
                                                    <a href="product.html" class="fa fa-edit"></a>
                                                </td>
                                                <td class="text-right">
                                                    <a onclick="cart.remove('1');" class="fa fa-times fa-delete"></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <div>
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td class="text-left"><strong>Sub-Total</strong>
                                                    </td>
                                                    <td class="text-right">$140.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left"><strong>Eco Tax (-2.00)</strong>
                                                    </td>
                                                    <td class="text-right">$2.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left"><strong>VAT (20%)</strong>
                                                    </td>
                                                    <td class="text-right">$20.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left"><strong>Total</strong>
                                                    </td>
                                                    <td class="text-right">$162.00</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <p class="text-center total-carts"> <a class="btn view-cart" href="cart.html"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="checkout.html"><i class="fa fa-share"></i>Checkout</a>
                                            </p>
                                        </div>
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
                <h3>Masuk ke akun anda</h3>

                <div class="alert alert-danger alert-dismissible hide" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="error-message"></span>
                </div>

                <?= $this->Form->create(null, [
                        'url' => [
                                'controller' => 'Login'
                        ],
                        'id' => 'login-form'
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
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                <?= $this->Form->end(); ?>
            </div>
            <div class="modal-footer">
                Belum memiliki akun zolaku? <a>Daftar Sekarang</a>
            </div>
        </div>
    </div>
</div>
<!-- end modal login -->

<?php
$this->Html->script([
    '/js/custom-libs/validation-render',
], ['block' => true]);
?>
<?php $this->append('script'); ?>
<script>
    $(document).ready(function(){
        //login-form
        var formEl = $("#login-form");
        formEl.submit(function(e) {
            var ajaxRequest = new ajaxValidation(formEl);
            ajaxRequest.post(formEl.attr('action'), formEl.find(':input'), function(response, data) {
                if (response.success) {
                    location.href = '<?= $this->Url->build(); ?>';
                } else {
                    console.log(data);
                    var alert = $("#login-popup .alert");
                    alert.find('.error-message').text(data.error.message);
                    alert.removeClass('hide');
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });

    });
</script>
<?php $this->end();

