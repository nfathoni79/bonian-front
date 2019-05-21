
var checked_all = false;

var check_all_button = document.querySelector('#check-all');
var target_checkboxes = document.querySelectorAll('.checkboxes');

target_checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {

        var unchecked = Array.prototype.slice.call(target_checkboxes).filter(checkbox => !checkbox.checked);

        if (unchecked.length) {
            checked_all = false;
            check_all_button.checked = false;
        } else {
            checked_all = true;
            check_all_button.checked = true;
        }
    });
});

$(document).ready(function() {
    target_checkboxes.forEach(function (checkbox) {
        $(checkbox).trigger('click');
    });
});


check_all_button.addEventListener('click', function () {
    checked_all = !checked_all;
    target_checkboxes.forEach(function (checkbox) {
        //checkbox.checked = checked_all;
        $(checkbox).trigger('click');
    });
});

$.initQuantity = function ($control) {
    $control.each(function () {
        var $this = $(this),
            data = $this.data("inited-control"),
            $plus = $(".input-group-addon:last", $this),
            $minus = $(".input-group-addon:first", $this),
            $value = $(".form-control", $this);
        var cart_id = $value.data('id');
        if (!data) {
            $control.attr("unselectable", "on").css({
                "-moz-user-select": "none",
                "-o-user-select": "none",
                "-khtml-user-select": "none",
                "-webkit-user-select": "none",
                "-ms-user-select": "none",
                "user-select": "none"
            }).on("selectstart", function () {
                return false
            });
            $plus.on("click", function () {
                var val = parseInt($value.val(), 10) + 1;
                if( parseInt($value.val()) <  parseInt($value.attr('max'))){
                    $value.val(val);
                    qtyChange(cart_id, this);
                }
                return false
            });
            $minus.on("click", function () {
                var val = parseInt($value.val(), 10) - 1;
                $value.val(val > 0 ? val : 1);
                if($value.val() >= 1){
                    qtyChange(cart_id, this);
                }
                return false
            });
            $value.blur(function () {
                var val = parseInt($value.val(), 10);
                var maxQty = parseInt($value.attr('max'));
                if(val > maxQty){
                    $value.val(maxQty)
                }else{
                    $value.val(val > 0 ? val : 1)
                }
                qtyChange(cart_id, this);
            })
        }
    })
};
$.initQuantity($(".quantity-controls"));

function qtyChange(data_id, object){
    var data_qty = parseInt($('#zl-qty-'+data_id).val());
    var harga_satuan = $('#zl-satuan-'+data_id).data('value');
    var harga_tambahan = $('#zl-addprice-'+data_id).data('value');
    var point = parseInt($('#zl-point-'+data_id).text());
    harga_tambahan =  (harga_tambahan > 0) ? harga_tambahan : 0;

    var dataForm = $("#cart-"+data_id).serializeArray();
    dataForm.push({name: '_csrfToken', value: $('meta[name="_csrfToken"]').attr('content')},{name: 'qty', value: data_qty});

    var basePath = $('meta[name="_basePath"]').attr('content');
    var baseImagePath = $('meta[name="_baseImagePath"]').attr('content');
    var image = $('.img-'+data_id);
    var imagename =image.data('image-name');
    var tittle = image.attr('title');
    var price = parseInt(image.data('price'));
    image = baseImagePath + 'images/50x50/' + image.data('image-name');

    var total, totalpoint;
    total = ((harga_satuan * data_qty) + (harga_tambahan * data_qty));
    totalpoint = point * data_qty;
    $.ajax({
        url: basePath + '/cart/add',
        type : 'POST',
        data : dataForm,
        dataType : 'json',
        success: function(response){

            var cart = parseInt($('.items_cart').text());
            var cartcounter = parseInt($('.cart-counter').text());
            if (response && response.status === "OK") {
                $(".notification").hide();
                // addProductNotice('Berhasil ditambahkan ke keranjang belanja', '<img src="'+image+'" alt="">', tittle, 'success');

                var sku = $('#sku-'+data_id).val();

                if(($('#'+sku).length) == 0){

                    $('.items_cart').html((cart+1));
                    if(cart > 5){
                        $('.cart-counter').html((cartcounter+1));
                    }

                    var lengtrow = $('.products-cart').length;

                    $('<tr class="products-cart cart-'+(lengtrow+1)+'" id="'+sku+'"><td class="text-center" style="width:70px"><a href="#"><img src="'+image+'" data-image-name="'+imagename+'" title="'+tittle+'" alt="'+tittle+'" class="preview"></a></td><td class="text-left"><a class="cart_product_name" href="#">'+tittle+'</a></td><td class="text-center ">x<span class="cart-qty">'+data_qty+'</span></td><td class="text-center cart-price">Rp. '+numeral(total).format('0,0')+'</td><td class="text-right"><a onclick="cart.remove('+response.result.data+', \'cart-'+(lengtrow+1)+'\', this);" class="fa fa-times fa-delete"></a></td></tr>').prependTo("#cart-table > tbody");

                }else{
                    $('#'+sku).find('.cart-qty').html(data_qty);
                    $('#'+sku).find('.cart-price').html('Rp. '+numeral(total).format('0,0'));
                }

                cartDropdown();
                grandTotal();
            } else {
                $('.message').html('<div class="alert alert-danger" style="margin-bottom:0px !important;padding: 5px 10px !important;">'+response.message+'</div>')
                $(".notification").show();
            }

        },
        error: function () {
            $("#login-popup").modal('show');
        }
    });

    $('#zl-total-'+data_id).html(numeral(total).format('0,0'));
    $('#zl-total-point-'+data_id).html(numeral(totalpoint).format('0,0'));

    if($(object).parents('.wrapper-cart').eq(0).find('.checkboxes').is(':checked')){
        grandTotal();
    }

}

