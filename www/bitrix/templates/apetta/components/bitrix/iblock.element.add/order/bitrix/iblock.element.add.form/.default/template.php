<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);
//Получаем химчистки
/*
$arSelect = Array("ID", "IBLOCK_ID", "NAME","PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>4, "!PROPERTY_NO_ORDER_MAP"=>"true", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>150), $arSelect);
while($ob = $res->GetNextElement()){
	$arFields = $ob->GetFields();
	echo "<pre>";print_r($arFields['NAME']);echo "</pre>";
	$arProps = $ob->GetProperties();
}?>
<div class="order-form">
	<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<div class="row">
		<div class="item7">
			<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
				<?=bitrix_sessid_post()?>
				<input type="text" name="PROPERTY[NAME][0]" size="30" value="323d23d333">
				<div class="order-form--block contact-info">
					<h2 class="aleft">1. Введите Ваши данные</h2>
					<div class="label-input-block w100">
						<label for="fname">Ваше имя</label>
						<input id="fname" name="PROPERTY[25][0]" type="text" value="">
					</div>
					<div class="label-input-block">
						<label for="phone">Ваш телефон</label>
						<input id="phone" name="PROPERTY[26][0]" type="text" value="">
					</div>
					<div class="label-input-block">
						<label for="order_email">Ваш e-mail</label>
						<input id="order_email" name="PROPERTY[27][0]" type="text" value="">
					</div>
				</div>
				<div class="order-form--block delivery-fromme">
					<h2 class="aleft">2. Как вы хотите сдать товар?</h2>
					<div class="tabs-radio">
						<?foreach ($arResult['PROPERTY_LIST_FULL']['28']['ENUM'] as $delivery_to_key => $delivery_to_type){?>
							<div class="radio-item">
								<input type="radio" name="PROPERTY[28]" id="radio1" class="css-checkbox" value="<?=$delivery_to_key;?>">
								<label for="radio1" class="css-label radGroup1"><?=$delivery_to_type['VALUE'];?></label>
							</div>
						<?}?>
					</div>
					<div class="tabs-content">
						<div class="radio1-tab">
							<div class="maps-block">
								<div class="lineform">
									<input type="text" name="address" value="" placeholder="Введите свой адрес"><a href="" class="btn">Найти ближайшую химчистку</a>
								</div>
								<div id="map1" class="map"><ymaps class="ymaps-2-1-53-map" style="width: 749px; height: 300px;"><ymaps class="ymaps-2-1-53-map ymaps-2-1-53-i-ua_js_yes ymaps-2-1-53-map-bg-ru ymaps-2-1-53-islets_map-lang-ru" style="width: 749px; height: 300px;"><ymaps class="ymaps-2-1-53-inner-panes"><ymaps class="ymaps-2-1-53-events-pane ymaps-2-1-53-user-selection-none" unselectable="on" style="height: 100%; width: 100%; top: 0px; left: 0px; position: absolute; z-index: 2000; cursor: url(&quot;https://api-maps.yandex.ru/2.1.53/build/release/images/util_cursor_storage_grab.cur&quot;) 16 16, url(&quot;https://api-maps.yandex.ru/2.1.53/build/release/images/util_cursor_storage_grab.cur&quot;), move;"></ymaps><ymaps class="ymaps-2-1-53-ground-pane" style="top: 0px; left: 0px; position: absolute; transition-duration: 0ms; transform: translate3d(0px, 0px, 0px) scale(1, 1); z-index: 401;"><ymaps style="position: absolute; z-index: 150;"><canvas height="556" width="1005" style="position: absolute; width: 1005px; height: 556px; left: -128px; top: -128px;"></canvas></ymaps></ymaps><ymaps class="ymaps-2-1-53-copyrights-pane" style="height: 0px; bottom: 5px; right: 3px; top: auto; left: 10px; position: absolute; z-index: 4002;"><ymaps><ymaps class="ymaps-2-1-53-copyright ymaps-2-1-53-copyright_logo_no"><ymaps class="ymaps-2-1-53-copyright__fog">…</ymaps><ymaps class="ymaps-2-1-53-copyright__wrap"><ymaps class="ymaps-2-1-53-copyright__layout"><ymaps class="ymaps-2-1-53-copyright__content-cell"><ymaps class="ymaps-2-1-53-copyright__content"><ymaps class="ymaps-2-1-53-copyright__text">© Яндекс</ymaps><ymaps class="ymaps-2-1-53-copyright__agreement">&nbsp;<a class="ymaps-2-1-53-copyright__link" target="_blank" href="https://yandex.ru/legal/maps_termsofuse/">Условия использования</a></ymaps></ymaps></ymaps><ymaps class="ymaps-2-1-53-copyright__logo-cell"><a class="ymaps-2-1-53-copyright__logo" href="" target="_blank"></a></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps class="ymaps-2-1-53-map-copyrights-promo"><iframe src="https://api-maps.yandex.ru/services/inception/?lang=ru_RU&amp;iframe_id=9780&amp;url=%2Fmap&amp;api_version=2.1.53&amp;mode=release&amp;referer_host=apetta.tmweb.ru" width="171" height="29" scrolling="no" frameborder="0" style="overflow: hidden;"></iframe></ymaps></ymaps><ymaps class="ymaps-2-1-53-controls-pane" style="width: 100%; top: 0px; left: 0px; position: absolute; z-index: 3603;"><ymaps class="ymaps-2-1-53-controls__toolbar" style="margin-top: 10px;"><ymaps class="ymaps-2-1-53-controls__toolbar_left"></ymaps><ymaps class="ymaps-2-1-53-controls__toolbar_right"><ymaps class="ymaps-2-1-53-controls__control_toolbar" style="margin-right: 10px; margin-left: 0px;"><ymaps><ymaps class="ymaps-2-1-53-listbox ymaps-2-1-53-listbox_opened_no ymaps-2-1-53-listbox_align_right" style="width: 87px;"><ymaps class="ymaps-2-1-53-listbox__button ymaps-2-1-53-_visible-arrow ymaps-2-1-53-user-selection-none" title="" unselectable="on"><ymaps class="ymaps-2-1-53-listbox__button-icon ymaps-2-1-53-_icon_layers"></ymaps><ymaps class="ymaps-2-1-53-listbox__button-text">Слои</ymaps><ymaps class="ymaps-2-1-53-listbox__button-arrow"></ymaps></ymaps><ymaps class="ymaps-2-1-53-listbox__panel ymaps-2-1-53-i-custom-scroll" style="transform: translate3d(0px, 0px, 0px) scale(1, 1);"><ymaps class="ymaps-2-1-53-listbox__list" style="max-height: 999999px;"><ymaps><ymaps><ymaps id="id_150225788513556649876"><ymaps unselectable="on" class="ymaps-2-1-53-user-selection-none"><ymaps class="ymaps-2-1-53-listbox__list-item ymaps-2-1-53-listbox__list-item_selected_yes"><ymaps class="ymaps-2-1-53-listbox__list-item-text">Схема</ymaps></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps><ymaps><ymaps id="id_150225788513556649877"><ymaps unselectable="on" class="ymaps-2-1-53-user-selection-none"><ymaps class="ymaps-2-1-53-listbox__list-item ymaps-2-1-53-listbox__list-item_selected_no"><ymaps class="ymaps-2-1-53-listbox__list-item-text">Спутник</ymaps></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps><ymaps><ymaps id="id_150225788513556649878"><ymaps unselectable="on" class="ymaps-2-1-53-user-selection-none"><ymaps class="ymaps-2-1-53-listbox__list-item ymaps-2-1-53-listbox__list-item_selected_no"><ymaps class="ymaps-2-1-53-listbox__list-item-text">Гибрид</ymaps></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps><ymaps><ymaps id="id_150225788513556649874"><ymaps><ymaps class="ymaps-2-1-53-listbox__list-separator"></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps><ymaps><ymaps id="id_150225788513556649875"><ymaps unselectable="on" class="ymaps-2-1-53-user-selection-none"><ymaps class="ymaps-2-1-53-listbox__list-item ymaps-2-1-53-listbox__list-item_selected_no"><ymaps class="ymaps-2-1-53-listbox__list-item-text">Панорамы</ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps class="ymaps-2-1-53-controls__control_toolbar ymaps-2-1-53-user-selection-none" style="margin-right: 10px; margin-left: 0px;" unselectable="on"><ymaps><ymaps class="ymaps-2-1-53-float-button ymaps-2-1-53-_hidden-text" style="max-width: 28px" title=""><ymaps class="ymaps-2-1-53-float-button-icon ymaps-2-1-53-float-button-icon_icon_expand"></ymaps><ymaps class="ymaps-2-1-53-float-button-text"></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps class="ymaps-2-1-53-controls__bottom" style="top: 300px;"></ymaps><ymaps class="ymaps-2-1-53-controls__control" style="margin-right: 0px; margin-left: 0px; bottom: auto; top: 108px; right: auto; left: 10px;"><ymaps><ymaps class="ymaps-2-1-53-zoom" style="height: 5px"><ymaps class="ymaps-2-1-53-zoom__plus ymaps-2-1-53-zoom__button ymaps-2-1-53-float-button ymaps-2-1-53-user-selection-none" unselectable="on"><ymaps class="ymaps-2-1-53-zoom__icon ymaps-2-1-53-float-button-icon"></ymaps></ymaps><ymaps class="ymaps-2-1-53-zoom__minus ymaps-2-1-53-zoom__button ymaps-2-1-53-float-button ymaps-2-1-53-user-selection-none" unselectable="on"><ymaps class="ymaps-2-1-53-zoom__icon ymaps-2-1-53-float-button-icon"></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></div>
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
								<div id="map2" class="map"><ymaps class="ymaps-2-1-53-map" style="width: 749px; height: 300px;"><ymaps class="ymaps-2-1-53-map ymaps-2-1-53-i-ua_js_yes ymaps-2-1-53-map-bg-ru ymaps-2-1-53-islets_map-lang-ru" style="width: 749px; height: 300px;"><ymaps class="ymaps-2-1-53-inner-panes"><ymaps class="ymaps-2-1-53-events-pane ymaps-2-1-53-user-selection-none" unselectable="on" style="height: 100%; width: 100%; top: 0px; left: 0px; position: absolute; z-index: 2000; cursor: url(&quot;https://api-maps.yandex.ru/2.1.53/build/release/images/util_cursor_storage_grab.cur&quot;) 16 16, url(&quot;https://api-maps.yandex.ru/2.1.53/build/release/images/util_cursor_storage_grab.cur&quot;), move;"></ymaps><ymaps class="ymaps-2-1-53-ground-pane" style="top: 0px; left: 0px; position: absolute; transition-duration: 0ms; transform: translate3d(0px, 0px, 0px) scale(1, 1); z-index: 401; transition-timing-function: ease-out;"><ymaps style="position: absolute; z-index: 150;"><canvas height="556" width="1005" style="position: absolute; width: 1005px; height: 556px; left: -128px; top: -128px;"></canvas></ymaps></ymaps><ymaps class="ymaps-2-1-53-copyrights-pane" style="height: 0px; bottom: 5px; right: 3px; top: auto; left: 10px; position: absolute; z-index: 4002;"><ymaps><ymaps class="ymaps-2-1-53-copyright ymaps-2-1-53-copyright_logo_no"><ymaps class="ymaps-2-1-53-copyright__fog">…</ymaps><ymaps class="ymaps-2-1-53-copyright__wrap"><ymaps class="ymaps-2-1-53-copyright__layout"><ymaps class="ymaps-2-1-53-copyright__content-cell"><ymaps class="ymaps-2-1-53-copyright__content"><ymaps class="ymaps-2-1-53-copyright__text">© Яндекс</ymaps><ymaps class="ymaps-2-1-53-copyright__agreement">&nbsp;<a class="ymaps-2-1-53-copyright__link" target="_blank" href="https://yandex.ru/legal/maps_termsofuse/">Условия использования</a></ymaps></ymaps></ymaps><ymaps class="ymaps-2-1-53-copyright__logo-cell"><a class="ymaps-2-1-53-copyright__logo" href="" target="_blank"></a></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps class="ymaps-2-1-53-map-copyrights-promo"><iframe src="https://api-maps.yandex.ru/services/inception/?lang=ru_RU&amp;iframe_id=9806&amp;url=%2Fmap&amp;api_version=2.1.53&amp;mode=release&amp;referer_host=apetta.tmweb.ru" width="171" height="29" scrolling="no" frameborder="0" style="overflow: hidden;"></iframe></ymaps></ymaps><ymaps class="ymaps-2-1-53-controls-pane" style="width: 100%; top: 0px; left: 0px; position: absolute; z-index: 3603;"><ymaps class="ymaps-2-1-53-controls__toolbar" style="margin-top: 10px;"><ymaps class="ymaps-2-1-53-controls__toolbar_left"></ymaps><ymaps class="ymaps-2-1-53-controls__toolbar_right"><ymaps class="ymaps-2-1-53-controls__control_toolbar" style="margin-right: 10px; margin-left: 0px;"><ymaps><ymaps class="ymaps-2-1-53-listbox ymaps-2-1-53-listbox_opened_no ymaps-2-1-53-listbox_align_right" style="width: 87px;"><ymaps class="ymaps-2-1-53-listbox__button ymaps-2-1-53-_visible-arrow ymaps-2-1-53-user-selection-none" title="" unselectable="on"><ymaps class="ymaps-2-1-53-listbox__button-icon ymaps-2-1-53-_icon_layers"></ymaps><ymaps class="ymaps-2-1-53-listbox__button-text">Слои</ymaps><ymaps class="ymaps-2-1-53-listbox__button-arrow"></ymaps></ymaps><ymaps class="ymaps-2-1-53-listbox__panel ymaps-2-1-53-i-custom-scroll" style="transform: translate3d(0px, 0px, 0px) scale(1, 1);"><ymaps class="ymaps-2-1-53-listbox__list" style="max-height: 999999px;"><ymaps><ymaps><ymaps id="id_150225788513556649881"><ymaps unselectable="on" class="ymaps-2-1-53-user-selection-none"><ymaps class="ymaps-2-1-53-listbox__list-item ymaps-2-1-53-listbox__list-item_selected_yes"><ymaps class="ymaps-2-1-53-listbox__list-item-text">Схема</ymaps></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps><ymaps><ymaps id="id_150225788513556649882"><ymaps unselectable="on" class="ymaps-2-1-53-user-selection-none"><ymaps class="ymaps-2-1-53-listbox__list-item ymaps-2-1-53-listbox__list-item_selected_no"><ymaps class="ymaps-2-1-53-listbox__list-item-text">Спутник</ymaps></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps><ymaps><ymaps id="id_150225788513556649883"><ymaps unselectable="on" class="ymaps-2-1-53-user-selection-none"><ymaps class="ymaps-2-1-53-listbox__list-item ymaps-2-1-53-listbox__list-item_selected_no"><ymaps class="ymaps-2-1-53-listbox__list-item-text">Гибрид</ymaps></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps><ymaps><ymaps id="id_150225788513556649879"><ymaps><ymaps class="ymaps-2-1-53-listbox__list-separator"></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps><ymaps><ymaps id="id_150225788513556649880"><ymaps unselectable="on" class="ymaps-2-1-53-user-selection-none"><ymaps class="ymaps-2-1-53-listbox__list-item ymaps-2-1-53-listbox__list-item_selected_no"><ymaps class="ymaps-2-1-53-listbox__list-item-text">Панорамы</ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps class="ymaps-2-1-53-controls__control_toolbar ymaps-2-1-53-user-selection-none" style="margin-right: 10px; margin-left: 0px;" unselectable="on"><ymaps><ymaps class="ymaps-2-1-53-float-button ymaps-2-1-53-_hidden-text" style="max-width: 28px" title=""><ymaps class="ymaps-2-1-53-float-button-icon ymaps-2-1-53-float-button-icon_icon_expand"></ymaps><ymaps class="ymaps-2-1-53-float-button-text"></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps><ymaps class="ymaps-2-1-53-controls__bottom" style="top: 300px;"></ymaps><ymaps class="ymaps-2-1-53-controls__control" style="margin-right: 0px; margin-left: 0px; bottom: auto; top: 108px; right: auto; left: 10px;"><ymaps><ymaps class="ymaps-2-1-53-zoom" style="height: 5px"><ymaps class="ymaps-2-1-53-zoom__plus ymaps-2-1-53-zoom__button ymaps-2-1-53-float-button ymaps-2-1-53-user-selection-none" unselectable="on"><ymaps class="ymaps-2-1-53-zoom__icon ymaps-2-1-53-float-button-icon"></ymaps></ymaps><ymaps class="ymaps-2-1-53-zoom__minus ymaps-2-1-53-zoom__button ymaps-2-1-53-float-button ymaps-2-1-53-user-selection-none" unselectable="on"><ymaps class="ymaps-2-1-53-zoom__icon ymaps-2-1-53-float-button-icon"></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></ymaps></div>
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
				<input type="submit" name="iblock_submit" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" />
			</form>
		</div>
	</div>
</div>
*/

