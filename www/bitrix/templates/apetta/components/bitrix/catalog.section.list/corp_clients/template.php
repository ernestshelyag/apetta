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
$this->setFrameMode(true);
?>

<div id="corp_client">
	<?foreach ($arResult['DATA'] as $arSect){
		switch ($arSect['UF_TEMPLATE_VIEW']) {
			case '12':?>
				<h3><?=$arSect['NAME'];?></h3>
				<? if (!empty($arSect['DESCRIPTION'])) {
					echo $arSect['DESCRIPTION'];
				}
				if(!empty($arSect['ITEMS'])){?>
					<div class="corp_img">
						<?foreach ($arSect['ITEMS'] as $item){?>
							<div>
								<img src="<?=$item['IMG_RESIZE']['SRC'];?>" alt="<?=$item['NAME'];?>" height="183">
								<?if(!empty($item['NAME'])){?>
									<p><?=$item['NAME'];?></p>
								<?}?>
							</div>
						<?}?>
					</div>
				<?}
				?>
			<?break;
			case '13':?>
				<h3><?=$arSect['NAME'];?></h3>
				<?if(!empty($arSect['ITEMS'])){?>
					<ul class="advantages">
						<?foreach ($arSect['ITEMS'] as $item){?>
							<li style="background-image: url('<?=$item['IMG_RESIZE'];?>')">
								<p>
									<b><?=$item['NAME'];?></b>&nbsp;<?=$item['PREVIEW_TEXT'];?>
								</p>
							</li>
						<?}?>
					</ul>
				<?}?>
			<?break;
			case '14':?>
				<h3><?=$arSect['NAME'];?></h3>
				<?if(!empty($arSect['ITEMS'])){?>
					<ul class="plus_apetta">
						<?foreach ($arSect['ITEMS'] as $item){?>
							<li style="background-image: url('<?=$item['IMG_RESIZE'];?>')">
								<p>
									<?=$item['PREVIEW_TEXT'];?>
								</p>
							</li>
						<?}?>
					</ul>
				<?}?>
				<? if (!empty($arSect['DESCRIPTION'])) {
					echo '<br>';
					echo $arSect['DESCRIPTION'];
				}?>
                 <?$APPLICATION->IncludeComponent(
                        "bitrix:form.result.new",
                        ".default",
                        Array(
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_SHADOW" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "N",
                            "AJAX_OPTION_HISTORY" => "N",
                            "SEF_MODE" => "N",
                            "WEB_FORM_ID" => "4",
                            "LIST_URL" => "",
                            "EDIT_URL" => "",
                            "SUCCESS_URL" => "",
                            "CHAIN_ITEM_TEXT" => "",
                            "CHAIN_ITEM_LINK" => "",
                            "IGNORE_CUSTOM_TEMPLATE" => "N",
                            "USE_EXTENDED_ERRORS" => "N",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600",
                            "COMPONENT_TEMPLATE" => ".default",
                            "VARIABLE_ALIASES" => Array(
                                "WEB_FORM_ID" => "WEB_FORM_ID",
                                "RESULT_ID" => "RESULT_ID"
                            )
                        )
                    );?>
			<?break;
			case '15':?>
				<div class="main-content_block item10">
					<h2><?=$arSect['NAME'];?></h2>
					<?if(!empty($arSect['ITEMS'])){?>
						<div class="partners_block">
							<?foreach ($arSect['ITEMS'] as $item){?>
								<div class="partners-item">
									<img src="<?=$item['IMG_RESIZE'];?>" alt="<?=$item['NAME'];?>">
								</div>
							<?}?>
						</div>
					<?}?>
				</div>
			<?break;
			case '16':?>
				<h3><?=$arSect['NAME'];?></h3>
				<? if (!empty($arSect['DESCRIPTION'])) {
					echo $arSect['DESCRIPTION'];
				}
				if(!empty($arSect['ITEMS'])){?>
					<div class="cart-right-block aleft">
						<div class="content">
							<div class="products-block">
								<div class="header">
									<div class="item-name">Наименование</div>
									<div class="item-count">Ед. изм.</div>
									<div class="item-price">Стоимость, руб. <span>*</span></div>
								</div>
								<div class="column">
									<?foreach ($arSect['ITEMS'] as $item){?>
										<div class="product-item">
											<div class="item-name">
												<div class="name"><?=$item['NAME'];?></div>
											</div>
											<div class="item-count count_block">
												<p><?=$item['UNITS'];?></p>
											</div>
											<div class="item-price"><span><?=$item['PRICE'];?> </span></div>
										</div>
									<?}?>
								</div>
							</div>
							<div class="descr">Cтоимость варьируется в зависимости от вида ткани и дополнительных услуг</div>
						</div>
					</div>
				<?}?>
		<?}
	}?>

