<?php get_header() ?>

<?php if(!empty($smof_data['xecuter_breadcrumbs'])){ xecuter_breadcrumbs(); } // Breadcrumbs ?>
 
<div id="rd-row-blog" class="rd-row-item rd-row-main  rd-row-1200">
	<div class="rd-row-middle">
		<div class="rd-row-container">

			<?php if (!empty($smof_data['xecuter_banner_content_top'])){ xecuter_banner_content_top();} // Banner Content Top ?>
  			<div class="rd-column  rd-1200 rd-content">
 					<div class="rd-single-item">
  						<div class="woocommerce post rd-single-post  rd-post " ><?php woocommerce_content(); ?></div> 	
 					</div>  	
 			</div>
   			<?php if (!empty($smof_data['xecuter_banner_content_bottom'])){xecuter_banner_content_bottom();} // Banner Content Bottom?>
		</div>
 	</div>
</div>   

<?php get_footer() ?>