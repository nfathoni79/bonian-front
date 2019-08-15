"use strict"

var is_finish_statuses = false;

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
    masked_card = formatCreditCard(masked_card);
    var html = `<div class="row" style="padding: 5px 20px">
                <div class="col-lg-2 pd-t-10 text-center">
                    <div class="pretty p-default p-round p-pulse">
                        <input type="radio" name="payment_method"  value="credit_card" data-id="${id}">
                        <div class="state p-danger">
                            <label> </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 pd-t-10">
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
            </div>
            <hr class="p-0 mg-0" />`;
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

function formatCreditCard(str) {
    if (str.match(/\d{6}-\d{4}/g)) {
        return str.replace('-', '******').match(/.{2,4}/g).join(' ');
    }
    return str;
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

function processPayment(request, cb) {
    var basePath = $('meta[name="_basePath"]').attr('content');
    $.ajax({
        url: basePath + '/checkout/process',
        type : 'POST',
        data : request,
        dataType : 'json',
        success: function(response){
            //location.href = basePath + '/checkout';
            if (typeof cb === 'function') {
                cb(true, response);
                return;
            }

            if (response.result && response.result.data && response.result.data.payment) {
                //location.href = basePath + '/checkout/success/' + response.result.data.payment.order_id;
                if (response.result.data.payment_method && response.result.data.payment_method === 'gopay') {
                    showBarcodeGopay(response.result.data);
                } else if (response.result.data.payment_method && response.result.data.payment_method === 'credit_card') {
                    //location.href = basePath + '/checkout/finish/' + response.result.data.payment.order_id;
                    location.href = basePath + '/user/history/detail/' + response.result.data.payment.order_id;
                } else {
                    location.href = basePath + '/checkout/confirmation/' + response.result.data.payment.order_id;
                }
            }
        },
        error: function (text) {
            switch (text.status) {
                case 406:
                case 404:
                    if (typeof cb === 'function') {
                        cb(false, text);
                        return;
                    }
                    swal(text.responseJSON.message);
                    break;
                case 302:
                case 401:
                    $("#login-popup").modal('show');
                    break;
            }
        }
    });
}

function processPaymentWallet(request) {
    var amount = $('.c-cart-card-pembayaran__content .zl-subtotal').text();
    bootbox.dialog({
        className: "medium-size",
        title: "Checkout menggunakan saldo",
        message: `Anda akan melakukan checkout sebesar Rp. ${amount}  menggunakan saldo, 
        silahkan konfirmasi password anda untuk melanjutkan.
        <div class="form-group">
            <label for="input-email">Konfirmasi password</label>
            <input type="password" name="password" value="" placeholder="Masukkan password anda" class="form-control">
        </div>
        `,
        buttons: {
            cancel: {
                label: 'Batal',
                className: 'btn-default'
            },
            confirm: {
                label: 'Lanjutkan',
                className: 'btn-danger',
                callback: function() {
                    var password = $(this).find('input[name="password"]');
                    password.next('.help-block').remove();
                    request.password = password.val();
                    processPayment(request, function(success, response) {
                        if (success) {
                            console.log('response', response);
                            location.href = basePath + '/user/history/detail/' + response.result.data.payment.order_id;
                        } else {
                            if (response.responseJSON.error && response.responseJSON.error.password) {
                                for(var i in response.responseJSON.error.password) {
                                    console.log(response.responseJSON.error.password[i]);
                                    password.after(`<div class="help-block">${response.responseJSON.error.password[i]}</div>`);
                                }
                            }else {
                                swal(response.responseJSON.message);
                            }
                        }
                    });
                    return false; // important to prevent close of dialog box
                }
            }
        },
        callback: function (result) {

        }
    });
}

function showBarcodeGopay(object) {
    var basePath = $('meta[name="_basePath"]').attr('content');
    var amount = 'Rp. ' + numeral(object.payment_amount).format('0,0');
    var modal = $('.modal-box-template');
    modal.find('.modal-title').html('Pembayaran melalui gopay');
    is_finish_statuses = false;
    var qrcode = null;
    if (object.payment && object.payment.actions && object.payment.actions instanceof Array) {
        for(var i in object.payment.actions) {
            if (object.payment.actions[i].name === 'generate-qr-code') {
                qrcode = object.payment.actions[i].url;
            }
        }
    }

var body = `<div class="row">`;
body += `
<div class="col-md-4 text-center">
    <div>Selesaikan transaksi anda dalam</div>
    <div class="order-timer">05:00</div>
    <img src="${qrcode}" alt="qrcode" />
    <div>Jumlah Pembayaran <span class="order-price">${amount}</span></div>
</div>`;
body += `
<div class="col-md-8">
    <h2>Cara membayar dengan Go-Pay</h2>
    <div class="row">
        <div class="col-md-7">
            <ol style="list-style-type: decimal;">
                <li> Buka aplikasi GO-JEK pada smartphone anda</li>
                <li> Pilih Scan QR (QR Code anda tidak akan ditampilkan jika saldo GO-PAY anda kurang dari Rp. 10.000)</li>
                <li> Arahkan kamera anda pada QR Code</li>
                <li> Periksa transaksi detail anda di dalam aplikasi GO-JEK anda kemudian klik tombol bayar.</li>
                <li> Transaksi anda telah selesai</li>
            </ol>
        </div>
        <div class="col-md-5">
            <img src="${basePath}/images/help/gopay/menu.png" class="img-responsive" />
            <img src="${basePath}/images/help/gopay/scan.png" class="img-responsive" />
        </div>
    </div>
</div>`;
body += `</div>`;
    modal.find('.modal-body').html(body);
    modal.find('div.order-timer').countdown(new Date((new Date()).getTime() + 1000 * 300), function(event) {
        $(this).text(
            event.strftime('%M:%S')
        );
    }).on('finish.countdown', function() {
        is_finish_statuses = true;
    });
    modal.modal({
        backdrop: 'static',
        keyboard: false
    });
    if (object.payment && object.payment.transaction_id) {
        (function poll(transaction_id) {
            if (is_finish_statuses) {
                return;
            }
            $.ajax({
                url: basePath + '/checkout/gopay-status',
                type: "POST",
                data: {
                    transaction_id: transaction_id,
                    _csrfToken: $('meta[name="_csrfToken"]').attr('content')
                },
                success: function(data) {
                    if (data.status_code && data.status_code === '200') {
                        is_finish_statuses = true;
                        //location.href = basePath + '/checkout/finish/' + data.order_id;
                        location.href = basePath + '/user/history/detail/' + data.order_id;
                    }
                },
                error: function() {
                    //is_finish_statuses = true;
                },
                dataType: "json",
                complete: setTimeout(function() {poll(transaction_id)}, 5000),
                timeout: 4000
            });
        })(object.payment.transaction_id);
    }


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
    modal.data('request', request);

    var ajaxRequest = new ajaxValidation(formCCconfirm);
    ajaxRequest.post(formCCconfirm.attr('action'), request, function(response, data) {
        if (response.success) {

            if (data.result.token && data.result.token.redirect_url) {
                var win = $.fancybox.open({
                    src  : data.result.token.redirect_url,
                    type : 'iframe',
                    opts : {
                        afterShow : function( instance, current ) {

                        }
                    }
                });


            }

            formCCconfirm.parents('.modal').modal('hide');
        } else {
            //render_error_message(data.error.message);
            //var alert = $("#login-popup .alert");
            //alert.removeClass('hide');
            switch (data.status) {
                case 406:
                case 404:
                    swal(data.responseJSON.message);
                    break;
                case 302:
                case 401:
                    $("#login-popup").modal('show');
                    break;
            }
        }
    });

});

