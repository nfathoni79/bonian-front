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
                        <h4><strong>Verifikasi Akun</strong></h4>
                        <?= $this->Flash->render();?>
                        <div class="zl-notif"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-condensed user-detail-info">
                                    <?php if($_profile['is_email_verified'] == false):?>
                                    <tr>
                                        <td>Email anda belum terverifikasi</td>
                                        <td><a href="javascript:void(0);" class="btn btn-danger btn-sm btn-radius verify-email">Kirim ulang verifikasi</a></td>
                                    </tr>
                                    <?php endif;?>
                                </table>
                            </div>
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
        $('.verify-email').on('click',function(){
            $.ajax({
                type:'POST',
                url: "<?= $this->Url->build(['action' => 'verifyEmail']);?>",
                data : {
                    _csrfToken: $('meta[name="_csrfToken"]').attr('content')
                },
                success:function(data){
                    $('.zl-notif').html('<div class="alert alert-success">Email berhasil di kirim, silahkan ikuti petunjuk aktivasi dari email anda.</div>');
                    $('.verify-email').hide();
                },
                error: function(data){
                    // $("#login-popup").modal('show');
                }
            });
        })
    });
</script>
<?php $this->end();?>