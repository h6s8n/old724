<?php 
$orig_post = $post;
global $post,$smof_data,$categories;
$tags = wp_get_post_tags($post->ID);
$count=0;
$xecuter_related_row = isset( $smof_data['xecuter_related_row'] ) ? $smof_data['xecuter_related_row'] : '1';
$xecuter_related_query = isset( $smof_data['xecuter_related_query'] ) ? $smof_data['xecuter_related_query'] : 'category';
$related_ratio = !empty( $smof_data[ 'xecuter_related_ratio' ] ) ? $smof_data[ 'xecuter_related_ratio' ]:'';
$col = xecuter_col();
if( $col == '1200' ){
 	$max_col = 4 ;
 	$layout = 'rd_content_grid_4c' ;
 	$post_col = 'rd-col-1-4 rd-col-979-2c rd-col-767-2c rd-col-499-2c' ;
 	$post_related = 'rd-post rd-post-module-2 rd-post-1-4 rd-col-1-1 rd-979-2c rd-767-2c rd-499-2c ' ;
 	$post_row = ' rd-col-979-2c rd-col-767-2c rd-col-499-2c ' ;
} else{
	$max_col = 3 ;
 	$layout = 'rd_main_grid_3c' ;
 	$post_col = 'rd-col-1-3 rd-col-979-3c rd-col-767-3c rd-col-499-1c' ;
 	$post_related = 'rd-post rd-post-module-2 rd-post-1-5 rd-col-1-1 rd-979-4c rd-767-3c rd-499-1c' ;
 	$post_row = 'rd-col-979-3c rd-col-767-3c rd-col-499-1 ' ;

}
$xecuter_related_number = $max_col * $xecuter_related_row;


$args_category = array(
			'category__in' => wp_get_post_categories($post->ID),
			'post__not_in' => array($post->ID),
			'posts_per_page'=> 	$xecuter_related_number,
			'caller_get_posts'=>1,
			'orderby'=>'rand',
		'ignore_sticky_posts'=>1,
);
$related_category = new wp_query( @$args_category );


$posttags = get_the_tags();
$test = '';
$sep = '';
if ($posttags) {
    foreach($posttags as $tag) {
        $test .= $sep . $tag->name; 
        $sep = ",";
    }
}

@$args_tags = array(
	'tag' => $test,
	'post__not_in' => array($post->ID),
	'posts_per_page'=>	$xecuter_related_number, 
	'caller_get_posts'=>1,
		'ignore_sticky_posts'=>1,
);

$related_tags = new wp_query( @$args_tags );


if($xecuter_related_query =='category' && $related_category->have_posts()){
$args = $args_category;
  				
} elseif($xecuter_related_query =='tag' && $related_tags->have_posts()){
 
$args = $args_tags;
			
} elseif($xecuter_related_query =='random'){
	
    @$args = array(
      'posts_per_page'=> $xecuter_related_number,
	  'caller_get_posts'=>1,
		'ignore_sticky_posts'=>1,
     );	 
	 
} else {
	
    @$args = array( 
		'posts_per_page'=> $xecuter_related_number,
		'orderby'=>'rand',
		'caller_get_posts'=>1,
		'ignore_sticky_posts'=>1,
 	);
}
     
$related_query = new wp_query( @$args );
?>
 
<div class="rd-related rd-grid  <?php echo esc_attr($layout);?> <?php echo esc_attr($related_ratio);?> ">
	<?php if ( !empty($smof_data['xecuter_related_title'])){?>
     	<div class="rd-title-box"><h4><a href=""><?php echo esc_html($smof_data['xecuter_related_title']);?></a></h4></div>
   	<?php }?>
 	<div class="rd-post-list">
  		<?php if( @$related_query->have_posts() ) :?>
		<?php while ( @$related_query->have_posts() ) : @$related_query->the_post(); $count++;?>
				<article class="rd-post-item <?php echo esc_attr($post_col);?>">
 					<div id="post-<?php the_ID(); ?>" <?php post_class($post_related );?>>
						<div class="rd-post-warp">
 							<?php xecuter_thumb ('xecuter_large',true);?>                	                            
							<div class="rd-details">
								<?php  xecuter_post_title(); ?> 
							</div>
						</div>
                    </div>     
				</article>
				<div class="rd-row <?php echo esc_attr($post_row);?>"></div>
 		<?php endwhile;?>
		<?php endif;?>
	</div>
</div>
<div class="rd-padding"></div>

<?php	 
 	$post = $orig_post;
	wp_reset_postdata();
?>