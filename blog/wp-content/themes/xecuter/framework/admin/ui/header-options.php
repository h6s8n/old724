<?php
$of_options[] = array( 	"name" 		=> __( 'Header Options', 'xecuter' ),
						"type" 		=> "heading",
						"id" 		=> "headeroptions",
						"icon"		=> ADMIN_IMAGES . "headeroptions.png",
	
				); 
 
 // Sticky Options  
$of_options[] = array( 	"name" 		=> esc_html__( 'Sticky Header', 'xecuter' ),
						"type" 		=> "title"
				);	 		
$of_options[] = array(  "name" 		=> esc_html__( 'Sticky Main Header', 'xecuter' ),
 						"id" 		=> "xecuter_header_sticky",
 						"type" 		=> "select",
						"on" 		=> esc_html__( 'Enable', 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
 				);

 // Header Height Options  				
$of_options[] = array( 	"name" 		=> esc_html__( 'Header Height', 'xecuter' ),
						"type" 		=> "title"
				);						
$of_options[] = array(  "name" 		=> esc_html__( 'Main Header Height', 'xecuter' ),
						"id" 		=> "xecuter_masthead_height",
						"std" 		=> "100px",
						"type" 		=> "select",
						"options" 	=> 	array(	"40px" => "40px",
												"50px" => "50px",
												"60px" => "60px",
												"70px" => "70px",
												"80px" => "80px",
												"90px" => "90px",
												"100px" => "100px",
												) 
 				);
				
$of_options[] = array(  "name" 		=> esc_html__( 'Top Header Height', 'xecuter' ),
						"id" 		=> "xecuter_navplus_height",
						"std" 		=> "60px",
						"type" 		=> "select",
						"options" 	=> 	array(	"30px" => "30px",
												"40px" => "40px",
												"50px" => "50px",
												"60px" => "60px",
												"70px" => "70px",
												"80px" => "80px",
												"90px" => "90px",
 												) 

 				);	
												
// Menu Options  
$of_options[] = array( 	"name" 		=> esc_html__( 'Menu Options', 'xecuter' ),
						"type" 		=> "title"
				);	 		
  
				
$of_options[] = array( "name" 		=> esc_html__( 'Main Menu Item Padding', 'xecuter' ),
						"desc" 		=> esc_html__( 'Controls right (left on RTL) menu padding. Use a number without "px", Example 10', 'xecuter' ),
						"id" 		=> "xecuter_main_menu_padding",
						"std" 		=> "15",
						"type" 		=> "text-mini",
  				);
				

$of_options[] = array( "name" 		=> esc_html__('Main Menu Alignment', 'xecuter' ),
						"id" 		=> "xecuter_main_menu_align",
 						"std" 		=>  'left',
 						"type" 		=> "select",
						"options" 	=> array(	'left' 		=> 'راست',
												'right' 	=> 'چپ',
 											)
				); 
				 
$of_options[] = array( 	"name" 		=> esc_html__( 'Top Menu', 'xecuter' ),
 						"id" 		=> "xecuter_plus_menu",
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"std" 		=> 1,
						"type" 		=> "switch",
				);
 $of_options[] = array( "name" 		=> esc_html__( 'Top Menu Item Padding', 'xecuter' ),
						"desc" 		=> esc_html__( 'Controls right (left on RTL) menu padding. Use a number without "px", Example 10', 'xecuter' ),
						"id" 		=> "xecuter_plus_menu_padding",
						"std" 		=> "15",
						"type" 		=> "text-mini",
						"fold" 		=> "xecuter_plus_menu",
 				);	
						
$plus_menu_rtl = is_rtl() ? 'right':'left';
			 
$of_options[] = array( "name" 		=> esc_html__('تراز منوی بالایی', 'xecuter' ),
						"id" 		=> "xecuter_plus_menu_align",
 						"std" 		=> 'left',
 						"type" 		=> "select",
						"fold" 		=> "xecuter_plus_menu",
						"options" 	=> array(	'left' 		=> 'راست',
												'right' 	=> 'چپ',
 											)
				); 
// Login Form Options
$of_options[] = array( "name" 		=> esc_html__( 'Login Form Options', 'xecuter' ),
						"type" 		=> "title"
				);			
							 
$of_options[] = array( 	"name" 		=> esc_html__( 'Login Form', 'xecuter' ),
 						"id" 		=> "xecuter_loginform",
  						"std" 		=> "navplus",
  						"type" 		=> "select",
 						"options" 	=> 	array(	"" 			=> esc_html__( 'Disable', 'xecuter' ),
												"masthead" 	=> esc_html__( 'in Main Header', 'xecuter' ),
												"navplus" 	=> esc_html__( 'in Top Header', 'xecuter' ),
 										)
						
						
						
 
				);

  					
$of_options[] = array( "name" 		=> esc_html__('Login Form Alignment', 'xecuter' ),
						"id" 		=> "xecuter_loginform_align",
 						"std" 		=> 'right',
 						"type" 		=> "select",
						"options" 	=> array(	'left' 		=> 'راست',
												'right' 	=> 'چپ',
 											)
				);				
 
// Search Form Options
$of_options[] = array( "name" 		=> esc_html__( 'Search Form Options', 'xecuter' ),
						"type" 		=> "title"
				);
				
$of_options[] = array( 	"name" 		=> esc_html__( 'Search Form', 'xecuter' ),
 						"id" 		=> "xecuter_searchform",
  						"type" 		=> "select",
  						"std" 		=> "masthead",
 						"options" 	=> 	array(	"" 			=> esc_html__( 'Disable', 'xecuter' ),
												"masthead" 	=> esc_html__( 'in Main Header', 'xecuter' ),
												"navplus" 	=> esc_html__( 'in Top Header', 'xecuter' ),
 										)
						
				);
$search_rtl = is_rtl() ? 'left':'right';

				
$of_options[] = array( "name" 		=> esc_html__('SearchForm Alignment', 'xecuter' ),
						"id" 		=> "xecuter_searchform_align",
 						"std" 		=> 'right' ,
 						"type" 		=> "select",
						"options" 	=> array(	'left' 		=> 'راست',
												'right' 	=> 'چپ',
 											)
				);	
 
//  Social Icon Options
$of_options[] = array( "name" 		=> esc_html__( 'Social Icon Options', 'xecuter' ),
						"type" 		=> "title"
				);

$of_options[] = array( 	"name" 		=> esc_html__( 'Social Icons', 'xecuter' ),
 						"id" 		=> "xecuter_social_net",
						"type" 		=> "select",
   						"std" 		=> "navplus",
 						"options" 	=> 	array(	"" 			=> esc_html__( 'Disable', 'xecuter' ),
												"masthead" 	=> esc_html__( 'in Main Header', 'xecuter' ),
												"navplus" 	=> esc_html__( 'in Top Header', 'xecuter' ),
 										)
						
				);
				

$of_options[] = array( "name" 		=> esc_html__('Social Icons Alignment', 'xecuter' ),
						"id" 		=> "xecuter_social_align",
 						"std" 		=> 'right',
 						"type" 		=> "select",
						"options" 	=> array(	'left' 		=> 'راست',
												'right' 	=> 'چپ',
 											)
				);	
				
//  Social Icon Options
$of_options[] = array( "name" 		=> esc_html__( 'Date Options', 'xecuter' ),
						"type" 		=> "title"
				);

$of_options[] = array( 	"name" 		=> esc_html__( 'Date', 'xecuter' ),
 						"id" 		=> "xecuter_date_header",
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"std" 		=> 1,
						"type" 		=> "switch",
						
				);
				
$date_align = is_rtl() ? 'left':'right';

$of_options[] = array( "name" 		=> esc_html__('Date Alignment', 'xecuter' ),
						"id" 		=> "xecuter_date_header_align",
 						"std" 		=> 'right',
 						"type" 		=> "select",
						"options" 	=> array(	'left' 		=> 'راست',
												'right' 	=> 'چپ',
 											)
				);					     
?>