<?php // Register Login Widget
add_action( 'widgets_init', 'register_xecuter_login_widget' );
 function register_xecuter_login_widget() {
    register_widget( 'xecuter_login_widget' );
}
class xecuter_login_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'xecuter_login_widget', 
			 'Xecuter - '.esc_html__('Login Form','xecuter')
		);
	}

    /**********  The widget For Display *******/
 	function widget( $args, $instance ) {
 		extract( $args );
   		$title = apply_filters('widget_title', $instance[ 'title'] );
  		 ?> 

        <div id="<?php echo esc_attr($widget_id); ?>" class="rd-widget-login rd-widget widget">
        
		<?php if( !empty($title)){ ?>
        
 			<?php 
            echo wp_kses_post($before_title);
 			echo esc_html($title); 
 			echo wp_kses_post($after_title);
			?>
            
		<?php }else{?>
        
            <aside class="widget-container rd-widget-row">
            
        <?php } ?>
         
				<?php	
                global $user_ID, $user_identity, $user_level;
                if ( $user_ID ) : ?>
                
                <?php if( empty( $login_only ) ): ?>
    
                    <div class="rd-widget-login-user"> 
                        <span class="rd-author-avatar"><?php echo get_avatar( $user_ID, $size = '85'); ?></span>
                        <div class="rd-panel">
                            <li><?php echo  esc_html(xecuter_t( 'welcome')); ?> <strong><?php echo esc_html( $user_identity); ?></strong> .</li>
                            <li><a href="<?php echo esc_url(home_url('/')); ?>wp-admin/"><?php  echo esc_html(xecuter_t( 'dashboard') ); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/')); ?>wp-admin/profile.php"><?php echo  esc_html(xecuter_t('profile')); ?></a></li>
                            <li><a href="<?php echo esc_url(wp_logout_url()); ?>"><?php echo  esc_html(xecuter_t('logout'));?></a></li>
                        </div>
                    </div>
                <?php endif; ?>
                <?php else: ?>
                    
                    <div class="rd-widget-login-singin">
                        <form name="rd-singin" action="<?php echo esc_url(home_url('/')); ?>wp-login.php" method="post">
                            <label><?php  echo  esc_html(xecuter_t('username')); ?></label>
                            <input type="text" name="log" class="rd-log" id="log" value="" size="33" />
                            <label><?php  echo  esc_html(xecuter_t('password')); ?></label>
                            <input type="password" name="pwd"  class="rd-pass" id="pwd" value=""   size="33" />
                            <input type="submit" name="submit" value="<?php echo  esc_html(xecuter_t('login'));?>" id="submit" />
                            <label class="rd-rememberme"  for="rd-rememberme">
                                <input name="rememberme"  id="rd-rememberme" type="checkbox" checked="checked" value="forever" />
                                <?php  echo xecuter_t('remember'); ?>
                            </label>
                            <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url('/' )); ?>wp-admin/"/>
                        </form>
                
                        <div class="rd-login-links">
							<?php if ( get_option('users_can_register') ) : ?>
                             	<li><a href="<?php echo esc_url(home_url('/')); ?>wp-login.php?action=register"><?php echo  esc_html(xecuter_t('register')); ?></a></li>
                            	<li>|</li>
                            <?php endif; ?> 
                                                       
                           		<li> <a href="<?php echo esc_url(home_url('/')); ?>wp-login.php?action=lostpassword"><?php  echo  esc_html(xecuter_t('lostpassword')); ?></a></li>
                        </div>
                    </div>
                <?php endif;?>
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
 
	function form( $instance ) {

		$defaults = array( 'title' => esc_html__('Login', 'xecuter'   ));
		$instance = wp_parse_args( (array) $instance, $defaults ); 
 		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__('Title', 'xecuter');?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($title ); ?>" class="widefat" type="text" />
		</p>
 
	<?php

	}

}

?>