<?php 
 /*******************************************************************************
 * The Slider RoundAbout Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_slider_roundabout($terms, $speed, $delay, $effect) {

	$slider_args = array( 
				'post_type' => 'slider-item',
				'slider' => $terms,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => 3
				); 
	$slider_query = new WP_Query( $slider_args );

	echo '<div class="roundaboutslider layout-width">'."\n";

	if ($slider_query->have_posts()){

		echo '<ul id="roundabout">'."\n";

			while ($slider_query->have_posts()) {
						$slider_query->the_post();

						global $post, $key;
						$data = get_post_meta( $post->ID, $key, true );
						$slider_custom_link = isset( $data['slider_custom_link'] ) ? $data['slider_custom_link']: ''; 

						if($slider_custom_link != '') {
							$link = $slider_custom_link;
						}else{
							$link = get_permalink();
						}

						echo '<li>'."\n";
						echo '<img src="'; ht_get_thumbnail(440, 260); echo '" alt="'.get_the_title().'" />'."\n";
						echo '<div class="caption">'."\n";
						echo '<h4><a href="'.$link.'" rel="bookmark" title="';
						the_title_attribute();
						echo '">';
						echo get_the_title();
						echo '</a></h4>'."\n";
						echo '<p>';
						ht_content_limit(60);
						echo '</p>'."\n";
						echo '</div>'."\n";
						echo '<div class="description"></div>'."\n";
						echo '<div class="round-shadow"></div>'."\n";
						echo '</li>'."\n";

			}//end while

			wp_reset_query();

		echo '</ul>'."\n";

	}else{

		echo '<div class="warning radius-5"><p class="radius-5">';
		_e('You do not have any sliders to display.','hawktheme');
		echo '</p></div>'."\n";

	}

	echo '</div>'."\n";

	echo '<script type="text/javascript">'."\n";
	echo '//<![CDATA['."\n";
	echo 'jQuery(document).ready(function($) {'."\n";
	echo '	var interval;'."\n";
	echo '	jQuery("ul#roundabout").roundabout({'."\n";
	echo '		minOpacity: 1,'."\n";
	echo '		minScale: 1,'."\n";
	echo '     minZ: 10,'."\n";
	echo '     easing: "'.$effect.'",'."\n";
	echo '	    duration: '.$speed.''."\n";
	echo '	}).hover(function() {'."\n";
	echo '		clearInterval(interval);'."\n";
	echo '	},'."\n";
	echo '	function() {'."\n";
	echo '		interval = startAutoPlay();'."\n";
	echo '	});'."\n";
	echo '	interval = startAutoPlay();'."\n";
	echo '});'."\n";
	echo 'function startAutoPlay() {'."\n";
	echo '	return setInterval(function() {'."\n";
	echo '		jQuery("ul#roundabout").roundabout_animateToNextChild();'."\n";
	echo '	},'."\n";
	echo '	'.$delay.');'."\n";
	echo '}'."\n";
	echo 'jQuery("ul#roundabout li").focus(function() {'."\n";
	echo '	jQuery(".description").fadeIn(800);'."\n";
	echo '}).blur(function() {'."\n";
	echo '	jQuery(".description").fadeOut(500);'."\n";
	echo '});'."\n";
	echo '//]]>'."\n";
	echo '</script>'."\n";

}

?>