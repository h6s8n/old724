<?php
session_start();

$obj=[
	"current"=>0,
	"total"=>0,
	"percent"=>0,
	"kb"=>0
];
$key = (ini_get("session.upload_progress.prefix"))."theccdownloadsmodule";
// die(print_r($_SESSION[$key]));
if (!empty($_SESSION[$key]))
{
    $obj["current"] = $current = $_SESSION[$key]["bytes_processed"];
    $obj["total"] = $total = $_SESSION[$key]["content_length"];
	if ($current < $total)
		$obj["percent"]=ceil($current / $total * 100);
	else
		$obj["percent"]=100;
    // echo $current < $total ? ceil($current / $total * 100) : 100;
}
else
    $obj["percent"]=100;

/* if ($obj["percent"]==100)
{
	include "connectioni.php";
	$filename=$_SESSION[$key]["files"][0]["name"];
	mysqli_query($CON,"UPDATE `files` SET `status` = 'done' ORDER BY `ID` DESC LIMIT 0, 1");
} */
$obj['kb']=intval($_SESSION[$key]["bytes_processed"])/1024;
echo json_encode($obj);
?>