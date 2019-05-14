<style>

#map-canvas {
    height: 100%;
    margin: 0;
}
#map-canvas .centerMarker, #map-canvas-edit .centerMarker {
    position: absolute;
    /*url of the marker*/
    background: url(../../images/marker.png) no-repeat;
    /*center the marker*/
    top: 50%;
    left: 50%;
    z-index: 1;
    /*fix offset when needed*/
    margin-left: -68px;
    margin-top: -60px;
    /*size of the image*/
    height: 61px;
    width: 140px;
    cursor: pointer;
}
</style>
<div class="container">
    <div class="block block_0">
        <div class="row">
            <?= $this->element('Partials/User/menu'); ?>
            <div id="content" class="col-md-9 col-sm-8">
                <div class="user-content">
                    <div class="user-content-header">
                        <?= $this->element('Partials/Profile/navigation'); ?>
                    </div>
                    <div class="user-content-body">
                        <h4><strong>Daftar Alamat</strong></h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-red">
                                <tr>
                                    <td><strong class="tx-danger">Penerima</strong></td>
                                    <td><strong class="tx-danger">Alamat Pengiriman</strong></td>
                                    <td><strong class="tx-danger">Daerah Pengiriman</strong></td>
                                    <td></td>
                                </tr>
                                <?php foreach($address as $val):?>
                                <tr>
                                    <td>
                                        <div><strong><?= ucfirst($val['recipient_name']);?></strong></div>
                                        <div><?= $val['recipient_phone'];?></div>
                                    </td>
                                    <td>
                                        <div><strong><?= ucfirst($val['title']);?></strong></div>
                                        <div><?= $val['address'];?></div>
                                    </td>
                                    <td>
                                        <div><?= $val['city']['type'];?> <?= $val['city']['name'];?>, <?= $val['province']['name'];?> <?= $val['postal_code'];?></div>
                                    </td>
                                    <td>
                                        <?php if($val['is_primary']):?>
                                        <button class="btn btn-danger btn-radius btn-md btn-block" style="margin-bottom: 10px;"><i class="far fa-check-square mg-r-4"></i> Alamat utama</button>
                                        <a href="#" class="pull-left edit-address-button"  data-toggle="modal" data-target="#address-edit" data-id="<?= $val['id']; ?>" data-alias="<?= ucfirst($val['title']);?>" ><strong class=""><i class="fa fa-edit"></i> Edit</strong></a>
                                        <?php else:?>
                                        <button data-id="<?= $val['id']; ?>" class="btn btn-default btn-radius btn-md btn-block set-primary-address-button" data-alias="<?= ucfirst($val['title']);?>" style="margin-bottom: 10px;"><i class="far fa-square mg-r-4"></i> Set alamat utama</button>
                                        <a href="#" class="pull-left edit-address-button"  data-toggle="modal" data-target="#address-edit" data-id="<?= $val['id']; ?>" data-alias="<?= ucfirst($val['title']);?>" ><strong class=""><i class="fa fa-edit"></i> Edit</strong></a>
                                        <a href="#" data-id="<?= $val['id']; ?>" class="pull-right delete-address-button" data-alias="<?= ucfirst($val['title']);?>"><strong class=""><i class="fa fa-trash"></i> Hapus</strong></a>
                                        <?php endif;?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </table>

                        </div>
                        <div>
                            <a class="btn btn-danger btn-radius" data-toggle="modal" data-target="#address-modal">Tambah Alamat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal add address -->
