
<div class="c-help-main mb-5 bg-login">
    <div class="auth-container tx-center mg-l-auto mg-r-auto mg-t-100">
        <a href="<?= $this->Url->build('/');?>"><img src="<?= $this->Url->build('/images/png/logo/logo-wide.png');?>" alt="Zolaku" width="155" class="mg-b-50"></a>
    </div>

    <div class="auth-container container mg-t-0-force pd-b-0-force">
        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="row box-1-about">
                    <div class="col-md-12">
                        <div class="title-pages zl-bg-none mg-t-10-force mg-b-10-force">
                            <div class="row">
                                <h2 class="zl-tx-black-force tx-bold">Login</h2>
                            </div>
                        </div>
                        <hr class="title-line">
                        <div class="col-sm-12 customer-login login-popup w-500">
                            <?= $this->Flash->render();?>
                            <?= $this->Form->create(null, [
                            'url' => [
                            'controller' => 'Login',
                            'action' => 'index',
                            'prefix' => false
                            ],
                            'id' => 'login-forms',
                            'class' => 'ajax-helper'
                            ]); ?>
                            <div class="pd-10 row">
                                <div class="form-group">
                                    <label class="control-label " for="input-email">Nomor Ponsel atau Email</label>
                                    <input type="text" name="email" value="" id="input-email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label " for="input-password">Password</label>
                                    <input type="password" name="password" value="" id="input-password" class="form-control">
                                </div>
                            </div>                            
                            <div class="pd-10 row">
                                <div class="form-group">
                                    <label></label>
                                    <button type="submit" class="btn btn-default zl-btn-default wd-100p">Masuk</button>
                                </div>
                            </div>
                            <?= $this->Form->end(); ?>
                            <div style="width: 100%; height: 13px; border-bottom: 1px solid #d1d1d1; text-align: center; margin: 25px auto;">
                                  <span style="font-size: 13px; background-color: #ffffff; padding: 0 10px;">
                                    Atau masuk dengan
                                  </span>
                            </div>
                            <div class="row social-media-button">
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-block google" href="<?= $this->Url->build(['controller' => 'Oauth', 'prefix' => false, '?' => ['provider' => 'google', 'redirect_url' => $this->Url->build()]]); ?>">
                                        <img src="<?= $this->Url->build('/images/png/logo-media-social/google.png'); ?>" /> Google
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-block facebook login-with-facebook" href="<?= $this->Url->build(['controller' => 'Oauth', 'prefix' => false, '?' => ['provider' => 'facebook', 'redirect_url' => $this->Url->build()]]); ?>">
                                        Facebook
                                    </a>
                                </div>
                            </div>  
                            <div class="text-center forgot-password-text">
                                <a>Lupa Password?</a>
                            </div>
                            <div class="modal-footer bottom-fix">
                                Belum memiliki akun zolaku? <a data-toggle="modal" data-target="#modal-register" data-dismiss="modal">Daftar Sekarang</a>
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
    $(document).ready(function() {

        //login-form
        var formEl = $("#login-forms");
        formEl.submit(function(e) {
            var ajaxRequest = new ajaxValidation(formEl);
            ajaxRequest.post(formEl.attr('action'), formEl.find(':input'), function(response, data) {
                if (response.success) {
                    location.href = "<?= $this->Url->build(['controller' => 'home', 'action' => 'index']); ?>";
                } else {
                    location.reload();
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>
<?php $this->end();