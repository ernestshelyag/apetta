<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
foreach ($arResult['SEARCH'] as $key => $arItem){
    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID"=>$arItem['PARAM2'],"ID"=>$arItem['ITEM_ID'], "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $elem['NAME'] = $arFields['NAME'];
        $elem['PREVIEW_TEXT'] = $arFields['~PREVIEW_TEXT'];
        $elem['LINK'] =  $arFields['DETAIL_PAGE_URL'];
        $elem['PICTURE'] = CFile::GetPath($arFields["PREVIEW_PICTURE"]);
    }
    $arResult['RESULT'][] = $elem;
    $elem = array();
}
