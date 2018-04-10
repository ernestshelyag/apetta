<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if( !empty($_REQUEST['phone']) AND
    !empty($_REQUEST['mail']) AND
    !empty($_REQUEST['name']))
{
    $agbis = new CAgbisProfiler();
    print ($agbis->Register(
        $_REQUEST['phone'],
        $_REQUEST['mail'],
        $_REQUEST['name']
    ));
} else {
    print 'Заполните все обязательные поля';
}
?>