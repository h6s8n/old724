<?php
/********************************************************************
WP Head 
*********************************************************************/
add_action( 'wp_head', 'xecuter_wp_head' );
function xecuter_wp_head() {
	global $smof_data,$post;
 	if ( is_single() ) {
	  xecuter_setPostViews( get_the_ID() );
	}  ?>  
    
 	<?php if ( !empty( $smof_data[ 'xecuter_responsive' ]  ) ) { ?>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<?php } ?>

 
 	<?php if ( !empty( $smof_data[ 'xecuter_favicon' ] ) ) { ?>
	<link rel="shortcut icon" href="<?php echo esc_url( $smof_data[ 'favicon' ] ); ?>" type="image/x-icon" />
	<?php } ?>

	<?php if ( !empty( $smof_data[ 'xecuter_apple_iphone' ] ) ) { ?>
	<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( $smof_data[ 'apple_iphone' ] ); ?>">
	<?php } ?>


	<?php if ( !empty( $smof_data[ 'xecuter_apple_iPad' ] ) ) { ?>
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url( $smof_data[ 'apple_iPad' ] ); ?>">
	<?php } ?>
 
<?php 
}
/********************************************************************
Setup Theme
*********************************************************************/
add_action( 'after_setup_theme', 'xecuter_setup' );
function xecuter_setup() {
  
 	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );  
 	add_filter( 'enable_post_format_ui', '_ereturn_false' );

	load_theme_textdomain( 'xecuter', get_template_directory() . '/languages' );
  
	$menu = array(
		'xecuter_main_menu' => esc_html__('Main Menu' , 'xecuter'),
		'xecuter_plus_menu' =>esc_html__('Top Menu' , 'xecuter'),
	);
	 
 	register_nav_menus($menu );
 
}
 
/********************************************************************
Loop columns
*********************************************************************/
add_filter('loop_shop_columns', 'xecuter_loop_columns');
if (!function_exists('xecuter_loop_columns')) {
	function xecuter_loop_columns() {
		return 4; // 4 products per row
	}
}  
/********************************************************************
Fallback Nav
*********************************************************************/
function xecuter_fallback_nav() { 
	?>
	 <div class='rd-nav-manu'>
     	<ul>
        	<li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>"><?php echo esc_html__('Create Navigation Menu', 'xecuter')?></a></li>
		</ul>
	</div>
	<?php 
}

/********************************************************************
Post Views
*********************************************************************/
//Get Post Views
function xecuter_getPostViews($postID){
    $count_key = 'xecuter_views_count';
    $count = get_post_meta($postID, $count_key, true);
	
    if($count=='' || $count=='0'){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "۰ ". xecuter_t('view');
    }
    return xecuter_number_replace($count).' '. xecuter_t('views') ;
}

//Set Post Views
function xecuter_setPostViews($postID) {
    $count_key = 'xecuter_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function xecuter_remove_rel_attr($content) {
    return preg_replace('/\s+rel="attachment wp-att-[0-9]+"/i', '', $content);
}
add_filter('the_content', 'xecuter_remove_rel_attr');

// Add it to a column in WP-Admin 
add_filter('manage_posts_columns', 'xecuter_posts_column_views');
function xecuter_posts_column_views($defaults){
    $defaults['xecuter_post_views'] = esc_html__('Views' , 'xecuter' );
    return $defaults;
}

// Posts Custom Column Views
add_action('manage_posts_custom_column', 'xecuter_posts_custom_column_views',5,2);
function xecuter_posts_custom_column_views($column_name, $id){
	if($column_name === 'xecuter_post_views'){
        echo xecuter_number_replace(xecuter_getPostViews(get_the_ID()));
    }
} 

