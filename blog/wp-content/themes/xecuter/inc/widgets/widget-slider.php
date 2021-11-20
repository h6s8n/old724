<?php // Register Posts Box 4 Widget
add_action( 'widgets_init', 'register_xecuter_slider' );
 function register_xecuter_slider() {
    register_widget( 'xecuter_slider' );
}

class xecuter_slider extends WP_Widget {
 	function __construct() {
		parent::__construct(
			'xecuter_slider',
			 'Xecuter - '. esc_html__('Posts Box Slider', 'xecuter') 
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
  		$effect = !empty( $instance[ 'effect' ] ) ? $instance[ 'effect' ] : 'slide';
 		$speed = !empty( $instance[ 'speed' ] ) ? $instance[ 'speed' ] : '500';
 		$pause = !empty( $instance[ 'pause' ] ) ? $instance[ 'pause' ] : '5000';
  		$count = 0;
		if($ratio== 'rd-ratio100'|| $ratio== 'rd-ratio135' ){
			$post ='rd-post-1-2';$image = 'xecuter_big';
		
 		} else {
			$post ='rd-post-1-3';$image = 'xecuter_large';
		}		
		
		$data_options = '"item":1, "slideMove": 1,"slideMargin": 0,"speed":'.$speed.', "mode": "'.$effect.'", "controls":true,"responsive" : [{"breakpoint":1920}],"pager": true,"timer": true,"loop":true,"auto": true,"pause": '.$pause.'';
		
		?>
		<div id="<?php echo esc_attr($widget_id) ?>" class="rd-widget-featured rd-slider rd-featured rd-module-item  rd-widget-post  rd-widget widget <?php echo esc_attr($ratio);?>">
        
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
				while ( $query->have_posts() ) : $query->the_post(); 
 					echo'<div class="rd-post-item  rd-col-1-1">';
						xecuter_post_widget_3($instance ,$post.' rd-979-3c  rd-767-1c rd-499-1c',$image);
					echo'</div>';
				endwhile; 
				endif; 
				wp_reset_postdata();
				?>
                
			</div>
            
 			<div class="rd-data-options" data-options='{<?php echo esc_attr($data_options);?>}'></div>
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
   		$instance['post_title'] = !empty( $new_instance['post_title'] );
  		$instance['excerpt'] = !empty( $new_instance['excerpt'] );
 		$instance[ 'title_limit' ] = strip_tags( $new_instance[ 'title_limit' ] );
 		$instance[ 'excerpt_limit' ] = strip_tags( $new_instance[ 'excerpt_limit' ] );
  		$instance[ 'meta_category'] = !empty( $new_instance['meta_category'] );
 		$instance[ 'meta' ] = strip_tags( $new_instance[ 'meta' ] );
 		$instance[ 'meta_2' ] = strip_tags( $new_instance[ 'meta_2' ] );
 		$instance[ 'effect' ] = strip_tags( $new_instance[ 'effect' ] );
 		$instance[ 'speed' ] = strip_tags( $new_instance[ 'speed' ] );
 		$instance[ 'pause' ] = strip_tags( $new_instance[ 'pause' ] );
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
  		$post_title = !empty( $instance['post_title'] ) ? $instance['post_title'] :'';
		$excerpt = !empty( $instance['excerpt'] ) ? $instance['excerpt'] :'';
		$title_limit = !empty( $instance['title_limit'] ) ? $instance['title_limit'] :'';
		$excerpt_limit = !empty( $instance['excerpt_limit'] ) ? $instance['excerpt_limit'] :'';
		$meta_category = !empty( $instance['meta_category'] ) ? $instance['meta_category'] :null;
   		$meta = !empty( $instance[ 'meta' ] ) ? $instance[ 'meta' ] : '';
  		$meta_2 = !empty( $instance[ 'meta_2' ] ) ? $instance[ 'meta_2' ] : '';
		$orderby_array=xecuter_array_options('orderby') ;
		$ratio_array=xecuter_array_options('ratio4') ;
		$effect_array= array('slide'=>	esc_html__('Slide','xecuter'),'fade' => esc_html('Fade','xecuter'), ); 
   		$effect = !empty( $instance[ 'effect' ] ) ? $instance[ 'effect' ] : '';
   		$speed = !empty( $instance[ 'speed' ] ) ? $instance[ 'speed' ] : '';
   		$pause = !empty( $instance[ 'pause' ] ) ? $instance[ 'pause' ] : '';		
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
  			<label for="<?php echo esc_attr($this->get_field_id( 'post_title') ); ?>"><?php echo esc_html__('Show Title Posts' , 'xecuter' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'post_title') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'post_title' )); ?>" <?php checked( $post_title ); ?> type="checkbox" />
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
			<input id="<?php echo esc_attr($this->get_field_id( 'meta_category') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'meta_category') ); ?>" <?php checked( $meta_category ); ?> type="checkbox" />
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
 		<p>
			<label for="<?php echo  esc_attr($this->get_field_id( 'effect' )); ?>"><?php echo esc_html__('Slider Effect' , 'xecuter' );?></label>
			<select id="<?php echo  esc_attr($this->get_field_id( 'effect' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'effect' )); ?>"  >
				<?php foreach ( $effect_array as $key => $name ) {?>
			 	<option value="<?php echo esc_attr($key) ?>"<?php echo selected( $effect, $key ) ?>> <?php echo esc_html($name); ?></option>
				<?php }?> 
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'speed') ); ?>"><?php echo esc_html__('Animation Speed','xecuter');?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'speed' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'speed' )); ?>" value="<?php echo esc_attr($speed); ?>" type="text" size="3" />
		</p> 
  		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'pause' )); ?>"><?php echo esc_html__('Animation Pause Time','xecuter');?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'pause' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pause' )); ?>" value="<?php echo esc_attr($pause); ?>" type="text" size="3" />
		</p>         
             
  	<?php
 	}
}
 ?>