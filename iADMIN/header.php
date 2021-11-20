<header align="center">
	<div class="deyhimlogo" style=""></div>
	<!--div class="tagline"><span>DEYHIM</span>&nbsp; |&nbsp; SOMETHING PROFESSIONAL</div-->
	<div class="tagline"><b>THE CC</b>&nbsp; |&nbsp; PHP FRAMEWORK<br><span>V 1.0.0 | Use the latest version of Mozilla Firefox for the best experience and less problems!</span></div>
	<div class="title">
		<div onmouseover="tooltip('منوی دسترسی')" onmouseout="hidett();" class="fa fa-bars navminmaxbtn" onclick="nav_toggle();"></div>
		<a onmouseover="tooltip('داشبورد')" onmouseout="hidett();" href="<?= $indexFilename ?>" class="fa fa-dashboard navminmaxbtn"></a>
		<a onmouseover="tooltip('خروج از درگاه')" onmouseout="hidett();" href="logout.php" class="fa fa-power-off navminmaxbtn" style="padding-top: 1px;"></a>
		<p>درگاهِ تنظیمات و مدیریتِ محتوای وبسایت... <?php /* if ($_SESSION['loggedin']=='true') echo '<span>administrator</span>' */ ?></p>
	</div>
	<div class="besmela"></div>
</header>