/********************************************************************
Login Form
*********************************************************************/
function xecuter_login() {
	global $user_ID, $user_identity, $user_level;
	global $smof_data;
	$login_align =  is_rtl() ? 'left':'right';

 	$xecuter_loginform_align = !empty( $smof_data[ 'xecuter_loginform_align' ] ) ? $smof_data[ 'xecuter_loginform_align' ]: $login_align ;
	?>
    <div class="rd-login rd-login-<?php echo esc_attr($xecuter_loginform_align);?>">     
 
		<?php  // Profile
		if ( $user_ID ) : ?>
            <div class="rd-singout">
				<ul><li class="rd-user"><a><i></i> <?php echo  esc_html($user_identity) ?></a></li></ul>
                
                <ul class="rd-singout-warp rd-login-sub" >
					<li><a href="<?php echo esc_url(home_url( '/') ) ; ?>wp-admin"><?php echo  esc_html(xecuter_t('dashboard')); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url( '/') ); ?>wp-admin/profile.php"><?php echo  esc_html(xecuter_t('profile')); ?></a></li>
                    <li><a href="<?php echo esc_url(wp_logout_url()); ?>"><?php echo  esc_html(xecuter_t('logout')); ?></a></li>
               </ul>
            </div>
        
		<?php //--Login---
		else  : ?>
            <div class="rd-singin">
                <ul>
                	<li class="rd-user"><i></i><a href="<?php echo wp_login_url(); ?>"><?php echo esc_html(xecuter_t('singin')); ?></a> 
					<?php if ( get_option('users_can_register') ) : ?>
					 / <a href="<?php echo esc_url(home_url('/')); ?>wp-login.php?action=register"><?php echo esc_html(xecuter_t('register')); ?></a>
					<?php endif; ?> 
                    </li>
               </ul>
            </div>
    
		<?php endif; ?>
        
    </div>
<?php 
}
function xecuter_search_form( $form ) {
	global $smof_data;
	$search_rtl = is_rtl() ? 'left':'right';

 	$searchform_align = !empty( $smof_data[ 'xecuter_searchform_align' ] ) ? $smof_data[ 'xecuter_searchform_align' ]: $search_rtl;
  	$form = '<div class="rd-search rd-search-'.esc_attr($searchform_align).'">';
		$form.='<a class="rd-search-icon"><i></i></a>';
		$form.='<div class="rd-search-sub">';
   			$form.='<form method="get" class="rd-searchform" action="'.esc_url(home_url( '/') ).'">';
   				 $form.='<input type="text" name="s" class="rd-search-text rd-input" value="" placeholder="'.esc_html(xecuter_t('search')).'" />';
 				$form.='<i class="rd-search-icon"></i>';
				$form.='<input type="submit" name="btnSubmit" class="rd-search-button" value="" />';
			$form.='</form>';
		$form.=' </div>';
	$form.='</div>';

	return $form;

}

add_filter( 'get_search_form', 'xecuter_search_form' );
/********************************************************************
wp title
*********************************************************************/
function xecuter_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;
	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf(  xecuter_t('page').  ' %s' , max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'xecuter_wp_title', 10, 2 );
// title-tag
add_action( 'after_setup_theme', 'xecuter_title_setup' );
function xecuter_title_setup() {
	add_theme_support( 'title-tag' );
}

if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function xecuter_slug_render_title() {?>
    
		<title><?php wp_title( '|', true, 'right' ); ?></title>
        
	<?php
	}
	add_action( 'wp_head', 'xecuter_slug_render_title' );
}
/********************************************************************
Post Thumbnails
*********************************************************************/
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	if ( ! !empty( $content_width ) ) {
	$content_width = 1200;
	}
}


