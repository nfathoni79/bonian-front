<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Pengalaman berbelanja terbaik di Indonesia">
    <meta name="author" content="PT. Zolaku | Zolaku Indonesia">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="width=1200" name="viewport">

    <meta property="og:url" content="https://zolaku.com"/>
    <meta property="og:type" content="website"/>

    <meta property="og:title" content="Zolaku | Pengalaman berbelanja terbaik di Indonesia"/>
    <meta property="og:description" content="Pengalaman berbelanja terbaik di Indonesia"/>
    <meta property="og:image" content="https://zolaku.com/images/logo-wide.png"/>

    <?= $this->fetch('meta') ?>

    <link rel="icon" href="<?= $this->Url->build('/images/png/logo/favicon.png'); ?>">

    <title><?= $this->fetch('title') ?></title>

    <!-- mobile screen -->
    <link href="https://m.zolaku.com/" media="only screen and (max-width: 640px)" rel="alternate">

    <!-- css link vendor -->
    <?= $this->Html->css([
        '/scripts/css-vendor/blockbox',
        '/scripts/vendor/Ionicons/css/ionicons',
        '/scripts/vendor/owl.carousel/owl.carousel',
        '/scripts/vendor/perfect-scrollbar/css/perfect-scrollbar',
        '/scripts/vendor/swiper-js/css/swiper',
    ]); ?>

    <!-- fontawesome link -->
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- css link custom -->
    <?= $this->Html->css([
        '/scripts/css-custom/zolaku-overides',
        '/scripts/css-custom/zolaku-pages',
        '/scripts/css-custom/zolaku-media-query',
    ]); ?>


    <?= $this->fetch('css') ?>
</head>


<body class="zolaku-app">

<?= $this->element('Partials/headpanel', ['categories' => $_categories]); ?>

<?= $this->fetch('content') ?>

<?= $this->Element('Partials/footer'); ?>


<!-- start : javascript vendor -->
<?= $this->Html->script([
    '/scripts/vendor/jquery/jquery',
    '/scripts/vendor/popper.js/popper',
    '/scripts/vendor/bootstrap/bootstrap',
    '/scripts/vendor/owl.carousel/owl.carousel',
    '/scripts/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery',
    '/scripts/vendor/swiper-js/js/swiper',
    '/scripts/js-vendor/typeahead.bundle',
    '/scripts/js-vendor/typeahead.jquery',
    '/scripts/js-vendor/bloodhound',
]); ?>
<!-- end : javascript vendor -->

<!-- start : headpanel show/hide -->
<script>
    $(document).ready(function() {
        'use strict'

        if($(document).scrollTop() > 10) {
            $('.c-headpanel').addClass('u-mrg-t--35__neg');
        }

        $(window).scroll(function() {
            if ($(document).scrollTop() > 10) {
                $('.c-headpanel').addClass('u-mrg-t--35__neg');
            } else {
                $('.c-headpanel').removeClass('u-mrg-t--35__neg');
            }
        });
    });
</script>
<!-- end : headpanel show/hide -->

<!-- start : countdown timer -->
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="c-flash-sale--countdown-timer"
        document.getElementById("c-flash-sale--countdown-timer").innerHTML = hours + " : "
            + minutes + " : " + seconds;

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("c-flash-sale--countdown-timer").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
<!-- end : countdown timer -->

<!-- start : searchbar -->
<?= $this->Html->script([
    '/scripts/js-custom/zolaku-searchbar-select',
    '/scripts/js-custom/zolaku-searchbar-typehead',
]); ?>

<?= $this->fetch('script') ?>

<!-- end : searchbar -->
</body>
</html>