<?php
session_start();
include "functions.php";
check_login();
// if ($_SESSION['loggedin'] != "true") header("location: login.php");

$startTop=intval($_POST['startTop']);
$startLeft=intval($_POST['startLeft']);
$height=intval($_POST['height']);
$width=intval($_POST['width']);
$db=$_POST['db'];
$id=$_POST['id'];
$gWidth=intval($_POST['gWidth']);
$gHeight=intval($_POST['gHeight']);
// die(print_r($_POST));
// $im = imagecreatefromjpeg("../$db/$id.jpg");
// $to_crop_array = array('x' => $startLeft , 'y' => $startTop, 'width' => $width, 'height'=> $height);

switch ($db)
{
	case "slide":
		$folder="croped";
		$goto="index.php?pid=101&id=".$id;
		break;
		
	case "news":
		$folder="croped";
		$goto="index.php?pid=111&id=".$id;
		break;
		
	case "articles":
		$folder="croped";
		$goto="index.php?pid=161&id=".$id;
		break;
		
	case "digpaz_reviews":
		$folder="croped";
		$goto="index.php?pid=dp101&id=".$id;
		break;
		
	case "digpaz_blog":
		$folder="croped";
		$goto="index.php?pid=dp111&id=".$id;
		break;
		
	case "digpaz_authors":
		$folder="croped";
		$goto="index.php?pid=dp121&id=".$id;
		break;
		
	case "digpaz_slide":
		$folder="croped";
		$goto="index.php?pid=dp131&id=".$id;
		break;
		
	case "game_slide":
		$folder="croped";
		$goto="index.php?pid=gm101&id=".$id;
		break;
		
}

$source_image = imagecreatefromjpeg("../".$db."imgs/$id.jpg"); // read the source image
$virtual_image = imagecreatetruecolor($gWidth, $gHeight); // create a new, "virtual" image
imagecopyresampled($virtual_image, $source_image, 0, 0, $startLeft, $startTop, $gWidth, $gHeight, $width, $height); // copy source image at a resized size
imagejpeg($virtual_image, ("../".$db."imgs/$folder/$id.jpg"), 90); // create the physical thumbnail image to its destination

$_SESSION['admin_done']=1;
header("location: $goto");
?>