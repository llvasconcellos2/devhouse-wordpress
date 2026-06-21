<?php 
/*******************************************************************************
 * ShortCode Icon List*
 * Add shortcode [icon_list] Button Text [/icon_list]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('icon_list', 'shortcode_icon_list');

function shortcode_icon_list( $atts, $content = null) {

	$content = ht_content_helper($content);

	extract(shortcode_atts(
        array(
     		'icon' => 'tick'
    ), $atts));	

	$output = '<div class="icon-list icon-'.$icon.'">';
	$output .= do_shortcode($content);
	$output .= '</div>';

	return $output;

}

?>