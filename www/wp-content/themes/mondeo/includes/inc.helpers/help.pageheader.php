<?php 
 /*******************************************************************************
 * The PageHeader Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

function ht_page_header() {

	if(!is_home() || !is_front_page()) {

			global $post;

			echo '<div class="page-header">'."\n";
			echo '<div class="layout-width page-header-wrap">';
			echo '<h2 class="breadcrumbs">';
			if ( is_singular('post')) {
				the_category('&nbsp;&middot;&nbsp;');
			}elseif(is_singular('portfolio-item')) {
				echo get_the_term_list( $post->ID, 'portfolio', '', '&middot;', '' );
			}elseif(is_singular('gallery-item')) {
				echo get_the_term_list( $post->ID, 'gallery', '', '&middot;', '' );
			}elseif(is_singular('slider-item')) {
				echo get_the_term_list( $post->ID, 'slider', '', '&middot;', '' );
			}elseif(is_singular('news-item')) {
				echo get_the_term_list( $post->ID, 'news', '', '&middot;', '' ); 
			}elseif(is_page()) {
				the_title();
			}elseif(is_category() || is_tax()) {
				single_term_title();
			}elseif(is_tag()){
				_e( 'Tagged with: ', 'hawktheme' ); single_tag_title();
			}elseif(is_archive()){
				if(is_year()) {
					printf( __( 'Yearly Archives: <span>%s</span>', 'hawktheme' ), get_the_date( 'Y' ) );
				}elseif(is_month()){
					printf( __( 'Monthly Archives: <span>%s</span>', 'hawktheme' ), get_the_date( 'F Y' ) ); 
				}elseif(is_day()){
					printf( __( 'Daily Archives: <span>%s</span>', 'hawktheme' ), get_the_date() );
				}elseif(is_author()){
					_e( 'Author Archive', 'hawktheme' );
				}else{
					_e( 'Archives', 'hawktheme' );
				}
			}elseif(is_404()){
				_e( '404 Error', 'hawktheme' );
			}elseif(is_search()){
				_e( 'Search Results', 'hawktheme' );
			}
			echo '</h2>'."\n";

			if(function_exists('bcn_display')){ 
				echo '<div class="page-place">'; bcn_display(); echo '</div>'."\n";
			}

			echo '<div class="clear"></div>'."\n";
			echo '<div class="topshadow"></div>'."\n";

			echo '</div>'."\n";
			echo '</div>'."\n";

	}

}

?>