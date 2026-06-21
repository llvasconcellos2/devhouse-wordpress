<?php
 /*******************************************************************************
 * The template for displaying Comments.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
?>

<?php if ( post_password_required() ) : ?>
<div id="comments">
	<div class="nopassword"><p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'hawktheme' ); ?></p></div>
</div><!-- #comments -->
<?php return; endif; ?>

<?php 
	if (function_exists('wp_list_comments')) {
		$trackbacks = $comments_by_type['pings'];
	// for WordPress 2.6.3 or lower
	} else {
		$trackbacks = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_approved = '1' AND (comment_type = 'pingback' OR comment_type = 'trackback') ORDER BY comment_date", $post->ID));
	}
?>

<?php if ( have_comments() ) : ?>
<div id="comments">
	<h3 id="comments-title"><?php echo (count($comments)-count($trackbacks) . " ");  _e('Comments', 'hawktheme');  ?></h3>
	<ol class="commentlist"><?php wp_list_comments( array('callback' => 'ht_custom_comment') ); ?></ol>
<?php 
	if (get_option('page_comments')) {
		$comment_pages = paginate_comments_links('echo=0');
			if ($comment_pages) {
			echo '<div  class="pagenavi">';
			echo $comment_pages;
			echo '</div>';
		}
	}
?>
<!--comments pages-->
</div><!-- #comments -->
<?php else : ?>

	<?php if ( ! comments_open() ) : ?>
			<div id="comments">
				<div class="warning radius-5"><p class="radius-5"><?php _e( 'Comments are closed.', 'hawktheme' ); ?></p></div>
			</div><!-- #comments -->
	<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php
	$fields =  array(
	  'author' => '<p class="comment-form-author"><label for="author"><input id="author"  name="author" type="text" value="Name" size="30" class="cleardefault" /></label></p>',
	  'email'  => '<p class="comment-form-email"><label for="email"><input id="email" name="email" type="text" value="Email" size="30" class="cleardefault" /></label></p>',
	  'url'    => '<p class="comment-form-url"><label for="url"><input id="url" name="url" type="text" value="Website" size="30" class="cleardefault"  /></label></p>'
	);
	
	$defaults = array(
	 'title_reply' => __( 'Leave a Reply' ),
	 'cancel_reply_link' => __( '&raquo; Cancel reply' ),
	 'comment_notes_before' => '',
	  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	  'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8"></textarea></p>',
	  'comment_notes_after' => ''
	);	
	comment_form($defaults); 
?>