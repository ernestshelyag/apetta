<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
foreach ($arResult['ITEMS'] as $count => $arAdrress){
    CModule::IncludeModule('highloadblock');
    $rsData = \Bitrix\Highloadblock\HighloadBlockTable::getList(array('filter' => array('TABLE_NAME' => "b_hlbd_metro")));
    if (($hldata = $rsData->fetch())) {
        $hlentity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);
        $hlDataClass = $hldata['NAME'] . 'Table';
        $res = $hlDataClass::getList(array(
                'filter' => array("UF_XML_ID" => $arAdrress['PROPERTIES']['METRO']['VALUE']
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
        $arResult['ITEMS'][$count]['PROPERTIES']['METRO']['COLOR_LINE'] = $HLinfo['UF_DESCRIPTION'];
    }
}

