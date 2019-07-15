
<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <?= $this->element('Partials/Profile/verification'); ?>
                <div class="user-content">
                    <div class="user-content-header">
                        <h4>Leaderboard</h4>
                    </div>

                    <div class="user-content-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Anda tidak dapat melakukan follow, apabila refferal akun anda sudah terdaftar ke jaringan.
                                </div>

                                <div class="row">
                                    <?php echo $this->Form->create(null, ['id' => 'filter', 'type' => 'get']);?>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('search', ['div' => false, 'label' => false,  'value' => @$this->request->getQuery('search'),'class' => 'form-control', 'placeholder' => 'Username, Nama Depan, Nama Belakang, Kode Refferal ...']);?>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-md btn-danger btn-radius"><i class="fa fa-search"></i></button>
                                    </div>
                                    <?php echo $this->Form->end();?>
                                </div>

                                <table id="table-leaderboard" class="table table-striped table-hover table-red" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Kode Refferal</th>
                                            <th>Jumlah Follower</th>
                                            <th>Follow</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($leaderboard as $val):?>
                                        <tr>
                                            <td><?= $val['username']; ?></td>
                                            <td><?= $val['full_name']; ?></td>
                                            <td><?= $val['reffcode']; ?></td>
                                            <td><?= $val['total']; ?></td>
                                            <?php if($val['id'] != $reff_cus_id):?>
                                                <?php if($reff_cus_id == 0):?>
                                                    <td><a class="btn btn-danger btn-radius btn-sm btn-confirm"  href="javascript:void(0);" data-reffcode="<?= $val['reffcode'];?>" data-username="<?= $val['username'];?>"><span>Follow</span></a></td>
                                                <?php else:?>
                                                    <td>-</td>
                                                <?php endif;?>
                                            <?php else:?>
                                                <td>-</td>
                                            <?php endif;?>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>

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
                                                'controller' => 'Leaderboard',
                                                'action' => 'index',
                                                'prefix' => 'user',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getFirstPage()])
                                            ]); ?>" aria-label="First">
                                                <span aria-hidden="true">First</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= $this->Url->build([
                                                'controller' => 'Leaderboard',
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
                                                    'controller' => 'Leaderboard',
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
                                                'controller' => 'Leaderboard',
                                                'action' => 'index',
                                                'prefix' => 'user',
                                                '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getNextPage()])
                                            ]); ?>" aria-label="Next">
                                                <span aria-hidden="true">Next</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= $this->Url->build([
                                                'controller' => 'Leaderboard',
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
<script>
    $(document).ready(function(){
        $('.btn-confirm').on('click',function(){
            var reffcode = $(this).data('reffcode');
            var username = $(this).data('username');
            swal({
                title: 'Apakah ingin melakakukan follow refferal '+username+' dengan kode '+reffcode+'?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((ok) => {
                if (ok) {
                    $.ajax({
                        url: "<?php echo $this->Url->build(['action' => 'follow']);?>",
                        type: "post",
                        data: {
                            reffcode : reffcode,
                            _csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'
                        } ,
                        success: function (response) {
                            if(response.is_error){
                                swal({
                                    title: "Gagal melakukan follow",
                                    text: response.message,
                                    icon: "error",
                                });
                            }else{
                                swal({
                                    title: "Follow berhasil",
                                    text: 'Registered sponsor '+username+'berhasil.',
                                    icon: "success",
                                });
                                setTimeout(function(){ location.reload(); }, 800);
                            }
                            return false;

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }

                    });
                }
            });
        });
    }) ;
</script>
<?php $this->end(); ?>