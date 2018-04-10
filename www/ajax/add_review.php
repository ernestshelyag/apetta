<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if(!empty($_REQUEST['rating']) AND !empty($_REQUEST['review'])){
    if (CModule::IncludeModule('iblock')) ;

    $rating = array('1'=>'4','2'=>'5','3'=>'6','4'=>'7','5'=>'8');
    global $USER;
    $PROP['RATING'] = $rating[$_REQUEST['rating']];
    $PROP['USER_ID'] = $USER->GetID();
    $name = $USER->GetLogin()." ".date("Y-m-d H:i:s");
    $el = new CIBlockElement;
    $arLoadProductArray = Array(
        "MODIFIED_BY"    => $USER->GetID(),
//        "DATE_CREATE"    => date("j, n, Y"),
        "IBLOCK_ID"      => 3,
        "PROPERTY_VALUES"=> $PROP,
        "NAME"           => $name,
        "ACTIVE"         => "N",
        "PREVIEW_TEXT"   => $_REQUEST['review'],
    );

    if($PRODUCT_ID = $el->Add($arLoadProductArray)){
        echo 'Y';
    }else{
        echo "N";
    }
}
