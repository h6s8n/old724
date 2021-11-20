<?php
$of_options[] = array( 	"name" 		=> esc_html__('Sidebars' , 'xecuter'),
						"type" 		=> "heading",
						"id" 		=> "sidebars",
						"icon"		=> ADMIN_IMAGES . "sidebars.png",

				);  

$of_options[] = array( "name" 		=> esc_html__('Options Sidebar' , 'xecuter'),
						"type" 		=> "title"
				);
$of_options[] = array(  "name" 		=> esc_html__('Sticky Main Sidebar' , 'xecuter'),
 						"id" 		=> "xecuter_sticky_main",
						"std" 		=> 1,						
 						"on" 		=> esc_html__( 'Enable', 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
 				);  
				
$of_options[] = array(  "name" 		=> esc_html__('Hide Sidebar in Mobile' , 'xecuter'),
 						"id" 		=> "xecuter_hide_sidebar",
						"std" 		=> 0,						
 						"on" 		=> esc_html__( 'Enable', 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
 				);  
								
$of_options[] = array( "name" 		=> esc_html__('Home Sidebar' , 'xecuter'),
						"type" 		=> "title"
				); 
				
				
$of_options[] = array(  "name" 		=> esc_html__('Home Main Sidebar' , 'xecuter'),
						"desc" 		=> esc_html__('Select a sidebar in Home Main Sidebar' , 'xecuter'),
						"id" 		=> "xecuter_home_sidebar",
  						"type" 		=> "select",
 						"options" 	=> $sidebar_options
				);  
$of_options[] = array( "name" 		=> esc_html__('Single Sidebar' , 'xecuter'),
						"type" 		=> "title"
				); 
 
				
$of_options[] = array(  "name" 		=> esc_html__('Single Main Sidebar' , 'xecuter'),
						"desc" 		=> esc_html__('Select a sidebar in Single Main Sidebar' , 'xecuter'),
						"id" 		=> "xecuter_single_sidebar",
  						"type" 		=> "select",
 						"options" 	=> $sidebar_options
                ); 
       
$of_options[] = array( "name" 		=> esc_html__('Page Sidebar' , 'xecuter'),
						"type" 		=> "title"
				); 
				
 
$of_options[] = array(  "name" 		=> esc_html__('Page Main Sidebar' , 'xecuter'),
						"desc" 		=> esc_html__('Select a sidebar in Page Main Sidebar' , 'xecuter'),
						"id" 		=> "xecuter_page_sidebar",
  						"type" 		=> "select",
 						"options" 	=> $sidebar_options
                );
				
$of_options[] = array( "name" 		=> esc_html__('Archive Sidebar' , 'xecuter'),
						"type" 		=> "title"
				); 
				
				
$of_options[] = array(  "name" 		=> esc_html__('Archive Main Sidebar' , 'xecuter'),
						"desc" 		=> esc_html__('Select a sidebar in Archive Main Sidebar' , 'xecuter'),
						"id" 		=> "xecuter_archive_sidebar",
  						"type" 		=> "select",
 						"options" 	=> $sidebar_options
                 ); 
 
$of_options[] = array( "name" 		=> esc_html__('bbPress Sidebar' , 'xecuter'),
						"type" 		=> "title"
				); 
 
 
$of_options[] = array(  "name" 		=> esc_html__('bbPress Main Sidebar' , 'xecuter'),
						"desc" 		=> esc_html__('Select a sidebar in bbPress Main Sidebar' , 'xecuter'),
						"id" 		=> "xecuter_bbpress_sidebar",
  						"type" 		=> "select",
 						"options" 	=> $sidebar_options
				);										  
 ?>