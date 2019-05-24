<?php $this->append('style'); ?>
<?php
$this->Html->css([
'/css/custom/history.css',
'/css/daterangepicker/daterangepicker.css',
], ['block' => true]); ?>
<?php $this->end(); ?>

<?php $this->append('script'); ?>
<?php
$this->Html->script([
'/js/daterangepicker/daterangepicker.min.js',
], ['block' => true]);
?>
<script>
    $(document).ready(function () {
        $('#reportrange').daterangepicker({
            autoUpdateInput: false,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            locale : {
                format: 'DD-MM-YYYY'
            }
        });

        $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
        });
    })
</script>
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
                                <span class="col-sm-6 tx-left tx-medium">Invoice No. 1905040256EF49</span>
                                <span class="col-sm-6 tx-right">Pesanan diterima: 17 Apr 2019, 16:38</span>
                            </div>
                            <div class="col-sm-12 bd pd-t-20 pd-b-20 bd-t-0">
                                <div class="col-sm-3">
                                    <img class="img-responsive bd" src="http://zolaku.nevsky.tech/images/600x600/fe5e66e6bd724cd7b8279b429b7d64e3.jpg">
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="zl-tx-black tx-bold tx-16 mg-t-0">GTMAN Celana Dalam Boxer Pria 4PCS</h4>
                                    <span>Bagaimana kualitas produk ini ?</span>
                                    <div class="rating">
                                        <div class="rating-box">
                                            <span class="fa fa-stack tx-20-force wd-25-force"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                                            <span class="fa fa-stack tx-20-force wd-25-force"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                                            <span class="fa fa-stack tx-20-force wd-25-force"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                                            <span class="fa fa-stack tx-20-force wd-25-force"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                                            <span class="fa fa-stack tx-20-force wd-25-force"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pd-0 mg-t-20">
                                        <span>Berikan ulasan untuk produk ini.</span>
                                        <div class="col-lg-12 pd-0" style="">
                                            <div class="form-group">
                                                <textarea class="form-control note tx-13 ht-120" name="note[102]" placeholder="Tulis Ulasan Barang" value=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pd-0">
                                        <span>Tambahkan gambar.</span>
                                        <div class="col-lg-12 pd-0" style="">
                                                <img src="https://via.placeholder.com/100x100.png/ffffff/c93535" class="bd pd-5 mg-t-10">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mg-t-20 tx-right">
                                        <a class="btn btn-md btn-radius btn-danger">Kirim</a>
                                        <a class="btn btn-md btn-radius btn-default">Batal</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 bd pd-t-20 pd-b-20 bd-t-0">
                                <div class="col-sm-3">
                                    <img class="img-responsive bd" src="http://zolaku.nevsky.tech/images/600x600/fe5e66e6bd724cd7b8279b429b7d64e3.jpg">
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="zl-tx-black tx-bold tx-16 mg-t-0">GTMAN Celana Dalam Boxer Pria 4PCS</h4>
                                    <span>Bagaimana kualitas produk ini ?</span>
                                    <div class="rating">
                                        <div class="rating-box">
                                            <span class="fa fa-stack tx-20-force wd-25-force"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                                            <span class="fa fa-stack tx-20-force wd-25-force"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                                            <span class="fa fa-stack tx-20-force wd-25-force"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                                            <span class="fa fa-stack tx-20-force wd-25-force"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                                            <span class="fa fa-stack tx-20-force wd-25-force"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pd-0 mg-t-20">
                                        <span>Berikan ulasan untuk produk ini.</span>
                                        <div class="col-lg-12 pd-0" style="">
                                            <div class="form-group">
                                                <textarea class="form-control note tx-13 ht-120" name="note[102]" placeholder="Tulis Ulasan Barang" value=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pd-0">
                                        <span>Tambahkan gambar.</span>
                                        <div class="col-lg-12 pd-0" style="">
                                                <img src="https://via.placeholder.com/100x100.png/ffffff/c93535" class="bd pd-5 mg-t-10">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mg-t-20 tx-right">
                                        <a class="btn btn-md btn-radius btn-danger">Kirim</a>
                                        <a class="btn btn-md btn-radius btn-default">Batal</a>
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