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
        var start = moment().subtract(29, 'days');
        var end = moment();

        // function cb(start, end) {
        //     $('#reportrange span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
            // alert('oke')
        // }

        $('#reportrange').daterangepicker({
            // startDate: start,
            // endDate: end,
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
        // cb(start, end)/;
    })
</script>
<?php $this->end(); ?>

<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <div class="user-content">
                    <div class="user-content-header">
                        <h4>Riwayat Pesanan </h4>
                    </div>
                    <?php
                        if(!empty($this->request->getQuery('start'))){
                            $dateFilter = $this->request->getQuery('start').' - '.$this->request->getQuery('end');
                        }
                        if(!empty($this->request->getQuery('search'))){
                            $search = $this->request->getQuery('search');
                        }
                    ?>
                    <div class="user-content-body">
                        <div class="row mg-b-20">
                            <div class="col-md-4">
                                <span class="">Status Pembayaran</span>
                            </div>
                            <?php
                                $params = $this->request->getQueryParams();
                            ?>
                            <div class="col-md-8">
                                <div class=" pull-right">
                                    <a href="<?= $this->Url->build(['?' => array_merge($params, ['status' => 'semua'])]); ?>" class="label label-default <?php echo $this->request->getQuery('status')  == 'semua' ? 'label-danger': '';?>">Semua</a>
                                    <a href="<?= $this->Url->build(['?' => array_merge($params, ['status' => 'pending'])]); ?>" class="label label-default <?php echo $this->request->getQuery('status') == 'pending' ? 'label-danger': '';?>">Menunggu Pembayaran</a>
                                    <a href="<?= $this->Url->build(['?' => array_merge($params, ['status' => 'success'])]); ?>" class="label label-default <?php echo $this->request->getQuery('status') == 'success' ? 'label-danger': '';?>">Sukses</a>
                                    <a href="<?= $this->Url->build(['?' => array_merge($params, ['status' => 'failed'])]); ?>" class="label label-default <?php echo $this->request->getQuery('status')  == 'failed' ? 'label-danger': '';?>">Gagal</a>
                                    <a href="<?= $this->Url->build(['?' => array_merge($params, ['status' => 'expired'])]); ?>" class="label label-default <?php echo $this->request->getQuery('status')  == 'expired' ? 'label-danger': '';?>">Kadaluarsa</a>
                                    <a href="<?= $this->Url->build(['?' => array_merge($params, ['status' => 'refunde'])]); ?>" class="label label-default <?php echo $this->request->getQuery('status')  == 'refunde' ? 'label-danger': '';?>">Refund</a>
                                    <a href="<?= $this->Url->build(['?' => array_merge($params, ['status' => 'cancel'])]); ?>" class="label label-default <?php echo $this->request->getQuery('status')  == 'cancel' ? 'label-danger': '';?>">Di Batalkan</a>
                                </div>
                            </div>
                        </div>
                        <div class="row mg-b-20">
                            <?php echo $this->Form->create(null, ['id' => 'filter']);?>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php echo $this->Form->control('datefilter', ['div' => false, 'label' => false, 'id' => 'reportrange', 'class' => 'form-control', 'value' => @$dateFilter, 'placeholder' => 'Tanggal Pencarian']);?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo $this->Form->control('invoice', ['div' => false, 'label' => false, 'placeholder' => 'Cari Invoice', 'value' => @$search, 'class' => 'form-control']);?>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-md btn-danger btn-radius"><i class="fa fa-search"></i></button>
                            </div>
                            <?php echo $this->Form->end();?>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach($orders as $order) : ?>
                                <?php if(!empty($order['order_digital'])):?>
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
                                                        <strong>Status Pembayaran : <?= $payment_status[$order['payment_status']]; ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            Produk digital
                                        </div>
                                        <div class="panel-footer">
                                            <div class="pull-left">
                                                <a href="<?= $this->Url->build(['action' => 'detail', $order['invoice'] ]);?>" class="btn btn-md btn-danger btn-radius">Rincian Pesanan</a>
                                            </div>
                                            <div class="pull-right">
                                                <strong>Total Tagihan Rp. <?= $this->Number->format($order['total']); ?></strong>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                <?php else:?>
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
                                                        <strong>Status Pembayaran : <?= $payment_status[$order['payment_status']]; ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <?php foreach($order['order_details'] as $key => $detail) : ?>
                                            <div class="row pd-10">
                                                <div class="col-md-6">
                                                    <address>
                                                        <strong>Order ID : <?= $order['invoice']; ?>-<?= $detail['id']; ?></strong><br>
                                                        <strong>Status Pengiriman: </strong> <?= @$shipping_status[$detail['order_shipping_details'][0]['status']] ? $shipping_status[$detail['order_shipping_details'][0]['status']] : '-'; ?>
                                                    </address>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <address>
                                                        <strong>Shipping origin :</strong> <?= $detail['branch']['name']; ?><br>
                                                        <strong>Shipping destination :</strong> <?= $order['address']; ?>, <?= $order['subdistrict']['name']; ?>, <?= $order['city']['name']; ?>, <?= $order['province']['name']; ?>
                                                    </address>
                                                </div>
                                            </div>
                                            <?php if ($key >= 0 && $key < (count($order['order_details']) -1)  && count($order['order_details']) > 1) : ?>
                                            <hr class="style3">
                                            <?php endif; ?>
                                            <div class="clearfix"></div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="pull-left">
                                                <a href="<?= $this->Url->build(['action' => 'detail', $order['invoice'] ]);?>" class="btn btn-md btn-danger btn-radius">Rincian Pesanan</a>
                                            </div>
                                            <div class="pull-right">
                                                <strong>Total Tagihan Rp. <?= $this->Number->format($order['total']); ?></strong>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                <?php endif;?>
                                <?php endforeach; ?>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if (isset($pagination) && $pagination instanceof \Pagination\Pagination) :
                                    //get indexes in page
                                    $indexes = $pagination->getIndexes(new \Pagination\StrategySimple(5));
                                $iterator = $indexes->getIterator();
                                if ($iterator->count() > 1) :
                                ?>
                                <nav aria-label="Page navigation" style="margin: 0 auto; text-align: center;">
                                    <ul class="pagination">
                                        <li>
                                            <a href="<?= $this->Url->build([
                                                'controller' => 'History',
                                                'action' => 'index',
                                                'prefix' => 'user',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getFirstPage()])
                                            ]); ?>" aria-label="First">
                                                <span aria-hidden="true">First</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= $this->Url->build([
                                                'controller' => 'History',
                                                'action' => 'index',
                                                'prefix' => 'user',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getPreviousPage()])
                                            ]); ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php while ($iterator->valid()): ?>
                                        <?php
                                                $isActive = $this->request->getQuery('page') == $iterator->current();
                                        ?>
                                        <li class="<?= $isActive ? 'active': ''; ?>">
                                            <a href="<?= $this->Url->build([
                                                    'controller' => 'History',
                                                    'action' => 'index',
                                                    'prefix' => 'user',
                                                    '?' => array_merge($this->request->getQuery(), ['page' => $iterator->current()])
                                                ]); ?>">
                                                <?php echo $iterator->current() ?>
                                            </a>
                                        </li>
                                        <?php $iterator->next(); endwhile; ?>
                                        <li>
                                            <a href="<?= $this->Url->build([
                                                'controller' => 'History',
                                                'action' => 'index',
                                                'prefix' => 'user',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getNextPage()])
                                            ]); ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= $this->Url->build([
                                                'controller' => 'History',
                                                'action' => 'index',
                                                'prefix' => 'user',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getLastPage()])
                                            ]); ?>" aria-label="Last">
                                                <span aria-hidden="true">Last</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
