function formController_slide(isEdit)
{
	hide_all_errors();
	var checker=1;
	// if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	// if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }

		if ($("#checkbox_feature")[0]!=undefined && $("#checkbox_feature")[0].checked)
		{
			if (document.getElementById('field_mp4').files.length==0) { show_error('mp4','ویدئو انتخاب نشده است.'); checker=0; }
			else if (document.getElementById('field_mp4').files[0].type!="video/mp4") { show_error('mp4','فرمت ویدئوی انتخابی mp4 نیست.'); checker=0; }
		}
	}
	else if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
	{
		show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
	}
	else if ($("#checkbox_feature")[0]!=undefined && $("#checkbox_feature")[0].checked && document.getElementById('field_mp4').files.length!=0 && document.getElementById('field_mp4').files[0].type!="video/mp4")
	{
		show_error('mp4','فرمت ویدئوی انتخابی mp4 نیست.'); checker=0;
	}
	/* if (english_site==1)
	{
		if ($("#field_engtitle").val()=="") { show_error('engtitle','این فیلد خالیست.'); checker=0; }
		if ($("#field_engbody").val()=="") { show_error('engbody','این فیلد خالیست.'); checker=0; }
	} */
	if (checker==1)
	{
		$("#daForm").attr("action","mod-slide3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_digpaz_slide(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
	{
		show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-digpaz_slide3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_game_slide(isEdit)
{
	hide_all_errors();
	var checker=1;
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
	{
		show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-game_slide3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_news(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	// if (news_has_rutitr==1 && $("#field_rutitr").val()=="") { show_error('rutitr','این فیلد خالیست.'); checker=0; }
	if (news_default_cat!=0 && $("#field_cats").val()==null) { show_error('cats','حداقل باید یک دسته برای خبر انتخاب شود'); checker=0; }
	if (news_has_summary==1)
	{
		if ($("#field_summary").val()=="") { show_error('summary','این فیلد خالیست.'); checker=0; }
		else if (parseInt($("#letterLimit_summary").html())<0) { show_error('summary','تعداد کاراکتر مجاز را رعایت نکرده اید.'); checker=0; }
	}
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
	{
		show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
	}
	if (english_site==1)
	{
		if ($("#field_engtitle").val()=="") { show_error('engtitle','این فیلد خالیست.'); checker=0; }
		if ($("#field_engbody").val()=="") { show_error('engbody','این فیلد خالیست.'); checker=0; }
		// if (news_has_rutitr==1 && $("#field_engrutitr").val()=="") { show_error('engrutitr','این فیلد خالیست.'); checker=0; }
		if (news_has_summary==1)
		{
			if ($("#field_engsummary").val()=="") { show_error('engsummary','این فیلد خالیست.'); checker=0; }
			else if (parseInt($("#letterLimit_engsummary").html())<0) { show_error('engsummary','تعداد کاراکتر مجاز را رعایت نکرده اید.'); checker=0; }
		}
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-news3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_abou_news(isEdit)
{
	hide_all_errors();
	var checker=1;
	var aboutype=$("#abou_news_type").val();
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (aboutype==1 && $("#field_rutitr").val()=="") { show_error('rutitr','این فیلد خالیست.'); checker=0; }
	// if (news_has_rutitr==1 && $("#field_rutitr").val()=="") { show_error('rutitr','این فیلد خالیست.'); checker=0; }
	if (aboutype==0 && news_default_cat!=0 && $("#field_cats").val()==null) { show_error('cats','حداقل باید یک دسته برای خبر انتخاب شود'); checker=0; }
	if ($("#field_summary").val()=="") { show_error('summary','این فیلد خالیست.'); checker=0; }
	else if (parseInt($("#letterLimit_summary").html())<0) { show_error('summary','تعداد کاراکتر مجاز را رعایت نکرده اید.'); checker=0; }
	/* if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	} */
	if (aboutype==0 && document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
	{
		show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
	}
	if (english_site==1)
	{
		if ($("#field_engtitle").val()=="") { show_error('engtitle','این فیلد خالیست.'); checker=0; }
		if ($("#field_engbody").val()=="") { show_error('engbody','این فیلد خالیست.'); checker=0; }
		if (news_has_rutitr==1 && $("#field_engrutitr").val()=="") { show_error('engrutitr','این فیلد خالیست.'); checker=0; }
		if (news_has_summary==1)
		{
			if ($("#field_engsummary").val()=="") { show_error('engsummary','این فیلد خالیست.'); checker=0; }
			else if (parseInt($("#letterLimit_engsummary").html())<0) { show_error('engsummary','تعداد کاراکتر مجاز را رعایت نکرده اید.'); checker=0; }
		}
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-abou_news3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_majma_arkaan(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_position").val()=="") { show_error('position','این فیلد خالیست.'); checker=0; }
	if ($("#field_desc").val()=="") { show_error('desc','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-majma_arkaan3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_sohrabi_books(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_pub").val()=="") { show_error('pub','این فیلد خالیست.'); checker=0; }
	if ($("#field_pub_year").val()=="") { show_error('pub_year','این فیلد خالیست.'); checker=0; }
	if ($("#field_pages").val()=="") { show_error('pages','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-sohrabi_books3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_mehregan_products(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_code").val()=="") { show_error('code','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-mehregan_products3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_syntech_products(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!$("#checkbox_syprocatred")[0].checked && !$("#checkbox_syprocatblue")[0].checked && !$("#checkbox_syprocatgreen")[0].checked && !$("#checkbox_syprocatviolet")[0].checked) { show_error('rgbv','حداقل یک دسته بندی باید انتخاب شود'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/png") { show_error('image','فرمت تصویر انتخابی png نیست.'); checker=0; }
	}
	else if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/png") { show_error('image','فرمت تصویر انتخابی png نیست.'); checker=0; }
	if (document.getElementById('field_table_image').files.length!=0 && document.getElementById('field_table_image').files[0].type!="image/jpeg") { show_error('table_image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-syntech_products3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_syntech_events(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_location").val()=="") { show_error('location','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی png نیست.'); checker=0; }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-syntech_events3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_cha_projects(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_type").val()=="") { show_error('type','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی png نیست.'); checker=0; }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-cha_projects3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_sohrabi_slide(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_type").val()=="") { show_error('type','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-sohrabi_slide3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_sohrabi_poems(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-sohrabi_poems3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_majma_khayer(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_position").val()=="") { show_error('position','این فیلد خالیست.'); checker=0; }
	if ($("#field_desc").val()=="") { show_error('desc','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-majma_khayer3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_articles(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_author_title").val()=="") { show_error('author_title','این فیلد خالیست.'); checker=0; }
	// if ($("#field_summary").val()=="") { show_error('summary','این فیلد خالیست.'); checker=0; }
	// else if (parseInt($("#letterLimit_summary").html())<0) { show_error('summary','تعداد کاراکتر مجاز را رعایت نکرده اید.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
		if (document.getElementById('field_cover').files.length==0) { show_error('cover','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_cover').files[0].type!="image/jpeg") { show_error('cover','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else
	{
		if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
		{
			show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
		}
		if (document.getElementById('field_cover').files.length!=0 && document.getElementById('field_cover').files[0].type!="image/jpeg")
		{
			show_error('cover','فرمت تصویر انتخابی jpg نیست.'); checker=0;
		}
	}
	if (english_site==1)
	{
		if ($("#field_engtitle").val()=="") { show_error('engtitle','این فیلد خالیست.'); checker=0; }
		if ($("#field_engbody").val()=="") { show_error('engbody','این فیلد خالیست.'); checker=0; }
		if ($("#field_engauthor").val()=="") { show_error('engauthor','این فیلد خالیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-articles3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_meftah_services(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (english_site==1)
	{
		if ($("#field_engtitle").val()=="") { show_error('engtitle','این فیلد خالیست.'); checker=0; }
		if ($("#field_engbody").val()=="") { show_error('engbody','این فیلد خالیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-meftah_services3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_meftah_products(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		// else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	// else
	// {
		// if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
		// {
			// show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
		// }
	// }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-meftah_products3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_farsnet_products(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		// else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	// else
	// {
		// if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
		// {
			// show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
		// }
	// }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-farsnet_products3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_meftah_training(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_summary").val()=="") { show_error('summary','این فیلد خالیست.'); checker=0; }
	if ($("#field_pishniaz").val()=="") { show_error('pishniaz','این فیلد خالیست.'); checker=0; }
	if ($("#field_duration").val()=="") { show_error('duration','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	// if (($("#field_price_virtual").val()=="" || $("#field_price_virtual").val()<=0) && ($("#field_price_private").val()=="" || $("#field_price_private").val()<=0) && ($("#field_price_semiprivate").val()=="" || $("#field_price_semiprivate").val()<=0) && ($("#field_price_public").val()=="" || $("#field_price_public").val()<=0)) { show_error('price_virtual','حداقل یکی از انواع دوره ها باید دارای شهریه باشد'); checker=0; }
	if (english_site==1)
	{
		if ($("#field_engtitle").val()=="") { show_error('engtitle','این فیلد خالیست.'); checker=0; }
		if ($("#field_engbody").val()=="") { show_error('engbody','این فیلد خالیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-meftah_training3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_digpaz_authors(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_name").val()=="") { show_error('name','این فیلد خالیست.'); checker=0; }
	// if ($("#field_social_account").val()=="") { show_error('social_account','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
	{
		show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-digpaz_authors3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_digpaz_togo(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_gps1").val()=="") { show_error('gps1','این فیلد خالیست.'); checker=0; }
	if ($("#field_gps2").val()=="") { show_error('gps2','این فیلد خالیست.'); checker=0; }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-digpaz_togo3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_contactways(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-contactways3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_dj_support(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-dj_support3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_ticketAnswer(isNew)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (document.getElementById('field_attachment').files.length!=0 && document.getElementById('field_attachment').files[0].type!="application/x-zip-compressed") { show_error('attachment','فرمت فایل انتخابی zip نیست.'); checker=0; }
	if (isNew)
	{
		if ($("#field_subject").val()=="") { show_error('subject','این فیلد خالیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#ticketAnswerForm").attr("action","mod-tickets4.php");
		setTimeout(function(){$("#ticketAnswerForm").submit();},1);
		submit_prevent();
	}
}
function formController_ticketErja()
{
	$("#ticketErjaForm").attr("action","mod-tickets5.php");
	setTimeout(function(){$("#ticketErjaForm").submit();},1);
	submit_prevent();
}
function formController_contactsocials(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-contactsocials3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_linx(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_link").val()=="") { show_error('link','این فیلد خالیست.'); checker=0; }
	if ($("#radio_texti")[0].checked && $("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if ($("#radio_banneri")[0].checked && !isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
	{
		show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-linx3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_poll(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_question").val()=="") { show_error('question','این فیلد خالیست.'); checker=0; }
	if ($("#answer_input_0").val().trim()=="" && $("#answer_input_1").val().trim()=="") { show_error('answer','حداقل دو پاسخ باید وارد کنید.'); checker=0; }
	if (isEdit)
	{
		
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-poll3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_dj_pro_options(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#answer_input_0").val().trim()=="" && $("#answer_input_1").val().trim()=="") { show_error('answer','حداقل دو آیتم باید وارد کنید.'); checker=0; }
	if (isEdit)
	{
		
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-dj_pro_options3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_news_authors(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_username").val()=="") { show_error('username','این فیلد خالیست.'); checker=0; }
	if ($("#field_password").val()=="") { show_error('password','این فیلد خالیست.'); checker=0; }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-news_authors3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_dj_team(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_name").val()=="") { show_error('name','این فیلد خالیست.'); checker=0; }
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
	{
		show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-dj_team3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_digpaz_blog(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
	{
		show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-digpaz_blog3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_dj_blog(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
	{
		show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-dj_blog3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_discount_codes(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_giftcode").val()=="") { show_error('giftcode','این فیلد خالیست.'); checker=0; }
	if ($("#field_percent").val()=="") { show_error('percent','این فیلد خالیست.'); checker=0; }
	else if ($("#field_percent").val()>=100) { show_error('percent','مقداری بین 0 و 100 وارد کنید.'); checker=0; }
	if ($("#field_maxamount").val()<=0 && $("#field_maxamount").val()!="") { show_error('maxamount','عدد طبیعی وارد کنید.'); checker=0; }
	if ($("#field_limit_count").val()=="") { show_error('limit_count','این فیلد خالیست.'); checker=0; }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-discount_codes3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_static()
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (english_site==1)
	{
		if ($("#field_engtitle").val()=="") { show_error('engtitle','این فیلد خالیست.'); checker=0; }
		if ($("#field_engbody").val()=="") { show_error('engbody','این فیلد خالیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-static2.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_meftah_jobs()
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (english_site==1)
	{
		if ($("#field_engtitle").val()=="") { show_error('engtitle','این فیلد خالیست.'); checker=0; }
		if ($("#field_engbody").val()=="") { show_error('engbody','این فیلد خالیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-meftah_jobs3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_chap_parameters()
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	// if ($("#radio_fixed")[0].checked)
	// {
		// if ($("#field_fee").val()=="") { show_error('fee','این فیلد خالیست.'); checker=0; }
		// else if ((parseFloat($("#field_fee").val())>=0 || parseFloat($("#field_fee").val())<0)==false) { show_error('fee','در این فیلد عدد وارد کنید!'); checker=0; } 
	// }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-chap_parameters3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_photo_albums(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if (parseInt($("#letterLimit_body").html())<0) { show_error('body','تعداد کاراکتر مجاز را رعایت نکرده اید.'); checker=0; }
	if ($("#field_photos").val()!="")
	{
		var counter=0;
		for (var i=0;i<document.getElementById('field_photos').files.length;i++)
		{
			if (document.getElementById('field_photos').files[i].type!="image/jpeg") counter++;
		}
		if (counter>0)
		{
			show_error('photos',counter+' فایل از بین فایل های انتخابی فرمت jpg ندارند.');
			checker=0;
		}
	}
	else if (!isEdit)
	{
		show_error('photos','هیچ تصویری انتخاب نشده است.');
		checker=0;
	}
	if (checker==1)
	{
		// $("#daForm").attr("target","daFrame");
		$("#daForm").attr("action","mod-photo_albums3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		// onComplete_goto=isEdit?window.location:"index.php?pid=13";
		// startUpload();
		submit_prevent();
	}
}
function formController_sani_products(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_photos").val()!="")
	{
		var counter=0;
		for (var i=0;i<document.getElementById('field_photos').files.length;i++)
		{
			if (document.getElementById('field_photos').files[i].type!="image/jpeg") counter++;
		}
		if (counter>0)
		{
			show_error('photos',counter+' فایل از بین فایل های انتخابی فرمت jpg ندارند.');
			checker=0;
		}
	}
	else if (!isEdit)
	{
		show_error('photos','هیچ تصویری انتخاب نشده است.');
		checker=0;
	}
	if (checker==1)
	{
		// $("#daForm").attr("target","daFrame");
		$("#daForm").attr("action","mod-sani_products3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		// onComplete_goto=isEdit?window.location:"index.php?pid=13";
		// startUpload();
		submit_prevent();
	}
}
function formController_kanoon_camps(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_subject").val()=="") { show_error('subject','این فیلد خالیست.'); checker=0; }
	if ($("#field_goal").val()=="") { show_error('goal','این فیلد خالیست.'); checker=0; }
	else if ($("#field_goal").val()!=parseInt($("#field_goal").val())) { show_error('goal','فقط رقم به تومان با اعداد لاتین وارد شود'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if ($("#field_photos").val()!="")
	{
		var counter=0;
		for (var i=0;i<document.getElementById('field_photos').files.length;i++)
		{
			if (document.getElementById('field_photos').files[i].type!="image/jpeg") counter++;
		}
		if (counter>0)
		{
			show_error('photos',counter+' فایل از بین فایل های انتخابی فرمت jpg ندارند.');
			checker=0;
		}
	}
	else if (!isEdit)
	{
		show_error('photos','هیچ تصویری انتخاب نشده است.');
		checker=0;
	}
	if (checker==1)
	{
		// $("#daForm").attr("target","daFrame");
		$("#daForm").attr("action","mod-kanoon_camps3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		// onComplete_goto=isEdit?window.location:"index.php?pid=13";
		// startUpload();
		submit_prevent();
	}
}
function formController_steelrokh_products(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_code").val()=="") { show_error('code','این فیلد خالیست.'); checker=0; }
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_photos").val()!="")
	{
		var counter=0;
		for (var i=0;i<document.getElementById('field_photos').files.length;i++)
		{
			if (document.getElementById('field_photos').files[i].type!="image/jpeg") counter++;
		}
		if (counter>0)
		{
			show_error('photos',counter+' فایل از بین فایل های انتخابی فرمت jpg ندارند.');
			checker=0;
		}
	}
	else if (!isEdit)
	{
		show_error('photos','هیچ تصویری انتخاب نشده است.');
		checker=0;
	}
	if (english_site==1)
	{
		if ($("#field_engtitle").val()=="") { show_error('engtitle','این فیلد خالیست.'); checker=0; }
	}
	if (checker==1)
	{
		// $("#daForm").attr("target","daFrame");
		$("#daForm").attr("action","mod-steelrokh_products3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		// onComplete_goto=isEdit?window.location:"index.php?pid=13";
		// startUpload();
		submit_prevent();
	}
}

function formController_dj_products(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_code").val()=="") { show_error('code','این فیلد خالیست.'); checker=0; }
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if ($("#color_input_0").val()=="") { show_error('color','حداقل یک کد رنگ باید وارد کنید.'); checker=0; }
	if ($("#field_price").val()=="") { show_error('price','این فیلد خالیست.'); checker=0; }
	if (parseInt($("#field_special_price").val())>=parseInt($("#field_price").val())) { show_error('special_price','قیمت ویژه نمیتواند برابر یا بیشتر از قیمت اصلی باشد'); checker=0; }
	// if ($("#field_suit_price").val()=="") { show_error('suit_price','این فیلد خالیست.'); checker=0; }
	// if (parseInt($("#field_suit_special_price").val())>=parseInt($("#field_suit_price").val())) { show_error('suit_special_price','قیمت ویژه نمیتواند برابر یا بیشتر از قیمت اصلی باشد'); checker=0; }
	
	// var checker2=0;
	// for (var i=0;i<$(".tshirt_size_option").length;i++)
		// if ($(".tshirt_size_option")[i].checked) checker2=1;
	// if (checker2==0) { show_error('tshirt_size','حداقل یک سایز باید انتخاب کنید.'); checker=0; }
	
	if ($("#field_photos").val()!="")
	{
		var counter=0;
		for (var i=0;i<document.getElementById('field_photos').files.length;i++)
		{
			if (document.getElementById('field_photos').files[i].type!="image/jpeg") counter++;
		}
		if (counter>0)
		{
			show_error('photos',counter+' فایل از بین فایل های انتخابی فرمت jpg ندارند.');
			checker=0;
		}
	}
	else if (!isEdit)
	{
		show_error('photos','هیچ تصویری انتخاب نشده است.');
		checker=0;
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-dj_products3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}

function formController_farsnet_projects(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_company").val()=="") { show_error('company','این فیلد خالیست.'); checker=0; }
	if ($("#field_scale").val()=="") { show_error('scale','این فیلد خالیست.'); checker=0; }
	if ($("#field_duration").val()=="") { show_error('duration','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
	}
	// else
	// {
		// if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
		// {
			// show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0;
		// }
	// }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-farsnet_projects3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_farsnet_isos(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else
	{
		if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
			{ show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	
	if (checker==1)
	{
		$("#daForm").attr("action","mod-farsnet_isos3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_videos(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_duration").val()=="") { show_error('duration','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	else if (parseInt($("#letterLimit_body").html())<0) { show_error('body','تعداد کاراکتر مجاز را رعایت نکرده اید.'); checker=0; }
	if ($("#field_aparatID").val()=="") { show_error('aparatID','این فیلد خالیست.'); checker=0; }
	
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
		
		// if (document.getElementById('field_capture1').files.length==0) { show_error('capture1','اسکرین شات انتخاب نشده است.'); checker=0; }
		// else if (document.getElementById('field_capture1').files[0].type!="image/jpeg") { show_error('capture1','فرمت اسکرین شات انتخابی jpg نیست.'); checker=0; }
		
		// if (document.getElementById('field_capture2').files.length==0) { show_error('capture2','اسکرین شات انتخاب نشده است.'); checker=0; }
		// else if (document.getElementById('field_capture2').files[0].type!="image/jpeg") { show_error('capture2','فرمت اسکرین شات انتخابی jpg نیست.'); checker=0; }
		
		// if (document.getElementById('field_capture3').files.length==0) { show_error('capture3','اسکرین شات انتخاب نشده است.'); checker=0; }
		// else if (document.getElementById('field_capture3').files[0].type!="image/jpeg") { show_error('capture3','فرمت اسکرین شات انتخابی jpg نیست.'); checker=0; }
		
		// if (document.getElementById('field_capture4').files.length==0) { show_error('capture4','اسکرین شات انتخاب نشده است.'); checker=0; }
		// else if (document.getElementById('field_capture4').files[0].type!="image/jpeg") { show_error('capture4','فرمت اسکرین شات انتخابی jpg نیست.'); checker=0; }
		
		// if (document.getElementById('field_webm').files.length==0) { show_error('webm','فایل webm انتخاب نشده است.'); checker=0; }
		// else if (document.getElementById('field_webm').files[0].type!="video/webm") { show_error('webm','فرمت فایل انتخابی webm نیست.'); checker=0; }
		
		// if (document.getElementById('field_mp4').files.length==0) { show_error('mp4','فایل mp4 انتخاب نشده است.'); checker=0; }
		// else if (document.getElementById('field_mp4').files[0].type!="video/mp4") { show_error('mp4','فرمت فایل انتخابی mp4 نیست.'); checker=0; }
	}
	else
	{
		if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
			{ show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
			
		// if (document.getElementById('field_capture1').files.length!=0 && document.getElementById('field_capture1').files[0].type!="image/jpeg")
			// { show_error('capture1','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
			
		// if (document.getElementById('field_capture2').files.length!=0 && document.getElementById('field_capture2').files[0].type!="image/jpeg")
			// { show_error('capture2','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
			
		// if (document.getElementById('field_capture3').files.length!=0 && document.getElementById('field_capture3').files[0].type!="image/jpeg")
			// { show_error('capture3','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
			
		// if (document.getElementById('field_capture4').files.length!=0 && document.getElementById('field_capture4').files[0].type!="image/jpeg")
			// { show_error('capture4','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
			
		// if (document.getElementById('field_webm').files.length!=0 && document.getElementById('field_webm').files[0].type!="video/webm")
			// { show_error('webm','فرمت فایل انتخابی webm نیست.'); checker=0; }
			
		// if (document.getElementById('field_mp4').files.length!=0 && document.getElementById('field_mp4').files[0].type!="video/mp4")
			// { show_error('mp4','فرمت فایل انتخابی mp4 نیست.'); checker=0; }
	}
	
	if (checker==1)
	{
		// $("#daForm").attr("target","daFrame");
		$("#daForm").attr("action","mod-videos3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		// onComplete_goto=isEdit?window.location:"index.php?pid=14";
		// startUpload();
		submit_prevent();
	}
}
function formController_audios(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_duration").val()=="") { show_error('duration','این فیلد خالیست.'); checker=0; }
	// if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	else if (parseInt($("#letterLimit_body").html())<0) { show_error('body','تعداد کاراکتر مجاز را رعایت نکرده اید.'); checker=0; }
	
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
		
		if (document.getElementById('field_mp3').files.length==0) { show_error('mp3','فایل mp3 انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_mp3').files[0].type!="audio/mpeg") { show_error('mp3','فرمت فایل انتخابی mp3 نیست.'); checker=0; }
	}
	else
	{
		if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
			{ show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
			
		if (document.getElementById('field_mp3').files.length!=0 && document.getElementById('field_mp3').files[0].type!="audio/mpeg")
			{ show_error('mp3','فرمت فایل انتخابی mp3 نیست.'); checker=0; }
	}
	
	if (checker==1)
	{
		$("#daForm").attr("action","mod-audios3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_about(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if ($("#radio_tabi")[0].checked && $("#field_parentID").val()=="0") { show_error('parentID','هیچ بلاکی انتخاب نشده است، ابتدا یک بلاک بسازید'); checker=0; }
	
	if (checker==1)
	{
		$("#daForm").attr("action","mod-about3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_abou_videos(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_duration").val()=="") { show_error('duration','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()!="" && parseInt($("#letterLimit_body").html())<0) { show_error('body','تعداد کاراکتر مجاز را رعایت نکرده اید.'); checker=0; }
	if ($("#radio_aparati")[0].checked && $("#field_aparatID").val()=="") { show_error('aparatID','این فیلد خالیست.'); checker=0; }

	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
		
		if ($("#radio_mp4i")[0].checked)
			if (document.getElementById('field_mp4').files.length==0) { show_error('mp4','فایل انتخاب نشده است.'); checker=0; }
			else if (document.getElementById('field_mp4').files[0].type!="video/mp4") { show_error('mp4','فرمت ویدئوی انتخابی mp4 نیست.'); checker=0; }
	}
	else
	{
		if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
			{ show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
			
		if ($("#radio_mp4i")[0].checked && document.getElementById('field_mp4').files.length!=0 && document.getElementById('field_mp4').files[0].type!="video/mp4")
			{ show_error('mp4','فرمت ویدئوی انتخابی mp4 نیست.'); checker=0; }
	}
	
	if (checker==1)
	{
		$("#daForm").attr("action","mod-abou_videos3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_downloads(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	// if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	else if (parseInt($("#letterLimit_body").html())<0) { show_error('body','تعداد کاراکتر مجاز را رعایت نکرده اید.'); checker=0; }
	
	if (!isEdit)
	{
		// if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		// else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
		
		if (document.getElementById('field_zip').files.length==0) { show_error('zip','فایل دانلود انتخاب نشده است.'); checker=0; }
		// else if (document.getElementById('field_zip').files[0].type!="application/zip") { show_error('zip','فرمت فایل انتخابی zip نیست.'); checker=0; }
	}
	// else
	// {
		// if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
			// { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
			
		// if (document.getElementById('field_zip').files.length!=0 && document.getElementById('field_zip').files[0].type!="application/zip")
			// { show_error('zip','فرمت فایل انتخابی zip نیست.'); checker=0; }
	// }
	
	if (checker==1)
	{
		if (document.getElementById('field_zip').files.length!=0)
		{
			$("#daForm").attr("target","daFrame");
			onComplete_goto=isEdit?window.location:"index.php?pid=15";
			startUpload();
		}
		$("#daForm").attr("action","mod-downloads3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_terminology(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_letter").val()=="") { show_error('letter','این فیلد خالیست.'); checker=0; }
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_escaped_title").val()=="") { show_error('escaped_title','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	
	if (checker==1)
	{
		$("#daForm").attr("action","mod-terminology3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_digpaz_reviews(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_restaurant").val()=="") { show_error('restaurant','این فیلد خالیست.'); checker=0; }
	if ($("#field_address").val()=="") { show_error('address','این فیلد خالیست.'); checker=0; }
	if ($("#field_gps1").val()=="") { show_error('gps1','این فیلد خالیست.'); checker=0; }
	if ($("#field_gps2").val()=="") { show_error('gps2','این فیلد خالیست.'); checker=0; }
	if ($("#field_meal").val()=="") { show_error('meal','این فیلد خالیست.'); checker=0; }
	if ($("#field_rate_service").val()=="") { show_error('rate_service','این فیلد خالیست.'); checker=0; }
	if ($("#field_rate_environment").val()=="") { show_error('rate_environment','این فیلد خالیست.'); checker=0; }
	if ($("#field_rate_food").val()=="") { show_error('rate_food','این فیلد خالیست.'); checker=0; }
	if ($("#field_rate_perprice").val()=="") { show_error('rate_perprice','این فیلد خالیست.'); checker=0; }
	if ($("#field_rate_overall").val()=="") { show_error('rate_overall','این فیلد خالیست.'); checker=0; }
	if ($("#field_body").val()=="") { show_error('body','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
		if (document.getElementById('field_cover').files.length==0) { show_error('cover','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_cover').files[0].type!="image/jpeg") { show_error('cover','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else
	{
		if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
			{ show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
			
		if (document.getElementById('field_cover').files.length!=0 && document.getElementById('field_cover').files[0].type!="image/jpeg")
			{ show_error('cover','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-digpaz_reviews3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_yym_formfields(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_field_caption").val()=="") { show_error('field_caption','این فیلد خالیست.'); checker=0; }
	if ($("#field_field_type").val()=="2" && $(".tag_input")[0].value=="") { show_error('field_type','حداقل یک گزینه باید برای این لیست منظور گردد.'); checker=0; }
	if ($("#field_field_type").val()=="3")
	{
		if (parseInt($("#field_field_range_min").val()).toString()=="NaN") { show_error('field_range_min','در این فیلد باید یک عدد صحیح وارد کنید.'); checker=0; }
		if (parseInt($("#field_field_range_max").val()).toString()=="NaN") { show_error('field_range_max','در این فیلد باید یک عدد صحیح وارد کنید.'); checker=0; }
		if (parseInt($("#field_field_range_min").val())>parseInt($("#field_field_range_max").val())) { show_error('field_type','مقدار عددیِ ابتدای بازه باید از انتهای بازه کمتر باشد!'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-yym_formfields3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_cats(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-cats3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_khaierin_ads(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_link").val()=="") { show_error('link','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg" && document.getElementById('field_image').files[0].type!="image/gif") { show_error('image','فرمت تصویر انتخابی jpg یا gif نیست.'); checker=0; }
	}
	else
	{
		if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg" && document.getElementById('field_image').files[0].type!="image/gif")
			{ show_error('image','فرمت تصویر انتخابی jpg یا gif نیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-khaierin_ads3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_majma_ads(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_link").val()=="") { show_error('link','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg" && document.getElementById('field_image').files[0].type!="image/gif") { show_error('image','فرمت تصویر انتخابی jpg یا gif نیست.'); checker=0; }
	}
	else
	{
		if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg" && document.getElementById('field_image').files[0].type!="image/gif")
			{ show_error('image','فرمت تصویر انتخابی jpg یا gif نیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-majma_ads3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_majma_sponsor(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_link").val()=="") { show_error('link','این فیلد خالیست.'); checker=0; }
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg" && document.getElementById('field_image').files[0].type!="image/gif" && document.getElementById('field_image').files[0].type!="image/png") { show_error('image','فرمت تصویر انتخابی jpg یا gif یا png نیست.'); checker=0; }
	}
	else
	{
		if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg" && document.getElementById('field_image').files[0].type!="image/gif" && document.getElementById('field_image').files[0].type!="image/png")
			{ show_error('image','فرمت تصویر انتخابی jpg یا gif یا png نیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-majma_sponsor3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_dj_slide(isEdit)
{
	hide_all_errors();
	var checker=1;
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else
	{
		if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
			{ show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-dj_slide3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_dj_yourphotos(isEdit)
{
	hide_all_errors();
	var checker=1;
	if (!isEdit)
	{
		if (document.getElementById('field_image').files.length==0) { show_error('image','تصویر انتخاب نشده است.'); checker=0; }
		else if (document.getElementById('field_image').files[0].type!="image/jpeg") { show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	else
	{
		if (document.getElementById('field_image').files.length!=0 && document.getElementById('field_image').files[0].type!="image/jpeg")
			{ show_error('image','فرمت تصویر انتخابی jpg نیست.'); checker=0; }
	}
	if (checker==1)
	{
		$("#daForm").attr("action","mod-dj_yourphotos3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}
function formController_khaierin_charities(isEdit)
{
	hide_all_errors();
	var checker=1;
	if ($("#field_title").val()=="") { show_error('title','این فیلد خالیست.'); checker=0; }
	if ($("#field_city").val()=="") { show_error('city','این فیلد خالیست.'); checker=0; }
	if ($("#field_telephone").val()=="") { show_error('telephone','این فیلد خالیست.'); checker=0; }
	if ($("#field_address").val()=="") { show_error('address','این فیلد خالیست.'); checker=0; }
	if (checker==1)
	{
		$("#daForm").attr("action","mod-khaierin_charities3.php");
		setTimeout(function(){$("#daForm").submit();},1);
		submit_prevent();
	}
}