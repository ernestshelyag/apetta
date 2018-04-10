<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("page_class", "content");
$APPLICATION->SetTitle("Информация для корпоративных клиентов");
?>
    <style>.corp_img{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }
        .svg_adv{
            width: 60px;
            float: left;
        }
        .advantages li{
            background-repeat: no-repeat;
            background-position: left center;
            background-size: 40px;
        }
        .advantages p {
            display: block !important;
            margin-left: 50px;
        }
        #corp_client .auth-block{
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }
        #corp_client .auth-block .email-password__wrap .submit-form__wrap{
            justify-content: center;
        }
        #corp_client .wrapper100.background-grey{
            margin: 40px 0;
        }
        #corp_client .plus_apetta li{
            background-image: url("/bitrix/templates/apetta/assets/img/corp/plus_apetta.png");
            background-repeat: no-repeat;
            background-position: left center;
            background-size: 26px;
        }
        #corp_client .plus_apetta p {
            display: block !important;
            margin-left: 50px;
        }
        #corp_client .cart-right-block{
            position: relative;
            width: auto;
        }
        #corp_client .cart-right-block{
            margin: 20px 0;
        }

        #corp_client .cart-right-block .header{
            font-size: 1.6rem;
            line-height: 1.6rem;
        }
        body  #corp_client .cart-right-block .content .products-block .column .product-item{
            padding: 10px 0 10px;
        }
        body  #corp_client .cart-right-block .content .products-block .column .product-item div{
            font-size: 1.4rem;
        }
        @media screen and (min-width: 517px){
            #corp_client .cart-right-block .item-name{
                width: 335px;
            }
        }
        @media screen and (max-width: 517px){
            #corp_client .cart-right-block .item-name{
                width: 185px;
            }
            #corp_client .cart-right-block .header{
                font-size: 1.4rem;
                line-height: 1.4rem;
                text-align: center;
            }
            body  #corp_client .cart-right-block .content .products-block .column .product-item div{
                font-size: 1.2rem;
            }
        }

    </style>

<?if($_GET['DEV'] != 'Y'){?>
    <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "corp_clients", Array(
	"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
		"IBLOCK_ID" => "8",	// Инфоблок
		"IBLOCK_TYPE" => "novosti",	// Тип инфоблока
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_FIELDS" => array(	// Поля разделов
			0 => "NAME",
			1 => "DESCRIPTION",
			2 => "",
		),
		"SECTION_ID" => "",	// ID раздела
		"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
		"SECTION_USER_FIELDS" => array(	// Свойства разделов
			0 => "UF_TEMPLATE_VIEW",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
		"TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
		"VIEW_MODE" => "LINE",	// Вид списка подразделов
	),
	false
);?>
<?}else{?>
    <div id="corp_client">

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
<?}?>
    <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>