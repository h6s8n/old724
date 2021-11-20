<?php
session_start();
?>

<div class="chap_header">
	<div class="container">
		<img src="img/logo.png" alt="724 چاپ">
		<a href="index.php">خانه</a>
	</div>
</div>

<section id="chaap" class="section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="section-heading">
					<h2 class="section-title">پیش فاکتور سفارش چاپ کتاب</h2>
					<p>اطلاعات زیر را مرور کرده و جهت نهایی سازی سفارشتان شماره موبایل خود را در انتهای فرم وارد کنید.</p>
				</div>
			</div>
		</div>
		
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
					?>
				</div>
			</div>
			
			<div class="invoice_item">
				<div class="invoice_title">تیراژ:</div>
				<div class="invoice_value">
					<?php
					echo $_SESSION['chap_form']['tirazh'];
					?>
				</div>
			</div>
			
			<div class="invoice_item">
				<div class="invoice_title">تعداد صفحات سیاه و سفید:</div>
				<div class="invoice_value">
					<?php
					echo $_SESSION['chap_form']['pagecount_gray'];
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
			<div class="invoice_item" style="padding-right: '.($lvl*20).'px">
				<div class="invoice_title">'.$catRow['title'].':</div>
				<div class="invoice_value">'.$catChildrenRow['title'].'</div>
			</div>';
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
			<div class="invoice_item" style="padding-right: '.($lvl*20).'px">
				<div class="invoice_title">'.$catRow['title'].':</div>
				<div class="invoice_value">'.$catParametersRow['title'].'</div>
			</div>';
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
			
			<div class="invoice_item invoice_pricing">
				<div class="invoice_title">متوسط هزینه چاپ هر صفحه:</div>
				<div class="invoice_value"><?= $_SESSION['chap_form']['prices']['each_page'] ?> تومان</div>
			</div>
			<div class="invoice_item invoice_pricing">
				<div class="invoice_title">هزینه کل هر کتاب:</div>
				<div class="invoice_value"><?= $_SESSION['chap_form']['prices']['each_book'] ?> تومان</div>
			</div>
			<div class="invoice_item invoice_pricing">
				<div class="invoice_title">جمع کل:</div>
				<div class="invoice_value"><?= $_SESSION['chap_form']['prices']['sum'] ?> تومان</div>
			</div>
			<div class="invoice_item invoice_pricing">
				<div class="invoice_title">هزینه بسته بندی:</div>
				<div class="invoice_value">
					<?php
					if ($packing['ID']!=52)
						echo 'پس از چاپ کتابها (با توجه به بسته بندی انتخابی، حجم هر کتاب و تعداد کتابی که هر بسته در خود جای می‌دهد) به شکل مجزا دریافت خواهد شد.';
					else
						echo number_format(0,1,"/",",").' تومان';
					?>
				</div>
			</div>
		</div>
	</div>
</section>