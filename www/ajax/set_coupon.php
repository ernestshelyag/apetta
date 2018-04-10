<? require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

    if (CModule::IncludeModule('catalog'));
if (isset($_REQUEST['coupon'])){
    $coupon = trim($_REQUEST['coupon']);

    CCatalogDiscount::ClearCoupon();//очистили все применение ранне купоны
    $coupon_status = CCatalogDiscount::SetCoupon($coupon);
}
    \Bitrix\Main\Loader::includeModule('Sale');

    $basket = \Bitrix\Sale\Basket::loadItemsForFUser(\Bitrix\Sale\Fuser::getId(), 's1');

    $order = Bitrix\Sale\Order::create("s1", \Bitrix\Sale\Fuser::getId());
    $order->setPersonTypeId(1);
    $order->setBasket($basket);

    $discounts = $order->getDiscount();
    $res = $discounts->getApplyResult();

    $arResult['ITEMS']['AnDelCanBuy'] = array();
    foreach ($order->getBasket() as $basketItem) {
        $info = array();
        $item_product = array();
        $item_product['PRICE'] = $basketItem->getPrice();
        $item_product['QUANTITY'] = $basketItem->getQuantity();
        $item_product['FINAL_PRICE'] = $basketItem->getFinalPrice();
        $item_product['PRODUCT_ID'] = $basketItem->getProductId();
        $item_product['ID'] = $basketItem->getId();
        $info = last_parent($basketItem->getProductId());
        $item_product['NAME'] = $info['NAME'];
        $item_product['DESCRIPTION'] = $info['DESCRIPTION'];
        $arResult['ITEMS']['AnDelCanBuy'][] = $item_product;
    }
    $arResult['BASKET']['ALL_SUM'] = $order->getPrice();

    if(!empty($coupon_status)){?>
        <? foreach ($arResult['ITEMS']['AnDelCanBuy'] as $arItem) {
            $elem_info = last_parent($arItem['PRODUCT_ID']);?>
            <div class="product-item" id="<?= $arItem["ID"] ?>">
                <div class="item-name">
                    <div class="name"><?=$elem_info['NAME']; ?></div>
                    <div class="props">
                        <span class="product__props-name"><?=$elem_info['DESCRIPTION'];?></span>
                    </div>
                </div>
                <div class="item-count count_block">
                    <div class="minus"  data-id = "<?= $arItem["ID"] ?>" data-val="-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 2">
                            <path fill="#009ACE" fill-rule="evenodd" d="M0 0h10v2H0z"/>
                        </svg>
                    </div>
                    <input type="text" id="QUANTITY_INPUT_<?= $arItem["ID"] ?>" data-product = "<?=$arItem['PRODUCT_ID'];?>" data-price="<?=$arItem['PRICE'];?>" data-id = "<?= $arItem["ID"] ?>" value="<?= $arItem["QUANTITY"] ?>">
                    <div class="plus"  data-id = "<?= $arItem["ID"] ?>" data-val="+1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                            <path fill="#009ACE" fill-rule="evenodd" d="M4 4H0v2h4v4h2V6h4V4H6V0H4v4z"/>
                        </svg>
                    </div>
                </div>
                <div class="item-price"><span class="price"><?=CurrencyFormat($arItem['PRICE'], 'RUB');?></span></div>
                <div class="item-price item-price__all"><span><?=CurrencyFormat($arItem['FINAL_PRICE'], 'RUB');?></span></div>
                <div class="item-delete">
                    <a href="" data-id = "<?=$arItem['ID'];?>" data-prduct_id = "<?=$arItem['PRODUCT_ID'];?>">
                        <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/delete.png">Удалить</a>
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
    <?}else{
        echo 'N';
    }
