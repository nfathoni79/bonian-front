<?php $this->append('style'); ?>
<?php
$this->Html->css([
'/css/custom/history.css',
'/css/daterangepicker/daterangepicker.css',
], ['block' => true]); ?>
<?php $this->end(); ?>

<?php $this->append('script'); ?>
<?php
$this->Html->script([
'/js/daterangepicker/daterangepicker.min.js',
], ['block' => true]);
?>
<script>
    $(document).ready(function () {
        $('#reportrange').daterangepicker({
            autoUpdateInput: false,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            locale : {
                format: 'DD-MM-YYYY'
            }
        });

        $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
        });
    })
</script>
<?php $this->end(); ?>

<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <?= $this->element('Partials/Profile/verification'); ?>
                <div class="user-content">
                    <div class="user-content-header">
                        <?= $this->element('Partials/Review/navigation'); ?>
                    </div>

                    <?php
                        if(!empty($this->request->getQuery('start'))){
                    $dateFilter = $this->request->getQuery('start').' - '.$this->request->getQuery('end');
                    }
                    if(!empty($this->request->getQuery('search'))){
                    $search = $this->request->getQuery('search');
                    }
                    ?>
                    <?php
                        $params = $this->request->getQueryParams();
                    if (isset($params['page'])) {
                    unset($params['page']);
                    }
                    ?>
                    <div class="user-content-body">
                        <?php echo $this->Form->create(null, ['id' => 'filter']);?>
                        <div class="row mg-b-20">
                            <div class="col-md-4">
                                <?php echo $this->Form->control('datefilter', ['div' => false, 'label' => false, 'id' => 'reportrange', 'class' => 'form-control', 'value' => @$dateFilter, 'placeholder' => 'Tanggal Pencarian']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo $this->Form->control('invoice', ['div' => false, 'label' => false, 'placeholder' => 'Cari Invoice', 'value' => @$search, 'class' => 'form-control']);?>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-md btn-danger btn-radius"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <?php echo $this->Form->end();?>

                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach($orders as $order) : ?>
                                <?php if(!empty($order['product_ratings'])): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="title-panel pull-left">
                                                    <strong>Invoice No. <?= $order['invoice']; ?></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="title-panel pull-right">
                                                    <strong>Tanggal Order: <?= date('d M Y, H : i',strtotime($order['created'])); ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row pd-10">
                                            <div class="col-md-5">
                                                <dl class="dl-horizontal">
                                                    <dt>Nama Penerima</dt>
                                                    <dd><?= $order['recipient_name']; ?></dd>
                                                    <dt>Nomor Telpon</dt>
                                                    <dd><?= $order['recipient_phone']; ?></dd>
                                                    <dt>Shipping destination</dt>
                                                    <dd><?= $order['address']; ?>, <?= $order['subdistrict']['name']; ?>, <?= $order['city']['name']; ?>, <?= $order['province']['name']; ?></dd>
                                                </dl>
                                            </div>
                                            <div class="col-md-7">
                                                <div style="height:200px; position: relative;">
                                                    <div style="height:100%;max-height: 100%;overflow-y: auto;overflow-x: hidden; ">
                                                        <?php foreach($order['product_ratings'] as $value):?>
                                                        <div class="row mg-b-15">
                                                            <div class="col-md-3">
                                                                <?php foreach($value['product']['images'] as $image):?>
                                                                <img class="img-responsive" src="<?= $this->Url->build($_basePath . 'images/250x250/' . $image); ?>" >
                                                                <?php break;?>
                                                                <?php endforeach;?>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div><?php echo $value['product']['name'];?></div>
                                                                <?php if($value['status'] == 0):?>
                                                                <small>Belum Diulas</small>
                                                                <div><a href="<?php echo $this->Url->build(['controller' => 'Review', 'action' => 'add', $value['order_id'], $value['id']]);?>" class="btn btn-sm btn-danger btn-radius"> Tulis Ulasan</a></div>
                                                                <?php else:?>
                                                                <div class="caption">
                                                                    <div class="rate-history">
                                                                        <div class="ratings">
                                                                            <div class="rating-box">
                                                                                <?php
                                                                                        $rate = (int) $value['rating'];
                                                                                        for ($x = 0; $x < $rate; $x++) {
                                                                                            echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>';
                                                                                }
                                                                                for ($x = 0; $x < 5-$rate; $x++) {
                                                                                echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>';
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div><a href="<?php echo $this->Url->build(['controller' => 'Review', 'action' => 'view', $value['order_id'], $value['id']]);?>" class="btn btn-sm btn-danger btn-radius"> Lihat Ulasan</a></div>
                                                                <?php endif;?>
                                                            </div>
                                                        </div>
                                                        <?php endforeach;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <?php endif;?>
                                <?php endforeach;?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>