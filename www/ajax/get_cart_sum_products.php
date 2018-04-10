<?
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if (!CModule::IncludeModule('sale')) {
    die('ERROR: not found module sale');
}

$arBasketItems = array();

$dbBasketItems = CSaleBasket::GetList(
    array(
        "NAME" => "ASC",
        "ID" => "ASC"
    ),
    array(
        "FUSER_ID" => CSaleBasket::GetBasketUserID(),
        "LID" => SITE_ID,
        "ORDER_ID" => "NULL"
    ),
    false,
    false,
    array('ID', 'PRICE', 'PRODUCT_ID','QUANTITY', 'ORDER_PRICE', 'DISCOUNT_PRICE')
);
while ($arItems = $dbBasketItems->Fetch()) {
    $sum += $arItems['PRICE']*$arItems['QUANTITY'];
    $discount += $arItems['DISCOUNT_PRICE']*$arItems['QUANTITY'];
}

if($sum == 0 AND $discount == 0){
    //тут редирект 
}
if($discount > 0){
    echo CCurrencyLang::CurrencyFormat($discount, 'RUB', true);
}else{
    echo CCurrencyLang::CurrencyFormat($sum, 'RUB', true);
}
/*
$basket = \Bitrix\Sale\Basket::loadItemsForFUser(\Bitrix\Sale\Fuser::getId(), 's1');
$price = $basket->getPrice();
echo "<pre>";print_r($price);echo "</pre>";
*/
?>