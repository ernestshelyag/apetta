<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
/*
$arFilter = Array('IBLOCK_ID' => 6);
$db_list = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, true);
while($ar_result = $db_list->GetNext())
{
    $id['ID']=$ar_result['ID'];
    $id['DEPTH_LEVEL']=$ar_result['DEPTH_LEVEL'];
    $ID[]=$id;
}
foreach ($ID as $arParent){
    $arFilter = Array('IBLOCK_ID'=>6,'SECTION_ID' =>$arParent['ID'],'DEPTH_LEVEL'=>$arParent['DEPTH_LEVEL']+1);
    $db_list = CIBlockSection::GetList(Array('sort'=>'asc'), $arFilter, true);
    while($ar_result = $db_list->GetNext())
    {
       $sect ='Y';
    }


    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID"=>6, "SECTION_ID" =>$arParent['ID'],"ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        if($arFields['ID']){
            $elem = 'Y';
        }
    }
    if($elem == 'Y' AND $sect == 'Y'){
        echo "<pre>";print_r($arParent['ID']);echo "</pre>";
    }
    $sect = '';
    $elem = '';
}*/
/*
CModule::IncludeModule('sale');

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
    array("ID", "CALLBACK_FUNC", "MODULE",
        "PRODUCT_ID", "QUANTITY", "DELAY",
        "CAN_BUY", "PRICE", "WEIGHT")
);
while ($arItems = $dbBasketItems->Fetch())
{
    if (strlen($arItems["CALLBACK_FUNC"]) > 0)
    {
        CSaleBasket::UpdatePrice($arItems["ID"],
            $arItems["CALLBACK_FUNC"],
            $arItems["MODULE"],
            $arItems["PRODUCT_ID"],
            $arItems["QUANTITY"]);
        $arItems = CSaleBasket::GetByID($arItems["ID"]);
    }

    $arBasketItems[] = $arItems;
}
CModule::IncludeModule('sale') && CModule::IncludeModule('catalog');
// Печатаем массив, содержащий актуальную на текущий момент корзину
echo "<pre>";
print_r($arBasketItems);
echo "</pre>";
Add2BasketByProductID(274,1);
*/
if (CModule::IncludeModule('iblock')) ;

    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
    $arFilter = Array("IBLOCK_ID" => 6, "SECTION_ID" => 366, "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        echo "<pre>";print_r($arFields);echo "</pre>";
        $productID = $arFields['ID'];
        $quantity = 1;
        $renewal = '';
        $ar_res = CCatalogProduct::GetOptimalPrice($productID, $quantity, $USER->GetUserGroupArray(), $renewal);
        echo "<pre>";print_r($ar_res);echo "</pre>";
    }
