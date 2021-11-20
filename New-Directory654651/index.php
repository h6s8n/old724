<?php
include "connectioni.php";
?>
<!DOCTYPE html>
<html lang="fa-ir">
<head>
    <!--// Meta Tags //-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>محاسبه آنلاین هزینه چاپ کتاب | چاپ مقاله و کتاب شعر | 724 چاپ</title>
    <meta name="description" content="محاسبه آنلاین هزینه چاپ کتاب و کتاب شعر | محاسبه آنلاین چاپ مقاله | اولین و کاملترین سیستم خودکار محاسبه آنلاین چاپ کتاب | 724 چاپ" />
    <link rel="canonical" href="https://724chap.com/" />
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Strat-->
	<meta prefix="og: http://ogp.me/ns#" property="og:title" content="724 چاپ" />
	<meta prefix="og: http://ogp.me/ns#" property="og:image" content="https://www.724chap.com/img/logo.png" />
	<meta prefix="og: http://ogp.me/ns#" property="og:description" content="محاسبه آنلاین هزینه چاپ کتاب و کتاب شعر | محاسبه آنلاین چاپ مقاله | اولین سیستم خودکار محاسبه آنلاین چاپ کتاب | 724 چاپ" />
	<meta prefix="og: http://ogp.me/ns#" property="og:url" content="https://www.724chap.com/" />
	<meta prefix="og: http://ogp.me/ns#" property="og:type" content="website" />
	<meta prefix="og: http://ogp.me/ns#" property="og:site_name" content="724 چاپ"/>
	<!-- Open Graph End-->
	
    <!--// Icons //-->
    <link rel="stylesheet" href="fonts/flat_icons/flaticon.css">
    <link rel="stylesheet" href="fonts/font_awesome/css/all.css">
    
	<?php /*
    <!-- // Google Fonts // -->
    <link
       href="https://fonts.googleapis.com/css؟family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
       rel="stylesheet">
    <link
       href="https://fonts.googleapis.com/css؟family=Roboto:400,400i,500,500i,700,700i&amp;display=swap&amp;subset=latin-ext"
       rel="stylesheet">
	*/ ?>
    
    <link rel="stylesheet" href="css/frameworks.css">
    <link rel="stylesheet" href="css/style.css">
    
    <!-- FavIcon -->
    <link rel="shortcut icon" type="image/jpg" href="img/favicon.png"/>
    
    <!-- Search Console -->
    <meta name="google-site-verification" content="kNRt3Bx5-x03BHWaSU4m3gYxnSobRQJOooU1uUi0-BQ" />
    
    <!-- start GOFTINO code -->
    <script type="text/javascript">
      !function(){var a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/asFtZU",l=localStorage.getItem("goftino");g.type="text/javascript",g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
    </script>
    <!-- end GOFTINO code -->
</head>

<body data-spy="scroll" data-target="#fixedNavbar" data-offset="70">
	<?php
	switch($_GET['page'])
	{
		case "invoice":
			include "page_invoice.php";
			break;
			
		default:
			include "main.php";
	}
	?>
    
    <!--// Dropdown Content End //-->

    <!-- Start Footer -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 footer-widget">
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="copyright-text text-center">© تمامی حقوق برای <a href="https://724chap.com">724 چاپ</a> محفوظ است</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
	
	
	<div id="msgbox" style="position: fixed; height: 100%; width: 100%; top:0; left:0; display: none; z-index: 1030">
		<div style="position: absolute; width: 100%; height: 100%; left:0; top:0; background-color: black; opacity: 0.6" onclick="$('#msgbox').hide();"></div>
		<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); width: 300px; background-color: white; border: 1px gray solid; border-radius: 10px; padding: 10px; box-sizing: border-box;">
			<table style="height: 120px; width: 100%;" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top" style="background-color: #F5F5F5; padding: 5px;">
					<p style="line-height: normal; direction: rtl; font-family: iransans; font-size: 12px; text-align: right; color: black" id="msgboxnote"></p>
					</td>
				</tr>
				<tr style="height: 25px;">
					<td valign="bottom">
						<p dir="ltr" align="left" style="line-height: normal; text-align: left; font-family: iransans; font-size: 12px;" id="msgboxtick"><a style="color: black" onkeyup="if (event.keyCode == 27) $('#msgbox').hide();" id="msgboxbutton" href="javascript:void(0);" onclick="$('#msgbox').hide();">بستن</a></p>
					</td>
				</tr>
			</table>
		</div>
	</div>
	

    <a href="#" data-scroll-goto="1" class="scroll-top-btn"><i class="fa fa-arrow-up"></i></a>
    <!--// Scroll Top Btn  //-->

    <div class="preloader-wrap">
        <div class="preloader-inner">
            <div id="loader"></div>
        </div>
    </div>
    <!--// Preloader  //-->

    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>


</html>