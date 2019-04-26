<!-- start: main container -->
<div class="main-container product-listing container">
    <div class="row">
        <!-- start: breadcumb -->

        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li><a href="#" class="o-breadcumbs-item">Home</i></a></li>
            </ul>


        </div>
        <!-- end: breadcumb -->

        <!-- start: bagian kiri -->
        <div class=" col-lg-3 content-aside left_column sidebar-offcanvas c-filter">
            <h3 class="modtitle">Filter Produk </h3>
            <span id="close-sidebar" class="fa fa-times"></span>


            <!-- start: componen category -->
            <div class="module filter-by-category">
                <h3 class="modtitle o-filter-title">Berdasarkan Category </h3>
                <div class="table_layout filter-shopby">
                    <div class="table_row">
                        <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->
                        <div class="table_cell" style="padding-top:20px;">
                            <div id="category_view"></div>
                        </div>
                        <!--/ .table_cell -->

                        <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->
                    </div>
                </div>
            </div>
            <!-- end: componen category -->

            <!-- start: componen harga -->
            <div class="module">
                <h3 class="modtitle o-filter-title">Berdasarkan harga </h3>
                <div class="table_layout filter-shopby">
                    <div class="table_row">
                        <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->
                        <div class="table_cell" style="padding-top:20px;">
                            <fieldset>
                                <div id="pricing-range"
                                     class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all"></span>
                                </div>
                                <div class="range" style="text-align:center">
                                            <span style="font-size:15px;">
                                                Harga
                                            </span>
                                    <br>
                                    <span class="min_val"><?= $pricing['min_price']; ?></span> -
                                    <span class="max_val"><?= $pricing['max_price']; ?></span>
                                    <input type="hidden" name="min_price" class="min_value" value="<?= $pricing['min_price']; ?>">
                                    <input type="hidden" name="max_price" class="max_value" value="<?= $pricing['max_price']; ?>">
                                </div>
                            </fieldset>
                        </div>
                        <!--/ .table_cell -->

                        <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->
                    </div>
                </div>
            </div>
            <!-- end: componen harga -->

            <!-- start: componen Brand -->
            <div class="module filter-by-brand">
                <h3 class="modtitle o-filter-title">Berdasarkan Brand</h3>
                <div class="table_layout filter-shopby">
                    <div class="table_row">
                        <!-- - - - - - - - - - - - - - Brand - - - - - - - - - - - - - - - - -->
                        <div class="table_cell" style="padding-top:20px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php foreach($brands as $value) : ?>
                                        <div>
                                            <div class="pretty p-default p-thick p-pulse">
                                                <input type="checkbox" data-id="<?= $value['brand_id']; ?>" class="brand-value" />
                                                <div class="state p-primary">
                                                    <label><?= $value['name']; ?> <span class="category-counter">(<?= $value['total']; ?>)</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                        </div>
                        <!--/ .table_cell -->
                        <!-- - - - - - - - - - - - - - End Brand - - - - - - - - - - - - - - - - -->
                    </div>
                </div>
            </div>
            <!-- end: componen Brand -->

            <?php foreach($variants as $variant) : ?>
            <!-- start: componen variant -->
            <div class="module filter-by-variant">
                <h3 class="modtitle o-filter-title">Berdasarkan <?= $variant['Options']['name']; ?></h3>
                <div class="table_layout filter-shopby">
                    <div class="table_row">
                        <!-- - - - - - - - - - - - - - variant - - - - - - - - - - - - - - - - -->
                        <div class="table_cell" style="padding-top:20px;">
                            <div class="row">
                                <?php foreach(array_chunk($variant['values'], ceil(count($variant['values']) / 2)) as $group) : ?>
                                    <div class="col-md-6">
                                        <?php foreach($group as $value) : ?>
                                            <div class="pretty p-default p-thick p-pulse">
                                                <input type="checkbox" data-id="<?= $value['option_value_id']; ?>" class="variant-value" />
                                                <div class="state p-primary">
                                                    <label><?= $value['name']; ?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!--/ .table_cell -->
                        <!-- - - - - - - - - - - - - - End variant - - - - - - - - - - - - - - - - -->
                    </div>
                </div>
            </div>
            <!-- end: componen variant -->
            <?php endforeach; ?>

            <?php /*
            <!-- start: componen fitur -->
            <div class="module">
                <h3 class="modtitle o-filter-title">Berdasarkan fitur</span> </h3>
                <div class="table_layout filter-shopby">
                    <div class="table_row">
                        <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->

                        <div class="table_cell" style="padding-top:20px;">
                            <fieldset>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <ul class="simple_vertical_list">
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_1">
                                                <label for="color_btn_1"
                                                       class="color_btn red">Popularitas</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_2">
                                                <label for="color_btn_2" class="color_btn red">Item
                                                    Promosi</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_4">
                                                <label for="color_btn_4" class="color_btn red">Item
                                                    Diskon</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_5">
                                                <label for="color_btn_5" class="color_btn red">Hot
                                                    Products</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_6">
                                                <label for="color_btn_6" class="color_btn red">Penjualan
                                                    Terbaik</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_7">
                                                <label for="color_btn_7" class="color_btn red">Rating
                                                    tertinggi</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" name="" id="color_btn_7">
                                                <label for="color_btn_7" class="color_btn red">Sale</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </fieldset>

                        </div>
                        <!--/ .table_cell -->

                        <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->
                    </div>
                </div>
            </div>
            <!-- end: componen fitur -->
            */ ?>


        </div>
        <!-- end: bagian kiri -->

        <!-- start: bagian kanan -->
        <div id="content" class="col-md-9 col-sm-12">
            <div class="products-category c-main-content">

                <?php /*
                <!-- start: banner atas -->
                <div class="category-derc">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="banners">
                                <div>
                                    <a href="#"><img src="assets/img/banner-2.png" alt="img cate"
                                                     style="border-radius:15px;"><br></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end: banner atas -->
 */ ?>

                <!-- start:filter produk -->
                <div class="row">
                    <div class="col-md-5">
                        <?php if ($query = $this->request->getQuery('q')) : ?>
                        <h3 class="title-category">Hasil pencarian untuk <span class="search-keyword"><?= h($query); ?></span></h3>
                        <?php endif; ?>
                    </div>

                    <div class="short-by-show form-inline text-right col-md-5 col-sm-9 col-xs-12">
                        <div class="form-group short-by">
                            <label class="control-label o-control-label" for="input-sort">Urutkan
                                berdasarkan</label>
                            <select id="input-sort" class="form-control" onchange="location = this.value;">
                                <option value="" selected="selected">Rating tertinggi</option>
                                <option value="">Rating terendah</option>
                                <option value="">Rating biasa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-12 view-mode">

                        <div class="list-view">
                            <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"
                                    data-original-title="Grid" style="margin-right:10px;">
                                <i class="fa fa-th"></i>
                            </button>
                            <button class="btn btn-default list" data-view="list" data-toggle="tooltip"
                                    data-original-title="List">
                                <i class="fa fa-th-list"></i>
                            </button>
                        </div>

                    </div>
                </div>
                <!-- end: filter produk -->

                <!-- start: list produk -->
                <div id="product-container-layout">
                <?php if (isset($products)) : ?>
                <div class="products-list row nopadding-xs so-filter-gird" style="margin-top: 15px;">
                    <?php foreach($products as $product) : ?>
                        <!-- start: item Produk -->
                        <div class="product-layout products col-lg-3 col-md-4 col-sm-4 col-xxs-6 col-xs-12">
                            <div class="product-item-container">
                                <div class="left-block left-b">
                                    <div class="product-card__gallery product-card__left">
                                        <?php foreach($product['images'] as $key => $image) :  ?>
                                            <div class="item-img" data-src="<?= $this->Url->build($_basePath . 'images/195x195/' . $image); ?>">
                                                <img src="<?= $this->Url->build($_basePath . 'images/46x46/' . $image); ?>" data-image-name="<?= $image; ?>"  alt="image">
                                            </div>

                                            <?php if ($key > 1) {break;} endforeach; ?>
                                    </div>
                                    <div class="product-image-container">
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $product['slug']]); ?>" title="<?= h($product['name']); ?>">
                                            <?php foreach($product['images'] as $image) : ?>
                                                <img src="<?= $this->Url->build($_basePath . 'images/195x195/' . $image); ?>" data-image-name="<?= $image; ?>"  class="img-responsive" alt="image">
                                            <?php break; endforeach; ?>
                                        </a>
                                    </div>

                                    <!--quickview-->
                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                       href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i
                                                class="fa fa-eye"></i><span></span></a>
                                    <!--end quickview-->
                                </div>
                                <div class="right-block right-b">
                                    <?php /*
                                    <ul class="colorswatch">
                                        <li class="item-img active"
                                            data-src="image/catalog/demo/product/electronic/600x600/9.jpg"><a
                                                    href="javascript:void(0);" title="gray"><img
                                                        src="image/demo/colors/gray.jpg" alt="image"></a></li>
                                        <li class="item-img"
                                            data-src="image/catalog/demo/product/electronic/600x600/10.jpg"><a
                                                    href="javascript:void(0);" title="pink"><img
                                                        src="image/demo/colors/pink.jpg" alt="image"></a></li>
                                        <li class="item-img"
                                            data-src="image/catalog/demo/product/electronic/600x600/11.jpg"><a
                                                    href="javascript:void(0);" title="black"><img
                                                        src="image/demo/colors/black.jpg" alt="image"></a>
                                        </li>
                                    </ul> */ ?>
                                    <div class="caption">
                                        <h4>
                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'detail', $product['slug']]); ?>" title="<?= h($product['name']); ?>">
                                                <?php echo $this->Text->truncate(
                                                    h($product['name']),
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
                                                    $rate = (int) $product['rating'];
                                                    for ($x = 0; $x < $rate; $x++) {
                                                        echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>';
                                                    }
                                                    for ($x = 0; $x < 5-$rate; $x++) {
                                                        echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>';
                                                    }
                                                    ?>
                                                </div>
                                                <a class="rating-num" href="#" target="_blank">(<?= $product['rating_count']; ?>)</a>
                                            </div>
                                            <div class="order-num">Orders (0)</div>
                                        </div>
                                        <div class="price">
                                            <span class="price-new">Rp. <?= $this->Number->format($product['price_sale']); ?></span>
                                        </div>
                                        <div class="button-group so-quickview cartinfo--static">
                                            <button type="button" class="addToCart" title="Add to cart"
                                                    onclick="cart.add('<?= $product['id']; ?>');"> <i class="fa fa-shopping-basket"></i>
                                                <span>Add to cart </span>
                                            </button>
                                            <button type="button" class="wishlist btn-button"
                                                    title="Add to Wish List" onclick="wishlist.add('<?= $product['id']; ?>', this);"><i
                                                        class="fa fa-heart"></i><span></span>
                                            </button>
                                            <button type="button" class="compare btn-button"
                                                    title="Compare this Product " onclick="compare.add('<?= $product['id']; ?>');"><i
                                                        class="fa fa-refresh"></i><span></span>
                                            </button>
                                        </div>
                                        <div class="description item-desc">
                                            <p>&nbsp;</p>
                                        </div>
                                        <?php /*
                                        <div class="list-block">
                                            <button class="addToCart btn-button" type="button" title="Add to Cart"
                                                    onclick="cart.add('101', '1');"><i
                                                        class="fa fa-shopping-basket"></i>
                                            </button>
                                            <button class="wishlist btn-button" type="button"
                                                    title="Add to Wish List" onclick="wishlist.add('101');"><i
                                                        class="fa fa-heart"></i>
                                            </button>
                                            <button class="compare btn-button" type="button"
                                                    title="Compare this Product" onclick="compare.add('101');"><i
                                                        class="fa fa-refresh"></i>
                                            </button>
                                            <!--quickview-->
                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                               href="quickview.html" title="Quick view"
                                               data-fancybox-type="iframe"><i class="fa fa-eye"></i></a>
                                            <!--end quickview-->
                                        </div>
                                         */ ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: item produk -->
                    <?php endforeach; ?>
                <?php else : ?>
                    Product tidak di temukan
                <?php endif; ?>
                </div>
                <!-- end: list produk -->

                <!-- start: bottom nav produk -->
                <div class="product-filter product-filter-bottom filters-panel">
                    <div class="row">
                        <div class="col-sm-12 text-center">
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
                                                <ul class="pagination ajax-pagination">
                                                    <li>
                                                        <a href="<?= $this->Url->build([
                                                            'controller' => $this->request->getParam('controller'),
                                                            'action' => $this->request->getParam('action'),
                                                            'prefix' => false,
                                                            '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getFirstPage()])
                                                        ]); ?>" aria-label="First">
                                                            <span aria-hidden="true">First</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= $this->Url->build([
                                                            'controller' => $this->request->getParam('controller'),
                                                            'action' => $this->request->getParam('action'),
                                                            'prefix' => false,
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
                                                                'prefix' => false,
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
                                                            'prefix' => false,
                                                            '?' => array_merge($this->request->getQuery(), ['page' => $pagination->getNextPage()])
                                                        ]); ?>" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= $this->Url->build([
                                                            'controller' => $this->request->getParam('controller'),
                                                            'action' => $this->request->getParam('action'),
                                                            'prefix' => false,
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
                <!-- end: bottom nav produk -->
                </div>

            </div>
        </div>
        <!-- end: bagian kanan -->

    </div>
