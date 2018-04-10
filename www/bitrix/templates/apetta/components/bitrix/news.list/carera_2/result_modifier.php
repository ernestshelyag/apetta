<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CModule::IncludeModule('highloadblock');

foreach ($arResult["ITEMS"] as  $arItem){
    foreach ($arItem['PROPERTIES']['ADDRESS_POINTS']['VALUE'] as $point_id){
        $elem['ID'] = $arItem['ID'];
        $elem['NAME'] = $arItem['NAME'];
        $elem['PREVIEW_TEXT'] = $arItem['PREVIEW_TEXT'];
        $elem['DETAIL_TEXT'] = $arItem['~DETAIL_TEXT'];
        $elem['DESCRIPTION'] = $arItem['PROPERTIES']['DESCRIPTION']['~VALUE']['TEXT'];
        $elem['SALARY_FROM'] = $arItem['PROPERTIES']['SALARY_FROM']['VALUE'];
        $elem['SALARY_TO'] = $arItem['PROPERTIES']['SALARY_TO']['VALUE'];
        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*");
        $arFilter = Array("IBLOCK_ID"=>4, "ID"=>$point_id, "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        while($ob = $res->GetNextElement()){
            $arFields = $ob->GetFields();
            $arProps = $ob->GetProperties();
            $rsData = \Bitrix\Highloadblock\HighloadBlockTable::getList(array('filter' => array('TABLE_NAME' => "b_hlbd_metro")));
            if (($hldata = $rsData->fetch())) {
                $hlentity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);
                $hlDataClass = $hldata['NAME'] . 'Table';
                $res_hl = $hlDataClass::getList(array(
                        'filter' => array("UF_XML_ID" => $arProps['METRO']['VALUE']
                        ),
                        'select' => array("*"),
                        'order' => array(
                            'UF_NAME' => 'asc'
                        ),
                    )
                );
                if ($row = $res_hl->fetch()) {
                    $HLinfo = $row;
                }
                $elem['METRO']  = $HLinfo;
                $metro_station['NAME'] = $HLinfo['UF_NAME'];
                $metro_station['ID'] = $HLinfo['ID'];
                $metro_station['UF_XML_ID'] = $arProps['METRO']['VALUE'];
                $arResult['METRO_STATION'][$arProps['METRO']['VALUE']] = $metro_station;
                $metro_station = array();
            }
            $elem['ADDRESS'] = $arProps['ADDRESS']['VALUE'];
            $elem['MAP'] = $arProps['MAP']['VALUE'];

        }
        $arResult['VACANCY'][] = $elem;
        $elem = array();
    }
}



foreach ($arResult['METRO_STATION'] as $arMetro){
    $metro_group['NAME'] = $arMetro['NAME'];
    $metro_group['ID'] = $arMetro['ID'];
//поиск точек
    $arSelect = Array("ID", "IBLOCK_ID", "NAME","PROPERTY_*");
    $arFilter = Array("IBLOCK_ID"=>4,"ACTIVE"=>"Y","PROPERTY_METRO"=>$arMetro['UF_XML_ID']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();

        $point['NAME'] = $arFields['NAME'];
        $point['MAP'] = $arProps['MAP']['VALUE'];

        //поиск вакансий
        $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
        $arFilter = Array("IBLOCK_ID"=>IntVal(5), "ACTIVE"=>"Y" ,"PROPERTY_ADDRESS_POINTS" => $arFields['ID']);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        while($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $point['ITEMS'][] = $arFields['NAME'];
        }

        $metro_group['ITEMS_POINTS'][] = $point;
        $point = array();
    }

    $arResult['METRO_GROUP'][] = $metro_group;
    $metro_group = array();
}

