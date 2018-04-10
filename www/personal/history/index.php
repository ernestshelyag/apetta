<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
if(!empty($_COOKIE['AGBIS_SESSION_ID']) OR $_COOKIE['AGBIS_SESSION_ID'] != 0) {
    $USER_AGBIS = $agbis->getUserInfo();
    ?>
    <div class="wrapper-content">
        <!-- #WORKAREA#-->
        <div class="personal--wrapper">
            <div class="left_block">
                <div class="menu_block">
                    <div class="menu_item"><a href="/personal/">Контактные данные</a></div>
                    <div class="menu_item"><a href="/personal/history/" class="active">История заказа</a></div>
                    <div class="menu_item"><a href="?logout=Y" data-alert="Вы точно хотите выйти?">Выйти</a></div>
                </div>
                <? if (is_array($USER_AGBIS)) { ?>
                    <div class="sales_block">
                        <?if($USER_AGBIS['DISCOUNT'] > 0) {?>
                            <p>
                                Ваша скидка на покупку товаров <big><?=$USER_AGBIS['DISCOUNT']?>%</big>
                            </p>
                        <?}?>
                        <p>Если сумма заказов, сделанных в текущем году, превысила 10&nbsp;000&nbsp;рублей - скидка <big>10%</big></p>
                        <p>Если сумма заказов, сделанных в текущем году, превысила 100&nbsp;000&nbsp;рублей - скидка <big>15%</big></p>
                    </div>
                <? } ?>
            </div>
            <div class="left_block bottom">
                <div class="subsribe_block">
                    <p>Получайте самые свежие новости первыми</p><a href="" data-ajax="SUBSRIBE_AJAX" class="btn">Подписаться</a>
                </div>
                <div class="social-networks_block" style="display: none;">
                    <p>Привяжите свой аккаунт</p>
                    <div class="social-network_item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="13" viewBox="0 0 23 13">
                            <path fill="#2D74CA" fill-rule="evenodd"
                                  d="M19.795 8.266c.763.744 1.568 1.444 2.252 2.263.302.364.589.74.808 1.162.31.6.029 1.26-.51 1.297l-3.35-.002c-.865.072-1.555-.276-2.134-.866-.464-.472-.894-.974-1.34-1.462a3.167 3.167 0 0 0-.603-.535c-.457-.297-.854-.206-1.116.27-.266.485-.326 1.022-.352 1.562-.036.788-.275.995-1.067 1.031-1.694.08-3.301-.176-4.795-1.03-1.316-.752-2.337-1.814-3.226-3.016C2.632 6.598 1.307 4.026.116 1.38-.152.786.044.466.703.455a91.832 91.832 0 0 1 3.28-.002c.444.007.738.261.91.68.591 1.453 1.315 2.835 2.223 4.116.242.34.489.681.84.922.389.265.684.177.867-.255.116-.274.167-.57.193-.863.086-1.01.098-2.019-.054-3.025C8.87 1.399 8.515.992 7.887.873c-.32-.06-.273-.18-.117-.362C8.039.196 8.292 0 8.797 0h3.787c.596.118.729.385.81.984l.003 4.201c-.006.232.116.92.535 1.074.334.11.555-.158.756-.37.906-.961 1.554-2.097 2.132-3.273.256-.518.477-1.054.69-1.591.16-.398.408-.594.857-.586l3.644.004c.108 0 .218.001.322.02.615.104.783.368.593.967-.299.94-.88 1.722-1.449 2.51-.608.84-1.258 1.65-1.86 2.495-.554.772-.51 1.16.178 1.83z"/>
                        </svg>
                        <span>Аккаунт не привязан</span>
                    </div>
                    <div class="social-network_item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="18" viewBox="0 0 10 18">
                            <path fill="#009ace" fill-rule="evenodd"
                                  d="M9.624.004L7.225 0C4.531 0 2.79 1.739 2.79 4.43v2.043H.377A.372.372 0 0 0 0 6.839V9.8c0 .202.17.367.377.367h2.412v7.467c0 .202.169.367.377.367h3.146a.373.373 0 0 0 .378-.367v-7.467h2.82a.372.372 0 0 0 .376-.367l.002-2.96c0-.097-.04-.19-.11-.26a.382.382 0 0 0-.267-.106H6.69V4.74c0-.832.204-1.255 1.317-1.255h1.616A.372.372 0 0 0 10 3.118V.37a.372.372 0 0 0-.376-.367z"/>
                        </svg>
                        <span>Аккаунт не привязан</span>
                    </div>
                    <div class="social-network_item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="18" viewBox="0 0 11 18">
                            <path fill="#009ace" fill-rule="evenodd"
                                  d="M4.598 12.678c-1.42-.145-2.7-.489-3.797-1.33-.136-.106-.276-.207-.4-.324-.48-.453-.528-.971-.15-1.506.326-.457.871-.58 1.438-.317.11.05.215.115.315.183 2.043 1.378 4.849 1.417 6.9.061.204-.153.42-.278.672-.341.49-.124.946.053 1.209.474.3.48.295.95-.074 1.323-.567.571-1.25.985-2.007 1.275-.717.272-1.501.41-2.279.501.118.125.173.187.247.259 1.055 1.042 2.114 2.078 3.165 3.123.358.356.433.797.236 1.212-.216.452-.698.75-1.172.718-.3-.02-.533-.167-.742-.373-.796-.787-1.606-1.56-2.387-2.361-.226-.234-.336-.19-.535.013-.801.81-1.615 1.608-2.434 2.4-.367.356-.805.42-1.231.217-.454-.215-.742-.67-.72-1.126.015-.31.17-.546.386-.758 1.044-1.024 2.085-2.05 3.126-3.076.07-.068.134-.14.234-.247zm.865-3.567C2.93 9.103.853 7.04.867 4.545.881 2.024 2.96-.008 5.52 0c2.564.006 4.62 2.067 4.609 4.615-.013 2.488-2.105 4.504-4.665 4.496zm2.303-4.56c-.005-1.237-1.008-2.223-2.265-2.224-1.269-.002-2.28 1.002-2.27 2.251.008 1.233 1.02 2.213 2.281 2.208 1.257-.005 2.258-.997 2.254-2.234z"/>
                        </svg>
                        <span>Аккаунт не привязан</span>
                    </div>
                </div>
                <hr>
                <a href="/otzyvy/" class="btn alone">Оставить отзыв</a>
            </div>
            <div class="content_block">
                <div class="history-order_wrap">
                    <h2>История заказов</h2>
                    <div class="orders_block">
                        <?
                        $agbis = new CAgbisProfiler();
                        $arOrders = $agbis->getUserOrders();
                        //echo '<pre>'; print_r($arOrders); echo '</pre>';
                        ?>

                        <?
                        foreach ($arOrders as $id => $order) {
                            $format = "DD.MM.YYYY HH:MI:SS";
                            $arrTime = ParseDateTime($order['doc_date'], $format);

                            if($arrTime['YYYY'] == date('Y') OR $arrTime['YYYY'] == (date('Y')-1)){
                                $order['PRODUCTS'] = $agbis->getUserOrderDetail($id);
                                ?>
                                <div class="order-item">
                                    <div class="order-anons">
                                        <div class="date"><?= $order['date_out'] ?></div>
                                        <div class="number"><span>Номер заказа</span>
                                            <p>№<?= $order['doc_num'] ?></p>
                                        </div>
                                        <div class="activity">
                                            <a href="" class="slide closed"></a>
                                            <a href="/cart/" class="repeat-order">Повторить заказ</a>
                                            <? if($order['status'] == '1') {?>
                                                <a href="javascript:void(0)" data-order_id="<?= $id ?>" class="confirm-order">Потвердить заказ</a>
                                            <?}?>
                                        </div>
                                    </div>

                                    <div class="order-detail cart-right-block aleft hide">
                                        <div class="content">
                                            <div class="products-block">
                                                <div class="header">
                                                    <div class="item-name">Наименование</div>
                                                    <div class="item-count">Количество</div>
                                                    <div class="item-price">Цена (Р)</div>
                                                </div>
                                                <div class="column">
                                                    <? foreach ($order['PRODUCTS'] as $product) {
                                                        $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
                                                        $arFilter = Array("IBLOCK_ID" => 6, "NAME" => $product['id_product'], "ACTIVE" => "Y");
                                                        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
                                                        while ($ob = $res->GetNextElement()) {
                                                            $arFields = $ob->GetFields();
                                                            $productID = $arFields['ID'];
                                                        }
                                                        ?>
                                                        <div class="product-item" data-id="<?= $productID ?>" data-qty="<?= $product['qty'] ?>">
                                                            <div class="item-name">
                                                                <div class="name"><?= $product['name'] ?></div>
                                                                <div class="props"><span
                                                                        class="product__props-name">ID:&nbsp;</span><span
                                                                        class="product__props-value"><?= $product['id_product'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="item-count count_block">
                                                                <p><?= $product['qty'] ?></p>
                                                            </div>
                                                            <div class="item-price"><span><?= $product['price'] ?> Р</span>
                                                            </div>
                                                        </div>
                                                    <? } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <? }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div><?
}else {
    LocalRedirect('/login/');
}
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>