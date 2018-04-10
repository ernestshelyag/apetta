/**
 * Created by ncheremisin on 05.06.2017.
 * All Ajax-Event in action.js
 * Here ONLY display changed events
 *
 * $(document).on('click', '[data-popup="cart"]', function(e){
       e.preventDefault();
   });
 */
$(document).ready(function(){
    // ADD TO CART FROM PRODUCT PAGE
    /*
    $(document).on('click', '[data-popup="cart"]', function(e){
       e.preventDefault();
       $(this).addClass('added');
    });
    */
    $(document).on('click', '[data-open]', function(e){
        e.preventDefault();
        var __form = $($(this).attr('data-open'));
        if(__form.hasClass('invisibles')) {
            __form.removeClass('invisibles');
        } else {
            __form.addClass('invisibles');
        }
    });
    // PERSONAL PAGE EDIT CONTACTS DATA
    $(document).on('click', '.edit-pen', function(e){
        e.preventDefault();
        $('.field-text .input').addClass('hide flex');
        $(this).parents('.field-text').find('.input').removeClass('hide').addClass('flex');
    });

    $(document).on('click', '.field-text .close', function(e){
        e.preventDefault();
        $(this).parents('.field-text').find('.input').addClass('hide flex');
    });

    // PERSONAL PAGE HISTORY ORDERS
    $(document).on('click', '.slide', function(e){
        e.preventDefault();
        if($(this).hasClass('closed')) {
            $(this).parents('.order-item').find('.order-detail').removeClass('hide');
            $(this).removeClass('closed').addClass('open');
        } else {
            $(this).parents('.order-item').find('.order-detail').addClass('hide');
            $(this).addClass('closed').removeClass('open');
        }
    });

    $(document).on('click', '.field-text .close', function(e){
        e.preventDefault();
        $(this).parents('.field-text').find('.input').addClass('hide flex');
    });

    // CAREER PAGE MAP ANF LIST
    $(document).on('click', '.tab-viewer a', function(e){
        e.preventDefault();
        $('.tab-viewer a').removeClass('active');
        $(this).addClass('active');

        $('.vacancy_block .tab').addClass('hide');
        var tab = $(this).attr('data-tab');
        $(tab).removeClass('hide');
    });

    //POPUP FANCYBOX3
    $('.fancybox').fancybox();



    /* ERIC'S CODE */
    $(document).on('click', '.accordion a', function(j) {
        j.preventDefault();
        var dropDown = $(this).closest('li').find('p');
        $(this).closest('.accordion').find('p').not(dropDown).slideUp();
        dropDown.stop(false, true).slideToggle();
    });

    /*Выбор темы вопросы-ответы*/
    $(document).on('click', '.questions-answers__list [data-href]', function(){
        $(this).addClass('active');
        $('.questions-answers__content .content_block').hide();
        $($(this).attr('data-href')).show();
    });


    $('.manage-panel_lang ').hover(function(e){
        $('#select_lang').addClass('hover');
    }, function() {
        $('#select_lang').removeClass('hover');
    });

    $('.city-block_select').hover(function(e){
        $('#select_city').addClass('hover');
    }, function() {
        $('#select_city').removeClass('hover');
    });


    //HEADER SEARCH
    $( document ).on( "click", ".functions-search input[type='submit']", function(event) {
        event.preventDefault();
        if($('header .search_input').hasClass('search_input_hide') && $(window).width() < 1900 ) {
            // $('header .search_input').show("slide", {direction: "left" }, 5000);
            $('header .search_input').removeClass('search_input_hide');
            // $('header .functions-menu').hide();

        }else{
            if($('header .search_input').val().length == 0 && $(window).width() < 1900) {
                $('header .search_input').addClass('search_input_hide');
                // $('header .functions-menu').show();
            }else{
                if($('header .search_input').val().length == 0 ) {
                    alert('Введите запрос')
                }
                else {
                    var url = $(this).parents().find('form').prop('action');
                    var query = '?q='+$('input[name="q"]').val();
                    window.location.href = url+query;
                }
            }
        }
    })

    //SLIDE MENU
    $(document).on('click', '.burger-menu-button a', function(){
        $('.slide__menu').removeClass('slide__menu_hide');
    });
    $(document).on('click', '.btn_close', function(){
        $('.slide__menu').addClass('slide__menu_hide');
    });
    /*
        $(document).on('click', '.btn_close', function(){
            $('.slide__menu').addClass('slide__menu_hide');
        });
    */

});