<?php if(($_profile['is_email_verified'] == false) || ($_profile['is_verified'] == '0')):?>
<div class="alert alert-danger">Akun anda belum terverifikasi, silakan melakukan verifikasi akun.
    <a
        href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'verification', 'prefix' => 'user']);?>"
        class="btn btn-danger btn-sm btn-radius"
    >Verifikasi Akun</a>
</div>
<?php endif;?>