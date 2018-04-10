
/*------------ ERICs SCRIPTs ---------------*/

/*-----вопросы-ответы-----*/

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


/*-----header-search-----*/

$( ".functions-search" ).on( "click", "input[type='submit']", function(event) {
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
                alert('Выполняется запрос')
            }
        }
    }
});

/*-----slide-menu-----*/

$(document).on('click', '.burger-menu-button a', function(){
    $('.slide__menu').removeClass('slide__menu_hide');
});
$(document).on('click', '.btn_close', function(){
    $('.slide__menu').addClass('slide__menu_hide');
});
// $(document).on('click', '.btn_close', function(){
//     $('.slide__menu').addClass('slide__menu_hide');
// });

/*-----корзина калькулятор-----*/

$('.minus').click(function() {


    var val_input = $(this).closest('div').find('.qty');
    if (val_input.val() <= 0) { return; }
    val_input.val(parseInt(val_input.val() - 1));

    // var price = $(this).closest('div').find('.price');
    // var cost = $(this).closest('div').find('.cost');
    // cost.val((parseFloat(price.val()) * val_input.val()).toFixed(2));
    //
    // total_cost();
});

$('.plus').click(function() {
    var val_input = $(this).closest('div').find('.qty');
    if (val_input.val() >=20) { return; }
    val_input.val(parseInt(val_input.val()) + 1);

    // var price = $(this).closest('div').find('.price');
    // var cost = $(this).closest('div').find('.cost');
    // cost.val((parseFloat(price.val()) * val_input.val()).toFixed(2));
    //
    // total_cost();
});

// function total_cost() {
//     var total = 0;
//     $.each($('.cost'), function(index, value){
//         total += parseFloat($(value).val());
//     });
//     total = total.toFixed(2);
//     $('#total').val(total);
// }
//
// $('.fa-trash-o').click(function() {
//     $(this).closest('tr').remove();
//     total_cost();
// });