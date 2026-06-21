<?php 
 /*******************************************************************************
 * The Slogan Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_home_slogan() {
		global $shortname;

		$display = get_option($shortname.'_slogan_display');
		$title = get_option($shortname.'_slogan_title');
		$text = stripslashes(get_option($shortname.'_slogan_text'));
		$button = get_option($shortname.'_slogan_botton_text');
		$link = get_option($shortname.'_slogan_botton_link');

		if($button) {
			$style = 'slogan slogan-button layout-width';
		}else{
			$style = 'slogan layout-width';
		}

		if($display == 'true') {
		
		echo '<div class="slogan-wrap">'."\n";

		echo '<div class="'.$style.'">'."\n";

		if($title) { echo '<h2>'.$title.'</h2>'; }
		if($text) { echo '<p>'.$text.'</p>'; }

		if($button) {
		
			if($link) {			
				echo '<h3 class="button-wrap"><a href="'.$link.'" class="border-shadow-radius-20">'.$button.'</a></h3>';
			}else{		
				echo '<h3 class="button-wrap"><span class="border-shadow-radius-20">'.$button.'</span></h3>';
			}
		
		}

		echo '<div class="slogan-shadow"></div>'."\n";
		echo '</div>'."\n";

		echo '</div>'."\n";
		
		}

}

?>