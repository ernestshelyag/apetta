<?
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if (isset($_REQUEST['cart_item']) AND isset($_REQUEST['new_value']) AND isset($_REQUEST['product_id'])) {
    if (!CModule::IncludeModule('sale')) {
        die('ERROR: not found module sale');
    }

//проверка правильности значения
    $cart_item = intval($_REQUEST['cart_item']);
    $new_value = intval($_REQUEST['new_value']);

//проверяем наличие cart_item в корзине
    $arCartItem = CSaleBasket::GetByID($cart_item);
    if (!empty($arCartItem)) {
        if (!CModule::IncludeModule('iblock')) {
            die('ERROR: not found module iblock');
        }

//меняем количество товара в корзине
        $arFields = array('QUANTITY' => $new_value);
        $res = CSaleBasket::Update($cart_item, $arFields);
        if (!$res) {
            die('ERROR: quantity not update');
        }
    } else {
        die('ERROR: cart item not found');
    }
    
    \Bitrix\Main\Loader::includeModule('Sale');

    $basket = \Bitrix\Sale\Basket::loadItemsForFUser(\Bitrix\Sale\Fuser::getId(), 's1');

    $order = Bitrix\Sale\Order::create("s1", \Bitrix\Sale\Fuser::getId());
    $order->setPersonTypeId(1);
    $order->setBasket($basket);

    $discounts = $order->getDiscount();
    $res = $discounts->getApplyResult();

    foreach ($order->getBasket() as $basketItem) {
        if($_REQUEST['product_id'] == $basketItem->getProductId()){
            $result['PRICE'] = CurrencyFormat($basketItem->getPrice(), 'RUB');
            $result['FINAL_PRICE'] = CurrencyFormat($basketItem->getFinalPrice(), 'RUB');
        }
    }
    $result['ALL_SUM'] = CurrencyFormat($order->getPrice(), 'RUB');
    print json_encode($result);
}
?>