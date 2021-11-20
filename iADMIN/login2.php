<?php

session_start();

$us=$_POST['username'];
$ps=$_POST['password'];

include "../connectioni.php";
include "functions.php";
$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 1");
$row=mysqli_fetch_array($query);

date_default_timezone_set("Asia/Tehran");

$query=mysqli_query($CON,"SELECT * FROM `admin_users` WHERE `username` = '".$us."'");
$row=mysqli_fetch_array($query);
if ($row!="" && $row['password']==$ps)
{
	$_SESSION['thecc_admin_user'] = $us;
	setcookie("shn", md5('daS!S! - '.$us), time()+60*60*8, "/; SameSite=strict");
	// die($_SERVER["REQUEST_URI"]);
	
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$rootPath=substr($actual_link,0,strpos($actual_link,"iADMIN"));
	activitylog(4,"panel path: ".$_SERVER['REQUEST_URI']);
	header("location: ".$rootPath.$row['panel_folder']);
}
else
{
	activitylog(6,json_encode([
		"path"=>$_SERVER['REQUEST_URI'],
		"username"=>$us,
		"password"=>$ps
	]));
	die ('<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"></head><script type="text/javascript">alert("نام کاربری یا رمز عبور اشتباه است."); window.location="login.php";</script>');
}

/* else
{
	$new_query=mysqli_query($CON,"SELECT * FROM `news_authors` WHERE `published` = 1 AND `username` = '$us' AND `password` = '$ps'") or die(mysqli_error($CON));
	$new_row=mysqli_fetch_array($new_query);
	if ($new_row!="")
	{
		$_SESSION['loggedin'] = "true";
		$_SESSION['lgntype'] = "news_author";
		$_SESSION['authorID'] = $new_row['ID'];
	}
	else
		die ('<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"></head><script type="text/javascript">alert("نام کاربری یا رمز عبور اشتباه است."); window.location="login.php";</script>');
} */

header("location: index.php");

?>