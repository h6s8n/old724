<?php
//index page for Meftah.com

include "handler.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta name="robots" content="noindex,nofollow"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<title><?= $pagemetas['title'] ?> | TheCC</title>
	
	<link rel="stylesheet" type="text/css" href="style-990410-2.css"/>
	<link rel="stylesheet" type="text/css" href="style-about.css"/>
	<link rel="stylesheet" type="text/css" href="style-v1,1-981005.css"/>
	<link rel="shortcut icon" href="images/deyicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="font-awesome-5.13.0-all.min.css">
	<link rel="stylesheet" href="font-awesome.min.css" />
	
	<script type="text/javascript" src="jquery.js"></script>
	<?php
	//list all new PIDs that are using the new tinyMCE
	$PIDsWithNewTinyMCE=[
		"12", "110", "111", "160", "161", "180", "181", "210", "211", "270", "271", "320", "321", "330", "331",
		"ab270", "ab101", "dp100", "dp101", "dp110", "dp111", "so110", "so111", "ka100", "ka101", 
		"dj110", "dj111", "dj120", "dj121", "sy100", "sy101", "sy110", "sy111", "ch100", "ch101",
		"mf100", "mf101", "mf110", "mf111", "mf120", "mf121", "mf130", "mf131",
		"oi100", "oi101"
	];
	if (!in_array($pid,$PIDsWithNewTinyMCE)) echo ('<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>');
	else
	{
	?>
	<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
	var daEditor;
	function tinymce_bind(elementsStr)
	{
		if (elementsStr==undefined) elementsStr="field_body,field_engbody";
		tinyMCE.init({
			mode : "exact",
			elements : elementsStr,
			plugins : "directionality paste link image code anchor",
			menubar: "file",
			paste_as_text : true,
			toolbar : "formatselect bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | outdent indent | undo redo | anchor link unlink code removeformat | image uploadphoto insertvideo insertpernum",
			block_formats: 'Paragraph=p;Header 2=h2;Header 3=h3;Header 4=h4',
			relative_urls : false,
			document_base_url : "<?= $GLOBALS['rootPath'] ?>inline_photos/",
			<?php if ($english_content==1) echo 'skin: "lightgrayenglish", '; ?>
			setup: function(ed) {
				ed.addButton('uploadphoto', {
					title : 'بارگزاری تصویر',
					image : 'images/tinymce-uploadphoto.png',
					onclick : function() {
						show_misc_pane('tinymce_uploadphoto.php');
					}
				});
				ed.addButton('insertvideo', {
					title : 'درج ویدئو',
					image : 'images/tinymce-insertvideo.png',
					onclick : function() {
						show_misc_pane('tinymce_insertvideo.php');
					}
				});
				ed.addButton('insertpernum', {
					title : 'درج/تبدیل اعداد فارسی',
					image : 'images/tinymce-insertpernum.png',
					onclick : function() {
						if (ed.selection.getContent()=="")
							show_misc_pane('tinymce_insertpernum.php');
						else
						{
							ed.selection.setContent(replaceAll(ed.selection.getContent()));
							simple_msgbox('اعدادِ لاتینِ  تکه‌متنِ انتخاب شده به فارسی تبدیل شدند');
						}
					}
				});
			}
		});
	}
	<?php if ($pagemetas['tinyMCE']) echo 'tinymce_bind();'; ?>
	</script>
	<?php
	}
	?>
	<script type="text/javascript">
	english_site=<?= $english_site ?>;
	news_has_rutitr=<?= $news_has_rutitr ?>;
	news_has_summary=<?= $news_has_summary ?>;
	news_default_cat=<?= $news_has_cat ?>;
	PusheIncluded=false;
	</script>
	<script type="text/javascript" src="scripts-981126.js"></script>
	<script type="text/javascript" src="formControllers-981004.js"></script>
</head>
<body onmousemove="mover(event)">
<div id="overall_loading"></div>
<div style="position: absolute; height: 0; width: 0; overflow: hidden;" id="cachestuff">
	<div style="background-image: url(images/pane_closebtn.png)"></div>
	<iframe name="daFrame" id="daFrame"></iframe>
</div>
<?php
include "header.php";
?>

