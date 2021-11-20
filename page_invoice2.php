<?php
// session_start();

// $_SESSION['chap_mobile_orderID']=2266;

unset($_SESSION['chap_form'],$_SESSION['chap_invoice'],$_SESSION['chap_mobile'],$_SESSION['chap_mobile_name'],$_SESSION['chap_mobile_date'],$_SESSION['chap_mobile_vfcd']);
$query=mysqli_query($CON,"SELECT * FROM `chap_orders_payment` as pays INNER JOIN `chap_orders` as ords ON ords.`ID` = pays.`orderID` WHERE ords.`ID` = '".$_SESSION['chap_mobile_orderID']."' AND pays.`status` = 1 ORDER BY pays.`date` DESC");
$row=mysqli_fetch_assoc($query);
if ($row=="")
{
	header("location: https://724chap.com");
	exit;
	die();
}
?>

<div class="chap_header">
	<div class="container">
		<a href="https://724chap.com"><img src="img/logo.png" alt="724 چاپ"></a>
		<a href="https://724chap.com">خانه</a>
	</div>
</div>

<section id="chaap" class="section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="section-heading">
					<h2 class="section-title">با تشکر از سفارش شما!</h2>
					<p>
						<img src="img/paid.jpg"><br>
						با تشکر از شما، پرداخت شما موفقیت آمیز بود. همکاران ما به زودی با شما تماس خواهند گرفت.
					</p>
					<div class="row" style="justify-content: center; margin-top: 10px; margin-bottom: 30px;">
						<a href="print2.php"><button class="btn btn-primary">چاپ رسید پرداخت</button></a>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
		
		<p class="f-title">جزئیات سفارش</p>
		<div class="invoice_items">
			<div class="invoice_item">
				<div class="invoice_title">شماره پیگیری سفارش:</div>
				<div class="invoice_value"><?= $row['ID'] ?></div>
			</div>
			<div class="invoice_item">
				<div class="invoice_title">نام و نام خانوادگی:</div>
				<div class="invoice_value"><?= $row['full_name'] ?></div>
			</div>
			<div class="invoice_item">
				<div class="invoice_title">شماره موبایل:</div>
				<div class="invoice_value">0<?= $row['cellphone'] ?></div>
			</div>
			<?php
			$invoiceDetails=json_decode($row['invoice_details'],true);
			foreach($invoiceDetails as $i=>$value)
			{
			?>
			<div class="invoice_item">
				<div class="invoice_title"><?= $value[0] ?></div>
				<div class="invoice_value"><?= $value[1] ?></div>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</section>