<style>
    #upload_button {
        display: inline-block;
    }
    #upload_button input[type=file] {
        display:none;
    }
    #upload_button .error-message {
        display:none;
    }
</style>
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

                        <h4><strong>Informasi detail</strong></h4>
                        <?= $this->Flash->render();?>
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
                                        <td><?= $profile['email']; ?> <?= !empty($profile['email']) ?
                                                $this->Html->link('Ubah', ['action' => 'changeEmail'], ['class' => 'change-phone-number'])  :
                                                ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Referal</td>
                                        <td><?= $profile['reffcode']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Referal Anda</td>
                                        <td><?= !empty($profile['referral_customer']) ? $profile['referral_customer']['username'] :
                                                '<a class="link-referral" data-container="body" data-toggle="popover" data-placement="bottom" tabindex="0">+ Tambah referal</a>';
                                        ?></td>
                                    </tr>

                                    <tr>
                                        <td>Telepon</td>
                                        <td><?= $profile['phone']; ?> <?= !empty($profile['phone']) ?
                                                $this->Html->link('Ubah', ['action' => 'changePhone'], ['class' => 'change-phone-number'])  :
                                                ''; ?>
                                        </td>
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
                                        <td>Verifikasi No. Telpon</td>
                                        <td>
                                            <?php if ($profile['is_verified']) : ?>
                                                <span class="label label-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Terverifikasi</span>
                                            <?php else : ?>
                                                <span class="label label-danger"><i class="fa fa-close" aria-hidden="true"></i> Belum terverifikasi</span>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Verifikasi Alamat Email</td>
                                        <td>
                                            <?php if ($profile['is_email_verified']) : ?>
                                                <span class="label label-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Terverifikasi</span>
                                            <?php else : ?>
                                                <span class="label label-danger"><i class="fa fa-close" aria-hidden="true"></i> Belum terverifikasi</span>
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
                                    <div class="alert alert-danger alert-msg" style="display:none;"></div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div id="profile-pic">
                                                <img src="<?= $this->Url->build($_basePath . 'files/Customers/avatar/'.$this->request->getSession()->read('Auth.Customers.avatar')); ?>" alt="" class="img-fluid k-img-rounded avatar">
                                            </div>
                                        </div>
                                        <div class="col-md-8">

                                            <?= $this->Form->create(null, [
                                                'url' => [
                                                    'controller' => 'Profile',
                                                    'action' => 'uploadImage',
                                                    'prefix' => 'user'
                                                ],
                                                'id' => 'imageUploadForm',
                                                'type' => 'file'
                                            ]); ?>

                                            <div id="upload_button">
                                                <label>
                                                    <?php echo $this->Form->control('avatar',['type' => 'file', 'label' => false, 'div' => false, 'id'=>'ImageBrowse']);  ?>
                                                    <span class="btn btn-default btn-block"><i class="fa fa-camera"></i> Ganti Foto</span>
                                                </label>
                                            </div>
                                            <?php  echo $this->Form->end(); ?>
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
        <!--
        <button type="button" class="btn btn-default">
            <i class="fa fa-qrcode"></i> Scan QR Code
        </button>
        -->
        <a href="<?= $this->Url->build(['controller' => 'Leaderboard','action' => 'index','prefix' => 'user'])?>" class="btn btn-default">
            <i class="zl zl-leaderboard"></i> Leaderboard
        </a>
        <div class="mg-t-15">
            Tambah referal anda dan dapatkan keuntungan menjadi bagian bonian.
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

        $("#ImageBrowse").on("change", function() {
            $("#imageUploadForm").submit();
        });

        $('.link-referral').popover({
            html: true,
            content: function() {
                return $("#template-popover-referral").html();
            }
        }).on("show.bs.popover", function(e){
            $(this).data("bs.popover").tip().css({"max-width": '350px'});
        });

        $('#qrcode').qrcode({width: 100,height: 100,text: "<?php echo $this->Url->build(['prefix' => false, 'controller' => 'Home', 'action' => 'index','reff' => $profile['reffcode']], ['fullBase' => true]);?>"});


        $('#imageUploadForm').on('submit',(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: $(this).attr('action'),
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if (data.error.length == '0') {
                        $('.alert-msg').hide();
                        location.reload();
                    } else {
                        $('.alert-msg').html(data.error.data).show();
                        return false;
                    }
                },
                error: function(data){
                    $("#login-popup").modal('show');
                }
            });
        }));


    })

</script>
<?php $this->end(); ?>
