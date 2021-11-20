<?php //** Social Icon
add_action( 'widgets_init', 'register_xecuter_social' );
 function register_xecuter_social() {
    register_widget( 'xecuter_social' );
}
class xecuter_social extends WP_Widget {
	function __construct() {
		parent::__construct(
			'xecuter_social', // Base ID
			 'xecuter - '.esc_html__('Social Icon', 'xecuter') );
	}	
		
    /**********  The widget For Display *******/
	function widget( $args, $instance ) {
		
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
   		?>
        
		<div id="<?php echo esc_attr($widget_id) ?>" class="rd-widget-social rd-space rd-widget rd-module-item  rd-widget-post widget">
        
		<?php if( !empty($title)){ ?>
        
 			<?php 
            echo wp_kses_post($before_title);
 			echo esc_html($title); 
 			echo wp_kses_post($after_title);
			?>
            
		<?php }else{?>
        
            <aside class="widget-container rd-widget-row">
            
        <?php } ?>
        
				<div class="rd-social-content">
					<?php xecuter_social(true); ?>
 				</div>
         	</aside>
         </div>
	<?php 		 
	}

    /********** Update the widget info from the admin panel *******/
 	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
 		return $instance;
	}
	
	/********** Display the widget update form *******/
 	function form( $instance ) {

		$defaults = array( 'title' => esc_html__('Social' , 'xecuter' )  );
		$instance = wp_parse_args( (array) $instance, $defaults );
 		$title = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
	 	?>		 

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title')); ?>"><?php echo esc_html__('Title' , 'xecuter' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" type="text" />
		</p>
 

	<?php
	}
}
?>