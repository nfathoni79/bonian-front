
<!-- start : banner -->
<div class="o-container-wrapper l-banner-content">
    <div class="o-container">
        <!-- layout banner -->
        <div class="o-flex o-justify-content--between o-align-items--center">
            <!-- slider banner -->
            <div class="c-card c-card--banner__v1">
                <!-- start : image slideshow -->
                <img class="u-img--fluid u-ht--100p" src="<?= $this->Url->build('/images/jpeg/slider-banner/slider_banner_1.jpg'); ?>" alt="image banner">
                <!-- end : image slideshow -->
            </div>
            <!-- slider banner -->

            <!-- card board -->
            <div class="u-mrg-l--20 u-wd--35p">
                <!-- leaderboard -->
                <div class="c-card c-card--banner__v2 u-bg--soft-blue" style="height: 167px !important;">
                    <div class="o-flex o-justify-content--between o-align-items--center">
                        <img class="u-img--fluid" src="<?= $this->Url->build('/images/png/icon-board/leaderboard.png'); ?>" width="96" alt="icon leaderboard">

                        <div class="c-board--text">
                            <h6>Leaderboard</h6>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor</p>
                            <a href="">Lihat selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- leaderboard -->

                <!-- panduan -->
                <div class="c-card c-card--banner__v2 u-bg--soft-orange u-mrg-t--20" style="height: 167px !important;">
                    <div class="o-flex o-justify-content--between o-align-items--center">
                        <img class="u-img--fluid" src="<?= $this->Url->build('/images/png/icon-board/bantuan.png'); ?>" width="96" alt="icon bantuan">

                        <div class="c-board--text">
                            <h6>Leaderboard</h6>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor</p>
                            <a href="">Lihat selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- panduan -->
            </div>
            <!-- card board -->
        </div>
        <!-- layout banner -->
    </div>
</div>
<!-- end : banner -->