// Add Image Size
if ( function_exists( 'add_image_size' )  ){
 	add_image_size( 'xecuter_mini', 100, 75, true );
 	add_image_size( 'xecuter_small', 160, 120, true );
	add_image_size( 'xecuter_medium', 280, 210, true );
	add_image_size( 'xecuter_large', 400, 300, true );
 	add_image_size( 'xecuter_big', 800,600, true );
}
//Default Featured Image
function xecuter_filter_post_thumbnail_html( $html ) {
    // If there is no post thumbnail,
    // Return a default image
    if ( '' == $html ) {
        return '<img src="' . get_template_directory_uri() . '/images/default-thumbnail.jpg" width="640px" height="384px" class="image-size-name" />';
    }
    // Else, return the post thumbnail
    return $html;
}
add_filter( 'post_thumbnail_html', 'xecuter_filter_post_thumbnail_html' );
/********************************************************************
Share Post
*********************************************************************/
function xecuter_share_post(){
	global  $smof_data;
	 $url ='http://twitter.com/share?text='.urlencode(get_the_title()).'&url='.get_permalink();
	
	if( !empty($smof_data['single_share_twitter']) || !empty($smof_data['single_share_facebook']) || !empty($smof_data['xecuter_single_share_google'] )|| !empty($smof_data['xecuter_single_share_linkedin'] )||!empty( $smof_data['single_share_telegram'])) { 
	?>
    
	<ul class="rd-share-post">
 		<?php if( !empty($smof_data['xecuter_single_share_facebook'])){ ?>
			<li>
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>"><img alt="facebook" width="64" height="64" src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.jpg"/></a>
 			</li>
 		<?php } ?> 
        
		<?php if(  !empty($smof_data['xecuter_single_share_google'])){ ?>
			<li>
				<a href="https://plus.google.com/share?url=<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/googleplus.jpg" alt="googleplus" width="64" height="64" /></a>
 			</li>
 		<?php } ?>
        
		<?php if( !empty($smof_data['xecuter_single_share_twitter'])){ ?>
			<li>
				<a href="<?php esc_url($url);?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.jpg" alt="twitter" width="64" height="64"/></a>
 			</li>
 		<?php } ?> 
        
		<?php if( !empty($smof_data['xecuter_single_share_linkedin'])){ ?>
			<li>
				<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/linkedin.jpg" alt="linkedin" width="64" height="64"/></a>
 			</li>
 		<?php } ?>	
        
		<?php if( !empty($smof_data['xecuter_single_share_telegram'])){ ?>
			<li>
				<a href="https://telegram.me/share/url?url=<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/telegram.jpg" alt="linkedin" width="64" height="64"/></a>
 			</li>
 		<?php } ?>	

		<?php if( !empty($smof_data['xecuter_single_share_whatsapp'])){ ?>
			<li class="rd-whats">
				<a href="whatsapp://send?text=<?php  the_title().' '.the_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/whatsapp.jpg" alt="linkedin" width="64" height="64"/></a>
 			</li>
 		<?php } ?>
                
        </ul>
        
	<?php 
	} 
}
/********************************************************************
tags
*********************************************************************/
function xecuter_tags() {
	if(has_tag()) {
	?>
 	<ul class="rd-tags">
		<li><?php the_tags('<a href="rd-tags">'.esc_html(xecuter_t('tags')).'</a>',''); ?></li>
	</ul>
	<?php 
	}
} 
/********************************************************************
Video
*********************************************************************/
function xecuter_video(){
	global $post ;
	$xecuter_metas = get_post_meta( $post->ID );
	$xecuter_video_type = !empty( $xecuter_metas[ 'xecuter_video_type'][0] ) ? $xecuter_metas[ 'xecuter_video_type'][0] : '';
	$xecuter_video_url = !empty( $xecuter_metas[ 'xecuter_video_url'][0] ) ? $xecuter_metas[ 'xecuter_video_url'][0] : '';
 
 	if(@$xecuter_video_type == 'youtube' && !empty($xecuter_metas['xecuter_video_url'][0])){	
	
		$video_src= 'http://www.youtube.com/embed/'.$xecuter_video_url.'?rel=0';
		
	} elseif(!empty($xecuter_video_url)) {
		$video_src= $xecuter_video_url;
		
	} else {
		$video_src= '';
		
	}
	?>
	<div class="rd-post-video">
 		 
		<?php if( @$xecuter_video_type == 'youtube'){ ?>
			<div class="rd-video-warp rd-yt">
				<iframe width="800" height="400" src="<?php echo esc_url($video_src);?>"  frameborder="0" allowfullscreen></iframe>
			</div>
		<?php } else {?>
			<div class="rd-video-warp rd-mp4">
				<video width="640" height="360" id="rd-video" controls>
					<source src="<?php echo esc_url($video_src);?>" type="video/mp4" title="mp4"> 
				</video>
			</div>
		<?php } ?>
	</div>
    
	<?php
}


/********************************************************************
Language Selector Flags
*********************************************************************/
function xecuter_language_selector_flags(){
	if( function_exists( 'icl_get_languages' )){
		$languages = icl_get_languages('skip_missing=0&orderby=code');
		if(!empty($languages)){
			echo '<div id="xecuter_lang_switcher">';
			foreach($languages as $l){
				if(!$l['active']) echo '<a href="'.esc_attr($l['url']).'">';
					echo '<img src="'.esc_attr($l['country_flag_url']).'" height="12" alt="'.esc_attr($l['language_code']).'" width="18" />';
				if(!$l['active']) echo '</a>';
			}
			echo '</div>';
		}
	}
}

