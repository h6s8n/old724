<?php
session_start();
if ($_SESSION['lgntype']=="news_author")
{
	die('دسترسی غیر مجاز');
}
include "../connectioni.php";
include "functions.php";
$db=$_GET['db'];
$valid_dbs=[
	"slide","articles","news","photo_albums","videos","downloads","audios","contactways","poll","linx","about","cats",
	"game_slide",
	"digpaz_slide","digpaz_authors","digpaz_reviews",
	"khaierin_slide","khaierin_ads",
	"abou_news","abou_videos",
	"majma_arkaan","majma_khayer",
	"dj_pro_options","dj_products","dj_blog","dj_team","dj_slide","dj_products_types","dj_products_types_cats",
	"sohrabi_books", "sohrabi_poems", "sohrabi_slide",
	"mehregan_products",
	"kanoon_camps",
	"syntech_products","syntech_events",
	"cha_projects",
	"sani_products",
	"meftah_services","meftah_jobs","meftah_products",
	"oit_news","oit_products",
	"farsnet_isos","farsnet_projects",
	"chap_parameters"
];
if (!in_array($db,$valid_dbs)) die('این ماژول فعلا از سیستم ترتیب دهی پشتیبانی نمیکند');
$id=$_GET['id'];
$query=mysqli_query($CON,"SELECT * FROM `$db` WHERE `published` != -2 AND `ID` = $id");
$row=mysqli_fetch_array($query);
if ($row=="") die('Error reading from database/ Error 1');
$current_sort=$row['sort'];
switch ($_GET['go'])
{
	case "down":
		if ($db!="about" && $db!="cats") $query2=mysqli_query($CON,"SELECT * FROM `$db` WHERE `published` != -2 AND `sort` < $current_sort ORDER BY `sort` DESC");
		else if ($db=="about") $query2=mysqli_query($CON,"SELECT * FROM `about` WHERE `type` = '".$row['type']."' AND `parentID` = '".$row['parentID']."' AND `published` != -2 AND `sort` < $current_sort ORDER BY `sort` DESC");
		else if ($db=="cats") $query2=mysqli_query($CON,"SELECT * FROM `cats` WHERE `db` = '".$row['db']."' AND `parentID` = '".$row['parentID']."' AND `published` != -2 AND `sort` < $current_sort ORDER BY `sort` DESC");
		$row2=mysqli_fetch_array($query2);
		if ($row2=="") die('آیتم انتخابی در پایین لیست قرار دارد!');
		break;
		
	case "up":
		if ($db!="about" && $db!="cats") $query2=mysqli_query($CON,"SELECT * FROM `$db` WHERE `published` != -2 AND `sort` > $current_sort ORDER BY `sort` ASC");
		else if ($db=="about") $query2=mysqli_query($CON,"SELECT * FROM `about` WHERE `type` = '".$row['type']."' AND `parentID` = '".$row['parentID']."' AND `published` != -2 AND `sort` > $current_sort ORDER BY `sort` ASC");
		else if ($db=="cats") $query2=mysqli_query($CON,"SELECT * FROM `cats` WHERE `db` = '".$row['db']."' AND `parentID` = '".$row['parentID']."' AND `published` != -2 AND `sort` > $current_sort ORDER BY `sort` ASC");
		$row2=mysqli_fetch_array($query2);
		if ($row2=="") die('آیتم انتخابی در بالای لیست قرار دارد!');
		break;
		
	default:
		die('Error reading from database/ Error 2');
}
if ($db!="about" && $db!="cats")
{
	activitylog(3,[
		"db"=>$db,
		"id"=>$row['ID'],
		"post"=>["sort"=>$row2['sort']]
	]);
	mysqli_query($CON,"UPDATE `$db` SET `sort` = ".$row2['sort']." WHERE `published` != -2 AND `sort` = $current_sort") or die('Error updating current_sort to new_sort');
	activitylog(3,[
		"db"=>$db,
		"id"=>$row2['ID'],
		"post"=>["sort"=>$current_sort]
	]);
	mysqli_query($CON,"UPDATE `$db` SET `sort` = $current_sort WHERE `published` != -2 AND `ID` = ".$row2['ID']) or die('Error updating sibling to current_sort');

	mysqli_query($CON,"UPDATE `cats_relations` SET `db_sort` = ".$row2['sort']." WHERE `db` = '$db' AND `published` != -2 AND `db_sort` = $current_sort") or die('Error updating current_sort to new_sort for cats relations');
	mysqli_query($CON,"UPDATE `cats_relations` SET `db_sort` = $current_sort WHERE `db` = '$db' AND `published` != -2 AND `db_id` = ".$row2['ID']) or die('Error updating sibling to current_sort for cats relations');

	mysqli_query($CON,"UPDATE `tags` SET `db_sort` = ".$row2['sort']." WHERE `db` = '$db' AND `published` != -2 AND `db_sort` = $current_sort") or die('Error updating current_sort to new_sort for tags');
	mysqli_query($CON,"UPDATE `tags` SET `db_sort` = $current_sort WHERE `db` = '$db' AND `published` != -2 AND `db_id` = ".$row2['ID']) or die('Error updating sibling to current_sort for tags');
	echo ('1');
}
else
{
	activitylog(3,[
		"db"=>$db,
		"id"=>$row['ID'],
		"post"=>["sort"=>$row2['sort']]
	]);
	mysqli_query($CON,"UPDATE `$db` SET `sort` = ".$row2['sort']." WHERE `published` != -2 AND `sort` = $current_sort") or die('4about: Error updating current_sort to new_sort');
	activitylog(3,[
		"db"=>$db,
		"id"=>$row2['ID'],
		"post"=>["sort"=>$current_sort]
	]);
	mysqli_query($CON,"UPDATE `$db` SET `sort` = $current_sort WHERE `published` != -2 AND `ID` = ".$row2['ID']) or die('4about: Error updating sibling to current_sort');
	echo ('2');
}
?>