</div>
	<?/*
        <h3>Корпоративное обслуживание </h3>
        <p>
Стирка для организаций, оформивших договор о корпоративном обслуживании с нашей химчисткой, перестает быть
            хлопотным делом, поскольку «корпоративные» заботы берет на себя профессионал.
        </p>
        <p>
Столовое и постельное белье, шторы и подушки, полотенца и коврики, спецодежда и униформа – все это и многое
            другое нуждается в регулярном и тщательном уходе. И поскольку собственная прачечная для организаций часто
            оказывается непозволительной роскошью, сотрудничество с «Европейской химчисткой Apetta» становится самым
            логичным и удобным решением.
        </p>
        <div class="corp_img">
            <img src="/bitrix/templates/apetta/assets/img/corp/corp_service_1.jpg" alt="">
            <img src="/bitrix/templates/apetta/assets/img/corp/corp_service_4.jpg" alt="">
            <img src="/bitrix/templates/apetta/assets/img/corp/corp_service_3.jpg" alt="">
        </div>
        <p>
        </p>

        <h3>
Преимущества договора о корпоративном обслуживании </h3>
        <p>
        </p>
        <ul class="advantages">
            <li style="background-image: url('/bitrix/templates/apetta/assets/img/corp/kideducate_diploma.svg')">
                <p>
                    <b>Индивидуальные условия.</b>&nbsp;Наши клиенты не переплачивают за услуги химчистки. Мы формируем цену
                    исходя из объемов заказа, видов тканей, набора дополнительных услуг, долгосрочности договора и других
                    нюансов, и предлагаем каждому клиенту выгодные условия.
                </p>
            </li>
            <li style="background-image: url('/bitrix/templates/apetta/assets/img/corp/webinar_calendar.svg')">
                <p>
                    <b>Доступность услуг 7 дней в неделю.</b>&nbsp;«Европейская химчистка Apetta» работает без выходных.
Ваши заказы оперативно выполняются и в будни, и по выходным.
                </p>
            </li>
            <li style="background-image: url('/bitrix/templates/apetta/assets/img/corp/1ed_timer.svg')">
                <p>
                    <b>Оперативность выполнения работы.</b>&nbsp;Корпоративные клиенты обслуживаются с максимальной
                    оперативностью – на выполнение заказа тратится от трех часов.
                </p>
            </li>
            <li style="background-image: url('/bitrix/templates/apetta/assets/img/corp/photostudio_outdoors.svg')">
                <p>
                    <b>Надежная служба доставки.</b>&nbsp;Доставка готовых чистых изделий осуществляется ежедневно в любые
                    районы города и пригороды. Вы можете заказать выездные услуги – и тогда мы приедем в указанное вами
                    время по указанному адресу, заберем вещи на обслуживание и вернем их чистыми и выглаженными.
                </p>
            </li>
            <li style="background-image: url('/bitrix/templates/apetta/assets/img/corp/14ht_washingmachine.svg')">
                <p><b>Бесплатный тест.</b>&nbsp;Перед тем как принять решение о сотрудничестве, вы можете оценить качество и
                    удобство,&nbsp;заказав бесплатную пробную стирку.<br>
                </p>
            </li>
        </ul>

        <div class="wrapper100 background-grey">
            <h2>Запишитесь на бесплатный тест</h2>
            <div class="row">
                <div class="item7">
                    <div class="auth-block">
                        <div class="email-password__wrap">
                            <form action="" method="post">
                                <input type="text" name="email" placeholder="Email" value="">
                                <div class="submit-form__wrap">
                                    <input type="submit" name="submit" value="Записаться" class="btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3>
Плюсы «Европейской химчистки Apetta» </h3>
        <p>
        </p>
        <ul class="plus_apetta">
            <li>
                <p>
Высококлассные сотрудники, которые регулярно повышают свою квалификацию.
                </p>
            </li>
            <li>
                <p>
Современное импортное оборудование, собственная служба сервиса, работающая под контролем поставщика.
                </p>
            </li>
            <li>
                <p>
Жесткий контроль качества выполняемых работ.
                </p>
            </li>
            <li>
                <p>
Безопасная современная химия. Средства, которые мы используем для стирки и чистки ваших вещей, безопасны
                    по составу и сохраняют структуру ткани.
                </p>
            </li>
            <li>
                <p>
Большой список услуг, включающий чистку, стирку, ремонт, озонирование и т. д., который позволит
                    удовлетворить самые разные запросы наших клиентов.
                </p>
            </li>
        </ul>
        <br>
        <br>
        <p>
Долгосрочное сотрудничество с «Европейской химчисткой Apetta» - удобное и выгодное решение для наших
            корпоративных клиентов. Занимайтесь бизнесом, развивайтесь – а заботу о чистоте вашего текстиля мы возьмем на
            себя!<br>
        </p>

        <h3>
Для кого удобно корпоративное обслуживание </h3>
        <p>
По сути, эта услуга удобна всем, кто пользуется текстилем. А это гостиницы и медицинские центры, рестораны и
            кафе, спа-центры и фитнес-клубы, салоны красоты и множество других заведений. И в самом обычном офисе может быть
            принята униформа, которую нужно содержать в порядке. Профессиональные услуги удобны и организациям, сотрудники
            которой используют спецодежду, защитные костюмы и прочее: договор о корпоративном обслуживании с нашей
            химчисткой избавляет их от таких хлопотных мероприятий, как стирка рабочей одежды и химчистка спецодежды.
        </p>
        <p>
        </p>
        <p>
        </p>
        <div class="cart-right-block aleft">
            <div class="content">
                <div class="products-block">
                    <div class="header">
                        <div class="item-name">Наименование</div>
                        <div class="item-count">Ед. изм.</div>
                        <div class="item-price">Стоимость, руб.</div>
                    </div>
                    <div class="column">
                        <div class="product-item">
                            <div class="item-name">
                                <div class="name">Постельное прямое белье</div>
                            </div>
                            <div class="item-count count_block">
                                <p>кг</p>
                            </div>
                            <div class="item-price"><span>от 38 </span></div>
                        </div>
                        <div class="product-item">
                            <div class="item-name">
                                <div class="name">Столовое прямое белье</div>
                            </div>
                            <div class="item-count count_block">
                                <p>кг</p>
                            </div>
                            <div class="item-price"><span>от 54 </span></div>
                        </div>
                        <div class="product-item">
                            <div class="item-name">
                                <div class="name">Махровые изделия</div>
                            </div>
                            <div class="item-count count_block">
                                <p>кг</p>
                            </div>
                            <div class="item-price"><span>от 40 </span></div>
                        </div>
                        <div class="product-item">
                            <div class="item-name">
                                <div class="name">Одеяло, покрывало</div>
                            </div>
                            <div class="item-count count_block">
                                <p>шт</p>
                            </div>
                            <div class="item-price"><span>от 630 </span></div>
                        </div>
                        <div class="product-item">
                            <div class="item-name">
                                <div class="name">Штора, портьера, тюль</div>
                            </div>
                            <div class="item-count count_block">
                                <p>м2</p>
                            </div>
                            <div class="item-price"><span>от 115 </span></div>
                        </div>
                        <div class="product-item">
                            <div class="item-name">
                                <div class="name">Подушка</div>
                            </div>
                            <div class="item-count count_block">
                                <p>шт</p>
                            </div>
                            <div class="item-price"><span>от 110 </span></div>
                        </div>
                        <div class="product-item">
                            <div class="item-name">
                                <div class="name">Униформа ( комплект)</div>
                            </div>
                            <div class="item-count count_block">
                                <p>шт</p>
                            </div>
                            <div class="item-price"><span>от 200 </span></div>
                        </div>
                        <div class="product-item">
                            <div class="item-name">
                                <div class="name">Озонирование (дезодорация, устранение запахов)</div>
                            </div>
                            <div class="item-count count_block">
                                <p>кг</p>
                            </div>
                            <div class="item-price"><span>от 38 </span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content_block item10">
            <h2>Наши партнеры</h2>
            <div class="partners_block">
                <div class="partners-item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/corp/client/client_1.png" alt=""></div>
                <div class="partners-item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/corp/client/client_4.png" alt=""></div>
                <div class="partners-item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/corp/client/client_5.png" alt=""></div>
                <div class="partners-item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/corp/client/client_6.png" alt=""></div>
                <div class="partners-item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/corp/client/client_7.png" alt=""></div>
                <div class="partners-item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/corp/client/client_2.png" alt=""></div>
                <div class="partners-item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/corp/client/client_10.gif" alt=""></div>
                <div class="partners-item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/corp/client/client_11.jpg" alt=""></div>
                <div class="partners-item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/corp/client/client_12.png" alt=""></div>
                <div class="partners-item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/corp/client/client_13.png" alt=""></div>
                <div class="partners-item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/corp/client/client_14.jpg" alt=""></div>


            </div>
        </div>
    </div>


<?/*
$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'bx_sitemap_ul',
	),
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => 'bx_catalog_text',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'bx_catalog_text_ul'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?><div class="<? echo $arCurView['CONT']; ?>"><?
if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID'])
{
	$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

	?><h1
		class="<? echo $arCurView['TITLE']; ?>"
		id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"
	><a href="<? echo $arResult['SECTION']['SECTION_PAGE_URL']; ?>"><?
		echo (
			isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
			? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
			: $arResult['SECTION']['NAME']
		);
	?></a></h1><?
}
if (0 < $arResult["SECTIONS_COUNT"])
{
?>
<ul class="<? echo $arCurView['LIST']; ?>">
<?
	switch ($arParams['VIEW_MODE'])
	{
		case 'LINE':
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				if (false === $arSection['PICTURE'])
					$arSection['PICTURE'] = array(
						'SRC' => $arCurView['EMPTY_IMG'],
						'ALT' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							: $arSection["NAME"]
						),
						'TITLE' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							: $arSection["NAME"]
						)
					);
				?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				<a
					href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
					class="bx_catalog_line_img"
					style="background-image: url('<? echo $arSection['PICTURE']['SRC']; ?>');"
					title="<? echo $arSection['PICTURE']['TITLE']; ?>"
				></a>
				<h2 class="bx_catalog_line_title"><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
				if ($arParams["COUNT_ELEMENTS"])
				{
					?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
				}
				?></h2><?
				if ('' != $arSection['DESCRIPTION'])
				{
					?><p class="bx_catalog_line_description"><? echo $arSection['DESCRIPTION']; ?></p><?
				}
				?><div style="clear: both;"></div>
				</li><?
			}
			unset($arSection);
			break;
		case 'TEXT':
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"><h2 class="bx_catalog_text_title"><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
				if ($arParams["COUNT_ELEMENTS"])
				{
					?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
				}
				?></h2></li><?
			}
			unset($arSection);
			break;
		case 'TILE':
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				if (false === $arSection['PICTURE'])
					$arSection['PICTURE'] = array(
						'SRC' => $arCurView['EMPTY_IMG'],
						'ALT' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							: $arSection["NAME"]
						),
						'TITLE' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							: $arSection["NAME"]
						)
					);
				?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				<a
					href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
					class="bx_catalog_tile_img"
					style="background-image:url('<? echo $arSection['PICTURE']['SRC']; ?>');"
					title="<? echo $arSection['PICTURE']['TITLE']; ?>"
				> </a><?
				if ('Y' != $arParams['HIDE_SECTION_NAME'])
				{
					?><h2 class="bx_catalog_tile_title"><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
					if ($arParams["COUNT_ELEMENTS"])
					{
						?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
					}
				?></h2><?
				}
				?></li><?
			}
			unset($arSection);
			break;
		case 'LIST':
			$intCurrentDepth = 1;
			$boolFirst = true;
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				if ($intCurrentDepth < $arSection['RELATIVE_DEPTH_LEVEL'])
				{
					if (0 < $intCurrentDepth)
						echo "\n",str_repeat("\t", $arSection['RELATIVE_DEPTH_LEVEL']),'<ul>';
				}
				elseif ($intCurrentDepth == $arSection['RELATIVE_DEPTH_LEVEL'])
				{
					if (!$boolFirst)
						echo '</li>';
				}
				else
				{
					while ($intCurrentDepth > $arSection['RELATIVE_DEPTH_LEVEL'])
					{
						echo '</li>',"\n",str_repeat("\t", $intCurrentDepth),'</ul>',"\n",str_repeat("\t", $intCurrentDepth-1);
						$intCurrentDepth--;
					}
					echo str_repeat("\t", $intCurrentDepth-1),'</li>';
				}

				echo (!$boolFirst ? "\n" : ''),str_repeat("\t", $arSection['RELATIVE_DEPTH_LEVEL']);
				?><li id="<?=$this->GetEditAreaId($arSection['ID']);?>"><h2 class="bx_sitemap_li_title"><a href="<? echo $arSection["SECTION_PAGE_URL"]; ?>"><? echo $arSection["NAME"];?><?
				if ($arParams["COUNT_ELEMENTS"])
				{
					?> <span>(<? echo $arSection["ELEMENT_CNT"]; ?>)</span><?
				}
				?></a></h2><?

				$intCurrentDepth = $arSection['RELATIVE_DEPTH_LEVEL'];
				$boolFirst = false;
			}
			unset($arSection);
			while ($intCurrentDepth > 1)
			{
				echo '</li>',"\n",str_repeat("\t", $intCurrentDepth),'</ul>',"\n",str_repeat("\t", $intCurrentDepth-1);
				$intCurrentDepth--;
			}
			if ($intCurrentDepth > 0)
			{
				echo '</li>',"\n";
			}
			break;
	}
?>
</ul>
<?
	echo ('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
}
?></div>