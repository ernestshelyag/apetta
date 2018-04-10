<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if (CModule::IncludeModule('iblock')) ;

$arSelect = Array("ID", "IBLOCK_ID", "NAME","PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>4, "PROPERTY_NO_ORDER_MAP"=>false, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>150), $arSelect);
while($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();

    $item_map = array();
    $item_map['NAME'] = $arFields['NAME'];
    $item_map['MAP'] = $arProps['MAP']['VALUE'];
    $item_map['PHONE'] = $arProps['PHONE']['VALUE'];
    $item_map['ADDRESS'] = $arProps['PHONE']['VALUE'];

    $arResult['MAP_ITEMS'][] = $item_map;
}
//получаем значения свойст
$PROPERTY_LIST = array('DELIVERY_TO_TYPE','DELIVERY_TO_TIME','DELIVERY_FROM_TYPE','DELIVERY_FROM_TIME','PAY_SYSTEM');
foreach ($PROPERTY_LIST as $prop){
    $property_enums = CIBlockPropertyEnum::GetList(Array(), Array("IBLOCK_ID"=>11, "CODE"=>$prop));
    while($enum_fields = $property_enums->GetNext())
    {
        $val_prop = array();
        $val_prop['ID'] = $enum_fields["ID"];
        $val_prop['VALUE'] = $enum_fields["VALUE"];
        $val_prop['XML'] = $enum_fields["XML_ID"];
        $arResult['PROPERTY_LIST'][$prop][] = $val_prop;
    }
}



/*
 * можно получить стоимость товарв
$order->getPrice(); // Сумма заказа
$order->getDiscountPrice(); // Размер скидки
*/
/*
//получаем товары из корзины
use Bitrix\Main,
    Bitrix\Main\Localization\Loc as Loc,
    Bitrix\Main\Loader,
    Bitrix\Main\Config\Option,
    Bitrix\Sale\Delivery,
    Bitrix\Sale\PaySystem,
    Bitrix\Sale,
    Bitrix\Sale\Order,
    Bitrix\Sale\DiscountCouponsManager,
    Bitrix\Main\Context;

if (!Loader::IncludeModule('sale')){
    echo "<pre>";print_r('sdf');echo "</pre>";
    die();
}


function getPropertyByCode($propertyCollection, $code)  {
    foreach ($propertyCollection as $property)
    {
        if($property->getField('CODE') == $code)
            return $property;
    }
}

$siteId = \Bitrix\Main\Context::getCurrent()->getSite();

$fio = 'Пупкин Василий';
$phone = '9511111111';
$email = 'pupkin@mail.ru';

$currencyCode = Option::get('sale', 'default_currency', 'RUB');

DiscountCouponsManager::init();

$order = Order::create($siteId, \CSaleUser::GetAnonymousUserID());

$order->setPersonTypeId(1);
$basket = Sale\Basket::loadItemsForFUser(\CSaleBasket::GetBasketUserID(), $siteId)->getOrderableItems();

$basketItems = $basket->getBasketItems();
foreach ($basketItems as $basketItem) {
    echo "<pre>";print_r($basketItem);echo "</pre>";
}

*/
\Bitrix\Main\Loader::includeModule('Sale');

$basket = \Bitrix\Sale\Basket::loadItemsForFUser(\Bitrix\Sale\Fuser::getId(), 's1');

$order = Bitrix\Sale\Order::create("s1", \Bitrix\Sale\Fuser::getId());
$order->setPersonTypeId(1);
$order->setBasket($basket);

$discounts = $order->getDiscount();
$res = $discounts->getApplyResult();
$price = $order->getPrice();

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
    $arResult['BASKET']['ITEMS'][] = $item_product;
}

$arResult['BASKET']['ALL_SUM'] = $order->getPrice();

$agbis = new CAgbisProfiler();
$arResult['AGBIS_USER_ADDRESS'] = $agbis->getUserAddress();
$arResult['AGBIS_USER_INFO'] = $agbis->getUserInfo();
if(!is_array($arResult['AGBIS_USER_ADDRESS'])){
    unset($arResult['AGBIS_USER_ADDRESS']);
}
