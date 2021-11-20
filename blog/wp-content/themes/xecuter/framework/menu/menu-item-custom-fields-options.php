<?php
/**
 *
 * Copy this file into your wp-content/mu-plugins directory.
 *
 * @package Menu_Item_Custom_Fields_Example
 * @version 0.2.0
 * @author Dzikri Aziz <kvcrvt@gmail.com>
 *
 *
 * Plugin name: Menu Item Custom Fields Example
 * Plugin URI: https://github.com/kucrut/wp-menu-item-custom-fields
 * Description: Example usage of Menu Item Custom Fields in plugins/themes
 * Version: 0.2.0
 * Author: Dzikri Aziz
 * Author URI: http://kucrut.org/
 * License: GPL v2
 * Text Domain: menu-item-custom-fields-example
 */
 
  
function xecuter_nav_menu_enqueue($hook) {
include_once get_template_directory() . '/framework/menu/menu-icon.php';   
	
 	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css',array() );
  	wp_register_script( 'xecuter-nav-menu', get_template_directory_uri().'/framework/assets/js/nav-menu.js',array('jquery') );
 	wp_localize_script('xecuter-nav-menu', 'icons', $xecuter_icons);	
	
	wp_enqueue_script( 'xecuter-nav-menu');
}
add_action('admin_enqueue_scripts', 'xecuter_nav_menu_enqueue');

class Xecuter_Item_Custom_Fields_Options {

