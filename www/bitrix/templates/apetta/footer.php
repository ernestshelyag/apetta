<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
    </div>
    <footer id="finish">
        <div class="triggers-block--wrapper">
            <div class="triggers-block">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include_file/callback.php"
                    )
                );?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include_file/email.php"
                    )
                );?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "address",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include_file/address.php"
                    )
                );?>
            </div>
        </div>
        <div class="footer-menu--wrapper">
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "bottom",
                Array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(0=>"",),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "bottom",
                    "USE_EXT" => "N"
                )
            );?>
        </div>
        <div class="footer-copyright">
            <p>© Apetta 2017. Все права защищены. Сайт разработан веб-студией<a href="http://make-research.ru/">Make & Research</a></p>
        </div>
    </footer>
    <!-- footer end-->
    <div class="popup_block hide">
        <div id="fastorder" class="popup_item">
            <div class="fast-order-wrapper">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:form.result.new",
                    ".default",
                    Array(
                        "AJAX_MODE" => "Y",  // режим AJAX
                        "AJAX_OPTION_SHADOW" => "N", // затемнять область
                        "AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
                        "AJAX_OPTION_STYLE" => "N", // подключать стили
                        "AJAX_OPTION_HISTORY" => "N",
                        "SEF_MODE" => "N",
                        "WEB_FORM_ID" => "6",
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
<!--                <div class="title">Быстрый заказ</div>-->
<!--                <div class="column-form">-->
<!--                    <input type="text" name="name" placeholder="Имя" value="">-->
<!--                    <input type="text" name="phone" placeholder="Телефон" value="">-->
<!--                    <input type="submit" name="submit" value="Заказать" class="btn">-->
<!--                </div>-->
<!--                <div class="text">Нажав на кнопку “заказать” информация о заказе будет передана нашему менеджеру и он свяжется с вами в ближайшее время для оформления заказа</div>-->
            </div>
        </div>
        <?/*
        <div id="recallme" class="popup_item">
            <div class="fast-order-wrapper">
                <div class="title">Перезвоните мне</div>
                <div class="column-form">
                    <input type="text" name="name" placeholder="Имя" value="">
                    <input type="text" name="phone" placeholder="Телефон" value="">
                    <input type="submit" name="submit" value="Заказать звонок" class="btn">
                </div>
                <div class="text">Нажимая на кнопку “Заказать звоное” я соглашаюсь на обработку персональных данных, а так же с <a href="">пользовательским соглашением</a></div>
            </div>
        </div>
 */?>

        <div id="recallme" class="popup_item">
            <div class="fast-order-wrapper">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:form.result.new",
                    ".default",
                    Array(
                        "AJAX_MODE" => "Y",  // режим AJAX
                        "AJAX_OPTION_SHADOW" => "N", // затемнять область
                        "AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
                        "AJAX_OPTION_STYLE" => "N", // подключать стили
                        "AJAX_OPTION_HISTORY" => "N",
                        "SEF_MODE" => "N",
                        "WEB_FORM_ID" => "1",
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

        <?/*
            <div id="fastproduct" class="popup_item">
                        <div class="fast-product-wrapper">
                            <div class="title aleft">Накидка для шубы</div>
                            <div class="content-block">
                                <div class="content-block__html"><img src="https://cdn-images.farfetch-contents.com/11/77/34/07/11773407_8410966_1000.jpg">
                                    <p>Ежегодно  доверяют свои вещи 1 500 000 Клиентов, которые остаются довольны качеством выполненных услуг. В нашей компании работают высококвалифицированные специалисты, которые проходят</p>
                                    <div class="subtitle_h2">Характеристики</div>
                                    <ul>
                                        <li>• 	Ежегодно  доверяют свои вещи 1 500 000 Клиентов остаются довольны качеством выполненных услуг.</li>
                                        <li>• 	Ежегодно  доверяют свои вещи 1 500 000 Клиентов остаются довольны качеством выполненных услуг.</li>
                                        <li>• 	Доверяют свои вещи 1 500 000</li>
                                    </ul>
                                </div>
                                <div class="content-block__price">
                                    <div class="name">Цена</div>
                                    <div class="prices">
                                        <div class="old-price">2 750 Р.</div>
                                        <div class="price">2 000 Р.</div>
                                    </div><a href="" class="btn">В корзину</a>
                                </div>
                            </div>
                        </div>
                    </div>
            */
        ?>
        <div id="fastproduct" class="popup_item">
            <div class="fast-product-wrapper">
                <div class="title aleft">Чехол для одежды </div>
                <div class="content-block">
                    <div class="content-block__html">
                        <img src="<?=SITE_TEMPLATE_PATH?>/assets/img/sopytka2.jpg">
                    </div>
                    <div class="content-block__price">
                        <div class="name">Цена</div>
                        <div class="prices">
                            <div class="old-price"></div>
                            <div class="price">400 Р.</div>
                        </div><a href="" class="btn">В корзину</a>
                        <div class="content-block__description">
                            <?/*
                            <p>Ежегодно  доверяют свои вещи 1 500 000 Клиентов, которые остаются довольны качеством выполненных услуг. В нашей компании работают высококвалифицированные специалисты, которые проходят</p>
                            <div class="subtitle_h2">Характеристики</div>
                            <ul>
                                <li>• 	Ежегодно  доверяют свои вещи 1 500 000 Клиентов остаются довольны качеством выполненных услуг.</li>
                                <li>• 	Ежегодно  доверяют свои вещи 1 500 000 Клиентов остаются довольны качеством выполненных услуг.</li>
                                <li>• 	Доверяют свои вещи 1 500 000</li>
                            </ul>
                            */?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="vacancylist" class="popup_item">
            <div class="wrapper_600">
                <div class="title aleft">Вакансии по адресу</div>
                <div class="subtitle">Индустриальный, 25, гипермаркет О'кей</div>
                <div class="list-block">
                    <div class="vacancy-item">
                        <div class="vacancy-anons"><a href="#vacancydetail" class="name fancybox">Руководитель направления</a>
                            <div class="price">от 70 000 до 80 000 руб.</div>
                        </div>
                        <div class="vacancy-detail">
                            <div class="metro orange">Дыбенко</div>
                            <div class="address">Полюстровский просп., 84, литера А, ТРК Европолис. Лесная ст.м.</div>
                        </div>
                    </div>
                    <div class="vacancy-item">
                        <div class="vacancy-anons"><a href="" class="name">Руководитель направления</a>
                            <div class="price">от 70 000 до 80 000 руб.</div>
                        </div>
                        <div class="vacancy-detail">
                            <div class="metro blue">Дыбенко</div>
                            <div class="address">Полюстровский просп., 84, литера А, ТРК Европолис. Лесная ст.м.</div>
                        </div>
                    </div>
                    <div class="vacancy-item">
                        <div class="vacancy-anons"><a href="" class="name">Руководитель направления</a>
                            <div class="price">от 70 000 до 80 000 руб.</div>
                        </div>
                        <div class="vacancy-detail">
                            <div class="metro red">Дыбенко</div>
                            <div class="address">Полюстровский просп., 84, литера А, ТРК Европолис. Лесная ст.м.</div>
                        </div>
                    </div>
                    <div class="vacancy-item">
                        <div class="vacancy-anons"><a href="" class="name">Руководитель направления</a>
                            <div class="price">от 70 000 до 80 000 руб.</div>
                        </div>
                        <div class="vacancy-detail">
                            <div class="metro orange">Дыбенко</div>
                            <div class="address">Полюстровский просп., 84, литера А, ТРК Европолис. Лесная ст.м.</div>
                        </div>
                    </div>
                    <div class="vacancy-item">
                        <div class="vacancy-anons"><a href="" class="name">Руководитель направления</a>
                            <div class="price">от 70 000 до 80 000 руб.</div>
                        </div>
                        <div class="vacancy-detail">
                            <div class="metro orange">Дыбенко</div>
                            <div class="address">Полюстровский просп., 84, литера А, ТРК Европолис. Лесная ст.м.</div>
                        </div>
                    </div>
                    <div class="vacancy-item">
                        <div class="vacancy-anons"><a href="" class="name">Руководитель направления</a>
                            <div class="price">от 70 000 до 80 000 руб.</div>
                        </div>
                        <div class="vacancy-detail">
                            <div class="metro orange">Дыбенко</div>
                            <div class="address">Полюстровский просп., 84, литера А, ТРК Европолис. Лесная ст.м.</div>
                        </div>
                    </div>
                    <div class="vacancy-item">
                        <div class="vacancy-anons"><a href="" class="name">Руководитель направления</a>
                            <div class="price">от 70 000 до 80 000 руб.</div>
                        </div>
                        <div class="vacancy-detail">
                            <div class="metro orange">Дыбенко</div>
                            <div class="address">Полюстровский просп., 84, литера А, ТРК Европолис. Лесная ст.м.</div>
                        </div>
                    </div>
                    <div class="vacancy-item">
                        <div class="vacancy-anons"><a href="" class="name">Руководитель направления</a>
                            <div class="price">от 70 000 до 80 000 руб.</div>
                        </div>
                        <div class="vacancy-detail">
                            <div class="metro orange">Дыбенко</div>
                            <div class="address">Полюстровский просп., 84, литера А, ТРК Европолис. Лесная ст.м.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="vacancydetail" class="popup_item">
            <div class="vacancy-detail-wrapper">
                <div class="title">Руководитель направления</div>
                <div class="review__wrapper">
                    <div class="review__content">
                        <p>Компания "Европейская химчистка  Apetta" основана в 1997г.</p>
                        <p>С 2002 года мы являемся якорным арендатором в гипермаркетах О'КЕЙ и продолжаем совместное  развитие как в Санкт-Петербурге, так и в регионах.</p>
                        <div class="subtitle_h2">Требования</div>
                        <p>Компания "Европейская химчистка  Apetta" основана в 1997г.</p>
                        <p>С 2002 года мы являемся якорным арендатором в гипермаркетах О'КЕЙ и продолжаем совместное  развитие как в Санкт-Петербурге, так и в регионах.</p>
                        <p>С 2008 года мы развиваем направление по обслуживанию корпоративных клиентов: HORECA , медицина, предприятия производственного сектора и госучреждения.</p>
                        <div class="subtitle_h2">Условия</div>
                        <ul>
                            <li>• 	Ежегодно  доверяют свои вещи 1 500 000 Клиентов остаются довольны качеством выполненных услуг.</li>
                            <li>• 	Ежегодно  доверяют свои вещи 1 500 000 Клиентов остаются довольны качеством выполненных услуг.</li>
                            <li>• 	Доверяют свои вещи 1 500 000</li>
                        </ul>
                    </div>
                    <div class="review__form">
                        <form action="" method="post">
                            <div>
                                <p>Станьте одним из нас</p>
                                <input type="text" name="nick" placeholder="Ваше имя">
                                <input type="text" name="phone" placeholder="Телефон">
                                <input type="text" name="nick" placeholder="E-mail">
                                <textarea name="review" placeholder="Комментарий"></textarea>
                                <input type="file" value="Прикрепить файл">
                                <button type="submit">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



       <?/*
        <div class="cart-right-block"><a href="#" class="btn-close-hidden">&#10006 Закрыть</a>
            <div class="header">
                <h2>Корзина</h2>
            </div>
            <div class="content">
                <div class="products-block">
                    <div class="header">
                        <div class="item-name">Наименование</div>
                        <div class="item-count"><span>Количество</span></div>
                        <div class="item-price">Цена (Р)</div>
                        <div class="item-price item-price__all">Стоимость (Р)</div>
                        <div class="item-actions"></div>
                    </div>
                    <div class="column">
                        <div class="product-item">
                            <div class="item-name">
                                <div class="name">Шуба</div>
                                <div class="props"><span class="product__props-name">Длина:&nbsp;</span><span class="product__props-value">до 90 см&nbsp;</span><span class="product__props-name">Тип меха:&nbsp;</span><span class="product__props-value">натуральный&nbsp;</span><span class="product__props-name">Дорогостоящий:&nbsp;</span><span class="product__props-value">да&nbsp;</span></div>
                            </div>
                            <div class="item-count count_block">
                                <div class="minus"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 2"><path fill="#009ACE" fill-rule="evenodd" d="M0 0h10v2H0z"/></svg></div>
                                <input type="text" min="1" value="1" required name="qty">
                                <div class="plus"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"><path fill="#009ACE" fill-rule="evenodd" d="M4 4H0v2h4v4h2V6h4V4H6V0H4v4z"/></svg></div>
                            </div>
                            <div class="item-price"><span>2000р</span></div>
                            <div class="item-price item-price__all"><span>2000р</span></div>
                            <div class="item-delete"><a href="" data-action="AJAX THIS DELETE"><img src="img/delete.png">Удалить</a></div>
                            <div class="item-restore hide">
                                <div class="wrapper"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path fill="#009ACE" fill-rule="evenodd" d="M7 7H0v4h7v7h4v-7h7V7h-7V0H7v7z"/></svg>
                                    <p>Восстановить</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="item-name">
                                <div class="name">Шуба</div>
                                <div class="props"><span class="product__props-name">Длина:&nbsp;</span><span class="product__props-value">до 90 см&nbsp;</span><span class="product__props-name">Тип меха:&nbsp;</span><span class="product__props-value">натуральный&nbsp;</span><span class="product__props-name">Дорогостоящий:&nbsp;</span><span class="product__props-value">да&nbsp;</span></div>
                            </div>
                            <div class="item-count count_block">
                                <div class="minus"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 2"><path fill="#009ACE" fill-rule="evenodd" d="M0 0h10v2H0z"/></svg></div>
                                <input type="text" min="1" value="1" required name="qty">
                                <div class="plus"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"><path fill="#009ACE" fill-rule="evenodd" d="M4 4H0v2h4v4h2V6h4V4H6V0H4v4z"/></svg></div>
                            </div>
                            <div class="item-price"><span>2000Р</span></div>
                            <div class="item-price item-price__all"><span>2000Р</span></div>
                            <div class="item-delete"><a href="" data-action="AJAX THIS DELETE"><img src="img/delete.png">Удалить</a></div>
                            <div class="item-restore hide">
                                <div class="wrapper"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path fill="#009ACE" fill-rule="evenodd" d="M7 7H0v4h7v7h4v-7h7V7h-7V0H7v7z"/></svg>
                                    <p>Восстановить</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart-summary">
                    <div class="order"><a href="" class="btn">Оформить заказ</a></div>
                    <div class="prices"><span class="title">Итоговая цена</span><span class="price">2000р</span></div>
                </div>
                <div class="sale-offer">До бесплатной доставки осталось 300р</div>
                <div class="promo-code">
                    <!-- ajax https://dev.1c-bitrix.ru/api_help/catalog/classes/ccatalogdiscount/ccatalogdiscount.setcoupon.php--><a href="" data-open="#promoform" class="link">У меня есть промо-код</a>
                    <div id="promoform" class="invisibles">
                        <form action="" method="post" data-submit="AJAX_CHECK_COUPON" class="promo lineform">
                            <input type="text" name="coupon" value="" placeholder="Введите промо-код">
                            <input type="submit" name="submit" value="Применить" class="btn red">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        */?>
    </div>
    <div id="cart_line">
        <? require($_SERVER["DOCUMENT_ROOT"] . "/ajax/line_cart.php");?>
    </div>
	</body>
</html>