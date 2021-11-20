<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
global  $smof_data;

$xecuter_comments_layout_type = isset( $smof_data['xecuter_comments_layout_type']) ? $smof_data['xecuter_comments_layout_type'] : 'rd-list';

if ($xecuter_comments_layout_type =='rd-thread'){
	$xecuter_comments_type = 'rd-thread';
	
 } else {
	 	$xecuter_comments_type = 'rd-list';

 }
if ( post_password_required() )
	return;
	global $smof_data;
?>
	<div id="comments" class="comments-area <?php echo esc_attr($xecuter_comments_type) ?> <?php if ( have_comments() ) echo esc_attr('rd-have-comments');?>">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
	 	<span><?php comments_number(esc_html(xecuter_t('nocommentsyet')), xecuter_t('1').' '.xecuter_t('commentalready') , esc_html('% '.xecuter_t('commentsalready'))); ?></span>

		</h2>

		<ol class="comment-list <?php  echo esc_attr($xecuter_comments_layout_type)?>">
 			  <?php wp_list_comments( array( 'callback' => 'xecuter_custom_comments', 'short_ping'  => true ) ); ?>
		</ol><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="rd-comment-navi">
			<?php  paginate_comments_links(); ?> 
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php echo esc_html( xecuter_t('commentsclosed')); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

	</div>