<!-- Modal -->
<div class="modal fade" id="address-modal" tabindex="-1" role="dialog" aria-labelledby="login-popupLabel">
    <div class="modal-dialog modal-md address-modal" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d9534f;color: #ffffff;border-top-left-radius:6px;border-top-right-radius:6px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span></button>
                <h4 class="modal-title" id="login-popupLabel" style="text-align: left;">Tambah alamat baru</h4>
            </div>
            <?= $this->Form->create(null, [
                'url' => [
                    'controller' => 'Profile',
                    'action' => 'addAddress',
                    'prefix' => 'user'
                ],
                'id' => 'form-address',
                'class' => 'ajax-helper_'
            ]); ?>
            <div class="modal-body">
                <div class="main-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input-title">Nama alamat</label>
                                <input type="text" name="title" value="" placeholder="Alamat Rumah, Kantor, dll" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="input-recipient-phone">Nomor Telepon</label>
                                <input type="text" name="recipient_phone" value="" placeholder="Telepon penerima barang" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input-recipient-name">Nama penerima</label>
                                <input type="text" name="recipient_name" value="" placeholder="Nama penerima barang" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->control('province_id', ['type' => 'select', 'class' => 'form-control', 'label' => 'Provinsi', 'div' => false, 'options' => $province, 'empty' => 'Pilih Provinsi'])?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->control('subdistrict_id', ['type' => 'select', 'class' => 'form-control', 'label' => 'Kecamatan', 'div' => false, 'options' => [], 'empty' => 'Pilih Kecamatan'])?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->control('city_id', ['type' => 'select', 'class' => 'form-control', 'label' => 'Kota / Kabupaten', 'div' => false, 'options' => [], 'empty' => 'Pilih Kota / Kabupaten'])?>
                            </div>
                            <div class="form-group">
                                <label for="input-postal-code">Kode Pos</label>
                                <input type="text" name="postal_code" value="" placeholder="Input kode pos" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo $this->Form->control('address', ['type' => 'textarea', 'class' => 'form-control', 'label' => 'Alamat lengkap', 'div' => false,'placeholder' => 'Alamat lengkap penerima'])?>
                            </div>
                        </div>
                    </div>

                    <!--
                    <div class="pull-left">
                        <strong><a href="javascript:void(0);" class="lokasi" data-container="body" data-toggle="popover" data-placement="right" tabindex="0">Lokasi <i class="fa fa-question-circle"></i></a></strong>
                    </div>
                    <div class="pull-right">
                        <strong><a href="javascript:void(0);" class="show-map btn-map" style="color:#a94442;" ><i class="fa fa-map-marker"></i> Pilih Lokasi</a></strong>
                    </div>
                    <div class="clearfix"></div>
                    -->
                </div>
                <div class="map-form" style="display: none;">
                    <div class="msg-alamat"></div>
                    <div id="map-canvas" style="height: 300px"></div>
                    <input type="hidden" name="latitude" id="default_latitude" placeholder="Latitude" />
                    <input type="hidden" name="longitude" id="default_longitude" placeholder="Longitude" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-radius btn-md pull-left btn-simpan"><i class="fa fa-save"></i> Simpan alamat</button>
                <a class="btn btn-danger btn-radius btn-md pull-right btn-batal" style="display:none;"> Batal</a>
                <div class="clearfix"></div>
            </div>
            <?= $this->Form->end(); ?>

        </div>
    </div>
</div>
<!-- end modal add address -->

<!-- modal edit address -->
<!-- Modal -->
<div class="modal fade" id="address-edit" tabindex="-1" role="dialog" aria-labelledby="login-popupLabel">
    <div class="modal-dialog modal-md address-edit" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d9534f;color: #ffffff;border-top-left-radius:6px;border-top-right-radius:6px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span></button>
                <h4 class="modal-title" id="login-popupLabel" style="text-align: left;">Edit alamat</h4>
            </div>
            <?= $this->Form->create(null, [
                'url' => [
                    'controller' => 'Profile',
                    'action' => 'editAddress',
                    'prefix' => 'user'
                ],
                'id' => 'form-address-edit',
                'class' => 'ajax-helper_'
            ]); ?>
            <div class="modal-body">
                <div class="main-form-edit">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input-title">Nama alamat</label>

                                <input type="hidden" name="id" value="" class="form-control" id="edit-id" />
                                <input type="text" name="title" value="" placeholder="Input nama alamat" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="input-recipient-phone">Nomor Telepon</label>
                                <input type="text" name="recipient_phone" value="" placeholder="Telepon penerima barang" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input-recipient-name">Nama penerima</label>
                                <input type="text" name="recipient_name" value="" placeholder="Nama penerima barang" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->control('province_id', ['id' => 'p-id','type' => 'select', 'class' => 'form-control', 'label' => 'Provinsi', 'div' => false, 'options' => $province, 'empty' => 'Pilih Provinsi'])?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->control('subdistrict_id', ['id' => 's-id','type' => 'select', 'class' => 'form-control', 'label' => 'Kecamatan', 'div' => false, 'options' => [], 'empty' => 'Pilih Kecamatan'])?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->control('city_id', ['id' => 'c-id','type' => 'select', 'class' => 'form-control', 'label' => 'Kota / Kabupaten', 'div' => false, 'options' => [], 'empty' => 'Pilih Kota / Kabupaten'])?>
                            </div>
                            <div class="form-group">
                                <label for="input-postal-code">Kode Pos</label>
                                <input type="text" name="postal_code" value="" placeholder="Input kode pos" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo $this->Form->control('address', ['type' => 'textarea','id'=> 'addresses', 'class' => 'form-control', 'label' => 'Alamat lengkap', 'div' => false,'placeholder' => 'Alamat lengkap penerima'])?>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="pull-left">
                        <strong><a href="javascript:void(0);" class="lokasi" data-container="body" data-toggle="popover" data-placement="right" tabindex="0">Lokasi <i class="fa fa-question-circle"></i></a></strong>
                    </div>
                    <div class="pull-right">
                        <strong><a href="javascript:void(0);" class="show-map-edit btn-map-edit" style="color:#a94442;" ><i class="fa fa-map-marker"></i> Pilih Lokasi</a></strong>
                    </div>
                    <div class="clearfix"></div>
                    -->
                </div>
                <div class="map-form-edit" style="display: none;">
                    <div class="msg-alamat"></div>
                    <div id="map-canvas-edit" style="height: 300px"></div>
                    <input type="hidden" name="latitude" id="default_latitude_edit" placeholder="Latitude" />
                    <input type="hidden" name="longitude" id="default_longitude_edit" placeholder="Longitude" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-radius btn-md pull-left btn-simpan-edit"><i class="fa fa-save"></i> Simpan alamat</button>
                <a class="btn btn-danger btn-radius btn-md pull-right btn-batal-edit" style="display:none;"> Batal</a>
                <div class="clearfix"></div>
            </div>
            <?= $this->Form->end(); ?>

        </div>
    </div>