window.addEventListener("message", function (event) {

    var request = formCCconfirm.parents('.modal').data('request');
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

    $.fancybox.close();
}, false);


$('#create-token-cc').on('click', function(e) {

});

/**
 * midtrans snap
 */

$("#pay-now").on('click', function(e) {
    var request = {
        address_id: $("#addressId").val()
    };
    var payment_method = $('input[name="payment_method"]:checked');
    var shipping = {};
    $('.shipping-option').each(function (i) {
        var id = $(this).data('origin-id');
        shipping[id] = shipping[id] || {};
        var selected = $(this).find('option:selected');
        shipping[id].code = selected.val();
        shipping[id].service = selected.data('service');

    });

    request.payment_method = payment_method.val();
    request.shipping = shipping;

    request._csrfToken = $('meta[name="_csrfToken"]').attr('content');

    processPayment(request, function(status, response) {
        var basePath = $('meta[name="_basePath"]').attr('content');
        if (status && response.result.data) {
            snap.pay(response.result.data.snap_token, {
                onSuccess: function(result){
                    //console.log('onSuccess', result);
                    location.href = basePath + '/user/history/detail/' + result.order_id;
                },
                // Optional
                onPending: function(result){
                    //console.log('onPending', result);
                    location.href = basePath + '/checkout/confirmation/' + result.order_id;
                },
                // Optional
                onError: function(result){
                    console.log('onError', result);
                }
            });
        }
    });



    console.log(request);

});

/*
midtrans core API

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
            processPayment(request);
        break;
        case 'gopay':
            processPayment(request);
        break;
        case 'wallet':
            processPaymentWallet(request);
        break;

        default:
            swal('Silahkan pilih metode pembayaran anda');
        break;
    }



});
*/
