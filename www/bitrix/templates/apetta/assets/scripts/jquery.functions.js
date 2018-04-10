/**
 * Created by ncheremisin on 30.10.2016.
 */

/*Валидация формы */
function showError(conteinerParentNode, errorMessage) {
    conteinerParentNode.className = 'error';
    var spanElem = document.createElement('span');
    spanElem.className = "error-message";
    spanElem.innerHTML = errorMessage;
    conteinerParentNode.appendChild(spanElem);
}
function resetError(conteinerParentNode) {
    conteinerParentNode.className = '';
    if (conteinerParentNode.lastChild.className == "error-message") {
        conteinerParentNode.removeChild(conteinerParentNode.lastChild);
    }
}
function validate(form) {
    var elems = form.elements;
    var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ;

    resetError(elems.question.parentNode);
    if (!elems.question.value) {
        showError(elems.question.parentNode, ' Задайте вопрос ');
        return false;
    }
    else if (elems.question.value.length < 10 ) {
        showError(elems.question.parentNode, ' Некорректный вопрос. <br> Что вы имели ввиду? ');
        return false;
    }
    resetError(elems.email.parentNode);
    if(!elems.email.value) {
        showError(elems.email.parentNode, ' Нужно указать e-mail ');
        return false;
    }
    else if (!regEmail.test(elems.email.value) == true){
        showError(elems.email.parentNode, ' Некорректный e-mail ');
        return false;
    }
    alert('Вопрос задан');
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
        if($('#map1').length > 0) {
            map1 = new ymaps.Map('map1', state);
            map1.behaviors.disable('scrollZoom');
        }
        // if($('#map2').length > 0) {
        //     map2 = new ymaps.Map('map2', state);
        //     map2.behaviors.disable('scrollZoom');
        // }
        if($('#mapmain').length > 0) {
            mapmain = new ymaps.Map('mapmain', state);
            mapmain.behaviors.disable('scrollZoom');
        }
    }
});

