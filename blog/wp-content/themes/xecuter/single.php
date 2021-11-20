<?php get_header() ?>
<?php 
// Head Single Template
global  $post;
$xecuter_col = xecuter_col();
 ?> 
 
 
<?php if(!empty($smof_data['xecuter_breadcrumbs'])){ xecuter_breadcrumbs(); } // Breadcrumbs ?>
         
<div id="rd-row-blog" class="rd-row-item rd-row-main  rd-row-<?php echo esc_attr($xecuter_col)?> '">
	<div class="rd-row-middle">
		<div class="rd-row-container">      
 			<div class="rd-column <?php echo esc_attr(xecuter_col(true));?>">
				<?php xecuter_above_center(); // Above Widget Center For ADS  ?>
 				<?php  get_template_part('inc/single-template');   ?>                    

			</div>
 			<?php if($xecuter_col != '1200' ){  get_sidebar();} ?>
 		</div>
	</div>
</div>
<?php xecuter_below_content(); // Above Widget Content For ADS  ?>

   
<?php get_footer() ?>
