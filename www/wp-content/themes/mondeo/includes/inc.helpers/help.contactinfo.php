<?php 
 /*******************************************************************************
 * The Copyright Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

function ht_footer_contact_info() {

		global $shortname;

		$title1 = stripslashes(get_option($shortname.'_footer_contact_title1'));
		$title2 = stripslashes(get_option($shortname.'_footer_contact_title2'));
		$detail1 = stripslashes(get_option($shortname.'_footer_contact_detail1'));
		$detail2 = stripslashes(get_option($shortname.'_footer_contact_detail2'));

		echo '<div class="one-third">';	
			if($title1) { echo '<h3>'.$title1.'</h3>'; }
			if($detail1) { echo '<div class="info">'.$detail1.'</div>'; }
		echo '</div>';

		echo '<div class="one-third">';
			if($title2) { echo '<h3>'.$title2.'</h3>'; }
			if($detail2) { echo '<div class="info">'.$detail2.'</div>'; }
		echo '</div>';

}

?>