<?php
function xecuter_block_panel($row_qurey,$id,$row,$col=false) { 
	global $xecuter_options;
	if (!empty($row_qurey)) : 
	foreach ($row_qurey as $key => $value) :
		if( $id ==  $value['order'] && $col == $value['col']){;
  		?>
	<section class="rd_block_item" >
		<input type="hidden" name="xecuter_<?php echo esc_attr($row);?>[<?php echo esc_attr($key); ?>][value]" value="<?php echo esc_attr($value['value']); ?>"> 
		<input type="hidden" name="xecuter_<?php echo esc_attr($row);?>[<?php echo esc_attr($key); ?>][order]" value="<?php echo esc_attr($value['order']); ?>"> 
 		<input type="hidden" name="xecuter_<?php echo esc_attr($row);?>[<?php echo esc_attr($key); ?>][col]" value="<?php echo esc_attr($value['col']); ?>"> 
 		<img src="<?php echo get_template_directory_uri()?>/framework/assets/images/<?php echo esc_attr($row); ?>/<?php echo esc_attr($value['value']); ?>.jpg" />
        <span class="rd_block_title"><?php if(!empty($value['title'])) echo esc_attr($value['title']); ?></span>
		<a class="rd_block_remove"></a>                        
		<a class="rd_block_options" ></a>                        
			<div class="rd_options">
				<div class="rd_options_middle"> 
						<div class="rd_options_title"><?php echo esc_html__('Options','xecuter')?> <div class="rd_options_add button-primary"><?php echo esc_html__('Done','xecuter');?></div></div>
                		<ul class="rd_options_content">
                        	<?php 
							foreach ($xecuter_options as  $options) {
  								if($options['row'] == $row && $options['id'] == $value['value']){
								
									
									if( !empty($options['title'])){
										xecuter_block_options($row,$key,$value,esc_html__('Title box','xecuter'),'title','text');
									}
									
 									
									if( !empty($options['number'])){
										xecuter_block_options($row,$key,$value,esc_html__('Number of Posts to show','xecuter'),'number','number');
									} 
									
								   	if ( function_exists ( 'reza_slide_post_type' )) {
										if( !empty($options['post_type'])){
											xecuter_block_options($row,$key,$value,esc_html__('Post type','xecuter'),'post_type','select',xecuter_array_options('post_type'));
										}
										if( !empty($options['sliders'])){
										xecuter_block_options($row,$key,$value,esc_html__('Slider','xecuter'),'sliders','select',xecuter_array_options('sliders'));
										}
									}
									
									if( !empty($options['multi_cats'])){
										xecuter_block_options($row,$key,$value,esc_html__('Category','xecuter'),'multi_cats','multicheck',xecuter_array_options('cats'));
									}
									
									if( !empty($options['cats'])){
										xecuter_block_options($row,$key,$value,esc_html__('Category','xecuter'),'cats','select',xecuter_array_options('cats'));
									}

									if( !empty($options['orderby'])){
										xecuter_block_options($row,$key,$value,esc_html__('Order by','xecuter'),'orderby','select',xecuter_array_options('orderby'));
									} 
									 
									if( !empty($options['tabs'])){
										xecuter_block_options($row,$key,$value,esc_html__('Tabs','xecuter'),'tabs','tabs');
									} 
																		 										
									if( !empty($options['size1'])){
										xecuter_block_options($row,$key,$value,esc_html__('Image Size','xecuter'),'size','select',xecuter_array_options('size1'));
									}
									if( !empty($options['size2'])){
										xecuter_block_options($row,$key,$value,esc_html__('Image Size','xecuter'),'size','select',xecuter_array_options('size2'));
									}
 																	
									if( !empty($options['height'])){
										xecuter_block_options($row,$key,$value,esc_html__('Height','xecuter'),'height','select',xecuter_array_options('height'));
									}
																		
									if( !empty($options['height_content'])){
										xecuter_block_options($row,$key,$value,esc_html__('Height','xecuter'),'height','select',xecuter_array_options('height_content'));
									}
									
									if( !empty($options['ratio1'])){
										xecuter_block_options($row,$key,$value,esc_html__('Image Ratio','xecuter'),'ratio','select',xecuter_array_options('ratio1'));
										
									}elseif( !empty($options['ratio2'])){
										xecuter_block_options($row,$key,$value,esc_html__('Image Ratio','xecuter'),'ratio','select',xecuter_array_options('ratio2'));
										
									}elseif( !empty($options['ratio3'])){
										xecuter_block_options($row,$key,$value,esc_html__('Image Ratio','xecuter'),'ratio','select',xecuter_array_options('ratio3'));
										
									}elseif( !empty($options['ratio4'])){
										xecuter_block_options($row,$key,$value,esc_html__('Image Ratio','xecuter'),'ratio','select',xecuter_array_options('ratio4'));
									}	
									
									if( !empty($options['space'])){
										xecuter_block_options($row,$key,$value,esc_html__('Space in Between Posts','xecuter'),'space','checkbox');
									}										
									
									
									if( !empty($options['post_title'])){
										xecuter_block_options($row,$key,$value,esc_html__('Show Title Posts','xecuter'),'post_title','checkbox');
									} 
																																				 									
									if( !empty($options['excerpt'])){
										xecuter_block_options($row,$key,$value,esc_html__('Show Excerpt Posts','xecuter'),'excerpt','checkbox');
									}	

									if( !empty($options['title_limit'])){
										xecuter_block_options($row,$key,$value,esc_html__('Limit Title length','xecuter'),'title_limit','number');
									}  
									
									
									if( !empty($options['excerpt_limit'])){
										xecuter_block_options($row,$key,$value,esc_html__('Limit Excerpt length','xecuter'),'excerpt_limit','number');
									}  
 									 
									if( !empty($options['meta_category'])){
										xecuter_block_options($row,$key,$value,esc_html__('Category Meta','xecuter'),'meta_category','checkbox');
									}
									 
									if( !empty($options['meta'])){
 										xecuter_block_options($row,$key,$value,esc_html__('Post Meta','xecuter'),'meta','meta_start');
										xecuter_block_options($row,$key,$value,esc_html__('Comments','xecuter'),'meta_comments','metabox');	
  										xecuter_block_options($row,$key,$value,esc_html__('Views','xecuter'),'meta_view','metabox');
  										xecuter_block_options($row,$key,$value,esc_html__('Date','xecuter'),'meta_date','metabox');
  										xecuter_block_options($row,$key,$value,esc_html__('Author','xecuter'),'meta_author','metabox');
 										xecuter_block_options($row,$key,$value,esc_html__('Review Stars','xecuter'),'meta_review','metabox');
 										xecuter_block_options($row,$key,$value,esc_html__('Post','xecuter'),'meta','meta_end');
    								}
 									
									if( !empty($options['text_center'])){
										xecuter_block_options($row,$key,$value,esc_html__('Text in center','xecuter'),'text_center','checkbox');
									} 
																		
									if( !empty($options['details_middle'])){
										xecuter_block_options($row,$key,$value,esc_html__('Details in Vertical align middle','xecuter'),'details_middle','checkbox');
									} 									
									
									if( !empty($options['load_more'])){
										xecuter_block_options($row,$key,$value,esc_html__('Show Load more','xecuter'),'load_more','checkbox');
									}
									if( !empty($options['newwindow'])){
										xecuter_block_options($row,$key,$value,esc_html__('Open in New Window','xecuter'),'newwindow','checkbox');
									}
									
									if( !empty($options['nofollow'])){
										xecuter_block_options($row,$key,$value,esc_html__('Nofollow','xecuter'),'nofollow','checkbox');
									}
									if( !empty($options['image'])){
										xecuter_block_options($row,$key,$value,esc_html__('Upload Image','xecuter'),'image','upload');
									}									
									if( !empty($options['ads_url'])){
										xecuter_block_options($row,$key,$value,esc_html__('Ads link','xecuter'),'ads_url','text');
									}
																		
									if( !empty($options['resize'])){
										xecuter_block_options($row,$key,$value,esc_html__('Full Size Image','xecuter'),'resize','checkbox');
									}
									
									if( !empty($options['textarea'])){
										xecuter_block_options($row,$key,$value,esc_html__('Code','xecuter'),'textarea','textarea');
									}	
									
									if( !empty($options['effect'])){
										xecuter_block_options($row,$key,$value,esc_html__('Slider Effect','xecuter'),'effect','select',xecuter_array_options('effect'));
									}  
									
									if( !empty($options['speed'])){
										xecuter_block_options($row,$key,$value,esc_html__('Animation Speed','xecuter'),'speed','number');
									}  
									
									if( !empty($options['pause'])){
										xecuter_block_options($row,$key,$value,esc_html__('Animation Pause Time','xecuter'),'pause','number');
									}
									
									
									if( !empty($options['background_thumb'])){
										xecuter_block_options($row,$key,$value,esc_html__('Background Thumb','xecuter'),'background_thumb','select',xecuter_array_options('background_thumb'));
									}  
									
									if( !empty($options['sidebar'])){
										xecuter_block_options($row,$key,$value,esc_html__('Select a Sidebar','xecuter'),'sidebar','select',xecuter_array_options('sidebar'));
									}  								 
								} 	
							};?> 
						</ul>
                
				 
				</div>
			</div>

	</section>
                
	<?php  
	
	}endforeach; endif;
 }
