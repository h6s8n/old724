<?php
include "../connectioni.php";
$db=$_GET['db'];
$id=$_GET['id'];
$str=trim($_GET['str']);
$checkedTags=$_GET['checkedTags'];
$checkedTagsObj=json_decode($checkedTags,false);
$obj=array();
$postTags=array();
if ($str!="") $query=mysqli_query($CON,"SELECT * FROM `tags` WHERE `tag` LIKE '%$str%' AND `published` != -2");
else $query=mysqli_query($CON,"SELECT * FROM `tags` WHERE `published` != -2");
while ($row=mysqli_fetch_assoc($query))
{
	if ($obj[$row['tag']]=="") $obj[$row['tag']]=1;
	else $obj[$row['tag']]++;
	if ($row['db']==$db && $row['db_id']==$id) array_push($postTags,$row['tag']);
}
arsort($obj);
$counter=0;
foreach ($obj as $tag=>$count)
{
	if (in_array($tag,$postTags) || in_array($tag,$checkedTagsObj)) $str="checked"; else $str="";
	echo ('<label for="tag_batch_'.$counter.'" data-ttagg="'.$tag.'"><input id="tag_batch_'.$counter.'" type="checkbox" '.$str.' value="1"> '.$tag.' ؛ '.$count.'</label>');
	$counter++;
}
foreach ($checkedTagsObj as $index=>$tag)
{
	if (!isset($obj[$tag]))
	{
		echo ('<label for="tag_batch_'.$counter.'" data-ttagg="'.$tag.'"><input id="tag_batch_'.$counter.'" type="checkbox" checked value="1"> '.$tag.'</label>');
		$counter++;
	}
}
?>
