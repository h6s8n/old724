<h1>بارگزاری تصویر</h1>
<p class="info">
فایل های انتخابی همگی باید JPG یا PNG و حداکثر 500 کیلوبایت باشد.
</p>
<form class="formTable" id="uploader_form" action="javascript:tinymce_uploadphoto()" method="POST" enctype="multipart/form-data">
	<input type="text" id="tinymce_uploadphoto_alt" placeholder="توضیحات تصویر (Alt Text)" style="margin-bottom: 5px; opacity: 1;">
	<div class="add_btn search_btn" style="float: none; display: inline-block; vertical-align: top; margin: 0;">انتخاب تصویر
		<input type="file" name="photos[]" id="tinymce_uploadphoto_input" style="position: absolute; top: 0; left: 0; display: block; width: 100%; height: 100%; opacity: 0; cursor: pointer;" multiple>
	</div>
	<input type="submit" class="reg_btn uploader_submit" value="بارگزاری">
</form>
<p class="info" id="uploader_photo_inf"></p>