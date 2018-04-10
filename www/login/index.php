<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("page_class", "content");
$APPLICATION->SetTitle("Авторизация");
?><div class="row">
    <div class="item7">
        <div class="auth-block">
            <?if(empty($_COOKIE['AGBIS_USER_ID'])){?>
                <div class="email-password__wrap ajax-login">
                    <div class="title">Войти на сайт</div>
                    <form action="/ajax/loginUser.php" method="post">
                        <input type="text" required name="phone" placeholder="Номер телефона" value="<?=$_REQUEST['phone']?>">
                        <input type="text" required name="pass" placeholder="Пароль из смс" value="">
                        <div class="submit-form__wrap">
                            <input type="submit" name="submit" value="Войти" class="btn">
                        </div><span class="links">Нет аккаунта?<a href="/register/">Зарегистрироваться</a></span>
                    </form>
                </div>
            <?} else {
                LocalRedirect('/personal/');
            }?>
        </div>
    </div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>