$('.delete-cart').on('click',function(){
    var data_id = $(this).data('cart-id');
    var data_key = $(this).data('cart-key');
    var data_sku = $(this).data('cart-sku');
    var product_id = $(this).data('product-id');
    var basePath = $('meta[name="_basePath"]').attr('content');
    var baseImagePath = $('meta[name="_baseImagePath"]').attr('content');
    var image = $('.img-'+data_id);
    var imagename =image.data('image-name');
    var tittle = image.attr('title');
    image = baseImagePath + 'images/150x150/' + image.data('image-name');

    $('.image-modal').html('<img src="'+image+'" data-image-name="'+imagename+'" title="'+tittle+'" alt="'+tittle+'" class="img-responsive">');
    $('.title-modal').html(tittle);

    $('.zl-hapus').data('cart-key', data_key);
    $('.zl-hapus').data('cart-sku', data_sku);
    $('.zl-hapus').data('product-id', product_id);
    $('.zl-whistlist').data('cart-sku', data_sku);
    $('.zl-whistlist').data('cart-key', data_key);
    $('.zl-whistlist').data('product-id', product_id);
});

$('.zl-hapus').on('click',function(){
    deleteCart($(this).data('cart-key'),true);
    $('#modalProduct').modal('toggle');
})

$('.zl-whistlist').on('click',function(){
    var basePath = $('meta[name="_basePath"]').attr('content');
    $.ajax({
        url: basePath + '/wishlist',
        type : 'POST',
        data : {
            product_id : $(this).data('product-id'),
            _csrfToken: $('meta[name="_csrfToken"]').attr('content')
        },
        dataType : 'json',
        success: function(response){
            // deleteCart($(this).data('cart-key'),false);
            // location.reload();
        },
        error: function () {
            $("#login-popup").modal('show');
        }
    });

    deleteCart($(this).data('cart-key'),true);
})

function deleteCart(product_id, rel){
    var basePath = $('meta[name="_basePath"]').attr('content');
    var cart = parseInt($('.items_cart').text());
    $.ajax({
        url: basePath + '/cart/delete',
        type : 'POST',
        data : {
            cartid : product_id,
            _csrfToken: $('meta[name="_csrfToken"]').attr('content')
        },
        dataType : 'json',
        success: function(response){
            if(rel){
                location.reload();
            }
        },
        error: function () {
            $("#login-popup").modal('show');
        }
    });
}

$('.zl-note').on('click',function(){
    $('.zl-note-'+$(this).data('id')).show();
})


$("#claim-form input[type='text']").on("keyup", function(){
    if($(this).val() != "" == true){
        $("input[type='submit']").removeAttr("disabled");
    } else {
        $("input[type='submit']").attr("disabled", "disabled");
    }
});

