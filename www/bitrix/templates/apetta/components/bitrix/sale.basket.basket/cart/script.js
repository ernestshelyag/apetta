function change_quantity(_this) {
	var id = $(_this).attr('data-id'),
		price = parseInt($(_this).attr('data-price')),
		product_id = parseInt($(_this).attr('data-product')),
		count = parseInt($(_this).val());
	$.ajax({
		url: '/ajax/change_cart_quantity.php',
		data: { 'cart_item': id, 'new_value' : count ,'product_id':product_id}
	}).done(function(data){
		var result = JSON.parse(data);
		$('#'+id+' .item-price__all span').html(result.FINAL_PRICE);
		$('#'+id+' .item-price span.price').html(result.PRICE);
		$('.prices .price').html(result.ALL_SUM);

        update_cart_line();
        update_count_cart_line();
	});
}
//количества товаров
function update_count_cart_line() {
    $.ajax({
        url: '/ajax/update_count_line_cart.php',
        success: function(data){
            $('.functions-cart').remove();
            $('.functions--wrapper').append(data);
        }
    });
}
//обновление корзины
function update_cart_line() {
    $.ajax({
        url: '/ajax/line_cart.php',
        success: function(data){
            $('#cart_line #basket_items_list').remove();
            $('#cart_line').append(data);
        }
    });
}


$(document).on('change','.count_block input',function () {
	change_quantity(this);
    update_cart_line();
    update_count_cart_line();
});

// изменение количества товара в корзине
$(document).on('click','.count_block div',function () {

	var count = parseInt($('input#QUANTITY_INPUT_'+$(this).attr('data-id')).val());
	if($(this).hasClass('minus') ){
		var new_count = parseInt(count-1);

	}else if($(this).hasClass('plus')){
		var new_count = parseInt(count+1);
	}
	if(new_count >= 1){
		$('input#QUANTITY_INPUT_'+$(this).attr('data-id')).val(new_count);
		change_quantity($('input#QUANTITY_INPUT_'+$(this).attr('data-id')));
	}
});

// Удаленный товар
$(document).on('click', '.item-delete a', function(e) {
	e.preventDefault();
	var id = $(this).attr('data-id'),
	product_id = parseInt($(this).attr('data-product'))
	$.ajax({
		url: '/ajax/change_cart_quantity.php',
		data: { 'cart_item': id, 'new_value' : 0,'product_id': product_id }
	}).done(function(data){
		$('#basket_items #'+id).remove();
		var result = JSON.parse(data);
		$('.prices .price').html(result.ALL_SUM);
	});
    update_cart_line();
    update_count_cart_line()
});

//применение купона
$(document).on('click','input[name="SET_COUPON"]',function (e) {
	e.preventDefault();
	$.ajax({
		url: '/ajax/set_coupon.php',
		data: { 'coupon': $('input[name="coupon"]').val()}
	}).done(function(data){
		$.ajax({ url: '/ajax/sum_after_coupon.php',})
			.done(function(data){
				var result = JSON.parse(data);
				$('.prices .price').html(result.ALL_SUM);
			});

		if(data != 'N'){
			$('#basket_items').html(data);
			$('input[name="coupon"]').addClass('coupon_success');
		}else{
			$('input[name="coupon"]').removeClass('coupon_success');
		}
	});
    update_cart_line();
    update_count_cart_line()
})



