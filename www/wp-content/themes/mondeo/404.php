<?php
 /*******************************************************************************
 * Template Is For: 404
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
	 get_header(); 
?>
<div id="container">
<div class="wrap layout-width fullwidth fixed">
<article id="content">
<div class="post-single-page page-404" id="post-<?php the_ID(); ?>">
<h1><?php _e('404','hawktheme'); ?></h1>
<h3><?php _e('Not Found','hawktheme'); ?></h3>
<p><?php _e('Sorry, but the page you are looking for does not exist. You can try to go to the Homepage and find your way.','hawktheme'); ?></p>
</div><!--end post single-->
</article>
</div><!--#end content wrap-->
</div><!--# container-->
<?php get_footer(); ?>