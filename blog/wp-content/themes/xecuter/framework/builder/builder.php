<?php
/*
 * @author    Daan Vos de Wael
 * @copyright Copyright (c) 2013, Daan Vos de Wael, http://www.daanvosdewael.com
 * @license   http://en.wikipedia.org/wiki/MIT_License The MIT License
*/
 
function xecuter_builder_enqueue($hook) {
	wp_register_script('xecuter_builder', get_template_directory_uri() . '/framework/assets/js/builder.js', array('jquery', 'jquery-ui-sortable') ,'1.0', true );
	wp_enqueue_style('xecuter_builder', get_template_directory_uri() . '/framework/assets/css/builder.css');
 wp_enqueue_media();
	wp_enqueue_script('jquery-ui-slider');
  	wp_enqueue_style('jquery-ui-custom-admin',  get_template_directory_uri() .'/framework/assets/css/jquery-ui-custom.css');

    // enqueue scripts
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'cs-wp-color-picker', get_template_directory_uri() . '/framework/assets/js/cs-wp-color-picker.min.js',  array( 'wp-color-picker' ), '1.0.0', true ); 
	 
 	wp_localize_script('xecuter_builder', 'xecuter_text', array(
	
 		 'rd_options'			=>	esc_html__('Options','xecuter') ,
 		 'done'					=>	esc_html__('Done','xecuter'),
 		 'add'					=>	esc_html__('Add','xecuter'),
 		 'upload'				=>	esc_html__('Upload','xecuter'),
 		 'remove'				=>	esc_html__('Remove','xecuter'),
 		 'title'				=>	esc_html__('Title box','xecuter'),
 		 'rd_select'			=>	esc_html__('Select','xecuter'),
  		 'post_type'			=>	esc_html__('Post Type','xecuter'),
 		 'cats'					=>	esc_html__('Category','xecuter'),
 		 'orderby'				=>	esc_html__('Order by','xecuter'),
  		 'hieght'				=>	esc_html__('hieght','xecuter'),
 		 'number'				=>	esc_html__('Number of posts to show','xecuter'),
  		 'allcats'				=>	esc_html__('All Categories','xecuter'),
  		 'posts'				=>	esc_html__('Posts','xecuter'),
 		 'customslides'			=>	esc_html__('Custom Slides','xecuter'),
 		 'slider'				=>	esc_html__('Slider','xecuter'),		 
 		 'post_title'			=>	esc_html__('Show Title Posts','xecuter'),
  		 'excerpt'				=>	esc_html__('Show Excerpt Posts','xecuter'),
 		'title_limit'			=>	esc_html__('Limit Title length','xecuter'),
 		 'excerpt_limit'		=>	esc_html__('Limit Excerpt length','xecuter'),
		'meta_category'			=>	esc_html__('Category Meta','xecuter'),		 
 		'meta'					=>	esc_html__('Post Meta','xecuter'),		   		 
		'meta_review'			=>	esc_html__('Review Stars Meta','xecuter'),		   		 
   		 'meta_author'			=>	esc_html__('Author Meta','xecuter'),		   		 
   		 'meta_date'			=>	esc_html__('Date Meta','xecuter'),		   		 
   		 'meta_view'			=>	esc_html__('Views Meta','xecuter'),		   		 
   		 'meta_comments'		=>	esc_html__('Comments Meta','xecuter'),		   		 
   		 'load_more'			=>	esc_html__('Show Load more','xecuter'),		   		 
   		 'newwindow'			=>	esc_html__('Open in New Window','xecuter'),		   		 
   		 'nofollow'				=>	esc_html__('Nofollow','xecuter'),		   		 
   		 'image'				=>	esc_html__('Upload Image','xecuter'),		   		 
   		 'ads_url'				=>	esc_html__('Ads link','xecuter'),		   		 
   		 'resize'				=>	esc_html__('Full Size Image','xecuter'),		   		 
   		 'textarea'				=>	esc_html__('Code','xecuter'),		   		 
   		 'sidebar'				=>	esc_html__('Select a Sidebar','xecuter'),		   		 
   		 'sticky'				=>	esc_html__('Sticky Sidebar','xecuter'),		   
  		 'effect'				=>	esc_html__('Slider Effect','xecuter'),
 		 'speed'				=>	esc_html__('Animation Speed','xecuter'),
 		 'pause'				=>	esc_html__('Animation Pause Time','xecuter'),	
 		 'tabs'					=>	esc_html__('Tabs','xecuter'),		   		 
 		 'addtab'				=>	esc_html__('Add Tab','xecuter'),		   		 
 		 'text_center'			=>	esc_html__('Text in center','xecuter'),		   		 
 		 'height'				=>	esc_html__('Height','xecuter'),		   		 
 		 'ratio'				=>	esc_html__('Image Ratio','xecuter'),		   		 
 		 'details_middle'		=>	esc_html__('Text in Vertical align middle','xecuter'),		   			 
 		 'space'				=>	esc_html__('Space in Between Posts','xecuter'),		   			 
 		 'size'					=>	esc_html__('Image Size','xecuter'),		   			 
 		 'background_thumb'		=>	esc_html__('Background Thumb','xecuter'),	
 		 'background_image'		=>	esc_html__('Backround Image','xecuter'),	
 		 'background_color'		=>	esc_html__('Backround Color','xecuter'), 

 		 'padding_top'			=>	esc_html__('Space Top','xecuter'), 
 		 'padding_bottom'		=>	esc_html__('Space Bottom','xecuter'), 
 		 'choose'			=>	esc_html__('Choose Image','xecuter'), 
 		 'uploader_button'		=>	esc_html__('Use This Image','xecuter'),  
 		 		 		 
    		));
			 


 	wp_localize_script('xecuter_builder', 'xecuter_background_thumb', xecuter_array_options('background_thumb'));	
 	wp_localize_script('xecuter_builder', 'xecuter_size1', xecuter_array_options('size1'));	
 	wp_localize_script('xecuter_builder', 'xecuter_size2', xecuter_array_options('size2'));	
 	wp_localize_script('xecuter_builder', 'xecuter_ratio1', xecuter_array_options('ratio1'));	
 	wp_localize_script('xecuter_builder', 'xecuter_ratio2', xecuter_array_options('ratio2'));	
 	wp_localize_script('xecuter_builder', 'xecuter_ratio3', xecuter_array_options('ratio3'));	
 	wp_localize_script('xecuter_builder', 'xecuter_ratio4', xecuter_array_options('ratio4'));	
 	wp_localize_script('xecuter_builder', 'xecuter_meta', xecuter_array_options('meta'));	
 	wp_localize_script('xecuter_builder', 'xecuter_post_type', xecuter_array_options('post_type'));	
 	wp_localize_script('xecuter_builder', 'xecuter_sliders', xecuter_array_options('sliders'));	
   	wp_localize_script('xecuter_builder', 'xecuter_sidebar', xecuter_array_options('sidebar'));	
   	wp_localize_script('xecuter_builder', 'xecuter_height_content', xecuter_array_options('height_content'));	
   	wp_localize_script('xecuter_builder', 'xecuter_height', xecuter_array_options('height'));	
   	wp_localize_script('xecuter_builder', 'xecuter_cats', xecuter_array_options('cats'));	
	wp_localize_script('xecuter_builder', 'xecuter_orderby', xecuter_array_options('orderby')) ;	
 	wp_localize_script('xecuter_builder', 'xecuter_effect', xecuter_array_options('effect'));	
   	wp_enqueue_script( 'xecuter_builder' );

}
add_action('admin_enqueue_scripts', 'xecuter_builder_enqueue');

