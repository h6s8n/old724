<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
 	<?php
    global $smof_data,$xecuter_single_template,$post ;
	if ( is_category() ) {
		$xecuter_meta = get_term_meta(get_query_var( 'cat'  ));
	}
 	elseif (  is_page() || is_single()) {
		$xecuter_meta = get_post_meta( $post->ID );
	}  	
	
   	?>

 	<meta charset="<?php bloginfo( 'charset' ); ?>">
 	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
      
	<?php wp_head(); ?>

</head>
<body <?php body_class()?>>
<?php // Background Image / 

if (  !empty($xecuter_meta['xecuter_body_background_type'][0])){
	$xecuter_body_background_type = $xecuter_meta['xecuter_body_background_type'][0];
	$xecuter_background_img= !empty($xecuter_meta['xecuter_body_background_image'][0]) ? $xecuter_meta['xecuter_body_background_image'][0]:'';		

} else{
	$xecuter_body_background_type = !empty( $smof_data['xecuter_body_background_type']) ?  $smof_data['xecuter_body_background_type']  : '';
	$xecuter_background_img= !empty($smof_data['xecuter_body_background_image']) ? $smof_data['xecuter_body_background_image']:'';		
 }
 
 ?>
    
<?php if ($xecuter_body_background_type == 'custom' && !empty($xecuter_background_img)){?>
    <div class="rd-background">
        <img alt="background" src="<?php echo esc_url( $xecuter_background_img); ?>" width="1920" height="1080" /> 			 
    </div>
<?php }?>
<div id="rd-wrapper" class="rd-wrapper">
	<header >
    
	<?php 
 	// Top Menu
 	$xecuter_plus_menu = !empty( $smof_data[ 'xecuter_plus_menu' ] ) ? 'enable': 'disable';
	$xecuter_plus_menu_rtl = is_rtl() ? 'right':'left';
 
 	$xecuter_plus_menu_align = !empty( $smof_data[ 'xecuter_plus_menu_align' ] ) ? $smof_data[ 'xecuter_plus_menu_align' ] : $xecuter_plus_menu_rtl;
	//Login Form
 	$xecuter_loginform = !empty( $smof_data[ 'xecuter_loginform' ] ) ? $smof_data[ 'xecuter_loginform' ]: 'disable';
 	 
 	//Search
 	$xecuter_searchform = !empty( $smof_data[ 'xecuter_searchform' ] ) ? $smof_data[ 'xecuter_searchform' ]: 'disable';
 	
	//social
	$xecuter_social_net = !empty( $smof_data[ 'xecuter_social_net' ] ) ? $smof_data[ 'xecuter_social_net' ]: 'disable';
	
	
	//data header
	$xecuter_date_header = !empty( $smof_data[ 'xecuter_date_header' ] ) ? $smof_data[ 'xecuter_date_header' ]: '';
	$xecuter_date_rtl = is_rtl() ? 'left':'right';
 	$xecuter_date_align = !empty( $smof_data[ 'xecuter_date_header_align' ] ) ? $smof_data[ 'xecuter_date_header_align' ] : $xecuter_date_rtl;
	
   	/********************************************************************
	Top Header
	*********************************************************************/  
  	if( $xecuter_loginform =='navplus' ||$xecuter_social_net =='navplus'   || $xecuter_searchform =='navplus'  ||  $xecuter_plus_menu == 'enable' || !empty($xecuter_date_header) ){			
  	?>
    <div class="rd-navplus-warp rd-navhead-warp ">
        <div class="rd-navplus-middle ">
            <div class="rd-navplus">
            
                  
				<?php if ( $xecuter_searchform == 'navplus'  ) { get_search_form();}?>
                    
				<?php if (   $xecuter_loginform == 'navplus'  ){ xecuter_login(); } ?> 	

       
 				<?php if ( $xecuter_plus_menu =='enable'  ) {// Nav Menu ?>
					<div class="rd-nav-menu  rd-menu-<?php echo esc_attr($xecuter_plus_menu_align);?>">
						<a class="rd-menu-icon"></a>
						<?php wp_nav_menu( array( 'container' => false, 'theme_location' =>  'xecuter_plus_menu', 'fallback_cb' => 'xecuter_fallback_nav' ,	'walker' => new xecuter_Walker_Nav_Menu) ); ?>
					</div>
				<?php } ?> 
                
				<?php if (!empty($xecuter_date_header )) { ?>
            		<div class="rd-date-header rd-date-header-<?php echo esc_attr($xecuter_date_align);?>">
               	 		<?php 
						if( function_exists ( "jdate" )){ 
							echo jdate( get_option('date_format'));
						}else{
							 echo esc_html(current_time( get_option('date_format')));
						}; ?>
                 	</div>
				<?php } ?>   
                              
				<?php if ( $xecuter_social_net == 'navplus'  ){ xecuter_social();} ?>


            </div>	
        </div>		
    </div>
	<?php
	}
	// Sticky Header 
  	$xecuter_header_sticky = !empty( $smof_data[ 'xecuter_header_sticky' ] ) ? 'rd-sticky': '';
 	// Logo	

	$xecuter_logo = !empty( $smof_data[ 'xecuter_logo' ] ) ? $smof_data[ 'xecuter_logo' ] : '';
	$xecuter_logo_type = !empty( $smof_data[ 'xecuter_logo_type' ] ) ? $smof_data[ 'xecuter_logo_type' ] : 'title';
	$xecuter_logo_width = !empty( $smof_data[ 'xecuter_logo_width' ] ) ? $smof_data[ 'xecuter_logo_width' ] : '';
	$xecuter_logo_height = !empty( $smof_data[ 'xecuter_logo_height' ] ) ? $smof_data[ 'xecuter_logo_height' ] : '';
	$xecuter_logo_rtl = is_rtl() ? 'right':'left';
	$xecuter_logo_align = !empty( $smof_data[ 'xecuter_logo_align' ] ) ? $smof_data[ 'xecuter_logo_align' ] :  $xecuter_logo_rtl;
	$xecuter_main_menu_rtl = is_rtl() ? 'right':'left';
 	$xecuter_main_menu_align = !empty( $smof_data[ 'xecuter_main_menu_align' ] ) ? $smof_data[ 'xecuter_main_menu_align' ] :$xecuter_main_menu_rtl

  
 	?>
    <div class="rd-masthead-warp rd-navhead-warp  <?php echo esc_attr($xecuter_header_sticky);?>">
        <div class="rd-masthead-middle ">
            <div class="rd-masthead">
 
				<div class="rd-logo rd-logo-<?php echo esc_attr($xecuter_logo_align);?>">
					<h2 class="rd-logo-warp">
						<?php if ( @$xecuter_logo_type == 'image' ) {?>
							<a  title="<?php echo esc_attr(bloginfo('name')); ?>" href="<?php echo esc_url(home_url( '/') ); ?>"><?php echo esc_html(bloginfo('name')); ?> <?php echo esc_html(bloginfo('description')); ?><img alt="<?php esc_url(bloginfo( 'name' )); ?>" src="<?php echo esc_url( @$xecuter_logo); ?>" width="<?php echo esc_attr( @$xecuter_logo_width );?>" height="<?php echo esc_attr( @$xecuter_logo_height );?>" /></a>
                                    
						<?php } elseif( @$xecuter_logo_type == 'title'){ ?>
								<a class="rd-logo-title" href="<?php echo esc_url(home_url( '/') ); ?>"><?php echo esc_html(bloginfo('name')); ?></a>
	
						<?php } elseif( @$xecuter_logo_type == 'description'){ ?>
                                <a class="rd-logo-title" href="<?php echo esc_url(home_url( '/') ); ?>"><?php echo esc_html(bloginfo('name')); ?></a>
                                <a class="rd-logo-description" href="<?php echo esc_url(home_url( '/') ); ?>"><?php echo esc_html(bloginfo('description')); ?></a>
                                            
                         <?php }?>
					</h2>
				</div>
                                 
				<div class="none-masthead">
     			 
                    <?php if ( $xecuter_searchform == 'masthead'  ) {get_search_form();}?>
                        
                         
                    <?php if (   $xecuter_loginform == 'masthead'  ){ xecuter_login(); } ?> 	
    
                        
					<div class="rd-nav-menu rd-menu-<?php echo esc_attr($xecuter_main_menu_align);?>">
                     	<a class="rd-menu-icon"></a>
						<?php wp_nav_menu( array( 'container' => false, 'theme_location' =>  'xecuter_main_menu', 'fallback_cb' => 'xecuter_fallback_nav',	'walker' => new xecuter_Walker_Nav_Menu ) ); ?>
					</div>
                            
                    <?php if ( $xecuter_social_net == 'masthead'  ){ xecuter_social();} ?>

  				</div>	
                 
            </div>		
        </div>
    </div>
	
</header>