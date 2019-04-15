<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <div class="user-content">
                    <div class="user-content-header">
                        <h4>Leaderboard</h4>
                    </div>

                    <div class="user-content-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="notif"></div>
                                <table id="table-leaderboard" class="table table-striped table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Jumlah Follower</th>
                                            <th>Last Active</th>
                                            <th>Follow</th>
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
        var datatable  = $('#table-leaderboard').DataTable({
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
                "url": "<?php echo $this->Url->build()?>"
            },

            "initComplete": function(settings, json) {
                var wrapper = $(settings.nTableWrapper);

                wrapper.find('select.form-control')
                    .removeClass('input-sm')
                    .addClass('input-md');
                wrapper
                    .find('input.form-control')
                    .removeClass('input-sm')
                    .addClass('input-md');

                $(".follows").click(function(){
                    var reffcode = $(this).data('reff');
                    $.ajax({
                      url: "<?php echo $this->Url->build(['action' => 'follow']);?>",
                      data: {
                        reffcode:reffcode,
                        _csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'
                      },
                      type: "POST",
                      success: function(json) {
                        if(json.status == "ERROR"){
                            $('.notif').html('<div class="alert alert-danger">'+json.message+'</div>');
                        }else{
                            $('.notif').html('<div class="alert alert-success">Follow sponsor berhasil.</div>');
                        }
                        setTimeout(function(){
                            location.href = '<?= $this->Url->build();?>';
                        }, 500);
                      }
                    });

                });
            },
            "columns": [
                { "data": "username" },
                { "data": "count" },
                { "data": "last_active" },
                { "data": "reffcode" },
            ],
            columnDefs: [

                {
                    targets: 0,
                    render: function (data, type, row, meta) {
                        return  row.username;
                    }
                },
                {
                    targets: 1,
                    render: function (data, type, row, meta) {
                        return  row.count;
                    }
                },
                {
                    targets: 2,
                    render: function (data, type, row, meta) {
                        return  row.last_active;
                    }
                },
                {
                    targets: 3,
                    render: function (data, type, row, meta) {
                        var status = "<?php echo $reff_cus_id;?>";
                        if(status != '0'){
                            return '';
                        }else{
                             return '<a class="btn btn-danger btn-radius btn-sm follows" data-reff="'+row.reffcode+'" href="javascript:void(0);"><span>Follow</span></a>';
                        }
                     }
                },
            ]
        });


    } );
</script>
<?php $this->end(); ?>