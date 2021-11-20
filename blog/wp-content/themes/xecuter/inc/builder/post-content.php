<?php
/********************************************************************
Post Contnet Featured 1 Column
*********************************************************************/
function xecuter_content_featured_1c() {  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_3('rd-post-1-1 rd-979-1c rd-767-1c rd-499-1c ','full',xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_featured_1c', 'xecuter_content_featured_1c');
add_action('wp_ajax_xecuter_content_featured_1c', 'xecuter_content_featured_1c');
/********************************************************************
Post Contnet Featured 2 Column
*********************************************************************/
function xecuter_content_featured_2c() {  
 
 	$ratio = xecuter_data('ratio');
	if($ratio== 'rd-ratio100'|| $ratio== 'rd-ratio135' ){
		$post ='rd-post-2-3';$image = 'full'; 
		
 	} else {
		$post ='rd-post-1-2';$image = 'xecuter_big'; 
	}
	  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-2 rd-col-1-2 rd-col-499-1c">';
			xecuter_post_module_3($post. '  rd-979-2c rd-767-2c  rd-499-1c ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_featured_2c', 'xecuter_content_featured_2c');
add_action('wp_ajax_xecuter_content_featured_2c', 'xecuter_content_featured_2c');
/********************************************************************
Post Contnet Featured 3 Column
*********************************************************************/
function xecuter_content_featured_3c() {  
	
 	$ratio = xecuter_data('ratio');
	if($ratio== 'rd-ratio100'|| $ratio== 'rd-ratio135' ){
		$post ='rd-post-1-2';$image = 'xecuter_big'; 
		
 	} else {
		$post ='rd-post-1-3';$image = 'xecuter_large'; 
	}
		
  	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-3 rd-col-979-2c rd-col-767-2c rd-col-499-1c ">';
			xecuter_post_module_3($post. ' rd-col-1-1  rd-979-2c rd-767-2c rd-499-1c  ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_featured_3c', 'xecuter_content_featured_3c');
add_action('wp_ajax_xecuter_content_featured_3c', 'xecuter_content_featured_3c');
/********************************************************************
Post Contnet Featured 4 Column
*********************************************************************/
function xecuter_content_featured_4c() { 
 	$ratio = xecuter_data('ratio');
  
	if($ratio== 'rd-ratio135'){
		$post ='rd-post-1-3';$image = 'xecuter_big'; 
		
	}elseif($ratio== 'rd-ratio100' ){
		$post ='rd-post-1-3';$image = 'xecuter_large'; 
		
	}else{
		$post ='rd-post-1-4';$image = 'xecuter_large'; 
 	} 
 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-4 rd-col-979-2c rd-col-767-2c  rd-col-499-1c">';
			xecuter_post_module_3($post.' rd-col-1-1 rd-979-2c rd-767-2c rd-499-1c ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_featured_4c', 'xecuter_content_featured_4c');
add_action('wp_ajax_xecuter_content_featured_4c', 'xecuter_content_featured_4c');
/********************************************************************
Post Contnet Featured 5 Column
*********************************************************************/
function xecuter_content_featured_5c() {
	
 	$ratio = xecuter_data('ratio');
 	if($ratio== 'rd-ratio100'){
		$post ='rd-post-1-4';$image = 'xecuter_large'; 
		
	}  elseif($ratio== 'rd-ratio135'){
		$post ='rd-post-1-4';$image = 'xecuter_big'; 

	}  else {
		$post ='rd-post-1-5';$image = 'xecuter_medium'; 
	}
 	  
 	$query = xecuter_query();
 	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-5  rd-col-979-2c rd-col-767-2c  rd-col-499-1c">';
			xecuter_post_module_3($post.' rd-979-3c rd-767-2c rd-499-1c ',$image, xecuter_data('post_title'),false,xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_featured_5c', 'xecuter_content_featured_5c');
add_action('wp_ajax_xecuter_content_featured_5c', 'xecuter_content_featured_5c');
/********************************************************************
Post Contnet Featured 6 Column
*********************************************************************/
function xecuter_content_featured_6c() {  
  	$ratio = xecuter_data('ratio');
  	if($ratio== 'rd-ratio100'){
		$post ='rd-post-1-5';$image = 'xecuter_large'; 
		
	} elseif($ratio== 'rd-ratio135'){
		$post ='rd-post-1-5';$image = 'xecuter_large'; 

	} else {
		$post ='rd-post-1-6';$image = 'xecuter_medium'; 
	} 
 	$query = xecuter_query(); 
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-6 rd-col-1-6 rd-col-979-3c rd-col-767-2c  rd-col-499-2c">';
			xecuter_post_module_3($post.' rd-979-3c rd-767-2c rd-499-2c ',$image,xecuter_data('post_title'),false,xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_featured_6c', 'xecuter_content_featured_6c');
add_action('wp_ajax_xecuter_content_featured_6c', 'xecuter_content_featured_6c');
/********************************************************************
Post Contnet Featured 8 Column
*********************************************************************/
function xecuter_content_featured_8c() {
  	$ratio = xecuter_data('ratio');	
 	if($ratio== 'rd-ratio135'){
		$post ='rd-post-1-6';$image = 'xecuter_large'; 
	} else {
		$post ='rd-post-1-8';$image = 'xecuter_medium'; 
	}
	  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-8 rd-col-979-2c rd-col-767-2c  rd-col-499-2c">';
			xecuter_post_module_3($post.' rd-979-3c rd-767-2c rd-499-2c ',$image,xecuter_data('post_title'), false,false);
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_featured_8c', 'xecuter_content_featured_8c');
add_action('wp_ajax_xecuter_content_featured_8c', 'xecuter_content_featured_8c');
/********************************************************************
Post Contnet Featured 10 Column
*********************************************************************/
function xecuter_content_featured_10c() {
  	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-10 rd-col-979-5c rd-col-767-5c  rd-col-499-2c ">';
			xecuter_post_module_3('rd-post-1-10 ', 'xecuter_big',false, false,false);
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_featured_10c', 'xecuter_content_featured_10c');
add_action('wp_ajax_xecuter_content_featured_10c', 'xecuter_content_featured_10c');
/********************************************************************
Post Content Slider Featured 1
*********************************************************************/
function xecuter_content_slider_featured_1() {
	$count=0;
	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
				xecuter_post_module_3('rd-post-2-3 rd-col-2-3 rd-post-2-3 rd-col-2-3 rd-979-1c rd-col-979-1c rd-767-1c rd-col-767-1c rd-col-499-1c rd-499-1c ','xecuter_big',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
		}
			if($count==2 || $count==3){
				xecuter_post_module_3('rd-post-1-3 rd-col-1-3 rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c  rd-499-1c rd-col-499-1c ','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			}
		if($count==3){
 			$count=0;
			echo'</div>';
		}
		
 	endwhile; 
	endif; 
}
/********************************************************************
Post Content Slider Featured 2
*********************************************************************/
function xecuter_content_slider_featured_2() {
	$count=0;
	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
				xecuter_post_module_3(' rd-post-1-2 rd-col-1-2 rd-col-1-2 rd-979-1c rd-col-979-1c rd-767-1c rd-col-767-1c rd-col-499-1c rd-499-1c','xecuter_big',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
		} 
		if($count==2 || $count==3|| $count==4|| $count==5){
				xecuter_post_module_3( 'rd-post-1-4 rd-col-1-4 rd-col-1-4 rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c  rd-499-2c rd-col-499-2c ','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
		}
		if($count==5){
			$count=0;
			echo'</div>';
		}
 	endwhile; 
	endif; 
}
/********************************************************************
Post Content Slider Featured 3
*********************************************************************/
function xecuter_content_slider_featured_3() {
	$count=0;
	$ratio = xecuter_data('ratio');

	if($ratio== 'rd-ratio100'){
		$post='rd-post-1-2';$post_2='rd-post-1-4';$image='xecuter_large';
	} else {
		$post='rd-post-2-5';$post_2='rd-post-1-5';$image='xecuter_medium';
	}
  	
	$none_meta =  $ratio== 'rd-ratio60'  ? 'rd-meta-none' :'';
  
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
				xecuter_post_module_3($post.' rd-col-2-5 rd-979-1c rd-col-979-1c rd-767-1c rd-col-767-1c rd-col-499-1c rd-499-1c ','xecuter_big',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
		}
			if($count==2 || $count==3|| $count==4|| $count==5 || $count==6|| $count==7){
				xecuter_post_module_3( $post_2.' rd-col-1-5 rd-979-3c rd-col-979-3c rd-col-767-3c rd-767-3c rd-col-499-2c  rd-499-2c '.$none_meta.' ',$image,xecuter_data('post_title'), false,xecuter_data('meta_category'));
			}
		if($count==7){
			$count=0;
			echo'</div>';
		}
  	endwhile; 
	endif; 
}
/********************************************************************
Post Content Slider Featured 4
*********************************************************************/
function xecuter_content_slider_featured_4() {
	$count=0; 
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
		}	
			
 			if($count==1 || $count ==2 ){
				xecuter_post_module_3( 'rd-post-1-2 rd-col-1-2 rd-979-2c rd-col-979-2c rd-767-2c rd-col-767-2c rd-col-499-1c rd-499-1c ','xecuter_big',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
			 }			 
 			 if($count ==3 || $count==4|| $count==5 ){
				xecuter_post_module_3(  'rd-post-1-3 rd-col-1-3 rd-979-3c rd-col-979-3c rd-col-767-3c rd-767-3c rd-col-499-1c  rd-499-1c ','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 }
		if($count==5){
			 	$count=0;
			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Content Slider Featured 5
*********************************************************************/
function xecuter_content_slider_featured_5() {
	$count=0;
	
	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
		}	
			
 			if($count==1 || $count ==2 ){
				xecuter_post_module_3( ' rd-post-1-2 rd-col-1-2 rd-979-2c rd-col-979-2c rd-767-2c rd-col-767-2c rd-col-499-1c rd-499-1c ','xecuter_big',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
			 }			 
 			 if($count ==3 || $count==4|| $count==5  || $count==6 ){
				xecuter_post_module_3(  'rd-post-1-4 rd-col-1-4 rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c rd-col-499-2c rd-499-2c ','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 }
		if($count==6){
			 	$count=0;
			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Content Slider Featured 6
*********************************************************************/
function xecuter_content_slider_featured_6() {
	$count=0;
	$ratio = xecuter_data('ratio');
	$none_meta =  $ratio== 'rd-ratio60'  ? 'rd-meta-none' :'';
	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
		}	
			
 			if($count==1 || $count ==2 ){
				xecuter_post_module_3('rd-post-1-2 rd-col-1-2  rd-979-2c rd-col-979-2c rd-767-2c rd-col-767-2c rd-col-499-1c rd-499-1c ','xecuter_big',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
			 }			 
		 
 			 if($count == 3 || $count==4 ){
				xecuter_post_module_3('rd-post-1-5 rd-col-1-5 rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c rd-col-499-2c rd-499-2c '.$none_meta.' ','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 } 
			 
  			 if($count ==5 || $count==6 ){
				xecuter_post_module_3('rd-post-1-5 rd-col-1-5 rd-979-3c rd-col-979-3c rd-col-767-3c rd-767-3c rd-col-499-2c  rd-499-2c '.$none_meta.' ','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 } 		 
 
		if($count==7){
				xecuter_post_module_3('rd-post-1-5 rd-col-1-5 rd-979-3c rd-col-979-3c rd-col-767-3c rd-767-3c rd-col-499-1c  rd-499-1c '.$none_meta.' ','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 	$count=0;
			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Content Slider Featured 7
*********************************************************************/
function xecuter_content_slider_featured_7() {
	$count=0;
	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item  ">';
		}	
			
 			if($count==1 || $count ==2|| $count ==3  ){
				xecuter_post_module_3( 'rd-post-1-3 rd-col-1-3  rd-979-3c rd-col-979-3c rd-col-767-3c rd-767-3c rd-col-499-1c rd-499-1c ','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 }			 
			 
			 
 			 if( $count==4|| $count==5  || $count==6 || $count==7 ){
				xecuter_post_module_3(  'rd-post-1-4 rd-col-1-4 rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c rd-col-499-2c rd-499-2c','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 }
		if($count==7){
			$count=0;
			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Content Slider Featured 8
*********************************************************************/
function xecuter_content_slider_featured_8() {
	$count=0;
	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
 		
				echo'<section class="rd-post-flex rd-col-3-4 rd-col-3-4 rd-col-979-1c">';
					xecuter_post_module_3('rd-post-1-2 rd-col-2-3 rd-979-1c rd-col-979-1c rd-col-767-1c rd-767-1c rd-col-499-1c rd-499-1c ','xecuter_big',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
		}
		if($count==2 || $count==3){
					xecuter_post_module_3( 'rd-post-1-4 rd-col-1-3 rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c rd-col-499-1c rd-499-1c','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
		}
			if($count==3){
				echo'</section>';
				echo'<section class="rd-post-flex rd-col-1-4">';
 			}
 				if($count==4 || $count==5){
 					xecuter_post_module_3( 'rd-post-1-4 rd-col-1-1  rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c rd-col-499-1c rd-499-1c','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
		}
		if($count==5){
 			$count=0;
				echo'</section>';
			echo'</div>';
		}
 	endwhile; 
	endif; 
}
/********************************************************************
Post Content Slider Featured 9
*********************************************************************/
function xecuter_content_slider_featured_9() {
	$count=0;
	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1 ){
			echo'<div class="rd-post-item rd-col-1-3">';
			
		}  		
			xecuter_post_module_3( 'rd-post-1-3 rd-col-1-1 rd-979-2c rd-767-2c rd-499-1c','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));			 

		if( $count==2 ){ 
			$count=0;
   			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Content Slider Featured 10
*********************************************************************/
function xecuter_content_slider_featured_10() {
	$count=0;
	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1 ){
			echo'<div class="rd-post-item rd-col-1-4">';
 		}  		
		
			xecuter_post_module_3(  'rd-post-1-4 rd-col-1-1 rd-979-2c rd-767-2c rd-499-1c','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));			 

		if( $count==2 ){ $count=0;
   			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Content Slider Vertical
*********************************************************************/
function xecuter_content_slider_vertical() {  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_3('rd-post-2-3 rd-979-1c  rd-767-1c  rd-499-1c ','full',xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
/********************************************************************
Post Content Grid 1 Column
*********************************************************************/
function xecuter_content_grid_1c() {  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_2('rd-post-1-1 rd-col-1-1  rd-979-1c rd-767-1c rd-499-1c ','full',xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
		echo'<div class="rd-padding"></div>';
 	endwhile; 
	endif; 
} 
add_action('wp_ajax_nopriv_xecuter_content_grid_1c', 'xecuter_content_grid_1c');
add_action('wp_ajax_xecuter_content_grid_1c', 'xecuter_content_grid_1c');
/********************************************************************
Post Content Grid 2 Column
*********************************************************************/
function xecuter_content_grid_2c() { 
	$ratio = xecuter_data('ratio');
	
	if($ratio== 'rd-ratio135'){$image='full';} 
	else {$image='xecuter_big';} 
	
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-2 rd-col-979-2c rd-col-767-2c rd-col-499-1c">';
			xecuter_post_module_2('rd-post-1-2 rd-col-1-1  rd-979-2c rd-767-2c rd-499-1c ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
		echo'<div class="rd-row"></div>';
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_grid_2c', 'xecuter_content_grid_2c');
add_action('wp_ajax_xecuter_content_grid_2c', 'xecuter_content_grid_2c');
/********************************************************************
Post Content Grid 3 Column
*********************************************************************/
function xecuter_content_grid_3c($slider = false) {  
	$ratio = xecuter_data('ratio');
	if($ratio== 'rd-ratio135'|| $ratio== 'rd-ratio100'){
		$image='xecuter_big';
	} else {
		$image='xecuter_large';
	} 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-3 rd-col-979-3c rd-col-767-3c rd-col-499-1c ">';
			xecuter_post_module_2('rd-post-1-3 rd-col-1-1  rd-979-3c rd-767-3c rd-499-1c  ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
		if(empty($slider)) echo'<div class="rd-row"></div>';
   	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_grid_3c', 'xecuter_content_grid_3c');
add_action('wp_ajax_xecuter_content_grid_3c', 'xecuter_content_grid_3c');
/********************************************************************
Post Content Grid 4 Column
*********************************************************************/
function xecuter_content_grid_4c($slider = false) {  
	$ratio = xecuter_data('ratio');
	if($ratio== 'rd-ratio135'){$image='xecuter_big';} 
	else {$image='xecuter_large';} 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-4 rd-col-979-2c rd-col-767-2c rd-col-499-2c">';
			xecuter_post_module_2('rd-post-1-4 rd-col-1-1 rd-979-2c rd-767-2c rd-499-2c',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
		if(empty($slider)) echo'<div class="rd-row rd-col-979-2c rd-col-767-2c rd-col-499-2c"></div>';
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_grid_4c', 'xecuter_content_grid_4c');
add_action('wp_ajax_xecuter_content_grid_4c', 'xecuter_content_grid_4c');
/********************************************************************
Post Content Grid 5 Column
*********************************************************************/
function xecuter_content_grid_5c($slider = false) {  
	$ratio = xecuter_data('ratio');
	if($ratio== 'rd-ratio135'|| $ratio== 'rd-ratio100'){
		$image='xecuter_large';
	} else {
		$image='xecuter_medium';
	} 

  	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item grid rd-col-1-5  rd-col-979-3c rd-col-767-2c rd-col-499-2c ">';
			xecuter_post_module_2('rd-post-1-5 rd-col-1-1 rd-979-3c rd-767-2c rd-499-2c',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
		if(empty($slider)) echo'<div class="rd-row rd-col-979-3c rd-col-767-2c rd-col-499-2c"></div>';
   	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_grid_5c', 'xecuter_content_grid_5c');
add_action('wp_ajax_xecuter_content_grid_5c', 'xecuter_content_grid_5c');
/********************************************************************
Post Content Grid 6 Column
*********************************************************************/
function xecuter_content_grid_6c($slider = false) { 
	$ratio = xecuter_data('ratio');
	
	if($ratio== 'rd-ratio135' ){$image='xecuter_large';} 
	else {$image='xecuter_medium';}  
	
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-6 rd-col-979-3c rd-col-767-3c rd-col-499-2c">';
			xecuter_post_module_2('rd-post-1-6 rd-col-1-1  rd-979-3c rd-767-3c rd-499-2c ',$image,xecuter_data('post_title'),false,xecuter_data('meta_category'));
		echo'</div>';
		if(empty($slider)) echo'<div class="rd-row rd-col-979-3c rd-col-767-3c rd-col-499-2c "></div>';
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_grid_6c', 'xecuter_content_grid_6c');
add_action('wp_ajax_xecuter_content_grid_6c', 'xecuter_content_grid_6c');
/********************************************************************
Post Content List 1 Column
*********************************************************************/
function xecuter_content_list_1c() { 
	$ratio=xecuter_data('ratio');
 	
	if($ratio == 'rd-ratio60f'  ){ $post = 'rd-post-large';}
	else{$post = 'rd-post-medium';}
	
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_1($post.' rd-post-1-1 rd-post-60  rd-col-1-1 '.xecuter_data('size'),'xecuter_big',true,xecuter_data('meta_category'));
		echo'</div>';
		echo'<div class="rd-padding"></div>';
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_list_1c', 'xecuter_content_list_1c');
add_action('wp_ajax_xecuter_content_list_1c', 'xecuter_content_list_1c');
/********************************************************************
Post Content List 2 Column
*********************************************************************/ 
function xecuter_content_list_2c() { 
	$size=xecuter_data('size');
	$ratio=xecuter_data('ratio');
	
	if($size == 'rd-img-large'){ $post_size = 'rd-post-large';}
	elseif($size =='rd-img-medium'){$post_size = 'rd-post-medium';}
	else {$post_size = 'rd-post-small';}
 	if($ratio == 'rd-ratio135'){ $post_ratio = 'rd-post-135';}
	elseif($ratio =='rd-ratio100'){$post_ratio = 'rd-post-100';}
	elseif($ratio =='rd-ratio75'){$post_ratio = 'rd-post-75';}
	else {$post_ratio = 'rd-post-60';}
 
 	if($size == 'rd-img-large' && $ratio == 'rd-ratio135' ){
		$image = 'xecuter_big';
	}elseif	(($size == 'rd-img-large' && $ratio == 'rd-ratio100') || ($size == 'rd-img-medium' && $ratio == 'rd-ratio135')){
		$image = 'xecuter_large';
	}else {
		$image = 'xecuter_medium';
	}
	 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-2">';
			xecuter_post_module_1($post_size.' '.$post_ratio.' rd-post-1-2  rd-col-1-1 '.xecuter_data('size'),$image ,true,xecuter_data('meta_category'));
		echo'</div>';
		echo'<div class="rd-row"></div>';
		
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_list_2c', 'xecuter_content_list_2c');
add_action('wp_ajax_xecuter_content_list_2c', 'xecuter_content_list_2c');
/********************************************************************
Post Content List 3 Column
*********************************************************************/
function xecuter_content_list_3c() { 
	$size=xecuter_data('size');
 	if($size == 'rd-img-large'){ $post_size = 'rd-post-large';}
	elseif($size =='rd-img-medium'){$post_size = 'rd-post-medium';}
	else {$post_size = 'rd-post-small';}
	
 	$ratio=xecuter_data('ratio');
  	if($ratio == 'rd-ratio135'){ $post_ratio = 'rd-post-135';}
	elseif($ratio =='rd-ratio100'){$post_ratio = 'rd-post-100';}
	elseif($ratio =='rd-ratio75'){$post_ratio = 'rd-post-75';}
	else {$post_ratio = 'rd-post-60';}
 	
	if($size == 'rd-img-large' && $ratio == 'rd-ratio135'){
		$image = 'xecuter_large';
		
	}elseif(($size == 'rd-img-medium' && $ratio == 'rd-ratio60')|| ($size == 'rd-img-medium' && $ratio == 'rd-ratio75')){
		$image = 'xecuter_small';
		
	}else {
		$image = 'xecuter_medium';
	} 
	 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-3">';
			xecuter_post_module_1($post_ratio.' '.$post_size.'  rd-post-1-3 rd-col-1-1 '.xecuter_data('size'),$image ,xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
		echo'<div class="rd-row"></div>';
		
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_list_3c', 'xecuter_content_list_3c');
add_action('wp_ajax_xecuter_content_list_3c', 'xecuter_content_list_3c');
/********************************************************************
Post Content Text 2 Column
*********************************************************************/
function xecuter_content_text_2c() {  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-2">';
			xecuter_post_module_4( ' rd-post-1-2  rd-col-1-1 ',xecuter_data('excerpt'));
		echo'</div>';
		echo'<div class="rd-row"></div>';
		
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_text_2c', 'xecuter_content_text_2c');
add_action('wp_ajax_xecuter_content_text_2c', 'xecuter_content_text_2c');
/********************************************************************
Post Content Text 3 Column
*********************************************************************/
function xecuter_content_text_3c() {  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-3">';
			xecuter_post_module_4( ' rd-post-1-3  rd-col-1-1 ',xecuter_data('excerpt'));
		echo'</div>';
		echo'<div class="rd-row"></div>';
		
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_content_text_3c', 'xecuter_content_text_3c');
add_action('wp_ajax_xecuter_content_text_3c', 'xecuter_content_text_3c');

?>