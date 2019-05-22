
$(document).ready(function() {
	var path = location.pathname.split('/');
	var slug = path[path.length - 1];
	var data = null;
	var variantAll = null;
	var basePath = $('meta[name="_basePath"]').attr('content');
	$.ajax({
		type: "GET",
		url: basePath + '/products/get-detail/' + slug,
		dataType: "json",
		success: function (result) {
			data = result.data;
			variantAll = result.variant;
			startInit();
			cartDropdown();
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

		$('.btn-wishlist').click(function () {
			var basePath = $('meta[name="_basePath"]').attr('content');

			var self = this;
			var url = '';

			var data = {
				product_id: $(self).data('product-id'),
				_csrfToken: $('meta[name="_csrfToken"]').attr('content')
			};

			if (!$(this).hasClass('in-wish')) {
				wishlist('/wishlist', data, $('.btn-wishlist'));
			}else {
				wishlist('/wishlist/delete', data, $('.btn-wishlist'));

			}



		});

		function wishlist(url, data, self) {
			data.wishlist_id = $(self).attr('data-wishlist-id');
			$.ajax({
				url: basePath + url,
				type : 'POST',
				data : data,
				dataType : 'json',
				success: function(response){
					var wishCount, total;
					if (response && response.status === "OK") {
						if (!$(self).hasClass('in-wish')) {
							data.wishlist_id = response.result.data.wishlist_id;
							$(self).addClass('in-wish')
								.attr('data-wishlist-id', response.result.data.wishlist_id)
								.find('i.fa-heart')
								.removeClass('far')
								.addClass('fas');
							 wishCount = $(self).find('.wish-count');
							 total = parseInt(wishCount.text()) + 1;
							wishCount.text(total);
						} else {
							$(self).removeClass('in-wish')
								.removeAttr('data-wishlist-id')
								.find('i.fa-heart')
								.removeClass('fas')
								.addClass('far');
							 wishCount = $(self).find('.wish-count');
							 total = parseInt(wishCount.text()) - 1;
							wishCount.text(total);
						}
					}
				},
				error: function () {
					$("#login-popup").modal('show');
				}
			});
		}

		if ($('.discuss-list .bg-red').length > 10) {
			$('.discuss-list .bg-red:gt(10)').hide();
			$('.show-more').show();
		}

		$('.show-more').on('click', function() {
			//toggle elements with class .ty-compact-list that their index is bigger than 2
			$('.discuss-list .bg-red:gt(10)').toggle();
			//change text of show more element just for demonstration purposes to this demo
			$(this).text() === 'Show more' ? $(this).text('Show less') : $(this).text('Show more');
		});
		//
		// size_li = $(".discuss-list .bg-red").size();
		// x=2;
		// $('.discuss-list .bg-red:lt('+x+')').show();
		// $('#loadMore').click(function () {
		//     x= (x+5 <= size_li) ? x+5 : size_li;
		//     $('.discuss-list .bg-red:gt('+x+')').show();
		//     $('#showLess').show();
		//     if(x == size_li){
		//         $('#loadMore').hide();
		//     }
		// });
		// $('#showLess').click(function () {
		//     x=(x-5<0) ? 3 : x-5;
		//     $('.discuss-list .bg-red').not(':gt('+x+')').hide();
		//     $('#loadMore').show();
		//     $('#showLess').show();
		//     if(x == 3){
		//         $('#showLess').hide();
		//     }
		// });
	}

	function sendFrom(callback){

		var basePath = $('meta[name="_basePath"]').attr('content');
		var baseImagePath = $('meta[name="_baseImagePath"]').attr('content');
		var image = $('.product-image-zoom');
		var imagename =image.data('image-name');
		var tittle = image.attr('title');
		var price = parseInt(image.data('price'));
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

					var sku = $('#sku').val();

					if(($('#'+sku).length) == 0){

						$('.items_cart').html((cart+1));
						if(cart > 5){
							$('.cart-counter').html((cartcounter+1));
						}

						var lengtrow = $('.products-cart').length;

						$('<tr class="products-cart cart-'+(lengtrow+1)+' '+sku+'" id="'+sku+'"><td class="text-center" style="width:70px"><a href="'+$(location).attr('href')+'"><img src="'+image+'" data-image-name="'+imagename+'" title="'+tittle+'" alt="'+tittle+'" class="preview"></a></td><td class="text-left"><a class="cart_product_name" href="'+$(location).attr('href')+'">'+truncate(tittle, 25)+'</a></td><td class="text-center ">x<span class="cart-qty">'+$('#qty').val()+'</span></td><td class="text-center cart-price">Rp. '+addCommas(parseInt($('#qty').val()) * price)+'</td><td class="text-right"><a onclick="cart.remove('+response.result.data+', \'cart-'+(lengtrow+1)+'\', this);" class="fa fa-times fa-delete"></a></td></tr>').prependTo("#cart-table > tbody");

					}else{
						$('#'+sku).find('.cart-qty').html($('#qty').val());
						$('#'+sku).find('.cart-price').html('Rp. '+addCommas(parseInt($('#qty').val()) * price));
					}

					cartDropdown();
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
					$('.text-add-price').html('Rp.'+addCommas(value.price))
					$('.add-price').show();
				}else{
					$('.add-price').hide();
				}
				$('#priceId').val(value.price_id);
				$('#sku').val(value.sku);
				$.each(value.stocks, function(k,v){
					if(v.branch_name == stock){
						$('#stockId').val(v.stock_id);
						return false;
					}
				})

				$.each(value.stocks, function(k,v){
					$('.wh-'+v.branch_name).html(v.stock+' Stock');
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


	function addCommas(nStr)
	{
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}

	$('.btn-hapus-comment').on('click',function(){
		$('#komentar').val('');
	})

	$('.reply-msg').on('click',function(){
		var name = $(this).data('for-name');
		var id = $(this).data('for-id');
		$('.msg-for').html('Silahkan tulis diskusi untuk '+name).show();
		$('#forId').val(id);

		var x = $('#comment').offset().top - 300;
		jQuery('html,body').animate({scrollTop: x}, 500);
		$("#komentar").focus();

	});

	$('.btn-kirim-komen').on('click',function(){

		var basePath = $('meta[name="_basePath"]').attr('content');
		var dataForm = $("#comment").serializeArray();
		dataForm.push({name: '_csrfToken', value: $('meta[name="_csrfToken"]').attr('content')});



		var formComment = $("#comment");
		formComment.submit(function(e) {
			var ajaxRequest = new ajaxValidation(formComment);
			ajaxRequest.post( basePath + '/products/comment', dataForm, function(response, data) {
				// console.log(response)
				if(response != null){
					if (response.success) {
						window.location.href = "#tab-diskusi";
						location.reload();
					} else {

					}
				}else{
					$("#login-popup").modal('show');
				}
			});
			e.preventDefault(); // avoid to execute the actual submit of the form.
		});

		// $.ajax({
		//     url: basePath + '/products/comment',
		//     type : 'POST',
		//     data : dataForm,
		//     dataType : 'json',
		//     success: function(response){
		//         window.location.href = "#tab-diskusi";
		//         location.reload();
		//     },
		//     error: function () {
		//         $("#login-popup").modal('show');
		//     }
		// });
	})

	$('.delete-msg').on('click',function(e){

		e.preventDefault();

		var id = $(this).data('for-id');
		var basePath = $('meta[name="_basePath"]').attr('content');

		$.ajax({
			url: basePath + '/products/delete-comment',
			type : 'POST',
			data : {id: id, _csrfToken:$('meta[name="_csrfToken"]').attr('content')},
			dataType : 'json',
			success: function(response){
				window.location.href = "#tab-diskusi";
				location.reload();
			},
			error: function () {
				$("#login-popup").modal('show');
			}
		});
	})


	var hash = window.location.hash;
	$('#myTab a[href="' + hash + '"]').tab('show');
});
