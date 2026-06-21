<?php 
/*******************************************************************************
 * ShortCode Html*
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('clear', 'shortcode_clear');
add_shortcode('hr', 'shortcode_hr');
add_shortcode('br_5', 'shortcode_br_5');
add_shortcode('br_10', 'shortcode_br_10');
add_shortcode('br_20', 'shortcode_br_20');
add_shortcode('br_30', 'shortcode_br_30');
add_shortcode('br_40', 'shortcode_br_40');
add_shortcode('br_50', 'shortcode_br_50');
add_shortcode('dropcap', 'shortcode_dropcap');
add_shortcode('quote', 'shortcode_quote');
add_shortcode('gotop', 'shortcode_gotop');
add_shortcode('frame', 'shortcode_frame');
add_shortcode('frame_left', 'shortcode_frame_left');
add_shortcode('frame_right', 'shortcode_frame_right');
add_shortcode('tooltip', 'shortcode_tooltip');
add_shortcode('highlight_yellow', 'shortcode_highlight_yellow');
add_shortcode('highlight_green', 'shortcode_highlight_green');
add_shortcode('highlight_blue', 'shortcode_highlight_blue');
add_shortcode('highlight_red', 'shortcode_highlight_red');
add_shortcode('highlight_grey', 'shortcode_highlight_grey');


/***************************************************************************
 * Add shortcode [clear]
 * package HawkTheme
***************************************************************************/
function shortcode_clear($atts, $content = null) {

	$output = '<div class="clear"></div>';

	return $output;
}



/***************************************************************************
 * Add shortcode [hr]
 * package HawkTheme
***************************************************************************/
function shortcode_hr($atts, $content = null) {

    $output = '<div class="hr"></div>';

    return $output;
}



/***************************************************************************
 * Add shortcode [br_5]
 * package HawkTheme
***************************************************************************/
function shortcode_br_5($atts, $content = null) {

    $output = '<div class="br-5"></div>';

    return $output;
}




/***************************************************************************
 * Add shortcode [br_10]
 * package HawkTheme
***************************************************************************/
function shortcode_br_10($atts, $content = null) {

    $output = '<div class="br-10"></div>';

    return $output;
}



/***************************************************************************
 * Add shortcode [br_20]
 * package HawkTheme
***************************************************************************/
function shortcode_br_20($atts, $content = null) {

    $output = '<div class="br-20"></div>';

    return $output;
}



/***************************************************************************
 * Add shortcode [br_30]
 * package HawkTheme
***************************************************************************/
function shortcode_br_30($atts, $content = null) {

    $output = '<div class="br-30"></div>';

    return $output;
}



/***************************************************************************
 * Add shortcode [br_40]
 * package HawkTheme
***************************************************************************/
function shortcode_br_40($atts, $content = null) {

    $output = '<div class="br-40"></div>';

    return $output;
}




/***************************************************************************
 * Add shortcode [br_50]
 * package HawkTheme
***************************************************************************/
function shortcode_br_50($atts, $content = null) {

    $output = '<div class="br-50"></div>';

    return $output;
}




/***************************************************************************
 * Add shortcode  [dropcap] Text [/dropcap]
 * package HawkTheme
***************************************************************************/
function shortcode_dropcap( $atts, $content = null ) {

	$content = ht_content_helper($content);

	$output = '<span class="dropcap radius-5">' . do_shortcode($content) . '</span>';

	return $output;
}



/***************************************************************************
 * Add shortcode [quote] Text [/quote]
 * package HawkTheme
***************************************************************************/
function shortcode_quote( $atts, $content = null ) {

	$content = ht_content_helper($content);

	$output = '<div class="quote"><span>' . do_shortcode($content) . '</span></div>';

	return $output;
}



/***************************************************************************
 * Add shortcode  [gotop]
 * package HawkTheme
***************************************************************************/
function shortcode_gotop( $atts, $content = null ) {

	$output = '<div class="divider"><a href="#">TOP</a></div>';

	return $output;
}



/***************************************************************************
 * Add shortcode  [frame] Text [/frame]
 * package HawkTheme
***************************************************************************/
function shortcode_frame($atts, $content = null) {

	$content = ht_content_helper($content);

    $output = '<div class="frame">';
    $output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
}




/***************************************************************************
 * Add shortcode [frame_left] Text [/frame_left]
 * package HawkTheme
***************************************************************************/
function shortcode_frame_left($atts, $content = null) {

	$content = ht_content_helper($content);

    $output = '<div class="frame alignleft">';
    $output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
}



/***************************************************************************
 * Add shortcode [frame_right] Text [/frame_right]
 * package HawkTheme
***************************************************************************/
function shortcode_frame_right($atts, $content = null) {

	$content = ht_content_helper($content);

    $output = '<div class="frame alignright">';
    $output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
}


/***************************************************************************
 * Add shortcode [tooltip] Text [/tooltip]
 * package HawkTheme
***************************************************************************/
function shortcode_tooltip($atts, $content = null) {

	$content = ht_content_helper($content);

	extract(shortcode_atts(
        array(
            'text' => 'Add a Tooltip Text'
    ), $atts));

    $output = '<span class="tooltip">';
    $output .= do_shortcode($content);
	$output .= '<div class="tooltip-box radius-5">'.$text.'<div class="tooltip-arrow"></div></div>';
    $output .= '</span>';

    return $output;
}


/***************************************************************************
 * Add shortcode  [highlight_yellow] Text [/highlight_yellow]
 * package HawkTheme
***************************************************************************/
function shortcode_highlight_yellow( $atts, $content = null ) {

	$content = ht_content_helper($content);

	$output = '<span class="highlight highlight-yellow">' . do_shortcode($content) . '</span>';

	return $output;
}



/***************************************************************************
 * Add shortcode  [highlight_green] Text [/highlight_green]
 * package HawkTheme
***************************************************************************/
function shortcode_highlight_green( $atts, $content = null ) {

	$content = ht_content_helper($content);

	$output = '<span class="highlight highlight-green">' . do_shortcode($content) . '</span>';

	return $output;
}


/***************************************************************************
 * Add shortcode  [highlight_blue] Text [/highlight_blue]
 * package HawkTheme
***************************************************************************/
function shortcode_highlight_blue( $atts, $content = null ) {

	$content = ht_content_helper($content);

	$output = '<span class="highlight highlight-blue">' . do_shortcode($content) . '</span>';

	return $output;
}


/***************************************************************************
 * Add shortcode  [highlight_red] Text [/highlight_red]
 * package HawkTheme
***************************************************************************/
function shortcode_highlight_red( $atts, $content = null ) {

	$content = ht_content_helper($content);

	$output = '<span class="highlight highlight-red">' . do_shortcode($content) . '</span>';

	return $output;
}


/***************************************************************************
 * Add shortcode  [highlight_grey] Text [/highlight_grey]
 * package HawkTheme
***************************************************************************/
function shortcode_highlight_grey( $atts, $content = null ) {

	$content = ht_content_helper($content);

	$output = '<span class="highlight highlight-grey">' . do_shortcode($content) . '</span>';

	return $output;
}

?>