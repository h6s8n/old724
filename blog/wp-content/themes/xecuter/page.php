<?php get_header() ?>
<?php global  $post,$smof_data;
$xecuter_col = xecuter_col();
?> 
<?php $xecuter_meta = get_post_meta( $post->ID );?>
<?php $xecuter_hide_banner_below = !empty( $xecuter_meta['xecuter_hide_banner_below'][0] ) ? $xecuter_meta['xecuter_hide_banner_below'][0] : '';?>
<?php $xecuter_hide_comments = !empty( $xecuter_meta['xecuter_hide_comments'][0] ) ? $xecuter_meta['xecuter_hide_comments'][0]: '';?>
<?php $xecuter_t_page = !empty( $smof_data['xecuter_t_page'] ) ? $smof_data['xecuter_t_page']: '';?>

<?php if(!empty($smof_data['xecuter_breadcrumbs'])){ xecuter_breadcrumbs(); } // Breadcrumbs ?>

<?php xecuter_above_content(); // Above Widget Content For ADS  ?>

<div id="rd-row-blog" class="rd-row-item rd-row-main  rd-row-<?php echo esc_attr($xecuter_col)?> '">
	<div class="rd-row-middle">
        <div class="rd-row-container">
        
            <div class="rd-column <?php echo esc_attr(xecuter_col(true));?>">
                <div class="rd-single-item">
                    <?php if ( have_posts() ) :?>
                    <?php while ( have_posts() ) : the_post(); ?>
         
                        <article class="rd-post-a3 rd-single-post rd-post  " id="post-<?php the_ID(); ?>"> 
                            <div <?php post_class(); ?>>
        
                                <div class="rd-details"><h3 class="rd-title entry-title"><?php the_title(); ?></h3></div>
                                        
                                <?php if ( has_post_thumbnail()) {?>
                                    <div class="rd-thumb">
                                        <a class="rd-post-thumbnail rd-img-shadow" href="<?php echo wp_get_attachment_image_src($xecuter_meta); ?>">
                                        <?php the_post_thumbnail('xecuter_big'); ?>
                                        </a>
                                    </div> 
                                <?php } ?> 
            
                
                                <article class="rd-post-content">
                                    <?php the_content();?>
                                </article>
                            
                                <?php xecuter_wp_link_pages();?>
								<?php edit_post_link(xecuter_t('edit')); ?>

                            </div>
             
                        </article>
             
                    <?php endwhile;?>
                    <?php endif; ?>
        
                    <?php if ( @$xecuter_hide_banner_below !== 'hide' && empty($smof_data['xecuter_below_article'] )  && is_active_sidebar( 'xecuter_below_article' )) { // Below Article?>
                        <div class="rd-widget-banner"><?php dynamic_sidebar('xecuter_below_article_ads'); ?></div>
                    <?php }?>
              
                    <?php if(@$xecuter_hide_comments !== 'hide'){ comments_template( '', true ); }// Comments ?>
                </div>
            </div>
            <?php if($xecuter_col != '1200' ){  get_sidebar();} ?>
             
        </div>
	</div>
</div>

<?php xecuter_below_content(); // Above Widget Content For ADS  ?>

<?php get_footer() ?>
