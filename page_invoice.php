<?php

// session_start();
if (!isset($_SESSION['chap_form']))
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
					<h2 class="section-title">پیش فاکتور سفارش چاپ کتاب</h2>
					<p>اطلاعات زیر را مرور کرده و جهت نهایی سازی سفارشتان، پس از آپلود فایل کتاب، شماره موبایل خود را در انتهای فرم وارد کنید.</p>
				</div>
			</div>
		</div>

		<p class="f-title">پیش فاکتور</p>
		<div class="invoice_items">
			<div class="invoice_item">
				<div class="invoice_title">قطع کتاب:</div>
				<div class="invoice_value">
					<?php
					$query=mysqli_query($CON,"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`catID` = '100' AND pars.`ID` = '".$_SESSION['chap_form']['ghat']."' AND pars.`published` = 1");
					$row=mysqli_fetch_assoc($query);
					if ($row=="")
						echo "خطای نامشخص 3";
					echo $row['title'];
					$_SESSION['chap_invoice']=[];
					array_push($_SESSION['chap_invoice'],['قطع کتاب',$row['title']]);
					?>
				</div>
			</div>
			
			<div class="invoice_item">
				<div class="invoice_title">تیراژ:</div>
				<div class="invoice_value">
					<?php
					echo $_SESSION['chap_form']['tirazh'];
					array_push($_SESSION['chap_invoice'],['تیراژ',$_SESSION['chap_form']['tirazh']]);
					?>
				</div>
			</div>
			
			<div class="invoice_item">
				<div class="invoice_title">تعداد صفحات سیاه و سفید:</div>
				<div class="invoice_value">
					<?php
					echo $_SESSION['chap_form']['pagecount_gray'];
					array_push($_SESSION['chap_invoice'],['تعداد صفحات سیاه و سفید',$_SESSION['chap_form']['pagecount_gray']]);
					?>
				</div>
			</div>
			
			<?php
			if ($_SESSION['chap_form']['pagecount_gray']>0)
			{
			?>
			<div class="invoice_item">
				<div class="invoice_title">جنس صفحات سیاه و سفید:</div>
				<div class="invoice_value">
					<?php
					$query=mysqli_query($CON,"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`catID` = '101' AND pars.`ID` = '".$_SESSION['chap_form']['pagematerial_gray']."' AND pars.`published` = 1");
					$row=mysqli_fetch_assoc($query);
					if ($row=="")
						echo "خطای نامشخص 3";
					echo $row['title'];
					array_push($_SESSION['chap_invoice'],['جنس صفحات سیاه و سفید',$row['title']]);
					?>
				</div>
			</div>
			<?php
			}
			?>
			
			<div class="invoice_item">
				<div class="invoice_title">تعداد صفحات رنگی:</div>
				<div class="invoice_value">
					<?php
					echo $_SESSION['chap_form']['pagecount_color'];
					array_push($_SESSION['chap_invoice'],['تعداد صفحات رنگی',$_SESSION['chap_form']['pagecount_color']]);
					?>
				</div>
			</div>
			
			<?php
			if ($_SESSION['chap_form']['pagecount_color']>0)
			{
			?>
			<div class="invoice_item">
				<div class="invoice_title">جنس صفحات رنگی:</div>
				<div class="invoice_value">
					<?php
					$query=mysqli_query($CON,"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`catID` = '102' AND pars.`ID` = '".$_SESSION['chap_form']['pagematerial_color']."' AND pars.`published` = 1");
					$row=mysqli_fetch_assoc($query);
					if ($row=="")
						echo "خطای نامشخص 3";
					echo $row['title'];
					array_push($_SESSION['chap_invoice'],['جنس صفحات رنگی',$row['title']]);
					?>
				</div>
			</div>
			<div class="invoice_item">
				<div class="invoice_title">بازه صفحات رنگی:</div>
				<div class="invoice_value">
					<?php
					$query=mysqli_query($CON,"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`catID` = '103' AND pars.`ID` = '".$_SESSION['chap_form']['post']['parameter103']."' AND pars.`published` = 1");
					$row=mysqli_fetch_assoc($query);
					if ($row=="")
						echo "خطای نامشخص 3";
					echo $row['title'];
					array_push($_SESSION['chap_invoice'],['بازه صفحات رنگی',$row['title']]);
					?>
				</div>
			</div>
			<?php
			}
			?>
		
