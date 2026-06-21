<?php 
/*******************************************************************************
 * The fonts for our theme. *
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_action('ht_font', 'ht_font_family');
add_action('ht_font', 'ht_font_size');


//Font Family
function ht_font_family(){

	global $shortname, $font_stacks;
	$body = get_option($shortname.'_body_font_family');
	$headers = get_option($shortname.'_headers_font_family');

	//Body font
    $body_font = $font_stacks[$body];

	//Header font
    if($headers != 'none') {

        //Format font value
        $header_font_value = $headers;

        //Format font name
        $header_font_family = str_replace('+', ' ', $headers);
        $header_font_family = explode(':', $header_font_family);
        $header_font_family = explode('?', $header_font_family[0]);
        $header_font_family = $header_font_family[0];
        
    }

	if($headers != 'none') {
		echo '<link href="https://fonts.googleapis.com/css?family='.$header_font_value.'" rel="stylesheet" type="text/css" />',"\n";
		echo '<style type="text/css">';
		echo 'h1, h2, h3, h4, h5, h6 {  font-family: '.$header_font_family.'; }';
		echo '</style>',"\n";
	}

	if($body != 'droid-sans') {
		echo '<style type="text/css">';
		echo 'body {  font-family: '.$body_font.'; }';
		echo '</style>',"\n";
	}

}


//Font Size
function ht_font_size(){

	global $shortname;
	$h1 = get_option($shortname.'_h1_size');
	$h2 = get_option($shortname.'_h2_size');
	$h3 = get_option($shortname.'_h3_size');
	$h4 = get_option($shortname.'_h4_size');
	$h5 = get_option($shortname.'_h5_size');
	$h6 = get_option($shortname.'_h6_size');
	$logo_text = get_option($shortname.'_logo_text_size');
	$logo_description = get_option($shortname.'_logo_description_size');
	$top_level_menu = get_option($shortname.'_top_level_menu_size');
	$sub_level_menu = get_option($shortname.'_sub_level_menu_size');
	$page_text = get_option($shortname.'_page_text_size');
	$sidebar_widget_title = get_option($shortname.'_sidebar_widget_title_size');
	$footer_widget_title = get_option($shortname.'_footer_widget_title_size');
	$footer_text = get_option($shortname.'_footer_text_size');

	//H1
	if($h1 != '30') {
		echo '<style type="text/css">';
		echo '.post-text h1 {  font-size: '.$h1.'px; }';
		echo '</style>',"\n";
	}

	//H2
	if($h2 != '24') {
		echo '<style type="text/css">';
		echo '.post-text h2 {  font-size: '.$h2.'px; }';
		echo '</style>',"\n";
	}

	//H3
	if($h3 != '18') {
		echo '<style type="text/css">';
		echo '.post-text h3 {  font-size: '.$h3.'px; }';
		echo '</style>',"\n";
	}

	//H4
	if($h4 != '16') {
		echo '<style type="text/css">';
		echo '.post-text h4 {  font-size: '.$h4.'px; }';
		echo '</style>',"\n";
	}

	//H5
	if($h5 != '14') {
		echo '<style type="text/css">';
		echo '.post-text h5 {  font-size: '.$h5.'px; }';
		echo '</style>',"\n";
	}

	//H6
	if($h6 != '12') {
		echo '<style type="text/css">';
		echo '.post-text h6 {  font-size: '.$h6.'px; }';
		echo '</style>',"\n";
	}

	//Logo Text
	if($logo_text != '36') {
		echo '<style type="text/css">';
		echo 'header .site-name h2 {  font-size: '.$logo_text.'px; }';
		echo '</style>',"\n";
	}

	//Logo Description
	if($logo_description != '12') {
		echo '<style type="text/css">';
		echo 'header .site-name p {  font-size: '.$logo_description.'px; }';
		echo '</style>',"\n";
	}

	//Top level menu
	if($top_level_menu != '12') {
		echo '<style type="text/css">';
		echo 'header nav ul li {  font-size: '.$top_level_menu.'px; }';
		echo '</style>',"\n";
	}

	//Sub level menu
	if($sub_level_menu != '12') {
		echo '<style type="text/css">';
		echo 'header nav ul li ul li {  font-size: '.$sub_level_menu.'px; }';
		echo '</style>',"\n";
	}

	//Post Text
	if($page_text != '12') {
		echo '<style type="text/css">';
		echo '.post-text {  font-size: '.$page_text.'px; }';
		echo '</style>',"\n";
	}

	//Sidebar Widget Title
	if($sidebar_widget_title != '18') {
		echo '<style type="text/css">';
		echo '#sidebar .widget h3 {  font-size: '.$sidebar_widget_title.'px; }';
		echo '</style>',"\n";
	}

	//Footer Widget Title
	if($footer_widget_title != '18') {
		echo '<style type="text/css">';
		echo '.footer-widgets .widget h3 {  font-size: '.$footer_widget_title.'px; }';
		echo '</style>',"\n";
	}

	//Footer Text
	if($footer_text != '11') {
		echo '<style type="text/css">';
		echo '.footer-copyright {  font-size: '.$footer_text.'px; }';
		echo '</style>',"\n";
	}

}

?>
