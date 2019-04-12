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

                        <div class="alert alert-warning">
                            Bila terdapat aktivitas tidak dikenal, segera klik "Keluar" dan <a>ubah kata sandi</a>
                        </div>

                        <?php
                            function print_icon($platform) {
                                if (in_array($platform, ['Windows', 'Linux', 'Macintosh', 'Chrome OS'])) {
                                    return '<i class="fa fa-desktop fa-3x" aria-hidden="true"></i>';
                                } else {
                                    return '<i class="fa fa-mobile fa-5x" aria-hidden="true"></i>';
                                }
                            }
                        ?>
                        <ul class="list-group">
                            <?php foreach($histories as $key => $history) : ?>

                                <li class="list-group-item" <?php echo ($key == 0) ? 'style="background:#FFF6F6;"' : '';?>>
                                    <dl class="dl-horizontal">
                                        <dt style="width: 125px;pa"><?= print_icon($history['device']['platform']); ?></dt>
                                        <dd>
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
                                        </dd>
                                    </dl>
                                </li>
                            <?php endforeach; ?>
                        </ul> 

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