if (!empty($arResult["ERRORS"])):?>
	<?ShowError(implode("<br />", $arResult["ERRORS"]))?>
<?endif;
if (strlen($arResult["MESSAGE"]) > 0):?>
	<?ShowNote($arResult["MESSAGE"])?>
<?endif?>

<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
	<?=bitrix_sessid_post()?>
	<?if ($arParams["MAX_FILE_SIZE"] > 0):?>
		<input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>
	<table class="data-table" style="width: 90%">
		<thead>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
		</thead>
		<?if (is_array($arResult["PROPERTY_LIST"]) && !empty($arResult["PROPERTY_LIST"])):?>
		<tbody>
			<?foreach ($arResult["PROPERTY_LIST"] as $propertyID):?>
				<tr>
					<td><?if (intval($propertyID) > 0):?><?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"]?><?else:?><?=!empty($arParams["CUSTOM_TITLE_".$propertyID]) ? $arParams["CUSTOM_TITLE_".$propertyID] : GetMessage("IBLOCK_FIELD_".$propertyID)?><?endif?><?if(in_array($propertyID, $arResult["PROPERTY_REQUIRED"])):?><span class="starrequired">*</span><?endif?></td>
					<td>
						<?
						if (intval($propertyID) > 0)
						{
							if (
								$arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "T"
								&&
								$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] == "1"
							)
								$arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "S";
							elseif (
								(
									$arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "S"
									||
									$arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "N"
								)
								&&
								$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] > "1"
							)
								$arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "T";
						}
						elseif (($propertyID == "TAGS") && CModule::IncludeModule('search'))
							$arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "TAGS";

						if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y")
						{
							$inputNum = ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0) ? count($arResult["ELEMENT_PROPERTIES"][$propertyID]) : 0;
							$inputNum += $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE_CNT"];
						}
						else
						{
							$inputNum = 1;
						}

						if($arResult["PROPERTY_LIST_FULL"][$propertyID]["GetPublicEditHTML"])
							$INPUT_TYPE = "USER_TYPE";
						else
							$INPUT_TYPE = $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"];

						switch ($INPUT_TYPE):
							case "USER_TYPE":
								for ($i = 0; $i<$inputNum; $i++)
								{
									if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
									{
										$value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["~VALUE"] : $arResult["ELEMENT"][$propertyID];
										$description = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["DESCRIPTION"] : "";
									}
									elseif ($i == 0)
									{
										$value = intval($propertyID) <= 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
										$description = "";
									}
									else
									{
										$value = "";
										$description = "";
									}
									echo call_user_func_array($arResult["PROPERTY_LIST_FULL"][$propertyID]["GetPublicEditHTML"],
										array(
											$arResult["PROPERTY_LIST_FULL"][$propertyID],
											array(
												"VALUE" => $value,
												"DESCRIPTION" => $description,
											),
											array(
												"VALUE" => "PROPERTY[".$propertyID."][".$i."][VALUE]",
												"DESCRIPTION" => "PROPERTY[".$propertyID."][".$i."][DESCRIPTION]",
												"FORM_NAME"=>"iblock_add",
											),
										));
								?><br /><?
								}
							break;
							case "TAGS":
								$APPLICATION->IncludeComponent(
									"bitrix:search.tags.input",
									"",
									array(
										"VALUE" => $arResult["ELEMENT"][$propertyID],
										"NAME" => "PROPERTY[".$propertyID."][0]",
										"TEXT" => 'size="'.$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"].'"',
									), null, array("HIDE_ICONS"=>"Y")
								);
								break;
							case "HTML":
								$LHE = new CHTMLEditor;
								$LHE->Show(array(
									'name' => "PROPERTY[".$propertyID."][0]",
									'id' => preg_replace("/[^a-z0-9]/i", '', "PROPERTY[".$propertyID."][0]"),
									'inputName' => "PROPERTY[".$propertyID."][0]",
									'content' => $arResult["ELEMENT"][$propertyID],
									'width' => '100%',
									'minBodyWidth' => 350,
									'normalBodyWidth' => 555,
									'height' => '200',
									'bAllowPhp' => false,
									'limitPhpAccess' => false,
									'autoResize' => true,
									'autoResizeOffset' => 40,
									'useFileDialogs' => false,
									'saveOnBlur' => true,
									'showTaskbars' => false,
									'showNodeNavi' => false,
									'askBeforeUnloadPage' => true,
									'bbCode' => false,
									'siteId' => SITE_ID,
									'controlsMap' => array(
										array('id' => 'Bold', 'compact' => true, 'sort' => 80),
										array('id' => 'Italic', 'compact' => true, 'sort' => 90),
										array('id' => 'Underline', 'compact' => true, 'sort' => 100),
										array('id' => 'Strikeout', 'compact' => true, 'sort' => 110),
										array('id' => 'RemoveFormat', 'compact' => true, 'sort' => 120),
										array('id' => 'Color', 'compact' => true, 'sort' => 130),
										array('id' => 'FontSelector', 'compact' => false, 'sort' => 135),
										array('id' => 'FontSize', 'compact' => false, 'sort' => 140),
										array('separator' => true, 'compact' => false, 'sort' => 145),
										array('id' => 'OrderedList', 'compact' => true, 'sort' => 150),
										array('id' => 'UnorderedList', 'compact' => true, 'sort' => 160),
										array('id' => 'AlignList', 'compact' => false, 'sort' => 190),
										array('separator' => true, 'compact' => false, 'sort' => 200),
										array('id' => 'InsertLink', 'compact' => true, 'sort' => 210),
										array('id' => 'InsertImage', 'compact' => false, 'sort' => 220),
										array('id' => 'InsertVideo', 'compact' => true, 'sort' => 230),
										array('id' => 'InsertTable', 'compact' => false, 'sort' => 250),
										array('separator' => true, 'compact' => false, 'sort' => 290),
										array('id' => 'Fullscreen', 'compact' => false, 'sort' => 310),
										array('id' => 'More', 'compact' => true, 'sort' => 400)
									),
								));
								break;
							case "T":
								for ($i = 0; $i<$inputNum; $i++)
								{

									if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
									{
										$value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
									}
									elseif ($i == 0)
									{
										$value = intval($propertyID) > 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
									}
									else
									{
										$value = "";
									}
								?>
						<textarea cols="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"]?>" rows="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"]?>" name="PROPERTY[<?=$propertyID?>][<?=$i?>]"><?=$value?></textarea>
								<?
								}
							break;

							case "S":
							case "N":
								for ($i = 0; $i<$inputNum; $i++)
								{
									if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
									{
										$value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
									}
									elseif ($i == 0)
									{
										$value = intval($propertyID) <= 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];

									}
									else
									{
										$value = "";
									}
								?>
								<input type="text" name="PROPERTY[<?=$propertyID?>][<?=$i?>]" size="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"]; ?>" value="<?=$value?>" /><br /><?
								if($arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"] == "DateTime"):?><?
									$APPLICATION->IncludeComponent(
										'bitrix:main.calendar',
										'',
										array(
											'FORM_NAME' => 'iblock_add',
											'INPUT_NAME' => "PROPERTY[".$propertyID."][".$i."]",
											'INPUT_VALUE' => $value,
										),
										null,
										array('HIDE_ICONS' => 'Y')
									);
									?><br /><small><?=GetMessage("IBLOCK_FORM_DATE_FORMAT")?><?=FORMAT_DATETIME?></small><?
								endif
								?><br /><?
								}
							break;

							case "F":
								for ($i = 0; $i<$inputNum; $i++)
								{
									$value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
									?>
						<input type="hidden" name="PROPERTY[<?=$propertyID?>][<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>]" value="<?=$value?>" />
						<input type="file" size="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"]?>"  name="PROPERTY_FILE_<?=$propertyID?>_<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>" /><br />
									<?

									if (!empty($value) && is_array($arResult["ELEMENT_FILES"][$value]))
									{
										?>
					<input type="checkbox" name="DELETE_FILE[<?=$propertyID?>][<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>]" id="file_delete_<?=$propertyID?>_<?=$i?>" value="Y" /><label for="file_delete_<?=$propertyID?>_<?=$i?>"><?=GetMessage("IBLOCK_FORM_FILE_DELETE")?></label><br />
										<?

										if ($arResult["ELEMENT_FILES"][$value]["IS_IMAGE"])
										{
											?>
					<img src="<?=$arResult["ELEMENT_FILES"][$value]["SRC"]?>" height="<?=$arResult["ELEMENT_FILES"][$value]["HEIGHT"]?>" width="<?=$arResult["ELEMENT_FILES"][$value]["WIDTH"]?>" border="0" /><br />
											<?
										}
										else
										{
											?>
					<?=GetMessage("IBLOCK_FORM_FILE_NAME")?>: <?=$arResult["ELEMENT_FILES"][$value]["ORIGINAL_NAME"]?><br />
					<?=GetMessage("IBLOCK_FORM_FILE_SIZE")?>: <?=$arResult["ELEMENT_FILES"][$value]["FILE_SIZE"]?> b<br />
					[<a href="<?=$arResult["ELEMENT_FILES"][$value]["SRC"]?>"><?=GetMessage("IBLOCK_FORM_FILE_DOWNLOAD")?></a>]<br />
											<?
										}
									}
								}

							break;
							case "L":

								if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["LIST_TYPE"] == "C")
									$type = $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y" ? "checkbox" : "radio";
								else
									$type = $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y" ? "multiselect" : "dropdown";

								switch ($type):
									case "checkbox":
									case "radio":
										foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $arEnum)
										{
											$checked = false;
											if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
											{
												if (is_array($arResult["ELEMENT_PROPERTIES"][$propertyID]))
												{
													foreach ($arResult["ELEMENT_PROPERTIES"][$propertyID] as $arElEnum)
													{
														if ($arElEnum["VALUE"] == $key)
														{
															$checked = true;
															break;
														}
													}
												}
											}
											else
											{
												if ($arEnum["DEF"] == "Y") $checked = true;
											}

											?>
							<input type="<?=$type?>" name="PROPERTY[<?=$propertyID?>]<?=$type == "checkbox" ? "[".$key."]" : ""?>" value="<?=$key?>" id="property_<?=$key?>"<?=$checked ? " checked=\"checked\"" : ""?> /><label for="property_<?=$key?>"><?=$arEnum["VALUE"]?></label><br />
											<?
										}
									break;

									case "dropdown":
									case "multiselect":
									?>
							<select name="PROPERTY[<?=$propertyID?>]<?=$type=="multiselect" ? "[]\" size=\"".$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"]."\" multiple=\"multiple" : ""?>">
								<option value=""><?echo GetMessage("CT_BIEAF_PROPERTY_VALUE_NA")?></option>
									<?
										if (intval($propertyID) > 0) $sKey = "ELEMENT_PROPERTIES";
										else $sKey = "ELEMENT";

										foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $arEnum)
										{
											$checked = false;
											if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
											{
												foreach ($arResult[$sKey][$propertyID] as $elKey => $arElEnum)
												{
													if ($key == $arElEnum["VALUE"])
													{
														$checked = true;
														break;
													}
												}
											}
											else
											{
												if ($arEnum["DEF"] == "Y") $checked = true;
											}
											?>
								<option value="<?=$key?>" <?=$checked ? " selected=\"selected\"" : ""?>><?=$arEnum["VALUE"]?></option>
											<?
										}
									?>
							</select>
									<?
									break;

								endswitch;
							break;
						endswitch;?>
					</td>
				</tr>
			<?endforeach;?>
			<?if($arParams["USE_CAPTCHA"] == "Y" && $arParams["ID"] <= 0):?>
				<tr>
					<td><?=GetMessage("IBLOCK_FORM_CAPTCHA_TITLE")?></td>
					<td>
						<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
					</td>
				</tr>
				<tr>
					<td><?=GetMessage("IBLOCK_FORM_CAPTCHA_PROMPT")?><span class="starrequired">*</span>:</td>
					<td><input type="text" name="captcha_word" maxlength="50" value=""></td>
				</tr>
			<?endif?>
		</tbody>
		<?endif?>
		<tfoot>
			<tr>
				<td colspan="2">
					<input type="submit" name="iblock_submit" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" />
					<?if (strlen($arParams["LIST_URL"]) > 0):?>
						<input type="submit" name="iblock_apply" value="<?=GetMessage("IBLOCK_FORM_APPLY")?>" />
						<input
							type="button"
							name="iblock_cancel"
							value="<? echo GetMessage('IBLOCK_FORM_CANCEL'); ?>"
							onclick="location.href='<? echo CUtil::JSEscape($arParams["LIST_URL"])?>';"
						>
					<?endif?>
				</td>
			</tr>
		</tfoot>
	</table>
</form>
*/?>