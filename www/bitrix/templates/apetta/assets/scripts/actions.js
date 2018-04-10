$(document).ready(function(){
    $(document).on('click', 'input', function(){
        $(this).parent().focus();
    });
    $('[name="phone"], [name="PERSONAL_PHONE"]').mask('+7 (000) 000-00-00');
    $('.valid_phone').mask('+7 (000) 000-00-00');

    $('.main-content_block .products-slider ul').bxSlider({
        minSlides: 1,
        maxSlides: 5,
        slideWidth: 155,
        slideMargin: 20,
        // pager: false,
        controls: false,
        infiniteLoop: false
    });
    $('.main-content_block .partners_block').bxSlider({
        minSlides: 2,
        maxSlides: 5,
        slideWidth: 200,
        slideMargin: 20,
        pager: false,
        controls: true,
        infiniteLoop: false
    });
    $('.main-content_block .reviews_block ul').bxSlider({
        minSlides: 1,
        maxSlides: 1,
        pager: false
    });
    $('.main-content_block .top_slider_block ul').bxSlider({
        controls: false
    });
    $('.calendar input').datePicker({
        minDate: '2017-06-16',
    });

    $(document).on('click', '.ajax-register form input.btn', function(e){
        e.preventDefault();
        $('.error-message').remove();
        $('[name="phone"]').unmask();
        var unmasked_phone = $('[name="phone"]').val();
        var _this = $(this);
        _this.val('Ваши данные передаются ...');
        $.ajax({
            url: $(this).parents('form').attr('action'),
            data: $(this).parents('form').serialize(),
            success: function(text){
                $('[name="phone"]').mask('+7 (000) 000-00-00');
                if(text != 'Y') {
                    _this.parent().after('<span class="error-message">'+text+'</span>')
                    _this.val('Зарегистрироваться');
                } else {
                    _this.hide();
                    _this.after('<a href="/login/?phone='+unmasked_phone+'" class="btn">Успешно. Войти на сайт</a>')
                }
            }
        });
    });

    $(document).on('click', '.ajax-login form .btn', function(e){
        e.preventDefault();
        $('.error-message').remove();
        $('[name="phone"]').unmask();
        var _this = $(this);
        _this.val('Ваши данные передаются ...');
        $.ajax({
            url: $(this).parents('form').attr('action'),
            data: $(this).parents('form').serialize(),
            success: function(text){
                console.log(text);
                $('[name="phone"]').mask('+7 (000) 000-00-00');
                if(text != 'Y') {
                    _this.parent().after('<span class="error-message">'+text+'</span>')
                    _this.val('Войти');
                } else {
                    location.reload();
                }
            }
        });
    });


    function update_count_cart_line() {
        $.ajax({
            url: '/ajax/update_count_line_cart.php',
            success: function(data){
                $('.functions-cart').remove();
                $('.functions--wrapper').append(data);
            }
        });
    }
    update_count_cart_line();

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


    $(document).on('click', '.social-links-title', function(e){
        console.log('da');
        update_count_cart_line();
        update_cart_line();
    });
    //отображение малой корзины                          $('[name="phone"]').unmask();
    $(document).on('click', '.cart-link a', function(e){
        e.preventDefault();
        update_cart_line();
        $('#cart_line').toggle('visible');
    });


    $(document).on('click', '#form-edit a.btn', function(e){
        e.preventDefault();
        $('.error-message').remove();
        $('[name="phone"]').unmask();
        var _this = $(this);
        _this.parents('.field-text').find('.value').text(_this.parents('.field-text').find('input[type="text"]').val());
        $.ajax({
            url: $(this).parents('form').attr('action'),
            data: $(this).parents('form').serialize(),
            success: function(text){
                if(text != 'Y') {
                    _this.parent().after('<span class="error-message">'+text+'</span>')
                } else {
                    _this.parents('.field-text').find('.input').addClass('hide flex');
                }
            }
        });
    });

    $(document).on('click', '#change_password a.btn', function(e){
        e.preventDefault();
        $('.error-message').remove();
        var _this = $(this);
        $.ajax({
            url: $(this).parents('form').attr('action'),
            data: $(this).parents('form').serialize(),
            success: function(text){
                if(text != 'Y') {
                    _this.parent().after('<span class="error-message">'+text+'</span>')
                } else {
                    _this.text('Вы обновили свой пароль');
                }
            }
        });
    });

    $(document).on('click', '.orders_block .activity a.confirm-order', function(e){
        e.preventDefault();
        $('.error-message').remove();
        var _this = $(this);
        _this.text('Секунду...');
        $.ajax({
            url: '/ajax/confirmOrderAgbis.php',
            data: 'id='+$(this).attr('data-order_id'),
            success: function(text){
                if(text != 'Y') {
                    _this.parent().after('<span class="error-message">'+text+'</span>')
                } else {
                    _this.attr('data-order_id', '');
                    _this.text('Заказ потвержден');
                }
            }
        });
    });
    
    
    
});