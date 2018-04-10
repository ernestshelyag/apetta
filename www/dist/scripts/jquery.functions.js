/**
 * Created by ncheremisin on 30.10.2016.
 */

$(document).ready(function(){
    $(document).on('click', 'input', function(){
        $(this).parent().focus();
    });
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
        controls: false,
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
});

// Функция запуска полноэкранного режима
function launchIntoFullscreen(element) {
    if(element.requestFullscreen) {
        element.requestFullscreen();
    } else if(element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
    } else if(element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
    } else if(element.msRequestFullscreen) {
        element.msRequestFullscreen();
    }
}
// Функция выхода из полноэкранного режима
function exitFullscreen() {
    if(document.exitFullscreen) {
        document.exitFullscreen();
    } else if(document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
    } else if(document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
    }
}

ymaps.ready(function () {
    var map1;
    var map2;
    var mapmain;
    ymaps.geolocation.get().then(function (res) {

        var mapContainer = $('#map1, #map2, #mapmain'),
            bounds = res.geoObjects.get(0).properties.get('boundedBy'),
        // Рассчитываем видимую область для текущей положения пользователя.
            mapState = ymaps.util.bounds.getCenterAndZoom(
                bounds,
                [mapContainer.width(), mapContainer.height()]
            );
        mapState.controls = ['zoomControl', 'typeSelector',  'fullscreenControl'];
        createMap(mapState);
    }, function (e) {
        // Если местоположение невозможно получить, то просто создаем карту.
        createMap({
            center: [55.751574, 37.573856],
            zoom: 2,
            controls: ['zoomControl', 'typeSelector',  'fullscreenControl']
        });
    });

    function createMap (state) {
        if($('#map1').length > 0)
            map1 = new ymaps.Map('map1', state);
        if($('#map2').length > 0)
            map2 = new ymaps.Map('map2', state);
        if($('#mapmain').length > 0)
            mapmain = new ymaps.Map('mapmain', state);
    }
});