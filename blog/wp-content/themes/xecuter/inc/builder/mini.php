<?php
/********************************************************************
Mini Module
*********************************************************************/
function xecuter_mini_module() { 
	global $xecuter_data,$xecuter_half,$xecuter_row; 
	$sticky_sidebar = !empty( $xecuter_row[ 'sticky_sidebar' ] ) ? 'rd-sticky-sidebar'  : '';
   	$value = isset( $xecuter_data['value'] ) ? $xecuter_data['value'] : '';
	
	/********************************************************************
	Carousel Slider
	*********************************************************************/
	// Carousel Slider 1 Column
	if($value=='slider'){
       	echo '<aside  class="rd-slider  rd-carousel rd-featured '.esc_attr(xecuter_module_class()).' ">'; 
  			xecuter_title_box();	
			echo '<div class="rd-post-list" >';
				xecuter_mini_featured_1c();
			echo '</div>';
				xecuter_lightslider('1','1','"pager": true,"timer": true,"responsive" : [{"breakpoint":1920}],');
 		echo '</aside>';			
	}

	/********************************************************************
	Featured 
	*********************************************************************/
 	//Featured 1 Column 
	if($value=='featured_1c'){
       	echo '<aside  class="rd-featured '.esc_attr(xecuter_module_class()).' ">'; 
  			xecuter_title_tabs('xecuter_mini_featured_1c');	
			echo '<div class="rd-post-list" >';
				xecuter_mini_featured_1c();
			echo '</div>';
 			xecuter_load_more('xecuter_mini_featured_1c');		
   		echo '</aside>';			
	}
	
 	//Featured 2 Column
	if($value=='featured_2c'){
       	echo '<aside  class="rd-featured '.esc_attr(xecuter_module_class()).' ">'; 
  			xecuter_title_tabs('xecuter_mini_featured_2c');	
			echo '<div class="rd-post-list" >';
				xecuter_mini_featured_2c();
			echo '</div>';
 			xecuter_load_more('xecuter_mini_featured_2c');		
   		echo '</aside>';			
	}
	
 	//Featured 3 Column
	if($value=='featured_3c'){
       	echo '<aside  class="rd-featured '.esc_attr(xecuter_module_class()).' ">'; 
  			xecuter_title_tabs('xecuter_mini_featured_3c');	
			echo '<div class="rd-post-list" >';
				xecuter_mini_featured_3c();
			echo '</div>';
 			xecuter_load_more('xecuter_mini_featured_3c');		
   		echo '</aside>';			
	}
	

	/********************************************************************
	Grid 
	*********************************************************************/	
	// Grid 1 Column 
	if($value=='grid_1c'){
       	echo '<aside  class="rd-grid '.esc_attr(xecuter_module_class()).' ">'; 
  			xecuter_title_tabs('xecuter_mini_grid_1c');	
			echo '<div class="rd-post-list" >';
				xecuter_mini_grid_1c();
			echo '</div>';
 			xecuter_load_more('xecuter_mini_grid_1c');		
  		echo '</aside>';			
	}		
 	 
	// Grid 2 Column 
	if($value=='grid_2c'){
       	echo '<aside  class="rd-grid '.esc_attr(xecuter_module_class()).' ">'; 
  			xecuter_title_tabs('xecuter_mini_grid_2c');	
			echo '<div class="rd-post-list" >';
				xecuter_mini_grid_2c();
			echo '</div>';
 			xecuter_load_more('xecuter_mini_grid_2c');		
  		echo '</aside>';			
	}
	
	/********************************************************************
	List 
	*********************************************************************/	
	//List 1   
	if($value=='list_1c'){
       	echo '<aside  class="rd-list rd-space '.esc_attr(xecuter_module_class()).' ">'; 
  			xecuter_title_tabs('xecuter_mini_list_1c');	
			echo '<div class="rd-post-list" >';
				xecuter_mini_list_1c();
			echo '</div>';
 			xecuter_load_more('xecuter_mini_list_1c');	
  		echo '</aside>';			
	}

	//List 2 
	if($value=='list_2'){
		$xecuter_half++;
       	echo '<aside  class="rd-space   '.esc_attr(xecuter_module_class()).' ">'; 
  			xecuter_title_tabs('xecuter_mini_list_2');	
			echo '<div class="rd-post-list" >';
				xecuter_mini_list_2();
			echo '</div>';
 			xecuter_load_more('xecuter_mini_list_2');	
  		echo '</aside>';	
 
		 
	}
	
	//List 3   
	if($value=='list_3'){
		$xecuter_half++;
       	echo '<aside  class="rd-space '.esc_attr(xecuter_module_class()).' ">'; 
  			xecuter_title_tabs('xecuter_mini_list_3');	
			echo '<div class="rd-post-list" >';
				xecuter_mini_list_3();
			echo '</div>';
 			xecuter_load_more('xecuter_mini_list_3');	
  		echo '</aside>';	
 
		 
	}
	
	/********************************************************************
	Text 
	*********************************************************************/
	// Text 1   
	if($value=='text_1c'){
       	echo '<aside  class="rd-text  rd-space '.esc_attr(xecuter_module_class()).' ">'; 
  			xecuter_title_tabs('xecuter_mini_text_1c');	
			echo '<div class="rd-post-list" >';
				xecuter_mini_text_1c();
			echo '</div>';
 			xecuter_load_more('xecuter_mini_text_1c');	
  		echo '</aside>';			
	}	 			
 
	// Text 2   
	if($value=='text_2'){
		$xecuter_half++;
       	echo '<aside  class=" rd-space   '.esc_attr(xecuter_module_class()).' ">'; 
  			xecuter_title_tabs('xecuter_mini_text_2');	
			echo '<div class="rd-post-list" >';
				xecuter_mini_text_2();
			echo '</div>';
 			xecuter_load_more('xecuter_mini_text_2');	
  		echo '</aside>';		
 		
	}		
	
	//Text 3   
	if($value=='text_3'){
		$xecuter_half++;
       	echo '<aside  class="   rd-space  '.esc_attr(xecuter_module_class()).' ">'; 
  			xecuter_title_tabs('xecuter_mini_text_3');	
			echo '<div class="rd-post-list" >';
				xecuter_mini_text_3();
			echo '</div>';
 			xecuter_load_more('xecuter_mini_text_3');	
  		echo '</aside>';			
  	}				
	
	/********************************************************************
	Other Item
	*********************************************************************/
	// ADS						
 	if($value=='ads'){
		echo '<aside class="'.esc_attr(xecuter_module_class()).' ">'; 
			xecuter_ads();
		echo '</aside>';
	}
	
	// Text Html
	if($value=='text_html'){
   		echo '<aside class="rd-text-html '.esc_attr(xecuter_module_class()).' ">'; 
 			if(!empty($xecuter_data['textarea'])){ echo '<div class="widget_text">'.balanceTags($xecuter_data['textarea']).'</div>';}
  		echo '</aside>';
	} 		
	
	// Sidebar
	if($value=='sidebar'){
		xecuter_sidebar();		
 	} 
	 		
	wp_reset_postdata();
	 
}?>