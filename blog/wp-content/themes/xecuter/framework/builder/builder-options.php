<?php
 

function xecuter_options() { 
	global $xecuter_options;
	$carousel = esc_html__('Carousel','xecuter');
	$slider = esc_html__('Slider','xecuter');
	$column = esc_html__('Column','xecuter');
	$featured = esc_html__('Featured','xecuter');
	$thumbnails = 'با تب';
	$vertical = esc_html__('Vertical','xecuter');
	$grid = esc_html__('Grid','xecuter');
	$list = esc_html__('List','xecuter');
	$text = esc_html__('Text','xecuter');
	$ads = esc_html__('Ads Banner','xecuter');
	$and = esc_html__('&','xecuter');
	$html = esc_html__('Html','xecuter');
	$widgets = esc_html__('Widgets','xecuter');
	 
	$n1 = esc_html__('1','xecuter');
	$n2 = esc_html__('2','xecuter');
	$n3 = esc_html__('3','xecuter');
	$n4 = esc_html__('4','xecuter');
	$n5 = esc_html__('5','xecuter');
	$n6 = esc_html__('6','xecuter');
	$n7 = esc_html__('7','xecuter');
	$n8 = esc_html__('8','xecuter');	
	$n9 = esc_html__('9','xecuter');	
	$n10 = esc_html__('10','xecuter');
	include_once get_template_directory() . '/framework/builder/builder-options-wide.php';
	include_once get_template_directory() . '/framework/builder/builder-options-content.php';
	include_once get_template_directory() . '/framework/builder/builder-options-main.php';
	include_once get_template_directory() . '/framework/builder/builder-options-mini.php'; 
	 
 
}
add_action('init','xecuter_options');
?>