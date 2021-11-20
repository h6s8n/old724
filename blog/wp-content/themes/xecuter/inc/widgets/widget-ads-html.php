<?php // Register ADS Widget Two column:
add_action( 'widgets_init', 'register_xecuter_widget_ads_html' );
 function register_xecuter_widget_ads_html() {
    register_widget( 'xecuter_widget_ads_html' );
}
class xecuter_widget_ads_html extends WP_Widget {
	function __construct() {
		parent::__construct(
			'xecuter_widget_ads_html',
			 'Xecuter - '.esc_html__( 'Ads / Html', 'xecuter'),
			array( 'description' => esc_html__('Ads Html Code','xecuter'))
		);
	}

    /**********  The widget For Display *******/
 	function widget( $args, $instance ) {
 		extract( $args );
		$widget_text = !empty( $instance['text'] ) ? $instance['text'] : '';
  
		$text = apply_filters( 'widget_text', $widget_text, $instance, $this ); 
		
 		?>
      	<div class="rd-widget-ads rd-text-html rd-module-item ">
        	 <div class="widget_text"><?php  echo balanceTags($text); ?></div>
        </div>
		<?php
	}
	
	 /********** Update the widget info from the admin panel *******/
 	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = wp_kses_post( $new_instance['text'] );
		}
 		return $instance;
		
	}
	
    /********** Display the widget update form *******/
	function form( $instance ) {
 		$textarea = !empty( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';
 		?>
 		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'text' )); ?>"><?php echo esc_html__('Code:', 'xecuter'); ?></label>
            <textarea style="height: 100px;" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text' )); ?>"><?php echo esc_textarea($textarea); ?></textarea>
		</p>
	 	 
	<?php
	}
}
