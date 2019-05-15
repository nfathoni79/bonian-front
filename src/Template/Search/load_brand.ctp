<div class="table_cell scrollable pd-20 pd-t-0-force" style="max-height: 175px; overflow: auto;">
    <div class="row">
        <div class="col-md-12">
            <?php foreach($brands as $value) : ?>
                <div>
                    <div class="pretty p-svg p-curve zl-tx-black">
                        <input type="checkbox" data-id="<?= $value['brand_id']; ?>" class="brand-value" <?= in_array($value['brand_id'], array_values((array) $this->request->getQuery('brands'))) ? 'checked' : ''; ?> />
                        <div class="state p-danger">
                            <!-- svg path -->
                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                            </svg>
                            <label><?= $value['name']; ?> <span class="category-counter">(<?= $value['total']; ?>)</span></label>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>