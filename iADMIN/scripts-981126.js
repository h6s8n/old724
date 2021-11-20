function msgbox(msgtext,dir)
{
	if (dir=="ltr") {document.getElementById('msgboxnote').style.direction='ltr'; document.getElementById('msgboxnote').style.textAlign='left';}
	document.getElementById('msgboxnote').innerHTML=msgtext;
	document.getElementById('msgbox').style.display='block';
	document.getElementById('msgboxbutton').focus();
}
function simple_msgbox(msgtext,dir)
{
	if (parseInt($("#successful").css("top"))==0)
	{
		$("#successful").animate({top: -33},"fast",function(){
			if (dir=="ltr") {document.getElementById('successful').style.direction='ltr'; document.getElementById('successful').style.textAlign='left';}
			document.getElementById('successful').innerHTML=msgtext;
			$("#successful").animate({top: 0},"fast");
		});
	}
	else
	{
		if (dir=="ltr") {document.getElementById('successful').style.direction='ltr'; document.getElementById('successful').style.textAlign='left';}
		document.getElementById('successful').innerHTML=msgtext;
		$("#successful").animate({top: 0},"fast");
	}
}
function close_msgbox()
{
	$("#successful").animate({top: -33, opacity: 0},function(){
		document.getElementById('successful').innerHTML="";
		$("#successful").css({opacity: 1});
	});
}
function show_submenu(id)
{
	$("#submenu"+id).css({borderBottomWidth: 2, height: $("#submenu"+id).children().length*30});
	$("#nav"+id+" div").css("backgroundImage","url(images/minus.png)");
	$("#nav"+id).addClass("opened");
	
	$("nav").animate({scrollTop: $("#submenu"+id)[0].offsetTop+$("#submenu"+id).height()-85});
}
function hide_submenu(id)
{
	$("#submenu"+id).css({borderBottomWidth: "", height: ""});
	$("#nav"+id+" div").css("backgroundImage","");
	$("#nav"+id).removeClass("opened");
}
function toggle_submenu(id)
{
	if ($("#submenu"+id).css("height")=="0px") show_submenu(id);
	else hide_submenu(id);
}
function hide_all_submenu()
{
	$(".submenu").css({borderBottomWidth: "", height: ""});
	$("nav > .item").css("backgroundImage","");
	$("nav > .item").removeClass("opened");
}
function nav_minimise()
{
	hide_guide();
	hide_all_submenu();
	$("#right_pane,section").addClass("min");
}
function nav_maximise()
{
	$("#right_pane,section").removeClass("min");
	hidett();
}
function nav_toggle()
{
	if ($("section").hasClass("min")) nav_maximise();
	else nav_minimise();
}

function submit_prevent()
{
	setTimeout(function(){
		$('.reg_btn').attr('disabled','true');
		setTimeout(function(){$('.reg_btn').val('لطفا منتظر بمانید...');},300);
		$("*").css("cursor","wait");
	},2)
}
function hide_error(that)
{
	$(that).css({"left":"-400px" , "display":"none"});
}
function show_error(field,str)
{
	simple_msgbox('خطا(هایی) در فرم شماست. پس از رفع، دوباره فرم را ثبت نمایید.');
	$("#fieldError_"+field).show();
	$("#fieldError_"+field).html(str);
	// $("#fieldError_"+field).show();
	// $("#fieldError_"+field).animate({left: 5, opacity: 1},"fast");
	setTimeout(function(){$("#fieldError_"+field).css({left: "5px"});},10);
}
function hide_all_errors()
{
	$(".fielderror").css({"left":"-400px" , "display":"none"});
}
function letterLimit(str,limit)
{
	var remain=limit-$("#field_"+str).val().length;
	$("#letterLimit_"+str).html(remain);
	if (remain<0) $("#field_"+str).val($("#field_"+str).val().substr(0,limit));
}

clicked=0;
function mover(event)
{
	globy=event.pageY;
	globx=event.pageX;
	$("#tooltip").css({top: globy-$("html, body").scrollTop(),right: $("html, body").width()-globx+5});
	// $("#tooltip").css({top: globy-$("html, body").scrollTop()+15,left: globx+15});
	if (clicked==1)
	{
		var startTop=parseInt($("#croparea").css("top"));
		var startLeft=parseInt($("#croparea").css("left"));
		var dotTop=globy-$("#daImg").offset().top;
		var dotLeft=globx-$("#daImg").offset().left;
		// scrlvalue=(btntop/229)*($("#ser"+block+"note")[0].scrollHeight-243); //229: scrollbar movement domain / 243: srchrslt height
		// $("#ser"+block+"note").scrollTop(scrlvalue);
		if (dotLeft>startLeft+50)
		{
			var boxWidth=dotLeft-startLeft;
			if (boxWidth+startLeft>parseInt($("#daImg").css("width")))
				boxWidth=parseInt($("#daImg").css("width"))-startLeft;
			var boxHeight=gHeight*boxWidth/gWidth;
			if (boxHeight+startTop>parseInt($("#daImg").css("height")))
			{
				boxHeight=parseInt($("#daImg").css("height"))-startTop;
				boxWidth=gWidth*boxHeight/gHeight;
			}
			$("#croparea").css({width: boxWidth, height: boxHeight});
			fill_inputs(startTop,startLeft,boxHeight,boxWidth);
			$("#cropdot").css({top: (boxHeight-10)/2+startTop, left: boxWidth-6+startLeft});
		}
	
	}
	if (clicked==2)
	{
		var difTop=clickedY-globy;
		var difLeft=clickedX-globx;
		var boxTop=clickedTop-difTop;
		var boxLeft=clickedLeft-difLeft;
		var boxWidth=parseInt($("#croparea").css("width"));
		var boxHeight=parseInt($("#croparea").css("height"));
		if (boxTop<0) boxTop=0;
		if (boxLeft<0) boxLeft=0;
		if (boxTop+boxHeight>parseInt($("#daImg").css("height"))) boxTop=parseInt($("#daImg").css("height"))-boxHeight;
		if (boxLeft+boxWidth>parseInt($("#daImg").css("width"))) boxLeft=parseInt($("#daImg").css("width"))-boxWidth;
		
		$("#croparea").css({top: boxTop, left: boxLeft});
		fill_inputs(boxTop,boxLeft,boxHeight,boxWidth);
		$("#cropdot").css({top: (boxHeight-10)/2+boxTop, left: boxWidth-6+boxLeft});
	}
}
function init_size()
{
	var startTop=0;
	var startLeft=0;
	var boxWidth=parseInt($("#daImg").css("width"))*0.95;
	if (boxWidth+startLeft>parseInt($("#daImg").css("width")))
		boxWidth=parseInt($("#daImg").css("width"))-startLeft;
	var boxHeight=gHeight*boxWidth/gWidth;
	if (boxHeight+startTop>parseInt($("#daImg").css("height")))
	{
		boxHeight=parseInt($("#daImg").css("height"))-startTop;
		boxWidth=gWidth*boxHeight/gHeight;
	}
	var boxTop=(parseInt($("#daImg").css("height"))-boxHeight)/2;
	var boxLeft=(parseInt($("#daImg").css("Width"))-boxWidth)/2;
	$("#croparea").css({width: boxWidth, height: boxHeight, top: boxTop, left: boxLeft});
	fill_inputs(boxTop,boxLeft,boxHeight,boxWidth);
	$("#cropdot").css({top: (boxHeight-10)/2+boxTop, left: parseInt($("#croparea").css("width"))-6+boxLeft});
}
function fill_inputs(startTop, startLeft, height, width)
{
	document.getElementById('input_startTop').value=startTop;
	document.getElementById('input_startLeft').value=startLeft;
	document.getElementById('input_height').value=height;
	document.getElementById('input_width').value=width;
}

