jQuery(function($) {
	jQuery(document).ready(function($) {
		"use strict";
		jQuery(document).on("click",".rd_add_icon",function(){
			jQuery('body').addClass('rd-active-icon');
		var title='';
 		var menu_settings = $(this).parents('.menu-item-settings').attr('id');
		var text= $(this).text();
		var set= $(this).data('set');
				title+= '<div class="rd_icon" data-id="'+menu_settings+'">';
						title+= '<div class="rd_icon_middle">';
							title+= '<div class="rd_icon_title">'+text+'<i class="rd_icon_close"></i></div>';
							title+= '<ul class="rd_icon_content">';
							 jQuery.each( icons, function( key, name ) {
								title+= '<li class="rd_icon_item" data-icon="'+name+'">';
									title+='<i class="fa '+name+'"></i>';
									title+='<span>'+name+'</span>';
																
								title+= '</li>';	
								});						
							title+= '</ul>';
							title+= '<div class="rd_icon_bottom"><a class="rd_icon_add button-primary">'+set+'</a></div>';	 
						title+= '</div>';
				title+= '</div>';
			  
			jQuery('body').append(title);
  		});
		
		jQuery(document).on("click",".rd_remove_icon",function(){
			jQuery('body').removeClass('rd-active-icon');
			
				$(this).parent().find('.rd-menu-icon ').remove();
				$(this).removeClass('rd-remove-show');
				$(this).addClass('rd-remove-hide');
				$(this).parent().find('input').attr('value','')
				$(this).remove();
 		});
			
		jQuery(document).on("click",".rd_icon ul li",function(){
					$(this).parents('.rd_icon').find('.rd_icon_item').removeClass('selected');
	
			$(this).addClass('selected');
		});
		
		jQuery(document).on("click",".rd_icon_add",function(){
			var icon = $(this).parents('.rd_icon').find('.selected').data('icon');
			var menu_settings = $(this).parents('.rd_icon').data('id');

			$("#"+menu_settings).find('.rd_add_icon').data('remove');
				var menu_icons = '<i class="fa rd-menu-icon '+icon+'"></i>';	 
 				$("#"+menu_settings).find('.xecuter_menu_icon .rd-menu-icon ').remove();
 				$("#"+menu_settings).find('.xecuter_menu_icon .rd_remove_icon ').addClass('rd-remove-show');
				$("#"+menu_settings).find('.xecuter_menu_icon input').attr('value',icon)
				$("#"+menu_settings).find('.xecuter_menu_icon').append(menu_icons);
 				
				$(this).parents('.rd_icon').remove();
				jQuery('body').removeClass('rd-active-icon');
	
	
		}); 
			
		jQuery(document).on("click",".rd_icon_close",function(){
	  
			jQuery('body').removeClass('rd-active-icon');
				$(this).parents('.rd_icon').remove();
	
		}); 
				
		jQuery('.xecuter_category').hide();
		
		jQuery(".menu-item-settings").each(  function(index, element) {
			var menu_type = $(this).find(' .xecuter_menu_type select').val();
			 if( menu_type == 'recent'||menu_type == 'random'||menu_type == 'sub-random'||menu_type == 'sub-recent') {
			jQuery(this).find('.xecuter_category,.xecuter_ratio').show();
	
				
			} else  {
				jQuery(this).find('.xecuter_category,.xecuter_ratio').hide();
	
				
			}	
			
		});
		
		jQuery(document).on("click" ,'.xecuter_menu_type  option[value="recent"],.xecuter_menu_type  option[value="random"],.xecuter_menu_type  option[value="sub-recent"],.xecuter_menu_type  option[value="sub-random"]' ,function(){
			jQuery(this).parents('.menu-item-settings').find('.xecuter_category,.xecuter_ratio').show();
		}); 
		jQuery(document).on("click" ,'.xecuter_menu_type  option[value=""],.xecuter_menu_type  option[value="col-2"],.xecuter_menu_type  option[value="col-3"],.xecuter_menu_type  option[value="col-4"],.xecuter_menu_type  option[value="col-5"],.xecuter_menu_type  option[value="col-6"]' ,function(){
			jQuery(this).parents('.menu-item-settings').find('.xecuter_category,.xecuter_ratio').hide();
		}); 	
		 
	});
});