<?php
$returnObj=[
	"status"=>"0",
	"msg"=>""
];
function vmob($mob)
{
	if (is_numeric($mob) && strlen(intval($mob))==10 && strlen($mob)==10 && substr($mob,0,1)=="9") return true;
	else return false;
}
date_default_timezone_set("Asia/Tehran");

$waitTime=60;

session_start();
if (isset($_SESSION['chap_mobile']) && $_SESSION['chap_mobile_date']+$waitTime>time())
{
	if (vmob($_POST['input_contact_cell']) && $_SESSION['chap_mobile']!=$_POST['input_contact_cell'])
	{
		$returnObj["msg"]="برای تغییر شماره موبایل باید ".($_SESSION['chap_mobile_date']+$waitTime-time())."ثانیه دیگر صبر کنید.";
		die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
	}
	else if ($_POST['input_contact_vfcd']==$_SESSION['chap_mobile_vfcd'])
	{
		$params = array(
		  'order_id' => $_SESSION['chap_mobile_orderID'],
		  'amount' => str_replace([",","/"],["",""],$_SESSION['chap_form']['prices']['sum'])*10,
		  'name' => $_SESSION['chap_mobile_name'],
		  'phone' => '0'.$_SESSION['chap_mobile'],
		  'callback' => 'https://724chap.com/callback.php'
		);
		
		// $params['amount']=10000;
		// $params['callback']='http://localhost/724chap/callback.php';
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'X-API-KEY: 619ac663-e07f-41e1-a4bf-44e0a91d7ca3' ,
			'X-SANDBOX: 0' 
		));
		$result = curl_exec($ch);
		$resultObj=json_decode($result,true);
		curl_close($ch);

		if (isset($resultObj['id']))
		{
			include "connectioni.php";
			mysqli_query($CON,"INSERT INTO `chap_orders_payment` (`orderID`,`paymentID`,`date`) VALUES ('".$_SESSION['chap_mobile_orderID']."','".$resultObj['id']."','".time()."')");
			$returnObj["status"]="2";
			$returnObj["msg"]=$resultObj['link'];
			die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
		}
		else
		{
			$returnObj["msg"]="خطا در اتصال به درگاه بانک<br>با پشتیبانی تماس بگیرید و جهت کمک به رفع مشکل خطای زیر را اعلام کنید:<br>".$resultObj['error_message'];
			die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
		}
	}
	else
	{
		$returnObj["msg"]="کد وارد شده نامعتبر است. ممکن است از انقضای دو دقیقه ای آن گذشته باشد. لطفاً مجدداً جهت احراز هویت اقدام کنید.";
		die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
	}
}
else
{
	$err="";
	if (!vmob($_POST['input_contact_cell']))
		$err.=" - شماره موبایل را به صورت ده رقمی بدون صفر اول و با ارقام لاتین وارد کنید. مثال: 9121234567";
	if (mb_strlen($_POST['input_contact_name'],'utf-8')<6)
		$err.="<br> - در فیلد نام و نام خانوادگی باید حداقل 6 کاراکتر وارد کنید!";
	if ($err!="")
	{
		$returnObj["msg"]=$err;
		die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
	}
	else
	{
		//generation vfcd and sending sms
		$_SESSION['chap_mobile']=$_POST['input_contact_cell'];
		$_SESSION['chap_mobile_name']=$_POST['input_contact_name'];
		$_SESSION['chap_mobile_date']=time();
		$_SESSION['chap_mobile_vfcd']=rand(100000,999999);
		
		include "connectioni.php";
		mysqli_query($CON,"INSERT INTO `chap_orders` (`full_name`,`cellphone`,`date`,`vfcd`,`invoice_details`) VALUES
		('".mysqli_real_escape_string($CON,$_POST['input_contact_name'])."','".$_POST['input_contact_cell']."','".time()."','".$_SESSION['chap_mobile_vfcd']."','".mysqli_real_escape_string($CON,json_encode($_SESSION['chap_invoice'],JSON_UNESCAPED_UNICODE))."')") or die(mysqli_error($CON));
		$_SESSION['chap_mobile_orderID']=mysqli_insert_id($CON);
		
		include "sms.php";
		sendsms($_SESSION['chap_mobile'],"کد احراز هویت 724 چاپ: ".$_SESSION['chap_mobile_vfcd']);
		
		$returnObj["status"]=1;
		die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
	}
}
?>