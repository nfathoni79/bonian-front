<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <?= $this->element('Partials/Profile/verification'); ?>
                <div class="user-content">
                    <div class="user-content-header">
                        <h4>Jaringan Anda</h4>
                    </div>

                    <div class="user-content-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-hover table-red" id="table-network">

                                 </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->Html->css([
'/css/datatable/dataTables.bootstrap.min.css',
], ['block' => true]);
$this->Html->script([
'/js/datatable/jquery.dataTables.min.js',
'/js/datatable/dataTables.bootstrap.min.js',
'/js/datatable/dataTables.treeGrid'
], ['block' => true]);
?>

<?php $this->append('script'); ?>
<script>
    // https://homfen.github.io/dataTables.treeGrid.js/arrays.txt?_=1552616209951
    var columns = [
        {
            title: '',
            target: 0,
            className: 'treegrid-control',
            data: function (item) {
                if (jQuery.isEmptyObject(item.children)) {
                    return '';
                }
                return '<span>+</span>';
            }
        },
        {
            title: 'Username',
            target: 1,
            data: function (item) {
                return item.customer ? item.customer.username : '-';
            }
        },
        {
            title: 'Sponsor',
            target: 2,
            data: function (item) {
                return item.refferal ? item.refferal.username : '-'; 
            }
        },
        {
            title: 'Level Kedalaman',
            target: 3,
            data: function (item) {
                return 'Level '+item.level;
            }
        },
        {
            title: 'Tanggal',
            target: 4,
            data: function (item) {
                return item.created;
            }
        },
    ];
    $('#table-network').DataTable({
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
        'columns': columns,
        ajax: {
            url: "<?= $this->Url->build(['action' => 'index']); ?>",
            data: {
                _csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'
            },
        },
        'treeGrid': {
            'left': 10,
            'expandIcon': '<span>+</span>',
            'collapseIcon': '<span>-</span>'
        }
    });
</script>
<?php $this->end(); ?>