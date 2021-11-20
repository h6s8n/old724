<?php  
// Blog Layout
global $smof_data;
if ( is_category() ) {
 		$term = get_term_meta(get_query_var( 'cat'  ));
}
$xecuter_row = is_rtl() ? '400_800':'800_400';

if(!empty($term['xecuter_blog_custom'][0])){
	$row = !empty( $term[ 'xecuter_row' ][0] ) ? $term[ 'xecuter_row' ][0] : $xecuter_row;
	$content_layout = !empty( $term[ 'xecuter_content_layout' ][0] ) ? $term[ 'xecuter_content_layout' ][0] : 'grid_4c';
	$main_layout = !empty( $term[ 'xecuter_main_layout' ][0] ) ? $term[ 'xecuter_main_layout' ][0] : 'list_1c';
	$meta_category = !empty( $term['xecuter_blog_meta_category'][0] ) ? $term['xecuter_blog_meta_category'] : '';
	$size1 = !empty( $term[ 'xecuter_size1' ][0] ) ? $term[ 'xecuter_size1' ][0] : 'rd-img-medium';
	$size2 = !empty( $term[ 'xecuter_size2' ][0] ) ? $term[ 'xecuter_size2' ][0] : 'rd-img-medium';
	$height = !empty( $term[ 'xecuter_height' ][0] ) ? $term[ 'xecuter_height' ][0] : 'rd-500px';
	$ratio = !empty( $term[ 'xecuter_ratio' ][0] ) ? $term[ 'xecuter_ratio' ][0] : 'rd-ratio75';
	$ratio2 = !empty( $term[ 'xecuter_ratio2' ][0] ) ? $term[ 'xecuter_ratio2' ][0] : 'rd-ratio60f';
	$excerpt = !empty( $term[ 'xecuter_excerpt' ][0] ) ? $term[ 'xecuter_excerpt' ][0] : '';
	$text_center = !empty( $term[ 'text_center' ][0] ) ? 'rd-text-center' : '';	
} else{
	$row = !empty( $smof_data[ 'xecuter_row' ] ) ? $smof_data[ 'xecuter_row' ] :  $xecuter_row;
	$content_layout = !empty( $smof_data[ 'xecuter_content_layout' ] ) ? $smof_data[ 'xecuter_content_layout' ] : 'grid_4c';
	$main_layout = !empty( $smof_data[ 'xecuter_main_layout' ] ) ? $smof_data[ 'xecuter_main_layout' ] : 'list_1c';
	$meta_category = !empty( $smof_data['xecuter_blog_meta_category'] ) ? $smof_data['xecuter_blog_meta_category'] : '';
	$size1 = !empty( $smof_data[ 'xecuter_size1' ] ) ? $smof_data[ 'xecuter_size1' ] : 'rd-img-medium';
	$size2 = !empty( $smof_data[ 'xecuter_size2' ] ) ? $smof_data[ 'xecuter_size2' ] : 'rd-img-medium';
	$height = !empty( $smof_data[ 'xecuter_height' ] ) ? $smof_data[ 'xecuter_height' ] : 'rd-500px';
	$ratio = !empty( $smof_data[ 'xecuter_ratio' ] ) ? $smof_data[ 'xecuter_ratio' ] : 'rd-ratio75';
	$ratio2 = !empty( $smof_data[ 'xecuter_ratio2' ] ) ? $smof_data[ 'xecuter_ratio2' ] : 'rd-ratio60f';
	$excerpt = !empty( $smof_data[ 'xecuter_excerpt' ] ) ? $smof_data[ 'xecuter_excerpt' ] : '';
	$text_center = !empty( $smof_data[ 'text_center' ] ) ? 'rd-text-center' : '';
}  
// Content Grid 1
if($row=='1200' && $content_layout=='grid_1c'){
	echo '<div class="rd-grid  rd_content_grid_1c '.esc_attr($height).' '.esc_attr($text_center).' ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item">';
			xecuter_post_blog_2('rd-post-1-1 rd-col-1-1  rd-979-1c rd-767-1c rd-499-1c ','full',$excerpt,$meta_category);
			echo'</div>';
			echo'<div class="rd-padding"></div>';
 		endwhile;
		endif;
	echo '</div>';
	echo '</div>';	
}   
if($row=='1200' && $content_layout=='grid_2c'){
 	if($ratio== 'rd-ratio135'){
		$image='full';
	} else {
		$image='xecuter_big';
	} 
	echo '<div class="rd-grid  rd_content_grid_2c '.esc_attr($ratio).' '.esc_attr($text_center).' ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item  rd-col-1-2 rd-col-979-2c rd-col-767-2c rd-col-499-1c">';
				xecuter_post_blog_2('rd-post-1-2 rd-col-1-1  rd-979-2c rd-767-2c rd-499-1c ',$image,$excerpt ,$meta_category);
			echo'</div>';
			echo'<div class="rd-row"></div>';
  		endwhile; 
		endif;
	echo '</div>';
	echo '</div>';
}
if($row=='1200' && $content_layout=='grid_3c'){
	if($ratio== 'rd-ratio135'|| $ratio== 'rd-ratio100'){
		$image='xecuter_big';
	} else {
		$image='xecuter_large';
	} 
	echo '<div class="rd-grid  rd_content_grid_3c '.esc_attr($ratio).' '.esc_attr($text_center).' ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item  rd-col-1-3 rd-col-979-3c rd-col-767-3c rd-col-499-1c">';
				xecuter_post_blog_2('rd-post-1-3 rd-col-1-1  rd-979-3c rd-767-3c rd-499-1c ',$image,$excerpt ,$meta_category);
			echo'</div>';
			echo'<div class="rd-row"></div>';
  		endwhile; 
		endif;
	echo '</div>';
	echo '</div>';
} 
if($row=='1200' && $content_layout=='grid_4c'){
	if($ratio== 'rd-ratio135'){
		$image='xecuter_big';
	} else {
		$image='xecuter_large';
	} 
	echo '<div class="rd-grid  rd_content_grid_4c '.esc_attr($ratio).' '.esc_attr($text_center).' ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item  rd-col-1-4 rd-col-979-2c rd-col-767-2c rd-col-499-2c">';
				xecuter_post_blog_2('rd-post-1-4 rd-col-1-1 rd-979-2c rd-767-2c rd-499-2c ',$image,$excerpt ,$meta_category);
			echo'</div>';
			echo'<div class="rd-row rd-col-979-2c rd-col-767-2c rd-col-499-2c"></div>';
  		endwhile; 
		endif;
	echo '</div>';
	echo '</div>';
} 
if($row=='1200' && $content_layout=='grid_5c'){
	if($ratio== 'rd-ratio135'|| $ratio== 'rd-ratio100'){
		$image='xecuter_large';
	} else {
		$image='xecuter_medium';
	} 
	echo '<div class="rd-grid  rd_content_grid_5c '.esc_attr($ratio).' '.esc_attr($text_center).' ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item grid rd-col-1-5  rd-col-979-3c rd-col-767-2c rd-col-499-2c ">';
				xecuter_post_blog_2('rd-post-1-5 rd-col-1-1 rd-979-3c rd-767-2c rd-499-2c',$image,$excerpt ,$meta_category);
			echo'</div>';
			echo'<div class="rd-row rd-col-979-3c rd-col-767-2c rd-col-499-2c"></div>';
  		endwhile; 
		endif;
	echo '</div>';
	echo '</div>';
} 

