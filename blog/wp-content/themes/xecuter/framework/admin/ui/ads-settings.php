<?php
$of_options[] = array( 	"name" 		=> esc_html__( 'ADS Settings' , 'xecuter' ),
						"type" 		=> "heading",
						"id" 		=> "adssettings",
						"icon"		=> ADMIN_IMAGES . "banner.png",

				); 
				
// Using Widgets 				
$of_options[] = array( 	"name" 		=> esc_html__( 'Using Widgets' , 'xecuter' ),
						"type" 		=> "title"
				);
$of_options[] = array( 	"name" 		=> esc_html__( 'Above Content Area' , 'xecuter' ),
						"desc" 		=> esc_html__( 'Enable Ads Widget In Above Content' , 'xecuter' ),
						"id" 		=> "xecuter_above_content",
						"std" 		=> 0,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable' , 'xecuter' ),
						"type" 		=> "switch",
 				);	
				
$of_options[] = array( 	"name" 		=> esc_html__( 'Below Content Area' , 'xecuter' ),
						"desc" 		=> esc_html__( 'Enable Ads Widget In Below Content', 'xecuter'  ),
						"id" 		=> "xecuter_below_content",
						"std" 		=> 0,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable' , 'xecuter' ),
						"type" 		=> "switch",
 				);

$of_options[] = array( 	"name" 		=> esc_html__( 'Above Main Column Area' , 'xecuter' ),
						"desc" 		=> esc_html__( 'Enable Ads Widget In Above Content' , 'xecuter' ),
						"id" 		=> "xecuter_above_center",
						"std" 		=> 0,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable' , 'xecuter' ),
						"type" 		=> "switch",
 				);	
				
$of_options[] = array( 	"name" 		=> esc_html__( 'Below Main Column Area' , 'xecuter' ),
						"desc" 		=> esc_html__( 'Enable Ads Widget In Below Main Column Area' , 'xecuter' ),
						"id" 		=> "xecuter_below_center",
						"std" 		=> 0,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable' , 'xecuter' ),
						"type" 		=> "switch",
 				);

$of_options[] = array( 	"name" 		=> esc_html__( 'Below Article Area' , 'xecuter' ),
						"desc" 		=> esc_html__( 'Enable Ads Widget In Below Article' , 'xecuter'  ),
						"id" 		=> "xecuter_below_article",
						"std" 		=> 0,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable' , 'xecuter' ),
						"type" 		=> "switch",
 				);	 
?>