<?php
/**
 * Importer Path
 */
if( ! function_exists( 'dt_importer_get_path_locate' ) ) {
  function dt_importer_get_path_locate() {
    $dirname        = wp_normalize_path( dirname( __FILE__ ) );
    $plugin_dir     = wp_normalize_path( WP_PLUGIN_DIR );
    $located_plugin = ( preg_match( '#'. $plugin_dir .'#', $dirname ) ) ? true : false;
    $directory      = ( $located_plugin ) ? $plugin_dir : get_template_directory();
    $directory_uri  = ( $located_plugin ) ? WP_PLUGIN_URL : get_template_directory_uri();
    $basename       = str_replace( wp_normalize_path( $directory ), '', $dirname );
    $dir            = $directory . $basename;
    $uri            = $directory_uri . $basename;
    return apply_filters( 'dt_importer_get_path_locate', array(
      'basename' => wp_normalize_path( $basename ),
      'dir'      => wp_normalize_path( $dir ),
      'uri'      => $uri
    ) );
  }
}

/**
 * Importer constants
 */
$get_path = dt_importer_get_path_locate();

define( 'DT_IMPORTER_VER' , '1.0.0' );
define( 'DT_IMPORTER_DIR' , $get_path['dir'] );
define( 'DT_IMPORTER_URI' , $get_path['uri'] );
define( 'DT_IMPORTER_CONTENT_DIR' , DT_IMPORTER_DIR . '/demos/' );
define( 'DT_IMPORTER_CONTENT_URI' , DT_IMPORTER_URI . '/demos/' );



/**
 * Scripts and styles for admin
 */
function dt_importer_enqueue_scripts() {

    wp_enqueue_script( 'dt-importer', DT_IMPORTER_URI . '/assets/js/dt-importer.js', array( 'jquery' ), DT_IMPORTER_VER, true);
    wp_enqueue_style( 'dt-importer-css', DT_IMPORTER_URI . '/assets/css/dt-importer.css', null, DT_IMPORTER_VER);
}

add_action( 'admin_enqueue_scripts', 'dt_importer_enqueue_scripts' );

/**
 *
 * Decode string for backup options (Source from codestar)
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}

/**
 * Load Importer
 */
require_once DT_IMPORTER_DIR . '/classes/abstract.class.php';
require_once DT_IMPORTER_DIR . '/classes/importer.class.php';
require_once DT_IMPORTER_DIR . '/classes/import.php';
require_once DT_IMPORTER_DIR . '/classes/widgets.php';
 

$xecuter_demo_settings      = array(
  'menu_parent' => 'themes.php',
  'menu_title'  => __('وارد کردن طرح های آماده', 'dt-importer'),
  'menu_type'   => 'add_submenu_page',
  'menu_slug'   => 'dt_demo_importer',
);
$xecuter_demo_options = array(
    'homepage-1' => array(
      'title'         => __('صفحه خانگی 1', 'dt-importer'),
      'menus'         => array(
            'xecuter_main_menu'   => 'menu-1', // Menu Location and Title
            'xecuter_plus_menu' => 'menu-2',
        )
    ), 
	
    'homepage-2' => array(
      'title'         => __('صفحه خانگی 2', 'dt-importer'),
      'menus'         => array(
            'xecuter_main_menu'   => 'menu-1', // Menu Location and Title
            'xecuter_plus_menu' => 'menu-2',
        )
    ), 	
	
    'homepage-3' => array(
	'title'         => __('صفحه خانگی 3', 'dt-importer'),
      'menus'         => array(
            'xecuter_main_menu'   => 'menu-1', // Menu Location and Title
            'xecuter_plus_menu' => 'menu-2',
        )
    ), 	
	
    'homepage-4' => array(
      'title'         => __('صفحه خانگی 4', 'dt-importer'),
      'menus'         => array(
            'xecuter_main_menu'   => 'menu-1', // Menu Location and Title
            'xecuter_plus_menu' => 'menu-2',
        )
    ), 			
	
    'homepage-5' => array(
      'title'         => __('صفحه خانگی 5', 'dt-importer'),
      'menus'         => array(
            'xecuter_main_menu'   => 'menu-1', // Menu Location and Title
            'xecuter_plus_menu' => 'menu-2',
        )
    ), 		
    'homepage-6' => array(
      'title'         => __('صفحه خانگی 6', 'dt-importer'),
      'menus'         => array(
            'xecuter_main_menu'   => 'menu-1', // Menu Location and Title
            'xecuter_plus_menu' => 'menu-2',
        )
    ), 		
    'homepage-7' => array(
      'title'         => __('صفحه خانگی 7', 'dt-importer'),
      'menus'         => array(
            'xecuter_main_menu'   => 'menu-1', // Menu Location and Title
            'xecuter_plus_menu' => 'menu-2',
        )
    ), 	
		
    'homepage-8' => array(
      'title'         => __('صفحه خانگی 8', 'dt-importer'),
      'menus'         => array(
            'xecuter_main_menu' => 'menu-1', // Menu Location and Title
            'xecuter_plus_menu' => 'menu-2',
        )
    ), 
    'homepage-9' => array(
      'title'         => __('صفحه خانگی 9', 'dt-importer'),
      'menus'         => array(
            'xecuter_main_menu'   => 'menu-1', // Menu Location and Title
            'xecuter_plus_menu' => 'menu-2',
        )
    ), 
    'homepage-10' => array(
      'title'         => __('صفحه خانگی 10', 'dt-importer'),
      'menus'         => array(
            'xecuter_main_menu'   => 'menu-1', // Menu Location and Title
            'xecuter_plus_menu' => 'menu-2',
        )
    ), 	
    'homepage-11' => array(
      'title'         => __('صفحه خانگی 11', 'dt-importer'),
      'menus'         => array(
            'xecuter_main_menu'   => 'menu-1', // Menu Location and Title
            'xecuter_plus_menu' => 'menu-2',
        )
    ),
    'homepage-12' => array(
      'title'         => __('صفحه خانگی 12', 'dt-importer'),
      'menus'         => array(
            'xecuter_main_menu'   => 'menu-1', // Menu Location and Title
            'xecuter_plus_menu' => 'menu-2',
        )
    ), 	 
);
DT_DEMO_Importer::instance( $xecuter_demo_settings, $xecuter_demo_options );
?>