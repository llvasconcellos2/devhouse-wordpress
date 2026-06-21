<?php 
/*******************************************************************************
 * ShortCode Pricing Table*
 * Add shortcode [pricing_table]  [/pricing_table]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('pricing_table', 'shortcode_pricing_table');

function shortcode_pricing_table( $atts, $content = null) {

	extract(shortcode_atts(
        array(
			'columns' => '3'
    ), $atts));	

	$content = ht_content_helper($content);

    $output = '<div class="pricing-table-wrap pricing-table-col-'.$columns.'">';
    $output .= do_shortcode($content);
	$output .= '<div class="clear"></div>';
    $output .= '</div><!--end pricing table-->';

	return $output;

}



/*******************************************************************************
 * ShortCode Pricing Column*
 * Add shortcode [pricing_column]  [/pricing_column]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('pricing_column', 'shortcode_pricing_column');

function shortcode_pricing_column( $atts, $content = null) {

	extract(shortcode_atts(
        array(
			'title' => 'Table Title',
			'price' => '$19.95',
			'time' => '1 month',
			'text' => 'Button Text',
            'link' => '#',
			'target' => 'self',
			'last' => 'no'
    ), $atts));	

	$content = ht_content_helper($content);

	if($target == 'self') {

		$target_type = 'button';

	}elseif($target == 'blank') {

		$target_type = 'external';

	}

	if($last == 'yes') {
		$class = 'pricing-column radius-5 last';
	}else{
		$class = 'pricing-column radius-5';
	}

	$output = '<div class="'.$class.'">';
	$output .= '<div class="pricing-column-title"><h2>'.$title.'</h2></div>';
	$output .= '<div class="pricing-column-cost"><h1>'.$price.'</h1>'.$time.'</div>';
	$output .= do_shortcode($content);
	$output .= '<div class="pricing-column-button">';
	$output .= '<a href="'.$link.'" rel="'.$target_type.'">'.$text.'</a>';
	$output .= '</div>';
	$output .= '</div><!--end pricing column-->';

	return $output;

}


?>