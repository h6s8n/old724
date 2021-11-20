<?php
 
function xecuter_custom_css() {
	global $smof_data,$post;
 
	$is_build = !empty( $smof_data['xecuter_page_builder']) ?  $smof_data['xecuter_page_builder']  : '';
	if(  is_home() && !empty( $smof_data['xecuter_page_builder'])){
		$meta = get_post_meta( $smof_data['xecuter_page_builder'] );
  		$rows = get_post_meta($smof_data['xecuter_page_builder'], 'xecuter_row', true);
		
	}elseif ( is_category() ) {
		$meta = get_term_meta(get_query_var( 'cat'  ));
		$page_builder =  !empty( $meta['xecuter_page_builder'][0]) ?  $meta['xecuter_page_builder'][0]  : '';
  		$rows = get_post_meta($page_builder, 'xecuter_row', true);
	}
 	elseif ( (  is_page() || is_single())) {
		$meta = get_post_meta( $post->ID );
  		$rows = get_post_meta($post->ID, 'xecuter_row', true);
	}  
	
	 
 
	// Primary color
 	if(!empty($meta['xecuter_primary_color'][0])){
		$primary_color = !empty( $meta['xecuter_primary_color'][0]) ?  $meta['xecuter_primary_color'][0]  : '';
 	} else{
		$primary_color = !empty( $smof_data['xecuter_primary_color']) ?  $smof_data['xecuter_primary_color']  : '#ff0055';
	}
	// Body Background
 	if(!empty($meta['xecuter_body_background_color'][0])){
		$body_background_color = !empty( $meta['xecuter_body_background_color'][0]) ?  $meta['xecuter_body_background_color'][0]  : '';
		
	} else{
		$body_background_color = !empty( $smof_data['xecuter_body_background_color']) ?  $smof_data['xecuter_body_background_color']  : '#ff0055';
	} 
 


	if ( !empty($meta['xecuter_body_background_type'][0])){
		$body_background_type = !empty( $meta['xecuter_body_background_type'][0]) ?  $meta['xecuter_body_background_type'][0]  : '';
		$body_background_pattern = !empty( $meta['xecuter_body_background_pattern'][0]) ?  get_template_directory_uri().'/images/bg/bg'.$meta['xecuter_body_background_pattern'][0].'.png'  : '';	

	} else{
		$body_background_type = !empty( $smof_data['xecuter_body_background_type']) ?  $smof_data['xecuter_body_background_type']  : '';
		$body_background_pattern = !empty( $smof_data['xecuter_body_background_pattern']) ?  $smof_data['xecuter_body_background_pattern']  : '';
	}
	// Body Text
 
	$body_text_color = !empty( $smof_data['xecuter_body_text_color']) ?  $smof_data['xecuter_body_text_color']  : '#333333';
	$body_link_color = !empty( $smof_data[ 'xecuter_body_link_color' ][ 'color' ]) ?  $smof_data[ 'xecuter_body_link_color' ][ 'color' ]  : '#111111';
	$body_link_hover_color = !empty( $smof_data[ 'xecuter_body_link_color' ][ 'color2' ]) ? $smof_data[ 'xecuter_body_link_color' ][ 'color2' ] : '#ff0055';
 
	// Main Header Height
 	$masthead_height = !empty( $smof_data[ 'xecuter_masthead_height' ] ) ? $smof_data[ 'xecuter_masthead_height' ]: '90px';
	 	 
	
 
	$masthead_background_color = !empty( $smof_data[ 'xecuter_masthead_color' ][ 'color' ]) ?  $smof_data[ 'xecuter_masthead_color' ][ 'color' ]  : '';
	$masthead_text_color = !empty( $smof_data[ 'xecuter_masthead_color' ][ 'color2' ]) ?  $smof_data[ 'xecuter_masthead_color' ][ 'color2' ]  : '';
	$navplus_height = !empty( $smof_data[ 'xecuter_navplus_height' ] ) ? $smof_data[ 'xecuter_navplus_height' ]: '38px';
 	// Top Header Style
 
	$navplus_background_color = !empty( $smof_data[ 'xecuter_navplus_color' ][ 'color' ]) ?  $smof_data[ 'xecuter_navplus_color' ][ 'color' ]  : '';
	$navplus_text_color = !empty( $smof_data[ 'xecuter_navplus_color' ][ 'color2' ]) ?  $smof_data[ 'xecuter_navplus_color' ][ 'color2' ]  : '';
 
	$breadcrumbs_background_color = !empty( $smof_data[ 'xecuter_breadcrumbs_color' ][ 'color' ]) ?  $smof_data[ 'xecuter_breadcrumbs_color' ][ 'color' ]  : 'rgba(245,245,245,.90)';
	$breadcrumbs_text_color = !empty( $smof_data[ 'xecuter_breadcrumbs_color' ][ 'color2' ]) ?  $smof_data[ 'xecuter_breadcrumbs_color' ][ 'color2' ]  : '#424548';	
  
	$background_main_row = !empty( $smof_data['xecuter_background_main_row'] ) ?  $smof_data['xecuter_background_main_row']  : 'rgba(255,255,255,.9)';
 	$post_title_color = !empty( $smof_data['xecuter_post_title_color']) ?  $smof_data['xecuter_post_title_color'] : '';
	$post_excerpt_color = !empty( $smof_data['xecuter_post_excerpt_color']) ?  $smof_data['xecuter_post_excerpt_color'] : '';
	$post_meta_color = !empty( $smof_data['xecuter_post_meta_color'] ) ?  $smof_data['xecuter_post_meta_color'] : '';
 	 	
			
			
			
	// Footer Style
 
	$footer_background_color = !empty( $smof_data['xecuter_footer_background_color'] ) ?  $smof_data['xecuter_footer_background_color'] : '#111111';
	$footer_link_color = !empty( $smof_data['xecuter_footer_link_color']) ?  $smof_data['xecuter_footer_link_color']  : '#ffffff';
	$footer_text_color = !empty( $smof_data['xecuter_footer_text_color']) ?  $smof_data['xecuter_footer_text_color'] : '#cccccc';
	// Logo Type
	$logo_type = !empty( $smof_data[ 'xecuter_logo_type' ] ) ? $smof_data[ 'xecuter_logo_type' ] : 'title';
	$logo_title_font_size = !empty( $smof_data[ 'xecuter_logo_title_font_size' ] ) ? $smof_data[ 'xecuter_logo_title_font_size' ] : '30';
	$logo_title_color = !empty( $smof_data[ 'xecuter_logo_title_color' ] ) ? $smof_data[ 'xecuter_logo_title_color' ] : '#ffffff';
	$logo_description_font_size = !empty( $smof_data[ 'xecuter_logo_description_font_size' ] ) ? $smof_data[ 'xecuter_logo_description_font_size' ] : '13';
	$logo_description_color = !empty( $smof_data[ 'xecuter_logo_description_color' ] ) ? $smof_data[ 'xecuter_logo_description_color' ] : '#ff0055';
	$logo_width = !empty( $smof_data[ 'xecuter_logo_width' ] ) ? $smof_data[ 'xecuter_logo_width' ] : '';
	$logo_height = !empty( $smof_data[ 'xecuter_logo_height' ] ) ? $smof_data[ 'xecuter_logo_height' ] : '';
	//**Body Start
	$css='body {';

  
		$css.='background-color:'.esc_html($body_background_color).';';
		  
		if ( $body_background_type == 'pattern' && !empty($body_background_pattern)) {   
 			$css.='background-position: top center;background-image: url('.esc_url($body_background_pattern) .');';  
 			
		}
		if ( !empty( $smof_data[ 'xecuter_body_font_family' ] ) ) { 
			$css.="font-family:'sao-".esc_html($smof_data['xecuter_body_font_family'])."','roboto',tahoma;";
		
		}
	$css.='}';
	 		include_once get_template_directory() . '/framework/font-family.php';  

		 
	
	//**End Body  
	
 	$css.='p,input,body{color:'.esc_html( $body_text_color).'; }'; 
 	
 	$css.='a,.rd-title,.rd-single-post .rd-meta li ,.rd-single-post .rd-meta li a,.rd-review .rd-circular span,body.buddypress .rd-post .rd-post-content a{ color:'.esc_html( $body_link_color).';}';
  	
 	$css.='a:hover,.rd-bpost .rd-title a:hover,.rd-post .rd-title a:hover,#rd-sidebar .widget-container a:hover,.rd-wide-slider .rd-slide-post h3 .rd-title a:hover,
		.rd-login .rd-singin .rd-singin-footer li a:hover {color:'.esc_html( $body_link_hover_color).';}';
    
    $css.='.main-menu ul li a:hover ,body .rd-pagenavi span.current,  .vorod,.rd-moreblock  a,.rd-morelink a,#submit,
	.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button ,.woocommerce input.button:hover,#commentform #submit,#buddypress #members-directory-form div.item-list-tabs ul li.selected span ,.rd-comment-navi .page-numbers.current,#rd-post-pagination .current-post-page,
	#buddypress div.item-list-tabs ul li.selected a, #buddypress div.item-list-tabs ul li.current a,#members-list-options a.selected,#groups-list-options a.selected,.widget #wp-calendar caption,
 	.woocommerce ul.products li.product .button,.rd-pagenavi a:hover,.rd-active,.woocommerce a.button.alt,.woocommerce a.button.alt:hover,.woocommerce span.onsale, .woocommerce-page span.onsale , .woocommerce input.button.alt,.button,.button:hover,.woocommerce a.button:hover ,#searchsubmit,.woocommerce div.product form.cart .button,.woocommerce div.product form.cart .button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.rd-widget-search .rd-search-button ,.rd-breakingnews span,.rd-post .rd-category a,body .lSSlideOuter .lSPager.lSpg > li:hover a,body .lSSlideOuter .lSPager.lSpg > li.active a,.rd-bottom-thumb-text .lSGallery li.active ,.rd-bottom-thumb-text .lSGallery li.active a ,.rd-bottom-thumb-text .lSGallery li.active a ,.rd-bottom-text .lSGallery li.active ,.rd-inner-bottom-text .lSGallery li.active,button, input[type="submit"], input[type="button"], input[type="reset"],#buddypress div.item-list-tabs ul li  a span{
		background-color: '.esc_html( @$primary_color) .'; 
		color: #fff !important;
   	}';
   $css.='.rd-widget-search .rd-search-icon::before,.rd-review-title ,.rd-authorbio ul,
   .rd-panel  strong,.rd-dropcapsimple,  .woocommerce .star-rating span, .woocommerce-page .star-rating span,.rd-stars-score i::before ,.woocommerce p.stars a::before, 
