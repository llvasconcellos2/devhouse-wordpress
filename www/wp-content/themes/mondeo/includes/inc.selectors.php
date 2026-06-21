<?php 
/*******************************************************************************
 * The selectors for our theme. *
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_filter('body_class','body_background_class');
add_action('header_style', 'ht_header_style');


/*-------------------------------------------------------------
~~~~~~Add Body Classes for Layout~~~~~~
*This used to be done through an additional 
stylesheet call, but it seemed like.
*a lot of extra files for something so simple. 
Adds a body class to indicate sidebar position.
-------------------------------------------------------------*/
function body_background_class($classes) {
	
		global $shortname;
		$style_value = get_option($shortname.'_site_style');

		if($style_value == '') {
			$style = 'deepblue';
		}else{
			$style = $style_value;
		}

		$classes[] = $style;
		return $classes;

}




/*-------------------------------------------------------------
~~~~~~~~Register Box Selector~~~~~~~~~
-------------------------------------------------------------*/
function ht_header_style() {

		global $shortname;
		$type = get_option($shortname.'_header_type');

		if(($type == '') || ($type == 'Style One')) {

				echo 'class="header-style-one layout-width"';

		}elseif($type == 'Style Two'){

				echo 'class="header-style-two layout-width"';

		}

}


?>