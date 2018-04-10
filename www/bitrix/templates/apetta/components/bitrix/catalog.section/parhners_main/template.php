<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?if(!empty($arResult['ITEMS'])){?>
    <div class="main-content_block item10 parhnres">
        <h2><?=GetMessage('TITLE_SECTION_CORP_MAIN');?></h2>
        <div class="partners_block">
            <?foreach ($arResult['ITEMS'] as $arItem){
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                $img = webImage('corp_img_main',$arItem['DISPLAY_PROPERTIES']['IMG']['VALUE']);
                ?>
                <div  class="partners-item"><img src="<?=$img['SRC'];?>" alt="<?=$arItem['NAME'];?>"></div>
            <?}?>
        </div>
    </div>
<?}?>
