<?php
session_start();
include "../connectioni.php";
include "functions.php";
check_login();
$output_obj=array();
$i=0;
/* while ($_FILES["photos"]["type"][$i]=="image/jpeg" || $_FILES["photos"]["type"][$i]=="image/png")
{
	$filename=basename($_FILES['photos']['name'][$i]);
	$filename=substr($filename,0,-4);
	while (file_exists("../inline_photos/".$filename.".jpg"))
		$filename.="_";
	$filename.=".jpg";
	move_uploaded_file($_FILES["photos"]["tmp_name"][$i],"../inline_photos/".$filename) or die('Error uploading file.');
	activitylog(10,$filename);
	array_push($output_obj,$filename);
	$i++;
} */
while ($_FILES["photos"]["type"][$i]=="image/png" || $_FILES["photos"]["type"][$i]=="image/jpeg")
{
	$filename_image=basename($_FILES['photos']['name'][$i]);
	$fileformat=substr($filename_image,-4);
	$filename_image=substr($filename_image,0,-4);
	while (file_exists("../inline_photos/".$filename_image.$fileformat))
		$filename_image.="_";
	$filename_image.=$fileformat;
	move_uploaded_file($_FILES["photos"]["tmp_name"][$i],"../inline_photos/".$filename_image) or die('Error uploading file.');
	activitylog(10,$filename_image);
	array_push($output_obj,$filename_image);
	$i++;
}
if ($i==0) die('not_jpg');
echo(json_encode($output_obj));
?>