function xecuter_builder_metabox($post_type) {
    $types = array('page');

    if (in_array($post_type, $types)) {
      add_meta_box(
        'xecuter_builder_metabox',
        esc_html__('Page builder','xecuter'),
        'xecuter_builder_meta',
        $post_type,
        'normal',
        'high'
      );
    }
  }
add_action('add_meta_boxes', 'xecuter_builder_metabox');
// builder Meta
function xecuter_builder_meta($post) {
    wp_nonce_field( basename(__FILE__), 'xecuter_builder_meta_nonce' );
    $row = get_post_meta($post->ID, 'xecuter_row', true);
    $wide  = get_post_meta($post->ID, 'xecuter_wide', true);
    $content = get_post_meta($post->ID, 'xecuter_content', true);
    $main = get_post_meta($post->ID, 'xecuter_main', true);
    $mini = get_post_meta($post->ID, 'xecuter_mini', true);
  	?>
    
	<div class="rd_builder">
		<ul class="rd_builder_list">
	
       	<?php if (!empty($row)) :?>
        <?php foreach($row as $key => $value) :?>  
 
			<?php  if ($value['value']=='1920'){ ?>
            
                <li class="rd_row_item rd_row_1920" rd-data-id="<?php echo esc_attr($key)?>">
					<?php xecuter_row_title($key,$value ); ?>
                	<div class="rd_row_container">
                 		<div class="rd_column rd_column_wide" rd-data-col="1"><ul class="rd_block_list"><?php xecuter_block_panel($wide ,$key,'wide','1')?></ul><a class="rd_add_block"></a></div>
                   	</div>
                </li>
				
			<?php } if ($value['value']=='1200'){ ?>
            
                <li class="rd_row_item rd_row_1200" rd-data-id="<?php echo esc_attr($key)?>">
					<?php xecuter_row_title($key,$value ); ?>
                	<div class="rd_row_container">
                 		<div class="rd_column rd_column_content" rd-data-col="1"><ul class="rd_block_list"><?php xecuter_block_panel($content ,$key,'content','1')?></ul><a class="rd_add_block"></a></div>
                   	</div>
                </li>
                
			<?php } elseif($value['value']=='800_400'){ ?>
            
                <li class="rd_row_item rd_row_800_400" rd-data-id="<?php echo esc_attr($key)?>">
				 	<?php xecuter_row_title($key,$value );?>
               		<div class="rd_row_container">
                 		<div class="rd_column rd_column_main" rd-data-col="1"><ul class="rd_block_list"><?php xecuter_block_panel($main ,$key,'main','1');?></ul><a class="rd_add_block" ></a></div>
                 		<div class="rd_column rd_column_mini" rd-data-col="2"><ul class="rd_block_list"><?php xecuter_block_panel($mini ,$key,'mini','2');?></ul><a class="rd_add_block" ></a></div>
					</div>
				</li>
                                
			<?php } elseif($value['value']=='400_800'){ ?>
            
                <li class="rd_row_item rd_row_400_800" rd-data-id="<?php echo esc_attr($key)?>">
				 	<?php xecuter_row_title($key,$value );?>
               		<div class="rd_row_container">
                  		<div class="rd_column rd_column_mini" rd-data-col="1"><ul class="rd_block_list"><?php xecuter_block_panel($mini ,$key,'mini','1');?></ul><a class="rd_add_block" ></a></div>
                 		<div class="rd_column rd_column_main" rd-data-col="2"><ul class="rd_block_list"><?php xecuter_block_panel($main ,$key,'main','2');?></ul><a class="rd_add_block" ></a></div>
					</div>
				</li>
                
			<?php }elseif($value['value']=='3c_400'){ ?>
            
                <li class="rd_row_item rd_row_3c_400" rd-data-id="<?php echo esc_attr($key)?>">
				 	<?php xecuter_row_title($key,$value );?>
               		<div class="rd_row_container">
                  		<div class="rd_column rd_column_mini" rd-data-col="1"><ul class="rd_block_list"><?php xecuter_block_panel($mini ,$key,'mini','1');?></ul><a class="rd_add_block" ></a></div>
                  		<div class="rd_column rd_column_mini" rd-data-col="2"><ul class="rd_block_list"><?php xecuter_block_panel($mini ,$key,'mini','2');?></ul><a class="rd_add_block" ></a></div>
                  		<div class="rd_column rd_column_mini" rd-data-col="3"><ul class="rd_block_list"><?php xecuter_block_panel($mini ,$key,'mini','3');?></ul><a class="rd_add_block" ></a></div>

					</div>
				</li>
                
			<?php }
			?>
        
        	<?php endforeach;?>
            <?php endif;?> 
			
        </ul>
		
        <a class="rd_builder_add rd_add_row button" ><i></i><?php echo esc_html__('Add New Row','xecuter')?></a>
		
		<?php
        xecuter_model_row();
		xecuter_model_block('wide');
		xecuter_model_block('content');
		xecuter_model_block('main');
		xecuter_model_block('mini');
   		?>
	</div>
    
	<?php
}

