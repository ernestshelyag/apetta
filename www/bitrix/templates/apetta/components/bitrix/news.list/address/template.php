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
		var ob_apetta = {
			type: 'FeatureCollection',
			features: [
				<?foreach($arResult['ITEMS'] as $Item){?>
				{
					type: 'Feature',
					properties: {
						balloonContent: ["<?=$Item['NAME'];?><br><?=$Item['PROPERTIES']['ADDRESS']['VALUE'];?><br><?=$Item['PROPERTIES']['PHONE']['VALUE'];?>"]
					},
					geometry: {
						type: 'Point',
						coordinates: [<?=$Item['PROPERTIES']['MAP']['VALUE']?>]
					}
				},
				<?}?>
			]
		};
</script>
<div class="wrapper-content wrapper__address">
	<div class="maps-block">
		<div class="lineform">
			<!-- нужно обсудить указание города-->
			<input type="text" style="display: none" name="city" value="Санкт-Петербург">
			<input type="text" name="address" id="adress" placeholder="Введите свой адрес" >
			<a href="javascript:void(0);" id="search"  class="btn">Найти ближайшую химчистку</a>
		</div>
		<div id="address_map" class="map" data-center="59.93, 30.31"></div>
	</div>
	<div class="address__list">
		<?foreach ($arResult['ITEMS'] as $arItem){
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>

			<div class="vacancy-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="vacancy-detail">
					<style>
						#<?=$this->GetEditAreaId($arItem['ID']);?> .vacancy-detail .metro:after{
							background: <?=$arItem['PROPERTIES']['METRO']['COLOR_LINE']?>;
						}
					</style>
					<div class="metro"><?=$arItem['NAME'];?></div>
					<div class="address"><?=$arItem['PROPERTIES']['ADDRESS']['VALUE'];?></div>
					<div class="address">Часы работы: <?=$arItem['PROPERTIES']['TIME_WORK']['VALUE'];?></div>
					<div class="address">Тел: <?=$arItem['PROPERTIES']['PHONE']['VALUE'];?></div>
				</div>
			</div>
		<?}?>
	</div>
</div>