<?php
$GLOBALS['log']=[];
function sahafiPrice($id=0,$lvl=0)
{
	session_start();
	if ($id==0) return false;
	do
	{
		if ($catRow!="") $id=$catRow['title'];
		$catQuery=mysqli_query($GLOBALS['CON'],"SELECT * FROM `cats` WHERE `ID` = '$id' AND `published` = 1");
		$catRow=mysqli_fetch_assoc($catQuery);
		array_push($GLOBALS['log'],'catRow #'.$catRow['ID'].' fetched: '.$catRow['title'].'<br>');
	}
	while (is_numeric($catRow['title']));
	
	$catChildrenQuery=mysqli_query($GLOBALS['CON'],"SELECT * FROM `cats` WHERE `parentID` = '".$catRow['ID']."' AND `published` = 1 ORDER BY `sort` DESC");
	$catChildrenCount=mysqli_num_rows($catChildrenQuery);
	
	$catChildrenQuery2=mysqli_query($GLOBALS['CON'],"SELECT * FROM `cats` WHERE `parentID` = '".$catRow['ID']."' AND `published` = 1 AND `ID` = '".$_SESSION['chap_form']['post']['parameter'.$id]."'");
	$catChildrenRow=mysqli_fetch_assoc($catChildrenQuery2);
	
	$catParametersQuery=mysqli_query($GLOBALS['CON'],"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`catID` = '$id' AND pars.`ID` = '".$_SESSION['chap_form']['post']['parameter'.$id]."' AND pars.`published` = 1");
	$catParametersRow=mysqli_fetch_assoc($catParametersQuery);
	if ($catRow['featured']==1)
	{
		array_push($GLOBALS['log'],'catRow is featured.<br>');
		if ($catChildrenCount>0)
		{
			if (!isset($catChildrenRow['title']))
				$catChildrenRow['title']="ندارد/ انتخاب نشده";
			echo '
			<div class="invoice_item" style="padding-right: '.(($lvl*20)+5).'px">
				<div class="invoice_title">'.$catRow['title'].':</div>
				<div class="invoice_value">'.$catChildrenRow['title'].'</div>
			</div>';
			array_push($_SESSION['chap_invoice'],[$catRow['title'],$catChildrenRow['title']]);
			array_push($GLOBALS['log'],'calling sahafiPrice('.$_SESSION['chap_form']['post']['parameter'.$id].')...<br>');
			sahafiPrice($_SESSION['chap_form']['post']['parameter'.$id],$lvl+1);
		}
	}
	else
	{
		if ($catChildrenCount>0)
		{
			// echo '
			// <div class="invoice_item">
				// <div class="invoice_title">'.$catRow['title'].':</div>
				// <div class="invoice_value">'.$catParametersRow['title'].'</div>
			// </div>';
			array_push($GLOBALS['log'],'catRow is not featured but has children. calling each child...<br>');
			while ($catChildRow=mysqli_fetch_assoc($catChildrenQuery))
			{
				array_push($GLOBALS['log'],'calling sahafiPrice('.$catChildRow['ID'].')...<br>');
				sahafiPrice($catChildRow['ID'],$lvl+1);
			}
		}
		else
		{
			echo '
			<div class="invoice_item" style="padding-right: '.(($lvl*20)+5).'px">
				<div class="invoice_title">'.$catRow['title'].':</div>
				<div class="invoice_value">'.$catParametersRow['title'].'</div>
			</div>';
			array_push($_SESSION['chap_invoice'],[$catRow['title'],$catParametersRow['title']]);
			if ($catParametersRow['fee_bysize']==0)
			{
				array_push($GLOBALS['log'],'fee is fixed: '.$catParametersRow['fee'].'<br>');
				// $GLOBALS['price_sahafi']+=$catParametersRow['fee'];
				array_push($GLOBALS['log'],'price_sahafi: '.$GLOBALS['price_sahafi']."<br>");
			}
			else
			{
				array_push($GLOBALS['log'],'fee is not fixed, making a query with parameterID #'.$catParametersRow['ID'].' AND sizeID #'.$_SESSION['chap_form']['post']['parameter100'].' ...<br>');
				$query=mysqli_query($GLOBALS['CON'],"SELECT * FROM `chap_parameters_bysize` WHERE `parameterID` = '".$catParametersRow['ID']."' AND `sizeID` = '".$_SESSION['chap_form']['post']['parameter100']."'");
				$row=mysqli_fetch_assoc($query);
				array_push($GLOBALS['log'],'variable fee: '.$row['fee'].'<br>');
				// $GLOBALS['price_sahafi']+=$row['fee'];
				array_push($GLOBALS['log'],'price_sahafi: '.$GLOBALS['price_sahafi']."<br>");
			}
			return $catParametersRow;
		}
	}
}
sahafiPrice(104);
$packing=sahafiPrice(116);
// print_r($GLOBALS['log']);
?>
			<div class="invoice_item">&nbsp;</div>
			
			<?php
			if ($_SESSION['chap_form']['post']['free_sample']==1)
			{
			?>
			<div class="invoice_item"><div class="invoice_value">درخواست یک نمونه کتاب چاپ شده با مشخصات بالا (رایگان) قبل از چاپ انبوه</div></div>
			<?php
				array_push($_SESSION['chap_invoice'],["نمونه رایگان","درخواست یک نمونه کتاب چاپ شده با مشخصات بالا (رایگان) قبل از چاپ انبوه"]);
			}
			?>
			<?php
			if ($_SESSION['chap_form']['post']['free_mojavez']==1)
			{
			?>
			<div class="invoice_item"><div class="invoice_value">درخواست اخذ مجوز (رایگان)</div></div>
			<?php
				array_push($_SESSION['chap_invoice'],["مجوز رایگان","درخواست اخذ مجوز (رایگان)"]);
			}
			if ($_SESSION['chap_form']['post']['free_mojavez']==1 || $_SESSION['chap_form']['post']['free_sample']==1)
			{
			?>
			
			<?php
			}
			?>
			<!-- Start -->
			<?php
			
			if ($_SESSION['chap_form']['prices']['tarahi_jeld']!=0)
			{
				$query=mysqli_query($CON,"SELECT * FROM `chap_parameters` WHERE `ID` = '".$_SESSION['chap_form']['prices']['tarahi_jeld']."'");
				$row=mysqli_fetch_assoc($query);
			?>
			<div class="invoice_item">
				<div class="invoice_title">طراحی جلد:</div>
				<div class="invoice_value"><?= $row['title'].": ".number_format($row['fee'])." تومان" ?></div>
			</div>
			<?php
				array_push($_SESSION['chap_invoice'],["طراحی جلد",$row['title'].": ".number_format($row['fee'])." تومان"]);
			}
			
			foreach($_SESSION['chap_form']['prices']['services'] as $id=>$val)
			{
				if ($val!=0)
				{
					$query=mysqli_query($CON,"SELECT * FROM `chap_parameters` WHERE `ID` = $id");
					$row=mysqli_fetch_assoc($query);
					$query2=mysqli_query($CON,"SELECT * FROM `chap_parameters_bysize` WHERE `ID` = $val");
					$row2=mysqli_fetch_assoc($query2);
			?>
				<div class="invoice_item">
					<div class="invoice_title"><?= $row['title'].": ".number_format($row2['fee'])." تومان" ?></div>
					<div class="invoice_value"><?= number_format($row2['fee']*($_SESSION['chap_form']['pagecount_gray']+$_SESSION['chap_form']['pagecount_color']))." تومان" ?></div>
				</div>
			<?php
					array_push($_SESSION['chap_invoice'],[
						$row['title'].": ".number_format($row2['fee'])." تومان",
						number_format($row2['fee']*($_SESSION['chap_form']['pagecount_gray']+$_SESSION['chap_form']['pagecount_color']))." تومان"
					]);
				}
			}
			?>
			<!-- End -->
			<div class="invoice_item">&nbsp;</div>
			<div class="invoice_item invoice_pricing">
				<div class="invoice_title">هزینه کل هر کتاب:</div>
				<div class="invoice_value"><?= $_SESSION['chap_form']['prices']['each_book']?> تومان</div>
			</div>
			<div class="invoice_item invoice_pricing">
				<div class="invoice_title">هزینه بسته بندی:</div>
				<div class="invoice_value">
					<?php
					echo $_SESSION['chap_form']['prices']['packing']." تومان";
					
					array_push($_SESSION['chap_invoice'],['متوسط هزینه چاپ هر صفحه',$_SESSION['chap_form']['prices']['each_page'].' تومان']);
					array_push($_SESSION['chap_invoice'],['هزینه کل هر کتاب',$_SESSION['chap_form']['prices']['each_book'].' تومان']);
					array_push($_SESSION['chap_invoice'],['هزینه بسته بندی',$_SESSION['chap_form']['prices']['packing'].' تومان']);
					array_push($_SESSION['chap_invoice'],['جمع کل',$_SESSION['chap_form']['prices']['sum'].' تومان']);
					
					$waitTime=60;
					?>
				</div>
			</div>
			<div class="invoice_item invoice_pricing">
				<div class="invoice_title">جمع کل:</div>
				<div class="invoice_value"><?= $_SESSION['chap_form']['prices']['sum'] ?> تومان</div>
			</div>
		</div>
		
		<div class="row" style="justify-content: center; margin-top: 30px; margin-bottom: 50px;">
			<a href="print.php"><button class="btn btn-primary">چاپ پیش فاکتور</button></a>
		</div>
		
		<iframe name="upload_target" id="upload_target_iframe" onload="upload_finish()"></iframe>
		<form id="upload_form" action="javascript:upload_start()" method="POST" enctype="multipart/form-data">
			<p class="f-title">بارگذاری فایلها</p>
			<div class="row">
				<div class="col-lg-6">
					<div class="contact-form-group">
						<label for="input_uploaders_bookname">نام کتاب</label>
						<input type="text" value="" id="input_uploaders_bookname" name="bookname" class="form-input" placeholder="نام کتاب را وارد کنید..." required>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="contact-form-group">
						<label for="input_uploaders_clientname">نام و نام خانوادگی سفارش دهنده چاپ کتاب</label>
						<input type="text" value="" id="input_uploaders_clientname" onblur="if ($('#input_contact_name')[0].disabled==false) $('#input_contact_name').val(this.value);" name="client" class="form-input" placeholder="نام کامل خود را وارد کنید..." required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="chap_file_word" id="input_file_Word" onchange="checkfile('Word');">
						<label class="custom-file-label" for="input_file_Word">Word فایل</label>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="chap_file_pdf" id="input_file_PDF" onchange="checkfile('PDF');">
						<label class="custom-file-label" for="input_file_PDF">PDF فایل</label>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="chap_file_zip" id="input_file_ZIP" onchange="checkfile('ZIP');">
						<label class="custom-file-label" for="input_file_ZIP">ZIP فایل</label>
					</div>
				</div>
			</div>
			<div class="progress_parent">
				<div class="progress_bar"></div>
				<div class="progress_percent">0%</div>
			</div>
			<div class="listofuploads">
				<div class="item">فایلهای آپلود شده:</div>
			</div>
			<div style="text-align: center; margin-bottom: 50px; margin-top: 20px;">
				<p style="margin-bottom: 0.5rem">حداقل یکی از فرمتهای Word یا PDF یا ZIP باید بارگذاری شوند.</p>
				<button id="upload_form_submit" class="btn btn-primary" type="submit">بارگذاری</button>
			</div>
		</form>
		
		<form id="mobile_form" action="javascript:mobile_submit()">
			<p class="f-title">ثبت نهایی و پرداخت</p>
			<div class="row">
				<div class="col-lg-6">
					<div class="contact-form-group">
						<input type="text" <?php if ($_SESSION['chap_mobile_date']+$waitTime>time()) echo 'value="'.$_SESSION['chap_mobile_name'].'" disabled'; ?> class="form-input" id="input_contact_name" name="input_contact_name" placeholder="نام سفارش دهنده">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="contact-form-group">
						<input id="input_contact_cell" <?php if ($_SESSION['chap_mobile_date']+$waitTime>time()) echo 'value="'.$_SESSION['chap_mobile'].'" disabled'; ?> name="input_contact_cell" class="form-input" placeholder="شماره موبایل بدون صفر اول">
					</div>
				</div>
			</div>
			<div class="row" id="input_contact_vfcd_parent" <?php if ($_SESSION['chap_mobile_date']+$waitTime>time()) echo 'style="display: block;"'; ?>>
				<div class="col-lg-12">
					<div class="contact-form-group">
						<input type="text" class="form-input" id="input_contact_vfcd" name="input_contact_vfcd" placeholder="کد 6 رقمی احراز هویت">
					</div>
				</div>
			</div>
			
			<div id="mobile_submit_parent" style="text-align: center; margin-bottom: 20px;">
				<button class="btn btn-primary" type="submit" id="input_contact_mobile_submitbtn"><?php if ($_SESSION['chap_mobile_date']+$waitTime<=time()) echo 'دریافت پیامک احراز هویت'; else echo 'بررسی کد احراز هویت و پرداخت'; ?></button>
				<div id="mobile_result">&nbsp;</div>
			</div>
			<?php
			// print_r($_SESSION['chap_invoice']);
			if ($_SESSION['chap_mobile_date']+$waitTime>time())
			{
			?>
			<script>
			mobileTimer=<?= $_SESSION['chap_mobile_date']+$waitTime-time() ?>;
			mobileTimerIntval=setInterval(function(){
				if (mobileTimer>=1)
				{
					if (!errorShown)
						$("#mobile_result").html("کد 6 رقمی را در فیلد بالا وارد کنید. در صورتیکه کد صحیح باشد به درگاه بانک منتقل خواهید شد.<br>برای دریافت مجدد پیامک یا تغییر شماره موبایل باید "+mobileTimer+" ثانیه صبر کنید.");
					mobileTimer--;
				}
				else
				{
					$("#input_contact_name,#input_contact_cell").removeAttr("disabled");
					$("#input_contact_vfcd_parent").fadeOut();
					$("#mobile_result").text("کد احراز هویت منقضی شده است. مجدداً اقدام نمائید.");
					$("#input_contact_mobile_submitbtn").text("دریافت پیامک احراز هویت");
					clearInterval(mobileTimerIntval);
				}
			},1000);
			</script>
			<?php
			}
			else
			{
			?>
			<script>mobileTimer=<?= $waitTime ?>;</script>
			<?php
			}
			?>
		</form>
	</div>
</section>