<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
//сбор массива с информацией о разделах
/*перенес в init
function tree_section($_ibclock_section_id,$section_id,$section_depth_level){
    $parent_id = '';
    $nav = CIBlockSection::GetNavChain(false, $_ibclock_section_id);
    while($arItem = $nav->Fetch()){
        $arProp['ID'] = $arItem['ID'];
        $arProp['DEPTH_LEVEL'] = $arItem['DEPTH_LEVEL'];
        $arParents [] = $arProp;
    }
    $section_this['ID'] = $section_id;
    $section_this['DEPTH_LEVEL'] = $section_depth_level;
    $arParents[] = $section_this;
    return $arParents;
}
*/
function check_visitet_section($id,$arParents){
    foreach ($arParents as $section){
        if($section['ID'] == $id) {
            return 'Y';
        }
    }
}

$arParents = tree_section($arResult['SECTION']['IBLOCK_SECTION_ID'],$arResult['SECTION']['ID'],$arResult['SECTION']['DEPTH_LEVEL']);
if($arResult['SECTION']['DEPTH_LEVEL'] > 1){
    foreach ($arParents as $key => $arParent){
        $res = '';
        $ar_res = '';
        $sect = array();
        $res = CIBlockSection::GetByID($arParent['ID']);
        if($ar_res = $res->GetNext()){
            $sect['NAME'] = $ar_res['NAME'];
            $sect['IMG'] = CFile::GetPath($ar_res['PICTURE']);
        }


        $arFilter = Array('IBLOCK_ID'=>7,'SECTION_ID' =>$arParent['ID'],'DEPTH_LEVEL'=>$arParent['DEPTH_LEVEL']+1);
        $db_list = CIBlockSection::GetList(Array('sort'=>'asc'), $arFilter, true);
        while($ar_result = $db_list->GetNext())
        {
            $sect_inner['NAME'] = $ar_result['NAME'];
            $sect_inner['LINK'] = $ar_result['SECTION_PAGE_URL'];
            $sect_inner['ACTIVE'] = check_visitet_section($ar_result['ID'], $arParents);
            $sect['SECTIONS'][] = $sect_inner;
        }


        $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","DETAIL_PAGE_URL");
        $arFilter = Array("IBLOCK_ID"=>7, "SECTION_ID" =>$arParent['ID'],"ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        while($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $sect_inner['NAME'] = $arFields['NAME'];
            $sect_inner['LINK'] = $arFields['DETAIL_PAGE_URL'];
            $sect_inner['ACTIVE'] = '';
            $sect['SECTIONS'][] = $sect_inner;
        }

        $arResult['DATA'][] = $sect;
    }

}else{
    $sect = array();
    $sect['NAME'] = $arResult['SECTION']['NAME'];
    $sect['IMG'] = CFile::GetPath($arResult['SECTION']['PICTURE']);
    foreach ($arResult['SECTIONS'] as $arSection){
        $sect_inner['NAME'] = $arSection['NAME'];
        $sect_inner['LINK'] = $arSection['SECTION_PAGE_URL'];
        $sect_inner['ACTIVE'] = check_visitet_section($arSection['ID'],$arParents);
        $sect['SECTIONS'][] = $sect_inner;
    }
    $arResult['DATA'][] = $sect;
}



