<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <div class="user-content">
                    <div class="user-content-header">
                        <h4>Wishlist </h4>
                    </div>

                    <div class="user-content-body">

                        <div class="wishlist row nopadding-xs so-filter-gird">
                        <?php foreach($wishlists as $wishlist) : ?>


                            <!-- start: item Produk -->
                            <div class="product-layout col-lg-3 col-md-4 col-sm-4 col-xxs-6 col-xs-12">
                                <div class="product-item-container">
                                    <div class="left-block left-b">
                                        <div class="product-image-container">
                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $wishlist['product']['slug']]); ?>" title="<?= h($wishlist['product']['name']); ?>" target="_self">
                                                <?php foreach($wishlist['product']['images'] as $image) : ?>
                                                    <img src="<?= $this->Url->build($_basePath . 'images/213x150/' . $image); ?>"  class="img-responsive" alt="image">
                                                    <?php break; endforeach; ?>
                                            </a>
                                            <button class="btn-wishlist active" data-id="<?= $wishlist['id']; ?>" data-product-id="<?= $wishlist['product']['id']; ?>" data-toggle="tooltip" data-placement="top" title="Sudah dalam wishlist"><i class="fa fa-heart"></i></button>
                                        </div>


                                    </div>
                                    <div class="right-block right-b">

                                        <div class="caption">
                                            <h4>
                                                <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $wishlist['product']['slug']]); ?>" title="<?= h($wishlist['product']['name']); ?>" target="_self">
                                                    <?php echo $this->Text->truncate(
                                                        h($wishlist['product']['name']),
                                                        25,
                                                        [
                                                            'ellipsis' => '...',
                                                            'exact' => false
                                                        ]
                                                    );?>
                                                </a>
                                            </h4>
                                            <div class="rate-history">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <?php
                                                        $rate = (int) $wishlist['product']['rating'];
                                                        for ($x = 0; $x < $rate; $x++) {
                                                            echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>';
                                                        }
                                                        for ($x = 0; $x < 5-$rate; $x++) {
                                                            echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>';
                                                        }
                                                        ?>

                                                    </div>
                                                    <a class="rating-num" href="#" target="_blank">(<?= $wishlist['product']['rating_count']; ?>)</a>
                                                </div>
                                                <!-- <div class="order-num">Orders (0)</div> -->
                                            </div>
                                            <div class="price">
                                                <span class="price-new">Rp. <?= $this->Number->format($wishlist['product']['price_sale']); ?></span>
                                                <?php if($wishlist['product']['price_sale'] != $wishlist['product']['price']):?>
                                                    <span class="price-old">Rp. <?= $this->Number->format($wishlist['product']['price']); ?></span>
                                                <?php endif;?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: item produk -->
                            <?php endforeach; ?>


                        </div>


                        <!-- start pagination -->
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
                                                    'controller' => $this->request->getParam('controller'),
                                                    'action' => $this->request->getParam('action'),
                                                    'prefix' => 'user',
                                                    '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getFirstPage()])
                                                ]); ?>" aria-label="First">
                                                    <span aria-hidden="true">First</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->Url->build([
                                                    'controller' => $this->request->getParam('controller'),
                                                    'action' => $this->request->getParam('action'),
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
                                                        'controller' => $this->request->getParam('controller'),
                                                        'action' => $this->request->getParam('action'),
                                                        'prefix' => 'user',
                                                        '?' => array_merge($this->request->getQuery(), ['page' => $iterator->current()])
                                                    ]); ?>">
                                                        <?php echo $iterator->current() ?>
                                                    </a>
                                                </li>
                                                <?php $iterator->next(); endwhile; ?>
                                            <li>
                                                <a href="<?= $this->Url->build([
                                                    'controller' => $this->request->getParam('controller'),
                                                    'action' => $this->request->getParam('action'),
                                                    'prefix' => 'user',
                                                    '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getNextPage()])
                                                ]); ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->Url->build([
                                                    'controller' => $this->request->getParam('controller'),
                                                    'action' => $this->request->getParam('action'),
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

                        <!-- end pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->append('script'); ?>
<script>
    function delete_wishlist(id) {
        $.ajax({
            url: '<?= $this->Url->build(['controller' => 'Wishlist', 'action' => 'delete', 'prefix' => 'user']); ?>',
            type : 'POST',
            data : {
                wishlist_id : id,
                _csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'
            },
            dataType : 'json',
            success: function(response){

            }
        });
    }

    function add_wishlist(product_id) {
        $.ajax({
            url: '<?= $this->Url->build(['controller' => 'Wishlist', 'action' => 'add', 'prefix' => 'user']); ?>',
            type : 'POST',
            data : {
                product_id : product_id,
                _csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'
            },
            dataType : 'json',
            success: function(response){

            }
        });
    }


    $('.btn-wishlist').click(function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active')
                .attr('title', 'Belum ada dalam wishlist')
                .tooltip('fixTitle')
                .tooltip('show')
                .find('i.fa')
                .removeClass('fa-heart')
                .addClass('fa-heart-o');
            delete_wishlist($(this).data('id'));
        } else {
            $(this).addClass('active')
                .attr('title', 'Sudah ada dalam wishlist')
                .tooltip('fixTitle')
                .tooltip('show')
                .find('i.fa')
                .removeClass('fa-heart-o')
                .addClass('fa-heart');
            add_wishlist($(this).data('product-id'));
        }
    });
</script>

<?php $this->end(); ?>
