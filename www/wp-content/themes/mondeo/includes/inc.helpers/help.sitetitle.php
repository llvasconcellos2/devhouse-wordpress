<?php 
 /*******************************************************************************
 * The SiteTitle Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~WP Site Title~~~~~~~~~~~
-------------------------------------------------------------*/
function ht_site_title() {

	global $shortname;
	$site_logo = get_option($shortname.'_site_logo');

	if($site_logo != '') {
			echo '<div class="site-logo"><h3><a href="'.home_url( '/' ).'" title="'. esc_attr( get_bloginfo( 'name', 'display' ) ).'"><img src="'. $site_logo .'" alt="'. esc_attr( get_bloginfo( 'name', 'display' ) ).'" /></a></h3></div>';
	}else{	
			echo  '<div class="site-name"><h2><a href="'.home_url( '/' ).'" title="'. esc_attr( get_bloginfo( 'name', 'display' ) ).'">';
			bloginfo( 'name' );
			echo  '</a></h2>';
			echo  '<p>';
			bloginfo( 'description' );
			echo  '</p></div>';
	}

}

?>