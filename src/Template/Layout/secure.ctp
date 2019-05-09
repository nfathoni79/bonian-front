<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="description" content="Pengalaman berbelanja terbaik di Indonesia">
    <meta name="author" content="PT. Zolaku | Zolaku Indonesia">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="width=1200" name="viewport">
    <meta content="<?= $this->request->getParam('_csrfToken'); ?>" name="_csrfToken" />
    <meta content="<?= @$_basePath; ?>" name="_baseImagePath" />
    <meta content="<?= $this->request->getAttribute('base'); ?>" name="_basePath" />

    <meta property="og:url" content="https://zolaku.com"/>
    <meta property="og:type" content="website"/>

    <meta property="og:title" content="Zolaku | Pengalaman berbelanja terbaik di Indonesia"/>
    <meta property="og:description" content="Pengalaman berbelanja terbaik di Indonesia"/>
    <meta property="og:image" content="https://zolaku.com/images/logo-wide.png"/>

    <?= $this->fetch('meta') ?>

    <!-- Favicon
    ============================================ -->
    <link rel="icon" href="<?= $this->Url->build('/images/png/logo/favicon.png'); ?>">


    <!-- mobile screen -->
    <link href="https://m.zolaku.com/" media="only screen and (max-width: 640px)" rel="alternate">

    <!-- css link vendor -->
    <?= $this->Html->css([
    '/css/bootstrap/css/bootstrap.min',
    '/css/font-awesome/css/font-awesome.min',
    '/css/font-awesome-5/css/fontawesome.min',
    '/css/font-awesome-5/css/all.min',
    '/js/datetimepicker/bootstrap-datetimepicker.min',
    '/js/owl-carousel/owl.carousel',
    '/css/themecss/lib',
    '/js/jquery-ui/jquery-ui.min',
    '/js/minicolors/miniColors',
    ]); ?>

    <!-- css link custom -->
    <?= $this->Html->css([
    '/css/themecss/so_searchpro',
    '/css/themecss/so_megamenu',
    '/css/themecss/so-categories',
    '/css/themecss/so-listing-tabs',
    '/css/themecss/so-newletter-popup',
    '/css/themecss/slick',
    ]); ?>


    <?= $this->Html->css([
    '/css/footer/footer6',
    '/css/header/header6',
    ]); ?>
    <?= $this->Html->css([
    '/css/home6',
    '/css/theme',
    ],['id' => 'color_scheme']); ?>
    <?= $this->Html->css([
    '/css/responsive',
    ]); ?>
    <!-- css custom other -->
    <?= $this->Html->css([
    '/css/zolaku-font',
    '/css/zolaku',
    '/css/zolaku-custom-min.css',
    '/css/custom.css',
    '/css/jquery.smartsuggest.css'
    ]); ?>


    <?= $this->fetch('css') ?>
    <!-- Google web fonts
   ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway:600,700" rel='stylesheet' type='text/css'>
    <style>
        body{font-family:'Open Sans', sans-serif}
        .font-ct, h1, h2, h3,
        .des_deal,
        .item-time-w,
        .item-time-w .name-time,
        .static-menu a.main-menu,
        .container-megamenu.vertical .vertical-wrapper ul li > a strong,
        .container-megamenu.vertical .vertical-wrapper ul.megamenu li .sub-menu .content .static-menu .menu ul li a.main-menu,
        .horizontal ul.megamenu > li > a, .footertitle,
        .module h3.modtitle span, .breadcrumb li a, .item-title a,
        .best-seller-custom .item-info, .product-box-desc, .product_page_price .price-new,
        .list-group-item a, #menu ul.nav > li > a, .megamenuToogle-pattern,
        .right-block .caption h4, .price, .box-price {
            font-family: Raleway, sans-serif;
        }
    </style>

</head>

<body class="common-home res layout-6">

<div id="wrapper" class="wrapper-fluid banners-effect-7">

    <?= $this->element('Partials/headpanel_secure', ['categories' => $_categories]); ?>


    <!-- Main Container  -->
    <div class="main-container">
        <div id="content">
            <?= $this->fetch('content') ?>
        </div>
    </div>


    <footer class="footer-container typefooter-1">
        <?= $this->element('Partials/footer'); ?>
    </footer>

</div>



<!-- Include Libs & Plugins  -->
<?= $this->Html->script([
'/js/jquery-2.2.4.min',
'/js/bootstrap.min',
'/js/owl-carousel/owl.carousel',
'/js/themejs/libs',
'/js/unveil/jquery.unveil',
'/js/countdown/jquery.countdown.min',
'/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min',
'/js/datetimepicker/moment',
'/js/datetimepicker/bootstrap-datetimepicker.min',
'/js/jquery-ui/jquery-ui.min',
'/js/modernizr/modernizr-2.6.2.min',
'/js/minicolors/jquery.miniColors.min',
'/js/bundle',
]); ?>

<!-- Theme files -->
<?= $this->Html->script([
'/js/themejs/application',
'/js/themejs/homepage',
'/js/themejs/so_megamenu',
'/js/themejs/addtocart',
'/js/themejs/cpanel',
'/js/custom-libs/validation-render',
'/js/sweetalert/sweetalert.js',
'/js/lib-tools.js',
'/js/jquery.smartsuggest.js'
]); ?>

<?= $this->fetch('script') ?>


</body>
</html>
