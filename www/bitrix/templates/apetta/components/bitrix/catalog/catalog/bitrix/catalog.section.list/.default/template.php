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
$this->setFrameMode(true);?>
<?
	$this->AddEditAction($arResult['SECTION']['ID'], '/bitrix/admin/cat_section_edit.php?IBLOCK_ID=7&type=catalog&ID='.$arResult['SECTION']['ID'].'&lang=ru&force_catalog=1&filter_section='.$arResult['SECTION']['ID'].'&bxpublic=Y&from_module=iblock', $strSectionEdit);
?>
<div class="wrapper-content " id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']);?>">
	<?if(!empty($arResult['SECTION']['~DESCRIPTION'])){?>
		<div class="html-text_block responsive-hide">
			<?=$arResult['SECTION']['~DESCRIPTION'];?>
		</div>
	<?}?>
	<div class="catalog__wrapper">
		<?foreach ($arResult['DATA'] as $arItem){?>
			<div class="catalog_level">
				<div class="section_image"><img src="<?=$arItem['IMG'];?>"></div>
				<div class="section_name">
					<h2><?=$arItem['NAME'];?></h2>
				</div>
				<div class="subsection_list__wrapper">
					<ul>
						<?foreach ($arItem['SECTIONS'] as $item_inner){?>
							<li class="subsection_element"><a href="<?=$item_inner['LINK'];?>"  <?if($item_inner['ACTIVE'] == 'Y'){?>class="active"<?}?>><?=$item_inner['NAME'];?></a></li>
						<?}?>
					</ul>
				</div>
			</div>
		<?}?>
	</div>
</div>
