<?php
$returnObj=[
	"status"=>"",
	"prices"=>[
		"each_page"=>0,
		"each_book"=>0,
		"packing"=>0,
		"sum"=>0
	]
];

session_start();
unset($_SESSION['chap_form']);

$tirazh=$_POST['input_book_tirazh'];
if (!is_numeric($tirazh))
{
	$returnObj["status"]="در فیلد «تیراژ» عدد با ارقام لاتین وارد کنید.";
	die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
}
else if ($tirazh<0)
{
	$returnObj["status"]="مقدار وارد شده در «تیراژ» منفیست!";
	die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
}

$pagecount_gray=$_POST['input_pages_grayscale_count'];
if (!is_numeric($pagecount_gray))
{
	if ($pagecount_gray!="")
	{
		$returnObj["status"]="در فیلد «تعداد صفحات سیاه و سفید» عدد با ارقام لاتین وارد کنید.";
		die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
	}
	else
		$pagecount_gray=0;
}
else if ($pagecount_gray<0)
{
	$returnObj["status"]="«تعداد صفحات سیاه و سفید» منفیست!";
	die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
}

$pagecount_color=$_POST['input_pages_color_count'];
if (!is_numeric($pagecount_color))
{
	if ($pagecount_color!="")
	{
		$returnObj["status"]="در فیلد تعداد «صفحات رنگی» عدد با ارقام لاتین وارد کنید.";
		die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
	}
	else
		$pagecount_color=0;
}
else if ($pagecount_color<0)
{
	$returnObj["status"]="«تعداد صفحات رنگی» منفیست!";
	die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
}

if ($pagecount_gray==0 && $pagecount_color==0)
{
	$returnObj["status"]="حداقل یکی از فیلدهای «تعداد صفحات سیاه و سفید» و «تعداد صفحات رنگی» باید با ارقام لاتین پر شوند.";
	die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
}

include "connectioni.php";

$pagematerial_gray=$_POST['parameter101'];
$query=mysqli_query($CON,"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`catID` = '101' AND pars.`ID` = '$pagematerial_gray' AND pars.`published` = 1");
$row=mysqli_fetch_assoc($query);
if ($row=="")
{
	$returnObj["status"]="خطای نامشخص 1";
	die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
}

$pagematerial_color=$_POST['parameter102'];
$query=mysqli_query($CON,"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`catID` = '102' AND pars.`ID` = '$pagematerial_color' AND pars.`published` = 1");
$row=mysqli_fetch_assoc($query);
if ($row=="")
{
	$returnObj["status"]="خطای نامشخص 2";
	die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
}

$ghat=$_POST['parameter100'];
$query=mysqli_query($CON,"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`catID` = '100' AND pars.`ID` = '$ghat' AND pars.`published` = 1");
$row=mysqli_fetch_assoc($query);
if ($row=="")
{
	$returnObj["status"]="خطای نامشخص 3";
	die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
}

$query=mysqli_query($CON,"SELECT * FROM `chap_parameters_bysize` WHERE `sizeID` = '$ghat' AND `parameterID` = '$pagematerial_gray'");
$row=mysqli_fetch_assoc($query);
$price_pages_gray=floatval($row['fee'])*($pagecount_gray/2);

$query=mysqli_query($CON,"SELECT * FROM `chap_parameters_bysize` WHERE `sizeID` = '$ghat' AND `parameterID` = '$pagematerial_color'");
$row=mysqli_fetch_assoc($query);
$price_pages_color=floatval($row['fee'])*($pagecount_color/2);
// $returnObj["status"]=$pagecount_color;

$price_pages=$price_pages_gray+$price_pages_color;
$returnObj["prices"]["each_page"]=number_format($price_pages/($pagecount_gray+$pagecount_color),1,"/",",");

$sahafi=$_POST['parameter104'];
// $query=mysqli_query($CON,"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`catID` = '104' AND pars.`ID` = '$ghat' AND pars.`published` = 1") or die(mysqli_error($CON));
// $row=mysqli_fetch_assoc($query);
// if ($row=="" && $sahafi!=0)
// {
	// $returnObj["status"]="خطای نامشخص 4";
	// die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
