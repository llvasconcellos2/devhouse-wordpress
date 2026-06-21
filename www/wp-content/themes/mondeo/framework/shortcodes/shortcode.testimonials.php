<?php 
/*******************************************************************************
 * ShortCode Testimonials*
 * Add shortcode [testimonials]  [/testimonials]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('testimonials', 'shortcode_testimonials');

function shortcode_testimonials( $atts, $content = null) {

	$content = ht_content_helper($content);

	extract(shortcode_atts(
        array(
		"name" => 'Name Here'   
    ), $atts));	

	$output = '<div class="testimonials radius-5">';
	$output .= '<p>'.do_shortcode($content).'</p>';
	$output .= '<h3>'.$name.'</h3>';
	$output .= '<div class="name-arrow"></div>';
	$output .= '</div>';
	
	return $output;
}

?>