</div>
<!-- end modal edit address -->

<div id="template-popover-lokasi" style="display:none">
    <div class="leaderboard-popover">
        Tandai lokasi dalam peta jika anda mengirim dengan layanan Pick Up (seperti Go Send, Grab Express)
    </div>
</div>

<?php $this->append('script'); ?>
<?php
$this->Html->script([
'https://maps.googleapis.com/maps/api/js',
], ['block' => true]);
?>
<script>
    $(document).ready(function(){

        $( "#address-modal" ).on('shown.bs.modal', function(e){
            showDef();
        });
        /* GOOGLE MAP API */
        var map = null;
        var marker;

        function showlocation() {
            if ("geolocation" in navigator) {
                /* geolocation is available */
                // One-shot position request.
                navigator.geolocation.getCurrentPosition(callback, error);
            } else {
                /* geolocation IS NOT available */
                console.warn("geolocation IS NOT available");
            }
        }

        function error(err) {
            console.warn('ERROR(' + err.code + '): ' + err.message);
        };

        function callback(position) {

            var lat = position.coords.latitude;
            var lon = position.coords.longitude;
            document.getElementById('default_latitude').value = lat;
            document.getElementById('default_longitude').value = lon;
            var latLong = new google.maps.LatLng(lat, lon);
            map.setZoom(16);
            map.setCenter(latLong);
        }


        function initMap(lat, lang) {
            var mapOptions = {
                center: new google.maps.LatLng(lat, lang),
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map-canvas"),
                mapOptions);
            google.maps.event.addListener(map, 'dragend', function() {
                requestAjaxPoi(map.getCenter().lat(), map.getCenter().lng(), function(cb){
                    $('.msg-alamat').html('<div class="alert alert-info"><strong>Alamat : </strong>'+cb+'</div>');
                });
                document.getElementById('default_latitude').value = map.getCenter().lat();
                document.getElementById('default_longitude').value = map.getCenter().lng();
            });
            $('<div/>').addClass('centerMarker').appendTo(map.getDiv())
            //do something onclick
                .click(function() {
                    var that = $(this);
                    showDef();

                    // if (!that.data('win')) {
                        // that.data('win', new google.maps.InfoWindow({
                        //     content: 'this is the center'
                        // }));
                    //     that.data('win').bindTo('position', map, 'center');
                    // }
                    that.data('win').open(map);
                });
        }

        function initMapEdit(lat, lang) {
            var mapOptions = {
                center: new google.maps.LatLng(lat, lang),
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map-canvas-edit"),
                mapOptions);
            google.maps.event.addListener(map, 'dragend', function() {
                requestAjaxPoi(map.getCenter().lat(), map.getCenter().lng(), function(cb){
                    $('.msg-alamat').html('<div class="alert alert-info"><strong>Alamat : </strong>'+cb+'</div>');
                });
                document.getElementById('default_latitude_edit').value = map.getCenter().lat();
                document.getElementById('default_longitude_edit').value = map.getCenter().lng();
            });
            $('<div/>').addClass('centerMarker').appendTo(map.getDiv())
            //do something onclick
                .click(function() {
                    var that = $(this);
                    showDefEdit();

                    // if (!that.data('win')) {
                        // that.data('win', new google.maps.InfoWindow({
                        //     content: 'this is the center'
                        // }));
                    //     that.data('win').bindTo('position', map, 'center');
                    // }
                    that.data('win').open(map);
                });
        }


        function showDef(){
            $('.main-form').show();
            $('.map-form').hide();
            $('.btn-simpan').show();
            $('.btn-batal').hide();
        }

        function showDefEdit(){
            $('.main-form-edit').show();
            $('.map-form-edit').hide();
            $('.btn-simpan-edit').show();
            $('.btn-batal-edit').hide();
        }

        function showMap(){
            $('.main-form').hide();
            $('.map-form').show();
            $('.btn-simpan').hide();
            $('.btn-batal').show();
        }

        function showMapEdit(){
            $('.main-form-edit').hide();
            $('.map-form-edit').show();
            $('.btn-simpan-edit').hide();
            $('.btn-batal-edit').show();
        }

        $('.show-map').on('click',function(){
            var check_city= $('#city-id').val();
            if(check_city != ''){
                showMap();
            }else{
                swal('silahkan pilih kota terlebih dahulu');
            }
        });

        $('.show-map-edit').on('click',function(){
            var check_city= $('#c-id').val();
            if(check_city != ''){
                showMapEdit();
            }else{
                swal('silahkan pilih kota terlebih dahulu');
            }
        });
        $('.btn-batal-edit').on('click',function(){
            showDefEdit();
        });
        $('.btn-batal').on('click',function(){
            showDef();
        });

        $('.lokasi').popover({
            html: true,
            content: function() {
                return $("#template-popover-lokasi").html();
            }
        }).on("show.bs.popover", function(e){
            $(this).data("bs.popover").tip().css({"max-width": '350px'});
        });


        $('#province-id').on('change',function(){
            var selected = $(this).val();
            var url = "<?php echo $this->Url->build(['action' => 'getCity','prefix' => 'user']);?>/";
            var title = 'Kota / Kabupaten';
            drawTo('#city-id', selected,url,title);
        });

        $('#city-id').on('change',function(){
            var selected = $(this).val();
            var url = "<?php echo $this->Url->build(['action' => 'getDistrict','prefix' => 'user']);?>/";
            var title = 'Kecamatan';
            drawTo('#subdistrict-id', selected,url,title);
        });

        function requestAjax(province, city, subdistrict,callback) {
            $.ajax({
                url : "<?php echo $this->Url->build(['controller' => 'search', 'action' => 'locator', 'prefix' => false]);?>",
                type : 'POST',
                dataType : 'JSON',
                data : {
                    provice : province,
                    city: city,
                    subdistrict :subdistrict,
                    _csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'
                },
                success : function(response){
                    if (typeof callback == 'function') {
                        callback(response);
                    }
                }

            })
        }

        function requestAjaxPoi(lat, lng,callback) {
            $.ajax({
                url : "<?php echo $this->Url->build(['controller' => 'search', 'action' => 'poi', 'prefix' => false]);?>",
                type : 'POST',
                dataType : 'JSON',
                data : {
                    lat : lat,
                    lng: lng,
                    _csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'
                },
                success : function(response){
                    if (typeof callback == 'function') {
                        callback(response);
                    }

                }

            })
        }


        $('#subdistrict-id').on('change',function(){
            var subdistrict = $('#subdistrict-id option:selected').text();
            var city = $('#city-id option:selected').text();
            var province = $('#province-id option:selected').text();

            requestAjax(province, city, subdistrict, function( cb ) {
                initMap(cb.lat, cb.lang);
                $('.btn-map').show();
            });

        });

        $('#p-id').on('change',function(){
            var selected = $(this).val();
            var url = "<?php echo $this->Url->build(['action' => 'getCity','prefix' => 'user']);?>/";
            var title = 'Kota / Kabupaten';
            drawTo('#c-id', selected,url,title);
        });

        $('#c-id').on('change',function(){
            var selected = $(this).val();
            var url = "<?php echo $this->Url->build(['action' => 'getDistrict','prefix' => 'user']);?>/";
            var title = 'Kecamatan';
            drawTo('#s-id', selected,url,title);
        });


        $('.delete-address-button').click(function() {
            var alias = $(this).data('alias');
            swal({
                title: 'Apakah ingin hapus alamat '+alias+' ini?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    location.href = '<?= $this->Url->build(['action' => 'deleteAddress']); ?>/' + $(this).data('id');
                } else {
                    swal('Data alamat '+alias+' tidak jadi di hapus.');
                }
            });
        });

        $('.set-primary-address-button').click(function() {
            var alias = $(this).data('alias');
            swal({
                title: 'Set alamat '+alias+' menjadi alamat utama?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((confirm) => {
                if (confirm) {
                    location.href = '<?= $this->Url->build(['action' => 'setPrimaryAddress']); ?>/' + $(this).data('id');
                }
            });
        });

        function drawTo(target, selected, url, title, callback){
            /* make ajax request */
            $.ajax({
                url: url,
                type : 'POST',
                data : {
                    id : selected,
                    _csrfToken: '<?= $this->request->getParam('_csrfToken'); ?>'
                },
                dataType : 'json',
                success: function(response){
                    var options = '';
                    options += '<option value="">Pilih '+title+'</option>';
                    $.each(response,function(k,v){
                        options += '<option value="'+k+'">'+v+'</option>';
                    })
                    $(target).html(options);
                    if (typeof callback === 'function') {
                        callback();
                    }
                }
            });
        }

        //add address
        var formEl = $("#form-address");
        formEl.submit(function(e) {
            var ajaxRequest = new ajaxValidation(formEl);
            ajaxRequest.post(formEl.attr('action'), formEl.find(':input'), function(response, data) {
                if (response.success) {
                    location.href = '<?= $this->Url->build(); ?>';
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });

        //add address
        var formEdit = $("#form-address-edit");
        formEdit.submit(function(e) {
            var ajaxRequest = new ajaxValidation(formEdit);
            ajaxRequest.post(formEdit.attr('action')+'/'+$('#edit-id').val(), formEdit.find(':input'), function(response, data) {
                if (response.success) {
                    location.href = '<?= $this->Url->build(); ?>';
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });

        $('.edit-address-button').on('click',function(){
            var id = $(this).data('id');
            $('#edit-id').val(id);
            $.ajax({
                type: 'GET',
                url: "<?php echo $this->Url->build(['action' => 'getAddress']);?>/"+id,
                success: function (data) {
                    $.each(data, function(k, v){
                        $('#form-address-edit').find('input[name='+k+']').val(v);
                        $('#form-address-edit').find('textarea[name='+k+']').val(v);
                    });
                    $('#form-address-edit').find('select[name=province_id]').val(data.province_id);
                    drawTo('#form-address-edit #c-id', data.province_id ,"<?php echo $this->Url->build(['action' => 'getCity','prefix' => 'user']);?>/",'Kota / Kabupaten', function() {
                        $('#form-address-edit').find('select[name=city_id]').val(data.city_id);
                    });
                    drawTo('#form-address-edit #s-id', data.city_id ,"<?php echo $this->Url->build(['action' => 'getDistrict','prefix' => 'user']);?>/",'Kecamatan', function() {
                        $('#form-address-edit').find('select[name=subdistrict_id]').val(data.subdistrict_id);
                    });



                    if((data.latitude != '0') && (data.longitude != '0')){
                        initMapEdit(data.latitude, data.longitude);
                    }else{
                        setTimeout(function(){
                            var province = $('#form-address-edit').find('select[name=province_id] option:selected').text();
                            var city = $('#form-address-edit').find('select[name=city_id] option:selected').text();
                            var subdistrict = $('#form-address-edit').find('select[name=subdistrict_id] option:selected').text();
                            requestAjax(province, city,subdistrict, function( cb ) {
                                initMapEdit(cb.lat, cb.lang);
                            });
                        }, 1000);
                    }

                }
            });

        })




    })
</script>
<?php $this->end();?>
