<?php
// session_start();
if ($_SESSION['msgt']=="" && $_SESSION['msgn']=="")
{
	header("location: https://724chap.com");
	exit;
	die();
}
?>

<div class="chap_header">
	<div class="container">
		<a href="index.php"><img src="img/logo.png" alt="724 چاپ"></a>
		<a href="index.php">خانه</a>
	</div>
</div>

<section id="chaap" class="section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="section-heading">
					<h2 class="section-title"><?= $_SESSION['msgt'] ?></h2>
					<p>
						<?= $_SESSION['msgn'] ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
unset($_SESSION['msgt'],$_SESSION['msgn']);
?>