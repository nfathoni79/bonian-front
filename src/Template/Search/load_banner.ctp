<?php if ($banners) : ?>
    <!-- start: banner atas -->
    <div class="mg-b-30 card pd-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="banners">
                    <div class="module sohomepage-slider ">
                        <div class="yt-content-slider"  data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

                            <?php foreach($banners as $banner) : ?>
                                <div class="yt-content-slide">
                                    <a href="<?php echo $banner['url'];?>"><img src="<?= $this->Url->build($_basePath . 'images/870x290/' . $banner['name']); ?>" alt="slide img" class="responsive"></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="loadeding"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php endif; ?>