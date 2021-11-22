<?php
function replaceAll($str="")
{
	$standard = array("0","1","2","3","4","5","6","7","8","9");
	$east_arabic = array("۰","۱","۲","۳","۴","۵","۶","۷","۸","۹");
	return str_replace($standard , $east_arabic , $str);
}
function updatelog($db="",$id=0)
{
	include("../connectioni.php");
	date_default_timezone_set("Asia/Tehran");
	$date=time();
	$query=mysqli_query($CON,"SELECT * FROM `updatelog` WHERE `db` = '$db' AND `rID` = '$id'");
	$row=mysqli_fetch_array($query);
	if ($row=="")
		mysqli_query($CON,"INSERT INTO `updatelog` (`db`,`rID`,`date`) VALUES ('$db','$id','$date')") or die('Error Inserting into Update Log<br><br>'.mysqli_error($CON));
	else
		mysqli_query($CON,"UPDATE `updatelog` SET `date` = '$date' WHERE `db` = '$db' AND `rID` = '$id'");
	mysqli_close($CON);
}

function makeEscapedTitle($str="")
{
	$str=str_replace([
		"+",
		"(",
		")",
		".",
		",",
		";",
		"/",
		"&",
		" ",
		"'",
		'"',
		"،",
		"؛",
		"\r\n",
		"\n"
	],[
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"-",
		"",
		"",
		"",
		"",
		"",
		""
	],strip_tags($str));
	return $str;
}

