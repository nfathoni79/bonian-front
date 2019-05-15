<div class="table_cell scrollable pd-20 pd-t-0-force" style="max-height: 175px; overflow: auto;">
    <div class="row">
        <div class="col-md-12">
            <?php foreach($brands as $value) : ?>
                <div>
                    <div class="pretty p-default p-thick p-pulse tx-12 zl-tx-black">
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