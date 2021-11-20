<?php  
global  $post,$smof_data;
if ( is_category() ) {
		$meta = get_term_meta(get_query_var( 'cat'  ));

} elseif ( (  is_page() || is_single())) {
	$meta = get_post_meta( $post->ID );
}	
 
if(!empty($smof_data['xecuter_sticky_main']) ){
	$sticky = 'rd-sticky-sidebar';
} else {
	$sticky='';
}
 
 if( is_single() && !empty($meta['xecuter_single_sidebar'][0]) ){
	$sidebar =   $meta['xecuter_single_sidebar'][0];

} elseif( is_single() &&  !empty($smof_data['xecuter_single_sidebar'])){
	$sidebar = $smof_data['xecuter_single_sidebar'];

} elseif( is_page() && !empty($meta['xecuter_page_sidebar'][0]) ){
	$sidebar = $meta['xecuter_page_sidebar'][0];

} elseif( is_page() && !empty( $smof_data['xecuter_page_sidebar']) ){
	$sidebar = $smof_data['xecuter_page_sidebar'];

}elseif( is_category() &&  !empty($smof_data['xecuter_cats_sidebar'] ) ){
	$sidebar =  $smof_data['xecuter_cats_sidebar'];

}elseif( is_archive() &&  !empty($smof_data['xecuter_archive_sidebar'] ) ){
	$sidebar =  $smof_data['xecuter_archive_sidebar'];

}elseif ( function_exists('is_bbpress') && is_bbpress() && !empty($smof_data['xecuter_bbpress_sidebar'] )){
	$sidebar =  $smof_data[ 'xecuter_bbpress_sidebar'];

} elseif( is_home() && !empty($smof_data['xecuter_home_sidebar']) ){
	$sidebar =  $smof_data['xecuter_home_sidebar'];

}  else{
	$sidebar = 'xecuter_main_sidebar';
}
 echo'<div class="rd-column-sidebar  rd-column rd-mini rd-400">';
	if ( is_active_sidebar( $sidebar ) ) {  

		echo '<section class="rd-main-sidebar rd-sidebar '.esc_attr($sticky).'" >';
			dynamic_sidebar( sanitize_title($sidebar) );
		echo '</section>';
    
	};	
		
echo'</div>';
 
 ?>