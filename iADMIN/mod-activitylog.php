<!--a href="index.php?pid=dj160" class="add_btn">کد جدید</a-->
<h1>گزارش فعالیت های <?php if ($adminLog) echo "مدیران"; else echo "کاربران"; if ($actUser!="null" || $actType!="null") echo " (فیلتر شده)"; ?>:</h1>
<div style="clear: both"></div>

<div>
<table class="daTable" cellspacing="0" cellpadding="0">
	<tr>
		<td>فعالیت</td>
		<td class="responsiveToHide" style="width: 230px; text-align: center;">نام کاربری</td>
		<td class="responsiveToHide" style="width: 230px; text-align: center;">تاریخ</td>
	</tr>
	<tr><td colspan="3"></td></tr>
	<?php
	$counter=0;
	$page=intval($_GET['page']);
	if ($page<1) $page=1;
	$postInPage=500;
	if ($actUser=="empty") $actUser="";
	if ($adminLog)
	{
		if ($actUser!="null" && $actType!="null")
			$str="WHERE `admin_user` = '".$actUser."' AND `activity_type` = '".$actType."'";
		else if ($actUser!="null")
			$str="WHERE `admin_user` = '".$actUser."'";
		else if ($actType!="null")
			$str="WHERE `activity_type` = '".$actType."'";
		else
			$str="";
		$query=mysqli_query($CON,"SELECT * FROM `activitylog` $str ORDER BY `ID` DESC LIMIT ".(($page-1)*$postInPage).", $postInPage");
		$query4page=mysqli_query($CON,"SELECT * FROM `activitylog` $str ORDER BY `ID` DESC");
	}
	else
	{
		if ($actUser!="null" && $actType!="null")
			$str="WHERE `userID` = '".$actUser."' AND `activity_type` = '".$actType."'";
		else if ($actUser!="null")
			$str="WHERE `userID` = '".$actUser."'";
		else if ($actType!="null")
			$str="WHERE `activity_type` = '".$actType."'";
		else
			$str="";
		$query=mysqli_query($CON,"SELECT DISTINCT log.`logID`,log.`date`,log.`userID`,log.`body`,log.`activity_type`,users.`ID`,users.`first_name`,users.`last_name` FROM `user_accounts_log` as log INNER JOIN `user_accounts` as users ON log.`userID`=users.`ID` OR log.`userID` = 0 $str GROUP BY (log.`logID`) ORDER BY `logID` DESC LIMIT ".(($page-1)*$postInPage).", $postInPage");
		$query4page=mysqli_query($CON,"SELECT DISTINCT log.`logID`,log.`date`,log.`userID`,log.`body`,log.`activity_type`,users.`ID`,users.`first_name`,users.`last_name` FROM `user_accounts_log` as log INNER JOIN `user_accounts` as users ON log.`userID`=users.`ID` OR log.`userID` = 0 $str GROUP BY (log.`logID`) ORDER BY `logID` DESC");
	}
	$postCount=mysqli_num_rows($query4page);
	while ($row=mysqli_fetch_assoc($query))
	{
		if ($adminLog)
		{
			if (substr($row['body'],0,1)=="{")
				$details='<pre class="activity_body">'.print_r(json_decode($row['body'],true),true).'</pre>';
			else
				$details='<pre class="activity_body">'.$row['body'].'</pre>';
			
			$user='<a href="'.$indexFilename.'?pid=31&filter='.$actFilter_for_header.'&user='.$row['admin_user'].'&type='.$actType_for_header.'">'.$row['admin_user'].'</a>';
		}
		else
		{
			$details='<pre class="activity_body">'.print_r(json_decode($row['body'],true),true).'</pre>';
			if ($row['userID']!=0) $user='<a href="'.$indexFilename.'?pid=31&filter='.$actFilter_for_header.'&user='.$row['userID'].'&type='.$actType_for_header.'">'.$row['first_name'].' '.$row['last_name'].'</a> (<a href="'.$indexFilename.'?pid=261&id='.$row['userID'].'">مشخصات</a>)';
			else $user="";
			$row['ID']=$row['logID'];
		}
		$counter++;
	?>
	<tr id="row<?= $row['ID'] ?>">
		<td>
			<a class="fas fa-chevron-down" style="vertical-align: top; margin-top: 5px" href="javascript:void(0)" onclick="$('#row<?= $row['ID'] ?> .activity_body').toggle()"></a> <a href="<?= $indexFilename ?>?pid=31&filter=<?= $actFilter_for_header ?>&user=<?= $actUser_for_header ?>&type=<?= $row['activity_type'] ?>"><?= $row['activity_type'] ?></a>
			<?= $details ?>
			<div class="responsiveToShow"><span>نام کاربری:</span> <?= $user ?></div>
			<div class="responsiveToShow"><span>تاریخ:</span> <?= $jDate->date("j F Y / H:i",$row['date']) ?></div>
		</td>
		<td class="responsiveToHide"><?= $user ?></td>
		<td class="responsiveToHide" style="text-align: center;"><?= $jDate->date("j F Y / H:i",$row['date']) ?></td>
	</tr>
	<?php
	}
	?>
</table>
<?php
$postPages=ceil($postCount/$postInPage);
			
if ($postPages>1)
	echo '<div class="pagesparent"><a '.($page==1?"class='active'":"").' href="'.$indexFilename.'?pid=31&filter='.$actFilter_for_header.'&user='.$actUser_for_header.'&type='.$actType_for_header.'&page=1">'.replaceAll(1).'</a>';

$forStart=$page-2;
if ($forStart<=2) $forStart=2;
else echo "<span>...</span>";

$forEndDots="";
$forEnd=$page+2;
if ($forEnd>=$postPages-1) $forEnd=$postPages-1;
else $forEndDots="<span>...</span>";

for ($i=$forStart;$i<=$forEnd;$i++)
	echo '<a '.($page==$i?"class='active'":"").' href="'.$indexFilename.'?pid=31&filter='.$actFilter_for_header.'&user='.$actUser_for_header.'&type='.$actType_for_header.'&page='.$i.'">'.replaceAll($i).'</a>';

echo $forEndDots;
if ($postPages>1)
	echo '<a '.($page==$postPages?"class='active'":"").' href="'.$indexFilename.'?pid=31&filter='.$actFilter_for_header.'&user='.$actUser_for_header.'&type='.$actType_for_header.'&page='.$postPages.'">'.replaceAll($postPages).'</a></div>';
?>
</div>
<script type="text/javascript">
$(".daTable").before($(".pagesparent").clone());
</script>
<?php
if ($counter==0) echo ('<div class="info">هیچ موردی یافت نشد.</div>');
?>