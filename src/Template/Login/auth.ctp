<!-- start: header part -->
<!-- <div class="c-header__bg" style="z-index:0;">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-home"></i></a></li>
                <li><a >Akun</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Login','action' => 'auth']); ?>">Otentikasi Login</a></li>
            </ul>
        </div>
    </div>
</div> -->

<!-- end: header part -->

<div class="c-help-main mb-5 bg-login">
    <div class="auth-container tx-center mg-l-auto mg-r-auto mg-t-100">
        <img src="/zolaku-front/images/png/logo/logo-wide.png" alt="Zolaku" width="155" class="mg-b-50">
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
                            <div style="width: 100%; height: 13px; border-bottom: 1px solid #d1d1d1; text-align: center; margin: 25px auto;">
                                  <span style="font-size: 13px; background-color: #ffffff; padding: 0 10px;">
                                    Atau masuk dengan
                                  </span>
                            </div>
                            <div class="row social-media-button">
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-block google" href="/zolaku-front/oauth?provider=google&amp;redirect_url=%2Fzolaku-front%2F">
                                        <img src="/zolaku-front/images/png/logo-media-social/google.png"> Google
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-block facebook login-with-facebook" href="/zolaku-front/oauth?provider=facebook&amp;redirect_url=%2Fzolaku-front%2F">
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
