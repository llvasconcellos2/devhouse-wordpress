<?php 
 /*******************************************************************************
 * The Menu Helper For Theme
 * @package HawkTheme
 * @since Thunder 1.0
*******************************************************************************/
/*-------------------------------------------------------------
~~~~~~~~~~HEAD WP NAV~~~~~~~~~~~
-------------------------------------------------------------*/
function ht_header_menu_wp_nav() {

				$args = array( 
								'container' => 'nav',
								'container_id' => 'header-menu', 
								'container_class' =>'ddsmoothmenu', 
								'menu_class' => 'drop-menu', 
								'theme_location' => 'header menu',
								'link_before' => '<span>',
								'link_after' => '</span>',
								'depth' => 0 
							);
				wp_nav_menu($args); 

}



/*-------------------------------------------------------------
~~~~~~~~~~PORTFOLIO WP NAV~~~~~~~~~~~
-------------------------------------------------------------*/
function ht_portfolio_wp_nav() {
		
		$args = array( 
						'container' => 'nav',
						'container_id' => 'portfolio-menu', 
						'container_class' =>'portfolio-menu-container', 
						'menu_class' => 'portfolio-menu-class fixed', 
						'theme_location' => 'portfolio menu', 
						'depth' => 1 );
		wp_nav_menu($args); 

}



/*-------------------------------------------------------------
~~~~~~~~~~GALLERY WP NAV~~~~~~~~~~~
-------------------------------------------------------------*/
function ht_gallery_wp_nav() {
	
		$args = array( 
						'container' => 'nav',
						'container_id' => 'gallery-menu', 
						'container_class' =>'gallery-menu-container', 
						'menu_class' => 'gallery-menu-class fixed', 
						'theme_location' => 'gallery menu', 
						'depth' => 1 );
		wp_nav_menu($args); 

}


/*-------------------------------------------------------------
~~~~~~~~~~NO WP NAV NOTICE~~~~~~~~~~~
-------------------------------------------------------------*/
function ht_no_wp_nav_notice() {
	
	echo '<div class="no-menu-notice">';
		_e('Set Custom Menu in "Appearance => Menus => Theme Locations"','hawktheme');
	echo '</div>'."\n";

}

?>