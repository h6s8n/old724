<?php
// Custom Functions 
include_once get_template_directory() . '/custom-functions.php';
include_once get_template_directory() . '/framework/codestar-wp-color-picker.php'; 
include_once get_template_directory() . '/framework/admin/index.php';
include_once get_template_directory() . '/framework/functions.php';
include_once get_template_directory() . '/framework/menu/walker_menu.php';   
include_once get_template_directory() . '/framework/wp_list_comments.php';
include_once get_template_directory() . '/framework/builder/builder.php';
include_once get_template_directory() . '/framework/builder/block-panel.php';
include_once get_template_directory() . '/framework/builder/builder-options.php';
include_once get_template_directory() . '/framework/custom-style.php';
include_once get_template_directory() . '/framework/category-meta.php';
include_once get_template_directory() . '/framework/metabox.php';   
include_once get_template_directory() . '/framework/custom-sidebar.php';  
include_once get_template_directory() . '/framework/menu/menu-item-custom-fields.php';   
include_once get_template_directory() . '/inc/widget.php';
include_once get_template_directory() .	'/inc/breadcrumbs.php';
include_once get_template_directory() . '/inc/pagenavi.php';
include_once get_template_directory() . '/inc/social.php';   
include_once get_template_directory() . '/inc/builder/wide.php';   
include_once get_template_directory() . '/inc/builder/post-wide.php';   
include_once get_template_directory() . '/inc/builder/content.php';   
include_once get_template_directory() . '/inc/builder/post-content.php';   
include_once get_template_directory() . '/inc/builder/post-main.php';   
include_once get_template_directory() . '/inc/builder/post-mini.php';   
include_once get_template_directory() . '/inc/builder/main.php';   
include_once get_template_directory() . '/inc/builder/mini.php';  
include_once get_template_directory() . '/inc/post-functions.php';   
include_once get_template_directory() . '/dt-demo-importer/init.php';   
/********************************************************************
Register Script And Style
*********************************************************************/
add_action( 'wp_enqueue_scripts', 'xecuter_register' ); 

function xecuter_register() {
 
	 global  $smof_data,$post;
	 
	if ( is_category() ) {
		$meta = get_term_meta(get_query_var( 'cat'  ));
	}
 	elseif (  is_page() || is_single()) {
		$meta = get_post_meta( $post->ID );
	}  	
	 
   	// Primary color
 	if(!empty($meta['xecuter_primary_color'][0])){
		$primary_color = !empty( $meta['xecuter_primary_color'][0]) ?  $meta['xecuter_primary_color'][0]  : '';
 	} else{
		$primary_color = !empty( $smof_data['xecuter_primary_color']) ?  $smof_data['xecuter_primary_color']  : '#ff0055';
	}
	
	
   	wp_enqueue_style( 'xecuter_style', get_stylesheet_uri(),array(),null );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css',array() );
	wp_enqueue_style( 'xecuter_post', get_template_directory_uri().'/css/post.css',array() );
  	wp_enqueue_style( 'xecuter_featured', get_template_directory_uri().'/css/featured.css',array() );
	wp_enqueue_style( 'xecuter_grid', get_template_directory_uri().'/css/grid.css',array() );
	wp_enqueue_style( 'xecuter_list', get_template_directory_uri().'/css/list.css',array() );
   	wp_add_inline_style( 'xecuter_style', xecuter_custom_css() ); 
    if ( function_exists ( "is_woocommerce" )){
	 	wp_enqueue_style( 'woocommerce', get_template_directory_uri().'/css/woocommerce.css',array() );
	}
	if(!empty($smof_data['xecuter_body_google_font_family'] )||  !empty($smof_data['xecuter_logo_google_font_family']) || !empty($smof_data['xecuter_slider_google_font_family'])){
		wp_enqueue_style( 'xecuter_google_font', xecuter_fonts_url(), array(), '1.0.0' );
	}

 	if ( is_rtl() ){
		wp_enqueue_style('xecuter-rtl',get_template_directory_uri() . '/css/rtl.css',array ( ));
    }
	wp_register_script( 'xecuter_scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery'));  
	$array = array('primary_color' => $primary_color, 'ajaxurl' => admin_url( 'admin-ajax.php'  ));
 	wp_localize_script( 'xecuter_scripts', 'xecuter_js', $array  );	
  	if ( !empty( $smof_data[ 'xecuter_custom_script' ] ) ) {  
   		wp_add_inline_script( 'xecuter_scripts', 'jQuery(document).ready(function(){'. $smof_data[ 'xecuter_custom_script' ].'});' );
 	} 
   	wp_add_inline_script( 'xecuter_scripts', "(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);" ); 
	wp_enqueue_script( 'xecuter_lightslider', get_template_directory_uri() . '/js/lightslider.js', array( 'jquery'));  
	wp_enqueue_script( 'xecuter_scripts' );

     wp_register_script( 'xecuter_html5', get_template_directory_uri() . '/js/html5shiv.js', array( 'jquery') );
     wp_enqueue_script( 'xecuter_html5');
    wp_script_add_data( 'xecuter_html5', 'conditional', 'lt IE 9' );
    wp_enqueue_style( 'dashicons' , null); 
	  
 
    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
    }
}
 
