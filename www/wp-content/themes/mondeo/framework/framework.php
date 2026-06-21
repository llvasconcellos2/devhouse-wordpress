<?php 
/*******************************************************************************
 * The framework for our theme. *
 * Load the theme options, types, metaboxs, shortcodes, widgets.
 *
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/


/*-------------------------------------------------------------
~~~~~~~~Load Options Functions~~~~~~~~
-------------------------------------------------------------*/

/*Load theme configs*/
require_once(FrameWork. "/options/option.config.php");

/*Load theme options*/
require_once(FrameWork. "/options/option.theme.php"); 

/*Load framework*/
require_once(FrameWork. "/options/option.framework.php"); 


/*-------------------------------------------------------------
~~~~~~~~Load Metaboxes Functions~~~~~~~~
-------------------------------------------------------------*/
/*Load metabox framework*/
require_once(FrameWork. "/metaboxs/metabox.framework.php");

/*Load seo metabox*/
require_once(FrameWork. "/metaboxs/metabox.seo.php");

/*Load seo metabox*/
require_once(FrameWork. "/metaboxs/metabox.type.php");

/*Load slider url*/
require_once(FrameWork. "/metaboxs/metabox.slider.url.php");



/*-------------------------------------------------------------
~~~~~~~~Load Options Functions~~~~~~~~
-------------------------------------------------------------*/

/*Load post type slider*/
require_once(FrameWork. "/types/type.slider.php");

/*Load post type portfolio*/
require_once(FrameWork. "/types/type.portfolio.php");

/*Load post type news*/
require_once(FrameWork. "/types/type.news.php");

/*Load post type gallery*/
require_once(FrameWork. "/types/type.gallery.php");


/*-------------------------------------------------------------------
~~~~~~~~Register And Load Widgets~~~~~~~~
-------------------------------------------------------------------*/

/*Register Custom Widgets*/
require_once(FrameWork. "/widgets/widget.register.php");

/*Load feature service*/
require_once(FrameWork. "/widgets/widget.feature.services.php");

/*Load flickr*/
require_once(FrameWork. "/widgets/widget.flickr.php");

/*Load tweets*/
require_once(FrameWork. "/widgets/widget.tweets.php");

/*Load recent posts*/
require_once(FrameWork. "/widgets/widget.post.recent.php");

/*Load random posts*/
require_once(FrameWork. "/widgets/widget.post.random.php");

/*Load mostview posts*/
require_once(FrameWork. "/widgets/widget.post.mostview.php");

/*Load ads*/
require_once(FrameWork. "/widgets/widget.ads.php");

/*Load contact*/
require_once(FrameWork. "/widgets/widget.contact.php");

/*Load social media*/
require_once(FrameWork. "/widgets/widget.socialmedia.php");


/*-------------------------------------------------------------
~~~~~~~~Load Shortcodes~~~~~~~~
-------------------------------------------------------------*/

/*Load core*/
require_once(FrameWork. "/shortcodes/shortcode.core.php");

/*Load column*/
require_once(FrameWork. "/shortcodes/shortcode.columns.php");

/*Load html*/
require_once(FrameWork. "/shortcodes/shortcode.html.php");

/*Load button*/
require_once(FrameWork. "/shortcodes/shortcode.buttons.php");

/*Load icon list*/
require_once(FrameWork. "/shortcodes/shortcode.iconlists.php");

/*Load message box*/
require_once(FrameWork. "/shortcodes/shortcode.messageboxes.php");

/*Load Image*/
require_once(FrameWork. "/shortcodes/shortcode.images.php");

/*Load Video*/
require_once(FrameWork. "/shortcodes/shortcode.video.php");

/*Load Tabs*/
require_once(FrameWork. "/shortcodes/shortcode.tabs.php");

/*Load Toggle*/
require_once(FrameWork. "/shortcodes/shortcode.toggles.php");

/*Load Toggle*/
require_once(FrameWork. "/shortcodes/shortcode.pricing.php");

/*Load Portfolio*/
require_once(FrameWork. "/shortcodes/shortcode.portfolio.php");

/*Load Portfolio*/
require_once(FrameWork. "/shortcodes/shortcode.blog.php");

/*Load Testimonials*/
require_once(FrameWork. "/shortcodes/shortcode.testimonials.php");

/*Load Slider*/
require_once(FrameWork. "/shortcodes/shortcode.slider.php");

/*Load Media*/
require_once(FrameWork. "/shortcodes/shortcode.media.php");




/*-------------------------------------------------------------
~~~~~~~~Load Plugins~~~~~~~~
-------------------------------------------------------------*/

/*Load ajax upload*/
require_once(FrameWork. "/plugins/plugin.ajaxupload.php");

/*Load imgselect*/
require_once(FrameWork. "/plugins/plugin.imgselect.php");

/*Load colorpicker*/
require_once(FrameWork. "/plugins/plugin.colorpicker.php");

/*Load colorpicker*/
require_once(FrameWork. "/plugins/plugin.font.php"); 

/*Re order*/
require_once(FrameWork. "/plugins/post-types-order/post-types-order.php"); 



/*-------------------------------------------------------------
~~~~~~~~~~Load CSS & JS~~~~~~~~~~~~~
-------------------------------------------------------------*/
if(is_admin()){
	add_action('admin_init', 'framework_admin_add_style');
	add_action('admin_init', 'framework_admin_add_script');
}


function framework_admin_add_style() {
	wp_enqueue_style('option.panel', FrameWork_Url. '/skins/css/option.panel.css');
	wp_enqueue_style('metabox', FrameWork_Url. '/skins/css/metabox.css');
	wp_enqueue_style('colorpicker', FrameWork_Url. '/skins/css/colorpicker.css');
	wp_enqueue_style('checkboxes', FrameWork_Url. '/skins/css/checkboxes.css');
	wp_enqueue_style('widget', FrameWork_Url. '/skins/css/widget.css');
}



function framework_admin_add_script() {
	wp_enqueue_script('jquery.ajaxupload',FrameWork_Url. '/skins/js/jquery.ajaxupload.js',array('jquery'));
	wp_enqueue_script('jquery.colorpicker',FrameWork_Url. '/skins/js/jquery.colorpicker.js',array('jquery'));
	wp_enqueue_script('jquery.checkboxes',FrameWork_Url. '/skins/js/jquery.checkboxes.js',array('jquery'));
	wp_enqueue_script('jquery.rangeinput',FrameWork_Url. '/skins/js/jquery.rangeinput.js',array('jquery'));
	wp_enqueue_script('custom', FrameWork_Url. '/skins/js/custom.js');	
	add_thickbox();
}


/*-------------------------------------------------------------
~~~~~~~~~~Load  Editor CSS & JS~~~~~~~~~~~~~
-------------------------------------------------------------*/
function theme_admin_tinymce() {
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'jquery-color' );
		wp_print_scripts('editor');
		if (function_exists('add_thickbox')) add_thickbox();
		wp_print_scripts('media-upload');
		if (function_exists('wp_tiny_mce')) wp_tiny_mce();
		wp_admin_css();
		wp_enqueue_script('utils');
		do_action("admin_print_styles-post-php");
		do_action('admin_print_styles');
}

add_filter('admin_head','theme_admin_tinymce');


/*-------------------------------------------------------------
~~~~~Load  Google Font For Preview~~~~~~
-------------------------------------------------------------*/
function google_font_preview() {

	echo '<link href="https://fonts.googleapis.com/css?family=Droid+Sans:regular,bold" rel="stylesheet" type="text/css" />'."\n";

}

add_action('admin_head','google_font_preview');

?>
