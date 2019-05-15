<?php foreach($variants as $variant) : ?>
    <!-- start: componen variant -->
    <div class="z-depth-0 bordered filter-by-variant">
        <div id="headingFour-<?= $variant['Options']['id']; ?>">
            <div class="block-categories module mg-b-20-force pd-0-force br-none bs-none">
                <h3 class="modtitle tx-mont">
                    <button class="btn btn-link tx-bold zl-tx-black pd-0" type="button" data-toggle="collapse" data-target="#collapseFour-<?= $variant['Options']['id']; ?>"
                            aria-expanded="true" aria-controls="collapseThree">
                        Berdasarkan <?= $variant['Options']['name']; ?>
                    </button>
                </h3>
            </div>
        </div>
        <div id="collapseFour-<?= $variant['Options']['id']; ?>" class="collapse in" aria-labelledby="headingFour-<?= $variant['Options']['id']; ?>"
             data-parent="#accordionExample275">
            <!-- - - - - - - - - - - - - - variant - - - - - - - - - - - - - - - - -->
            <div class="table_cell scrollable pd-20 pd-t-0-force" style="max-height: 175px; overflow: auto;">
                <div class="row">
                    <?php foreach(array_chunk($variant['values'], ceil(count($variant['values']) / 1)) as $group) : ?>
                        <div class="col-sm-12">
                            <?php foreach($group as $value) : ?>
                                <div>
                                    <div class="pretty p-svg p-curve zl-tx-black">
                                        <input type="checkbox" data-id="<?= $value['option_value_id']; ?>" class="variant-value" <?= in_array($value['option_value_id'], array_values((array) $this->request->getQuery('variants'))) ? 'checked' : ''; ?> />
                                        <div class="state p-danger">
                                            <!-- svg path -->
                                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                            </svg>
                                            <label><?= $value['name']; ?> <?php /*<span class="variant-counter">(<?= $value['total']; ?>)</span>*/ ?></label>
                                        </div>
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
    <!-- end: componen variant -->
<?php endforeach; ?>