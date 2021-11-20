<h1><?php if ($daID=="") echo ('پارامتر جدید'); else echo ('ویرایش پارامتر'); ?>:</h1>
<div style="clear: both"></div>

<form id="daForm" action="javascript:formController_chap_parameters()" method="POST" enctype="multipart/form-data">
	<table class="formTable" cellspacing="0" cellpadding="0">
		<?php
		if ($daID!="")
		{
			$catsObj=array();
			$query=mysqli_query($CON,"SELECT * FROM `cats_relations` WHERE `db` = 'chap_parameters' AND `db_id` = $daID");
			while ($row=mysqli_fetch_array($query))
				array_push($catsObj,$row['catID']);
		}
		if ($chap_parameters_has_cat!=0)
		{
			$default_cat_query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `published` = 1 AND `ID` = ".$chap_parameters_has_cat);
			$default_cat_row=mysqli_fetch_array($default_cat_query);
		?>
		<tr>
			<td>دسته بندی:</td>
			<td>
				<select name="cat[]" multiple size="5" style="height: auto;" multiple>
					<?php
					if ($daID!="")
						$editing_row=$catsObj;
					else if ($_GET['cat']=="")
						// $editing_row="null";
						$editing_row="def".$downloads_has_cat;
					else
						$editing_row="def".$_GET['cat'];
					
					generate_cats_options("chap_parameters",$editing_row);
					?>
				</select>
			</td>
		</tr>
		<?php
		}
		?>
		<tr>
			<td>عنوان:</td>
			<td>
				<input id="field_title" name="title" type="text" value="<?php if ($daID!="") echo $Row['title'] ?>">
				<div id="fieldError_title" class="fielderror" onclick="hide_error(this)">این فیلد خالیست.</div>
			</td>
		</tr>
		<tr>
			<td>تعیین نرخ:</td>
			<td>
				<label for="radio_fixed"><input type="radio" name="fee_bysize" id="radio_fixed" value="0" <?php if ($daID=="" || ($daID!="" && $Row['fee_bysize']=="0")) echo ('checked'); ?>></input>ثابت</label>
				<label for="radio_variable"><input type="radio" name="fee_bysize" id="radio_variable" value="1" <?php if ($daID!="" && $Row['fee_bysize']=="1") echo ('checked'); ?>></input>بر حسب قطع کتاب</label>
			</td>
		</tr>
		<?php
		if ($daID=="" || ($daID!="" && $Row['fee_bysize']==0))
		{
		?>
		<tr>
			<td>نرخ ثابت (تومان):</td>
			<td>
				<input id="field_fee" name="fee" type="text" value="<?php if ($daID!="") echo $Row['fee'] ?>">
				<div id="fieldError_fee" class="fielderror" onclick="hide_error(this)">این فیلد خالیست.</div>
			</td>
		</tr>
		<?php
		}
		else
		{
			$query=mysqli_query($CON,"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON rels.`db_id` = pars.`ID` WHERE rels.`db` = 'chap_parameters' AND rels.`catID` = 100 AND pars.`published` = 1 ORDER BY pars.`sort` DESC");
			while ($row=mysqli_fetch_assoc($query))
			{
				$query2=mysqli_query($CON,"SELECT * FROM `chap_parameters_bysize` WHERE `parameterID` = '".$Row['ID']."' AND `sizeID` = '".$row['ID']."'");
				$row2=mysqli_fetch_assoc($query2);
		?>
		<tr>
			<td>نرخ برای <?= $row['title'] ?> (تومان):</td>
			<td>
				<input id="field_fee<?= $row['ID'] ?>" name="fee<?= $row['ID'] ?>" type="text" value="<?php echo $row2['fee'] ?>">
				<div id="fieldError_fee<?= $row['ID'] ?>" class="fielderror" onclick="hide_error(this)">این فیلد خالیست.</div>
			</td>
		</tr>
		<?php
			}
		}
		?>
		<tr>
			<td>وضعیت انتشار:</td>
			<td>
				<label for="radio_unpublish"><input type="radio" name="published" id="radio_unpublish" value="0" <?php if ($daID=="" || ($daID!="" && $Row['published']=="0")) echo ('checked'); ?>></input>چرک نویس</label>
				<label for="radio_publish"><input type="radio" name="published" id="radio_publish" value="1" <?php if ($daID!="" && $Row['published']=="1") echo ('checked'); ?>></input>انتشار</label>
			</td>
		</tr>
	</table>
	<input type="hidden" name="id" value="<?php if ($daID!="") echo $Row['ID'] ?>">
	<input type="submit" value="ثبت" class="reg_btn">
</form>