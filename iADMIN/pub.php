<?php
session_start();
include "../connectioni.php";
include "functions.php";
$db=$_REQUEST['db'];
$id=$_REQUEST['id'];
$p=$_REQUEST['p'];

if ($_SESSION['lgntype']=="news_author")
{
	if ($db!="news") die('دسترسی غیر مجاز');
	$news_query=mysqli_query($CON,"SELECT * FROM `cats_relations` WHERE `db` = 'news' AND `db_id` = ".$id);
	while ($news_row=mysqli_fetch_array($news_query))
	{
		if ($news_row['published']==-2) die('پست مورد نظر یافت نشد');
		if ($news_row['catID']==0)
		{
			$misc_query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 6");
			$misc_row=mysqli_fetch_array($misc_query);
			$cat_to_check=intval($misc_row['body']);
		}
		else $cat_to_check=$news_row['catID'];
		if (!in_array($cat_to_check,$_SESSION['access']['edit'])) die('دسترسی غیر مجاز');
	}
}

date_default_timezone_set("Asia/Tehran");
$date=time();

if ($db=="cats")
{
	$check_query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 6 OR `ID` = 7 OR `ID` = 13 OR `ID` = 16 OR `ID` = 27 OR (`ID` >= 18 && `ID` <= 25)") or die(mysqli_error($CON));
	while ($check_row=mysqli_fetch_array($check_query))
		if ($id==$check_row['body']) die('این دسته به عنوان دسته پیشفرض انتخاب شده است.<br>نمی توانید حالت انتشارش را تغییر دهید یا حذفش کنید.');
	$check_query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `ID` = ".$id) or die(mysqli_error($CON));
	$check_row=mysqli_fetch_array($check_query);
	if ($check_row['locked']=="1") die('دسترسی غیر مجاز');
}

switch ($db)
{
	case "comments": case "basiccomments":
		activitylog(3,[
			"db"=>$db,
			"id"=>$id,
			"post"=>["status"=>$p]
		]);
		mysqli_query($CON,"UPDATE `$db` SET `status` = '$p' WHERE `ID` = '$id'") or die(mysqli_error($CON));
		// echo ('comment case done *** ');
		break;
	
	default:
		activitylog(3,[
			"db"=>$db,
			"id"=>$id,
			"post"=>["published"=>$p]
		]);
		mysqli_query($CON,"UPDATE `$db` SET `published` = '$p' WHERE `ID` = '$id' AND `published` != '-2'") or die(mysqli_error($CON));
		// echo ('default case done *** ');
}
mysqli_query($CON,"UPDATE `cats_relations` SET `published` = '$p' WHERE `db` = '$db' AND `db_id` = $id") or die(mysqli_error($CON));
mysqli_query($CON,"UPDATE `tags` SET `published` = '$p' WHERE `db` = '$db' AND `db_id` = $id") or die(mysqli_error($CON));

// if ($db=="events") mysqli_query($CON,"UPDATE `eventphotos` SET `published` = $p WHERE `eID` = $id AND `published` != -2");
// mysqli_query($CON,"UPDATE `updatelog` SET `published` = $p , `date` = '$date' WHERE `rID` = $id AND `db` = '$db'");

if ($_REQUEST['b']=="uploader") { header("location: uploader.php"); exit; }
else echo('1');
// else if ($b2=="") { header("location: index.php?pid=$b"); die (); }
// else header("location: index.php?pid=$b&id=$b2");

?>