function xecuter_block_options($row,$key,$value,$label,$id,$type, $options = false) { 
	
	$value_id = isset( $value[$id] ) ? $value[$id] : null;
	$value_id = isset( $value[$id] ) ? $value[$id] : null;
	
	$data='xecuter_'.$row.'['.$key.']['.$id.']';
	if ( 1 == $value_id ){
	$checked= 'checked="checked"'; 
	} else{
		$checked='';
	}
 
 
  	if ( $type == 'metabox'){}
	elseif( $type == 'meta_end' ){}
	else{
		 echo'<li class="rd_options_item rd_'.esc_attr($id).' rd_options_'.$type.'">';
		echo '<div class="rd_options_name"><label for="'.esc_attr($data).'">'. esc_html($label).'</label></div>';
	 
		if( $type == 'tabs' ) {
			echo '<a class="rd_add_tab button">'.esc_html__('Add Tab','xecuter').'</a>';
		}	
		echo '<div class="rd_options_setting">';
  	}
	if( $type == 'meta_start'){
		echo '<ul class="rd-multicheckbox" >';
	}

	switch( $type ) {
	// Title
	case 'text':
		echo '<input type="text" name="'.esc_attr($data).'" id="'.esc_attr($data).'" value="'.esc_attr($value_id).'">';
 	break;
	
	case 'color_rgba':
		echo '<input  class="cs-wp-color-picker rd-color"  data-rgba="true" type="text" name="'.esc_attr($data).'" id="'.esc_attr($data).'" value="'.esc_attr($value_id).'">';
 	break;
	
	case 'color':
		echo '<input  class="cs-wp-color-picker rd-color"  data-rgba="false" type="text" name="'.esc_attr($data).'" id="'.esc_attr($data).'" value="'.esc_attr($value_id).'">';
 	break;
		
	case 'textarea':
		echo '<textarea name="'.esc_attr($data).'" id="'.esc_attr($data).'" >'.esc_textarea($value_id).'</textarea>';
 	break;
		
	case 'number':
		echo '<input type="text" name="'.esc_attr($data).'" id="'.esc_attr($data).'" value="'.esc_attr($value_id).'" style=" width:70px;">';
	break;
	case 'checkbox':
		echo '<div class="rd_checkbox rd_checkbox_primary">';
		echo '<input type="checkbox"  name="'.esc_attr($data).'" id="'.esc_attr($data).'" '.$checked.'   value="1">';
		echo '<label for="'.esc_attr($data).'"></label>';
		echo '</div>';
	break;
	
 
	// Categories
	case 'select': 
 
		echo '<select name="'.esc_attr($data).'" id="'.esc_attr($data).'" >';
 			foreach ($options as  $keys => $text) { 	
 				echo'<option id="rd_'.esc_attr($id).'_'.esc_attr($keys).'" value="'.esc_attr($keys).'"'.selected( $value_id, $keys).'>'.esc_html($text).'</option>'; 
			}
		echo '</select>';
	break;	
	
	case 'metabox':
		echo '<li>';
			echo '<div class="rd_checkbox rd_checkbox_primary">';
				echo '<input type="checkbox"  name="'.esc_attr($data).'" id="'.esc_attr($data).'" '.$checked.'  value="1" />';
				echo '<label for="'.esc_attr($data).'"></label>';
			echo '</div>';
			echo '<label for="'.esc_attr($data).'" >'. esc_html($label).'</label>'; 
		echo '</li>';
  	break;	
	
	
	case 'tabs':
 
		$value['tabs'] =array();
		if(!empty($value_id)){
        foreach($value_id as $tkey => $val) :
			echo '<div class="rd_tab_item">';
				echo '<div class="rd_tab_option"><input type="text" placeholder="'.esc_html__('title','xecuter'),'"name="'.esc_attr($data).'['.esc_attr($tkey).'][title]" id="'.esc_attr($data).'['.esc_attr($tkey).'][title]" " value="'.esc_attr($val['title']).'"></div>';
				
				echo '<div class="rd_tab_option"><select name="'.esc_attr($data).'['.esc_attr($tkey).'][cats]" id="'.esc_attr($data).'['.esc_attr($tkey).'][cats]" >';
				
				$cats=xecuter_array_options('cats');
					foreach ($cats as  $keys => $text) { 	
						echo'<option  value="'.esc_attr($keys).'"'.selected( $val['cats'], $keys).'>'.esc_html($text).'</option>'; 
					}		
				echo '</select></div>';
				
				echo '<div class="rd_tab_option"><select name="'.esc_attr($data).'['.esc_attr($tkey).'][orderby]" id="'.esc_attr($data).'['.esc_attr($tkey).'][orderby]" >';
				
				$orderby= xecuter_array_options('orderby');
					foreach ($orderby as  $keys => $text) {
						echo'<option   value="'.esc_attr($keys).'"'.selected($val['orderby'] , $keys).'>'.esc_html($text).'</option>'; 
					}		
				echo '</select></div>';
				
				echo '<a class="rd_remove_tab"></a>';		
			echo '</div>';
			endforeach;
		}
 	break;	
case 'multicheck':
    	echo '<div class="rd_dropdown">';
			echo '<dt>'; 
				echo '<a href="#">'; 
					if(!empty($value_id)){$display="display:none";}else{$display='';}
					echo '<span class="rd_hida" style="'.$display.'">'.esc_html__('Select','xecuter').'</span>'; 
					 
					echo '<p class="rd_multiSel">';
					foreach ($options as  $keys => $text) { 
						$value_ids = isset( $value_id[$keys] ) ?  $value_id[$keys] : null;
	
						if(1== $value_ids){
						echo '<span rd-id="'.$keys.'">'.esc_html($text).',</span>';
						}
					}
					echo '</p>'; 
				echo '</a>'; 
			echo '</dt>'; 
			echo '<dd>'; 
				echo '<div class="rd_mutliSelect">';
 				echo '<ul>'; 
					foreach ($options as  $keys => $text) {  
					
						$value_ids = isset( $value_id[$keys] ) ?  $value_id[$keys] : null;

	 				if (1==$value_ids ){
						$checkedmeta= 'checked="checked"'; 
					} else{
						$checkedmeta='';
					}
					echo'<li><input type="checkbox"  name="'.esc_attr($data).'['.$keys.']" id="'.esc_attr($data).'['.$keys.']" '.$checkedmeta.'  value="1" /><label for="'.esc_attr($data).'['.$keys.']" rd-id="'.$keys.'">'. esc_html($text).'</label></li>'; 
						
						}  
				echo'</ul>';
				echo'</div>';
		echo'</dd>';
		echo'</div>'; 
	break;
	
	// Background Image
	case 'upload': 
	  	echo'<a class="rd_upload_image button button-small"  >'.esc_html__('Upload','xecuter').'</a>';
 		echo '<input type="hidden" name="'.esc_attr($data).'" id="'.esc_attr($data).'" value="'.esc_url($value_id).'">';
 		
		if(!empty($value_id)){ 
 	  		echo '<a class="rd_remove_image button button-small"  >'.esc_html__('Remove','xecuter').'</a>';
 			echo '<img src="'.esc_url($value_id).'"/>';
		}
	 
	
	}
	
 
 	if ( $type == 'meta_end'  ){
			echo'</ul>';				 
	}
 	if ( $type == 'metabox'){}
	elseif ($type == 'meta_start'){}
	else{
	 echo '</div>';
	echo '</li>';
	}

}
 
 
function xecuter_array_options($value) {
	$sidebar_options = array();
	$sidebar_options_obj = get_option('xecuter_boxes');
	$sidebar_options['xecuter_main_sidebar'] = esc_html__('Primery Sidebar','xecuter') ;
 	if(!empty($sidebar_options_obj)){
		foreach ($sidebar_options_obj as $side) {
			$sidebar_options['xecuter_'.sanitize_title($side)] = $side;
		}
	}
	
	$options['post_type']= array(
		'posts'				=>	__('Posts','xecuter'),
 		'slides'			=>	__('Custom Slides','xecuter'),
	);	 
	 
	$options_sliders = array();
	$options_sliders_obj = get_categories('taxonomy=reza_sliders&type=reza_slides&hide_empty=0'); 
 	foreach ($options_sliders_obj as $slider) {
    	$options_sliders[$slider->cat_ID] = $slider->cat_name;
	}	 
	 
	$options['sliders'] = $options_sliders;
	  
 	$options['sidebar']= $sidebar_options;  
	$options_categories = array();
	$options_categories_obj = get_categories('hide_empty=0');
 	$options_categories['']=esc_html__('All Categories','xecuter');
	 	 
 	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	$options['cats']= $options_categories;
 
 	$options['size1']= array(
 		'rd-img-medium'				=>	esc_html__('Medium','xecuter'), 
		'rd-img-large'				=>	esc_html__('Large','xecuter'), 
		
	);
 
 
 	$options['size2']= array(
		'rd-img-small'				=>	esc_html__('Small','xecuter'),
		'rd-img-medium'				=>	esc_html__('Medium','xecuter'), 
		'rd-img-large'				=>	esc_html__('Large','xecuter'), 
		
	);		
	
 
 	$options['height']= array(
		'rd-400px'				=>	'400px',
		'rd-500px'				=>	'500px', 
		'rd-600px'				=>	'600px',
		'rd-700px'				=>	'700px',
		'rd-800px'				=>	'800px',
		
	);
		
 
 	$options['height_content']= array(
		'rd-300px'				=>	'300px',
		'rd-400px'				=>	'400px',
		'rd-500px'				=>	'500px', 
		'rd-600px'				=>	'600px',
		
	);	
 
	$options['orderby']= array(
		''							=>	esc_html__('Recent Posts','xecuter'),
		'rand'						=>	esc_html__('Randam','xecuter'),
		'rand-day'					=>	esc_html__('Randam - 1 day ago','xecuter'),
		'rand-week'					=>	esc_html__('Randam - 1 week ago','xecuter'),
		'rand-month'				=>	esc_html__('Randam - 1 month ago','xecuter'),
		'rand-year'					=>	esc_html__('Randam - 1 year ago','xecuter'),
		'most-comment'				=>	esc_html__('Most Comments ','xecuter'),
		'most-comment-day'			=>	esc_html__('Most Comments 1 day ago','xecuter'),
		'most-comment-week'			=>	esc_html__('Most Comments 1 week ago','xecuter'),
		'most-comment-month'		=>	esc_html__('Most Comments 1 month ago','xecuter'),
		'most-comment-year'			=>	esc_html__('Most Comments 1 year ago','xecuter'),		
		'views'						=>	esc_html__('Most Views','xecuter'),
		'views-day'					=>	esc_html__('Most Views - 1 day ago','xecuter'),
		'views-week'				=>	esc_html__('Most Views - 1 week ago','xecuter'),
		'views-month'				=>	esc_html__('Most Views - 1 month ago','xecuter'),
		'views-year'				=>	esc_html__('Most Views - 1 year ago','xecuter'),
 		'best-reviews'				=>	esc_html__('Best Reviews','xecuter'),
 		'best-reviews-day'			=>	esc_html__('Best Reviews 1 day ago','xecuter'),
 		'best-reviews-week'			=>	esc_html__('Best Reviews 1 week ago','xecuter'),
 		'best-reviews-month'		=>	esc_html__('Best Reviews 1 month ago','xecuter'),
 		'best-reviews-year'			=>	esc_html__('Best Reviews 1 year ago','xecuter'),
	); 

	$options['meta']= array(
		'comments'				=>	esc_html__('Comments','xecuter'), 
  		'view'					=>	esc_html__('Views','xecuter'),
 		'date'					=>	esc_html__('Date','xecuter'), 
  		'author'				=>	esc_html__('Author','xecuter'), 
		'review'				=>	esc_html__('Review Stars','xecuter'),
		
	); 
	$options['ratio1']= array(
		'rd-ratio40f'				=>	esc_html__('5/2','xecuter'),
		'rd-ratio60f'				=>	esc_html__('16/9','xecuter')  
		
	);
	
	$options['ratio2']= array(
		'rd-ratio60'				=>	esc_html__('16/9','xecuter'),
		'rd-ratio75'				=>	esc_html__('4/3','xecuter')  
		
	);
	
 	
	
	$options['ratio3']= array(
		'rd-ratio60'				=>	esc_html__('16/9','xecuter'),
		'rd-ratio75'				=>	esc_html__('4/3','xecuter'), 
		'rd-ratio100'				=>	esc_html__('1/1','xecuter') , 
		
		
	);

	$options['ratio4']= array(
 		'rd-ratio60'				=>	esc_html__('16/9','xecuter'),
		'rd-ratio75'				=>	esc_html__('4/3','xecuter'), 
		'rd-ratio100'				=>	esc_html__('1/1','xecuter') ,
		'rd-ratio135'				=>	esc_html__('3/5','xecuter') ,
 	);
			
	
	$options['effect']= array(
		'slide'					=>	esc_html__('Slide','xecuter'),
		'fade'					=>	esc_html__('Fade','xecuter'), 
	); 
 	$options['background_thumb']= array(
		'none'					=>	esc_html__('None','xecuter'),
		'light'					=>	esc_html__('Light','xecuter'), 
		'dark'					=>	esc_html__('Dark','xecuter'), 
	);
	
  	return $options[$value];
}	 