function xecuter_model_row() {?>
    <div class="rd_model rd_model_row">
        <div class="rd_model_middle">
 				<div class="rd_model_title"><?php echo esc_html__('Add New Row','xecuter')?><i class="rd_model_close"></i></div>
                <ul class="rd_model_content">

                    <li class="rd_model_item">
                        <input type="radio" name="rd_model_row" id="rd_model_1920" class="rd_model_item" />
                        <img src="<?php echo get_template_directory_uri()?>/framework/assets/images/1920.jpg" />
                    </li>
                    <li class="rd_model_item">
                        <input type="radio" name="rd_model_row" id="rd_model_1200" class="rd_model_item" />
                        <img src="<?php echo get_template_directory_uri()?>/framework/assets/images/1200.jpg" />
                    </li> 
                    <li class="rd_model_item">
                        <input type="radio" name="rd_model_row" id="rd_model_800_400" class="rd_model_item" />
                        <img src="<?php echo get_template_directory_uri()?>/framework/assets/images/800_400.jpg" />
                    </li>
                     
					<li class="rd_model_item">
                        <input type="radio" name="rd_model_row" id="rd_model_400_800" class="rd_model_item" />
                        <img src="<?php echo get_template_directory_uri()?>/framework/assets/images/400_800.jpg" />
                    </li>
                    
 					<li class="rd_model_item">
                        <input type="radio" name="rd_model_row" id="rd_model_3c_400" class="rd_model_item" />
                        <img src="<?php echo get_template_directory_uri()?>/framework/assets/images/3c_400.jpg" />
                    </li> 
             	</ul>
				<div class="rd_model_bottom">
 					<div class="rd_model_add button-primary"><?php echo esc_html__('Add','xecuter')?></div>
				</div>
  		</div>
 	</div>
  	<?php 
}
function xecuter_model_block($row) {
	global $xecuter_options; $count=0;
	?>
    <div class="rd_model rd_model_block rd_block_<?php echo esc_attr($row);?>">
        <div class="rd_model_middle">
				<div class="rd_model_title"><?php echo esc_html__('Add Box','xecuter');?><i class="rd_model_close"></i></div>
                <ul class="rd_model_content">
               	
					<?php foreach ($xecuter_options as  $value) {
						
							 $array=array();;
							 
							if(!empty($value['title'])){$array[]='"title":true';}
							if(!empty($value['number'])){$array[]='"number":true';} 
							if ( function_exists ( 'reza_slide_post_type' )) {
								if(!empty($value['post_type'])){$array[]='"post_type":true';}
								if(!empty($value['sliders'])){$array[]='"sliders":true';}
							}
							if(!empty($value['multi_cats'])){$array[]='"multi_cats":true';}
							if(!empty($value['cats'])){$array[]='"cats":true';}
							if(!empty($value['orderby'])){$array[]='"orderby":true';}
							if(!empty($value['tabs'])){$array[]='"tabs":true';}
							if(!empty($value['size1'])){$array[]='"size1":true';}
							if(!empty($value['size2'])){$array[]='"size2":true';}
							if(!empty($value['height'])){$array[]='"height":true';}
							if(!empty($value['height_content'])){$array[]='"height_content":true';}
							if(!empty($value['ratio1'])){$array[]='"ratio1":true';}
							if(!empty($value['ratio2'])){$array[]='"ratio2":true';}
							if(!empty($value['ratio3'])){$array[]='"ratio3":true';}
							if(!empty($value['ratio4'])){$array[]='"ratio4":true';}
							if(!empty($value['space'])){$array[]='"space":true';}
							if(!empty($value['post_title'])){$array[]='"post_title":true';}
							if(!empty($value['excerpt'])){$array[]='"excerpt":true';}
							if(!empty($value['title_limit'])){$array[]='"title_limit":true';}
							if(!empty($value['excerpt_limit'])){$array[]='"excerpt_limit":true';}
							if(!empty($value['meta_category'])){$array[]='"meta_category":true';}
							if(!empty($value['meta'])){$array[]='"meta":true';}
							if(!empty($value['text_center'])){$array[]='"text_center":true';}
							if(!empty($value['details_middle'])){$array[]='"details_middle":true';}
							if(!empty($value['load_more'])){$array[]='"load_more":true';}
							if(!empty($value['newwindow'])){$array[]='"newwindow":true';}
							if(!empty($value['nofollow'])){$array[]='"nofollow":true';}
							if(!empty($value['image'])){$array[]='"image":true';}
							if(!empty($value['ads_url'])){$array[]='"ads_url":true';}
							if(!empty($value['resize'])){$array[]='"resize":true';}
							if(!empty($value['textarea'])){$array[]='"textarea":true';}
							if(!empty($value['effect'])){$array[]='"effect":true';}
							if(!empty($value['speed'])){$array[]='"speed":true';}
							if(!empty($value['pause'])){$array[]='"pause":true';}
							if(!empty($value['background_thumb'])){$array[]='"background_thumb":true';}
							if(!empty($value['sidebar'])){$array[]='"sidebar":true';}
							
							$options = implode(',',$array); 						
						 ?>
					<?php if($value['row'] == $row){ $count++;?>
                     	<li class="rd_model_item" data-row="<?php echo esc_attr($value['row']);?>" data-id="<?php echo esc_attr($value['id']);?>" data-blocks='{<?php echo esc_attr($options);?>}'  >
                         	<img src="<?php echo get_template_directory_uri()?>/framework/assets/images/<?php echo esc_attr($value['row']); ?>/<?php echo esc_attr($value['id']); ?>.jpg" />
                        		<?php if(!empty($value['name'])){?><span><?php echo esc_html($value['name']) ?></span><?php }?>
                    	</li>
						<?php if($count==5){ $count=0;?>
                            <div class="rd-row-5c"></div>
                        <?php }?>
					<?php } ?>
					<?php } ?>
                    
 				</ul>
				<div class="rd_model_bottom">
 					<div class="rd_model_add button-primary"><?php echo esc_html__('Add','xecuter');?></div>
				</div>
 		</div>
 	</div>
  	<?php
}
 