	protected static $fields = array();
	public static function init() {
 		add_action( 'wp_nav_menu_item_custom_fields', array( __CLASS__, '_fields' ), 10, 4 );
		add_action( 'wp_update_nav_menu_item', array( __CLASS__, '_save' ), 10, 3 );
		add_filter( 'manage_nav-menus_columns', array( __CLASS__, '_columns' ), 99 );
 		 
	}
	// Save
	public static function _save( $menu_id, $menu_item_db_id, $menu_item_args ) {
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		//check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );
 		//Type
		if ( ! empty( $_POST['xecuter_menu_type'][ $menu_item_db_id ] ) ) {
 			$xecuter_menu_type = $_POST['xecuter_menu_type'][ $menu_item_db_id ];
		}
		else {
			$xecuter_menu_type = '';
		}
  		
		if ( ! empty( $xecuter_menu_type ) ) {
			update_post_meta( $menu_item_db_id, 'xecuter_menu_type', $xecuter_menu_type );
		}
		else {
			delete_post_meta( $menu_item_db_id, 'xecuter_menu_type' );
		}
		
		// Category
 		if ( ! empty( $_POST['xecuter_menu_category'][ $menu_item_db_id ] ) ) {
 			$xecuter_menu_category = $_POST['xecuter_menu_category'][ $menu_item_db_id ];
		}
		else {
			$xecuter_menu_category = '';
		}
  		
		if ( ! empty( $xecuter_menu_category ) ) {
			update_post_meta( $menu_item_db_id, 'xecuter_menu_category', $xecuter_menu_category );
		}
		else {
			delete_post_meta( $menu_item_db_id, 'xecuter_menu_category' );
		}
		
		// Ratio
 		if ( ! empty( $_POST['xecuter_menu_ratio'][ $menu_item_db_id ] ) ) {
 			$xecuter_menu_ratio = $_POST['xecuter_menu_ratio'][ $menu_item_db_id ];
		}
		else {
			$xecuter_menu_ratio = '';
		}
  		
		if ( ! empty( $xecuter_menu_ratio ) ) {
			update_post_meta( $menu_item_db_id, 'xecuter_menu_ratio', $xecuter_menu_ratio );
		}
		else {
			delete_post_meta( $menu_item_db_id, 'xecuter_menu_ratio' );
		} 	 
		
		//Icon
 		if ( ! empty( $_POST['xecuter_menu_icon'][ $menu_item_db_id ] ) ) {
 			$xecuter_menu_icon = $_POST['xecuter_menu_icon'][ $menu_item_db_id ];
		}
		else {
			$xecuter_menu_icon = '';
		}

 
 		if ( ! empty( $xecuter_menu_icon ) ) {
			update_post_meta( $menu_item_db_id, 'xecuter_menu_icon', $xecuter_menu_icon );
		}
		else {
			delete_post_meta( $menu_item_db_id, 'xecuter_menu_icon' );
		}	
  
  
  		// Icon Size
 		if ( ! empty( $_POST['xecuter_menu_icon_size'][ $menu_item_db_id ] ) ) {
 			$xecuter_menu_icon_size = $_POST['xecuter_menu_icon_size'][ $menu_item_db_id ];
		}
		else {
			$xecuter_menu_icon_size = '';
		}

 
 		if ( ! empty( $xecuter_menu_icon_size ) ) {
			update_post_meta( $menu_item_db_id, 'xecuter_menu_icon_size', $xecuter_menu_icon_size );
		}
		else {
			delete_post_meta( $menu_item_db_id, 'xecuter_menu_icon_size' );
		}	
 
	}
 	//Field
	public static function _fields( $id, $item, $depth, $args ) {
		
		    $menu_type =  get_post_meta( $item->ID, 'xecuter_menu_type', true );
		    $menu_icon =  get_post_meta( $item->ID, 'xecuter_menu_icon', true );
		    $category =  get_post_meta( $item->ID, 'xecuter_menu_category', true );
		    $ratio =  get_post_meta( $item->ID, 'xecuter_menu_ratio', true );
		    $icon_size =  get_post_meta( $item->ID, 'xecuter_menu_icon_size', true );
			$options_categories = get_categories();

			$posts = esc_html__('Posts','xecuter');
			$recent = esc_html__('Recent','xecuter');
			$random = esc_html__('Random','xecuter');
 			$sub_menu = esc_html__('Sub Menu','xecuter');
 			$columns = esc_html__('Columns','xecuter');
			$n1 = esc_html__('1','xecuter');
			$n2 = esc_html__('2','xecuter');
			$n3 = esc_html__('3','xecuter');
			$n4 = esc_html__('4','xecuter');
			$n5 = esc_html__('5','xecuter');
			$n6 = esc_html__('6','xecuter');
			
    		?>
 
                <p class="field-custom  xecuter_menu_type description description-wide">
                <label for="xecuter_menu_type-<?php echo esc_attr( $item->ID ) ?>"><?php echo esc_html__( 'Mega Menu', 'xecuter' ) ?></label>
    
                        <select name="xecuter_menu_type[<?php  echo esc_attr( $item->ID ) ?>]" id="xecuter_menu_type-<?php echo esc_attr( $item->ID ) ?> " class="widefat"  >
                          <option value="" <?php selected( $menu_type, '' ); ?>><?php echo esc_html__('None','xecuter');?></option>
                            <option value="recent" <?php selected( $menu_type, 'recent' ); ?>><?php echo esc_html("$recent $posts");?></option>
                          <option value="random" <?php selected( $menu_type, 'random' ); ?>><?php echo esc_html("$random $posts");?></option>
                            <option value="sub-recent" <?php selected( $menu_type, 'sub-recent' ); ?>><?php echo esc_html("$sub_menu + $recent $posts");?></option>
                          <option value="sub-random" <?php selected( $menu_type, 'sub-random' ); ?>><?php echo esc_html("$sub_menu + $random $posts");?></option>                      
                            <option value="col-2" <?php selected( $menu_type, 'col-2' ); ?>><?php echo esc_html("$n2 $columns");?></option>
                          <option value="col-3" <?php selected( $menu_type, 'col-3' ); ?>><?php echo esc_html("$n3 $columns");?></option>
                          <option value="col-4" <?php selected( $menu_type, 'col-4' ); ?>><?php echo esc_html("$n4 $columns");?></option>
                          <option value="col-5" <?php selected( $menu_type, 'col-5' ); ?>><?php echo esc_html("$n5 $columns");?></option>
                          <option value="col-6" <?php selected( $menu_type, 'col-6' ); ?>><?php echo esc_html("$n6 $columns");?></option>
                         </select>
                
                </p>
     
                <p class="field-custom  xecuter_category description description-wide">
                    <label for="xecuter_menu_category-<?php echo esc_attr( $item->ID ) ?>" ><?php echo esc_html__('Select a Category' , 'xecuter' );?></label>
                        <select class="widefat"  name="xecuter_menu_category[<?php  echo esc_attr( $item->ID ) ?>]" id="xecuter_menu_category-<?php echo esc_attr( $item->ID ) ?>">
                        <option value=""><?php echo esc_html__('All Categories' , 'xecuter' );?></option>
                        <?php foreach ( $options_categories as $cat ) {?>
                        <option value="<?php echo esc_attr($cat->term_id) ?>"<?php echo selected( $category, $cat->term_id, false ) ?>> <?php echo esc_html( $cat->name ) ?></option>
                        <?php }?>
                    </select>
                 
                </p>
                
                <p class="field-custom  xecuter_ratio description description-wide">
                    <label for="xecuter_ratio-<?php echo esc_attr( $item->ID ) ?>" ><?php echo esc_html__('Image Ratio' , 'xecuter' );?></label>
                    <select class="widefat"  name="xecuter_menu_ratio[<?php  echo esc_attr( $item->ID ) ?>]" id="xecuter_menu_ratio-<?php echo esc_attr( $item->ID ) ?>">
                         <option value="rd-ratio60" <?php echo selected( $ratio, "rd-ratio60", false ) ?>> <?php echo esc_html__('16/9','xecuter') ?></option>
                         <option value="rd-ratio75" <?php echo selected( $ratio,"rd-ratio75", false ) ?>> <?php echo esc_html__('4/3','xecuter') ?></option>
                         <option value="rd-ratio100" <?php echo selected( $ratio,"rd-ratio100", false ) ?>> <?php echo esc_html('1/1','xecuter') ?></option>
                         <option value="rd-ratio135" <?php echo selected( $ratio,"rd-ratio135", false ) ?>> <?php echo esc_html('3/5','xecuter') ?></option>
                     </select>
                 
                </p>

            
    		<p class="xecuter_menu_icon description description-wide">

  	  	 		<a  class="rd_add_icon button button-small"   id="xecuter_menu_icon-<?php echo esc_attr( $item->ID ) ?>"   data-set="<?php echo esc_html__('Set Icon','xecuter')?>"   > <?php echo esc_html__('Choose Icon','xecuter')?></a>
				
				<?php if(!empty($menu_icon)) { $remove = 'rd-remove-show';} else{  $remove = 'rd-remove-hide';}  ?>
 	  	 			<a  class="rd_remove_icon button button-small <?php echo esc_attr($remove);?>" id="xecuter_menu_icon-<?php echo esc_attr( $item->ID ) ?>" > <?php echo esc_html__('Remove Icon','xecuter')?></a>
 
                <input name="xecuter_menu_icon[<?php  echo esc_attr( $item->ID ) ?>]" id="xecuter_menu_icon-<?php echo esc_attr( $item->ID ) ?>"  type="hidden" value="<?php if(!empty($menu_icon))echo esc_attr($menu_icon);?>">
				<?php if(!empty($menu_icon)){     ?>
				<i class="fa rd-menu-icon <?php echo esc_attr($menu_icon);?>"></i>
                <?php }?>
			</p>
			
            <p class="field-custom  xecuter_icon_size description description-wide">
                <label for="xecuter_icon_size-<?php echo esc_attr( $item->ID ) ?>" ><?php echo esc_html__('Icon Size' , 'xecuter' );?></label>
				<select class="widefat"  name="xecuter_menu_icon_size[<?php  echo esc_attr( $item->ID ) ?>]" id="xecuter_menu_icon_size-<?php echo esc_attr( $item->ID ) ?>">
                     <option value="" <?php echo selected( $icon_size, "", false ) ?>> <?php echo esc_html__('Default','xecuter') ?></option>
                     <option value="fa-1x" <?php echo selected( $icon_size, "fa-1x", false ) ?>> <?php echo esc_html__('1x','xecuter') ?></option>
                     <option value="fa-1-5x" <?php echo selected( $icon_size,"fa-1-5x", false ) ?>> <?php echo esc_html__('1.5x','xecuter') ?></option>
                     <option value="fa-2x" <?php echo selected( $icon_size,"fa-2x", false ) ?>> <?php echo esc_html('2x','xecuter') ?></option>
                     <option value="fa-2-5x" <?php echo selected( $icon_size,"fa-2.5x", false ) ?>> <?php echo esc_html('2.5x','xecuter') ?></option>
                     <option value="fa-3x" <?php echo selected( $icon_size,"fa-3x", false ) ?>> <?php echo esc_html('3x','xecuter') ?></option>
                 </select>
             
 			</p>                        
                    	 <?php
						 
						 
	} 
	public static function _columns( $columns ) {
		$columns = array_merge( $columns, self::$fields );

		return $columns;
	}
}
Xecuter_Item_Custom_Fields_Options::init();
