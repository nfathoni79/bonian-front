var data = null;

$.ajax({
    type: "GET",
    url: window.location.href,
    dataType: "json",
    success: function (result) {
        data = result;
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
    });




    var formEl = $("#form-cart");
    formEl.submit(function(e) {
        console.log($( this ).serializeArray());
        e.preventDefault();
    });

    console.log(data);
}

function triggerCheckPrice(){
    var listInputName = new Array();
    $('.zl-color').find(':input').each(function(){
        var found = jQuery.inArray($(this).attr('name'), listInputName);
        if (found <= -1) {
            listInputName.push($(this).attr('name'));
        }
    });
    var warna =  $('.zl-color').find(':input[name="warna"]:checked').val();
    var ukuran =  $('.zl-color').find(':input[name="ukuran"]:checked').val();
    if(warna && ukuran){
        $.each(data.variant, function(key, value){
            if((value.options.Warna == warna) && (value.options.Ukuran == ukuran) ){
                if(value.price != 0){
                    $('.text-add-price').html('Rp.'+value.price)
                    $('.add-price').show();
                }else{
                    $('.add-price').hide();
                }
            }
        })
    }
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
    // $('.zl-color').not('.'+variant).find(':input[name!="'+variant+'"]').prop('checked',false);

    console.log(list);
    list.forEach(function(data) {
        var combination = data.split(',');
        combination.forEach(function(i, v){
            // $('.zl-color').not('.'+variant).find(':input[value="'+combination[v]+'"]').prop('checked',true);
            $('.zl-color').not('.'+variant).filter('[data-label="'+combination[v]+'"]').removeClass('inactive');
            $('.zl-color').not('.'+variant).filter('[data-item="0"]').removeClass('inactive');
        })
    });


    $('.active').each(function(){
        var check = $(this).data('label');
        if(check != undefined){
            $('.zl-color').find(':input[value="'+check+'"]').prop('checked',true);
        }
    });
}