function activitylog($type=0,$details=[])
{
    if(!isset($_SESSION)) {
        session_start();
    }
	include "../connectioni.php";
	date_default_timezone_set("Asia/Tehran");
	switch ($type)
	{
		case "1": $actualType="page view"; break;
		case "2": $actualType="add row"; break;
		case "3": $actualType="edit row"; break;
		case "4": $actualType="login"; break;
		case "5": $actualType="logout"; break;
		case "6": $actualType="failed login attemp"; break;
		case "7": $actualType="edit cats relations"; break;
		case "8": $actualType="edit tags"; break;
		case "9": $actualType="admin pass change attemp"; break;
		case "10": $actualType="inline photo uploaded"; break;
		case "11": $actualType="ticket answered"; break;
		case "12": $actualType="ticket created"; break;
		case "13": $actualType="ticket forwarded"; break;
		case "14": $actualType="ticket error"; break;
		case "15": $actualType="ticket note changed"; break;
		default: $actualType=""; $result=false;
	}
	if ($type==1 || $type==4 || $type==5 || $type==6 || $type==9 || $type==10) //page view, login logout, failed login, pass change, inline photo upload
		$result=mysqli_query($CON,"INSERT INTO `activitylog` (`admin_user`,`ip`,`activity_type`,`body`,`date`) VALUES ('".($_SESSION['thecc_admin_user'])."','".($_SERVER['REMOTE_ADDR'])."','$actualType','$details','".(time())."')") or die(mysqli_error($CON));
	else if ($type==3) //edit row
	{
		$query=mysqli_query($CON,"SELECT * FROM `".$details['db']."` WHERE `ID` = '".$details['id']."'");
		$row=mysqli_fetch_assoc($query);
		$edits=[];
		foreach ($row as $column=>$val)
			if (isset($details['post'][$column]) && $val!=$details['post'][$column])
			{
				$oldStrforJson=str_ireplace("\r\n","",$val);
				$oldStrforJson=str_ireplace('"',"'",$oldStrforJson);
				$newStrforJson=str_ireplace("\r\n","",$details['post'][$column]);
				$newStrforJson=str_ireplace('"',"'",$newStrforJson);
				$edits[$column]=["old"=>$oldStrforJson,"new"=>$newStrforJson];
			}
		if (count($edits)>0)
		{
			$details2=["db"=>$details['db'],"id"=>$details['id'],"edits"=>$edits];
			$result=mysqli_query($CON,"INSERT INTO `activitylog` (`admin_user`,`ip`,`activity_type`,`body`,`date`) VALUES ('".($_SESSION['thecc_admin_user'])."','".($_SERVER['REMOTE_ADDR'])."','$actualType','".mysqli_real_escape_string($CON,(json_encode($details2,JSON_UNESCAPED_UNICODE)))."','".(time())."')") or die(mysqli_error($CON));
		}
	}
	else if ($type==2) //add row
	{
		$query=mysqli_query($CON,"SELECT * FROM `".$details['db']."` WHERE `ID` = '".$details['id']."'") or die (mysqli_error($CON));
		$row=mysqli_fetch_assoc($query);
		foreach ($row as $column=>$val)
		{
			$row[$column]=str_ireplace("\r\n","",$val);
			$row[$column]=str_ireplace('"',"'",$row[$column]);
		}
		$details2=["db"=>$details['db'],"id"=>$details['id'],"content"=>$row];
		$result=mysqli_query($CON,"INSERT INTO `activitylog` (`admin_user`,`ip`,`activity_type`,`body`,`date`) VALUES ('".($_SESSION['thecc_admin_user'])."','".($_SERVER['REMOTE_ADDR'])."','$actualType','".mysqli_real_escape_string($CON,(json_encode($details2,JSON_UNESCAPED_UNICODE)))."','".(time())."')") or die(mysqli_error($CON));
	}
	else if ($type==7) //edit cats
	{
		$oldCats=[];
		$catsQuery=mysqli_query($CON,"SELECT `catID` FROM `cats_relations` WHERE `db` = '".$details['db']."' AND `db_id` = '".$details['id']."'");
		while($catsRow=mysqli_fetch_assoc($catsQuery))
			array_push($oldCats,$catsRow['catID']);
		$catsCompare1=array_diff($oldCats,$details['newCats']);
		$catsCompare2=array_diff($details['newCats'],$oldCats);
		if (count($catsCompare1)>0 || count($catsCompare2)>0)
		{
			$details2=["db"=>$details['db'],"id"=>$details['id'],"removed cats"=>$catsCompare1,"added cats"=>$catsCompare2];
			$result=mysqli_query($CON,"INSERT INTO `activitylog` (`admin_user`,`ip`,`activity_type`,`body`,`date`) VALUES ('".($_SESSION['thecc_admin_user'])."','".($_SERVER['REMOTE_ADDR'])."','$actualType','".mysqli_real_escape_string($CON,(json_encode($details2,JSON_UNESCAPED_UNICODE)))."','".(time())."')") or die(mysqli_error($CON));
		}
	}
	else if ($type==8) //edit tags
	{
		$oldTags=[];
		$tagsQuery=mysqli_query($CON,"SELECT `tag` FROM `tags` WHERE `db` = '".$details['db']."' AND `db_id` = '".$details['id']."'");
		while($tagsRow=mysqli_fetch_assoc($tagsQuery))
			array_push($oldTags,$tagsRow['tag']);
		$tagsCompare1=array_diff($oldTags,$details['newTags']);
		$tagsCompare2=array_diff($details['newTags'],$oldTags);
		if (count($tagsCompare1)>0 || count($tagsCompare2)>0)
		{
			$details2=["db"=>$details['db'],"id"=>$details['id'],"removed tags"=>$tagsCompare1,"added tags"=>$tagsCompare2];
			$result=mysqli_query($CON,"INSERT INTO `activitylog` (`admin_user`,`ip`,`activity_type`,`body`,`date`) VALUES ('".($_SESSION['thecc_admin_user'])."','".($_SERVER['REMOTE_ADDR'])."','$actualType','".mysqli_real_escape_string($CON,(json_encode($details2,JSON_UNESCAPED_UNICODE)))."','".(time())."')") or die(mysqli_error($CON));
		}
	}
	else if ($actualType!="") //type 11 and greater
	{
		$result=mysqli_query($CON,"INSERT INTO `activitylog` (`admin_user`,`ip`,`activity_type`,`body`,`date`) VALUES ('".($_SESSION['thecc_admin_user'])."','".($_SERVER['REMOTE_ADDR'])."','$actualType','".mysqli_real_escape_string($CON,(json_encode($details,JSON_UNESCAPED_UNICODE)))."','".(time())."')") or die(mysqli_error($CON));
	}
	mysqli_close($CON);
	return $result;
}

