<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    $agbis = new CAgbisProfiler();
    print (json_encode($agbis->sendDataOrder(1066)));
?>