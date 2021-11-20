<?php
/********************************************************************
Post Main Featured 1 Column
*********************************************************************/
function xecuter_main_featured_1c() {  
  	$height = xecuter_data('height');

  if($height== 'rd-300px'|| $height== 'rd-400px' ){
		$ratio ='rd-post-60';
		
 	} else {
		$ratio ='rd-post-100';
	}
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item  rd-col-1-1   ">';
			xecuter_post_module_3('rd-post-2-3 rd-979-2c rd-767-1c rd-499-1c  '.$ratio ,'xecuter_big',xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_featured_1c', 'xecuter_main_featured_1c');
add_action('wp_ajax_xecuter_main_featured_1c', 'xecuter_main_featured_1c');
/********************************************************************
Post Main Featured 2 Column
*********************************************************************/
function xecuter_main_featured_2c() {  
  	$ratio = xecuter_data('ratio');
  	if($ratio== 'rd-ratio100'|| $ratio== 'rd-ratio135' ){
		$post ='rd-post-1-2';$image = 'xecuter_big';
		
 	} else {
		$post ='rd-post-1-3';$image = 'xecuter_large';
	}
 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-2 rd-col-499-1c">';
			xecuter_post_module_3($post.' rd-979-2c rd-767-2c rd-499-1c ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_featured_2c', 'xecuter_main_featured_2c');
add_action('wp_ajax_xecuter_main_featured_2c', 'xecuter_main_featured_2c');
/********************************************************************
Post Main Featured 3 Column
*********************************************************************/
function xecuter_main_featured_3c() {  
  	$ratio = xecuter_data('ratio');
  	if($ratio== 'rd-ratio135'){
  		$post ='rd-post-1-3';$image = 'xecuter_big';

	}elseif($ratio== 'rd-ratio100'){
  		$post ='rd-post-1-4';$image = 'xecuter_large';
		
 	} else {
		$post ='rd-post-1-5';$image = 'xecuter_medium';
	}
  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-3 rd-col-979-2c rd-col-767-2c rd-col-499-1c">';
			xecuter_post_module_3($post. ' rd-col-1-1 rd-979-3c rd-767-2c rd-499-1c ',$image,xecuter_data('post_title'),false ,xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_featured_3c', 'xecuter_main_featured_3c');
add_action('wp_ajax_xecuter_main_featured_3c', 'xecuter_main_featured_3c');
/********************************************************************
Post Main Featured 4 Column
*********************************************************************/
function xecuter_main_featured_4c() { 
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
		echo'<div class="rd-post-item rd-col-1-4 rd-col-979-2c rd-col-767-2c rd-col-499-2c">';
			xecuter_post_module_3($post.' rd-col-1-1  rd-979-3c rd-767-2c rd-499-2c ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_featured_4c', 'xecuter_main_featured_4c');
add_action('wp_ajax_xecuter_main_featured_4c', 'xecuter_main_featured_4c');
/********************************************************************
Post Main Featured 5 Column
*********************************************************************/
function xecuter_main_featured_5c() {  
 	$ratio = xecuter_data('ratio');
  	if(  $ratio== 'rd-ratio135'){
		$post ='rd-post-1-6';$image = 'xecuter_large';
		
	}elseif($ratio== 'rd-ratio100' ){
		$post ='rd-post-1-6';$image = 'xecuter_medium';
		
	} else {
		$post ='rd-post-1-8';$image = 'xecuter_small';
	}
 
 	$query = xecuter_query(); 
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-5 rd-col-979-2c rd-col-767-2c rd-col-499-2c ">';
			xecuter_post_module_3($post.'  rd-979-3c rd-767-2c rd-499-2c ',$image,xecuter_data('post_title'),false,false);
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_featured_5c', 'xecuter_main_featured_5c');
add_action('wp_ajax_xecuter_main_featured_5c', 'xecuter_main_featured_5c');
/********************************************************************
Post Main Featured 6 Column
*********************************************************************/
function xecuter_main_featured_6c() {  
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
		echo'<div class="rd-post-item rd-col-1-6 rd-col-979-3c rd-col-767-3c rd-col-499-2c">';
			xecuter_post_module_3(' rd-post-1-8 '.$image,false,false,false);
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_featured_6c', 'xecuter_main_featured_6c');
add_action('wp_ajax_xecuter_main_featured_6c', 'xecuter_main_featured_6c');
/********************************************************************
Post Main Featured 8 Column
*********************************************************************/
function xecuter_main_featured_8c() {
  	$ratio = xecuter_data('ratio');	
 	  if(  $ratio== 'rd-ratio135' || $ratio== 'rd-ratio100'){
		 $image = 'xecuter_medium';
	  }else {
		 $image = 'xecuter_small';
	}	
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-8   rd-col-979-4c rd-col-767-4c rd-col-499-2c">';
			xecuter_post_module_3('rd-post-1-8',$image,false, false,false);
		echo'</div>';
 	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_featured_8c', 'xecuter_main_featured_8c');
add_action('wp_ajax_xecuter_main_featured_8c', 'xecuter_main_featured_8c');

/********************************************************************
Post Main Slider Featured 1
*********************************************************************/
function xecuter_main_slider_featured_1() {
	$count=0;
    $query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
				xecuter_post_module_3('rd-post-1-2 rd-col-2-3 rd-979-2c rd-col-979-1c rd-767-1c rd-col-767-1c  rd-col-499-1c ','xecuter_big',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
		}
			if($count==2 || $count==3){
				xecuter_post_module_3('rd-post-1-5 rd-col-1-3  rd-979-3c rd-col-979-2c rd-767-2c rd-col-767-2c rd-499-1c rd-col-499-1c ','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			}
		if($count==3){
 			$count=0;
			echo'</div>';
		}
		
 	endwhile; 
	endif; 
}
/********************************************************************
Post Main Slider Featured 2
*********************************************************************/
function xecuter_main_slider_featured_2() {
	$count=0;
	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
					xecuter_post_module_3('rd-post-1-3 rd-col-1-2  rd-979-2c rd-col-979-1c rd-767-1c rd-col-767-1c  rd-col-499-1c ','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));
		} 
			 if($count==2 || $count==3|| $count==4|| $count==5){
					xecuter_post_module_3( ' rd-post-1-6 rd-col-1-4   rd-979-3c rd-col-979-2c rd-767-2c rd-col-767-2c  rd-499-2c rd-col-499-2c rd-meta-none ','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 }
		if($count==5){
			 $count=0;
			echo'</div>';
		}
 	endwhile; 
	endif; 
}
/********************************************************************
Post Main Slider Featured 3
*********************************************************************/
function xecuter_main_slider_featured_3() {
	$count=0;
 	$ratio = xecuter_data('ratio');
 	
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
				xecuter_post_module_3('rd-post-1-4 rd-col-2-5  rd-979-2c rd-col-979-1c rd-767-1c rd-col-767-1c rd-col-499-1c rd-499-1c ','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));
		}
			if($count==2 || $count==3|| $count==4|| $count==5 || $count==6|| $count==7){
				xecuter_post_module_3( 'rd-post-1-8 rd-col-1-5  rd-979-3c rd-col-979-2c rd-col-767-3c rd-767-3c rd-col-499-2c  rd-499-2c rd-meta-none ','xecuter_medium',xecuter_data('post_title'), false,false);
			}
		if($count==7){
			$count=0;
			echo'</div>';
		}
  	endwhile; 
	endif; 
}
/********************************************************************
Post Main Slider Featured 4
*********************************************************************/
function xecuter_main_slider_featured_4() {
	$count=0;
    	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
		}	
			
 			if($count==1 || $count ==2 ){
				xecuter_post_module_3(  'rd-post-1-3 rd-col-1-2  rd-979-3c rd-col-979-2c rd-767-2c rd-col-767-2c  rd-col-499-1c ','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 }			 
 			 if($count ==3 || $count==4|| $count==5 ){
				xecuter_post_module_3( ' rd-post-1-5 rd-col-1-3  rd-979-4c rd-col-979-3c rd-767-3c rd-col-767-3c rd-499-1c rd-col-499-1c  ','xecuter_medium',xecuter_data('post_title'), false,false);
			 }
		if($count==5){
			 	$count=0;
			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Main Slider Featured 5
*********************************************************************/
function xecuter_main_slider_featured_5() {
	$count=0;
	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
		}	
			
 			if($count==1 || $count ==2 ){
				xecuter_post_module_3(  'rd-post-1-3 rd-col-1-2  rd-979-3c rd-col-979-2c rd-767-2c rd-col-767-2c  rd-col-499-1c ','xecuter_large',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
			 }			 
 			 if($count ==3 || $count==4|| $count==5  || $count==6 ){
				xecuter_post_module_3(  '  rd-col-1-4 rd-post-1-6 rd-col-1-4   rd-979-3c rd-col-979-2c rd-767-2c rd-col-767-2c  rd-499-2c rd-col-499-2c  rd-meta-none ','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 }
		if($count==6){
			 	$count=0;
			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Main Slider Featured 6
*********************************************************************/
function xecuter_main_slider_featured_6() {
	$count=0;
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
		}	
  			if($count==1 || $count ==2 ){
				xecuter_post_module_3(  'rd-post-1-3 rd-col-1-2  rd-979-3c rd-col-979-2c rd-767-2c rd-col-767-2c  rd-col-499-1c ','xecuter_large',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
			 }			 
  			 if($count == 3 || $count==4 ){
				xecuter_post_module_3('rd-post-1-8 rd-col-1-5 rd-979-3c rd-col-979-2c rd-col-767-2c rd-767-2c rd-col-499-2c rd-499-2c  rd-meta-none ','xecuter_medium',xecuter_data('post_title'), false,false);
			 } 
   			 if($count ==5 || $count==6 ){
				xecuter_post_module_3('rd-post-1-8 rd-col-1-5 rd-979-4c rd-col-979-3c rd-col-767-3c rd-767-3c rd-col-499-2c  rd-499-2c rd-meta-none ','xecuter_medium',xecuter_data('post_title'), false,false);
			 } 		 
 		if($count==7){
				xecuter_post_module_3('rd-post-1-8 rd-col-1-5 rd-979-3c rd-col-979-3c rd-col-767-3c rd-767-3c rd-col-499-1c  rd-499-1c   rd-meta-none','xecuter_medium',xecuter_data('post_title'), false,false);
			 	$count=0;
			echo'</div>';
		}
  	endwhile; 
	endif; 
}
/********************************************************************
Post Main Slider Featured 7
*********************************************************************/
function xecuter_main_slider_featured_7() {
	$count=0;
 
  	 
	 $query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item  ">';
		}	
			
 			if($count==1 || $count ==2|| $count ==3  ){
				xecuter_post_module_3(  ' rd-post-1-5 rd-col-1-3  rd-979-4c rd-col-979-3c rd-767-3c rd-col-767-3c rd-499-1c rd-col-499-1c ','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 }			 
			 
			 
 			 if( $count==4|| $count==5  || $count==6 || $count==7 ){
				xecuter_post_module_3(   ' rd-col-1-4 rd-post-1-6 rd-col-1-4   rd-979-3c rd-col-979-2c rd-767-2c rd-col-767-2c  rd-499-2c rd-col-499-2c  rd-meta-none','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 }
		if($count==7){
			 	$count=0;
			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Main Slider Featured 8
*********************************************************************/
function xecuter_main_slider_featured_8() {
	$count=0;
 
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
 		
				echo'<section class="rd-post-flex rd-col-3-4">';
					xecuter_post_module_3( ' rd-col-2-3 rd-post-1-3  rd-979-2c rd-col-979-1c rd-767-1c rd-col-767-1c  rd-col-499-1c','full',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
		}
		if($count==2 || $count==3){
					xecuter_post_module_3( ' rd-col-1-3  rd-post-1-6    rd-979-3c rd-col-979-2c rd-767-2c rd-col-767-2c  rd-499-2c rd-col-499-2c rd-meta-none','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));
		}
		if($count==3){
			echo'</section>';
			echo'<section class="rd-post-flex rd-col-1-4">';
 		}
 				if($count==4 || $count==5){
 					xecuter_post_module_3(  ' rd-col-1-1  rd-post-1-6  rd-979-3c rd-col-979-2c rd-767-2c rd-col-767-2c  rd-499-2c rd-col-499-2c rd-meta-none','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));
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
Post Main Slider Featured 9
*********************************************************************/
function xecuter_main_slider_featured_9() {
	$count=0;
$ratio = xecuter_data('ratio');
 
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1 ){
			echo'<div class="rd-post-item rd-col-1-3">';
 		}  		
		xecuter_post_module_3( ' rd-col-1-1 rd-post-1-5  rd-979-3c rd-col-979-1c rd-col-767-1c rd-767-2c  rd-499-1c rd-col-499-1c ','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));			 

		 if( $count==2 ){ $count=0;
   			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Main Slider Featured 10
*********************************************************************/
function xecuter_main_slider_featured_10() {
	$count=0;
  	 $query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1 ){
			echo'<div class="rd-post-item rd-col-1-4">';
 		}  		
		xecuter_post_module_3( ' rd-post-1-6  rd-col-1-1 rd-979-3c rd-col-979-1c rd-767-2c rd-col-767-1c  rd-499-2c rd-col-499-1c ','xecuter_medium',xecuter_data('post_title'), false,xecuter_data('meta_category'));			 

		 if( $count==2 ){ $count=0;
   			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Main Slider Featured Vertical
*********************************************************************/
function xecuter_main_slider_vertical() {  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_3('rd-post-1-2 rd-979-2c rd-767-1c rd-499-1c  ','xecuter_big',xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
/********************************************************************
Post Main Grid 1 Column
*********************************************************************/
function xecuter_main_grid_1c() {  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_2('rd-post-2-3 rd-col-1-1 rd-979-2c rd-767-1c rd-499-1c ','xecuter_big',xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
		echo'<div class="rd-padding"></div>';		
 	endwhile; 
	endif; 
} 
add_action('wp_ajax_nopriv_xecuter_main_grid_1c', 'xecuter_main_grid_1c');
add_action('wp_ajax_xecuter_main_grid_1c', 'xecuter_main_grid_1c');
/********************************************************************
Post Main Grid 2 Column
*********************************************************************/
function xecuter_main_grid_2c() {  
  	$ratio = xecuter_data('ratio');
  	if($ratio== 'rd-ratio100'|| $ratio== 'rd-ratio135' ){
 		$image = 'xecuter_big';
  	} else {
		$image = 'xecuter_large';
	}
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-2 rd-979-2c rd-col-767-2c  rd-col-499-1c ">';
			xecuter_post_module_2('rd-post-1-3 rd-col-1-1 rd-979-3c rd-767-2c rd-499-1c ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
		echo'<div class="rd-row rd-979-2c rd-col-767-2c  rd-col-499-1c "></div>';
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_grid_2c', 'xecuter_main_grid_2c');
add_action('wp_ajax_xecuter_main_grid_2c', 'xecuter_main_grid_2c');
/********************************************************************
Post Main Grid 3 Column
*********************************************************************/
function xecuter_main_grid_3c($slider = false) {  
  	$ratio = xecuter_data('ratio');
  	if($ratio== 'rd-ratio135'){
		$image = 'xecuter_big';

	}elseif($ratio== 'rd-ratio100'){
   		$image = 'xecuter_large';
		
 	} else {
		 $image = 'xecuter_medium';
	}
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-3 rd-col-979-3c rd-col-767-3c rd-col-499-1c  ">';
			xecuter_post_module_2('rd-post-1-5 rd-col-1-1 rd-979-4c rd-767-3c rd-499-1c ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
		if(empty($slider)) echo'<div class="rd-row  rd-col-979-3c rd-col-767-3c rd-col-499-1c "></div>';
   	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_grid_3c', 'xecuter_main_grid_3c');
add_action('wp_ajax_xecuter_main_grid_3c', 'xecuter_main_grid_3c');
/********************************************************************
Post Main Grid 4 Column
*********************************************************************/
function xecuter_main_grid_4c($slider = false) { 
 	$ratio = xecuter_data('ratio');
 	if($ratio== 'rd-ratio135' ){
  		$image = 'xecuter_large';
		
	} else {
	 	$image = 'xecuter_medium';
	}
 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-4  rd-col-979-2c rd-col-767-2c rd-col-499-2c  ">';
			xecuter_post_module_2('rd-post-1-6 rd-col-1-1 rd-979-3c rd-767-2c rd-499-2c ',$image,xecuter_data('post_title'),false,xecuter_data('meta_category'));
		echo'</div>';
		if(empty($slider)) echo'<div class="rd-row rd-col-979-2c rd-col-767-2c rd-col-499-2c  "></div>';
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_grid_4c', 'xecuter_main_grid_4c');
add_action('wp_ajax_xecuter_main_grid_4c', 'xecuter_main_grid_4c');
/********************************************************************
Post Main List 1 Column
*********************************************************************/
function xecuter_main_list_1c() {  
	$size=xecuter_data('size');
	$ratio=xecuter_data('ratio');
	if($size == 'rd-img-large'){ $post_size = 'rd-post-large';}
	elseif($size =='rd-img-medium'){$post_size = 'rd-post-medium';}
	else {$post_size = 'rd-post-small';}
 	if($ratio == 'rd-ratio135'){ $post_ratio = 'rd-post-135';}
	elseif($ratio =='rd-ratio100'){$post_ratio = 'rd-post-100';}
	elseif($ratio =='rd-ratio75'){$post_ratio = 'rd-post-75';}
	else {$post_ratio = 'rd-post-60';}
	
	 	
	if( ($size == 'rd-img-large' && ($ratio == 'rd-ratio135'  || $ratio == 'rd-ratio100')) || ($size == 'rd-img-medium' && $ratio == 'rd-ratio135' )){
		$image = 'xecuter_big';
		
	} elseif(($size == 'rd-img-large' && ($ratio == 'rd-ratio75' || $ratio == 'rd-ratio60')) ||  ( $ratio == 'rd-ratio135' && ($size == 'rd-img-medium' || $size == 'rd-img-small')) ||  ( $ratio == 'rd-ratio100' &&  $size == 'rd-img-medium' )){
		$image = 'xecuter_large';
		
	}else {
		$image = 'xecuter_medium';
	}
	
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_1($post_size.' '.$post_ratio.' rd-post-2-3  rd-col-1-1  rd-979-1c  '.xecuter_data('size'),$image,true,xecuter_data('meta_category'));
		echo'</div>';
		echo'<div class="rd-padding"></div>';
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_list_1c', 'xecuter_main_list_1c');
add_action('wp_ajax_xecuter_main_list_1c', 'xecuter_main_list_1c');
/********************************************************************
Post Main List 2 Column
*********************************************************************/
function xecuter_main_list_2c() { 
	$size=xecuter_data('size');
	$ratio=xecuter_data('ratio');
	if($size == 'rd-img-large'){ $post_size = 'rd-post-large';}
	else {$post_size = 'rd-post-medium';}
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
 		echo'<div class="rd-post-item  rd-col-1-2">';
			xecuter_post_module_1($post_size.' '.$post_ratio.' rd-post-1-3 rd-col-1-1 '.xecuter_data('size'),$image,xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
		echo'<div class="rd-row"></div>';
		
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_list_2c', 'xecuter_main_list_2c');
add_action('wp_ajax_xecuter_main_list_2c', 'xecuter_main_list_2c');
/********************************************************************
Post Main List 3  
*********************************************************************/
function xecuter_main_list_3() { 
	$ajax=xecuter_data('count');
   	$count=!empty($ajax) ? 1 :0;
	$size=xecuter_data('size');
	$ratio=xecuter_data('ratio');
	if($size == 'rd-img-large'){ $post_size = 'rd-post-large'; $image_1 = 'xecuter_large';$image_2 = 'xecuter_medium';}
	else {$post_size = 'rd-post-medium';$image_1 = 'xecuter_medium';$image_2 = 'xecuter_small'; }
 
	if($ratio =='rd-ratio75'){
		$post_ratio = 'rd-post-75';$meta_category= xecuter_data('meta_category');
	} else {
		$post_ratio = 'rd-post-60';$meta_category='';
	}
 	
	 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
	
		if($count==1){
			echo'<div class="rd-post-item">';
				xecuter_post_module_1($post_size.' '.$post_ratio.' rd-post-2-3 rd-col-1-1 '.xecuter_data('size'),$image_1,true,xecuter_data('meta_category'));
  			echo'</div>';
			echo'<div class="rd-padding"></div>';
 			
		} else {
 			echo'<div class="rd-post-item  rd-col-1-2">';
			xecuter_post_module_1($post_size.' '.$post_ratio.' rd-post-1-3 rd-col-1-1 '.xecuter_data('size'),$image_2,false, $meta_category);
			echo'</div>';
			echo'<div class="rd-row"></div>';
			
 		}

  	endwhile; 
	endif; 
} 
add_action('wp_ajax_nopriv_xecuter_main_list_3', 'xecuter_main_list_3');
add_action('wp_ajax_xecuter_main_list_3', 'xecuter_main_list_3');
/********************************************************************
Post Main List 4  
*********************************************************************/
function xecuter_main_list_4() { 
	$count=0;
	$size=xecuter_data('size');
	$ratio=xecuter_data('ratio');
	if($size == 'rd-img-large'){ $post_size = 'rd-post-large';  $image  = 'xecuter_medium';}
	else {$post_size = 'rd-post-medium'; $image  = 'xecuter_small'; }
 
	if($ratio =='rd-ratio75'){
		$post_ratio = 'rd-post-75';$meta_category= xecuter_data('meta_category');
	} else {
		$post_ratio = 'rd-post-60';$meta_category='';
	}
 	
	 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
	
		if($count==1){
			echo'<div class="rd-grid  rd-post-item rd-col-1-2 rd-col-979-1c rd-col-767-1c rd-col-499-1c ">';
				xecuter_post_module_2( $post_ratio.' rd-post-1-3 rd-col-1-1 rd-979-1c rd-767-1c rd-499-1c','xecuter_large',true,xecuter_data('excerpt'),xecuter_data('meta_category'));
  			echo'</div>';
		} else {
 			echo'<div class="rd-list  rd-post-item  rd-col-1-2 rd-col-979-1c rd-col-767-1c rd-col-499-1c">';
			xecuter_post_module_1($post_size.' '.$post_ratio.' rd-post-1-3 rd-col-1-1 '.xecuter_data('size'),$image ,false,$meta_category);
			echo'</div>';
 		}
		echo'<div class="rd-row"></div>';

  	endwhile; 
	endif; 
} 
 
add_action('wp_ajax_nopriv_xecuter_main_list_4', 'xecuter_main_list_4');
add_action('wp_ajax_xecuter_main_list_4', 'xecuter_main_list_4');
/********************************************************************
Post Main List 5  
*********************************************************************/
function xecuter_main_list_5() { 
	$ajax=xecuter_data('count');
   	$count=!empty($ajax) ? 2 :0;
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
	
		if($count==1 || $count==2){
			echo'<div class="rd-grid  rd-post-item rd-col-1-2  rd-col-979-2c rd-col-767-2c rd-col-499-1c">';
				xecuter_post_module_2( ' rd-post-1-3  rd-col-1-1 rd-979-3c rd-767-2c rd-499-1c','xecuter_large',true,xecuter_data('excerpt'),xecuter_data('meta_category'));
  			echo'</div>';
		} else {
 			echo'<div class="rd-list  rd-post-item  rd-col-1-2 rd-col-979-1c rd-col-767-1c rd-col-499-1c ">';
			xecuter_post_module_1($post_size.' '.$post_ratio.' rd-post-1-3 rd-post-1-3 rd-col-1-1 '.xecuter_data('size'), $image,false, $meta_category);
			echo'</div>';
 		}
		echo'<div class="rd-row"></div>';

  	endwhile; 
	endif; 
} 
add_action('wp_ajax_nopriv_xecuter_main_list_5', 'xecuter_main_list_5');
add_action('wp_ajax_xecuter_main_list_5', 'xecuter_main_list_5');
/********************************************************************
Post Main List 6  
*********************************************************************/ 
function xecuter_main_list_6() { 
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
				xecuter_post_module_2( ' rd-post-1-3 rd-col-1-1 rd-979-2c rd-767-1c rd-499-1c','xecuter_large',true,xecuter_data('excerpt'),xecuter_data('meta_category'));
  			echo'</div>';
		} else {
 			echo'<div class="rd-list  rd-post-item  rd-col-1-1">';
			xecuter_post_module_1($post_size.' '.$post_ratio.'  rd-post-1-3 rd-post-1-3 rd-col-1-1 '.xecuter_data('size'),$image,false, $meta_category);
			echo'</div>';
		echo'<div class="rd-row"></div>';
			
 		}

  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_list_6', 'xecuter_main_list_6');
add_action('wp_ajax_xecuter_main_list_6', 'xecuter_main_list_6');
/********************************************************************
Post Main List 7  
*********************************************************************/
function xecuter_main_list_7() { 
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
				xecuter_post_module_3( ' rd-post-1-3 rd-col-1-1 rd-979-2c rd-767-1c rd-499-1c ','xecuter_large',xecuter_data('post_title'),false,xecuter_data('meta_category'));
  			echo'</div>';
		} else {
 			echo'<div class="rd-list  rd-post-item  rd-col-1-1">';
			xecuter_post_module_1($post_size.' '.$post_ratio.' rd-post-1-3 rd-post-1-3 rd-col-1-1 '.xecuter_data('size'),$image,false, $meta_category);
			echo'</div>';
 		}
		echo'<div class="rd-row"></div>';

  	endwhile; 
	endif; 
} 
add_action('wp_ajax_nopriv_xecuter_main_list_7', 'xecuter_main_list_7');
add_action('wp_ajax_xecuter_main_list_7', 'xecuter_main_list_7');
/********************************************************************
Post Main Text 1 Column
*********************************************************************/
function xecuter_main_text_1c() {  
	 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_4( 'rd-post-2-3  rd-col-1-1 ',xecuter_data('excerpt'));
		echo'</div>';
		echo'<div class="rd-padding rd-padding-text"></div>';
		
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_text_1c', 'xecuter_main_text_1c');
add_action('wp_ajax_xecuter_main_text_1c', 'xecuter_main_text_1c');
 /********************************************************************
Post Main Text 2 Column
*********************************************************************/
function xecuter_main_text_2c() {  
	 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 		echo'<div class="rd-post-item  rd-col-1-2">';
			xecuter_post_module_4( 'rd-post-1-3  rd-col-1-1 ',xecuter_data('excerpt'));
		echo'</div>';
		echo'<div class="rd-row"></div>';
		
  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_text_2c', 'xecuter_main_text_2c');
add_action('wp_ajax_xecuter_main_text_2c', 'xecuter_main_text_2c');
 /********************************************************************
Post Main Text 3
*********************************************************************/
function xecuter_main_text_3() {  
	$ajax=xecuter_data('count');
   	$count=!empty($ajax) ? 1 :0;
	$size=xecuter_data('size');
	$ratio=xecuter_data('ratio');
	if($size == 'rd-img-large'){ $post_size = 'rd-post-large'; $image = 'xecuter_large';}
	else {$post_size = 'rd-post-medium';$image = 'xecuter_medium'; }
 
	if($ratio =='rd-ratio75'){
		$post_ratio = 'rd-post-75';$meta_category= xecuter_data('meta_category');
	} else {
		$post_ratio = 'rd-post-60';$meta_category='';
	}
 	
	 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
	
		if($count==1){
			echo'<div class="rd-list rd-post-item">';
				xecuter_post_module_1($post_size.' '.$post_ratio.' rd-post-2-3 rd-979-2c rd-767-1c  rd-499-1c rd-col-1-1 '.xecuter_data('size'),$image,true,xecuter_data('meta_category'));
  			echo'</div>';
			echo'<div class="rd-padding rd-padding-text"></div>';

			
		} else {
 			echo'<div class="rd-text rd-post-item  rd-col-1-2  rd-col-979-1c rd-col-767-1c  rd-col-499-1c  ">';
			xecuter_post_module_4( ' rd-post-1-3  rd-col-1-1 ',false);
			echo'</div>';
		echo'<div class="rd-row"></div>';
			
 		}

  	endwhile; 
	endif;   
  
}
add_action('wp_ajax_nopriv_xecuter_main_text_3', 'xecuter_main_text_3');
add_action('wp_ajax_xecuter_main_text_3', 'xecuter_main_text_3');
 /********************************************************************
Post Main Text 4
*********************************************************************/
function xecuter_main_text_4() {  
	 
	$count=0;
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
	
		if($count==1){
			echo'<div class="rd-grid  rd-post-item rd-col-1-2 rd-col-979-1c rd-col-767-1c rd-col-499-1c">';
				xecuter_post_module_2(  ' rd-post-1-3 rd-col-1-1   rd-post-1-3  rd-979-2c  rd-499-1c  rd-767-1c','xecuter_large',true,xecuter_data('excerpt'),xecuter_data('meta_category'));
  			echo'</div>';
 			echo'<div class="rd-text   rd-post-flex  rd-col-1-2  rd-col-979-1c rd-col-767-1c rd-col-499-1c">';
		} else {
  			echo'<div class="rd-text  rd-post-item  rd-col-1-1 ">';
			xecuter_post_module_4( '  rd-post-1-3  rd-col-1-1 ',false);
			echo'</div>';
  		}
		echo'<div class="rd-padding rd-padding-text"></div>';

  	endwhile; 
	endif; 	 
		echo'</div>';
  
}
add_action('wp_ajax_nopriv_xecuter_main_text_4', 'xecuter_main_text_4');
add_action('wp_ajax_xecuter_main_text_4', 'xecuter_main_text_4');
 /********************************************************************
Post Main Text 5
*********************************************************************/
function xecuter_main_text_5() { 
	$ajax=xecuter_data('count');
   	$count=!empty($ajax) ? 1 :0;
  	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
	
		if($count==1 ){
			echo'<div class="rd-grid  rd-post-item rd-col-1-1">';
				xecuter_post_module_2( ' rd-post-1-3 rd-col-1-1 rd-979-2c rd-767-1c rd-499-1c','xecuter_large',true,xecuter_data('excerpt'),xecuter_data('meta_category'));
  			echo'</div>';
		} else {
 			echo'<div class="rd-text  rd-post-item  rd-col-1-1">';
			xecuter_post_module_4( ' rd-post-1-3  rd-col-1-1 ',false);
			echo'</div>';
 		}
		echo'<div class="rd-row rd-padding-text"></div>';

  	endwhile; 
	endif; 
}
add_action('wp_ajax_nopriv_xecuter_main_text_5', 'xecuter_main_text_5');
add_action('wp_ajax_xecuter_main_text_5', 'xecuter_main_text_5');
 /********************************************************************
Post Main Text 6
*********************************************************************/
function xecuter_main_text_6() { 
	$ajax=xecuter_data('count');
   	$count=!empty($ajax) ? 1 :0;
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
	
		if($count==1 ){
			echo'<div class="rd-featured  rd-post-item rd-col-1-1">';
				xecuter_post_module_3( ' rd-post-1-3 rd-col-1-1 ','xecuter_large',xecuter_data('post_title'),false,xecuter_data('meta_category'));
  			echo'</div>';
		} else {
 			echo'<div class="rd-text  rd-post-item  rd-col-1-1">';
			xecuter_post_module_4( ' rd-post-1-3  rd-col-1-1 ',false);
			echo'</div>';
		echo'<div class="rd-row rd-padding-text"></div>';
			
 		}

  	endwhile; 
	endif; 
} 
add_action('wp_ajax_nopriv_xecuter_main_text_6', 'xecuter_main_text_6');
add_action('wp_ajax_xecuter_main_text_6', 'xecuter_main_text_6');
?>