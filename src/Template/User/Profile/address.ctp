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
                        <h4><strong>Daftar Alamat</strong></h4>
                        <?php foreach($address as $val):?>
                        <div class="row">
                            <div class="col-lg-2"><strong><?= ucfirst($val['title']);?></strong></div>
                            <div class="col-lg-4">
                                <strong><?= ucfirst($val['recipient_name']);?></strong>
                                <p><?= $val['address'];?>, <?= $val['subdistrict']['name'];?>, <?= $val['city']['type'];?> <?= $val['city']['name'];?>, <?= $val['province']['name'];?> <?= $val['postal_code'];?></p>
                                <p><?= $val['recipient_phone'];?></p>

                            </div>
                            <div class="col-lg-3 text-center"><a href="#"><strong class="" style="color:#a94442;"><i class="fa fa-map-marker"></i> Edit Koordinat</strong></a></div>
                            <div class="col-lg-3">
                                <?php if($val['is_primary']):?>
                                    <button class="btn btn-danger btn-radius btn-md btn-block" style="margin-bottom: 10px;"><i class="fa fa-check-square-o"></i> Alamat utama</button>
                                    <a href="#" class="pull-left"><strong class=""><i class="fa fa-edit"></i> Edit</strong></a>
                                <?php else:?>
                                    <button data-id="<?= $val['id']; ?>" class="btn btn-default btn-radius btn-md btn-block set-primary-address-button" style="margin-bottom: 10px;"><i class="fa fa-square-o"></i> Set alamat utama</button>
                                    <a href="#" class="pull-left"><strong class=""><i class="fa fa-edit"></i> Edit</strong></a>
                                    <a href="#" data-id="<?= $val['id']; ?>" class="pull-right delete-address-button"><strong class=""><i class="fa fa-trash"></i> Hapus</strong></a>
                                <?php endif;?>
                            </div>
                        </div>
                        <hr>
                        <?php endforeach;?>
                        <div>
                            <a class="btn btn-danger btn-radius" data-toggle="modal" data-target="#address-modal">Tambah Alamat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal login -->
<!-- Modal -->
<div class="modal fade" id="address-modal" tabindex="-1" role="dialog" aria-labelledby="login-popupLabel">
    <div class="modal-dialog modal-md address-modal" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d9534f;color: #ffffff;border-top-left-radius:6px;border-top-right-radius:6px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span></button>
                <h4 class="modal-title" id="login-popupLabel" style="text-align: left;">Tambah alamat baru</h4>
            </div>
            <?= $this->Form->create(null, [
                'url' => [
                    'controller' => 'Profile',
                    'action' => 'addAddress',
                    'prefix' => 'user'
                ],
                'id' => 'form-address',
                'class' => 'ajax-helper_'
            ]); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="input-title">Nama alamat</label>
                            <input type="text" name="title" value="" placeholder="Input nama alamat" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="input-recipient-phone">Nomot Telepon</label>
                            <input type="text" name="recipient_phone" value="" placeholder="Telepon penerima barang" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="input-recipient-name">Nama penerima</label>
                            <input type="text" name="recipient_name" value="" placeholder="Nama penerima barang" class="form-control" />
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->control('province_id', ['type' => 'select', 'class' => 'form-control', 'label' => 'Provinsi', 'div' => false, 'options' => $province, 'empty' => 'Pilih Provinsi'])?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->control('subdistrict_id', ['type' => 'select', 'class' => 'form-control', 'label' => 'Kecamatan', 'div' => false, 'options' => [], 'empty' => 'Pilih Kecamatan'])?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->control('city_id', ['type' => 'select', 'class' => 'form-control', 'label' => 'Kota / Kabupaten', 'div' => false, 'options' => [], 'empty' => 'Pilih Kota / Kabupaten'])?>
                        </div>
                        <div class="form-group">
                            <label for="input-postal-code">Kode Pos</label>
                            <input type="text" name="postal_code" value="" placeholder="Input kode pos" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo $this->Form->control('address', ['type' => 'textarea', 'class' => 'form-control', 'label' => 'Alamat lengkap', 'div' => false,'placeholder' => 'Alamat lengkap penerima'])?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-radius btn-md pull-left"><i class="fa fa-save"></i> Simpan alamat</button>
            </div>
            <?= $this->Form->end(); ?>

        </div>
    </div>
</div>
<!-- end modal login -->


<?php $this->append('script'); ?>
<script>
    $(document).ready(function(){

        $('#province-id').on('change',function(){
            var selected = $(this).val();
            var url = "<?php echo $this->Url->build(['action' => 'getCity','prefix' => 'user']);?>/";
            var title = 'Kota / Kabupaten';
            drawTo('#city-id', selected,url,title);
        });

        $('#city-id').on('change',function(){
            var selected = $(this).val();
            var url = "<?php echo $this->Url->build(['action' => 'getDistrict','prefix' => 'user']);?>/";
            var title = 'Kecamatan';
            drawTo('#subdistrict-id', selected,url,title);
        });


        $('.delete-address-button').click(function() {
            swal({
                title: "Apakah ingin hapus alamat ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    location.href = '<?= $this->Url->build(['action' => 'deleteAddress']); ?>/' + $(this).data('id');
                } else {
                    swal("Data alamat tidak jadi di hapus.");
                }
            });
        });

        $('.set-primary-address-button').click(function() {
            if (confirm('Set alamat ini menjadi utama?')) {
                location.href = '<?= $this->Url->build(['action' => 'setPrimaryAddress']); ?>/' + $(this).data('id');
            }
        });

        function drawTo(target, selected, url, title){
            /* make ajax request */
            $.ajax({
                url: url,
                type : 'POST',
                data : {
                    id : selected,
                    _csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'
                },
                dataType : 'json',
                success: function(response){
                    var options = '';
                    options += '<option value="">Pilih '+title+'</option>';
                    $.each(response,function(k,v){
                        options += '<option value="'+k+'">'+v+'</option>';
                    })
                    $(target).html(options);
                }
            });
        }

        //login-form
        var formEl = $("#form-address");
        formEl.submit(function(e) {
            var ajaxRequest = new ajaxValidation(formEl);
            ajaxRequest.post(formEl.attr('action'), formEl.find(':input'), function(response, data) {
                if (response.success) {
                    location.href = '<?= $this->Url->build(); ?>';
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    })
</script>
<?php $this->end();?>