/********************************************************************
Autor Social
*********************************************************************/
add_action( 'show_user_profile', 'xecuter_profile_fields' );
add_action( 'edit_user_profile', 'xecuter_profile_fields' );
function xecuter_profile_fields( $user ) {
	?>
 	<table class="form-table">

		<tr>
			<th><label for="Facebook"><?php echo esc_html('Facebook');?></label></th>
            <td><input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br /></td>
		</tr>
       <tr>
			<th><label for="twitter"><?php echo esc_html('Twitter');?></label></th>
			<td><input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br /></td>
		</tr>
        <tr>
			<th><label for="googleplus"><?php echo esc_html('Google Plus');?></label></th>
            <td><input type="text" name="googleplus" id="googleplus" value="<?php echo esc_attr( get_the_author_meta( 'googleplus', $user->ID ) ); ?>" class="regular-text" /><br /></td>
		</tr>
        
        <tr>
			<th><label for="linkin"><?php echo esc_html('linkedIn');?></label></th>
			<td><input type="text" name="linkin" id="linkin" value="<?php echo esc_attr( get_the_author_meta( 'linkin', $user->ID ) ); ?>" class="regular-text" /><br /></td>
		</tr>
        <tr>
			<th><label for="Flickr"><?php echo esc_html('Flickr');?></label></th>
			<td><input type="text" name="flickr" id="flickr" value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>" class="regular-text" /><br /></td>
		</tr>
        <tr>
			<th><label for="tumblr"><?php echo esc_html('Tumblr');?></label></th>
			<td><input type="text" name="tumblr" id="tumblr" value="<?php echo esc_attr( get_the_author_meta( 'tumblr', $user->ID ) ); ?>" class="regular-text" /><br /></td>
		</tr>
         <tr>
			<th><label for="vimeo"><?php echo esc_html('Vimeo');?></label></th>
            <td><input type="text" name="vimeo" id="vimeo" value="<?php echo esc_attr( get_the_author_meta( 'vimeo', $user->ID ) ); ?>" class="regular-text" /><br /></td>
		</tr>
         <tr>
         	<th><label for="youtube"><?php echo esc_html('YouTube');?></label></th>
			<td><input type="text" name="youtube" id="youtube" value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>" class="regular-text" /><br /></td>
		</tr> 
         <tr>
			<th><label for="instagram"><?php echo esc_html('Instagram');?></label></th>
			<td><input type="text" name="instagram" id="instagram" value="<?php echo esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); ?>" class="regular-text" /><br /></td>
		</tr>   
         <tr>
			<th><label for="telegram"><?php echo esc_html('Telegram');?></label></th>
			<td><input type="text" name="telegram" id="telegram" value="<?php echo esc_attr( get_the_author_meta( 'telegram', $user->ID ) ); ?>" class="regular-text" /><br /></td>
		</tr>   
        
         <tr>
			<th><label for="pinterest"><?php echo esc_html('Pinterest');?></label></th>
			<td><input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br /></td>
		</tr>   
           
	</table>
	<?php 
}

// Show Extra Profile Fields 
add_action( 'personal_options_update', 'xecuter_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'xecuter_save_extra_profile_fields' );
function xecuter_save_extra_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', @$user_id ) )
		return false;

 	update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'googleplus', $_POST['googleplus'] );
	update_user_meta( $user_id, 'linkin', $_POST['linkin'] );
	update_user_meta( $user_id, 'flickr', $_POST['flickr'] );
	update_user_meta( $user_id, 'tumblr', $_POST['tumblr'] );
	update_user_meta( $user_id, 'vimeo', $_POST['vimeo'] );
	update_user_meta( $user_id, 'youtube', $_POST['youtube'] );
	update_user_meta( $user_id, 'instagram', $_POST['instagram'] );
	update_user_meta( $user_id, 'telegram', $_POST['telegram'] );
	update_user_meta( $user_id, 'pinterest', $_POST['pinterest'] );
}