function xecuter_number_replace($English_Number){
$Persian_Number = str_replace(
array('0','1','2','3','4','5','6','7','8','9'),
array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'),
$English_Number
);
return $Persian_Number;
 }
 
 if ( is_admin() && in_array( $pagenow, array( 'post-new.php', 'post.php','admin-ajax.php' ,'nav-menus.php','themes.php') ) ) {
add_action('admin_enqueue_scripts', 'xecuter_admin_enqueue');
function xecuter_admin_enqueue($hook) {
 
 	wp_register_script('migrate', get_template_directory_uri() . '/framework/assets/js/jquery-migrate-1.0.0.js','1.0', true );
  
	wp_enqueue_script( 'migrate' );
	
}
} 
/********************************************************************
Columns
*********************************************************************/
function xecuter_col($class = false) {
	$xecuter_row = is_rtl() ? '400_800':'800_400';
	global  $post,$smof_data ;
	
    
	if ( is_category() ) {
 		$term = get_term_meta(get_query_var( 'cat'  ));
   	}
	 
   	if ( (  is_page() || is_single())) {
		$meta = get_post_meta( $post->ID );
	}	
	
  	if ( (  is_page() || is_single()) && !empty($meta['xecuter_full_width'][0]) ) {
		$row ='1200';
	}else{
 		if(!empty($term['xecuter_row_custom'])){
			
			$row = !empty( $term['xecuter_row'][0] ) ? $term['xecuter_row'][0] :  $xecuter_row;
		} else{
			
			$row = !empty( $smof_data['xecuter_row'] ) ? $smof_data['xecuter_row'] :  $xecuter_row;
		}
	}
	if($row =='1200'){
		$col='rd-1200 rd-content';
	
	} else{
		$col='rd-800 rd-main';
    
 	} 
	
	if($class== true){
		return $col;
		
	}else{
		return $row;
	} 
} 
/********************************************************************
Columns Sidebar
*********************************************************************/
function xecuter_col_sidebar($sidebar) {
	global  $post,$smof_data;
 	
	if ( (  is_page() || is_single())) {
		$meta = get_post_meta( $post->ID );
	}	
		
	 if ( (  is_page() || is_single()) && !empty($meta['xecuter_full_width'][0]) ) {
		$row ='content';
	 }else{
		$row = !empty( $smof_data['xecuter_row'] ) ? $smof_data['xecuter_row'] : 'main_right';
	}
  
  
	if($row =='main_right'){
		$sidebar_1='sidebar-right';
	
	} elseif($row =='left_main'){
		$sidebar_1='sidebar-left';
	   
	} elseif($row =='center'){
		$sidebar_1='sidebar-right';

	} elseif($row =='center_right'){
		$sidebar_1='sidebar-left';
		$sidebar_2='sidebar-right';
	
	} elseif($row =='left_center'){
		$sidebar_1='sidebar-right';
		$sidebar_2='sidebar-left';
		
	} 
	
	if($sidebar== '1'){
		return $sidebar_1;
	
	}elseif($sidebar== '2'){
		return $sidebar_2;
	}
 $reza = xecuter_cats_data(); 
 $reza['color'];

}
 
