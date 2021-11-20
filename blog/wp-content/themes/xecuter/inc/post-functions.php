<?php
/********************************************************************
Post Module 1
*********************************************************************/
function xecuter_post_module_1($class,$thumb,$excerpt = false,$meta_category = false){
	$classes = array('rd-post','rd-post-module-1',$class);
	?>
    
 	<div <?php post_class( $classes );?>>
		<div class="rd-post-warp ">
 			<?php xecuter_thumb ($thumb);?>                	                            
 			<div class="rd-details">
				<?php  xecuter_meta_category($meta_category); ?> 
 				<?php  xecuter_post_title(xecuter_data('title_limit'));   ?> 
 				<?php  xecuter_meta(); ?> 
 				<?php if($excerpt == true ) xecuter_excerpt(xecuter_data('excerpt_limit'));?>

			</div>
		</div>
 	</div>
	<?php
}  
/********************************************************************
Post Module 2
*********************************************************************/
 function xecuter_post_module_2($class,$thumb,$title = false,$excerpt = false,$meta_category = false){
	$classes = array('rd-post','rd-post-module-2',$class);
	?>
  
	<div <?php post_class( $classes );?>>
		<div class="rd-post-warp ">
 			<?php xecuter_thumb ($thumb,$meta_category);?>                	                            
			<div class="rd-details">
				<?php if($title == true) xecuter_post_title(xecuter_data('title_limit')); ?> 
				<?php  xecuter_meta(); ?> 
                
				<?php if($excerpt == true) xecuter_excerpt(xecuter_data('excerpt_limit'));?>
 			</div>
		</div>
 	</div>
	<?php
}
/********************************************************************
Post Module 3
*********************************************************************/
function xecuter_post_module_3($class,$thumb,$title = false,$excerpt = false,$meta_category = false){
	$classes = array('rd-post','rd-post-module-3',$class);
	?>
  
	<div <?php post_class( $classes );?> >
		<div class="rd-post-container">
 			<div class="rd-post-warp">
				<?php xecuter_thumb ($thumb);?>                	                            
				<div class="rd-details">
 					<?php  xecuter_meta_category($meta_category); ?> 
					<?php  if(!empty($title) ) xecuter_post_title(xecuter_data('title_limit')); ?> 
					<?php  xecuter_meta(); ?> 
					<?php if(!empty($excerpt) ) xecuter_excerpt(xecuter_data('excerpt_limit'));?>
				</div>
  			</div>
		</div>
	</div>
	<?php
}
/********************************************************************
Post Module 4
*********************************************************************/
function xecuter_post_module_4($class,$excerpt = false ){
	$classes = array('rd-post','rd-post-module-4',$class);
	?>
  
	<div <?php post_class( $classes );?> >
  			<div class="rd-post-warp">
 				<div class="rd-details">
 					<?php   xecuter_post_title(xecuter_data('title_limit')); ?> 
					<?php  xecuter_meta(); ?> 
					<?php if($excerpt == true) xecuter_excerpt(xecuter_data('excerpt_limit'));?>
				</div>
 			</div>
	</div>
	<?php
} 
/********************************************************************
Post Module Blog
*********************************************************************/ 
function xecuter_post_blog_1($class,$thumb,$excerpt = false,$meta_category=false){
	$classes = array('rd-post','rd-post-module-1',$class);
	global $smof_data;
	if ( is_category() ) {
 		$term = get_term_meta(get_query_var( 'cat'  ));
	}
	if(!empty($term['xecuter_blog_custom'][0])){
 		$title_limit = !empty( $term['xecuter_title_limit'][0] ) ? $term['xecuter_title_limit'][0] : '';
		$excerpt_limit = !empty( $term['xecuter_excerpt_limit'][0] ) ? $term['xecuter_excerpt_limit'][0] : '';
	} else{
 		$title_limit = !empty( $smof_data['xecuter_title_limit'] ) ? $smof_data['xecuter_title_limit'] : '';
		$excerpt_limit = !empty( $smof_data['xecuter_excerpt_limit'] ) ? $smof_data['xecuter_excerpt_limit'] : '';
	}	
	?>
  
	<div id="post-<?php the_ID(); ?>" <?php post_class( $classes );?>>
		<div class="rd-post-warp ">
			<?php xecuter_thumb ($thumb);?>                	                            
			<div class="rd-details">
				<?php  xecuter_meta_category($meta_category); ?> 
				<?php  xecuter_post_title($title_limit); ?> 
				<?php  xecuter_blog_meta(); ?> 
				<?php if($excerpt == true ) xecuter_excerpt($excerpt_limit);?>
  			</div>
		</div>
 	</div>
	<?php
} 

