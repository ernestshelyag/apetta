<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Интеграция");
require($_SERVER["DOCUMENT_ROOT"] . "/personal/order/dev.php");
?>
<?if(count($arResult['BASKET']['ITEMS']) > 0 ){?>
    <script>
        var ob_apetta_1 = {
            type: 'FeatureCollection',
            features: [
                <?foreach($arResult['MAP_ITEMS'] as $Item){?>
                {
                    type: 'Feature',
                    properties: {
                        balloonContent: ["<?=$Item['NAME'];?><br><?=$Item['ADDRESS'];?><br><?=$Item['PHONE'];?>"]
                    },
                    geometry: {
                        type: 'Point',
                        coordinates: [<?=$Item['MAP']?>]
                    }
                },
                <?}?>
            ]
        };
        var ob_apetta_2 = {
            type: 'FeatureCollection',
            features: [
                <?foreach($arResult['MAP_ITEMS'] as $Item){?>
                {
                    type: 'Feature',
                    properties: {
                        balloonContent: ["<?=$Item['NAME'];?><br><?=$Item['ADDRESS'];?><br><?=$Item['PHONE'];?>"]
                    },
                    geometry: {
                        type: 'Point',
                        coordinates: [<?=$Item['MAP']?>]
                    }
                },
                <?}?>
            ]
        };
    </script>
    <script src="script.js"></script>
    <div class="wrapper100 background-grey">
        <h2>Авторизуйтесь, если у вас есть аккаунт</h2>
        <div class="row">
            <div class="item7">
                <div class="auth-block">
                    <div class="social-network__wrap">
                        <div class="title">Войти через социальную сеть</div>
                        <div class="links"><a href="">
                                <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/flat-icons-sn.png"></a></div>
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
                <form action="" method="" id="ORDER_FORM">
                    <div class="order-form--block contact-info">
                        <h2 class="aleft">1. Введите Ваши данные</h2>
                        <div class="label-input-block w100">
                            <label for="fname">Ваше имя</label>
                            <input id="fname" name="PERSONAL_NAME" type="text" value="">
                        </div>
                        <div class="label-input-block">
                            <label for="phone">Ваш телефон</label>
                            <input id="phone" name="PERSONAL_PHONE" type="text" value="">
                        </div>
                        <div class="label-input-block">
                            <label for="order_email">Ваш e-mail</label>
                            <input id="order_email" name="PERSONAL_EMAIL" type="text" value="">
                        </div>
                    </div>
                    <div class="order-form--block delivery-fromme">
                        <h2 class="aleft">2. Как вы хотите сдать товар?</h2>
                        <div class="tabs-radio">
                            <? foreach ($arResult['PROPERTY_LIST']['DELIVERY_TO_TYPE'] as $key => $delivery_to_type) { ?>
                                <div class="radio-item">
                                    <input type="radio" name="DELIVERY_TO_TYPE" id="radio<?= $delivery_to_type['ID']; ?>" <?if($key == 0){?>checked<?}?> class="css-checkbox"
                                           value="<?= $delivery_to_type['ID']; ?>">
                                    <label for="radio<?= $delivery_to_type['ID']; ?>"
                                           class="css-label radGroup1"><?= $delivery_to_type['VALUE']; ?></label>
                                </div>
                            <?}?>
                        </div>
                        <div class="tabs-content">
                            <div class="radio1-tab">
                                <div class="maps-block">
                                    <div class="lineform">
                                        <input type="text" name="address" id="address_to" value="" placeholder="Введите свой адрес"><a href="javascript:void(0);" id = "find_to" class="btn">Найти ближайшую химчистку</a>
                                    </div>
                                    <div id="map_to" class="map"></div>
                                    <input type="text" style="display: none" name="DELIVERY_TO_MAP" value="">
                                </div>
                            </div>
                            <div class="radio2-tab" style="display:none">
                                <input name="DELIVERY_TO_AGBIS" type="text" value="" style="display:none;">
                                <div class="fields-block">
                                    <div class="label-input-block">
                                        <label for="address_dostavki_from">Адрес доставки</label>
                                        <input id="address_dostavki_from" name="DELIVERY_TO_ADDRESS" type="text" value="">
                                    </div>
                                    <div class="label-input-block calendar">
                                        <label for="data_dostavki_from">Дата доставки</label>
                                        <input id="data_dostavki_from" name="DELIVERY_TO_DATE" type="text" value="" placeholder="08.06.2017">
                                    </div>
                                    <div class="label-input-block calendar">
                                        <label for="vremya_dostavki_from">Время доставки</label>
                                        <select id="vremya_dostavki_from" name="DELIVERY_TO_TIME">
                                            <option value="">Выберите время</option>
                                            <?foreach ($arResult['PROPERTY_LIST']['DELIVERY_TO_TIME'] as $delivery_to_time) { ?>
                                                <option value="<?= $delivery_to_time['ID']; ?>"><?= $delivery_to_time['VALUE']; ?></option>
                                            <?}?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-form--block delivery-tome">
                        <h2 class="aleft">3. Как вы хотите забрать товар?</h2>
                        <div class="tabs-radio">
                            <?foreach ($arResult['PROPERTY_LIST']['DELIVERY_FROM_TYPE'] as $key => $delivery_from_type) { ?>
                                <div class="radio-item">
                                    <input type="radio" name="DELIVERY_FROM_TYPE" id="radio<?= $delivery_from_type['ID']; ?>" <?if($key == 0){?>checked<?}?> class="css-checkbox"
                                           value="<?= $delivery_from_type['ID']; ?>">
                                    <label for="radio<?= $delivery_from_type['ID']; ?>"
                                           class="css-label radGroup1"><?= $delivery_from_type['VALUE']; ?></label>
                                </div>
                            <?}?>
                        </div>
                        <div class="tabs-content">
                            <div class="radio3-tab">
                                <div class="maps-block">
                                    <div class="lineform">
                                        <input type="text" name="address" value="" id = "address_from" placeholder="Введите свой адрес"><a href="javascript:void(0)" id="find_from" class="btn">Найти ближайшую химчистку</a>
                                    </div>
                                    <div id="map_from" class="map"></div>
                                    <input type="text" style="display: none" name="DELIVERY_FROM_MAP" value="">
                                </div>
                            </div>
                            <div class="radio4-tab" style="display:none">
                                <input name="DELIVERY_FROM_AGBIS" type="text" value="" style="display: none">
                                <div class="fields-block">
                                    <div class="label-input-block">
                                        <label for="address_dostavki_to">Адрес доставки</label>
                                        <input id="address_dostavki_to" name="DELIVERY_FROM_ADDRESS" type="text" value="">
                                    </div>
                                    <div class="label-input-block calendar">
                                        <label for="data_dostavki_to">Дата доставки</label>
                                        <input id="data_dostavki_to" name="DELIVERY_FROM_DATE" type="text" value="" placeholder="08.06.2017">
                                    </div>
                                    <div class="label-input-block calendar">
                                        <label for="vremya_dostavki_to">Время доставки</label>
                                        <select id="vremya_dostavki_to" name="DELIVERY_FROM_TIME">
                                            <option value="">Выберите время</option>
                                            <?foreach ($arResult['PROPERTY_LIST']['DELIVERY_FROM_TIME'] as $delivery_from_time) { ?>
                                                <option
                                                    value="<?= $delivery_from_time['ID']; ?>"><?= $delivery_from_time['VALUE']; ?></option>
                                            <?}?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-form--block comments">
                        <div class="label-input-block">
                            <label for="comment">Комментарий</label>
                            <textarea id="comment" placeholder="Любая дополнительная информация"  name="PREVIEW_TEXT"></textarea>
                        </div>
                    </div>
                    <div class="order-form--block payment">
                        <h2 class="aleft">4. Выберите способ оплаты</h2>
                        <div class="payments-method">
                            <? foreach ($arResult['PROPERTY_LIST']['PAY_SYSTEM'] as $pay_system) { ?>
                                <div class="radiobutton_image radiobutton radiobutton_image--top">
                                    <input type="radio" name="PAY_SYSTEM" id="item<?=$pay_system['ID'];?>" class="css-checkbox"
                                           value="<?= $pay_system['ID']; ?>">
                                    <label for="item<?=$pay_system['ID'];?>"
                                           class="css-label radGroup1"><?= $pay_system['VALUE']; ?></label>
                                    <div class="image_block">
                                        <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/<?= $pay_system['XML']; ?>" alt="">
                                    </div>
                                </div>
                            <?}?>
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
                                        <div class="item-price item-price__all">Стоимость (Р)</div>
                                    </div>
                                    <div class="column">
                                        <?foreach ($arResult['BASKET']['ITEMS'] as $key => $basket_item){?>
                                            <div class="product-item">
                                                <input type="text" style="display: none" name="PRODUCT[]" value="<?=$basket_item['ID'];?>_<?=$basket_item['QUANTITY'];?>">
                                                <div class="item-name">
                                                    <div class="name"><?=$basket_item['NAME'];?></div>
                                                    <div class="props">
                                                        <span class="product__props-name"><?=$basket_item['DESCRIPTION'];?></span>
                                                    </div>
                                                </div>
                                                <div class="item-count count_block">
                                                    <p><?=$basket_item['QUANTITY'];?></p>
                                                </div>
                                                <div class="item-price"><span><?=CurrencyFormat($basket_item['PRICE'], 'RUB');?></span></div>
                                                <div class="item-price item-price__all"><span><?=CurrencyFormat($basket_item['FINAL_PRICE'], 'RUB');?></span></div>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-summary">
                        <div class="sum-item">
                            <div class="sum-item__name">Доставка</div>
                            <input type="text" name="DELIVERY_PRICE" style="display: none">
                            <div id = "DELIVERY_SUM" class="sum-item__value">0 Р</div>
                        </div>
                        <div class="sum-item">
                            <div class="sum-item__name">Итоговая стоимость</div>
                            <div id="ALL_SUM" class="sum-item__value"><?=CurrencyFormat($arResult['BASKET']['ALL_SUM'], 'RUB');?></div>
                            <span class="price" style="display: none"><?=$arResult['BASKET']['ALL_SUM'];?></span>
                            <span class="delivery_1" style="display: none">400</span>
                            <span class="delivery_2" style="display: none">450</span>
                        </div>
                    </div>
                    <div class="submit-form">
                        <input type="submit" value="Оформить заказ" class="btn">
                    </div>
                    <div class="order-information__text">
                        <?=get_info('FREE_DELIVERY_CITY_TEXT');?>
                        <?=get_info('FREE_DELIVERY_REGION_TEXT');?>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?}else{
    header('Location: http://www.'.$_SERVER['SERVER_NAME']);
}?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>