function check_login($redirect=true)
{
    if(!isset($_SESSION))
    {
        session_start();
    }
    include("../connectioni.php");
	date_default_timezone_set("Asia/Tehran");
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$rootPath=substr($actual_link,0,strpos($actual_link,"iADMIN"));
	$urlFolders=explode("/",$_SERVER['REQUEST_URI']);
	
	$adminUsers=array();
	$adminUsersQuery=mysqli_query($CON,"SELECT * FROM `admin_users`");
	while ($adminUsersRow=mysqli_fetch_array($adminUsersQuery))
		$adminUsers[$adminUsersRow['username']]=$adminUsersRow['panel_folder'];
	mysqli_close($CON);
	if (!isset($_SESSION['thecc_admin_user'])) //age session vujud nadare, cookie ro check mikonim
	{
		$validLoginCookie=false;
		foreach($adminUsers as $admin_user=>$panel_folder)
			if ($_COOKIE['shn']==md5('daS!S! - '.$admin_user))
				$validLoginCookie=$admin_user;
			
		if ($validLoginCookie) //age cookie e motabar vujud dare
		{
			$_SESSION['thecc_admin_user'] = $validLoginCookie;
			setcookie("shn", md5('daS!S! - '.$validLoginCookie), time()+60*60, "/; SameSite=strict");
			if (!in_array($adminUsers[$validLoginCookie],$urlFolders))
			{
				activitylog(4,"login with cookie on DIFFERENT panel: ".$_SERVER['REQUEST_URI']);
				if ($redirect)
				{
					header("location: ".$rootPath.$adminUsers[$validLoginCookie]);
					exit;
					die();
				}
				else return true;
			}
			else
			{
				activitylog(4,"login with cookie on CORRECT panel: ".$_SERVER['REQUEST_URI']);
				return true;
			}
		}
		else if (substr($_SERVER['REQUEST_URI'],-9)!="login.php")
		{
			if ($redirect)
			{
				header("location: login.php");
				exit;
				die();
			}
			else return false;
		}
		else return false;
	}
	else //age session vujud dare
	{
		if (isset($adminUsers[$_SESSION['thecc_admin_user']])) //age user marbut be hamin portal/proje has va folder ham barash tarif shode
		{
			if (!in_array($adminUsers[$_SESSION['thecc_admin_user']],$urlFolders))
			{
				if ($redirect)
				{
					header("location: ".$rootPath.$adminUsers[$_SESSION['thecc_admin_user']]);
					exit;
					die();
				}
				else return true;
			}
			else return true;
		}
		else
		{
			if ($redirect)
			{
				header("location: logout.php");
				exit;
				die();
			}
			else return false;
		}
	}
}
function pushe_send($userID="",$content="")
{
	include "../connectioni.php";
	$data_string=[
		"app_ids"=>["2eym2668834mn1ze"],
		"filters"=>[
			"device_id"=>[]
		],
		"platform"=>2,
		"data"=>[
			"title"=>"پاسخ به شما در گفتگو با پشتیبانی آنلاین",
			"content"=>$content,
			"image"=>"http://meftah.com/images/logo-sq2.jpg",
			"icon"=>"http://meftah.com/images/logo-sq.png",
			"action"=>[
				"url"=>"http://meftah.com",
				"action_type"=>"U"
			]
		]
	];
	$query=mysqli_query($CON,"SELECT * FROM `onlinechat_sessions` WHERE `userID` = '".$userID."'");
	$row=mysqli_fetch_assoc($query);
	array_push($data_string['filters']['device_id'],$row['fcm_token']);
	$ch=curl_init('https://api.pushe.co/v2/messaging/notifications/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type: application/json',
		'Authorization: Token 5c032275f98600222c78d4ac2d4164e69ba0609d'
	]);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_string));
	$result=curl_exec($ch);
	curl_close($ch);
}

