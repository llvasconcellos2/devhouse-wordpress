<?php 
 /*******************************************************************************
 * The Slider Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_home_sliders() {
		global $shortname;

		$display = get_option($shortname.'_slide_display');
		$type = get_option($shortname.'_slide_type');
		$terms_value = get_option($shortname.'_slide_terms');
		$multiple_terms = get_option($shortname.'_slide_multiple_terms');
		if($multiple_terms != '') {
			$terms = $multiple_terms;
		}else{
			$terms = $terms_value;
		}
		$showposts = get_option($shortname.'_slide_showposts');
		$effect_nivo = get_option($shortname.'_slide_nivo_effect');
		$speed_nivo = get_option($shortname.'_slide_nivo_speed');
		$delay_nivo = get_option($shortname.'_slide_nivo_delay');
		$speed_kwicks = get_option($shortname.'_slide_kwicks_speed');
		$effect_roundabout = get_option($shortname.'_slide_roundabout_effect');
		$speed_roundabout = get_option($shortname.'_slide_roundabout_speed');
		$delay_roundabout = get_option($shortname.'_slide_roundabout_delay');

		if($display == 'true') {

		echo '<div id="slider-wrap">'."\n";
		
		if($type == 'Nivo Slider')	{

			$effect = $effect_nivo; 
			$speed = $speed_nivo; 
			$delay = $delay_nivo;
			ht_slider_nivo($terms, $effect, $speed, $delay, $showposts);

		}elseif($type == 'Kwicks Slider') {

			$speed = $speed_kwicks; 
			ht_slider_kwicks($terms, $speed);

		}elseif($type == 'Piecemaker Slider') {
		
			ht_slider_piecemaker();

		}elseif($type == 'Roundabout Slider') {
		
			$effect = $effect_roundabout; 
			$speed = $speed_roundabout; 
			$delay = $delay_roundabout;
			ht_slider_roundabout($terms, $speed, $delay, $effect);

		}

		echo '</div>'."\n";
		
		}

}

?>