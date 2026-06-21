<?php 
/*******************************************************************************
 * ShortCode Resized Image*
 * Add shortcode [resized_image]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('resized_image', 'shortcode_resized_image');

function shortcode_resized_image( $atts, $content = null) {

	extract(shortcode_atts(
        array(
            'width' => '',
			'height' => '',
			'image' => '',
			'align' => 'left',
			'alt' => '',
			'link' => '#',
			'lightbox' => 'yes',
			'rel' => ''
    ), $atts));	

	if($lightbox == 'yes') {
	
		if($rel != '') {
		
			$rel_value = 'tag['.$rel.']';
		
		}else{
		
			$rel_value = 'tag';
		
		}
		
	
	}else{
	
		$rel_value = 'bookmark';
	
	}


	$output = '<a href="'.$link.'" alt="'.$alt.'" title="'.$alt.'" rel="'.$rel_value.'">';

	if($width && $height) {

		$output .= '<img src="'.FrameWork_Url.'/plugins/timthumb.php?src='.$image.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" class="resized-image align'.$align.'" alt="'.$alt.'" title="'.$alt.'" />';

	}else{
	
		$output .= '<img src="'.$image.'" class="align'.$align.'" alt="'.$alt.'" title="'.$alt.'" />';

	}

	$output .= '</a>';

	return $output;

}



/*******************************************************************************
 * ShortCode Sized Image*
 * Add shortcode [sized_image]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('sized_image', 'shortcode_sized_image');

function shortcode_sized_image( $atts, $content = null) {

	extract(shortcode_atts(
        array(
			'size' => 'small', 
			'height' => '',
			'image' => '',
			'alt' => '',
			'link' => '#',
			'lightbox' => 'yes',
			'rel' => ''
    ), $atts));	

	//Size
	if($size == 'small') {

		$width_value = '190';
		if($height) { $height_value = $height; } else { $height_value = '120'; }

	}elseif($size == 'medium') {

		$width_value = '270';
		if($height) { $height_value = $height; } else { $height_value = '150'; }

	}elseif($size == 'large') {

		$width_value = '430';
		if($height) { $height_value = $height; } else { $height_value = '190'; }

	}

	//Lightbox
	if($lightbox == 'yes') {
	
		if($rel != '') {
		
			$rel_value = 'tag['.$rel.']';
		
		}else{
		
			$rel_value = 'tag';
		
		}
		
	
	}else{
	
		$rel_value = 'bookmark';
	
	}

	if($lightbox =='yes') {
		$class_fade = 'type-image';
	}else{
		$class_fade = 'type-more';
	}

	$output = '<div class="thumb-preloader thumb-fade thumb-move sized-image-wrap sized-image-'.$size.'">';
	$output .= '<figure class="'.$class_fade.'">';
	$output .= '<a href="'.$link.'" class="preloader" alt="'.$alt.'" title="'.$alt.'" rel="'.$rel_value.'">';
	$output .= '<img src="'.FrameWork_Url.'/plugins/timthumb.php?src='.$image.'&amp;h='.$height_value.'&amp;w='.$width_value.'&amp;zc=1" alt="'.$alt.'" />';
	$output .= '<div class="fade-hover hide"></div><div class="overlay"></div><div class="shadow"></div>';
	$output .= '</a>';
	$output .= '</figure>';
	$output .= '</div>';

	$output .= '<style type="text/css">';
	$output .= '.sized-image-'.$size.' figure .fade-hover, .sized-image-'.$size.' figure .overlay, .sized-image-'.$size.' figure a, .sized-image-'.$size.' a.preloader .image-loading { width: '.$width_value.'px; height: '.$height_value.'px; } ';
	$output .= '</style>';

	return $output;

}


?>