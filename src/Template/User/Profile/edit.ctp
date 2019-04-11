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

                                <?= $this->Form->input('name', ['label' => 'Nama Lengkap', 'class' => 'form-control']); ?>
                                <?= $this->Form->input('dob', ['label' => 'Tanggal lahir', 'class' => 'form-control']); ?>
                                <?= $this->Form->input('gender', [
                                    'label' => 'Jenis kelamin',
                                    'type' => 'select',
                                    'empty' => '-',
                                    'options' => ['M' => 'Laki laki', 'F' => 'Perempuan'],
                                    'class' => 'form-control'
                                ]); ?>



                                <div class="form-group">
                                    <label></label>
                                    <button type="submit" class="btn btn-danger">Edit profil</button>
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