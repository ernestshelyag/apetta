<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>
<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket", "cart", Array(
	"ACTION_VARIABLE" => "basketAction",	// Название переменной действия
		"AUTO_CALCULATION" => "Y",	// Автопересчет корзины
		"COLUMNS_LIST" => array(	// Выводимые колонки
			0 => "NAME",
			1 => "DISCOUNT",
			2 => "WEIGHT",
			3 => "PROPS",
			4 => "DELETE",
			5 => "DELAY",
			6 => "TYPE",
			7 => "PRICE",
			8 => "QUANTITY",
		),
		"CORRECT_RATIO" => "N",	// Автоматически рассчитывать количество товара кратное коэффициенту
		"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_CONVERT_CURRENCY" => "N",
		"GIFTS_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_HIDE_NOT_AVAILABLE" => "N",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_MESS_BTN_DETAIL" => "Подробнее",
		"GIFTS_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_PLACE" => "BOTTOM",
		"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
		"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "N",
		"GIFTS_TEXT_LABEL_GIFT" => "Подарок",
		"HIDE_COUPON" => "N",	// Спрятать поле ввода купона
		"PATH_TO_ORDER" => "/personal/order.php",	// Страница оформления заказа
		"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
		"QUANTITY_FLOAT" => "N",	// Использовать дробное значение количества
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"TEMPLATE_THEME" => "blue",	// Цветовая тема
		"USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
		"USE_GIFTS" => "N",	// Показывать блок "Подарки"
		"USE_PREPAYMENT" => "N",	// Использовать предавторизацию для оформления заказа (PayPal Express Checkout)
	),
	false
);?>
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
                <div class="order"><a href="/order/" class="btn">Оформить заказ</a></div>
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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>