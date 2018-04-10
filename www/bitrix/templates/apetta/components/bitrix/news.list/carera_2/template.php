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
<script>

	var groups = [

		<?foreach ($arResult['METRO_GROUP'] as $metro){?>
		{
			name: "<?=$metro['NAME']?>",
			metro_id:"<?=$metro['ID']?>",
			style: "blueIcon",
			items: [
				<?foreach ($metro['ITEMS_POINTS'] as $point){?>
				{
					center: [<?=$point['MAP'];?>],
					name: "<?=$point['NAME'];?>",
					//balloonContent: ["<?=$point['NAME'];?><br><?=$point['ADDRESS'];?><br><?=$point['PROPERTIES']['PHONE']['VALUE'];?>"],
				},
				<?}?>
			]
		}, {
			name: "Показать все",
			metro_id:"all",
			style: "blueIcon",
			items: [
				<?
				foreach ($arResult['METRO_GROUP'] as $metro){
					foreach ($metro['ITEMS_POINTS'] as $point){?>
					{
						center: [<?=$point['MAP'];?>],
						name: "<?=$point['NAME'];?>",
						//balloonContent: ["<?=$point['NAME'];?><br><?=$point['ADDRESS'];?><br><?=$point['PROPERTIES']['PHONE']['VALUE'];?>"]
					},
				<?}}?>
			]
		},
		<?}?>
	];
</script>
<div class="vacancy_block">
	<h2 class="vacancy_caption">Вакансии компании</h2>
	<div class="vacancy-filter">
		<?if(!empty($arResult['METRO_STATION'])){?>
			<select name="metro" class="metro">
				<option value="all">Показать все</option>
				<?foreach ($arResult['METRO_STATION'] as $metro_station){?>
					<option value="<?=$metro_station['ID'];?>"><?=$metro_station['NAME'];?></option>
				<?}?>
			</select>
		<?}?>
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
			<input type="text" name="city" style="display: none" value="Санкт-Петербург" >
			<input type="text" name="address" id="adress" placeholder="Введите свой адрес" >
			<a href="javascript:void(0);" id="search"  class="btn">Найти ближайшую химчистку</a>
		</div>
		<div id="map_carera" class="map" data-map="59.9386300 , 30.3141300">
		</div>
	</div>
	<div id="list-block" class="tab list-block hide">
		<?foreach ($arResult['VACANCY'] as $count => $vacancy){?>
			<div id="vacancy_id_<?=$vacancy['ID'];?>" data-group ="<?=$vacancy['METRO']['ID'];?>" class="vacancy-item" <?if($count >100){?>style="display: none" <?}?>>
				<div class="vacancy-anons">
					<a href="#vacancydetail_<?=$count;?>" class="name fancybox_Y" data-vacancy_name="<?=$vacancy['NAME'];?>"><?=$vacancy['NAME'];?></a>
					<div class="price">
						<?if(!empty($vacancy['SALARY_FROM']) AND !empty($vacancy['SALARY_TO'])){?>
							<?=GetMessage("SALARY_FROM_TO", Array ("#SALARY_FROM#" => $vacancy['SALARY_FROM'], "#SALARY_TO#"=>$vacancy['SALARY_TO']));?>
						<?}elseif(!empty($vacancy['SALARY_FROM'])){?>
							<?=GetMessage("SALARY", Array ("#SALARY_FROM#" => $vacancy['SALARY_FROM']));?>
						<?}?>
					</div>
				</div>
				<div class="vacancy-detail">
					<?if(!empty($vacancy['METRO']['ID'])){?>
						<style>
							#vacancy_id_<?=$vacancy['ID'];?> .vacancy-detail .metro:after{
								background: <?=$vacancy['METRO']['UF_DESCRIPTION']?>;
							}
						</style>
						<div class="metro">
							<?=$vacancy['METRO']['UF_NAME'];?>
						</div>
					<?}?>
					<div class="address">
						<?=$vacancy['ADDRESS'];?>
					</div>
				</div>
			</div>

            <div id="vacancydetail_<?=$count;?>" class="popup_item" style="display: none">
                <div class="vacancy-detail-wrapper">
                    <div class="title"><?=$vacancy['NAME'];?></div>
                    <div class="review__wrapper">
                        <div class="review__content">
                            <?if(!empty($vacancy['DESCRIPTION'])){?>
                                <?=$vacancy['DESCRIPTION'];?>
                            <?}?>
                            <?if(!empty($vacancy['DETAIL_TEXT'])){?>
                                <div class="subtitle_h2">Требования</div>
                                <?=$vacancy['DETAIL_TEXT'];?>
                            <?}?>
                            <?if(!empty($vacancy['PREVIEW_TEXT'])){?>
                                <div class="subtitle_h2">Условия</div>
                                <?=$vacancy['PREVIEW_TEXT'];?>
                            <?}?>
                        </div>
                        <div class="review__form">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:form.result.new",
                                ".default",
                                Array(
                                    "AJAX_MODE" => "Y",
                                    "AJAX_OPTION_SHADOW" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "N",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "SEF_MODE" => "N",
                                    "WEB_FORM_ID" => "5",
                                    "LIST_URL" => "",
                                    "EDIT_URL" => "",
                                    "SUCCESS_URL" => "",
                                    "CHAIN_ITEM_TEXT" => "",
                                    "CHAIN_ITEM_LINK" => "",
                                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                                    "USE_EXTENDED_ERRORS" => "N",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "3600",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "VARIABLE_ALIASES" => Array(
                                        "WEB_FORM_ID" => "WEB_FORM_ID",
                                        "RESULT_ID" => "RESULT_ID"
                                    )
                                )
                            );?>
                        </div>
                    </div>
                </div>
            </div>
		<?}?>
	</div>
</div>
