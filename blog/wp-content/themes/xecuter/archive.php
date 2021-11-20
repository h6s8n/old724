<?php get_header();	?>	
<?php $xecuter_col = xecuter_col()?>
 
<?php xecuter_above_content(); // Above Widget Content For ADS  ?>

<div id="rd-row-blog" class="rd-row-item  rd-row-<?php echo esc_attr($xecuter_col)?> '">
    <div class="rd-row-middle">
    	<div class="rd-row-container">         
                    
            <div class="rd-column <?php echo esc_attr(xecuter_col(true));?>">
            
                <?php xecuter_above_center(); // Above Widget Center For ADS  ?>
            
                <div id="rd_module_blog" class="rd-module-item rd-space">
                            
                    <div class="rd-title-box"><h4><span class="rd-active"><?php the_archive_title();the_archive_description();?></span></h4></div> 
                    <?php get_template_part('inc/blog');// Include Blog ?>  
                    <?php xecuter_pagenavi(); ?> 
            
                </div>
                            
                <?php xecuter_below_center(); // Above Widget Center For ADS  ?>
        
            </div>
            
            <?php if($xecuter_col != '1200' ){  get_sidebar();} ?>
            
		</div>
	</div>
</div>
  
<?php xecuter_below_content(); // Above Widget Content For ADS  ?>

<?php get_footer() ?>