/********************************************************************
Author Box
*********************************************************************/
function xecuter_author_box() { 
 	?>
        <div class="rd-padding"></div>

 		<div class="rd-author-box">
			<div class="rd-author-thumb"><?php echo get_avatar( get_the_author_meta( 'user_email' ), '80' ); ?></div>
			
            <div class="rd-details">
				<h4 class="rd-author-name"><?php the_author_posts_link(); ?></h4>
 				<?php if(get_the_author_meta( 'description' )){?>
                 	<p class="rd-author-description">
						<?php the_author_meta( 'description' ); ?>
					</p>
                    <?php }?>
 				<ul>
                    <?php if ( get_the_author_meta( 'facebook' ) ) { ?>
                        <li class="rd-author-social"><a href="<?php the_author_meta( 'facebook' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author-socail/facebook.jpg" width="32" height="32" alt="facebook"/></a></li>
                    <?php }  ?>
            
                    <?php if ( get_the_author_meta( 'twitter' ) ) { ?>
                        <li class="rd-author-social"><a href="<?php the_author_meta( 'twitter' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author-socail/twitter.jpg" width="32" height="32" alt="twitter"/></a></li>
                    <?php }  ?>
                    
                    <?php if ( get_the_author_meta( 'googleplus' ) ) { ?>
                        <li class="rd-author-social"><a href="<?php the_author_meta( 'googleplus' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author-socail/google_plus.jpg" width="32" height="32" alt="googleplus" /></a></li>
                    <?php }  ?>
                    
                    <?php if ( get_the_author_meta( 'linkin' ) ) { ?>
                        <li class="rd-author-social"><a href="<?php the_author_meta( 'linkin' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author-socail/linkedin.jpg" width="32" height="32" alt="linkedIn" /></a></li>
                    <?php }  ?>
            
                    <?php if ( get_the_author_meta( 'flickr' ) ) { ?>
                        <li class="rd-author-social"><a href="<?php the_author_meta( 'flickr' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author-socail/flickr.jpg" width="32" height="32" alt="flickr" /></a></li>
                    <?php }  ?>
            
            
                    <?php if ( get_the_author_meta( 'tumblr' ) ) { ?>
                        <li class="rd-author-social"><a href="<?php the_author_meta( 'tumblr' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author-socail/tumblr.jpg" width="32" height="32" alt="tumblr"/></a></li>
                    <?php }  ?>
            
                    <?php if ( get_the_author_meta( 'vimeo' ) ) { ?>
                        <li class="rd-author-social"><a href="<?php the_author_meta( 'vimeo' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author-socail/vimeo.jpg" width="32" height="32" alt="vimeo"/></a></li>
                    <?php }  ?>
            
                    <?php if ( get_the_author_meta( 'youtube' ) ) { ?>
                        <li class="rd-author-social"><a href="<?php the_author_meta( 'youtube' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author-socail/youtube.jpg" width="32" height="32" alt="youtube"/></a></li>
                    <?php }  ?>
                    
                    <?php if ( get_the_author_meta( 'instagram' ) ) { ?>
                        <li class="rd-author-social"><a href="<?php the_author_meta( 'instagram' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author-socail/instagram.jpg"width="32" height="32" alt="instagram" /></a></li>
                    <?php }  ?>
                    
                    <?php if ( get_the_author_meta( 'telegram' ) ) { ?>
                        <li class="rd-author-social"><a href="<?php the_author_meta( 'telegram' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author-socail/telegram.jpg"width="32" height="32" alt="telegram"/></a></li>
                    <?php }  ?>    
                    
                    <?php if ( get_the_author_meta( 'pinterest' ) ) { ?>
                        <li class="rd-author-social"><a href="<?php the_author_meta( 'pinterest' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author-socail/pinterest.jpg"width="32" height="32" alt="pinterest"/></a></li>
                    <?php }  ?>    
				</ul>
     		</div>
		</div>
 	<?php
	 
}
 
/********************************************************************
Time Elapsed String
*********************************************************************/
 function xecuter_time_elapsed_string( )
{
		$to = current_time('timestamp'); //time();
		$from = get_the_time('U') ;
		
		$diff = (int) abs($to - $from);
		$etime=$diff ;
   	 if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_dates = array( 'year'   => esc_html(xecuter_t('years')),
                       'month'  => esc_html(xecuter_t('months')),
                       'day'    => esc_html(xecuter_t('days')),
                       'hour'   => esc_html(xecuter_t('hours')),
                       'minute' => esc_html(xecuter_t('minutes' )),
                       'second' => esc_html(xecuter_t('seconds')),
                );
    $a_date = array( 'year'   => esc_html(xecuter_t('year')),
                       'month'  => esc_html(xecuter_t('month')),
                       'day'    => esc_html(xecuter_t('day')),
                       'hour'   => esc_html(xecuter_t('hour')),
                       'minute' => esc_html(xecuter_t('minute' )),
                       'second' => esc_html(xecuter_t('second')),
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_dates[$str] : $a_date[$str]) . " ". esc_html(xecuter_t('ago'));
        }
    }
}
 
