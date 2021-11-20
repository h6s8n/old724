<?php // Register Posts Box 4 Widget
add_action( 'widgets_init', 'register_xecuter_list_2' );
 function register_xecuter_list_2() {
    register_widget( 'xecuter_list_2' );
}

class xecuter_list_2 extends WP_Widget {
 	function __construct() {
		parent::__construct(
			'xecuter_list_2',
			 'Xecuter - '. esc_html__('Posts Box List 2', 'xecuter') 
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
		$size = !empty( $instance['size'] ) ? $instance['size'] : 'rd-img-medium';	
		$category = !empty( $instance['meta_category'] ) ? $instance['meta_category'] : '';	
		if($size == 'rd-img-large'){ $post_size = 'rd-post-large';  $image  = 'xecuter_medium';}
		else {$post_size = 'rd-post-medium'; $image  = 'xecuter_small'; }
 
		if($ratio =='rd-ratio75'){
			$post_ratio = 'rd-post-75';$meta_category= $category;
		}
		else {
			$post_ratio = 'rd-post-60';$meta_category='';
		}
	 
		?>
		<div id="<?php echo esc_attr($widget_id) ?>" class="rd-widget-list  rd-module-item  rd-space  rd-widget-post  rd-widget widget <?php echo esc_attr($ratio);?>">
        
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
 				if( $query->have_posts() ) : 
				while ( $query->have_posts() ) : $query->the_post(); $count++;
					if($count==1 ){
						echo'<div class="rd-grid  rd-post-item rd-col-1-1">';
							xecuter_post_widget_2(  $instance ,' rd-post-1-3 rd-col-1-1 rd-979-3c rd-767-1c rd-499-1c','xecuter_large');
						echo'</div>';
					} else {
						echo'<div class="rd-list  rd-post-item  rd-col-1-1">';
							xecuter_post_widget_1($instance ,$post_size.' '.$post_ratio.'  rd-post-1-3 rd-post-1-3 rd-col-1-1 '.$size,$image,false, $meta_category);
						echo'</div>';
					}
					echo'<div class="rd-row"></div>';

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
		$instance['size'] =  strip_tags( $new_instance['size'] );
		$instance['excerpt'] = !empty( $new_instance['excerpt'] );
 		$instance[ 'title_limit' ] = strip_tags( $new_instance[ 'title_limit' ] );
 		$instance[ 'excerpt_limit' ] = strip_tags( $new_instance[ 'excerpt_limit' ] );
  		$instance[ 'meta_category'] = !empty( $new_instance['meta_category'] );
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
   		$size = !empty( $instance[ 'size' ] ) ? $instance[ 'size' ] : '';
   		$ratio = !empty( $instance[ 'ratio' ] ) ? $instance[ 'ratio' ] : '';
  		$excerpt = !empty( $instance['excerpt'] ) ? $instance['excerpt'] :'';
		$title_limit = !empty( $instance['title_limit'] ) ? $instance['title_limit'] :'';
		$excerpt_limit = !empty( $instance['excerpt_limit'] ) ? $instance['excerpt_limit'] :'';
		$meta_category = !empty( $instance['meta_category'] ) ? $instance['meta_category'] :null;
   		$meta = !empty( $instance[ 'meta' ] ) ? $instance[ 'meta' ] : '';
  		$meta_2 = !empty( $instance[ 'meta_2' ] ) ? $instance[ 'meta_2' ] : '';
		$orderby_array=xecuter_array_options('orderby') ;
		$size_array=xecuter_array_options('size1') ;
		$ratio_array=xecuter_array_options('ratio2') ;
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
			<label for="<?php echo esc_attr($this->get_field_id( 'size' )); ?>"><?php echo esc_html__('Image Size' , 'xecuter' );?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'size')); ?>"  >
				<?php foreach (  $size_array as $key => $name ) {?>
			 	<option value="<?php echo esc_attr($key) ?>"<?php echo selected( $size, $key ) ?>><?php echo esc_html($name); ?></option>
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
  			<label for="<?php echo esc_attr($this->get_field_id( 'meta_category') ); ?>"><?php echo esc_html__('Show Category Meta' , 'xecuter' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'meta_category') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'meta_category' )); ?>" <?php checked( $meta_category ); ?> type="checkbox" />
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