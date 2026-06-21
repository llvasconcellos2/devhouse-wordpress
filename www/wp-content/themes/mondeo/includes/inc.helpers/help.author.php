<?php 
 /*******************************************************************************
 * The Author Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_the_author($author_info, $author_type) {

	$posttype = is_singular($author_type);

	if ($author_info && $posttype) {

		if ( get_the_author_meta( 'description' ) ) {

			echo '<div class="author-info">'."\n";
			echo '<h3>'; _e('About the author','hawktheme'); echo '</h3>'."\n";
			echo '<dl class="fixed radius-5">'."\n";
			echo '<dt>'.get_avatar( get_the_author_meta('email'), 60 ).'</dt>'."\n";
			echo '<dd>'."\n";
			echo '<h5>'; the_author_posts_link(); echo '</h5>'."\n";
			echo '<p>'; the_author_meta('description'); echo '</p>'."\n";
			echo '</dd>'."\n";
			echo '</dl>'."\n";
			echo '</div>'."\n";

		}

	}

}

?>