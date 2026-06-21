<?php
 /*******************************************************************************
 * The Index for our theme.
 * Displays all of the <container> section and everything up till <div id="footer">
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
	get_header(); 
	global $shortname;
	$shortcode_content = get_option($shortname.'_shortcode_content');
	$content = ht_content_helper(stripslashes($shortcode_content));
?>
<?php 
	ht_home_sliders();
	ht_home_feature_services();
	ht_home_slogan();
?>
<?php 
	if($content) {
		 echo '<div id="container">';
		 echo '<div id="home-shortcode-wrap">';
		 echo '<div class="post-text layout-width fixed">'. do_shortcode($content) .'</div>';
		 echo '</div>';
		 echo '</div><!--# container-->';
	}
?>
<?php get_footer(); ?>