function makeThumb($src="", $dest="", $gWidth=0, $gHeight=0, $format="jpg")
{
	if (substr($src,-3,3)=="png")
		$format="png";
	
	if ($format=="png")
		$source_image = imagecreatefrompng($src);
	else
		$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image); // not actually BASE width
	$height = imagesy($source_image); // not actually BASE height
	
	/*
		IN THE FIRST PLACE, this function was made for CROPING & RESIZING every picture to our GOAL WIDTH & HEIGHT
		BUT today 96-04-19 we changed it for RESIZE ONLY by our GOAL WIDTH or HEIGHT, whenever on of them equals "auto" :)
	*/
	if (is_numeric($gWidth) && is_numeric($gHeight))
	{
		$bWidth=$width;
		$bHeight=$gHeight*$bWidth/$gWidth;
		if ($bHeight>$height) // if 
		{
			$bHeight=$height;
			$bWidth=$gWidth*$bHeight/$gHeight;
		}
	}
	else if ($gHeight=="auto")
	{
		$gHeight=$height*$gWidth/$width;
		$bWidth=$width;
		$bHeight=$height;
	}
	else if ($gWidth=="auto")
	{
		$gWidth=$width*$gHeight/$height;
		$bWidth=$width;
		$bHeight=$height;
	}
	$bTop=($height-$bHeight)/2;
	$bLeft=($width-$bWidth)/2;
	
	$virtual_image = imagecreatetruecolor($gWidth, $gHeight);
	// imagefill($virtual_image,0,0,imagecolortransparent());
	imagealphablending( $virtual_image, false );
	imagesavealpha( $virtual_image, true );
	
	// bool imagecopyresampled (resource $dst_image, resource $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $dst_w, int $dst_h, int $src_w, int $src_h)
	imagecopyresampled($virtual_image, $source_image, 0, 0, $bLeft, $bTop, $gWidth, $gHeight, $bWidth, $bHeight); // copy source image at a resized size
	
	if ($format=="png")
		$result=imagepng($virtual_image, $dest, 80); //no compression
	else
		$result=imagejpeg($virtual_image, $dest, 80); //10% compression
	
	return $result;
}

