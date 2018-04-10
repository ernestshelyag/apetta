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

<div class="main-content_block item12 maps-block__wrap">
    <div class="maps-block">
        <div class="lineform">
            <input type="text" style="display: none" name="city" value="Санкт-Петербург">
            <input type="text" id="adress" value="" name="" placeholder="Введите свой адрес">
            <a href="javascript:void(0);" id="search"  class="btn">Найти ближайшую химчистку</a>
        </div>
        <div id="address_main" class="map"></div>
    </div>
</div>
