<?php
$of_options[] = array( 	"name" 		=> esc_html__( 'General', 'xecuter' ),
						"type" 		=> "heading",
						"id" 		=> "general",
						"icon"		=> ADMIN_IMAGES . "gerneral.png",
 				); 

$of_options[] = array( 	"name" 		=> esc_html__( 'Responsive Design', 'xecuter' ),
						"desc" 		=> esc_html__( 'SCheck this box to use the responsive design features. If left unchecked then the fixed layout is used.', 'xecuter' ),
						"id" 		=> "xecuter_responsive",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable', 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
						
					);
$xecuter_row = is_rtl() ? '400_800':'800_400';

						
						
$url_blog = get_template_directory_uri() . '/framework/assets/images/';
$of_options[] = array(	"name" 		=> esc_html__( 'Columns' , 'xecuter'),
   						"id" 		=> 	"xecuter_row",
						"std" 		=>	'800_400',
						"type" 		=> "images",
						"options" 	=> array(	'1200' 		=> $url_blog . '1200.jpg',
												'800_400' 	=> $url_blog . '800_400.jpg',
												'400_800' 	=> $url_blog . '400_800.jpg', 
  										)
				);	

$of_options[] = array(  "name" 		=> esc_html__( 'Select Page Builder', 'xecuter' ),
						"desc" 		=> esc_html__( 'Select Page in Front page displays', 'xecuter' ),
 						"id" 		=> "xecuter_page_builder",
						"std" 		=> "",
 						"type" 		=> "category",
						"options" 	=> $options_post,
  				);				
				
$of_options[] = array( 	"name" 		=> esc_html__( 'Show Breadcrumbs', 'xecuter' ),
 						"id" 		=> "xecuter_breadcrumbs",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Show', 'xecuter' ),
						"off" 		=> esc_html__( 'Hide', 'xecuter' ),
						"type" 		=> "switch",
 				);				
			
$of_options[] = array(  "name" 		=> esc_html__( 'Time Format For Post', 'xecuter' ),
 						"id" 		=> "xecuter_time_format",
						"std" 		=> "morden",
 						"type" 		=> "select",
 						"options" 	=> 	array(	"traditional" 	=> esc_html__( 'Traditional', 'xecuter' ),
												"morden" 		=> esc_html__( 'Time Ago Format', 'xecuter' ),
 										)
 				);	

$of_options[] = array( 	"name" 		=> esc_html__( 'input  Text in Bottom Footer', 'xecuter' ),
 						"id" 		=> "xecuter_footer_bottom_code",
  						"type" 		=> "textarea",
   				);												
								
$of_options[] = array(	"name" 		=> esc_html__( 'Script Code', 'xecuter' ),
						"desc" 		=> esc_html__( 'Add Custom Script Code', 'xecuter' ),
						"id"		=> "xecuter_custom_script",
						"std"		=> "",
						"type"		=> "textarea" ,
				);
 
$of_options[] = array( "name" 		=> esc_html__( 'CSS Code', 'xecuter' ),
						"desc" 		=> esc_html__( 'Add Custom CSS Code', 'xecuter' ),
						"id"		=> "xecuter_custom_css",
						"std"		=> "",
						"type"		=> "textarea",
				);							

?>