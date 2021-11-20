<?php // Register Posts Box 4 Widget
add_action( 'widgets_init', 'register_xecuter_featured_3c' );
 function register_xecuter_featured_3c() {
    register_widget( 'xecuter_featured_3c' );
}

class xecuter_featured_3c extends WP_Widget {
 	function __construct() {
		parent::__construct(
			'xecuter_featured_3c',
			 'Xecuter - '. esc_html__('Posts Box Featured 3 Column', 'xecuter') 
		);
	}

    /**********  The widget For Display *******/
 	public function widget( $args, $instance ) {
		extract( $args );
 		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
 		$xecuter_data =$instance;
		$query=xecuter_widget_query($instance);
		$count = 0;
		$ratio = !empty( $instance['ratio'] ) ? $instance['ratio'] : 'rd-ratio60';	
		$space = !empty( $instance['space'] ) ? ' rd-space ' : '';	
		if(  $ratio== 'rd-ratio135'){
			$image = 'xecuter_medium';
			
		}elseif($ratio== 'rd-ratio100' ){
			$image = 'xecuter_medium';
			
		} else {
			$image = 'xecuter_small';
		}	
		?>
		<div id="<?php echo esc_attr($widget_id) ?>" class="rd-widget-featured rd-featured rd-module-item  rd-widget-post  rd-widget widget <?php echo esc_attr($ratio.$space);?>">
        
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
                
				<?php
				$query=xecuter_widget_query($instance);
				if( $query->have_posts() ) : 
				while ( $query->have_posts() ) : $query->the_post(); 
					echo'<div class="rd-post-item rd-col-1-3  ">';
						xecuter_post_widget_3($instance,' rd-post-1-10 rd-col-1-1 ',$image,false,false ,false);
					echo'</div>';
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
 		$instance[ 'ratio' ] = strip_tags( $new_instance[ 'ratio' ] );
  		$instance['space'] = !empty( $new_instance['space'] );
     	return $instance;
	}
    
	/********** Display the widget update form *******/
 	public function form( $instance ) { 
		$defaults = array( 'number' => '5','post_title' => true ,'meta_category' => true );
		$instance = wp_parse_args( (array) $instance, $defaults );
		$cats = get_categories();
		$meta_array = xecuter_meta_array();
 		$title = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
 		$number = !empty( $instance[ 'number' ] ) ? $instance[ 'number' ] : '';
   		$orderby = !empty( $instance[ 'orderby' ] ) ? $instance[ 'orderby' ] : '';
		$categories = !empty( $instance[ 'cats' ] ) ? $instance[ 'cats' ] : '';
   		$ratio = !empty( $instance[ 'ratio' ] ) ? $instance[ 'ratio' ] : '';
   		$space = !empty( $instance[ 'space' ] ) ? $instance[ 'space' ] : '';
		$orderby_array=xecuter_array_options('orderby') ;
		$ratio_array=xecuter_array_options('ratio4') ;
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
			<label for="<?php echo esc_attr($this->get_field_id( 'ratio' )); ?>"><?php echo esc_html__('Image Ratio' , 'xecuter' );?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'ratio' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'ratio')); ?>"  >
				<?php foreach (  $ratio_array as $key => $name ) {?>
			 	<option value="<?php echo esc_attr($key) ?>"<?php echo selected( $ratio, $key ) ?>><?php echo esc_html($name); ?></option>
				<?php }?> 
			</select>
		</p>        
         
        <p>
  			<label for="<?php echo esc_attr($this->get_field_id( 'space') ); ?>"><?php echo esc_html__(' Space in Between Posts' , 'xecuter' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'space') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'space' )); ?>" <?php checked( $space ); ?> type="checkbox" />
 		</p>
        
          
  	<?php
 	}
}
 ?>