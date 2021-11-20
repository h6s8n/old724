<?php
/**
 * Nav Menu API: Walker_Nav_Menu class
 *
 * @package WordPress
 * @subpackage Nav_Menus
 * @since 4.6.0
 */
/**
 * Core class used to implement an HTML list of nav menu items.
 *
 * @since 3.0.0
 *
 * @see Walker
 */
 
 
class xecuter_Walker_Nav_Menu extends Walker {
 
        public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
		public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
        
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
                $indent = str_repeat("\t", $depth);
                $output .= "\n$indent<ul class=\"sub-menu  sub-depth-".esc_attr($depth)." \">\n";
        } 
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
                $indent = str_repeat("\t", $depth);
                $output .= "$indent</ul>\n";
        } 
		
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
                $atts = array();
                $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
                $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
                $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
                $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

                $menu_type = ! empty( $item->xecuter_menu_type ) ? $item->xecuter_menu_type : '';
				$menu_icon = ! empty( $item->xecuter_menu_icon ) ? $item->xecuter_menu_icon        : '';
				$icon_size = ! empty( $item->xecuter_menu_icon_size ) ? $item->xecuter_menu_icon_size        : '';
				
				if(($menu_type == 'recent' || $menu_type == 'random') && $depth == 0 ){
					$mega_menu = 'rd-menu-posts'; 
					$menuchild = ' menu-item-has-children '; 
					$sub_posts = '<div class="sub-posts">'; 
					
 				} elseif(($menu_type == 'sub-recent' || $menu_type == 'sub-random') && $depth == 0 ){
					$mega_menu = 'rd-menu-sub-posts';
					$menuchild = ' menu-item-has-children '; 
					$sub_posts = '<div class="sub-posts">'; 
 				}  elseif(($menu_type == 'col-2' || $menu_type == 'col-3'||$menu_type == 'col-4'||$menu_type == 'col-5'||$menu_type == 'col-6') && $depth == 0 ){
					$mega_menu = 'rd-menu-col';
					$menuchild='';
					$sub_posts = ''; 
				} else{$mega_menu = '';
					$menuchild='';
					$sub_posts = ''; 
				} 
				
				$atts_menu_icon = !empty($menu_icon)? ' fa '.$menu_icon:'';			
			
			
			
                $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
                $classes = empty( $item->classes ) ? array() : (array) $item->classes;
                $classes[] = 'menu-item-' . $item->ID;
                
                $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
                 
                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
                $class_names = $class_names ? ' class="'.esc_attr($mega_menu.$menuchild.' li-depth-'.$depth.' rd-menu-'. $menu_type. ' '.$class_names ) . '"' : '';
                  
                $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
                $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
                $output .= $indent . '<li' . $id . $class_names .'>';
 

                $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
                $attributes = '';
                foreach ( $atts as $attr => $value ) {
                        if ( ! empty( $value ) ) {
                                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                                $attributes .= ' ' . $attr . '="' . $value . '"';
                        }
                }
				$title = apply_filters( 'the_title', $item->title, $item->ID );
                 
                $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
                $item_output = $args->before;
                $item_output .= '<a'. $attributes .' class="rd-depth-'.esc_attr($depth.' '.$atts_menu_icon.' '.$icon_size).'">';
                $item_output .= $args->link_before . $title . $args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;
                $item_output .= $sub_posts;
                
 				 
                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
       
        public function end_el( &$output, $item, $depth = 0, $args = array() ) {
 
 				
			if(  $depth == 0)	{
			$menu_type   = ! empty( $item->xecuter_menu_type ) ? $item->xecuter_menu_type : '';
			$category   = ! empty( $item->xecuter_menu_category ) ? $item->xecuter_menu_category : '';
			$ratio  = ! empty( $item->xecuter_menu_ratio ) ? $item->xecuter_menu_ratio : 'rd-ratio60';				
				
				if($menu_type== 'recent' || $menu_type == 'random' ){
					$mega_menu = 'posts'; 
 					
 				} elseif($menu_type == 'sub-recent' || $menu_type == 'sub-random' ){
					$mega_menu = 'sub-posts';
  				}  else{
					$mega_menu = 'col';
					$menuchild='';
				}
					
 

 				$quray =array();
				
				if($mega_menu == 'posts'){;
					$quray['posts_per_page']= 5;
					$post_col = 'rd-col-1-5';
 					 
					
				} elseif($mega_menu == 'sub-posts'){
					$quray['posts_per_page']= 4;
					$post_col = 'rd-col-1-4';
				}else{
					$post_col = '';
				}
 				
				if($menu_type == 'random' || $menu_type == 'sub-random' ){
					$quray['orderby']='rand';
				}
				
				if(!empty($category)){
					$quray['cat']=$category;
				} 
					
				$quray['ignore_sticky_posts']=1;
							 
				if($ratio== 'rd-ratio135'|| $ratio== 'rd-ratio100'){
					$image='xecuter_large';
				} else {
					$image='xecuter_medium';
				}
				
				$menu_query = new wp_query(@$quray );
 			 
 
 				if(	$menu_type == 'recent' || $menu_type == 'random' || $menu_type == 'sub-recent' || $menu_type == 'sub-random'){
 						$output .='<div class="rd-column rd-1200 rd-content">';
							$output .='<div class="rd-grid  rd-module-item  rd_content_grid_5c '.esc_attr($ratio).' ">';
  					 			$output .='<div class="rd-post-list">';
									if( @$menu_query->have_posts() ) :
									while ( @$menu_query->have_posts() ) : @$menu_query->the_post(); 
										$output .='<article class="rd-post-item '.esc_attr($post_col).'">';
											$output .='<div class="rd-post rd-post-module-2 rd-post-1-5 has-post-thumbnail rd-col-1-1">';
												$output .='<div class="rd-post-warp">';
													$output .='<div class="rd-thumb"><a class="rd-post-thumbnail" href="'.get_permalink().'" >'.get_the_post_thumbnail(null,$image).'</a></div>';                	                            
													$output .='<div class="rd-details">';
													$output .='<h3 class="rd-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
													$output .='</div>';
												$output .='</div>';
											$output .='</div>';
										$output .='</article>';
 									endwhile;
									endif;
 								$output .='</div>';
							$output .='</div>';						
				 		$output .='</div>';
				 		$output .='</div>';
 				}
		}
		wp_reset_query();
 			 			
		$output .= "</li>\n";
        }
} // Walker_Nav_Menu 