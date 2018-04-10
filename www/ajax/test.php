<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('catalog');
print 'asdasd';
$ind = 0;
$db_res = CCatalogProduct::GetList(
    array("QUANTITY" => "DESC"),
    array(),
    false,
    array("nTopCount" => 100)
);
while (($ar_res = $db_res->Fetch()) && ($ind < 100))
{
    echo $ar_res["ID"].", ";
    $arFields = array('QUANTITY' => 1000); // доступное количество товара
    var_dump(CCatalogProduct::Update($ar_res["ID"], $arFields));
}
?>