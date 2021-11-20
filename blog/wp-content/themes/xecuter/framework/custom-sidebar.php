<?php 
/**
 * Plugin Name: Sidebar Creator
 * Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
 * Description: It is Autometic sidebar Creator Plugin.
 * Version: 1.0.1
 * Author: souvikitobuz
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: A "Slug" license name e.g. GPL2
 */
 
 //xecuter Edit
add_action( 'admin_menu', 'xecuter_my_sidebar_menu' );

function xecuter_my_sidebar_menu() {
	add_theme_page( esc_html__('Sidebar Plugin Optidons','xecuter'), esc_html__('Add Sidebar','xecuter'), 'manage_options', 'my-sidebar-unique-identifier', 'xecuter_my_sidebar_options' );
}
function xecuter_my_sidebar_options() {
    
 	wp_enqueue_script('xecuter_sidebar-js',get_template_directory_uri() . '/framework/assets/js/custom-sidebar.js',array( 'jquery'));
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' , 'xecuter' ) );
	}
	?>
	
	<div class="my-form rd-add-sidebar">
        <div class="wrap">
		<h2><?php echo esc_html__('Sidebar Creator Settings' , 'xecuter');?></h2>

		<form method="post" action="options.php" id="InputsWrapper"  role="form">

		<?php wp_nonce_field('update-options'); ?>
 
		<?php  
		$xx=get_option('xecuter_boxes');
		$no=count($xx);
		if(isset($xx[0])) {
			$xx0 = $xx[0];
			
		}else{
			$xx0 =''; 
			
		}
		?>
        
		<div id="append">
            <p class="text-box">
                <label for="box1"><?php echo esc_html__('Sidebar' , 'xecuter');?>-<span class="box-number">1</span></label>
                <input type="text" name="xecuter_boxes[]" value="<?php echo esc_attr($xx0); ?>" id="box1" />
                <a href="#" class="remove-box"><?php echo esc_html__('Remove' , 'xecuter');?></a>
            </p>
    
    
            
            <?php if($no>1){ ?>
                <?php for($i=1;$i<$no;$i++){?>		
                    <p class="text-box"><label for="box' + n + '"><?php echo esc_html__('Sidebar' , 'xecuter');?>-<span class="box-number"><?php echo esc_html($i+1); ?></span></label> 
                    <input type="text" name="xecuter_boxes[]" value="<?php echo esc_attr($xx[$i]); ?>" id="box' + n + '" /> 
                    <a href="#" class="remove-box"><?php echo esc_html__('Remove' , 'xecuter');?></a>
                    </p>
                <?php }?>
            <?php }?>
		</div>
        <button type="button"  class="add-box"><?php echo esc_html__('Add More!' , 'xecuter');?></button>
        
         
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="no_of_sidebar,sidebar_names,xecuter_boxes" />
        
        <p class="submit">
        	<button type="submit" class="button-primary clsSubmit" value="" /><?php echo esc_html__('Save Changes','xecuter') ?></button>
        </p>
        
        
        </form>
		</div>
	</div>
      <?php
}
$xx=get_option('xecuter_boxes');
    if ( function_exists('register_sidebar') ) {
	  if(!empty($xx)){
        foreach ($xx as $side){         
             register_sidebar(array(
				'name' 			=> $side.'('.esc_html__('Custom-Sidebar','xecuter').')',
				'id' 			=>'xecuter_'. sanitize_title($side),
				'before_widget' => '<div  id="%1$s" class="widget  %2$s">',
				'after_widget'  => '</aside></div>',
				'before_title'  => '<div class="rd-title-box"><h4><span class="rd-active">',
        		'after_title'   => '</span></h4></div><aside class="widget-container rd-post-background">',
           ));
             
       }
	   }
}
//End xecuter Edit
 
?>