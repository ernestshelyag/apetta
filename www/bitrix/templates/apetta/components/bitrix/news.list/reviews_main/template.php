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

<?if(!empty($arResult["ITEMS"])){?>
    <div class="main-content_block item6 reviews_block--wrapper">
        <h2>Отзывы наших клиентов</h2>
        <div class="reviews_block">
            <ul>
                <?foreach($arResult["ITEMS"] as $arItem){
                    $rsUser = CUser::GetByID($arItem['DISPLAY_PROPERTIES']['USER_ID']['VALUE']);
                    $arUser = $rsUser->Fetch();
                    $data = explode(' ',$arItem['ACTIVE_FROM']);
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <li class="review_item">
                        <div class="review__client-info">
                            <div class="review__ava">
                                <?if(!empty($arUser['PERSONAL_PHOTO'])) {?>
                                    <img src="<?=CFile::GetPath($arUser['PERSONAL_PHOTO']);?>">
                                <?} else {?>
                                    <span class="first-letter" style="background: #d2b0b0; margin: 0 auto;"><?=mb_substr($arUser['NAME'], 0, 1)?></span>
                                <?}?>

                            </div>
                            <div class="review__name-rating">
                                <div class="review__rating"></div><span class="review__name"><?=$arUser['NAME'];?></span>
                                <div class="review__rating">
                                    <?for ($i = 0;$i<5;$i++){
                                        if($i >= $arItem['DISPLAY_PROPERTIES']['RATIND']['VALUE']){?>
                                            <div class="fill"></div>
                                        <?}else{?>
                                            <div class="nofill"></div>
                                        <?}
                                    }?>
                                </div>
                            </div>
                        </div>
                        <p class="review__text"><?=$arItem['PREVIEW_TEXT'];?></p>
                        <div class="review__client-info"><span class="review__date">Написано <?=$data['0'];?></span></div>
                    </li>
                <?}?>
            </ul>
        </div>
    </div>
<?}?>
