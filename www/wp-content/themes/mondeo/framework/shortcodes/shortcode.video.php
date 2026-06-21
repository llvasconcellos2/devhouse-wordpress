<?php 
/*******************************************************************************
 * ShortCode Html5  Video*
 * Add shortcode [html5_video]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('html5_video', 'shortcode_html5_video');

function shortcode_html5_video( $atts) {

	extract(shortcode_atts(
        array(
			'mp4' => '',
			'webm' => '',
			'ogg' => '',
			'poster' => '',
			'width' => 460,
			'height' => 260,
			'preload' => 'no',
			'autoplay' => 'no'
    ), $atts));	

	if($poster) {
		$image_fallback = '<img src="'.FrameWork_Url.'/plugins/timthumb.php?src='.$poster.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="Poster Image"
          title="No video playback capabilities." />';
	}else{
		$image_fallback = '';
	}

	if ($height && $width == '') $width = intval($height * 16 / 9);
	if ($height == '' && $width) $height = intval($width * 9 / 16);

	if ($preload == 'yes') {
		$preload_value = 'auto';
		$preload_player = 'true';
	}else{
		$preload_value = 'none';
		$preload_player = 'false';
	}

	if ($autoplay == 'yes') {
		$autoplay_value = 'autoplay';
		$autoplay_player = 'true';
	}else{	
		$autoplay_value = '';
		$autoplay_player = 'false';
	}

	$output = '<div class="video-wrap video-js-box">';
	$output .= '<video class="video-js" width="'.$width.'" height="'.$height.'" controls="controls" preload="'.$preload_value.'" poster="'.$poster.'">';

	if($mp4) {
		$output .= '<source src="'.$mp4.'" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' />';
	}

	if($webm) {
		$output .= ' <source src="'.$webm.'" type=\'video/webm; codecs="vp8, vorbis"\' />';
	}

	if($ogg) {
		$output .= ' <source src="'.$ogg.'" type=\'video/ogg; codecs="theora, vorbis"\' />';
	}

	$output .= '<object class="vjs-flash-fallback" width="'.$width.'" height="'.$height.'" type="application/x-shockwave-flash"
        data="'.Skins_Url.'/flash/flowplayer-3.2.1.swf">';
	$output .= '<param name="movie" value="'.Skins_Url.'/flash/flowplayer-3.2.1.swf" />';
	$output .= '<param name="allowfullscreen" value="true" />';
	$output .= '<param name="flashvars" value=\'config={"clip":{"url": "'.$mp4.'","autoPlay":'.$autoplay_player.',"autoBuffering":'.$preload_player.'}}\' />';
	$output .= $image_fallback;
	$output .= '</object>';
	$output .= '</video>';
	$output .= '</div>';

	$output .= '<script type="text/javascript">'."\n";
	$output .= 'VideoJS.setupAllWhenReady({'."\n";
	$output .= '	  controlsBelow: false,'."\n";
	$output .= '	  controlsHiding: false,'."\n";
	$output .= '	  defaultVolume: 0.85,'."\n";
	$output .= '	  flashVersion: 9,'."\n";
	$output .= '	  linksHiding: true'."\n";
    $output .= ' });'."\n";
	$output .= '</script>'."\n";

	return $output;

}



/*******************************************************************************
 * ShortCode Vimeo Video*
 * Add shortcode [vimeo_video]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('vimeo_video', 'shortcode_vimeo_video');

function shortcode_vimeo_video( $atts) {

	extract(shortcode_atts(
        array(
			'clip_id' 	=> '',
			'width' => 460,
			'height' => 260
    ), $atts));	

	if ($height && $width == '') $width = intval($height * 16 / 9);
	if ($height == '' && $width) $height = intval($width * 9 / 16);

	if (!empty($clip_id) && is_numeric($clip_id)){
		$output = '<div class="video-wrap"><iframe src="http://player.vimeo.com/video/'.$clip_id.'?title=0&amp;byline=0&amp;portrait=0" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe></div>';
	}

	return $output;

}



/*******************************************************************************
 * ShortCode Youtube Video*
 * Add shortcode [youtube_video]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('youtube_video', 'shortcode_youtube_video');

function shortcode_youtube_video( $atts) {

	extract(shortcode_atts(
        array(
			'clip_id' 	=> '',
			'width' => 460,
			'height' => 260
    ), $atts));	

	if ($height && $width == '') $width = intval($height * 16 / 9);
	if ($height == '' && $width) $height = intval($width * 9 / 16);

	if (!empty($clip_id)){
		$output = '<div class="video-wrap"><iframe src="http://www.youtube.com/embed/'.$clip_id.'" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe></div>';
	}

	return $output;

}




/*******************************************************************************
 * ShortCode Flash Video*
 * Add shortcode [flash_video]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('flash_video', 'shortcode_flash_video');

function shortcode_flash_video( $atts) {

	extract(shortcode_atts(
        array(
			'src' 	=> '',
			'width' => 460,
			'height' => 260,
			'play' => 'no'
    ), $atts));	

	if ($height && $width == '') $width = intval($height * 16 / 9);
	if ($height == '' && $width) $height = intval($width * 9 / 16);

	if($play == 'yes') {
		$play_value = 'true';
	}else{
		$play_value = 'false';
	}

	$output = '<div class="video-wrap video-js-box">';
	$output .= '<object width="'.$width.'" height="'.$height.'" type="application/x-shockwave-flash" data="'.$src.'">';
	$output .= '<param name="movie" value="'.$src.'" />';
	$output .= '<param name="allowFullScreen" value="true" />';
	$output .= '<param name="allowscriptaccess" value="always" />';
	$output .= '<param name="expressInstaller" value="'.Skins_Url.'/flash/expressInstall.swf"/>';
	$output .= '<param name="play" value="'.$play_value.'"/>';
	$output .= '<param name="wmode" value="opaque" />';
	$output .= '	<embed src="$src" type="application/x-shockwave-flash" wmode="opaque" allowscriptaccess="always" allowfullscreen="true" width="'.$width.'" height="'.$height.'" />';
	$output .= '</object>';
	$output .= '</div>';

	return $output;

}

?>