<?php 
 /*******************************************************************************
 * The Slider Nivo Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_slider_nivo($terms, $effect, $speed, $delay, $showposts) {

	$slider_args = array( 
				'post_type' => 'slider-item',
				'slider' => $terms,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => $showposts
				); 
	$slider_query = new WP_Query( $slider_args );

	if(is_home()) {
		$slider_id = 'slider';
	}else{
		$slider_id = 'slider-'.ht_rand(10);
	}// add rand id for slider

	echo '<div class="nivoslider layout-width">'."\n";

	if ($slider_query->have_posts()){

			echo '<figure id="'.$slider_id.'">'."\n";

			while ($slider_query->have_posts()) {
						$slider_query->the_post();


						echo '<img src="'; ht_get_thumbnail(380, 910); echo '" alt="'.get_the_title().'" title="#htmlcaption-'.get_the_ID().'" />';

			}//end while

			wp_reset_query();

			echo '</figure>'."\n";

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

						echo '<section id="htmlcaption-'.get_the_ID().'" class="nivo-html-caption">'."\n";
						echo '<h3><a href="'.$link.'" rel="bookmark" title="';
						the_title_attribute();
						echo '">';
						echo get_the_title();
						echo '</a></h3>'."\n";
						echo '<p class="text">';
						ht_content_limit(200);
						echo '</p>'."\n";
						echo '<h6><a href="'.$link.'" rel="bookmark">';
						_e('Read More','hawktheme');
						echo '</a></h6>'."\n";
						echo '</section>'."\n";

			}//end while

			wp_reset_query();

	}else{
	
		echo '<div class="warning radius-5"><p class="radius-5">';
		_e('You do not have any sliders to display.','hawktheme');
		echo '</p></div>'."\n";

	}//end if

	echo '<div class="nivo-sliderbg"></div>'."\n";
	echo '</div>'."\n";

	echo '<script type="text/javascript">'."\n";
	echo '//<![CDATA['."\n";
	echo 'jQuery(window).load(function() {'."\n";
	echo '		jQuery("#'.$slider_id.'").nivoSlider({'."\n";
	echo '			effect: "'.$effect.'",'."\n";
	echo '	        slices:15,'."\n"; // For slice animations
    echo '          boxCols: 8,'."\n"; // For box animations
    echo '          boxRows: 4,'."\n"; // For box animations
    echo '          animSpeed:'.$speed.','."\n"; // Slide transition speed
    echo '          pauseTime:'.$delay.','."\n"; // How long each slide will show
    echo '          startSlide:0,'."\n"; // Set starting Slide (0 index)
    echo '          directionNav:true,'."\n"; // Next & Prev navigation
    echo '          directionNavHide:false,'."\n"; // Only show on hover
    echo '          controlNav:true,'."\n"; // 1,2,3... navigation
    echo '          controlNavThumbs:false,'."\n"; // Use thumbnails for Control Nav
    echo '          controlNavThumbsFromRel:false,'."\n"; // Use image rel for thumbs
    echo '          controlNavThumbsSearch: ".jpg",'."\n"; // Replace this with...
    echo '          controlNavThumbsReplace: "_thumb.jpg",'."\n"; // ...this in thumb Image src
    echo '          keyboardNav:true,'."\n"; // Use left & right arrows
    echo '          pauseOnHover:true,'."\n"; // Stop animation while hovering
    echo '          manualAdvance:false,'."\n"; // Force manual transitions
    echo '          captionOpacity:1,'."\n"; // Universal caption opacity
    echo '          prevText: "Prev",'."\n"; // Prev directionNav text
    echo '          nextText: "Next",'."\n"; // Next directionNav text
	echo '			afterLoad: function(){'."\n";
	echo '			jQuery(".nivo-caption").animate({right:"50px"}, {easing:"easeOutBack", duration: '.$speed.'})'."\n";
	echo '			},'."\n";
	echo '			beforeChange: function(){'."\n";
	echo '			jQuery(".nivo-caption").animate({right:"-400px"}, {easing:"easeInBack", duration: '.$speed.'})'."\n";
	echo '			},'."\n";
	echo '			afterChange: function(){'."\n";
	echo '			jQuery(".nivo-caption").animate({right:"50px"}, {easing:"easeOutBack", duration: '.$speed.'})'."\n";
	echo '			}'."\n";
	echo '		});'."\n";
	echo '	});'."\n";
	echo '//]]>'."\n";
	echo '</script>'."\n";

}	

?>