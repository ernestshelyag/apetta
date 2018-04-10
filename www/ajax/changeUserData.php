<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if( !empty($_REQUEST['phone']) AND
    !empty($_REQUEST['name']) AND
    !empty($_REQUEST['email']))
{
    $agbis = new CAgbisProfiler();
    $agbis->changeUserInfo($_REQUEST['name'], $_REQUEST['phone'], $_REQUEST['email'], $_REQUEST['address']);
}
?>