<?php
include "../connectioni.php";
include "functions.php";

$title=mysqli_real_escape_string($CON,$_POST['title']);
$fee=floatval($_POST['fee']);
$fee_bysize=$_POST['fee_bysize'];
if ($fee_bysize!=0) $fee_bysize=1;
$id=$_POST['id'];
$featured=$_POST['featured'];
if ($featured!=1) $featured=0;
$published=$_POST['published'];

date_default_timezone_set("Asia/Tehran");
$date=time();

if ($id=="")
{
	$query=mysqli_query($CON,"SELECT `ID` FROM `chap_parameters` ORDER BY `ID` DESC");
	$id=mysqli_fetch_array($query)['ID'];
	$id++;
	
	mysqli_query($CON,"INSERT INTO `chap_parameters` (`ID`,`sort`,`title`,`fee`,`fee_bysize`,`date`,`featured`,`published`) VALUES ('$id','$id','$title','$fee','$fee_bysize','$date','$featured','$published')") or die(mysqli_error($CON));
	activitylog(2,["db"=>"chap_parameters","id"=>$id]);
	$catRelationSort=$id;
}
else
{
	activitylog(3,[
		"db"=>"chap_parameters",
		"id"=>$id,
		"post"=>[
			"title"=>$_POST['title'],
			"fee"=>$fee,
			"fee_bysize"=>$fee_bysize,
			"featured"=>$featured,
			"published"=>$published
		]
	]);
	mysqli_query($CON,"UPDATE `chap_parameters` SET `title` = '$title' , `fee` = '$fee' , `fee_bysize` = '$fee_bysize' , `featured` = '$featured' , `published` = '$published' , `dateModified` = '$date' WHERE `ID` = $id") or die(mysqli_error($CON));
	$editingRowQuery=mysqli_query($CON,"SELECT * FROM `chap_parameters` WHERE `ID` = $id");
	$editingRow=mysqli_fetch_array($editingRowQuery);
	$catRelationSort=$editingRow['sort'];
	
	$query=mysqli_query($CON,"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`db` = 'chap_parameters' AND rels.`catID` = 100 AND pars.`published` = 1 ORDER BY pars.`sort` DESC");
	while ($row=mysqli_fetch_assoc($query))
	{
		$query2=mysqli_query($CON,"SELECT * FROM `chap_parameters_bysize` WHERE `parameterID` = '$id' AND `sizeID` = '".$row['ID']."'");
		$row2=mysqli_fetch_assoc($query2);
		if ($row2!="")
		{
			mysqli_query($CON,"UPDATE `chap_parameters_bysize` SET `fee` = '".floatval($_POST['fee'.$row['ID']])."' WHERE `ID` = '".$row2['ID']."'");
			activitylog(3,[
				"db"=>"chap_parameters_bysize",
				"id"=>$row2['ID'],
				"post"=>[
					"fee"=>floatval($_POST['fee'.$row['ID']])
				]
			]);
		}
		else
		{
			mysqli_query($CON,"INSERT INTO `chap_parameters_bysize` (`parameterID`,`sizeID`,`fee`) VALUES ('$id','".$row['ID']."','".floatval($_POST['fee'.$row['ID']])."')");
			activitylog(2,["db"=>"chap_parameters_bysize","id"=>mysqli_insert_id($CON)]);
		}
	}
}

$misc_query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 28");
$misc_row=mysqli_fetch_array($misc_query);

activitylog(7,["db"=>"chap_parameters","id"=>$id,"newCats"=>$_POST['cat']]);
mysqli_query($CON,"DELETE FROM `cats_relations` WHERE `db` = 'chap_parameters' AND `db_id` = $id");
$counter=0;
foreach($_POST['cat'] as $i=>$val)
{
	$counter++;
	if ($val!="") mysqli_query($CON,"INSERT INTO `cats_relations` (`catID`,`db`,`db_id`,`db_sort`,`published`) value ('$val','chap_parameters','$id','$catRelationSort','$published')");
}
if ($counter==0 && $misc_row['body']!="0") mysqli_query($CON,"INSERT INTO `cats_relations` (`catID`,`db`,`db_id`,`db_sort`,`published`) value ('".$misc_row['body']."','chap_parameters','$id','$catRelationSort','$published')");

mysqli_close($CON);
session_start();
$_SESSION['admin_done']=1;
header("location: index.php?pid=hc101&id=".$id);
?>