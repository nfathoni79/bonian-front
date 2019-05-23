<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <?= $this->element('Partials/Profile/verification'); ?>
                <div class="user-content">
                    <div class="user-content-header">
                        <h4>Ubah Nomor Handphone</h4>
                    </div>

                    <div class="user-content-body">

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="col-sm-12 list-unstyled multi-steps">
                                    <?php
                                        $wizard = [
                                                '1' => 'Verifikasi Password',
                                                '2' => 'Input Nomor Baru',
                                                '3' => 'Konfirmasi OTP',
                                                '4' => 'Selesai',
                                        ];
                                    foreach($wizard as $key => $val) {
                                        $class = '';
                                        if ($this->request->getQuery('step', '1') == $key) {
                                            $class = ' class="is-active"';
                                        }
                                        echo '<li'.$class.'>'.$val.'</li>';
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>

                        <?= $this->Form->create($customer, [
                            'url' => ['action' => 'changePhone', 'prefix' => 'user', '?' => ['step' => $this->request->getQuery('step')]],
                            'id' => 'form-change-password',
                            'templates' => 'app_form'
                        ]); ?>
                        <div class="row">

                        <?php if ($this->request->getQuery('step', '1') == 1) : ?>
                            <div class="col-md-12">
                                <div class="mg-b-15 mg-t-15">
                                    Untuk melindungi akun anda, silahkan masukkan password anda
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="notif-change"></div>

                                <?= $this->Form->control('password', ['type' => 'password','label' => 'Password', 'class' => 'form-control']); ?>

                                <div class="form-group">
                                    <label></label>
                                    <button type="submit" class="btn btn-danger btn-radius">Lanjut</button>
                                </div>

                            </div>
                        <?php elseif ($this->request->getQuery('step', '1') == 2) : ?>
                            <div class="col-md-12">
                                <div class="mg-b-15 mg-t-15">
                                    silahkan masukkan / lengkapi data yang berisi * (asterisk) pada kolom No handphone lama, <br/> dan masukkan nomor handphone baru yang akan diganti
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="notif-change"></div>

                                <?= $this->Form->control('old_phone', ['type' => 'text','label' => 'No handphone lama', 'class' => 'form-control']); ?>
                                <?= $this->Form->control('phone', ['type' => 'text','label' => 'No handphone baru', 'class' => 'form-control']); ?>

                                <div class="form-group">
                                    <label></label>
                                    <button type="submit" class="btn btn-danger btn-radius">Lanjut</button>
                                </div>

                            </div>
                        <?php elseif ($this->request->getQuery('step', '1') == 3) : ?>
                            <div class="col-md-12">
                                <div class="mg-b-15 mg-t-15">
                                    Silahkan masukkan kode OTP yang telah dikirimkan ke nomor handphone anda.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="notif-change"></div>

                                <?= $this->Form->control('otp', ['type' => 'text','label' => 'OTP', 'class' => 'form-control']); ?>

                                <div class="form-group">
                                    <label></label>
                                    <button type="submit" class="btn btn-danger btn-radius">Lanjut</button>
                                </div>

                            </div>
                        <?php elseif ($this->request->getQuery('step', '1') == 4) : ?>

                            <div class="col-md-12">
                                <div class="notif-change"></div>
                                <div class="text-center mg-t-25">
                                    Proses perubahan nomor handphone berhasil.
                                </div>
                            </div>
                        <?php endif; ?>


                        </div>
                        <?= $this->Form->end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
