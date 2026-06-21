<?php 
/*******************************************************************************
 * The styles for our theme. *
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_action('all_css', 'ht_all_css');
add_action('all_css', 'ht_custom_favicon');
add_action('all_css', 'ht_custom_css');


/*-------------------------------------------------------------
~~~~~~~~~~~~Add All CSS~~~~~~~~~~~~ 
-------------------------------------------------------------*/
function ht_all_css() {

	global $ver, $shortname;

	$style_value = get_option($shortname.'_site_style');

	if($style_value == '') {
		$style = 'deepblue';
	}else{
		$style = $style_value;
	}

	echo '<link rel="stylesheet" type="text/css" media="screen" href="' .Skins_Url. '/css/skin.core.css?ver='.$ver.'" />'."\n";
	echo '<link rel="stylesheet" type="text/css" media="screen" href="' .Skins_Url. '/css/skin.'.$style.'.css?ver='.$ver.'" />'."\n";
	echo '<link rel="stylesheet" type="text/css" media="screen" href="' .Skins_Url. '/css/video-js.css?ver='.$ver.'" />'."\n";
	echo '<link rel="stylesheet" type="text/css" media="screen" href="' .Skins_Url. '/css/prettyphoto.css?ver='.$ver.'" />'."\n";

	if(is_singular('gallery-item') || is_page()) {
		echo '<link rel="stylesheet" type="text/css" media="screen" href="' .Skins_Url. '/css/galleriffic.css?ver='.$ver.'" />'."\n";
	}

	echo '<link href="https://fonts.googleapis.com/css?family=Droid+Sans:regular,bold" rel="stylesheet" type="text/css" />'."\n";

	echo '<!--[if lt IE 9]>'."\n";
	echo '<link rel="stylesheet" type="text/css" media="screen" href="' .Skins_Url. '/css/ie.css?ver='.$ver.'" />'."\n";
	echo '<![endif]-->'."\n";

}


/*-------------------------------------------------------------
~~~~~Add Custom Favicon Image~~~~~~
-------------------------------------------------------------*/
function ht_custom_favicon() {

	global $shortname;
	$favicon = get_option($shortname.'_favicon_image');
	if ($favicon) {
		 echo '<link rel="shortcut icon" href="'.$favicon.'" />',"\n";
	 }

}



/*-------------------------------------------------------------
~~~~~~~~~~~Add Custom CSS~~~~~~~~~~
-------------------------------------------------------------*/
function ht_custom_css() {

	global $shortname;
	$background = get_option($shortname.'_site_background');
	$custom_css = get_option($shortname.'_custom_css');
	$alink_color = get_option($shortname.'_alink_color');
	$alink_hover_color = get_option($shortname.'_alink_hover_color');
	$menu_color = get_option($shortname.'_menu_color');
	$menu_hover_color = get_option($shortname.'_menu_hover_color');
	$body_font_color = get_option($shortname.'_body_font_color');
	$hgroup_font_color = get_option($shortname.'_hgroup_font_color');
	$logo_top = get_option($shortname.'_logo_top_margin');
	$logo_bottom = get_option($shortname.'_logo_bottom_margin');
	$logo_left = get_option($shortname.'_logo_left_margin');

	//Custom Logo Position
	if($logo_top != '25') {
			echo '<style type="text/css">header .site-logo { margin-top: '.$logo_top.'px; }</style>'."\n";
	}

	if($logo_bottom != '15') {
			echo '<style type="text/css">header .site-logo { margin-bottom: '.$logo_bottom.'px; }</style>'."\n";
	}

	if($logo_left != '0') {
			echo '<style type="text/css">header .site-logo { margin-left: '.$logo_left.'px; }</style>'."\n";
	}


	//Custom Background
	if($background != 'none') {
			echo '<style type="text/css">#wrap { background: url('.Skins_Url.'/images/backgrounds/'.$background.'.png); }</style>'."\n";
	}

	//Custom CSS
	if($custom_css) {	
			echo '<style type="text/css">' . $custom_css . '</style>',"\n";
	}

	//Custom A link
	if($alink_color || $alink_hover_color) {
			echo '<style type="text/css">';
				if($alink_color){ echo 'a { color:'.$alink_color.'}'; }
				if($alink_hover_color){ echo 'a:hover { color:'.$alink_hover_color.'}'; }
			echo '</style>',"\n";
	}

	//Custom Menu
	if($menu_color || $menu_hover_color) {
			echo '<style type="text/css">';
				if($menu_color){ echo 'header nav ul li a { color:'.$menu_color.'}'; }
				if($menu_hover_color){ echo 'header nav ul li a:hover { color:'.$menu_hover_color.'}'; }
			echo '</style>',"\n";
	}

	//Custom Body Font
	if($body_font_color) {
			echo '<style type="text/css">';
			echo 'body { color:'.$body_font_color.'}';
			echo '</style>',"\n";
	}

	//Custom Hgroup Font Font
	if($hgroup_font_color) {
			echo '<style type="text/css">';
			echo '.post-text h1, .post-text h2, .post-text h3, .post-text h4, .post-text h5, .post-text h6 { color:'.$hgroup_font_color.'}';
			echo '</style>',"\n";
	}

}

?>