<div id="right_pane" class="min" onmousedown="nav_maximise();">
	<nav>
		<a onmouseover="tooltip('تنظیمات',true)" onmouseout="hidett();" href="<?= $indexFilename ?>?pid=99" class="item <?php if ($pagemetas['navhover']=="99") echo "active" ?>"><i class="fa fa-gear"></i>تنظیمات</a>
		
		<a href="<?= $indexFilename ?>?pid=hc12" onmouseover="tooltip('پست های وبلاگ',true)" onmouseout="hidett();" class="item <?php if ($pagemetas['navhover']=="hc12") echo "active" ?>" id="navhc12"><i class="fa fa-newspaper-o"></i>پست های وبلاگ</a>
		
		<div onmouseover="tooltip('پارامترهای چاپ',true)" onmouseout="hidett();" class="item <?php if ($pagemetas['navhover']=="hc10") echo "active" ?>" id="navhc10" onmousedown="toggle_submenu('hc10'); return false;"><i class="fa fa-check-square-o"></i>پارامترهای چاپ</div>
		<div class="submenu" id="submenuhc10">
			<a href="<?= $indexFilename ?>?pid=hc10" class="item <?php if ($pid=="hc10") echo "active" ?>"><div></div>فهرست پارامترها</a>
			<a href="<?= $indexFilename ?>?pid=hc100" class="item <?php if ($pid=="hc100") echo "active" ?>"><div></div>پارامتر جدید</a>
			<div class="item" onclick="show_guide('404')"><div></div>راهنما</div>
		</div>

		<div onmouseover="tooltip('سفارشات',true)" onmouseout="hidett();" class="item <?php if ($pagemetas['navhover']=="hc20") echo "active" ?>" id="navhc20" onmousedown="toggle_submenu('hc20'); return false;"><i class="fas fa-cash-register"></i>سفارشات</div>
		<div class="submenu" id="submenuhc20">
			<a href="<?= $indexFilename ?>?pid=hc20" class="item <?php if ($pid=="hc20") echo "active" ?>"><div></div>فهرست سفارشات</a>
			<a href="<?= $indexFilename ?>?pid=hc11" class="item <?php if ($pid=="hc11") echo "active" ?>"><div></div>فایل های چاپی</a>
			<div class="item" onclick="show_guide('404')"><div></div>راهنما</div>
		</div>
		
		<div onmouseover="tooltip('دسته بندی مطالب',true)" onmouseout="hidett();" class="item <?php if ($pagemetas['navhover']=="18") echo "active" ?>" id="nav18" onmousedown="toggle_submenu(18); return false;"><i class="fa fa-sitemap"></i>دسته بندی مطالب</div>
		<div class="submenu" id="submenu18">
			<a href="<?= $indexFilename ?>?pid=18&db=chap_parameters" class="item <?php if ($pid=="18" && $cat_db=="chap_parameters") echo "active" ?>"><div></div>دسته بندی پارامترها</a>
			<a href="<?= $indexFilename ?>?pid=180&db=chap_parameters" class="item <?php if ($pid=="180" && $cat_db=="chap_parameters") echo "active" ?>"><div></div>افزودن دسته بندی پارامترها</a>
		</div>
		
		<a href="<?= $indexFilename ?>?pid=30" onmouseover="tooltip('پیامک های ارسال شده',true)" onmouseout="hidett();" class="item <?php if ($pagemetas['navhover']=="30") echo "active" ?>" id="nav30"><i class="fas fa-sms"></i>پیامک های ارسال شده</a>
		
		<div onmouseover="tooltip('گزارش فعالیت ها',true)" onmouseout="hidett();" class="item <?php if ($pagemetas['navhover']=="31") echo "active" ?>" id="nav31" onmousedown="toggle_submenu('31'); return false;"><i class="fas fa-user-secret"></i>گزارش فعالیت ها</div>
		<div class="submenu" id="submenu31">
			<a href="<?= $indexFilename ?>?pid=31&filter=users" class="item <?php if ($pid=="310") echo "active" ?>"><div></div>گزارش فعالیت های کاربران</a>
			<a href="<?= $indexFilename ?>?pid=31&filter=admins" class="item <?php if ($pid=="311") echo "active" ?>"><div></div>گزارش فعالیت های مدیران</a>
		</div>
		
		<div onmouseover="tooltip('راه های تماس',true)" onmouseout="hidett();" class="item <?php if ($pagemetas['navhover']=="21") echo "active" ?>" id="nav21" onmousedown="toggle_submenu('21'); return false;"><i class="fa fa-location-arrow"></i>راه های تماس</div>
		<div class="submenu" id="submenu21">
			<a href="<?= $indexFilename ?>?pid=21" class="item <?php if ($pid=="21") echo "active" ?>"><div></div>فهرست راه های تماس</a>
			<?php if ($contactways_add_permission=="1") { ?><a href="<?= $indexFilename ?>?pid=210" class="item <?php if ($pid=="210") echo "active" ?>"><div></div>راه تماس جدید</a><?php } ?>
			<div class="item" onclick="show_guide('contactways')"><div></div>راهنما</div>
		</div>
		
		<div onmouseover="tooltip('شبکه های اجتماعی',true)" onmouseout="hidett();" class="item <?php if ($pagemetas['navhover']=="25") echo "active" ?>" id="nav25" onmousedown="toggle_submenu('25'); return false;"><i class="fa fa-group"></i>شبکه های اجتماعی</div>
		<div class="submenu" id="submenu25">
			<a href="<?= $indexFilename ?>?pid=25" class="item <?php if ($pid=="25") echo "active" ?>"><div></div>فهرست شبکه های اجتماعی</a>
			<div class="item" onclick="show_guide('contactsocials')"><div></div>راهنما</div>
		</div>
		<?php /*
		<a href="logout.php" class="logout_btn">خروج</a>
		<div class="version">Use FireFox | V 0.1.1</div>
		*/ ?>
	</nav>
	<?php
	if ($pagemetas['navhover']!="")
	{
	?>
	<script type="text/javascript">
		// show_submenu('<?= $pagemetas['navhover'] ?>');
		$("nav").scrollTop($("#nav<?= $pagemetas['navhover'] ?>")[0].offsetTop-35);
	</script>
	<?php
	}
	?>
	<div id="guide_pane">
		<p class="info">لطفاً شکیبا باشید، در حال بارگزاری...</p>
	</div>
	<id id="pane_closebtn" onclick="hide_guide()"></div>
