<?php


//GET USER DATA
foreach ($arResult['ITEMS'] as $id => &$review) {
    $filter = array("ID" => $review['PROPERTIES']['USER']['VALUE']);
    $rsUsers = CUser::GetList(($by = "id"), ($order = "desc"), $filter); // выбираем пользователей
    while ($ob = $rsUsers->GetNext()) {
        $review['PROPERTIES']['USER_ID']['DATA'] = $ob;
    }
}

//print '<pre>'; print_r($arResult['ITEMS']); print '</pre>';