// }
$GLOBALS['price_sahafi']=0;
$GLOBALS['CON']=$CON;
$GLOBALS['log']=[];
function sahafiPrice($id=0)
{
	if ($id==0) return false;
	do
	{
		if ($catRow!="") $id=$catRow['title'];
		$catQuery=mysqli_query($GLOBALS['CON'],"SELECT * FROM `cats` WHERE `ID` = '$id' AND `published` = 1");
		$catRow=mysqli_fetch_assoc($catQuery);
		array_push($GLOBALS['log'],'catRow #'.$catRow['ID'].' fetched: '.$catRow['title'].'<br>');
	}
	while (is_numeric($catRow['title']));
	
	$catChildrenQuery=mysqli_query($GLOBALS['CON'],"SELECT * FROM `cats` WHERE `parentID` = '".$catRow['ID']."' AND `published` = 1");
	$catChildrenCount=mysqli_num_rows($catChildrenQuery);
	$catParametersQuery=mysqli_query($GLOBALS['CON'],"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`catID` = '$id' AND pars.`ID` = '".$_POST['parameter'.$id]."' AND pars.`published` = 1");
	$catParametersRow=mysqli_fetch_assoc($catParametersQuery);
	if ($catRow['featured']==1)
	{
		array_push($GLOBALS['log'],'catRow is featured.<br>');
		if ($catChildrenCount>0)
		{
			array_push($GLOBALS['log'],'calling sahafiPrice('.$_POST['parameter'.$id].')...<br>');
			sahafiPrice($_POST['parameter'.$id]);
		}
	}
	else
	{
		if ($catChildrenCount>0)
		{
			array_push($GLOBALS['log'],'catRow is not featured but has children. calling each child...<br>');
			while ($catChildRow=mysqli_fetch_assoc($catChildrenQuery))
			{
				array_push($GLOBALS['log'],'calling sahafiPrice('.$catChildRow['ID'].')...<br>');
				sahafiPrice($catChildRow['ID']);
			}
		}
		else
		{
			if ($catParametersRow['fee_bysize']==0)
			{
				array_push($GLOBALS['log'],'fee is fixed: '.$catParametersRow['fee'].'<br>');
				$GLOBALS['price_sahafi']+=$catParametersRow['fee'];
				array_push($GLOBALS['log'],'price_sahafi: '.$GLOBALS['price_sahafi']."<br>");
			}
			else
			{
				array_push($GLOBALS['log'],'fee is not fixed, making a query with parameterID #'.$catParametersRow['ID'].' AND sizeID #'.$_POST['parameter100'].' ...<br>');
				$query=mysqli_query($GLOBALS['CON'],"SELECT * FROM `chap_parameters_bysize` WHERE `parameterID` = '".$catParametersRow['ID']."' AND `sizeID` = '".$_POST['parameter100']."'");
				$row=mysqli_fetch_assoc($query);
				array_push($GLOBALS['log'],'variable fee: '.$row['fee'].'<br>');
				$GLOBALS['price_sahafi']+=$row['fee'];
				array_push($GLOBALS['log'],'price_sahafi: '.$GLOBALS['price_sahafi']."<br>");
			}
		}
	}
}
if ($sahafi!=0) sahafiPrice($sahafi);
$returnObj["prices"]["each_book"]=number_format($price_pages+$GLOBALS['price_sahafi'],1,"/",",");
$returnObj["prices"]["sum"]=number_format(($price_pages+$GLOBALS['price_sahafi'])*$tirazh,1,"/",",");
$returnObj["log"]=$GLOBALS['log'];

$_SESSION['chap_form']=[
	"tirazh"=>$tirazh,
	"pagecount_gray"=>$pagecount_gray,
	"pagecount_color"=>$pagecount_color,
	"pagematerial_gray"=>$pagematerial_gray,
	"pagematerial_color"=>$pagematerial_color,
	"ghat"=>$ghat,
	"sahafi"=>$sahafi,
	"post"=>$_POST,
	"prices"=>$returnObj["prices"]
];

mysqli_close($CON);
echo json_encode($returnObj,JSON_UNESCAPED_UNICODE);
?>