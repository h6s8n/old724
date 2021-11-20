<?php
add_action('init','of_options');
if (!function_exists('of_options')){
	
	function of_options() {
	
		// xecuter Edit
		$sidebar_options = array();
		$sidebar_options_obj = get_option('xecuter_boxes');
		$sidebar_options[''] =  esc_html__('Default','xecuter') ;
 		$sidebar_options['xecuter_main_sidebar'] = esc_html__('Primery Sidebar','xecuter') ;
 		
		
		if(!empty($sidebar_options_obj)){
			foreach ($sidebar_options_obj as $side) {
				$sidebar_options['xecuter_'.sanitize_title($side)] = $side;
			}
		}


		$args = array(
			'sort_order' => 'asc',
			'sort_column' => 'post_title',
			'hierarchical' => 1,
			'meta_value' => 'template-builder.php',
			'child_of' => 0,
			'parent' => -1,
			'post_type' => 'page',
			'post_status' => 'publish'
		); 
		 
		$options_post = array();
		$options_post_obj =get_pages($args); 
		$options_post[''] = __('None','xecuter');

		foreach ($options_post_obj as $rezapost) {
			$options_post[$rezapost->ID] = $rezapost->post_title;
		}
 	
		$options_categories = array();
		$options_categories_obj = get_categories();
		$options_categories[''] = esc_html__('All Categories','xecuter');
		foreach ($options_categories_obj as $category) {
			$options_categories[$category->cat_ID] = $category->cat_name;
		}
	
  		$of_options_line_hieght = array(
			"" => "",
			"1em" => "1em",
			"1.05em" => "1.05em",
			"1.1em" => "1.1em",
			"1.15em" => "1.15em",
			"1.2em" => "1.2em",
			"1.2em" => "1.25em",
			"1.3em" => "1.3em",
			"1.35em" => "1.35em",
			"1.4em" => "1.4em",
			"1.45em" => "1.45em",
			"1.5em" => "1.5em",
			"1.55em" => "1.55em",
			"1.6em" => "1.6em",
			"1.65em" => "1.65em",
			"1.7em" => "1.7em",
			"1.75em" => "1.75em",
			"1.8em" => "1.8em",
		);
		
		$of_options_font_size = array(
			"" => "",
			"10px" => "10px",
			"11px" => "11px",
			"12px" => "12px",
			"13px" => "13px", 
			"14px" => "14px",
			"15px" => "15px", 
			"16px" => "16px",
			"17px" => "17px", 						
			"18px" => "18px", 						
			"19px" => "19px", 						
			"20px" => "20px", 						
			"21px" => "21px", 						
			"22px" => "22px", 						
			"23px" => "23px", 
			"24px" => "24px", 						
			"25px" => "25px", 							
		);
		 
		// End xecuter Edit

		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
 
		$bgp_image 		= array(
			''=> 		get_template_directory_uri().'/images/bg/none.png',
			'bg1'=>		get_template_directory_uri().'/images/bg/bg1.png',
			'bg2'=>		get_template_directory_uri().'/images/bg/bg2.png',
			'bg3'=>		get_template_directory_uri().'/images/bg/bg3.png',
			'bg4'=>		get_template_directory_uri().'/images/bg/bg4.png',
			'bg5'=>		get_template_directory_uri().'/images/bg/bg5.png',
			'bg6'=>		get_template_directory_uri().'/images/bg/bg6.png',
			'bg7'=>		get_template_directory_uri().'/images/bg/bg7.png',
			'bg8'=>		get_template_directory_uri().'/images/bg/bg8.png',
			'bg9'=>		get_template_directory_uri().'/images/bg/bg9.png',
			'bg10'=>	get_template_directory_uri().'/images/bg/bg10.png',
			'bg11'=>	get_template_directory_uri().'/images/bg/bg11.png',
			'bg12'=>	get_template_directory_uri().'/images/bg/bg12.png',
			'bg13'=>	get_template_directory_uri().'/images/bg/bg13.png',
			'bg14'=>	get_template_directory_uri().'/images/bg/bg14.png',
			'bg15'=>	get_template_directory_uri().'/images/bg/bg15.png',
			'bg16'=>	get_template_directory_uri().'/images/bg/bg16.png',
			'bg17'=>	get_template_directory_uri().'/images/bg/bg17.png',
			'bg18'=>	get_template_directory_uri().'/images/bg/bg18.png',
			'bg19'=>	get_template_directory_uri().'/images/bg/bg19.png',
			'bg20'=>	get_template_directory_uri().'/images/bg/bg20.png',
			'bg21'=>	get_template_directory_uri().'/images/bg/bg21.png',
			'bg22'=>	get_template_directory_uri().'/images/bg/bg22.png',
			'bg23'=>	get_template_directory_uri().'/images/bg/bg23.png',
			
		);
		
		
		include_once get_template_directory() . '/framework/admin/google-font.php';

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
 


		/*-----------------------------------------------------------------------------------*/
		/* The Options Array */
		/*-----------------------------------------------------------------------------------*/
		
		// Set the Options Array
		global $of_options;
		//   xecuter Edit
		include_once get_template_directory() . '/framework/admin/ui/general.php';
		include_once get_template_directory() . '/framework/admin/ui/logo-options.php';   
		include_once get_template_directory() . '/framework/admin/ui/header-options.php';
  		include_once get_template_directory() . '/framework/admin/ui/blog.php';
		include_once get_template_directory() . '/framework/admin/ui/single-options.php';
 		include_once get_template_directory() . '/framework/admin/ui/sidebars-options.php';
 		include_once get_template_directory() . '/framework/admin/ui/ads-settings.php';
		include_once get_template_directory() . '/framework/admin/ui/single-options.php';
		include_once get_template_directory() . '/framework/admin/ui/styling-general.php';
 		include_once get_template_directory() . '/framework/admin/ui/networking.php';
		include_once get_template_directory() . '/framework/admin/ui/typography.php';
		 include_once get_template_directory() . '/framework/admin/ui/translation.php';
   
		// Backup Options
		$of_options[] = array( 	"name" 		=> esc_html__('Backup Options' , 'xecuter'),
								"type" 		=> "heading",
								"id" 		=> "backup",
								"icon"		=> ADMIN_IMAGES . "backup.png"
						);
 
										
		$of_options[] = array( 	"name" 		=> esc_html__('Backup and Restore Options' , 'xecuter'),
								"id" 		=> "of_backup",
								"std" 		=> "",
								"type" 		=> "backup",
								"desc" 		=> esc_html__('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.' , 'xecuter'),
						);
						
		$of_options[] = array( 	"name" 		=> esc_html__('Transfer Theme Options Data' , 'xecuter'),
								"id" 		=> "of_transfer",
								"std" 		=> "",
 
								"type" 		=> "transfer",
								"desc" 		=> esc_html__('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options' , 'xecuter')
						);
		

	
		// Perdefined Options
 		$of_options[] = array( 	"name" 		=> esc_html__('Predefined' , 'xecuter'),
								"type" 		=> "heading",
																	"id" 		=> "predefined",

								"icon"		=> ADMIN_IMAGES . "backup.png"
						);
						
 		$of_options[] = array(	"name" 		=> esc_html__('Predefined Layout' , 'xecuter'),
   								"id" 		=> "xecuter_perdefined",
 								"std" 		=> "layout_1",
								"type" 		=> "select",
								"options" 	=> array( 	'layout_1' 	=> 'Layout 1',
														'layout_2' 	=> 'layout_2',
														'layout_3' 	=> 'layout_3',
														'layout_4' 	=> 'layout_4',
														'layout_5' 	=> 'layout_5',
														'layout_6' 	=> 'layout_6',
														'layout_7' 	=> 'layout_7',
														'layout_8' 	=> 'layout_8',
														'layout_9' 	=> 'layout_9',
														'layout_10'	=> 'layout_10',
														'layout_11'	=> 'layout_11',
														'layout_12'	=> 'layout_12',
														'layout_13'	=> 'layout_13',
														'layout_14'	=> 'layout_14',
														'layout_15'	=> 'layout_15',
											)
			);
					
					
		$url_layout =   get_template_directory_uri() . '/framework/assets/images/layout/';
 		$of_options[] = array(	"name" 		=> esc_html__('Predefined Layout' , 'xecuter'),
								"desc" 		=> esc_html__('Select Predefined Layout For install click "Import Predefined Styles"' , 'xecuter'),
   								"id" 		=> "perdefined",
								"std" 		=> "layout_1",
								"type" 		=> "images",
								"options" 	=> array( 	'layout_1' 	=> $url_layout . 'layout_1.jpg',
														'layout_2' 	=> $url_layout . 'layout_2.jpg',
														'layout_3' 	=> $url_layout . 'layout_3.jpg',
														'layout_4' 	=> $url_layout . 'layout_4.jpg',
														'layout_5' 	=> $url_layout . 'layout_5.jpg',
														'layout_6' 	=> $url_layout . 'layout_6.jpg',
														'layout_7' 	=> $url_layout . 'layout_7.jpg',
														'layout_8' 	=> $url_layout . 'layout_8.jpg',
														'layout_9' 	=> $url_layout . 'layout_9.jpg',
														'layout_10'	=> $url_layout . 'layout_10.jpg',
														'layout_11'	=> $url_layout . 'layout_11.jpg',
														'layout_12'	=> $url_layout . 'layout_12.jpg',
														'layout_13'	=> $url_layout . 'layout_13.jpg',
														'layout_14'	=> $url_layout . 'layout_14.jpg',
														'layout_15'	=> $url_layout . 'layout_15.jpg',
 											)
					);		
						
		$of_options[] = array( 	"name" 		=> esc_html__('Transfer Theme Options Data' , 'xecuter'),
								"id" 		=> "predefined-demo",
								"std" 		=> "",
								"type" 		=> "predefined",
								"desc" 		=> esc_html__('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options"' , 'xecuter'),
						); 
					
					
	}
	
	
}?>