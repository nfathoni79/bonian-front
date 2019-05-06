<section class="slider-full">
    <div class="container">
        <div class="block-slide">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 block-left">
                        <div class="module sohomepage-slider ">
                            <div class="yt-content-slider"  data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

                                <?php foreach($_banners as $banner) : ?>
                                <div class="yt-content-slide">
                                    <a href="<?php echo $banner['url'];?>"><img src="<?= $this->Url->build($_basePath . 'images/870x353/' . $banner['image']); ?>" alt="slide img" class="responsive"></a>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="loadeding"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 block-right">
                        <div class="module">
                            <div class="block-image-1">
                                <ul class="static-image">
                                    <!-- <li><a href="#"><?php echo $this->Html->image('/images/catalog/banners/leaderboard.jpg', ['alt' => 'Leaderboard Zolaku']); ?></a></li>
                                    <li><a href="#"><?php echo $this->Html->image('/images/catalog/banners/member.jpg', ['alt' => 'Panduan Mencari Member']); ?></a></li> -->
                                    <li class="mg-b-10"><a href="#"><img src="https://via.placeholder.com/370x150.png/ffffff/c93535"></a></li>
                                    <li><a href="#"><img src="https://via.placeholder.com/370x150.png/ffffff/c93535"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>