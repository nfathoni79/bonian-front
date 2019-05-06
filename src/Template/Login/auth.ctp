<!-- start: header part -->
<div class="c-header__bg" style="z-index:0;">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-home"></i></a></li>
                <li><a >Akun</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Login','action' => 'auth']); ?>">Otentikasi Login</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- end: header part -->

<div class="c-help-main mb-5">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-12 item-article">
                <div class="row box-1-about">
                    <div class="col-md-12 our-member">
                        <div class="title-pages title-about-us">
                            <h2>Otentikasi Login</h2>
                        </div>
                        <div class="col-sm-6 customer-login">
                            <div class="panel panel-danger">
                                <div class="panel-heading">Masuk ke akun anda</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label " for="input-email">E-Mail Address</label>
                                        <input type="text" name="email" value="" id="input-email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label " for="input-password">Password</label>
                                        <input type="password" name="password" value="" id="input-password" class="form-control">
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <input type="submit" value="Login" class="btn btn-default pull-right">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 new-customer">
                            <div class="well">
                                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
