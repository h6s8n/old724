<?php
session_start();

if (count($_SESSION['chap_invoice'])<=5)
{
	header("location: index.php");
	exit;
	die();
}

include '../vendor/autoload.php';
include 'iADMIN/jdatetime.class.php';
$jDate = new jDateTime(true, true, 'Asia/Tehran');

$invoice724chap = new \Mpdf\Mpdf();
// $invoice724chap->WriteHTML('<div style="width: 200px; float: right; text-align: center;"><img src="img/logo-color.png" style="width: 100%">www.724chap.com</div>');
// $invoice724chap->WriteHTML('<h1 style="font-family: iransans; float: left;">پیش فاکتور چاپ کتاب</h1>');
$invoice724chap->SetTitle('Invoice 724chap.com');
$invoice724chap->WriteHTML('
<table style="width: 100%; font-family: iransans;">
	<tr>
		<td style="text-align: center;">
			<h1 style="float: left; color: #265bfb;">پیش فاکتور چاپ کتاب</h1>
			<p>&nbsp;</p>
			<p style="direction: rtl;">تاریخ: '.$jDate->date("j F Y").'</p>
		</td>
		<td style="text-align: center; width: 200px;">
			<img src="img/logo-color.png" style="width: 200px">
			<p style="font-size: 12px; color: #265bfb;">www.724chap.com</p>
		</td>
	</tr>
</table>
<table cellspacing="0" cellpadding="0" style="width: 100%; font-family: iransans; direction: rtl; margin-top: 50px;">
');
$i=0;
foreach ($_SESSION['chap_invoice'] as $i=>$value)
{
	$i++;
	if ($i%2==0)
		$backgroundStr="background-color: whitesmoke;";
	else
		$backgroundStr="";
	
	$invoice724chap->WriteHTML('
	<tr>
		<td dir="rtl" style="padding: 5px 5px 5px 0; width: 230px; font-weight: bold; direction: rtl; '.$backgroundStr.'">'.$value[0].':</td>
		<td style="padding: 5px 0; '.$backgroundStr.'">'.$value[1].'</td>
	</tr>
	');
}
$invoice724chap->WriteHTML('
</table>
<p style="font-family: iransans; font-style: italic; font-size: 12px; direction: rtl;">* اعتبار این پیش فاکتور یک روز می باشد.</p>
');
$invoice724chap->Output();
?>