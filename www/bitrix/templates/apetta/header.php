<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta http-equiv="content-type" content="text/html">
    <meta name="msthemecompatible" content="no">
    <meta name="cleartype" content="on">
    <meta name="HandheldFriendly" content="True">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="/favicon.png">

    <?
        global $APPLICATION;
        $dir = $APPLICATION->GetCurPage(true);
        $arDir = explode('/', $dir);
        $count_dir = count($arDir);
        $APPLICATION->ShowHead();
        use Bitrix\Main\Page\Asset;
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/styles/defaults.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/styles/layouts.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/styles/pages.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/styles/vendors.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/fonts/stylesheet.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/scripts/libs/jquery.fancybox.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/scripts/libs/jquery.bxslider.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/scripts/libs/jqDatePicker.css");
        Asset::getInstance()->addString("<link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;amp;subset=cyrillic-ext\" rel=\"stylesheet\">");



        Asset::getInstance()->addString("<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js\"></script>");
        Asset::getInstance()->addString("<script src=\"//api-maps.yandex.ru/2.1/?lang=ru_RU\" type=\"text/javascript\"></script>");

        //CJSCore::Init(array("jquery"));
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/libs/jquery.mousewheel.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/libs/jquery.easing.1.3.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/libs/jquery.mask.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/libs/jquery.fancybox.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/libs/jquery.bxslider.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/libs/jqDatePicker.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/jquery.events.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/jquery.functions.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/actions.js");
    ?>
    <!--[if lt IE 9]>
        <script src="<?=SITE_TEMPLATE_PATH?>/assets/scripts/libs/html5shiv/es5-shim.min.js"></script>
        <script src="<?=SITE_TEMPLATE_PATH?>/assets/scripts/libs/html5shiv/html5shiv.min.js"></script>
        <script src="<?=SITE_TEMPLATE_PATH?>/assets/scripts/libs/html5shiv/html5shiv-printshiv.min.js"></script>
        <script src="<?=SITE_TEMPLATE_PATH?>/assets/scripts/libs/respond.min.js"></script>
    <![endif]-->
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <title><?$APPLICATION->ShowTitle();?></title>
</head>
<body>
<header id="index">
    <div id="panel">
        <?$APPLICATION->ShowPanel();?>
    </div>
    <div class="black-top-block--wrapper responsive-hide">
        <div class="black-top-block">
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "top_menu",
                Array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(0=>"",),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "top",
                    "USE_EXT" => "N"
                )
            );?>
            <div class="activity-user-block">
                <div class="social-links-block"><span class="social-links-title">Мы в соц.сетях</span><a href="https://facebook.com/" class="fb"></a><a href="https://vk.com/" class="vk"></a>
                    <!--a.ok(href="https://ok.ru/")-->
                </div>
                <div class="city-block"><span class="city-title">Ваш город</span>
                    <div class="city-block_select">
                        <a href="index.html" class="active">
                            Санкт-Петербург
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="5" viewBox="0 0 8 5">
                                <path fill="#009ACE" fill-rule="evenodd" d="M0 .643L4 4.5 8 .643 7.333 0 4 3.214.667 0z"/>
                            </svg></a>
                        <ul id = "select_city" >
                            <li><a href="?city=spb">Санкт-Петербург</a></li>
                            <li><a href="?city=moskva">Москва</a></li>
                            <li><a href="?city=rd">Ростов-на-Дону</a></li>
                        </ul>
                    </div>
                </div>
                <div class="manage-panel">
                    <div class="manage-panel_lang">
                        <a href="/" class="active" data-select="select_lang">
                            RU
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="5" viewBox="0 0 8 5">
                                <path fill="#009ACE" fill-rule="evenodd" d="M0 .643L4 4.5 8 .643 7.333 0 4 3.214.667 0z"/>
                            </svg>
                        </a>
                        <ul id = "select_lang" >
                            <li><a href="?lang=ru">RU</a></li>
                            <li><a href="?lang=eng">ENG</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- black-top-block end-->
    </div>
    <div class="functions-block--wrapper">
        <div class="functions-block">
            <div class="burger-menu-button"><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/burger.svg"></a></div>
            <div class="functions-logo"><a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo.svg"></a></div>
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "catalog",
                Array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(0=>"",),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "catalog",
                    "USE_EXT" => "Y"
                )
            );?>
            <div class="functions-search">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:search.form",
                    "search_top",
                    Array(
                        "PAGE" => "#SITE_DIR#search/index.php",
                        "USE_SUGGEST" => "N"
                    )
                );?>
            </div>
            <div class="functions--wrapper">
                <div class="functions-contacts">
                    <div class="time-block">
                        <div class="time-block-icon" style="display: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                <path fill="#D8D8D8" fill-rule="evenodd" d="M7.5 15a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15zm0-1a6.5 6.5 0 1 0 0-13 6.5 6.5 0 0 0 0 13zM7 2h1v5H7V2zm0 5h4v1H7V7z"/>
                            </svg>
                        </div>
                        <div class="time-block-wrapper hide"></div>
                    </div>
                    <div class="phone"><a href="tel:78007073747">8 (800) 707-37-47</a></div>
                    <div class="call-me-link"><a href="#recallme" class="fancybox">Обратный звонок</a></div>
                </div>
                <div class="functions-personal">
                    <?if(empty($_COOKIE['AGBIS_SESSION_ID'])) {?>
                        <div class="authorizire-me-link"><a href="/login/" data-popup><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/personal.svg"><span>Войти</span></a></div>
                    <?} else {?>
                        <div class="authorizire-me-link active"><a href="/personal/"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/personal.svg"><span>Личный кабинет</span></a></div>
                    <?}?>
                </div>
                <? require($_SERVER["DOCUMENT_ROOT"] . "/ajax/update_count_line_cart.php");?>
            </div>
        </div>
        <!-- function-block end-->
    </div>
    <div class="slide__menu slide__menu_hide">
        <button class="btn_close">&#10006</button>
        <div class="slide__menu_search">
            <?$APPLICATION->IncludeComponent(
                "bitrix:search.form",
                "search_top",
                Array(
                    "PAGE" => "#SITE_DIR#search/index.php",
                    "USE_SUGGEST" => "N"
                )
            );?>
        </div>
        <div class="slide__menu_wrapper">
            <ul class="slide__menu_top">
                <li><a href="/catalog/khimchistka_i_stirka/">Химчистка и стирка</a></li>
                <li><a href="/catalog/ozonirovanie/">Озонирование</a></li>
                <li><a href="/catalog/remont_odezhdy/">Ремонт одежды</a></li>
                <li><a href="/chistka-kovrov/">Чистка ковров</a></li>
            </ul>
            <ul class="slide__menu_bottom">
                <li><a href="/o-kompanii/">О компании</a></li>
                <li><a href="/voprosy-i-otvety/">Вопросы – ответы</a></li>
                <li><a href="/otzyvy/">Отзывы</a></li>
				<li><a href="/nashi-adresa/">Наши адреса</a></li>
                <li><a href="/korporativnym-klientam/">Корпоративным клиентам</a></li>
                <li><a href="#">Полезная информация</a></li>
				<li><a href="/carera/">Карьера</a></li>
            </ul>
            <div class="slide__menu_recall"><a href="#recallme" data-popup>Обратный звонок</a></div>
            <div class="slide__menu_social-links-block"><span class="social-links-title">Мы в соц.сетях</span><a href="https://facebook.com/" class="fb"></a><a href="https://vk.com/" class="vk"></a><a href="https://ok.ru/" class="ok"></a></div>
            <div class="slide__menu_city-block"><span>Ваш город</span>
                <div class="city-block_select"><a href="index.html" class="active">
                        Санкт-Петербург
                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="5" viewBox="0 0 8 5">
                            <path fill="#009ACE" fill-rule="evenodd" d="M0 .643L4 4.5 8 .643 7.333 0 4 3.214.667 0z"/>
                        </svg></a>
                    <div class="hover"><!-- TODO: найти всплывашку выбора городов --></div>
                </div>
            </div>
            <div class="slide__menu_manage-panel_lang"><span>Язык</span><a href="start.html" class="active">
                    ENG
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="5" viewBox="0 0 8 5">
                        <path fill="#009ACE" fill-rule="evenodd" d="M0 .643L4 4.5 8 .643 7.333 0 4 3.214.667 0z"/>
                    </svg></a>
                <ul class="hover hide">
                    <li><a href="start.html?lang=ru">RU</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- header end-->
<main>
<?$APPLICATION->ShowViewContent('breadcrumbs');?>
<?if($arDir['1'] != 'index.php') {?>
    <div class="section-page">
        <h1 class="caption"><?$APPLICATION->ShowTitle(false);?></h1>
    </div>
    <div class="wrapper-content <?$APPLICATION->ShowProperty('page_class')?>">
<?}?>