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
<div class="main-content_block item10 products-slider__wrap">
    <h2><?=GetMessage('TITLE_SECTION_POPULAR');?></h2>
        <div class="products-slider">
            <ul class="products">
                <?foreach($arResult["ITEMS"] as $arItem){
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    $img = array();
                    if(!empty($arItem['PREVIEW_PICTURE']['ID'])){
                        $img = webImage('popular_main_product',$arItem['PREVIEW_PICTURE']['ID']);
                    }
                    ?>
                    <li class="product_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <a href="<?=$arItem['DETAIL_PAGE_URL'];?>">
                            <img src="<?=$img['SRC'];?>" alt="<?=$arItem['NAME'];?>"></a>
                        <a href="<?=$arItem['DETAIL_PAGE_URL'];?>">
                            <div class="name"><?=$arItem['NAME'];?></div>
                        </a>
                        <?if(!empty($arItem['PROPERTIES']['MIN_PRICE']['VALUE'])){?>
                            <div class="price"><?=CurrencyFormat($arItem['PROPERTIES']['MIN_PRICE']['VALUE'], "RUB");?></div>
                        <?}?>
                        <a href="<?=$arItem['DETAIL_PAGE_URL'];?>" class="more">Подробнее</a>
                    </li>
                <?}?>
            </ul>
            <?if(!empty($arParams['LINK_POPULAR_ALL'])){?>
                <div class="show-all_block">
                    <a href="/catalog/himchistka-i-stirka/" class="btn">Показать все</a>
                </div>
            <?}?>

        </div>
    </h2>
</div>
