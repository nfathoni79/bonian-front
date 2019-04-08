
<div class="slider-full">
    <div class="container ">
        <div class="row">
            <div class="col-sm-12 col-xs-12 block-slide">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 block-left">
                        <div class="module sohomepage-slider ">
                            <div class="yt-content-slider"  data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

                                <?php foreach($_banners as $banner) : ?>
                                <div class="yt-content-slide">
                                    <a href="<?php echo $banner['url'];?>"><img src="<?= $this->Url->build($_basePath . 'images/806x353/' . $banner['image']); ?>" alt="slide img" class="responsive"></a>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="loadeding"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 block-right">
                        <div class="module">
                            <div class="block-image-1">
                                <ul class="static-image">
                                    <li><a title="Static Image" href="#"><img src="/frontend/images/catalog/demo/banners/home1/1.jpg" alt="Static Image"></a></li>
                                    <li><a title="Static Image" href="#"><img src="/frontend/images/catalog/demo/banners/home1/2.jpg" alt="Static Image"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>