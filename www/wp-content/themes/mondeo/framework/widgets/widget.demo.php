<?php
/*******************************************************************************
 *This file sets up the the custom widgets,
 * This widget area is used to store feature services section.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~~~Class Widget~~~~~~~~~~~~~
Name:Feature_Services
Slug: feature_service
-------------------------------------------------------------*/
class Feature_Services_Widget extends WP_Widget{

	/** Construction function**/
	function Feature_Services_Widget(){
		global $themename, $shortname;
		$title_ops = __($themename.'&raquo; Feature Services','hawktheme');
		$widget_ops = array('classname'=>'widget-feature-service','description'=>__('This widget will display a feature service section.','hawktheme'));
		$control_ops = array('width'=>450);
		$this->WP_Widget($shortname. '_feature_service',$title_ops,$widget_ops,$control_ops);
	}


	/** Function defined form**/
	function form($instance){
		$instance = wp_parse_args((array)$instance,array(
			
		));
	}


	/** Function defined update**/
	function update($new_instance,$old_instance){
		$instance = $old_instance;

		return $instance;
	}


	/** Definition of widget function that displays a web page**/
	function widget($args,$instance){
		extract($args);

	}

}

?>