if($row=='1200' && $content_layout=='grid_6c'){
	
	if($ratio== 'rd-ratio135' ){
		$image='xecuter_large';
	} else {
		$image='xecuter_medium';
	} 
	echo '<div class="rd-grid  rd_content_grid_6c '.esc_attr($ratio).' '.esc_attr($text_center).' ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item  rd-col-1-6 rd-col-979-3c rd-col-767-3c rd-col-499-2c">';
				xecuter_post_blog_2('rd-post-1-6 rd-col-1-1  rd-979-3c rd-767-3c rd-499-2c ',$image,false ,$meta_category);
			echo'</div>';
			echo'<div class="rd-row rd-col-979-3c rd-col-767-3c rd-col-499-2c"></div>';
  		endwhile; 
		endif;
	echo '</div>';
	echo '</div>';
} 
/********************************************************************
Content List 
*********************************************************************/
if($row=='1200' && $content_layout=='list_1c'){
	if($ratio2 == 'rd-ratio60f' ){ 
		$post_size = 'rd-post-large';
	} else{
		$post_size = 'rd-post-medium';
	}

	echo '<div class="rd-list  rd_content_list_1c '.esc_attr($ratio2).'  ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item  rd-col-1-1">';
				xecuter_post_blog_1(' rd-post-1-1 rd-post-60 rd-col-1-1 ' .$post_size.' '.$size1,'xecuter_big',true ,$meta_category);
			echo'</div>';
			echo'<div class="rd-padding"></div>';
  		endwhile; 
		endif;
	echo '</div>';
	echo '</div>';
}
if($row=='1200' && $content_layout=='list_2c'){
	if($size2 == 'rd-img-large'){ $post_size = 'rd-post-large';}
	elseif($size2 =='rd-img-medium'){$post_size = 'rd-post-medium';}
	else {$post_size = 'rd-post-small';}
 	if($ratio == 'rd-ratio135'){ $post_ratio = 'rd-post-135';}
	elseif($ratio =='rd-ratio100'){$post_ratio = 'rd-post-100';}
	elseif($ratio =='rd-ratio75'){$post_ratio = 'rd-post-75';}
	else {$post_ratio = 'rd-post-60';}
 
 	if($size2 == 'rd-img-large' && $ratio == 'rd-ratio135' ){
		$image = 'xecuter_big';
	}elseif	(($size2 == 'rd-img-large' && $ratio == 'rd-ratio100') || ($size2 == 'rd-img-medium' && $ratio2 == 'rd-ratio135')){
		$image = 'xecuter_large';
	}else {
		$image = 'xecuter_medium';
	}
	
	echo '<div class="rd-list  rd_content_list_2c '.esc_attr($ratio).'  ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item  rd-col-1-2">';
				xecuter_post_blog_1($post_size.' '.$post_ratio.' rd-post-1-2  rd-col-1-1 '.$size2,$image,true ,$meta_category);
			echo'</div>';
		echo'<div class="rd-row"></div>';
  		endwhile; 
		endif;
	echo '</div>';
	echo '</div>';
}
if($row=='1200' && $content_layout=='list_3c'){
   	if($size1 == 'rd-img-large'){ $post_size = 'rd-post-large';}
	elseif($size1 =='rd-img-medium'){$post_size = 'rd-post-medium';}
	else {$post_size = 'rd-post-small';}
	
	
   	if($ratio == 'rd-ratio135'){ $post_ratio = 'rd-post-135';}
	elseif($ratio =='rd-ratio100'){$post_ratio = 'rd-post-100';}
	elseif($ratio =='rd-ratio75'){$post_ratio = 'rd-post-75';}
	else {$post_ratio = 'rd-post-60';}
 	
	if($size1 == 'rd-img-large' && $ratio == 'rd-ratio135'){
		$image = 'xecuter_large';
		
	}elseif(($size1 == 'rd-img-medium' && $ratio == 'rd-ratio60')|| ($size1 == 'rd-img-medium' && $ratio == 'rd-ratio100')){
		$image = 'xecuter_small';
		
	}else {
		$image = 'xecuter_medium';
	} 
 
	echo '<div class="rd-list  rd_content_list_3c '.esc_attr($ratio).'  ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item  rd-col-1-3">';
				xecuter_post_blog_1($post_ratio.' '.$post_size.'  rd-post-1-3 rd-col-1-1 '.$size1,$image,$excerpt ,$meta_category);
			echo'</div>';
		echo'<div class="rd-row"></div>';
  		endwhile; 
		endif;
	echo '</div>';
	echo '</div>';
} 
/********************************************************************
Main Grid 
*********************************************************************/
if(($row=='800_400' || $row=='400_800') && $main_layout=='grid_1c'){
	echo '<div class="rd-grid  rd_main_grid_1c '.esc_attr($height).' '.esc_attr($text_center).' ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item">';
			xecuter_post_blog_2('rd-post-2-3 rd-col-1-1 rd-979-2c rd-767-1c rd-499-1c ','xecuter_big',$excerpt,$meta_category);
			echo'</div>';
			echo'<div class="rd-padding"></div>';
 		endwhile;
		endif;
	echo '</div>';
	echo '</div>';	
}
if(($row=='800_400' || $row=='400_800') && $main_layout=='grid_2c'){
  	if($ratio== 'rd-ratio100'|| $ratio== 'rd-ratio135' ){
 		$image = 'xecuter_big';
  	} else {
		$image = 'xecuter_large';
	}
	echo '<div class="rd-grid  rd_main_grid_2c '.esc_attr($ratio).' '.esc_attr($text_center).' ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item  rd-col-1-2 rd-979-2c rd-col-767-2c  rd-col-499-1c">';
			xecuter_post_blog_2('rd-post-1-3 rd-col-1-1 rd-979-3c rd-767-2c rd-499-1c ',$image,$excerpt,$meta_category);
			echo'</div>';
			echo'<div class="rd-row rd-979-2c rd-col-767-2c  rd-col-499-1c "></div>';
 		endwhile;
		endif;
	echo '</div>';
	echo '</div>';	
	
}
if(($row=='800_400' || $row=='400_800') && $main_layout=='grid_3c'){
  	if($ratio== 'rd-ratio135'){
		$image = 'xecuter_big';

	}elseif($ratio== 'rd-ratio100'){
   		$image = 'xecuter_large';
		
 	} else {
		 $image = 'xecuter_medium';
	}
	echo '<div class="rd-grid  rd_main_grid_3c '.esc_attr($ratio).' '.esc_attr($text_center).' ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item  rd-col-1-3 rd-col-979-3c rd-col-767-3c rd-col-499-1c">';
			xecuter_post_blog_2('rd-post-1-5 rd-col-1-1 rd-979-4c rd-767-3c rd-499-1c  ',$image,$excerpt,$meta_category);
			echo'</div>';
			echo'<div class="rd-row  rd-col-979-3c rd-col-767-3c rd-col-499-1c"></div>';
 		endwhile;
		endif;
	echo '</div>';
	echo '</div>';	
}
if(($row=='800_400' || $row=='400_800') && $main_layout=='grid_4c'){
 	if($ratio== 'rd-ratio135' ){
  		$image = 'xecuter_large';
		
	} else {
	 	$image = 'xecuter_medium';
	}
	echo '<div class="rd-grid  rd_main_grid_4c '.esc_attr($ratio).' '.esc_attr($text_center).' ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item  rd-col-1-4  rd-col-979-2c rd-col-767-2c rd-col-499-2c ">';
			xecuter_post_blog_2('rd-post-1-6 rd-col-1-1 rd-979-3c rd-767-2c rd-499-2c',$image,false,$meta_category);
			echo'</div>';
			echo'<div class="rd-row rd-col-979-2c rd-col-767-2c rd-col-499-2c"></div>';
 		endwhile;
		endif;
	echo '</div>';
	echo '</div>';	
}
if(($row=='800_400' || $row=='400_800') && $main_layout=='list_1c'){
	if($size2 == 'rd-img-large'){ $post_size = 'rd-post-large';}
	elseif($size2 =='rd-img-medium'){$post_size = 'rd-post-medium';}
	else {$post_size = 'rd-post-small';}
 	if($ratio == 'rd-ratio135'){ $post_ratio = 'rd-post-135';}
	elseif($ratio =='rd-ratio100'){$post_ratio = 'rd-post-100';}
	elseif($ratio =='rd-ratio75'){$post_ratio = 'rd-post-75';}
	else {$post_ratio = 'rd-post-60';}
	
	 	
	if( ($size2 == 'rd-img-large' && ($ratio == 'rd-ratio135'  || $ratio == 'rd-ratio100')) || ($size2 == 'rd-img-medium' && $ratio == 'rd-ratio135' )){
		$image = 'xecuter_big';
		
	} elseif(($size2 == 'rd-img-large' && ($ratio == 'rd-ratio75' || $ratio == 'rd-ratio60')) ||  ( $ratio == 'rd-ratio135' && ($size2 == 'rd-img-medium' || $size2 == 'rd-img-small'))){
		$image = 'xecuter_large';
		
	}else {
		$image = 'xecuter_medium';
	}
	echo '<div class="rd-list  rd_main_list_1c '.esc_attr($ratio).' ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item  rd-col-1-1 ">';
			xecuter_post_blog_1($post_size.' '.$post_ratio.' rd-post-2-3  rd-col-1-1  '.$size2,$image,true,$meta_category);
			echo'</div>';
			echo'<div class="rd-padding"></div>';
 		endwhile;
		endif;
	echo '</div>';
	echo '</div>';
}
if(($row=='800_400' || $row=='400_800') && $main_layout=='list_2c'){
	if($size1 == 'rd-img-large'){ $post_size = 'rd-post-large';}
	else {$post_size = 'rd-post-medium';}
 	if($ratio == 'rd-ratio135'){ $post_ratio = 'rd-post-135';}
	elseif($ratio =='rd-ratio100'){$post_ratio = 'rd-post-100';}
	elseif($ratio =='rd-ratio75'){$post_ratio = 'rd-post-75';}
	else {$post_ratio = 'rd-post-60';}
 	
	if($size1 == 'rd-img-large' && $ratio == 'rd-ratio135'){
		$image = 'xecuter_large';
		
	}elseif(($size1 == 'rd-img-medium' && $ratio == 'rd-ratio60')|| ($size1 == 'rd-img-medium' && $ratio == 'rd-ratio100')){
		$image = 'xecuter_small';
		
	}else {
		$image = 'xecuter_medium';
	} 
	 
	echo '<div class="rd-list  rd_main_list_2c '.esc_attr($ratio).' ">'; 
	echo '<div class="rd-post-list" >';
		if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			echo'<div class="rd-post-item  rd-col-1-2 ">';
			xecuter_post_blog_1($post_size.' '.$post_ratio.'  rd-post-1-3 rd-col-1-1   '.$size1,$image,$excerpt,$meta_category);
			echo'</div>';
			echo'<div class="rd-row"></div>';
 		endwhile;
		endif;
	echo '</div>';
	echo '</div>';
	
}
wp_reset_postdata();?>