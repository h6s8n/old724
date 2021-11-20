<?php
session_start();
include "connectioni.php";
date_default_timezone_set("Asia/Tehran");
$timestamp=time();
$fileUploaded=false;
if ($_POST['bookname']!="" && $_POST['client']!="")
{
	$validFiletypes=["application/zip", "application/octet-stream", "application/x-zip-compressed", "multipart/x-zip"];
	if ($_FILES['chap_file_zip']['size']>0 && in_array($_FILES['chap_file_zip']['type'],$validFiletypes))
	{
		// $filenameFull=basename($_FILES['chap_file']['name']);
		$filenameFull="file_zip_".$timestamp.".zip";
		$filenameDot=strripos($filenameFull,".");
		$filename=substr($filenameFull,0,$filenameDot);
		$fileFormat=substr($filenameFull,$filenameDot+1);
		while (file_exists("u53rUpl0ad54/".$filename.".".$fileFormat))
			$filename.="_";
		$filename_zip=$filename.".".$fileFormat;
		
		move_uploaded_file($_FILES['chap_file_zip']["tmp_name"],"u53rUpl0ad54/".$filename_zip);
		$fileUploaded=true;
	}
	if ($_FILES['chap_file_word']['size']>0 && (mb_substr(basename($_FILES['chap_file_word']['name']),-4,4,'utf-8')=="docx" || mb_substr(basename($_FILES['chap_file_word']['name']),-3,3,'utf-8')=="doc"))
	{
		$filenameFull=basename($_FILES['chap_file_word']['name']);
		$filenameDot=strripos($filenameFull,".");
		$fileFormat=substr($filenameFull,$filenameDot+1);
		$filenameFull="file_word_".$timestamp.".".$fileFormat;
		$filename=substr($filenameFull,0,strripos($filenameFull,"."));
		while (file_exists("u53rUpl0ad54/".$filename.".".$fileFormat))
			$filename.="_";
		$filename_word=$filename.".".$fileFormat;
		
		move_uploaded_file($_FILES['chap_file_word']["tmp_name"],"u53rUpl0ad54/".$filename_word);
		$fileUploaded=true;
	}
	if ($_FILES['chap_file_pdf']['size']>0 && mb_substr(basename($_FILES['chap_file_pdf']['name']),-3,3,'utf-8')=="pdf")
	{
		$filenameFull=basename($_FILES['chap_file_pdf']['name']);
		$filenameDot=strripos($filenameFull,".");
		$fileFormat=substr($filenameFull,$filenameDot+1);
		$filenameFull="file_pdf_".$timestamp.".".$fileFormat;
		$filename=substr($filenameFull,0,strripos($filenameFull,"."));
		while (file_exists("u53rUpl0ad54/".$filename.".".$fileFormat))
			$filename.="_";
		$filename_pdf=$filename.".".$fileFormat;
		
		move_uploaded_file($_FILES['chap_file_pdf']["tmp_name"],"u53rUpl0ad54/".$filename_pdf);
		$fileUploaded=true;
	}
	if (!$fileUploaded)
		die('فایلی انتخاب نشده یا فرمت آن صحیح نیست یا حجم آن بیش از حد مجاز است.');
	else
	{
		mysqli_query($CON,"INSERT INTO `ups` (`personName`,`bookName`,`name`,`filename_word`,`filename_pdf`,`date`) VALUES
		('".$_POST['client']."','".$_POST['bookname']."','".$filename_zip."','".$filename_word."','".$filename_pdf."','$timestamp')") or die(mysqli_error($CON));
		die('فایل شما با موفقیت بارگزاری شد.');
	}
}
else
	die('نام کتاب و نام سفارش دهنده را وارد کنید.');
?>