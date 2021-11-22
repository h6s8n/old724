<h1>پست های وبلاگ:</h1>
<div style="clear: both"></div>

<div>
<table class="daTable" cellspacing="0" cellpadding="0">
	<tr>
		<td style="width: 85px; text-align: center;">برگزیده</td>
		<td style="text-align: right;">عنوان</td>
	</tr>
	<tr><td colspan="2"></td></tr>
	<?php
	$counter=0;
	
	$CON2=mysqli_connect("localhost","root","","724_blog");
	// $CON2=mysqli_connect("localhost","root","","seven24_blog");
	mysqli_query($CON2,"SET NAMES utf8");
	mysqli_query($CON2,"SET CHARACTER_SET utf8");
	
	$query=mysqli_query($CON2,"SELECT * FROM `chap_posts` where `post_status` = 'publish' and `post_type` = 'post' ");
	while ($row=mysqli_fetch_array($query))
	{
		$query2=mysqli_query($CON,"SELECT * FROM `chap_blog` WHERE `wpID` = '".$row['ID']."'");
		$row2=mysqli_fetch_assoc($query2);
		if ($row2=="") $row2['featured']=0;
		$counter++;
	?>
	<tr id="row<?= $row['ID'] ?>">
		<td>
			<div onclick="chap_blog_featured(<?= $row['ID'] ?>)" class="publish <?php if ($row2['featured']==1) echo ('active') ?>" id="featured_btn_<?= $row['ID'] ?>"></div>
			<div id="featured_loading_<?= $row['ID'] ?>" class="loading_overlay"></div>
		</td>
		<td style="text-align: right;"><a href="<?= $row['guid'] ?>" target="_blank"><?= $row['post_title'] ?></a></td>
	</tr>
	<?php
	}
	?>
</table>
</div>
<?php
if ($counter==0) echo ('<div class="info">هیچ پستی یافت نشد.</div>');
?>