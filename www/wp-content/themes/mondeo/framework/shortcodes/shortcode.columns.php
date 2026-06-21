<?php 
/*******************************************************************************
 * ShortCode Columns*
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('one_half', 'shortcode_one_half');
add_shortcode('one_half_last', 'shortcode_one_half_last');
add_shortcode('one_third', 'shortcode_one_third');
add_shortcode('one_third_last', 'shortcode_one_third_last');
add_shortcode('one_fourth', 'shortcode_one_fourth');
add_shortcode('one_fourth_last', 'shortcode_one_fourth_last');
add_shortcode('two_third', 'shortcode_two_third');
add_shortcode('two_third_last', 'shortcode_two_third_last');
add_shortcode('three_fourth', 'shortcode_three_fourth');
add_shortcode('three_fourth_last', 'shortcode_three_fourth_last');
add_shortcode('float_left', 'shortcode_float_left');


/***************************************************************************
 * Add shortcode [one_half] Text [/one_half]
 * package HawkTheme
***************************************************************************/
function shortcode_float_left( $atts, $content = null) {
	
	extract(shortcode_atts(
        array(
        	'width' => '',
			'height' => '',
			'align' => 'center'
    ), $atts));	

	$content = ht_content_helper($content);
	
	$style = "text-align:" . $align . ";";
	
	if(strlen($width) > 0)
		$style .= " width:" . $width . "px;";

	if(strlen($height) > 0)
		$style .= " height:" . $height . "px;";
		
	if(strlen($style) > 0)
		$style = ' style="' . $style . '"';
	

	$output = '<div ' . $style . 'class="shortcode_float_left">' . do_shortcode($content) . '</div>';

	return $output;
}



/***************************************************************************
 * Add shortcode [one_half] Text [/one_half]
 * package HawkTheme
***************************************************************************/
function shortcode_one_half( $atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<div class="one-half">' . do_shortcode($content) . '</div>';

	return $output;
}



/***************************************************************************
 * Add shortcode [one_half_last] Text [/one_half_last]
 * package HawkTheme
***************************************************************************/
function shortcode_one_half_last( $atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<div class="one-half last">' . do_shortcode($content) . '</div>';
	$output .= '<div class="clear"></div>';

	return $output;
}



/***************************************************************************
 * Add shortcode [one_third] Text [/one_third]
 * package HawkTheme
***************************************************************************/
function shortcode_one_third( $atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<div class="one-third">' . do_shortcode($content) . '</div>';

	return $output;
}



/***************************************************************************
 * Add shortcode [one_third_last] Text [/one_third_last]
 * package HawkTheme
***************************************************************************/
function shortcode_one_third_last( $atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<div class="one-third last">' . do_shortcode($content) . '</div>';
	$output .= '<div class="clear"></div>';

	return $output;
}



/***************************************************************************
 * Add shortcode [one_fourth] Text [/one_fourth]
 * package HawkTheme
***************************************************************************/
function shortcode_one_fourth( $atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<div class="one-fourth">' . do_shortcode($content) . '</div>';

	return $output;
}



/***************************************************************************
 * Add shortcode [one_fourth_last] Text [/one_fourth_last]
 * package HawkTheme
***************************************************************************/
function shortcode_one_fourth_last( $atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<div class="one-fourth last">' . do_shortcode($content) . '</div>';
	$output .= '<div class="clear"></div>';

	return $output;
}



/***************************************************************************
 * Add shortcode [two_third] Text [/two_third]
 * package HawkTheme
***************************************************************************/
function shortcode_two_third( $atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<div class="two-third">' . do_shortcode($content) . '</div>';

	return $output;
}



/***************************************************************************
 * Add shortcode [two_third_last] Text [/two_third_last]
 * package HawkTheme
***************************************************************************/
function shortcode_two_third_last( $atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<div class="two-third last">' . do_shortcode($content) . '</div>';
	$output .= '<div class="clear"></div>';

	return $output;
}



/***************************************************************************
 * Add shortcode [three_fourth] Text [/three_fourth]
 * package HawkTheme
***************************************************************************/
function shortcode_three_fourth( $atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<div class="three-fourth">' . do_shortcode($content) . '</div>';

	return $output;
}



/***************************************************************************
 * Add shortcode [three_fourth_last] Text [/three_fourth_last]
 * package HawkTheme
***************************************************************************/
function shortcode_three_fourth_last( $atts, $content = null) {

	$content = ht_content_helper($content);

	$output = '<div class="three-fourth last">' . do_shortcode($content) . '</div>';
	$output .= '<div class="clear"></div>';

	return $output;
}

?>