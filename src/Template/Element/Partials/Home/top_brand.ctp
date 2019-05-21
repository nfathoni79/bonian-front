<div class="card module topbrands pd-t-55">
        <div class="box-title font-ct">
            <h2 class="modtitle">Top Brands</h2>
        </div>
        <div class="slider-brands">
            <div class="top-brand bd-none-force arrow-default yt-content-slider contentslider" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="6" data-items_column1="5" data-items_column2="3" data-items_column3="3" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
                <?php foreach($topBrands as $brand) :  ?>
                <div class="item">
                    <a href="#">
                        <?php $logo = isset($brand['logo']) ? $brand['logo'] : 'https://via.placeholder.com/160x72.png?text=' . urlencode(strtoupper($brand['name'])); ?>
                        <img src="<?= $logo; ?>" alt="brand">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
</div>