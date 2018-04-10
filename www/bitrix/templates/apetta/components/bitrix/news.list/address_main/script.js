$(document).ready(function () {

    function init() {
        var myMap = new ymaps.Map("address_main", {
                center: [59.93, 30.31],
                zoom: 10,
                controls: []
            }),
            apetta_address, cliean_address;
        myMap.behaviors.disable('scrollZoom');
        function findClosestObjects() {
            apetta_address.getClosestTo(cliean_address.get(0)).balloon.open();

            myMap.events.add('click', function (event) {
                apetta_address.getClosestTo(event.get('coordPosition')).balloon.open();
            });
        }
        apetta_address = ymaps.geoQuery(ob_apetta).addToMap(myMap);
        $('#search').bind('click', addCircle);
        function addCircle() {
            var address = $('input[name="city"]').val()+' '+$('#adress').val();
            console.log(address);
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
                }
            });
        }
    }
    ymaps.ready(init);

});