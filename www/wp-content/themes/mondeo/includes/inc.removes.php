<?php
/*******************************************************************************
 * The Remove functions for our theme. *
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/


/*-----------------------------------------------------------------------
~~~~~~~~~Disable Standard Widgets~~~~~~~~~~~
------------------------------------------------------------------------*/
function remove_wp_widgets(){
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Search');
  unregister_widget('WP_Widget_Recent_Comments');
  unregister_widget('WP_Widget_Recent_Posts');
  unregister_widget('WP_Widget_RSS');
  //unregister_widget('WP_Widget_Tag_Cloud');
  unregister_widget('bcn_widget');
}

add_action('widgets_init', 'remove_wp_widgets');



/*----------------------------------------------------------------------------------
~~~~~~~~~Remove the default gallery style~~~~~~~~~~~~~
-----------------------------------------------------------------------------------*/
function remove_css_gallery() {
	return "\n" . '<div class="gallery">';
}
add_filter( 'gallery_style', 'remove_css_gallery', 9 );

?>