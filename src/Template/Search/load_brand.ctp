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
                                <input type="checkbox" data-id="<?= $value['brand_id']; ?>" class="brand-value" <?= in_array($value['brand_id'], array_values((array) $this->request->getQuery('brands'))) ? 'checked' : ''; ?> />
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