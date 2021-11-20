<?php
include "../connectioni.php";
include "functions.php";
$db=$_POST['db'];
$default_cat=$_POST['default_cat'];
$check_query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `ID` = $default_cat AND `published` = 1");
$check_row=mysqli_fetch_array($check_query);
session_start();
if ($check_row=="" && $default_cat!=0)
{
	$_SESSION['admin_done']=-1;
	header("location: index.php?pid=18&db=".$db);
	exit;
}
switch ($db)
{
	case "news":
		$db_default_id_in_misc_table=6;
		break;
		
	case "downloads":
		$db_default_id_in_misc_table=22;
		break;
		
	case "abou_news":
		$db_default_id_in_misc_table=7;
		break;
		
	case "sani_products":
		$db_default_id_in_misc_table=13;
		break;
		
	case "meftah_training":
		$db_default_id_in_misc_table=16;
		break;
		
	case "meftah_jobs":
		$db_default_id_in_misc_table=18;
		break;
		
	case "meftah_products":
		$db_default_id_in_misc_table=24;
		break;
		
	case "oit_news":
		$db_default_id_in_misc_table=19;
		break;
		
	case "oit_products":
		$db_default_id_in_misc_table=21;
		break;
		
	case "tickets":
		$db_default_id_in_misc_table=23;
		break;
		
	case "farsnet_projects":
		$db_default_id_in_misc_table=25;
		break;
		
	case "farsnet_products":
		$db_default_id_in_misc_table=27;
		break;
		
	case "chap_parameters":
		$db_default_id_in_misc_table=28;
		break;
		
	default:
		die('Error 69');
}
activitylog(3,[
	"db"=>"misc",
	"id"=>$db_default_id_in_misc_table,
	"post"=>[
		"body"=>$default_cat
	]
]);
mysqli_query($CON,"UPDATE `misc` SET `body` = '$default_cat' WHERE `ID` = ".$db_default_id_in_misc_table) or die(mysqli_error($CON));
$_SESSION['admin_done']=1;
header("location: index.php?pid=18&db=".$db);
?>