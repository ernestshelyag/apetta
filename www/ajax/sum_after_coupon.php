<? require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

\Bitrix\Main\Loader::includeModule('Sale');

$basket = \Bitrix\Sale\Basket::loadItemsForFUser(\Bitrix\Sale\Fuser::getId(), 's1');

$order = Bitrix\Sale\Order::create("s1", \Bitrix\Sale\Fuser::getId());
$order->setPersonTypeId(1);
$order->setBasket($basket);

$discounts = $order->getDiscount();
$res = $discounts->getApplyResult();
$price = $order->getPrice();

$result = json_encode(array('ALL_SUM'=>CurrencyFormat($price, 'RUB')));

print $result;