<?php
$of_options[] = array( 	"name" 		=> esc_html__('Single' , 'xecuter'),
						"type" 		=> "heading",
						"id" 		=> "single",
						"icon"		=> ADMIN_IMAGES."single.png",
				); 
	
$of_options[] = array( 	
						"name" 		=> esc_html__('Single Post Template' , 'xecuter'),
						"type" 		=> "title"
				);
// Single Settings
$url_single =  get_template_directory_uri()  . '/framework/assets/images/single/single-template-';

$of_options[] = array( "name" 		=> esc_html__('Single Template' , 'xecuter'),
   						"id" 		=> 	"xecuter_single_template",
						"std" 		=>'3',
						"type" 		=> "images",
						"options" 	=> array(
							'1' 	=> $url_single . '1.jpg',
							'2' 	=> $url_single . '2.jpg',
							'3' 	=> $url_single . '3.jpg',
 							'4' 	=> $url_single . '4.jpg',
 
						)
				);
 
				
$of_options[] = array( 	"name" 		=> esc_html__( 'Image Ratio' , 'xecuter'),
   						"id" 		=> "xecuter_single_ratio",
 						"std" 		=>'rd-ratio60',
 						"type" 		=> "select",
						"options" 	=> array(	'rd-ratio60' 	=>  '16/9',
												'rd-ratio75' 	=>  '4/3',
												'rd-ratio100' 	=>  '1/1',
												'rd-ratio135' 	=>  '3/5'
												),
						
				);						
 $of_options[] = array( "name" 		=> esc_html__('Post Tags' , 'xecuter'),
 						"id" 		=> "xecuter_single_tags",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
 				);
						
$of_options[] = array( 	"name" 		=> esc_html__('Light Box Image' , 'xecuter'),
   						"id" 		=> "xecuter_single_lightbox",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);

  
$of_options[] = array( 	"name" 		=> esc_html__('Next And Previous Post' , 'xecuter'),
 						"id" 		=> "xecuter_single_nextperv_post",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);	

$of_options[] = array( 	"name" 		=> esc_html__('Author Box' , 'xecuter'),
 						"id" 		=> "xecuter_single_author_box",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);	
																						
// Post Meta Settings
$of_options[] = array( "name" 		=> esc_html__('Single Post Meta Settings' , 'xecuter'),
						"type" 		=> "title"
				);				
 			
$of_options[] = array( 	"name" 		=> esc_html__('Author Meta' , 'xecuter'),
 						"id" 		=> "xecuter_single_meta_author",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
					
$of_options[] = array( 	"name" 		=> esc_html__('Date Meta' , 'xecuter'),
 						"id" 		=> "xecuter_single_meta_date",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
					
$of_options[] = array( 	"name" 		=> esc_html__('Categories Meta' , 'xecuter'),
 						"id" 		=> "xecuter_single_meta_cats",
						"std" 		=> 0,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
					
$of_options[] = array( 	"name" 		=> esc_html__('View Meta' , 'xecuter'),
 						"id" 		=> "xecuter_single_meta_view",
						"std" 		=> 0,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
					
$of_options[] = array( 	"name" 		=> esc_html__('Comments Meta' , 'xecuter'),
 						"id" 		=> "xecuter_single_meta_comments",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);					

//* Share Post Settings
$of_options[] = array( 	"name" 		=> esc_html__('Share Post Settings' , 'xecuter'),
						"type" 		=> "title"
				);

$of_options[] = array( 	"name" 		=> esc_html__('Twitter Button' , 'xecuter'),
 						"id" 		=> "xecuter_single_share_twitter",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
					
$of_options[] = array( 	"name" 		=> esc_html__('Facebook Button' , 'xecuter'),
 						"id" 		=> "xecuter_single_share_facebook",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
					
$of_options[] = array( 	"name" 		=> esc_html__('Google+ Button' , 'xecuter'),
 						"id" 		=> "xecuter_single_share_google",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
					
$of_options[] = array( 	"name" 		=> esc_html__('Linkedin Button' , 'xecuter'),
 						"id" 		=> "xecuter_single_share_linkedin",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
				
$of_options[] = array( 	"name" 		=> esc_html__('Telegram Button' , 'xecuter'),
 						"id" 		=> "xecuter_single_share_telegram",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
 

$of_options[] = array( 	"name" 		=> esc_html__('WhatsApp Button' , 'xecuter'),
 						"id" 		=> "xecuter_single_share_whatsapp",
						"std" 		=> 0,
						"desc" 		=> esc_html__('Show Only in Mobile' , 'xecuter'),

						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
				
// * Related Posts Settings					
$of_options[] = array( 	"name" 		=> esc_html__('Related Posts Settings' , 'xecuter'),
						"type" 		=> "title"
				);

$of_options[] = array( 	"name" 		=> esc_html__('Related Posts' , 'xecuter'),
   						"id" 		=> "xecuter_related",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
					 
$of_options[] = array( "name" 		=> esc_html__('Rows Per Page To Show' , 'xecuter'),
 						"id" 		=> "xecuter_related_row",
						"std"  		=> 1,
						"type" 		=> "text-mini",
						"fold" 		=> "xecuter_related",
 				); 					
					
$of_options[] = array( 	"name" 		=> esc_html__('Related Posts Title' , 'xecuter'),
						"desc" 		=> esc_html__('This text will display in title bar Related Posts.' , 'xecuter'),
 						"std" 		=> esc_html__('Related Posts', 'xecuter'),
 						"id" 		=> "xecuter_related_title",
 						"type" 		=> "text",
						"fold" 		=> "xecuter_related",
				);		
				
					
 $of_options[] = array( "name" 		=> esc_html__('Query Type' , 'xecuter'),
  						"id" 		=> "xecuter_related_query",
						"std" 		=> "category",
						"type" 		=> "select",
						"fold" 		=> "xecuter_related",
						"options" 	=> array(	'recent' 	=> esc_html__('Recent' , 'xecuter'),
												'category' 	=> esc_html__('Category' , 'xecuter'),
												'tag' 		=> esc_html__('Tags' , 'xecuter'),
												'random' 	=> esc_html__('Random' , 'xecuter'),
										)
				);
															
$of_options[] = array( 	"name" 		=> esc_html__( 'Image Ratio' , 'xecuter'),
   						"id" 		=> "xecuter_related_ratio",
 						"std" 		=>'rd-ratio60',
 						"type" 		=> "select",
						"options" 	=> array(	'rd-ratio60' 	=>  '16/9',
												'rd-ratio75' 	=>  '4/3',
												'rd-ratio100' 	=>  '1/1',
												'rd-ratio135' 	=>  '3/5'
												),
						
				);	
// Author Bio Settings
$of_options[] = array( 	"name" 		=> esc_html__('Comments Settings' , 'xecuter'),
						"type" 		=> "title"
				);			
					
$of_options[] = array( "name" 		=> esc_html__('Comments Layout' , 'xecuter'),
   						"id" 		=> "xecuter_comments_layout_type",
						"std" 		=>'rd-thread',
						"type" 		=> "select",
 						"options" 	=> array(	'rd-thread' 	=> esc_html__('Thread' , 'xecuter'),
												'rd-list' 		=> esc_html__('List' , 'xecuter'),
										)
				);						