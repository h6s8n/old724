<?php
$of_options[] = array( 	"name" 		=> esc_html__('Logo And Favicon', 'xecuter' ),
						"type" 		=> "heading",
						"id" 		=> "logoandfacicon",
						"icon"		=> ADMIN_IMAGES . "logo.png",
				); 
				
// Logo Options 
$of_options[] = array( 	"name" 		=> esc_html__('Logo Options', 'xecuter' ),
 						"type" 		=> "title"
				);
   
					
$of_options[] = array( "name" 		=> esc_html__('Logo Type', 'xecuter' ),
 						"id" 		=> "xecuter_logo_type",
						"std" 		=> "title",
						"type" 		=> "select",
						"options" 	=> array(	'image' 		=> esc_html__('Custom Image', 'xecuter' ),
												'title' 		=> esc_html__('Site Title', 'xecuter' ),
												'description' 	=> esc_html__('Title + Description', 'xecuter' ),
  						)
						
				);
											 
$of_options[] = array( 	"position" 	=> "start",
						"id" 		=> "xecuter_logo_custom_image",
						"type"		=> "html-radio"
				);				
					
$of_options[] = array( 	"name" 		=> esc_html__('Logo Image', 'xecuter' ),
						"desc" 		=> esc_html__('Upload Select an image file for your logo', 'xecuter' ),
						"id" 		=> "xecuter_logo",
 						"type" 		=> "upload",

				);					  

			
$of_options[] = array( 	"position" => "end",
 						"type" => "html-radio"
				);
 
 
				
$of_options[] = array( "name" 		=> esc_html__('Font Size Logo Title', 'xecuter' ),
						"desc" 		=> esc_html__(' In pixels', 'xecuter' ),
						"id" 		=> "xecuter_logo_title_font_size",
  						"std" 		=> "40",
						"type" 		=> "text-mini"
				); 

$of_options[] = array( "name" 		=> esc_html__('Color Logo Title', 'xecuter' ),
 						"id" 		=> "xecuter_logo_title_color",
  						"std" 		=> "#ff4516",
						"type" 		=> "color"
				); 
				
$of_options[] = array( "name" 		=> esc_html__('Font Size Logo Description', 'xecuter' ),
						"desc" 		=> esc_html__('In pixels', 'xecuter' ),
						"id" 		=> "xecuter_logo_description_font_size",
  						"std" 		=> "15",
						"type" 		=> "text-mini"
				); 
				
$of_options[] = array( "name" 		=> esc_html__('Color Logo Description', 'xecuter' ),
 						"id" 		=> "xecuter_logo_description_color",
  						"std" 		=> "#ffffff",
						"type" 		=> "color"
				); 
 
$of_options[] = array( "name" 		=> esc_html__('Logo Width', 'xecuter' ),
						"desc" 		=> esc_html__('In pixels', 'xecuter' ),
						"id" 		=> "xecuter_logo_width",
						"std" 		=> "",
						"type" 		=> "text-mini"
				);
 
				
$of_options[] = array( 	"position" 	=> "start",
						"id" 		=> "xecuter_logo_custom_image",
						"type"		=> "html-radio"
				);	
						
$of_options[] = array( "name" 		=> esc_html__('Logo Height', 'xecuter' ),
						"desc" 		=> esc_html__('In pixels', 'xecuter' ),
						"id" 		=> "xecuter_logo_height",
						"std" 		=> "",
						"type" 		=> "text-mini"
				);
			
			
$of_options[] = array( 	"position" => "end",
 						"type" => "html-radio"
				);
	
$logo_rtl = is_rtl() ? 'right':'left';

				
$of_options[] = array( "name" 		=> esc_html__('Logo Alignment', 'xecuter' ),
						"id" 		=> "xecuter_logo_align",
 						"std" 		=> 'left',
 						"type" 		=> "select",
						"options" 	=> array(	'left' 		=> 'راست',
												'right' 	=> 'چپ',
 											)
				);				
										
// Favicon Options
$of_options[] = array( 	"name" 		=> esc_html__('Favicon Options', 'xecuter' ),
 						"type" => "title"
				);
 

$of_options[] = array( 	"name" 		=> esc_html__('Custom Favicon', 'xecuter' ),
						"desc" 		=> esc_html__('Favicon for your Website', 'xecuter' ),
						"id" 		=> "favicon",
 						"type" 		=> "upload",
 				);	
  
$of_options[] = array( "name" 		=> esc_html__('Apple iPhone Icon', 'xecuter' ),
						"desc" 		=> esc_html__('Favicon for Apple iPhone (57px x 57px).', 'xecuter' ),
						"id" 		=> "apple_iphone",
 						"type" 		=> "upload",
 				);	
  
$of_options[] = array( "name" 		=> esc_html__('Apple iPad Icon', 'xecuter' ),
						"desc" 		=> esc_html__('Favicon for Apple iPad (72px x 72px).', 'xecuter' ),
						"id" 		=> "apple_iPad",
 						"type" 		=> "upload",
 				);	
?>