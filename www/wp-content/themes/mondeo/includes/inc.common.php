<?php 
/*******************************************************************************
 * The common functions for our theme. *
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
if ( ! isset( $content_width ) ) $content_width = 900;

/*-------------------------------------------------------------
~~~~Translations can be filed 
in the /languages/ directory~~~~~
-------------------------------------------------------------*/
load_theme_textdomain( 'hawktheme', FrameWork . '/languages' );


/*-------------------------------------------------------------
 * If 3.1 isn't installed, loads the Simple Custom Post Type Archives Plug-in:
 * http://www.cmurrayconsulting.com/software/wordpress-custom-post-type-archives/
-------------------------------------------------------------*/

if ( get_bloginfo('version') <= 3.1 ) {
 
// prevents errors when installing the plugin after theme installation
if ( is_admin() && $pagenow == 'plugins.php' && isset($_GET['action']) && $_GET['action'] == 'activate' && isset($_GET['plugin']) && strstr( $_GET['plugin'], 'simple-custom-post-type-archives.php' ) )
	$activating_scpta = true; 

// load in the plugin if its not installed
if( !isset( $activating_scpta ) && !function_exists( 'is_scpta_post_type' ) )
	require_once (FrameWork . '/plugins/simple-custom-post-type-archives.php');
	
}



/*----------------------------------------------------------------------
~~~~~~~~~~~~Add theme support~~~~~~~~~~~~ 
----------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails', array( 'slider-item', 'portfolio-item', 'news-item', 'gallery-item', 'post' ) );
add_theme_support('automatic-feed-links');
add_editor_style('style-wp-editor.css');


/*----------------------------------------------------------------------
~~~~~~~~~~~~Add shortcode to widget~~~~~~~~~~~~ 
----------------------------------------------------------------------*/
add_filter('widget_text', 'do_shortcode');


/*---------------------------------------------------------------------
~~~~~~~~~~~~Register nav menus~~~~~~~~~~~~ 
----------------------------------------------------------------------*/
register_nav_menus( array( 
	'header menu' => __( 'Header Navigation', 'hawktheme' ),
	'portfolio menu' => __( 'Portfolio Navigation', 'hawktheme' ),
	'gallery menu' => __( 'Gallery Navigation', 'hawktheme' )
)); 


/*------------------------------------------------------------------------------
~~~~~~~~~~~~Register widgets area ~~~~~~~~~~~~ 
-----------------------------------------------------------------------------*/
register_sidebar( array (
		'name' => __( 'Home Feature Services #1', 'hawktheme' ),
		'id' => 'home-feature-services-1',
		'description' => __("This widget area is used to store feature services section, it will appear in the top of homepage.", 'hawktheme'),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
));


register_sidebar( array (
		'name' => __( 'Home Feature Services #2', 'hawktheme' ),
		'id' => 'home-feature-services-2',
		'description' => __("This widget area is used to store feature services section, it will appear in the top of homepage.", 'hawktheme'),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
));


register_sidebar( array (
		'name' => __( 'Home Feature Services #3', 'hawktheme' ),
		'id' => 'home-feature-services-3',
		'description' => __("This widget area is used to store feature services section, it will appear in the top of homepage.", 'hawktheme'),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
));


register_sidebar( array (
		'name' => __( 'Footer Widget Area #1', 'hawktheme' ),
		'id' => 'footer-widget-area-1',
		'description' => __("This widget area is used to store footer custom widgets, it will appear in the footer of your page.", 'hawktheme'),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));


register_sidebar( array (
		'name' => __( 'Footer Widget Area #2', 'hawktheme' ),
		'id' => 'footer-widget-area-2',
		'description' => __("This widget area is used to store footer custom widgets, it will appear in the footer of your page.", 'hawktheme'),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));


register_sidebar( array (
		'name' => __( 'Footer Widget Area #3', 'hawktheme' ),
		'id' => 'footer-widget-area-3',
		'description' => __("This widget area is used to store footer custom widgets, it will appear in the footer of your page.", 'hawktheme'),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));


register_sidebar( array (
		'name' => __( 'Footer Widget Area #4', 'hawktheme' ),
		'id' => 'footer-widget-area-4',
		'description' => __("This widget area is used to store footer custom widgets, it will appear in the footer of your page.", 'hawktheme'),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));


register_sidebar( array (
		'name' => __( 'Page Sidebar', 'hawktheme' ),
		'id' => 'page-widget-area',
		'description' => __("This is your main sidebar that gets shown on most of your pages.", 'hawktheme'),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));


register_sidebar( array (
		'name' => __( 'Blog Sidebar', 'hawktheme' ),
		'id' => 'blog-widget-area',
		'description' => __("This is the sidebar that gets shown on your Blog Page template, blog posts, and pretty much anything else 'blog' related.", 'hawktheme'),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));

register_sidebar( array (
		'name' => __( 'Portfolio Sidebar', 'hawktheme' ),
		'id' => 'portfolio-widget-area',
		'description' => __("This is the sidebar that gets shown on your Portfolio Page template, portfolio posts, and pretty much anything else 'portfolio' related.", 'hawktheme'),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));

register_sidebar( array (
		'name' => __( 'News Sidebar', 'hawktheme' ),
		'id' => 'news-widget-area',
		'description' => __("This is the sidebar that gets shown on your News Page template, news posts, and pretty much anything else 'news' related.", 'hawktheme'),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));

register_sidebar( array (
		'name' => __( 'Contact Sidebar', 'hawktheme' ),
		'id' => 'contact-widget-area',
		'description' => __("This is the sidebar that gets shown on your Contact Page template.", 'hawktheme'),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));

?>