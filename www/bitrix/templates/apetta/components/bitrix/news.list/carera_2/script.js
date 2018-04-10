$(document).ready(function () {

    $('.fancybox_Y').fancybox({
        afterShow : function( ) {
            var id = $(this)[0]['src'],
                name_vacancy = $(id+' .title').text();
            $(id+' input[name="form_text_12"]').val(name_vacancy);
        }
    });


    $(document).on('change','select[name="metro"]',function () {

        var metro_id = $(this).val();
        console.log(metro_id);
        $('#metro_id_'+metro_id).click();
        $( '#list-block .vacancy-item').each(function( index ) {
            if(metro_id != 'all'){
                if(metro_id ==  $( this ).attr('data-group')){
                    $( this ).fadeIn('fast');
                }else{
                    $( this ).fadeOut('fast');
                }
            }else{
                $( this ).fadeIn('fast');
            }
        });

    })

    function init() {

        // Создание экземпляра карты.
        var myMap = new ymaps.Map('map_carera', {
                center: [59.9386300 , 30.3141300],
                zoom: 9
            }, {
                searchControlProvider: 'yandex#search'
            }),
            // Контейнер для меню.
            menu = $('<ul id="hidden_map_controls" class="menu"/>');

        for (var i = 0, l = groups.length; i < l; i++) {
            createMenuGroup(groups[i]);
        }

        function createMenuGroup (group) {
            // Пункт меню.
            var menuItem = $('<li><a href="javascript:void(0)" id="metro_id_'+group.metro_id+'">' + group.name + '</a></li>'),
                // Коллекция для геообъектов группы.
                collection = new ymaps.GeoObjectCollection(null, { preset: group.style }),
                // Контейнер для подменю.
                submenu = $('<ul class="submenu"/>');

            // Добавляем коллекцию на карту.
            myMap.geoObjects.add(collection);
            // Добавляем подменю.
            menuItem
                .append(submenu)
                // Добавляем пункт в меню.
                .appendTo(menu)
                // По клику удаляем/добавляем коллекцию на карту и скрываем/отображаем подменю.
                .find('a')
                .bind('click', function () {
                    if (collection.getParent()) {
                        // myMap.geoObjects.remove(collection);
                        //console.log(collection.getParent());
                        myMap.geoObjects.removeAll();
                        myMap.geoObjects.add(collection);
                    } else {
                        // myMap.geoObjects.add(collection);
                        //	console.log(collection);
                        myMap.geoObjects.removeAll();
                        myMap.geoObjects.add(collection);
                    }
                });
            for (var j = 0, m = group.items.length; j < m; j++) {
                createSubMenu(group.items[j], collection, submenu);
            }
        }

        function createSubMenu (item, collection, submenu) {
            // Пункт подменю.
            var submenuItem = $('<li><a href="#">' + item.name + '</a></li>'),
                // Создаем метку.

                placemark = new ymaps.Placemark(item.center, { balloonContent: item.name });

            // Добавляем метку в коллекцию.
            collection.add(placemark);
            // Добавляем пункт в подменю.
            submenuItem
            //.appendTo(submenu)
            // При клике по пункту подменю открываем/закрываем баллун у метки.
                .find('a')
                .bind('click', function () {
                    if (!placemark.balloon.isOpen()) {
                        placemark.balloon.open();
                    } else {
                        placemark.balloon.close();
                    }
                    return false;
                });
        }

        // Добавляем меню в тэг BODY.
        menu.appendTo($('body'));
        // Выставляем масштаб карты чтобы были видны все группы.
        myMap.setBounds(myMap.geoObjects.getBounds());


        function findClosestObjects() {
            var result = ymaps.geoQuery(myMap.geoObjects);
            result.getClosestTo(cliean_address.get(0)).balloon.open()
        }

        $('#search').bind('click', addCircle);
        function addCircle() {
            var address = $('input[name="city"]').val()+' '+$('#adress').val();
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
                    firstGeoObject.balloon.open()
                }

            });
        }
    }
    ymaps.ready(init);



})
