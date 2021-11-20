<a href="index.php?pid=180&db=<?= $cat_db ?>" class="add_btn">دسته جدید</a>
<h1>دسته بندی <?= $cat_db_fa ?>:</h1>
<div style="clear: both"></div>

<div>
<table class="daTable" cellspacing="0" cellpadding="0">
	<tr>
		<td style="width: 36px;">ترتیب</td>
		<td style="text-align: right; padding-right: 20px;">عنوان</td>
		<td style="width: 110px;">نمایش در منو</td>
		<td style="width: 110px;">وضعیت انتشار</td>
		<td style="width: 150px;">فهرست <?= $cat_db_fa ?></td>
		<td style="width: 65px;">ویرایش</td>
		<td style="width: 40px;">حذف</td>
	</tr>
	<tr><td colspan="7"></td></tr>
	<?php
	generate_cats_table($cat_db);
	
	$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = ".$default_cat_row_in_misc);
	$row=mysqli_fetch_array($query);
	?>
<hr>
<h1>سایر تنظیمات دسته بندی <?= $cat_db_fa ?>:</h1>
<form id="daForm" action="mod-cats-default.php" method="POST" enctype="multipart/form-data">
	<table class="formTable" cellspacing="0" cellpadding="0">
		<tr>
			<td>دسته پیشفرض:</td>
			<td>
				<select name="default_cat">
					<option style="font-weight: bold" value="0">{دسته بندی برای <?= $cat_db_fa ?> غیر فعال باشد}</option>
					<?php
					generate_cats_options($cat_db,"def".$row['body']);
					?>
				</select>
			</td>
		</tr>
	</table>
	<input type="hidden" name="db" value="<?= $cat_db ?>">
	<input type="submit" value="ثبت" class="reg_btn">
</form>