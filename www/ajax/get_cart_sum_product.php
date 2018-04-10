<?
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if (!CModule::IncludeModule('sale')) {
    die('ERROR: not found module sale');
}
//if (isset($_REQUEST['cart_item']) AND isset($_REQUEST['new_value'])) {
//    CCatalogProduct::GetOptimalPrice($_REQUEST['cart_item'], $_REQUEST['new_value'], $USER->GetUserGroupArray(), array(), SITE_ID, array());
//}

\Bitrix\Main\Loader::includeModule('Sale');

$basket = \Bitrix\Sale\Basket::loadItemsForFUser(\Bitrix\Sale\Fuser::getId(), 's1');

$order = Bitrix\Sale\Order::create("s1", \Bitrix\Sale\Fuser::getId());
$order->setPersonTypeId(1);
$order->setBasket($basket);

$discounts = $order->getDiscount();
$res = $discounts->getApplyResult();

foreach ($order->getBasket() as $basketItem) {

    $info = array();
    $item_product = array();
    $item_product['PRICE'] = $basketItem->getPrice();
    $item_product['QUANTITY'] = $basketItem->getQuantity();
    $item_product['FINAL_PRICE'] = $basketItem->getFinalPrice();
    $item_product['ID'] = $basketItem->getProductId();
    $info = last_parent($basketItem->getProductId());
    $item_product['NAME'] = $info['NAME'];
    $item_product['DESCRIPTION'] = $info['DESCRIPTION'];

    if($_REQUEST['cart_item'] == $basketItem->getProductId()){
        $result['PRICE'] = $basketItem->getPrice();
        $result['FINAL_PRICE'] = $basketItem->getFinalPrice();
        $result['ALL_SUM'] = $order->getPrice();
    }

}
print json_encode($result);