/********************************************************************
Font Url
*********************************************************************/
function xecuter_fonts_url() {
    $font_url = '';
	global  $smof_data;
    
	$font_families = array();
	 
	if ( !empty($smof_data['xecuter_body_google_font_family'] ) ) {
		$font_families[] = $smof_data['xecuter_body_google_font_family'];
	}
	
	if ( !empty($smof_data['xecuter_logo_google_font_family'] ) ) {
		$font_families[] = $smof_data['xecuter_logo_google_font_family'];
	}
	 
	if ( !empty($smof_data['xecuter_slider_google_font_family']) ) {
		$font_families[] = $smof_data['xecuter_slider_google_font_family'];
	}
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
		
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	return esc_url_raw( $fonts_url );
}
/********************************************************************
Meta Data
*********************************************************************/
function xecuter_meta_data($id= false,$is = false) {
	global $smof_data,$post;
	$is_build = !empty( $smof_data['xecuter_page_builder']) ?  $smof_data['xecuter_page_builder']  : '';
	if( is_page()){
		$page_meta =  get_post_meta($post->ID, $id, true );
	} else{
		$page_mate='';
	}
	if( !empty($is_build)){
		$build_meta =  get_post_meta( $is_build,$id, true );
	} else{
		$build_meta='';
	}	
	
 	if( is_page() && $is == 'is_page'){
 		$data = get_post_meta($post->ID, $id, true );
		
	} elseif(!empty($is_build) && $is == 'is_build'){
 		$data = get_post_meta( $is_build,$id, true );
	} else{
		$data= '';
	}
	return $data;
	
}
/********************************************************************
Custom Meta Data
*********************************************************************/
function xecuter_custom_meta($id= false) {
	global $smof_data,$post;
 	if( is_page()){
		$page_meta =  get_post_meta($post->ID, $id, true );
	} else{
		$page_mate='';
	} 
	
 	if( is_page() && !empty($page_meta )){
 		$data = 'is_page';
	} else{
 		$data = 'is_build';
	}  
	return $data;
	
} 
/********************************************************************
xecuter translate
*********************************************************************/
function xecuter_t($id) {
	global $smof_data;
	$t = !empty( $smof_data['xecuter_t_'.$id]) ?  $smof_data['xecuter_t_'.$id]  : xecuter_translation($id);
	return esc_html($t);
} 
add_filter( 'display_post_states', 'xecuter_display_post_states', 10, 2 ); 
function xecuter_display_post_states( $post_states, $post ) {
	 global $smof_data;
	 if(!empty($smof_data['xecuter_page_builder'])){
 		 if ( $smof_data['xecuter_page_builder'] == $post->ID ) {
			 $post_states['xecuter_page_builder'] = 'برگه در صفحه اول سایت قرار گرفته است';
		 }
	  }
	 
	return $post_states;

	 
 }
