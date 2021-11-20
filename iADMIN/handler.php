<?php
session_start();

$useragent=$_SERVER['HTTP_USER_AGENT'];
if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
{
	$mobileattempt=$_SESSION['mobileattempt'];
	if (!is_numeric($mobileattempt) || $mobileattempt<3)
	{
		// header('location: error.php');
		// exit;
	}
}

include "../connectioni.php";
include "jdatetime.class.php";
include "functions.php";
date_default_timezone_set("Asia/Tehran");
$jDate = new jDateTime(true, true, 'Asia/Tehran');

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$GLOBALS['rootPath']=substr($actual_link,0,strpos($actual_link,"iADMIN")); //rootPath mishe ye folder balatar az folderi ke ba iADMIN shuru beshe
$URIobj=explode("/",$_SERVER['REQUEST_URI']);
foreach($URIobj as $i=>$val)
{
	$dotphpPos=stripos($val,".php");
	if ($dotphpPos) $GLOBALS['indexFilename']=$indexFilename=substr($val,0,$dotphpPos+4);
}
if ($indexFilename=="") $GLOBALS['indexFilename']=$indexFilename="index.php";

check_login();


// "has something" variable values: ID of default category for some module | 0 means cats are disabled
$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 12"); $row=mysqli_fetch_array($query);
	$english_content=intval($row['body']);

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 2"); $row=mysqli_fetch_array($query);
	$english_site=intval($row['body']);

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 3"); $row=mysqli_fetch_array($query);
	$tag_activated=intval($row['body']);

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 4"); $row=mysqli_fetch_array($query);
	$news_has_rutitr=intval($row['body']);

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 5"); $row=mysqli_fetch_array($query);
	$news_has_summary=intval($row['body']);

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 6"); $row=mysqli_fetch_array($query);
	$news_has_cat=intval($row['body']); 

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 22"); $row=mysqli_fetch_array($query);
	$downloads_has_cat=intval($row['body']); 

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 7"); $row=mysqli_fetch_array($query);
	$abou_news_has_cat=intval($row['body']); 

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 16"); $row=mysqli_fetch_array($query);
	$meftah_training_has_cat=intval($row['body']); 

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 18"); $row=mysqli_fetch_array($query);
	$meftah_jobs_has_cat=intval($row['body']); 

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 24"); $row=mysqli_fetch_array($query);
	$meftah_products_has_cat=intval($row['body']); 

//$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 19"); $row=mysqli_fetch_array($query);
//	$oit_news_has_cat=intval($row['body']);

//$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 21"); $row=mysqli_fetch_array($query);
//	$oit_products_has_cat=intval($row['body']);

//$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 25"); $row=mysqli_fetch_array($query);
//	$farsnet_projects_has_cat=intval($row['body']);

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 14"); $row=mysqli_fetch_array($query);
	$slide_has_body=intval($row['body']);
	
$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 20"); $row=mysqli_fetch_array($query);
	$slide_has_logo=intval($row['body']);
	
$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 15"); $row=mysqli_fetch_array($query);
	$slide_supports_video=intval($row['body']);
	
$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 17"); $row=mysqli_fetch_array($query);
	$slide_supports_mobile_photo=intval($row['body']);

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 26"); $row=mysqli_fetch_array($query);
	$contactways_add_permission=intval($row['body']);

//$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 27"); $row=mysqli_fetch_array($query);
//	$farsnet_products_has_cat=intval($row['body']);

$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 28"); $row=mysqli_fetch_array($query);
	$chap_parameters_has_cat=intval($row['body']);


$pid=$_REQUEST['pid'];
$pagemetas=[
	"include"=>"",
	"title"=>"",
	"nav_hover"=>"",
	"tinyMCE"=>true
];

