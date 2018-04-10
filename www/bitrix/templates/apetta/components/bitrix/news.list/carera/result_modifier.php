<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CModule::IncludeModule('highloadblock');

foreach ($arResult["ITEMS"] as  $arItem){
    $elem['NAME'] = $arItem['NAME'];
    $elem['SALARY_FROM'] = $arItem['PROPERTIES']['SALARY_FROM']['VALUE'];
    $elem['SALARY_TO'] = $arItem['PROPERTIES']['SALARY_TO']['VALUE'];
    foreach ($arItem['PROPERTIES']['ADDRESS_POINTS']['VALUE'] as $point_id){
        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*");
        $arFilter = Array("IBLOCK_ID"=>4, "ID"=>$point_id, "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        while($ob = $res->GetNextElement()){
            $arFields = $ob->GetFields();
            $arProps = $ob->GetProperties();
/*
            $rsData = \Bitrix\Highloadblock\HighloadBlockTable::getList(array('filter' => array('TABLE_NAME' => "b_hlbd_metro")));
            if (($hldata = $rsData->fetch())) {
                $hlentity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);
                $hlDataClass = $hldata['NAME'] . 'Table';
                $res = $hlDataClass::getList(array(
                        'filter' => array("UF_XML_ID" => $arProps['METRO']['VALUE']
                        ),
                        'select' => array("*"),
                        'order' => array(
                            'UF_NAME' => 'asc'
                        ),
                    )
                );
                if ($row = $res->fetch()) {
                    $HLinfo = $row;
                }
                $elem['METRO']  = $HLinfo;
                $metro_station['NAME'] = $HLinfo['NAME'];
                $metro_station['ID'] = $HLinfo['ID'];
                //$arResult['METRO_STATION'][$arProps['METRO']['VALUE']] = $metro_station;
                //$metro_station = array();
            }
*/
//            $elem['ADDRESS'] = $arProps['ADDRESS']['VALUE'];
//            $elem['MAP'] = $arProps['MAP']['VALUE'];
           // $arResult['VACANSI'][] = $elem;
            //$elem = array();

        }
    }
}
*/