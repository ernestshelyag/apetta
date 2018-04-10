<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Спасибо, ваш заказ оформлен");
?>
    <style>
        h1{
            color: green;
        }

    </style>
<div style="width: 280px;margin: 0 auto;">
    <p style="font-size: 2rem">Номер вашего заказа <?=$_GET['ORDER_ID'];?></p>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>