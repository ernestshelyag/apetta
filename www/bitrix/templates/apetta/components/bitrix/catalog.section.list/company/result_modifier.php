<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
foreach ($arResult['SECTIONS'] as $arSection){
    $section = array();

    $section['ID'] = $arSection['ID'];
    $section['NAME'] = $arSection['NAME'];
    $section['DESCRIPTION'] = $arSection['~DESCRIPTION'];
    $section['UF_TEMPLATE_VIEW'] = $arSection['UF_TEMPLATE_VIEW'];
    $section['PICTURE'] = $arSection['PICTURE']['SRC'];

    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_IMAGE","PREVIEW_TEXT");
    $arFilter = Array("IBLOCK_ID"=>$arSection['IBLOCK_ID'], "SECTION_ID"=>$arSection['ID'], "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $elem = array();
        $elem['NAME'] = $arFields['NAME'];
        if(!empty($arFields['PROPERTY_IMAGE_VALUE'])){
            $img_info = CFile::GetFileArray($arFields['PROPERTY_IMAGE_VALUE']);

            if($img_info['CONTENT_TYPE'] != 'image/svg+xml'){
                if($arSection['UF_TEMPLATE_VIEW'] == 8){
                    $elem['IMG_RESIZE'] = webImage('dimpom_resize',$img_info['ID']);
                    $elem['IMG_FULL'] = $img_info['SRC'];
                }else{
                    $elem['IMG_RESIZE'] = $img_info['SRC'];
                }
            }else{
                $elem['IMG_RESIZE'] = $img_info['SRC'];
            }
        }
        if(!empty($arFields['PREVIEW_TEXT'])){
            $elem['PREVIEW_TEXT'] = $arFields['PREVIEW_TEXT'];
        }
        $section['ITEMS'][] = $elem;
    }

    $arResult['DATA'][] = $section;
}

if(!empty($arFields['PROPERTY_IMG_VALUE'])){
    $img_info = CFile::GetFileArray($arFields['PROPERTY_IMG_VALUE']);
    if($img_info['CONTENT_TYPE'] != 'image/svg+xml'){
        if($arSection['UF_TEMPLATE_VIEW'] == 12){
            $elem['IMG_RESIZE'] = webImage('corp_img',$img_info['ID']);
        }else{
            $elem['IMG_RESIZE'] = $img_info['SRC'];
        }
    }else{
        $elem['IMG_RESIZE'] = $img_info['SRC'];
    }
}