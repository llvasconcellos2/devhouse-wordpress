<?php
 /*******************************************************************************
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="container">
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php ht_site_seo(); ?>
<?php 
	do_action('all_css'); 
	do_action('ht_font'); 
?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrap">
<header>
<section <?php do_action('header_style'); ?>>
<?php 
	ht_site_title(); // Site Title

	if (has_nav_menu('header menu')) {
		ht_header_menu_wp_nav(); // Header Menu
	}else{
		echo '<nav id="header-menu">';
		echo '<ul>';
		ht_no_wp_nav_notice();
		echo '</ul>';
		echo '</nav>';
	}

	ht_top_social_media();
	ht_top_search_from();
?>
<?php 
	global $shortname;
	$type = get_option($shortname.'_header_type');
	if($type == 'Style Two') { echo '<div class="clear"></div>'; }
	if(is_home()) { echo '<div class="topshadow"></div>'; }
?>
</section>
<?php ht_page_header(); ?>
</header>
<!-- header -->