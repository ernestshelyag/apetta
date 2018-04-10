$(document).on('ready', function () {
    auto_load = 'Y';
    setTimeout(function () {
        $('.ajax_block .radiobuttons_block .radiobutton:first-child label').click();
    }, 1200);


    $(document).on('click','.count_block .minus',function () {
        var old_val = parseInt($('.count_block input[name="QUANTITY"]').val());
        if(old_val != 1){
            $('.count_block input[name="QUANTITY"]').val(old_val-1);
        }
    });
    $(document).on('click','.count_block .plus',function () {
        var old_val = parseInt($('.count_block input[name="QUANTITY"]').val());
        $('.count_block input[name="QUANTITY"]').val(old_val+1);
    });

    $(document).on('click','.buttons_block a',function () {
       var id_product = parseInt($('input[name="ID_PRODUCT"]').val()),
           quantity = parseInt($('input[name="QUANTITY"]').val());
        $.ajax({
            type: "POST",
            url: "/ajax/add_to_cart.php",
            data: "id=" + id_product + '&quantity=' + quantity,
            success: function (data) {
                if(data != ''){
                    $('.buttons_block a').addClass('added');
                    update_cart_line();
                }
            }
        });
    });

});
$(document).on('change', 'input', function () {
    var id = $(this).attr('data-id'),
        this_is = $(this).attr('data-this_is'),
        depth_level = $(this).attr('data-depth_level');
    if (this_is == 'SECTION') {

        $.ajax({
            type: "POST",
            url: "/ajax/add_filter_level_left.php",
            data: "SECTION_ID=" + id + '&DEPTH_LEVEL="' + depth_level + '&THIS_IS=' + this_is,
            success: function (data) {
                $('.product-cart__generating .ajax_block').html(data);
            }
        });
        $.ajax({
            type: "POST",
            url: "/ajax/add_filter_level_right.php",
            data: "SECTION_ID=" + id,
            success: function (data) {
                $('.buyit__content .ajax_block').html(data);
            }
        });
        //price
        $.ajax({
            type: "POST",
            url: "/ajax/price.php",
            data: "SECTION_ID=" + id,
            success: function (data) {
                if (data != 'N') {
                    $('.item3 .information_block').html(data);
                }
            }
        });

        //автоматическое раскрытие дерева разделов
        if(auto_load == 'Y'){
            $.ajax({
                type: "POST",
                url: "/ajax/check_item_in_section.php",
                data: "SECTION_ID=" + id,
                success: function (data) {
                    if (data > 0) {
                        $('.ajax_block .variable_content:last-child .radiobutton:first-child label').click();
                    }else{
                        auto_load = 'N';
                    }
                }
            });
        }
        return false;
    }


    $('.fancybox_ORDER_FAST').fancybox({
        afterShow : function( ) {
            var id_product = $('input[name="ID_PRODUCT"]').val();
            $('form[name="SIMPLE_FORM_6"] input[name="form_text_12"]').val(id_product);
        }
    });

});
