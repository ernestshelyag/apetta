<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("page_class", "content");
$APPLICATION->SetTitle("Регистрация");
?><div class="row">
    <div class="item7">

            <div class="auth-block">
                <?if(empty($_COOKIE['AGBIS_USER_ID'])){?>
                    <div class="social-network__wrap" style="visibility: hidden">
                        <div class="title">Войти через социальную сеть</div>
                        <div class="links"><a href=""><img src="/bitrix/templates/apetta/assets/img/icon-network/fb.svg"></a><a href=""><img src="/bitrix/templates/apetta/assets/img/icon-network/vk.svg"></a><a href=""><img src="/bitrix/templates/apetta/assets/img/icon-network/ok.svg"></a></div>
                    </div>
                    <div class="email-password__wrap ajax-register">
                        <div class="title">Зарегистроваться</div>
                        <form action="/ajax/registerUser.php" method="post">
                            <input type="text" required name="name" placeholder="Ваше имя" value="">
                            <input type="text" required name="phone" placeholder="Телефон" value="">
                            <input type="text" required name="mail" placeholder="Электронная почта" value="">
                            <div class="submit-form__wrap">
                                <input type="submit" name="submit" value="Зарегистрироваться" class="btn">
                            </div><span class="links">Есть аккаунт?<a href="/login/">Войти</a></span>
                        </form>
                    </div>
                <?} else {?>
                    <div class="email-password__wrap">
                        <div class="title">
                            Вы зарегистрированы и успешно авторизованы. <br> Проверить состояние заказов можно <a
                                    href="/personal/">в личном кабинете</a>
                        </div>
                    </div>
                <?}?>
            </div>
    </div>

</div>
    <div class="red-border_block">
        <div class="title">В чем плюсы регистрации?</div>
        <div class="pluses_block">
            <div class="plus_item"><img src="/bitrix/templates/apetta/assets/img/balls.svg" alt="">
                <p>Копите бонусные баллы и получайте скидки</p>
            </div>
            <div class="plus_item"><img src="/bitrix/templates/apetta/assets/img/secmetr.svg" alt="">
                <p>Оформляйте заказ быстрее и проще</p>
            </div>
            <div class="plus_item"><img src="/bitrix/templates/apetta/assets/img/medal.svg" alt="">
                <p>Станьте членом нашего клуба и участвуйте в акциях</p>
            </div>
        </div>
    </div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>