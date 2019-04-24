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
        comboEnabeled(variant, selected);
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

function comboEnabeled(variant, selected){
    var list = new Array();
    $.each(data.spesific, function(k, v){
        $.each(v, function(kk,vv){
            var keyVariant = kk.split(',');
            if($.inArray(selected, keyVariant) !== -1){
                list.push(kk);
            }
        })
    });
    // ["Merah,m", "Merah,XL", "Merah,L"]
    // ["Merah,XL"]
    var listAvailable =  new Array();
    $('.zl-color').not('.'+variant+', .inactive' ).each(function(){
        listAvailable.push($(this).data('label'));
    });
    console.log(listAvailable); //["Merah", "Biru"]


    $.each(list, function(k,v){
         /* AVAILABE MERAH SAJA*/
        var attribute = v.split(',');
        $.each(attribute, function(kk,vv){
            if($.inArray(vv,listAvailable) !== -1){
                console.log(vv);
                $.each(listAvailable, function(kkk,vvv){
                    if(vvv != vv){
                        $('.zl-color').not('.'+variant).filter('[data-label="'+vvv+'"]').addClass('inactive');
                    }else{
                        $('.zl-color').not('.'+variant).filter('[data-label="'+vvv+'"]').removeClass('inactive');
                    }
                })
            }
        })
    });
}