function xecuter_row_title($key,$value ) {?> 
	<input type="hidden" name="xecuter_row[<?php echo esc_attr($key); ?>][value]" value="<?php echo esc_attr($value['value']); ?>"> 
    	<div class="rd_row_title"><a class="rd_row_remove"></a><a class="rd_row_options"></a>
        <div class="rd_options">
            <div class="rd_options_middle">
				<div class="rd_options_title">
					<?php echo esc_html__('Options','xecuter')?>
                    <div class="rd_options_add button-primary"><?php echo esc_html__('Done','xecuter');?></div>
				</div>
                     <ul class="rd_options_content">
                     	<?php if($value['value']=='800_400' || $value['value']=='400_800'){?>
                        	<?php xecuter_block_options('row',$key,$value,__('Sticky Sidebar','xecuter'),'sticky_sidebar','checkbox');?>
						<?php }?>
                        <?php xecuter_block_options('row',$key,$value,__('Backround Image','xecuter'),'background_image','upload');?>
                        <?php xecuter_block_options('row',$key,$value,__('Backround Color','xecuter'),'background_color','color_rgba');?>
 
                         <?php xecuter_block_options('row',$key,$value,__('Link Color','xecuter'),'link_color','color');?>
                        <?php xecuter_block_options('row',$key,$value,__('Text Color','xecuter'),'text_color','color');?>
                        <?php xecuter_block_options('row',$key,$value,__('Meta Color','xecuter'),'meta_color','color');?>
 
                        <?php xecuter_block_options('row',$key,$value,__('Space Top','xecuter'),'padding_top','checkbox');?>
                        <?php xecuter_block_options('row',$key,$value,__('Space Bottom','xecuter'),'padding_bottom','checkbox');?>
                     </ul>
 
               </div>
        </div>
        </div>
<?php }

 function xecuter_sidebar_panel($key,$value,$col ) {?> 
	<a class="rd_sidebar_options" ></a>
	<div class="rd_options">
		<div class="rd_options_middle">
			<div class="rd_options_warp">
				<div class="rd_options_title"><?php echo esc_html__('Options','xecuter')?></div>
				<ul class="rd_options_content">
					<?php xecuter_block_options('row',$key,$value,esc_html__('Select a Sidebar','xecuter'),'sidebar-'.esc_attr($col),'select',xecuter_array_options('sidebar'));?>
					<?php xecuter_block_options('row',$key,$value,esc_html__('Sticky Sidebar','xecuter'),'sticky-sidebar-'.esc_attr($col),'checkbox');?>
 				</ul>
                 <div class="rd_options_bottom">
					<div class="rd_options_add button-primary"><?php echo esc_html__('Done','xecuter');?></div>
				</div>
			</div>
		</div>
	</div>
 <?php }

