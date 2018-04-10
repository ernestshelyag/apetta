<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if (CModule::IncludeModule('iblock')) ;

$ar_res = array();
$intCount = CIBlockSection::GetCount(array('IBLOCK_ID' => 6, 'SECTION_ID' => $_REQUEST['SECTION_ID']));
if ($intCount < 1) {
    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
    $arFilter = Array("IBLOCK_ID" => 6, "SECTION_ID" => $_REQUEST['SECTION_ID'], "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $productID = $arFields['ID'];
        $quantity = 1;
        $renewal = '';
        $ar_res = CCatalogProduct::GetOptimalPrice($productID, $quantity, $USER->GetUserGroupArray(), $renewal);
    }
}

if (!empty($ar_res)) {
    ?>
    <input type="text" value="<?=$productID;?>" required name="ID_PRODUCT" style="display: none">
    <div class="info_element">
        <div class="name">Срок</div>
        <div class="value">2 дня</div>
    </div>
    <div class="info_element">
        <div class="name">Цена</div>
        <div class="value">
            <? if ($ar_res['RESULT_PRICE']['DISCOUNT'] != 0) {
                ?>
                <div
                    class="old-price"><?= CurrencyFormat($ar_res['RESULT_PRICE']['BASE_PRICE'], $ar_res['RESULT_PRICE']['CURRENCY']); ?></div><?= CurrencyFormat($ar_res['RESULT_PRICE']['DISCOUNT_PRICE'], $ar_res['RESULT_PRICE']['CURRENCY']); ?>
            <? } else {
                ?>
                <?= CurrencyFormat($ar_res['RESULT_PRICE']['BASE_PRICE'], $ar_res['RESULT_PRICE']['CURRENCY']); ?>
            <? } ?>
        </div>
    </div>
    <div class="info_element">
        <div class="name">Дисконтная цена</div>
        <?$discount = $ar_res['RESULT_PRICE']['BASE_PRICE']*0.1;

        $old_price = round($ar_res['RESULT_PRICE']['BASE_PRICE']-$discount);
        ?>
        <div class="value"><?= CurrencyFormat($old_price, $ar_res['RESULT_PRICE']['CURRENCY']); ?><a href="" class="block">Как получить?</a></div>
    </div>
<? } else {
    ?>
    <div class="info_element">
        <div class="name">Срок</div>
        <div class="value">...</div>
    </div>
    <div class="info_element">
        <div class="name">Цена</div>
        <div class="value">
            ...
        </div>
    </div>
    <div class="info_element">
        <div class="name">Дисконтная цена</div>
        <div class="value">...<a href="" class="block">Как получить?</a></div>
    </div>
<? } ?>