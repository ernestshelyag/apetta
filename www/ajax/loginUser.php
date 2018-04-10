<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if( !empty($_REQUEST['phone']) AND
    !empty($_REQUEST['pass']))
{
    $agbis = new CAgbisProfiler();
    print ($agbis->LoginSMS(
        $_REQUEST['phone'],
        $_REQUEST['pass']
    ));
} else {
    print 'Заполните все обязательные поля';
}
?>