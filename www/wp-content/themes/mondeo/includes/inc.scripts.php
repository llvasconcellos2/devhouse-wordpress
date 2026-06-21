<?php 
/*******************************************************************************
 * The scripts for our theme. *
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_action('wp_print_scripts', 'ht_load_scripts');
add_action('wp_head', 'ht_all_scripts');
add_action('wp_head', 'ht_custom_script');

function ht_load_scripts() {

	global $ver;
	if( !is_admin() ){
		// Load jQuery scripts
		wp_register_script( 'plugins', Skins_Url. '/js/plugins.js', false, $ver );
		wp_register_script( 'custom', Skins_Url. '/js/custom.js', false, $ver );
		wp_register_script( 'video', Skins_Url. '/js/video.js', false, $ver );
		wp_enqueue_script('jquery');
		wp_enqueue_script('plugins');
		wp_enqueue_script('custom');
		wp_enqueue_script('video');
	}

}


/* 
@Add All Scripts
*/
function ht_all_scripts() {
	global $ver;

	if(is_singular('gallery-item') || is_page()) {
		echo '<script type="text/javascript" src="'.Skins_Url. '/js/jquery.history.js?ver='.$ver.'"></script>'."\n";
		echo '<script type="text/javascript" src="'.Skins_Url. '/js/jquery.galleriffic.js?ver='.$ver.'"></script>'."\n";
		echo '<script type="text/javascript" src="'.Skins_Url. '/js/jquery.opacityrollover.js?ver='.$ver.'"></script>'."\n";
	}

	echo '<!--[if lt IE 9]>'."\n";
	echo '<script type="text/javascript" src="'.Skins_Url. '/js/html5.js?ver='.$ver.'"></script>'."\n";
	echo '<script type="text/javascript" src="'.Skins_Url. '/js/css3.js?ver='.$ver.'"></script>'."\n";
	echo '<![endif]-->'."\n";

}


/* 
@Add Custom Head Code
*/
function ht_custom_script() {
	 global $shortname;
	 $custom_script = stripslashes(get_option($shortname.'_custom_script'));
	 if ($custom_script) {
		 echo $custom_script;
	 }
}

?>