<?php 
 /*******************************************************************************
 * The Social Media Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~Top Social Media~~~~~~~~~~~
-------------------------------------------------------------*/
function ht_top_social_media() {

		global $shortname;
		$myspace = get_option($shortname.'_topmedia_myspace');
		$stumble = get_option($shortname.'_topmedia_stumble');
		$linkedin = get_option($shortname.'_topmedia_linkedin');
		$delicious = get_option($shortname.'_topmedia_delicious');
		$rss = get_option($shortname.'_topmedia_rss');
		$digg = get_option($shortname.'_topmedia_digg');
		$facebook = get_option($shortname.'_topmedia_facebook');
		$flickr = get_option($shortname.'_topmedia_flickr');
		$twitter = get_option($shortname.'_topmedia_twitter');
		$gtalk = get_option($shortname.'_topmedia_gtalk');

		echo '<div id="topmedia">'."\n";
		echo '<ul>'."\n";

		if($myspace) { 

			echo '<li class="myspace"><a href="'.$myspace.'" rel="external">';
			_e('myspace','hawktheme');
			echo '</a><p class="tooltip">';
			_e('MySpace','hawktheme');
			echo '</p></li>'."\n"; 

		}
		
		if($stumble) { 

			echo '<li class="stumble"><a href="'.$stumble.'" rel="external">';
			_e('stumble','hawktheme');
			echo '</a><p class="tooltip">';
			_e('Stumble','hawktheme');
			echo '</p></li>'."\n"; 

		}
		
		if($linkedin) { 

			echo '<li class="linkedin"><a href="'.$linkedin.'" rel="external">';
			_e('linkedin','hawktheme');
			echo '</a><p class="tooltip">';
			_e('Linkedin','hawktheme');
			echo '</p></li>'."\n";  

		}
		
		if($delicious) { 

			echo '<li class="delicious"><a href="'.$delicious.'" rel="external">';
			_e('delicious','hawktheme');
			echo '</a><p class="tooltip">';
			_e('Delicious','hawktheme');
			echo '</p></li>'."\n";  

		}

		if($rss) { 

			echo '<li class="rss"><a href="'.$rss.'" rel="external">';
			_e('rss','hawktheme');
			echo '</a><p class="tooltip">';
			_e('FeedRSS','hawktheme');
			echo '</p></li>'."\n";

		}
		
		if($digg) { 

			echo '<li class="digg"><a href="'.$digg.'" rel="external">';
			_e('digg','hawktheme');
			echo '</a><p class="tooltip">';
			_e('Digg','hawktheme');
			echo '</p></li>'."\n";

		}
		
		if($facebook) { 

			echo '<li class="facebook"><a href="'.$facebook.'" rel="external">';
			_e('facebook','hawktheme');
			echo '</a><p class="tooltip">';
			_e('FaceBook','hawktheme');
			echo '</p></li>'."\n"; 

		}

		if($flickr) { 

			echo '<li class="flickr"><a href="'.$flickr.'" rel="external">';
			_e('flickr','hawktheme');
			echo '</a><p class="tooltip">';
			_e('Flickr','hawktheme');
			echo '</p></li>'."\n"; 

		}
		
		if($twitter) { 

			echo '<li class="twitter"><a href="'.$twitter.'" rel="external">';
			_e('twitter','hawktheme');
			echo '</a><p class="tooltip">';
			_e('Twitter','hawktheme');
			echo '</p></li>'."\n";

		}
		
		if($gtalk) { 

			echo '<li class="gtalk"><a href="'.$gtalk.'" rel="external">';
			_e('gtalk','hawktheme');
			echo '</a><p class="tooltip">';
			_e('Gtalk','hawktheme');
			echo '</p></li>'."\n";

		}
		
		echo '</ul>'."\n";
		echo '</div>'."\n";

}

?>