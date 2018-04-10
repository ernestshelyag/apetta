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
foreach ($arResult['DATA'] as $arSect) {
    if ($arSect['UF_TEMPLATE_VIEW'] == 5) {?>
        <h3><?= $arSect['NAME']; ?></h3>
        <? if (!empty($arSect['DESCRIPTION'])) {
            echo $arSect['DESCRIPTION'];
            echo '<p><br></p>';
        }
        if (!empty($arSect['ITEMS'])) {?>
            <div class="img_block">
                <?foreach ($arSect['ITEMS'] as $item) {?>
                    <img src="<?=$item['IMG_RESIZE'];?>" alt="<?=$item['NAME'];?>" height="183">
                <?}?>
            </div>
        <?}
    } elseif ($arSect['UF_TEMPLATE_VIEW'] == 6) {?>
        <h3><?= $arSect['NAME']; ?></h3>
        <? if (!empty($arSect['DESCRIPTION'])) {
            echo $arSect['DESCRIPTION'];
            echo '<p><br></p>';
        }
        if (!empty($arSect['ITEMS'])) {?>
            <div class="main-content__wrap">
                <div class="main-content_block">
                    <div class="digits_block">
                        <?foreach ($arSect['ITEMS'] as $item){?>
                            <div class="digit_item" style="width: 127px">
                                <img width="60" src="<?=$item['IMG_RESIZE'];?>" alt="<?=$item['NAME'];?>">
                                <div class="description">
                                    <?=$item['NAME'];?>
                                </div>
                            </div>
                        <?}?>
                    </div>
                </div>
            </div>
        <?}
    } elseif ($arSect['UF_TEMPLATE_VIEW'] == 7) {
        ?>
        <h3><?= $arSect['NAME']; ?></h3>
        <? if (!empty($arSect['DESCRIPTION'])) {
            echo $arSect['DESCRIPTION'];
            echo '<p><br></p>';
        }
        if (!empty($arSect['ITEMS'])) {
            foreach ($arSect['ITEMS'] as $item) {
                ?>
                <p><b><?=$item['NAME'];?></b></p>
                <?
                echo $item['PREVIEW_TEXT'];
                echo '<p><br></p>';?>
            <?
            }
        }
    } elseif ($arSect['UF_TEMPLATE_VIEW'] == 8) {
        ?>
        <h3><?= $arSect['NAME']; ?></h3>
        <? if (!empty($arSect['DESCRIPTION'])) {
            echo $arSect['DESCRIPTION'];
            echo '<p><br></p>';
        }
        if (!empty($arSect['ITEMS'])) {?>
            <div class="img_block diplom">
                <?foreach ($arSect['ITEMS'] as $item){?>
                    <a href="<?=$item['IMG_FULL'];?>" class="fancybox" title="<?=$item['NAME'];?>">
                        <img src="<?=$item['IMG_RESIZE']['SRC'];?>" alt="<?=$item['NAME'];?>">
                    </a>
                <?}?>
            </div>
        <?}
    } elseif ($arSect['UF_TEMPLATE_VIEW'] == 10) {
        if ($arSect['ID'] != 786) {
            ?>
            <h3><?= $arSect['NAME']; ?></h3>
            <?
        }
        if (!empty($arSect['DESCRIPTION'])) {
            echo $arSect['DESCRIPTION'];
        }
        if (!empty($arSect['PICTURE'])) {
            ?>
            <p><br></p>
            <p><img src="<?= $arSect['PICTURE']; ?>" alt="<?= $arSect['NAME']; ?>" width="98%"></p>
            <?
        }
    }elseif($arSect['UF_TEMPLATE_VIEW'] == '11'){?>
        <h3><?= $arSect['NAME']; ?></h3>
        <? if (!empty($arSect['DESCRIPTION'])) {
            echo $arSect['DESCRIPTION'];
            echo '<p><br></p>';
        }
        if (!empty($arSect['ITEMS'])) {?>
            <div class="questions-answers__wrapper">
                <div class="questions-answers__content">
                    <div id="questions-answers__content_block-all" class="content_block">
                        <ul class="accordion">
                            <? foreach ($arSect['ITEMS'] as $item) {?>
                                <li>
                                    <?=$item['PREVIEW_TEXT'];?>
                                </li>
                                <hr>
                            <?}?>
                        </ul>
                    </div>
                </div>
            </div>
        <?}
    }
}