<!-- start : main content -->
<div class="o-container-wrapper l-main-content">
    <!-- produk digital -->
    <div id="produk_digital" class="o-container">
        <!-- title -->
        <div class="o-flex o-justify-content--start o-align-items--center">
            <h3 class="c-content--title">Produk Digital</h3>
            <p class="c-content--subtitle">Poin tambah, penghasilan berlimpah</p>
        </div>

        <!-- select category -->
        <div class="c-card c-content--category__home u-pad-v--25 u-pad-h--80 u-mrg-t--20">
            <div class="o-flex o-justify-content--between o-align-items--center">
                <!-- #pulsa -->
                <a href="" id="pulsa" class="c-category--item">
                    <img class="u-img--fluid o-block" src="<?= $this->Url->build('/images/png/icon-produk-digital/pulsa.png'); ?>" width="32" alt="icon pulsa">
                    <p class="c-content--cat__title u-fg--softest-blue">Pulsa</p>
                </a>

                <!-- #paket_data -->
                <a href="" id="paket_data" class="c-category--item">
                    <img class="u-img--fluid o-block" src="<?= $this->Url->build('/images/png/icon-produk-digital/paket_data.png'); ?>" width="32" alt="icon paket data">
                    <p class="c-content--cat__title u-fg--soft-green">Paket Data</p>
                </a>

                <!-- #listrik -->
                <a href="" id="listrik" class="c-category--item">
                    <img class="u-img--fluid o-block" src="<?= $this->Url->build('/images/png/icon-produk-digital/listrik.png'); ?>" width="32" alt="icon listrik">
                    <p class="c-content--cat__title u-fg--soft-orange">Listrik</p>
                </a>

                <!-- #pdam -->
                <a href="" id="pdam" class="c-category--item">
                    <img class="u-img--fluid o-block" src="<?= $this->Url->build('/images/png/icon-produk-digital/pdam.png'); ?>" width="32" alt="icon pdam">
                    <p class="c-content--cat__title u-fg--soft-teal-blue">PDAM</p>
                </a>

                <!-- #bpjs -->
                <a href="" id="bpjs" class="c-category--item">
                    <img class="u-img--fluid o-block" src="<?= $this->Url->build('/images/png/icon-produk-digital/bpjs.png'); ?>" width="32" alt="icon bpjs">
                    <p class="c-content--cat__title u-fg--soft-red">BPJS</p>
                </a>

                <!-- #tagihan -->
                <a href="" id="tagihan" class="c-category--item">
                    <img class="u-img--fluid o-block" src="<?= $this->Url->build('/images/png/icon-produk-digital/tagihan.png'); ?>" width="32" alt="icon tagihan">
                    <p class="c-content--cat__title u-fg--soft-purple">Tagihan</p>
                </a>
            </div>
        </div>
    </div>
    <!-- produk digital -->


    <!-- bonus & game -->
    <div id="bonus_game" class="o-container u-mrg-t--30">
        <!-- title -->
        <div class="o-flex o-justify-content--start o-align-items--center">
            <h3 class="c-content--title">Bonus & Game</h3>
            <p class="c-content--subtitle">Tukar poinmu & dapatkan hadiahnya</p>
        </div>

        <div class="c-card c-content--category__home u-pos-relative u-pad-all--10 u-mrg-t--20">
            <div class="c-bounty--width c-bounty--item">
                <!-- poin gratis -->
                <a href="#" id="poin_gratis" class="c-card c-card--bounty u-bg-grad--red-v__v2">
                    <div class="c-bounty--item__box">
                        <h1 class="u-txt--center u-mrg-b--15">
                            <img src="<?= $this->Url->build('/images/png/logo/logo-small.png'); ?>" width="31" alt="icon zolaku small">
                        </h1>
                        <p class="c-bounty--title">Poin Gratis</p>
                    </div>
                </a>
                <!-- poin gratis -->

                <!-- tukar poin -->
                <a href="#" id="tukar_poin" class="c-card c-card--bounty u-bg-grad--soft-blue-v__v1">
                    <div class="c-bounty--item__box">
                        <h1 class="u-txt--center u-mrg-b--15">
                            <img src="<?= $this->Url->build('/images/png/logo/logo-small.png'); ?>" width="31" alt="icon zolaku small">
                        </h1>
                        <p class="c-bounty--title">Tukar Poin</p>
                    </div>
                </a>
                <!-- tukar poin -->

                <!-- guest box -->
                <a href="#" id="guest_box" class="c-card c-card--bounty u-bg-grad--green-v__v1">
                    <div class="c-bounty--item__box">
                        <h1 class="u-txt--center u-mrg-b--15">
                            <img src="<?= $this->Url->build('/images/png/logo/logo-small.png'); ?>" width="31" alt="icon zolaku small">
                        </h1>
                        <p class="c-bounty--title">Guest Box</p>
                    </div>
                </a>
                <!-- guest box -->

                <!-- flip win -->
                <a href="#" id="flip_win" class="c-card c-card--bounty u-bg-grad--purple-v__v1">
                    <div class="c-bounty--item__box">
                        <h1 class="u-txt--center u-mrg-b--15">
                            <img src="<?= $this->Url->build('/images/png/logo/logo-small.png'); ?>" width="31" alt="icon zolaku small">
                        </h1>
                        <p class="c-bounty--title">Flip Win</p>
                    </div>
                </a>
                <!-- flip win -->

                <!-- sell challange -->
                <a href="#" id="sell_challange" class="c-card c-card--bounty u-bg-grad--brown-v__v1">
                    <div class="c-bounty--item__box">
                        <h1 class="u-txt--center u-mrg-b--15">
                            <img src="<?= $this->Url->build('/images/png/logo/logo-small.png'); ?>" width="31" alt="icon zolaku small">
                        </h1>
                        <p class="c-bounty--title">Sell Challange</p>
                    </div>
                </a>
                <!-- sell challange -->

                <!-- treasure hunt -->
                <a href="#" id="treasure_hunt" class="c-card c-card--bounty u-bg-grad--dark-blue-v__v1">
                    <div class="c-bounty--item__box">
                        <h1 class="u-txt--center u-mrg-b--15">
                            <img src="<?= $this->Url->build('/images/png/logo/logo-small.png'); ?>" width="31" alt="icon zolaku small">
                        </h1>
                        <p class="c-bounty--title">Treasure Hunt</p>
                    </div>
                </a>
                <!-- treasure hunt -->

                <!-- wheel of fortune -->
                <a href="#" id="wheel_of_fortune" class="c-card c-card--bounty u-bg-grad--pink-v__v1">
                    <div class="c-bounty--item__box">
                        <h1 class="u-txt--center u-mrg-b--15">
                            <img src="<?= $this->Url->build('/images/png/logo/logo-small.png'); ?>" width="31" alt="icon zolaku small">
                        </h1>
                        <p class="c-bounty--title">Wheel of Fortune</p>
                    </div>
                </a>
                <!-- wheel of fortune -->
            </div>
        </div>
    </div>
    <!-- bonus & game -->


    <!-- flash sale -->
    <div id="flash_sale" class="o-container u-mrg-t--30">
        <div class="c-card c-content--category__home">
            <!-- display timer flash sale -->
            <div class="row no-gutters o-flex o-justify-content--between o-align-items--center">
                <div class="col-4">
                    <div class="c-flash-sale--timer u-bg-grad--red-y__v2">
                        <!-- title content -->
                        <span class="c-timer--title">Flash Sale</span>
                        <!-- title timer -->
                        <span class="c-timer--count-title">Berakhir dalam</span>
                        <!-- start countdown timer -->
                        <span class="c-timer--count-value">
									<div id="c-flash-sale--countdown-timer"></div>
								</span>
                    </div>
                </div>

                <div class="col-3">
                    <div class="o-flex o-justify-content--end u-mrg-r--35 u-mrg-t--15">
                        <!-- previous -->
                        <a href="#carouselGrid" data-slide="prev" class="c-btn c-btn--circle__sm c-btn--outline__gray-red u-mrg-r--10">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <!-- next -->
                        <a href="#carouselGrid" data-slide="next" class="c-btn c-btn--circle__sm c-btn--outline__gray-red">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- display timer flash sale -->

            <!-- padding area -->
            <div class="u-pad-all--25">
                <div class="o-flex o-justify-content--between o-align-items--start">
                    <!-- display produk #1 -->
                    <div class="c-flash-sale">
                        <div class="c-product--body">
                            <a href="" class="c-product--body__link">
                                <!-- product image -->
                                <div class="c-product--display__top">
                                    <!-- badge -->
                                    <span class="c-product--badge c-ribbon">20%</span>
                                    <!-- badge -->

                                    <!-- image -->
                                    <div class="c-product--image">
                                        <img class="c-image c-entered" src="<?= $this->Url->build('/images/jpeg/product_display/prd_1.jpg'); ?>" alt="product">
                                    </div>
                                    <!-- image -->
                                </div>
                                <!-- product image -->

                                <!-- product sale load -->
                                <div class="o-flex o-justify-content--between o-align-items--start u-mrg-t--15">
                                    <!-- flash sale load -->
                                    <div class="c-flash--sale__load">
                                        <!-- progress bar -->
                                        <div class="c-flash-sale-progress-bar">
                                            <!-- progress if complete/full -->
                                            <div class="c-flash-sale-progress-bar--complete">
                                                <!-- complement progress -->
                                                <div class="c-flash-sale-progress-bar--complement">
                                                    <!-- on the way to progress sale -->
                                                    <div class="c-flash-sale-progress-bar--complement-bar" style="width: 45%;">
                                                        <div class="c-flash-sale-progress-bar--complement-color"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- progress bar -->

                                        <!-- count item sale -->
                                        <div class="c-sale--info">13 Barang Terjual</div>
                                        <!-- count item sale -->
                                    </div>
                                    <!-- flash sale load -->

                                    <div class="c-product--poin u-bg--badge__silver">27 Poin</div>
                                </div>
                                <!-- product sale load -->

                                <!-- product name -->
                                <div class="c-product--title">Maybelline Volum Express Hyper Curl Mascara Hitam</div>
                                <!-- product name -->

                                <div class="o-flex o-align-items--center o-justify-content--between u-mrg-t--20">
                                    <!-- product price -->
                                    <div>
                                        <div class="c-product--price__discount">Rp 69.000</div>
                                        <div class="c-product--price__normal">Rp 48.300</div>
                                    </div>
                                    <!-- product price -->

                                    <!-- product share -->
                                    <div class="c-product--share">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <!-- product share -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- display produk #1 -->

                    <!-- display produk #2 -->
                    <div class="c-flash-sale">
                        <div class="c-product--body">
                            <a href="" class="c-product--body__link">
                                <!-- product image -->
                                <div class="c-product--display__top">
                                    <!-- badge -->
                                    <span class="c-product--badge c-ribbon">20%</span>
                                    <!-- badge -->

                                    <!-- image -->
                                    <div class="c-product--image">
                                        <img class="c-image c-entered" src="<?= $this->Url->build('/images/jpeg/product_display/prd_2.jpg'); ?>" alt="product">
                                    </div>
                                    <!-- image -->
                                </div>
                                <!-- product image -->

                                <!-- product sale load -->
                                <div class="o-flex o-justify-content--between o-align-items--start u-mrg-t--15">
                                    <!-- flash sale load -->
                                    <div class="c-flash--sale__load">
                                        <!-- progress bar -->
                                        <div class="c-flash-sale-progress-bar">
                                            <!-- progress if complete/full -->
                                            <div class="c-flash-sale-progress-bar--complete">
                                                <!-- complement progress -->
                                                <div class="c-flash-sale-progress-bar--complement">
                                                    <!-- on the way to progress sale -->
                                                    <div class="c-flash-sale-progress-bar--complement-bar" style="width: 90%;">
                                                        <div class="c-flash-sale-progress-bar--complement-color"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- progress bar -->

                                        <!-- count item sale -->
                                        <div class="c-sale--info">1555 Barang Terjual</div>
                                        <!-- count item sale -->
                                    </div>
                                    <!-- flash sale load -->

                                    <div class="c-product--poin u-bg--badge__blue">120 Poin</div>
                                </div>
                                <!-- product sale load -->

                                <!-- product name -->
                                <div class="c-product--title">Maybelline Volum Express Hyper Curl Mascara Hitam</div>
                                <!-- product name -->

                                <div class="o-flex o-align-items--center o-justify-content--between u-mrg-t--20">
                                    <!-- product price -->
                                    <div>
                                        <div class="c-product--price__discount">Rp 69.000</div>
                                        <div class="c-product--price__normal">Rp 48.300</div>
                                    </div>
                                    <!-- product price -->

                                    <!-- product share -->
                                    <div class="c-product--share">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <!-- product share -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- display produk #2 -->

                    <!-- display produk #3 -->
                    <div class="c-flash-sale">
                        <div class="c-product--body">
                            <a href="" class="c-product--body__link">
                                <!-- product image -->
                                <div class="c-product--display__top">
                                    <!-- badge -->
                                    <span class="c-product--badge c-ribbon">20%</span>
                                    <!-- badge -->

                                    <!-- image -->
                                    <div class="c-product--image">
                                        <img class="c-image c-entered" src="<?= $this->Url->build('/images/jpeg/product_display/prd_3.jpg'); ?>" alt="product">
                                    </div>
                                    <!-- image -->
                                </div>
                                <!-- product image -->

                                <!-- product sale load -->
                                <div class="o-flex o-justify-content--between o-align-items--start u-mrg-t--15">
                                    <!-- flash sale load -->
                                    <div class="c-flash--sale__load">
                                        <!-- progress bar -->
                                        <div class="c-flash-sale-progress-bar">
                                            <!-- progress if complete/full -->
                                            <div class="c-flash-sale-progress-bar--complete">
                                                <!-- complement progress -->
                                                <div class="c-flash-sale-progress-bar--complement">
                                                    <!-- on the way to progress sale -->
                                                    <div class="c-flash-sale-progress-bar--complement-bar" style="width: 10%;">
                                                        <div class="c-flash-sale-progress-bar--complement-color"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- progress bar -->

                                        <!-- count item sale -->
                                        <div class="c-sale--info">5 Barang Terjual</div>
                                        <!-- count item sale -->
                                    </div>
                                    <!-- flash sale load -->

                                    <div class="c-product--poin u-bg--badge__silver">5 Poin</div>
                                </div>
                                <!-- product sale load -->

                                <!-- product name -->
                                <div class="c-product--title">Maybelline Volum Express Hyper Curl Mascara Hitam</div>
                                <!-- product name -->

                                <div class="o-flex o-align-items--center o-justify-content--between u-mrg-t--20">
                                    <!-- product price -->
                                    <div>
                                        <div class="c-product--price__discount">Rp 69.000</div>
                                        <div class="c-product--price__normal">Rp 48.300</div>
                                    </div>
                                    <!-- product price -->

                                    <!-- product share -->
                                    <div class="c-product--share">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <!-- product share -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- display produk #3 -->

                    <!-- display produk #4 -->
                    <div class="c-flash-sale">
                        <div class="c-product--body">
                            <a href="" class="c-product--body__link">
                                <!-- product image -->
                                <div class="c-product--display__top">
                                    <!-- badge -->
                                    <span class="c-product--badge c-ribbon">20%</span>
                                    <!-- badge -->

                                    <!-- image -->
                                    <div class="c-product--image">
                                        <img class="c-image c-entered" src="<?= $this->Url->build('/images/jpeg/product_display/prd_4.jpg'); ?>" alt="product">
                                    </div>
                                    <!-- image -->
                                </div>
                                <!-- product image -->

                                <!-- product sale load -->
                                <div class="o-flex o-justify-content--between o-align-items--start u-mrg-t--15">
                                    <!-- flash sale load -->
                                    <div class="c-flash--sale__load">
                                        <!-- progress bar -->
                                        <div class="c-flash-sale-progress-bar">
                                            <!-- progress if complete/full -->
                                            <div class="c-flash-sale-progress-bar--complete">
                                                <!-- complement progress -->
                                                <div class="c-flash-sale-progress-bar--complement">
                                                    <!-- on the way to progress sale -->
                                                    <div class="c-flash-sale-progress-bar--complement-bar" style="width: 80%;">
                                                        <div class="c-flash-sale-progress-bar--complement-color"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- progress bar -->

                                        <!-- count item sale -->
                                        <div class="c-sale--info">565 Barang Terjual</div>
                                        <!-- count item sale -->
                                    </div>
                                    <!-- flash sale load -->

                                    <div class="c-product--poin u-bg--badge__blue">125 Poin</div>
                                </div>
                                <!-- product sale load -->

                                <!-- product name -->
                                <div class="c-product--title">Maybelline Volum Express Hyper Curl Mascara Hitam</div>
                                <!-- product name -->

                                <div class="o-flex o-align-items--center o-justify-content--between u-mrg-t--20">
                                    <!-- product price -->
                                    <div>
                                        <div class="c-product--price__discount">Rp 69.000</div>
                                        <div class="c-product--price__normal">Rp 48.300</div>
                                    </div>
                                    <!-- product price -->

                                    <!-- product share -->
                                    <div class="c-product--share">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <!-- product share -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- display produk #4 -->

                    <!-- display produk #5 -->
                    <div class="c-flash-sale">
                        <div class="c-product--body">
                            <a href="" class="c-product--body__link">
                                <!-- product image -->
                                <div class="c-product--display__top">
                                    <!-- badge -->
                                    <span class="c-product--badge c-ribbon">20%</span>
                                    <!-- badge -->

                                    <!-- image -->
                                    <div class="c-product--image">
                                        <img class="c-image c-entered" src="<?= $this->Url->build('/images/jpeg/product_display/prd_5.jpg'); ?>" alt="product">
                                    </div>
                                    <!-- image -->
                                </div>
                                <!-- product image -->

                                <!-- product sale load -->
                                <div class="o-flex o-justify-content--between o-align-items--start u-mrg-t--15">
                                    <!-- flash sale load -->
                                    <div class="c-flash--sale__load">
                                        <!-- progress bar -->
                                        <div class="c-flash-sale-progress-bar">
                                            <!-- progress if complete/full -->
                                            <div class="c-flash-sale-progress-bar--complete">
                                                <!-- complement progress -->
                                                <div class="c-flash-sale-progress-bar--complement">
                                                    <!-- on the way to progress sale -->
                                                    <div class="c-flash-sale-progress-bar--complement-bar" style="width: 39%;">
                                                        <div class="c-flash-sale-progress-bar--complement-color"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- progress bar -->

                                        <!-- count item sale -->
                                        <div class="c-sale--info">450 Barang Terjual</div>
                                        <!-- count item sale -->
                                    </div>
                                    <!-- flash sale load -->

                                    <div class="c-product--poin u-bg--badge__gold">6500 Poin</div>
                                </div>
                                <!-- product sale load -->

                                <!-- product name -->
                                <div class="c-product--title">Maybelline Volum Express Hyper Curl Mascara Hitam</div>
                                <!-- product name -->

                                <div class="o-flex o-align-items--center o-justify-content--between u-mrg-t--20">
                                    <!-- product price -->
                                    <div>
                                        <div class="c-product--price__discount">Rp 69.000</div>
                                        <div class="c-product--price__normal">Rp 48.300</div>
                                    </div>
                                    <!-- product price -->

                                    <!-- product share -->
                                    <div class="c-product--share">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <!-- product share -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- display produk #5 -->
                </div>
            </div>
            <!-- padding area -->
        </div>
    </div>
    <!-- flash sale -->


    <!-- ads banner -->
    <div id="ads_banner" class="o-container u-mrg-t--30">
        <div class="row o-flex o-align-items--center o-justify-content--between">
            <!-- banner #1 -->
            <div class="col-6">
                <a href="#">
                    <img class="u-img--fluid u-wd--100p" src="<?= $this->Url->build('/images/jpeg/ads-banner/ads_banner_1.jpg'); ?>" width="574" alt="ads banner">
                </a>
            </div>
            <!-- banner #1 -->

            <!-- banner #2 -->
            <div class="col-6">
                <a href="#">
                    <img class="u-img--fluid u-wd--100p" src="<?= $this->Url->build('/images/jpeg/ads-banner/ads_banner_2.jpg'); ?>" width="574" alt="ads banner">
                </a>
            </div>
            <!-- banner #2 -->
        </div>
    </div>
    <!-- ads banner -->


    <!-- new arrival -->
    <div id="new_arrival" class="o-container u-mrg-t--30">
        <div class="c-card c-content--category__home">
            <!-- padding area -->
            <div class="u-pad-all--25">
                <div class="o-flex o-justify-content--between o-align-items--start">
                    <!-- display produk #1 -->
                    <div class="c-flash-sale">
                        <div class="c-product--body">
                            <a href="" class="c-product--body__link">
                                <!-- product image -->
                                <div class="c-product--display__top">
                                    <!-- badge -->
                                    <span class="c-product--badge c-ribbon">20%</span>
                                    <!-- badge -->

                                    <!-- image -->
                                    <div class="c-product--image">
                                        <img class="c-image c-entered" src="<?= $this->Url->build('/images/jpeg/product_display/prd_6.jpg'); ?>" alt="product">
                                    </div>
                                    <!-- image -->
                                </div>
                                <!-- product image -->

                                <!-- product rating star -->
                                <div class="o-flex o-justify-content--between o-align-items--center u-mrg-t--15">
                                    <div class="c-product--ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>

                                    <div class="c-product--poin u-bg--badge__silver">27 Poin</div>
                                </div>
                                <!-- product rating star -->

                                <!-- product name -->
                                <div class="c-product--title">Maybelline Volum Express Hyper Curl Mascara Hitam</div>
                                <!-- product name -->

                                <div class="o-flex o-align-items--center o-justify-content--between u-mrg-t--20">
                                    <!-- product price -->
                                    <div>
                                        <div class="c-product--price__discount">Rp 69.000</div>
                                        <div class="c-product--price__normal">Rp 48.300</div>
                                    </div>
                                    <!-- product price -->

                                    <!-- product share -->
                                    <div class="c-product--share">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <!-- product share -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- display produk #1 -->

                    <!-- display produk #2 -->
                    <div class="c-flash-sale">
                        <div class="c-product--body">
                            <a href="" class="c-product--body__link">
                                <!-- product image -->
                                <div class="c-product--display__top">
                                    <!-- badge -->
                                    <span class="c-product--badge c-ribbon">20%</span>
                                    <!-- badge -->

                                    <!-- image -->
                                    <div class="c-product--image">
                                        <img class="c-image c-entered" src="<?= $this->Url->build('/images/jpeg/product_display/prd_7.jpg'); ?>" alt="product">
                                    </div>
                                    <!-- image -->
                                </div>
                                <!-- product image -->

                                <!-- product rating star -->
                                <div class="o-flex o-justify-content--between o-align-items--center u-mrg-t--15">
                                    <div class="c-product--ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>

                                    <div class="c-product--poin u-bg--badge__blue">27 Poin</div>
                                </div>
                                <!-- product rating star -->

                                <!-- product name -->
                                <div class="c-product--title">Maybelline Volum Express Hyper Curl Mascara Hitam</div>
                                <!-- product name -->

                                <div class="o-flex o-align-items--center o-justify-content--between u-mrg-t--20">
                                    <!-- product price -->
                                    <div>
                                        <div class="c-product--price__discount">Rp 69.000</div>
                                        <div class="c-product--price__normal">Rp 48.300</div>
                                    </div>
                                    <!-- product price -->

                                    <!-- product share -->
                                    <div class="c-product--share">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <!-- product share -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- display produk #2 -->

                    <!-- display produk #3 -->
                    <div class="c-flash-sale">
                        <div class="c-product--body">
                            <a href="" class="c-product--body__link">
                                <!-- product image -->
                                <div class="c-product--display__top">
                                    <!-- badge -->
                                    <span class="c-product--badge c-ribbon">20%</span>
                                    <!-- badge -->

                                    <!-- image -->
                                    <div class="c-product--image">
                                        <img class="c-image c-entered" src="<?= $this->Url->build('/images/jpeg/product_display/prd_8.jpg'); ?>" alt="product">
                                    </div>
                                    <!-- image -->
                                </div>
                                <!-- product image -->

                                <!-- product rating star -->
                                <div class="o-flex o-justify-content--between o-align-items--center u-mrg-t--15">
                                    <div class="c-product--ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>

                                    <div class="c-product--poin u-bg--badge__silver">27 Poin</div>
                                </div>
                                <!-- product rating star -->

                                <!-- product name -->
                                <div class="c-product--title">Maybelline Volum Express Hyper Curl Mascara Hitam</div>
                                <!-- product name -->

                                <div class="o-flex o-align-items--center o-justify-content--between u-mrg-t--20">
                                    <!-- product price -->
                                    <div>
                                        <div class="c-product--price__discount">Rp 69.000</div>
                                        <div class="c-product--price__normal">Rp 48.300</div>
                                    </div>
                                    <!-- product price -->

                                    <!-- product share -->
                                    <div class="c-product--share">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <!-- product share -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- display produk #3 -->

                    <!-- display produk #4 -->
                    <div class="c-flash-sale">
                        <div class="c-product--body">
                            <a href="" class="c-product--body__link">
                                <!-- product image -->
                                <div class="c-product--display__top">
                                    <!-- badge -->
                                    <span class="c-product--badge c-ribbon">20%</span>
                                    <!-- badge -->

                                    <!-- image -->
                                    <div class="c-product--image">
                                        <img class="c-image c-entered" src="<?= $this->Url->build('/images/jpeg/product_display/prd_1.jpg'); ?>" alt="product">
                                    </div>
                                    <!-- image -->
                                </div>
                                <!-- product image -->

                                <!-- product rating star -->
                                <div class="o-flex o-justify-content--between o-align-items--center u-mrg-t--15">
                                    <div class="c-product--ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>

                                    <div class="c-product--poin u-bg--badge__gold">600 Poin</div>
                                </div>
                                <!-- product rating star -->

                                <!-- product name -->
                                <div class="c-product--title">Maybelline Volum Express Hyper Curl Mascara Hitam</div>
                                <!-- product name -->

                                <div class="o-flex o-align-items--center o-justify-content--between u-mrg-t--20">
                                    <!-- product price -->
                                    <div>
                                        <div class="c-product--price__discount">Rp 69.000</div>
                                        <div class="c-product--price__normal">Rp 48.300</div>
                                    </div>
                                    <!-- product price -->

                                    <!-- product share -->
                                    <div class="c-product--share">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <!-- product share -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- display produk #4 -->

                    <!-- display produk #5 -->
                    <div class="c-flash-sale">
                        <div class="c-product--body">
                            <a href="" class="c-product--body__link">
                                <!-- product image -->
                                <div class="c-product--display__top">
                                    <!-- badge -->
                                    <span class="c-product--badge c-ribbon">20%</span>
                                    <!-- badge -->

                                    <!-- image -->
                                    <div class="c-product--image">
                                        <img class="c-image c-entered" src="<?= $this->Url->build('/images/jpeg/product_display/prd_2.jpg'); ?>" alt="product">
                                    </div>
                                    <!-- image -->
                                </div>
                                <!-- product image -->

                                <!-- product rating star -->
                                <div class="o-flex o-justify-content--between o-align-items--center u-mrg-t--15">
                                    <div class="c-product--ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>

                                    <div class="c-product--poin u-bg--badge__blue">152 Poin</div>
                                </div>
                                <!-- product rating star -->

                                <!-- product name -->
                                <div class="c-product--title">Maybelline Volum Express Hyper Curl Mascara Hitam</div>
                                <!-- product name -->

                                <div class="o-flex o-align-items--center o-justify-content--between u-mrg-t--20">
                                    <!-- product price -->
                                    <div>
                                        <div class="c-product--price__discount">Rp 69.000</div>
                                        <div class="c-product--price__normal">Rp 48.300</div>
                                    </div>
                                    <!-- product price -->

                                    <!-- product share -->
                                    <div class="c-product--share">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <!-- product share -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- display produk #5 -->
                </div>
            </div>
            <!-- padding area -->
        </div>
    </div>
    <!-- new arrival -->
