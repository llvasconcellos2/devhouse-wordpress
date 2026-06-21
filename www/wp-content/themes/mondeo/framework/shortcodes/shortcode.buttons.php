<?php 
/*******************************************************************************
 * ShortCode Button*
 * Add shortcode [button] Button Text [/button]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('button', 'shortcode_button');

function shortcode_button( $atts, $content = null) {

	$content = ht_content_helper($content);

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'medium',
			'color' => 'grey',
			'target' => 'self'
    ), $atts));	

	if($target == 'self') {

		$target_type = 'bookmark';

	}elseif($target == 'blank') {

		$target_type = 'external';

	}

	$output = '<div class="button-wrap">';
	$output .= '<a href="'.$link.'" class="button-'.$size.' button-'.$color.' button-'.$size.'-'.$color.'" rel="'.$target_type.'">'.do_shortcode($content).'</a>';
	$output .= '</div>';

	return $output;

}

?>