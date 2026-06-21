<?php 
/*******************************************************************************
 * The excerpt functions for our theme. *
 *The content limit for description*
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_content_limit($max_char, $more_link_text = '', $stripteaser = 0, $more_file = '') {
		$content = get_the_content($more_link_text, $stripteaser, $more_file);
		$content = preg_replace('/\[.+\]/','', $content);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		$content = strip_tags($content);
		if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
			$content = substr($content, 0, $espacio);
			$content = $content;
			echo $content;
			echo "...";
		}
		else {
			echo $content;
		}
}

?>