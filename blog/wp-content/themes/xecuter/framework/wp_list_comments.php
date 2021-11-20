<?php
/********************************************************************
Custom Commtents
*********************************************************************/ 
function xecuter_custom_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment ;
 switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
 	?>
	<li class="rd-pingback"><?php echo esc_html( xecuter_t('pingback')) ; ?> <?php comment_author_link(); ?><?php edit_comment_link( '('.xecuter_t('edit').')', '<span class="edit-link">', '</span>' ); ?>
	</li>
	<?php
	 	break;
		 default :
	?>
	<li id="comment-<?php comment_ID(); ?>">
		<div  <?php comment_class('comment-wrap'); ?> >
			<div class="comment-avatar"><div class="avater"><?php echo get_avatar( $comment, 70 ); ?></div></div>
			<div class="author-comment">
            			<div class="author-link">

				<?php printf(  '%s ', sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) );  
			 
				if (  $depth =='1'){}else {?>
 		 <div class="author-link-reply"><?php $pcom = get_comment($comment->comment_parent);?><a href="<?php echo get_comment_link($comment->comment_parent)?>">: @<?php echo esc_html($pcom->comment_author); ?></a></div><?php }?>
 
 	</div>
				<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php  	if(  $time_format == 'traditional'  ){	 
				 printf( '%1$s '.esc_html(xecuter_t('at')).' %2$s', get_comment_date(),  get_comment_time() ); 
				}else{
				 echo xecuter_number_replace(xecuter_elapsed_string( strtotime("{$comment->comment_date_gmt} GMT"))) ;
				}
				?></a><?php edit_comment_link(  '('.xecuter_t('edit').')', ' ' ); ?></div><!-- .comment-meta .commentmetadata -->
			</div>
			<div class="clear"></div>
			<div class="comment-content rd-post-content">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php echo esc_html( xecuter_t('xecuter_t_yourcomment')); ?></em>
					<br />
				<?php endif; ?>
					
				<?php comment_text(); ?>
			</div>
			<div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div><!-- .reply -->
		</div><!-- #comment-##  -->

	<?php
	 break;
	 endswitch;
}

function xecuter_custom_pings($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
	<li class="comment pingback">
		<p><?php echo esc_html( xecuter_t('xecuter_t_yourcomment')); ?><?php comment_author_link(); ?><?php edit_comment_link(   '('.xecuter_t('edit').')', ' ' ); ?></p>
<?php	
}
 function xecuter_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'xecuter_pingback_header' );

function xecuter_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '۰ ثانیه';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'سال',
                 30 * 24 * 60 * 60  =>  'ماه',
                      24 * 60 * 60  =>  'روز',
                           60 * 60  =>  'ساعت',
                                60  =>  'دقیقه',
                                 1  =>  'ثانیه'
                );
    $a_plural = array( 'سال'   => 'سال',
                       'ماه'  => 'ماه',
                       'روز'    => 'روز',
                       'ساعت'   => 'ساعت',
                       'دقیقه' => 'دقیقه',
                       'ثانیه' => 'ثانیه'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' قبل';
        }
    }
}
 
?>