var formEl = $("#claim-form");
formEl.submit(function(e) {
    var ajaxRequest = new ajaxValidation(formEl);
    ajaxRequest.post(formEl.attr('action'), formEl.find(':input'), function(response, data) {
        if(data.is_error){
            swal(data.message);
        }else {
            window.location.href = "#modalvoucher";
            location.reload();
        }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.
});


var hash = window.location.hash;
if(hash){
    $(hash).modal('show');
}

$('.zl-checkout').on('click',function(){

    var basePath = $('meta[name="_basePath"]').attr('content');
    var voucher = $("input[name='voucher']:checked").val();
    var kupon = $("input[name='kupon']:checked").val();
    var point = $("#point").val();

    var forData =  new Array();
    forData.push(
        {name: '_csrfToken', value: $('meta[name="_csrfToken"]').attr('content')},
        {name: 'voucher', value: voucher},
        {name: 'point', value: point},
        {name: 'kupon', value: kupon},
    );
    $('.note').each(function(i, obj) {
        forData.push({name: $(this).attr("name"), value: $(this).val()});
    });
    $('.checkboxes').each(function(i, obj) {
        if(this.checked){
            forData.push({name: $(this).attr("name"), value: $(this).val()});
            forData.push({name: $(this).parents('.row').eq(0).find('.zl-qty').attr('name'), value: $(this).parents('.row').eq(0).find('.zl-qty').val()});
            forData.push({name: "cart["+$(this).data('key')+"][stock_id]", value: $(this).data('stock-id')});

        }
    });



    $.ajax({
        url: basePath + '/checkout/validation',
        type : 'POST',
        data : forData,
        dataType : 'json',
        success: function(response){
            location.href = basePath + '/checkout';
        },
        error: function (text) {

            switch (text.status) {
                case 200:

                    break;
                case 406:
                    swal(text.responseJSON.message);
                    break;
                case 302:
                case 401:
                    $("#login-popup").modal('show');
                    break;
            }

        }
    });

})

$( ".number-box" ).change(function() {
    var max = parseInt($(this).attr('max'));
    var min = parseInt($(this).attr('min'));
    if ($(this).val() > max)
    {
        $(this).val(max);
    }
    else if ($(this).val() < min)
    {
        $(this).val(min);
    }
});





$('#point').on('change',function(){
    grandTotal();
})
$('.btn-v-ok').on('click',function(){
    $('.checkboxes').each(function(i, obj) {
        if(this.checked){
            grandTotal();
            return false;
        }
    });
    var radioValue = $("input[name='voucher']:checked").val();
    var codeVoucher = $("input[name='voucher']:checked").data('code');
    $('.btn-voucher').text(codeVoucher);
    if(radioValue){
        $("#modalvoucher").modal('hide');
    }else{
        swal("Tidak ada voucer yang di pilih");
    }
})



$('.btn-c-ok').on('click',function(){
    var radioValue = $("input[name='kupon']:checked").val();
    var priceValue = $("input[name='kupon']:checked").data('price');
    $('.btn-kupon').text('Kupon '+numeral(priceValue).format('0,0'));
    $('.btn-kupon').attr('data-product-id', $("input[name='kupon']:checked").data('product-id') );
    if(radioValue){
        $("#modalCoupon").modal('hide');
        $('.checkboxes').each(function(i, obj) {
            if(this.checked){
                $('#coupon-price').html(numeral(priceValue).format('0,0'));
                grandTotal();
                return false;
            }
        });
    }else{
        swal("Tidak ada kupon yang di pilih");
    }
})

$('.checkboxes').on('change',function(){
    if(!$(this).is(':checked')){
        if($(this).data('product-id') === $('.btn-kupon').data('product-id')){
            $('.btn-kupon')
                .removeAttr('data-product-id')
                .text('Pilih Kupon');
        }
    }
    var basePath = $('meta[name="_basePath"]').attr('content');

    $('.checkboxes').each(function(i, obj) {
        var id = $(this).val();
        if($(this).is(':checked')){
            var forData =  new Array();
            forData.push(
                {name: '_csrfToken', value: $('meta[name="_csrfToken"]').attr('content')},
                {name: $(this).attr("name"), value: $(this).val()}
            );

            $.ajax({
                url: basePath + '/cart/get-coupon',
                type : 'POST',
                data : forData,
                dataType : 'json',
                success: function(response){
                    if(response != ''){

                        var drawHtml = '\n' +
                            '<div class="panel panel-default zl-coupons-'+id+'">\n' +
                            '<div class="panel-body" style="padding:0px;">\n' +
                            '<div class="row">\n' +
                            '<div class="col-md-5">\n' +
                            '<div class="v-colored-box" style="height: 10.25rem !important;">\n' +
                            '<div class="v-text-discount">Kupon</div>\n' +
                            '</div>\n' +
                            '</div>\n' +
                            '<div class="col-md-5 v-text-box">\n' +
                            'Kupon produk <br><strong>'+response.product_coupon.product.name.trimToLength(25)+'</strong><br> potongan harga Rp. '+numeral(response.product_coupon.price).format('0,0')+'\n' +
                            '</div>\n' +
                            '<div class="col-md-2 mg-t-45">\n' +
                            '<div class="pretty p-default p-round p-pulse p-bigger">\n' +
                            '<input type="radio" name="kupon" value="'+response.id+'" data-price="'+response.product_coupon.price+'" data-product-id="'+response.product_coupon.product_id+'">\n' +
                            '<div class="state p-danger">\n' +
                            '<label>Pilih</label>\n' +
                            '</div>\n' +
                            '</div>\n' +
                            '</div>\n' +
                            '</div>\n' +
                            '</div>\n' +
                            '</div>';
                        if($('.wrapper-coupon').find('.zl-coupons-'+id).length == 0){
                            $('.wrapper-coupon').append(drawHtml);
                        }
                    }
                },
                error: function (text) {
                }
            });
        }else{

            $('.zl-coupons-'+id).remove();
        }
    });
    grandTotal();
})

function grandTotal(){
    var total_belanja = 0 ;
    var total_point = 0 ;
    $('.checkboxes').each(function(i, obj) {
        if(this.checked){
            total_belanja += numeral($(this).parents('.row').eq(0).find('.zl-total').text()).value();
            total_point += numeral($(this).parents('.row').eq(0).find('.total-point').text()).value();
        }
    });

    $("#subtotal").html(numeral((total_belanja)).format('0,0'))
    $("#subtotal-point").html(numeral((total_point)).format('0,0'))

    var subtotal = total_belanja;
    var coupon = $("input[name='kupon']:checked").data('price') ? $("input[name='kupon']:checked").data('price') : 0;

    var point = numeral($('#point').val()).value();

    var terpilih = false;
    $('.checkboxes').each(function(i, obj) {
        if(this.checked){
            terpilih = true;
            return false;
        }
    });

    if(terpilih){
        var total = subtotal - coupon;
        var vPrice = $("input[name='voucher']:checked").data('price');
        var vDiskon = $("input[name='voucher']:checked").data('diskon');
        var vGroup = $("input[name='voucher']:checked").data('group');


        if(vGroup != undefined){
            if(vGroup){

                var values = vGroup.toString().split(",");

                var incat = 0;
                var outcat = 0;



                $('.zl-total').each(function(k, v){
                    if ($(this).parents('.wrapper-cart').find('input.checkboxes').is(':checked')) {
                        if($.inArray($(this).data('cat').toString(), values) !== -1){
                            incat += numeral($(this).text()).value();
                        }else{
                            outcat += numeral($(this).text()).value();
                        }
                    }

                });

                var cut = incat * (vDiskon / 100);

                if(cut > vPrice){
                    var gTotal = (incat - vPrice) + outcat;
                    $('#voucher-price').html(numeral((vPrice)).format('0,0'));
                    $('#grandtotal').html(numeral((total-vPrice-point)).format('0,0'));
                }else{
                    var gTotal = (incat - cut) + outcat;
                    $('#voucher-price').html(numeral((cut)).format('0,0'));
                    $('#grandtotal').html(numeral((total-cut-point)).format('0,0'));
                }

            }else{
                var gTotal = 0;
                $('.zl-total').each(function(k, v){
                    if ($(this).parents('.wrapper-cart').find('input.checkboxes').is(':checked')) {
                        gTotal += numeral($(this).text()).value();
                    }
                });
                var cut = gTotal * (vDiskon / 100);
                if(cut > vPrice){
                    var hit = gTotal - vPrice;
                    $('#voucher-price').html(numeral((vPrice)).format('0,0'));
                    $('#grandtotal').html(numeral((total-vPrice-point)).format('0,0'));
                }else{
                    var hit = gTotal - cut;
                    $('#voucher-price').html(numeral((cut)).format('0,0'));
                    $('#grandtotal').html(numeral((total-cut-point)).format('0,0'));
                }
            }
        }else{

            $('#grandtotal').html(numeral((total-point)).format('0,0'));
        }
        $('#coupon-price').html(numeral((coupon)).format('0,0'));
    }else{
        $('#grandtotal').html(numeral((0)).format('0,0'));
        $('#coupon-price').html(numeral((0)).format('0,0'));
        $('#voucher-price').html(numeral((0)).format('0,0'));
        $('#subtotal').html(numeral((0)).format('0,0'));
    }
}


$('.hapus-selected').on('click',function(){
    var boxes= new Array();

    boxes.push({name: '_csrfToken', value: $('meta[name="_csrfToken"]').attr('content')});
    $(".checkboxes").each(function() {
        if( $(this).prop("checked") ){
            boxes.push( {name: $(this).prop("name"), value: $(this).val()});
        }
    });

    var basePath = $('meta[name="_basePath"]').attr('content');
    $.ajax({
        url: basePath + '/cart/delete-all',
        type : 'POST',
        data : boxes,
        dataType : 'json',
        success: function(response){
            location.reload();
        }
    });
})


String.prototype.trimToLength = function(m) {
    return (this.length > m)
        ? jQuery.trim(this).substring(0, m).split(" ").slice(0, -1).join(" ") + "..."
        : this;
};