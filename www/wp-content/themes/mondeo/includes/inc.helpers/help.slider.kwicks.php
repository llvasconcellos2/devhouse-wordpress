<?php 
 /*******************************************************************************
 * The Slider Kwicks Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_slider_kwicks($terms, $speed) {

	$slider_args = array( 
				'post_type' => 'slider-item',
				'slider' => $terms,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => 5
				); 
	$slider_query = new WP_Query( $slider_args );

	$slider_id = 'kwicks-slider';
	
	echo '<div class="kwicks-wrap layout-width">'."\n";

	if ($slider_query->have_posts()){

			echo '<ul id="'.$slider_id.'" class="kwicks">'."\n";

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

						echo '<li><img src="'; ht_get_thumbnail(380, 910); echo '" alt="'.get_the_title().'" title="'.get_the_title().'" />'."\n";
						echo '<div class="caption"><h4>'.get_the_title().'</h4></div>'."\n";
						echo '<div class="heading-text">'."\n";
						echo '<h3>'.get_the_title().'</h3>'."\n";
						echo '<p>';
						ht_content_limit(200);
						echo '</p>'."\n";
						echo '<h6><a href="'.$link.'" rel="bookmark">';
						_e('Read More','hawktheme');
						echo '</a></h6>'."\n";
						echo '</div>'."\n";
						echo '<div class="shadow"></div>'."\n";
						echo '</li>'."\n";

			}//end while

			wp_reset_query();

			echo '</ul>'."\n";

	}else{
	
		echo '<div class="warning radius-5"><p class="radius-5">';
		_e('You do not have any sliders to display.','hawktheme');
		echo '</p></div>'."\n";

	}//end if

	echo '<div class="kwicks-sliderbg"></div>'."\n";
	echo '</div>'."\n";

	echo '<script type="text/javascript">'."\n";
	echo '//<![CDATA['."\n";
	echo 'jQuery(document).ready(function($) {'."\n";
	echo '	jQuery("#'.$slider_id.'").kwicks({'."\n";
	echo '		  event: "mouseenter",'."\n";
	echo '		  max: 800,'."\n";
	echo '		  spacing: 0,'."\n";
	echo '		  duration: '.$speed.''."\n";
	echo '	});'."\n";
	echo '	jQuery(".heading-text").hide();'."\n";
	echo '	jQuery("#'.$slider_id.' li").mouseover(function() {'."\n";
	echo '		  jQuery("#'.$slider_id.' li.active .caption").stop().fadeTo("fase", 0);'."\n";
	echo '		  jQuery("#'.$slider_id.' li.active .heading-text").stop().fadeTo("slow", 0.8);'."\n";
	echo '		  jQuery("#'.$slider_id.' li.active .heading-text p").stop().fadeTo("slow", 0.8);'."\n";
	echo '		  if ($.browser.msie && $.browser.version.substr(0, 1) == 8) {'."\n";
	echo '			jQuery("#'.$slider_id.' li.active .caption").hide();'."\n";
	echo '			jQuery("#'.$slider_id.' li.active .heading-text h3").show();'."\n";
	echo '		  }'."\n";
	echo '	}).mouseout(function() {'."\n";
	echo '		  jQuery(".caption").stop().fadeTo("fast", 0.8);'."\n";
	echo '		  jQuery("#'.$slider_id.' li .heading-text").stop().fadeTo("slow", 0);'."\n";
	echo '		 jQuery("#'.$slider_id.' li .heading-text p").stop().fadeTo("slow", 0);'."\n";
	echo '		  if ($.browser.msie && $.browser.version.substr(0, 1) == 8) {'."\n";
	echo '			jQuery("#'.$slider_id.' li .heading-text h3").hide();'."\n";
	echo '		  }'."\n";
	echo '	});'."\n";
	echo '});'."\n";
	echo '//]]>'."\n";
	echo '</script>'."\n";

}	

?>