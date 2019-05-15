<?php $this->append('style'); ?>
<?php
$this->Html->css([
'/css/custom/history.css',
], ['block' => true]);
?>
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

                    <div class="user-content-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="date" class="form-control" placeholder="Tanggal transaksi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="search" class="form-control"  placeholder="Cari Tansaksi">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-md btn-danger btn-radius"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-4">
                                <span class="label label-danger">Riwayat Pembelian</span>
                            </div>
                            <div class="col-md-8">
                                <div class=" pull-right">
                                    <span class="label label-danger">Semua</span>
                                    <span class="label label-default">Menunggu Pembayaran</span>
                                    <span class="label label-default">Di Proses</span>
                                    <span class="label label-default">Di Kirim</span>
                                    <span class="label label-default">Di Selesai</span>
                                    <span class="label label-default">Di Batalkan</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach($orders as $order) : ?>
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
                                                    <strong><?= date('d M Y H:i', strtotime($order['created'])); ?> WIB</strong>
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
                                                    <strong>Shipping origin :</strong> <?= $detail['branch']['name']; ?>
                                                </address>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <address>
                                                    <strong>Status : <?= $payment_status[$order['payment_status']]; ?></strong><br>
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