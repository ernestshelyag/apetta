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
<div class="review__wrapper">
    <div class="review__content">
        <h2>Отзывы покупателей</h2>
        <ul>
            <?foreach ($arResult['ITEMS'] as $id => $review) { ?>
                <li class="review__client-number_<?=$id?>">
                    <div class="review__client-info">
                        <div class="review__ava">
                            <?if(!empty($review['PROPERTIES']['USER_ID']['DATA']['PERSONAL_PHOTO'])) {?>
                                <img src="<?=CFile::GetPath($review['PROPERTIES']['USER_ID']['DATA']['PERSONAL_PHOTO']);?>">
                            <?} else {?>
                                <span class="first-letter" style="background: <?=$review['PROPERTIES']['USER_ID']['DATA']['WORK_DEPARTMENT']?>"><?=mb_substr($review['PROPERTIES']['USER_ID']['DATA']['NAME'], 0, 1)?></span>
                            <?}?>
                        </div>
                        <div class="review__name-rating"><span class="review__name"><?=$review['PROPERTIES']['USER_ID']['DATA']['NAME']?></span>
                            <div class="review__rating">
                                <?for ($i = 1; $i<=5; $i++) {?>
                                    <?if($i <= $review['PROPERTIES']['RATING']['VALUE']) {?>
                                        <div class="fill"></div>
                                    <?} else {?>
                                        <div class="nofill"></div>
                                    <?}?>
                                <?}?>
                            </div>
                        </div><span class="review__date">Написано <?=substr($review['ACTIVE_FROM'], 0, 10);?></span>
                    </div>
                    <p class="review__text"><?=$review['PREVIEW_TEXT']?></p>
                    <?if(!empty($review['DISPLAY_PROPERTIES']['ANSWER']['VALUE'])) {?>
                        <div class="review__answer">
                            <h3>Ответ сети химчисток Apetta</h3>
                            <p><?=$review['DISPLAY_PROPERTIES']['ANSWER']['VALUE']?></p>
                        </div>
                    <?}?>
                </li>
            <?}?>
        </ul>
    </div>
    <div class="review__form">
        <form id="reviews">
            <div>
                <p>Оставьте отзыв</p>
                <input type="text" name="PHOTO_USER" style="display: none">
                <input type="text" name="NAME_USER" style="display: none">
                <textarea name="review" placeholder="Текст отзыва" required></textarea>
                <div class="rating" required>
                    <input id="star5" type="radio" name="rating" value="5">
                    <label for="star5"></label>
                    <input id="star4" type="radio" name="rating" value="4">
                    <label for="star4"></label>
                    <input id="star3" type="radio" name="rating" value="3">
                    <label for="star3"></label>
                    <input id="star2" type="radio" name="rating" value="2">
                    <label for="star2"></label>
                    <input id="star1" type="radio" name="rating" value="1">
                    <label for="star1"></label>
                </div>
                <button type="submit">Отправить</button>
                <div class="error-message">Повторите попытку позднее.</div>
                <div class="success-message">Ваш отзыв добавлен.</div>
            </div>
        </form>
    </div>
</div>
