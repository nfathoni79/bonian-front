$('.selected-address').on('click',function(){
    $('.zl-address-name').html($(this).data('recipent'));
    $('.zl-address-title').html('- ('+$(this).data('title')+')');
    $('.zl-address-address').html($(this).data('address'));
    $('.zl-address-postalcode').html($(this).data('postalcode'));
    $('.zl-address-phone').html($(this).data('phone'));
    $('#addressId').val($(this).data('id'));
    $('#modalAlamat').modal('hide');

    var basePath = $('meta[name="_basePath"]').attr('content');

    $.ajax({
        url: basePath + '/checkout/change-address',
        type : 'POST',
        data : {
            address_id : $(this).data('id'),
            _csrfToken: $('meta[name="_csrfToken"]').attr('content')
        },
        dataType : 'json',
        success: function(response){
            location.href = basePath + '/checkout';
        },
        error: function () {
            $("#login-popup").modal('show');
        }
    });
});


$('.shipping-option').on('change',function(){
    var id = $(this).data('id');
    var cost = $(this).find("option:selected").data('cost');
    var etd = $(this).find("option:selected").data('etd');
    $('.shipping-cost-'+id).html(numeral(cost).format('0,0'));
    if(etd){
        $('.shipping-etd-'+id).html('Estimasi waktu '+etd+' hari kerja');
    }else{
        $('.shipping-etd-'+id).html('-');
    }

    var totalCost = 0;
    $('.shipping-cost').each(function(index) {
        totalCost += numeral($(this).text()).value();
    });
    $('.zl-total-ongkir').html(numeral(totalCost).format('0,0')) ;

    var total = numeral($('.zl-total').text()).value();
    $('.zl-subtotal').html(numeral(total+totalCost).format('0,0')) ;



})