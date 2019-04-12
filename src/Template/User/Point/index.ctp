<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <div class="user-content">
                    <div class="user-content-header">
                        <h4>Mutasi Point</h4>
                    </div>

                    <div class="user-content-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="table-point" class="table table-striped table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kategori Mutasi</th>
                                            <th>Tipe</th>
                                            <th>Deksripsi</th>
                                            <th>Nilai</th>
                                            <th>Saldo Point</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->append('script'); ?>

<?php
$this->Html->css([
'/css/datatable/dataTables.bootstrap.min.css',
], ['block' => true]);
$this->Html->script([
'/js/datatable/jquery.dataTables.min.js',
'/js/datatable/dataTables.bootstrap.min.js'
], ['block' => true]);
?>
<script>

    $(document).ready(function() {
        var datatable  = $('#table-point').DataTable({
            "initComplete": function(settings, json) {
                var wrapper = $(settings.nTableWrapper);

                wrapper.find('select.form-control')
                    .removeClass('input-sm')
                    .addClass('input-md');
                wrapper
                    .find('input.form-control')
                    .removeClass('input-sm')
                    .addClass('input-md');
            },
            "ajax": {
                "url": "<?php echo $this->Url->build()?>",
                "dataSrc": ""
            },
            "columns": [
                { "data": "created" },
                { "data": "kategori" },
                { "data": "tipe" },
                { "data": "description" },
                { "data": "amount" },
                { "data": "balance" },
            ],
            columnDefs: [
                {
                    targets: 4,
                    render: function (data, type, row, meta) {
                        return  parseInt(row.amount).format(0, 3, '.', ',');
                    }
                },
                {
                    targets: 5,
                    render: function (data, type, row, meta) {
                        return  parseInt(row.balance).format(0, 3, '.', ',');
                    }
                },
            ]
        });


    } );
</script>
<?php $this->end(); ?>