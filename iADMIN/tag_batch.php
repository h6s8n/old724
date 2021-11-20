<h1>مدیریت گروهی برچسبها</h1>
<p class="info"></p>
<form class="formTable" id="tag_batch_form" action="javascript:void(0)">
	<?php
	$db=$_GET['db'];
	$id=$_GET['id'];
	?>
	<input type="text" data-postdb="<?= $db ?>" data-postid="<?= $id ?>" id="tag_batch_search_field" onkeyup="tag_batch_handlebtns(event);" placeholder="جستجو..." style="margin-bottom: 5px; opacity: 1;">
	<p class="info tag_batch_btns">
		<a id="tag_batch_btn_search" href="javascript:void(0)" onclick="tag_batch_search($('#tag_batch_search_field').val())">جستجوی «<span class="tag_batch_placeholder"></span>» در برچسبها</a><br>
		<a id="tag_batch_btn_add" href="javascript:void(0)" onclick="tag_batch_add()">افزودن برچسب «<span class="tag_batch_placeholder"></span>»</a>
	</p>
	
	<?php
	include "../connectioni.php";
	$obj=array();
	$postTags=array();
	$query=mysqli_query($CON,"SELECT * FROM `tags` WHERE `published` != -2");
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
		if (in_array($tag,$postTags)) $str="checked"; else $str="";
		echo ('<label for="tag_batch_'.$counter.'" data-ttagg="'.$tag.'"><input id="tag_batch_'.$counter.'" type="checkbox" '.$str.' value="1"> '.$tag.' ؛ '.$count.'</label>');
		$counter++;
	}
	?>
	<div style="height: 70px"></div>
	<input type="button" onclick="tag_batch_submit()" style="position: fixed; bottom: 10px; right: 219px;" class="reg_btn uploader_submit" value="درج">
</form>