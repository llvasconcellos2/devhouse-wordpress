<?php 
 /*******************************************************************************
 * The Related Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_related_posts($related_display, $showposts, $width, $height, $related_class, $length) {

global $post, $shortname;

		if($related_display) {

		echo '<div class="related-posts">'."\n";

		echo '<h3>';  _e('Related Posts','hawktheme'); echo '</h3>'."\n";

		echo '<ul class="'.$related_class.' thumb-preloader thumb-fade thumb-move">'."\n";

			$exclude_id = $post->ID; 
			$posttags = get_the_tags(); 
			$i = 0;
			if ( $posttags ) { 
				$tags = ''; 
				foreach ( $posttags as $tag ) $tags .= $tag->name. ',';
				$args = array(
					'post_status' => 'publish',
					'tag_slug__in' => explode(',', $tags), 
					'post__not_in' => explode(',', $exclude_id),
					'ignore_sticky_posts' => 1, 
					'orderby' => 'comment_date', 
					'posts_per_page' => $showposts
				);
				query_posts($args); 

					while (have_posts()) {
									the_post();

					echo '<li>'."\n";

							echo '<figure class="type-image">'."\n";
							echo '<a href="'; ht_get_file_thumbnail(); echo '" class="preloader" rel="tag[RelatedPosts]" title="'; the_title_attribute(); echo '">';
							echo '<img src="'; ht_get_thumbnail($height, $width); echo '" alt="'.get_the_title().'" title="'.get_the_title().'" />';
							echo '<div class="fade-hover"></div>';
							echo '<div class="overlay"></div>';
							echo '<div class="shadow"></div>';
							echo '</a>';
							echo '</figure>'."\n";

							echo '<section>'."\n";
							echo '<h5><a href="'.get_permalink().'" rel="bookmark" title="'; the_title_attribute(); echo '">'; echo get_the_title(); echo '</a></h5>'."\n";
							echo '<p>';
							ht_content_limit($length);
							echo '</p>'."\n";
							echo '</section>'."\n";
					echo '</li>'."\n";

					$exclude_id .= ',' . $post->ID; $i ++;
					}
					wp_reset_query();
			}

			if ( $i < $showposts ) {
				$cats = ''; 
				foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
				$args = array(
					'category__in' => explode(',', $cats), 
					'post__not_in' => explode(',', $exclude_id),
					'ignore_sticky_posts' => 1,
					'orderby' => 'comment_date',
					'posts_per_page' => $showposts - $i
				);
			   query_posts($args);

			   while (have_posts()) {
									the_post();

					echo '<li>'."\n";

							echo '<figure class="type-image">'."\n";
							echo '<a href="'; ht_get_file_thumbnail(); echo '" class="preloader" rel="tag[RelatedPosts]" title="'; the_title_attribute(); echo '">';
							echo '<img src="'; ht_get_thumbnail($height, $width); echo '" alt="'.get_the_title().'" title="'.get_the_title().'" />';
							echo '<div class="fade-hover"></div>';
							echo '<div class="overlay"></div>';
							echo '<div class="shadow"></div>';
							echo '</a>';
							echo '</figure>'."\n";

							echo '<section>'."\n";
							echo '<h5><a href="'.get_permalink().'" rel="bookmark" title="'; the_title_attribute(); echo '">'; echo get_the_title(); echo '</a></h5>'."\n";
							echo '<p>';
							ht_content_limit($length);
							echo '</p>'."\n";
							echo '</section>'."\n";
					echo '</li>'."\n";

					$i ++;
					}
					wp_reset_query();
			}

			echo '<div class="clear"></div>';
			echo '</ul>'."\n";

			if ( $i  == 0 ) { 
				echo '<div class="warning radius-5"><p class="radius-5">'; 
				_e('You do not have any related posts to display yet.','hawktheme'); 
				echo '</p></div>';
			}

		echo '</div>'."\n";

		}

}

?>