<?php 
/*******************************************************************************
 * ShortCode Tabs*
 * Add shortcode [tabs]  [/tabs]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('tabs', 'shortcode_tabs');

function shortcode_tabs( $atts, $content = null) {

	$content = ht_content_helper($content);

	extract(shortcode_atts(
        array(
		"tabtype" => 'top tabs'   
    ), $atts));	

	if($tabtype == 'top tabs') {

		$class = 'top-tabs';

	}elseif($tabtype == 'left tabs'){
	
		$class = 'left-tabs';

	}

	$output = '<div class="tabs-wrap '.$class.'">';
	$output .= do_shortcode($content);

	if($tabtype == 'left tabs') {
		$output .= '<div class="clear"></div>';
	}

	$output .= '</div>';

	return $output;
}




/*******************************************************************************
 * ShortCode Tabcontainer*
 * Add shortcode [tabcontainer]  [/tabcontainer]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('tabcontainer', 'shortcode_tabcontainer');

function shortcode_tabcontainer($atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<ul class="tabs fixed">';
	$output .= do_shortcode($content);
	$output .= '</ul>';

	return $output;
}


/*******************************************************************************
 * ShortCode Tabtext*
 * Add shortcode [tabtext]  [/tabtext]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('tabtext', 'shortcode_tabtext');

function shortcode_tabtext($atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<li><a href="#">';
	$output .= do_shortcode($content);
	$output .= '</a></li>';

	return $output;
}


/*******************************************************************************
 * ShortCode Tabcontent*
 * Add shortcode [tabcontent]  [/tabcontent]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('tabcontent', 'shortcode_tabcontent');

function shortcode_tabcontent($atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<div class="panes">';
	$output .= do_shortcode($content);
	$output .= '</div>';

	return $output;
}



/*******************************************************************************
 * ShortCode Tab*
 * Add shortcode [tab]  [/tab]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('tab', 'shortcode_tab');

function shortcode_tab($atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<div class="pane">';
	$output .= do_shortcode($content);
	$output .= '</div>';

	return $output;
}

?>