
<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <div class="user-content">
                    <div class="user-content-header">
                        <?= $this->element('Partials/Profile/voucher-nav'); ?>
                    </div>

                    <div class="user-content-body">
                        <div class="row">
                            <?php
                                $colored = ['1' => 'v-colored-box', '2' => 'v-colored-box-off', '3' => 'v-colored-box-off'];
                                $texted = ['1' => 'label-danger', '2' => 'label-default', '3' => 'label-default'];
                                $end = ['1' => 'v-end', '2' => 'v-end-off', '3' => 'v-end-off'];
                            ?>
                            <?php foreach($voucher as $vals):?>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-body" style="padding:0px;">
                                        <div class="row">
                                            <div class="col-md-5 pull-left">
                                                <div class="<?php echo $colored[$this->request->getQuery('type')];?>">
                                                    <div class="v-text-discount">10%</div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 v-text-box pull-right">
                                                <div class="v-title"><?= $vals['voucher']['code_voucher'];?></div>
                                                Ekstra Diskon sebesar <?= $vals['voucher']['percent'];?>% dengan Max Rp <?php  echo $this->Number->precision($vals['voucher']['value'], 0);?>, tanpa Min Trx
                                                <div class="v-code"><span class="label <?php echo $texted[$this->request->getQuery('type')];?>">Kode: <?= $vals['voucher']['code_voucher'];?></span></div>
                                                <hr class="style3">
                                                <span class="<?php echo $end[$this->request->getQuery('type')];?>">Berakhir Dlm:
                                                    <?= $this->Time->timeAgoInWords($vals['expired'], [
                                            'accuracy' => ['month' => 'month'],
                                            'end' => '1 year'
                                            ]); ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
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
                                <nav aria-label="Page navigation" style="margin: 0 auto; text-align: right;">
                                    <ul class="pagination">
                                        <li>
                                            <a href="<?= $this->Url->build([
                                                'controller' => 'Voucher',
                                                'action' => 'index',
                                                'prefix' => 'user',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getFirstPage()])
                                            ]); ?>" aria-label="First">
                                                <span aria-hidden="true">First</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= $this->Url->build([
                                                'controller' => 'Voucher',
                                                'action' => 'index',
                                                'prefix' => 'user',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getPreviousPage()])
                                            ]); ?>" aria-label="Previous">
                                                <span aria-hidden="true">Previous</span>
                                            </a>
                                        </li>
                                        <?php while ($iterator->valid()): ?>
                                        <?php
                                                $isActive = $this->request->getQuery('page') == $iterator->current();
                                        ?>
                                        <li class="<?= $isActive ? 'active': ''; ?>">
                                            <a href="<?= $this->Url->build([
                                                    'controller' => 'Voucher',
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
                                                'controller' => 'Voucher',
                                                'action' => 'index',
                                                'prefix' => 'user',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getNextPage()])
                                            ]); ?>" aria-label="Next">
                                                <span aria-hidden="true">Next</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= $this->Url->build([
                                                'controller' => 'Voucher',
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
