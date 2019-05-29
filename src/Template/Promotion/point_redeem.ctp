<?php $this->append('style'); ?>
<?php
$this->Html->css([
'/css/custom/homepage.css',
], ['block' => true]);
?>
<?php $this->end(); ?>

<!-- start: header part -->
<div class="c-header__bg" style="z-index:0;">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-home"></i></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Promotion','action' => 'pointRedeem']); ?>">Penukaran Point</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- end: header part -->

<div class="c-help-main mb-5">
    <div class="container">

        <div class="block">
            <div class="module sohomepage-slider">
                <div class="yt-content-slider"  data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                    <div class="yt-content-slide">
                        <a title="slide1" href="#">
                            <?php echo $this->Html->image('/images/banners/point-redeem/img1.jpg', ['alt' => 'Bonian - Sebar Manfaat - Hidup Hemat', 'class' => 'responsive wd-100p']); ?>
                        </a>
                    </div>
                    <div class="yt-content-slide">
                        <a title="slide1" href="#">
                            <?php echo $this->Html->image('/images/banners/point-redeem/img2.jpg', ['alt' => 'Bonian - Sebar Manfaat - Hidup Hemat', 'class' => 'responsive wd-100p']); ?>
                        </a>
                    </div>
                    <div class="yt-content-slide">
                        <a title="slide1" href="#">
                            <?php echo $this->Html->image('/images/banners/point-redeem/img3.jpg', ['alt' => 'Bonian - Sebar Manfaat - Hidup Hemat', 'class' => 'responsive wd-100p']); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="content" class="col-sm-12 item-article">
                <div class="row box-1-about">
                    <div class="col-md-12 our-member">
                        <div class="title-pages title-about-us mg-b-40-force">
                            <h2>Tukarkan point anda & dapatkan bonusnya</h2>
                        </div>
                        <div class="notification"></div>
                        <div class="table-responsive">
                            <table class="table table-hover table-red">
                                <thead>
                                <tr class="info">
                                    <th class="text-left">No</th>
                                    <th class="text-left">Point</th>
                                    <th class="text-left">Nilai Voucher</th>
                                    <th class="text-left"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($point as $vals):?>
                                <tr>
                                    <td><?= $no;?></td>
                                    <td><?= $vals['name'];?></td>
                                    <td>Rp. <?php echo $this->Number->precision($vals['value'], 0);?></td>
                                    <td><a href="javascript:void(0);" class="btn btn-danger btn-sm btn-radius btn-claim" data-voucher="<?= $vals['code_voucher'];?>">Claim</a></td>
                                </tr>
                                <?php $no++; ?>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="alert alert-info">
                            <ul>
                                <li>- Point & Voucher ini tidak dapat diuangkan dan tidak dapat ditransfer ke akun pengguna Bonian yang lain.</li>
                                <li>- Tidak ada minimal pembelanjaan untuk  memakain Voucher yang di redeem dari Point</li>
                                <li>- Reedeem point hanya boleh Maksimal 5000 Point</li>
                                <li>- Masa Expired Voucher 1 Bulan dari saat claim dari point ke Voucher </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->append('script'); ?>
<script>
    $(document).ready(function(){
        $('.btn-claim').on('click',function(){
            var voucher = $(this).data('voucher');

            swal({
                title: 'Apakah ingin melakukan penukaran poin dengan voucher '+voucher+'?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((ok) => {
                if (ok) {
                    $.ajax({
                        url: "<?php echo $this->Url->build(['action' => 'claim']);?>",
                        type: "post",
                        data: {
                            voucher : voucher,
                            _csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'
                        } ,
                        success: function (response) {
                            if(response.is_error){
                                swal({
                                    title: "Redeem voucher gagal",
                                    text: response.message,
                                    icon: "error",
                                });
                            }else{
                                swal({
                                    title: "Redeem voucher behasil",
                                    text: 'Voucher '+voucher+' berhasil di redeem.',
                                    icon: "success",
                                });
                            }
                            return false;

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }

                    });
                }
            });
        });
    }) ;
</script>
<?php $this->end(); ?>





