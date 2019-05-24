
<div class="render-alert"></div>

<div>
    Silahkan masukkan password baru
</div>

<?= $this->Form->create(null, [
    'url' => [
        'controller' => 'Login',
        'action' => 'setPassword',
        'prefix' => false
    ],
    'id' => 'forgot-password-form',
    'class' => 'ajax-helper'
]); ?>

<div class="form-group">
    <label for="input-email">Password baru</label>
    <input type="password" name="password" value="" placeholder="Masukkan password baru" class="form-control" />
</div>

<div class="form-group">
    <label for="input-email">konfirmasi Password baru</label>
    <input type="password" name="repeat_password" value="" placeholder="Konfirmasi password baru" class="form-control" />
</div>

<input type="hidden" name="session_id" />

<?= $this->Form->end(); ?>

<script>
    $('#forgot-password-form').submit(function(e) {
        e.preventDefault();
    })
</script>
