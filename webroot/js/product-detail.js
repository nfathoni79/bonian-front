var data = null;
var variantAll = null;

$.ajax({
    type: "GET",
    url: window.location.href,
    dataType: "json",
    success: function (result) {
        data = result.data;
        variantAll = result.variant;
        startInit();
    }
});

function startInit(){

    $('.question').popover({
        html: true,
        content: function() {
            return $("#template-popover-question").html();
        }
    }).on("show.bs.popover", function(e){
        $(this).data("bs.popover").tip().css({"max-width": '350px'});
    });

    $('.zl-color').on('click',function(){
        if($(this).hasClass('inactive')){
            return false;
        }
        $(this).addClass('active').siblings().removeClass('active');
        $(this).find(':input').prop('checked',true);
        // var selected = $(this).find(':input:checked').val();
        var selected = $(this).data('label');
        var variant = $(this).data('option');
        var item = $(this).data('item');
        comboEnabeled(variant, selected,item);
        triggerCheckPrice();
    });

    $('.wh-wrapper').on('click',function(){
        if($(this).hasClass('inactive')){
            return false;
        }
        $(this).addClass('active').siblings().removeClass('active');
        $(this).find(':input[name="stock"]').prop('checked',true);
        triggerCheckPrice();
    });


    $('.btn-pay').on('click',function(){
        sendFrom(function(callback){
            if (callback && callback.status === "OK") {
                var basePath = $('meta[name="_basePath"]').attr('content');
                location.href = basePath + '/cart';
            }
        })
    })
    $('.btn-add').on('click', function() {
        sendFrom();
    });

}

function sendFrom(callback){

    var basePath = $('meta[name="_basePath"]').attr('content');
    var baseImagePath = $('meta[name="_baseImagePath"]').attr('content');
    var image = $('.product-image-zoom');
    var tittle = image.attr('title');
    image = baseImagePath + 'images/50x50/' + image.data('image-name');

    var dataForm = $("#form-cart").serializeArray();
    dataForm.push({name: '_csrfToken', value: $('meta[name="_csrfToken"]').attr('content')});

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
                addProductNotice('Berhasil ditambahkan ke keranjang belanja', '<img src="'+image+'" alt="">', tittle, 'success');
                $('.items_cart').html((cart+1));
                if(cart > 5){
                    $('.cart-counter').html((cartcounter+1));
                }
                var lengtrow = $('.products-cart').length;
                if(lengtrow < 5){
                    $("<tr class=\"products-cart cart-'+(lengtrow+1)+'\">\n" +
                        "<td class=\"text-center\" style=\"width:70px\">\n" +
                        "<a href=\"'+$(location).attr('href')+'\">\n" +
                        "<img src=\"'+basePath+'images/60x60/'+image+'\" data-image-name=\"'+image+'\" title=\"'+tittle+'\" alt=\"'+tittle+'\" class=\"preview\">\n" +
                        "</a>\n" +
                        "</td>\n" +
                        "<td class=\"text-left\">\n" +
                        "<a class=\"cart_product_name\" href=\"'+$(location).attr('href')+'\">'+tittle+'</a></td>\n" +
                        "<td class=\"text-center\">x1</td><td class=\"text-center\">Rp. '+$('#price-special').text()+'</td><td class=\"text-right\"><a onclick=\"cart.remove('+$('#productId').val()+', '+(lengtrow+1)+', this);\" class=\"fa fa-times fa-delete\"></a></td>\n" +
                        "</tr>").prependTo("#cart-table > tbody");
                }
            } else {
                $('.message').html('<div class="alert alert-danger" style="margin-bottom:0px !important;padding: 5px 10px !important;">'+response.message+'</div>')
                $(".notification").show();
            }

            if (typeof callback === 'function') {
                callback(response);
            }
        },
        error: function () {
            $("#login-popup").modal('show');
        }
    });

}

function triggerCheckPrice(){
    var warna =  $('.zl-color').find(':input[name="warna"]:checked').val();
    var ukuran =  $('.zl-color').find(':input[name="ukuran"]:checked').val();
    var stock = $('input[name="stock"]:checked').val();
    $.each(data.variant, function(key, value){
        if((value.options.Warna == warna) && (value.options.Ukuran == ukuran) ){
            if(value.price != 0){
                $('.text-add-price').html('Rp.'+value.price)
                $('.add-price').show();
            }else{
                $('.add-price').hide();
            }
            $('#priceId').val(value.price_id);

            $.each(value.stocks, function(k,v){
                if(v.branch_name == stock){
                    $('#stockId').val(v.stock_id);
                    return false;
                }
            })
        }
    })

}

function comboEnabeled(variant, selected, item){
    var list = new Array();

    $.each(data.spesific, function(k, v){
        $.each(v, function(kk,vv){
            var keyVariant = kk.split(',');
            if($.inArray(selected, keyVariant) !== -1){
                if(keyVariant[1] != undefined){
                    list.push(kk);
                }
            }
        })
    });

    $('.zl-color').not('.'+variant).addClass('inactive');

    list.forEach(function(data) {
        var combination = data.split(',');
        combination.forEach(function(i, v){
            $('.zl-color').not('.'+variant).filter('[data-label="'+combination[v]+'"]').removeClass('inactive');

        })
    });
    $('.zl-color').not('.'+variant).filter('[data-item="0"]').removeClass('inactive');

    $('.active').each(function(){
        var check = $(this).data('label');
        if(check != undefined){
            $('.zl-color').find(':input[value="'+check+'"]').prop('checked',true);
        }
    });
}