.rd-masthead .rd-nav-menu  li.current-menu-item.li-depth-0 .rd-depth-0,.rd-masthead .rd-nav-menu  li.current-menu-item.li-depth-1 .rd-depth-1,.rd-masthead .rd-nav-menu  li.current-menu-item.li-depth-2 .rd-depth-2,.rd-masthead .rd-nav-menu  li.current-menu-item.li-depth-3 .rd-depth-3,.rd-masthead .rd-nav-menu  li.current-menu-item.li-depth-4 .rd-depth-4,.author-link .fn a,body #rd-wrapper .rd-module-item .rd-post .rd-meta .rd-author a,body #rd-wrapper .rd-single-item .rd-post .rd-meta .rd-author a,#buddypress div.item-list-tabs ul li.current  a span,.widget_text a{
  	color: '. @$primary_color .' !important;
	}';
	$css.='.rd-nav-menu:not(.rd-menu-active) .sub-menu,.rd-menu-active .menu,  .rd-search-sub ,  .rd-login-sub{border-top: solid 3px '.esc_html($primary_color) .';}';
	$css.='@media (min-width: 980px) {.rd-nav-menu .sub-menu ,.rd-nav-menu .sub-posts{border-top: solid 3px '.esc_html($primary_color) .' !important;}}';
  	 $css.='body:not(.woocommerce) .rd-post-content a {color: '.esc_html( @$primary_color) .'}';

 	
 	/**---------------------------- Header Content 2 ----------------------------**/ 
 		
		
		$css.='.rd-masthead-warp{min-height:'.esc_html( $masthead_height).';}';
		$css.='.rd-masthead .rd-nav-menu,.rd-masthead .rd-search,.rd-masthead .rd-social, .rd-masthead .rd-login ,.rd-logo,.rd-masthead .rd-nav-menu ul li{ height:'.esc_html( $masthead_height).';line-height:'.esc_html( $masthead_height).';}';
		
		$css.=' .rd-masthead .rd-nav-menu  .sub-depth-0,.rd-masthead .rd-nav-menu .sub-posts,.rd-masthead  .rd-search-sub,.rd-masthead .rd-singin-warp{margin-top:'.esc_html($masthead_height).'!important ; }';
		$css.='@media (max-width:979px) { .rd-masthead .rd-nav-menu ul ,.rd-masthead  .rd-search-sub,.rd-masthead .rd-singin-warp{margin-top:'.esc_html($masthead_height).' ; }}';
 		 		
				 
		if ( !empty( $masthead_background_color ) ) {
			$css.='.rd-masthead-warp,.rd-masthead .sub-menu,.rd-masthead .rd-nav-menu .sub-posts,.rd-masthead .rd-nav-menu ul,.rd-masthead .rd-search-sub,.rd-masthead .rd-singout-warp 
			{background-color: '. $masthead_background_color.'}';	
				$css.='@media (max-width: 979px) {.rd-masthead-warp .rd-menu-active{ background-color: '. $masthead_background_color.';}}';	
		} 
		
		if ( !empty( $masthead_text_color ) ) {
			$css.='.rd-masthead li:not(.current-menu-item) a,.rd-masthead li:not(.current-menu-item),.rd-masthead i::before,.rd-masthead .rd-menu-icon::before,.rd-masthead .rd-input,
			.rd-masthead .rd-menu-active  a,.rd-masthead .rd-search-button,.rd-wrapper .rd-masthead ul ul.sub-menu li:not(.current-menu-item) a{color: '.esc_html( $masthead_text_color).'!important;}';
			$css.='.rd_layout_6 .rd-masthead li.current-menu-item a,.rd_layout_7 .rd-masthead li.current-menu-item a,.rd_layout_8 .rd-masthead li.current-menu-item a,.rd-masthead  .rd-menu-down,.rd-masthead  .rd-menu-up{color: '. $masthead_text_color.'!important; text-shadow:0px 0px;}';
		}
 		
  		
		if ( !empty( $smof_data[ 'xecuter_masthead_font_size' ] ) ) {
			$css.='.rd-masthead .rd-nav-menu ul li a, .rd-masthead  .rd-social,.rd-masthead a.rd-search-icon,.rd-masthead .rd-user ,.rd-masthead .rd-nav-menu .rd-menu-icon
			{font-size:'.esc_html( $smof_data[ 'xecuter_masthead_font_size' ]).';}';
		} 
	
 		
		$css.='.rd-navplus-warp {min-height: '.esc_html( $navplus_height).';}'; 
		$css.='.rd-navplus .rd-nav-menu ,.rd-navplus .rd-search,.rd-navplus .rd-login,.rd-navplus .rd-social,.rd-date-header
		{ height: '.esc_html( $navplus_height).';line-height: '.esc_html( $navplus_height).';}';
 		$css.='.rd-navplus  .rd-nav-menu  .sub-depth-0 ,.rd-navplus .rd-nav-menu .sub-posts,.rd-navplus .rd-search-sub {margin-top:'.esc_html($navplus_height).' !important; }';
		$css.='@media (max-width:979px) {.rd-navplus .rd-nav-menu ul,.rd-navplus .rd-singin-warp {margin-top:'.esc_html($navplus_height).'; }}';
 				
		
		if ( !empty( $smof_data[ 'xecuter_main_menu_padding' ] ) ) {
			$css.='.rd-masthead .rd-nav-menu ul li a { padding: 0  '.esc_html( $smof_data[ 'xecuter_main_menu_padding' ]).'px;}';
		} 
	 
 	
  		if ( !empty(  $navplus_background_color ) ) {
 			$css.='.rd-navplus-warp,.rd-navplus .sub-menu,.rd-navplus .rd-nav-menu .sub-posts,.rd-navplus .rd-nav-menu ul,.rd-navplus  .rd-search-sub ,.rd-navplus .rd-singout-warp
			{background-color: '.esc_html(  $navplus_background_color ).';}';
							$css.='@media (max-width: 979px) {.rd-navplus-warp .rd-menu-active{ background-color: '. $navplus_background_color.';}}';	
			
 		}	
 	
		if ( !empty( $navplus_text_color ) ) {
			$css.='.rd-navplus li a,.rd-navplus .rd-date-header,.rd-navplus li,.rd-navplus a::before ,.rd-navplus i::before,.rd-navplus .rd-input ,.rd-navplus .rd-menu-active ,.rd-navplus  .rd-menu-down,.rd-navplus  .rd-menu-up{color: '.esc_html( $navplus_text_color).'!important;}';
		}  	
 	 
 	
	 
	
		if ( !empty( $smof_data[ 'xecuter_plus_menu_padding' ] ) ) {
			$css.='.rd-navplus .rd-nav-menu ul li a  {padding: 0  '.esc_html( $smof_data[ 'xecuter_plus_menu_padding' ]).'px ;}';
		} 

		if ( !empty( $smof_data[ 'xecuter_navplus_font_size' ] ) ) {
			$css.='.rd-navplus .rd-nav-menu ul li a, .rd-navplus  .rd-social,.rd-navplus a.rd-search-icon,.rd-navplus .rd-user a,.rd-navplus .rd-breakingnews  span,
			.rd-navplus .rd-breakingnews  a,.rd-navplus .rd-nav-menu .rd-menu-icon{font-size:'.esc_html( $smof_data[ 'xecuter_navplus_font_size' ]).';}';
		} 
	
	 

	 

	/**---------------------------- logo ----------------------------**/ 
 
 	if ( !empty( $logo_width ) ) { 
	 	$css.='.rd-logo-warp {width: '. @$logo_width.'px;}';
	 	$css.='a.rd-logo-title,a.rd-logo-description {width: '.esc_html( @$logo_width).'px; margin-left:auto;margin-right:auto;}';
	}

 	$css.='.rd-logo img {height: '.esc_html( @$logo_height).'px;width: '.esc_html( @$logo_width).'px;}';
 	
  	$css.='a.rd-logo-title{';
		
		if ( !empty( $logo_title_font_size) ) { 
    		$css.='font-size: '.esc_html( $logo_title_font_size).'px;';
 
 		}
		
		if ( !empty( $logo_title_color ) ) { 
    		$css.='color: '.esc_html( $logo_title_color).';';
		}
		if (  $logo_type == 'description'  ) { 
    		$css.='margin-bottom:3px;';
		}
				
		
 	$css.='}';
 	
  	$css.='a.rd-logo-description {';
	
		if ( !empty( $logo_description_font_size ) ) { 
   		$css.='font-size: '.esc_html( $logo_description_font_size).'px;';
 		}	
			
		if ( !empty( $logo_description_color ) ) { 
   		$css.='color: '.esc_html( $logo_description_color).';';
		}
		
 	$css.='}';

 	$css.='a.rd-logo-title ,a.rd-logo-description{';
	 
	if ( !empty( $smof_data[ 'xecuter_logo_font_family' ] ) ) { 
			$css.="font-family:'sao-".esc_html($smof_data['xecuter_logo_font_family'])."','roboto',tahoma;";
	
		} 
		
 	$css.='}';  
	// ** crumbs
  	if ( !empty( $breadcrumbs_background_color ) ) { 
	 	$css.='#rd-row-breadcrumbs { background:'.esc_html(  $breadcrumbs_background_color).';}';
	}
	
	if ( !empty( $breadcrumbs_text_color ) ) { 
	 	$css.='#rd-row-breadcrumbs a,#rd-row-breadcrumbs strong{ color:'.esc_html(  $breadcrumbs_text_color).';}';
	}
	
	// ** crumbs
  	if ( !empty( $smof_data[ 'xecuter_breadcrumbs_font_size' ] ) ) { 
	 	$css.='.rd-breadcrumbs ,.rd-breadcrumbs a,.rd-breadcrumbs span,.rd-breadcrumbs li {font-size:'.esc_html(  $smof_data[ 'xecuter_breadcrumbs_font_size' ]).';}';
	}
	
 	 
   	/*---------------------Post----------------------*/
	if(!empty($background_main_row)){
 			$css.='.rd-row-item::before {left: 0;top:0; content:"";position: absolute; height: 100%; z-index:0; width: 100%; background-color: '.esc_html($background_main_row).'}';
	}
	
  
	if ( !empty( $smof_data[ 'xecuter_title_font_size' ] ) ) { 
		$css.='.rd-title-box  a,.rd-title-box  span{font-size:'. esc_html( $smof_data[ 'xecuter_title_font_size' ]).' !important}';
	} 	
 
   
	if ( !empty($post_title_color )) {  
		$css.='.rd-title a,.rd-widget  a,.widget  a,.rd-post-nextprev a,.rd-related .rd-title a,.rd-related a,.rd-post .rd-title, .rd-singin-title,.rd-row-item  .rd-load-more span{color: ' .esc_html( $post_title_color).';}';
		$css.='.rd-row-item  .rd-load-more span{border:1px solid  '.esc_html($post_title_color).'  }';

	} 
 	
  	if ( !empty($post_excerpt_color) ){ 
 	$css.='.rd-post .rd-excerpt p ,.rd-post .rd-excerpt ,.rd-pagenavi .page_number,.rd-pagenavi span,.rd-pagenavi span a,.commentmetadata a,
	.author-link-reply a,.comment-list .reply a,.rd-singin-warp label,.rd-login-sub .rd-singin-warp li,body .rd-wrapper .rd-singin-warp  .rd-input,body .rd-wrapper  .rd-singin-warp li a{ color: '. esc_html( $post_excerpt_color).'  ;}';
 	$css.='.rd-module-item  .rd-title-box a,.rd-module-item  .rd-title-box  span ,.widget  .rd-title-box a,.widget  .rd-title-box  span ,.widget,.widget p,.widget input{ color: '. esc_html( $post_excerpt_color).'  !important;}';	
	
  	} 
	
	if (!empty($post_meta_color )){ 
 		$css.='.rd-post .rd-meta ,.rd-post .rd-meta a,.rd-post .rd-meta  li,.rd-post .rd-meta  span { color: '. esc_html( $post_meta_color).'  !important;}';
	}
	
	 
 	
  	if ( !empty( $smof_data[ 'xecuter_article_font_size' ] ) ) { 
		$css.='.rd-post-content p{font-size:'. esc_html( $smof_data[ 'xecuter_article_font_size' ]).';}';
	} 	
	
  	
	
  	if ( !empty( $smof_data[ 'xecuter_article_line_height' ] ) ) { 
		$css.='.rd-post-content p{line-height:'. esc_html( $smof_data[ 'xecuter_article_line_height' ]).';}';
	}
	
	
  	if ( !empty( $smof_data[ 'xecuter_font_size_article' ] ) ) { 
		$css.='.rd-post-content p{ font-size:'. esc_html( $smof_data[ 'xecuter_font_size_article' ]).' ;}';
	}
	 
  	/*--------------------------------Footer----------------------------------*/
	if ( !empty($footer_background_color  )){ 
		$css.=' .rd-footer-warp,.rd-footer .rd-post-background{background-color: '.esc_html( $footer_background_color ).' ;}';
  	} 
	
	if (!empty( $footer_link_color ) ){ 
 		$css.='.rd-footer .rd-title h4 a,.rd-footer a{color: '.esc_html(   $footer_link_color).'  !important;}';
  	} 
	
	if (!empty( $footer_text_color )){ 
 		$css.=' .rd-footer, .rd-footer p ,.rd-footer input,.rd-footer .rd-excerpt,.rd-footer .rd-title-box a,.rd-footer .rd-title-box span{color: '.esc_html(  $footer_text_color ).' !important;}';
  	} 
	
	if (!empty( $smof_data[ 'xecuter_hide_sidebar' ] )){ 
 		$css.='@media (max-width:767px) { .rd-column-sidebar { display:none;}}';
  	} 	
  	if ( !empty( $smof_data[ 'xecuter_custom_css' ] ) ) { 
		$css.=esc_html( $smof_data[ 'xecuter_custom_css' ]);
	}

 
	if(!empty($rows)):
 	foreach($rows as $key=> $value):
		if(!empty($value['background_color'])){
			$css.='#rd-row-'.esc_html($key).'::before {left: 0;  content:"";position: absolute; height: 100%; z-index:0; width: 100%; background-color: '.esc_html($value['background_color']).' !important}';
 		}
		if(!empty($value['link_color'])){
 			$css.='#rd-row-'.esc_html($key).' .rd-title a, #rd-row-'.esc_html($key).' a,#rd-row-'.esc_html($key).' .rd-load-more span{color:'.esc_html($value['link_color']).'!important}';
			$css.='#rd-row-'.esc_html($key).' .rd-load-more span{border:1px solid  '.esc_html($value['link_color']).' !important}';
		}
		if(!empty($value['text_color'])){
			$css.='#rd-row-'.esc_html($key).' .rd-excerpt , #rd-row-'.esc_html($key).' p,#rd-row-'.esc_html($key).' ,#rd-row-'.esc_html($key).' .rd-title-box a,#rd-row-'.esc_html($key).' span{color:'.esc_html($value['text_color']).' !important}';
 		}
		if(!empty($value['meta_color'])){
			$css.='#rd-row-'.esc_html($key).' .rd-module-item  .rd-meta li, #rd-row-'.esc_html($key).'   .rd-module-item  .rd-meta li a{color:'.esc_html($value['meta_color']).' !important}';
		}
		if(!empty($value['padding_top'])){
 			$css.='#rd-row-'.esc_html($key).' .rd-row-container {padding-top:20px;}';
		}
		if(!empty($value['padding_bottom'])){
 			$css.='#rd-row-'.esc_html($key).' .rd-row-container {padding-bottom:20px;}';
		}
		 
	endforeach;			
	endif;
	wp_reset_query();
		 
	
 	return $css;

      
}