<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
?>
<div class="search__wrapper">
	<div class="search__form">
		<form action="" method="" data-submit="">
			<input type="text" name="q" value="" placeholder="Введите свой запрос" name="q">
			<input type="submit" value="<?=GetMessage("SEARCH_GO")?>" />
		</form>
	</div>
	<?if(count($arResult["RESULT"]) > 0){?>
		<ul>
			<?foreach($arResult["RESULT"] as $arItem){?>
				<li class="search__result">
					<img src="<?=$arItem['PICTURE'];?>" class="search__result_image">
					<div class="search__result_text">
						<h2 class="search__result_name"><?=$arItem['NAME'];?></h2>
						<?if(!empty($arItem['PREVIEW_TEXT'])){?>
							<p class="search__result_description"><?=$arItem['PREVIEW_TEXT'];?></p>
						<?}?>
						<a href="<?=$arItem['LINK'];?>" class="btn search__result_more">Подробнее</a>
					</div>
				</li>
			<?}?>
		</ul>
	<?}?>
</div>
