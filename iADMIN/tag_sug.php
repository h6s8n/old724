<?php
include "../connectioni.php";
$str=$_GET['str'];
$obj=array();
$query=mysqli_query($CON,"SELECT * FROM `tags` WHERE `published` != -2 AND `tag` LIKE '".$str."%'") or die(mysqli_error($CON));
while ($row=mysqli_fetch_array($query))
{
	if ($obj[$row['tag']]=="") $obj[$row['tag']]=1;
	else $obj[$row['tag']]++;
}
arsort($obj);
$counter=0;
foreach($obj as $tag=>$count)
{
	if ($counter>=3) break;
	$counter++;
	if ($counter==1) $str=' active'; else $str='';
	echo ('<div class="item'.$str.'" onmouseover="change_sug('.$counter.')" onclick="choose_sug()" id="sug_item_'.$counter.'">'.$tag.'</div>');
}
?>