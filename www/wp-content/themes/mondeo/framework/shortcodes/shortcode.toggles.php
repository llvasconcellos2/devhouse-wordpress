<?php 
/*******************************************************************************
 * ShortCode Toggle*
 * Add shortcode [toggle]  [/toggle]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('toggle', 'shortcode_toggle');

function shortcode_toggle( $atts, $content = null) {

	$content = ht_content_helper($content);

	extract(shortcode_atts(
        array(
		"title" => 'Title goes here'   
    ), $atts));	

	$output = '<div class="toggle radius-5">';
	$output .= '<h3>'.$title.'</h3>';
	$output .= '<div class="inner">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}

?>