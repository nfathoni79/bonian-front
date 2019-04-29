$('.selected-address').on('click',function(){
    $('.zl-address-name').html($(this).data('recipent'));
    $('.zl-address-title').html('- ('+$(this).data('title')+')');
    $('.zl-address-address').html($(this).data('address'));
    $('.zl-address-postalcode').html($(this).data('postalcode'));
    $('.zl-address-phone').html($(this).data('phone'));
    $('#addressId').val($(this).data('id'));
    $('#modalAlamat').modal('hide');
})