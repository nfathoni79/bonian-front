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
                        <h4>Informasi detail</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-condensed user-detail-info">
                                    <tr>
                                        <td>Nama</td>
                                        <td><?= $profile['first_name']; ?> <?= $profile['last_name']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Username</td>
                                        <td><?= $profile['username']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td><?= $profile['email']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Referal</td>
                                        <td><?= !empty($profile['referral_customer']) ? $profile['referral_customer']['username'] :
                                                '<a class="link-referral" data-container="body" data-toggle="popover" data-placement="bottom" tabindex="0">+ Tambah referal</a>';
                                        ?></td>
                                    </tr>

                                    <tr>
                                        <td>Telepon</td>
                                        <td><?= $profile['phone']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal lahir</td>
                                        <td><?= $profile['dob']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Jenis kelamin</td>
                                        <td><?= $profile['gender'] == 'M' ? 'Laki laki' : ($profile['gender'] == 'F' ? 'Perempuan' : '-'); ?></td>
                                    </tr>

                                    <tr>
                                        <td>Verifikasi</td>
                                        <td>
                                            <?php if ($profile['is_verified']) : ?>
                                                <span class="label label-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Terverifikasi</span>
                                            <?php else : ?>
                                                <span class="label label-default"><i class="fa fa-close" aria-hidden="true"></i> Belum terverifikasi</span>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                </table>

                                <div>
                                    <a class="btn btn-danger btn-radius" href="<?= $this->Url->build(['action' => 'edit', 'prefix' => 'user']); ?>">Edit Profil</a>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="bg-red margin-b-15">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div id="profile-pic"><img src="http://localhost/zolaku-front/images/jpeg/users-profile/user-1.jpg" class="img-responsive img-rounded"></div>
                                        </div>
                                        <div class="col-md-8">
                                            <button class="btn btn-default btn-block"><i class="fa fa-camera"></i> Ganti Foto</button>
                                            Ukuran gambar maksimum 1MB, Format gambar JPEG, PNG
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-red margin-b-15">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div id="qrcode"></div>
                                        </div>
                                        <div class="col-md-8">
                                            QR Code refferal saya, scan QR Code ini untuk menjadikan saya refferal
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
</div>

<div id="template-popover-referral" style="display:none">
    <div class="leaderboard-popover">
        <button type="button" class="btn btn-default">
            <i class="fa fa-qrcode"></i> Scan QR Code
        </button>
        <button type="button" class="btn btn-default">
            <i class="fa fa-graduation-cap"></i> Leaderboard list
        </button>
        <div style="margin-top: 15px;">
            Tambah referal anda dan dapatkan keuntungan menjadi bagian zolaku. <a>Pelajari lebih lanjut</a>
        </div>
    </div>

</div>


<?php $this->append('script'); ?>
<?php
$this->Html->script([
'/js/qrcode.js',
], ['block' => true]);
?>
<script>
    $(document).ready(function() {
        $('.link-referral').popover({
            html: true,
            content: function() {
                return $("#template-popover-referral").html();
            }
        }).on("show.bs.popover", function(e){
            $(this).data("bs.popover").tip().css({"max-width": '350px'});
        });

        $('#qrcode').qrcode({width: 100,height: 100,text: "<?php echo $this->Url->build(['prefix' => false, 'controller' => 'Home', 'action' => 'index','reff' => $profile['reffcode']], ['fullBase' => true]);?>"});
    })

</script>
<?php $this->end(); ?>
