<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);?>


<?$this->SetViewTarget("breadcrumbs");?>
	<div class="section-page">
		<div class="breadcrumbs-block">
			<? $APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"catalog_detail",
				Array(
					"PATH" => "",
					"SITE_ID" => "s1",
					"START_FROM" => "0"
				)
			); ?>
		</div>
	</div>
<?$this->EndViewTarget();?>
	<div class="wrapper-content">
		<div class="row">
			<div class="item10 span1">
				<div class="product-cart__wrapper">
					<div class="row">
						<div class="product-cart__calculate item6">
                            <?if(!empty($arResult['PREVIEW_TEXT'])){?>
                                <div class="product-cart__detail_text">
                                    <?=$arResult['~PREVIEW_TEXT'];?>
                                </div>
                            <?}?>
							<?if(!empty($arResult['FILTER_SECTION'])){?>
								<div class="product-cart__generating">
									<div class="hint">Заполните все поля ниже, для более точной оценки.</div>
									<div class="ajax_block">
										<div class="variable_content" id="filter_level_<?=$arResult['FILTER_SECTION']['DEPTH_LEVEL'];?>">
											<div class="name_property"><?=$arResult['FILTER_SECTION']['NAME'];?></div>
											<div class="radiobuttons_block row" >
												<?foreach ($arResult['FILTER_SECTION']['ITEMS'] as $item){?>
													<div class="radiobutton_image radiobutton item2">
														<?if(!empty($item['DESCRIPTION'])){?>
															<div class="hover_hint"><?=$item['DESCRIPTION'];?></div>
														<?}?>
														<input type="radio" name="radiog_lite" id="radio<?=$item['ID'];?>" class="css-checkbox" data-id="<?=$item['ID'];?>" data-this_is="<?=$item['THIS_IS'];?>" data-depth_level="<?=$item['DEPTH_LEVEL'];?>">
														<label for="radio<?=$item['ID'];?>" class="css-label radGroup<?=$item['ID'];?>>"><?=$item['NAME'];?></label>
														<div class="image_block">
															<img src="<?=$item['PICTURE'];?>" alt="<?=$item['NAME'];?> <?=$item['ID'];?>"  height="120">
														</div>
													</div>
												<?}?>
											</div>
										</div>

									</div>
								</div>
							<?}else{?>
								<div class="product-cart__generating">
									<div class="hint">Заполните все поля ниже, для более точной оценки.</div>
									<div class="">
										<div class="variable_content" >
											<div class="name_property"></div>
											<div class="radiobuttons_block row" >
												<?foreach ($arResult['ONE_PRODUCT']['ITEMS'] as $item){?>
													<div class="radiobutton_image radiobutton item2">
														<?if(!empty($item['DESCRIPTION'])){?>
															<div class="hover_hint"><?=$item['DESCRIPTION'];?></div>
														<?}?>
														<input type="radio" name="radiog_lite" id="radio<?=$item['ID'];?>" class="css-checkbox" data-id="<?=$item['ID'];?>" data-this_is="<?=$item['THIS_IS'];?>" data-depth_level="<?=$item['DEPTH_LEVEL'];?>" checked>
														<label for="radio<?=$item['ID'];?>" class="css-label radGroup<?=$item['ID'];?>>"><?=$item['NAME'];?></label>
														<div class="image_block">
															<img src="<?=$item['PICTURE'];?>" alt="<?=$item['NAME'];?> <?=$item['ID'];?>"  height="120">
														</div>
													</div>
												<?}?>
											</div>
										</div>

									</div>
								</div>
							<?}?>
							<div class="related-products">
								<h2>Рекомендуем</h2>
								<div class="related-products__items">
									<div class="product_item">
										<div class="image_block"><a href="#fastproduct" class="fancybox_ORDER_FAST"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/sopytka2.jpg" alt=""></a></div><a href="">
											<div class="name">Чехол для одежды </div></a>
										<div class="prices">
											<div class="old-price"></div>
											<div class="price">400 Р</div>
										</div><a href="#fastproduct" class="fancybox btn">Подробнее</a>
									</div>
								</div>
							</div>
						</div>
						<div class="product-cart__buyit item4">
							<div class="buyit__background"></div>
							<div class="buyit__content">
								<div class="item3">
									<h2>Приблизительная оценка</h2>
										<input type="hidden" name="product_id" value="REQUEST_FROM_AJAX_CALCULATING">
										<div class="properties_block">
											<?if(!empty($arResult['FILTER_SECTION'])){?>
												<div class="ajax_block">
													<div class="property_row error">
														<div class="value">Не выбрано</div>
													</div>
												</div>
											<?}?>
											<div class="property_row">
												<div class="name">Количество</div>
												<div class="count_block">
													<div class="minus"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 2"><path fill="#009ACE" fill-rule="evenodd" d="M0 0h10v2H0z"/></svg></div>
													<input type="text" min="1" value="1" required name="QUANTITY">
													<div class="plus"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"><path fill="#009ACE" fill-rule="evenodd" d="M4 4H0v2h4v4h2V6h4V4H6V0H4v4z"/></svg></div>
												</div>
											</div>
										</div>
										<div class="information_block">
											<?if($arResult['PRICE']['PRODUCT_ID']){?>
												<input type="text" value="<?=$arResult['PRICE']['PRODUCT_ID'];?>" required name="ID_PRODUCT" style="display: none">
											<?}?>
											<div class="info_element">
												<div class="name">Срок</div>
												<div class="value">2 дня</div>
											</div>
											<div class="info_element">
												<div class="name">Цена</div>
												<div class="value">
													<?
													if(!empty($arResult['PRICE'])){
														if ($ar_res['RESULT_PRICE']['DISCOUNT'] != 0) {
															?>
															<div
																class="old-price"><?= CurrencyFormat($arResult['PRICE']['RESULT_PRICE']['BASE_PRICE'], $arResult['PRICE']['RESULT_PRICE']['CURRENCY']); ?></div><?= CurrencyFormat($ar_res['RESULT_PRICE']['DISCOUNT_PRICE'], $ar_res['RESULT_PRICE']['CURRENCY']); ?>
														<? } else {
															?>
															<?= CurrencyFormat($arResult['PRICE']['RESULT_PRICE']['BASE_PRICE'], $arResult['PRICE']['RESULT_PRICE']['CURRENCY']); ?>
														<? }
													}else{ ?>
														...
													<?}?>
												</div>
											</div>
											<div class="info_element">
												<div class="name">Дисконтная цена</div>
												<?if(!empty($arResult['PRICE'])){?>
													<?$discount = $arResult['PRICE']['RESULT_PRICE']['BASE_PRICE']*0.1;
													$old_price = round($arResult['PRICE']['RESULT_PRICE']['BASE_PRICE']-$discount)?>
													<div class="value"><?= CurrencyFormat($old_price, $arResult['PRICE']['RESULT_PRICE']['CURRENCY']); ?><a href="" class="block">Как получить?</a></div>

												<?}else{?>
													<div class="value">
													...
													</div>
												<?}?>
											</div>
										</div>
										<div class="buttons_block"><a href="/cart/" data-popup="cart" class="btn"><span class="add">В корзину</span><span class="added"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="14" viewBox="0 0 19 14"><path fill="#FFF" fill-rule="evenodd" d="M0 7.755L6.476 14l12.19-12.96L17.588 0 6.477 11.918 1.078 6.714z"/></svg><i>Добавлено в корзину</i></span></a><a href="#fastorder" class="fancybox btn red">Быстрый заказ</a></div>
										<div class="attributes-info">
											<div class="attributes-info__element money">
												<img src="https://static.tildacdn.com/lib/tildaicon/35333563-6232-4131-a562-663033373163/8yo_hours.svg" width="25" height="19" alt="">
												<div class="text">Срочная стирка. От 1 часа. Услуга доступна при обращении в цех, +50% к цене </div>
											</div>
											<div class="attributes-info__element delivery"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="15" viewBox="0 0 31 15"><path fill="#0A0A08" fill-rule="evenodd" d="M29.519 12.02h-.806a2.343 2.343 0 0 0-2.253-1.73c-1.074 0-1.98.734-2.252 1.73h-.662V4.42h2.714l3.259 3.746v3.855zm-3.059 1.731c-.607 0-1.1-.497-1.1-1.109 0-.611.493-1.109 1.1-1.109.607 0 1.101.498 1.101 1.11 0 .61-.493 1.108-1.1 1.108zm-12.744 0c-.607 0-1.101-.497-1.101-1.109 0-.611.494-1.109 1.1-1.109.608 0 1.102.498 1.102 1.11 0 .61-.494 1.108-1.101 1.108zm8.595-1.73h-6.343a2.343 2.343 0 0 0-2.252-1.731c-1.075 0-1.981.734-2.253 1.73h-.671V1.244H22.31V12.02zm1.897 1.243h-8.24a2.343 2.343 0 0 1-2.252 1.73 2.342 2.342 0 0 1-2.253-1.73h-1.289a.62.62 0 0 1-.617-.622v-.632H5.982a.62.62 0 0 1-.618-.622.62.62 0 0 1 .618-.622h3.575V2.705h-5.94A.62.62 0 0 1 3 2.083a.62.62 0 0 1 .618-.622h5.939v-.84A.62.62 0 0 1 10.174 0h12.754a.62.62 0 0 1 .618.622v2.553h2.994c.178 0 .347.077.465.212L30.6 7.521a.625.625 0 0 1 .153.41v4.711a.62.62 0 0 1-.618.622h-1.423a2.343 2.343 0 0 1-2.253 1.73 2.342 2.342 0 0 1-2.252-1.73zM3.948 11a.62.62 0 0 1 .617.622.62.62 0 0 1-.618.622h-.33A.62.62 0 0 1 3 11.622.62.62 0 0 1 3.618 11h.33zm3.905-4.378a.62.62 0 0 1-.618.622H.618A.62.62 0 0 1 0 6.622.62.62 0 0 1 .618 6h6.617a.62.62 0 0 1 .618.622z"/></svg>
												<div class="text">Бесплатная доставка при заказе от 3000 рублей</div>
											</div>
											<div class="attributes-info__element money"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="19" viewBox="0 0 33 19"><path fill="#0A0A08" fill-rule="evenodd" d="M31.685 13.098c0 .44-.365.8-.814.8h-5.893v-1.82h6.707v1.02zm-8.022 2.845c0 .441-.366.8-.815.8H2.13a.808.808 0 0 1-.814-.8V4.936c0-.441.365-.8.814-.8h20.72c.448 0 .814.359.814.8v11.007zM9.337 2.09c0-.44.366-.8.815-.8H30.87c.449 0 .814.36.814.8v5.52h-6.707V4.936c0-1.153-.956-2.09-2.13-2.09H9.338V2.09zm15.64 8.697h6.708V8.901h-6.707v1.886zM33 2.09v11.008c0 1.152-.955 2.09-2.13 2.09h-5.892v.755c0 1.153-.956 2.09-2.13 2.09H2.13C.955 18.034 0 17.097 0 15.944V4.936c0-1.153.955-2.09 2.13-2.09h5.892V2.09c0-1.152.956-2.09 2.13-2.09H30.87C32.045 0 33 .938 33 2.09zM21.755 14h-.098a.651.651 0 0 0-.657.645c0 .357.294.646.657.646h.098a.651.651 0 0 0 .658-.646.651.651 0 0 0-.658-.645zm-1.915 0h-1.183a.651.651 0 0 0-.657.645c0 .357.294.646.657.646h1.183a.651.651 0 0 0 .658-.646.651.651 0 0 0-.658-.645zM5.764 6H4.517C3.68 6 3 6.668 3 7.49v1.223c0 .821.68 1.49 1.517 1.49h1.247c.837 0 1.517-.669 1.517-1.49V7.49C7.281 6.668 6.601 6 5.764 6zm.202 2.713a.2.2 0 0 1-.202.199H4.517a.2.2 0 0 1-.202-.199V7.49a.2.2 0 0 1 .202-.198h1.247a.2.2 0 0 1 .202.198v1.224z"/></svg>
												<div class="text">Оплатить заказ можно на сайте или при получении товара</div>
											</div>
										</div>
<!--									</form>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
