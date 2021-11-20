<div class="wrap" id="of_container">

	<div id="of-popup-save" class="of-save-popup">
		<div class="of-save-save"><?php echo esc_html__('Options Updated' , 'xecuter')?></div>
	</div>
	
	<div id="of-popup-reset" class="of-save-popup">
		<div class="of-save-reset"><?php echo esc_html__('Options Reset' , 'xecuter')?></div>
	</div>
	
	<div id="of-popup-fail" class="of-save-popup">
		<div class="of-save-fail"><?php echo esc_html__('Error!' , 'xecuter')?></div>
	</div>
	
	<span style="display: none;" id="hooks"><?php echo json_encode(of_get_header_classes_array()); ?></span>
	<input type="hidden" id="reset" value="<?php if(isset($_REQUEST['reset'])) echo esc_attr($_REQUEST['reset']); ?>" />
	<input type="hidden" id="security" name="security" value="<?php echo wp_create_nonce('of_ajax_nonce'); ?>" />

	<form id="of_form" method="post" action="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ) ?>" enctype="multipart/form-data" >
	
		<div id="header">
		
			<div class="logo">
				<h2><?php echo THEMENAME; ?></h2>
				<span><?php echo ('v'. THEMEVERSION); ?></span>
			</div>
		
			<div id="js-warning"><?php echo esc_html__('Warning- This options panel will not work properly without javascript!' , 'xecuter')?></div>
			<div class="icon-option"></div>
			<div class="clear"></div>
		
    	</div>

		<div id="info_bar">
		
			<a>
				<div id="expand_options" class="expand"><?php echo esc_html__('Expand' , 'xecuter')?></div>
			</a>
						
			<img style="display:none" src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/loading-bottom.gif" class="ajax-loading-img ajax-loading-img-bottom" alt="Working..." />

			<button id="of_save" type="button" class="button-primary">
				<?php echo esc_html__('Save All Changes' , 'xecuter');?>
			</button>
			
		</div><!--.info_bar--> 	
		
		<div id="main">
		
			<div id="of-nav">
				<ul>
				  <?php echo balanceTags($options_machine->Menu)?>
				</ul>
			</div>

			<div id="content">
		  		<?php echo balanceTags($options_machine->Inputs) /* Settings */ ?>
		  	</div>
		  	
			<div class="clear"></div>
			
		</div>
		
		<div class="save_bar"> 
		
			<img style="display:none" src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/loading-bottom.gif" class="ajax-loading-img ajax-loading-img-bottom" alt="Working..." />
			<button id ="of_save" type="button" class="button-primary"><?php echo esc_html__('Save All Changes' , 'xecuter');?></button>			
			<button id ="of_reset" type="button" class="button submit-button reset-button" ><?php echo esc_html__('Options Reset' , 'xecuter');?></button>
			<img style="display:none" src="<?php echo get_template_directory_uri(); ?>/framework/assets/images/loading-bottom.gif" class="ajax-reset-loading-img ajax-loading-img-bottom" alt="Working..." />
			
		</div><!--.save_bar--> 
 
	</form>
	
	<div style="clear:both;"></div>

</div><!--wrap-->
<div class="smof_footer_info">Slightly Modified Options Framework <strong><?php echo SMOF_VERSION; ?></strong></div>