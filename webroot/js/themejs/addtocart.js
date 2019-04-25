/* -------------------------------------------------------------------------------- /
	
	Magentech jQuery
	Created by Magentech
	v1.0 - 20.9.2016
	All rights reserved.
	
/ -------------------------------------------------------------------------------- */


	// Cart add remove functions
	var cart = {
		'remove': function(product_id, cart_key, object) {

            var basePath = $('meta[name="_basePath"]').attr('content');
            var baseImagePath = $('meta[name="_baseImagePath"]').attr('content');
            var image = $(object).parents('.products-cart').find('img');
            var name = image.attr('title');
            image = baseImagePath + 'images/50x50/' + image.data('image-name');

            var cart = parseInt($('.items_cart').text());
            var cartcounter = parseInt($('.cart-counter').text());
            $.ajax({
                url: basePath + '/cart/delete',
                type : 'POST',
                data : {
                    cartid : product_id,
                    _csrfToken: $('meta[name="_csrfToken"]').attr('content')
                },
                dataType : 'json',
                success: function(response){

                    if (response && response.status === "OK") {
                        addProductNotice('Berhasil dihapus', '<img src="'+image+'" alt="">', name, 'success');
                        $('.'+cart_key).remove();
                        $('.items_cart').html((cart-1));
                        if(cartcounter > 0){
                            $('.cart-counter').html((cartcounter-1));
						}

                    } else {
                        addProductNotice('Gagal dihapus dari cart', '<img src="'+image+'" alt="">', '', 'success');
                    }
                },
                error: function () {
                    $("#login-popup").modal('show');
                }
            });
		}
	}

	var wishlist = {
		'add': function(product_id, object) {
			var basePath = $('meta[name="_basePath"]').attr('content');
			var baseImagePath = $('meta[name="_baseImagePath"]').attr('content');
			var image = $(object).parents('.products').find('img');
			image = baseImagePath + 'images/50x50/' + image.data('image-name');


			$.ajax({
				url: basePath + '/wishlist',
				type : 'POST',
				data : {
					product_id : product_id,
					_csrfToken: $('meta[name="_csrfToken"]').attr('content')
				},
				dataType : 'json',
				success: function(response){

					if (response && response.status === "OK") {
						addProductNotice('Berhasil ditambahkan ke Wishlist', '<img src="'+image+'" alt="">', response.result.data.name, 'success');
					} else {
						addProductNotice('Sudah ada dalam wishlist', '<img src="'+image+'" alt="">', '', 'success');
					}
				},
				error: function () {
					$("#login-popup").modal('show');
				}
			});


		}
	}
	var compare = {
		'add': function(product_id) {
			addProductNotice('Product added to compare', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>', 'success');
		}
	}

	/* ---------------------------------------------------
		jGrowl – jQuery alerts and message box
	-------------------------------------------------- */
	function addProductNotice(title, thumb, text, type) {
		"use strict";
		$.jGrowl.defaults.closer = false;
		//Stop jGrowl
		//$.jGrowl.defaults.sticky = true;
		var tpl = thumb + '<h3>'+text+'</h3>';
		$.jGrowl(tpl, {		
			life: 4000,
			header: title,
			speed: 'slow',
			theme: type
		});
	}

