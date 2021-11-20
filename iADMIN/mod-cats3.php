<?php
include "../connectioni.php";
include "functions.php";

$title=mysqli_real_escape_string($CON,$_POST['title']);
$body=mysqli_real_escape_string($CON,$_POST['body']);
$parentID=$_POST['parentID'];
$db=$_POST['db'];
$id=$_REQUEST['id'];
$published=$_POST['published'];

$html_title=mysqli_real_escape_string($CON,str_replace(["\r\n","\n"],[" "," "],strip_tags($_POST['html_title'])));
$html_desc=mysqli_real_escape_string($CON,str_replace(["\r\n","\n"],[" "," "],strip_tags($_POST['html_desc'])));
$escaped_title=makeEscapedTitle($_POST['escaped_title']);

if ($_FILES["image"]["type"]=="image/jpeg")
{
	$filename_image=basename($_FILES['image']['name']);
	$fileformat=substr($filename_image,-4);
	$filename_image = preg_replace('/[^\141-\172]+/u', '', $filename_image);
	$filename_image=substr($filename_image,0,-4);
	while (file_exists("../cats/".$filename_image.$fileformat))
		$filename_image.="_";
	$filename_image.=$fileformat;
	move_uploaded_file($_FILES["image"]["tmp_name"],"../cats/".$filename_image) or die('Error uploading file.');
	makeThumb("../cats/".$filename_image,"../cats/croped/".$filename_image,460,138);
}
else
{
	// if ($id=="")
		// die('<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"></head><script type="text/javascript">alert("تصویر انتخاب نشده یا فرمت آن جی پی جی نیست"); history.back();</script>');
	// else
		$filename_image="";
}
if ($id=="")
{
	// $query=mysqli_query($CON,"SELECT `ID` FROM `cats`");
	$query=mysqli_query($CON,"SELECT `ID` FROM `cats` ORDER BY `ID` DESC");
	// $id=mysqli_num_rows($query);
	$id=mysqli_fetch_array($query)['ID'];
	$id++;
	mysqli_query($CON,"INSERT INTO `cats` (`ID`,`sort`,`html_title`,`html_desc`,`escaped_title`,`db`,`title`,`body`,`parentID`,`image`,`published`) VALUES ('$id','$id','$html_title','$html_desc','$escaped_title','$db','$title','$body','$parentID','$filename_image','$published')") or die ('Error Inserting into Database: '.mysqli_error($CON));
	activitylog(2,["db"=>"cats","id"=>$id]);
	$nextPage="pid=18&db=$db";
}
else
{
	$err=0;
	$parr=$parentID;
	while ($parr!=0)
	{
		$query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `ID` = $parr");
		$newrow=mysqli_fetch_array($query);
		if ($newrow['parentID']==$id)
		{
			$err=1;
			break;
		}
		else
		{
			$parr=$newrow['parentID'];
		}
	}
	if ($err==1)
	{
		die('<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"></head><script type="text/javascript">alert("خطا: یک گروهِ مادر نمیتواند یکی از زیر گروه های خود را به عنوانِ مادر خود بپذیرد"); history.back();</script>');
	}
	if ($filename_image!="") $filename_image=", `image` = '$filename_image'";
	$check_query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `ID` = ".$id) or die(mysqli_error($CON));
	$check_row=mysqli_fetch_array($check_query);
	if ($check_row['locked']!="1")
	{
		$query = "UPDATE `cats` SET `html_title` = '$html_title' , `html_desc` = '$html_desc' , `escaped_title` = '$escaped_title' , `title` = '$title' , `body` = '$body' , `parentID` = $parentID , `published` = '$published' $filename_image WHERE `ID` = $id";
		$activityLogDetails=[
			"db"=>"cats",
			"id"=>$id,
			"post"=>[
				"title"=>$_POST['title'],
				"body"=>preg_replace('/\r\n/','<br>',$_POST['body']),
				"parentID"=>$parentID,
				"published"=>$published,
				"html_title"=>$_POST['html_title'],
				"html_desc"=>$_POST['html_desc'],
				"escaped_title"=>$escaped_title
			]
		];
		if ($filename_image!="") $activityLogDetails['post']['image']=$filename_image;
	}
	else
	{
		$activityLogDetails=[
			"db"=>"cats",
			"id"=>$id,
			"post"=>[
				"title"=>$_POST['title'],
				"body"=>preg_replace('/\r\n/','<br>',$_POST['body'])
			]
		];
		$query="UPDATE `cats` SET `title` = '$title' , `body` = '$body' WHERE `ID` = $id";
	}
	activitylog(3,$activityLogDetails);
	mysqli_query($CON,$query) or die ('Error Updating Database: '.mysqli_error($CON));
	$nextPage="pid=181&id=$id";
}
mysqli_close($CON);
session_start();
$_SESSION['admin_done']=1;
header("location: index.php?".$nextPage);
?>