<?php 
	require_once( '../../../wp-load.php' );
	header("Content-type: text/xml");
	echo '<?xml version="1.0" encoding="utf-8" ?>';

	$terms_value = get_option($shortname.'_slide_terms');
	$multiple_terms = get_option($shortname.'_slide_multiple_terms');
	if($multiple_terms != '') {
		$terms = $multiple_terms;
	}else{
		$terms = $terms_value;
	}
	$showposts = get_option($shortname.'_slide_showposts');
	$effect = get_option($shortname.'_slide_piecemaker_effect');
	$delay = get_option($shortname.'_slide_piecemaker_delay');

	$slider_args = array( 
				'post_type' => 'slider-item',
				'slider' => $terms,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => $showposts
				); 
	$slider_query = new WP_Query( $slider_args );

	echo '<Piecemaker>';
	echo '<Settings FieldOfView="45" Autoplay="'.$delay.'" InfoThickness="0" InfoSharpness="0" InfoMargin="15" InfoBackgroundAlpha="0.95" InfoBackground="0xFFFFFF" InfoWidth="300" TooltipTextThickness="-100" TooltipTextSharpness="50" TooltipMarginRight="7" TooltipMarginLeft="5" TooltipTextColor="0xFFFFFF" TooltipTextStyle="P-Italic" TooltipTextY="5" TooltipColor="0x666666" TooltipHeight="30" ControlsAlign="center" ControlsY="280 " ControlsX="450" ControlAlphaOver="0.95" ControlAlpha="0.8" ControlColor2="0xFFFFFF" ControlColor1="0xFF00000" ControlDistance="20" ControlSize="100" MenuColor3="0xFFFFFF" MenuColor2="0x808080" MenuColor1="0xEEEEEE" MenuDistanceY="50" MenuDistanceX="20" DropShadowBlurY="4" DropShadowBlurX="40" DropShadowScale="0.9" DropShadowDistance="25" DropShadowAlpha="0.7" SideShadowAlpha="0.8" InnerSideColor="0x222222" LoaderColor="0x333333" ImageHeight="380" ImageWidth="930"/>';
	echo '<Contents>';

	while ($slider_query->have_posts()) {
				$slider_query->the_post();

				global $post, $key;
						$data = get_post_meta( $post->ID, $key, true );
						$slider_custom_link = isset( $data['slider_custom_link'] ) ? $data['slider_custom_link']: ''; 

						if($slider_custom_link != '') {
							$link = $slider_custom_link;
						}else{
							$link = get_permalink();
						}

				echo '<Image Source="'; ht_get_thumbnail(380, 930); echo '" Title="'; the_title_attribute(); echo '">';
				echo '<Text>';
				echo '&lt;h1&gt;'.get_the_title().'&lt;/h1&gt;';
				echo '&lt;p&gt;'; ht_content_limit(480); echo '&lt;/p&gt;';
				echo '</Text>';
				echo '<Hyperlink URL="'.$link.'" />';
				echo '</Image>';

	}//end while

	wp_reset_query();

	echo '</Contents>';
	echo '<Transitions>';

	while ($slider_query->have_posts()) {
				$slider_query->the_post();

				echo '<Transition CubeDistance="10" DepthOffset="200" Delay="0.05" Transition="'.$effect.'" Time="1" Pieces="9"/>';				

	}//end while

	wp_reset_query();

	echo '</Transitions>';
	echo '</Piecemaker>';

?>