/********************************************************************
get Time 
*********************************************************************/
function xecuter_get_time(){
	global  $smof_data ;
	$time_format = !empty($smof_data['xecuter_time_format' ]) ? $smof_data['xecuter_time_format' ] :'traditional';
 	if(  $time_format == 'traditional'  ){	
		echo  esc_html(get_the_time(get_option('date_format')));

 	}else{
		echo xecuter_number_replace(xecuter_time_elapsed_string());

 	}
}

/********************************************************************
LightBox
*********************************************************************/
function xecuter_lightbox() {
	global $smof_data ;
 	if (!empty($smof_data['xecuter_single_lightbox'])){
	?>
		<div class="rd-lightbox rd-lightbox-active">
			<div class="rd-lightbox-middle">
            
				<div class="rd-lightbox-outer"></div>
 				<div class="rd-lightbox-nextbig"></div>
    			<div class="rd-lightbox-prevbig"></div>
		
        		<div class="rd-lightbox-img">
 					<i class="rd-lightbox-close"></i>
    				<img src="#" class="rd-lightbox-targetimg" alt=""/>
				</div>
                
   	 			<i class="rd-lightbox-loading"></i>
				<div class="rd-lightbox-bottom">
         	 		<div class="rd-lightbox-title"></div>
         			<div class="rd-lightbox-moreitems">
            			<div class="rd-lightbox-counter"></div>
         			</div>
         
     			</div>

			</div>
		</div>
  
	<?php 
	} 
}
add_action( 'wp_footer', 'xecuter_lightbox' );

/********************************************************************
Review Box
*********************************************************************/
function xecuter_box_review(){
	global $post ;
	$xecuter_metas = get_post_meta( $post->ID );
	$xecuter_review_style = !empty( $xecuter_metas['xecuter_review_style'][0] ) ? $xecuter_metas['xecuter_review_style'][0] : '';
     ?>
	<div class="rd-review">
 
        <div class="rd-review-details">
			<h3 class="rd-review-title"><?php if(!empty($xecuter_metas['xecuter_review_title'][0]))echo esc_html($xecuter_metas['xecuter_review_title'][0]) ;?></h3>
			<div class="rd-review-excerpt">
				<?php if(!empty($xecuter_metas['xecuter_review_excerpt'][0])) echo esc_html(@$xecuter_metas['xecuter_review_excerpt'][0]) ;?>
			</div>
        </div>
        
        <div class="rd-score-details">
       		<div class="rd-review-score">
				<?php 
				if( @$xecuter_review_style== 'stars') { 
					xecuter_review_stars();
				} else {
					xecuter_review_circular();
				}
				?>        
      
			</div>
        	<div class="rd-review-short">
			<?php if(!empty($xecuter_metas['xecuter_review_short'][0])) echo esc_html(@$xecuter_metas['xecuter_review_short'][0]) ; ?>
			</div> 
		</div> 
        
	</div>
	<?php 
} 

// Get Totla Reviews Score
function xecuter_review_stars(){
	global $post ;
	$xecuter_metas = get_post_meta( $post->ID );
	 
 	if(!empty($xecuter_metas['xecuter_review'][0])){
		if(!empty($xecuter_metas['xecuter_review_score'][0])){

		$score =  $xecuter_metas['xecuter_review_score'][0];
			if( $score < 101 && $score > 0 ){
				$review_score = $score;
			 
			$total_review_score =round($review_score);
		?>
			<div class="rd-review-style rd-review-stars">
				<div class="rd-stars-large" >
					<div class="rd-stars-full-score"><span><i></i><i></i><i></i><i></i><i></i></span></div>
					<div class="rd-stars-score" style="width:<?php echo esc_attr(@$total_review_score); ?>%;"><span><i></i><i></i><i></i><i></i><i></i></span></div>
				</div>
			</div>
	
		<?php 
			}
		}
	}
}
 
 // Get Totla Reviews circular
