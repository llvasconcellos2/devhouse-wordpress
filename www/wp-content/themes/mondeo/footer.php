<footer>
<div id="footer-wrap">
	<?php ht_footer_widget_area(); ?>
	<div class="footer-copyright layout-width fixed">
	<?php ht_footer_contact_info(); ?>
	<div class="one-third last">
	<?php
		global $shortname;
		$footer_social_media = get_option($shortname.'_footer_social_media');
		$footer_content = ht_content_helper(stripslashes($footer_social_media));
		$copyright = stripslashes(get_option($shortname.'_copyright'));
		if($footer_social_media) {  echo '<div class="footer-social-media">'. do_shortcode($footer_content) .'</div><div class="clear"></div>'; } 
		if($copyright) {  echo '<p class="text info">'. do_shortcode($copyright) .'</p>'; } 
	?>
	</div>
	</div><!--#copyright-->
</div><!--#footer wrap-->
</footer><!--#footer-->
</div><!-- #wrap -->
<?php wp_footer(); ?>
</body>
</html>