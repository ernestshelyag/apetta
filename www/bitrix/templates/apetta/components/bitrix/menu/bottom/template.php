<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<div class="footer-menu">
		<ul class="menu-block">
			<?foreach($arResult as $arItem){?>
				<?if($arItem["SELECTED"]):?>
				<li class="menu-element"><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
				<?else:?>
				<li class="menu-element"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?endif?>
			<?}?>
		</ul>
	</div>
<?endif?>