<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$intCount = CIBlockSection::GetCount(array('IBLOCK_ID' => 6, 'SECTION_ID' => $arResult['PROPERTIES']['SECTION_LINK']['VALUE']['0']));

if($intCount > 0){
    if(!empty($arResult['PROPERTIES']['SECTION_LINK']['VALUE'])){
        $arResult['FILTER_SECTION']['NAME'] = 'Фильтр №1';
        $arResult['FILTER_SECTION']['DEPTH_LEVEL'] = '2';

        $arFilter = Array('IBLOCK_ID' => 6, 'SECTION_ID' => $arResult['PROPERTIES']['SECTION_LINK']['VALUE']['0']);
        $db_list = CIBlockSection::GetList(Array("SORT" => "ASC"), $arFilter, true);
        while($ar_result = $db_list->GetNext())
        {
            $sect['ID'] = $ar_result['ID'];
            $sect['NAME'] = $ar_result['NAME'];
            $sect['DESCRIOTION'] = $ar_result['DESCRIOTION'];
            $sect['THIS_IS'] = 'SECTION';
            $sect['DEPTH_LEVEL'] = 2;
            $arIMG_SECT = webImage('detail_catalog_img',$ar_result["PICTURE"]);
            $sect['PICTURE'] = $arIMG_SECT["SRC"];
            //$sect['PICTURE'] =  CFile::GetPath($ar_result["PICTURE"]);
            if(!empty($sect['ID'])) {
                $arResult['FILTER_SECTION']['ITEMS'][] = $sect;
            }
            $sect = array();
        }


        $arSelect = Array("ID", "NAME", "PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_PAGE_URL");
        $arFilter = Array("IBLOCK_ID" => 6, "SECTION_ID" => $arResult['PROPERTIES']['SECTION_LINK']['VALUE']['0'], "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        while($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $elem['ID'] = $arFields['ID'];
            $elem['NAME'] = $arFields['NAME'];
            $elem['DESCRIOTION'] = $arFields['PREVIEW_TEXT'];
            $elem['THIS_IS'] = 'ELEMENT';
            $elem['DEPTH_LEVEL'] = '2';
            $arIMG_ELEM = webImage('detail_catalog_img',$ar_result["PICTURE"]);
            $elem['PICTURE'] = $arIMG_ELEM['SRC'];
            //$elem['PICTURE'] =  CFile::GetPath($ar_result["PREVIEW_PICTURE"]);
        }
        if(!empty($elem['ID'])){
            $arResult['FILTER_SECTION']['ITEMS'][] = $elem;
        }
        $elem = array();
    }

}else{
    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
    $arFilter = Array("IBLOCK_ID" => 6, "SECTION_ID" => $arResult['PROPERTIES']['SECTION_LINK']['VALUE']['0'], "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $productID = $arFields['ID'];
        $quantity = 1;
        $renewal = '';
        $arResult['PRICE'] = CCatalogProduct::GetOptimalPrice($productID, $quantity, $USER->GetUserGroupArray(), $renewal);
    }

    $one_elem['ID'] = $arResult['ID'];
    $one_elem['NAME'] = $arResult['NAME'];
    $arIMG_ONE_ELEM = webImage('detail_catalog_img',$arResult["PREVIEW_PICTURE"]['ID']);
    $one_elem['PICTURE'] = $arIMG_ONE_ELEM['SRC'];
    $arResult['ONE_PRODUCT']['ITEMS'][] = $one_elem;
}
