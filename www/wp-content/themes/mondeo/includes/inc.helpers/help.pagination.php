<?php 
 /*******************************************************************************
 * The Pagination Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_pagenavi() {

	 if(function_exists('wp_pagenavi')) {
		 wp_pagenavi();
	 }else{
		 echo '	<div id="normal-navi" class="fixed"><span class="prev">';
		 previous_posts_link(__('Previous')); 
		 echo '</span><span class="next">';
		 next_posts_link(__('Next')); 
		 echo '</span></div>';
	}

}

?>