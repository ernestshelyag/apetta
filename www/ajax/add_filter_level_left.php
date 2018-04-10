<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if (CModule::IncludeModule('iblock')) ;


/*
$_REQUEST['SECTION_ID'] = 137;
$_REQUEST['THIS_IS'] = 'SECTION';
$_REQUEST['DEPTH_LEVEL'] = '2';
*/
//закинуть в init
function check_visitet_section($id, $arParents)
{
    foreach ($arParents as $section) {
        if ($section['ID'] == $id) {
            return 'Y';
        }
    }
}

$arParents = tree_section($_REQUEST['SECTION_ID']);

foreach ($arParents as $key => $arParent) {
    $arFilter = Array('IBLOCK_ID' => 6, 'SECTION_ID' => $arParent['ID'], 'DEPTH_LEVEL' => $arParent['DEPTH_LEVEL'] + 1);
    $db_list = CIBlockSection::GetList(Array("SORT" => "ASC"), $arFilter, true);
    while ($ar_result = $db_list->GetNext()) {
        $sect['ID'] = $ar_result['ID'];
        $sect['NAME'] = $ar_result['NAME'];
        $sect['DESCRIPTION'] = $ar_result['DESCRIPTION'];
        $sect['THIS_IS'] = 'SECTION';
        $sect['DEPTH_LEVEL'] = $ar_result['DEPTH_LEVEL'];
        $arIMG = webImage('detail_catalog_img',$ar_result["PICTURE"]);
        $sect['PICTURE'] = $arIMG['SRC'];
        //$sect['PICTURE'] = CFile::GetPath($ar_result["PICTURE"]);
        $sect['VISITET'] = check_visitet_section($ar_result['ID'], $arParents);
        $merge_sct[] = $sect;
        $sect = array();
    }
    if ($intCount > 0) {
    }
    //$arResult['FILTER_SECTION'][$arParent['DEPTH_LEVEL']]['NAME'] = 'Фильтр №' . ($arParent['DEPTH_LEVEL']);
    $arResult['FILTER_SECTION'][$arParent['DEPTH_LEVEL']]['LEVEL'] = $arParent['DEPTH_LEVEL'];
    $arResult['FILTER_SECTION'][$arParent['DEPTH_LEVEL']]['ITEMS'] = $merge_sct;
    $merge_sct = array();
}

?>
<? foreach ($arResult['FILTER_SECTION'] as $level_filter) {
    if (count($level_filter['ITEMS']) > 0) {
        ?>
        <div class="variable_content">
            <div class="name_property"><?= chek_title_filter($level_filter['LEVEL']); ?></div>
            <div class="radiobuttons_block row">
                <? foreach ($level_filter['ITEMS'] as $item) { ?>
                    <div class="radiobutton_image radiobutton item2">
                        <? if (!empty($item['DESCRIPTION'])) { ?>
                            <div class="hover_hint"><?= $item['DESCRIPTION']; ?></div>
                        <? } ?>
                        <input type="checkbox" id="radio<?= $item['ID']; ?>" name="radiog_lite"
                               <? if ($item['VISITET'] == 'Y'){ ?>checked<? } ?> class="css-checkbox"
                               data-id="<?= $item['ID']; ?>" data-this_is="<?= $item['THIS_IS']; ?>"
                               data-depth_level="<?= $item['DEPTH_LEVEL']; ?>">
                        <label for="radio<?= $item['ID']; ?>"
                               class="css-label radGroup<?= $item['ID']; ?>"><?= $item['NAME']; ?></label>
                        <div class="image_block">
                            <img src="<?= $item['PICTURE']; ?>" alt="<?= $item['NAME']; ?>" height="120">
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    <? }
} ?>