</div>
<!-- end : main content -->


<!-- start : introduction -->
<div class="o-container-wrapper u-pad-v--40 u-bg-grad--red-v__v2">
    <div class="o-container">
        <div class="row">
            <!-- left side -->
            <div class="col-4 u-pad-r--40">
                <div class="o-flex o-justify-content--start o-align-items--start">
                    <img class="u-img--fluid u-mrg-r--20" src="<?= $this->Url->build('/images/png/logo/logo-medium.png'); ?>" width="61" alt="logo zolaku medium">
                    <div>
                        <h6 class="u-font--14 u-font--600 u-fg--white u-mrg-b--20">Jaminan 100% Aman</h6>
                        <p class="u-font--12 u-font--500 u-fg--white u-line-height--4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim, tenetur veniam? Ipsum quia nam libero quisquam exercitationem aperiam recusandae delectus odit quis tenetur possimus sed voluptatum, fugit temporibus numquam non.</p>
                    </div>
                </div>
            </div>
            <!-- left side -->


            <!-- center side -->
            <div class="col-4 u-pad-r--40">
                <div class="o-flex o-justify-content--start o-align-items--start">
                    <img class="u-img--fluid u-mrg-r--20" src="<?= $this->Url->build('/images/png/logo/logo-medium.png'); ?>" width="61" alt="logo zolaku medium">
                    <div>
                        <h6 class="u-font--14 u-font--600 u-fg--white u-mrg-b--20">Kemudahan pembayaran</h6>
                        <p class="u-font--12 u-font--500 u-fg--white u-line-height--4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim, tenetur veniam? Ipsum quia nam libero quisquam exercitationem aperiam recusandae delectus odit quis tenetur possimus sed voluptatum, fugit temporibus numquam non.</p>
                    </div>
                </div>
            </div>
            <!-- center side -->


            <!-- right side -->
            <div class="col-4 u-pad-r--40">
                <div class="o-flex o-justify-content--start o-align-items--start">
                    <img class="u-img--fluid u-mrg-r--20" src="<?= $this->Url->build('/images/png/logo/logo-medium.png'); ?>" width="61" alt="logo zolaku medium">
                    <div>
                        <h6 class="u-font--14 u-font--600 u-fg--white u-mrg-b--20">Customer support yang responsif</h6>
                        <p class="u-font--12 u-font--500 u-fg--white u-line-height--4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim, tenetur veniam? Ipsum quia nam libero quisquam exercitationem aperiam recusandae delectus odit quis tenetur possimus sed voluptatum, fugit temporibus numquam non.</p>
                    </div>
                </div>
            </div>
            <!-- right side -->
        </div>
    </div>
</div>
<!-- end : introduction -->