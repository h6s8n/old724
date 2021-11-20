jQuery(function($) {
		//Masked Inputs (images as radio buttons)
// single Position	
	"use strict";

 
  	$('.meta_xecuter_single_template input:checked').parent().addClass("selected");
  	$('.meta_xecuter_single_template').on("click","img",function(){
			$('.meta_xecuter_single_template').find('li').removeClass('selected');
			$(this).parents('li').addClass('selected');
 			$(this).parent().prev().attr('checked','checked');
  	});
 
 
   	$('.meta_xecuter_body_background_pattern input:checked').parent().addClass("selected");
  	$('.meta_xecuter_body_background_pattern').on("click","a",function(){
			$('.meta_xecuter_body_background_pattern').find('li').removeClass('selected');
			$(this).parents('li').addClass('selected');
 			$(this).prev().attr('checked','checked');
  	});
	
	 
  
 
 
 	$("#xecuter_page_options_box input:checkbox").each(function(event) {
			var id = $(this).attr('id');
    		 if ($(this).is(":checked")){
 			 $(document).find('tr[rd-parant="'+id+'"]').show();
		 }else{
 			 $(document).find('tr[rd-parant="'+id+'"]').hide();
 			}
  	 });
  
 
  	$("#xecuter_page_options_box input:checkbox").click(function(event) {
   	 if ($(this).is(":checked")){
      	 var id = $(this).attr('id');
		 $(document).find('tr[rd-parant="'+id+'"]').show();
	 }else{
      	 var id = $(this).attr('id');
		 $(document).find('tr[rd-parant="'+id+'"]').hide();
		 
			 }
  	 });
	 
	if( $('#xecuter_breakingnews option[value="enable"]').is( ":selected" )) {
		 $(document).find('tr[rd-parant="xecuter_breakingnews"]').show();

	} else {
		$(document).find('tr[rd-parant="xecuter_breakingnews"]').hide();
	}
	jQuery('#xecuter_breakingnews').on("click" , 'option[value="enable"]' ,function(){
		 $(document).find('tr[rd-parant="xecuter_breakingnews"]').show();
 	});		
	jQuery('#xecuter_breakingnews').on("click" , 'option[value=""],option[value="disable"]' ,function(){
		 $(document).find('tr[rd-parant="xecuter_breakingnews"]').hide();
 	});		
	 
 
	$('.meta_xecuter_body_background_pattern li').each(function(index, element) {
		var src = $(this).find('img').attr('src'); 
		$(this).find('a').css("background" , " transparent url("+src+") repeat scroll 0% 0%");
    });	
 	 
		 
		jQuery('.meta_xecuter_body_background_image').hide();
	jQuery('.meta_xecuter_body_background_pattern').hide();	 
		// Body Background Type
  	if( $('#xecuter_body_background_type').val() == 'pattern') {
		jQuery('.meta_xecuter_body_background_pattern').show();
		jQuery('.meta_xecuter_body_background_image').hide();
		
	} else if($('#xecuter_body_background_type').val() == 'custom'){
		jQuery('.meta_xecuter_body_background_image').show();
		jQuery('.meta_xecuter_body_background_pattern').hide();	
		
	} else{
		jQuery('.-xecuter_body_background_pattern').hide();
		jQuery('.meta_xecuter_body_background_image').hide();
	}
 
	jQuery('.meta_xecuter_body_background_type').on("click" , '#xecuter_body_background_type_default,#xecuter_body_background_type_none' ,function(){
		jQuery('.meta_xecuter_body_background_image').hide();
		jQuery('.meta_xecuter_body_background_pattern').hide();
	});
	jQuery('#xecuter_body_background_type').on("click" ,'#xecuter_body_background_type_pattern'   ,function(){
		jQuery('.meta_xecuter_body_background_pattern').show();
		jQuery('.meta_xecuter_body_background_image').hide();
	});
	jQuery('#xecuter_body_background_type').on("click" , '#xecuter_body_background_type_custom' ,function(){
		jQuery('.meta_xecuter_body_background_image').show();
		jQuery('.meta_xecuter_body_background_pattern').hide();
	});	  
				 
	// the upload image button, saves the id and outputs a preview of the image
	$('.rd_add_image').click(function(event) {
			var imageFrame;

		var that = $(this);
		event.preventDefault();
		
		var options, attachment;
		 var meta_xecuter_body_background_image = that.parents('.meta_xecuter_body_background_image');
		var $self = $(event.target);
		var $div = $self.closest(meta_xecuter_body_background_image);
		
		// if the frame already exists, open it
		if ( imageFrame ) {
			imageFrame.open();
			return;
		}
		
		imageFrame = wp.media({
 
			
			title: $(this).data('uploader-title'),
			button: {
				text: $(this).data('uploader-button-text'),
			},
			multiple: false
		});
		
		// set up our select handler
		imageFrame.on( 'select', function() {
			var selection = imageFrame.state().get('selection');
			
			if ( ! selection )
			return;
			
			// loop through the selected files
			selection.each( function( attachment ) {
				console.log(attachment);
				var src = attachment.attributes.sizes.full.url;
 				
				var data = '<a class="rd_remove_image button button-small">'+xecuter_text.remove+'</a><img  src="'+src+'"/>';
				$div.find('.rd_remove_image').remove();
				$div.find('img').remove();
 				$div.find('input').attr('value',src);	
 				$div.find('td').append(data);
  			} );
		});
		
		// open the frame
		imageFrame.open();
	});
	
	$(document).on('click', '.rd_remove_image', function(e) {
		$(this).parent().find('input').attr('value','');
		
		$(this).parent().find('img').remove()
		$(this).remove();
  	}); 
	
	function reza_hide_blog_opt() {
  		jQuery('#cats-xecuter_size1,#cats-xecuter_size2,#cats-xecuter_ratio,#cats-xecuter_ratio2,#cats-xecuter_height,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').hide();
		}
		reza_hide_blog_opt();
		
	// Block
 		jQuery('#cats-xecuter_content_layout.rd-category,#cats-xecuter_main_layout.rd-category').hide();
		if(jQuery('.rd-category .xecuter_row_1200 input' ).is( ":checked" )) {
			jQuery('#cats-xecuter_content_layout').show();
			// Content Blog
			if( $('.rd-category .xecuter_content_layout_grid_1c input' ).is( ":checked" )) {
				jQuery('#cats-xecuter_height,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
			}
			if( $('.rd-category .xecuter_content_layout_grid_2c input,.rd-category .xecuter_content_layout_grid_3c input,.rd-category .xecuter_content_layout_grid_4c input,.rd-category .xecuter_content_layout_grid_5c input' ).is( ":checked" )) {
				jQuery('#cats-xecuter_ratio,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
			} 
			if( $('.rd-category .xecuter_content_layout_grid_6c input' ).is( ":checked" )) {
				jQuery('#cats-xecuter_ratio').show();
			} 
			if( $('.rd-category .xecuter_content_layout_list_1c input' ).is( ":checked" )) {
				jQuery('#cats-xecuter_size1,#cats-xecuter_ratio2,#cats-xecuter_excerpt_limit').show();
			} 	
			if( $('.rd-category .xecuter_content_layout_list_2c input' ).is( ":checked" )) {
				jQuery('#cats-xecuter_size2,#cats-xecuter_ratio,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
			} 
			if( $('.rd-category .xecuter_content_layout_list_3c input' ).is( ":checked" )) {
				jQuery('#cats-xecuter_size1,#cats-xecuter_ratio,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
			} 
			
			
		}
		if( jQuery('.rd-category .xecuter_row_800_400 input,.rd-category .xecuter_row_400_800 input' ).is( ":checked" )) {
 			 jQuery('#cats-xecuter_main_layout').show();
			// Content Blog
			if( $('.rd-category .xecuter_main_layout_grid_1c input' ).is( ":checked" )) {
				jQuery('#cats-xecuter_height,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
			}
			
			if( $('.rd-category .xecuter_main_layout_grid_2c input,.rd-category .xecuter_main_layout_grid_3c input' ).is( ":checked" )) {
				jQuery('#cats-xecuter_ratio,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
			} 
			
			if( $('.rd-category .xecuter_main_layout_4c input' ).is( ":checked" )) {
				jQuery('#cats-xecuter_ratio').show();
			} 
	 
			if( $('.rd-category .xecuter_main_layout_list_1c input' ).is( ":checked" )) {
				jQuery('#cats-xecuter_size2,#cats-xecuter_ratio,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
			} 
			if( $('.rd-category .xecuter_main_layout_list_2c input' ).is( ":checked" )) {
				jQuery('#cats-xecuter_size1,#cats-xecuter_ratio,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
			}
		}
		
 
					 
 		jQuery(document).on("click", ".rd-category .xecuter_row_1200" , function(){
			jQuery('#cats-xecuter_content_layout').show();
 			jQuery('#cats-xecuter_main_layout').hide();
			$('#cats-xecuter_content_layout').find('li').removeClass('selected');
 			$('.xecuter_content_layout_grid_1c').addClass("selected");
			$('.xecuter_content_layout_grid_1c').prev().attr('checked','checked');
			reza_hide_blog_opt();
			jQuery('#cats-xecuter_height,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
		}); 
		jQuery(document).on("click", ".rd-category .xecuter_row_800_400,.rd-category .xecuter_row_400_800" , function(){
			jQuery('#cats-xecuter_main_layout').show();
 			jQuery('#cats-xecuter_content_layout').hide();
			$('#cats-xecuter_main_layout').find('li').removeClass('selected');
			$('.rd-category .xecuter_main_layout_grid_1c').addClass("selected");
			$('.rd-category .xecuter_main_layout_grid_1c').prev().attr('checked','checked');
			reza_hide_blog_opt();
			jQuery('#cats-xecuter_height,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
      	}); 
	 
 		
 
		
		
		jQuery(document).on("click", ".rd-category .xecuter_content_layout_grid_1c img,.rd-category .xecuter_main_layout_grid_1c img" , function(){
			reza_hide_blog_opt();
			jQuery('#cats-xecuter_height,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();

    	});
		 
		 
		
		jQuery(document).on("click", ".rd-category .xecuter_content_layout_grid_2c img,.rd-category .xecuter_content_layout_grid_3c img,.rd-category .xecuter_content_layout_grid_4c img,.rd-category .xecuter_content_layout_grid_5c img,.rd-category .xecuter_main_layout_grid_2c img,.rd-category .xecuter_main_layout_grid_3c img " , function(){
			reza_hide_blog_opt();
			jQuery('#cats-xecuter_ratio,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
 
    	}); 
		 
		
		jQuery(document).on("click", ".rd-category .xecuter_content_layout_grid_6c img,.rd-category .xecuter_main_layout_grid_4c img" , function(){
			reza_hide_blog_opt();
			jQuery('#cats-xecuter_ratio').show();
     	}); 
		  
				
		jQuery(document).on("click", ".rd-category .xecuter_content_layout_list_1c img" , function(){
			reza_hide_blog_opt();
			jQuery('#cats-xecuter_size1,#cats-xecuter_ratio2,#cats-xecuter_excerpt_limit').show();
     	}); 
		
		jQuery(document).on("click", ".rd-category .xecuter_content_layout_list_2c img,.rd-category .xecuter_main_layout_list_1c img" , function(){
			reza_hide_blog_opt();
			jQuery('#cats-xecuter_size1,#cats-xecuter_ratio,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
     	}); 

 		jQuery(document).on("click", ".rd-category .xecuter_content_layout_list_2c img,.rd-category .xecuter_main_layout_list_2c img" , function(){
			reza_hide_blog_opt();
			jQuery('#cats-xecuter_ratio,#cats-xecuter_ratio,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();

    	});  
 
		$('.rd-category .xecuter_row_800_400').addClass("selected");
		$('.rd-category .xecuter_row_800_400 input').attr('checked','checked'); 	
		jQuery('#cats-xecuter_main_layout').show();
 			jQuery('#cats-xecuter_content_layout').hide();
			$('#cats-xecuter_main_layout').find('li').removeClass('selected');
			$('.rd-category .xecuter_main_layout_grid_1c').addClass("selected");
			$('.rd-category .xecuter_main_layout_grid_1c').prev().attr('checked','checked');
			reza_hide_blog_opt();
			jQuery('#cats-xecuter_height,#cats-xecuter_excerpt,#cats-xecuter_excerpt_limit').show();
			
			
		
	//Single Ratio
 	jQuery('.meta_xecuter_single_ratio').hide();
  	if( $('#xecuter_single_template-1,#xecuter_single_template-2' ).is( ":checked" )) {
 		jQuery('.meta_xecuter_single_ratio').show();
 	}		
	jQuery('.meta_xecuter_single_template').on("click", ".xecuter_single_template-1 img,.xecuter_single_template-2 img" , function(){
 		jQuery('.meta_xecuter_single_ratio').show();
	});
	jQuery('.meta_xecuter_single_template').on("click", ".xecuter_single_template-3 img,.xecuter_single_template-4 img,.xecuter_single_template-default" , function(){
   		jQuery('.meta_xecuter_single_ratio').hide();
	});				 			
 
 					
});