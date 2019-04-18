<style>
    .title-panel p{
        margin : 0 0 0 0px;
    }
    .panel-heading{
        background:  #d9534f !important;
        color:  #ffffff !important;
    }

    .panel-footer{
        background:  #FFF6F6 !important;
    }

    hr.style3 {
        border-top: 1px dashed #8c8b8b;
        margin-top : 0px !important;
        margin-bottom : 0px !important;
    }
    address{
        margin-bottom: 5px !important;
    }
</style>
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
                                                    <p><?= date('d M Y H:i', strtotime($order['created'])); ?> WIB</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="title-panel pull-right">
                                                    <strong>Invoice Status : <?= isset($order['transactions'][0]) && isset($transaction_statuses[$order['transactions'][0]['transaction_status']]) ? $transaction_statuses[$order['transactions'][0]['transaction_status']] : 'Pending'; ?></strong>
                                                    <p>Dibayar pada : <?= isset($order['transactions'][0]) ? date('d M Y H:i', strtotime($order['transactions'][0]['modified'])) : '-'; ?> WIB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php foreach($order['order_details'] as $key => $detail) : ?>
                                        <div class="pull-left">
                                            <address>
                                                <strong>Order ID : <?= $detail['awb']; ?></strong><br>
                                                Shipping origin : <?= $detail['branch']['name']; ?>
                                            </address>
                                        </div>
                                        <div class="pull-right">
                                            <address>
                                                <strong>Rp. <?= $this->Number->format($detail['total']); ?></strong><br>
                                                Barang dikirim
                                            </address>
                                        </div>
                                        <div class="clearfix"></div>
                                        <?php if ($key >= 0 && $key < (count($order['order_details']) -1)  && count($order['order_details']) > 1) : ?>
                                            <hr class="style3">
                                        <?php endif; ?>
                                        <div class="clearfix"></div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="pull-left">
                                            <button class="btn btn-md btn-danger btn-radius">Rincian Pesanan</button>
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

<?php $this->append('script'); ?>

<?php $this->end(); ?>