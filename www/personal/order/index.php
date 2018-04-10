<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
require($_SERVER["DOCUMENT_ROOT"] . "/personal/order/dev.php");
?>
	<link rel="stylesheet" href="style.css">

<?if(count($arResult['BASKET']['ITEMS']) > 0 ){

	$arSelect = Array("ID", "NAME","PROPERTY_SECTION_LINK","IBLOCK_SECTION_ID");
	$arFilter = Array("IBLOCK_ID"=>IntVal(7), "PROPERTY_SECTION_LINK"=> 475,"ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		echo "<pre>";print_r($arFields);echo "</pre>";
		echo "<pre>";print_r("___");echo "</pre>";
		$result['NAME'] = $arFields['NAME'];
	}

	//echo "<pre>";print_r(get_parent_section(6,329));echo "</pre>";
//	echo "<pre>";print_r(last_parent(329));echo "</pre>";
	//echo '<pre> $arResult[AGBIS_USER_INFO] = ';print_r($arResult['AGBIS_USER_INFO']);echo "</pre>";

	?>
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
	<?if(empty($_COOKIE['AGBIS_SESSION_ID'])) {?>
		<div class="wrapper100 background-grey" id="auth_form">
			<h2>Если вы уже клиент "Apetta", войдите на сайт</h2>
			<div class="row">
				<div class="item7">
					<div class="auth-block">
						<div class="email-password__wrap ajax-login">
							<div class="title">Введите ваш номер телефона и пароль (пароль приходит по смс)</div>
							<form action="/ajax/loginUser.php" method="post">
								<input type="text" name="phone" required placeholder="Телефон" value="">
								<input type="text" name="pass" required placeholder="Пароль из смс" value="">
								<div class="submit-form__wrap">
									<input type="submit" name="submit" value="Войти" class="btn"><span> - если у нас впервые - <a href="" id="auth-hide">давайте знакомиться</a></span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?}?>
	<div class="order-form"><script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
		<div class="row">
			<div class="item7">
				<?if(empty($_COOKIE['AGBIS_SESSION_ID'])) {?>
					<form action="/ajax/registerUser.php" method="post" id="REGISTER_FORM">
						<div class="order-form--block contact-info">
							<h2 class="aleft">1. Введите Ваши данные</h2>
							<div class="label-input-block w100">
								<p><a href="" id="auth-show">Я клиент химчистки Apetta</a></p>
							</div>
							<div class="label-input-block">
								<label for="fname">Ваше имя</label>
								<input id="fname" name="name" type="text" value="">
							</div>
							<div class="label-input-block">
								<label for="order_email">Ваш e-mail</label>
								<input id="order_email" name="mail" type="text" value="">
							</div>
							<div class="label-input-block w100">
								<label for="phone">Введите номер телефона и нажмите на кнопку для подтверждения</label>
								<input id="phone" name="phone" type="text" value="">
								<a href="" id="get_sms" class="btn">Получить смс</a>
							</div>
							<div class="label-input-block w100 sms-block">
								<label for="phone">Код из СМС</label>
								<input id="phone" name="PERSONAL_PHONE" type="text" value="">
								<a href="" id="auth_yes" class="btn">Подтвердить номер телефона</a>
							</div>
						</div>
					</form>
				<? } ?>
				<form action="" method="" id="ORDER_FORM">
					<?if(isset($_COOKIE['AGBIS_SESSION_ID']) AND !empty($_COOKIE['AGBIS_SESSION_ID'])) {?>
						<div class="order-form--block contact-info">
							<h2 class="aleft">1. Введите Ваши данные</h2>
							<div class="label-input-block w100">
								<label for="fname">Ваше имя</label>
								<input id="fname" name="PERSONAL_NAME" type="text" value="<?=$arResult['AGBIS_USER_INFO']['NAME']?>">
							</div>
							<div class="label-input-block">
								<label for="phone">Ваш телефон</label>
								<input id="phone" name="PERSONAL_PHONE" type="text" value="<?=$arResult['AGBIS_USER_INFO']['PHONE_CELL']?>">
							</div>
							<div class="label-input-block">
								<label for="order_email">Ваш e-mail</label>
								<input id="order_email" name="PERSONAL_EMAIL" type="text" value="<?=$arResult['AGBIS_USER_INFO']['EMAIL']?>">
							</div>
						</div>
					<?}?>
					<div class="order-form--block delivery-fromme">
						<h2 class="aleft">2. Как вы хотите отдать вещи на чистку?</h2>
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
										<input type="text" name="address" id="address_to" value="<?=$arResult['AGBIS_USER_INFO']['ADDRESS']?>" placeholder="Введите свой адрес"><a href="javascript:void(0);" id = "find_to" class="btn">Найти ближайшую химчистку</a>
									</div>
									<div id="map_to" class="map"></div>
									<input type="text" style="display: none" name="DELIVERY_TO_MAP" value="">
								</div>
							</div>
							<div class="radio2-tab" style="display:none">
								<input name="DELIVERY_TO_AGBIS" type="text" value="<?=$arResult['AGBIS_USER_ADDRESS']['id'];?>" style="display:none;">
								<div class="fields-block">
<!--									<div class="label-input-block">-->
<!--										<label for="address_dostavki_from">Адрес доставки</label>-->
<!--										<input id="address_dostavki_from" name="DELIVERY_TO_ADDRESS" type="text" value="">-->
<!--									</div>-->
									<div class="label-input-block">
										<label for="address_dostavki_from">Город</label>
										<input id="address_dostavki_from" name="DELIVERY_TO_CITY" type="text" value="Санкт-Петербург" disabled>
									</div>
									<div class="label-input-block">
										<label for="address_dostavki_from">Улица</label>
										<input id="address_dostavki_from" name="DELIVERY_TO_STREET" type="text" value="<?=$arResult['AGBIS_USER_ADDRESS']['street'];?>">
									</div>
									<div class="label-input-block">
										<label for="address_dostavki_from">Дом</label>
										<input id="address_dostavki_from" name="DELIVERY_TO_HOME" type="text" value="<?=$arResult['AGBIS_USER_ADDRESS']['house'];?>">
									</div>
									<div class="label-input-block">
										<label for="address_dostavki_from">Корпус</label>
										<input id="address_dostavki_from" name="DELIVERY_TO_BLOCK" type="text" value="<?=$arResult['AGBIS_USER_ADDRESS']['housing'];?>">
									</div>
									<div class="label-input-block">
										<label for="address_dostavki_from">Квартира</label>
										<input id="address_dostavki_from" name="DELIVERY_TO_APARTMENT" type="text" value="<?=$arResult['AGBIS_USER_ADDRESS']['room'];?>">
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
						<h2 class="aleft">3. Как вам удобно получить чистые вещи?</h2>
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
										<input type="text" name="address" value="<?=$arResult['AGBIS_USER_INFO']['ADDRESS']?>" id = "address_from" placeholder="Введите свой адрес"><a href="javascript:void(0)" id="find_from" class="btn">Найти ближайшую химчистку</a>
									</div>
									<div id="map_from" class="map"></div>
									<input type="text" style="display: none" name="DELIVERY_FROM_MAP" value="">
								</div>
							</div>
							<div class="radio4-tab" style="display:none">
								<input name="DELIVERY_FROM_AGBIS" type="text" value="<?=$arResult['AGBIS_USER_ADDRESS']['id'];?>" style="display: none">
								<div class="fields-block">
<!--									<div class="label-input-block">-->
<!--										<label for="address_dostavki_to">Адрес доставки</label>-->
<!--										<input id="address_dostavki_to" name="DELIVERY_FROM_ADDRESS" type="text" value="">-->
<!--									</div>-->
									<div class="label-input-block">
										<label for="address_dostavki_from">Город</label>
										<input id="address_dostavki_from" name="DELIVERY_FROM_CITY" type="text" value="Санкт-Петербург" disabled>
									</div>
									<div class="label-input-block">
										<label for="address_dostavki_from">Улица</label>
										<input id="address_dostavki_from" name="DELIVERY_FROM_STREET" type="text" value="<?=$arResult['AGBIS_USER_ADDRESS']['street'];?>">
									</div>
									<div class="label-input-block">
										<label for="address_dostavki_from">Дом</label>
										<input id="address_dostavki_from" name="DELIVERY_FROM_HOME" type="text" value="<?=$arResult['AGBIS_USER_ADDRESS']['house'];?>">
									</div>
									<div class="label-input-block">
										<label for="address_dostavki_from">Корпус</label>
										<input id="address_dostavki_from" name="DELIVERY_FROM_BLOCK" type="text" value="<?=$arResult['AGBIS_USER_ADDRESS']['housing'];?>">
									</div>
									<div class="label-input-block">
										<label for="address_dostavki_from">Квартира</label>
										<input id="address_dostavki_from" name="DELIVERY_FROM_APARTMENT" type="text" value="<?=$arResult['AGBIS_USER_ADDRESS']['room'];?>">
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
						<h2 class="aleft">5. Посмотрите, все ли верно?</h2>
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
	
}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>