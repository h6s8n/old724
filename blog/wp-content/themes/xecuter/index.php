<?php get_header();?>
<?php $xecuter_col = xecuter_col()?>

  
<?php // Page Builder 
if(!empty($smof_data['xecuter_page_builder']) && is_home() && intval(get_query_var('paged') <= 1 ) ){
			
	$xecuter_rows = get_post_meta( $smof_data['xecuter_page_builder'], 'xecuter_row', true);
	$xecuter_wide = get_post_meta( $smof_data['xecuter_page_builder'], 'xecuter_wide', true);
	$xecuter_content = get_post_meta( $smof_data['xecuter_page_builder'], 'xecuter_content', true);
	$xecuter_main = get_post_meta( $smof_data['xecuter_page_builder'], 'xecuter_main', true);
	$xecuter_mini = get_post_meta( $smof_data['xecuter_page_builder'], 'xecuter_mini', true);

	// Row	
	if(!empty($xecuter_rows)):
	foreach($xecuter_rows as $xecuter_key=> $xecuter_row):
		$sticky_sidebar = !empty( $xecuter_row[ 'sticky_sidebar' ] ) ? 'rd-sticky-sidebar'  : '';
	
		echo '<div id="rd-row-'.esc_attr($xecuter_key).'" class="rd-row-item  rd-row-'.esc_attr($xecuter_row['value']). '">';
				
			if (!empty($xecuter_row['background_image'])){
				echo '<div class="rd-row-background">';
					echo '<img alt="background" src="'.esc_url( $xecuter_row['background_image']).'" width="1920" height="1080" />';			 
				echo'</div>';
			} 	
		echo '<div class="rd-row-middle">';
		echo '<div class="rd-row-container">';
		
		if($xecuter_row['value']=='1920'){
			echo '<div class="rd-column rd-1920 rd-wide">';
				if(!empty($xecuter_wide)):
					foreach($xecuter_wide as  $xecuter_id =>$xecuter_data):
						if($xecuter_key==$xecuter_data['order']  && $xecuter_data['col']=='1'){ 
							xecuter_wide_module();
 						}
					endforeach;
				endif;
			echo'</div>'; 
		}
		// Row Main 
		elseif($xecuter_row['value']=='1200'){
  				echo '<div class="rd-column rd-1200 rd-content">';
					if(!empty($xecuter_content)):
					foreach($xecuter_content as  $xecuter_id => $xecuter_data):
						if($xecuter_key==$xecuter_data['order']  && $xecuter_data['col']=='1'){ 
							xecuter_content_module();
						}
					endforeach;
					endif;
				echo '</div>';
  		
		} elseif($xecuter_row['value']=='800_400' || $xecuter_row['value']=='400_800'  ){
			$xecuter_half =0;
  				echo '<div class="rd-column rd-800 rd-main">';
					if(!empty($xecuter_main)):
					foreach($xecuter_main as  $xecuter_id => $xecuter_data):
						if($xecuter_key==$xecuter_data['order']   ){ 
							xecuter_main_module();
						}
					endforeach;
					endif;
				echo '</div>';
				echo '<div class="rd-column rd-400 rd-mini rd-column-sidebar ">';
				echo '<div class="rd-main-sidebar rd-sidebar '.esc_attr($sticky_sidebar).' ">';
					if(!empty($xecuter_mini)):
					foreach($xecuter_mini as  $xecuter_id => $xecuter_data):
						if($xecuter_key==$xecuter_data['order'] ){ 
							xecuter_mini_module();
 						}
					endforeach;
					endif;
				echo '</div>';			
				echo '</div>';			
  		
		} elseif($xecuter_row['value']=='3c_400'){
  				echo '<div class="rd-column rd-400 rd-mini">';
 					if(!empty($xecuter_mini) ):
					foreach($xecuter_mini as  $xecuter_id => $xecuter_data):
 						if($xecuter_key==$xecuter_data['order'] && $xecuter_data['col']=='1'){ 
 							xecuter_mini_module();
						}
					endforeach;
					endif;
 				echo '</div>';
				echo '<div class="rd-column rd-400 rd-mini">';
					if(!empty($xecuter_mini) ):
					foreach($xecuter_mini as  $xecuter_id => $xecuter_data):
						if($xecuter_key==$xecuter_data['order'] && $xecuter_data['col']=='2'){ 
							xecuter_mini_module();
						}
					endforeach;
					endif;
				echo '</div>';
				echo '<div class="rd-column rd-400 rd-mini">';
					if(!empty($xecuter_mini) ):
					foreach($xecuter_mini as  $xecuter_id => $xecuter_data):
 						if($xecuter_key==$xecuter_data['order'] && $xecuter_data['col']=='3'){ 
 							xecuter_mini_module();
						}
					endforeach;
					endif;
				echo '</div>';			
  			
 		}  
		echo'</div>';
		echo'</div>';
		echo'</div>';

	endforeach; 	  			
	endif;
	wp_reset_query();
}?>

<?php xecuter_above_content(); // Above Widget Content For ADS  ?>

<?php $xecuter_blog_home = isset($smof_data['xecuter_blog_home'])? $smof_data['xecuter_blog_home']: '';?>
<?php 

if($xecuter_blog_home!='0'){
	?>
	<div id="rd-row-blog" class="rd-row-item rd-row-main rd-row-<?php echo esc_attr($xecuter_col)?>">
	<div class="rd-row-middle">
	<div class="rd-row-container">         
                
		<div class="rd-column <?php echo esc_attr(xecuter_col(true));?>">
                
			<?php xecuter_above_center(); // Above Widget Center For ADS  ?>

			<div id="rd_module_blog" class="rd-module-item rd-space">
                
				<?php if(!empty($smof_data['xecuter_blog_title'])){?>
					<div class="rd-title-box"><h4><span class="rd-active"><?php echo esc_html($smof_data['xecuter_blog_title'])?></span></h4></div> 
				<?php }?>
				<?php get_template_part('inc/blog');// Include Blog ?>  
				<?php xecuter_pagenavi(); ?> 

			</div>
                
			<?php xecuter_below_center(); // Above Widget Center For ADS  ?>

		</div>
		<?php if($xecuter_col != '1200' ){  get_sidebar();} ?>
	</div>
	</div>
	</div>
<?php 
}?>
   		
<?php xecuter_below_content(); // Above Widget Content For ADS  ?>
 
<?php get_footer() ?>