/********************************************************************
Post Module 2
*********************************************************************/
function xecuter_post_blog_2($class,$thumb,$excerpt = false,$meta_category = false){
	$classes = array('rd-post','rd-post-module-2',$class);
	global $smof_data;
	if ( is_category() ) {
 		$term = get_term_meta(get_query_var( 'cat'  ));
	}
	if(!empty($term['xecuter_blog_custom'][0])){
 		$title_limit = !empty( $term['xecuter_title_limit'][0] ) ? $term['xecuter_title_limit'][0] : '';
		$excerpt_limit = !empty( $term['xecuter_excerpt_limit'][0] ) ? $term['xecuter_excerpt_limit'][0] : '';
	} else{
 		$title_limit = !empty( $smof_data['xecuter_title_limit'] ) ? $smof_data['xecuter_title_limit'] : '';
		$excerpt_limit = !empty( $smof_data['xecuter_excerpt_limit'] ) ? $smof_data['xecuter_excerpt_limit'] : '';
	}  
	?>
  
	<div <?php post_class( $classes );?>>
		<div class="rd-post-warp ">
 			<?php xecuter_thumb ($thumb,$meta_category);?>                	                            
			<div class="rd-details">
				<?php xecuter_post_title($title_limit); ?> 
				<?php xecuter_blog_meta(); ?> 
 				<?php if($excerpt == true) xecuter_excerpt($excerpt_limit);?>
 			</div>
		</div>
 	</div>
	<?php
}
/********************************************************************
Post Data
*********************************************************************/  
function xecuter_data($id=false,$def = false){
	global  $post,$xecuter_data;
	$xecuter_data_id = isset( $xecuter_data[$id] ) ? $xecuter_data[$id] : $def;
    $ajax_xecuter_data_id = (isset($_REQUEST[$id])) ? $_REQUEST[$id] : $xecuter_data_id; 
	return $ajax_xecuter_data_id;
}
/********************************************************************
Post Module Class
*********************************************************************/
function xecuter_module_class(){
	global $xecuter_data,$xecuter_row; 
  
 	$class='rd-module-item ';
	
	if(!empty($xecuter_data['text_center'])){	
		$class.= 'rd-text-center ';
		
	}
	if(!empty($xecuter_data['details_middle'])){	
		$class.= 'rd-details-middle ';
		
	}
	
	if(!empty($xecuter_data['height'])){	
		$class.= $xecuter_data['height'].' ';
		
	}	
	
	if(!empty($xecuter_data['ratio'])){	
		$class.= $xecuter_data['ratio'].' ';
		
	}	
	if(!empty($xecuter_data['space'])){	
		$class.= 'rd-space ';
		
	}
	
	if(!empty($xecuter_data['background_thumb'])){	
		$class.= 'rd-thumb-'.$xecuter_data['background_thumb'].' ';
		
	}			
	 
	 
	 
	if( empty($xecuter_data['post_title']) &&  empty($xecuter_data['excerpt']) &&    empty($xecuter_data['meta_category'])&&empty($xecuter_data['meta_review']) && empty($xecuter_data['meta_author']) && empty($xecuter_data['meta_date'])&& empty($xecuter_data['meta_view'])&& empty($xecuter_data['meta_comments'])  ){	
		$class.= 'rd-background-none ';
		
	}		
	
 
	if($xecuter_row['value']=='1920'){	
		$class.= 'rd_wide_';
		
	}elseif($xecuter_row['value']=='1200'){	
		$class.= 'rd_content_';
		
	}elseif(($xecuter_row['value']=='800_400' && $xecuter_data['col'] == '1' )|| ($xecuter_row['value']=='400_800'  && $xecuter_data['col'] == '2')){
		$class.= 'rd_main_';
		
	} else{
		$class.= 'rd_mini_';
		
	}

	if(!empty($xecuter_data['value'])){	
		$class.= $xecuter_data['value'];
	}	
	 
 	return $class;	
} 
/********************************************************************
Post Title Box
*********************************************************************/ 
function xecuter_title_box(){
	global  $xecuter_data;
	if(!empty($xecuter_data['title'])){
		
  		echo '<div class="rd-title-box"><h4><span class="rd-active" >'.esc_html($xecuter_data['title']).'</span></h4></div>';
	}
}
function xecuter_title_tabs($id =false){
	global  $post,$xecuter_data;
  
  		$data = array();
		$data[]='"action":"'. $id.'"';
		$data[]='"post_status":"publish"';
 	 
		foreach ($xecuter_data as  $key => $value) { 
  			if(!empty($value) && !is_array($value)){	 $data[]='"' .$key .'":"'.$value.'"';}
		 
		 
		}
		$multi_cats = xecuter_data('multi_cats');
		if(!empty($multi_cats)){
			$key_cats = implode(", ", array_keys($multi_cats));
  			$data[]='"cats":"'.$key_cats.'"';
		} else{
			$key_cats='';
		}

		$options = implode(',',$data);
	
	
	if(!empty($xecuter_data['title'])){
		?>
		
   		 <div class="rd-title-box" data-options='{<?php echo esc_attr($options);?>}'>
 		<?php echo'<h4>';
		echo '<span class="rd-active"  data-cats="'.esc_attr($key_cats).'" data-orderby="'.xecuter_data('orderby').'" data-max_page="'.xecuter_max_page($key_cats,xecuter_data('orderby')).'" >'.esc_html($xecuter_data['title']).'</span>';
 		if (!empty($xecuter_data['tabs'])) { 
 			foreach ($xecuter_data['tabs'] as  $key => $value) { 
				echo'<span data-cats="'.esc_attr($value['cats']).'" data-orderby="'.esc_attr($value['orderby']).'"  data-max_page="'.xecuter_max_page($value['cats'],$value['orderby']).'">'.esc_html($value['title']).'</span>';
			}
		}
		
			echo '</h4>';?>
		 </div><?php
	}
}
/********************************************************************
Post Load More
*********************************************************************/
function xecuter_load_more($id= false){
	global  $post,$xecuter_data;
 
	$max_page= xecuter_query()->max_num_pages;
	if(!empty($xecuter_data['load_more'])){
		$data = array();
		$data[]='"action":"'. $id.'"';
		$data[]='"post_status":"publish"';
	 
		foreach ($xecuter_data as  $key => $value) { 
  			if(!empty($value) && !is_array($value)){	 $data[]='"' .$key .'":"'.$value.'"';}
		 
		 
		}
		$cats = xecuter_data('cats');
		$multi_cats = xecuter_data('multi_cats');
		$orderby = xecuter_data('orderby');
		
		if(!empty($cats)){
			$key_cats = $cats;
 		}elseif(!empty($multi_cats)){
			$key_cats = implode(", ", array_keys($multi_cats));
 		} else{
			$key_cats ='';
		}
		if(!empty($oderby)){
			$key_oreder = $oderby;
 		}  else{
			$key_oreder ='';
		}
		

		$options = implode(',',$data);
		?>
		
		<div class="rd-load-more" ><span data-cats="<?php echo esc_attr($key_cats);?>"  data-orderby="<?php echo esc_attr($orderby);?>" data-options='{<?php echo esc_attr($options);?>}' data-page="2" data-max_page="<?php echo esc_attr($max_page);?>" ><?php echo esc_html(xecuter_t('load_more'));?><i></i></span></div>
		
		<?php
	}
}
/********************************************************************
Post Query
*********************************************************************/
function xecuter_query($build_query= false){
 
  	$page = (isset($_REQUEST['pageNumber'])) ? $_REQUEST['pageNumber'] : 1;
	$publish = (isset($_REQUEST['post_status'])) ? $_REQUEST['post_status'] : 'publish';
	$number = xecuter_data('number','5');
	$post_type = xecuter_data('post_type');
	$sliders = xecuter_data('sliders');
	$cats = xecuter_data('cats');
	$multi_cats = xecuter_data('multi_cats');
 	$orderby = xecuter_orderby();
	$date_query = xecuter_date_query();
  	$meta_key = xecuter_meta_key();	
	$args = array();
	$args['post_status'] =  $publish;
  	if(!$build_query== true &&  !empty($number)){
		$args['posts_per_page']=$number;
	}
 	
    	if($post_type=='slides'){
		$args['post_type'] = 'reza_slide';
 		$args['no_found_rows'] = 1;
		$args['taxonomy'] = 'reza_sliders';	
		$args['field'] = 'slug';
		
				
		if(!empty($sliders)){
			$args['terms']= array ($sliders);
		 }
			
 	}else{
 
			
		if(!empty($cats)){
			$args['cat']=$cats;
		 } 
		 if(!empty($multi_cats)){
			$key_multi = implode(", ", array_keys($multi_cats));
 			$args['cat']=$key_multi;
		}
		if(!empty($orderby)){
			$args['orderby']=$orderby;
		}
								$args['ignore_sticky_posts'] = 1;

		if(   !empty($date_query)){
			$args['date_query']=$date_query;
		}
		
		if(!empty($meta_key)){
			$args['meta_key']= $meta_key;
		}
		
		if(!$build_query== true){
			$args['paged']=$page; 
		}
	}
	 
 	if($build_query== true){	
   		$query=	'?'.http_build_query($args);
	}else{
		$query = new WP_Query($args );
	}
	
	return $query;
				
}
function xecuter_max_page($cats= false, $orderby=false){
 
  		$number = xecuter_data('number','5');
		$orderby = xecuter_orderby();
		$date_query = xecuter_date_query();
  		$meta_key = xecuter_meta_key();	
		$args = array();
		$args['post_status'] =  'publish';
	
		if(!empty($number)){
				$args['posts_per_page']=$number;
		}
			
		if(!empty($cats)){
			$args['cat']=$cats;
		 } 
 
		if(!empty($orderby)){
			$args['orderby']=$orderby;
		}
		
		if(   !empty($date_query)){
			$args['date_query']=$date_query;
		}
		
		if(!empty($meta_key)){
			$args['meta_key']= $meta_key;
		}
		
	 
 
	 
  
		$query = new WP_Query($args );
	 	$max_page= $query->max_num_pages;

	
	return $max_page;
				
}
/********************************************************************
Post Date Query
*********************************************************************/ 
function xecuter_date_query($custom = false){
	if(!empty($custom)){
		$orderby =   isset( $custom['orderby'] ) ? $custom['orderby'] : null;
	} else{
		$orderby = xecuter_data('orderby');
	}
		
	if($orderby =='rand-day' || $orderby =='last-comment-day'||$orderby =='most-comment-day'||$orderby =='views-day'||$orderby =='best-reviews-day'){
			$date_query = array(array('after' => '1 day ago' )) ;
			
	} elseif($orderby =='rand-week'|| $orderby =='last-comment-week'|| $orderby =='most-comment-week'|| $orderby =='views-week'|| $orderby =='best-reviews-day'){
			$date_query = array(array('after' => '1 week ago' )) ;
			
	} elseif( $orderby =='rand-month'|| $orderby =='last-comment-month'|| $orderby =='most-comment-month'|| $orderby =='views-day'|| $orderby =='best-reviews-month'){
			$date_query = array(array('after' => '1 month ago' )) ;
 		
	} elseif( $orderby =='rand-year'|| $orderby =='last-comment-year'|| $orderby =='most-comment-year'|| $orderby =='views-year'|| $orderby =='best-reviews-year'){
			$date_query = array(array('after' => '1 year ago' )) ;
	}else{
 			$date_query='';
	}
	return $date_query;
	
} 
/********************************************************************
Post Orderby
*********************************************************************/
function xecuter_orderby($custom = false){
	if(!empty($custom)){
		$orderby =   isset( $custom['orderby'] ) ? $custom['orderby'] : null;
	} else{
		$orderby = xecuter_data('orderby');
	}
 	
	if( $orderby == 'rand'|| $orderby =='rand-day'|| $orderby =='rand-week'|| $orderby =='rand-month'|| $orderby =='rand-year'){
		$order='rand';
		
	}elseif( $orderby == 'most-comment'|| $orderby =='most-comment-day'|| $orderby =='most-comment-week'|| $orderby =='most-comment-month'|| $orderby =='most-comment-year'){
		$order='comment_count';
			
	}elseif( $orderby == 'views'|| $orderby =='views-day'|| $orderby =='views-week'|| $orderby =='views-month'|| $orderby =='views-year'
		|| $orderby == 'best-reviews'|| $orderby =='best-reviews-day'|| $orderby =='best-reviews-week'|| $orderby =='best-reviews-month'|| $orderby =='best-reviews-year'){
		$order='meta_value_num';					
			
	} else {
 		$order='';
	}
	
	return $order;
	
}
/********************************************************************
Post Meta Key
*********************************************************************/
function xecuter_meta_key($custom = false){
	if(!empty($custom)){
		$orderby =   isset( $custom['orderby'] ) ? $custom['orderby'] : null;
	} else{
		$orderby = xecuter_data('orderby');
	}
	
  	if( $orderby == 'views'|| $orderby =='views-day'|| $orderby =='views-week'|| $orderby =='views-month'|| $orderby =='views-year'){
		$meta_key='xecuter_views_count';
			
	} elseif($orderby == 'best-reviews'|| $orderby =='best-reviews-day'|| $orderby =='best-reviews-week'|| $orderby =='best-reviews-month'|| $orderby =='best-reviews-year'){
		$meta_key='xecuter_review_score';	
							
	} else{
		$meta_key='';
			
 	}
	return $meta_key;
	
}
/********************************************************************
Post Category Meta
*********************************************************************/
function xecuter_meta_category($cat= false){
	$post_type = xecuter_data('post_type');
	if( !empty($cat)){?>
		<div class="rd-category">

 			<?php if($post_type=='slides'){
					$categories = get_term( xecuter_data('sliders'), 'reza_sliders' ); 
			?>
            
       	 		<a href="<?php echo esc_url_raw( get_category_link( $categories ) ) ?>">
					<?php echo esc_html( $categories->name) ?>
				</a>
                
			<?php }else{ 
                     printf('%1$s', get_the_category_list( ' ' ) ); 
				}
			?>
            
		</div>
	<?php
    }
} 
function xecuter_meta(){ 
	global  $post,$smof_data;
  	$meta = get_post_meta( $post->ID );
 	$meta_review = xecuter_data('meta_review');
	$meta_author = xecuter_data('meta_author');
	$meta_date = xecuter_data('meta_date');
	$meta_view = xecuter_data('meta_view');
	$meta_comments = xecuter_data('meta_comments');
 

 	if( (!empty($meta_review) && !empty($meta['xecuter_review'][0]))|| !empty($meta_author) || !empty($meta_date) ||!empty($meta_view) || !empty($meta_comments)){ 
	?>
 	<ul class="rd-meta">
 
		<?php if(!empty($meta_review )  && !empty($meta['xecuter_review'][0])){ ?>		
 			<li class="rd-review_meta"><?php xecuter_review_stars( ) ?></li>
		<?php } ?>
   
		<?php if( !empty($meta_author)){ ?>	
			<li class="rd-author"><?php echo esc_html(xecuter_t('by')).' ';?><?php echo get_the_author_link(); ?></li>
		<?php }?>
    
		<?php if(!empty( $meta_date) ){ ?>		
			<li class="rd-date"><?php xecuter_get_time() ?></li>
		<?php } ?>	
    
 		<?php if( !empty($meta_view )){ ?>
			<li class="rd-view"><?php echo xecuter_getPostViews(get_the_ID()); ?></li>
		<?php } ?>	
    
		<?php if(!empty($meta_comments)){ ?>
			<li class="rd-comment"> <?php comments_popup_link(xecuter_t('0'),xecuter_t('1'),'%', '', xecuter_t('commetsoff')); ?> </li>
		<?php } ?>
        
	</ul>
     
	<?php 
	}
} 
/********************************************************************
Post Blog Meta
*********************************************************************/
function xecuter_blog_meta(){ 
	global  $post,$smof_data;
  	$meta = get_post_meta( $post->ID );
 	$categories = get_the_category();
	global $smof_data;
	if ( is_category() ) {
 		$term = get_term_meta(get_query_var( 'cat'  ));
	}
	if(!empty($term['xecuter_blog_custom'][0])){
		$meta_review = !empty( $term[ 'xecuter_blog_meta_review' ][0] ) ? $term[ 'xecuter_blog_meta_review' ][0] : '';
		$meta_author = !empty( $term[ 'xecuter_blog_meta_author' ][0] ) ? $term[ 'xecuter_blog_meta_author' ][0] : '';
		$meta_date = !empty( $term[ 'xecuter_blog_meta_date' ][0] ) ? $term[ 'xecuter_blog_meta_date' ][0] : '';
		$meta_view = !empty( $term[ 'xecuter_blog_meta_view' ][0] ) ? $term[ 'xecuter_blog_meta_view' ][0] : '';
		$meta_comments = !empty( $term[ 'xecuter_blog_meta_comments' ][0] ) ? $term[ 'xecuter_blog_meta_comments' ][0] : '';

	} else{	
		$meta_review = !empty( $smof_data[ 'xecuter_blog_meta_review' ] ) ? $smof_data[ 'xecuter_blog_meta_review' ] : '';
		$meta_author = !empty( $smof_data[ 'xecuter_blog_meta_author' ] ) ? $smof_data[ 'xecuter_blog_meta_author' ] : '';
		$meta_date = !empty( $smof_data[ 'xecuter_blog_meta_date' ] ) ? $smof_data[ 'xecuter_blog_meta_date' ] : '';
		$meta_view = !empty( $smof_data[ 'xecuter_blog_meta_view' ] ) ? $smof_data[ 'xecuter_blog_meta_view' ] : '';
		$meta_comments = !empty( $smof_data[ 'xecuter_blog_meta_comments' ] ) ? $smof_data[ 'xecuter_blog_meta_comments' ] : '';
	}

	if(  (!empty($meta_review)&& !empty($meta['xecuter_review'][0])) || !empty($meta_author) || !empty($meta_date)  || !empty($meta_view) || !empty($meta_comments)){ 
	?>
 	<ul class="rd-meta">
 
		<?php if(!empty($meta_review)  && !empty($meta['xecuter_review'][0])){ ?>		
 			<li class="rd-review_meta"><?php xecuter_review_stars( ) ?></li>
		<?php } ?>
   
		<?php if( !empty($meta_author)){ ?>	
			<li class="rd-author"><?php echo esc_html(xecuter_t('by')).' ';?><?php echo get_the_author_link(); ?></li>
		<?php }?>
    
		<?php if( !empty($meta_date) ){ ?>		
			<li class="rd-date"><?php xecuter_get_time() ?></li>
		<?php } ?>	
    
 
		<?php if( !empty($meta_view)){ ?>
			<li class="rd-view"><?php echo xecuter_getPostViews(get_the_ID()); ?></li>
		<?php } ?>	
    
		<?php if( !empty($meta_comments)){ ?>
			<li class="rd-comment"> <?php comments_popup_link(xecuter_t('0'),xecuter_t('1'),'%', '', xecuter_t('commetsoff')); ?> </li>
		<?php } ?>
        
 	 </ul>
     
	<?php 
	}
}  

