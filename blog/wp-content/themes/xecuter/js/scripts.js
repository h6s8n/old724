 (function($) {
	'use strict';
	jQuery(document).ready(function() {
	//-------------- CircleDiagram --------------// 
 	//Copyright (c) monochromer.
 	function reza_review(){
 	$('.rd-review-circular').each(function(index, element) {
		
		if(!$(this).find('canvas').hasClass('rd-canvas')){	
	
	var el = this; // get canvas

	var options = {
		percent:  el.getAttribute('data-percent') || 25,
		size: el.getAttribute('data-size') || 190,
		lineWidth: el.getAttribute('data-line') || 15,
		rotate: el.getAttribute('data-rotate') || 0
	}

		var canvas = document.createElement('canvas');
		$(this).find('canvas').addClass('rd-canvas');				

		if (typeof(G_vmlCanvasManager) !== 'undefined') {
			G_vmlCanvasManager.initElement(canvas);
		}
		
		var ctx = canvas.getContext('2d');
		canvas.width = canvas.height = options.size;
		
		el.appendChild(canvas);
		
		ctx.translate(options.size / 2, options.size / 2); // change center
		ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg
		
		//imd = ctx.getImageData(0, 0, 240, 240);
		var radius = (options.size - options.lineWidth) / 2;
		
		var drawCircle = function(color, lineWidth, percent) {
				percent = Math.min(Math.max(0, percent || 1), 1);
				ctx.beginPath();
				ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
				ctx.strokeStyle = color;
				ctx.lineCap = 'round'; // butt, round or square
				ctx.lineWidth = lineWidth
				ctx.stroke();
		};
		
		drawCircle('#333', options.lineWidth, 100 / 100);
		drawCircle(xecuter_js.primary_color, options.lineWidth, options.percent / 100);
		}
	}); 
	}
	reza_review(); 
		// wp-pagenavi
 		jQuery(document).on('click',".rd-page-ajax a", function(e){
			var x = jQuery("#rd_module_blog").offset().top;
			window.scrollTo(0, x - 60);
			jQuery('#rd_module_blog').addClass('rd-module-loading');
			e.preventDefault();
			var link = jQuery(this).attr('href');
			 
			jQuery('.rd-pagenavi').load(link + ' .rd-pagenavi', function() {
			  jQuery('.rd-pagenavi').fadeIn(1000);
			});
	 
		  jQuery(this).parents("#rd_module_blog").find('.rd-post-list').load(link + ' #rd_module_blog .rd-post-list', function() {
			jQuery('#rd_module_blog').removeClass('rd-module-loading');
			
			$( '#rd_module_blog .rd-thumb').each(function(index, element) {
					var width_img = $(this).find('img').attr('width');
					var height_img = $(this).find('img').attr('height');
					var ratio_img = width_img/height_img;		    
					var width = $(this).width();
					var height = $(this).height();
					var ratio = width/height;
					if(ratio_img <= ratio ){
						$(this).find('img').css("width" ,"100.1%").css("min-width" ,"auto").css("height" ,"auto").css("min-height" ,"100.1%");		
					}else{
						$(this).find('img').css("width" ,"auto").css("min-width" ,"100.1%").css("height" ,"100.1%").css("min-height" ,"auto");		
					}
				 });	
			window.history.pushState("object or string", "Title",link);
		});
	 }); 
  
	$(".rd-title-box span").on("click",function(){
  		var rd_this = $(this);
 
		rd_this.parent().find('span').removeClass('rd-active');

  		rd_this.addClass('rd-active');
 		
		var rd_list = $(this).parents('.rd-module-item').find('.rd-post-list');
		var rd_module = $(this).parents('.rd-module-item');
								rd_module.find('.rd-load-more').removeClass('rd-loading');

		var dataajax = $(this).parents('.rd-title-box').data('options');
 		dataajax['cats'] = $(this).data('cats');
 		dataajax['orderby'] = $(this).data('orderby');
 		dataajax['max_page'] = $(this).data('max_page');
		rd_module.addClass('rd-module-loading');
		rd_module.find('.rd-load-more span').attr('data-page','2').attr('data-cats',dataajax['cats']).attr('data-orderby',dataajax['orderby']).attr('data-max_page',dataajax['max_page']);
  
  		// This does the ajax request
		$.ajax({
			 type: "POST",
			dataType: "html",
			url: xecuter_js.ajaxurl,
			data:dataajax,
			success:function(data) {
				var $data = $(data);
	 
				 if($data.length){
 
 					rd_list.children().remove();
					rd_list.append($data);
					
					rd_module.removeClass('rd-module-loading');

					if(dataajax['max_page'] > 1 ){
						rd_module.find('.rd-load-more').show();
 
					} else{
						rd_module.find('.rd-load-more').hide();
					}
 				  }  
				reza_review();
 
				rd_module.find( ' .rd-thumb').each(function(index, element) {
					var width_img = $(this).find('img').attr('width');
					var height_img = $(this).find('img').attr('height');
					var ratio_img = width_img/height_img;		    
					var width = $(this).width();
					var height = $(this).height();
					var ratio = width/height;
					if(ratio_img <= ratio ){
						$(this).find('img').css("width" ,"100.1%").css("min-width" ,"auto").css("height" ,"auto").css("min-height" ,"100.1%");		
					}else{
						$(this).find('img').css("width" ,"auto").css("min-width" ,"100.1%").css("height" ,"100.1%").css("min-height" ,"auto");		
					}
				 });	
				
				
  			},
			error : function(jqXHR, textStatus, errorThrown) {
				$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			}
		});  
	 
	});

	
	$(".rd-load-more span").on("click",function(){
		var gets = $(this).attr('rd-id');
	 		var rd_module = $(this).parents('.rd-module-item');

		$(this).parent().addClass('rd-loading');
		
		
		var rd_item = $(this).parents('.rd-module-item');
		var rd_this = $(this);
		
		var rd_list = $(this).parents('.rd-module-item').find('.rd-post-list');
		
		var dataajax = $(this).data('options');
		dataajax['count'] =  true;
		dataajax['cats'] =  $(this).attr('data-cats');
		dataajax['orderby'] =  $(this).attr('data-orderby');
		dataajax['max_page'] =  $(this).attr('data-max_page');
		var max_pages =  $(this).attr('data-max_page');
		var pageNumber =  rd_this.attr('data-page');
  		dataajax['pageNumber'] = pageNumber;

 		
 		// This does the ajax request
		$.ajax({
			 type: "POST",
			dataType: "html",
			url: xecuter_js.ajaxurl,
			data:dataajax,
			success:function(data) {
				var $data = $(data);
	 
				 if($data.length){
					rd_list.append($data);
 					rd_this.parent().addClass('rd-loading');
					rd_this.parent().removeClass('rd-loading');
				  } 
				  
 				pageNumber++;
				  rd_this.attr('data-page', pageNumber );
				  if(pageNumber > dataajax['max_page']) {
					 rd_this.parent().hide();
				 }
				 
				 
				reza_review();
				
				rd_item.find( ' .rd-thumb').each(function(index, element) {
					var width_img = $(this).find('img').attr('width');
					var height_img = $(this).find('img').attr('height');
					var ratio_img = width_img/height_img;		    
					var width = $(this).width();
					var height = $(this).height();
					var ratio = width/height;
					if(ratio_img <= ratio ){
						$(this).find('img').css("width" ,"100.1%").css("min-width" ,"auto").css("height" ,"auto").css("min-height" ,"100.1%");		
					}else{
						$(this).find('img').css("width" ,"auto").css("min-width" ,"100.1%").css("height" ,"100.1%").css("min-height" ,"auto");		
					}
				 });					
				
  			},
			error : function(jqXHR, textStatus, errorThrown) {
				$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			}
		});  
	 
	});
 
 	$('.rd-load-more span').each(function(index, element) {
			var max_page =  $(this).data('max_page');
			if(max_page > 1 ){
					$(this).parent().show();
			}
	
	});
			
 	$( '<div class="rd-row"></div>' ).insertBefore( ".woocommerce .rd-single-item .product" );
	$( '<div class="rd-row"></div>' ).insertBefore( ".product_list_widget li" );
	
	  	 
  
		
	  
	//-------------- Nav Menu --------------// 
  		$('.rd-nav-menu li').hover(
 			function() {
	  			$('ul:first,.sub-posts', this).stop().show(200);
 			}, function() {
   				 $('ul:first,.sub-posts', this).stop().hide(200);
  			}
		); 
   		$('.rd-nav-menu li').hover(
 			function() {
	  			$('.sub-posts', this).stop().show(200);
 			}, function() {
   				 $('.sub-posts', this).stop().hide(200);
  			}
		); 
 
   		jQuery('.rd-nav-menu .menu-item-has-children').append('<span class="rd-menu-down">+</span><span class="rd-menu-up" >-</span>');  

 		jQuery(document).on("click", ".rd-menu-icon" , function(){
			jQuery(this).parent().addClass('rd-menu-active');
			jQuery(this).parents('.rd-navhead-warp').addClass('rd-nav-active');
   		});
 
				 
		 jQuery(document).resize( function(){
			  var windows = $(window).width();
   			if(windows > 980){
			$('.rd-nav-menu').find('ul,div').removeClass('rd-menu-show');
			$('.rd-nav-menu').removeClass('rd-menu-active');
			$('.rd-navhead-warp').removeClass('rd-nav-active');
			$('.rd-nav-menu .sub-menu').each(function(index, element) {
				$(this).hide();
 			});
			$('.rd-nav-menu .sub-posts').each(function(index, element) {
				$(this).hide();
 			});
 
 		}});
		jQuery(document).on("click", ".rd-menu-active .rd-menu-icon" , function(){
			jQuery(this).parent().removeClass('rd-menu-active');
			jQuery(this).parents('.rd-navhead-warp').removeClass('rd-nav-active');

 		});
		
		jQuery('.rd-nav-menu').on("click", "ul .rd-menu-down" , function(){
			jQuery(this).parent().find('ul:first').addClass('rd-menu-show');
			jQuery(this).hide();
			jQuery(this).next().show().css({ display:"inline-block"});
  		});
	
		jQuery('.rd-nav-menu').on("click", " ul .rd-menu-up" , function(){
			jQuery(this).parent().find('ul:first').removeClass('rd-menu-show');
			jQuery(this).hide();
			jQuery(this).prev().show().css({ display:"inline-block"});
 		});
		
		jQuery('.rd-nav-menu').on("click", ".rd-menu-down" , function(){
			jQuery(this).parent().find('.sub-posts').addClass('rd-menu-show');
			jQuery(this).hide();
			jQuery(this).next().show().css({ display:"inline-block"});
  		});
	
		jQuery('.rd-nav-menu').on("click", " .sub-posts .rd-menu-up" , function(){
			jQuery(this).parent().find('.sub-posts').removeClass('rd-menu-show');
			jQuery(this).hide();
			jQuery(this).prev().show().css({ display:"inline-block"});
 		});	
 
	//-------------- Search --------------// 
   		jQuery('.rd-search').on("click", "a.rd-search-icon" , function(){
			jQuery(this).parent().find('.rd-search-sub').toggle(0); 

 			if(jQuery(this).parent().hasClass('rd-search-active')){
				jQuery(this).parent().removeClass('rd-search-active');
				jQuery(this).parents('.rd-navhead-warp').removeClass('rd-sear-active');

			}else{
				jQuery(this).parent().addClass('rd-search-active');
				jQuery(this).parents('.rd-navhead-warp').addClass('rd-sear-active');

 			}
       	});  
	//-------------- Login Form --------------// 
 
 		$('.rd-singout').hover(
  			function() {
	  			$('.rd-singout-warp', this).stop().show(200);
 			},
			function() {
    			$('.rd-singout-warp', this).stop().hide(200);
 			}
		); 
  
 		 
 	jQuery('.rd-login').on("click", ".rd-user" , function(){
   		if(jQuery(this).parent().parent().hasClass('rd-singout-active')){
			jQuery(this).parent().parent().removeClass('rd-singout-active');
						jQuery(this).parents('.rd-navhead-warp').removeClass('rd-sing-active');
 		} else{
			jQuery(this).parent().parent().addClass('rd-singout-active');
			jQuery(this).parents('.rd-navhead-warp').addClass('rd-sing-active');
			
		};
  	}); 
 
	//-------------- Slider --------------// 
  
 		$('.rd-slider').each(function(index, element) {
             $(this).show();
			 
			var data_slider =  $(this).find('.rd-data-options').data('options');
    		$(this).show().find('.rd-data-options').prev('.rd-post-list').lightSlider(data_slider);
 			
		   $('.rd-thumb-warp .rd-slider-thumb').each(function(index, element) {
					var ratio_img = $(this).attr('ratio'); 
					var widthss = $(this).width();
					var heightss = $(this).height();
					var ratio = widthss/heightss;
 				$(this).addClass('rd-thumb-vertical');
					 
			});
			
			var widths = $(this).find('.rd-gallery-text li').width();
			var heights = $(this).find('.rd-gallery-text li').height();
				$(this).find('.rd-gallery-text li').each(function(index, element) {
					$(this).find('.rd-slider-thumb').css("width" ,heights+'px').css("height" ,heights+'px');
				});
					
		});
 	  

 
		
		$(window).resize(function () { 
 				 $('.rd-featured .rd-thumb').each(function(index, element) {
					var resize_width_img = $(this).find('img').attr('width');
					var resize_height_img = $(this).find('img').attr('height');
					var resize_ratio_img = resize_width_img/resize_height_img;	
 					var resize_width = $(this).width();
					var resize_height = $(this).height();
					var resize_ratio = resize_width/resize_height;
  					if(resize_ratio_img < resize_ratio ){
						$(this).find('img').css("width" ,"100.1%").css("min-width" ,"auto").css("height" ,"auto").css("min-height" ,"100.1%");		
					}else if (resize_ratio_img > resize_ratio){
						$(this).find('img').css("width" ,"auto").css("min-width" ,"100.1%").css("height" ,"100.1%").css("min-height" ,"auto");		
					}
				 });
 
		})
	  
 
	var reza_windows = $(window).width();
	 if(reza_windows < 767 && reza_windows > 500){
	  $('.rd-post-video iframe').attr('width','500').attr('height','300');
	 }
	 $(window).resize(function(e) {
		 var windows = $(window).width();
		 if(windows < 767 && windows > 500){
		 $('.rd-post-video iframe').attr('width','500').attr('height','300');
		 }
			 if(windows < 500 ){
		 $('.rd-post-video iframe').attr('width','300').attr('height','200');
		 }
	}); 	 

	//-------------- LightBox --------------// 
	//Copyright (c) jzBox 
	 $('.single:not(.woocommerce) .rd-post-content img').parent('a').each(function(i, el) {
 	var xecuter_href_value = this.href;
  	if (/\.(jpg|png|gif|jpeg|bmp)$/.test(xecuter_href_value)) {
		$(this).addClass('rd-img-lightbox');
  	}  
	});
     
	
	if(jQuery('.rd-lightbox').hasClass('rd-lightbox-active')){
		$('.rd-img-lightbox').click(function (event) {
			event.stopPropagation();
			event.preventDefault();
			var images = $('.rd-post-content img').parent('a');
			rd_lightboxActual = this;
			
			$('.rd-lightbox-targetimg').css('display', 'none').attr('src', this.getAttribute('href'));
			$('.rd-lightbox-targetimg').one('load', function () {
				$('.rd-lightbox-loading').css('display', 'none');
				$(this).slideToggle('slow');
			});
	
			var text = $(this).next().html();
			var display = 'block';
			if (text == null) {
				text = '';
				display = 'none';
			}
			
			$('.rd-lightbox-title').text(text).css('display', display);
			$('.rd-lightbox').slideToggle('fast');
			var actualId;
			$.each(images, function (index) {
				if (rd_lightboxActual === images[index]) {
					actualId = index + 1;
				}
			});
			if (images.length == 1) {
				$('.rd-lightbox-moreitems').css('display', 'none');
			}
			
			$('.rd-lightbox-counter').text($.rd_lightboxMessage(actualId, images.length));
	});
	}
	$.rd_lightboxMove = function (direction, allImages) {
    		direction = (direction == 'next') ? 'next' : 'prev';
			var actualId;
			$.each(allImages, function (index) {
       		if (allImages[index] === rd_lightboxActual) {
				actualId = index;
       		}
    	});
	
     	var iterator;
		if (direction == 'next') {
        	iterator = actualId + 1;
        	if (actualId == allImages.length - 1) {
            iterator = 0;
        	}
    	} else if (direction == 'prev') {
        	iterator = actualId - 1;
        	if (actualId == 0) {
            	iterator = allImages.length - 1;
        	}
    	}
		
		var newImage = allImages[iterator];
		$('.rd-lightbox-targetimg').css('display', 'none').attr('src', newImage.getAttribute('href'));
		$('.rd-lightbox-loading').css('display', 'block');
		
    	$('.rd-lightbox-targetimg').one('load', function () {
        	$('.rd-lightbox-loading').css('display', 'none');
        	$(this).css('display', 'inline-block');
    	});
    	
		var text = $(newImage).next().html();
    	var display = 'block';
		
		if (text == null) {
        	text = '';
        	display = 'none';
    	}
		$('.rd-lightbox-title').text(text).css('display', display);
		$('.rd-lightbox-counter').text($.rd_lightboxMessage(iterator + 1, allImages.length));
		rd_lightboxActual = newImage;
	}; 
		
	$('.rd-lightbox-prevbig').click(function() {
			$.rd_lightboxMove('prev', $('.rd-post-content img').parent('a'));
	});

	$('.rd-lightbox-outer').click(function() {
			$('.rd-lightbox').slideToggle('fast');
	});
		
	$('.rd-lightbox-close').click(function() {
		$('.rd-lightbox').slideToggle('fast');
	});  
		
	$(' .rd-lightbox-nextbig,.rd-lightbox-targetimg').click(function() {
    	$.rd_lightboxMove('next', $('.rd-post-content img').parent('a'));
	});
	var rd_lightboxActual = null;

	$.rd_lightboxMessage = function (actual, last) {
    	return '' + actual + ' / ' + last;
	};
	$(document).on('keydown', function (event) {
		if(event.keyCode  == 37 ){
    		$.rd_lightboxMove('prev', $('.rd-post-content img').parent('a'));
		}
	});
	$(document).on('keydown', function (event) {
		if(event.keyCode  == 39 ){
    		$.rd_lightboxMove('next', $('.rd-post-content img').parent('a'));
		}
    });
	//-------------- Sticky Nav --------------// 
	if($('.rd-masthead-warp,.rd-navplus-warp').hasClass('rd-sticky')){
 		var rd_sticky = jQuery('.rd-sticky').offset().top;
	 
		function newstopia_sticky(rd_sticky){
			var top = jQuery(window).scrollTop();
  
			if (top > rd_sticky   ) {
				jQuery(".rd-sticky").addClass('rd-sticky-enable');
				var wpadminbar_height = jQuery("#wpadminbar").height();
				jQuery(".rd-sticky-enable").css("margin-top", wpadminbar_height+"px");
			} else { 
				jQuery(".rd-sticky-enable").css("margin-top", "0px");
	
                jQuery(".rd-sticky").removeClass('rd-sticky-enable');
			}   
		}
		jQuery(window).scroll(function(){
         	newstopia_sticky(rd_sticky);
		});	
	}
 
	
 	if( ! $('#respond').hasClass('comment-respond') && ! $('.comments-area').hasClass('rd-have-comments')){
		$('.comments-area').remove();
	}
	
 	
	// Generated by CoffeeScript 1.9.2
	
	/**
	@license Sticky-kit v1.1.2 | WTFPL | Leaf Corcoran 2015 | http://leafo.net
	 */
	
	(function() {
	  var $, win;
	
	  $ = this.jQuery || window.jQuery;
	
	  win = $(window);
	
	  $.fn.stick_in_parent = function(opts) {
		var doc, elm, enable_bottoming, fn, i, inner_scrolling, len, manual_spacer, offset_top, parent_selector, recalc_every, sticky_class;
		if (opts == null) {
		  opts = {};
		}
		sticky_class = opts.sticky_class, inner_scrolling = opts.inner_scrolling, recalc_every = opts.recalc_every, parent_selector = opts.parent, offset_top = opts.offset_top, manual_spacer = opts.spacer, enable_bottoming = opts.bottoming;
		if (offset_top == null) {
		  offset_top = 0;
		}
		if (parent_selector == null) {
		  parent_selector = void 0;
		}
		if (inner_scrolling == null) {
		  inner_scrolling = true;
		}
		if (sticky_class == null) {
		  sticky_class = "is_stuck";
		}
		doc = $(document);
		if (enable_bottoming == null) {
		  enable_bottoming = true;
		}
		fn = function(elm, padding_bottom, parent_top, parent_height, top, height, el_float, detached) {
		  var bottomed, detach, fixed, last_pos, last_scroll_height, offset, parent, recalc, recalc_and_tick, recalc_counter, spacer, tick;
		  if (elm.data("sticky_kit")) {
			return;
		  }
		  elm.data("sticky_kit", true);
		  last_scroll_height = doc.height();
		  parent = elm.parent();
		  if (parent_selector != null) {
			parent = parent.closest(parent_selector);
		  }
		  if (!parent.length) {
			throw "failed to find stick parent";
		  }
		  fixed = false;
		  bottomed = false;
		  spacer = manual_spacer != null ? manual_spacer && elm.closest(manual_spacer) : $("<div />");
		  if (spacer) {
			spacer.css('position', elm.css('position'));
		  }
		  recalc = function() {
			var border_top, padding_top, restore;
			if (detached) {
			  return;
			}
			last_scroll_height = doc.height();
			border_top = parseInt(parent.css("border-top-width"), 10);
			padding_top = parseInt(parent.css("padding-top"), 10);
			padding_bottom = parseInt(parent.css("padding-bottom"), 10);
			parent_top = parent.offset().top + border_top + padding_top;
			parent_height = parent.height();
			if (fixed) {
			  fixed = false;
			  bottomed = false;
			  if (manual_spacer == null) {
				elm.insertAfter(spacer);
				spacer.detach();
			  }
			  elm.css({
				position: "",
				top: "",
				width: "",
				bottom: ""
			  }).removeClass(sticky_class);
			  restore = true;
			}
			top = elm.offset().top - (parseInt(elm.css("margin-top"), 10) || 0) - offset_top;
			height = elm.outerHeight(true);
			el_float = elm.css("float");
			if (spacer) {
			  spacer.css({
				width: elm.outerWidth(true),
				height: height,
				display: elm.css("display"),
				"vertical-align": elm.css("vertical-align"),
				"float": el_float
			  });
			}
			if (restore) {
			  return tick();
			}
		  };
		  recalc();
		  if (height === parent_height) {
			return;
		  }
		  last_pos = void 0;
		  offset = offset_top;
		  recalc_counter = recalc_every;
		  tick = function() {
			var css, delta, recalced, scroll, will_bottom, win_height;
			if (detached) {
			  return;
			}
			recalced = false;
			if (recalc_counter != null) {
			  recalc_counter -= 1;
			  if (recalc_counter <= 0) {
				recalc_counter = recalc_every;
				recalc();
				recalced = true;
			  }
			}
			if (!recalced && doc.height() !== last_scroll_height) {
			  recalc();
			  recalced = true;
			}
			scroll = win.scrollTop();
			if (last_pos != null) {
			  delta = scroll - last_pos;
			}
			last_pos = scroll;
			if (fixed) {
			  if (enable_bottoming) {
				will_bottom = scroll + height + offset > parent_height + parent_top;
				if (bottomed && !will_bottom) {
				  bottomed = false;
				  elm.css({
					position: "fixed",
					bottom: "",
					top: offset
				  }).trigger("sticky_kit:unbottom");
				}
			  }
			  if (scroll < top) {
				fixed = false;
				offset = offset_top;
				if (manual_spacer == null) {
				  if (el_float === "left" || el_float === "right") {
					elm.insertAfter(spacer);
				  }
				  spacer.detach();
				}
				css = {
				  position: "",
				  width: "",
				  top: ""
				};
				elm.css(css).removeClass(sticky_class).trigger("sticky_kit:unstick");
			  }
			  if (inner_scrolling) {
				win_height = win.height();
				if (height + offset_top > win_height) {
				  if (!bottomed) {
					offset -= delta;
					offset = Math.max(win_height - height, offset);
					offset = Math.min(offset_top, offset);
					if (fixed) {
					  elm.css({
						top: offset + "px"
					  });
					}
				  }
				}
			  }
			} else {
			  if (scroll > top) {
				fixed = true;
				css = {
				  position: "fixed",
				  top: offset
				};
				css.width = elm.css("box-sizing") === "border-box" ? elm.outerWidth() + "px" : elm.width() + "px";
				elm.css(css).addClass(sticky_class);
				if (manual_spacer == null) {
				  elm.after(spacer);
				  if (el_float === "left" || el_float === "right") {
					spacer.append(elm);
				  }
				}
				elm.trigger("sticky_kit:stick");
			  }
			}
			if (fixed && enable_bottoming) {
			  if (will_bottom == null) {
				will_bottom = scroll + height + offset > parent_height + parent_top;
			  }
			  if (!bottomed && will_bottom) {
				bottomed = true;
				if (parent.css("position") === "static") {
				  parent.css({
					position: "relative"
				  });
				}
				return elm.css({
				  position: "absolute",
				  bottom: padding_bottom,
				  top: "auto"
				}).trigger("sticky_kit:bottom");
			  }
			}
		  };
		  recalc_and_tick = function() {
			recalc();
			return tick();
		  };
		  detach = function() {
			detached = true;
			win.off("touchmove", tick);
			win.off("scroll", tick);
			win.off("resize", recalc_and_tick);
			$(document.body).off("sticky_kit:recalc", recalc_and_tick);
			elm.off("sticky_kit:detach", detach);
			elm.removeData("sticky_kit");
			elm.css({
			  position: "",
			  bottom: "",
			  top: "",
			  width: ""
			});
			parent.position("position", "");
			if (fixed) {
			  if (manual_spacer == null) {
				if (el_float === "left" || el_float === "right") {
				  elm.insertAfter(spacer);
				}
				spacer.remove();
			  }
			  return elm.removeClass(sticky_class);
			}
		  };
		  win.on("touchmove", tick);
		  win.on("scroll", tick);
		  win.on("resize", recalc_and_tick);
		  $(document.body).on("sticky_kit:recalc", recalc_and_tick);
		  elm.on("sticky_kit:detach", detach);
		  return setTimeout(tick, 0);
		};
		for (i = 0, len = this.length; i < len; i++) {
		  elm = this[i];
		  fn($(elm));
		}
		return this;
	  };
	
	}).call(this);
	$('.rd-column-sidebar').each(function(index, element) {
		$(this).find(".rd-sticky-sidebar").stick_in_parent();
	
	});
  
 			
 		$('.rd-post-module-1 .rd-thumb,.rd-post-module-2 .rd-thumb,.rd-post-module-3 .rd-thumb,.rd-post-a1 .rd-thumb,.rd-post-a2 .rd-thumb').each(function(index, element) {
 	  		var width_img = $(this).find('img').attr('width');
 	  		var height_img = $(this).find('img').attr('height');
 			var ratio_img = width_img/height_img;		    
 	  		var width = $(this).width();
 	  		var height = $(this).height();
 			var ratio = width/height;
 			if(ratio_img <= ratio ){
				$(this).find('img').css("width" ,"100.1%").css("min-width" ,"auto").css("height" ,"auto").css("min-height" ,"100.1%");		
			}else{
				$(this).find('img').css("width" ,"auto").css("min-width" ,"100.1%").css("height" ,"100.1%").css("min-height" ,"auto");		
			}
         });
		  
 		 
		 
			$('.rd-nav-menu .rd-thumb').each(function(index, element) {
 	  		var width_img = $(this).find('img').attr('width');
 	  		var height_img = $(this).find('img').attr('height');
 			var ratio_img = width_img/height_img; 
 			 var module = $(this).parents('.rd-module-item');
			 if(module.hasClass('rd-ratio60')){
				var ratio =	 1.66;
 			 }else if(module.hasClass('rd-ratio75')){
				var ratio =	 1.33;
 			 }else if(module.hasClass('rd-ratio100')){
				var ratio =	 1;
 			 } else  {
				var ratio =	 .74;
 			 }
			 
			if(ratio_img <= ratio ){
				$(this).find('img').css("width" ,"100.1%").css("min-width" ,"auto").css("height" ,"auto").css("min-height" ,"100.1%");		
			}else{
				$(this).find('img').css("width" ,"auto").css("min-width" ,"100.1%").css("height" ,"100.1%").css("min-height" ,"auto");		
			}
			 
         });	

		 
			var widths = $(this).find('.rd-gallery-text li').width();
			var heights = $(this).find('.rd-gallery-text li').height();
				$(this).find('.rd-gallery-text li').each(function(index, element) {
					$(this).find('.rd-slider-thumb').css("width" ,heights+'px').css("height" ,heights+'px');
				});
			 
		  	 	 	 	 
 });
 
 
 })(jQuery);
