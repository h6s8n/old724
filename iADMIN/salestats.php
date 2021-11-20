<?php
include "../connectioni.php";
mysqli_query($CON,"TRUNCATE `dj_salestats`") or die('error0: '.mysqli_error($CON));
mysqli_query($CON,"UPDATE `dj_products` SET `sales` = 0") or die('error1: '.mysqli_error($CON));
mysqli_query($CON,"UPDATE `user_accounts` SET `sales` = 0") or die('error2: '.mysqli_error($CON));
$proSales=[];
$query=mysqli_query($CON,"SELECT * FROM `dj_orders` WHERE `published` != -2 ORDER BY `ID` DESC");
while ($row=mysqli_fetch_array($query))
{
	$userTs=0;
	$cartObj=json_decode($row['cart'],true);
	foreach($cartObj as $i=>$cartRow)
	{
		mysqli_query($CON,"INSERT INTO `dj_salestats` (`productID`,`orderID`,`order_status`,`userID`,`color`,`size`,`astin`,`count`,`date`)
		VALUES ('".$cartRow['pro']."','".$row['ID']."','".$row['status']."','".$row['userID']."',
		'".$cartRow['opt']['color']."','".$cartRow['opt']['1']."','".$cartRow['opt']['3']."','".$cartRow['cnt']."','".$row['date']."')") or die('error3: '.mysqli_error($CON));
		
		$userTs+=$cartRow['cnt'];
		if (isset($proSales[$cartRow['pro']])) $proSales[$cartRow['pro']]+=$cartRow['cnt'];
		else $proSales[$cartRow['pro']]=$cartRow['cnt'];
	}
	$userQuery=mysqli_query($CON,"SELECT * FROM `user_accounts` WHERE `ID` = '".$row['userID']."'");
	$userRow=mysqli_fetch_array($userQuery);
	$userRow['sales']+=$userTs;
	mysqli_query($CON,"UPDATE `user_accounts` SET `sales` = '".$userRow['sales']."' WHERE `ID` = '".$row['userID']."'") or die('error6: '.mysqli_error($CON));
}
foreach ($proSales as $proID=>$salesCount)
	mysqli_query($CON,"UPDATE `dj_products` SET `sales` = '$salesCount' WHERE `ID` = '$proID'") or die('error7: '.mysqli_error($CON));
arsort($proSales);
print_r($proSales);
mysqli_close($CON);
?>