/********************************************************************
xecuter translate
*********************************************************************/
function xecuter_translation($id= false) {
 	switch( $id ) {
	case 'homepage':		$val=esc_html__('Homepage', 'xecuter'); break;
	case 'archives':		$val=esc_html__('Archives', 'xecuter'); break;
	case 'author':			$val=esc_html__('Author:', 'xecuter'); break;
	case 'page':			$val=esc_html__('Page', 'xecuter'); break;
	case '404':				$val=esc_html__('Error 404', 'xecuter'); break;
	case 'of':				$val=esc_html__('of', 'xecuter'); break;
	case 'first':			$val=esc_html__('First', 'xecuter'); break;
	case 'last':			$val=esc_html__('Last', 'xecuter'); break;
	case 'previous':		$val=esc_html__('Previous', 'xecuter'); break;
	case 'next':			$val=esc_html__('Next', 'xecuter'); break;
	case 'edit':			$val=esc_html__('Edit', 'xecuter'); break;
	case 'by':				$val=esc_html__('by', 'xecuter'); break;
	case '0':				$val=esc_html__('0', 'xecuter'); break;
	case '1':				$val=esc_html__('1', 'xecuter'); break;
	case 'commetsoff':		$val=esc_html__('Comments Off', 'xecuter'); break;
	case 'load_more':		$val=esc_html__('Load more', 'xecuter'); break;
	case 'welcome':			$val=esc_html__('Welcome', 'xecuter'); break;
	case 'dashboard':		$val=esc_html__('Dashboard', 'xecuter'); break;
	case 'profile':			$val=esc_html__('Your Profile', 'xecuter'); break;
	case 'logout':			$val=esc_html__('Log Out', 'xecuter'); break;
	case 'login':			$val=esc_html__('Log In', 'xecuter'); break;
	case 'singin':			$val=esc_html__('Sing In', 'xecuter'); break;
	case 'username':		$val=esc_html__('Username:', 'xecuter'); break;
	case 'password':		$val=esc_html__('Password:', 'xecuter'); break;
	case 'remember':		$val=esc_html__('Remember Me', 'xecuter'); break;
	case 'register':		$val=esc_html__('Register', 'xecuter'); break;
	case 'lostpassword':	$val=esc_html__('Lost Your Password?', 'xecuter'); break;
	case 'view':			$val=esc_html__('View', 'xecuter'); break;
	case 'views':			$val=esc_html__('Views', 'xecuter'); break;
	case 'tags':			$val=esc_html__('Tags', 'xecuter'); break;
	case 'years':			$val=esc_html__('Years', 'xecuter'); break;
	case 'year':			$val=esc_html__('Year', 'xecuter'); break;
	case 'months':			$val=esc_html__('Months', 'xecuter'); break;
	case 'month':			$val=esc_html__('Month', 'xecuter'); break;
	case 'days':			$val=esc_html__('Days', 'xecuter'); break;
	case 'day':				$val=esc_html__('Day', 'xecuter'); break;
	case 'hours':			$val=esc_html__('Hours', 'xecuter'); break;
	case 'hour':			$val=esc_html__('Hour', 'xecuter'); break;
	case 'minutes':			$val=esc_html__('Minutes', 'xecuter'); break;
	case 'minute':			$val=esc_html__('Minute', 'xecuter'); break;
	case 'seconds':			$val=esc_html__('Seconds', 'xecuter'); break; 
	case 'second':			$val=esc_html__('Second', 'xecuter'); break; 
 	case 'ago':				$val=esc_html__('ago', 'xecuter'); break;
	case 'pages':			$val=esc_html__('Pages:', 'xecuter'); break;
	case 'at':				$val=esc_html__('at', 'xecuter'); break;
	case 'yourcomment':		$val=esc_html__('Your Comment is Awaiting Moderation.', 'xecuter'); break;
 	case 'pingback':		$val=esc_html__('Pingback:', 'xecuter'); break;
	case 'search':			$val=esc_html__('Search...', 'xecuter'); break;
	case 'search_for':		$val=esc_html__('Search Results for:', 'xecuter'); break;
	case 'nocommentsyet':	$val=esc_html__('No Comments Yet', 'xecuter'); break;
	case 'commentalready':	$val=esc_html__('Comment Already', 'xecuter'); break;
	case 'commentsalready': $val=esc_html__('Comments Already', 'xecuter'); break;
 	case 'commentsclosed':	$val=esc_html__('Comments are Closed.', 'xecuter'); break;
 	case 'tagarchives':		$val=esc_html__('Tag Archives:', 'xecuter'); break;
	case 'opps':			$val=esc_html__('Oops! That Page can&rsquo;t be found.', 'xecuter'); break;
	case 'sorry':			$val=esc_html__("Sorry, but you are looking for something that isn't here", 'xecuter'); break;
	
   	 default:$val='';
 	}
 		 return  $val;

 } 
?>