<?php  // Register ADS Widget One Column:
add_action( 'widgets_init', 'register_xecuter_ads_1c' );
 function register_xecuter_ads_1c() {
    register_widget( 'xecuter_ads_1c' );
}

class xecuter_ads_1c extends WP_Widget {
	function __construct() {
		parent::__construct(
			'xecuter_ads_1c',
			 'xecuter - '.esc_html__('Ads Banner' , 'xecuter')
		);
	}
	
    /**********  The widget For Display *******/
 	public function widget( $args, $instance ) {
		extract( $args );
  		?>
 		<div  class="rd-module-item rd-widget-ads">
	 
			<div class="rd-ads <?php if ( !empty($instance[ 'resize' ]) ) {echo 'rd-resize';}?>">
                <a href="<?php if(!empty($instance[ 'ads_url' ])){echo esc_url(@$instance[ 'ads_url' ] );}?>"   <?php if ( !empty($instance[ 'window' ]) ) echo 'target="_blank"' ; ?> <?php if ( !empty($instance[ 'nofollow' ]) ) echo 'rel="nofollow"'?> >
               	<?php if(!empty( $instance[ 'ads_img' ])){ ?>
   					<img alt="ads" src="<?php echo esc_url(@$instance[ 'ads_img' ] ); ?>" />
              	<?php }?>
 				</a> 		
 			</div>
            
		</div>
	<?php 
 	}
    /********** Update the widget info from the admin panel *******/
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['window'] = !empty( $new_instance['window'] );
		$instance['nofollow'] = !empty( $new_instance['nofollow'] );
		$instance['resize'] = !empty( $new_instance['resize'] );
  		$instance[ 'ads_img'] = strip_tags( $new_instance[ 'ads_img'] );
		$instance[ 'ads_url'] = strip_tags( $new_instance[ 'ads_url'] );
 		return $instance;
	}
	
	/********** Display the widget update form *******/
	public function form( $instance ) {
		$window = !empty( $instance['window'] ) ? $instance['window'] : 0;
		$nofollow = !empty( $instance['nofollow'] ) ? $instance['nofollow'] : 0;
		$resize = !empty( $instance['resize'] ) ? $instance['resize'] : 0;
  		$ads_img = !empty( $instance[ 'ads_img' ] ) ? $instance[ 'ads_img' ] : '';
 		$ads_url = !empty( $instance[ 'ads_url' ] ) ? $instance[ 'ads_url' ] : '';
 		?>
    	
  		<p>
         	<label for="<?php echo esc_attr($this->get_field_id( 'window' )); ?>"><?php echo esc_html__('Open in New Window:', 'xecuter'); ?></label>
 			<input id="<?php echo esc_attr($this->get_field_id( 'window') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'window' )); ?>" value="true" <?php checked( $window );  ?> type="checkbox" />
 		</p> 
  		<p>
         	<label for="<?php echo esc_attr($this->get_field_id( 'nofollow')); ?>"><?php echo esc_html__('Nofollow:', 'xecuter'); ?></label>
 			<input id="<?php echo esc_attr($this->get_field_id( 'nofollow' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'nofollow') ); ?>" value="true" <?php checked( $nofollow );  ?> type="checkbox" />
 		</p>  	 
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'ads_img')); ?>"><?php echo esc_html__('Ads Image path:', 'xecuter'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'ads_img')); ?>" name="<?php echo esc_attr($this->get_field_name( 'ads_img' )); ?>" value="<?php echo esc_url($ads_img); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'ads_url')); ?>"><?php echo esc_html__('Ads link:', 'xecuter'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'ads_url')); ?>" name="<?php echo esc_attr($this->get_field_name( 'ads_url' )); ?>" value="<?php echo esc_url($ads_url); ?>" class="widefat" type="text" />
		</p>
  		<p>
         	<label for="<?php echo esc_attr($this->get_field_id( 'resize')); ?>"><?php echo esc_html__('Full Size Image:', 'xecuter'); ?></label>
 			<input id="<?php echo esc_attr($this->get_field_id( 'resize')); ?>" name="<?php echo esc_attr($this->get_field_name( 'resize' )); ?>" value="true" <?php checked( $resize );  ?> type="checkbox" />
 		</p>      
 
	<?php
	}
}