function xecuter_review_circular(){
 	global $post ;
	$xecuter_metas = get_post_meta( $post->ID );
 	if(!empty($xecuter_metas['xecuter_review'][0])){
		if(!empty($xecuter_metas['xecuter_review_score'][0])){
			
			$score =  @$xecuter_metas['xecuter_review_score'][0];
			if( $score < 101 && $score > 0 ){
				$review_score = $score;
			 
			$total_review_score =round(@$review_score);
			$point =  $total_review_score/10;
			?>
	 
	
			<div class="rd-circular rd-review-circular" data-percent="<?php echo esc_attr(@$score);?>">
				<span><?php echo esc_html(xecuter_number_replace($point));?></span>
			</div>
 			<?php 
	 
			}
		}
	}
}

/********************************************************************
ADS Widget
*********************************************************************/
// Above Content
function xecuter_above_content() {
	global $smof_data ;
	
	if (!empty($smof_data['xecuter_above_content']) && is_active_sidebar( 'xecuter_above_content_ads' ) ) { 
	?>
	<div id="rd-row-blog" class="rd-row-item rd-row-main rd-row-1200 '">
	<div class="rd-row-middle">
	<div class="rd-row-container">  
		<div class="rd-column rd-content rd-1200">
  		<div class="rd-content-sidebar rd-widget-banner">
     		<?php dynamic_sidebar('xecuter_above_content_ads'); ?>
		</div>
		</div>
	</div>
	</div>
	</div>
	<?php
	}
}
// Below Content
function xecuter_below_content() {
	global $smof_data ;
	if (!empty($smof_data['xecuter_below_content']) && is_active_sidebar( 'xecuter_below_content_ads' ) ) {
	?>
	<div id="rd-row-blog" class="rd-row-item rd-row-main rd-row-1200 '">
	<div class="rd-row-middle">
	<div class="rd-row-container">  
		<div class="rd-column rd-content rd-1200">
		<div class="rd-content-sidebar rd-widget-banner">
			<?php dynamic_sidebar('xecuter_below_content_ads'); ?>
		</div>
		</div>
	</div>
	</div>
	</div>
	<?php 
	}
}
// Above Center
function xecuter_above_center() {
	global $smof_data;
 	if (!empty($smof_data['xecuter_above_center'] ) && is_active_sidebar( 'xecuter_above_center_ads' ) ) { ?>
		<div class="rd-widget-banner">
			<?php dynamic_sidebar('xecuter_above_center_ads'); ?>
        </div>
	<?php 
	}
}
// Below Center
function xecuter_below_center() {
	global $smof_data;
	if (!empty($smof_data['xecuter_below_center'] ) && is_active_sidebar( 'xecuter_below_center_ads' ) ) {   ?>
		<div class="rd-widget-banner">
			<?php dynamic_sidebar('xecuter_below_center_ads'); ?>
        </div>
	<?php }
}
/********************************************************************
wp_link_pages
*********************************************************************/ 
function xecuter_wp_link_pages( $args = '' ) {
	$defaults = array(
		'before' => '<div id="rd-post-pagination"><a>' . xecuter_t('pages').'</a>', 
		'after' => '</div>',
		'text_before' => '',
		'text_after' => '',
		'next_or_number' => 'number', 
		'nextpagelink' =>  xecuter_t('next').' '.xecuter_t('page') ,
		'previouspagelink' =>  xecuter_t('previous').' '.xecuter_t('page'),
		'pagelink' => '%',
		'echo' => 1
	);

	$r = wp_parse_args( $args, $defaults );
	$r = apply_filters( 'wp_link_pages_args', $r );
	extract( $r, EXTR_SKIP );

	global $page, $numpages, $multipage, $more, $pagenow;

	$output = '';
	if ( $multipage ) {
		if ( 'number' == $next_or_number ) {
			$output .= $before;
			for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
				$j = str_replace( '%', $i, $pagelink );
				$output .= ' ';
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= _wp_link_page( $i );
				else
					$output .= '<span class="current-post-page">';

				$output .= $text_before . $j . $text_after;
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= '</a>';
				else
					$output .= '</span>';
			}
			$output .= $after;
		} else {
			if ( $more ) {
				$output .= $before;
				$i = $page - 1;
				if ( $i && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $text_before . $previouspagelink . $text_after . '</a>';
				}
				$i = $page + 1;
				if ( $i <= $numpages && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $text_before . $nextpagelink . $text_after . '</a>';
				}
				$output .= $after;
			}
		}
	} 
	if ( $echo )
		echo wp_kses_post($output);
	return   $output;
}
?>