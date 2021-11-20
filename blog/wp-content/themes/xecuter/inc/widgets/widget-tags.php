<?php // Register Tags
add_action( 'widgets_init', 'register_xecuter_tags' );
 function register_xecuter_tags() {
    register_widget( 'xecuter_tags' );
}
class xecuter_tags extends WP_Widget {
	function __construct() {
		parent::__construct(
			'xecuter_tags',
			'xecuter - '.esc_html__('Tags' , 'xecuter') 
		);
	}
    /**********  The widget For Display *******/
	function widget( $args, $instance ) {
 		extract( $args );
 		$title = apply_filters('widget_title', $instance['title'] );
 		 ?> 
		<div id="<?php echo esc_attr($widget_id) ?>" class="rd-widget-tags rd-widget rd-module-item rd-space rd-widget-post widget">

		<?php if( !empty($title)){ ?>
        
 			<?php 
            echo wp_kses_post($before_title);
 			echo esc_html($title); 
 			echo wp_kses_post($after_title);
			?>
            
		<?php }else{?>
        
            <aside class="widget-container rd-widget-row">
            
        <?php } ?>
				<div class="rd-tags-box">
					<?php wp_tag_cloud( $args = array( 'largest' => 8,'number' => 25, 'orderby'=> 'count', 'order' => 'DESC' )); ?>
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
	$defaults = array( 'title' => esc_html__('Tags', 'xecuter' ));
		$instance = wp_parse_args( (array) $instance, $defaults );
 		$title = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title') ); ?>"><?php echo esc_html__('Title' , 'xecuter' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" type="text" style="width:100%;" />
		</p>
		
 	<?php

	}

}

?>