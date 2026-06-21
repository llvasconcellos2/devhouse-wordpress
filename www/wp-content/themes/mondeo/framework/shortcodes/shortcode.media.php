<?php 
/*******************************************************************************
 * ShortCode Media*
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('stumble', 'shortcode_stumble');
add_shortcode('flickr', 'shortcode_flickr');
add_shortcode('designfloat', 'shortcode_designfloat');
add_shortcode('technorati', 'shortcode_technorati');
add_shortcode('linkedin', 'shortcode_linkedin');
add_shortcode('facebook', 'shortcode_facebook');
add_shortcode('rss', 'shortcode_rss');
add_shortcode('google', 'shortcode_google');
add_shortcode('twitter', 'shortcode_twitter');
add_shortcode('digg', 'shortcode_digg');
add_shortcode('delicious', 'shortcode_delicious');
add_shortcode('myspace', 'shortcode_myspace');
add_shortcode('picasa', 'shortcode_picasa');
add_shortcode('yahoo', 'shortcode_yahoo');



/*******************************************************************************
 * ShortCode Stumble*
 * Add shortcode [stumble]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_stumble( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-stumble">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="stumble">stumble</a>';
	$output .= '</div>';

	return $output;

}


/*******************************************************************************
 * ShortCode Flickr*
 * Add shortcode [flickr]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_flickr( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-flickr">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="flickr">flickr</a>';
	$output .= '</div>';

	return $output;

}




/*******************************************************************************
 * ShortCode Designfloat*
 * Add shortcode [designfloat]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_designfloat( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-designfloat">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="designfloat">designfloat</a>';
	$output .= '</div>';

	return $output;

}


/*******************************************************************************
 * ShortCode Technorati*
 * Add shortcode [technorati]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_technorati( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-technorati">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="technorati">technorati</a>';
	$output .= '</div>';

	return $output;

}



/*******************************************************************************
 * ShortCode Linkedin*
 * Add shortcode [linkedin]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_linkedin( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-linkedin">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="linkedin">linkedin</a>';
	$output .= '</div>';

	return $output;

}


/*******************************************************************************
 * ShortCode facebook*
 * Add shortcode [facebook]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_facebook( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-facebook">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="facebook">facebook</a>';
	$output .= '</div>';

	return $output;

}


/*******************************************************************************
 * ShortCode rss*
 * Add shortcode [rss]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_rss( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-rss">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="rss">rss</a>';
	$output .= '</div>';

	return $output;

}



/*******************************************************************************
 * ShortCode google*
 * Add shortcode [google]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_google( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-google">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="google">google</a>';
	$output .= '</div>';

	return $output;

}


/*******************************************************************************
 * ShortCode twitter*
 * Add shortcode [twitter]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_twitter( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-twitter">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="twitter">twitter</a>';
	$output .= '</div>';

	return $output;

}


/*******************************************************************************
 * ShortCode digg*
 * Add shortcode [digg]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_digg( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-digg">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="digg">digg</a>';
	$output .= '</div>';

	return $output;

}


/*******************************************************************************
 * ShortCode delicious*
 * Add shortcode [delicious]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_delicious( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-delicious">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="delicious">delicious</a>';
	$output .= '</div>';

	return $output;

}


/*******************************************************************************
 * ShortCode myspace*
 * Add shortcode [myspace]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_myspace( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-myspace">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="myspace">myspace</a>';
	$output .= '</div>';

	return $output;

}


/*******************************************************************************
 * ShortCode picasa*
 * Add shortcode [picasa]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_picasa( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-picasa">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external" title="picasa">picasa</a>';
	$output .= '</div>';

	return $output;

}


/*******************************************************************************
 * ShortCode yahoo*
 * Add shortcode [yahoo]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function shortcode_yahoo( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => '#',
			'size' => 'small',
			'style' => 'round'
    ), $atts));	

	$output = '<div class="social-wrap social-yahoo">';
	$output .= '<a href="'.$link.'" class="social-'.$size.' social-'.$style.'-'.$size.'" rel="external"  title="yahoo">yahoo</a>';
	$output .= '</div>';

	return $output;

}

?>