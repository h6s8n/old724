<?php
function sendsms($tell = 0, $text = '')
{
    include "connectioni.php";

    // developing mode
    // mysqli_query($CON,"INSERT INTO `sent_sms` (`cellphone`,`body`,`date`,`whitesms_result`) VALUES ('$tell','$text','".time()."','developing mode: this data only added here')");
    // mysqli_close($CON);
    // return true;
    // end of developing mode

    $postData = [
        'gateway' => 90003002,
        'gateway' => 90003002,
        'to' => $tell,
        'text' => $text
    ];

    $ch = curl_init('https://api.sabanovin.com/v1/sa3237727159:7lFICg5fwUeOPHYPA0rppHHUTu12mquDmVsd/sms/send.json');
    // curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json','x-sms-ir-secure-token: '.$result['TokenKey']]);
    // curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    $result = curl_exec($ch);
    echo $result;
    curl_close($ch);
    mysqli_query($CON, "INSERT INTO `sent_sms` (`cellphone`,`body`,`date`,`whitesms_result`) VALUES ('$tell','$text','" . time() . "','" . $result . "')");
    // $result = json_decode($result,true);
    return ($result);
}

function sendFarazSms($code, $phone)
{
    include "connectioni.php";

//    $fnum = '90000145';
    $fnum = '5000125475';
    $v1 = $code;
    $tnum = $phone;
//                $api_key = Config::get('services.loutka.apikey');
    $api_key = 'Yrbhlj6x1RXCdLROboRSt0ggIbit2KeZcjG-1LWCWe0=';
    $pid = 'n4kfl901bu';

    $curl = curl_init();


    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://ippanel.com:8080/?apikey=' . $api_key . '&pid=' . $pid . '&fnum=' . $fnum . '&tnum=' . $tnum . '&p1=code&v1=' . $v1,
//                    CURLOPT_URL => 'http://ippanel.com:8080/?apikey=CUX22suh8xzdC6txXrGQqwWjac8b3OHTA-dxem5KA34=&pid=upyd6o83im&fnum=5000125475&tnum=9381314549&p1=code&v1=1234',

        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $result = curl_exec($curl);

    curl_close($curl);
    mysqli_query($CON, "INSERT INTO `sent_sms` (`cellphone`,`body`,`date`,`whitesms_result`) VALUES ('$phone','$code','" . time() . "','" . $result . "')");
    // $result = json_decode($result,true);
    return ($result);


}

function sms_getDeliveryReport($id = 0)
{
    include "connectioni.php";
    $query = mysqli_query($CON, "SELECT * FROM `sent_sms` WHERE `ID` = '$id'");
    $row = mysqli_fetch_assoc($query);
    $details = json_decode($row['whitesms_result'], true);


    $postData = [
        'UserApiKey' => 'cf3debbd4d42fa30f4dfebbd',
        'SecretKey' => 'L0rem!1!1',
        'System' => 'php_rest_v_2_0'
    ];
    $ch = curl_init('https://ws.sms.ir/api/Token');
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    $result = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($result, true);


    $ch = curl_init('https://ws.sms.ir/api/MessageSend?pageId=0&batchKey=' . $details['BatchKey']);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'x-sms-ir-secure-token: ' . $result['TokenKey']]);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $result = curl_exec($ch);
    curl_close($ch);
    mysqli_query($CON, "UPDATE `sent_sms` SET `delivery_report` = '$result' , `report_date` = '" . time() . "' WHERE `ID` = '$id'");
    $result = json_decode($result, true);
    $return = "";
    foreach ($result['Messages'] as $singleItem)
        $return = $return . $singleItem['MobileNo'] . "<br>" . $singleItem['DeliveryStatus'] . "<br><br>";
    $return = mb_substr($return, 0, -8, 'utf-8');
    return ($return);
}

if (isset($_GET['delivery']) && is_numeric($_GET['delivery']))
    echo sms_getDeliveryReport($_GET['delivery']);
// var_dump(sendsms('9363175161','test'));
?>