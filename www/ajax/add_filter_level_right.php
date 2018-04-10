<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if (CModule::IncludeModule('iblock')) ;

/*
$_REQUEST['SECTION_ID'] = 137;
*/
$nav = CIBlockSection::GetNavChain(false, $_REQUEST['SECTION_ID']);
while ($arItem = $nav->Fetch()) {
    if ($arItem['DEPTH_LEVEL'] > 1) {
        $arSectionName [] = $arItem['NAME'];
    }
}

foreach ($arSectionName as $key => $name) {
    ?>
    <div class="property_row">
<!--        <div class="name">--><?//=chek_title_filter($key + 1) ?><!--</div>-->
        <div class="value"><?= $name; ?></div>
    </div>
<?
}
$intCount = CIBlockSection::GetCount(array('IBLOCK_ID' => 6, 'SECTION_ID' => $_REQUEST['SECTION_ID']));
if ($intCount > 0) {
    ?>
    <div class="property_row error">
<!--        <div class="name">--><?//=chek_title_filter(count($arSectionName) + 1); ?><!--</div>-->
        <div class="value">Не выбрано</div>
    </div>
<? } ?>