function getchildcat_for_table($id=0,$level=0,$db="",$prevParents=[])
{
	include "../connectioni.php";
	$levelstr="";
	for ($i=0;$i<$level;$i++)
	{
		$levelstr=$levelstr."-----";
	}

	switch ($db)
	{
		case "news":
			$for_list_pid=11;
			break;
			
		case "downloads":
			$for_list_pid=15;
			break;
			
		case "abou_news":
			$for_list_pid="ab10";
			break;
			
		case "sani_products":
			$for_list_pid="sa10";
			break;
			
		case "meftah_training":
			$for_list_pid="mf11";
			break;
			
		case "meftah_jobs":
			$for_list_pid="mf12";
			break;
			
		case "meftah_products":
			$for_list_pid="mf13";
			break;
			
		case "oit_news":
			$for_list_pid="oi10";
			break;
			
		case "oit_products":
			$for_list_pid="oi10";
			break;
			
		case "tickets":
			$for_list_pid="32";
			break;
			
		case "farsnet_projects":
			$for_list_pid="fn11";
			break;
			
		case "farsnet_products":
			$for_list_pid="fn12";
			break;
			
		case "chap_parameters":
			$for_list_pid="hc10";
			break;
	}
	$query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `db` = '$db' AND `parentID` = '$id' AND `published` != '-2' ORDER BY `sort` DESC");
	$counter=mysqli_num_rows($query);
	if ($id==0 && $level==0 && $counter==0) die('</table></div><div class="info">هیچ دسته ای برای نمایش وجود ندارد.<br>با کلیک بر روی گزینه ی «دسته جدید» اولین دسته را اضافه کنید.</div>');
	while ($row=mysqli_fetch_array($query))
	{
		$opacityStr="";
		while (is_numeric($row['title']))
		{
			$query2=mysqli_query($CON,"SELECT * FROM `cats` WHERE `ID` = '".$row['title']."'");
			$row2=mysqli_fetch_assoc($query2);
			$row['title']=$row2['title'];
			$opacityStr='opacity: 0.5; ';
		}
		$countQuery=mysqli_query($CON,"SELECT * FROM `cats_relations` WHERE `db` = '".$row['db']."' AND `catID` = '".$row['ID']."' AND `published` != -2");
		$count=mysqli_num_rows($countQuery);
		$childQuery=mysqli_query($CON,"SELECT * FROM `cats` WHERE `parentID` = '".$row['ID']."' AND `published` != -2");
		$childrenCount=mysqli_num_rows($childQuery);
		if ($childrenCount>0) $childrenStr='<span style="cursor: pointer; background-color: #8c93ac; color: white; width: 20px; display: inline-block; text-align: center; font-weight: bold;" onclick="$('."'.cat".$row['ID']."children'".').toggle(); if (this.innerHTML=='."'+'".') this.innerHTML='."'-'".'; else this.innerHTML='."'+'".';">+</span> ';
		else $childrenStr="";
		if ($id!=0) $hideStr="display: none; ";
		else $hideStr="";
		
		echo ('
	<tr id="row'.$row['ID'].'" class="cat'.$id.'children" style="'.$hideStr.$opacityStr.'">
		<td valign="middle">
			<div onclick="sort('."'cats'".','.$row['ID'].','."'up'".')" class="slide_sort_up"></div>
			<div onclick="sort('."'cats'".','.$row['ID'].','."'down'".')" class="slide_sort_down"></div>
		</td>
		<td style="text-align: right; padding-right: 20px;">'.$levelstr." ".$childrenStr.$row['title'].'؛ ('.$count.') </td>
		<td>
			<div onclick="cats_featured('.$row['ID'].')" class="publish '.($row['featured']==1?'active':'').'" id="featured_btn_'.$row['ID'].'"></div>
			<div id="featured_loading_'.$row['ID'].'" class="loading_overlay"></div>
		</td>
		<td>
			<div onclick="toggle_pub('."'cats'".','.$row['ID'].')" class="publish '.($row['published']==1?'active':'').'" id="pub_btn_'.$row['ID'].'"></div>
			<div id="pub_loading_'.$row['ID'].'" class="loading_overlay"></div>
		</td>
		<td><a class="yympanelicons" href="index.php?pid='.$for_list_pid.'&cat='.$row['ID'].'">m</a></td>
		<td><a href="index.php?pid=181&id='.$row['ID'].'" class="edit"></a></td>
		<td>
			<div class="delete" onclick="remove_row('."'cats'".','.$row['ID'].')"></div>
			<div id="del_loading_'.$row['ID'].'" class="loading_overlay"></div>
		</td>
	</tr>');
		
		array_push($prevParents,$id);
		getchildcat_for_table($row['ID'],$level+1,$db,$prevParents);
	}
	mysqli_close($CON);
}
function generate_cats_table($db="")
{
	getchildcat_for_table(0,0,$db);
	echo ('</table></div>');
}
function getchildcat_for_select($id=0,$level=0,$db="",$editing_row=null)
{
	include "../connectioni.php";
	if (is_numeric($editing_row))
	{
		$query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `ID` = $editing_row");
		$editingRow=mysqli_fetch_array($query);
	}
	$levelstr="";
	for ($i=0;$i<$level;$i++)
	{
		$levelstr=$levelstr."-----";
	}
	$query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `db` = '$db' AND `parentID` = $id AND `published` = 1 ORDER BY `sort` DESC");
	while ($row=mysqli_fetch_array($query))
	{
		//skip category if news_authors has not access to add news to it. it's for cat combobox in mod-news2.php
		session_start();
		if ($_SESSION['lgntype']=="news_author" && !in_array($row['ID'],$_SESSION['access']['add'])) continue;
		
		//if row is a child for editing row already or is editting row itself! it's for parentID combobox in mod-cats2.php [first coded combo box]
		if (is_numeric($editing_row) && ($row['parentID']==$editing_row || $row['ID']==$editing_row)) continue;
		
		if (is_numeric($row['title'])) continue;
		
		if (!is_array($editing_row))
		{
			//if it's the parentID already (in mod-cats2.php) or it's default (in mod-cats.php) [second coded combo box]
			if ($row['ID']==$editingRow['parentID'] || (substr($editing_row,0,3)=="def" && substr($editing_row,3)==$row['ID'])) $selstr="selected";
			else $selstr='';
		}
		else
		{
			//if row is a selected cat for editing row. it's for cat select in mod-news2.php [third coded combo box: a multiple select box]
			if (in_array($row['ID'],$editing_row)) $selstr="selected";
			else $selstr='';
		}
		
		echo ('<option '.$selstr.' value="'.$row['ID'].'">'.$levelstr." ".$row['title'].'</option>');
		
		getchildcat_for_select($row['ID'],$level+1,$db,$editing_row);
	}
	mysqli_close($CON);
}
function generate_cats_options($db="",$editing_row=null)
{
	// echo ('<option value="0">{این دسته یک دسته ی اصلی یا ریشه (بدون مادر) باشد}</option>');
	getchildcat_for_select(0,0,$db,$editing_row);
}
function getchildcat_for_checkbox($id=0,$level=0,$db="",$json="",$str="")
{
	include "../connectioni.php";
	$access=json_decode($json);
	if ($access=="") $access=array();
	$levelstr="";
	for ($i=0;$i<$level;$i++)
	{
		$levelstr=$levelstr."-----";
	}
	$query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `db` = '$db' AND `parentID` = $id AND `published` = 1 ORDER BY `ID` ASC");
	while ($row=mysqli_fetch_array($query))
	{
		if (in_array($row['ID'],$access)) $selstr="checked"; else $selstr='';
		echo ('<label for="'.$str.'access'.$row['ID'].'"><input type="checkbox" name="'.$str.'access['.$row['ID'].']" id="'.$str.'access'.$row['ID'].'" value="1" '.$selstr.'></input>'.$levelstr.' '.$row['title'].'</label><br>');
		
		getchildcat_for_checkbox($row['ID'],$level+1,$db,$json,$str);
	}
	mysqli_close($CON);
}
function generate_cats_checkboxes($db="",$json="",$str="")
{
	// echo ('<option value="0">{این دسته یک دسته ی اصلی یا ریشه (بدون مادر) باشد}</option>');
	getchildcat_for_checkbox(0,0,$db,$json,$str);
}

function is_cat_published($id=0)
{
	include "../connectioni.php";
	if ($id==0)
	{
		$query=mysqli_query($CON,"SELECT * FROM `misc` WHERE `ID` = 6");
		$row=mysqli_fetch_array($query);
		$id=$row['body'];
		if ($id==0) return true;
	}
	$query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `published` = 1 AND `ID` = ".$id);
	$row=mysqli_fetch_array($query);
	if ($row=="") return false; else return true;
	mysqli_close($CON);
}

function is_published($db="",$id=0)
{
	include "../connectioni.php";
	$valid_dbs=["digpaz_authors"];
	if (!in_array($db,$valid_dbs)) die("db for checking published status is not specified in valid_dbs");
	$query=mysqli_query($CON,"SELECT * FROM `$db` WHERE `published` = 1 AND `ID` = ".$id) or die(mysqli_error($CON));
	$row=mysqli_fetch_array($query);
	if ($row=="") return false; else return true;
	mysqli_close($CON);
}

?>