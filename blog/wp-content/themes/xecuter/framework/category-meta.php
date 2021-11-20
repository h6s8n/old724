<?php 
  
// ** Category Meta Box 
//add extra fields to category edit form hook
add_action ( 'edit_category_form_fields', 'xecuter_category_fields');
 
function xecuter_category_checkbox( $name,$id,$meta ) {
	
    if($meta == "yes"){ $select_checked = 'checked="checked"';}else{$select_checked='';} 
 	?>
	<tr id="cats-<?php echo  esc_attr($id);?>" class="form-field   rd-category">
      <th scope="row" class="row-cats" valign="top"><label  class="row-cats" for="<?php echo  esc_attr($id);?>" > <?php echo esc_html( $name ) ?></label></th>
      <td>
		<input type="checkbox" name="<?php echo  esc_attr($id);?>"  id="<?php echo  esc_attr($id);?>" value="yes" <?php echo wp_kses_post($select_checked); ?> />
  
        
        </td>
    </tr>
<?php }


function xecuter_category_fields( $tag ) {	//check for existing featured ID

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
 
	foreach ($options_post_obj as $rezapost) {
		$options_post[$rezapost->ID] = $rezapost->post_title;
	}
 	

 	$xecuter_sidebar  = get_option('xecuter_boxes');

  	$row_custom = get_term_meta($tag->term_id, 'xecuter_row_custom', true);
  	$row = get_term_meta($tag->term_id, 'xecuter_row', true);
	$Columns = isset(  $row ) ? $row : '800_400'; 
	
  	$blog_custom = get_term_meta($tag->term_id, 'xecuter_blog_custom', true);
 	$content_layout = get_term_meta($tag->term_id, 'xecuter_content_layout', true);
 	$main_layout = get_term_meta($tag->term_id, 'xecuter_main_layout', true); 
 	$page_builder = get_term_meta($tag->term_id, 'xecuter_page_builder', true); 
 	$cats_sidebar = get_term_meta($tag->term_id, 'xecuter_cats_sidebar', true); 
 	$size1 = get_term_meta($tag->term_id, 'xecuter_size1', true); 
  	$size2 = get_term_meta($tag->term_id, 'xecuter_size2', true); 
 	$ratio = get_term_meta($tag->term_id, 'xecuter_ratio', true); 
 	$ratio2 = get_term_meta($tag->term_id, 'xecuter_ratio2', true); 
 	$height = get_term_meta($tag->term_id, 'xecuter_height', true); 
 	$excerpt = get_term_meta($tag->term_id, 'xecuter_excerpt', true); 
 	$title_limit = get_term_meta($tag->term_id, 'xecuter_title_limit', true); 
 	$excerpt_limit = get_term_meta($tag->term_id, 'xecuter_excerpt_limit', true); 
 	$meta_category = get_term_meta($tag->term_id, 'xecuter_blog_meta_category', true); 
 	$meta_review = get_term_meta($tag->term_id, 'xecuter_blog_meta_review', true); 
 	$meta_author = get_term_meta($tag->term_id, 'xecuter_blog_meta_author', true); 	
 	$meta_date = get_term_meta($tag->term_id, 'xecuter_blog_meta_date', true); 
 	$meta_view = get_term_meta($tag->term_id, 'xecuter_blog_meta_view', true); 
 	$meta_comments = get_term_meta($tag->term_id, 'xecuter_blog_meta_comments', true); 		 
 	$primary_color = get_term_meta($tag->term_id, 'xecuter_primary_color', true); 		 
 	$body_background_color = get_term_meta($tag->term_id, 'xecuter_body_background_color', true); 		 
 	$body_background_type = get_term_meta($tag->term_id, 'xecuter_body_background_type', true); 		 
 	$body_background_pattern = get_term_meta($tag->term_id, 'xecuter_body_background_pattern', true); 		 
 	$body_background_image = get_term_meta($tag->term_id, 'xecuter_body_background_image', true); 		 
    ?>
     <tr class="form-field-head form-field" >
		<th scope="row"  class="row-cats" valign="top"><label><?php echo esc_html__('General' , 'xecuter' );?></label></th><td></td>
    </tr>
    
	<?php xecuter_category_checkbox(esc_html__('Enable Custom Columns','xecuter'),'xecuter_row_custom',$row_custom);?>
    
    <tr class="form-field   rd-category">
		<th scope="row" class="row-cats" valign="top"><label  class="row-cats" for="xecuter_row"><?php  echo esc_html__('Columns' , 'xecuter' );?></label></th>
		<td>
            <ul id="rd-columns" >
 				<li class="xecuter_row_1200" >
					<input   id="xecuter_row" style="display:none;" name="xecuter_row" type="radio" value="1200" <?php  if($Columns == '1200') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/1200.jpg" /></a>
				</li>
 				<li class="xecuter_row_800_400">
					<input    id="xecuter_row" style="display:none;" name="xecuter_row" type="radio" value="800_400" <?php  if($Columns == '800_400') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/800_400.jpg" /></a>
				</li>
 				<li  class="xecuter_row_400_800" >
					<input  id="xecuter_row" style="display:none;" name="xecuter_row" type="radio" value="400_800" <?php  if($Columns == '400_800') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/400_800.jpg" /></a>
				</li>
                                                 
            </ul>
       </td>
    </tr>
 
 	<tr class="form-field   rd-category">
      	<th scope="row" class="row-cats" valign="top"><label class="row-cats" for="xecuter_page_builder"><?php echo esc_html__('Select Page Builder' , 'xecuter' );?></label></th>
		<td>
       	<select name="xecuter_page_builder" id="xecuter_page_builder" >
          <option value="" <?php  if ($page_builder == '' ) echo 'selected=""'; ?>><?php echo esc_html__('None' , 'xecuter' );?></option>
          <?php if(!empty($options_post)){ ?>
			<?php foreach($options_post as $key => $value):?>
          <option value="<?php echo esc_attr($key); ?>"  <?php  if ( $page_builder == $key )echo 'selected=""'; ?>><?php echo esc_html($value); ?></option>
			<?php endforeach;?>
		  <?php }?>
         </select>
		</td>
    </tr>     
     
    <!---------------------------------- Custom Blog ------------------------------------->
     <tr class="form-field-head form-field" >
      <th scope="row"  class="row-cats" valign="top"><label ><?php  echo esc_html__('Custom Sidebar' , 'xecuter' );?></label></th><td></td>
    </tr>
    
 	<tr class="form-field   rd-category">
		<th style="width:20%"><label for="xecuter_cats_sidebar"><?php echo esc_html__('Select a Sidebar','xecuter');?></label></th>
		<td>
		<select name="xecuter_cats_sidebar" id="xecuter_cats_sidebar">
			<option value="" <?php selected( $cats_sidebar, '' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
			<option value="xecuter_main_sidebar" <?php selected( $cats_sidebar, 'xecuter_main_sidebar' ); ?>><?php echo esc_html__('Primery Sidebar','xecuter');?></option>
			<?php if(!empty($xecuter_sidebar)){
			foreach ($xecuter_sidebar as $side){  ?>
			<option value="<?php echo 'xecuter_'.esc_attr($side) ?>" <?php  if ( $cats_sidebar  == 'xecuter_'.$side ){ echo 'selected=""';} ?>><?php echo esc_html($side);?></option> 
			<?php }}?>                      
		</select>
                    
		</td>
	</tr>   
    <!---------------------------------- Custom Blog ------------------------------------->
     <tr class="form-field-head form-field" >
      <th scope="row"  class="row-cats" valign="top"><label ><?php  echo esc_html__('Custom Blog' , 'xecuter' );?></label></th><td></td>
    </tr>
    <?php xecuter_category_checkbox( esc_html__('Enable Custom Blog' , 'xecuter' ),'xecuter_blog_custom',$blog_custom );?>
    
	<!---------------------------------- Content Layout ------------------------------------->
    <tr id="cats-xecuter_content_layout" class="form-field   rd-category">
		<th scope="row" class="row-cats" valign="top"><label  class="row-cats" for="xecuter_content_layout"><?php  echo esc_html__('Blog Layout' , 'xecuter' );?></label></th>
		<td>
            <ul id="rd-content-layout" >
 				<li class="xecuter_content_layout_grid_1c">
					<input id="xecuter_content_layout_grid_1c"  class="xecuter_content_layout_grid_1c" style="display:none;" name="xecuter_content_layout"   type="radio" value="grid_1c" <?php  if($content_layout == 'grid_1c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/grid_1c.jpg" /></a>
				</li>
 				<li  class="xecuter_content_layout_grid_2c" >
					<input id="xecuter_content_layout" style="display:none;" name="xecuter_content_layout" type="radio" value="grid_2c" <?php  if($content_layout == 'grid_2c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/grid_2c.jpg" /></a>
				</li>
 				<li  class="xecuter_content_layout_grid_3c" >
					<input id="xecuter_content_layout" style="display:none;" name="xecuter_content_layout" type="radio" value="grid_3c" <?php  if($content_layout == 'grid_3c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/grid_3c.jpg" /></a>
				</li>
 				<li  class="xecuter_content_layout_grid_4c">
					<input id="xecuter_content_layout" style="display:none;" name="xecuter_content_layout" type="radio" value="grid_4c" <?php  if($content_layout == 'grid_4c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/grid_4c.jpg" /></a>
				</li> 
 				<li  class="xecuter_content_layout_grid_5c">
					<input id="xecuter_content_layout" style="display:none;" name="xecuter_content_layout" type="radio" value="grid_5c" <?php  if($content_layout == 'grid_5c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/grid_5c.jpg" /></a>
				</li> 
 				<li  class="xecuter_content_layout_grid_6c" >
					<input id="xecuter_content_layout" style="display:none;" name="xecuter_content_layout" type="radio" value="grid_6c" <?php  if($content_layout == 'grid_6c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/grid_6c.jpg" /></a>
				</li>  
 				<li  class="xecuter_content_layout_list_1c" >
					<input id="xecuter_content_layout" style="display:none;" name="xecuter_content_layout" type="radio" value="list_1c" <?php  if($content_layout == 'list_1c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/list_1c.jpg" /></a>
				</li>  
 				<li  class="xecuter_content_layout_list_2c">
					<input id="xecuter_content_layout" style="display:none;" name="xecuter_content_layout" type="radio" value="list_2c" <?php  if($content_layout == 'list_2c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/list_2c.jpg" /></a>
				</li>  
 				<li class="xecuter_content_layout_list_3c">
					<input id="xecuter_content_layout" style="display:none;" name="xecuter_content_layout" type="radio" value="list_3c" <?php  if($content_layout == 'list_3c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/list_3c.jpg" /></a>
				</li>                                                                                                                                 
            </ul>
       </td>
    </tr>
    

	<!---------------------------------- Main Layout ------------------------------------->
    <tr id="cats-xecuter_main_layout" class="form-field   rd-category">
		<th scope="row" class="row-cats" valign="top"><label  class="row-cats" for="xecuter_main_layout"><?php  echo esc_html__('Blog Layout' , 'xecuter' );?></label></th>
		<td>
            <ul id="rd-main-layout" >
 				<li class="xecuter_main_layout_grid_1c" >
					<input id="xecuter_main_layout" style="display:none;" name="xecuter_main_layout" type="radio" value="grid_1c" <?php  if($main_layout == 'grid_1c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/grid_1c.jpg" /></a>
				</li>
 				<li  class="xecuter_main_layout_grid_2c">
					<input id="xecuter_main_layout" style="display:none;" name="xecuter_main_layout" type="radio" value="grid_2c" <?php  if($main_layout == 'grid_2c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/grid_2c.jpg" /></a>
				</li>
 				<li  class="xecuter_main_layout_grid_3c">
					<input id="xecuter_main_layout" style="display:none;" name="xecuter_main_layout" type="radio" value="grid_3c" <?php  if($main_layout == 'grid_3c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/grid_3c.jpg" /></a>
				</li>
 				<li  class="xecuter_main_layout_grid_4c">
					<input id="xecuter_main_layout" style="display:none;" name="xecuter_main_layout" type="radio" value="grid_4c" <?php  if($main_layout == 'grid_4c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/grid_4c.jpg" /></a>
				</li>   
 				<li  class="xecuter_main_layout_list_1c">
					<input id="xecuter_main_layout" style="display:none;" name="xecuter_main_layout" type="radio" value="list_1c" <?php  if($main_layout == 'list_1c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/list_1c.jpg" /></a>
				</li>  
 				<li  class="xecuter_main_layout_list_2c">
					<input id="xecuter_main_layout" style="display:none;" name="xecuter_main_layout" type="radio" value="list_2c" <?php  if($main_layout == 'list_2c') { echo 'checked="checked"';} else {echo '';} ?> />
                    <a class="checkbox-select " ><img src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/content/list_2c.jpg" /></a>
				</li>                                                                                                                              
            </ul>
       </td>
    </tr>
	<!---------------------------------- Image  Size 1------------------------------------->
	<tr id="cats-xecuter_size1" class="form-field   rd-category">
      	<th scope="row" class="row-cats" valign="top"><label class="row-cats" for="xecuter_size1"><?php echo esc_html__('Image Size' , 'xecuter' );?></label></th>
		<td>
       	<select name="xecuter_size1" id="xecuter_size1" >
          <option value="rd-img-medium" <?php  if ($size1 == 'rd-img-medium' )echo 'selected=""'; ?>><?php echo esc_html__('Medium' , 'xecuter' );?></option>
          <option value="rd-img-large" <?php  if ( $size1 == 'rd-img-large' )echo 'selected=""'; ?>><?php echo esc_html__('Large' , 'xecuter' );?></option>
        </select>
		</td>
    </tr>
 
 	<!---------------------------------- Image Size 2------------------------------------->
	<tr  id="cats-xecuter_size2"  class="form-field   rd-category">
      	<th scope="row" class="row-cats" valign="top"><label class="row-cats" for="xecuter_size2"><?php echo esc_html__('Image Size' , 'xecuter' );?></label></th>
		<td>
       	<select name="xecuter_size2" id="xecuter_size2" >
          <option value="rd-img-small" <?php  if ($size2 == 'rd-img-small' )echo 'selected=""'; ?>><?php echo esc_html__('Small' , 'xecuter' );?></option>
          <option value="rd-img-medium" <?php  if ($size2 == 'rd-img-medium' )echo 'selected=""'; ?>><?php echo esc_html__('Medium' , 'xecuter' );?></option>
          <option value="rd-img-large" <?php  if ( $size2 == 'rd-img-large' )echo 'selected=""'; ?>><?php echo esc_html__('Large' , 'xecuter' );?></option>
        </select>
		</td>
    </tr>  
    
   	<!---------------------------------- Image Ratio ------------------------------------->
	<tr  id="cats-xecuter_ratio"  class="form-field   rd-category">
      	<th scope="row" class="row-cats" valign="top"><label class="row-cats" for="xecuter_ratio"><?php echo esc_html__('Image Ratio' , 'xecuter' );?></label></th>
		<td>
       	<select name="xecuter_ratio" id="xecuter_ratio" >
          <option value="rd-ratio60" <?php  if ($ratio == 'rd-ratio60' )echo 'selected=""'; ?>><?php echo esc_html__('16/9' , 'xecuter' );?></option>
          <option value="rd-ratio75" <?php  if ($ratio == 'rd-ratio75' )echo 'selected=""'; ?>><?php echo esc_html__('4/3' , 'xecuter' );?></option>
          <option value="rd-ratio100" <?php  if ( $ratio == 'rd-ratio100' )echo 'selected=""'; ?>><?php echo esc_html__('1/1' , 'xecuter' );?></option>
          <option value="rd-ratio135" <?php  if ( $ratio == 'rd-ratio135' )echo 'selected=""'; ?>><?php echo esc_html__('3/5' , 'xecuter' );?></option>
        </select>
		</td>
    </tr>  
    
	<!---------------------------------- Image Ratio 2 ------------------------------------->
	<tr id="cats-xecuter_ratio2"  class="form-field   rd-category">
      	<th scope="row" class="row-cats" valign="top"><label class="row-cats" for="xecuter_ratio2"><?php echo esc_html__('Image Ratio' , 'xecuter' );?></label></th>
		<td>
       	<select name="xecuter_ratio2" id="xecuter_ratio" >
          <option value="rd-ratio40f" <?php  if ($ratio2 == 'rd-ratio40f' )echo 'selected=""'; ?>><?php echo esc_html__('2/5' , 'xecuter' );?></option>
          <option value="rd-ratio60f" <?php  if ($ratio2 == 'rd-ratio60f' )echo 'selected=""'; ?>><?php echo esc_html__('16/6' , 'xecuter' );?></option>
        </select>
		</td>
    </tr>
    
	<!---------------------------------- Image Height ------------------------------------->
	<tr id="cats-xecuter_height"  class="form-field   rd-category">
      	<th scope="row" class="row-cats" valign="top"><label class="row-cats" for="xecuter_height"><?php echo esc_html__('Image Height' , 'xecuter' );?></label></th>
		<td>
       	<select name="xecuter_height" id="xecuter_height" >
          <option value="rd-300px" <?php  if($height == 'rd-300px' )echo 'selected=""'; ?>><?php echo esc_html__('300px' , 'xecuter' );?></option>
          <option value="rd-400px" <?php  if($height == 'rd-400px' )echo 'selected=""'; ?>><?php echo esc_html__('400px' , 'xecuter' );?></option>
          <option value="rd-500px" <?php  if($height == 'rd-500px' )echo 'selected=""'; ?>><?php echo esc_html__('500px' , 'xecuter' );?></option>
          <option value="rd-600px" <?php  if($height == 'rd-600px' )echo 'selected=""'; ?>><?php echo esc_html__('600px' , 'xecuter' );?></option>
          </select>
		</td>
    </tr>  
    <?php xecuter_category_checkbox( esc_html__('Show Excerpt Posts' , 'xecuter' ),'xecuter_excerpt',$excerpt );?>
 
	<!---------------------------------- Limit Title length ------------------------------------->
 	<tr  class="form-field rd-category">
    	<th scope="row" class="row-cats" valign="top"><label  class="row-cats" for="xecuter_title_limit"><?php echo esc_html__('Limit Title length' , 'xecuter' );?></label></th>
		<td>
        	<input type="text" name="xecuter_title_limit" id="xecuter_title_limit" size="25" style="width:50px;" value="<?php echo esc_attr($title_limit); ?>">
    		<br />
    	</td>
	</tr>
	<!---------------------------------- Limit Excerpt length ------------------------------------->
	<tr id="cats-xecuter_excerpt_limit"  class="form-field rd-category">
		<th scope="row" class="row-cats" valign="top"><label  class="row-cats" for="xecuter_excerpt_limit"><?php echo esc_html__('Limit Excerpt length' , 'xecuter' );?></label></th>
		<td>
        	<input type="text" name="xecuter_excerpt_limit" id="xecuter_excerpt_limit" size="25" style="width:50px;" value="<?php echo esc_attr($excerpt_limit);  ?>">
    		<br/>
		</td>
	</tr>
    
    <?php xecuter_category_checkbox( esc_html__('Blog Categories Meta' , 'xecuter' ),'xecuter_blog_meta_category',@$meta_category);?>
  	<?php xecuter_category_checkbox( esc_html__('Blog Review Meta' , 'xecuter' ),'xecuter_blog_meta_review',@$meta_review);?>
    <?php xecuter_category_checkbox( esc_html__('Blog Author Meta' , 'xecuter' ),'xecuter_blog_meta_author',$meta_author);?>
    <?php xecuter_category_checkbox( esc_html__('Blog Date Meta' , 'xecuter' ),'xecuter_blog_meta_date',@$meta_date);?>
     <?php xecuter_category_checkbox( esc_html__('Blog Views Meta' , 'xecuter' ),'xecuter_blog_meta_view',@$meta_view);?>
    <?php xecuter_category_checkbox( esc_html__('Blog Comments Meta' , 'xecuter' ),'xecuter_blog_meta_comments',@$meta_comments);?>  
	<!---------------------------------- Custom Blog ------------------------------------->
     <tr class="form-field-head form-field" >
      <th scope="row"  class="row-cats" valign="top"><label ><?php  echo esc_html__('Custom Style' , 'xecuter' );?></label></th><td></td>
    </tr>    
   
  	<tr class="form-field rd-category meta_xecuter_primary_color meta_xecuter_color">
      	<th scope="row" class="row-cats" valign="top"><label class="row-cats" for="xecuter_primary_color"><?php echo esc_html__('Primary Color','xecuter');?></label></th>
		<td>
			<input  class="cs-wp-color-picker rd-color"  data-rgba="false" type="text" name="xecuter_primary_color" id="xecuter_primary_color" value="<?php echo esc_attr($primary_color);?>">
 		</td>
    </tr>  
    
	<tr class="form-field rd-category meta_xecuter_body_background_color meta_xecuter_color">
      	<th scope="row" class="row-cats" valign="top"><label class="row-cats" for="meta_xecuter_body_background_color"><?php echo esc_html__('Background Color','xecuter');?></label></th>
		<td>
			<input  class="cs-wp-color-picker rd-color"  data-rgba="false" type="text" name="xecuter_body_background_color" id="xecuter_body_background_color" value="<?php echo esc_attr($body_background_color);?>">

		</td>
    </tr>  
        
	<tr class="form-field rd-category meta_xecuter_body_background_type">
      	<th scope="row" class="row-cats" valign="top"><label class="row-cats" for="xecuter_body_background_type"><?php echo esc_html__('Background Type','xecuter');?></label></th>
		<td>
			<select name="xecuter_body_background_type" id="xecuter_body_background_type">
				<option value="" id="xecuter_body_background_type_default" <?php selected($body_background_type, '' ); ?>><?php echo esc_html__('Default','xecuter');?></option>
				<option value="none" id="xecuter_body_background_type_none"  <?php selected( $body_background_type, 'none' ); ?>><?php echo esc_html__('None','xecuter');?></option>
				<option value="pattern" id="xecuter_body_background_type_pattern"  <?php selected( $body_background_type, 'pattern' ); ?>><?php echo esc_html__('Pattern','xecuter');?></option>
				<option value="custom" id="xecuter_body_background_type_custom"  <?php selected( $body_background_type, 'custom' ); ?>><?php echo esc_html__('Custom Image','xecuter');?></option>
			</select>
		</td>
    </tr>    
    
  	<tr class="form-field rd-category meta_xecuter_body_background_pattern">
		<th scope="row" class="row-cats" valign="top"><label  class="row-cats" for=""><?php echo esc_html__('Background Pattern','xecuter');?></label></th>
		<td>
			<?php for ($i = 1; $i <= 23; $i++) {  ?>
				<li>
					<input style="display:none;" name="xecuter_body_background_pattern" id="xecuter_body_background_pattern-default"  value="<?php echo esc_attr($i) ?>" type="radio" <?php checked( $body_background_pattern, $i );?>>
					<a><img src="<?php echo get_template_directory_uri();?>/images/bg/bg<?php echo esc_attr($i)?>.png"></a>
				</li>                    
			<?php }?>  
		</td>
	</tr> 
    
	<tr class="form-field rd-category meta_xecuter_body_background_image">
		<th scope="row" class="row-cats" valign="top"><label  class="row-cats" for="xecuter_body_background_image"><?php echo esc_html__('Custom Background' , 'xecuter' );?></label></th>
		<td>
	  	 		<a class="rd_add_image button button-small"  data-uploader-title="<?php echo esc_attr__('Choose Image','xecuter');?>" data-uploader-button-text="<?php echo esc_attr__('Use This Image','xecuter');?>"> <?php echo esc_html__('Upload','xecuter')?></a>
 				<input type="hidden" name="xecuter_body_background_image" value="<?php echo esc_url($body_background_image);?>">
 		
				<?php if(!empty($body_background_image)){     ?>
 	   			<a class="rd_remove_image button button-small"   ><?php echo  esc_html__('Remove','xecuter');?></a>
 		 		<img   src="<?php echo esc_url($body_background_image) ?>"/> 
                <?php }?>
		</td>
	</tr>
     
<?php
}
 function xecuter_metabox_cats() {
       wp_enqueue_script('xecuter_cats', get_template_directory_uri() . '/framework/assets/js/cats-metabox.js', array('jquery'));
      wp_enqueue_style('xecuter_cats', get_template_directory_uri() . '/framework/assets/css/cats-metabox.css');
  
}
  add_action('admin_enqueue_scripts', 'xecuter_metabox_cats');
 

 
add_action('edited_category', 'xecuter_save_category_fileds', 10, 1);
function xecuter_save_category_fileds($term_id){
	
	if (defined('DOING_AJAX') ) {
	return $term_id;
    }
    if (isset($_POST['xecuter_row_custom'])){ 
		update_term_meta( $term_id, 'xecuter_row_custom', $_POST['xecuter_row_custom']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_row_custom'); 
	}
	
    if (isset($_POST['xecuter_row'])){ 
		update_term_meta( $term_id, 'xecuter_row', $_POST['xecuter_row']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_row'); 
	}
		
	
    if (isset($_POST['xecuter_blog_custom'])){ 
		update_term_meta( $term_id, 'xecuter_blog_custom', $_POST['xecuter_blog_custom']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_blog_custom'); 
	}
	
    if (isset($_POST['xecuter_content_layout'])){ 
		update_term_meta( $term_id, 'xecuter_content_layout', $_POST['xecuter_content_layout']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_content_layout'); 
	}		
	
    if (isset($_POST['xecuter_main_layout'])){ 
		update_term_meta( $term_id, 'xecuter_main_layout', $_POST['xecuter_main_layout']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_main_layout'); 
	}

    if (isset($_POST['xecuter_page_builder'])){ 
		update_term_meta( $term_id, 'xecuter_page_builder', $_POST['xecuter_page_builder']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_page_builder'); 
	}
 

    if (isset($_POST['xecuter_cats_sidebar'])){ 
		update_term_meta( $term_id, 'xecuter_cats_sidebar', $_POST['xecuter_cats_sidebar']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_cats_sidebar'); 
	}	
	
    if (isset($_POST['xecuter_size1'])){ 
		update_term_meta( $term_id, 'xecuter_size1', $_POST['xecuter_size1']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_size1'); 
	}	
 	
    if (isset($_POST['xecuter_size2'])){ 
		update_term_meta( $term_id, 'xecuter_size2', $_POST['xecuter_size2']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_size2'); 
	}				
	
    if (isset($_POST['xecuter_ratio'])){ 
		update_term_meta( $term_id, 'xecuter_ratio', $_POST['xecuter_ratio']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_ratio'); 
	}				
	
    if (isset($_POST['xecuter_ratio2'])){ 
		update_term_meta( $term_id, 'xecuter_ratio2', $_POST['xecuter_ratio2']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_ratio2'); 
	}	
	
    if (isset($_POST['xecuter_height'])){ 
		update_term_meta( $term_id, 'xecuter_height', $_POST['xecuter_height']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_height'); 
	}		
	
    if (isset($_POST['xecuter_excerpt'])){ 
		update_term_meta( $term_id, 'xecuter_excerpt', $_POST['xecuter_excerpt']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_excerpt'); 
	}
	
    if (isset($_POST['xecuter_blog_meta_category'])){ 
		update_term_meta( $term_id, 'xecuter_blog_meta_category', $_POST['xecuter_blog_meta_category']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_blog_meta_category'); 
	}	
	
	
    if (isset($_POST['xecuter_blog_meta_review'])){ 
		update_term_meta( $term_id, 'xecuter_blog_meta_review', $_POST['xecuter_blog_meta_review']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_blog_meta_review'); 
	}	
	
	
    if (isset($_POST['xecuter_blog_meta_author'])){ 
		update_term_meta( $term_id, 'xecuter_blog_meta_author', $_POST['xecuter_blog_meta_author']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_blog_meta_author'); 
	}							 
				
    if (isset($_POST['xecuter_blog_meta_author'])){ 
		update_term_meta( $term_id, 'xecuter_blog_meta_author', $_POST['xecuter_blog_meta_author']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_blog_meta_author'); 
	}	
	
    if (isset($_POST['xecuter_blog_meta_date'])){ 
		update_term_meta( $term_id, 'xecuter_blog_meta_date', $_POST['xecuter_blog_meta_date']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_blog_meta_date'); 
	}
	
    if (isset($_POST['xecuter_blog_meta_view'])){ 
		update_term_meta( $term_id, 'xecuter_blog_meta_view', $_POST['xecuter_blog_meta_view']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_blog_meta_view'); 
	}	
	
    if (isset($_POST['xecuter_blog_meta_comments'])){ 
		update_term_meta( $term_id, 'xecuter_blog_meta_comments', $_POST['xecuter_blog_meta_comments']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_blog_meta_comments'); 
	}
    if (isset($_POST['xecuter_primary_color'])){ 
		update_term_meta( $term_id, 'xecuter_primary_color', $_POST['xecuter_primary_color']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_primary_color'); 
	}
    if (isset($_POST['xecuter_body_background_color'])){ 
		update_term_meta( $term_id, 'xecuter_body_background_color', $_POST['xecuter_body_background_color']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_body_background_color'); 
	}	
		
	
    if (isset($_POST['xecuter_body_background_type'])){ 
		update_term_meta( $term_id, 'xecuter_body_background_type', $_POST['xecuter_body_background_type']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_body_background_type'); 
	}
		
    if (isset($_POST['xecuter_body_background_pattern'])){ 
		update_term_meta( $term_id, 'xecuter_body_background_pattern', $_POST['xecuter_body_background_pattern']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_body_background_pattern'); 
	}
				
		
    if (isset($_POST['xecuter_body_background_image'])){ 
		update_term_meta( $term_id, 'xecuter_body_background_image', $_POST['xecuter_body_background_image']); 
	}else{
		delete_term_meta( $term_id, 'xecuter_body_background_image'); 
	}	
	
	
 
}
