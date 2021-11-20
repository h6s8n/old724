<?php
$of_options[] = array( 	"name" 		=> esc_html__( 'Blog' , 'xecuter'),
						"type" 		=> "heading",
						"id" 		=> "blog",
						"icon"		=> ADMIN_IMAGES."blog.png",

				); 
	
$of_options[] = array( 	"name" 		=> esc_html__( 'General Blog Options' , 'xecuter'),
						"type" 		=> "title"
				);

$of_options[] = array( 	"name" 		=> esc_html__( 'Blog in Homepage' , 'xecuter'),
						"desc" 		=> esc_html__( 'Enable Blog In The Homepage' , 'xecuter'),
						"id" 		=> "xecuter_blog_home",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
 				);

 $of_options[] = array( "name" 		=> esc_html__( 'Blog Title' , 'xecuter'),
						"desc" 		=> esc_html__( 'This text will display in the page Title Bar of the assigned Blog Page' , 'xecuter'),
						"std" 		=> esc_html__( 'Recent Posts' , 'xecuter' ),
 						"id" 		=> "xecuter_blog_title",
 						"type" 		=> "text",
 
 				);	
							
$url_blog = get_template_directory_uri() . '/framework/assets/images/';
$of_options[] = array(	"name" 		=> esc_html__( 'Blog Layout' , 'xecuter'),
   						"id" 		=> 	"xecuter_content_layout",
						"std" 		=>'list_1c',
						"type" 		=> "images",
						"options" 	=> array(	'grid_1c' 	=> $url_blog . 'content/grid_1c.jpg',
												'grid_2c' 	=> $url_blog . 'content/grid_2c.jpg',
												'grid_3c' 	=> $url_blog . 'content/grid_3c.jpg',
												'grid_4c' 	=> $url_blog . 'content/grid_4c.jpg',
												'grid_5c' 	=> $url_blog . 'content/grid_5c.jpg',
												'grid_6c' 	=> $url_blog . 'content/grid_6c.jpg',
												'list_1c' 	=> $url_blog . 'content/list_1c.jpg',
												'list_2c' 	=> $url_blog . 'content/list_2c.jpg',
												'list_3c' 	=> $url_blog . 'content/list_3c.jpg',
  										)
				);
 $of_options[] = array(	"name" 		=> esc_html__( 'Blog Layout' , 'xecuter'),
   						"id" 		=> 	"xecuter_main_layout",
						"std" 		=>'list_1c',
						"type" 		=> "images",
						"options" 	=> array(	'grid_1c' 	=> $url_blog . 'main/grid_1c.jpg', 
												'grid_2c' 	=> $url_blog . 'main/grid_2c.jpg', 
												'grid_3c' 	=> $url_blog . 'main/grid_3c.jpg', 
												'grid_4c' 	=> $url_blog . 'main/grid_4c.jpg', 
												'list_1c' 	=> $url_blog . 'main/list_1c.jpg',
												'list_2c' 	=> $url_blog . 'main/list_2c.jpg',													
 										)
				);		
$of_options[] = array( 	"name" 		=> esc_html__( 'Image Size' , 'xecuter'),
   						"id" 		=> "xecuter_size1",
 						"std" 		=>	'rd-img-medium',
 						"type" 		=> "select",
						"options" 	=> array(	'rd-img-medium' 	=>  esc_html__( 'Medium' , 'xecuter'),
												'rd-img-large' 		=>  esc_html__( 'Large' , 'xecuter'), 
												),
 				);
				
$of_options[] = array( 	"name" 		=> esc_html__( 'Image Size' , 'xecuter'),
   						"id" 		=> "xecuter_size2",
 						"std" 		=>	'rd-img-medium',
 						"type" 		=> "select",
						"options" 	=> array(	'rd-img-small' 		=>   esc_html__( 'Small' , 'xecuter'),
												'rd-img-medium' 	=>   esc_html__( 'Medium' , 'xecuter'),
												'rd-img-large' 		=>   esc_html__( 'Large' , 'xecuter'), 
												),
 				);				
				
