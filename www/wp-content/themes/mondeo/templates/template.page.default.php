<?php
 /*******************************************************************************
 * Template Is For: Default Page
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
	 get_header(); 
?>
<div id="container">
<div class="wrap layout-width right-side">
<article id="content">
<?php if (have_posts()) : the_post(); ?>
<div class="post-single-page" id="post-<?php the_ID(); ?>">
<div style="width:604px">

</div>
<div class="post-text"><?php the_content(); ?></div>
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'hawktheme' ), 'after' => '</div>' ) ); ?><!--end link page-->
</div><!--end post single-->
<?php else : ?>
<div class="warning radius-5"><p class="radius-5"><?php _e('You do not have any content to display.','hawktheme'); ?></p></div>
<?php endif; ?>
</article>
<?php ht_sidebar_page(); ?>
<div class="clear"></div>
<div style="width:604px">

</div>
</div><!--#end content wrap-->
</div><!--# container-->
<?php get_footer(); ?>