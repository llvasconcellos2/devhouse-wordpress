<?php
 /*******************************************************************************
 * The Footer Widget Area Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_footer_widget_area() {
	global $shortname;

	$layout = get_option($shortname.'_footer_widgets_layout_lists');

	if($layout == 'two column') {

		$class = 'two-column';

	}elseif($layout == 'three column') {
	
		$class = 'three-column';

	}elseif($layout == 'four column') {
	
		$class = 'four-column';

	}else{

		$class = 'three-column';

	}//end class


	echo '<div class="footer-widgets">'."\n";
	echo '<div class="footer-widgets-area layout-width fixed '.$class.'">'."\n";

		if($layout == 'four column') {

				echo '<div class="one-fourth">'."\n";
				if ( !dynamic_sidebar('footer-widget-area-1') );
				echo '</div>'."\n";

				echo '<div class="one-fourth">'."\n";
				if ( !dynamic_sidebar('footer-widget-area-2') );
				echo '</div>'."\n";

				echo '<div class="one-fourth">'."\n";
				if ( !dynamic_sidebar('footer-widget-area-3') );
				echo '</div>'."\n";

				echo '<div class="one-fourth last">'."\n";
				if ( !dynamic_sidebar('footer-widget-area-4') );
				echo '</div>'."\n";

		}elseif($layout == 'two column') {
		
				echo '<div class="one-half">'."\n";
				if ( !dynamic_sidebar('footer-widget-area-1') );
				echo '</div>'."\n";

				echo '<div class="one-half last">'."\n";
				if ( !dynamic_sidebar('footer-widget-area-2') );
				echo '</div>'."\n";				
		
		}else{
		
				echo '<div class="one-third">'."\n";
				if ( !dynamic_sidebar('footer-widget-area-1') );
				echo '</div>'."\n";

				echo '<div class="one-third">'."\n";
				if ( !dynamic_sidebar('footer-widget-area-2') );
				echo '</div>'."\n";

				echo '<div class="one-third last">'."\n";
				if ( !dynamic_sidebar('footer-widget-area-3') );
				echo '</div>'."\n";	
		
		}

	echo '</div>'."\n";
	echo '</div>'."\n";

}

?>