switch ($pid)
{
	case "":
		$pagemetas['include']="dashboard.php";
		$pagemetas['title']="داشبورد";
		break;
	
	case "98":
		$pagemetas['include']="mod-mehregan_misc.php";
		$pagemetas['title']="تغییر رمز پنل";
		$pagemetas['navhover']=98;
		break;
		
	case "981":
		$pagemetas['include']="mod-mehregan_mails.php";
		$pagemetas['title']="ایمیل ها";
		$pagemetas['navhover']=98;
		break;
	
	case "99":
		$pagemetas['include']="mod-majma_misc.php";
		$pagemetas['include']="mod-settings.php";
		$pagemetas['title']="سایر تنظیمات";
		$pagemetas['navhover']=99;
		break;

	case "18":
		$pagemetas['include']="mod-cats.php";
		$cat_db=$_GET['db'];
		$valid_dbs=["chap_parameters"];
		if (!in_array($cat_db,$valid_dbs)) { header("location: ".$GLOBALS['indexFilename']); exit; }
		switch ($cat_db)
		{
			case "chap_parameters":
				$cat_db_fa="پارامترها";
				$default_cat_row_in_misc=28;
				break;
		}
		$pagemetas['title']="دسته بندی ".$cat_db_fa;
		$pagemetas['navhover']=18;
		break;
		
	case "180":
		$pagemetas['include']="mod-cats2.php";
		$cat_db=$_GET['db'];
		$valid_dbs=["chap_parameters"];
		if (!in_array($cat_db,$valid_dbs)) { header("location: ".$GLOBALS['indexFilename']); exit; }
		switch ($cat_db)
		{
			case "chap_parameters":
				$cat_db_fa="پارامترها";
				break;
		}
		$pagemetas['title']="افزودن دسته برای ".$cat_db_fa;
		$pagemetas['navhover']=18;
		break;
		
	case "181":
		$pagemetas['include']="mod-cats2.php";
		$daID=$_GET['id'];
		$Query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `published` != -2 AND `ID` = $daID");
		$Row=mysqli_fetch_array($Query);
		if ($Row=="")
		{
			header("location: ".$GLOBALS['indexFilename']);
			exit;
		}
		$cat_db=$Row['db'];
		$valid_dbs=["chap_parameters"];
		if (!in_array($cat_db,$valid_dbs)) { header("location: ".$GLOBALS['indexFilename']); exit; }
		switch ($cat_db)
		{
			case "chap_parameters":
				$cat_db_fa="پارامترها";
				break;
		}
		$pagemetas['title']="ویرایش دسته برای ".$cat_db_fa;
		$pagemetas['navhover']=18;
		break;
		
	case "25":
		$pagemetas['include']="mod-contactsocials.php";
		$pagemetas['title']="شبکه های اجتماعی";
		$pagemetas['navhover']=25;
		break;
		
	case "251":
		$pagemetas['include']="mod-contactsocials2.php";
		$daID=$_GET['id'];
		$Query=mysqli_query($CON,"SELECT * FROM `contactsocials` WHERE `ID` = $daID");
		$Row=mysqli_fetch_array($Query);
		if ($Row=="")
		{
			header("location: ".$GLOBALS['indexFilename']);
			exit;
		}
		$pagemetas['title']="ویرایش شبکه اجتماعی";
		$pagemetas['navhover']=25;
		break;
		
	case "26": case "dj191":
		$pagemetas['include']="mod-user_accounts.php";
		$pagemetas['title']="کاربران/اعضا";
		if ($pid==26) $pagemetas['navhover']=26;
		else $pagemetas['navhover']="dj15";
		break;
		
	case "261":
		$pagemetas['include']="mod-user_accounts2.php";
		$daID=$_GET['id'];
		$Query=mysqli_query($CON,"SELECT * FROM `user_accounts` WHERE `ID` = $daID");
		$Row=mysqli_fetch_array($Query);
		if ($Row=="")
		{
			header("location: ".$GLOBALS['indexFilename']);
			exit;
		}
		$pagemetas['title']="اطلاعات کاربر/عضو";
		$pagemetas['navhover']=26;
		break;
				
	case "30":
		$pagemetas['include']="mod-sent_sms.php";
		$pagemetas['title']="پیامک های ارسال شده";
		$pagemetas['navhover']=30;
		break;
		
	case "31":
		$pagemetas['include']="mod-activitylog.php";
		$pagemetas['title']="گزارش فعالیت های کاربران";
		$pagemetas['navhover']=31;
		
		$checker=0;
		
		$actFilter=$_GET['filter'];
		if ($actFilter=="admins") {$adminLog=true; $actFilter_for_header=$actFilter;}
		else if ($actFilter=="users") {$adminLog=false; $actFilter_for_header=$actFilter;}
		else {$actFilter_for_header="admins"; $checker=1;}
		
		$actType=$_GET['type'];
		if ($actType=="") { $actType_for_header="null"; $checker=1; }
		else $actType_for_header=$actType;
		
		$actUser=$_GET['user'];
		if ($actUser=="") { $actUser_for_header="null"; $checker=1; }
		else $actUser_for_header=$actUser;

		if ($checker==1)
		{
			header("location: ".$GLOBALS['indexFilename']."?pid=31&filter=$actFilter_for_header&user=$actUser_for_header&type=$actType_for_header");
			exit;
		}
		break;
		
	case "hc10":
		$pagemetas['include']="mod-chap_parameters.php";
		$pagemetas['title']="فهرست پارامترها";
		$pagemetas['navhover']="hc10";
		$checker=0;
		$cat_newslist_id=$_GET['cat'];
		$cat_newslist_query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `db` = 'chap_parameters' AND `ID` = '$cat_newslist_id'");
		$cat_newslist_row=mysqli_fetch_array($cat_newslist_query);
		if ($cat_newslist_row=="" && $cat_newslist_id!="null") { $cat_for_header="null"; $checker=1; }
		else $cat_for_header=$cat_newslist_id;
		if ($checker==1)
		{
			header("location: ".$GLOBALS['indexFilename']."?pid=hc10&cat=$cat_for_header");
			exit;
		}
		break;
		
	case "hc100":
		$pagemetas['include']="mod-chap_parameters2.php";
		$pagemetas['title']="پارامتر جدید";
		$pagemetas['navhover']="hc10";
		break;
		
	case "hc101":
		$pagemetas['include']="mod-chap_parameters2.php";
		$pagemetas['title']="ویرایش پارامتر";
		$pagemetas['navhover']="hc10";
		$daID=$_GET['id'];
		$Query=mysqli_query($CON,"SELECT * FROM `chap_parameters` WHERE `published` != -2 AND `ID` = $daID");
		$Row=mysqli_fetch_array($Query);
		if ($Row=="")
		{
			header("location: ".$GLOBALS['indexFilename']);
			exit;
		}
		$Row['body']=preg_replace('/<br>/',"\r\n",$Row['body']);
		break;
		
	case "hc11":
		$pagemetas['include']="mod-chap_uploads.php";
		$pagemetas['title']="فایلهای چاپی";
		$pagemetas['navhover']="hc20";
		break;
	
	case "hc12":
		$pagemetas['include']="mod-chap_blog.php";
		$pagemetas['title']="پست های وبلاگ";
		$pagemetas['navhover']="hc12";
		break;
	
	case "hc20":
		$pagemetas['include']="mod-chap_orders.php";
		$pagemetas['title']="سفارشات";
		$pagemetas['navhover']="hc20";
		break;

	case "hc200":
		$pagemetas['include']="mod-chap_orders_in.php";
		$pagemetas['title']="مشاهده سفارش";
		$pagemetas['navhover']="hc20";
		break;

	default:
		header("location: ".$GLOBALS['indexFilename']);
		exit;
}
