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
<div class="questions-answers__wrapper">
    <div class="questions-answers__list">Темы
        <ul>
            <li data-href="#questions-answers__content_block-all">Все темы</li>
            <?foreach ($arResult['THEME'] as $id => $theme) {?>
                <? //print_r($theme); ?>
                <li data-href="#questions-answers__content_block-<?=$theme['ID']?>"><?=$theme['VALUE']?></li>
            <?}?>
        </ul>
    </div>
    <div class="questions-answers__content">
        <div id="questions-answers__content_block-all" class="content_block">
            <h2>Популярные вопросы и ответы на них</h2>
            <ul class="accordion">
                <?foreach ($arResult['ITEMS'] as $id => $faq) { ?>
                    <li>
                        <a href=""><?=$faq['DISPLAY_PROPERTIES']['QUESTION']['VALUE']['TEXT']?></a>
                        <p>
                            <?=$faq['DISPLAY_PROPERTIES']['ANSWER']['VALUE']['TEXT']?>
                        </p>
                    </li>
                    <hr>
                <?}?>
            </ul>
        </div>
        <?foreach ($arResult['THEME'] as $id => $theme) {?>
            <div id="questions-answers__content_block-<?=$id?>" class="content_block" style="display: none;">
                <h2><?=$theme['VALUE']?></h2>
                <ul class="accordion">
                    <?foreach ($arResult['ITEMS'] as $id_faq => $faq) { ?>
                        <?if($faq['DISPLAY_PROPERTIES']['THEME']['VALUE_ENUM_ID'] == $id) {?>
                            <li>
                                <a href=""><?=$faq['DISPLAY_PROPERTIES']['QUESTION']['VALUE']['TEXT']?></a>
                                <p>
                                    <?=$faq['DISPLAY_PROPERTIES']['ANSWER']['VALUE']['TEXT']?>
                                </p>
                            </li>
                            <hr>
                        <?}?>
                    <?}?>
                </ul>
            </div>
        <?}?>
    </div>
    <div class="questions-answers__form">
        <div>
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
                    "WEB_FORM_ID" => "3",
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
