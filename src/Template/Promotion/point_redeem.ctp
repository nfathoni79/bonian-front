
<div id="content" style="background: #FFF6F6;">
    <div class="container">
        <div class="block">
            <div class="module sohomepage-slider ">
                <div class="yt-content-slider"  data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                    <div class="yt-content-slide">
                        <a title="slide1" href="#"><div class="yt-content-slide"><img src="<?= $this->Url->build($_basePath . 'images/1170x400/32da38b66749491f81da01357f78a5f3.jpg'); ?>" class="responsive"></div></a>
                    </div>
                </div>
                <div class="loadeding"></div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div id="content" class="col-sm-12 item-article">
        <div class="row box-1-about">
            <div class="col-md-12 our-member">
                <div class="title-about-us">
                    <h2>Tukarkan point anda & dapatkan bonusnya</h2>
                </div>
                <div class="short-des">Consectetur adipiscing elit. Donec pellentesque venenatis elit, quis aliquet mauris malesuada vel. Donec vitae libero dolor, eget dapibus justo.
                    <br>Aenean facilisis aliquet feugiat. Suspendisse lacinia congue est ac semper. Nulla ut elit magna, vitae volutpat magna.</div>
            </div>
        </div>
        <div class="block block_0">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr class="info">
                        <th class="text-left">No</th>
                        <th class="text-left">Point</th>
                        <th class="text-left">Kode Voucher</th>
                        <th class="text-left">Diskon</th>
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
                            <td><?= $vals['code_voucher'];?></td>
                            <td><?= $vals['percent'];?>%</td>
                            <td>Rp. <?php echo $this->Number->precision($vals['value'], 0);?></td>
                            <td><a href="#" class="btn btn-danger btn-sm btn-radius">Claim</a></td>
                        </tr>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="alert alert-danger">
                Consectetur adipiscing elit. Donec pellentesque venenatis elit, quis aliquet mauris malesuada vel. Donec vitae libero dolor, eget dapibus justo.
                <br>Aenean facilisis aliquet feugiat. Suspendisse lacinia congue est ac semper. Nulla ut elit magna, vitae volutpat magna.
        </div>
    </div>
</div>