<?php

add_action( 'add_meta_boxes', 'xecuter_custom_meta_box' );

function xecuter_custom_meta_box($post){
    add_meta_box('xecuter_meta_box',esc_html__('General Options','xecuter'), 'xecuter_post_metabox', 'post', 'normal' , 'high');
    add_meta_box('xecuter_review_metabox',esc_html__('Review','xecuter'), 'xecuter_review_metabox', 'post', 'normal' , 'high');
    add_meta_box('xecuter_video_metabox',esc_html__('Video','xecuter'), 'xecuter_video_metabox', 'post', 'normal' , 'high');
    add_meta_box('xecuter_page_metabox',esc_html__('General Options','xecuter'), 'xecuter_page_metabox', 'page', 'normal' , 'high');
}
function xecuter_meta_box_enqueue($hook) {
	wp_register_script('xecuter_meta_box', get_template_directory_uri() . '/framework/assets/js/scripts.js', array('jquery', 'jquery-ui-sortable') ,'1.0', true );
	wp_enqueue_style('xecuter_meta_box', get_template_directory_uri() . '/framework/assets/css/meta_box.css');
    	wp_enqueue_script( 'xecuter_meta_box' );
}

add_action('admin_enqueue_scripts', 'xecuter_meta_box_enqueue');

 
//General Options 
function xecuter_post_metabox($post){
	global $post;
	$custom = get_post_custom($post->ID);
	$xecuter_sidebar  = get_option('xecuter_boxes');
	$xecuter_ratio  = xecuter_array_options('ratio4');
  	 
	$featured_image_meta = get_post_meta($post->ID, 'xecuter_featured_image_meta', true);
    $single_template = get_post_meta($post->ID, 'xecuter_single_template', true);
    $single_sidebar = get_post_meta($post->ID, 'xecuter_single_sidebar', true);
    $ratio = get_post_meta($post->ID, 'xecuter_single_ratio', true);
   	$full_width_value = get_post_meta($post->ID, 'xecuter_full_width', true);
  	$full_width_value = get_post_meta($post->ID, 'xecuter_full_width', true);
    if($full_width_value == "yes"){ $full_width_checked = 'checked="checked"';}else{$full_width_checked='';} 
    $hide_post_tags = get_post_meta($post->ID, 'xecuter_hide_post_tags', true); 
    $hide_post_meta = get_post_meta($post->ID, 'xecuter_hide_post_meta', true);
    $hide_post_share = get_post_meta($post->ID, 'xecuter_hide_post_share', true);
	$hide_nextperv_post = get_post_meta($post->ID, 'xecuter_hide_nextperv_post', true);
    $hide_author_box = get_post_meta($post->ID, 'xecuter_hide_author_box', true);
    $hide_related_post = get_post_meta($post->ID, 'xecuter_hide_related_post', true);
    $hide_banner_below = get_post_meta($post->ID, 'xecuter_hide_banner_below', true);
    $hide_comments = get_post_meta($post->ID, 'xecuter_hide_comments', true);
    $primary_color = get_post_meta($post->ID, 'xecuter_primary_color', true);
    $body_background_color = get_post_meta($post->ID, 'xecuter_body_background_color', true);
    $body_background_type = get_post_meta($post->ID, 'xecuter_body_background_type', true);
    $body_background_image = get_post_meta($post->ID, 'xecuter_body_background_image', true);
    $body_background_image_medium = get_post_meta($post->ID, 'xecuter_body_background_image_medium', true);
    $body_background_pattern = get_post_meta($post->ID, 'xecuter_body_background_pattern', true);
	
	  
  	?>
	 
	<table class="form-table meta_box">     
		<tbody>
        	
            <tr class="meta_xecuter_featured_image_meta">
                <th style="width:20%"><label for="xecuter_featured_image_meta"><?php echo esc_html__('Featured Image Meta','xecuter');?></label></th>
                <td>
                    <select name="xecuter_featured_image_meta" id="xecuter_featured_image_meta">
                      <option value="" <?php selected( $featured_image_meta, '' ); ?>><?php echo esc_html__('None','xecuter');?></option>
                      <option value="video" <?php selected( $featured_image_meta, 'video' ); ?>><?php echo esc_html__('Video','xecuter');?></option>
                      <option value="review" <?php selected( $featured_image_meta, 'review' ); ?>><?php echo esc_html__('Circular Review','xecuter');?></option>
                    </select>
                </td>
            </tr>
            <tr rd-parant="" class="meta_xecuter_single_template">
				<th style="width:20%"><label for="xecuter_single_template"><?php echo esc_html__('Single template','xecuter');?></label></th>
				<td>
                        <li class="xecuter_single_template-default">
                            <input style="display:none;" name="xecuter_single_template" id="xecuter_single_template-default"  value="default" type="radio" <?php checked( $single_template, 'default' );?>>
                            <a><img src="<?php echo get_template_directory_uri();?>/framework/assets/images/single/default.jpg"></a>
                         </li>
                         <li class="xecuter_single_template-1">
                            <input style="display:none;" name="xecuter_single_template" id="xecuter_single_template-1" value="1" type="radio" <?php checked( $single_template, '1' );?>>
                            <a><img src="<?php echo get_template_directory_uri();?>/framework/assets/images/single/single-template-1.jpg"></a>
                         </li>
                         <li class="xecuter_single_template-2">
                            <input style="display:none;" name="xecuter_single_template" id="xecuter_single_template-2" value="2" type="radio" <?php checked( $single_template, '2' );?>>
                            <a><img src="<?php echo get_template_directory_uri();?>/framework/assets/images/single/single-template-2.jpg"></a>
                        </li>
                        <li class="xecuter_single_template-3"><input style="display:none;" name="xecuter_single_template" id="xecuter_single_template-3" value="3" type="radio" <?php checked( $single_template, '3' );?>>
                            <a><img src="<?php echo get_template_directory_uri();?>/framework/assets/images/single/single-template-3.jpg"></a>
                        </li>
                        <li class="xecuter_single_template-4" ><input style="display:none;" name="xecuter_single_template" id="xecuter_single_template-4" value="4" type="radio" <?php checked( $single_template, '4' );?>>
                        	<a><img src="<?php echo get_template_directory_uri();?>/framework/assets/images/single/single-template-4.jpg"></a>
                  		</li>
                </td>
            </tr>

            <tr class="meta_xecuter_single_ratio">
                <th style="width:20%"><label for="xecuter_single_ratio"><?php echo esc_html__('Custom Image Ratio','xecuter');?></label></th>
                <td>
					<select name="xecuter_single_ratio" id="xecuter_single_ratio">
                    	<option value="" <?php selected( $ratio, '' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                        	<?php foreach ($xecuter_ratio as $key => $ratio_img){  ?>
                    			<option value="<?php echo esc_attr($key) ?>" <?php  if ( $ratio  == $key ){ echo 'selected=""';} ?>><?php echo esc_html($ratio_img);?></option> 
							<?php }?>                      
                    </select>
                    
                </td>
            </tr> 
        	
            <tr class="meta_xecuter_single_sidebar">
                <th style="width:20%"><label for="xecuter_single_sidebar"><?php echo esc_html__('Custom Sidebar','xecuter');?></label></th>
                <td>
					<select name="xecuter_single_sidebar" id="xecuter_single_sidebar">
                    	<option value="" <?php selected( $single_sidebar, '' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                    	<option value="xecuter_main_sidebar" <?php selected( $single_sidebar, 'xecuter_main_sidebar' ); ?>><?php echo esc_html__('Primery Sidebar','xecuter');?></option>
                       	<?php foreach ($xecuter_sidebar as $side){  ?>
                    			<option value="<?php echo 'xecuter_'.esc_attr($side) ?>" <?php  if ( $single_sidebar  == 'xecuter_'.$side ){ echo 'selected=""';} ?>><?php echo esc_html($side);?></option> 
							<?php }?>                      
                    </select>
                    
                </td>
            </tr> 
            
            <tr class="meta_xecuter_full_width">
                <th style="width:20%"><label for="xecuter_full_width"><?php echo esc_html__('Full Width Post','xecuter');?></label></th>
                <td>
    				<input type="checkbox" name="xecuter_full_width"  id="xecuter_full_width" value="yes" <?php echo wp_kses_post($full_width_checked); ?> />
                </td>
            </tr>            
                      	
            <tr class="meta_xecuter_hide_post_tags">
                <th style="width:20%"><label for="xecuter_hide_post_tags"><?php echo esc_html__('Hide Post Tags','xecuter');?></label></th>
                <td>
                    <select name="xecuter_hide_post_tags" id="xecuter_hide_post_tags">
                       <option value="default" <?php selected( $hide_post_tags, 'default' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                      <option value="hide" <?php selected( $hide_post_tags, 'hide' ); ?>>Hide</option>
                    </select>
                </td>
            </tr>  
            
            <tr class="meta_xecuter_hide_post_meta">
                <th style="width:20%"><label for="xecuter_hide_post_meta"><?php echo esc_html__('Hide Post Meta','xecuter');?></label></th>
                <td>
                    <select name="xecuter_hide_post_meta" id="xecuter_hide_post_meta">
                       <option value="default" <?php selected( $hide_post_meta, 'default' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                      <option value="hide" <?php selected( $hide_post_meta, 'hide' ); ?>><?php echo esc_html__('Hide','xecuter');?></option>
                    </select>
                </td>
            </tr>    
                  
            <tr class="meta_xecuter_hide_post_share">
                <th style="width:20%"><label for="xecuter_hide_post_share"><?php echo esc_html__('Hide Post Share','xecuter');?></label></th>
                <td>
                    <select name="xecuter_hide_post_share" id="xecuter_hide_post_share">
                       <option value="default" <?php selected( $hide_post_share, 'default' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                      <option value="hide" <?php selected( $hide_post_share, 'hide' ); ?>><?php echo esc_html__('Hide','xecuter');?></option>
                    </select>
                </td>
            </tr>        
                  
            <tr class="meta_xecuter_hide_nextperv_post">
                <th style="width:20%"><label for="xecuter_hide_nextperv_post"><?php echo esc_html__('Hide Next and Previous Post','xecuter');?></label></th>
                <td>
                    <select name="xecuter_hide_nextperv_post" id="xecuter_hide_nextperv_post">
                       <option value="default" <?php selected($hide_nextperv_post, 'default' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                      <option value="hide" <?php selected( $hide_nextperv_post, 'hide' ); ?>><?php echo esc_html__('Hide','xecuter');?></option>
                    </select>
                </td>
            </tr>        
 
                   
            <tr class="meta_xecuter_hide_author_box">
                <th style="width:20%"><label for="xecuter_hide_author_box"><?php echo esc_html__('Hide Author Bio','xecuter');?></label></th>
                <td>
                    <select name="xecuter_hide_author_box" id="xecuter_hide_author_box">
                       <option value="default" <?php selected($hide_author_box, 'default' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                      <option value="hide" <?php selected( $hide_author_box, 'hide' ); ?>><?php echo esc_html__('Hide','xecuter');?></option>
                    </select>
                </td>
            </tr>        
                   
                   
                    
            <tr class="xecuter_hide_related_post">
                <th style="width:20%"><label for="xecuter_hide_related_post"><?php echo esc_html__('Hide Related Post','xecuter');?></label></th>
                <td>
                    <select name="xecuter_hide_related_post" id="xecuter_hide_related_post">
                       <option value="default" <?php selected($hide_related_post, 'default' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                      <option value="hide" <?php selected( $hide_related_post, 'hide' ); ?>><?php echo esc_html__('Hide','xecuter');?></option>
                    </select>
                </td>
            </tr>        

            <tr class="meta_xecuter_hide_banner_below">
                <th style="width:20%"><label for="xecuter_hide_banner_below"><?php echo esc_html__('Hide Below Ads Widget','xecuter');?></label></th>
                <td>
                    <select name="xecuter_hide_banner_below" id="xecuter_hide_banner_below">
                       <option value="default" <?php selected($hide_banner_below, 'default' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                      <option value="hide" <?php selected( $hide_banner_below, 'hide' ); ?>><?php echo esc_html__('Hide','xecuter');?></option>
                    </select>
                </td>
            </tr>            

            <tr class="meta_xecuter_hide_comments">
                <th style="width:20%"><label for="xecuter_hide_comments"><?php echo esc_html__('Hide Comments','xecuter');?></label></th>
                <td>
                    <select name="xecuter_hide_comments" id="xecuter_hide_comments">
                       <option value="default" <?php selected($hide_comments, 'default' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                      <option value="hide" <?php selected( $hide_comments, 'hide' ); ?>><?php echo esc_html__('Hide','xecuter');?></option>
                    </select>
                </td>
            </tr>   
            
            
            <tr class="meta_xecuter_primary_color meta_xecuter_color">
                <th style="width:20%"><label for="xecuter_primary_color"><?php echo esc_html__('Primary Color','xecuter');?></label></th>
                <td>
               		 <input  class="cs-wp-color-picker rd-color"  data-rgba="false" type="text" name="xecuter_primary_color" id="xecuter_primary_color" value="<?php echo esc_attr($primary_color);?>">
                 </td>
            </tr> 
                        
            <tr class="meta_xecuter_body_background_color meta_xecuter_color">
                <th style="width:20%"><label for="xecuter_body_background_color"><?php echo esc_html__('Background Color','xecuter');?></label></th>
                <td>
               		 <input  class="cs-wp-color-picker rd-color"  data-rgba="false" type="text" name="xecuter_body_background_color" id="xecuter_body_background_color" value="<?php echo esc_attr($body_background_color);?>">
                 </td>
            </tr> 
                        
         	<tr class="meta_xecuter_body_background_type">
                <th style="width:20%"><label for="xecuter_body_background_type"><?php echo esc_html__('Background Type','xecuter');?></label></th>
                <td>
                    <select name="xecuter_body_background_type" id="xecuter_body_background_type">
                       <option value="" id="xecuter_body_background_type_default" <?php selected($body_background_type, '' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                      <option value="none" id="xecuter_body_background_type_none"  <?php selected( $body_background_type, 'none' ); ?>><?php echo esc_html__('None','xecuter');?></option>
                      <option value="pattern" id="xecuter_body_background_type_pattern"  <?php selected( $body_background_type, 'pattern' ); ?>><?php echo esc_html__('Pattern','xecuter');?></option>
                      <option value="custom" id="xecuter_body_background_type_custom"  <?php selected( $body_background_type, 'custom' ); ?>><?php echo esc_html__('Custom Image','xecuter');?></option>
                    </select>
                </td>
            </tr>            
            <tr class="meta_xecuter_body_background_pattern">
                <th style="width:20%"><label for="xecuter_body_background_pattern"><?php echo esc_html__('Background Pattern','xecuter');?></label></th>
                <td>
 					<?php for ($i = 1; $i <= 23; $i++) {  ?>
                        <li>
                            <input style="display:none;" name="xecuter_body_background_pattern" id="xecuter_body_background_pattern-default"  value="<?php echo esc_attr($i) ?>" type="radio" <?php checked( $body_background_pattern, $i );?>>
                            <a><img src="<?php echo get_template_directory_uri();?>/images/bg/bg<?php echo esc_attr($i)?>.png"></a>
                         </li>                    
 					<?php }?>                      
                     
                </td>
            </tr> 
            
            <tr class="meta_xecuter_body_background_image">
                <th style="width:20%"><label for="xecuter_body_background_image"><?php echo esc_html__('Custom Background Image','xecuter');?></label></th>
                <td> 
 	  	 		<a class="rd_add_image button button-small"  data-uploader-title="<?php echo esc_attr__('Choose Image','xecuter');?>" data-uploader-button-text="<?php echo esc_attr__('Use This Image','xecuter');?>"> <?php echo esc_html__('Upload','xecuter')?></a>
 				<input type="hidden" name="xecuter_body_background_image" value="<?php echo esc_url($body_background_image);?>">
 		
				<?php if(!empty($body_background_image)){     ?>
 	   			<a class="rd_remove_image button button-small" ><?php echo  esc_html__('Remove','xecuter');?></a>
 		 		<img   src="<?php echo esc_url($body_background_image) ?>"/> 
                <?php }?>
               	</td>
            </tr>               
                                                                       
                        
     	</tbody>
     </table>
    <?php
}

function xecuter_page_metabox($post){
	global $post;
	   $custom = get_post_custom($post->ID);
	$xecuter_sidebar  = get_option('xecuter_boxes');
  	
     $single_sidebar = get_post_meta($post->ID, 'xecuter_page_sidebar', true);
	$full_width_value = get_post_meta($post->ID, 'xecuter_full_width', true);
    if($full_width_value == "yes"){ $full_width_checked = 'checked="checked"';}else{$full_width_checked='';} 
	$hide_banner_below = get_post_meta($post->ID, 'xecuter_hide_banner_below', true);
    $hide_comments = get_post_meta($post->ID, 'xecuter_hide_comments', true);
    $primary_color = get_post_meta($post->ID, 'xecuter_primary_color', true);
    $body_background_color = get_post_meta($post->ID, 'xecuter_body_background_color', true);
    $body_background_type = get_post_meta($post->ID, 'xecuter_body_background_type', true);
    $body_background_image = get_post_meta($post->ID, 'xecuter_body_background_image', true);
    $body_background_image_medium = get_post_meta($post->ID, 'xecuter_body_background_image_medium', true);
    $body_background_pattern = get_post_meta($post->ID, 'xecuter_body_background_pattern', true);
		 
	?>
	 
	<table class="form-table meta_box">     
		<tbody>
     
            <tr class="meta_xecuter_page_sidebar">
                <th style="width:20%"><label for="xecuter_single_sidebar"><?php echo esc_html__('Custom Sidebar','xecuter');?></label></th>
                <td>
					<select name="xecuter_single_sidebar" id="xecuter_page_sidebar">
                    	<option value="" <?php selected( $single_sidebar, '' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                    	<option value="xecuter_main_sidebar" <?php selected( $single_sidebar, 'xecuter_main_sidebar' ); ?>><?php echo esc_html__('Primery Sidebar','xecuter');?></option>
                       	<?php 
						if(!empty($xecuter_sidebar)){
						foreach ($xecuter_sidebar as $side){  ?>
                    			<option value="<?php echo 'xecuter_'.esc_attr($side) ?>" <?php  if ( $single_sidebar  == 'xecuter_'.$side ){ echo 'selected=""';} ?>><?php echo esc_html($side);?></option> 
							<?php 
						}}?>                      
                    </select>
                    
                </td>
            </tr>     
            
            <tr class="meta_xecuter_full_width">
                <th style="width:20%"><label for="xecuter_full_width"><?php echo esc_html__('Full Width Post','xecuter');?></label></th>
                <td>
    				<input type="checkbox" name="xecuter_full_width"  id="xecuter_full_width" value="yes" <?php echo wp_kses_post($full_width_checked); ?> />
                </td>
            </tr>            
      
            <tr class="meta_xecuter_hide_banner_below">
                <th style="width:20%"><label for="xecuter_hide_banner_below"><?php echo esc_html__('Hide Below Ads Widget','xecuter');?></label></th>
                <td>
                    <select name="xecuter_hide_banner_below" id="xecuter_hide_banner_below">
                       <option value="default" <?php selected($hide_banner_below, 'default' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                      <option value="hide" <?php selected( $hide_banner_below, 'hide' ); ?>><?php echo esc_html__('Hide','xecuter');?></option>
                    </select>
                </td>
            </tr>            

            <tr class="meta_xecuter_hide_comments">
                <th style="width:20%"><label for="xecuter_hide_comments"><?php echo esc_html__('Hide Comments','xecuter');?></label></th>
                <td>
                    <select name="xecuter_hide_comments" id="xecuter_hide_comments">
                       <option value="default" <?php selected($hide_comments, 'default' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                      <option value="hide" <?php selected( $hide_comments, 'hide' ); ?>><?php echo esc_html__('Hide','xecuter');?></option>
                    </select>
                </td>
            </tr>               
            
           <tr class="meta_xecuter_primary_color meta_xecuter_color">
                <th style="width:20%"><label for="xecuter_primary_color"><?php echo esc_html__('Primary Color','xecuter');?></label></th>
                <td>
               		 <input  class="cs-wp-color-picker rd-color"  data-rgba="false" type="text" name="xecuter_primary_color" id="xecuter_primary_color" value="<?php echo esc_attr($primary_color);?>">
                 </td>
            </tr> 
                        
            <tr class="meta_xecuter_body_background_color meta_xecuter_color">
                <th style="width:20%"><label for="xecuter_body_background_color"><?php echo esc_html__('Background Color','xecuter');?></label></th>
                <td>
               		 <input  class="cs-wp-color-picker rd-color"  data-rgba="false" type="text" name="xecuter_body_background_color" id="xecuter_body_background_color" value="<?php echo esc_attr($body_background_color);?>">
                 </td>
            </tr> 
                        
         	<tr class="meta_xecuter_body_background_type">
                <th style="width:20%"><label for="xecuter_body_background_type"><?php echo esc_html__('Background Type','xecuter');?></label></th>
                <td>
                    <select name="xecuter_body_background_type" id="xecuter_body_background_type">
                       <option value="" id="xecuter_body_background_type_default" <?php selected($body_background_type, '' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
                      <option value="none" id="xecuter_body_background_type_none"  <?php selected( $body_background_type, 'none' ); ?>><?php echo esc_html__('None','xecuter');?></option>
                      <option value="pattern" id="xecuter_body_background_type_pattern"  <?php selected( $body_background_type, 'pattern' ); ?>><?php echo esc_html__('Pattern','xecuter');?></option>
                      <option value="custom" id="xecuter_body_background_type_custom"  <?php selected( $body_background_type, 'custom' ); ?>><?php echo esc_html__('Custom Image','xecuter');?></option>
                    </select>
                </td>
            </tr>            
            <tr class="meta_xecuter_body_background_pattern">
                <th style="width:20%"><label for="xecuter_body_background_pattern"><?php echo esc_html__('Background Pattern','xecuter');?></label></th>
                <td>
 					<?php for ($i = 1; $i <= 23; $i++) {  ?>
                        <li>
                            <input style="display:none;" name="xecuter_body_background_pattern" id="xecuter_body_background_pattern-default"  value="<?php echo esc_attr($i) ?>" type="radio" <?php checked( $body_background_pattern, $i );?>>
                            <a><img src="<?php echo get_template_directory_uri();?>/images/bg/bg<?php echo esc_attr($i)?>.png"></a>
                         </li>                    
 					<?php }?>                      
                     
                </td>
            </tr> 
            
            <tr class="meta_xecuter_body_background_image">
                <th style="width:20%"><label for="xecuter_body_background_image"><?php echo esc_html__('Custom Background Image','xecuter');?></label></th>
                <td> 
	  	 		<a class="rd_add_image button button-small"  data-uploader-title="<?php echo esc_attr__('Choose Image','xecuter');?>" data-uploader-button-text="<?php echo esc_attr__('Use This Image','xecuter');?>"> <?php echo esc_html__('Upload','xecuter')?></a>
 				<input type="hidden" name="xecuter_body_background_image" value="<?php echo esc_url($body_background_image);?>">
 		
				<?php if(!empty($body_background_image)){     ?>
 	   			<a class="rd_remove_image button button-small" ><?php echo  esc_html__('Remove','xecuter');?></a>
 		 		<img   src="<?php echo esc_url($body_background_image) ?>"/> 
                <?php }?>
                </td>
            </tr>               
                       
                        
     	</tbody>
     </table>
    <?php
}
function xecuter_review_metabox($post){
	global $post;
	$custom = get_post_custom($post->ID);
    
  	$review_value = get_post_meta($post->ID, 'xecuter_review', true);
    if($review_value == "yes"){ $review_checked = 'checked="checked"';}else{$review_checked='';} 
    $review_style = get_post_meta($post->ID, 'xecuter_review_style', true);  
    $review_title = get_post_meta($post->ID, 'xecuter_review_title', true);  
    $review_excerpt = get_post_meta($post->ID, 'xecuter_review_excerpt', true);  
    $review_score = get_post_meta($post->ID, 'xecuter_review_score', true);  
    $review_short = get_post_meta($post->ID, 'xecuter_review_short', true);  
	
	 
	?>
	 
	<table class="form-table meta_box">     
		<tbody> 
        
            <tr class="meta_xecuter_review">
                <th style="width:20%"><label for="xecuter_review"><?php echo esc_html__('Review Box','xecuter');?></label></th>
                <td>
                    <input type="checkbox" name="xecuter_review" id="xecuter_review" value="yes" <?php echo  wp_kses_post($review_checked); ?> />
                    <label for="xecuter_review"><span class="description"><?php echo esc_html__('checkbox Show Review Post','xecuter');?></span></label>
                </td>
            </tr>            

            <tr class="meta_xecuter_review_style">
                <th style="width:20%"><label for="xecuter_review_style"><?php echo esc_html__('Review Style','xecuter');?></label></th>
                <td>
                    <select name="xecuter_review_style" id="xecuter_review_style">
                       <option value="stars" <?php selected($review_style, 'stars' ); ?>><?php echo esc_html__('Stars','xecuter');?></option>
                      <option value="circular" <?php selected( $review_style, 'circular' ); ?>><?php echo esc_html__('Circular','xecuter');?></option>
                    </select>
                </td>
            </tr>   


            <tr class="meta_xecuter_review_title">
                <th style="width:20%"><label for="meta_xecuter_review_title"><?php echo esc_html__('Review Title','xecuter');?></label></th>
                <td>
                    <input type="text" name="xecuter_review_title" id="xecuter_review_title" value="<?php if(!empty($review_title))echo  esc_attr($review_title); ?>" />
                 </td>
            </tr>   

            <tr class="meta_xecuter_review_excerpt">
                <th style="width:20%"><label for="xecuter_review_excerpt"><?php echo esc_html__('Review Excerpt','xecuter');?></label></th>
 					<td><textarea name="xecuter_review_excerpt" id="xecuter_review_excerpt" cols="60" rows="4"><?php if(!empty($review_excerpt))echo  esc_textarea($review_excerpt); ?></textarea>
					<br>
                    </td>
                </td>
            </tr>   

 
            <tr class="xecuter_review_score">
                <th style="width:20%"><label for="xecuter_review_score"><?php echo esc_html__('Review Score','xecuter');?></label></th>
 					<td>
                    <input type="text" name="xecuter_review_score" id="xecuter_review_score" value="<?php if(!empty($review_score))echo  esc_attr($review_score); ?>" />
                    <span class="description"><?php echo esc_html__('Between 0 to 100','xecuter');?></span>
                    </td>
                </td>
            </tr>
            
              <tr class="meta_xecuter_review_short">
                <th style="width:20%"><label for="xecuter_review_short"><?php echo esc_html__('Text Appears Under The Total Score','xecuter');?></label></th>
					<td>
					<input type="text" name="xecuter_review_short" id="xecuter_review_short" value="<?php if(!empty($review_short))echo  esc_attr($review_short); ?>" />
                    </td>
                </td>
            </tr>          

            
     	</tbody>
     </table>
    <?php
}

function xecuter_video_metabox($post){
	global $post;
	$custom = get_post_custom($post->ID);
    
  	$video = get_post_meta($post->ID, 'xecuter_video', true);
    if($video == "yes"){ $video_checked = 'checked="checked"';}else{$video_checked='';} 
    $video_type = get_post_meta($post->ID, 'xecuter_video_type', true);  
 
    $video_url = get_post_meta($post->ID, 'xecuter_video_url', true);  
	
	 
	?>
	 
	<table class="form-table meta_box">     
		<tbody> 
        
            <tr class="meta_xecuter_video">
                <th style="width:20%"><label for="xecuter_video"><?php echo esc_html__('Featured Video','xecuter');?></label></th>
                <td>
                    <input type="checkbox" name="xecuter_video" id="xecuter_video" value="yes" <?php echo wp_kses_post($video_checked); ?> />
					<label for="xecuter_video"><span class="description"><?php echo esc_html__('checkbox Show Featured Video','xecuter');?></span></label>                    
                </td>
            </tr>            

            <tr class="meta_xecuter_video_type">
                <th style="width:20%"><label for="xecuter_video_type"><?php echo esc_html__('Featured Video Type','xecuter');?></label></th>
                <td>
                    <select name="xecuter_video_type" id="xecuter_video_type">
                       <option value="mp4" <?php selected($video_type, 'mp4' ); ?>><?php echo esc_html__('Mp4','xecuter');?></option>
                      <option value="youtube" <?php selected( $video_type, 'youtube' ); ?>><?php echo esc_html__('Youtube','xecuter');?></option>
                    </select>
                </td>
            </tr>   


            <tr class="meta_xecuter_video_url">
                <th style="width:20%"><label for="xecuter_video_url"><?php echo esc_html__('Featured Video Url','xecuter');?></label></th>
                <td>
                    <input  type="text" name="xecuter_video_url" id="xecuter_video_url" value="<?php if(!empty($video_url))echo esc_attr($video_url); ?>" /><br>
					<span class="description"><?php echo esc_html__('Example For Youtuble , Copy "p1ewg7Xvuo0" in "https://www.youtube.com/watch?v=p1ewg7Xvuo0"','xecuter');?></span>
				</td>
            </tr>    
            
     	</tbody>
     </table>
    <?php
}
add_action('save_post', 'xecuter_save_metabox');

function xecuter_save_metabox( $post_id){ 
    global $post;
	
	if (defined('DOING_AJAX') ) {
	return $post_id;
    }
	if ( isset($_POST['xecuter_featured_image_meta']) ) {
		update_post_meta($post_id, 'xecuter_featured_image_meta', $_POST['xecuter_featured_image_meta']);
	}else{
		delete_post_meta($post_id, 'xecuter_featured_image_meta');
	}
  
	
	if ( isset($_POST['xecuter_single_template']) ) {
		update_post_meta($post_id, 'xecuter_single_template', $_POST['xecuter_single_template']);
	}else{
		delete_post_meta($post_id, 'xecuter_single_template');
	}
	
	if ( isset($_POST['xecuter_single_template']) ) {
		update_post_meta($post_id, 'xecuter_single_template', $_POST['xecuter_single_template']);
	}else{
		delete_post_meta($post_id, 'xecuter_single_template');
	}
	
	if ( isset($_POST['xecuter_single_ratio']) ) {
		update_post_meta($post_id, 'xecuter_single_ratio', $_POST['xecuter_single_ratio']);
	}else{
		delete_post_meta($post_id, 'xecuter_single_ratio');
	}	
	
	if ( isset($_POST['xecuter_single_sidebar']) ) {
		update_post_meta($post_id, 'xecuter_single_sidebar', $_POST['xecuter_single_sidebar']);
	}else{
		delete_post_meta($post_id, 'xecuter_single_sidebar');
	}			 
	  
	if ( isset($_POST['xecuter_page_right']) ) {
		update_post_meta($post_id, 'xecuter_page_right', $_POST['xecuter_page_right']);
	}else{
		delete_post_meta($post_id, 'xecuter_page_right');
	}			 
	 
	if ( isset($_POST['xecuter_page_left']) ) {
		update_post_meta($post_id, 'xecuter_page_left', $_POST['xecuter_page_left']);
	}else{
		delete_post_meta($post_id, 'xecuter_page_left');
	}				 

	if ( isset($_POST['xecuter_full_width']) ) {
		update_post_meta($post_id, 'xecuter_full_width', $_POST['xecuter_full_width']);
	}else{
		delete_post_meta($post_id, 'xecuter_full_width');
	}
	
	if ( isset($_POST['xecuter_hide_post_tags']) ) {
		update_post_meta($post_id, 'xecuter_hide_post_tags', $_POST['xecuter_hide_post_tags']);
	}else{
		delete_post_meta($post_id, 'xecuter_hide_post_tags');
	}		
	
	if ( isset($_POST['xecuter_hide_post_meta']) ) {
		update_post_meta($post_id, 'xecuter_hide_post_meta', $_POST['xecuter_hide_post_meta']);
	}else{
		delete_post_meta($post_id, 'xecuter_hide_post_meta');
	}		
	
	if ( isset($_POST['xecuter_hide_post_share']) ) {
		update_post_meta($post_id, 'xecuter_hide_post_share', $_POST['xecuter_hide_post_share']);
	}else{
		delete_post_meta($post_id, 'xecuter_hide_post_share');
	}						 

	if ( isset($_POST['xecuter_hide_nextperv_post']) ) {
		update_post_meta($post_id, 'xecuter_hide_nextperv_post', $_POST['xecuter_hide_nextperv_post']);
	}else{
		delete_post_meta($post_id, 'xecuter_hide_nextperv_post');
	}
	
 
	
	if ( isset($_POST['xecuter_hide_author_box']) ) {
		update_post_meta($post_id, 'xecuter_hide_author_box', $_POST['xecuter_hide_author_box']);
	}else{
		delete_post_meta($post_id, 'xecuter_hide_author_box');
	}								 

	if ( isset($_POST['xecuter_hide_related_post']) ) {
		update_post_meta($post_id, 'xecuter_hide_related_post', $_POST['xecuter_hide_related_post']);
	}else{
		delete_post_meta($post_id, 'xecuter_hide_related_post');
	}	
	 

	if ( isset($_POST['xecuter_hide_banner_below']) ) {
		update_post_meta($post_id, 'xecuter_hide_banner_below', $_POST['xecuter_hide_banner_below']);
	}else{
		delete_post_meta($post_id, 'xecuter_hide_banner_below');
	}	
	
	if ( isset($_POST['xecuter_hide_comments']) ) {
		update_post_meta($post_id, 'xecuter_hide_comments', $_POST['xecuter_hide_comments']);
	}else{
		delete_post_meta($post_id, 'xecuter_hide_comments');
	}	 	  
	  
	
	if ( isset($_POST['xecuter_review']) ) {
		update_post_meta($post_id, 'xecuter_review', $_POST['xecuter_review']);
	}else{
		delete_post_meta($post_id, 'xecuter_review');
	}	
	
	if ( isset($_POST['xecuter_review_style']) ) {
		update_post_meta($post_id, 'xecuter_review_style', $_POST['xecuter_review_style']);
	}else{
		delete_post_meta($post_id, 'xecuter_review_style');
	}		 


	if ( isset($_POST['xecuter_review_title']) ) {
		update_post_meta($post_id, 'xecuter_review_title', $_POST['xecuter_review_title']);
	}else{
		delete_post_meta($post_id, 'xecuter_review_title');
	}	

	if ( isset($_POST['xecuter_review_excerpt']) ) {
		update_post_meta($post_id, 'xecuter_review_excerpt', $_POST['xecuter_review_excerpt']);
	}else{
		delete_post_meta($post_id, 'xecuter_review_excerpt');
	}		
	
	if ( isset($_POST['xecuter_review_score']) ) {
		update_post_meta($post_id, 'xecuter_review_score', $_POST['xecuter_review_score']);
	}else{
		delete_post_meta($post_id, 'xecuter_review_score');
	}			    
	  
	if ( isset($_POST['xecuter_review_short']) ) {
		update_post_meta($post_id, 'xecuter_review_short', $_POST['xecuter_review_short']);
	}else{
		delete_post_meta($post_id, 'xecuter_review_short');
	}		 
	  
	 
	if ( isset($_POST['xecuter_video']) ) {
		update_post_meta($post_id, 'xecuter_video', $_POST['xecuter_video']);
	}else{
		delete_post_meta($post_id, 'xecuter_video');
	}
	
	if ( isset($_POST['xecuter_video_type']) ) {
		update_post_meta($post_id, 'xecuter_video_type', $_POST['xecuter_video_type']);
	}else{
		delete_post_meta($post_id, 'xecuter_video_type');
	}	 			 		 

	if ( isset($_POST['xecuter_video_url']) ) {
		update_post_meta($post_id, 'xecuter_video_url', $_POST['xecuter_video_url']);
	}else{
		delete_post_meta($post_id, 'xecuter_video_url');
	}	 			 		 

	if ( isset($_POST['xecuter_primary_color']) ) {
		update_post_meta($post_id, 'xecuter_primary_color', $_POST['xecuter_primary_color']);
	}else{
		delete_post_meta($post_id, 'xecuter_primary_color');
	}	
	
	if ( isset($_POST['xecuter_body_background_color']) ) {
		update_post_meta($post_id, 'xecuter_body_background_color', $_POST['xecuter_body_background_color']);
	}else{
		delete_post_meta($post_id, 'xecuter_body_background_color');
	}		

	if ( isset($_POST['xecuter_body_background_type']) ) {
		update_post_meta($post_id, 'xecuter_body_background_type', $_POST['xecuter_body_background_type']);
	}else{
		delete_post_meta($post_id, 'xecuter_body_background_type');
	}
	
	 		 	   


	if ( isset($_POST['xecuter_body_background_image']) ) {
		update_post_meta($post_id, 'xecuter_body_background_image', $_POST['xecuter_body_background_image']);
	}else{
		delete_post_meta($post_id, 'xecuter_body_background_image');
	}
 
	
	if ( isset($_POST['xecuter_body_background_pattern']) ) {
		update_post_meta($post_id, 'xecuter_body_background_pattern', $_POST['xecuter_body_background_pattern']);
	}else{
		delete_post_meta($post_id, 'xecuter_body_background_pattern');
	}			    
}


