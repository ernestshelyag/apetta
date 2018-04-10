$(document).ready(function () {
    
    function price_recount() {
        var price_product = parseInt($('span.price').text()),
            price_delivery_1 = 0,
            price_delivery_2 = 0;
        if($('.radio2-tab').is(":visible") == true){
            price_delivery_1 = parseInt($('span.delivery_1').text());;
        }
        if($('.radio4-tab').is(":visible") == true){
            price_delivery_2 = parseInt($('span.delivery_2').text());;
        }
        var all_sum = price_product + price_delivery_1 + price_delivery_2,
            delivery_sum = price_delivery_1 + price_delivery_2;
        $('#ALL_SUM').text(all_sum+' P');
        $('#DELIVERY_SUM').text(delivery_sum+' P');
        $('input[name="DELIVERY_PRICE"]').val(delivery_sum);
    }

    $(document).on('change','input[name="DELIVERY_FROM_TYPE"]',function () {
       if($(this).val() == 15){
           $('.radio3-tab').css('display','block');
           $('.radio4-tab').css('display','none');
       }else{
           $('.radio3-tab').css('display','none');
           $('.radio4-tab').css('display','block');
       }
        price_recount();
    });
    $(document).on('change','input[name="DELIVERY_TO_TYPE"]',function () {
        if($(this).val() == 10){
            $('.radio1-tab').css('display','block');
            $('.radio2-tab').css('display','none');
        }else{
            $('.radio1-tab').css('display','none');
            $('.radio2-tab').css('display','block');
        }
        price_recount();
    });
console.log('sdf');
    $(document).on('submit','#ORDER_FORM',function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/ajax/add_order.php",
            data: $(this).serialize(),
            success: function (data) {
                  console.log(data);
                if(data != 'N'){
                    //document.location.href = 'http://apetta.tmweb.ru/personal/order/success.php?ORDER_ID='+data;
                }
            }
        });
    });
    function init_1() {
        var myMap = new ymaps.Map("map_to", {
                center: [59.93, 30.31],
                zoom: 10
            }),
            apetta_address, cliean_address;
        function findClosestObjects() {
            apetta_address.getClosestTo(cliean_address.get(0)).balloon.open();

            myMap.events.add('click', function (event) {
                apetta_address.getClosestTo(event.get('coordPosition')).balloon.open();
            });
        }
        apetta_address = ymaps.geoQuery(ob_apetta_1).addToMap(myMap);
        $('#find_to').bind('click', addCircle);

        function addCircle() {
            var address = $('#address_to').val();
            cliean_address = ymaps.geoQuery(ymaps.geocode(address, {kind: 'street'}))
                .then(findClosestObjects);

            //центрируем карту
            ymaps.geocode(address,
                {results: 1}).then(function (res) {
                var firstGeoObject = res.geoObjects.get(0),
                    coords = firstGeoObject.geometry.getCoordinates();
                if(typeof coords == 'object'){
                    myMap.setCenter(
                        [coords[0], coords[1]]
                    );
                    $('input[name="DELIVERY_TO_MAP"]').val([coords[0]+','+coords[1]]);
                }
            });
        }
    }
    ymaps.ready(init_1);

    function init_2() {
        var myMap = new ymaps.Map("map_from", {
                center: [59.93, 30.31],
                zoom: 10
            }),
            apetta_address, cliean_address;
        function findClosestObjects() {
            apetta_address.getClosestTo(cliean_address.get(0)).balloon.open();

            myMap.events.add('click', function (event) {
                apetta_address.getClosestTo(event.get('coordPosition')).balloon.open();
            });
        }
        apetta_address = ymaps.geoQuery(ob_apetta_2).addToMap(myMap);
        $('#find_from').bind('click', addCircle);

        function addCircle() {
            var address = $('#address_from').val();
            cliean_address = ymaps.geoQuery(ymaps.geocode(address, {kind: 'street'}))
                .then(findClosestObjects);

            //центрируем карту
            ymaps.geocode(address,
                {results: 1}).then(function (res) {
                var firstGeoObject = res.geoObjects.get(0),
                    coords = firstGeoObject.geometry.getCoordinates();
                if(typeof coords == 'object'){
                    myMap.setCenter(
                        [coords[0], coords[1]]
                    );
                    $('input[name="DELIVERY_FROM_MAP]').val([coords[0]+','+coords[1]]);
                }

            });

        }
    }
    ymaps.ready(init_2);

    $(document).on('click', '#auth-hide', function(e){
        e.preventDefault();
        $('#auth_form').addClass('off');
        $('.order-form').addClass('slide');
        $('#auth-show').show();
    });

    $(document).on('click', '#auth-show', function(e){
        e.preventDefault();
        $('#auth_form').removeClass('off');
        $('.order-form').removeClass('slide');
        $('#auth-show').hide();
    });

    $(document).on('click', '#get_sms', function(e){
        e.preventDefault();
        $(this).parents('form').find('.error-message').remove();
        $(this).parents('form').find('[name="phone"]').unmask();
        var unmasked_phone = $(this).parents('form').find('[name="phone"]').val();
        var _this = $(this);
        _this.text('Ваши данные передаются ...');
        $.ajax({
            url: $(this).parents('form').attr('action'),
            data: $(this).parents('form').serialize(),
            success: function(text){
                $('[name="phone"]').mask('+7 (000) 000-00-00');
                if(text != 'Y') {
                    _this.after('<span class="error-message">'+text+'</span>');
                    _this.text('Получить смс');
                } else {
                    $('.contact-info').addClass('sms');
                    $('.sms-block').addClass('active');
                    _this.hide();
                }
            }
        });

    });
});