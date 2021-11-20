<?php

include "../connectioni.php";
include "functions.php";
check_login();
$id=$_REQUEST['id'];
$p=$_REQUEST['p'];

date_default_timezone_set("Asia/Tehran");
$date=time();

activitylog(3,[
	"db"=>"chap_parameters",
	"id"=>$id,
	"post"=>["featured"=>$p]
]);
mysqli_query($CON,"UPDATE `chap_parameters` SET `featured` = '$p' WHERE `ID` = '$id'");
// if ($db=="events") mysqli_query($CON,"UPDATE `eventphotos` SET `published` = $p WHERE `eID` = $id AND `published` != -2");
// mysqli_query($CON,"UPDATE `updatelog` SET `published` = $p , `date` = '$date' WHERE `rID` = $id AND `db` = '$db'");

// session_start();
// $_SESSION['admin_done']=1;
// if ($b=="uploader") { header("location: uploader.php"); die (); }
// else if ($b2=="") { header("location: index.php?pid=$b"); die (); }
// else header("location: index.php?pid=$b&id=$b2");

?>