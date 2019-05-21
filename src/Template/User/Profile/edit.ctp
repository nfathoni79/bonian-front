<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <div class="user-content">
                    <div class="user-content-header">
                        <h4>Edit Profil</h4>
                    </div>

                    <div class="user-content-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?= $this->Form->create($customer, [
                                    'url' => ['action' => 'edit', 'prefix' => 'user'],
                                    'templates' => 'app_form'
                                ]); ?>

                                <?= $this->Form->control('name', ['label' => 'Nama Lengkap', 'class' => 'form-control']); ?>
                                <?= $this->Form->control('dob', ['label' => 'Tanggal lahir', 'class' => 'form-control datetimepicker']); ?>
                                <?= $this->Form->control('gender', [
                                    'label' => 'Jenis kelamin',
                                    'type' => 'select',
                                    'empty' => '-',
                                    'options' => ['M' => 'Laki laki', 'F' => 'Perempuan'],
                                    'class' => 'form-control'
                                ]); ?>



                                <div class="form-group">
                                    <label></label>
                                    <button type="submit" class="btn btn-danger btn-radius">Simpan Perubahan</button>
                                </div>

                                <?= $this->Form->end(); ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->append('script'); ?>
<script>
    $('.datetimepicker').datetimepicker({
        minView: 2,
        format: 'YYYY-MM-DD',
        viewMode: 'years',
        autoclose: true,
        pickTime: false
    });
</script>
<?php $this->end(); ?>