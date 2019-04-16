<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <div class="user-content">
                    <div class="user-content-header">
                        <?= $this->element('Partials/Profile/navigation'); ?>
                    </div>
                    <div class="user-content-body">
                        <h4 style="margin-bottom: 30px;"><strong>Daftar kartu kredit saya</strong></h4>

                        <?php foreach($cards as $card): ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?= $this->Url->build('/images/logo_cc/' . $card['type'] . '.png'); ?>" width="60" />
                                </div>
                                <div class="col-md-6">
                                    <h4 style="margin-top: 20px;"><?= $card['mask']; ?></h4>
                                </div>
                                <div class="col-lg-3">
                                    <?php if($card['is_primary']):?>
                                        <button class="btn btn-danger btn-radius btn-md btn-block" style="margin-bottom: 10px;"><i class="fa fa-check-square-o"></i> Kartu kredit utama</button>
                                    <?php else:?>
                                        <button data-id="<?= $card['id']; ?>" class="btn btn-default btn-radius btn-md btn-block set-primary-cc-button" data-alias="<?= $card['mask'];?>" style="margin-bottom: 10px;"><i class="fa fa-square-o"></i> Set Kartu kredit utama</button>
                                        <a href="#" data-id="<?= $card['id']; ?>" class="pull-right delete-cc-button" data-alias="<?= $card['mask'];?>"><strong class=""><i class="fa fa-trash"></i> Hapus</strong></a>
                                    <?php endif;?>
                                </div>
                            </div>
                            <hr>

                        <?php endforeach; ?>

                        <?php if (!$cards) : ?>
                            <h4 style="text-align:center;">Anda Tidak Memiliki Kartu</h4>
                        <?php endif; ?>

                        <span>Anda dapat menyimpan kartu kredit / debit saat melakukan pembayaran </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php $this->append('script'); ?>
<script>
    $('.set-primary-cc-button').click(function() {
        var alias = $(this).data('alias');
        swal({
            title: 'Set nomor '+alias+' menjadi kartu utama?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((confirm) => {
            if (confirm) {
                $.ajax({
                    url: '<?= $this->Url->build(['controller' => 'Profile', 'action' => 'setPrimaryCc', 'prefix' => 'user']); ?>',
                    type : 'POST',
                    data : {
                        card_id : $(this).data('id'),
                        _csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'
                    },
                    dataType : 'json',
                    success: function(response){
                        if (response && response.status) {
                            location.href = '<?= $this->Url->build(['controller' => 'Profile', 'action' => 'payment', 'prefix' => 'user']); ?>';
                        }
                    }
                });
            }
        });
    });

    $('.delete-cc-button').click(function() {
        var alias = $(this).data('alias');
        swal({
            title: 'Apakah ingin hapus kartu kredit '+alias+' ini?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '<?= $this->Url->build(['controller' => 'Profile', 'action' => 'deleteCc', 'prefix' => 'user']); ?>',
                    type : 'POST',
                    data : {
                        card_id : $(this).data('id'),
                        _csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'
                    },
                    dataType : 'json',
                    success: function(response){
                        if (response && response.status) {
                            location.href = '<?= $this->Url->build(['controller' => 'Profile', 'action' => 'payment', 'prefix' => 'user']); ?>';
                        }
                    }
                });
            } else {
                swal('Data kartu kredit '+alias+' tidak jadi di hapus.');
            }
        });
    });




</script>
<?php $this->end();?>