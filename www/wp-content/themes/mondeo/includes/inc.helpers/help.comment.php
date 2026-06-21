<?php 
 /*******************************************************************************
 * The Comment Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_custom_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<dl id="comment-<?php comment_ID(); ?>" class="fixed radius-5">
		<dt class="comment-auther">
			<?php echo get_avatar( $comment, 60 ); ?>
			<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</dt>
		<dd class="comment-content">
			<div class="comment-meta fixed">
			<span><cite class="fn"><?php echo get_comment_author_link();  ?></cite><?php printf( __( '%1$s at %2$s', 'hawktheme' ), get_comment_date(),  get_comment_time() ); ?></span>
			<small><?php edit_comment_link( __( 'Edit', 'hawktheme' ), ' ' ); ?></small>
			</div>
			<div class="comment-body">
			<?php if ( $comment->comment_approved == '0' ) : ?>
			<div class="noapproved"><p><?php _e( 'Your comment is awaiting moderation.', 'hawktheme' ); ?></p></div>
			<?php endif; ?>
			<?php comment_text(); ?>
			</div>
		</dd>
		</dl><!-- #comment  -->
<?php
}

?>