jQuery(function($) {
	jQuery(document).ready(function() {
		"use strict";
	
		jQuery('#rd-columns input:checked').parent().addClass("selected");
		jQuery('#rd-columns').on("click","img",function(){
			jQuery('#rd-columns').find('li').removeClass('selected');
			jQuery(this).parents('li').addClass('selected');
			jQuery(this).parent().prev().attr('checked','checked');
		});
		jQuery('#rd-content-layout input:checked').parent().addClass("selected");
		jQuery('#rd-content-layout').on("click","img",function(){
			jQuery('#rd-content-layout').find('li').removeClass('selected');
			jQuery(this).parents('li').addClass('selected');
			jQuery(this).parent().prev().attr('checked','checked');
		});
		
		jQuery('#rd-main-layout input:checked').parent().addClass("selected");
		jQuery('#rd-main-layout').on("click","img",function(){
			jQuery('#rd-main-layout').find('li').removeClass('selected');
			jQuery(this).parents('li').addClass('selected');
			jQuery(this).parent().prev().attr('checked','checked');
		});	
	});
	
});