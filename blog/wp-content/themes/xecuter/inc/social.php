<?php
/********************************************************************
Social Icon
*********************************************************************/
function xecuter_social($none= false){
 	global $smof_data;
 	$social_align = is_rtl() ? 'left':'right';
  	$xecuter_social_align = !empty( $smof_data[ 'xecuter_social_align' ] ) ? $smof_data[ 'xecuter_social_align' ]:   $social_align;
	
	
	?>
    
    <div class="rd-social rd-social-<?php echo esc_attr($xecuter_social_align);?> <?php if(empty($none)) echo 'rd-social-fa';?>">
    	<ul>
        <?php if(!empty( $smof_data['xecuter_social_rss'])){ ?>
            <li><a class="fa-rss" href="<?php echo esc_url($smof_data['xecuter_social_rss']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/rss.jpg" alt="rss" width="64" height="64"/><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_facebook'])){ ?>
            <li><a class="fa-facebook" href="<?php echo esc_url($smof_data['xecuter_social_facebook']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/facebook.jpg" alt="facebook" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
    
        <?php if(!empty( $smof_data['xecuter_social_twitter'])){ ?>
            <li><a class="fa-twitter" href="<?php echo esc_url($smof_data['xecuter_social_twitter']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/twitter.jpg" alt="twitter" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
        
         <?php if(!empty( $smof_data['xecuter_social_googleplus'])){ ?>
            <li><a  class="fa-google-plus" href="<?php echo esc_url($smof_data['xecuter_social_googleplus']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/googleplus.jpg" alt="googleplus" width="64" height="64" /><?php }?></a></li>
         <?php } ?>
         
         <?php if(!empty( $smof_data['xecuter_social_telegram'])){ ?>
            <li><a class="fa-telegram" href="<?php echo esc_url($smof_data['xecuter_social_telegram']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/telegram.jpg" alt="telegram" width="64" height="64" /><?php }?></a></li>
         <?php } ?>
  
        
        <?php if(!empty( $smof_data['xecuter_social_dribbble'])){ ?>
            <li><a class="fa-dribbble" href="<?php echo esc_url($smof_data['xecuter_social_dribbble']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/dribbble.jpg" alt="dribbble" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_linkedIn'])){ ?>
            <li><a class="fa-linkedin" href="<?php echo esc_url($smof_data['xecuter_social_linkedIn']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/linkedin.jpg"  alt="linkedin" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_dropbox'])){ ?>
            <li><a class="fa-dropbox" href="<?php echo esc_url($smof_data['xecuter_social_dropbox']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/dropbox.jpg"  alt="dropbox" width="64" height="64"  /><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_flickr'])){ ?>
            <li><a class="fa-flickr"  href="<?php echo esc_url($smof_data['xecuter_social_flickr']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/flickr.jpg"  alt="flickr" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_deviantart'])){ ?>
            <li><a class="fa-deviantart" href="<?php echo esc_url($smof_data['xecuter_social_deviantart']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/deviantart.jpg"  alt="deviantart" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_youTube'])){ ?>
            <li><a  class="fa-youtube" href="<?php echo esc_url($smof_data['xecuter_social_youTube']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/youtube.jpg"  alt="youtube" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
         
        <?php if(!empty( $smof_data['xecuter_social_vimeo'])){ ?>
            <li><a class="fa-vimeo" href="<?php echo esc_url($smof_data['xecuter_social_vimeo']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/vimeo.jpg"  alt="vimeo" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_yahoo'])){ ?>
            <li><a  class="fa-yahoo" href="<?php echo esc_url($smof_data['xecuter_social_yahoo']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/yahoo.jpg"  alt="yahoo" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_skype'])){ ?>
            <li><a  class="fa-skype"  href="<?php echo esc_url($smof_data['xecuter_social_skype']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/skype.jpg"  alt="skype" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
      
        <?php if(!empty( $smof_data['xecuter_social_digg'])){ ?>
            <li><a class="fa-digg"  href="<?php echo esc_url($smof_data['xecuter_social_digg']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/digg.jpg"  alt="digg" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_stumbleupon'])){ ?>
            <li class="fa-stumbleupon"><a href="<?php echo esc_url($smof_data['xecuter_social_stumbleupon']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/stumbleupon.jpg"  alt="stumbleupon" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_tumblr'])){ ?>
            <li><a i class="fa-tumblr" href="<?php echo esc_url($smof_data['xecuter_social_tumblr']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/tumblr.jpg"  alt="tumblr" width="64" height="64" /><?php }?></a></li>
        <?php } ?>

        
        <?php if(!empty( $smof_data['xecuter_social_pinterest'])){ ?>
            <li><a class="fa-pinterest" href="<?php echo esc_url($smof_data['xecuter_social_pinterest']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/pinterest.jpg" alt="pinterest" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_instagram'])){ ?>
            <li><a  class="fa-instagram" href="<?php echo esc_url($smof_data['xecuter_social_instagram']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/instagram.jpg" alt="instagram" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_paypal'])){ ?>
            <li><a class="fa-paypal" href="<?php echo esc_url($smof_data['xecuter_social_paypal']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/paypal.jpg" alt="paypal" width="64" height="64" /><?php }?></a></li>
        <?php } ?>
        
        <?php if(!empty( $smof_data['xecuter_social_behance'])){ ?>
            <li><a  class="fa-behance" href="<?php echo esc_url($smof_data['xecuter_social_behance']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/behance.jpg" alt="behance" width="64" height="64"/><?php }?></a></li>
        <?php } ?>
    
        
		<?php if(!empty( $smof_data['xecuter_social_aparat'])){ ?>
            <li><a class="si si-aparat" href="<?php echo esc_url($smof_data['xecuter_social_aparat']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/aparat.jpg" alt="aparat" width="64" height="64"/><?php }?></a></li>
        <?php } ?>
        
        
		<?php if(!empty( $smof_data['xecuter_social_bisphone'])){ ?>
            <li><a class="si si-bisphone" href="<?php echo esc_url($smof_data['xecuter_social_bisphone']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/bisphone.jpg" alt="bisphone" width="64" height="64"/><?php }?></a></li>
        <?php } ?>
        
		<?php if(!empty( $smof_data['xecuter_social_bale'])){ ?>
            <li><a class="si si-bale" href="<?php echo esc_url($smof_data['xecuter_social_bale']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/bale.jpg" alt="bale" width="64" height="64"/><?php }?></a></li>
        <?php } ?>
        
        
		<?php if(!empty( $smof_data['xecuter_social_wispi'])){ ?>
            <li><a class="si si-wispi" href="<?php echo esc_url($smof_data['xecuter_social_wispi']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/wispi.jpg" alt="wispi" width="64" height="64"/><?php }?></a></li>
        <?php } ?>
         
        
		<?php if(!empty( $smof_data['xecuter_social_igap'])){ ?>
            <li><a class="si si-igap" href="<?php echo esc_url($smof_data['xecuter_social_igap']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/igap.jpg" alt="wispi" width="64" height="64"/><?php }?></a></li>
        <?php } ?>
        
		<?php if(!empty( $smof_data['xecuter_social_soroush'])){ ?>
            <li><a class="si si-soroush" href="<?php echo esc_url($smof_data['xecuter_social_soroush']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/soroush.jpg" alt="soroush" width="64" height="64"/><?php }?></a></li>
        <?php } ?>
         
<?php if(!empty( $smof_data['xecuter_social_eitaa'])){ ?>
            <li><a class="si si-eitaa" href="<?php echo esc_url($smof_data['xecuter_social_eitaa']);  ?>"><?php if(!empty($none)){?><img src="<?php echo get_template_directory_uri()?>/images/social/eitaa.jpg" alt="wispi" width="64" height="64"/><?php }?></a></li>
        <?php } ?>
        
        
        </ul>
     </div>
    <?php 
}?>