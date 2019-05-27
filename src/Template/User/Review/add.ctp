<?php $this->append('style'); ?>
<?php
$this->Html->css([
'/css/bar-rate/themes/fontawesome-stars.css',
'/css/filepond/filepond-plugin-image-preview.min.css',
'/css/filepond/filepond.min.css',
'/css/custom/filepond-custom.css',
], ['block' => true]); ?>
<?php $this->end(); ?>

<?php $this->append('script'); ?>
<?php
$this->Html->script([
'/js/jquery.barrating.min.js',
'/js/filepond/filepond-plugin-file-encode.min.js',
'/js/filepond/filepond-plugin-file-validate-size.min.js',
'/js/filepond/filepond-plugin-image-exif-orientation.min.js',
'/js/filepond/filepond-plugin-image-preview.min.js',
'/js/filepond/filepond-plugin-file-validate-type.js',
'/js/filepond/filepond.min.js',
], ['block' => true]);
?>
<script>
    $(document).ready(function () {

        $(function() {
           $('#product_rating').barrating({
             theme: 'fontawesome-stars'
           });
        });

        FilePond.registerPlugin(

            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize,
            FilePondPluginImagePreview
        );

        // Select the file input and use create() to turn it into a pond
        FilePond.create(
            document.querySelector('input.filepond'),{
                acceptedFileTypes: ['image/png','image/jpeg','image/jpg',],
                fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                    resolve(type);
                })
            }
        );
    })
</script>
<?php $this->end(); ?>

<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <?= $this->element('Partials/Profile/verification'); ?>
                <div class="user-content">
                    <div class="user-content-header">
                        <?= $this->element('Partials/Review/navigation'); ?>
                    </div>

                    <div class="user-content-body pd-20">
                        <div class="row mg-0">
                            <div class="col-sm-12 bd bg-gray-100 pd-10">
                                <span class="col-sm-6 tx-left tx-medium">Invoice No. <?= $rating['order']['invoice'];?>-<?= $rating['order']['id'];?></span>
                                <span class="col-sm-6 tx-right tx-medium">Tanggal Order: <?= date('d M Y, H : i',strtotime($rating['created'])); ?></span>
                            </div>

                            <?= $this->Form->create(null, [
                            'url' => [
                                'controller' => 'Review',
                                    'action' => 'validate',
                                    'prefix' => 'user'
                                ],
                                'id' => 'add-form',
                                'class' => 'ajax-helpers',
                                'type' => 'file'
                            ]); ?>
                            <input type="hidden" name="order_id" value="<?= $rating['order']['id'];?>">
                            <input type="hidden" name="product_id" value="<?= $rating['product']['id'];?>">
                            <div class="alert alert-danger alert-msg" style="display:none;"></div>
                            <div class="col-sm-12 bd pd-t-20 pd-b-20 bd-t-0">
                                <div class="col-sm-3">
                                    <?php foreach($rating['product']['images'] as $image):?>
                                    <img class="img-responsive" src="<?= $this->Url->build($_basePath . 'images/600x600/' . $image); ?>" >
                                    <?php break;?>
                                    <?php endforeach;?>
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="zl-tx-black tx-bold tx-16 mg-t-0"><?php echo $rating['product']['name'];?></h4>
                                    <span>Bagaimana kualitas produk ini ?</span>
                                    <select id="product_rating" name="rating">
                                      <option value=""></option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                    </select>
                                    <div class="col-lg-12 pd-0 mg-t-10">
                                        <span>Berikan ulasan untuk produk ini.</span>
                                        <div class="col-lg-12 pd-0" style="">
                                            <div class="form-group">
                                                <textarea class="form-control note tx-13 ht-120" name="comment" placeholder="Tulis Ulasan Barang" value=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pd-0">
                                        <span>Tambahkan gambar.</span>
                                        <input type="file" 
                                               class="filepond wd-300"
                                               name="images[]"
                                               id="images"
                                               multiple
                                               accept="image/jpeg, image/png"
                                               data-min-file-size="250KB"
                                               data-max-file-size="1000KB"
                                               data-max-files="3" />
                                    </div>
                                    <div class="col-sm-12 mg-t-20 tx-right">
                                        <button type="submit" class="btn btn-md btn-radius btn-danger">Kirim</button>
                                        <a class="btn btn-md btn-radius btn-default">Batal</a>
                                    </div>
                                </div>
                            </div>
                            <?= $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->append('script'); ?>
<script>
    $(document).ready(function () {

        var formEl = $("#add-form");
        formEl.submit(function(e) {
            var ajaxRequest = new ajaxValidation(formEl);
            ajaxRequest.post(formEl.attr('action'), formEl.find(':input'), function(response, data) {
                if(data.error.data.is_error){
                    swal(data.error.data.message);
                }else {
                    // location.href = '<?= $this->Url->build(); ?>';
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    })
</script>
<?php $this->end(); ?>