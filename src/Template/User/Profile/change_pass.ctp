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
                        <h4><strong>Ubah Kata Sandi</strong></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="notif-change"></div>
                                <?= $this->Form->create($customer, [
                                'url' => ['action' => 'changePassword', 'prefix' => 'user'],
                                'id' => 'form-change-password',
                                'templates' => 'app_form'
                                ]); ?>

                                <?= $this->Form->control('current_password', ['type' => 'password','label' => 'Password Lama', 'class' => 'form-control']); ?>
                                <?= $this->Form->control('password', ['type' => 'password','label' => 'Password Baru', 'class' => 'form-control']); ?>
                                <?= $this->Form->control('repeat_password', ['type' => 'password','label' => 'Password Baru (ulangi)', 'class' => 'form-control']); ?>

                                <div class="form-group">
                                    <label></label>
                                    <button type="submit" class="btn btn-danger btn-radius">Ganti Password</button>
                                </div>

                                <?= $this->Form->end(); ?>

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
        var formPassword = $("#form-change-password");
        formPassword.submit(function(e) {
            var ajaxRequest = new ajaxValidation(formPassword);
            ajaxRequest.post(formPassword.attr('action'), formPassword.find(':input'), function(response, data) {
                if (response.success) {
                    $('.notif-change').html('<div class="alert alert-success">Password anda berhasil diganti dengan password baru, silahkan melakukan re-login kembali ke akun anda.</div>')
                    // location.href = '<?= $this->Url->build(); ?>';
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>
<?php $this->end();?>