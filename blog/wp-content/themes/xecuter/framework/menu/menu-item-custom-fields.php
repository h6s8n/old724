<?php

/**
 * Menu Item Custom Fields
 *
 * @package xecuter_xecuter_Item_Custom_Fields
 * @version 1.0.0
 * @author  Dzikri Aziz <kvcrvt@gmail.com>
 *
 * Plugin name: Menu Item Custom Fields
 * Plugin URI: https://github.com/kucrut/wp-menu-item-custom-fields
 * Description: Easily add custom fields to nav menu items.
 * Version: 1.0.0
 * Author: Dzikri Aziz
 * Author URI: https://kucrut.org/
 * License: GPLv2
 * Text Domain: menu-item-custom-fields
 */


class xecuter_Item_Custom_Fields {

	
		public static function load() {
			add_filter( 'wp_edit_nav_menu_walker', array( __CLASS__, '_filter_walker' ), 99 );
		}

 
		public static function _filter_walker( $walker ) {
			$walker = 'xecuter_Item_Custom_Fields_Walker';
			if ( ! class_exists( $walker ) ) {
				require_once get_template_directory() . '/framework/menu/walker-nav-menu-edit.php';
			}

			return $walker;
		}
}
add_action( 'wp_loaded', array( 'xecuter_Item_Custom_Fields', 'load' ), 9 );
 
include_once get_template_directory() . '/framework/menu/menu-item-custom-fields-options.php';   

