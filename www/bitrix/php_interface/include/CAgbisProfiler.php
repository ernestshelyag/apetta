<?

/**
 * Class CAgbisProfiler
 * DOC: https://docs.google.com/document/d/1VEdc6fT265ncbQFVoy_rTl57CB4-IVjEaqtAITE0hT4/edit?usp=sharing
 */
class CAgbisProfiler
{
    // connect to Agbis
    function connectAgbis($url, $debug = false)
    {
        $url_connect = "https://himinfo.ru/cl/apetta/api/?".$url."&json=yes";
        if($debug) print $url_connect;
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url_connect);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_HTTPGET, TRUE);


        $result = curl_exec($curl);
        curl_close($curl);

        $resultJson = json_decode($result);

        return $resultJson;
    }

    function encodeURIComponent($str) {
        $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
        return strtr(rawurlencode($str), $revert);
    }

    function decodeURIComponent($str) {
        $revert = array('+'=>' ', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
        return strtr(rawurldecode($str), $revert);
    }

    /*
     * Подготовка, создание и обновление товарной позиции
     * setPrice, setQuantity, getProduct, updatePrices
     */
    function setPrice($ID, $PRICE)
    {
       if (CModule::IncludeModule("catalog"))
        {
            $PRODUCT_ID = $ID;
            $PRICE_TYPE_ID = 1;

            $arFields = Array(
                "PRODUCT_ID" => $PRODUCT_ID,
                "CATALOG_GROUP_ID" => $PRICE_TYPE_ID,
                "PRICE" => $PRICE,
                "CURRENCY" => "RUB"
            );

            $res = CPrice::GetList(
                array(),
                array(
                    "PRODUCT_ID" => $PRODUCT_ID,
                    "CATALOG_GROUP_ID" => $PRICE_TYPE_ID
                )
            );

            if ($arr = $res->Fetch())
            {
                $return = CPrice::Update($arr["ID"], $arFields);
                echo 'Обновление цены товара '.$PRODUCT_ID.' на '.$PRICE.' рублей <br>';
            }
            else
            {
                $return = CPrice::Add($arFields);
                echo 'Добавление цены товара '.$PRODUCT_ID.' - '.$PRICE.' рублей <br>';
            }
            return $return;
        }
        return false;

    }
    function setQuantity($PRODUCT_ID){
        CModule::IncludeModule('catalog');
        $arFields = array(
            "ID" => $PRODUCT_ID,
            "AVAILABLE" => 'Y',
            "QUANTITY" => '1000'
        );
        if(CCatalogProduct::Add($arFields))
        {
            echo "Добавили количество товара " . $PRODUCT_ID . '<br>';
            return $arFields["QUANTITY"];
        }
        else
        {
            if(CCatalogProduct::Update($PRODUCT_ID, $arFields))
            {
                echo 'Обновление количества товара '.$PRODUCT_ID.'<br>';
                return $arFields["QUANTITY"];
            }
            else
            {
                echo 'Ошибка при обновлении количества товара '.$PRODUCT_ID.'<br>';
                return false;
            }
        }

    }
    function getProduct($NAME)
    {
        $ID_IBLOCK = 6;
        // bitrix getList
        if (CModule::IncludeModule("iblock"))
        {
            $arSelect = Array(
                "ID",
                "NAME",
                "DATE_ACTIVE_FROM",
                "IBLOCK_ID",
                "PROPERTY_*"
            );
            $arFilter = Array(
                "IBLOCK_ID" => $ID_IBLOCK,
                "NAME" => $NAME
            );
            $res = CIBlockElement::GetList(
                Array(),
                $arFilter,
                false,
                Array("nPageSize" => 1),
                $arSelect
            );
            while ($ob = $res->GetNextElement())
            {
                $arProduct = $ob->GetFields();
                $arProduct['PROPERTIES'] = $ob->GetProperties();
            }
            return $arProduct;
        }
        return false;
    }
    function updatePrices($PID)
    {
        $ID_IBLOCK = 6;
        //print 'PreStart connectAgbis();'."\n";
        $arAgbisPrices = $this->connectAgbis('PriceList={"price_id":100109}&json=yes');

        if ($arAgbisPrices->error == 0) {
            //print 'get $arAgbisPrices;'."\n";
            //print_r($arAgbisPrices);
            foreach ($arAgbisPrices->price_list as $productAgbis) {
                //print 'for each $productAgbis = '.$productAgbis->id."\n";
                $bitrixProduct = $this->getProduct($productAgbis->id);
                if($bitrixProduct['ID'] > 0)
                {
                    $arResult[$bitrixProduct['ID']] = $this->setPrice($bitrixProduct['ID'], $productAgbis->price);
                    $arResult['setQuantity'][$bitrixProduct['ID']] = $this->setQuantity($bitrixProduct['ID']);
                }

            }

            return $arResult;
        }
    }

    /**
     * @param $phone * телефон клиента
     * @param $mail * электронная почта клиента
     * @param $fio * ФИО клиента
     * @param $city город
     * @param $street улица
     * @param $house дом
     * @param $housing корпус
     * @param $room квартира
     * @param $office офис
     * @param $comment комментарий
     * @param $promo_code ID промо-кода
     * @param $working_address ID адреса промо-кода (Используется в паре с promo_code. Если у промо-кода не задан адрес, то working_address не указывается)
     * @return bool
     */
    function Register($phone, $mail, $fio, $city, $street, $house, $housing, $room, $office, $comment, $promo_code, $working_address) {
        $arAgbisSession = $this->connectAgbis(
            'RegistrNew={"fone":"%2B7'.$this->encodeURIComponent(trim($phone)).
            '","mail":"'.$this->encodeURIComponent(trim($mail)).
            '","change_name":"'.$this->encodeURIComponent(trim($fio)).
            '","city":"'.$this->encodeURIComponent(trim($city)).
            '","street":"'.$this->encodeURIComponent(trim($street)).
            '","house":"'.$this->encodeURIComponent(trim($house)).
            '","housing":"'.$this->encodeURIComponent(trim($housing)).
            '","room":"'.$this->encodeURIComponent(trim($room)).
            '","office":"'.$this->encodeURIComponent(trim($office)).
            '","comment":"'.$this->encodeURIComponent(trim($comment)).
            '","promo_code":"'.$this->encodeURIComponent(trim($promo_code)).
            '","working_address":"'.$this->encodeURIComponent(trim($working_address)).
            '"}');
        if ($arAgbisSession->error == 0) {
            print 'Y';
        } else {
            print urldecode($arAgbisSession->Msg);
        }
    }

    function LoginSMS($phone, $sms_code) {
        $arAgbisConnect = $this->connectAgbis('Login_con={"Fone":"%2B7'.$this->encodeURIComponent(trim($phone)).'","Password":"'.sha1(trim($sms_code)).'"}');
        if ($arAgbisConnect->error == 0) {
            setrawcookie("AGBIS_SESSION_ID", $arAgbisConnect->Session_id, time()+360000, '/');
            setrawcookie("AGBIS_USER_ID", $arAgbisConnect->id_user, time()+360000, '/');
            print 'Y';
        } else {
            print urldecode($arAgbisConnect->Msg);
        }
    }
    //TODO:
    function getSMSCode($phone) {
        $arAgbisSession = $this->connectAgbis('GetSmsCode={"User":'.$_COOKIE['AGBIS_SESSION_ID'].'}');
        if ($arAgbisSession->error == 0) {
            setrawcookie("AGBIS_SESSION_ID", 0, 0, '/');
            setrawcookie("AGBIS_USER_ID", 0, 0, '/');
            print 'Y';
        }
    }

    function changePass($pass, $pass_new) {
        $session = $_COOKIE['AGBIS_SESSION_ID'];
        $arAgbisConnect = $this->connectAgbis('SavePass={"old":"'.sha1(trim($pass)).'","new":"'.sha1(trim($pass_new)).'"}&SessionID='.$session);
        if ($arAgbisConnect->error == 0) {
            print 'Y';
        } else {
            print urldecode($arAgbisConnect->Msg);
        }
    }

    function Logout() {
        $arAgbisSession = $this->connectAgbis('Logout&SessionID='.$_COOKIE['AGBIS_SESSION_ID']);
        if ($arAgbisSession->error == 0) {
            setrawcookie("AGBIS_SESSION_ID", 0, 0, '/');
            setrawcookie("AGBIS_USER_ID", 0, 0, '/');
            print 'Y';
        }
    }

    function changeUserInfo($name, $phone, $email, $address) {
        //?SaveInfo={"Name": "", "Fone": "", "Teleph_cell": "", "Email": "", "Address": "", "source":""}&SessionID=
        $session = $_COOKIE['AGBIS_SESSION_ID'];
        $arAgbisConnect = $this->connectAgbis(
            'SaveInfo={"Name":"'.$this->encodeURIComponent(trim($name)).
            '","Fone":"%2B7'.$this->encodeURIComponent(trim($phone)).
            '","Teleph_cell":"%2B7'.$this->encodeURIComponent(trim($phone)).
            '","Email":"'.$this->encodeURIComponent(trim($email)).
            '","Address":"'.$this->encodeURIComponent($address).
            '"}&SessionID='.$session);

        if ($arAgbisConnect->error == 0) {
            print 'Y';
        } else {
            print urldecode($arAgbisConnect->Msg);
        }
    }

    function getUserInfo(){
        $session = $_COOKIE['AGBIS_SESSION_ID'];
        $arAgbisClient = $this->connectAgbis('ContrInfo&SessionID='.$session);
        if ($arAgbisClient->error == 0) {
            $arClient = array(
                'NAME' => $this->decodeURIComponent($arAgbisClient->name),
                'PHONE' => $arAgbisClient->fone,
                'PHONE_CELL' => trim($this->decodeURIComponent($arAgbisClient->fone_cell)),
                'EMAIL' => $arAgbisClient->email, // корпус
                'AGREE_TO_RECEIVE_SMS' => $arAgbisClient->agree_to_receive_sms,
                'AGREE_TO_RECEIVE_ADV_SMS' => $arAgbisClient->agree_to_receive_adv_sms,
                'ADDRESS' => trim($this->decodeURIComponent($arAgbisClient->address)),
                'BARCODE' => $arAgbisClient->barcode,
                'DISCOUNT' => $arAgbisClient->discount,
                'BIRTH_DAY' => $arAgbisClient->birth_day,
            );
            return $arClient;
        } else {
            return $arAgbisClient->Msg;
        }
    }

    /**
     * ORDER BLOCK
     */

    function confirmOrder($id_order) {
        $session = $_COOKIE['AGBIS_SESSION_ID'];
        $arAgbisConnect = $this->connectAgbis('OrderConfirm={"dor_id":"'.$id_order.'"}&SessionID='.$session);
        if ($arAgbisConnect->error == 0) {
            print 'Y';
        } else {
            print urldecode($arAgbisConnect->Msg);
        }
    }

    function getUserAddress(){
        $session = $_COOKIE['AGBIS_SESSION_ID'];
        $arAgbisAddress = $this->connectAgbis('AddressContr&SessionID='.$session);
        if ($arAgbisAddress->error == 0) {
            foreach ($arAgbisAddress->address_contr as $address) {
                //print 'for each $address = '.$address->id."\n";
                $arAdress[$address->id] = array(
                    'id' => $address->id,
                    'street' => $address->street,
                    'house' => $address->house,
                    'housing' => $address->housing, // корпус
                    'room' => $address->room
                );
            }
            return $arAdress;
        } else {
            return $arAgbisAddress->Msg;
        }
    }

    function sendDataOrder($idOrder) {
        print '1'."\n";
        CModule::IncludeModule('catalog');
        $id_iblock_orders = '11';
        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
        $arFilter = Array("IBLOCK_ID"=>$id_iblock_orders, "ID"=>$idOrder, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
        while($ob = $res->GetNextElement()) {
            $arOrder['FIELDS'] = $ob->GetFields();
            $arOrder['PROPS'] = $ob->GetProperties();
        }
        print '2'."\n";
        if(!empty($_COOKIE['AGBIS_SESSION_ID']))  {
            // сначала добавляем адрес в Агбис для формирования ID адреса
            if($arOrder['PROPS']['DELIVERY_TO_TYPE']['VALUE_XML_ID'] == 'courier') {
                if(empty($arOrder['PROPS']['DELIVERY_TO_AGBIS']['VALUE'])) {
                    $address = $arOrder['PROPS']['DELIVERY_TO_ADDRESS']['VALUE'];
                    $arAgbisAddress = $this->connectAgbis('ActionOverAddressContr={"type":"add","city_id":"2","street": "' .$this->encodeURIComponent(trim($address))  . '","house":"1","housing":"1","room":"1"}&SessionID=' . $_COOKIE['AGBIS_SESSION_ID']);
                    print '<pre>'; print_r($arAgbisAddress); print '</pre>';
                    if ($arAgbisAddress->error == 0) {
                        $zakaz_address_in = $arAgbisAddress->id;
                    } else {
                        print $arAgbisAddress->Msg;
                    }
                } else {
                    $zakaz_address_in = $arOrder['PROPS']['DELIVERY_TO_AGBIS']['VALUE'];
                }
            }
            if($arOrder['PROPS']['DELIVERY_FROM_TYPE']['VALUE_XML_ID'] == 'courier') {
                if(empty($arOrder['PROPS']['DELIVERY_FROM_AGBIS']['VALUE'])) {
                    $address = $arOrder['PROPS']['DELIVERY_FROM_ADDRESS']['VALUE'];
                    $arAgbisAddress = $this->connectAgbis('ActionOverAddressContr={"type":"add","city_id":"2","street": "' .$this->encodeURIComponent(trim($address))  . '","house":"1","housing":"1","room":"1"}&SessionID=' . $_COOKIE['AGBIS_SESSION_ID']);
                    //print '<pre>'; print_r($arAgbisAddress); print '</pre>';
                    if ($arAgbisAddress->error == 0) {
                        $zakaz_address_out = $arAgbisAddress->id;
                    } else {
                        print $arAgbisAddress->Msg;
                    }
                } else {
                    $zakaz_address_out = $arOrder['PROPS']['DELIVERY_FROM_AGBIS']['VALUE'];
                }
            }
            // сброка товаров "services":
            // "services" - услуги, передаются в виде 1|2|2|||2|3|4|||2|2|1.
            // разделитель "|||" разделяет услуги. "|" - внутренний разделитель.
            // 1 цифра - ID  товара, 2 цифра - ID прайс листа, 3 цифра - количество.


            $services = '';

            foreach ($arOrder['PROPS']['PRODUCTS']['VALUE'] as $key => $service) {
                $services .= $service.'|100109|'.$arOrder['PROPS']['PRODUCTS']['DESCRIPTION'][$key].'|||';
            }
            $services = substr($services, '0', '-3');
            //print '<pre>'; print_r($services); print '</pre>';

            $com = $arOrder['FIELDS']['PREVIEW_TEXT'];

            $zakaz_take_away_date = $arOrder['PROPS']['DELIVERY_FROM_DATE']['VALUE'];
            if(!empty($zakaz_take_away_date)) {
                $zakaz_take_away_date = date('d.m.Y', strtotime($zakaz_take_away_date));
            } else {
                $zakaz_take_away_date = date('d.m.Y', time());
            }

            $zakaz_take_away_time = explode('-', $arOrder['PROPS']['DELIVERY_FROM_TIME']['VALUE']);
            if(!empty($zakaz_take_away_time[0])) {
                $zakaz_take_away_time[0] = $zakaz_take_away_time[0] . ':00';
            } else {
                $zakaz_take_away_time[0] = date('H:i:s', time());
            }

            $zakaz_get_date = $arOrder['PROPS']['DELIVERY_TO_DATE']['VALUE'];
            if(!empty($zakaz_get_date)) {
                $zakaz_get_date = date('d.m.Y', strtotime($zakaz_get_date));
            } else {
                $zakaz_get_date = date('d.m.Y', time());
            }

            $zakaz_get_time = explode('-', $arOrder['PROPS']['DELIVERY_TO_TIME']['VALUE']);
            if(!empty($zakaz_get_time[0])) {
                $zakaz_get_time[0] = $zakaz_get_time[0] . ':00';
            } else {
                $zakaz_get_time[0] = date('H:i:s', time());
            }

            $services = $services;

            $arAgbisOrder = $this->connectAgbis(
                'SaveOrder={"zakaz_address_out":"'.$zakaz_address_out.
                    '","zakaz_address_in":"'.$zakaz_address_in.
                    '","com": "' .$this->encodeURIComponent(trim($com))  .
                    '","zakaz_take_away_date":"'.$zakaz_take_away_date.
                    '","zakaz_take_away_time":"'.$zakaz_take_away_time[0].
                    '","zakaz_get_date":"'.$zakaz_get_date.
                    '","zakaz_get_time":"'.$zakaz_get_time[0].
                    '","services":"'.$services.
                '"}&SessionID=' . $_COOKIE['AGBIS_SESSION_ID'], true);

            if($arAgbisOrder->error == 0) {
                // TODO: как сохранить результат отправки?
                print urldecode($arAgbisOrder->Msg);
            }


        } else {
            print '3'."\n";
            // TODO: Ошибка. Только зарегистрированный пользователь может работать с Агбис
        }
    }

    function getUserOrders(){
        $session = $_COOKIE['AGBIS_SESSION_ID'];
        $arOrders = $this->connectAgbis('Orders={"sclad":0}&SessionID='.$session);
        if ($arOrders->error == 0) {
            foreach ($arOrders->orders as $order) {
                //print 'for each $order = '.$order->dor_id."\n"; var_dump($order);
                $arUserOrder[$order->dor_id] = array(
                    'id' => $order->dor_id,
                    'doc_num' => $order->doc_num,
                    'kredit' => $order->kredit,
                    'debet' => $order->debet,
                    'doc_date' => $order->doc_date,
                    'date_out' => $order->date_out,
                    'status' => $order->status,
                    'photo_exist' => $order->photo_exist,
                );
            }
            return $arUserOrder;
        } else {
            return $arOrders->Msg;
        }
    }
    function getUserOrderDetail($id_order){
        $session = $_COOKIE['AGBIS_SESSION_ID'];
        $arOrder = $this->connectAgbis('FullService={"dor_id":'.$id_order.'}&SessionID='.$session);
        if ($arOrder->error == 0) {
            foreach ($arOrder->order_services as $product) {
                //print 'for each $order = '.$product->dor_id."\n"; var_dump($product);
                $arUserOrderProducts[$product->dos_id] = array(
                    'id_product' => $product->tov_id,
                    'name' => trim($this->decodeURIComponent($product->service)),
                    'code' => $product->code,
                    'status_id' => $product->status_id,
                    'status_name' => $product->status_name,
                    'price' => $product->price,
                    'qty' => $product->qty,
                    'discount' => $product->discount,
                );
            }
            return $arUserOrderProducts;
        } else {
            return $arOrder->Msg;
        }
    }
}