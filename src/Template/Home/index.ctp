
<?= $this->Element('Partials/Home/banner'); ?>


<!-- start : main content -->
<div class="o-container-wrapper l-main-content">

    <?= $this->Element('Partials/Home/product_digital'); ?>

    <?= $this->Element('Partials/Home/bonus_and_game'); ?>

    <?= $this->Element('Partials/Home/flash_sale'); ?>


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

    <?= $this->Element('Partials/Home/new_arrival'); ?>
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