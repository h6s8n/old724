<h1><?php if ($daID=="") echo ('دسته جدید'); else echo ('ویرایش دسته'); ?> برای <?= $cat_db_fa ?>:</h1>
<div style="clear: both"></div>

<form id="daForm" action="javascript:formController_cats(<?php if ($daID!="") echo 'true' ?>)" method="POST" enctype="multipart/form-data">
	<table class="formTable" cellspacing="0" cellpadding="0">
		<tr>
			<td>عنوان:</td>
			<td>
				<input id="field_title" name="title" type="text" value="<?php if ($daID!="") echo $Row['title'] ?>">
				<div id="fieldError_title" class="fielderror" onclick="hide_error(this)">این فیلد خالیست.</div>
			</td>
		</tr>
		<tr>
			<td>HTML TItle:</td>
			<td>
				<input id="field_link" name="html_title" type="text" value="<?php if ($daID!="") echo $Row['html_title'] ?>">
			</td>
		</tr>
		<tr>
			<td>HTML Description:</td>
			<td>
				<textarea name="html_desc"><?php if ($daID!="") echo $Row['html_desc'] ?></textarea>
			</td>
		</tr>
		<tr>
			<td>شناسه شاخص:</td>
			<td>
				<input type="text" id="field_escaped_title" name="escaped_title" value="<?php if ($daID!="") echo $Row['escaped_title'] ?>">
				<div id="fieldError_escaped_title" class="fielderror" onclick="hide_error(this)">این فیلد خالیست.</div>
			</td>
		</tr>
		<tr>
			<td>توضیحات:</td>
			<td>
				<textarea id="field_body" name="body" class="editor_textarea"><?php if ($daID!="") echo $Row['body'] ?></textarea>
				<div id="fieldError_body" class="fielderror" onclick="hide_error(this)">این فیلد خالیست.</div>
			</td>
		</tr>
		<tr>
			<td>دسته مادر:</td>
			<td>
				<select name="parentID">
					<option value="0" style="font-weight: bold;">{بدون مادر: با انتخاب این گزینه، این دسته یک دسته ی اصلی یا ریشه قلمداد میشود}</option>
					<?php
					$daID!=""?$editing_row=$daID:$editing_row="null";
					generate_cats_options($cat_db,$editing_row);
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>تصویر (JPG):</td>
			<td>
				<input id="field_image" name="image" type="file">
				<div id="fieldError_image" class="fielderror" onclick="hide_error(this)">تصویر انتخاب نشده یا فرمت آن jpg نیست.</div>
			</td>
		</tr>
		<?php
		if ($daID!="" && $Row['image']!="" && file_exists('../cats/croped/'.$Row['image']))
		{
		?>
		<tr>
			<td>تصویر فعلی:</td>
			<td>
				<img class="croped_photo" src="../cats/croped/<?= $Row['image'] ?>">
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td>وضعیت انتشار:</td>
			<td>
				<label for="radio_unpublish"><input type="radio" name="published" id="radio_unpublish" value="0" <?php if ($daID=="" || ($daID!="" && $Row['published']=="0")) echo ('checked'); ?>></input>چرک نویس</label>
				<label for="radio_publish"><input type="radio" name="published" id="radio_publish" value="1" <?php if ($daID!="" && $Row['published']=="1") echo ('checked'); ?>></input>انتشار</label>
			</td>
		</tr>
	</table>
	<input type="hidden" name="id" value="<?php if ($daID!="") echo $Row['ID'] ?>">
	<input type="hidden" name="db" value="<?= $cat_db ?>">
	<input type="submit" value="ثبت" class="reg_btn">
</form>