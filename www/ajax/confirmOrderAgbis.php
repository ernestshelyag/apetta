<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(!empty($_COOKIE['AGBIS_SESSION_ID'])) {
    if (isset($_REQUEST['id']) AND !empty($_REQUEST['id'])) {
        $agbis = new CAgbisProfiler();
        print ($agbis->confirmOrder($_REQUEST['id']));
    }
} else {
    print 'Ошибка авторизации';
}
?>