$of_options[] = array( 	"name" 		=> esc_html__( 'Image Ratio' , 'xecuter'),
   						"id" 		=> "xecuter_ratio",
 						"std" 		=>'rd-ratio60',
 						"type" 		=> "select",
						"options" 	=> array(	'rd-ratio60' 	=>  '16/9',
												'rd-ratio75' 	=>  '4/3',
												'rd-ratio100' 	=>  '1/1',
												'rd-ratio135' 	=>  '3/5'
												),
						
				);				
			
$of_options[] = array( 	"name" 		=> esc_html__( 'Image Ratio' , 'xecuter'),
   						"id" 		=> "xecuter_ratio2",
 						"std" 		=>	'rd-ratio60f',
 						"type" 		=> "select",
						"options" 	=> array(	'rd-ratio40f' 	=>  '2/5',
												'rd-ratio60f' 	=>  '16/9',
												),
						
				);				
				
				
				
$of_options[] = array( 	"name" 		=> esc_html__( 'Image Height' , 'xecuter'),
   						"id" 		=> "xecuter_height",
 						"std" 		=>	'rd-400px',
 						"type" 		=> "select",
						"options" 	=> array(	'rd-300px' 	=>  '300px',
												'rd-400px' 	=>  '400px',
												'rd-500px' 	=>  '500px',
												'rd-600px' 	=>  '600px'
												),
						
				);				
								
$of_options[] = array( 	"name" 		=> esc_html__( 'Show Excerpt Posts' , 'xecuter'),
   						"id" 		=> "xecuter_excerpt",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
$of_options[] = array( "name" 		=> esc_html__( 'Limit Title length' , 'xecuter'),
						"desc" 		=> esc_html__( 'Please enter Maximum number of characters' , 'xecuter'),
						"id" 		=> "xecuter_title_limit",
						"std" 		=> "",
						"type" 		=> "text-mini"
 				);
				 			
									
$of_options[] = array( "name" 		=> esc_html__( 'Limit Excerpt length' , 'xecuter'),
						"desc" 		=> esc_html__( 'Please Enter Maximum Number of characters' , 'xecuter'),
						"id" 		=> "xecuter_excerpt_limit",
						"std" 		=> "",
						"type" 		=> "text-mini"
 				); 

$of_options[] = array( 	"name" 		=> esc_html__( 'Pagenavi Ajax' , 'xecuter'),
						"desc" 		=> esc_html__( 'Donot Load All Page in Pagenavi' , 'xecuter'),
  						"id" 		=> "xecuter_pagenavi_ajax",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
				
				
// * Blog Post Meta Settings				
$of_options[] = array( 	"name" 		=> esc_html__('Blog Post Meta Settings' , 'xecuter'),
						"type" 		=> "title"
				);			
 		
$of_options[] = array( 	"name" 		=> esc_html__( 'Categories Meta' , 'xecuter'),
 						"id" 		=> "xecuter_blog_meta_category",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
				
$of_options[] = array( 	"name" 		=> esc_html__( 'Review Stars Meta' , 'xecuter'),
 						"id" 		=> "xecuter_blog_meta_review",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
					
$of_options[] = array( 	"name" 		=> esc_html__( 'Author Meta' , 'xecuter'),
 						"id" 		=> "xecuter_blog_meta_author",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
					
$of_options[] = array( 	"name" 		=> esc_html__( 'Date Meta' , 'xecuter'),
 						"id" 		=> "xecuter_blog_meta_date",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
 
					
$of_options[] = array( 	"name" 		=> esc_html__( 'View Meta' , 'xecuter'),
 						"id" 		=> "xecuter_blog_meta_view",
						"std" 		=> 0,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);
					
$of_options[] = array( 	"name" 		=> esc_html__( 'Comments Meta' , 'xecuter'),
 						"id" 		=> "xecuter_blog_meta_comments",
						"std" 		=> 1,
						"on" 		=> esc_html__( 'Enable' , 'xecuter' ),
						"off" 		=> esc_html__( 'Disable', 'xecuter' ),
						"type" 		=> "switch",
				);					
?>