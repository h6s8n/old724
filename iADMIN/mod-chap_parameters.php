<a href="<?= $indexFilename ?>?pid=hc100" class="add_btn">پارامتر جدید</a>
<h1>پارامترها<?php
if ($cat_for_header!="null")
{
	$CATQUERY=mysqli_query($CON,"SELECT * FROM `cats` WHERE `ID` = ".$cat_for_header);
	$CATROW=mysqli_fetch_array($CATQUERY);
	echo (' ('.$CATROW['title'].')');
}
?>:</h1>
<div style="clear: both"></div>

<div>
<table class="daTable" cellspacing="0" cellpadding="0">
	<tr>
		<?php if ($cat_for_header=="null") { ?>
		<td style="width: 55px">ترتیب</td>
		<?php } ?>
		<td style="width: 85px; text-align: center;">برگزیده</td>
		<td style="text-align: right;">عنوان</td>
		<td>دسته بندی</td>
		<td style="width: 230px;">آخرین تغییر</td>
		<td style="width: 110px;">هزینه</td>
		<td style="width: 110px;">وضعیت انتشار</td>
		<td style="width: 65px;">ویرایش</td>
		<td style="width: 40px;">حذف</td>
	</tr>
	<tr><td colspan="9"></td></tr>
	<?php
	$counter=0;
	if ($cat_for_header=="null")
	{
		$listbycat=false;
		$query=mysqli_query($CON,"SELECT * FROM `chap_parameters` WHERE `published` != -2 ORDER BY `sort` DESC");
	}
	else
	{
		$listbycat=true;
		$query=mysqli_query($CON,"SELECT * FROM `cats_relations` WHERE `published` != -2 AND `db` = 'chap_parameters' AND `catID` = $cat_for_header ORDER BY `db_sort` DESC");
	}
	while ($row2=mysqli_fetch_array($query))
	{
		if ($listbycat)
		{
			$query2=mysqli_query($CON,"SELECT * FROM `chap_parameters` WHERE `ID` = ".$row2['db_id']);
			$row=mysqli_fetch_array($query2);
		}
		else
		{
			$row=$row2;
		}
		$catStr="";
		$postCatQuery=mysqli_query($CON,"SELECT * FROM `cats_relations` WHERE `db` = 'chap_parameters' AND `db_id` = '".$row['ID']."'");
		while($postCatRow=mysqli_fetch_array($postCatQuery))
		{
			$postCatQuery2=mysqli_query($CON,"SELECT * FROM `cats` WHERE `published` = 1 AND `ID` = ".$postCatRow['catID']);
			$postCatRow2=mysqli_fetch_array($postCatQuery2);
			$catStr.='<a onmouseover="tooltip('."'مشاهده پستهای «".$postCatRow2['title']."»'".')" onmouseout="hidett()" href="index.php?pid=hc10&cat='.$postCatRow2['ID'].'">'.$postCatRow2['title'].'</a>، ';
		}
		$catStr=mb_substr($catStr,0,-2,'utf-8');
		
		$counter++;
	?>
	<tr id="row<?= $row['ID'] ?>">
		<?php if ($cat_for_header=="null") { ?>
		<td valign="middle">
			<div onclick="sort_move('chap_parameters',<?= $row['ID'] ?>,0)" class="slide_sort_move"></div>
			<div onclick="sort('chap_parameters',<?= $row['ID'] ?>,'up')" class="slide_sort_up"></div>
			<div onclick="sort('chap_parameters',<?= $row['ID'] ?>,'down')" class="slide_sort_down"></div>
		</td>
		<?php } ?>
		<td>
			<div onclick="chap_parameters_featured(<?= $row['ID'] ?>)" class="publish <?php if ($row['featured']==1) echo ('active') ?>" id="featured_btn_<?= $row['ID'] ?>"></div>
			<div id="featured_loading_<?= $row['ID'] ?>" class="loading_overlay"></div>
		</td>
		<td style="text-align: right;"><?= $row['title'] ?></td>
		<td><a href="<?= $indexFilename ?>?pid=hc10&cat=<?= $postCatRow['catID'] ?>"><?= $catStr ?></a></td>
		<td><?php if ($row['dateModified']!=0) echo $jDate->date("j F Y / H:i",$row['dateModified']); else echo $jDate->date("j F Y / H:i",$row['date']); ?></td>
		<td><?php if ($row['fee_bysize']==0) if ($row['fee']!=0) echo replaceAll(number_format($row['fee']))." تومان"; else echo '-'; else echo "بر حسب قطع"; ?></td>
		<td>
			<div onclick="toggle_pub('chap_parameters',<?= $row['ID'] ?>)" class="publish <?php if ($row['published']==1) echo ('active') ?>" id="pub_btn_<?= $row['ID'] ?>"></div>
			<div id="pub_loading_<?= $row['ID'] ?>" class="loading_overlay"></div>
		</td>
		<td><a href="<?= $indexFilename ?>?pid=hc101&id=<?= $row['ID'] ?>" class="edit"></a></td>
		<td>
			<div class="delete" onclick="remove_row('chap_parameters',<?= $row['ID'] ?>)"></div>
			<div id="del_loading_<?= $row['ID'] ?>" class="loading_overlay"></div>
		</td>
	</tr>
	<?php
	}
	?>
</table>
</div>
<?php
if ($counter==0) echo ('<div class="info">هیچ پارامتر ای وجود ندارد.<br>با کلیک بر روی گزینه ی «پارامتر جدید» اولین پارامتر را اضافه کنید.</div>');
?>