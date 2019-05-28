<?php $this->append('style'); ?>
<?php
$this->Html->css([
], ['block' => true]); ?>
<?php $this->end(); ?>

<?php $this->append('script'); ?>
<?php
$this->Html->script([
], ['block' => true]);
?>
<?php $this->end(); ?>

<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <?= $this->element('Partials/Profile/verification'); ?>
                <div class="user-content">
                    <div class="user-content-header">
                        <?= $this->element('Partials/Review/navigation'); ?>
                    </div>

                    <div class="user-content-body pd-20">
                        <div class="row mg-0">
                            <div class="col-sm-12 bd bg-gray-100 pd-10">
                                <span class="col-sm-6 tx-left tx-medium">Invoice No. <?= $rating['order']['invoice'];?>-<?= $rating['order']['id'];?></span>
                                <span class="col-sm-6 tx-right tx-medium">Tanggal Order: <?= date('d M Y, H : i',strtotime($rating['created'])); ?></span>
                            </div>

                            <div class="alert alert-danger alert-msg" style="display:none;"></div>
                            <div class="col-sm-12 bd pd-t-20 pd-b-20 bd-t-0">
                                <div class="col-sm-3">
                                    <?php foreach($rating['product']['images'] as $image):?>
                                    <img class="img-responsive" src="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" >
                                    <?php break;?>
                                    <?php endforeach;?>
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="zl-tx-black tx-bold tx-16 mg-t-0"><?php echo $rating['product']['name'];?></h4>

                                    <?php
                                    $rate = (int) $rating['rating'];
                                    for ($x = 0; $x < $rate; $x++) {
                                        echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>';
                                    }
                                    for ($x = 0; $x < 5-$rate; $x++) {
                                     echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>';
                                    }
                                    ?>
                                    <div class="col-lg-12 pd-0 mg-t-10">
                                        <div class="col-lg-12 pd-0" style="">
                                            <div class="form-group">
                                                <?php echo $rating['comment'];?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pd-0">
                                        <?php foreach($rating['product_rating_images'] as $vals ):?>
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <a href="<?= $this->Url->build($_basePath . 'files/ProductRatingImages/' . $vals['name']); ?>">
                                                    <img class="img-responsive" src="<?= $this->Url->build($_basePath . 'images/600x600/' . $vals['name']); ?>" >
                                                </a>
                                            </div>
                                        </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->append('script'); ?>
<?php $this->end(); ?>