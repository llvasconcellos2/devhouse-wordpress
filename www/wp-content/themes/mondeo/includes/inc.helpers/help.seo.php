<?php 
 /*******************************************************************************
 * The SEO Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_site_seo() {

	global $post, $shortname, $key, $page, $paged;
	if(!is_404()) {
		$data = get_post_meta( $post->ID, $key, true );
	}

	$home_keywords = get_option($shortname.'_home_meta_keywords');
	$home_description = get_option($shortname.'_home_meta_description');
	$category_meta = strip_tags(category_description());
	$tag_meta = strip_tags(tag_description());
	$title_tag = isset( $data['seo_title'] ) ? $data['seo_title']: ''; 
	$keywords = isset( $data['seo_keywords'] ) ? $data['seo_keywords']: ''; 
	$description = isset( $data['seo_description'] ) ? $data['seo_description']: ''; 
	$seo_post = get_option($shortname.'_seo_post') == 'true';
	$seo_page = get_option($shortname.'_seo_page') == 'true';
	$seo_slider = get_option($shortname.'_seo_slider') == 'true';
	$seo_news = get_option($shortname.'_seo_news') == 'true';
	$seo_portfolio = get_option($shortname.'_seo_portfolio') == 'true';
	$seo_gallery = get_option($shortname.'_seo_gallery') == 'true';

	echo '<title>';

	if((is_page() && $seo_page) || (is_singular('post') && $seo_post) || (is_singular('slider-item') && $seo_slider) || (is_singular('news-item') && $seo_news) || (is_singular('portfolio-item') && $seo_portfolio) || (is_singular('gallery-item') && $seo_gallery)) {

			if($title_tag == '') {
				wp_title( '&#8211;', true, 'right' );
			}else{
				echo $title_tag . ' &#8211; '; 
			} 

	}else{
	
			wp_title( '&#8211;', true, 'right' );
	
	}

	bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ($site_description && (is_home() || is_front_page())) { echo ' &#8211; '. $site_description; }

	echo '</title>',"\n";


	//Home SEO
	if(is_home() && $home_keywords != '') { echo '<meta name="keywords" content="'. $home_keywords .'" />',"\n"; }
	if(is_home() && $home_description != '') { echo '<meta name="description" content="'. $home_description .'" />',"\n"; }

	//Category SEO
	if((is_category() && $category_meta) || (is_tax() && $category_meta) ) {
		echo '<meta name="keywords" content="'. $category_meta .'" />',"\n";
		echo '<meta name="description" content="'. $category_meta .'" />',"\n";
	}

	//Tag SEO
	if((is_tag() && $tag_meta) || (is_tag() && $tag_meta) ) {
		echo '<meta name="keywords" content="'. $tag_meta .'" />',"\n";
		echo '<meta name="description" content="'. $tag_meta .'" />',"\n";
	}

	//Page SEO
	if(is_page() && $seo_page) {
		if($keywords != '') {
			echo '<meta name="keywords" content="'. $keywords .'" />',"\n";
		}
		if($description != '') {
			echo '<meta name="description" content="'. $description .'" />',"\n";
		}
	}

	//Post SEO
	if(is_singular('post') && $seo_post) {
		if($keywords != '') {
			echo '<meta name="keywords" content="'. $keywords .'" />',"\n";
		}
		if($description != '') {
			echo '<meta name="description" content="'. $description .'" />',"\n";
		}
	}

	//Slider SEO
	if(is_singular('slider-item') && $seo_slider) {
		if($keywords != '') {
			echo '<meta name="keywords" content="'. $keywords .'" />',"\n";
		}
		if($description != '') {
			echo '<meta name="description" content="'. $description .'" />',"\n";
		}
	}

	//Portfolio SEO
	if(is_singular('portfolio-item') && $seo_portfolio) {
		if($keywords != '') {
			echo '<meta name="keywords" content="'. $keywords .'" />',"\n";
		}
		if($description != '') {
			echo '<meta name="description" content="'. $description .'" />',"\n";
		}
	}

	//News SEO
	if(is_singular('news-item') && $seo_news) {
		if($keywords != '') {
			echo '<meta name="keywords" content="'. $keywords .'" />',"\n";
		}
		if($description != '') {
			echo '<meta name="description" content="'. $description .'" />',"\n";
		}
	}

	//Gallery SEO
	if(is_singular('gallery-item') && $seo_gallery) {
		if($keywords != '') {
			echo '<meta name="keywords" content="'. $keywords .'" />',"\n";
		}
		if($description != '') {
			echo '<meta name="description" content="'. $description .'" />',"\n";
		}
	}

}

?>