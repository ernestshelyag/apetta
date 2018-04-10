<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?>
    <div class="wrapper100 background-grey">
        <h2>Авторизуйтесь, если у вас есть аккаунт</h2>
        <div class="row">
            <div class="item7">
                <div class="auth-block">
                    <div class="social-network__wrap">
                        <div class="title">Войти через социальную сеть</div>
                        <div class="links"><a href=""><img src="img/flat-icons-sn.png">
                                <!--TODO: IMG TO SVG!--></a></div>
                    </div>
                    <div class="email-password__wrap">
                        <div class="title">Войти по номеру телефона</div>
                        <form action="" method="post">
                            <input type="text" name="email" placeholder="Телефон" value="">
                            <div class="submit-form__wrap">
                                <input type="submit" name="submit" value="Войти" class="btn"><span>или продолжите оформление заказа без входа на сайт</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="order-form"><script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
        <div class="row">
            <div class="item7">
                <form action="" method="">
                    <div class="order-form--block contact-info">
                        <h2 class="aleft">1. Введите Ваши данные</h2>
                        <div class="label-input-block w100">
                            <label for="fname">Ваше имя</label>
                            <input id="fname" name="fname" type="text" value="">
                        </div>
                        <div class="label-input-block">
                            <label for="phone">Ваш телефон</label>
                            <input id="phone" name="phone" type="text" value="">
                        </div>
                        <div class="label-input-block">
                            <label for="order_email">Ваш e-mail</label>
                            <input id="order_email" name="order_email" type="text" value="">
                        </div>
                    </div>
                    <div class="order-form--block delivery-fromme">
                        <h2 class="aleft">2. Как вы хотите сдать товар?</h2>
                        <div class="tabs-radio">
                            <div class="radio-item">
                                <input type="radio" name="radiog_lite" id="radio1" class="css-checkbox">
                                <label for="radio1" class="css-label radGroup1">Самостоятельно</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" name="radiog_lite" id="radio2" class="css-checkbox">
                                <label for="radio2" class="css-label radGroup1">Отдать курьеру</label>
                            </div>
                        </div>
                        <div class="tabs-content">
                            <div class="radio1-tab">
                                <div class="maps-block">
                                    <div class="lineform">
                                        <input type="text" name="address" value="" placeholder="Введите свой адрес"><a href="" class="btn">Найти ближайшую химчистку</a>
                                    </div>
                                    <div id="map1" class="map"></div>
                                </div>
                            </div>
                            <div class="radio2-tab">
                                <div class="fields-block">
                                    <div class="label-input-block">
                                        <label for="address_dostavki_from">Адрес доставки</label>
                                        <input id="address_dostavki_from" name="address_dostavki_from" type="text" value="">
                                    </div>
                                    <div class="label-input-block calendar">
                                        <label for="data_dostavki_from">Дата доставки</label>
                                        <input id="data_dostavki_from" name="data_dostavki_from" type="text" value="" placeholder="08.06.2017">
                                    </div>
                                    <div class="label-input-block calendar">
                                        <label for="vremya_dostavki_from">Время доставки</label>
                                        <select id="vremya_dostavki_from" name="vremya_dostavki_from">
                                            <option value="">12:00-18:00</option>
                                            <option value="">12:00-18:00</option>
                                            <option value="">12:00-18:00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-form--block delivery-tome">
                        <h2 class="aleft">3. Как вы хотите забрать товар?</h2>
                        <div class="tabs-radio">
                            <div class="radio-item">
                                <input type="radio" name="radiog_lite" id="radio3" class="css-checkbox">
                                <label for="radio3" class="css-label radGroup1">Самостоятельно</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" name="radiog_lite" id="radio4" class="css-checkbox">
                                <label for="radio4" class="css-label radGroup1">Забрать курьером</label>
                            </div>
                        </div>
                        <div class="tabs-content">
                            <div class="radio3-tab">
                                <div class="maps-block">
                                    <div class="lineform">
                                        <input type="text" name="address" value="" placeholder="Введите свой адрес"><a href="" class="btn">Найти ближайшую химчистку</a>
                                    </div>
                                    <div id="map2" class="map"></div>
                                </div>
                            </div>
                            <div class="radio4-tab">
                                <div class="fields-block">
                                    <div class="label-input-block">
                                        <label for="address_dostavki_to">Адрес доставки</label>
                                        <input id="address_dostavki_to" name="address_dostavki_to" type="text" value="">
                                    </div>
                                    <div class="label-input-block calendar">
                                        <label for="data_dostavki_to">Дата доставки</label>
                                        <input id="data_dostavki_to" name="data_dostavki_to" type="text" value="" placeholder="08.06.2017">
                                    </div>
                                    <div class="label-input-block calendar">
                                        <label for="vremya_dostavki_to">Время доставки</label>
                                        <select id="vremya_dostavki_to" name="vremya_dostavki_to">
                                            <option value="">12:00-18:00</option>
                                            <option value="">12:00-18:00</option>
                                            <option value="">12:00-18:00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-form--block comments">
                        <div class="label-input-block">
                            <label for="comment">Комментарий</label>
                            <textarea id="comment" placeholder="Любая дополнительная информация"></textarea>
                        </div>
                    </div>
                    <div class="order-form--block payment">
                        <h2 class="aleft">4. Выберите способ оплаты</h2>
                        <div class="payments-method">
                            <div class="radiobutton_image radiobutton radiobutton_image--top">
                                <input type="radio" name="radiog_lite" id="item1" class="css-checkbox">
                                <label for="item1" class="css-label radGroup1">Банковская карта</label>
                                <div class="image_block"><img src="img/money_cart.png" alt="">
                                    <!--TODO: JS Click for active radio button-->
                                </div>
                            </div>
                            <div class="radiobutton_image radiobutton radiobutton_image--top">
                                <input type="radio" name="radiog_lite" id="item2" class="css-checkbox">
                                <label for="item2" class="css-label radGroup1">Яндекс-Деньги</label>
                                <div class="image_block"><img src="img/money_ya.png" alt="">
                                    <!--TODO: JS Click for active radio button-->
                                </div>
                            </div>
                            <div class="radiobutton_image radiobutton radiobutton_image--top">
                                <input type="radio" name="radiog_lite" id="item3" class="css-checkbox">
                                <label for="item3" class="css-label radGroup1">Наличные</label>
                                <div class="image_block"><img src="img/money_nal.png" alt="">
                                    <!--TODO: JS Click for active radio button-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-form--block cart">
                        <h2 class="aleft">5. Подтверждение заказа</h2>
                        <div class="cart-right-block aleft">
                            <div class="content">
                                <div class="products-block">
                                    <div class="header">
                                        <div class="item-name">Наименование</div>
                                        <div class="item-count">Количество</div>
                                        <div class="item-price">Цена (Р)</div>
                                    </div>
                                    <div class="column">
                                        <div class="product-item">
                                            <div class="item-name">
                                                <div class="name">Шуба</div>
                                                <div class="props"><span class="product__props-name">Длина:&nbsp;</span><span class="product__props-value">до 90 см&nbsp;</span><span class="product__props-name">Тип меха:&nbsp;</span><span class="product__props-value">натуральный&nbsp;</span><span class="product__props-name">Дорогостоящий:&nbsp;</span><span class="product__props-value">да&nbsp;</span></div>
                                            </div>
                                            <div class="item-count count_block">
                                                <p>1</p>
                                            </div>
                                            <div class="item-price"><span>2 000 Р</span></div>
                                        </div>
                                        <div class="product-item">
                                            <div class="item-name">
                                                <div class="name">Шуба</div>
                                                <div class="props"><span class="product__props-name">Длина:&nbsp;</span><span class="product__props-value">до 90 см&nbsp;</span><span class="product__props-name">Тип меха:&nbsp;</span><span class="product__props-value">натуральный&nbsp;</span><span class="product__props-name">Дорогостоящий:&nbsp;</span><span class="product__props-value">да&nbsp;</span></div>
                                            </div>
                                            <div class="item-count count_block">
                                                <p>1</p>
                                            </div>
                                            <div class="item-price"><span>2 000 Р</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-summary">
                        <div class="sum-item">
                            <div class="sum-item__name">Доставка</div>
                            <div class="sum-item__value">0 Р</div>
                        </div>
                        <div class="sum-item">
                            <div class="sum-item__name">Итоговая стоимость</div>
                            <div class="sum-item__value">18 000 Р</div>
                        </div>
                    </div>
                    <div class="submit-form">
                        <input type="submit" value="Оформить заказ" class="btn">
                    </div>
                    <div class="order-information__text">
                        <p>Доставка бесплатна в городе при заказе от 3 000 рублей.</p>
                        <p>Доставка в пригород Санкт-Петербурга доступна только в случае если сумма заказа превышает 5 000 р. и тоже является фиксированной для каждого пригорода.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>