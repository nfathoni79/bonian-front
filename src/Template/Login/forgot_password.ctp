
<div class="render-alert"></div>

<div>
    Masukkan alamat email  yang terdaftar di Zolaku
</div>

<?= $this->Form->create(null, [
    'url' => [
        'controller' => 'Login',
        'action' => 'forgotPassword',
        'prefix' => false
    ],
    'id' => 'forgot-password-form',
    'class' => 'ajax-helper'
]); ?>
<div class="form-group">
    <label for="input-email">Email</label>
    <input type="text" name="email" value="" placeholder="Masukkan email anda" class="form-control" />
</div>



<?= $this->Form->end(); ?>

<script>
    $('#forgot-password-form').submit(function(e) {
        e.preventDefault();
    })
</script>
