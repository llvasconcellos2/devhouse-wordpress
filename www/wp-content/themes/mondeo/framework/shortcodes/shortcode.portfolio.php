<?php 
/*******************************************************************************
 * ShortCode Portfolio*
 * Add shortcode [portfolio]
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_shortcode('portfolio', 'shortcode_portfolio');

function shortcode_portfolio( $atts, $content = null) {

	extract(shortcode_atts(
        array(
			'category' => '',
			'columns' => '3',
			'showposts' => '',
			'orderby' => 'date',
			'title' => 'yes',
			'excerpt' => 'yes',
			'excerpt_length' => ''
    ), $atts));	

	$output = ht_shortcode_portfolio_loop($category, $columns, $showposts, $orderby, $title, $excerpt, $excerpt_length);

	return $output;

}



/*******************************************************************************
 * ShortCode Portfolio Loop*
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_shortcode_portfolio_loop($category, $columns, $showposts, $orderby, $title, $excerpt, $excerpt_length) {

	if($columns == '2') {
		$class = 'two-column';
		$width = 430;
		$height = 190;
		$hgroup = 'h3';
	}elseif($columns == '3') {
		$class = 'three-column';
		$width = 270;
		$height = 150;
		$hgroup = 'h3';
	}elseif($columns == '4') {
		$class = 'four-column';
		$width = 190;
		$height = 120;
		$hgroup = 'h4';
	}

	$portfolio_args = array( 
				'post_type' => 'portfolio-item',
				'portfolio' => $category,
				'posts_per_page' => $showposts,
				'orderby' => $orderby
				); 
	$portfolio_query = new WP_Query( $portfolio_args );

	if ($portfolio_query->have_posts()){

		$output = '<div class="portfolio-lists post-lists shortcode-portfolio-lists">'."\n";
		$output .= '<ul class="thumb-preloader thumb-fade thumb-move '.$class.'">'."\n";

		while ($portfolio_query->have_posts()) {
					$portfolio_query->the_post();

		$output .= '<li>';

			//POST Format
			global $post, $key;
			$data = get_post_meta( $post->ID, $key, true );
			$posts_format = isset( $data['posts_format'] ) ? $data['posts_format']: ''; 
			$video_link = isset( $data['video_link'] ) ? $data['video_link']: ''; 

			if($posts_format == 'Image') {

				$output .= '<figure class="type-image">'."\n";
				$output .= '<a href="'; 
				ob_start(); ht_get_file_thumbnail(); $output .= ob_get_clean();
				$output .= '" class="preloader" rel="tag[Image]" title="'.get_the_title().'">';

			}elseif($posts_format == 'Video') {
				
				$output .= '<figure class="type-video">'."\n";
				$output .= '<a href="'.$video_link.'?width=640&amp;height=280" class="preloader" rel="tag[iframe]" title="'.get_the_title().'">';

			}else{
				
				$output .= '<figure class="type-more">'."\n";
				$output .= '<a href="'.get_permalink().'" class="preloader" rel="bookmark" title="'.get_the_title().'">';

			}

			$output .= '<img src="'; 
			ob_start(); ht_get_thumbnail($height, $width); $output .= ob_get_clean();
			$output .= '" alt="'.get_the_title().'" title="'.get_the_title().'">';
			$output .= '<div class="fade-hover hide"></div><div class="overlay"></div><div class="shadow"></div>';
			$output .= '</a>'."\n";
			$output .= '</figure>'."\n";

			if($title == 'yes') {
				$output .= '<'.$hgroup.'>'; 
				$output .= '<a href="'.get_permalink().'" rel="bookmark"  title="'.get_the_title().'">'; $output .= get_the_title(); $output .= '</a>';
				$output .= '</'.$hgroup.'>'."\n";
			}

			if($excerpt == 'yes') {
				$output .= '<p>';   
				ob_start(); ht_content_limit($excerpt_length); $output .= ob_get_clean();
				$output .= '</p>';
			}

		$output .= '</li>'."\n";
					
		}//end while

		wp_reset_query();

		$output .= '<div class="clear"></div>';
		$output .= '</ul>';
		$output .= '</div><!--#end portfolio lists-->';

	}else{
	
		$output = '<div class="warning radius-5"><p class="radius-5">';
		ob_start(); _e('You do not have any posts to display.','hawktheme'); $output .= ob_get_clean();
		$output .= '</p></div>'."\n";

	}//end if

	return $output;

}

?>