function builder_meta_save($post_id) {
    if (!isset($_POST['xecuter_builder_meta_nonce']) || !wp_verify_nonce($_POST['xecuter_builder_meta_nonce'], basename(__FILE__))) return;

    if (!current_user_can('edit_post', $post_id)) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

if (defined('DOING_AJAX') ) {
	return $post_id;
    }
    if(isset($_POST['xecuter_row'])) {
      update_post_meta($post_id, 'xecuter_row', $_POST['xecuter_row']);
    } else {
      delete_post_meta($post_id, 'xecuter_row');
    }
 
	
	if(isset($_POST['xecuter_wide'])) {
      update_post_meta($post_id, 'xecuter_wide', $_POST['xecuter_wide']);
    } else {
      delete_post_meta($post_id, 'xecuter_wide');
    }
	
	if(isset($_POST['xecuter_content'])) {
      update_post_meta($post_id, 'xecuter_content', $_POST['xecuter_content']);
    } else {
      delete_post_meta($post_id, 'xecuter_content');
    }
	
	if(isset($_POST['xecuter_main'])) {
      update_post_meta($post_id, 'xecuter_main', $_POST['xecuter_main']);
    } else {
      delete_post_meta($post_id, 'xecuter_main');
    }
	
	if(isset($_POST['xecuter_mini'])) {
      update_post_meta($post_id, 'xecuter_mini', $_POST['xecuter_mini']);
    } else {
      delete_post_meta($post_id, 'xecuter_mini');
    }			
  
	
}
add_action('save_post', 'builder_meta_save');

?>