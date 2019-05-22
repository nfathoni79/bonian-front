<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <?= $this->element('Partials/Profile/verification'); ?>
                <div class="user-content">
                    <div class="user-content-header">
                        <?= $this->element('Partials/Profile/navigation'); ?>
                    </div>
                    <div class="user-content-body">
                        <h4><strong>Aktivitas Login</strong></h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-warning">
                                    Bila terdapat aktivitas tidak dikenal, segera klik "Keluar" dan <a data-toggle="modal" class="btn btn-sm btn-danger btn-radius" data-target="#change-password-modal">ubah kata sandi</a>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                                    <dl class="dl-horizontal mg-b-0">
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
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-labelledby="login-popupLabel">
    <div class="modal-dialog modal-md change-password-modal" role="document" style="width: 450px;">
        <div class="modal-content modal-red">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span></button>
                <h4 class="modal-title" id="login-popupLabel" style="text-align: left;">Ubah kata sandi</h4>
            </div>
            <?= $this->Form->create(null, [
                'url' => [
                    'controller' => 'Profile',
                    'action' => 'changePassword',
                    'prefix' => 'user'
                ],
                'id' => 'form-change-password',
                'class' => 'ajax-helper'
            ]); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kata Sandi Lama</label>
                    <input type="password" name="current_password" value="" placeholder="Password Lama" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Kata Sandi Baru</label>
                    <input type="password" name="password" value="" placeholder="Password Baru" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Kata Sandi Baru (ulangi)</label>
                    <input type="password" name="repeat_password" value="" placeholder="Password Baru (ulangi)" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-radius btn-md pull-left"><i class="fa fa-lock"></i> Ganti password</button>
            </div>
            <?= $this->Form->end(); ?>

        </div>
    </div>
</div>
<!-- end modal add address -->




<?php $this->append('script'); ?>
<script>
    $(document).ready(function(){
        var formPassword = $("#form-change-password");
        formPassword.submit(function(e) {
            var ajaxRequest = new ajaxValidation(formPassword);
            ajaxRequest.post(formPassword.attr('action'), formPassword.find(':input'), function(response, data) {
                if (response.success) {
                    location.href = '<?= $this->Url->build(); ?>';
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>
<?php $this->end();?>