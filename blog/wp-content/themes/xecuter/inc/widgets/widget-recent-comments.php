<?php // Register Avatar With Comments
add_action( 'widgets_init', 'register_xecuter_recent_comments' );
function register_xecuter_recent_comments() {
    register_widget( 'xecuter_recent_comments' );
}

class xecuter_recent_comments extends WP_Widget {
	function __construct() {
		parent::__construct(
			'xecuter_recent_comments',  
			'xecuter -  '.esc_html__('Recent Comments', 'xecuter')		);
	}
    /**********  The widget For Display *******/
 	function widget( $args, $instance ) {
  		extract( $args );
 		$title = apply_filters('widget_title', $instance['title'] );
 		$number = !empty( $instance[ 'number' ] ) ? $instance[ 'number' ] : '5';
		$comments = get_comments('status=approve&number='.$number);		
 		?>
		<div id="<?php echo esc_attr($widget_id) ?>" class="rd-widget-cavater rd-text rd-module-item rd-space rd-widget-post rd-widget widget">
		
		<?php if( !empty($title)){ ?>
        
 			<?php 
            echo wp_kses_post($before_title);
 			echo esc_html($title); 
 			echo wp_kses_post($after_title);
			?>
            
		<?php }else{?>
        
            <aside class="widget-container rd-widget-row">
            
        <?php } ?>
			
            	<div class="rd-post-list">

					<?php foreach ( $comments as $comment) { ?>
                        <div class="rd-post-item">
                            <div <?php post_class( 'rd-post rd-post-1-2 rd-col-1-1 rd-post-module-4 rd-col-1-1 rd-wpost-cavater' );?>>
                                <div class="rd-post-warp">
                                    <div class="rd-details">
                                        <div class="rd-title">
                                        <a href="<?php echo get_permalink( $comment->comment_post_ID); ?>" rel="external nofollow"><?php echo( $comment->comment_author); ?>: </a>
                                        </div>
                                        <div class="rd-excerpt"><?php echo wp_html_excerpt( $comment->comment_content, 150 ); ?>...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
					 <div class="rd-padding rd-padding-text"></div> 
                    <?php }
					wp_reset_postdata();

					?>
                
                </div> 
  			</aside>
        </div>
	<?php
	}
	
    /********** Update the widget info from the admin panel *******/
	function update( $new_instance, $old_instance ) {
 		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
 		$instance['number'] = strip_tags( $new_instance['number'] );
  		return $instance;
	}
 	
     /********** Display the widget update form *******/
	function form( $instance ) {
		$defaults = array ( 'title' => esc_html__('Recent Comments'  , 'xecuter' ), 'number' => '5' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		$title = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
 		$number = !empty( $instance[ 'number' ] ) ? $instance[ 'number' ] : '';
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title') ); ?>"><?php echo esc_html__('Title' , 'xecuter' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title') ); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" type="text" style="width:100%;" />
		</p>
 
        <p>
 			<label for="<?php echo esc_attr($this->get_field_id( 'number') ); ?>"><?php echo esc_html__('Number of Comments' ,'xecuter' ); ?></label>
 			<input id="<?php echo esc_attr($this->get_field_id( 'number' ) ); ?>" name="<?php echo  esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_html($number); ?>" type="text" size="3" />
 		</p>
 
  	<?php
 	}
}
?>