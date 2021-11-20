jQuery(function($) {
/**
 * SMOF js
 *
 * contains the core functionalirezas to be used
 * inside SMOF
 */

jQuery.noConflict();

/** Fire up jQuery - let's dance!
 */
jQuery(document).ready(function($){
	"use strict";

	//(un)fold options in a checkbox-group
  	jQuery('.fld').click(function() {
		var $fold='.f_'+this.id;
		$($fold).slideToggle('normal', "swing");
  	});

  	//Color picker
 
	//hides warning if js is enabled
	$('#js-warning').hide();

	//Tabify Options
	$('.group').hide();

	// Display last current tab
	if ($.cookie("of_current_opt") === null) {
		$('.group:first').fadeIn('fast');
		$('#of-nav li:first').addClass('current');
	} else {

		var hooks = $('#hooks').html();
		hooks = jQuery.parseJSON(hooks);

		$.each(hooks, function(key, value) {

			if ($.cookie("of_current_opt") == '#of-option-'+ value) {
				$('.group#of-option-' + value).fadeIn();
				$('#of-nav li.' + value).addClass('current');
			}

		});

	}

	//Current Menu Class
	$('#of-nav li a').click(function(evt){
	// event.preventDefault();

		$('#of-nav li').removeClass('current');
		$(this).parent().addClass('current');

		var clicked_group = $(this).attr('href');

		$.cookie('of_current_opt', clicked_group, { expires: 7, path: '/' });

		$('.group').hide();

		$(clicked_group).fadeIn('fast');
		return false;

	});

	//Expand Options
	var flip = 0;

	$('#expand_options').click(function(){
		if(flip == 0){
			flip = 1;
			$('#of_container #of-nav').hide();
			$('#of_container #content').width(755);
			$('#of_container .group').add('#of_container .group h2').show();

			$(this).removeClass('expand');
			$(this).addClass('close');
			$(this).text('Close');

		} else {
			flip = 0;
			$('#of_container #of-nav').show();
			$('#of_container #content').width(595);
			$('#of_container .group').add('#of_container .group h2').hide();
			$('#of_container .group:first').show();
			$('#of_container #of-nav li').removeClass('current');
			$('#of_container #of-nav li:first').addClass('current');

			$(this).removeClass('close');
			$(this).addClass('expand');
			$(this).text('Expand');

		}

	});

	//Update Message popup
	$.fn.center = function () {
		this.animate({"top":( $(window).height() - this.height() - 200 ) / 2+$(window).scrollTop() + "px"},100);
		this.css("left", 250 );
		return this;
	}


	$('#of-popup-save').center();
	$('#of-popup-reset').center();
	$('#of-popup-fail').center();

	$(window).scroll(function() {
		$('#of-popup-save').center();
		$('#of-popup-reset').center();
		$('#of-popup-fail').center();
	});

	// xecuter Edit
	//Masked Inputs (images as radio buttons)
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');
	});
	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();

	//Masked Inputs (background images as radio buttons)
	$('.of-radio-tile-img').click(function(){
		$(this).parent().parent().find('.of-radio-tile-img').removeClass('of-radio-tile-selected');
		$(this).addClass('of-radio-tile-selected');
	});
	$('.of-radio-tile-label').hide();
	$('.of-radio-tile-img').show();
	$('.of-radio-tile-radio').hide();

	// Style Select
	(function ($) {
	var styleSelect = {
		init: function () {
		$('.select_wrapper').each(function () {
			$(this).prepend('<span>' + $(this).find('option:selected').text() + '</span>');
		});
		$('.select').live('change', function () {
			$(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
		});
		$('.select').bind($.browser.msie ? 'click' : 'change', function(event) {
			$(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
		});
		}
	};
	$(document).ready(function () {
		styleSelect.init()
	})
	})(jQuery);
	// End xecuter Edit


	/** Aquagraphite Slider MOD */

	//Hide (Collapse) the toggle containers on load
	$(".slide_body").hide();

	//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
	$(".slide_edit_button").live( 'click', function(){
		/*
		//display as an accordion
		$(".slide_header").removeClass("active");
		$(".slide_body").slideUp("fast");
		*/
		//toggle for each
		$(this).parent().toggleClass("active").next().slideToggle("fast");
		return false; //Prevent the browser jump to the link anchor
	});

	// Update slide title upon typing
	function update_slider_title(e) {
		var element = e;
		if ( this.timer ) {
			clearTimeout( element.timer );
		}
		this.timer = setTimeout( function() {
			$(element).parent().prev().find('strong').text( element.value );
		}, 100);
		return true;
	}

	$('.of-slider-title').live('keyup', function(){
		update_slider_title(this);
	});


	//Remove individual slide
	$('.slide_delete_button').live('click', function(){
	// event.preventDefault();
	var agree = confirm("Are you sure you wish to delete this slide?");
		if (agree) {
			var $trash = $(this).parents('li');
			//$trash.slideUp('slow', function(){ $trash.remove(); }); //chrome + confirm bug made slideUp not working...
			$trash.animate({
					opacity: 0.25,
					height: 0,
				}, 500, function() {
					$(this).remove();
			});
			return false; //Prevent the browser jump to the link anchor
		} else {
		return false;
		}
	});

	//Add new slide
	$(".slide_add_button").live('click', function(){
		var slidesContainer = $(this).prev();
		var sliderId = slidesContainer.attr('id');

		var numArr = $('#'+sliderId +' li').find('.order').map(function() {
			var str = this.id;
			str = str.replace(/\D/g,'');
			str = parseFloat(str);
			return str;
		}).get();

		var maxNum = Math.max.apply(Math, numArr);
		if (maxNum < 1 ) { maxNum = 0};
		var newNum = maxNum + 1;

		var newSlide = '<li class="temphide"><div class="slide_header"><strong>Slide ' + newNum + '</strong><input type="hidden" class="slide of-input order" name="' + sliderId + '[' + newNum + '][order]" id="' + sliderId + '_slide_order-' + newNum + '" value="' + newNum + '"><a class="slide_edit_button" href="#">Edit</a></div><div class="slide_body" style="display: none; "><label>Title</label><input class="slide of-input of-slider-title" name="' + sliderId + '[' + newNum + '][title]" id="' + sliderId + '_' + newNum + '_slide_title" value=""><label>Image URL</label><input class="upload slide of-input" name="' + sliderId + '[' + newNum + '][url]" id="' + sliderId + '_' + newNum + '_slide_url" value=""><div class="upload_button_div"><span class="button media_upload_button" id="' + sliderId + '_' + newNum + '">Upload</span><span class="button remove-image hide" id="reset_' + sliderId + '_' + newNum + '" title="' + sliderId + '_' + newNum + '">Remove</span></div><div class="screenshot"></div><label>Link URL (optional)</label><input class="slide of-input" name="' + sliderId + '[' + newNum + '][link]" id="' + sliderId + '_' + newNum + '_slide_link" value=""><label>Description (optional)</label><textarea class="slide of-input" name="' + sliderId + '[' + newNum + '][description]" id="' + sliderId + '_' + newNum + '_slide_description" cols="8" rows="8"></textarea><a class="slide_delete_button" href="#">Delete</a><div class="clear"></div></div></li>';

		slidesContainer.append(newSlide);
		var nSlide = slidesContainer.find('.temphide');
		nSlide.fadeIn('fast', function() {
			$(this).removeClass('temphide');
		});

		optionsframework_file_bindings(); // re-initialise upload image..

		return false; //prevent jumps, as always..
	});

	//Sort slides
	jQuery('.slider').find('ul').each( function() {
		var id = jQuery(this).attr('id');
		$('#'+ id).sortable({
			placeholder: "placeholder",
			opacity: 0.6,
			handle: ".slide_header",
			cancel: "a"
		});
	});


	/**	Sorter (Layout Manager) */
	jQuery('.sorter').each( function() {
		var id = jQuery(this).attr('id');
		$('#'+ id).find('ul').sortable({
			items: 'li',
			placeholder: "placeholder",
			connectWith: '.sortlist_' + id,
			opacity: 0.6,
			update: function() {
				$(this).find('.position').each( function() {

					var listID = $(this).parent().attr('id');
					var parentID = $(this).parent().parent().attr('id');
					parentID = parentID.replace(id + '_', '')
					var optionID = $(this).parent().parent().parent().attr('id');
					$(this).prop("name", optionID + '[' + parentID + '][' + listID + ']');

				});
			}
		});
	});

	//  xecuter Edit

	/**	Ajax Backup & Restore MOD */
	//backup button
	$('#of_backup_button').live('click', function(){

		var answer = confirm("Click OK to backup your current saved options.")

		if (answer){

			var clickedObject = $(this);
			var clickedID = $(this).attr('id');

			var nonce = $('#security').val();

			var data = {
				action: 'of_ajax_post_action',
				type: 'backup_options',
				security: nonce
			};

			if( typeof(smof_wpml) != 'undefined' && smof_wpml.wpml_custom_current_lang ) {
				data.wpml = smof_wpml.wpml_custom_current_lang;
			}

			$.post(ajaxurl, data, function(response) {

				//check nonce
				if(response==-1){ //failed

					var fail_popup = $('#of-popup-fail');
					fail_popup.fadeIn();
					window.setTimeout(function(){
						fail_popup.fadeOut();
					}, 2000);
				}

				else {

					var success_popup = $('#of-popup-save');
					success_popup.fadeIn();
					window.setTimeout(function(){
						window.location.reload(true);
					}, 1000);
				}

			});

		}

	return false;

	});
	// End xecuter Edit

	//restore button
	$('#of_restore_button').live('click', function(){

		var answer = confirm("'Warning: All of your current options will be replaced with the data from your last backup! Proceed?")

		if (answer){

			var clickedObject = $(this);
			var clickedID = $(this).attr('id');

			var nonce = $('#security').val();

			var data = {
				action: 'of_ajax_post_action',
				type: 'restore_options',
				security: nonce
			};

			if( typeof(smof_wpml) != 'undefined' && smof_wpml.wpml_custom_current_lang ) {
				data.wpml = smof_wpml.wpml_custom_current_lang;
			}

			$.post(ajaxurl, data, function(response) {

				//check nonce
				if(response==-1){ //failed

					var fail_popup = $('#of-popup-fail');
					fail_popup.fadeIn();
					window.setTimeout(function(){
						fail_popup.fadeOut();
					}, 2000);
				}

				else {

					var success_popup = $('#of-popup-save');
					success_popup.fadeIn();
					window.setTimeout(function(){
window.location.reload(true);					}, 1000);
				}

			});

		}

	return false;

	});

	/**	Ajax Transfer (Import/Export) Option */
	$('#of_import_button').live('click', function(){

		var answer = confirm("Click OK to import options.")

		if (answer){

			var clickedObject = $(this);
			var clickedID = $(this).attr('id');

			var nonce = $('#security').val();

			var import_data = $('#export_data').val();

			var data = {
				action: 'of_ajax_post_action',
				type: 'import_options',
				security: nonce,
				data: import_data
			};

			if( typeof(smof_wpml) != 'undefined' && smof_wpml.wpml_custom_current_lang ) {
				data.wpml = smof_wpml.wpml_custom_current_lang;
			}

			$.post(ajaxurl, data, function(response) {
				var fail_popup = $('#of-popup-fail');
				var success_popup = $('#of-popup-save');

				//check nonce
				if(response==-1){ //failed
					fail_popup.fadeIn();
					window.setTimeout(function(){
						fail_popup.fadeOut();
					}, 2000);
				}
				else
				{
					success_popup.fadeIn();
					window.setTimeout(function(){
window.location.reload(true);					}, 1000);
				}

			});

		}

	return false;

	});

	/** AJAX Save Options */
	$('#of_save').live('click',function() {

		var nonce = $('#security').val();

		$('.ajax-loading-img').fadeIn();

		//get serialized data from all our option fields
		// Avada edit
		$('#of_form :input[name][name!="security"][name!="of_reset"][name!="google_analytics"][name!="space_head"][name!="space_body"][name!="custom_css"]').val().replace(/\%22/g, "'");

		var serializedReturn = $('#of_form :input[name][name!="security"][name!="of_reset"]').serialize();
		// End Avada edit

		var data = {
			type: 'save',
			action: 'of_ajax_post_action',
			security: nonce,
			data: serializedReturn
		};

		if( typeof(smof_wpml) != 'undefined' && smof_wpml.wpml_custom_current_lang ) {
			data.wpml = smof_wpml.wpml_custom_current_lang;
		}

		$.post(ajaxurl, data, function(response) {
			var success = $('#of-popup-save');
			var fail = $('#of-popup-fail');
			var loading = $('.ajax-loading-img');
			loading.fadeOut();

			if (response==1) {
				success.fadeIn();
			} else {
				fail.fadeIn();
			}

			window.setTimeout(function(){
				success.fadeOut();
				fail.fadeOut();
			}, 2000);
		});

	return false;

	});


	/* AJAX Options Reset */
	$('#of_reset').click(function() {

		//confirm reset
		var answer = confirm("Click OK to reset. All settings will be lost and replaced with default settings!");

		//ajax reset
		if (answer){

			var nonce = $('#security').val();

			$('.ajax-reset-loading-img').fadeIn();

			var data = {

				type: 'reset',
				action: 'of_ajax_post_action',
				security: nonce,
			};

			if( typeof(smof_wpml) != 'undefined' && smof_wpml.wpml_custom_current_lang ) {
				data.wpml = smof_wpml.wpml_custom_current_lang;
			}

			$.post(ajaxurl, data, function(response) {
				var success = $('#of-popup-reset');
				var fail = $('#of-popup-fail');
				var loading = $('.ajax-reset-loading-img');
				loading.fadeOut();

				if (response==1)
				{
					success.fadeIn();
					window.setTimeout(function(){
window.location.reload(true);					}, 1000);
				}
				else
				{
					fail.fadeIn();
					window.setTimeout(function(){
						fail.fadeOut();
					}, 2000);
				}


			});

		}

	return false;

	});


	/**	Tipsy @since v1.3 */
	if (jQuery().tipsy) {
		$('.typography-size, .typography-height, .typography-face, .typography-style, .of-typography-color').tipsy({
			fade: true,
			gravity: 's',
			opacity: 0.7,
		});
	}


	/**
	  * JQuery UI Slider function
	  * Dependencies 	 : jquery, jquery-ui-slider
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 03.17.2013
	  */
	jQuery('.smof_sliderui').each(function() {
		var obj   = jQuery(this);
		var sId   = "#" + obj.data('id');
		var val   = parseInt(obj.data('val'));
		var min   = parseInt(obj.data('min'));
		var max   = parseInt(obj.data('max'));
		var step  = parseInt(obj.data('step'));

		//slider init
		obj.slider({
			value: val,
			min: min,
			max: max,
			step: step,
			range: "min",
			slide: function( event, ui ) {
				jQuery(sId).val( ui.value );
			}
		});

	});

	jQuery( '.section-sliderui' ).find( 'input' ).change( function() {
		jQuery( this ).siblings( '.smof_sliderui' ).slider( 'option', 'value', jQuery( this ).val() );

	});


	/**
	  * Switch
	  * Dependencies 	 : jquery
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 03.17.2013
	  */
	  
 
		//fold/unfold related options
 
  
	jQuery(".cb-enable").click(function(){
		var parent = $(this).parents('.switch-options');
		jQuery('.cb-disable',parent).removeClass('selected');
		jQuery(this).addClass('selected');
		jQuery('.main_checkbox',parent).attr('checked', true);

		//fold/unfold related options
		var obj = jQuery(this);
		var $fold='.f_'+obj.data('id');
		jQuery($fold).slideDown('normal', "swing");
	});
	jQuery(".cb-disable").click(function(){
		var parent = $(this).parents('.switch-options');
		jQuery('.cb-enable',parent).removeClass('selected');
		jQuery(this).addClass('selected');
		jQuery('.main_checkbox',parent).attr('checked', false);

		//fold/unfold related options
		var obj = jQuery(this);
		var $fold='.f_'+obj.data('id');
		jQuery($fold).slideUp('normal', "swing");
	});
	//disable text select(for modern chrome, safari and firefox is done via CSS)
	if (($.browser.msie && $.browser.version < 10) || $.browser.opera) {
		$('.cb-enable span, .cb-disable span').find().attr('unselectable', 'on');
	}


	/**
	  * Google Fonts
	  * Dependencies 	 : google.com, jquery
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 03.17.2013
	  */
	function GoogleFontSelect( slctr, mainID ){

		var _selected = $(slctr).val(); 						//get current value - selected and saved
		var _linkclass = 'style_link_'+ mainID;
		var _previewer = mainID +'_ggf_previewer';

		if( _selected ){ //if var exists and isset

			//Check if selected is not equal with "Select a font" and execute the script.
			if ( _selected !== 'none' && _selected !== 'Select a font' ) {

				//remove other elements crested in <head>
				$( '.'+ _linkclass ).remove();

				//replace spaces with "+" sign
				var the_font = _selected.replace(/\s+/g, '+');

				//add reference to google font family
				$('head').append('<link href="http://fonts.googleapis.com/css?family='+ the_font +'" rel="stylesheet" type="text/css" class="'+ _linkclass +'">');

				//show in the preview box the font
				$('.'+ _previewer ).css('font-family', _selected +', sans-serif' );

			}else{

				//if selected is not a font remove style "font-family" at preview box
				$('.'+ _previewer ).css('font-family', '' );

			}

		}

	}

	//init for each element
	jQuery( '.google_font_select' ).each(function(){
		var mainID = jQuery(this).attr('id');
		GoogleFontSelect( this, mainID );
	});

	//init when value is changed
	jQuery( '.google_font_select' ).change(function(){
		var mainID = jQuery(this).attr('id');
		GoogleFontSelect( this, mainID );
	});


	/**
	  * Media Uploader
	  * Dependencies 	 : jquery, wp media uploader
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 05.28.2013
	  */
	function optionsframework_add_file(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( frame ) {
			frame.open();
			return;
		}

		// Create the media frame.
		frame = wp.media({
			// Set the title of the modal.
			title: $el.data('choose'),

			// Customize the submit button.
			button: {
				// Set the text of the button.
				text: $el.data('update'),
				// Tell the button not to close the modal, since we're
				// going to refresh the page when the image is selected.
				close: false
			}
		});

		// When an image is selected, run a callback.
		frame.on( 'select', function() {
			// Grab the selected attachment.
			var attachment = frame.state().get('selection').first();
			frame.close();
			selector.find('.upload').val(attachment.attributes.url);
			if ( attachment.attributes.type == 'image' ) {
				selector.find('.screenshot').empty().hide().append('<img class="of-option-image" src="' + attachment.attributes.url + '">').slideDown('fast');
			}
			selector.find('.media_upload_button').unbind();
			selector.find('.remove-image').show().removeClass('hide');//show "Remove" button
			selector.find('.remove-image').css( 'display', 'inline-block' );
			selector.find('.of-background-properrezas').slideDown();
			optionsframework_file_bindings();
		});

		// Finally, open the modal.
		frame.open();
	}

	function optionsframework_remove_file(selector) {
		selector.find('.remove-image').hide().addClass('hide');//hide "Remove" button
		selector.find('.upload').val('');
		selector.find('.of-background-properrezas').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind();
		// We don't display the upload button if .upload-notice is present
		// This means the user doesn't have the WordPress 3.5 Media Library Support
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.media_upload_button').remove();
		}
		optionsframework_file_bindings();
	}

	function optionsframework_file_bindings() {
		$('.remove-image, .remove-file').on('click', function() {
			optionsframework_remove_file( $(this).parents('.section-upload, .section-media, .slide_body') );
		});

		$('.media_upload_button').unbind('click').click( function( event ) {
			optionsframework_add_file(event, $(this).parents('.section-upload, .section-media, .slide_body'));
		});
	}

	optionsframework_file_bindings();
	
	// xecuter Edit

	//accordion Title
	$('.accordion').each(function() {
		$(this).find('.section-accordion:last').remove();
		$(this).find('.accordion-content').css("display","none");
	});
	  jQuery(document).on("click", ".panel-plus" , function(){
 
		jQuery('.accordion').find('.accordion-content').hide(300);
		jQuery('.panel-minus').hide();
		jQuery('.panel-plus').show();
    });
	  
  	jQuery(document).on("click", ".panel-plus" , function(){
 		jQuery(this).parent().parent().parent().parent().find('.accordion-content').slideToggle(300);
		jQuery(this).hide();
 		jQuery(this).parent().find(".panel-minus").show();
    });
 
 	jQuery(document).on("click", ".panel-minus" , function(){
  
 		jQuery(this).parent().parent().parent().parent().find('.accordion-content').slideToggle("fast");
		jQuery(this).hide();
 		jQuery(this).parent().find(".panel-plus").show();
    });
	
 
	// Body Background Type
	// Body Background Type
  	if( $('#xecuter_body_background_type #pattern').is( ":selected" )) {
		jQuery('#section-xecuter_body_background_pattern').show();
		jQuery('.xecuter_body_background_custom').hide();
		
	} else if( $('#xecuter_body_background_type #custom').is(":selected")){
		jQuery('.xecuter_body_background_custom').show();
		jQuery('#section-xecuter_body_background_pattern').hide();	
		
	} else{
		jQuery('#section-xecuter_body_background_pattern').hide();
		jQuery('.xecuter_body_background_custom').hide();
	}
	$('#xecuter_body_background_type').on('change', function() {

	
		   if ( $(this).val() == 'none' ) {
  				jQuery('.xecuter_body_background_custom').hide();
				jQuery('#section-xecuter_body_background_pattern').hide();
		   }
		   if ( $(this).val() == 'pattern' ) {
 				jQuery('#section-xecuter_body_background_pattern').show();
				jQuery('.xecuter_body_background_custom').hide();
			}
		   if ( $(this).val() == 'custom' ) {
 		jQuery('.xecuter_body_background_custom').show();
		jQuery('#section-xecuter_body_background_pattern').hide();
		   }
	});
 	 // Logo Type
  	
 	 // Logo Type
  	if( $('#xecuter_logo_type #image').is( ":selected" )) {
 		jQuery('.xecuter_logo_custom_image').show();
		jQuery('#section-xecuter_logo_title_font_size').hide();	
		jQuery('#section-xecuter_logo_title_color').hide();	
		jQuery('#section-xecuter_logo_description_font_size').hide();	
		jQuery('#section-xecuter_logo_description_color').hide();	
		
	} else if( $('#xecuter_logo_type #title').is(":selected")){
		 jQuery('.xecuter_logo_custom_image').hide();
		jQuery('#section-xecuter_logo_title_font_size').show();
 		jQuery('#section-xecuter_logo_title_color').show();	
 		jQuery('#section-xecuter_logo_description_font_size').hide();	
		jQuery('#section-xecuter_logo_description_color').hide();	

	}  else if( $('#xecuter_logo_type #description').is(":selected")){
		 jQuery('.xecuter_logo_custom_image').hide();
		jQuery('#section-xecuter_logo_title_font_size').show();
 		jQuery('#section-xecuter_logo_title_color').show();	
 		jQuery('#section-xecuter_logo_description_font_size').show();	
		jQuery('#section-xecuter_logo_description_color').show();	
	}   
 	$('#xecuter_logo_type').on('change', function() {
	   if ( $(this).val() == 'image' ) {
			jQuery('.xecuter_logo_custom_image').show();
			jQuery('#section-xecuter_logo_title_font_size').hide();	
			jQuery('#section-xecuter_logo_title_color').hide();	
			jQuery('#section-xecuter_logo_description_font_size').hide();	
			jQuery('#section-xecuter_logo_description_color').hide();
			
	  } else if($(this).val() == 'title'){
				jQuery('.xecuter_logo_custom_image').hide();
			jQuery('#section-xecuter_logo_title_font_size').show();
			jQuery('#section-xecuter_logo_title_color').show();
			jQuery('#section-xecuter_logo_description_font_size').hide();	
			jQuery('#section-xecuter_logo_description_color').hide();
	  } else  if($(this).val() == 'description'){
	   jQuery('.xecuter_logo_custom_image').hide();
		jQuery('#section-xecuter_logo_title_font_size').show();
 		jQuery('#section-xecuter_logo_title_color').show();	
 		jQuery('#section-xecuter_logo_description_font_size').show();	
		jQuery('#section-xecuter_logo_description_color').show();	
	  }
	  
	});
		
	
   	function reza_hide_blog_opt() {
  		jQuery('#section-xecuter_size1,#section-xecuter_size2,#section-xecuter_ratio,#section-xecuter_ratio2,#section-xecuter_height,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').hide();
		}
		reza_hide_blog_opt();
  

	// Block
 		jQuery('#section-xecuter_content_layout,#section-xecuter_main_layout').hide();
		
		if( $('.xecuter_row_1200' ).is( ":checked" )) {
			jQuery('#section-xecuter_content_layout').show();
				if( jQuery('.xecuter_content_layout_grid_1c' ).is( ":checked" )) {
					jQuery('#section-xecuter_height,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
				}
				
				if( $('.xecuter_content_layout_grid_2c,.xecuter_content_layout_grid_3c,.xecuter_content_layout_grid_4c,.xecuter_content_layout_grid_5c' ).is( ":checked" )) {
					jQuery('#section-xecuter_ratio,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
				} 
				
				if( $('.xecuter_content_layout_grid_6c' ).is( ":checked" )) {
					jQuery('#section-xecuter_ratio').show();
				} 
				
				if( $('.xecuter_content_layout_list_1c' ).is( ":checked" )) {
					jQuery('#section-xecuter_size1,#section-xecuter_ratio2,#section-xecuter_excerpt_limit').show();
				} 	
				
				if( $('.xecuter_content_layout_list_2c' ).is( ":checked" )) {
					jQuery('#section-xecuter_size2,#section-xecuter_ratio,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
				} 
				
				if( $('.xecuter_content_layout_list_3c' ).is( ":checked" )) {
					jQuery('#section-xecuter_size1,#section-xecuter_ratio,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
				} 			
		}
		
		if( $('.xecuter_row_800_400,.xecuter_row_400_800' ).is( ":checked" )) {
 			 jQuery('#section-xecuter_main_layout').show();
			 
			if( $('.xecuter_main_layout_grid_1c' ).is( ":checked" )) {
				jQuery('#section-xecuter_height,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
			}
			if( $('.xecuter_main_layout_grid_2c,.xecuter_main_layout_grid_3c' ).is( ":checked" )) {
				jQuery('#section-xecuter_ratio,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
			} 
			if( $('.xecuter_content_layout_main_6c' ).is( ":checked" )) {
				jQuery('#section-xecuter_ratio').show();
			} 
 	
			if( $('.xecuter_main_layout_list_1c' ).is( ":checked" )) {
				jQuery('#section-xecuter_size2,#section-xecuter_ratio,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
			} 
			if( $('.xecuter_main_layout_list_2c' ).is( ":checked" )) {
				jQuery('#section-xecuter_size1,#section-xecuter_ratio,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
			} 
			
					 
		}
		 			 
		jQuery('#section-xecuter_row').on("click", ".of-radio-1200 img" , function(){
			jQuery('#section-xecuter_content_layout').show();
 			jQuery('#section-xecuter_main_layout').hide();
 			$('#section-xecuter_content_layout').find('img').removeClass('of-radio-img-selected');
 			$('.of-radio-grid_1c').find('img').addClass("of-radio-img-selected");
			$('.xecuter_content_layout_grid_1c').attr('checked','checked');
			reza_hide_blog_opt();
			jQuery('#section-xecuter_height,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
						
    	}); 
		jQuery('#section-xecuter_row').on("click", ".of-radio-800_400 img,.of-radio-400_800 img" , function(){
			jQuery('#section-xecuter_main_layout').show();
 			jQuery('#section-xecuter_content_layout').hide();
			$('#section-xecuter_main_layout').find('img').removeClass('of-radio-img-selected');
 			$('.of-radio-grid_1c').find('img').addClass("of-radio-img-selected");
			$('.xecuter_main_layout_grid_1c').attr('checked','checked');
			reza_hide_blog_opt();
			jQuery('#section-xecuter_height,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
    	});  			
 	
	 
		
		// Content Blog
 
		jQuery('#section-xecuter_content_layout').on("click", ".of-radio-grid_1c img" , function(){
			reza_hide_blog_opt();
			jQuery('#section-xecuter_height,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();

    	});
		jQuery('#section-xecuter_main_layout').on("click", ".of-radio-grid_1c img" , function(){
			reza_hide_blog_opt();
			jQuery('#section-xecuter_height,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();

    	});
		 
		
		jQuery('#section-xecuter_content_layout').on("click", ".of-radio-grid_2c img,.of-radio-grid_3c img,.of-radio-grid_4c img,.of-radio-grid_5c img" , function(){
			reza_hide_blog_opt();
			jQuery('#section-xecuter_ratio,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
 
    	}); 
		
		
		jQuery('#section-xecuter_main_layout').on("click", ".of-radio-grid_2c img,.of-radio-grid_3c img " , function(){
			reza_hide_blog_opt();
			jQuery('#section-xecuter_ratio,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
 
    	}); 
		
		jQuery('#section-xecuter_content_layout').on("click", ".of-radio-grid_6c img" , function(){
			reza_hide_blog_opt();
			jQuery('#section-xecuter_ratio').show();
     	}); 
		
		jQuery('#section-xecuter_main_layout').on("click", ".of-radio-grid_4c img" , function(){
			reza_hide_blog_opt();
			jQuery('#section-xecuter_ratio').show();
     	}); 
				
		jQuery('#section-xecuter_content_layout').on("click", ".of-radio-list_1c img" , function(){
			reza_hide_blog_opt();
			jQuery('#section-xecuter_size1,#section-xecuter_ratio2,#section-xecuter_excerpt_limit').show();
     	}); 
		
		jQuery('#section-xecuter_content_layout').on("click", ".of-radio-list_2c img" , function(){
			reza_hide_blog_opt();
			jQuery('#section-xecuter_size1,#section-xecuter_ratio,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
     	}); 

		jQuery('#section-xecuter_main_layout').on("click", ".of-radio-list_1c img" , function(){
			reza_hide_blog_opt();
			jQuery('#section-xecuter_size1,#section-xecuter_ratio,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();
     	}); 
		jQuery('#section-xecuter_content_layout').on("click", ".of-radio-list_3c img" , function(){
			reza_hide_blog_opt();
			jQuery('#section-xecuter_ratio,#section-xecuter_ratio,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();

    	}); 
		
		jQuery('#section-xecuter_main_layout').on("click", ".of-radio-list_2c img" , function(){
			reza_hide_blog_opt();
			jQuery('#section-xecuter_ratio,#section-xecuter_ratio,#section-xecuter_excerpt,#section-xecuter_excerpt_limit').show();

    	}); 
		
	//Single Ratio
 	jQuery('#section-xecuter_single_ratio').hide();
  	if( $('.xecuter_single_template_1,.xecuter_single_template_2' ).is( ":checked" )) {
 		jQuery('#section-xecuter_single_ratio').show();
 	}		
	jQuery('#section-xecuter_single_template').on("click", ".of-radio-1 img,.of-radio-2 img" , function(){
  		jQuery('#section-xecuter_single_ratio').show();
	});
	jQuery('#section-xecuter_single_template').on("click", ".of-radio-3 img,.of-radio-4 img" , function(){
  		jQuery('#section-xecuter_single_ratio').hide();
	});	
	 
 }); //end doc ready
 });