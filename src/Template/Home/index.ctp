<?php $this->append('style'); ?>
<?php
$this->Html->css([
'/css/custom/flash-sale.css',
], ['block' => true]);
?>
<?php $this->end(); ?>

<?= $this->element('Partials/Home/banner', ['banners' => $_banners]); ?>
<div class="container ">
    <?= $this->element('Partials/Home/product_digital'); ?>
    <?= $this->element('Partials/Home/bonus_and_game'); ?>
    <?= $this->element('Partials/Home/flash_sale', ['categories' => $_categories]); ?>
    <div class="block block_6">
        <div class="row">
            <div class="col-lg-6">
                <div class="banners">
                    <div>
                        <a href="<?php echo $bannerLeft['url'];?>"><img src="<?= $this->Url->build($_basePath . 'images/570x220/' . $bannerLeft['image']); ?>" alt="banner img" class="responsive"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banners">
                    <div>
                        <a href="<?php echo $bannerRight['url'];?>"><img src="<?= $this->Url->build($_basePath . 'images/570x220/' . $bannerRight['image']); ?>" alt="banner img" class="responsive"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->element('Partials/Home/top_products', ['topProducts' => $topProducts]); ?>
</div>
