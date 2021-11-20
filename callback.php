<?php
if (count($_POST)>0)
{
	// print_r($_POST);
	$postJSON=json_encode($_POST,JSON_UNESCAPED_UNICODE);
	include "connectioni.php";

	$query=mysqli_query($CON,"SELECT * FROM `chap_orders_payment` WHERE `orderID` = '".$_POST['order_id']."' AND `paymentID` = '".$_POST['id']."'") or die('error 1: '.mysqli_error($CON));
	$row=mysqli_fetch_assoc($query);
	if ($row!="")
	{
		if ($row['callbackResult']!=NULL)
			$rowCallbackResult=json_decode($row['callbackResult'],true);
		else
			$rowCallbackResult=[];
		array_push($rowCallbackResult,[
			"date"=>time(),
			"result"=>$_POST
		]);
		mysqli_query($CON,"UPDATE `chap_orders_payment` SET `callbackResult` = '".json_encode($rowCallbackResult,JSON_UNESCAPED_UNICODE)."' WHERE `ID` = '".$row['ID']."'") or die('error 2: '.mysqli_error($CON));
	}
	else
	{
		$rowCallbackResult=[
			[
				"date"=>time(),
				"result"=>$_POST
			]
		];
		mysqli_query($CON,"INSERT INTO `chap_orders_payment` (`orderID`,`paymentID`,`date`,`callbackResult`) VALUES ('".$_POST['order_id']."','".$_POST['id']."','".time()."','".json_encode($rowCallbackResult,JSON_UNESCAPED_UNICODE)."')") or die('error 3: '.mysqli_error($CON));
		$row['ID']=mysqli_insert_id($CON);
	}
	
	$params = array(
	  'id' => $_POST['id'],
	  'order_id' => $_POST['order_id']
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
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

	// print_r($resultObj);
	
	if ($row['verifyResult']!="")
	{
		$rowVerifyResult=json_decode($row['verifyResult'],true);
		array_push($rowVerifyResult,[
			"date"=>time(),
			"result"=>$resultObj
		]);
	}
	else $rowVerifyResult=[
		[
			"date"=>time(),
			"result"=>$resultObj
		]
	];
	
	include "sms.php";
	
	$orderQuery=mysqli_query($CON,"SELECT * FROM `chap_orders` WHERE `ID` = '".$_POST['order_id']."'");
	$orderRow=mysqli_fetch_assoc($orderQuery);
	
	if ($resultObj['status']=="100" || $resultObj['status']=="101" || $resultObj['status']=="200")
	{
		sendsms($orderRow['cellphone'],$orderRow['full_name']." عزیز! پرداخت آنلاین شما به مبلغ ".$_POST['amount']." ریال بابت سفارش شماره ".$_POST['order_id']." با موفقیت انجام شده است.\r\n724 چاپ");
		$adminNum="9126753556";
		sendsms($adminNum,"پرداخت آنلاین به مبلغ ".$_POST['amount']." ریال بابت سفارش شماره ".$_POST['order_id']." مربوط به کاربر «".$orderRow['full_name']."» با موفقیت تکمیل شده است.\r\n724 چاپ");
		$adminNum="9199837091";
		sendsms($adminNum,"پرداخت آنلاین به مبلغ ".$_POST['amount']." ریال بابت سفارش شماره ".$_POST['order_id']." مربوط به کاربر «".$orderRow['full_name']."» با موفقیت تکمیل شده است.\r\n724 چاپ");
		
		mysqli_query($CON,"UPDATE `chap_orders_payment` SET `status` = 1 , `verifyResult` = '".json_encode($rowVerifyResult,JSON_UNESCAPED_UNICODE)."' WHERE `ID` = '".$row['ID']."'") or die('error 4: '.mysqli_error($CON));
		header("location: index.php?page=success");
		exit;
		die();
	}
	else
	{
		sendsms($orderRow['cellphone'],$orderRow['full_name']." عزیز! پرداخت شما در 724 چاپ ناموفق بود. در صورتیکه وجهی از حسابتان کسر نشده است میتوانید مجدداً اقدام به ثبت سفارش کنید. در صورتِ کسرِ وجه از حسابتان، مبلغ طی 72 ساعت به حساب شما بازخواهد گشت. اگر پس از 72 ساعت هنوز مبلغ به حسابتان بازنگشته بود با پشتیبانی تماس بگیرید. شماره سفارش شما: ".$_POST['order_id']);
		
		mysqli_query($CON,"UPDATE `chap_orders_payment` SET `verifyResult` = '".json_encode($rowVerifyResult,JSON_UNESCAPED_UNICODE)."' WHERE `ID` = '".$row['ID']."'") or die('error 4: '.mysqli_error($CON));
		session_start();
		$_SESSION['msgt']="خطا!";
		$_SESSION['msgn']="پرداخت ناموفق بود. در صورتیکه وجهی از حسابتان کسر نشده است میتوانید مجدداً اقدام به ثبت سفارش کنید. در صورتِ کسرِ وجه از حسابتان، مبلغ طی 72 ساعت به حساب شما بازخواهد گشت. اگر پس از 72 ساعت هنوز مبلغ به حسابتان بازنگشته بود با پشتیبانی تماس بگیرید. شماره سفارش شما: ".$_POST['order_id'];
		header("location: index.php?page=msg");
		exit;
		die();
	}
}
else
	echo 'خطا در دریافت اطلاعات از درگاه بانک';
?>