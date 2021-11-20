<?php
/********************************************************************
Breadcrumbs
*********************************************************************/
function xecuter_breadcrumbs() {
	global $smof_data;
  // Settings
    $separator          = '&gt;';
    $breadcrums_class   = 'rd-breadcrumbs';
    $home_title         = xecuter_t('homepage');
    $archives      	 	= xecuter_t('archives');
    $t_author        	= xecuter_t('author');
    $t_page         	= xecuter_t('page');
    $search_for       	= xecuter_t('search_for');
    $t_404        		= xecuter_t('404');
	
	 
      
     @$custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
		echo '<div id="rd-row-breadcrumbs" class="rd-row-item rd-row-1200">';
		echo '<div class="rd-row-middle">';
		echo '<div class="rd-row-container">';
		echo '<div class="rd-column rd-1200 rd-content">';
		echo '<div class="rd-breadcrumbs-warp">';

        // Build the breadcrums
        echo '<ul  class="' . esc_attr($breadcrums_class) . ' ">';
           
        // Home page
        echo '<li><a  href="' .  esc_url(home_url( '/') ) . '" title="' . esc_attr($home_title) . '">' . esc_html($home_title) . '</a></li>';
        echo '<li> ' . esc_html($separator) . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li ><strong >' . post_type_archive_title('', false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            @$post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                @$post_type_object = get_post_type_object(@$post_type);
                @$post_type_archive = get_post_type_archive_link(@$post_type);
              
                echo '<li><a  href="' .  esc_url($post_type_archive) . '" title="' .  esc_attr($post_type_object->labels->name) . '">' .  esc_html($post_type_object->labels->name) . '</a></li>';
                echo '<li> ' .esc_html($separator) . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li ><strong>' .  esc_html($custom_tax_name) . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            @$post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if(@$post_type != 'post') {
                  
                @$post_type_object = get_post_type_object($post_type);
                @$post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li><a href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_html($post_type_object->labels->name) . '</a></li>';
                echo '<li> ' . esc_html($separator) . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                @$last_category = end(array_values(@$category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li>'.wp_kses_post($parents).'</li>';
                    $cat_display .= '<li> ' . esc_html($separator) . ' </li>';
                }
             
            }
 
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo wp_kses_post($cat_display);
                echo '<li><strong title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li><a href="' . esc_url($cat_link) . '" title="' . esc_attr($cat_name) . '">' . esc_html($cat_name) . '</a></li>';
                echo '<li> ' .  esc_html($separator) . ' </li>';
                echo '<li><strong title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li><strong title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li><strong>' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
			if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    @$parents .= '<li><a href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    @$parents .= '<li> ' .  esc_html($separator) . ' </li>';
                }
                   
                // Display parent pages
                echo @$parents;
                   
                // Current page
                echo '<li><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li><strong> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li><strong>' . esc_html($get_term_name) . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li><a href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' '.esc_html($archives).'</a></li>';
            echo '<li> ' .  esc_html($separator) . ' </li>';
               
            // Month link
            echo '<li><a title="' . get_the_time('M') . '">' . get_the_time('M') . ' '.esc_html($archives).'</a></li>';
            echo '<li> ' .  esc_html($separator) . ' </li>';
               
            // Day display
            echo '<li> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' '.esc_html($archives).'</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li><a href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' '.esc_html($archives).'</a></li>';
            echo '<li> ' .  esc_html($separator) . ' </li>';
               
            // Month display
            echo '<li><strong title="' . get_the_time('M') . '">' . get_the_time('M') . ' '.esc_html($archives).'</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li><strong  title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' '.esc_html($archives).'</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li><strong title="' . esc_attr($userdata->display_name) . '">' . esc_html($t_author).' ' . esc_html($userdata->display_name) . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li><strong title="'.esc_html($t_page).' ' . get_query_var('paged') . '">'.esc_html($t_page) . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li><strong title="'.esc_html($search_for).' ' . get_search_query() . '">'.esc_html($search_for).' ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . esc_html( $t_404). '</li>';
        }
       
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
           
    }
}
?>