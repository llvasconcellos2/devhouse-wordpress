<?php
/*******************************************************************************
*  @FrameWork Plugin ColorPicker
*  @package HawkTheme
*  @since Mondeo 1.0
*******************************************************************************/
function hawktheme_colorpicker($id,$std){
	$stored  = get_option($id);
	if ( $stored != "") { $val = $stored; } else { $val = $std; }
	$output = '<div class="fixed">';
	$output .= '<div id="colorSelector_'. $id .'" class="colorSelector"><div></div></div>'."\n";
	$output .= '<input class="ht-color-input" name="'. $id .'" id="'. $id .'" type="text" value="'. $val .'" />'."\n";
	$output .= '</div>';

	$output .= '<script type="text/javascript">'."\n";
	$output .= '//<![CDATA['."\n";
	$output .= 'jQuery(document).ready(function(){'."\n";
	$output .= 'jQuery("#colorSelector_'. $id .'").children("div").css("backgroundColor", "'. $val .'");'."\n";    
	$output .= '    jQuery("#colorSelector_'. $id .'").ColorPicker({'."\n";
	$output .= '       color: "'. $val .'",'."\n";
	$output .= '       onShow: function (colpkr) {'."\n";
	$output .= '			  jQuery(colpkr).fadeIn(500);'."\n";
	$output .= '			  return false;'."\n";
	$output .= '		   },'."\n";
	$output .= '		   onHide: function (colpkr) {'."\n";
	$output .= '				jQuery(colpkr).fadeOut(500);'."\n";
	$output .= '				return false;'."\n";
	$output .= '			},'."\n";
	$output .= '			onChange: function (hsb, hex, rgb) {'."\n";
	$output .= '				jQuery("#colorSelector_'. $id .'").children("div").css("backgroundColor", "#" + hex);'."\n";
	$output .= '				jQuery("#colorSelector_'. $id .'").next("input").attr("value", "#"+ hex);'."\n";
	$output .= '			}'."\n";
	$output .= '		});'."\n";
	$output .= '	});'."\n";
	$output .= '//]]>'."\n";
	$output .= '</script>'."\n";

	return $output;
}

?>