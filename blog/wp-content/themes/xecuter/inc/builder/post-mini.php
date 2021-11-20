<?php
/********************************************************************
Post Main Featured 1 Column
*********************************************************************/
function xecuter_mini_featured_1c() {  
  	$ratio = xecuter_data('ratio');

  	if($ratio== 'rd-ratio100'|| $ratio== 'rd-ratio135' ){
		$post ='rd-post-1-2';$image = 'xecuter_big';
		
 	} else {
		$post ='rd-post-1-3';$image = 'xecuter_large';
	}
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
	
		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_3($post.' rd-979-3c  rd-767-1c rd-499-1c',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_mini_featured_2c', 'xecuter_mini_featured_2c');
add_action('wp_ajax_xecuter_mini_featured_2c', 'xecuter_mini_featured_2c');
/********************************************************************
Post Main Featured 2 Column
*********************************************************************/
function xecuter_mini_featured_2c() {  
  	$ratio = xecuter_data('ratio');
 	if($ratio== 'rd-ratio135' ){
  		$post ='rd-post-1-4';$image = 'xecuter_large';
		
	} elseif($ratio== 'rd-ratio100' ){ 
  		$post ='rd-post-1-5';$image = 'xecuter_large';
		
	} else {
		$post ='rd-post-1-6';$image = 'xecuter_medium';
	} 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-2  rd-col-979-1c  rd-col-767-2c rd-col-499-2c">';
			xecuter_post_module_3($post.' rd-post-1-3  rd-979-3c  rd-767-2c rd-499-2c ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_mini_featured_2c', 'xecuter_mini_featured_2c');
add_action('wp_ajax_xecuter_mini_featured_2c', 'xecuter_mini_featured_2c');
/********************************************************************
Post Main Featured 3 Column
*********************************************************************/
function xecuter_mini_featured_3c() {  
 	$ratio = xecuter_data('ratio');
  	if(  $ratio== 'rd-ratio135'){
		$image = 'xecuter_medium';
		
	}elseif($ratio== 'rd-ratio100' ){
		$image = 'xecuter_medium';
		
	} else {
		$image = 'xecuter_small';
	}	
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-3  ">';
			xecuter_post_module_3(' rd-post-1-8 rd-col-1-1 ',$image,false,false ,false);
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_mini_featured_3c', 'xecuter_mini_featured_3c');
add_action('wp_ajax_xecuter_mini_featured_3c', 'xecuter_mini_featured_3c');
/********************************************************************
Post Main Grid 1 Column
*********************************************************************/
function xecuter_mini_grid_1c() { 
  	$ratio = xecuter_data('ratio');
  	if($ratio== 'rd-ratio100'|| $ratio== 'rd-ratio135' ){
 		$image = 'xecuter_big';
  	} else {
		$image = 'xecuter_large';
	} 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_2('rd-post-1-3 rd-col-1-1  rd-979-3c  rd-767-1c rd-499-1c ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
} 
add_action('wp_ajax_nopriv_xecuter_mini_grid_1c', 'xecuter_mini_grid_1c');
add_action('wp_ajax_xecuter_mini_grid_1c', 'xecuter_mini_grid_1c');
/********************************************************************
Post Main Grid 2 Column
*********************************************************************/
function xecuter_mini_grid_2c() {  
 	$ratio = xecuter_data('ratio');

 	if($ratio== 'rd-ratio135' ){
  		$image = 'xecuter_large';
		
	} else {
	 	$image = 'xecuter_medium';
	}
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-2 rd-col-979-1c  rd-col-767-2c rd-col-499-2c">';
			xecuter_post_module_2('rd-post-1-6 rd-col-1-1  rd-979-3c  rd-767-2c rd-499-2c',$image,xecuter_data('post_title'),false,xecuter_data('meta_category'));
		echo'</div>';
		echo'<div class="rd-row"></div>';
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_mini_grid_2c', 'xecuter_mini_grid_2c');
add_action('wp_ajax_xecuter_mini_grid_2c', 'xecuter_mini_grid_2c'); 
/********************************************************************
Post Main List 1 Column
*********************************************************************/
function xecuter_mini_list_1c() {  
	$size=xecuter_data('size');
	$ratio=xecuter_data('ratio');
	if($size == 'rd-img-large'){ $post_size = 'rd-post-large';}
	elseif($size =='rd-img-medium'){$post_size = 'rd-post-medium';}
	else {$post_size = 'rd-post-small';}
 	if($ratio == 'rd-ratio135'){ $post_ratio = 'rd-post-135';}
	elseif($ratio =='rd-ratio100'){$post_ratio = 'rd-post-100';}
	elseif($ratio =='rd-ratio75'){$post_ratio = 'rd-post-75';}
	else {$post_ratio = 'rd-post-60';}
	if($size == 'rd-img-large' && $ratio == 'rd-ratio135'){
		$image = 'xecuter_large';
		
	}elseif(($size == 'rd-img-medium' && $ratio == 'rd-ratio60')|| ($size == 'rd-img-medium' && $ratio == 'rd-ratio100')){
		$image = 'xecuter_small';
		
	}else {
		$image = 'xecuter_medium';
	} 
	 
	
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_1($post_size.' '.$post_ratio.' rd-post-1-3  rd-col-1-1    '.xecuter_data('size'),$image,xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
		echo'<div class="rd-row"></div>';
   	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_mini_list_1c', 'xecuter_mini_list_1c');
add_action('wp_ajax_xecuter_mini_list_1c', 'xecuter_mini_list_1c');
/********************************************************************
Post Main List 2 
*********************************************************************/ 
function xecuter_mini_list_2() { 
	$ajax=xecuter_data('count');
   	$count=!empty($ajax) ? 1 :0;
	$size=xecuter_data('size');
	$ratio=xecuter_data('ratio');
	if($size == 'rd-img-large'){ $post_size = 'rd-post-large';  $image  = 'xecuter_medium';}
	else {$post_size = 'rd-post-medium'; $image  = 'xecuter_small'; }
 
	if($ratio =='rd-ratio75'){
		$post_ratio = 'rd-post-75';$meta_category= xecuter_data('meta_category');
	}
	else {$post_ratio = 'rd-post-60';$meta_category='';}
 	
	 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
	
		if($count==1 ){
			echo'<div class="rd-grid  rd-post-item rd-col-1-1">';
				xecuter_post_module_2( ' rd-post-1-3 rd-col-1-1 rd-979-3c rd-767-1c rd-499-1c','xecuter_large',true,xecuter_data('excerpt'),xecuter_data('meta_category'));
  			echo'</div>';
		} else {
 			echo'<div class="rd-list  rd-post-item  rd-col-1-1">';
			xecuter_post_module_1($post_size.' '.$post_ratio.'  rd-post-1-3 rd-post-1-3 rd-col-1-1 '.xecuter_data('size'),$image,false, $meta_category);
			echo'</div>';
 		}
		echo'<div class="rd-row"></div>';

  	endwhile; 
	endif; 
} 
add_action('wp_ajax_nopriv_xecuter_mini_list_2', 'xecuter_mini_list_2');
add_action('wp_ajax_xecuter_mini_list_2', 'xecuter_mini_list_2');
/********************************************************************
Post Main List 3
*********************************************************************/ 
function xecuter_mini_list_3() { 
	$ajax=xecuter_data('count');
   	$count=!empty($ajax) ? 1 :0;
	$size=xecuter_data('size');
	$ratio=xecuter_data('ratio');
	if($size == 'rd-img-large'){ $post_size = 'rd-post-large';  $image  = 'xecuter_medium';}
	else {$post_size = 'rd-post-medium'; $image  = 'xecuter_small'; }
 
	if($ratio =='rd-ratio75'){
		$post_ratio = 'rd-post-75';$meta_category= xecuter_data('meta_category');
	}
	else {$post_ratio = 'rd-post-60';$meta_category='';}
 	
 	
	 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
	
		if($count==1 ){
			echo'<div class="rd-featured  rd-post-item rd-col-1-1">';
				xecuter_post_module_3( ' rd-post-1-3 rd-col-1-1 rd-979-3c rd-767-1c rd-499-1c ','xecuter_large',xecuter_data('post_title'),false,xecuter_data('meta_category'));
  			echo'</div>';
		} else {
 			echo'<div class="rd-list  rd-post-item  rd-col-1-1">';
			xecuter_post_module_1($post_size.' '.$post_ratio.' rd-post-1-3 rd-post-1-3 rd-col-1-1 '.xecuter_data('size'),$image,false, $meta_category);
			echo'</div>';
		echo'<div class="rd-row"></div>';
 		}
 
  	endwhile; 
	endif; 
} 
add_action('wp_ajax_nopriv_xecuter_mini_list_3', 'xecuter_mini_list_3');
add_action('wp_ajax_xecuter_mini_list_3', 'xecuter_mini_list_3');
/********************************************************************
Post Main Text 1 Column
*********************************************************************/
function xecuter_mini_text_1c() {  
	 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_4( ' rd-post-1-3  rd-col-1-1 ',xecuter_data('excerpt'));
		echo'</div>';
		echo'<div class="rd-padding rd-padding-text"></div>';
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_mini_text_1c', 'xecuter_mini_text_1c');
add_action('wp_ajax_xecuter_mini_text_1c', 'xecuter_mini_text_1c');
/********************************************************************
Post Main Text 2  
*********************************************************************/
 function xecuter_mini_text_2() { 
	$ajax=xecuter_data('count');
   	$count=!empty($ajax) ? 1 :0;
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
	
		if($count==1 ){
			echo'<div class="rd-grid  rd-post-item rd-col-1-1">';
				xecuter_post_module_2( ' rd-post-1-3 rd-col-1-1 rd-979-3c rd-767-1c rd-499-1c','xecuter_large',true,xecuter_data('excerpt'),xecuter_data('meta_category'));
  			echo'</div>';
		} else {
 			echo'<div class="rd-text  rd-post-item  rd-col-1-1">';
			xecuter_post_module_4( ' rd-post-1-3  rd-col-1-1 ',false);
			echo'</div>';
 		}
		echo'<div class="rd-padding rd-padding-text"></div>';

  	endwhile; 
	endif; 
} 
add_action('wp_ajax_nopriv_xecuter_mini_text_2', 'xecuter_mini_text_2');
add_action('wp_ajax_xecuter_mini_text_2', 'xecuter_mini_text_2');
/********************************************************************
Post Main Text 3  
*********************************************************************/
function xecuter_mini_text_3() { 
	$ajax=xecuter_data('count');
   	$count=!empty($ajax) ? 1 :0;
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
	
		if($count==1 ){
			echo'<div class="rd-featured  rd-post-item rd-col-1-1">';
				xecuter_post_module_3( ' rd-post-1-3 rd-col-1-1 rd-979-3c rd-767-1c rd-499-1c ','xecuter_large',xecuter_data('post_title'),false,xecuter_data('meta_category'));
  			echo'</div>';
		} else {
 			echo'<div class="rd-text  rd-post-item  rd-col-1-1">';
			xecuter_post_module_4( ' rd-post-1-3  rd-col-1-1 ',false);
			echo'</div>';
		echo'<div class="rd-padding rd-padding-text"></div>';
 		}
 
  	endwhile; 
	endif; 
} 
add_action('wp_ajax_nopriv_xecuter_mini_text_3', 'xecuter_mini_text_3');
add_action('wp_ajax_xecuter_mini_text_3', 'xecuter_mini_text_3');
?>