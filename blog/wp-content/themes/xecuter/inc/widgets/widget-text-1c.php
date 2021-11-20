<?php // Register Posts Box 4 Widget
add_action( 'widgets_init', 'register_xecuter_text_1c' );
 function register_xecuter_text_1c() {
    register_widget( 'xecuter_text_1c' );
}

class xecuter_text_1c extends WP_Widget {
 	function __construct() {
		parent::__construct(
			'xecuter_text_1c',
			 'Xecuter - '. esc_html__('Posts Box Text 1 Column', 'xecuter') 
		);
	}

    /**********  The widget For Display *******/
 	public function widget( $args, $instance ) {
		extract( $args );
 		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
 		$xecuter_data =$instance;
		$query=xecuter_widget_query($instance);
		$count = 0;
 		$excerpt = !empty( $instance['excerpt'] ) ? $instance['excerpt'] : '';
 	 
		?>
		<div id="<?php echo esc_attr($widget_id) ?>" class="rd-widget-text rd-text rd-module-item  rd-space  rd-widget-post  rd-widget widget ">
        
		<?php if( !empty($title)){ ?>
        
 			<?php 
            echo wp_kses_post($before_title);
 			echo esc_html($title); 
 			echo wp_kses_post($after_title);
			?>
            
		<?php }else{?>
        
            <aside class="widget-container rd-widget-row">
            
        <?php } ?>
				<div class="rd-post-text">
                
				<?php
 				if( $query->have_posts() ) : 
				while ( $query->have_posts() ) : $query->the_post(); 
					echo'<div class="rd-post-item  rd-col-1-1">';
						xecuter_post_widget_4($instance , ' rd-post-1-3  rd-col-1-1 ',$excerpt);
					echo'</div>';
					echo'<div class="rd-padding rd-padding-text"></div>';
				endwhile; 
				endif; 
				wp_reset_postdata();

				?>
                
			</div>
		</aside>
	</div>
	<?php }

    /********** Update the widget info from the admin panel *******/
 	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
 		$instance[ 'number' ] = strip_tags( $new_instance[ 'number' ] );
 		$instance[ 'cats' ] = (int) $new_instance[ 'cats' ];
  		$instance[ 'orderby' ] = strip_tags( $new_instance[ 'orderby' ] );
  		$instance['excerpt'] = !empty( $new_instance['excerpt'] );
 		$instance[ 'title_limit' ] = strip_tags( $new_instance[ 'title_limit' ] );
 		$instance[ 'excerpt_limit' ] = strip_tags( $new_instance[ 'excerpt_limit' ] );
  		$instance[ 'meta' ] = strip_tags( $new_instance[ 'meta' ] );
 		$instance[ 'meta_2' ] = strip_tags( $new_instance[ 'meta_2' ] );
    	return $instance;
	}
    
	/********** Display the widget update form *******/
 	public function form( $instance ) { 
		$defaults = array( 'number' => '5');
		$instance = wp_parse_args( (array) $instance, $defaults );
		$cats = get_categories();
		$meta_array = xecuter_meta_array();
 		$title = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
 		$number = !empty( $instance[ 'number' ] ) ? $instance[ 'number' ] : '';
   		$orderby = !empty( $instance[ 'orderby' ] ) ? $instance[ 'orderby' ] : '';
		$categories = !empty( $instance[ 'cats' ] ) ? $instance[ 'cats' ] : '';
    		$excerpt = !empty( $instance['excerpt'] ) ? $instance['excerpt'] :'';
		$title_limit = !empty( $instance['title_limit'] ) ? $instance['title_limit'] :'';
		$excerpt_limit = !empty( $instance['excerpt_limit'] ) ? $instance['excerpt_limit'] :'';
    		$meta = !empty( $instance[ 'meta' ] ) ? $instance[ 'meta' ] : '';
  		$meta_2 = !empty( $instance[ 'meta_2' ] ) ? $instance[ 'meta_2' ] : '';
		$orderby_array=xecuter_array_options('orderby') ;
   		 ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__('Title' , 'xecuter' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" type="text" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php echo esc_html__('Number of Posts' , 'xecuter');?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($number); ?>" type="text" size="3" />
		</p>
  		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'cats' )); ?>"><?php echo esc_html__('Select a Category' , 'xecuter' );?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'cats' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'cats' ) ); ?>">
 		 		<option value=""><?php echo esc_html__('All Categories' , 'xecuter' );?></option>
				<?php foreach ( $cats as $cat ) {?>
			 	<option value="<?php echo esc_attr($cat->term_id) ?>"<?php echo selected( $categories, $cat->term_id, false ) ?>> <?php echo esc_html( $cat->name ) ?></option>
				<?php }?>
 			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>"><?php echo esc_html__('Posts Order' , 'xecuter' );?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'orderby')); ?>"  >
				<?php foreach (  $orderby_array as $key => $name ) {?>
			 	<option value="<?php echo esc_attr($key) ?>"<?php echo selected( $orderby, $key ) ?>><?php echo esc_html($name); ?></option>
				<?php }?> 
			</select>
		</p> 
        <p>
  			<label for="<?php echo esc_attr($this->get_field_id( 'excerpt') ); ?>"><?php echo esc_html__('Show Excerpt Posts' , 'xecuter' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'excerpt') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'excerpt' )); ?>" <?php checked( $excerpt ); ?> type="checkbox" />
 		</p>    
 		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title_limit' )); ?>"><?php echo esc_html__('Limit Title length' , 'xecuter');?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title_limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title_limit' )); ?>" value="<?php echo esc_attr($title_limit); ?>" type="text" size="3" />
		</p>
        
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'excerpt_limit' )); ?>"><?php echo esc_html__('Limit Excerpt length' , 'xecuter');?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'excerpt_limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'excerpt_limit' )); ?>" value="<?php echo esc_attr($excerpt_limit); ?>" type="text" size="3" />
		</p>               
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'meta') ); ?>"><?php echo esc_html__('Posts Meta' , 'xecuter' );?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'meta') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'meta' )); ?>"  >
				<?php foreach (  $meta_array as $key => $name ) {?>
			 	<option value="<?php echo esc_attr($key) ?>"<?php echo selected( $meta, $key ) ?>> <?php echo esc_html($name); ?></option>
				<?php }?> 
			</select>
		</p>
        
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'meta_2' )); ?>"><?php echo esc_html__('Posts Meta 2' , 'xecuter' );?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'meta_2')); ?>" name="<?php echo esc_attr($this->get_field_name( 'meta_2' )); ?>"  >
				<?php foreach (  $meta_array as $key => $name ) {?>
			 	<option value="<?php echo esc_attr($key) ?>"<?php echo selected( $meta_2, $key ) ?>><?php echo esc_html($name); ?></option>
				<?php }?> 
			</select>
		</p>     
  	<?php
 	}
}
 ?>