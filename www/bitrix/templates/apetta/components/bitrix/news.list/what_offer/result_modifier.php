<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['ITEMS'] as $arItem){
    if($arItem['PROPERTIES']['TEMPLATE_VIEW']['VALUE_XML_ID'] == 'TILES'){
        $arResult['DATA']['TILES'][] = $arItem;
    }elseif ($arItem['PROPERTIES']['TEMPLATE_VIEW']['VALUE_XML_ID'] == 'TITLE'){
        $arResult['DATA']['TITLE'][] = $arItem;
    }
}

