<?php 
/*******************************************************************************
 * ShortCode Slider*
 * Add shortcode [slider]  [/slider]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('slider', 'shortcode_slider');

function shortcode_slider( $atts, $content = null) {

	$content = ht_content_helper($content);

	extract(shortcode_atts(
        array(
		"width" => '',
		"height" => '',
		"effect" => 'random',
		"speed" => '500',
		"delay" => '3000',
		"image_one" => '',
		"image_two" => '',
		"image_three" => '',
		"image_four" => '',
		"image_five" => ''
    ), $atts));	

	if($width == '') { $width = 910; }
	if($height == '') { $height = 350; }

	$height_10 = $height - '10';
	$width_10 = $width - '10';
	$control_position = ($width - '100') / 2;
	$direction_position = ($height - '50') / 2;

	$slider_id = 'slider-'.ht_rand(10);

	$output = '<div class="shortcode-slider-wrap" id="shortcode-wrap-'.$slider_id.'">';

	$output .= '<div class="shortcode-slider" id="shortcode-'.$slider_id.'">';

	if($image_one) {
		$output .= '<img src="'.FrameWork_Url.'/plugins/timthumb.php?src='.wp_get_attachment_url($image_one).'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="" title="" />';
	}

	if($image_two) {
		$output .= '<img src="'.FrameWork_Url.'/plugins/timthumb.php?src='.wp_get_attachment_url($image_two).'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="" title="" />';
	}

	if($image_three) {
		$output .= '<img src="'.FrameWork_Url.'/plugins/timthumb.php?src='.wp_get_attachment_url($image_three).'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="" title="" />';
	}

	if($image_four) {
		$output .= '<img src="'.FrameWork_Url.'/plugins/timthumb.php?src='.wp_get_attachment_url($image_four).'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="" title="" />';
	}

	if($image_five) {
		$output .= '<img src="'.FrameWork_Url.'/plugins/timthumb.php?src='.wp_get_attachment_url($image_five).'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="" title="" />';
	}

	$output .= '</div>'."\n";

	$output .= '<div class="overlay"></div>'."\n";
	$output .= '<div class="overlay-right"></div>'."\n";
	$output .= '<div class="overlay-bottom"></div>'."\n";
	$output .= '<div class="overlay-bottom-right"></div>'."\n";

	$output .= '<div class="shadow"></div>'."\n";

	$output .= '</div>'."\n";

	$output .= '<style type="text/css">'."\n";
	$output .= '#shortcode-wrap-'.$slider_id.' .overlay { height: '.$height_10.'px; width: '.$width_10.'px;}'."\n";
	$output .= '#shortcode-wrap-'.$slider_id.' .overlay-right { height: '.$height_10.'px;  }'."\n";
	$output .= '#shortcode-wrap-'.$slider_id.' .overlay-bottom { width: '.$width.'px;}'."\n";
	$output .= '#shortcode-wrap-'.$slider_id.', #shortcode-wrap-'.$slider_id.' .shortcode-slider { width: '.$width.'px; height: '.$height.'px;}'."\n";
	$output .= '#shortcode-wrap-'.$slider_id.' .nivo-controlNav { left: '.$control_position.'px;}'."\n";
	$output .= '#shortcode-wrap-'.$slider_id.' .nivo-directionNav a { top: '.$direction_position.'px;}'."\n";
	$output .= '</style>'."\n";


	$output .= '<script type="text/javascript">'."\n";
	$output .= '//<![CDATA['."\n";
	$output .= 'jQuery(window).load(function() {'."\n";
	$output .= '		jQuery("#shortcode-'.$slider_id.'").nivoSlider({'."\n";
	$output .= '			 effect: "'.$effect.'",'."\n";
	$output .= '	         slices:15,'."\n"; // For slice animations
    $output .= '          boxCols: 8,'."\n"; // For box animations
    $output .= '          boxRows: 4,'."\n"; // For box animations
    $output .= '          animSpeed:'.$speed.','."\n"; // Slide transition speed
    $output .= '          pauseTime:'.$delay.','."\n"; // How long each slide will show
    $output .= '          startSlide:0,'."\n"; // Set starting Slide (0 index)
    $output .= '          directionNav:true,'."\n"; // Next & Prev navigation
    $output .= '          directionNavHide:false,'."\n"; // Only show on hover
    $output .= '          controlNav:true,'."\n"; // 1,2,3... navigation
    $output .= '          controlNavThumbs:false,'."\n"; // Use thumbnails for Control Nav
    $output .= '          controlNavThumbsFromRel:false,'."\n"; // Use image rel for thumbs
    $output .= '          controlNavThumbsSearch: ".jpg",'."\n"; // Replace this with...
    $output .= '          controlNavThumbsReplace: "_thumb.jpg",'."\n"; // ...this in thumb Image src
    $output .= '          keyboardNav:true,'."\n"; // Use left & right arrows
    $output .= '          pauseOnHover:true,'."\n"; // Stop animation while hovering
    $output .= '          manualAdvance:false,'."\n"; // Force manual transitions
    $output .= '          captionOpacity:1,'."\n"; // Universal caption opacity
    $output .= '          prevText: "Prev",'."\n"; // Prev directionNav text
    $output .= '          nextText: "Next",'."\n"; // Next directionNav text
	$output .= '          beforeChange: function(){},'."\n"; 
	$output .= '          afterChange: function(){},'."\n"; 
	$output .= '          slideshowEnd: function(){},'."\n";  //Triggers after all slides have been shown
	$output .= '          lastSlide: function(){},'."\n";  //Triggers when last slide is shown
	$output .= '          afterLoad: function(){}'."\n";  //Triggers when slider has loaded
	$output .= '		});'."\n";
	$output .= '	});'."\n";
	$output .= '//]]>'."\n";
	$output .= '</script>'."\n";
	
	return $output;
}

?>