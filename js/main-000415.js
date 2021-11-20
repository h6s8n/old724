function cofo_preloader(){var o=$(".preloader-wrap"),a=$(".preloader-wrap .preloader-inner");$(window).load("body",function(){a.fadeOut(),o.delay(350).fadeOut("slow")})}function cofo_navbar(){var o=$(".header"),a=$(".navbar-nav>li>a"),e=$(".scroll-top-btn"),s=$(".logo-transparent"),n=$(".logo-normal");$(window).on("scroll",function(){$(this).scrollTop()>100?(o.addClass("header-shrink"),e.addClass("active"),s.hide(),n.show()):(o.removeClass("header-shrink"),e.removeClass("active"),s.show(),n.hide())}),a.on("click",function(){$(".navbar-collapse").collapse("hide")})} function cofo_wowJs(){new WOW({boxClass:"wow",animateClass:"animated",offset:0,mobile:!0,live:!0,scrollContainer:null}).init()} function cofo_scrollIt(){$.scrollIt({easing:"swing",scrollTime:300,activeClass:"active",onPageChange:null,topOffset:-15})}function cofo_navScrollSpy(){$("body").scrollspy({target:"#fixedNavbar",offset:70})} function cofo_owlCarousel(){var o=$(".testimonials-carousel"),a=$(".screenshot-carousel");o.owlCarousel({rtl:!0,loop:!0,margin:20,nav:!1,responsive:{0:{items:1},600:{items:1},1000:{items:1}}}),a.owlCarousel({loop:!0,margin:20,nav:!0,dots:!1,navText:['<span class="fa fa-arrow-left"></span>','<span class="fa fa-arrow-right"></span>'],responsive:{0:{items:1},600:{items:2},768:{items:3},1000:{items:4}}})}function cofo_featuresTab(){var o=$(".tab-link-wrap"),a=$(".tab-link-item"),e=$(".tab-content-item");a.click(function(){let s=$(this),n=s.index();o.find(a).removeClass("active"),s.addClass("active"),e.removeClass("active"),e.eq(n).addClass("active")})}function cofo_magnificPopup(){$(".popup-youtube").magnificPopup({disableOn:700,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1})}$(function(){"use strict";cofo_preloader(),cofo_navbar(),cofo_wowJs(),cofo_scrollIt(),cofo_navScrollSpy(),cofo_owlCarousel(),/* cofo_counterUp(), */cofo_featuresTab(),cofo_magnificPopup()});

$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

function msgbox(msgtext,dir)
{
	if (dir=="ltr") {document.getElementById('msgboxnote').style.direction='ltr'; document.getElementById('msgboxnote').style.textAlign='left';}
	document.getElementById('msgboxnote').innerHTML=msgtext;
	document.getElementById('msgbox').style.display='block';
	document.getElementById('msgboxbutton').focus();
}
function sahafi_change(id,parameterID,lvl)
{
	msgbox('در حال پردازش، لطفاً شکیبا باشید...');
	$.ajax({
		method: "GET",
		url: "sahafi_change.php",
		data: {
			id: id,
			lvl: lvl
		}
	})
	.done(function( msg ) {
		$('#msgbox').hide();
		$("#parameter"+parameterID+"_htmlholder").html(msg);
		calculate();
		
		$(".selectonload").toArray().forEach(function(e){
			if (e.id!=undefined)
			{
				sahafi_change(e.value, e.id.substr(9), $(e).data("lvl"));
				$(e).removeClass("selectonload");
			}
		})
	});
}

