<?php
include "../connectioni.php";
include "functions.php";
check_login();
$db=$_GET['db'];
$valid_dbs=[
	"slide","articles","news","photo_albums","videos","audios","contactways","contactsocials","poll","linx",
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
	"farsnet_isos","farsnet_projects",
	"chap_parameters"
];
if (!in_array($db,$valid_dbs)) die('این ماژول فعلا از سیستم ترتیب دهی جدید پشتیبانی نمیکند');

$id=$_GET['id'];
$query=mysqli_query($CON,"SELECT * FROM `$db` WHERE `published` != -2 AND `ID` = $id");
$row=mysqli_fetch_array($query);
if ($row=="") die('Error reading from database/ Error 1');
$current_sort=$row['sort'];

$go=$_GET['go'];
$query=mysqli_query($CON,"SELECT * FROM `$db` WHERE `published` != -2 AND `ID` = $go");
$row_dest=mysqli_fetch_array($query);
if ($row_dest=="") die('Error reading from database/ Error 1.1');
$dest_sort=$row_dest['sort'];

if ($dest_sort>$current_sort)
{
	if ($dest_sort == $current_sort + 1)
		die('جابجایی صورت نگرفت، سطر مورد نظر در همان جاییست که میخواهید!');
	$dest_sort--;
	mysqli_query($CON,"UPDATE `$db` SET `sort` = `sort` - 1 WHERE `sort` > $current_sort AND `sort` <= $dest_sort") or die('error 2: '.mysqli_error($CON));
	mysqli_query($CON,"UPDATE `tags` SET `db_sort` = `db_sort` - 1 WHERE `db` = '$db' AND `db_sort` > $current_sort AND `db_sort` <= $dest_sort") or die('error 3: '.mysqli_error($CON));
	mysqli_query($CON,"UPDATE `cats_relations` SET `db_sort` = `db_sort` - 1 WHERE `db` = '$db' AND `db_sort` > $current_sort AND `db_sort` <= $dest_sort") or die('error 10: '.mysqli_error($CON));
	
	mysqli_query($CON,"UPDATE `$db` SET `sort` = '$dest_sort' WHERE `ID` = '$id'") or die('error 4: '.mysqli_error($CON));
	mysqli_query($CON,"UPDATE `tags` SET `db_sort` = '$dest_sort' WHERE `db_id` = '$id'") or die('error 5: '.mysqli_error($CON));
	mysqli_query($CON,"UPDATE `cats_relations` SET `db_sort` = '$dest_sort' WHERE `db_id` = '$id'") or die('error 11: '.mysqli_error($CON));
}
else if ($dest_sort<$current_sort)
{
	mysqli_query($CON,"UPDATE `$db` SET `sort` = `sort` +1 WHERE `sort` < $current_sort AND `sort` >= $dest_sort") or die('error 6: '.mysqli_error($CON));
	mysqli_query($CON,"UPDATE `tags` SET `db_sort` = `db_sort` + 1 WHERE `db` = '$db' AND `db_sort` < $current_sort AND `db_sort` >= $dest_sort") or die('error 7: '.mysqli_error($CON));
	mysqli_query($CON,"UPDATE `cats_relations` SET `db_sort` = `db_sort` + 1 WHERE `db` = '$db' AND `db_sort` < $current_sort AND `db_sort` >= $dest_sort") or die('error 12: '.mysqli_error($CON));
	
	mysqli_query($CON,"UPDATE `$db` SET `sort` = '$dest_sort' WHERE `ID` = '$id'") or die('error 8: '.mysqli_error($CON));
	mysqli_query($CON,"UPDATE `tags` SET `db_sort` = '$dest_sort' WHERE `db_id` = '$id'") or die('error 9: '.mysqli_error($CON));
	mysqli_query($CON,"UPDATE `cats_relations` SET `db_sort` = '$dest_sort' WHERE `db_id` = '$id'") or die('error 13: '.mysqli_error($CON));
}
else
	die('جابجایی صورت نگرفت، مبدا و مقصد نمیتوانند یک سطر باشند!');

echo ('1');
?>