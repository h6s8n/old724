<?php 
// Sinle Template
global $smof_data,$post;
$xecuter_meta = get_post_meta( $post->ID );
$xecuter_hide_post_share = !empty( $xecuter_meta['xecuter_hide_post_share'][0] ) ? $xecuter_meta['xecuter_hide_post_share'][0] : '';
$xecuter_hide_post_tags = !empty( $xecuter_meta['xecuter_hide_post_tags'][0] ) ? $xecuter_meta['xecuter_hide_post_tags'][0] : '';
$xecuter_hide_post_meta = !empty($xecuter_meta['xecuter_hide_post_meta'][0] ) ? $xecuter_meta['xecuter_hide_post_meta'][0] : '';
$xecuter_hide_nextperv_post = !empty( $xecuter_meta['xecuter_hide_nextperv_post'][0]  ) ? $xecuter_meta['xecuter_hide_nextperv_post'][0]  : '';
$xecuter_hide_author_box = !empty( $xecuter_meta['xecuter_hide_author_box'][0] ) ? $xecuter_meta['xecuter_hide_author_box'][0] : '';
$xecuter_hide_banner_below = !empty( $xecuter_meta['xecuter_hide_banner_below'][0] ) ? $xecuter_meta['xecuter_hide_banner_below'][0] : '';
$xecuter_hide_related_post = !empty( $xecuter_meta['xecuter_hide_related_post'][0] ) ? $xecuter_meta['xecuter_hide_related_post'][0] : '';
$xecuter_hide_comments = !empty( $xecuter_meta['xecuter_hide_comments'][0] ) ? $xecuter_meta['xecuter_hide_comments'][0] : '';
$xecuter_single_ratio = !empty( $xecuter_meta['xecuter_single_ratio'][0] ) ? $xecuter_meta['xecuter_single_ratio'][0] : '';
$xecuter_single = xecuter_single();
if( $xecuter_single =='1' || $xecuter_single =='2'){
	if(!empty($xecuter_single_ratio)){
		$single_ratio = $xecuter_single_ratio;
	}else{
		$single_ratio = !empty( $smof_data['xecuter_single_ratio']) ? $smof_data['xecuter_single_ratio'] : 'rd-ratio60';
	}
}else{
	 $single_ratio ='';
}
if($single_ratio == 'rd-ratio135'){
	$image = 'xecuter_big';
}else{
	$image = 'xecuter_large';
}
  ?>
<div class="rd-single-item">

	<?php if ( have_posts() ) :?>
	<?php while ( have_posts() ) : the_post(); ?>
 
		<article class="rd-post-a<?php echo esc_attr(xecuter_single());?>  <?php if(!empty($xecuter_meta['xecuter_video'][0])) {echo 'rd-video';} ?> rd-single-post rd-post <?php echo esc_attr($single_ratio);?>" id="post-<?php the_ID(); ?>">
        
			<div <?php post_class(); ?>>
         
				<?php if( $xecuter_single =='1' || $xecuter_single =='2'|| $xecuter_single =='3'|| $xecuter_single =='4' ){?>
                    
     
    
                    <div class="rd-details">
                        <h1 class="rd-title entry-title"><?php the_title(); ?></h1>
                        <?php if(@$xecuter_hide_post_meta !== 'hide' ){ xecuter_single_meta();  } ?>
                    </div>
                            
                    <?php  if( !empty($xecuter_meta['xecuter_video'][0] )){?>
                     
                        <?php xecuter_video();?>
                                
                    <?php  } elseif( $xecuter_single !=='4' &&  has_post_thumbnail() && !is_attachment() ) {?>
                
                        <div class="rd-thumb">
                         <?php if($xecuter_single=='1' || $xecuter_single=='2'){ ?>
                                <div class="rd-single-thumbnail"  >
                                    <?php the_post_thumbnail($image);?>
                                </div>
                            <?php } elseif ($xecuter_single=='3'){ ?>
                                <div class="rd-single-thumbnail"  >
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                            <?php } ?>
       
                        </div>
                    
                    <?php } ?>
                
                <?php } ?>
            
                <article class="rd-post-content">
                    <?php the_content();?>
                </article>
            
                <?php xecuter_wp_link_pages();?>
				<?php if(!empty($xecuter_meta['xecuter_review'][0])  ) { xecuter_box_review(); } ?>
				<?php edit_post_link(xecuter_t('edit')); ?>
 				<?php if( @$xecuter_hide_post_tags !== 'hide' && !empty($smof_data['xecuter_single_tags'])){xecuter_tags(); } ?>
 				<?php if( @$xecuter_hide_post_share !== 'hide' ) { xecuter_share_post();} ?>
  
			</div>
		</article>
     
	<?php endwhile;?>
	<?php endif; ?>

<?php if( @$xecuter_hide_nextperv_post !== 'hide'  && !empty($smof_data['xecuter_single_nextperv_post'] ) ) { ?>
		<div class="rd-padding"></div>

        <div class="rd-post-nextprev">
        <?php if(  get_previous_post_link()  ){?>
            <div class="rd-post-previous">
                <span><?php echo xecuter_t('previous');?> </span>
                <?php previous_post_link(); ?> 
            </div>
        <?php }?>
        <?php if(  get_next_post()  ){?>
            <div class="rd-post-next">
                <span><?php echo xecuter_t('next');?> </span>
                <?php next_post_link(); ?>
            </div> 
        <?php }?>
		</div>
  <?php }?>
  
<?php if( @$xecuter_hide_author_box !== 'hide' && !empty($smof_data['xecuter_single_author_box']) && get_the_author_meta( 'description' )  ) { xecuter_author_box(); } ?> 
    
<?php if ( @$xecuter_hide_banner_below !== 'hide' && !empty($smof_data['xecuter_below_article']) && is_active_sidebar( 'xecuter_below_article_ads' ) ) { ?>
 	<div class="rd-widget-banner">
		<?php dynamic_sidebar('xecuter_below_article_ads'); ?>
	</div>
<?php }?>

<?php if( @$xecuter_hide_related_post !== 'hide' && !empty($smof_data['xecuter_related'] ) ) { get_template_part('inc/related-post'); }?> 
    
<?php if(@$xecuter_hide_comments !== 'hide'){ comments_template( '', true ); } ?>
 </div>
