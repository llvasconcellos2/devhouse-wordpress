<?php 
/*******************************************************************************
 * ShortCode Message Box*
 * Add shortcode [message_box] Message box Text [/message_box]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('message_box', 'shortcode_message_box');

function shortcode_message_box( $atts, $content = null) {

	$content = ht_content_helper($content);

	extract(shortcode_atts(
        array(
			'type' => 'note',
     		'icon' => 'yes',
			'close' => 'yes'
    ), $atts));	

	if($icon == 'yes') {
		$class_value = 'icon radius-5';
	}else{
		$class_value = 'radius-5';
	}

	$output = '<div class="message-box radius-5 message-box-'.$type.'"><p class="'.$class_value.'">';
	$output .= do_shortcode($content);
	$output .= '</p>';
	if($close =='yes') {
		$output .= '<span class="closebox">Hide</span>';
	}
	$output .= '</div>';

	return $output;

}

?>