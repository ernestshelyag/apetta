<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(isset($_REQUEST['page']) AND !empty($_REQUEST['page'])) {
    //print '1';
    $agbis = new CAgbisProfiler();
    print (json_encode($agbis->updatePrices($_REQUEST['page'])));
}
?>