</div>

<section class="min">
	
<?php
if (isset($_SESSION['admin_done']) && $_SESSION['admin_done']==1)
{
	echo('<div id="successful" onclick="close_msgbox()">عملیات با موفقیت به انجام رسید.</div>');
	$_SESSION['admin_done']=0;
}
else if (isset($_SESSION['admin_done']) && $_SESSION['admin_done']==-1)
{
	echo('<div id="successful" onclick="close_msgbox()">عملیات با خطا مواجه شد و تغییراتِ درخواستی ثبت نشد</div>');
	$_SESSION['admin_done']=0;
}
else if (isset($_SESSION['admin_done']) && mb_strlen($_SESSION['admin_done'],'utf-8')>=3)
{
	echo('<div id="successful" onclick="close_msgbox()">'.$_SESSION['admin_done'].'</div>');
	$_SESSION['admin_done']=0;
}
else
{
	echo('<div id="successful" style="top: -33px" onclick="close_msgbox()"></div>');
}

include $pagemetas['include'];

if ($english_content==1)
{
?>
<script type="text/javascript">
	$(".formTable input[type=text], .formTable input[type=password], .formTable textarea, .formTable select").css({
		"direction": "ltr",
		"text-align": "left"
	});
	$(".tag_input").css({
		"direction": "ltr",
		"text-align": "right"
	});
</script>
<?php
}
activitylog(1,$_SERVER['REQUEST_URI']);
?>
	<div style="height: 22px;"></div>
</section>

<div id="msgbox" style="position: fixed; height: 100%; width: 100%; top:0; left:0; display: none; z-index: 4">
	<div style="position: absolute; width: 100%; height: 100%; left:0; top:0; background-color: black; opacity: 0.6" onclick="$('#msgbox').hide();"></div>
	<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); width: 300px; background-color: white; border: 1px gray solid; border-radius: 10px; padding: 10px; box-sizing: border-box;">
		<table style="height: 120px; width: 100%;" cellpadding="0" cellspacing="0">
			<tr>
				<td valign="top" style="background-color: #F5F5F5; padding: 5px;">
				<p style="direction: rtl; font-family: IRANSans; font-size: 12px; text-align: right; color: black" id="msgboxnote"></p>
				</td>
			</tr>
			<tr style="height: 25px;">
				<td valign="bottom">
					<p dir="ltr" align="left" style="text-align: left; font-family: IRANSans; font-size: 12px;" id="msgboxtick"><a style="color: black" onkeyup="if (event.keyCode == 27) $('#msgbox').hide();" id="msgboxbutton" href="javascript:void(0);" onclick="$('#msgbox').hide();">بستن</a></p>
				</td>
			</tr>
		</table>
	</div>
</div>

<div id="tooltip"></div>
</body>
</html>