function insert_image(id)
{
	tinyMCE.activeEditor.dom.add(tinyMCE.activeEditor.getBody(), 'img', {src : id+'.jpg'});
}
var chatRefreshIntval=[];
function toggle_pub_chat(id,isRemove)
{
	$("#chatloading"+id).fadeIn();
	var p;
	if (isRemove) p=-2;
	else if ($("#pub_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			if (dacon.responseText==1)
			{
				if (p==-2)
				{
					$(".chatbox_row"+id).fadeOut(function(){
						clearInterval(chatRefreshIntval[id]);
					});
				}
				else if (p==1)
				{
					$("#chatloading"+id).fadeOut();
					$("#pub_btn_"+id).addClass("active");
					$("#pub_btn_"+id).off("mouseover");
					$("#pub_btn_"+id).on("mouseover",function(){tooltip('تغییر وضعیت به آرشیو')});
				}
				else
				{
					$("#chatloading"+id).fadeOut();
					$("#pub_btn_"+id).removeClass("active");
					$("#pub_btn_"+id).off("mouseover");
					$("#pub_btn_"+id).on("mouseover",function(){tooltip('تغییر وضعیت به فعال')});
				}
			}
			else msgbox(dacon.responseText);
		}
	}
	dacon.open("GET","pub.php?db=onlinechat_sessions&id="+id+"&p="+p,true);
	dacon.send();
}
function toggle_pub(db,id)
{
	$("#pub_loading_"+id).fadeIn();
	var p;
	if ($("#pub_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#pub_loading_"+id).fadeOut();
			if (dacon.responseText==1)
			{
				if (p==1) $("#pub_btn_"+id).addClass("active");
				else $("#pub_btn_"+id).removeClass("active");
			}
			else msgbox(dacon.responseText);
		}
	}
	dacon.open("GET","pub.php?db="+db+"&id="+id+"&p="+p,true);
	dacon.send();
}
function toggle_poll_active(id)
{
	$("#active_loading_"+id).fadeIn();
	var p;
	if ($("#active_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#active_loading_"+id).fadeOut();
			if (p==1) $("#active_btn_"+id).addClass("active");
			else $("#active_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-poll-active.php?id="+id+"&p="+p,true);
	dacon.send();
}
function toggle_poll_show_result(id)
{
	$("#show_result_loading_"+id).fadeIn();
	var p;
	if ($("#show_result_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#show_result_loading_"+id).fadeOut();
			if (p==1) $("#show_result_btn_"+id).addClass("active");
			else $("#show_result_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-poll-show_result.php?id="+id+"&p="+p,true);
	dacon.send();
}
function toggle_comm(id)
{
	$("#pub_loading_"+id).fadeIn();
	var p;
	if ($("#pub_btn_"+id).hasClass("active")) p=-1;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#pub_loading_"+id).fadeOut();
			if (p==1) $("#pub_btn_"+id).addClass("active");
			else $("#pub_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","pub.php?db=comments&id="+id+"&p="+p,true);
	dacon.send();
}
function toggle_basiccomm(id)
{
	$("#pub_loading_"+id).fadeIn();
	var p;
	if ($("#pub_btn_"+id).hasClass("active")) p=-1;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#pub_loading_"+id).fadeOut();
			if (p==1) $("#pub_btn_"+id).addClass("active");
			else $("#pub_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","pub.php?db=basiccomments&id="+id+"&p="+p,true);
	dacon.send();
}
function sr_featured(id)
{
	$("#featured_loading_"+id).fadeIn();
	var p;
	if ($("#featured_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#featured_loading_"+id).fadeOut();
			if (p==1) $("#featured_btn_"+id).addClass("active");
			else $("#featured_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-steelrokh_products-feature.php?id="+id+"&p="+p,true);
	dacon.send();
}
function news_featured(id)
{
	$("#featured_loading_"+id).fadeIn();
	var p;
	if ($("#featured_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#featured_loading_"+id).fadeOut();
			if (p==1) $("#featured_btn_"+id).addClass("active");
			else $("#featured_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-news-feature.php?id="+id+"&p="+p,true);
	dacon.send();
}
function farsnet_projects_featured(id)
{
	$("#featured_loading_"+id).fadeIn();
	var p;
	if ($("#featured_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#featured_loading_"+id).fadeOut();
			if (p==1) $("#featured_btn_"+id).addClass("active");
			else $("#featured_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-farsnet_projects-feature.php?id="+id+"&p="+p,true);
	dacon.send();
}
function jobs_featured(id)
{
	$("#featured_loading_"+id).fadeIn();
	var p;
	if ($("#featured_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#featured_loading_"+id).fadeOut();
			if (p==1) $("#featured_btn_"+id).addClass("active");
			else $("#featured_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-meftah_jobs-feature.php?id="+id+"&p="+p,true);
	dacon.send();
}
function cats_featured(id)
{
	$("#featured_loading_"+id).fadeIn();
	var p;
	if ($("#featured_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#featured_loading_"+id).fadeOut();
			if (p==1) $("#featured_btn_"+id).addClass("active");
			else $("#featured_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-cats-feature.php?id="+id+"&p="+p,true);
	dacon.send();
}
function chap_parameters_featured(id)
{
	$("#featured_loading_"+id).fadeIn();
	var p;
	if ($("#featured_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#featured_loading_"+id).fadeOut();
			if (p==1) $("#featured_btn_"+id).addClass("active");
			else $("#featured_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-chap_parameters-feature.php?id="+id+"&p="+p,true);
	dacon.send();
}
function chap_blog_featured(id)
{
	$("#featured_loading_"+id).fadeIn();
	var p;
	if ($("#featured_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#featured_loading_"+id).fadeOut();
			if (p==1) $("#featured_btn_"+id).addClass("active");
			else $("#featured_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-chap_blog-feature.php?id="+id+"&p="+p,true);
	dacon.send();
}
function dj_featured(id)
{
	$("#featured_loading_"+id).fadeIn();
	var p;
	if ($("#featured_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#featured_loading_"+id).fadeOut();
			if (p==1) $("#featured_btn_"+id).addClass("active");
			else $("#featured_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-dj_products-feature.php?id="+id+"&p="+p,true);
	dacon.send();
}
function remove_row(db,id)
{
	var yesno = confirm('آیا مطمئن به حذف هستید؟ این امر ممکن است قابل بازگشت نباشد.');
	if (yesno==true)
	{
		$("#del_loading_"+id).fadeIn();
		
		var dacon=new XMLHttpRequest();
		dacon.onreadystatechange=function()
		{
			if (dacon.readyState==4 && dacon.status==200)
			{
				if (dacon.responseText==1)
				{
					if (db!="cats")
						$("#row"+id).fadeOut(1000);
					else
						document.location=document.location;
				}
				else
				{
					msgbox(dacon.responseText);
					$("#del_loading_"+id).fadeOut();
				}
			}
		}
		dacon.open("GET","pub.php?db="+db+"&id="+id+"&p=-2",true);
		dacon.send();
	}
}
function remove_photo(id)
{
	var yesno = confirm('آیا مطمئن به حذف هستید؟ این امر ممکن است قابل بازگشت نباشد.');
	if (yesno==true)
	{
		$("#gallery_photo_"+id+" .loading_overlay").fadeIn();
		
		var dacon=new XMLHttpRequest();
		dacon.onreadystatechange=function()
		{
			if (dacon.readyState==4 && dacon.status==200)
			{
				$("#gallery_photo_"+id).fadeOut(1000);
			}
		}
		dacon.open("GET","pub.php?db=photos&id="+id+"&p=-2",true);
		dacon.send();
	}
}
function feature_photo(id,that)
{
	$("#gallery_photo_"+id+" .loading_overlay").fadeIn();
	var p;
	if ($("#featured_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#gallery_photo_"+id+" .loading_overlay").fadeOut();
			if (p==1) { $("#featured_btn_"+id).addClass("active");  $(that).html("لغو برگزیدگی");}
			else { $("#featured_btn_"+id).removeClass("active"); $(that).html("برگزیده");}
		}
	}
	dacon.open("GET","mod-photo_albums-photo_feature.php?id="+id+"&p="+p,true);
	dacon.send();
}
function remove_kanoon_camps_photo(id)
{
	var yesno = confirm('آیا مطمئن به حذف هستید؟ این امر ممکن است قابل بازگشت نباشد.');
	if (yesno==true)
	{
		$("#gallery_photo_"+id+" .loading_overlay").fadeIn();
		
		var dacon=new XMLHttpRequest();
		dacon.onreadystatechange=function()
		{
			if (dacon.readyState==4 && dacon.status==200)
			{
				$("#gallery_photo_"+id).fadeOut(1000);
			}
		}
		dacon.open("GET","pub.php?db=kanoon_camps_photos&id="+id+"&p=-2",true);
		dacon.send();
	}
}
function feature_kanoon_camps_photo(id,that)
{
	$("#gallery_photo_"+id+" .loading_overlay").fadeIn();
	var p;
	if ($("#featured_btn_"+id).hasClass("active")) p=0;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#gallery_photo_"+id+" .loading_overlay").fadeOut();
			if (p==1) { $("#featured_btn_"+id).addClass("active");  $(that).html("لغو برگزیدگی");}
			else { $("#featured_btn_"+id).removeClass("active"); $(that).html("برگزیده");}
		}
	}
	dacon.open("GET","mod-kanoon_camps-photo_feature.php?id="+id+"&p="+p,true);
	dacon.send();
}
function remove_steelrokh_products_photo(id)
{
	var yesno = confirm('آیا مطمئن به حذف هستید؟ این امر ممکن است قابل بازگشت نباشد.');
	if (yesno==true)
	{
		$("#gallery_photo_"+id+" .loading_overlay").fadeIn();
		
		var dacon=new XMLHttpRequest();
		dacon.onreadystatechange=function()
		{
			if (dacon.readyState==4 && dacon.status==200)
			{
				$("#gallery_photo_"+id).fadeOut(1000);
			}
		}
		dacon.open("GET","pub.php?db=steelrokh_products_photos&id="+id+"&p=-2",true);
		dacon.send();
	}
}
function remove_dj_products_photo(id)
{
	var yesno = confirm('آیا مطمئن به حذف هستید؟ این امر ممکن است قابل بازگشت نباشد.');
	if (yesno==true)
	{
		$("#gallery_photo_"+id+" .loading_overlay").fadeIn();
		
		var dacon=new XMLHttpRequest();
		dacon.onreadystatechange=function()
		{
			if (dacon.readyState==4 && dacon.status==200)
			{
				$("#gallery_photo_"+id).fadeOut(1000);
			}
		}
		dacon.open("GET","pub.php?db=dj_products_photos&id="+id+"&p=-2",true);
		dacon.send();
	}
}

var http;
function createRequestObject()
{
    if (navigator.appName == "Microsoft Internet Explorer")
		http = new ActiveXObject("Microsoft.XMLHTTP");
    else
		http = new XMLHttpRequest();
}
function sendRequest()
{
    createRequestObject();
    http.open("GET", "progress.php");
    http.onreadystatechange = function () { handleResponse(); };
    http.send(null);
}
var onComplete_goto="index.php";
function handleResponse()
{
    var response;
    if (http.readyState == 4)
	{
		console.log(http.responseText);
		dadata=eval('(' + http.responseText + ')');
        if (dadata.percent>2) document.getElementById("bar_color").style.width = dadata.percent + "%";
		console.log(dadata);
        if (dadata.percent < 100)
			setTimeout("sendRequest()", 1000);
        else
			window.location=onComplete_goto+"&rand="+Math.random();
    }
}
function startUpload()
{
	setTimeout(function(){document.getElementById("bar_color").style.width = "2%";},500);
	$("#bar_blank").css({transform: "scaleY(1)"});
	setTimeout("sendRequest()", 5000);
}

function sort(db,id,go)
{
	$("#overall_loading").fadeIn();
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			if (dacon.responseText=="1")
			{
				if (go=="down")
				{
					var clone=$("#row"+id).next().clone();
					$("#row"+id).next().remove();
					$("#row"+id).before(clone);
				}
				else
				{
					var clone=$("#row"+id).prev().clone();
					$("#row"+id).prev().remove();
					$("#row"+id).after(clone);
				}
			}
			else if (dacon.responseText=="2")
				document.location=document.location;
			else
				simple_msgbox(dacon.responseText);
			$("#overall_loading").fadeOut();
		}
	}
	dacon.open("GET","sort.php?db="+db+"&id="+id+"&go="+go,true);
	dacon.send();
}
function slide_sort(id,go)
{
	sort('slide',id,go);
}
function game_slide_sort(id,go)
{
	sort('game_slide',id,go);
}
var sortmove_selected=0;
function sort_move(db,id)
{
	if (sortmove_selected==0)
	{
		sortmove_selected=id;
		$(".slide_sort_move").addClass("select_dest");
	}
	else
	{
		$(".slide_sort_move").removeClass("select_dest");
		$("#overall_loading").fadeIn();
	
		var dacon=new XMLHttpRequest();
		dacon.onreadystatechange=function()
		{
			if (dacon.readyState==4 && dacon.status==200)
			{
				if (dacon.responseText=="1")
				{
					document.location=document.location;
				}
				else
				{
					simple_msgbox(dacon.responseText);
					sortmove_selected=0;
					$("#overall_loading").fadeOut();
				}
			}
		}
		dacon.open("GET","sort_move.php?db="+db+"&id="+sortmove_selected+"&go="+id,true);
		dacon.send();
	}
}

function show_misc_pane(str,special)
{
	if ($("section").hasClass("min"))
	{
		nav_maximise();
		setTimeout(function(){
			show_misc_pane2(str,special);
		},500);
	}
	else
		show_misc_pane2(str,special);
}
function show_misc_pane2(str,special)
{
	$("#guide_pane").html('<p class="info">لطفاً شکیبا باشید، در حال بارگزاری...</p>');
	$("#guide_pane").animate({right: 0},"fast",function(){
		$("#pane_closebtn").addClass("active");
	});
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#guide_pane").html(dacon.responseText);
			if (str=="tinymce_insertpernum.php")
				$("#tinymce_insertpernum_input").focus();
			if (special==1)
			{
				var dadata=eval('(' + $("#field_selected_photos").val() + ')');
				digpaz_selected_photos=dadata;
				for(var i=0; i<dadata.length; i++)
				{
					$("#guide_pane #featured_btn_"+dadata[i]).addClass('active');
					$("#guide_pane #featured_btn_"+dadata[i]).html('حذف');
				}
			}
		}
	}
	dacon.open("GET",str,true);
	dacon.send();
}
function show_guide(str)
{
	show_misc_pane("mod-"+str+"-guide.php");
}
function hide_guide()
{
	$("#pane_closebtn").removeClass("active");
	$("#guide_pane").animate({right: "-100%"},"fast",function(){
		$("#guide_pane").html('<p class="info">لطفاً شکیبا باشید، در حال بارگزاری...</p>');
	});
}
function add_tag_field()
{
	var fields=$(".tagInputsParent .tag_input").length;
	if (fields==0) fields=$(".tag_input").length;
	$(".tag_plus").before('<input class="tag_input" type="text" id="tag_input_'+fields+'" name="tag['+fields+']" autocomplete="off" onfocus="tag_sug(this.value,this)" onkeyup="tag_sug(this.value,this,event)" onblur="hide_tag_sugs()">');
	$("#tag_input_"+fields).focus();
}
function add_color_field()
{
	var fields=$(".color_input").length;
	$(".color_plus").before('<input class="color_input" type="text" id="color_input_'+fields+'" name="color['+fields+']" autocomplete="off">');
	$("#color_input_"+fields).focus();
}
function add_poll_answer(str)
{
	var some_class;
	if (str=="dj_pro_options") some_class="";
	else some_class="poll_answer_input";
	
	var fields=$(".tag_input").length;
	$(".tag_plus").before('<input class="tag_input '+some_class+'" type="text" id="answer_input_'+fields+'" name="answer['+fields+']" autocomplete="off">');
	$("#answer_input_"+fields).focus();
}
function add_specs_row()
{
	var some_class="poll_answer_input";
	
	var fields=$(".specs_input").length;
	$(".tag_plus_specs").before('<div style="clear: both"></div><input onfocus="specs_sug(this,event,0);" onkeyup="specs_sug(this,event,0);" onblur="hide_tag_sugs()" class="tag_input poll_answer_input specs_input" placeholder="Title" type="text" id="specs_title_'+fields+'" style="direction: ltr; text-align: right;" name="specs_title['+fields+']" autocomplete="off"><input onfocus="specs_sug(this,event,1);" onkeyup="specs_sug(this,event,1);" onblur="hide_tag_sugs()" class="tag_input poll_answer_input" placeholder="Value" type="text" id="specs_value_'+fields+'" style="direction: ltr; text-align: right;" name="specs_value['+fields+']" autocomplete="off">');
	$("#specs_title_"+fields).focus();
}
function add_posts_field()
{
	var some_class="poll_answer_input";
	
	var fields=$(".specs_input").length;
	$(".tag_plus_specs").before('<select name="posts_db['+fields+']" id="posts_db_'+fields+'" class="tag_input poll_answer_input specs_input"><option value="news">اخبار و مقالات</option><option value="terminology">فرهنگ واژگان تخصصی</option><option value="videos">ویدئو ها</option></select><input name="posts_id['+fields+']" id="posts_id_'+fields+'" class="tag_input poll_answer_input specs_input" autocomplete="off" onfocus="posts_sug(this)" onkeyup="posts_sug(this,event);" onblur="hide_tag_sugs()" type="text" value="">');
	$("#specs_title_"+fields).focus();
}
var tagsugreq=new XMLHttpRequest();
var tagsugT=1;
var sugbox_top=0;
var sugbox_left=0;
var window_top=0;
var tag_input_4_choose=-1;
var choose_tag=1;
var action_holder="";
tagsugreq.onreadystatechange=function()
{
	if (tagsugreq.readyState==4 && tagsugreq.status==200)
	{
		window_top=$('section').scrollTop();
		if (tagsugreq.responseText!="")
		{
			// choose_tag=1;
			$(".tagsugs").stop();
			$(".tagsugs").fadeIn();
			$(".tagsugs").html(tagsugreq.responseText);
		}
		else
		{
			// choose_tag=0;
			$(".tagsugs").html('<div class="item" style="font-size: 10px; cursor: default; text-align: center;">جستجو بی نتیجه</div>');
			hide_tag_sugs();
		}
		if ($(".tagsugs").width()>100 && Number.isInteger(tag_input_4_choose)) var dif_left=($(".tagsugs").width()-100)/2;
		else var dif_left=0;
		$(".tagsugs").css({'top': sugbox_top, 'left': sugbox_left-dif_left});
		tagsugT=1;
	}
}
function tag_sug(str,that,event)
{
	// choose_tag=0;
	tag_input_4_choose=parseInt(that.id.substr(10));
	// if (action_holder=="") action_holder=$("#daForm").attr("action");
	// $("#daForm").attr("action","javascript:void(0)");
	if (event==undefined || (event.keyCode!=40 &&  event.keyCode!=39 &&  event.keyCode!=38 &&  event.keyCode!=37 && event.keyCode!=13))
	{
		sugbox_top=$(that).offset().top+38;
		sugbox_left=$(that).offset().left;
		tagsugreq.abort();
		tagsugreq.open("GET","tag_sug.php?str="+str,true);
		tagsugreq.send();
	}
	// else
	// {
		// if (event.keyCode==40)
			// next_sug();
		// else if (event.keyCode==38)
			// prev_sug();
		// else if (event.keyCode==13)
			// choose_sug();
	// }
}
function specs_sug(that,event,bool)
{
	console.log(event.keyCode);
	// choose_tag=0;
	tag_input_4_choose=that.id;
	// if (action_holder=="") action_holder=$("#daForm").attr("action");
	// $("#daForm").attr("action","javascript:void(0)");
	if (event==undefined || (event.keyCode!=40 &&  event.keyCode!=39 &&  event.keyCode!=38 &&  event.keyCode!=37 && event.keyCode!=13))
	{
		sugbox_top=$(that).offset().top+38;
		sugbox_left=$(that).offset().left;
		tagsugreq.abort();
		if (bool==0 || bool==undefined) tagsugreq.open("GET","mod-oit_products-specs_sug.php?str="+that.value,true);
		else if (bool==1)
		{
			var titleVal=$("#specs_title_"+that.id.substr(12)).val();
			tagsugreq.open("GET","mod-oit_products-specs_sug.php?str="+that.value+"&title="+titleVal,true);
		}
		tagsugreq.send();
	}
	// else
	// {
		// if (event.keyCode==40)
			// next_sug();
		// else if (event.keyCode==38)
			// prev_sug();
		// else if (event.keyCode==13)
			// choose_sug();
	// }
}
function posts_sug(that,event)
{
	tag_input_4_choose=that.id;
	if (event==undefined || (event.keyCode!=40 &&  event.keyCode!=39 &&  event.keyCode!=38 &&  event.keyCode!=37 && event.keyCode!=13))
	{
		sugbox_top=$(that).offset().top+38;
		sugbox_left=$(that).offset().left;
		tagsugreq.abort();
		tagsugreq.open("GET","mod-tagbatch-posts_sug.php?str="+that.value+"&db="+$('#posts_db_'+that.id.substr(9)).val(),true);
		tagsugreq.send();
	}
}
function hide_tag_sugs()
{
	tagsugreq.abort();
	$(".tagsugs").stop();
	$(".tagsugs").fadeOut();
	// $(".tagsugs").hide();
	// $("#daForm").attr("action",action_holder);
	// action_holder="";
}
function choose_sug()
{
	if (Number.isInteger(tag_input_4_choose))
	{
		var field2fill="tag_input_";
		var fieldNumber=parseInt(tag_input_4_choose);
	}
	else if (tag_input_4_choose.substr(0,1)=="s") //oasis it products specs
	{
		var field2fill=tag_input_4_choose.substr(0,12);
		var fieldNumber=parseInt(tag_input_4_choose.substr(12));
	}
	// console.log("field2fill: "+field2fill);
	// console.log("fieldNumber: "+fieldNumber);
	
	$("#"+field2fill+fieldNumber).val($(".tagsugs .item.active").html());
	
	if (field2fill.substr(0,3)=="tag")
	{
		console.log(field2fill+(fieldNumber+1));
		if (document.getElementById(field2fill+(fieldNumber+1))!=undefined)
			$("#tag_input_"+(fieldNumber+1)).focus();
		else
		{
			add_tag_field();
			$("#tag_input_"+(fieldNumber+1)).focus();
		}
	}
	else if (field2fill.substr(0,1)=="s")
	{
		if (field2fill.substr(6,5)=="title")
			$("#specs_value_"+(fieldNumber)).focus();
		else if (document.getElementById("specs_title_"+(fieldNumber+1))!=undefined)
			$("#specs_title_"+(fieldNumber+1)).focus();
		else
		{
			add_specs_row();
			$("#specs_title_"+(fieldNumber+1)).focus();
		}
	}
}
function choose_post(postID)
{
	if (tag_input_4_choose.substr(0,1)=="p") //mod-tagbatch posts
	{
		var field2fill=tag_input_4_choose.substr(0,9);
		var fieldNumber=parseInt(tag_input_4_choose.substr(9));
	}
	$("#"+field2fill+fieldNumber).val(postID);
	if (field2fill.substr(0,1)=="p")
	{
		if (document.getElementById(field2fill+(fieldNumber+1))==undefined)
			add_posts_field();
	}
}
function change_sug(id)
{
	tagsugT=id;
	$(".tagsugs .item.active").removeClass('active');
	$("#sug_item_"+id).addClass('active');
}
function next_sug()
{
	var max=$(".tagsugs").height()/35;
	if (tagsugT<max)
		change_sug(tagsugT+1)
}
function prev_sug()
{
	if (tagsugT>1)
		change_sug(tagsugT-1)
}

function yym_formfields_type(type)
{
	if (type==3) $(".rangeminmax").show();
	else $(".rangeminmax").hide();
	if (type==2) $(".listtype").show();
	else $(".listtype").hide();
}
function abou_video_type(type)
{
	if (type==0)
	{
		$(".aparati").show();
		$("#field_mp4").val("");
	}
	else $(".aparati").hide();
	
	if (type==1) $(".mp4i").show();
	else $(".mp4i").hide();
}
function linx_type(type)
{
	if (type==0) $(".texti").show();
	else $(".texti").hide();
	
	if (type==1) $(".banneri").show();
	else $(".banneri").hide();
}
function about_type(type)
{
	if (type==1)
	{
		$(".tabi").show();
	}
	else $(".tabi").hide();
}
function dj_slide_db(str)
{
	$("#dj_blog_db_id,#videos_db_id,#dj_products_db_id").attr("name","");
	$("#dj_blog_db_id,#videos_db_id,#dj_products_db_id").hide();
	
	$("#"+str+"_db_id").attr("name","db_id");
	$("#"+str+"_db_id").show();
}
function yym_publishers_status(id)
{
	$("#pub_loading_"+id).fadeIn();
	var p;
	if ($("#pub_btn_"+id).hasClass("active")) p=-1;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#pub_loading_"+id).fadeOut();
			if (p==1) $("#pub_btn_"+id).addClass("active");
			else $("#pub_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-yym_publishers-status.php?id="+id+"&p="+p,true);
	dacon.send();
}
function yym_books_status(id)
{
	$("#pub_loading_"+id).fadeIn();
	var p;
	if ($("#pub_btn_"+id).hasClass("active")) p=-1;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#pub_loading_"+id).fadeOut();
			if (p==1) $("#pub_btn_"+id).addClass("active");
			else $("#pub_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-yym_books-status.php?id="+id+"&p="+p,true);
	dacon.send();
}
function yym_schools_status(id)
{
	$("#pub_loading_"+id).fadeIn();
	var p;
	if ($("#pub_btn_"+id).hasClass("active")) p=-1;
	else p=1;
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#pub_loading_"+id).fadeOut();
			if (p==1) $("#pub_btn_"+id).addClass("active");
			else $("#pub_btn_"+id).removeClass("active");
		}
	}
	dacon.open("GET","mod-yym_schools-status.php?id="+id+"&p="+p,true);
	dacon.send();
}

function replaceAll(str)
{
	str=str.toString();
	str=str.replace(/0/g,"۰");
	str=str.replace(/1/g,"۱");
	str=str.replace(/2/g,"۲");
	str=str.replace(/3/g,"۳");
	str=str.replace(/4/g,"۴");
	str=str.replace(/5/g,"۵");
	str=str.replace(/6/g,"۶");
	str=str.replace(/7/g,"۷");
	str=str.replace(/8/g,"۸");
	str=str.replace(/9/g,"۹");
	
	return str;
}

function tinymce_uploadphoto()
{
	var checker=1;
	if (document.getElementById('tinymce_uploadphoto_input').files.length==0) { simple_msgbox('هیج فایلی انتخاب نکرده اید.'); checker=0;}
	else if (document.getElementById('tinymce_uploadphoto_input').files.length>5) { simple_msgbox('در هر بار بارگزاری میتوانید حداکثر 5 عکس آپلود کنید.'); checker=0;}
	else
	{
		var i=0;
		for (i;i<document.getElementById('tinymce_uploadphoto_input').files.length;i++)
		{
			if (document.getElementById('tinymce_uploadphoto_input').files[i].type!="image/jpeg" && document.getElementById('tinymce_uploadphoto_input').files[i].type!="image/png")
			{
				simple_msgbox('تمامی فایل های انتخاب شده باید JPG یا PNG باشند.');
				checker=0;
				break;
			}
			else if (document.getElementById('tinymce_uploadphoto_input').files[i].size>512000)
			{
				simple_msgbox('تمامی فایل های انتخاب شده باید حداکثر 500 کیلوبایت باشند.');
				checker=0;
				break;
			}
		}
	}		
	if (checker==1)
	{
		$("#daFrame").off("load");
		$("#daFrame").on("load",function(){
			var err=$("#daFrame").contents().find("body").html();
			if (err!="")
			{
				if (err=="not_signedin") simple_msgbox('خطا: دسترسی فقط برای اعضا');
				else if (err=="not_jpg") simple_msgbox('خطا: فایل انتخاب شده باید JPG یا PNG باشد.');
				else
				{
					nav_toggle();
					simple_msgbox('بارگزاری تصاویر با موفقیت به اتمام رسید');
					var dadata=eval('(' + err + ')');
					var ed=tinyMCE.activeEditor;
					ed.focus();
					for (var i=0;i<dadata.length;i++)
						ed.selection.setContent('<img alt="'+$("#tinymce_uploadphoto_alt").val()+'" src="'+dadata[i]+'">');
				}
			}
		})
		$("#uploader_form").attr("action","tinymce_uploadphoto2.php");
		$("#uploader_form").attr("target","daFrame");
		setTimeout(function(){
			$("#uploader_form").submit();
			$('.uploader_submit').attr('disabled','true');
			simple_msgbox('در حال بارگزاری، لطفاً شکیبا باشید...');
		},1);
	}
}
function tinymce_insertvideo()
{
	// "http://www.aparat.com/video/video/embed/videohash/"+id+"/vt/frame"
	if (document.getElementById('tinymce_insertvideo_input').value=="") simple_msgbox('فیلد شناسه ی آپارات خالیست.');
	else
	{
		nav_toggle();
		simple_msgbox('ویدئو، با موفقیت درج شد.');
		var ed=tinyMCE.activeEditor;
		ed.focus();
		ed.selection.setContent('<iframe id="aparatframe" src="http://www.aparat.com/video/video/embed/videohash/'+document.getElementById('tinymce_insertvideo_input').value.trim()+'/vt/frame" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>');
	}
}
function tinymce_insertpernum()
{
	if (document.getElementById('tinymce_insertpernum_input').value=="") simple_msgbox('فیلد مربوطه خالیست.');
	else
	{
		nav_toggle();
		simple_msgbox('با موفقیت درج شد.');
		var ed=tinyMCE.activeEditor;
		ed.focus();
		ed.selection.setContent(replaceAll(document.getElementById('tinymce_insertpernum_input').value));
	}
}
var digpaz_selected_photos=new Array();
function digpaz_gallery_select(id)
{
	if (digpaz_selected_photos.indexOf(id)==-1)
	{
		$("#guide_pane #featured_btn_"+id).addClass("active");
		$("#guide_pane #featured_btn_"+id).html("حذف");
		digpaz_selected_photos.push(id);
	}
	else
	{
		$("#guide_pane #featured_btn_"+id).removeClass("active");
		$("#guide_pane #featured_btn_"+id).html("انتخاب");
		var local_selected_photos=new Array();
		for(i=0;i<digpaz_selected_photos.length;i++)
			if (digpaz_selected_photos[i]!=id) local_selected_photos.push(digpaz_selected_photos[i]);
		digpaz_selected_photos=local_selected_photos;
	}
	$("#field_selected_photos").val(JSON.stringify(digpaz_selected_photos));
}

function tooltip(string,for_nav)
{
	if ((for_nav && $("#right_pane").hasClass("min")) || !for_nav)
	{
		$("#tooltip").show();
		$("#tooltip").html(string);
	}
}
function hidett()
{
	$("#tooltip").hide();
}
function changepass()
{
	var p1=$("#field_pass1").val();
	var p2=$("#field_pass2").val();
	var p3=$("#field_pass3").val();
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#overall_loading").fadeIn();
			if (dacon.responseText=="1") document.location="login.php";
			else
			{
				$("#overall_loading").fadeOut(function(){
					simple_msgbox(dacon.responseText);
				});
			}
		}
	}
	dacon.open("POST","mod-settings-changepass.php",true);
	dacon.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	dacon.send("p1="+p1+"&p2="+p2+"&p3="+p3);
}
function onlinechat_togglestatus()
{
	if ($("#onlinechat_status").hasClass('active'))
		status_to_set=0;
	else
		status_to_set=1;
	
	$("#overall_loading").fadeIn();
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			dadata=eval('(' + dacon.responseText + ')');
			$("#overall_loading").fadeOut(function(){
				simple_msgbox(dadata.msg);
			});
			if (dadata.result==true) $("#onlinechat_status").toggleClass("active");
			if (dadata.status==1) notif_enable();
		}
	}
	dacon.open("GET","mod-onlinechat-togglestatus.php?s="+status_to_set,true);
	dacon.send();
}
function onlinechat_refresh(id)
{
	var oldHTML=$(".chatbox_pms_"+id).html();
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			if (oldHTML!=dacon.responseText)
			{
				$(".chatbox_pms_"+id).html(dacon.responseText);
				$(".chatbox_pms_"+id).animate({scrollTop: $(".chatbox_pms_"+id)[0].scrollHeight});
				if ($(".chatbox_pms_"+id+" .unreadmsg").length>0)
				{
					$(".chatbox_"+id).addClass("active");
					$(".chatbox_"+id).on("click",function(){
						onlinechat_markasread(id);
					});
				}
				else
				{
					$(".chatbox_"+id).removeClass("active");
					$(".chatbox_"+id).off("click",function(){
						onlinechat_markasread(id);
					});
				}
			}
		}
	}
	dacon.open("GET","mod-onlinechat-refresh.php?id="+id,true);
	dacon.send();
}
function onlinechat_markasread(id)
{
	$(".chatbox_"+id).removeClass("active");
	var dacon=new XMLHttpRequest();
	dacon.open("GET","mod-onlinechat-markasread.php?id="+id,true);
	dacon.send();
}
chatW=0;
function onlinechat_send(id)
{
	if (chatW==0)
	{
		chatW=1;
		$(".chatbox_"+id+" .chatloading").fadeIn();
		var dacon=new XMLHttpRequest();
		dacon.onreadystatechange=function()
		{
			if (dacon.readyState==4 && dacon.status==200)
			{
				if (dacon.responseText!="1")
				{
					msgbox(dacon.responseText);
					$(".chatbox_"+id+" .chatloading").fadeOut(function(){chatW=0;});
				}
				else
				{
					$(".chat_input_"+id).val("");
					onlinechat_refresh(id);
					$(".chatbox_"+id+" .chatloading").fadeOut(function(){chatW=0;});
				}
			}
		}
		dacon.open("POST","mod-onlinechat-send.php",true);
		dacon.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		dacon.send("id="+id+"&body="+($(".chat_input_"+id).val()));
	}
}
function notif_enable(daContent)
{
	if (daContent==undefined) daContent="برای اطلاع سریعتر از پیامهای کاربران در بخش گفتگوی آنلاین، اعلان های مرورگر خود را فعال کنید.";
	var options = {
		title: "",
		content: daContent,
		acceptText: "حتماً",
		rejectText: "فعلاً نه"
	}

	if (PusheIncluded)
	{
		Pushe.subscribe(options).then((result)=>{
			console.log(result);
		});
	}
}
function notif_settoken()
{
	if (PusheIncluded) Pushe.getDeviceId().then((deviceId) =>
	{
        var dacon=new XMLHttpRequest();
		dacon.open("POST","mod-onlinechat-settoken.php",true);
		dacon.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		dacon.send("t="+deviceId);
    });
}
var tag_batch_search_timeout;
function tag_batch_search_old(str)
{
	if (str.trim()!="")
	{
		var lastID=$(".uploader_submit").prev().prev().attr("for").substr(10);
		for (var i=0;i<=lastID;i++)
		{
			if ($("label[for=tag_batch_"+i+"]").data('ttagg').search(str)==-1) $("label[for=tag_batch_"+i+"]").hide();
			else $("label[for=tag_batch_"+i+"]").show();
		}
	}
	else $("#tag_batch_form label").show();
}
function tag_batch_search(str)
{
	$("#overall_loading").fadeIn();
	var checkedTags=[];
	$("#tag_batch_form label").toArray().forEach(function(that){
		if (that.children[0].checked)
			checkedTags.push($(that).data('ttagg'));
	});
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#tag_batch_form label").remove();
			$(".tag_batch_btns").after(dacon.responseText);
			$("#overall_loading").fadeOut();
		}
	}
	dacon.open("GET","tag_batch-search.php?db="+$("#tag_batch_search_field").data("postdb")+"&id="+$("#tag_batch_search_field").data("postid")+"&str="+str+"&checkedTags="+JSON.stringify(checkedTags),true);
	dacon.send();
	
}
function tag_batch_submit()
{
	var alreadyTags=[];
	$(".tagInputsParent input").toArray().forEach(function(that){
		if (that.value.trim()!="") alreadyTags.push(that.value.trim());
		else $(that).remove();
	});
	
	$("#tag_batch_form label").toArray().forEach(function(that){
		if (that.children[0].checked)
		{
			if (alreadyTags.indexOf($(that).data('ttagg')) == -1)
			{
				if ($(".tagInputsParent .tag_plus").prev()[0]!=undefined)
					var counter=parseInt($(".tagInputsParent .tag_plus").prev()[0].id.substr(10))+1;
				else
					var counter=0;
				$(".tag_plus").before('<input class="tag_input" type="text" id="tag_input_'+counter+'" name="tag['+counter+']" autocomplete="off" onfocus="tag_sug(this.value,this)" onkeyup="tag_sug(this.value,this,event)" onblur="hide_tag_sugs()" value="'+($(that).data('ttagg'))+'">');
			}
		}
	});
	nav_toggle();
}
function tag_batch_add()
{
	var ttagg=$("#tag_batch_search_field").val();
	if (ttagg.trim()!="")
	{
		var lastID=parseInt($(".uploader_submit").prev().prev().attr("for").substr(10));
		if ($("#tag_batch_search_field").next().attr("for")!=undefined)
		{
			var lastID2=parseInt($("#tag_batch_search_field").next().attr("for").substr(10));
			if (lastID2>lastID) lastID=lastID2;
		}
		$("#tag_batch_search_field").after('<label for="tag_batch_'+(lastID+1)+'" data-ttagg="'+ttagg+'"><input id="tag_batch_'+(lastID+1)+'" type="checkbox" checked value="1"> '+ttagg+'</label>');
	}
}
function tag_batch_handlebtns(e)
{
	if (e.keyCode==13) tag_batch_search($('#tag_batch_search_field').val());
	else
	{
		var searchInput=$("#tag_batch_search_field").val().trim();
		// console.log(searchInput);
		if (searchInput=="")
		{
			$('#tag_batch_btn_add').hide();
			$('#tag_batch_btn_search').text('نمایش همه برچسبها');
		}
		else
		{
			$(".tag_batch_btns").fadeIn();
			$('#tag_batch_btn_add').show();
			$('#tag_batch_btn_search').html('جستجوی «<span class="tag_batch_placeholder"></span>» در برچسبها');
			$('.tag_batch_placeholder').text(searchInput); 
		}
	}
}

function sms_delivery(id)
{
	// window.open("../sms.php?delivery="+id);
	// return false;
	
	$("#overall_loading").fadeIn();
	
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			$("#overall_loading").fadeOut();
			msgbox(dacon.responseText);
		}
	}
	dacon.open("GET","../sms.php?delivery="+id,true);
	dacon.send();
}

function farsnet_products_publish()
{
	if ($("#onlinechat_status").hasClass('active'))
		status_to_set=0;
	else
		status_to_set=1;
	
	$("#overall_loading").fadeIn();
	var dacon=new XMLHttpRequest();
	dacon.onreadystatechange=function()
	{
		if (dacon.readyState==4 && dacon.status==200)
		{
			dadata=eval('(' + dacon.responseText + ')');
			$("#overall_loading").fadeOut(function(){
				simple_msgbox(dadata.msg);
			});
			if (dadata.result==true) $("#onlinechat_status").toggleClass("active");
			if (dadata.status==1) notif_enable();
		}
	}
	dacon.open("GET","mod-farsnet_products-publish.php?s="+status_to_set,true);
	dacon.send();
}