</div>
<!-- end: main container -->

<?php

$this->Html->css([
    '/css/bootstrap-treeview',
    '/css/plugin.min.css',
    '/css/perfect-scrollbar'
], ['block' => true]);


$this->Html->script([
    '/js/bootstrap-treeview.min',
], ['block' => true]);
?>
<?php $this->append('script'); ?>
<script type="text/javascript">
    // Check if Cookie exists
    if ($.cookie('display')) {
        view = $.cookie('display');
    } else {
        view = 'grid';
    }
    if (view) display(view);
</script>
<script>

    $(document).ready(function(){


        //filter-by-brand
        if ($('.module.filter-by-brand').find('.table_cell').length) {
            new PerfectScrollbar($('.module.filter-by-brand').find('.table_cell')[0], {
                suppressScrollX: true,
            })
        }

        function refreshPage(target) {
            //var parsed = queryString.parse(location.search, {arrayFormat: 'bracket'});
            target = target || location.search;
            $.ajax({
                url: target,
                type : 'POST',
                data : {
                    _csrfToken: $('meta[name="_csrfToken"]').attr('content')
                },
                success: function(response){
                    $("#product-container-layout").html(response);
                    history.replaceState(null, null, target);
                    paginationClicked()
                },
                error: function () {

                }
            });

            generateTree('<?= $this->Url->build(['action' => 'loadCategory', 'prefix' => false]); ?>' + location.search);
            loadBrands('<?= $this->Url->build(['action' => 'loadBrand', 'prefix' => false]); ?>' + location.search);

        }

        function querystringParse()
        {
            parsed = queryString.parse(location.search, {arrayFormat: 'index'});
            if (parsed.page) {
                delete parsed.page;
            }
            return parsed;
        }

        $(document.body).on('mouseenter', '.product-card__gallery .item-img' ,function(){
            $(this).addClass('thumb-active').siblings().removeClass('thumb-active');
            var thumb_src = $(this).attr("data-src");
            $(this).closest('.product-item-container').find('img.img-responsive').attr("src",thumb_src);
        });

        function paginationClicked() {
            $('.ajax-pagination a').click(function(e) {
                e.preventDefault();
                if (e.target.href) {
                    refreshPage(e.target.href);
                }
            })
        }
        paginationClicked();


        function paginationClick() {
            var container = document.querySelector('.ajax-pagination');
            if (container) {
                container.addEventListener('click', function(e) {
                    if (e.target != e.currentTarget) {
                        e.preventDefault();
                        console.log('page', e.target.href)
                        refreshPage(e.target.href);
                    }
                    e.stopPropagation();
                }, false);
            }

        }
        //paginationClick();


    function loadBrands(target) {
        //filter-by-brand
        $.ajax({
            url: target || location.search,
            type : 'POST',
            data : {
                _csrfToken: $('meta[name="_csrfToken"]').attr('content')
            },
            success: function(response){
                $(".module.filter-by-brand").html(response);
                new PerfectScrollbar($('.module.filter-by-brand').find('.table_cell')[0], {
                    suppressScrollX: true,
                })
            },
            error: function () {

            }
        });
    }


    function generateTree(url) {
        var $tree = $('#category_view').treeview({
            color: '#000000', // '#000000',
            backColor: '#FFFFFF', // '#FFFFFF',
            showBorder: false,
            levels: 1,
            injectStyle: true,
            options: {
                color: '#888888'
            },
            expandIcon: 'fa fa-angle-down pull-right',
            collapseIcon: 'fa fa-angle-up pull-right',
            onhoverColor: '#ffffff',
            selectedColor: '#000000',
            selectedBackColor: '#ffffff',
            enableLinks: true,
            //data: data,
            wrapNodeText: true,
            showCheckbox: true,
            dataUrl: {
                url: url || '<?= $this->Url->build(['action' => 'loadCategory', 'prefix' => false, '?' => $this->request->getQueryParams()], ['escape' => false]); ?>'
            },
            onNodeRendered: function (event, node) {
                node.total = node.total > 1000 ? numeral(node.total).format('0.0a') : node.total;
                $(node.$el[0]).find('.text').text(truncate(node.text, 28, {ellipsis: '...'})).attr('title', node.text);
                node.$el.append($(`<span class="category-counter">(${node.total})</span>`));
            },
            onNodeSelected: function (event, data) {
                /*(function checkedNode(arg) {
                    var x = $tree.treeview('getParents', arg);
                    if (x != undefined) {
                        x.forEach(function(o) {
                            //$(o.$el[0]).addClass('node-checked');
                            checkedNode(o);
                        });

                    }
                })(data);*/
                $tree.treeview('checkNode', [data, {silent: false}]);
                parsed = querystringParse();
                parsed.category_id = $(data.$el[0]).attr('id');
                history.replaceState(null, null, '?' + queryString.stringify(parsed, {
                    strict: true,
                    arrayFormat: 'index'
                }));
                refreshPage();

            },
            onNodeUnselected: function (event, data) {
                // Your logic goes here


                if (typeof $tree != 'undefined') {

                    /*(function uncheckedNodes(arg) {
                        var x = $tree.treeview('getParents', arg);
                        if (x != undefined) {
                            x.forEach(function(o) {
                                //$tree.treeview('uncheckNode', [ o, { silent: false } ]);
                                //$tree.treeview('unselectNode', [ o, { silent: false } ]);
                                //$(o.$el[0])
                                //    .removeClass('node-selected');
                                uncheckedNodes(o);
                            });

                        }
                    })(data);*/
                    $(data.$el)
                        .removeClass('node-selected')
                        .removeClass('node-checked')
                        .find('.check-icon')
                        .removeClass('glyphicon-check')
                        .addClass('glyphicon-unchecked');


                }
            }
        });
    }

        generateTree();


        $('input.variant-value').change(function() {
            parsed = querystringParse();
            parsed.variants = parsed.variants || [];
            var value = String($(this).data('id'));
            if(this.checked) {
                if (parsed.variants.indexOf(value) === -1) {
                    parsed.variants.push(value);
                }
            } else {
                var index = parsed.variants.indexOf(value);
                if (index > -1) {
                    parsed.variants.splice(index, 1);
                }
            }
            history.replaceState(null, null, '?' + queryString.stringify(parsed, {strict: true, arrayFormat: 'index'}));
            refreshPage();
        });

        $(document.body).on('change', 'input.brand-value', function() {
            parsed = querystringParse();
            parsed.brands = parsed.brands || [];
            var value = String($(this).data('id'));
            if(this.checked) {
                if (parsed.brands.indexOf(value) === -1) {
                    parsed.brands.push(value);
                }
            } else {
                var index = parsed.brands.indexOf(value);
                if (index > -1) {
                    parsed.brands.splice(index, 1);
                }
            }
            history.replaceState(null, null, '?' + queryString.stringify(parsed, {strict: true, arrayFormat: 'index'}));
            refreshPage();
        });


        if($('#pricing-range').length) {
            var min_price = parseInt($('input[name="min_price"]').val());
            var max_price = parseInt($('input[name="max_price"]').val());
            window.startRangeValues = [min_price, max_price];
            $('#pricing-range').slider({

                range : true,
                //min : min_price >= 1000 ? (min_price - 1000) : min_price ,
                //max : max_price + 1000 ,
                min: 0,
                max: max_price,
                values : window.startRangeValues,
                step : 10000,

                slide : function(event, ui){

                    var min = ui.values[0],
                        max = ui.values[1],
                        range = $(this).siblings('.range');

                    range.children('.min_value').val(min).next().val(max);
                    range.children('.min_val').text('Rp.' + numeral(min).format('0,0')).next().text('Rp.' + numeral(max).format('0,0'));

                },
                stop: function(event, ui) {
                    //console.log('released handle');
                    parsed =querystringParse();
                    if (parsed.page) {
                        delete parsed.page;
                    }
                    parsed.min_price = $(this).slider("values", 0);
                    parsed.max_price = $(this).slider("values", 1);
                    history.replaceState(null, null, '?' + queryString.stringify(parsed, {strict: true, arrayFormat: 'index'}));
                    refreshPage();

                },
                create : function(event, ui){
                    var $this = $(this),
                        min = $this.slider("values", 0),
                        max = $this.slider("values", 1),
                        range = $this.siblings('.range');

                    range.children('.min_value').val(min).next().val(max);

                    range.children('.min_val').text('Rp.' + numeral(min).format('0,0')).next().text('Rp.' + numeral(max).format('0,0'));

                }

            });

        }


    });
</script>
<?php $this->end(); ?>