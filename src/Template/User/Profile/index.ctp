<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <div class="user-content">
                    <div class="user-content-header">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#">Detail Profil</a></li>
                            <li><a href="<?= $this->Url->build([
                                    'controller' => 'Profile',
                                    'action' => 'address',
                                    'prefix' => 'user'
                                ]); ?>">Alamat</a></li>
                        </ul>
                    </div>

                    <div class="user-content-body">
                        <p>test</p>
                        <p>test</p>
                        <p>test</p>
                        <p>test</p>
                    </div>

                    <!--
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-detail-profile">Detail Profil</a></li>
                        <li><a data-toggle="tab" href="#tab-address">Alamat</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab-detail-profile" class="tab-pane fade in active">
                            <h3>HOME</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div id="tab-address" class="tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div>
                -->



            </div>
        </div>
    </div>
</div>