<?php
/********************************************************************
Widget
*********************************************************************/
get_template_part('inc/widgets/widget-featured-1c');  
get_template_part('inc/widgets/widget-featured-2c');  
get_template_part('inc/widgets/widget-featured-3c');  
get_template_part('inc/widgets/widget-grid-1c');  
get_template_part('inc/widgets/widget-grid-2c');  
get_template_part('inc/widgets/widget-list-1c');  
get_template_part('inc/widgets/widget-list-2');  
get_template_part('inc/widgets/widget-list-3');  
get_template_part('inc/widgets/widget-text-1c');  
get_template_part('inc/widgets/widget-text-2');  
get_template_part('inc/widgets/widget-text-3');  
get_template_part('inc/widgets/widget-slider');   
get_template_part('inc/widgets/widget-ads');  
get_template_part('inc/widgets/widget-ads-html');  
get_template_part('inc/widgets/widget-recent-comments');  
get_template_part('inc/widgets/widget-login');
get_template_part('inc/widgets/widget-tags');	
get_template_part('inc/widgets/widget-social');
get_template_part('inc/widgets/widget-text-link');
	
/********************************************************************
Widget Post Meta
*********************************************************************/
function xecuter_widget_meta( $meta,$meta_2 =false ){ 
	global  $post,$smof_data;
 
 	 $categories = get_the_category();
 
	$post_meta = get_post_meta( $post->ID );
 	if(  @$meta !=='none' || $meta_2 !='none' ){ ?>
 		
		<ul class="rd-meta">
  			<?php if( @$meta=='review' && !empty($post_meta['xecuter_review'][0])) { ?>		
 				<li class="rd-review_meta"><?php xecuter_review_stars( ) ?></li>
                
 			<?php } elseif ( @$meta == 'cats' ){ ?>		
				<li class="rd-cats">
        			<a href="<?php echo esc_url_raw( get_category_link( $categories[0] ) ) ?>"><?php echo esc_html( $categories[0]->name ) ?></a>
				</li>
 			<?php } elseif ( @$meta == 'author' ){ ?>		
			<li class="rd-author"><?php echo esc_html(xecuter_t('by')).' ';?><?php echo get_the_author_link(); ?></li>
 			
			<?php } elseif( @$meta == 'date'  ){ ?>		
 				<li class="rd-date"><?php xecuter_get_time() ?></li>
                
 		 	<?php } elseif( @$meta== 'view' ) { ?>
 				<li class="rd-view "><?php echo xecuter_getPostViews(get_the_ID()); ?></li>
 
			<?php } elseif ( @$meta == 'comments' )  { ?>
			<li class="rd-comment"> <?php comments_popup_link(xecuter_t('0'),xecuter_t('1'),'%', '', xecuter_t('commetsoff')); ?> </li>
			<?php } ?>
             
			<?php if( @$meta_2=='review' && !empty($post_meta['xecuter_review'][0])) { ?>		
 				<li class="rd-review_meta"><?php xecuter_review_stars( ) ?></li>
                
 			<?php } elseif ( @$meta_2 == 'cats' ){ ?>		
				<li class="rd-cats">
        			<a href="<?php echo esc_url_raw( get_category_link( $categories[0] ) ) ?>"><?php echo esc_html( $categories[0]->name ) ?></a>
				</li>
 			<?php } elseif ( @$meta_2 == 'author' ){ ?>		
			<li class="rd-author"><?php  echo esc_html(xecuter_t('by')).' ';?><?php echo get_the_author_link(); ?></li>
 			
			<?php } elseif( @$meta_2 == 'date'  ){ ?>		
 				<li class="rd-date"><?php xecuter_get_time() ?></li>
                
 		 	<?php } elseif( @$meta_2== 'view' ) { ?>
 				<li class="rd-view "><?php echo xecuter_getPostViews(get_the_ID()); ?></li>
 
			<?php } elseif ( @$meta_2 == 'comments' )  { ?>
			<li class="rd-comment"> <?php comments_popup_link(xecuter_t('0'),xecuter_t('1'),'%', '', xecuter_t('commetsoff')); ?> </li>
 			<?php } ?>
  		</ul>
 	<?php 
	}
} 

