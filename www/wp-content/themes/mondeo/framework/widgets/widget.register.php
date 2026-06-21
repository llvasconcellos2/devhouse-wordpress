<?php 
/*******************************************************************************
 *This file register custom widgets,
 * This widget area is used to store feature services section.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_action('widgets_init','Register_Custom_Widget_init');

function Register_Custom_Widget_init(){
	register_widget('Feature_Services_Widget');
	register_widget('Flickr_Widget');
	register_widget('Tweets_Widget');
	register_widget('Recent_Posts_Widget');
	register_widget('Random_Posts_Widget');
	register_widget('Mostview_Posts_Widget');
	register_widget('Ads_Widget');
	register_widget('Contact_Form_Widget');
	register_widget('Social_Media_Widget');
}

?>