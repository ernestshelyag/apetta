<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if (CModule::IncludeModule('iblock')) ;
if (CModule::IncludeModule('sale')) ;
/*
$PROPERTY_LIST = array('PERSONAL_NAME', 'PERSONAL_PHONE', 'PERSONAL_EMAIL', 'DELIVERY_TO_TYPE', 'DELIVERY_TO_MAP',
    'DELIVERY_TO_ADDRESS', 'DELIVERY_TO_DATE', 'DELIVERY_TO_TIME', 'DELIVERY_FROM_TYPE', 'DELIVERY_FROM_MAP', 'DELIVERY_FROM_ADDRESS',
    'DELIVERY_FROM_DATE', 'DELIVERY_FROM_TIME', 'PAY_SYSTEM');
foreach ($_POST as $key => $property) {
    if (in_array($key, $PROPERTY_LIST) AND !empty($property)) {
        $PROP[$key] = $property;
    }
}
*/

$agbis = new CAgbisProfiler();
$agbis_adress = $agbis->getUserAddress();

$PROP['PERSONAL_NAME'] = $_POST['PERSONAL_NAME'];
$PROP['PERSONAL_PHONE'] = $_POST['PERSONAL_PHONE'];
$PROP['PERSONAL_EMAIL'] = $_POST['PERSONAL_EMAIL'];
$PROP['DELIVERY_TO_TYPE'] = $_POST['DELIVERY_TO_TYPE'];
if($_POST['DELIVERY_TO_TYPE'] == 10){
    $PROP['DELIVERY_TO_MAP'] = $_POST['DELIVERY_TO_MAP'];
}else{
    $PROP['DELIVERY_TO_ADDRESS'] = $_POST['DELIVERY_TO_ADDRESS'];
    $PROP['DELIVERY_TO_DATE'] = $_POST['DELIVERY_TO_DATE'];
    $PROP['DELIVERY_TO_TIME'] = $_POST['DELIVERY_TO_TIME'];

    if($_POST['DELIVERY_TO_STREET'] == $agbis_adress['street'] AND $_POST['DELIVERY_TO_HOUSE'] == $agbis_adress['house']
        AND $_POST['DELIVERY_TO_BLOCK'] ==  $agbis_adress['housing'] AND $_POST['DELIVERY_TO_APARTMENT'] == $agbis_adress['room']){
        $PROP['DELIVERY_TO_AGBIS'] = $_POST['DELIVERY_TO_AGBIS'];
    }
    $PROP['DELIVERY_TO_CITY'] = $_POST['DELIVERY_TO_CITY'];
    $PROP['DELIVERY_TO_STREET'] = $_POST['DELIVERY_TO_STREET'];
    $PROP['DELIVERY_TO_HOME'] = $_POST['DELIVERY_TO_HOME'];
    $PROP['DELIVERY_TO_BLOCK'] = $_POST['DELIVERY_TO_BLOCK'];
    $PROP['DELIVERY_TO_APARTMENT'] = $_POST['DELIVERY_TO_APARTMENT'];
}
$PROP['DELIVERY_FROM_TYPE'] = $_POST['DELIVERY_FROM_TYPE'];
if($_POST['DELIVERY_FROM_TYPE'] == 15){
    $PROP['DELIVERY_FROM_MAP'] = $_POST['DELIVERY_FROM_MAP'];
}else{
    $PROP['DELIVERY_FROM_ADDRESS'] = $_POST['DELIVERY_FROM_ADDRESS'];
    $PROP['DELIVERY_FROM_DATE'] = $_POST['DELIVERY_FROM_DATE'];
    $PROP['DELIVERY_FROM_TIME'] = $_POST['DELIVERY_FROM_TIME'];

    if($_POST['DELIVERY_FROM_STREET'] == $agbis_adress['street'] AND $_POST['DELIVERY_FROM_HOUSE'] == $agbis_adress['house']
        AND $_POST['DELIVERY_FROM_BLOCK'] ==  $agbis_adress['housing'] AND $_POST['DELIVERY_FROM_APARTMENT'] == $agbis_adress['room']){
        $PROP['DELIVERY_FROM_AGBIS'] = $_POST['DELIVERY_FROM_AGBIS'];
    }
    $PROP['DELIVERY_FROM_CITY'] = $_POST['DELIVERY_FROM_CITY'];
    $PROP['DELIVERY_FROM_STREET'] = $_POST['DELIVERY_FROM_STREET'];
    $PROP['DELIVERY_FROM_HOME'] = $_POST['DELIVERY_FROM_HOME'];
    $PROP['DELIVERY_FROM_BLOCK'] = $_POST['DELIVERY_FROM_BLOCK'];
    $PROP['DELIVERY_FROM_APARTMENT'] = $_POST['DELIVERY_FROM_APARTMENT'];
}

$PROP['PAY_SYSTEM'] = $_POST['PAY_SYSTEM'];
$PROP['DELIVERY_PRICE'] = $_POST['DELIVERY_PRICE'];

foreach ($_POST['PRODUCT'] as $product) {
    $arProduct = explode('_', $product);
    $arProducts[] = array(
        "VALUE" => $arProduct[0],
        "DESCRIPTION" => $arProduct[1]
    );
}
$PROP['PRODUCTS'] = $arProducts;
$el = new CIBlockElement;
$arLoadProductArray = Array(
    "MODIFIED_BY"    => $USER->GetID(),
    "IBLOCK_ID"      => 11,
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => "Новый элемент",
    "ACTIVE"         => "Y",
    "PREVIEW_TEXT"   => $_POST['PREVIEW_TEXT'],
);

if($PRODUCT_ID = $el->Add($arLoadProductArray)){
    $res = $el->Update($PRODUCT_ID, array('NAME'=>'№ '.$PRODUCT_ID));
    $agbis->sendDataOrder($order_id);
    echo $PRODUCT_ID;
    CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
}else{
    echo "N";
}


