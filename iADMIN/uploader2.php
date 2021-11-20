<?php

include "../connectioni.php";
include "functions.php";

$query=mysqli_query($CON,"SELECT `ID` FROM `inline_photos`");
$rows=mysqli_num_rows($query);
$id=$rows+1;

if ($_FILES["photo"]["type"]!="image/jpeg")
die('<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"></head><script type="text/javascript">alert("تصویر انتخاب شده یا فرمت آن جی پی جی نیست"); history.back();</script>');
	
move_uploaded_file($_FILES["photo"]["tmp_name"],"../inline_photos/".$id.".jpg");
makeThumb("../inline_photos/".$id.".jpg","../inline_photos/thumbs/".$id.".jpg",200,200);

mysqli_query($CON,"INSERT INTO `inline_photos` (`ID`) VALUES ($id)");

header("location: uploader.php");
?>