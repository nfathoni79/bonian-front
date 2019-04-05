<!-- start : banner -->
<div class="o-container-wrapper l-banner-content">
    <div class="o-container">
        <!-- layout banner -->
        <div class="o-flex o-justify-content--between o-align-items--center">
            <!-- slider banner -->
            <div class="c-card c-card--banner__v1">
                <!-- start : image slideshow -->
                <?php foreach($banners as $banner) : ?>
                <img class="u-img--fluid u-ht--100p" src="<?= $this->Url->build($_basePath . 'images/806x353/' . $banner['image']); ?>" alt="image banner">
                <?php break; endforeach; ?>
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