<?php
session_start();
if ($_SESSION['loggedin'] != "true") header("location: login.php");

include "../connectioni.php";
$pid=$_REQUEST['pid'];

include "jdatetime.class.php";
date_default_timezone_set("Asia/Tehran");
$jDate = new jDateTime(true, true, 'Asia/Tehran');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Photo Uploader</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<style type="text/css">
html,body
{
	height: auto;
}
#daBTN
{
	font-family: tahoma;
	direction: rtl;
	font-size: 8pt;
	height: 24px;
}
</style>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function del(id)
{
	var yesno = confirm('آیا مطمئن به حذف هستید؟ این امر ممکن است قابل بازگشت نباشد.');
	if (yesno==true) window.location="pub.php?db=inline_photos&b=uploader&id="+id+"&p=-2";
}
function gallery_prevent()
{
	setTimeout(function(){
		$('#daBTN').attr('disabled','true');
		$('#daBTN').val('منتظر بمانید...');
	},1)
}
</script>
</head>
<body id="uploader">
<form action="uploader2.php" method="POST" enctype="multipart/form-data" dir="ltr" style="width: 100%; margin: 10px 0; clear: both;">
	<div align="center">
	<input type="file" name="photo"><input id="daBTN" onclick="gallery_prevent();" type="submit" value="آپلود">
	</div>
</form>
<?php
$query=mysqli_query($CON,"SELECT * FROM `inline_photos` WHERE `published` = 1");
while ($row=mysqli_fetch_array($query))
	echo ('<div class="inline_photos" style="background-image: url(../inline_photos/thumbs/'.$row['ID'].'.jpg)"><div><table cellspacing="0" cellpadding="0" style="height: 100%; width: 100%;"><tr><td valign="middle" align="center" style="color: white;"><p onclick="parent.insert_image('.$row['ID'].')">درج در متن</p><p onclick="del('.$row['ID'].')">حذف</p></td></tr></table></div></div>');
?>
</body>
</html>