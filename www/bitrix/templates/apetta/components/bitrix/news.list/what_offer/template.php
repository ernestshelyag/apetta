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
        <h2><?=$arResult['NAME'];?></h2>
        <?if(!empty($arResult['DATA']['TILES'])){?>
            <div class="services_block">
                <?foreach($arResult['DATA']['TILES'] as $arItem){?>
                    <div style="background-color: #<?=$arItem['PROPERTIES']['COLOR']['VALUE']?>;" data-addhoverclass="hover" class="service_item">
                        <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
                            <?=$arItem['DETAIL_TEXT'];?>
                            <div class="name"><?=$arItem['NAME']?></div>
                            <?if(!empty($arItem['PREVIEW_TEXT'])){?>
                                <div class="description"><?=$arItem['PREVIEW_TEXT'];?></div>
                            <?}?>
                        </a>
                    </div>
                <?}?>
            </div>
        <?}?>
        <?if(!empty($arResult['DATA']['TITLE'])){?>
            <div class="digits_block">
                <?foreach ($arResult['DATA']['TITLE'] as $arItem_title){?>
                    <div class="digit_item">
                        <div class="count"><?=$arItem_title['PREVIEW_TEXT'];?></div>
                        <div class="description"><?=$arItem_title['NAME'];?></div>
                    </div>
                <?}?>
            </div>
        <?}?>
    </div>
<?}?>
