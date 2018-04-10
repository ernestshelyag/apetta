<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<?/*
    <div class="vacancy_block">
        <h2 class="vacancy_caption">Вакансии компании</h2>
        <div class="vacancy-filter">
            <select name="metro" class="metro">
                <?foreach ($arResult['ITEMS'] as $key =>$){?>
                    <option value="1">Гостинный двор</option>

                <?}?>
                <option value="2">Адмиралтейская</option>
                <option value="3">Спортивная</option>
                <option value="4">Улица Дыбенко</option>
                <option value="5">Парнас</option>
            </select>
            <div class="tab-viewer">
                <a href="" data-tab="#list-block" class="list">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11">
                        <path fill="#009ACE" fill-rule="evenodd" d="M0 0h16v1H0V0zm0 5h16v1H0V5zm0 5h16v1H0v-1z"></path>
                    </svg>
                    <span>Списком</span></a><a href="" data-tab="#maps-block" class="map active">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="19" viewBox="0 0 12 19">
                        <path fill="#FFF" fill-rule="evenodd"
                              d="M11.716 5.231c-.062-.232-.188-.48-.281-.697C10.32 1.86 7.885.9 5.919.9 3.287.9.388 2.663 0 6.298v.742c0 .031.01.31.025.449.218 1.731 1.586 3.572 2.608 5.305 1.099 1.855 2.24 3.681 3.37 5.506.697-1.191 1.392-2.398 2.072-3.558.186-.34.402-.68.587-1.004.124-.218.361-.434.469-.635C10.23 11.093 12 9.067 12 7.071v-.82c0-.216-.269-.974-.284-1.02zm-5.75 3.727c-.773 0-1.62-.386-2.038-1.454-.062-.17-.057-.51-.057-.542v-.48c0-1.36 1.156-1.979 2.163-1.979 1.238 0 2.196.99 2.196 2.228 0 1.238-1.024 2.227-2.263 2.227z"></path>
                    </svg>
                    <span>На карте</span></a>
            </div>
        </div>
        <div id="maps-block" class="tab maps-block">
            <div class="lineform">
                <input type="text" name="address" value="" placeholder="Введите свой адрес"><a href="" class="btn">Найти
                    ближайшую химчистку</a>
            </div>
            <div id="map1" class="map">
            </div>
        </div>
        <div id="list-block" class="tab list-block hide">
            <!-- JSON FOR MAP GENERATE HERE-->
            <div class="vacancy-item">
                <div class="vacancy-anons">
                    <a href="" class="name">Руководитель направления</a>
                    <div class="price">
                        от 70 000 до 80 000 руб.
                    </div>
                </div>
                <div class="vacancy-detail">
                    <div class="metro orange">
                        Дыбенко
                    </div>
                    <div class="address">
                        Полюстровский просп., 84, литера А, ТРК Европолис. Лесная ст.м.
                    </div>
                </div>
            </div>
            <div class="vacancy-item">
                <div class="vacancy-anons">
                    <a href="" class="name">Сотрудник отдела восстановления</a>
                    <div class="price">
                        от 70 000 до 80 000 руб.
                    </div>
                </div>
                <div class="vacancy-detail">
                    <div class="metro blue">
                        Горьковская
                    </div>
                    <div class="address">
                        Полюстровский просп., 84, литера А, ТРК Европолис. Лесная ст.м.
                    </div>
                </div>
            </div>
            <div class="vacancy-item">
                <div class="vacancy-anons">
                    <a href="" class="name">Приемщик химчистки</a>
                    <div class="price">
                        от 70 000 до 80 000 руб.
                    </div>
                </div>
                <div class="vacancy-detail">
                    <div class="metro red">
                        Техноложка
                    </div>
                    <div class="address">
                        Полюстровский просп., 84, литера А, ТРК Европолис. Лесная ст.м.
                    </div>
                </div>
            </div>
        </div>
    </div>
*/?>
<? /*
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<p class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
						class="preview_picture"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
						/></a>
			<?else:?>
				<img
					class="preview_picture"
					border="0"
					src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
					height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					style="float:left"
					/>
			<?endif;?>
		<?endif?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;?>
		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small><br />
		<?endforeach;?>
	</p>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
*/