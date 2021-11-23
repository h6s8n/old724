<?php
$returnObj=[
	"status"=>"",
	"prices"=>[
		"each_page"=>0,
		"each_book"=>0,
		"packing"=>0,
		"tarahi_jeld"=>0,
		"services"=>[
			57=>0,
			58=>0,
			59=>0
		],
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

// if ($pagecount_gray==0 && $pagecount_color==0)
// {
	// $returnObj["status"]="حداقل یکی از فیلدهای «تعداد صفحات سیاه و سفید» و «تعداد صفحات رنگی» باید با ارقام لاتین پر شوند.";
	// die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
// }

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

if ($_POST['parameter103']==12)
	$GLOBALS['price_sahafi']=$price_pages_color;
else
	$GLOBALS['price_sahafi']=0;

$sahafi=$_POST['parameter104'];
// $query=mysqli_query($CON,"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`catID` = '104' AND pars.`ID` = '$ghat' AND pars.`published` = 1") or die(mysqli_error($CON));
// $row=mysqli_fetch_assoc($query);
// if ($row=="" && $sahafi!=0)
// {
	// $returnObj["status"]="خطای نامشخص 4";
	// die(json_encode($returnObj,JSON_UNESCAPED_UNICODE));
// }

$GLOBALS['price_packing']=0;
$GLOBALS['CON']=$CON;
$GLOBALS['log']=[];

function sahafiPrice($id=0,$isPacking=false)
{

	if ($id==0) return false;
	do
	{
		if (isset($catRow) && $catRow!="") $id=$catRow['title'];
		array_push($GLOBALS['log'],'making a query for catID #'.$id.' (isPacking: '.$isPacking.') ...');
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
				if ($isPacking)
				{
					$GLOBALS['price_packing']+=$catParametersRow['fee'];
					array_push($GLOBALS['log'],'price_packing: '.$GLOBALS['price_packing']);
				}
				else
				{
					$GLOBALS['price_sahafi']+=$catParametersRow['fee'];
					array_push($GLOBALS['log'],'price_sahafi: '.$GLOBALS['price_sahafi']."<br>");
				}
			}
			else
			{
				array_push($GLOBALS['log'],'fee is not fixed, making a query with parameterID #'.$catParametersRow['ID'].' AND sizeID #'.$_POST['parameter100'].' ...<br>');
				$query=mysqli_query($GLOBALS['CON'],"SELECT * FROM `chap_parameters_bysize` WHERE `parameterID` = '".$catParametersRow['ID']."' AND `sizeID` = '".$_POST['parameter100']."'");
				$row=mysqli_fetch_assoc($query);
				array_push($GLOBALS['log'],'variable fee: '.$row['fee'].'<br>');
				if ($isPacking)
				{
					$GLOBALS['price_packing']+=$row['fee'];
					array_push($GLOBALS['log'],'price_packing: '.$GLOBALS['price_packing']);
				}
				else
				{
					$GLOBALS['price_sahafi']+=$row['fee'];
					array_push($GLOBALS['log'],'price_sahafi: '.$GLOBALS['price_sahafi']."<br>");
				}
			}
		}
	}
}
if ($sahafi!=0) sahafiPrice($sahafi);
sahafiPrice(116,true);

if ($tirazh<=10)
{
	$price_pages=$price_pages*1.3;
	$GLOBALS['price_sahafi']=$GLOBALS['price_sahafi']*1.3;
	$GLOBALS['price_packing']=$GLOBALS['price_packing']*1.3;
}
else if ($tirazh<=100)
{
	$price_pages=$price_pages*1.05;
	$GLOBALS['price_sahafi']=$GLOBALS['price_sahafi']*1.05;
	$GLOBALS['price_packing']=$GLOBALS['price_packing']*1.05;
}
else if ($tirazh>300)
{
	$price_pages=$price_pages*0.95;
	$GLOBALS['price_sahafi']=$GLOBALS['price_sahafi']*0.95;
	$GLOBALS['price_packing']=$GLOBALS['price_packing']*0.95;
}
$returnObj["prices"]["each_page"]=number_format($price_pages/($pagecount_gray+$pagecount_color));
$returnObj["prices"]["each_book"]=number_format($price_pages+$GLOBALS['price_sahafi']);
$returnObj["prices"]["packing"]=number_format($GLOBALS['price_packing']);

if ($_POST['cover_design']!=0)
{
	$query=mysqli_query($CON,"SELECT * FROM `chap_parameters` WHERE `ID` = '".$_POST['cover_design']."'");
	$row=mysqli_fetch_assoc($query);
	$price_tarahi_jeld=$row['fee'];
	$returnObj["prices"]["tarahi_jeld"]=$row['ID'];
}
foreach($_POST['services'] as $id=>$val)
{
	if ($val==1)
	{
		$query=mysqli_query($CON,"SELECT * FROM `chap_parameters_bysize` WHERE `parameterID` = '".$id."' and `sizeID` = '$ghat'");
		$row=mysqli_fetch_assoc($query);
		$priceServices[$id]=$row['fee']*($pagecount_color+$pagecount_gray);
		$returnObj["prices"]["services"][$id]=$row['ID'];
	}
	else
		$priceServices[$id]=0;
}

//request for translate
$translate_request = 0;
if (isset($_POST['translate_request'])) {
    if ($_POST['translate_request']  != 0) {
        $translate_request = 20000*$pagecount_gray;
    }
}

$returnObj["prices"]["sum"]=number_format((($price_pages+$GLOBALS['price_sahafi'])*$tirazh)+$GLOBALS['price_packing']+/*$price_tarahi_jeld+*/$priceServices[57]+$priceServices[58]+$priceServices[59]+$translate_request);

// $returnObj["log"]=$GLOBALS['log'];

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