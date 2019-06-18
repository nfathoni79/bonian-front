<?php
/**
 * @var \App\Form\CustomerForm $customer
 */
?>
<div class="c-header__bg" style="z-index:0; min-height: 200px;">
    <div class="container">

    </div>
</div>
<!-- end: header part -->



<!-- start: checkout -->
<div class="c-checkout-main tx-medium">
    <div class="container">
        <div class="row">

            <div class="col-lg-5" style="float: none; margin: 0 auto;">
                <!-- start: card alamat -->
                <div class="c-checkout-card">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-card__item-title tx-bold-force" style="max-width: 260px;">
                                Verifikasi nomor handphone
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-12" style="text-align: center;">
                            Nomor Handphone yang Anda masukkan hanya dapat digunakan oleh Satu Akun
                        </div>
                    </div>


                    <div class="row">
                        <?= $this->Form->create($customer); ?>
                        <div class="col-lg-12">
                            <div class="form-group form-group-lg">
                                <label class="control-label" for="input-phone-label"></label>
                                <div class="input-group">
                                    <span class="input-group-addon">+62</span>
                                    <?= $this->Form->control('phone', ['label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'contoh: 8123456789', 'error' => false]); ?>
                                </div>
                                <?php
                                if ($this->Form->isFieldError('phone')) {
                                        echo $this->Form->error('phone');
                                    }
                                ?>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-danger btn-lg btn-block">
                                Verifikasi
                            </button>
                        </div>
                        <?= $this->Form->end(); ?>
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>
<!-- end: checkout -->










<?php $this->append('script'); ?>
<?php
$this->Html->css([
'/css/plugin.min.css',
'/css/custom/checkout.css',
'/css/jquery.fancybox.min.css',
], ['block' => true]);
?>
<?php
$this->Html->script([
'/js/jquery.fancybox.min.js',
], ['block' => true]);
?>

<?php $this->end(); ?>
