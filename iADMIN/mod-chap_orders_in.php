<h1>سفارش شماره <?= $_GET['id'] ?></h1>
<div style="clear: both"></div>
<?php
$query = mysqli_query($CON, "SELECT * FROM `chap_orders` WHERE `ID`='" . $_GET['id'] . "'");
$row = mysqli_fetch_assoc($query);
$info = json_decode($row["invoice_details"]);
?>
<div class="container">
    <p><span>تاریخ: </span><?= $jDate->date("l j F Y / H:i", $row['date']) ?></p>
    <p><span>نام: </span><?= $row['full_name'] ?></p>
    <p><span>شماره تماس: </span><?= $row['cellphone'] ?></p>
    <p><span>وضعیت پرداخت: </span>
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
    </p>
    <?php
        for ($i=1;$i<=10;$i++)
        {
            $underlines="";
            for($j=1;$j<$i;$j++)
                $underlines.="_";
            $filename="../u53rUpl0ad55/order".$row['ID'].$underlines.".zip";
            // echo $filename;
            if (file_exists($filename))
			{
				if ($i>1) $iStr=" ".$i;
				else $iStr="";
                echo '<p><a href="'.$filename.'">فایل بارگزاری شده'.$iStr.'</a></p>';
			}
        }
        ?>
    
    <?php foreach ($info as $key => $val) {
        echo "<p><span> " . $val[0] . ":</span> " . $val[1] . "</p>";
    } ?>
    <a href="<?= $indexFilename ?>?pid=hc20" class="back_btn" style="float: right;">بازگشت</a>
    <div style="clear: both"></div>
</div>
<style>
    .container {
        padding: 20px;
    }

    .container>p {
        padding: 10px 0;
    }

    .container>p>span {
        font-weight: bold;
        color: #6a7189
    }

    .back_btn {
        box-sizing: border-box;
        padding: 10px 20px;
        background-color: #bdbdbd;
        border: 1px solid #848484;
        border-radius: 6px;
        text-align: center;
        color: #1a223a !important;
        font-weight: 500;
    }

    .back_btn:hover {
        background-color: #1a223a;
        color: #fff !important;
    }
</style>