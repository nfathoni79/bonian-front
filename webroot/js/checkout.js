"use strict"

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

    var total = numeral($('.zl-total').data('net-total')).value();
    $('.zl-subtotal').html(numeral(total+totalCost).format('0,0')) ;



});



new Cleave('#input-card-number', {
    creditCard: true,
    onCreditCardTypeChanged: function (type) {
        // update UI ...
        $('.credit-card-logo-wrapper img').each(function(i) {
            if (!$(this).hasClass('disabled')) {
                $(this).addClass('disabled');
            }
        });
        if (type != 'unknown') {
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
                            <input type="radio" name="payment_method" value="credit_card" data-id="${id}">
                        </label>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="${basePath}/images/logo_cc/128x80/${type}.png" alt="cc" class="img-responsive">
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

function getSelectedNumberCC(object)
{
    return $(object.parents('.row')
        .get(0))
        .find('.tx-bank').text().trim();
}

function getSelectedImageCC(object)
{
    return $(object.parents('.row')
        .get(0))
        .clone()
        .find('img')
        .css('width', '52px');
}

function processPayment(request) {
    var basePath = $('meta[name="_basePath"]').attr('content');
    $.ajax({
        url: basePath + '/checkout/process',
        type : 'POST',
        data : request,
        dataType : 'json',
        success: function(response){
            location.href = basePath + '/checkout';
        },
        error: function () {
            $("#login-popup").modal('show');
        }
    });
}


var formCCconfirm = $("#token-credit-card-payment");
formCCconfirm.submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.


    var basePath = $('meta[name="_basePath"]').attr('content');
    var modal = $(this).parents('.modal');
    var request = modal.data('request');
    var cvv = modal.find('#input-card-cvv-confirm')
    if (cvv.val() == "") {
        swal('Silahkan input cvv');
        cvv.focus();
        return;
    }

    request.cvv = cvv.val();

    var ajaxRequest = new ajaxValidation(formCCconfirm);
    ajaxRequest.post(formCCconfirm.attr('action'), request, function(response, data) {
        if (response.success) {
            console.log(response, data.result.token);

            if (data.result.token && data.result.token.redirect_url) {
                var win = $.fancybox.open({
                    src  : data.result.token.redirect_url,
                    type : 'iframe',
                    opts : {
                        afterShow : function( instance, current ) {
                            console.info( 'done!' );
                            console.log(instance, current)
                        }
                    }
                });

                window.addEventListener("message", function (event) {
                    console.log('receive', event.data);
                    /*
                    eci: "05"
                    status_code: "200"
                    status_message: "Success, 3D Secure token generated"
                    token_id: "352820-4357-90a15911-f8d1-45dc-980f-71daf5e4ec29"
                     */

                    if (event.data && event.data.status_code && event.data.status_code === '200') {
                        request.token = event.data.token_id;
                        processPayment(request);
                    }


                    win.close();
                }, false);
            }

            formCCconfirm.parents('.modal').modal('hide');
        } else {
            //render_error_message(data.error.message);
            //var alert = $("#login-popup .alert");
            //alert.removeClass('hide');
        }
    });

});


$('#create-token-cc').on('click', function(e) {





});


$("#pay-now").on('click', function(e) {
    var request = {
        address_id: $("#addressId").val()
    };
    var payment_method = $('input[name="payment_method"]:checked');
    var shipping = {};
    $('.shipping-option').each(function(i) {
        var id = $(this).data('origin-id');
        shipping[id] = shipping[id] || {};
        var selected = $(this).find('option:selected');
        shipping[id].code = selected.val();
        shipping[id].service = selected.data('service');

    });

    request.payment_method = payment_method.val();
    request.shipping = shipping;

    request._csrfToken = $('meta[name="_csrfToken"]').attr('content');

    switch(payment_method.val()) {
        case 'credit_card':
            request.card_id = payment_method.data('id');


            $("#input-card-number-confirm").val(getSelectedNumberCC(payment_method));

            $('.modal-confirm-cc-payment').modal('show')
                .data('request', request)
                .find('.credit-card-logo-wrapper')
                .html(getSelectedImageCC(payment_method));

        break;

        case 'bca_va':
        case 'bni_va':
        case 'permata_va':

        break;

        default:
            swal('Silahkan pilih metode pembayaran anda');
        break;
    }



});