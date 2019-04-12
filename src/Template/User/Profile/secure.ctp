<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <div class="user-content">
                    <div class="user-content-header">
                        <?= $this->element('Partials/Profile/navigation'); ?>
                    </div>
                    <div class="user-content-body">
                        <h4><strong>Aktivitas Login</strong></h4>

                        <div class="alert alert-info">
                            Bila terdapat aktivitas tidak dikenal, segera klik "Keluar" dan <a>ubah kata sandi</a>
                        </div>

                        <?php
                                function print_icon($platform) {
                                    if (in_array($platform, ['Windows', 'Linux', 'Macintosh', 'Chrome OS'])) {
                                        return '<i class="fa fa-desktop" aria-hidden="true"></i>';
                                    } else {
                                        return '<i class="fa fa-mobile" aria-hidden="true"></i>';
                                    }
                                }
                        ?>
                            <?php foreach($histories as $key => $history) : ?>
                            <div style="width: 400px; display: table; margin: 15px auto; border-bottom: 1px dashed #d1d1d1; padding: 10px;">
                                <div style="display: table-cell; font-size: 18px;"><?= print_icon($history['device']['platform']); ?></div>
                                <div style="display: table-cell;">
                                    <h4 style="margin-top: 0;"><?= $history['device']['browser']; ?> di <?= $history['device']['platform']; ?> </h4>

                                    <?= $history['IpLocations']['city'] ? $history['IpLocations']['city'] : 'Tidak dikenali'; ?>, <?= $history['IpLocations']['country_code'] ? $history['IpLocations']['country_name'] . ' (' .$history['IpLocations']['country_code'] . ')' : '-'; ?>  <?= $history['ip']; ?> <br/>
                                    <?php if ($key == 0) : ?>
                                        <span class="label label-success" style="margin-bottom: 15px;">Sedang aktif</span>
                                    <?php else : ?>
                                        <?= $this->Time->timeAgoInWords($history['modified'], [
                                            'accuracy' => ['month' => 'month'],
                                            'end' => '1 year'
                                        ]); ?>
                                    <?php endif; ?>

                                </div>
                            </div>

                            <?php endforeach; ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php $this->append('script'); ?>
<script>

</script>
<?php $this->end();?>