<div class="container">
    <div class="block block_0">
        <div class="row">

            <?= $this->element('Partials/User/menu'); ?>

            <div id="content" class="col-md-9 col-sm-8">
                <div class="user-content overflow-hidden">

                    <div class="user-content-header">
                        <h4 class="tx-bold"><i class="fas fa-bell mg-r-10"></i><?= $notification_title; ?> </h4>
                    </div>

                    <div class="user-content-body pd-t-0-force pd-b-0-force">
                        <?php if ($notifications) : ?>
                        <ul class="row notif-list">
                            <?php foreach($notifications as $val) :?>
                            <li class="col-sm-12 pd-15 bd-b lh-base zl-hover notif-item">
                                <div class="col-sm-1 pd-0"><img src="https://via.placeholder.com/150x150.png"></div>
                                <div class="col-sm-9 pd-t-5 pd-b-5">
                                    <h2 class="tx-bold tx-14 mg-t-0"><?= $val['title']; ?></h2>
                                    <p class="tx-12 mg-0"><?= $val['message']; ?></p>
                                </div>
                                <div class="col-sm-2 pd-r-0 lh-5x">
                                    <button class="btn zl-btn-default wd-100p zl-btn-hover-white br-5">Lihat Detail</button>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php else : ?>
                            <div style="text-align: center; padding: 15px;">
                                Tidak ada notifikasi pada kategori ini
                            </div>
                        <?php endif; ?>

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
                                                        'controller' => 'Notification',
                                                        'action' => 'index',
                                                        'prefix' => 'user',
                                                        '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getFirstPage()])
                                                    ] + $this->request->getParam('pass')); ?>" aria-label="First">
                                                        <span aria-hidden="true">First</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= $this->Url->build([
                                                        'controller' => 'Notification',
                                                        'action' => 'index',
                                                        'prefix' => 'user',
                                                        $this->request->getParam('pass.0'),
                                                        '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getPreviousPage()])
                                                    ] + $this->request->getParam('pass')); ?>" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <?php while ($iterator->valid()): ?>
                                                    <?php
                                                    $isActive = $this->request->getQuery('page') == $iterator->current();
                                                    ?>
                                                    <li class="<?= $isActive ? 'active': ''; ?>">
                                                        <a href="<?= $this->Url->build([
                                                            'controller' => 'Notification',
                                                            'action' => 'index',
                                                            'prefix' => 'user',
                                                            '?' => array_merge($this->request->getQuery(), ['page' => $iterator->current()])
                                                        ] + $this->request->getParam('pass')); ?>">
                                                            <?php echo $iterator->current() ?>
                                                        </a>
                                                    </li>
                                                    <?php $iterator->next(); endwhile; ?>
                                                <li>
                                                    <a href="<?= $this->Url->build([
                                                        'controller' => 'Notification',
                                                        'action' => 'index',
                                                        'prefix' => 'user',
                                                        '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getNextPage()])
                                                    ] + $this->request->getParam('pass')); ?>" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= $this->Url->build([
                                                        'controller' => 'Notification',
                                                        'action' => 'index',
                                                        'prefix' => 'user',
                                                        '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getLastPage()])
                                                    ] + $this->request->getParam('pass')); ?>" aria-label="Last">
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