var submitBtnClicked=false;
function calculate()
{
	$(".calculation_status").css("display","flex");
	$(".calculation_status").text("در حال پردازش، لطفاً شکیبا باشید...");
	
	if (submitBtnClicked)
		msgbox('در حال پردازش، لطفاً شکیبا باشید...');
	
	$.ajax({
		method: "POST",
		url: "calculation.php",
		data: $('#the_chaap_form').serializeArray(),
		submitBtnClicked: submitBtnClicked
	})
	.done(function( msg ) {
		var returnObj=JSON.parse(msg);
		if (returnObj.status=="")
		{
			if (submitBtnClicked)
				document.location="index.php?page=invoice"
			$(".calculation_status").hide();
			$("#price_eachpage").text(returnObj.prices.each_page);
			$("#price_eachbook").text(returnObj.prices.each_book);
			$("#price_packing").text(returnObj.prices.packing);
			$("#price_sum").text(returnObj.prices.sum);
		}
		else
		{
			$(".calculation_status").text(returnObj.status);
			if (submitBtnClicked)
				msgbox(returnObj.status);
			submitBtnClicked=false;
		}
	});
}
$(window).scroll(function(){
	// if ($(window).scrollTop() >= document.body.scrollHeight-$(window).height()-200)
	if ($(window).scrollTop() >= $("#chaap").offset().top-($(window).height()/2))
	// if ($(window).scrollTop() >= $("#chaap").offset().top)
		$(".calculation, .calculation_ghost").addClass("active");
	else
		$(".calculation, .calculation_ghost").removeClass("active");
	
	if ($(".calculation_ghost").offset()!=undefined)
	{
		if ($(window).scrollTop() >= $(".calculation_ghost").offset().top-($(window).height()-120))
			$(".calculation, .calculation_ghost").removeClass("active");
	}
});

function nafis()
{
	$("#parameter104").val(117);
	sahafi_change(117,104);
	$("html, body").animate({scrollTop: $("#the_chaap_form").offset().top-100});
	// $("html, body").scrollTop($("#parameter104").offset().top);
}
function sade()
{
	$("#parameter104").val(142);
	sahafi_change(142,104);
	$("html, body").animate({scrollTop: $("#the_chaap_form").offset().top-100});
	// $("html, body").scrollTop($("#parameter104").offset().top);
}

var mobile_submitW=0, errorShown=false;
function mobile_submit()
{
	if (mobile_submitW==0)
	{
		mobile_submitW=1;
		errorShown=true;
		$("#mobile_result").text("در حال پردازش، لطفاً شکیبا باشید...");
		
		$.ajax({
			method: "POST",
			url: "mobile_verify.php",
			data: $('#mobile_form').serializeArray()
		})
		.done(function( msg ) {
			errorShown=false;
			mobile_submitW=0;
			var returnObj=JSON.parse(msg);
			if (returnObj.status==1)
			{
				$("#input_contact_name,#input_contact_cell").attr("disabled","disabled");
				$("#input_contact_vfcd_parent").fadeIn();
				$("#input_contact_mobile_submitbtn").text("بررسی کد احراز هویت و پرداخت");
				mobileTimer=60;
				mobileTimerIntval=setInterval(function(){
					if (mobileTimer>=1)
					{
						if (!errorShown)
							$("#mobile_result").html("کد 6 رقمی را در فیلد بالا وارد کنید. در صورتیکه کد صحیح باشد به درگاه بانک منتقل خواهید شد.<br>برای دریافت مجدد پیامک یا تغییر شماره موبایل باید "+mobileTimer+" ثانیه صبر کنید.");
						mobileTimer--;
					}
					else
					{
						$("#input_contact_name,#input_contact_cell").removeAttr("disabled");
						$("#input_contact_vfcd_parent").fadeOut();
						if (!errorShown)
							$("#mobile_result").text("کد احراز هویت منقضی شده است. مجدداً اقدام نمائید.");
						$("#input_contact_mobile_submitbtn").text("دریافت پیامک احراز هویت");
						clearInterval(mobileTimerIntval);
					}
				},1000);
			}
			else if (returnObj.status==2)
			{
				mobile_submitW=1;
				errorShown=true;
				$("#mobile_result").text("در حال انتقال به درگاه بانک...");
				document.location=returnObj.msg;
			}
			else
			{
				errorShown=true;
				$("#mobile_result").html(returnObj.msg+'<br><a href="javascript:void(0)" onclick="errorShown=false; $(this).remove();">خُب</a>');
			}
		});
	}
}

