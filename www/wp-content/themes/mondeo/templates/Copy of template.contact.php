<?php
 /*******************************************************************************
 * Template Is For: Contact
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
	 get_header(); 
?>
<div id="container">
<div class="wrap layout-width right-side">
<article id="content">
<?php if (have_posts()) : the_post(); ?>
<div class="post-single-page page-contact" id="post-<?php the_ID(); ?>">

<div class="post-text"><?php the_content(); ?></div>
<?php 
	global $shortname;
	$email = get_option($shortname.'_email');
	ht_contact_form($email, 'contact-page'); 
?>

</div><!--end post single-->
<?php else : ?>
<div class="warning radius-5"><p class="radius-5"><?php _e('You do not have any content to display.','hawktheme'); ?></p></div>
<?php endif; ?>
</article>
<?php ht_sidebar_contact(); ?>
<div class="clear"></div>
</div><!--#end content wrap-->
</div><!--# container-->
<?php get_footer(); ?>