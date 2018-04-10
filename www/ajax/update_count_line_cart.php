<? require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

\Bitrix\Main\Loader::includeModule('Sale');

$basket = \Bitrix\Sale\Basket::loadItemsForFUser(\Bitrix\Sale\Fuser::getId(), 's1');

$order = Bitrix\Sale\Order::create("s1", \Bitrix\Sale\Fuser::getId());
$order->setPersonTypeId(1);
$order->setBasket($basket);

$discounts = $order->getDiscount();
$res = $discounts->getApplyResult();

$result['COUNT_POSITION'] = array_sum($basket->getQuantityList());//количесвто позиций
$result['COUNT_PRODUCT'] = count($basket->getQuantityList());//количество товаров
$result['SUM'] = $basket->getPrice();//сумму с учетом скидки

$plural = function($number, $one, $two, $five) {
    if (($number - $number % 10) % 100 != 10) {
        if ($number % 10 == 1) {
            $result = $one;
        } elseif ($number % 10 >= 2 && $number % 10 <= 4) {
            $result = $two;
        } else {
            $result = $five;
        }
    } else {
        $result = $five;
    }
    return $result;
};
?>
<div class="functions-cart <?if($result['COUNT_PRODUCT'] > 0){?>not_empty_line_cart<?}?>">
    <div class="cart-link">
        <a href="">
        <?if($result['COUNT_PRODUCT'] > 0){?>
            <img src="<?=SITE_TEMPLATE_PATH?>/assets/img/white_cart.svg">
            <div style=" float: right;">
                <span class="product"><?echo $result['COUNT_PRODUCT'] . " " . $plural($result['COUNT_PRODUCT'], "товар", "товара", "товаров"); ?></span><br>
                <span class="price"><?=CurrencyFormat($result['SUM'], 'RUB');?></span>
            </div>
        <?}else{?>
            <a href="#cart" data-slide><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/cart.svg">
                <span>Корзина</span>
            </a>
        <?}?>
        </a>
    </div>
</div>