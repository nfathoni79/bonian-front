
<div class="render-alert"></div>

<div>
    Silahkan masukkan OTP yang telah dikirim ke email anda.
</div>

<?= $this->Form->create(null, [
    'url' => [
        'controller' => 'Login',
        'action' => 'showOtp',
        'prefix' => false
    ],
    'id' => 'forgot-password-form',
    'class' => 'ajax-helper'
]); ?>
<div class="form-group">
    <label for="input-email">OTP</label>
    <input type="text" name="otp" value="" placeholder="Verifikasi OTP" class="form-control" />
    <input type="hidden" name="session_id" />
</div>



<?= $this->Form->end(); ?>

<script>
    $('#forgot-password-form').submit(function(e) {
        e.preventDefault();
    })
</script>
