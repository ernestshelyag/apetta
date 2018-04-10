<?
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if(isset($_REQUEST['id']) AND isset($_REQUEST['quantity'])){
    if (!CModule::IncludeModule('iblock')) {
        die('ERROR: not found module iblock');
    }
    $product_id = intval($_REQUEST['id']);
    $quantity = $_REQUEST['quantity'];
    if (CModule::IncludeModule('sale') && CModule::IncludeModule('catalog')) {
        if ((IntVal($product_id)>0) && (IntVal($quantity)>0)) {
            echo Add2BasketByProductID( $product_id, $quantity );
        }
    }
} else {
    die('ERROR: wrong fields');
}
?>