<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карьера");
?><div class="career__wrapper">
	<div class="review__content">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"carera_2", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "novosti",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "100",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "SALARY_TO",
			1 => "SALARY_FROM",
			2 => "ADDRESS_POINTS",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "carera_2"
	),
	false
);?> <br>
 <br>
		<h2>
		Химчистка Apetta: работа должна быть любимой </h2>
		<p>
			 Коллектив «Европейская химчистка Apetta»&nbsp;— это команда профессионалов, которая может выполнить задачи любой сложности. Но, прежде всего, Apetta - команда людей, любящих своё дело.
		</p>
		<p>
			 Мы предоставляем широкие возможности для профессионального обучения, ценим и поддерживаем тех, кто стремится к развитию.
		</p>
		<p>
			 Мы гарантируем:
		</p>
		<ul type="disc">
			<li>бесплатное обучение;</li>
			<li>интересную и значимую работу;</li>
			<li>возможность карьерного роста;</li>
		</ul>
		<p>
		</p>
		<p>
			 Станьте одним из нас!
		</p>
		<div class="corporate_life_block">
		</div>

		<style>
			.corp_img{
				margin-bottom: 20px;
			}
			.corp_img img{
				width: 280px;
				margin-left: 0;
				margin-right: 10px;
			}
			@media (max-width: 600px){
				.corp_img{
					justify-content:center;
				}
				.corp_img img{
					width: 85%;
				}
			}
		</style>

		<div class="corp_img">
			<img src="/bitrix/templates/apetta/assets/img/corp/carerea_img_13.jpg" alt="">
			<img src="/bitrix/templates/apetta/assets/img/corp/carerea_img_12.jpg" alt="">
			<img src="/bitrix/templates/apetta/assets/img/corp/carerea_img_14.jpg" alt="">
			<img src="/bitrix/templates/apetta/assets/img/corp/carerea_img_16.jpg" alt="">
			<img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/corp/carerea_img_11.jpg" alt="">
			<img src="/bitrix/templates/apetta/assets/img/corp/carerea_img_15.jpg" alt="">

		</div>
		<div class="geography_block">
			<h2>География присутствия</h2>
			<h3>Apetta в г. Санкт-Петербурге- 27 адресов:</h3>
			<div class="questions-answers__wrapper">
				<div class="questions-answers__content">
					<div id="questions-answers__content_block-all" class="content_block">
						<ul class="accordion">
							<li> <a href="">Санкт-Петербург – 27 адресов</a>
							<p style="display: none;">
								 Сеть гипермаркетов «О'КЕЙ» - 18 химчисток
							</p>
							<p style="display: none;">
								 Сеть гипермаркетов Prisma - 3 химчистки
							</p>
							<p style="display: none;">
								 Гипермаркет «Карусель» - 1 химчистка
							</p>
							<p style="display: none;">
								 ТК «Невский центр» - 1 химчистка
							</p>
							<p style="display: none;">
								 Другие торговые центры - 4 химчистки
							</p>
							<p style="display: none;">
 <a href="/nashi-adresa/">Полный список адресов</a>
							</p>
 </li>
							<hr>
							<li> <a href="">Москва и Московская область – 6 адресов </a>
							<p>
								 Москва, гипермаркет «О'КЕЙ», Путилково, 71 км МКАД
							</p>
							<p>
								 Москва, ТЦ «Ленинский 101», пр. Ленинский, 101
							</p>
							<p>
								 Москва, ТЦ «Мандарин», Пятницкое шоссе, 39
							</p>
							<p>
								 Ногинск, гипермаркет «О'КЕЙ»
							</p>
							<p>
								 Ногинск, ул. Ак. Королева, 13, стр. 1
							</p>
							<p>
								 Химки, квартал Клязьма, Набережный проезд, 27
							</p>
 </li>
							<hr>
							<li> <a href="">Ростов-на-Дону - 5 адресов</a>
							<p>
								 Сеть гипермаркетов «О'КЕЙ» - 2 химчистки
							</p>
							<p>
								 ТК «Горизонт»
							</p>
							<p>
								 ТЦ «МИР»
							</p>
							<p>
								 Wolrd Class, ул. Красноармейская, 133/117, 1-й эт.
							</p>
 </li>
							<hr>
						</ul>
					</div>
				</div>
			</div>
			<p>
				 На данный момент "Европейская химчистка Apetta" является лидирующей компанией на рынке услуг химчистки и стирки Санкт-Петербурга (по данным Ассоциации Предприятий химической стирки и прачечных).
			</p>
		</div>
	</div>

    <div class="review__form">

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
            "WEB_FORM_ID" => "5",
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
    </div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>