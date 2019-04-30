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



});



new Cleave('#input-card-number', {
    creditCard: true,
    onCreditCardTypeChanged: function (type) {
        // update UI ...
        if (type == 'unknown') {
            $('.credit-card-logo-wrapper img').each(function(i) {
               if (!$(this).hasClass('disabled')) {
                   $(this).addClass('disabled');
               }
            });
        } else {
            $('.credit-card-logo-wrapper').find('.' + type).removeClass('disabled');
        }

    }
});

var formCC = $("#add-credit-card-form");
formCC.submit(function(e) {
    var ajaxRequest = new ajaxValidation(formCC);
    ajaxRequest.post(formCC.attr('action'), formCC.find(':input'), function(response, data) {
        if (response.success) {
            console.log(response, data.result.data);
            wrapperHtmlCC(data.result.data.id, data.result.data['masked_card'], data.result.data.type);
            formCC.parents('.modal').modal('hide');
        } else {
            //render_error_message(data.error.message);
            //var alert = $("#login-popup .alert");
            //alert.removeClass('hide');
        }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.
});


function wrapperHtmlCC(id, masked_card, type) {
    var basePath = $('meta[name="_basePath"]').attr('content');
    var html = `<div class="row" style="padding: 5px 20px">
                <div class="col-lg-2 text-center">
                    <div class="radio">
                        <label>
                            <input type="radio" name="payment_method" value="cc" data-id="${id}">
                        </label>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="${basePath}/images/logo_cc/52x32/${type}.png" alt="cc" class="img-responsive">
                        </div>
                        <div class="col-lg-8">
                            <h5 class="tx-bank">
                                ${masked_card}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>`;
    $('.credit-card-input-wrapper').parent().after(html);
   $('.c-card-pembayaran__metode')
       .find('input[name="payment_method"]').each(function(i) {
           if ($(this).data('id') == id) {
               $(this).prop('checked', true);
               return false;
           } else {
               $(this).prop('checked', false);
           }
       });

}


$("#pay-now").on('click', function(e) {
    var address_id = $("#addressId").val();
    var payment_method = $('input[name="payment_method"]').val();
    var shipping = {};
    $('.shipping-option').each(function(i) {
        var id = $(this).data('id');
        shipping[id] = shipping[id] || {};
        var selected = $(this).find('option:selected');
        shipping[id].code = selected.val();
        shipping[id].service = selected.data('service');

    });

    console.log(address_id, payment_method, shipping);

});