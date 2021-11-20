<h1 style="float: right">سفارشات</h1>
<form action="index.php" method="GET" style="float: right; margin-top: 12px;">
	<input type="text" name="q">
	<input type="hidden" name="pid" value="hc20">
	<input type="submit" value="جستجو">
</form>
<div style="clear: both"></div>

<div>
    <table class="daTable" cellspacing="0" cellpadding="0">
        <tr>
            <td>شماره سفارش</td>
            <td style="text-align: center;">زمان</td>
            <td>نام سفارش دهنده</td>
            <td>شماره موبایل</td>
            <td>وضعیت پرداخت</td>
            <td>مشاهده</td>
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <?php
        $counter = 0;
		$queryStr="SELECT * FROM `chap_orders` ORDER BY `ID` DESC";
		if (isset($_GET['q']))
		{
			if (mb_strlen($_GET['q'],'utf-8')>=3)
				$queryStr="SELECT * FROM `chap_orders` WHERE `ID` = '".$_GET['q']."' OR `full_name` LIKE '%".$_GET['q']."%' OR `cellphone` LIKE '%".$_GET['q']."%' ORDER BY `ID` DESC";
			else
			echo '<script>$(document).ready(function(){msgbox("عبارتِ جستجو باید حداقل 3 کاراکتر داشته باشد.");})</script>';
		}
		$query = mysqli_query($CON,$queryStr);
        while ($row = mysqli_fetch_array($query)) {
            $counter++;
        ?>
            <tr id="row<?= $row['ID'] ?>">
                <td><?= $row['ID'] ?></td>
                <td><?= $jDate->date("l j F Y / H:i", $row['date']) ?></td>
                <td><?= $row['full_name'] ?></td>
                <td><?= $row['cellphone'] ?></td>
                <td>
                    <?php
                    $query2 = mysqli_query($CON, "SELECT * FROM `chap_orders_payment` WHERE `orderID` = '" . $row['ID'] . "' ORDER BY `ID` DESC");
                    $row2 = mysqli_fetch_array($query2);
                    if ($row2['status'] == 1)
                        echo "<span style='font-weight: bold; color: red;'>پرداخت شده</span>";
                    else if ($row2=="")
                        echo "پرداخت نشده";
                    else if ($row2['status'] == 0)
                        echo "پرداخت نشده/ناموفق";
                    ?>
                </td>
                <td><a href="<?= $indexFilename ?>?pid=hc200&id=<?= $row['ID'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
<?php
if ($counter == 0) echo ('<div class="info">هیچ سفارشی جهت پیگیری وجود ندارد.</div>');
?>