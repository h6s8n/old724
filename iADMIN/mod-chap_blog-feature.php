<?php
include "../connectioni.php";
include "functions.php";
check_login();
$id=$_REQUEST['id'];
$p=$_REQUEST['p'];

$query=mysqli_query($CON,"SELECT * FROM `chap_blog` WHERE `wpID` = '$id'");
$row=mysqli_fetch_assoc($query);
if ($row!="")
	mysqli_query($CON,"UPDATE `chap_blog` SET `featured` = '$p' WHERE `ID` = '".$row['ID']."'");
else
	mysqli_query($CON,"INSERT INTO `chap_blog` (`wpID`,`featured`) VALUES ('$id','$p')");
?>