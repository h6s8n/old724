<?php

class Xecuter_Item_Custom_Fields_Walker extends Walker_Nav_Menu_Edit {


	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$item_output = '';

		parent::start_el( $item_output, $item, $depth, $args, $id );

		$output .= preg_replace(
			'/(?=<(fieldset|p)[^>]+class="[^"]*field-move)/',
			$this->get_fields( $item, $depth, $args ),
			$item_output
		);
	}
 
	protected function get_fields( $item, $depth, $args = array(), $id = 0 ) {
		ob_start();
 		global $wp_version;
 		if( $wp_version >= '5.4.0'){
			do_action( 'wp_nav_menu_item_custom_fields_customize_template', $item->ID, $item, $depth, $args, $id );
		}else{
			
			do_action( 'wp_nav_menu_item_custom_fields', $item->ID, $item, $depth, $args, $id );

		}
		return ob_get_clean();
	}
}
