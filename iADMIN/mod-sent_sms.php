<!--a href="index.php?pid=dj160" class="add_btn">کد جدید</a-->
<h1>پیامک های ارسال شده:</h1>
<div style="clear: both"></div>

<?php /*<div class="daResTable">
	<div class="daResRow daResFirstRow">
		<div class="daResCell">متن پیام</div>
		<div class="daResCell">گیرنده</div>
		<div class="daResCell">تاریخ</div>
	</div>
</div>*/ ?>

<div>
<table class="daTable" cellspacing="0" cellpadding="0">
	<tr>
		<td>متن پیام</td>
		<td class="responsiveToHide" style="width: 110px;">گیرنده</td>
		<td class="responsiveToHide" style="width: 230px; text-align: center;">تاریخ</td>
	</tr>
	<tr><td colspan="3"></td></tr>
	<?php
	$counter=0;
	$query=mysqli_query($CON,"SELECT * FROM `sent_sms` ORDER BY `ID` DESC");
	while ($row=mysqli_fetch_array($query))
	{
		if ($row['cellphone']=='9199837091') continue;
		$counter++;
	?>
	<tr id="row<?= $row['ID'] ?>">
		<td>
			<?= str_replace("\r\n","<br>",$row['body']) ?>
			<div class="responsiveToShow"><span>گیرنده:</span> <?= $row['cellphone'] ?></div>
			<div class="responsiveToShow"><span>تاریخ:</span> <?= $jDate->date("j F Y / H:i",$row['date']) ?></div>
		</td>
		<td class="responsiveToHide"><?= $row['cellphone'] ?></td>
		<td class="responsiveToHide" style="text-align: center;"><?= $jDate->date("j F Y / H:i",$row['date']) ?></td>
	</tr>
	<?php
	}
	?>
</table>
</div>
<?php
if ($counter==0) echo ('<div class="info">هیچ موردی یافت نشد.</div>');
?>