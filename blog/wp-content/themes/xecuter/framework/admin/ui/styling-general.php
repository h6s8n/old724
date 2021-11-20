<?php
 $of_options[] = array( "name" 		=> esc_html__('Style' , 'xecuter'),
						"type" 		=> "heading",
						"id" 		=> "style",
						"icon"		=> ADMIN_IMAGES."style.png",

				); 

// Body Style
$of_options[] = array( 	"name" 		=> esc_html__('Body Style' , 'xecuter'),
						"type" 		=> "title"
				);	

$of_options[] = array( 	"name" 		=> esc_html__('Primary Color' , 'xecuter'),
 						"id" 		=> "xecuter_primary_color",
						"std" 		=> '#ff4516',
 						"type" 		=> "color"
				); 
 					
$of_options[] = array( 	"name" 		=> esc_html__('Background Color' , 'xecuter'),
 						"id" 		=> "xecuter_body_background_color",
						"std" 		=> '#ffffff',
						"type" 		=> "color"
				); 
 
 

 $of_options[] = array( "name" 		=> esc_html__('Background Type' , 'xecuter'),
						"desc" 		=> esc_html__('Select Background Type Gradient , Pattern And Upload Custom Image' , 'xecuter'),
						"id" 		=> "xecuter_body_background_type",
						"std" 		=> "none",
						"type" 		=> "select",
						"options" 	=> array(	'none' 		=> esc_html__('None','xecuter'),
 												'pattern' 	=> esc_html__('Pattern','xecuter'),
												'custom' 	=> esc_html__('Custom Image','xecuter'),
										)
				);
	
$of_options[] = array( 	"name" 		=> esc_html__('Background Pattern' , 'xecuter'),
						"desc" 		=> esc_html__('Select a background pattern' , 'xecuter'),
						"id" 		=> "xecuter_body_background_pattern",
						"std" 		=> $bg_images_url."bg0.png",
						"type" 		=> "tiles",
						"options" 	=> $bgp_image,
						"fold" 		=> "xecuter_body_background_type",
 				);	
						 
$of_options[] = array( 	"position" => "start",
						"id" => "xecuter_body_background_custom body_background_type",
						"type" => "html-radio"
				);
					
$of_options[] = array( 	"name" 		=> esc_html__('Custom Background Image' , 'xecuter'),
						"desc" 		=> esc_html__('Upload images using native media uploader from Wordpress 3.5+' , 'xecuter'),
						"id" 		=> "xecuter_body_background_image",
 						"type" 		=> "upload",
						"fold" 		=> "xecuter_body_background_type",
				);
				
$of_options[] = array( 	"position" => "end",
 						"type" => "html-radio"
				);
						  
					
 
 

$of_options[] = array( 	"name" 		=> esc_html__('Text link Color' , 'xecuter'),
						"name2" 	=> esc_html__('Mosue Over' , 'xecuter'),
 						"id" 		=> "xecuter_body_link_color",
						"std" 		=> array('color' => '#121518','color2' => '#ff4516'),
						"type" 		=> "color2"
					);
    
				
$of_options[] = array( 	"name" 		=> esc_html__('Text Color' , 'xecuter'),
 						"id" 		=> "xecuter_body_text_color",
						"std" 		=> '#424548',
						"type" 		=> "color"
					);  
				 		
// Main Header Style
$of_options[] = array( 	"name" 		=> esc_html__('Main Header Style' , 'xecuter'),
						"type" 		=> "title"
					);	
 				
$of_options[] = array( 	"name" 		=> esc_html__('Background Color' , 'xecuter'),
						"name2" 	=> esc_html__('Text Color' , 'xecuter'),
						"std" 		=> array(
											'color' => 'rgba(3,6,9,0.9)',
											'color2' => '#ffffff',
										),
						"id" 		=> "xecuter_masthead_color",
						"type" 		=> "color2_rgba"
					); 
  
	 
// Top Header Style
$of_options[] = array( 	"name" 		=> esc_html__('Top Header Style' , 'xecuter'),
						"type" 		=> "title"
				);	
 					
$of_options[] = array( 	"name" 		=> esc_html__('Background Color' , 'xecuter'),
						"name2" 	=> esc_html__('Text Color' , 'xecuter'),
						"std" 		=> array(
											'color' => '#000000',
											'color2' => '#f2f5f8',
										),
						"id" 		=> "xecuter_navplus_color",
						"type" 		=> "color2_rgba"
				); 
 
// Top Header Style
$of_options[] = array( 	"name" 		=> esc_html__('Breadcrumbs Style' , 'xecuter'),
						"type" 		=> "title"
				);	
 					
$of_options[] = array( 	"name" 		=> esc_html__('Background Color' , 'xecuter'),
						"name2" 	=> esc_html__('Text Color' , 'xecuter'),
						"std" 		=> array(
											'color' => 'rgba(245,245,245,.90)',
											'color2' => '#424548',
										),
						"id" 		=> "xecuter_breadcrumbs_color",
						"type" 		=> "color2_rgba"
				);  
// Post Style 
$of_options[] = array( 	"name" 		=> esc_html__('Posts Style' , 'xecuter'),
						"type" 		=> "title"
				);
					 

$of_options[] = array( 	"name" 		=> esc_html__('Background Color Main Row' , 'xecuter'),
						"id" 		=> "xecuter_background_main_row",
						"type" 		=> "color_rgba",
 						"std"  		=> "rgba(255,255,255,0.9)",
				); 								
  					  
  
 
 $of_options[] = array( "name" 		=> esc_html__('Link Color Title Posts' , 'xecuter'),
   						"id" 		=> "xecuter_post_title_color",
						"type" 		=> "color"
				);
	
 $of_options[] = array( "name" 		=> esc_html__('Excerpt Color Posts' , 'xecuter'),
   						"id" 		=> "xecuter_post_excerpt_color",
						"type" 		=> "color"
				);	
				
$of_options[] = array( "name" 		=> esc_html__('Text Color Meta Posts' , 'xecuter'),
   						"id" 		=> "xecuter_post_meta_color",
						"type" 		=> "color"
				);	  				
 
   
// Footer Style
$of_options[] = array( 	"name" 		=> esc_html__('Footer Style' , 'xecuter'),
						"type" 		=> "title"

				);
					 
$of_options[] = array( 	"name" 		=> esc_html__('Background Color' , 'xecuter'),
 						"id" 		=> "xecuter_footer_background_color",
						"std" 		=> '#121314',
						"type" 		=> "color_rgba"
				);
										
$of_options[] = array( "name" 		=> esc_html__('Link Color' , 'xecuter'),
   						"id" 		=> "xecuter_footer_link_color",
						"type" 		=> "color",
						"std" 		=> '#ffffff',
				);
	
$of_options[] = array( "name" 		=> esc_html__('Text Color' , 'xecuter'),
   						"id" 		=> "xecuter_footer_text_color",
						"std" 		=> '#cccccc',
						"type" 		=> "color"
				);					 
?>