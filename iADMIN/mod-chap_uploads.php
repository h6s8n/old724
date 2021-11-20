<h1>فایلهای چاپی</h1>
<div style="clear: both"></div>

<div>
    <table class="daTable" cellspacing="0" cellpadding="0">
        <tr>
            <td>مشخصات</td>
            <td style="text-align: right;">فایل Word</td>
            <td>فایل PDF</td>
            <td>فایل ZIP</td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <?php
        $counter = 0;
        $query = mysqli_query($CON, "SELECT * FROM `ups` ORDER BY `ID` DESC");
        while ($row = mysqli_fetch_array($query)) {
            $counter++;
        ?>
            <tr id="row<?= $row['ID'] ?>">
                <td>
					سفارش دهنده: <b style="color: blue;"><?= $row['personName'] ?></b><br>
					نام کتاب: <b style="color: brown;"><?= $row['bookName'] ?></b><br>
					زمان آپلود: <b style="color: gray;"><?php if ($row['date']!=0) echo $jDate->date("l j F Y / H:i", $row['date']); else echo '-'; ?></b><br>
				</td>
                <td style="text-align: right;">
					<?php
					if ($row['filename_word']!="" && file_exists('../u53rUpl0ad54/'.$row['filename_word'])) echo '<a href="../u53rUpl0ad54/'.$row['filename_word'].'" download>';
					echo $row['filename_word'];
					if ($row['filename_word']!="" && file_exists('../u53rUpl0ad54/'.$row['filename_word'])) echo '</a>'
					?>
				</td>
                <td>
					<?php
					if ($row['filename_pdf']!="" && file_exists('../u53rUpl0ad54/'.$row['filename_pdf'])) echo '<a href="../u53rUpl0ad54/'.$row['filename_pdf'].'" download>';
					echo $row['filename_pdf'];
					if ($row['filename_pdf']!="" && file_exists('../u53rUpl0ad54/'.$row['filename_pdf'])) echo '</a>'
					?>
				</td>
                <td>
					<?php
					if ($row['name']!="" && file_exists('../u53rUpl0ad54/'.$row['name'])) echo '<a href="../u53rUpl0ad54/'.$row['name'].'" download>';
					echo $row['name'];
					if ($row['name']!="" && file_exists('../u53rUpl0ad54/'.$row['name'])) echo '</a>'
					?>
				</td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
<?php
if ($counter == 0) echo ('<div class="info">هیچ فایلی آپلود نشده است.</div>');
?>