var percent=0, step=0.1;
function upload_start()
{
	if ($("#input_file_Word")[0].files.length>0 || $("#input_file_PDF")[0].files.length>0 || $("#input_file_ZIP")[0].files.length>0)
	{
		$("#upload_form").attr("action","upload.php");
		$("#upload_form").attr("target","upload_target");
		setTimeout(function(){
			$("#upload_form").submit();
		},10);
		setTimeout(function(){
			$("#upload_form_submit").attr("disabled","disabled");
			$("#upload_form_submit").text("در حال بارگذاری، لطفاً شکیبا باشید...");
		},20);
		
		$(".progress_parent").animate({height: 30});
		uploadInterval=setInterval(function(){
			if (percent<1)
				percent+=step;
			else if (percent<95)
				percent+=(100-percent)/200*step;
			$(".progress_bar").css("width",percent+"%");
			$(".progress_percent").text(Math.round(percent)+"%");
			if (percent>=50)
				$(".progress_percent").css("color","white");
		},50);
	}
	else
		msgbox('فایلی انتخاب نشده است. حداقل یکی از فرمتهای Word یا PDF یا ZIP باید بارگذاری شوند.');
}
function upload_finish()
{
	var result=$("#upload_target_iframe").contents().find('body').html();
	if (result!="")
	{
		if (uploadInterval!=undefined) clearInterval(uploadInterval);
		percent=0;
		$(".progress_bar").animate({width: "100%"},{
			step: function(now,fx){
				$(".progress_percent").text(Math.round(parseInt($(".progress_bar")[0].style.width))+"%");
			},
			complete: function(){
				$(".progress_parent").animate({height: 0});
				msgbox(result);
				if (result=="فایل شما با موفقیت بارگذاری شد.")
				{
					var types=["Word","PDF","ZIP"];
					types.forEach(function(type){
						$('#input_file_'+type)[0].value="";
						if ($('label[for=input_file_'+type+']').text()!=type+" فایل")
						{
							$(".listofuploads").html($(".listofuploads").html()+"<div class='item'>"+$('label[for=input_file_'+type+']').text()+"</div>");
							$('label[for=input_file_'+type+']').text(type+" فایل");
						}
					});
					$(".listofuploads").show();
				}
				$("#upload_form").attr("action","javascript:upload_start()");
				$("#upload_form").removeAttr("target");
				$("#upload_form_submit").removeAttr("disabled");
				$("#upload_form_submit").text("ارسال");
			}
		});
	}
}

function checkfile(type)
{
	var if1 = type=="Word" && ($('#input_file_'+type)[0].files[0].name.substr(-4)=="docx" || $('#input_file_'+type)[0].files[0].name.substr(-3)=="doc");
	var if2 = type=="PDF" && $('#input_file_'+type)[0].files[0].name.substr(-3)=="pdf";
	var if3 = type=="ZIP" && $('#input_file_'+type)[0].files[0].name.substr(-3)=="zip";
	
	if (if1 || if2 || if3)
		$('label[for=input_file_'+type+']').text($('#input_file_'+type)[0].files[0].name);
	else
	{
		$('#input_file_'+type)[0].value="";
		$('label[for=input_file_'+type+']').text(type+" فایل");
		msgbox('در این فیلد، فایلِ '+type+' را انتخاب نمائید.');
	}
}

function photoenlarge(that)
{
	var str=that.style.backgroundImage;
	$(".photoenlarge img").attr("src",str.substr(5,(str.length)-7));
	$(".photoenlarge").fadeIn();
}

panelW=0;
function toggleCoverPanel(that)
{
	if (panelW==0)
	{
		panelW=1;
		if (that.checked)
		{
			$("#panel").css("height","auto");
			var daHeight=$("#panel").height();
			// console.log(daHeight);
			$("#panel").css("height","0");
			$("#panel").animate({height: daHeight},"fast",function(){
				panelW=0;
			});
		}
		else
		{
			$("#panel").animate({height: 0},"fast",function(){
				panelW=0;
			});
		}
	}
}