/********************************************************************
Post Module 1
*********************************************************************/
function xecuter_post_widget_1($instance,$class,$thumb,$excerpt =false,$meta_category= false){
	$classes = array('rd-post','rd-post-module-1',$class);
  	$title_limit = !empty( $instance['title_limit'] ) ? $instance['title_limit'] : '';
	$excerpt_limit = !empty( $instance['excerpt_limit'] ) ? $instance['excerpt_limit'] : '';	
  	$meta = !empty( $instance['meta'] ) ? $instance['meta'] : '';
	$meta_2 = !empty( $instance['meta_2'] ) ? $instance['meta_2'] : '';
		
	?>
    
 	<div <?php post_class( $classes );?>>
		<div class="rd-post-warp ">
 			<?php xecuter_thumb ($thumb);?>                	                            
 			<div class="rd-details">
				<?php  xecuter_meta_category($meta_category); ?> 
 				<?php  xecuter_post_title($title_limit);   ?> 
				<?php  xecuter_widget_meta($meta,$meta_2); ?> 
 				<?php if($excerpt == true ) xecuter_excerpt($excerpt_limit);?>

			</div>
		</div>
 	</div>
	<?php
}  
/********************************************************************
Post Module 2
*********************************************************************/
 function xecuter_post_widget_2($instance,$class,$thumb,$ins_excerpt = true ){
	$classes = array('rd-post','rd-post-module-2',$class);
	
   	$excerpt = !empty( $instance['excerpt'] ) ? $instance['excerpt'] : '';
 	$title_limit = !empty( $instance['title_limit'] ) ? $instance['title_limit'] : '';
	$excerpt_limit = !empty( $instance['excerpt_limit'] ) ? $instance['excerpt_limit'] : '';	
 	$meta_category = !empty( $instance['meta_category'] ) ? $instance['meta_category'] : '';
 	$meta = !empty( $instance['meta'] ) ? $instance['meta'] : '';
	$meta_2 = !empty( $instance['meta_2'] ) ? $instance['meta_2'] : '';
	?>
  
	<div <?php post_class( $classes );?>>
		<div class="rd-post-warp ">
 			<?php xecuter_thumb ($thumb,$meta_category);?>                	                            
			<div class="rd-details">
				<?php  xecuter_post_title($title_limit); ?> 
				<?php  xecuter_widget_meta($meta,$meta_2); ?> 
 				<?php if($excerpt == true) xecuter_excerpt($excerpt_limit);?>
 			</div>
		</div>
 	</div>
	<?php
}
/********************************************************************
Post Module 3
*********************************************************************/
function xecuter_post_widget_3($instance,$class,$thumb   ){
	$classes = array('rd-post','rd-post-module-3',$class);
	
 	$title = !empty( $instance['post_title'] ) ? $instance['post_title'] : '';
 	$excerpt = !empty( $instance['excerpt'] ) ? $instance['excerpt'] : '';
 	$title_limit = !empty( $instance['title_limit'] ) ? $instance['title_limit'] : '';
	$excerpt_limit = !empty( $instance['excerpt_limit'] ) ? $instance['excerpt_limit'] : '';	
 	$meta_category = !empty( $instance['meta_category'] ) ? $instance['meta_category'] : '';
 	$meta = !empty( $instance['meta'] ) ? $instance['meta'] : '';
	$meta_2 = !empty( $instance['meta_2'] ) ? $instance['meta_2'] : '';
	
	?>
  
	<div <?php post_class( $classes );?> >
		<div class="rd-post-container">
 			<div class="rd-post-warp">
				<?php xecuter_thumb ($thumb);?>                	                            
				<div class="rd-details">
 					<?php  xecuter_meta_category($meta_category); ?> 
					<?php  if(!empty($title)) xecuter_post_title($title_limit); ?> 
					<?php  xecuter_widget_meta($meta,$meta_2); ?> 
					<?php if(!empty($excerpt) ) xecuter_excerpt($excerpt_limit);?>
				</div>
  			</div>
		</div>
	</div>
	<?php
}
/********************************************************************
Post Module 3
*********************************************************************/
function xecuter_post_widget_4($instance,$class ,$excerpt =false ){
	$classes = array('rd-post','rd-post-module-4',$class);
  	$title_limit = !empty( $instance['title_limit'] ) ? $instance['title_limit'] : '';
	$excerpt_limit = !empty( $instance['excerpt_limit'] ) ? $instance['excerpt_limit'] : '';
 	$meta = !empty( $instance['meta'] ) ? $instance['meta'] : '';
	$meta_2 = !empty( $instance['meta_2'] ) ? $instance['meta_2'] : '';
	?>
  
	<div <?php post_class( $classes );?> >
  			<div class="rd-post-warp">
 				<div class="rd-details">
 					<?php   xecuter_post_title($title_limit); ?> 
					<?php  xecuter_widget_meta($meta,$meta_2); ?> 
					<?php if($excerpt == true) xecuter_excerpt($excerpt_limit);?>
				</div>
 			</div>
	</div>
	<?php
} 
/********************************************************************
Widget Post Quray
*********************************************************************/
function xecuter_widget_query( $instance= false) { 
	$xecuter_orderby = xecuter_orderby($instance);
	$xecuter_date_query =xecuter_date_query($instance);
	$xecuter_meta_key = xecuter_meta_key($instance);
	$args=array();
 	$args['post_type']='post';
  	$args['post_status']='publish';
	if(!empty($instance['number'])){
		$args['posts_per_page']=$instance['number'];
	}
	if(!empty($instance['cats'])){
		$args['cat']=$instance['cats'];
	}
	if(!empty($xecuter_orderby)){
		$args['orderby']=$xecuter_orderby;
	}
	if(!empty($xecuter_date_query)){
		$args['date_query']=$xecuter_date_query;
	}
			$args['ignore_sticky_posts']=1;

 
	if(!empty($xecuter_meta_key)){
		$args['meta_key']=$xecuter_meta_key;
	} 
	$query = new WP_Query($args );
  	return $query;
}  
function xecuter_meta_array() {
 	return array(
		'none'		=> esc_html__('None' , 'xecuter' ),
		'review'	=> esc_html__('Review' , 'xecuter' ),
		'cats'		=> esc_html__('Category' , 'xecuter' ),
		'date'		=> esc_html__('Date' , 'xecuter' ),
		'comments'	=> esc_html__('Comments' , 'xecuter' ),
		'author'	=> esc_html__('Author' , 'xecuter' ),
		'view'		=> esc_html__('View' , 'xecuter' )
	);
} 
/********************************************************************
Register Widget  
*********************************************************************/
add_action( 'widgets_init', 'xecuter_widgets_init' );
function xecuter_widgets_init() {
 	global $smof_data;
	
 	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' 				=> esc_html__('Primery Sidebar' , 'xecuter'), 
			'id' 				=> 'xecuter_main_sidebar',  
			'before_widget'		=> '<div id="%1$s" class="widget  %2$s">',
			'after_widget' 		=> '</aside></div>',
 			'before_title' 		=> '<div class="rd-title-box" ><h4><span class="rd-active">',
        	'after_title'   	=> '</span></h4></div><aside class="widget-container">',
		)); 
 	 }
	 
	 
	   
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' 				=> esc_html__('Footer Column 1' , 'xecuter'), 
			'id' 				=> 'xecuter_footer_1',
			'before_widget'		=> '<div id="%1$s" class="widget  %2$s">',
			'after_widget'  	=> '</aside></div>',
			'before_title'  	=> '<div class="rd-title-box" ><h4><span class="rd-active">',
			'after_title'   	=> '</span></h4></div><aside class="widget-container">',
		)); 
	} 
	
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' 				=> esc_html__('Footer Column 2' , 'xecuter'), 
			'id' 				=> 'xecuter_footer_2',
			'before_widget'		=> '<div id="%1$s" class="widget  %2$s">',
			'after_widget'  	=> '</aside></div>',
			'before_title'  	=> '<div class="rd-title-box" ><h4><span class="rd-active">',
			'after_title'   	=> '</span></h4></div><aside class="widget-container">',
		)); 
	} 
	   
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' 				=> esc_html__('Footer Column 3' , 'xecuter'), 
			'id' 				=> 'xecuter_footer_3',
			'before_widget'		=> '<div id="%1$s" class="widget  %2$s">',
			'after_widget'  	=> '</aside></div>',
			'before_title'  	=> '<div class="rd-title-box" ><h4><span class="rd-active">',
			'after_title'   	=> '</span></h4></div><aside class="widget-container">',
		)); 
	} 
 
	 
	if ( function_exists('register_sidebar') && !empty( $smof_data[ 'xecuter_above_content' ])) {
		register_sidebar(array(
			'name' 				=> esc_html__('Above Content For Ads' , 'xecuter'), 
			'id' 				=> 'xecuter_above_content_ads', 
			'description'   	=> esc_html__('just for show ADS widget' , 'xecuter'),		
			'before_widget' 	=> '<div class="%1$s">',
 			'after_widget' 		=> '</aside></div>',
 			'before_title' 		=> '<div class="rd-title-box" ><h4><span class="rd-active">',
        	'after_title'   	=> '</span></h4></div><aside class="widget-container rd-post-background">',
 		)); 
	} 
  
	if ( function_exists('register_sidebar') && !empty( $smof_data[ 'xecuter_below_content' ] )) {
		register_sidebar(array(
			'name' 				=> esc_html__('Below Content For Ads' , 'xecuter'), 
			'id'				=> 'xecuter_below_content_ads',
			'description'   	=> esc_html__('just for show ADS widget' , 'xecuter'),		
			'before_widget'		=> '<div id="%1$s" class="widget  %2$s">',
 			'after_widget' 		=> '</aside></div>',
 			'before_title' 		=> '<div class="rd-title-box" ><h4><span class="rd-active">',
        	'after_title'   	=> '</span></h4></div><aside class="widget-container rd-post-background">',
		)); 
     }  
	 
	if ( function_exists('register_sidebar')  && !empty($smof_data[ 'xecuter_above_center' ]  ) ) {
          register_sidebar(array(
			'name' 				=> esc_html__('Above Main Column For Ads' , 'xecuter'),
			'id' 				=> 'xecuter_above_center_ads', 
			'description'   	=> esc_html__('just for show ADS widget' , 'xecuter'),		
			'before_widget'		=> '<div id="%1$s" class="widget  %2$s">',
 			'after_widget' 		=> '</aside></div>',
 			'before_title' 		=> '<div class="rd-title-box" ><h4><span class="rd-active">',
        	'after_title'   	=> '</span></h4></div><aside class="widget-container rd-post-background">',			
 		)); 
     }  
	 
	if ( function_exists('register_sidebar') && !empty( $smof_data[ 'xecuter_below_center' ])) {
		register_sidebar(array(
			'name' 				=> esc_html__('Below Main Column Area' , 'xecuter'), 
			'id' 				=> 'xecuter_below_center_ads',
			'description'   	=> esc_html__('just for show ADS widget' , 'xecuter'),		
			'before_widget'		=> '<div id="%1$s" class="widget  %2$s">',
 			'after_widget' 		=> '<aside/></div>',
 			'before_title' 		=> '<div class="rd-title-box" ><h4><span class="rd-active">',
        	'after_title'   	=> '</span></h4></div><aside class="widget-container rd-post-background">'
		)); 
	} 

	if ( function_exists('register_sidebar') && !empty( $smof_data[ 'xecuter_below_article' ] ) ) {
		register_sidebar(array(
			'name' 				=> esc_html__('Below Article Area' , 'xecuter'), 
			'id' 				=> 'xecuter_below_article_ads',
			'description'   	=> esc_html__('just for show ADS widget' , 'xecuter'),		
			'before_widget'		=> '<div id="%1$s" class="widget  %2$s">',
 			'after_widget' 		=> '</aside></div>',
 			'before_title' 		=> '<div class="rd-title-box" ><h4><span class="rd-active">',
        	'after_title'   	=> '</span></h4></div><aside class="widget-container rd-post-background">',			
        )); 
     }  

}
 
?>