<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?if(!empty($arResult['ITEMS'])){?>
    <div class="main-content_block item12">
        <div class="top_slider_block">
            <ul>
                <?foreach ($arResult['ITEMS'] as $arItem){
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); ?>
                    <li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <div style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);" class="image_block"></div>
                        <div class="content-block">
                            <div class="content-block__title"><?=$arItem['NAME'];?></div>
                            <div class="content-block__html">
                                <?if(!empty($arItem['PREVIEW_TEXT'])){?>
                                    <?=$arItem['PREVIEW_TEXT'];?>
                                <?}?>
                            </div>
                            <?if(!empty($arItem['DISPLAY_PROPERTIES']['BUTTON'])){?>
                                <div class="content-block__button"><a href="<?=$arItem['DISPLAY_PROPERTIES']['BUTTON']['VALUE'];?>" class="btn red"><?=$arItem['DISPLAY_PROPERTIES']['BUTTON']['DESCRIPTION'];?></a></div>
                            <?}?>
                        </div>
                    </li>
                <?}?>
            </ul>
        </div>
    </div>
<?}?>
