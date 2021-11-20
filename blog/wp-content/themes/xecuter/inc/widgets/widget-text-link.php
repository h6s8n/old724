<?php //** Text Box Html
 add_action( 'widgets_init', 'register_xecuter_text_link' );
 function register_xecuter_text_link() {
    register_widget( 'xecuter_text_link' );
}
class xecuter_text_link extends WP_Widget {
	function __construct() {
		parent::__construct(
			'xecuter_text_link', 
			'xecuter - '.esc_html__('Text Link' , 'xecuter') );
	}	
	
    /**********  The widget For Display *******/
	function widget( $args, $instance ) {
		extract( $args );
 		$link =  !empty( $instance[ 'link' ] ) ? $instance[ 'link' ] : '#';

		$text = apply_filters('widget_title', $instance['text'] );
		?>
        	<div id="<?php echo esc_attr($widget_id) ?>" class="rd-widget-text-link rd-widget  widget">
 
    			<div class="rd-text-link">
 					<a href="<?php echo esc_url($link);?>"><?php echo esc_html($text); ?></a>
				</div>
            
			</div>
		<?php
        }
		
    /********** Update the widget info from the admin panel *******/
 	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['text'] = strip_tags( $new_instance['text'] );
 		$instance['link'] = strip_tags( $new_instance['link'] );
 		return $instance;
	}
	
	/********** Display the widget update form *******/
 	function form( $instance ) {

  		$text = !empty( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';
  		$link = !empty( $instance[ 'link' ] ) ? $instance[ 'link' ] : '';
		 ?>
 	 	<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'text' )); ?>"><?php echo esc_html__('Text' , 'xecuter' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text' )); ?>" value="<?php  echo esc_attr($text); ?>" class="widefat" type="text" />
		</p>
 	 	<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'link')); ?>"><?php echo esc_html__('Link' , 'xecuter' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'link')); ?>" name="<?php echo esc_attr($this->get_field_name( 'link' )); ?>" value="<?php   echo esc_url($link); ?>" class="widefat" type="text" />
		</p>         
	<?php
	}
}
?>