/********************************************************************
Sidebar
*********************************************************************/ 
function xecuter_sidebar(){ 
	global $xecuter_data;
 	$sidebar = !empty( $xecuter_data[ 'sidebar' ] ) ? $xecuter_data[ 'sidebar' ] : '';
     	if ( is_active_sidebar( $sidebar ) ) : 
			echo '<section class="rd-main-sidebar rd-sidebar  " >';
				dynamic_sidebar( sanitize_title($sidebar) ); 
			echo '</section>';
		endif;
 }

/********************************************************************
Thumb Post
*********************************************************************/
function xecuter_thumb( $thumb , $category = false ) { 
 	global $post,$xecuter_data;
	$meta = get_post_meta( $post->ID );
	$post_type = xecuter_data('post_type');
		 
		if($post_type=='slides'){
			$the_permalink = !empty($meta['reza_slide_link'][0]) ? $meta['reza_slide_link'][0] :''; 
		}else{
  			$the_permalink = get_permalink();
 		}	
  	if(has_post_thumbnail()){
	?>
        <div class="rd-thumb"> 
            <a class="rd-post-thumbnail rd-img-shadow" <?php if(!empty($the_permalink)){?>href="<?php echo esc_url($the_permalink) ?>" <?php }?>>
                <?php the_post_thumbnail( $thumb );  ?>
            </a>
       
            <?php if(!empty($meta['xecuter_featured_image_meta'][0])){?>
                <?php if( @$meta['xecuter_featured_image_meta'][0]  == 'video' ){ ?> 
                    <div class="rd-circular rd-icon-video">
                        <span></span>
                    </div>
                <?php } elseif( @$meta['xecuter_featured_image_meta'][0]  == 'review' ){ ?> 
                    <?php xecuter_review_circular(); ?>
                 <?php }?>
            <?php }?>
            <?php  xecuter_meta_category($category); ?> 
        </div>
 	<?php
	}
}
/********************************************************************
Post Title
*********************************************************************/ 
function xecuter_post_title($limit= false) {
	$the_title = strip_tags(get_the_title());
  	if ( !empty($limit) && strlen($the_title) > $limit){
 		 $content= mb_substr($the_title, 0,$limit).'...';
		 
	} else {
		$content= $the_title;
		$dots='';
	}
 	?>
    
 	<h3 class="rd-title"><a href="<?php the_permalink(); ?>"><?php echo esc_html($content);?></a></h3>
  	
	<?php 
}
/********************************************************************
Post Excerpt
*********************************************************************/ 
function xecuter_excerpt($limit=false) {
  	$the_excerpt = strip_tags(get_the_excerpt());
  	if ( !empty($limit) && strlen($the_excerpt) > $limit){
 		 $content= mb_substr($the_excerpt, 0,$limit).'...';
		 
	}else{
		$content= $the_excerpt;
 	}
	?>
    
	<div class="rd-excerpt"><?php echo esc_html($content);?></div>
	
	<?php 
}
/********************************************************************
Light Slider
*********************************************************************/
function xecuter_lightslider($max_number,$item,$custom=false) {
	global $xecuter_data; 
 	$number = isset( $xecuter_data['number'] ) ? $xecuter_data['number'] : '5';
 	$effect = isset( $xecuter_data['effect'] ) ? $xecuter_data['effect'] : 'slide';
 	$speed = isset( $xecuter_data['speed'] ) ? $xecuter_data['speed'] : '500';
 	$pause = isset( $xecuter_data['pause'] ) ? $xecuter_data['pause'] : '6000';
	if($number > $item){ $controls = ',"controls":true';} else{$controls='';}
	$rtl = is_rtl() ? '"rtl": true,':'';
 	$data_options = $custom.'"item":'.$item.','.$rtl.' "slideMove": 1,"slideMargin": 0,"speed":'.$speed.', "mode": "'.$effect.'"'.$controls.',"loop":true,"auto": true,"pause": '.$pause.'';
	if($number > $max_number){?>
 	<div class="rd-data-options" data-options='{<?php echo esc_attr($data_options);?>}'></div>
    <?php
	}
} 
/********************************************************************
Single Template
*********************************************************************/
function xecuter_single() {
 	global $post, $smof_data;
	$meta = get_post_meta( $post->ID );
	$xecuter_single_template = isset( $meta['xecuter_single_template'][0] ) ?  $meta['xecuter_single_template'][0]  : 'default';
	$xecuter_single_admin = isset( $smof_data['xecuter_single_template'] ) ?  $smof_data['xecuter_single_template']  : '3';
	
  	if( @$xecuter_single_template == 'default' || empty($xecuter_single_template)  ) {
 		$xecuter_single = @$xecuter_single_admin; 

	} else{
		$xecuter_single = $xecuter_single_template;
 	}
	return $xecuter_single;
	
}
/********************************************************************
Single  Meta
*********************************************************************/
function xecuter_single_meta(){ 
	global $smof_data; 	
	
	$type = 'xecuter_single_';
	if( !empty($smof_data[$type.'meta_author']) || !empty($smof_data[$type.'meta_date']) ||  !empty($smof_data[$type.'meta_cats' ] )|| !empty($smof_data[$type.'meta_view' ]) || !empty($smof_data[$type.'meta_comments'] )){ 
	?>
  
	<ul class="rd-meta">
 
 		<?php if( !empty($smof_data[$type.'meta_author'])){ ?>	
			<li class="rd-author"><?php echo esc_html(xecuter_t('by')).' ';?><?php echo get_the_author_link(); ?></li>
		<?php }?>
    
		<?php if( !empty($smof_data[$type.'meta_date']) ){ ?>		
			<li class="rd-date"><?php xecuter_get_time() ?></li>
		<?php } ?>	
    
		<?php if( !empty($smof_data[$type.'meta_cats']) ){ ?>
			<li class="rd-cats"> <?php printf('%1$s', get_the_category_list( ', ' ) ); ?> </li>
		<?php } ?>	
	
		<?php if( !empty($smof_data[$type.'meta_view'] )){ ?>
			<li class="rd-view"><?php echo xecuter_getPostViews(get_the_ID()); ?></li>
		<?php } ?>	
    
		<?php if( !empty($smof_data[$type.'meta_comments'] )){ ?>
			<li class="rd-comment"> <?php comments_popup_link(xecuter_t('0'),xecuter_t('1'),'%', '', xecuter_t('commetsoff')); ?> </li>
		<?php } ?>
        
 	 </ul>
     
	<?php 
	}
} 
 /********************************************************************
Post Center ADS
*********************************************************************/
function xecuter_ads() {
	global $xecuter_data;
	if( !empty($xecuter_data[ 'newwindow' ]) ){ $newwindow = '_blank'; }else{$newwindow= '';}
	if( !empty($xecuter_data[ 'nofollow' ]) ){ $nofollow = 'nofollow'; }else{$nofollow= '';}
    $image = isset( $xecuter_data[ 'image' ] ) ? $xecuter_data[ 'image' ]: '';
 	$ads_url = isset( $xecuter_data[ 'ads_url' ] ) ? $xecuter_data[ 'ads_url' ]: '';
	if( !empty($xecuter_data[ 'resize' ]) ){ $resize = 'rd-resize'; }else{$resize= '';}
      echo  '<div class="rd-ads '.esc_attr($resize).'">';
     	echo '<a href="'.esc_url($ads_url).'"   rel="'.esc_attr($nofollow).'" target="'.esc_attr($newwindow).'">';
    		echo '<img alt="ads" src="'.esc_url($image).'" />';
  		echo '</a>'; 		
 	echo '</div>'  ;  
}
?>