<?php global $smof_data;?>

<div id="rd-footer" class="rd-footer-warp">
	<div class="rd-footer-middle">
 		<div class="rd-footer"> 
        
			<div class="rd-column rd-400 rd-mini">
				<?php if(is_active_sidebar( 'xecuter_footer_1' ) ){ ?>
                    <section class="rd-main-sidebar rd-sidebar  " >
                        <?php  dynamic_sidebar('xecuter_footer_1') ;  ?>
                    </section>
                <?php }?>
			</div> 
			<div class="rd-column rd-400 rd-mini">
				<?php if(is_active_sidebar( 'xecuter_footer_2' ) ){ ?>
                    <section class="rd-main-sidebar rd-sidebar ">
                        <?php  dynamic_sidebar('xecuter_footer_2') ;  ?>
                    </section>
                <?php }?>
			</div> 

			<div class="rd-column rd-400 rd-mini">
				<?php if(is_active_sidebar( 'xecuter_footer_3' ) ){ ?>
                    <section class="rd-main-sidebar rd-sidebar ">
                        <?php  dynamic_sidebar('xecuter_footer_3') ;  ?>
                    </section>
                <?php }?>
			</div> 
                 
 
                 
			<?php if(!empty($smof_data['xecuter_footer_bottom_code'])) {?>
				<div class="rd-footer-bottom">
					<span><?php echo wp_kses_post($smof_data['xecuter_footer_bottom_code']);?></span>  
				</div>
			<?php }?> 
 		</div>
	</div> 
</div>
</div>    
<footer>

 
</footer>
<?php wp_footer(); ?>
 
</footer>   
</body>
</html>
