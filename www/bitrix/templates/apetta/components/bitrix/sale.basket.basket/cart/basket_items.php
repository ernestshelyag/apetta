<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @var array $arUrls */
/** @var array $arHeaders */
use Bitrix\Sale\DiscountCouponsManager;

if (!empty($arResult["ERROR_MESSAGE"]))
    ShowError($arResult["ERROR_MESSAGE"]);
if(count($arResult['ITEMS']['AnDelCanBuy']) > 0){
?>
<div id="basket_items_list" class="cart-right-block">
    <div class="content">
        <div class="products-block">
            <div class="header">
                <div class="item-name">Наименование</div>
                <div class="item-count"><span>Количество</span></div>
                <div class="item-price">Цена (Р)</div>
                <div class="item-price item-price__all">Стоимость (Р)</div>
                <div class="item-actions"></div>
            </div>
            <div id="basket_items" class="column">
                <? foreach ($arResult['ITEMS']['AnDelCanBuy'] as $arItem) {
                    $elem_info = last_parent($arItem['PRODUCT_ID']); ?>
                    <div class="product-item" id="<?= $arItem["ID"] ?>">
                        <div class="item-name">
                            <div class="name"><?= $elem_info['NAME']; ?></div>
                            <div class="props">
                                <span class="product__props-name"><?= $elem_info['DESCRIPTION']; ?></span>
                            </div>
                        </div>
                        <div class="item-count count_block">
                            <div class="minus" data-id="<?= $arItem["ID"] ?>" data-val="-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 2">
                                    <path fill="#009ACE" fill-rule="evenodd" d="M0 0h10v2H0z"/>
                                </svg>
                            </div>
                            <input type="text" id="QUANTITY_INPUT_<?= $arItem["ID"] ?>"
                                   data-product="<?= $arItem['PRODUCT_ID']; ?>" data-price="<?= $arItem['PRICE']; ?>"
                                   data-id="<?= $arItem["ID"] ?>" value="<?= $arItem["QUANTITY"] ?>">
                            <div class="plus" data-id="<?= $arItem["ID"] ?>" data-val="+1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                    <path fill="#009ACE" fill-rule="evenodd" d="M4 4H0v2h4v4h2V6h4V4H6V0H4v4z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="item-price"><span class="price"><?= $arItem['PRICE_FORMATED']; ?></span></div>
                        <div class="item-price item-price__all"><span><?= $arItem['SUM']; ?></span></div>
                        <div class="item-delete">
                            <a href="" data-id="<?= $arItem['ID']; ?>" data-product="<?= $arItem['PRODUCT_ID']; ?>">
                                <img src="<?= SITE_TEMPLATE_PATH; ?>/assets/img/delete.png">Удалить</a>
                        </div>
                        <div class="item-restore hide">
                            <div class="wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path fill="#009ACE" fill-rule="evenodd" d="M7 7H0v4h7v7h4v-7h7V7h-7V0H7v7z"/>
                                </svg>
                                <p>Восстановить</p>
                            </div>
                        </div>
                    </div>
                    <?
                } ?>
            </div>
        </div>
        <div class="cart-summary">
            <div class="order"><a href="/personal/order/" class="btn">Оформить заказ</a></div>
            <div class="prices">
                <span class="title">Итоговая цена</span>
                <span class="price"><?= $arResult['allSum_FORMATED']; ?></span>
            </div>
        </div>
        <?
        $setings_free_delivery = get_info('FREE_DELIVERY');
        if (get_info('FREE_DELIVERY') > $arResult['allSum']) {
            ?>
            <div
                class="sale-offer"><?= GetMessage("FREE_DELIVERY_N", Array("#FREE_DELIVERY#" => $setings_free_delivery - $arResult['allSum'])); ?></div>
        <? } else {
            ?>
            <div class="sale-offer"><?= GetMessage("FREE_DELIVERY_Y"); ?></div>
        <? } ?>

        <div class="promo-code">
            <a href="" data-open="#promoform" class="link">У меня есть промо-код</a>
            <?
            $status_coupon = '';
            foreach ($arResult['COUPON_LIST'] as $arCoupon) {
                if ($arCoupon['JS_STATUS'] == 'APPLYED') {
                    $status_coupon = $arCoupon['COUPON'];
                }
            } ?>
            <div id="promoform" <? if (empty($status_coupon)){ ?>class="invisibles"<? } ?>>
                <form id='set_coupon' data-submit="AJAX_CHECK_COUPON" class="promo lineform">
                    <input type="text" name="coupon" value="<?= $status_coupon; ?>" placeholder="Введите промо-код"
                           <? if (!empty($status_coupon)){ ?>class="coupon_success"<? } ?> >
                    <input type="submit" name="SET_COUPON" value="Применить" class="btn red">
                </form>
            </div>
        </div>

    </div>
</div>
<?}else{

}
