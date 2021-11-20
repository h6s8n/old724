<?php
/********************************************************************
Post Wide Featured 1 Column
*********************************************************************/
function xecuter_wide_featured_1c() {  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_3('rd-post-1-1  rd-979-1c rd-767-1c ','full',xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Featured 2 Column
*********************************************************************/
function xecuter_wide_featured_2c() {  
	 $query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-2 rd-col-499-1c  ">';
			xecuter_post_module_3(' rd-post-1-2  rd-979-2c rd-767-2c  rd-499-1c ','xecuter_big',xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Featured 3 Column
*********************************************************************/
function xecuter_wide_featured_3c() {  
	
 	$ratio = xecuter_data('ratio');
 	if($ratio== 'rd-ratio100'){
		$post ='rd-post-1-2';$image = 'full'; 
		
	} else {
		$post ='rd-post-1-3';$image = 'xecuter_big'; 
	}
 
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-3 rd-col-979-2c rd-col-767-2c rd-col-499-1c ">';
			xecuter_post_module_3($post.'  rd-979-2c rd-767-2c rd-499-1c ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}

/********************************************************************
Post Wide Featured 4 Column
*********************************************************************/
function xecuter_wide_featured_4c() { 
 	$ratio = xecuter_data('ratio');
  	if($ratio== 'rd-ratio135'){
		$post ='rd-post-1-3';$image = 'full';
		 
	}elseif($ratio== 'rd-ratio100'){
		$post ='rd-post-1-3';$image = 'xecuter_big'; 
		
	} else {
		$post ='rd-post-1-4';$image = 'xecuter_big'; 
	}
 
 	$query = xecuter_query();
	
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
	
		echo'<div class="rd-post-item rd-col-1-4  rd-col-979-2c rd-col-767-2c  rd-col-499-1c ">';
			xecuter_post_module_3($post.' rd-979-2c rd-767-2c rd-499-1c ',$image,xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
		
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Featured 5 Column
*********************************************************************/
function xecuter_wide_featured_5c() {
	
 	$ratio = xecuter_data('ratio');
 	if($ratio== 'rd-ratio100'){
		$post ='rd-post-1-4';
		
	} elseif($ratio== 'rd-ratio135'){
		$post ='rd-post-1-3';

	}  else {
		$post ='rd-post-1-5';
	}
 	  
 	$query = xecuter_query();
 
	
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-5  rd-col-979-2c rd-col-767-2c  rd-col-499-1c">';
			xecuter_post_module_3($post.' rd-979-3c rd-767-2c rd-499-1c ',  'xecuter_big' , xecuter_data('post_title'),false,xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Featured 6 Column
*********************************************************************/
function xecuter_wide_featured_6c() {  
  	$ratio = xecuter_data('ratio');
  	if($ratio== 'rd-ratio100'){
		$post ='rd-post-1-5';$image = 'xecuter_large';
		
	}  elseif($ratio== 'rd-ratio135'){
		$post ='rd-post-1-4';$image = 'xecuter_big';

	}  else {
		$post ='rd-post-1-6';$image = 'xecuter_large';
	} 
 	$query = xecuter_query(); 
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-6 rd-col-979-2c rd-col-767-2c  rd-col-499-2c">';
			xecuter_post_module_3($post.' rd-979-3c rd-767-2c rd-499-2c ','xecuter_big',xecuter_data('post_title'),false,xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Featured 8 Column
*********************************************************************/
function xecuter_wide_featured_8c() {
  	$ratio = xecuter_data('ratio');	
  	$ratio = xecuter_data('ratio');
  	if($ratio== 'rd-ratio100'){
		$post ='rd-post-1-6';$image = 'xecuter_large';
		
	}  elseif($ratio== 'rd-ratio135'){
		$post ='rd-post-1-5'; $image = 'xecuter_big';

	}  else {
		$post ='rd-post-1-8';$image = 'xecuter_medium'; 
	} 	  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item rd-col-1-8 rd-col-979-2c rd-col-767-2c  rd-col-499-2c">';
			xecuter_post_module_3($post.' rd-979-3c rd-767-2c rd-499-2c ' ,$image,xecuter_data('post_title'), false,xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Slider Featured 1
*********************************************************************/
function xecuter_wide_slider_featured_1() {
	$count=0;
  	$ratio = xecuter_data('ratio');
 	if($ratio== 'rd-ratio40f'){$excerpt =false; $post='rd-post-1-4';} else {$post='rd-post-1-3';$excerpt = xecuter_data('excerpt');}
  	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
				xecuter_post_module_3('rd-post-2-3 rd-col-2-3 rd-979-1c rd-col-979-1c rd-767-1c rd-col-767-1c rd-col-499-1c rd-499-1c','full',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
		}
			if($count==2 || $count==3){
				xecuter_post_module_3( $post .' rd-col-1-3 rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c  rd-499-1c rd-col-499-1c ','xecuter_big',xecuter_data('post_title'), $excerpt,xecuter_data('meta_category'));
			}
		if($count==3){
 			$count=0;
			echo'</div>';
		}
		
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Slider Featured 2
*********************************************************************/
function xecuter_wide_slider_featured_2() {
	$count=0;
  	$ratio = xecuter_data('ratio');
 	if($ratio== 'rd-ratio60'){$excerpt =false; } else {$excerpt = xecuter_data('excerpt');}
  	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
					xecuter_post_module_3('rd-post-1-2 rd-col-1-2 rd-979-1c rd-col-979-1c rd-767-1c rd-col-767-1c rd-col-499-1c rd-499-1c ','full',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
		} 
			 if($count==2 || $count==3|| $count==4|| $count==5){
					xecuter_post_module_3( 'rd-post-1-4 rd-col-1-4 rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c  rd-499-1c rd-col-499-1c ','xecuter_big',xecuter_data('post_title'), $excerpt,xecuter_data('meta_category'));
			 }
		if($count==5){
			 $count=0;
			echo'</div>';
		}
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Slider Featured 3
*********************************************************************/
function xecuter_wide_slider_featured_3() {
	$count=0;
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
				xecuter_post_module_3('rd-post-2-5 rd-col-2-5 rd-979-1c rd-col-979-1c rd-767-1c rd-col-767-1c rd-col-499-1c rd-499-1c ','full',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
		}
			if($count==2 || $count==3|| $count==4|| $count==5 || $count==6|| $count==7){
				xecuter_post_module_3( 'rd-post-1-5 rd-col-1-5 rd-979-3c rd-col-979-3c rd-col-767-3c rd-767-3c rd-col-499-2c  rd-499-2c ','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			}
		if($count==7){
			$count=0;
			echo'</div>';
		}
  	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Slider Featured 4
*********************************************************************/
function xecuter_wide_slider_featured_4() {
	$count=0;
	$ratio = xecuter_data('ratio');

 	if($ratio== 'rd-ratio40f'){$excerpt =false; $post='rd-post-1-4';} else {$post='rd-post-1-3';$excerpt = xecuter_data('excerpt');}
    	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
		}	
			
 			if($count==1 || $count ==2 ){
				xecuter_post_module_3( 'rd-post-1-2 rd-col-1-2 rd-979-2c rd-col-979-2c rd-767-2c rd-col-767-2c rd-col-499-1c rd-499-1c ','full',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
			 }			 
 			 if($count ==3 || $count==4|| $count==5 ){
				xecuter_post_module_3( $post. ' rd-col-1-3 rd-979-3c rd-col-979-3c rd-col-767-3c rd-767-3c rd-col-499-1c  rd-499-1c','xecuter_big',xecuter_data('post_title'), $excerpt,xecuter_data('meta_category'));
			 }
		if($count==5){
			 	$count=0;
			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Slider Featured 5
*********************************************************************/
function xecuter_wide_slider_featured_5() {
	$count=0;
	$ratio = xecuter_data('ratio');

	
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
		}	
			
 			if($count==1 || $count ==2 ){
				xecuter_post_module_3( 'rd-ratio40f rd-post-1-2 rd-col-1-2  rd-979-2c rd-col-979-2c rd-767-2c rd-col-767-2c rd-col-499-1c rd-499-1c','full',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
			 }			 
 			 if($count ==3 || $count==4|| $count==5  || $count==6 ){
				xecuter_post_module_3(  'rd-post-1-4 rd-ratio60f rd-col-1-4 rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c rd-col-499-2c rd-499-2c ','xecuter_big',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 }
		if($count==6){
			 	$count=0;
			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Slider Featured 6
*********************************************************************/
function xecuter_wide_slider_featured_6() {
	$count=0;
	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
		}	
			
 			if($count==1 || $count ==2 ){
				xecuter_post_module_3( 'rd-ratio40f rd-post-1-2 rd-col-1-2 rd-979-2c rd-col-979-2c rd-767-2c rd-col-767-2c rd-col-499-1c rd-499-1c ','full',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
			 }			 
		 
 			 if($count ==3 || $count==4 ){
				xecuter_post_module_3(  'rd-post-1-5 rd-ratio60f rd-col-1-5 rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c rd-col-499-2c rd-499-2c ','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 } 
			 
 			 if( $count==5  || $count==6  ){
				xecuter_post_module_3(  'rd-post-1-5 rd-ratio60f rd-col-1-5 rd-979-3c rd-col-979-3c rd-col-767-3c rd-767-3c rd-col-499-2c  rd-499-2c ','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 } 			 
		 
 
		if($count==7){
				xecuter_post_module_3(  'rd-post-1-5 rd-ratio60f rd-col-1-5   rd-979-3c rd-col-979-3c rd-col-767-3c rd-767-3c rd-col-499-1c  rd-499-1c ','xecuter_large',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			
			 	$count=0;
			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Slider Featured 7
*********************************************************************/
function xecuter_wide_slider_featured_7() {
	$count=0;
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
		}	
			
 			if($count==1 || $count ==2|| $count ==3  ){
				xecuter_post_module_3( 'rd-post-1-3 rd-col-1-3  rd-979-3c rd-col-979-3c rd-col-767-3c rd-767-3c rd-col-499-1c rd-499-1c ','xecuter_big',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
			 }			 
			 
			 
 			 if( $count==4|| $count==5  || $count==6 || $count==7 ){
				xecuter_post_module_3(  'rd-post-1-4 rd-col-1-4  rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c rd-col-499-2c rd-499-2c','xecuter_big',xecuter_data('post_title'), false,xecuter_data('meta_category'));
			 }
		if($count==7){
			 	$count=0;
			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Slider Featured 8
*********************************************************************/
function xecuter_wide_slider_featured_8() {
	$count=0;
  	$ratio = xecuter_data('ratio');
 	if($ratio== 'rd-ratio60'){$excerpt =false; } else {$excerpt = xecuter_data('excerpt');}
  	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1){
			echo'<div class="rd-post-item">';
 		
				echo'<section class="rd-post-flex rd-col-3-4 rd-col-979-1c">';
					xecuter_post_module_3('rd-post-1-2 rd-col-2-3 rd-979-1c rd-col-979-1c rd-col-767-1c rd-767-1c rd-col-499-1c rd-499-1c ','full',xecuter_data('post_title'), xecuter_data('excerpt'),xecuter_data('meta_category'));
		}
		if($count==2 || $count==3){
					xecuter_post_module_3( 'rd-post-1-4 rd-col-1-3 rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c rd-col-499-1c rd-499-1c','xecuter_big',xecuter_data('post_title'), $excerpt,xecuter_data('meta_category'));
		}
		if($count==3){
			echo'</section>';
			echo'<section class="rd-post-flex rd-col-1-4 rd-col-979-1c ">';
 		}
 				if($count==4 || $count==5){
 					xecuter_post_module_3( 'rd-post-1-4 rd-col-1-1 rd-979-2c rd-col-979-2c rd-col-767-2c rd-767-2c rd-col-499-1c rd-499-1c ','xecuter_big',xecuter_data('post_title'), $excerpt,xecuter_data('meta_category'));
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
Post Wide Slider Featured 9
*********************************************************************/
function xecuter_wide_slider_featured_9() {
	$count=0;
   	$ratio = xecuter_data('ratio');
 	if($ratio== 'rd-ratio40f'){$excerpt =false; $post='rd-post-1-4';} else {$post='rd-post-1-3';$excerpt = xecuter_data('excerpt');}
	
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1 ){
			echo'<div class="rd-post-item rd-col-1-3">';
			
		}  		
		xecuter_post_module_3( $post. ' rd-col-1-1 rd-979-2c rd-767-2c rd-499-1c ','xecuter_big',xecuter_data('post_title'), $excerpt,xecuter_data('meta_category'));			 

		 if( $count==2 ){ $count=0;
   			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Slider Featured 10
*********************************************************************/
function xecuter_wide_slider_featured_10() {
	$count=0;
  	
   	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); $count++;
		
		if($count==1 ){
			echo'<div class="rd-post-item rd-col-1-4">';
			
		}  		
		xecuter_post_module_3(   ' rd-post-1-4 rd-col-1-1 rd-979-2c rd-767-2c rd-499-1c ','xecuter_big',xecuter_data('post_title'), false,xecuter_data('meta_category'));			 

		 if( $count==2 ){ $count=0;
   			echo'</div>';
		}
		 
 	endwhile; 
	endif; 
}
/********************************************************************
Post Wide Slider Vertical
*********************************************************************/
function xecuter_wide_slider_vertical() {  
 	$query = xecuter_query();
	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
		echo'<div class="rd-post-item  rd-col-1-1">';
			xecuter_post_module_3('rd-post-2-3 rd-979-1c  rd-767-1c  rd-499-1c ','full',xecuter_data('post_title'),xecuter_data('excerpt'),xecuter_data('meta_category'));
		echo'</div>';
 	endwhile; 
	endif; 
}
?>