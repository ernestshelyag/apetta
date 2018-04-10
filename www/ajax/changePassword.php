<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if( !empty($_REQUEST['pass']) AND
    !empty($_REQUEST['pass_new']))
{
    $agbis = new CAgbisProfiler();
    print ($agbis->changePass(
        $_REQUEST['pass'],
        $_REQUEST['pass_new']
    ));
} else {
    print 'Заполните все обязательные поля';
}
?>