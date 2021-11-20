<?php /*
Plugin >> Name: WP-PageNavi
Plugin URI: http://lesterchan.net/portfolio/programming/php/
Description: Adds a more advanced paging navigation to your WordPress blog.
Version: 2.50
Author: Lester 'GaMerZ' Chan
Author URI: http://lesterchan.net
 */
### Function: Page Navigation: Boxed Style Paging
function xecuter_get_pagenavi($query = false, $num = false , $before = '', $after = '') {
	global $wpdb, $wp_query;
	$pagenavi_options = xecuter_pagenavi_init(); 
	
	if (!is_single()) {
		if( !empty($query) ){
			$request = $query->request;
			$numposts = $query->found_posts;
			$max_page = $query->max_num_pages;
			$posts_per_page = intval($num);
		}else{
			$request = $wp_query->request;
			$numposts = $wp_query->found_posts;
			$max_page = $wp_query->max_num_pages;
			$posts_per_page = intval(get_query_var('posts_per_page'));
		}
		$paged = intval(get_query_var('paged'));

		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = intval($pagenavi_options['num_pages']);
		$larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
		$larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
		$pages_to_show_minus_1 = $pages_to_show - 1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		$larger_per_page = $larger_page_to_show*$larger_page_multiple;
		$larger_start_page_start = (xecuter_n_round($start_page, 10) + $larger_page_multiple) - $larger_per_page;
		$larger_start_page_end = xecuter_n_round($start_page, 10) + $larger_page_multiple;
		$larger_end_page_start = xecuter_n_round($end_page, 10) + $larger_page_multiple;
		$larger_end_page_end = xecuter_n_round($end_page, 10) + ($larger_per_page);
		if($larger_start_page_end - $larger_page_multiple == $start_page) {
			$larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
			$larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
		}
		if($larger_start_page_start <= 0) {
			$larger_start_page_start = $larger_page_multiple;
		}
		if($larger_start_page_end > $max_page) {
			$larger_start_page_end = $max_page;
		}
		if($larger_end_page_end > $max_page) {
			$larger_end_page_end = $max_page;
		}
		if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
			$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
			$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
 
					if(!empty($pages_text)) {
						echo '<span class="pages">'.esc_html($pages_text).'</span>';
					}
					if ($start_page >= 2 && $pages_to_show < $max_page) {
						$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
						echo '<a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.esc_attr($first_page_text).'">'.esc_html($first_page_text).'</a>';
						if(!empty($pagenavi_options['dotleft_text'])) {
							echo '<span class="extend">'.esc_html($pagenavi_options['dotleft_text']).'</span>';
						}
					}
					if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
						for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="page_number" title="'.esc_attr($page_text).'">'.esc_html($page_text).'</a>';
						}
					}
					previous_posts_link($pagenavi_options['prev_text']);
					for($i = $start_page; $i  <= $end_page; $i++) {						
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
							echo '<span class="current">'.esc_html($current_page_text).'</span>';
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="page_number" title="'.esc_attr($page_text).'">'.esc_html($page_text).'</a>';
						}
					}
					if( empty($query) ){ ?>
					<span id="reza-next-page">
					<?php } next_posts_link($pagenavi_options['next_text'], $max_page);
					if( empty($query) ){?>
					</span>
					<?php
					}
					if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
						for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="page_number" title="'.esc_attr($page_text).'">'.esc_html($page_text).'</a>';
						}
					}
					if ($end_page < $max_page) {
						if(!empty($pagenavi_options['dotright_text'])) {
							echo '<span class="extend">'.esc_html($pagenavi_options['dotright_text']).'</span>';
						}
						$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
						echo '<a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.esc_attr($last_page_text).'">'.esc_html($last_page_text).'</a>';
					}

 		}
	}
}


### Function: Round To The Nearest Value
function xecuter_n_round($num, $tonearest) {
   return floor($num/$tonearest)*$tonearest;
}
function footag_func( $atts ) {
	return "foo = {$atts['foo']}";
}

### Function: Page Navigation Options
function xecuter_pagenavi_init() {
	global $smof_data;
    $t_page = xecuter_t('page');
    $t_of = xecuter_t('of');
    $t_first = xecuter_t('first') ;
    $t_last = xecuter_t('last') ;
	
	
	$pagenavi_options = array();
	$pagenavi_options['pages_text'] = esc_html($t_page.' %CURRENT_PAGE% ' .$t_of .' %TOTAL_PAGES%');
	$pagenavi_options['current_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['page_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['first_text'] = esc_html('&laquo; '.$t_first);
	$pagenavi_options['last_text'] = esc_html($t_last.' &raquo;');
	$pagenavi_options['next_text'] = esc_html('&raquo;');
	$pagenavi_options['prev_text'] = esc_html('&laquo;');
	$pagenavi_options['dotright_text'] = esc_html('...');
	$pagenavi_options['dotleft_text'] = esc_html('...');
	
	
	$pagenavi_options['num_pages'] = 5;
	
	$pagenavi_options['always_show'] = 0;
	$pagenavi_options['num_larger_page_numbers'] = 3;
	$pagenavi_options['larger_page_numbers_multiple'] = 10;
	
	return $pagenavi_options;
}
/*-----------------------------------------------------------------------------------*/
# Pagenavi
/*-----------------------------------------------------------------------------------*/
function xecuter_pagenavi($query = false){
	global $smof_data; 
 	?>
 
	<div class="rd-pagenavi <?php if(!empty($smof_data['xecuter_pagenavi_ajax'])) echo esc_attr('rd-page-ajax');?>">
		<div class="rd-page-number ">
			<?php xecuter_get_pagenavi($query = false) ?>
		</div>
    </div>

	<?php
}
?>