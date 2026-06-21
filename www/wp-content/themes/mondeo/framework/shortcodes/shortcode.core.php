<?php 
/*******************************************************************************
 * ShortCode Core V1.0*
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

add_action('admin_init', 'action_admin_init');
function action_admin_init(){
	if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
		if ( in_array(basename($_SERVER['PHP_SELF']), array('post-new.php', 'page-new.php', 'post.php', 'page.php', 'themes.php') ) ) {
			add_filter('mce_buttons', 'filter_mce_button');
			add_filter('mce_external_plugins', 'filter_mce_plugin');
			add_action('admin_head','add_simple_buttons');
			add_action('admin_head','advanced_buttons');
		}
	}
}


/*-------------------------------------------------------------
~~~~~~~~Add Simple Buttons~~~~~~~~
-------------------------------------------------------------*/
function add_simple_buttons(){
	
	wp_print_scripts( 'quicktags' );
	$output = '<script type="text/javascript">'."\n";
	$output .= ' /* <![CDATA[ */ '."\n";

	$buttons = array();

	//Clear
	$buttons[] = array('name' => 'clear',
									'options' => array('display_name' => 'clear', 'open_tag' => '\n[clear]', 'close_tag' => '', 'key' => ''
					));

	//Hr
	$buttons[] = array('name' => 'hr',
									'options' => array('display_name' => 'hr', 'open_tag' => '\n[hr]', 'close_tag' => '', 'key' => ''
					));

	//Br 5
	$buttons[] = array('name' => 'br_5',
									'options' => array('display_name' => 'br 5', 'open_tag' => '\n[br_5]', 'close_tag' => '', 'key' => ''
					));

	//Br 10
	$buttons[] = array('name' => 'br_10',
									'options' => array('display_name' => 'br 10', 'open_tag' => '\n[br_10]', 'close_tag' => '', 'key' => ''
					));

	//Br 20
	$buttons[] = array('name' => 'br_20',
									'options' => array('display_name' => 'br 20', 'open_tag' => '\n[br_20]', 'close_tag' => '', 'key' => ''
					));

	//Br 30
	$buttons[] = array('name' => 'br_30',
									'options' => array('display_name' => 'br 30', 'open_tag' => '\n[br_30]', 'close_tag' => '', 'key' => ''
					));

	//Br 40
	$buttons[] = array('name' => 'br_40',
									'options' => array('display_name' => 'br 40', 'open_tag' => '\n[br_40]', 'close_tag' => '', 'key' => ''
					));

	//Br 50
	$buttons[] = array('name' => 'br_50',
									'options' => array('display_name' => 'br 50', 'open_tag' => '\n[br_50]', 'close_tag' => '', 'key' => ''
					));

	//Dropcap
	$buttons[] = array('name' => 'dropcap',
									'options' => array('display_name' => 'dropcap', 'open_tag' => '\n[dropcap]', 'close_tag' => '[/dropcap]\n', 'key' => ''
					));

	//Gotop
	$buttons[] = array('name' => 'gotop',
									'options' => array('display_name' => 'gotop', 'open_tag' => '\n[gotop]', 'close_tag' => '', 'key' => ''
					));

	//ToolTip
	$buttons[] = array('name' => 'tooltip',
									'options' => array('display_name' => 'tooltip', 'open_tag' => '\n[tooltip text="Tooltip Text"]', 'close_tag' => '[/tooltip]\n', 'key' => ''
					));

	//Testimonials
	$buttons[] = array('name' => 'testimonials',
									'options' => array('display_name' => 'testimonials', 'open_tag' => '\n[testimonials name="Name Here"]', 'close_tag' => '[/testimonials]\n', 'key' => ''
					));

	//Quote
	$buttons[] = array('name' => 'quote',
									'options' => array('display_name' => 'quote', 'open_tag' => '\n[quote]', 'close_tag' => '[/quote]\n', 'key' => ''
					));

	//Frame
	$buttons[] = array('name' => 'frame',
									'options' => array('display_name' => 'frame', 'open_tag' => '\n[frame]', 'close_tag' => '[/frame]\n', 'key' => ''
					));

	//Frame Left
	$buttons[] = array('name' => 'frame_left',
									'options' => array('display_name' => 'frame left', 'open_tag' => '\n[frame_left]', 'close_tag' => '[/frame_left]\n', 'key' => ''
					));

	//Frame Right
	$buttons[] = array('name' => 'frame_right',
									'options' => array('display_name' => 'frame right', 'open_tag' => '\n[frame_right]', 'close_tag' => '[/frame_right]\n', 'key' => ''
					));

	//Highlight Yellow
	$buttons[] = array('name' => 'highlight_yellow',
									'options' => array('display_name' => 'highlight yellow', 'open_tag' => '\n[highlight_yellow]', 'close_tag' => '[/highlight_yellow]\n', 'key' => ''
					));

	//Highlight Green
	$buttons[] = array('name' => 'highlight_green',
									'options' => array('display_name' => 'highlight green', 'open_tag' => '\n[highlight_green]', 'close_tag' => '[/highlight_green]\n', 'key' => ''
					));

	//Highlight Blue
	$buttons[] = array('name' => 'highlight_blue',
									'options' => array('display_name' => 'highlight blue', 'open_tag' => '\n[highlight_blue]', 'close_tag' => '[/highlight_blue]\n', 'key' => ''
					));

	//Highlight Red
	$buttons[] = array('name' => 'highlight_red',
									'options' => array('display_name' => 'highlight red', 'open_tag' => '\n[highlight_red]', 'close_tag' => '[/highlight_red]\n', 'key' => ''
					));

	//Highlight Grey
	$buttons[] = array('name' => 'highlight_grey',
									'options' => array('display_name' => 'highlight grey', 'open_tag' => '\n[highlight_grey]', 'close_tag' => '[/highlight_grey]\n', 'key' => ''
					));

	//Pricing Table
	$buttons[] = array('name' => 'pricing_table',
									'options' => array('display_name' => 'pricing table', 'open_tag' => '\n[pricing_table columns="3"]', 'close_tag' => '[/pricing_table]\n', 'key' => ''
					));

	//One Half
	$buttons[] = array('name' => 'one_half',
									'options' => array('display_name' => '1/2', 'open_tag' => '\n[one_half]', 'close_tag' => '[/one_half]\n', 'key' => ''
					));

	//One Half Last
	$buttons[] = array('name' => 'one_half_last',
									'options' => array('display_name' => '1/2 last', 'open_tag' => '\n[one_half_last]', 'close_tag' => '[/one_half_last]\n', 'key' => ''
					));

	//One Third
	$buttons[] = array('name' => 'one_third',
									'options' => array('display_name' => '1/3', 'open_tag' => '\n[one_third]', 'close_tag' => '[/one_third]\n', 'key' => ''
					));

	//One Third Last
	$buttons[] = array('name' => 'one_third_last',
									'options' => array('display_name' => '1/3 last', 'open_tag' => '\n[one_third_last]', 'close_tag' => '[/one_third_last]\n', 'key' => ''
					));

	//One Fourth
	$buttons[] = array('name' => 'one_fourth',
									'options' => array('display_name' => '1/4', 'open_tag' => '\n[one_fourth]', 'close_tag' => '[/one_fourth]\n', 'key' => ''
					));

	//One Fourth Last
	$buttons[] = array('name' => 'one_fourth_last',
									'options' => array('display_name' => '1/4 last', 'open_tag' => '\n[one_fourth_last]', 'close_tag' => '[/one_fourth_last]\n', 'key' => ''
					));

	//Two Third
	$buttons[] = array('name' => 'two_third',
									'options' => array('display_name' => '2/3', 'open_tag' => '\n[two_third]', 'close_tag' => '[/two_third]\n', 'key' => ''
					));

	//Two Third Last
	$buttons[] = array('name' => 'two_third_last',
									'options' => array('display_name' => '2/3 last', 'open_tag' => '\n[two_third_last]', 'close_tag' => '[/two_third_last]\n', 'key' => ''
					));

	//Three Fourth
	$buttons[] = array('name' => 'three_fourth',
									'options' => array('display_name' => '3/4', 'open_tag' => '\n[three_fourth]', 'close_tag' => '[/three_fourth]\n', 'key' => ''
					));

	//Three Fourth Last
	$buttons[] = array('name' => 'two_third_last',
									'options' => array('display_name' => '3/4 last', 'open_tag' => '\n[three_fourth_last]', 'close_tag' => '[/three_fourth_last]\n', 'key' => ''
					));

	//Stumble
	$buttons[] = array('name' => 'stumble',
									'options' => array('display_name' => 'stumble', 'open_tag' => '\n[stumble size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//Flickr
	$buttons[] = array('name' => 'flickr',
									'options' => array('display_name' => 'flickr', 'open_tag' => '\n[flickr size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//Designfloat
	$buttons[] = array('name' => 'designfloat',
									'options' => array('display_name' => 'designfloat', 'open_tag' => '\n[designfloat size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//Technorati
	$buttons[] = array('name' => 'technorati',
									'options' => array('display_name' => 'technorati', 'open_tag' => '\n[technorati size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//Linkedin
	$buttons[] = array('name' => 'linkedin',
									'options' => array('display_name' => 'linkedin', 'open_tag' => '\n[linkedin size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//Facebook
	$buttons[] = array('name' => 'facebook',
									'options' => array('display_name' => 'facebook', 'open_tag' => '\n[facebook size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//Rss
	$buttons[] = array('name' => 'rss',
									'options' => array('display_name' => 'rss', 'open_tag' => '\n[rss size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//Google
	$buttons[] = array('name' => 'google',
									'options' => array('display_name' => 'google', 'open_tag' => '\n[google size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//Twitter
	$buttons[] = array('name' => 'twitter',
									'options' => array('display_name' => 'twitter', 'open_tag' => '\n[twitter size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//Digg
	$buttons[] = array('name' => 'digg',
									'options' => array('display_name' => 'digg', 'open_tag' => '\n[digg size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//Delicious
	$buttons[] = array('name' => 'delicious',
									'options' => array('display_name' => 'delicious', 'open_tag' => '\n[delicious size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//myspace
	$buttons[] = array('name' => 'myspace',
									'options' => array('display_name' => 'myspace', 'open_tag' => '\n[myspace size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//picasa
	$buttons[] = array('name' => 'picasa',
									'options' => array('display_name' => 'picasa', 'open_tag' => '\n[picasa size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));

	//yahoo
	$buttons[] = array('name' => 'yahoo',
									'options' => array('display_name' => 'yahoo', 'open_tag' => '\n[yahoo size="small" style="round" link="#"]', 'close_tag' => '', 'key' => ''
					));




	//For
	for ($i=0; $i <= (count($buttons)-1); $i++) {
		$output .= "edButtons[edButtons.length] = new edButton('ed_{$buttons[$i]['name']}'
			,'{$buttons[$i]['options']['display_name']}'
			,'{$buttons[$i]['options']['open_tag']}'
			,'{$buttons[$i]['options']['close_tag']}'
			,'{$buttons[$i]['options']['key']}'
		); \n";
	}

	$output .= '  /* ]]> */'."\n";
	$output .= '</script>'."\n";
	echo $output;

}



/*-------------------------------------------------------------
~~~~~~~~Delete htmltags~~~~~~~~
-------------------------------------------------------------*/
function ht_delete_htmltags($content,$paragraph_tag=false,$br_tag=false){	
	//$content = preg_replace('#<\/p>(\s)*<p>$|^<\/p>(\s)*<p>#', '', trim($content));
	$content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);
	
	$content = preg_replace('#<br \/>#', '', $content);
	
	if ( $paragraph_tag ) $content = preg_replace('#<p>|</p>#', '', $content);
		
	return trim($content);
}


/*-------------------------------------------------------------
~~~~~~~~Content helper~~~~~~~~
-------------------------------------------------------------*/
function ht_content_helper($content,$paragraph_tag=false,$br_tag=false){
	return ht_delete_htmltags( do_shortcode(shortcode_unautop($content)), $paragraph_tag, $br_tag );
}


/*-------------------------------------------------------------
~~~~~~~~Mce Button~~~~~~~##########
-------------------------------------------------------------*/
function filter_mce_button($buttons) {
	array_push( $buttons, '|','ht_button', 'ht_icon_list', 'ht_message_box', 'ht_resized_image', 'ht_sized_image', 'ht_html5_video', 'ht_vimeo_video', 'ht_youtube_video', 'ht_flash_video', 'ht_tabs', 'ht_toggle', 'ht_pricing_column', 'ht_portfolio', 'ht_blog', 'ht_slider' );

	return $buttons;
}


/*-------------------------------------------------------------
~~~~~~~~Mce Plugin~~~~~~~~
-------------------------------------------------------------*/
function filter_mce_plugin($plugins) {	
	$plugins['ht_quicktags'] = FrameWork_Url. '/skins/js/jquery.editor.plugin.js';
	
	return $plugins;
}



/*-------------------------------------------------------------
~~~~~~~~Advanced Buttons~~~~~~~~
-------------------------------------------------------------*/
function advanced_buttons(){
?>

<script type="text/javascript">
	var defaultSettings = {},
		outputOptions = '',
		selected ='',
		content = '';

	//Botton
	defaultSettings['button'] = {
			link: {
				name: 'Link',
				defaultvalue: '#',
				description: 'Enter the url what you want to link.',
				type: 'text'
			},

			size: {
				name: 'Size',
				defaultvalue: 'medium',
				description: 'Choose the button size.',
				type: 'select',
				options: 'small|medium|large'
			},

			color: {
				name: 'Color',
				defaultvalue: 'grey',
				description: 'Choose the button color.',
				type: 'select',
				options: 'grey|royalblue|black|red|deepblue|green|orange|coffee|skyblue'
			},

			content: {
				name: 'Content',
				defaultvalue: 'Button Text',
				description: 'Enter the button text.',
				type: 'textarea'
			},

			target: {
				name: 'Target',
				defaultvalue: 'self',
				description: 'Choose the link target type.',
				type: 'select',
				options: 'self|blank'
			},
	};


	//Icon List
	defaultSettings['icon_list'] = {

			icon: {
				name: 'Icon',
				defaultvalue: 'tick',
				description: 'Choose the icon.',
				type: 'select',
				options: 'tick|save|redo|undo|error|stop|delete|info|question'
			},

			content: {
				name: 'Content',
				defaultvalue: '<ul><li>Your Text</li><li>Your Text</li><li>Your Text</li></ul>',
				description: 'Use a ul list in here.',
				type: 'textarea'
			},
	};

	//Message box 
	defaultSettings['message_box'] = {

			type: {
				name: 'Type',
				defaultvalue: 'note',
				description: 'Choose the message box type.',
				type: 'select',
				options: 'note|info|alert|error|success'
			},

			icon: {
				name: 'Icon',
				defaultvalue: 'yes',
				description: 'Enabled or disabled the icon.',
				type: 'select',
				options: 'yes|no'
			},

			close: {
				name: 'Close',
				defaultvalue: 'yes',
				description: 'Enabled or disabled the hide button.',
				type: 'select',
				options: 'yes|no'
			},

			content: {
				name: 'Content',
				defaultvalue: 'You Message Box Text.',
				description: 'Enter the text that you want to display.',
				type: 'textarea'
			},
	};

	//Resized image 
	defaultSettings['resized_image'] = {

			width: {
				name: 'Width',
				defaultvalue: '',
				description: 'Enter a number to set the image width, Leave it blank for original width.',
				type: 'text'
			},

			height: {
				name: 'Height',
				defaultvalue: '',
				description: 'Enter a number to set the image height, Leave it blank for original height.',
				type: 'text'
			},

			image: {
				name: 'Image',
				defaultvalue: '',
				description: 'Enter a url of the image file.',
				type: 'textarea'
			},

			align: {
				name: 'Align',
				defaultvalue: 'left',
				description: 'Image alignment: left, right, center.',
				type: 'select',
				options: 'left|center|right'
			},

			alt: {
				name: 'Alt',
				defaultvalue: '',
				description: 'Image description or alternate text.',
				type: 'text'
			},

			link: {
				name: 'Link',
				defaultvalue: '#',
				description: 'URL for the image link.',
				type: 'text'
			},

			lightbox: {
				name: 'Lightbox',
				defaultvalue: 'yes',
				description: 'Open link in a lightbox.',
				type: 'select',
				options: 'yes|no'
			},

			rel: {
				name: 'Rel',
				defaultvalue: '',
				description: 'Text for link’s “rel” tag. Multiple images with the same rel tag will be connected through the lightbox next/previous buttons.',
				type: 'text'
			},
	};

	//Sized image
	defaultSettings['sized_image'] = {

			size: {
				name: 'Size',
				defaultvalue: '',
				description: 'Select a image size, this is the image width.',
				type: 'select',
				options: 'small|medium|large'
			},

			height: {
				name: 'Height',
				defaultvalue: '',
				description: 'Enter a number to set the image height, Leave it blank for original height.',
				type: 'text'
			},

			image: {
				name: 'Image',
				defaultvalue: '',
				description: 'Enter a url of the image file.',
				type: 'textarea'
			},

			alt: {
				name: 'Alt',
				defaultvalue: '',
				description: 'Image description or alternate text.',
				type: 'text'
			},

			link: {
				name: 'Link',
				defaultvalue: '#',
				description: 'URL for the image link.',
				type: 'text'
			},

			lightbox: {
				name: 'Lightbox',
				defaultvalue: 'yes',
				description: 'Open link in a lightbox.',
				type: 'select',
				options: 'yes|no'
			},

			rel: {
				name: 'Rel',
				defaultvalue: '',
				description: 'Text for link’s “rel” tag. Multiple images with the same rel tag will be connected through the lightbox next/previous buttons.',
				type: 'text'
			},
	};

	//Html5 Video
	defaultSettings['html5_video'] = {

			poster: {
				name: 'Poster Image',
				defaultvalue: '',
				description: 'The poster image is placeholder for the video before it plays. It is also used as the image fallback for devices that don not support HTML5 Video or Flash.',
				type: 'text'
			},

			mp4: {
				name: 'MP4 Source',
				defaultvalue: '',
				description: 'Supported by Webkit browsers (Safari, Chrome, iPhone/iPad) and Internet Explorer 9. Also supported by Flash 9 and higher, so can double as the Flash source.',
				type: 'text'
			},

			webm: {
				name: 'Webm Source',
				defaultvalue: '',
				description: 'Supported by newer versions of Firefox, Chrome, and Opera.',
				type: 'text'
			},

			ogg: {
				name: 'Ogg Source',
				defaultvalue: '',
				description: 'Supported by Firefox, Opera, Chrome, and newer versions of Safari. Unfortunately it is not as good as WebM and MP4.',
				type: 'text'
			},

			width: {
				name: 'Width',
				defaultvalue: '460',
				description: '',
				type: 'text'
			},

			height: {
				name: 'Height',
				defaultvalue: '260',
				description: '',
				type: 'text'
			},

			preload: {
				name: 'Preload',
				defaultvalue: 'no',
				description: 'Select this if you want the video to start downloading as soon the user loads the page.',
				type: 'select',
				options: 'yes|no'
			},

			autoplay: {
				name: 'Autoplay',
				defaultvalue: 'no',
				description: 'Select this if you want the video to start playing as soon as the page is loaded.',
				type: 'select',
				options: 'yes|no'
			},

	};

	//Vimeo Video
	defaultSettings['vimeo_video'] = {

			clip_id: {
				name: 'Clip_id',
				defaultvalue: '',
				description: 'the number from the clip is URL (e.g. http://vimeo.com/123456)',
				type: 'text'
			},

			width: {
				name: 'Width',
				defaultvalue: '460',
				description: '',
				type: 'text'
			},

			height: {
				name: 'Height',
				defaultvalue: '260',
				description: '',
				type: 'text'
			},

	};

	//Youtube Video
	defaultSettings['youtube_video'] = {

			clip_id: {
				name: 'Clip_id',
				defaultvalue: '',
				description: 'the number from the clip is URL (e.g. http://www.youtube.com/watch?v=2DclLrdaxQd)',
				type: 'text'
			},

			width: {
				name: 'Width',
				defaultvalue: '460',
				description: '',
				type: 'text'
			},

			height: {
				name: 'Height',
				defaultvalue: '260',
				description: '',
				type: 'text'
			},
	};

	//Flash Video
	defaultSettings['flash_video'] = {

			src: {
				name: 'Src',
				defaultvalue: '',
				description: 'Specifies the location (URL) of the movie to be loaded.',
				type: 'text'
			},

			width: {
				name: 'Width',
				defaultvalue: '460',
				description: '',
				type: 'text'
			},

			height: {
				name: 'Height',
				defaultvalue: '260',
				description: '',
				type: 'text'
			},

			play: {
				name: 'Play',
				defaultvalue: 'no',
				description: 'Select this if you want the video to start playing as soon as the page is loaded.',
				type: 'select',
				options: 'yes|no'
			},
	};

	//Tabs
	defaultSettings['tabs'] = {
			tabtype: {
				name: 'Tab Type',
				defaultvalue: 'fade',
				description: 'Select Slider Type here',
				type: 'select',
				options: 'top tabs|left tabs'
			},
			tabtext: {
				name: 'Tab Text',
				defaultvalue: 'Title goes here',
				description: '',
				type: 'text',
				clone: 'cloned'
			},
			tabcontent: {
				name: 'Tab Content',
				defaultvalue: 'Content goes here',
				description: '',
				type: 'textarea',
				clone: 'cloned'
			}
		};

		//Flash Video
		defaultSettings['toggle'] = {
			title: {
				name: 'Title',
				defaultvalue: 'Title goes here',
				description: 'Caption title goes here',
				type: 'text'
			},
			content: {
				name: 'Content',
				defaultvalue: 'Content goes here',
				description: 'Content text or html',
				type: 'textarea'
			}
		};

		//Pricing Column
		defaultSettings['pricing_column'] = {
			title: {
				name: 'Title',
				defaultvalue: 'Table Title',
				description: '',
				type: 'text'
			},

			price: {
				name: 'Price',
				defaultvalue: '$19.95',
				description: '',
				type: 'text'
			},

			time: {
				name: 'Time',
				defaultvalue: '1 month',
				description: '',
				type: 'text'
			},

			link: {
				name: 'Button Link',
				defaultvalue: '#',
				description: 'Enter the url what you want to link.',
				type: 'text'
			},

			text: {
				name: 'Button Text',
				defaultvalue: 'Button Text',
				description: 'Enter the button text.',
				type: 'textarea'
			},

			target: {
				name: 'Target',
				defaultvalue: 'self',
				description: 'Choose the link target type.',
				type: 'select',
				options: 'self|blank'
			},

			last: {
				name: 'Last Column',
				defaultvalue: 'no',
				description: 'Set last column have no margin.',
				type: 'select',
				options: 'yes|no'
			},

			content: {
				name: 'Content',
				defaultvalue: '<ul><li>Item description and details...</li><li>Some more info...</li></ul>',
				description: '',
				type: 'textarea'
			},

		};

		//Portfolio
		defaultSettings['portfolio'] = {

			category: {
				name: 'Category',
				defaultvalue: '',
				description: 'If you display all the categories, leave it blank. If you want to display some category, you can enter the name of category here. And the categories must be in this type. Separate categories with commas. Ex: Answers, News',
				type: 'textarea'
			},

			columns: {
				name: 'Columns',
				defaultvalue: '3',
				description: 'Choose the columns for portfolios.',
				type: 'select',
				options: '2|3|4'
			},

			showposts: {
				name: 'Showposts',
				defaultvalue: '',
				description: 'Enter the number to set the showposts.',
				type: 'text'
			},

			orderby: {
				name: 'Orderby',
				defaultvalue: 'date',
				description: '',
				type: 'select',
				options: 'date|comment_count|rand'
			},

			title: {
				name: 'Title',
				defaultvalue: 'yes',
				description: 'Enabled or disabled title.',
				type: 'select',
				options: 'yes|no'
			},

			excerpt: {
				name: 'Excerpt',
				defaultvalue: 'yes',
				description: 'Enabled or disabled excerpt.',
				type: 'select',
				options: 'yes|no'
			},

			excerpt_length: {
				name: 'Excerpt Length',
				defaultvalue: '',
				description: 'Enter the number to set the excerpt.',
				type: 'text'
			},

		};

		//Blog
		defaultSettings['blog'] = {

			category: {
				name: 'Category',
				defaultvalue: '',
				description: 'If you display all the categories, leave it blank. If you want to display some category, you can enter the name of category here. And the categories must be in this type. Separate categories with commas. Ex: Answers, News',
				type: 'textarea'
			},

			columns: {
				name: 'Columns',
				defaultvalue: '3',
				description: 'Choose the columns for blog.',
				type: 'select',
				options: '2|3|4'
			},

			showposts: {
				name: 'Showposts',
				defaultvalue: '',
				description: 'Enter the number to set the showposts.',
				type: 'text'
			},

			orderby: {
				name: 'Orderby',
				defaultvalue: 'date',
				description: '',
				type: 'select',
				options: 'date|comment_count|rand'
			},

			image: {
				name: 'Image',
				defaultvalue: 'yes',
				description: 'Enabled or disabled image.',
				type: 'select',
				options: 'yes|no'
			},

			title: {
				name: 'Title',
				defaultvalue: 'yes',
				description: 'Enabled or disabled title.',
				type: 'select',
				options: 'yes|no'
			},

			excerpt: {
				name: 'Excerpt',
				defaultvalue: 'yes',
				description: 'Enabled or disabled excerpt.',
				type: 'select',
				options: 'yes|no'
			},

			excerpt_length: {
				name: 'Excerpt Length',
				defaultvalue: '',
				description: 'Enter the number to set the excerpt.',
				type: 'text'
			},
		};

		//Slider
		defaultSettings['slider'] = {

			width: {
				name: 'Width',
				defaultvalue: '',
				description: 'Enter the width for slider. Default width is 910px.',
				type: 'text'
			},

			height: {
				name: 'Height',
				defaultvalue: '',
				description: 'Enter the height for slider. Default height is 350px.',
				type: 'text'
			},

			effect: {
				name: 'Effect',
				defaultvalue: 'random',
				description: 'Use this option to change the slide effect mode.',
				type: 'select',
			    options:'sliceDown|sliceDownLeft|sliceUp|sliceUpLeft|sliceUpDown|sliceUpDownLeft|fold|fade|random|slideInRight|slideInLeft|boxRandom|boxRain|boxRainReverse|boxRainGrow|boxRainGrowReverse'
			},

			speed: {
				name: 'Speed',
				defaultvalue: '500',
				description: 'Select the number for the slider speed. The unit is millisecond.',
				type: 'text'
			},

			delay: {
				name: 'Delay',
				defaultvalue: '3000',
				description: 'Select the number for the slider delay. The unit is millisecond.',
				type: 'text'
			},

			image_one: {
				name: 'Image 1 ID:',
				defaultvalue: '',
				description: 'Enter the image attachment ID. You can find it in the Media Library.',
				type: 'text'
			},

			image_two: {
				name: 'Image 2 ID:',
				defaultvalue: '',
				description: 'Enter the image attachment ID. You can find it in the Media Library.',
				type: 'text'
			},

			image_three: {
				name: 'Image 3 ID:',
				defaultvalue: '',
				description: 'Enter the image attachment ID. You can find it in the Media Library.',
				type: 'text'
			},

			image_four: {
				name: 'Image 4 ID:',
				defaultvalue: '',
				description: 'Enter the image attachment ID. You can find it in the Media Library.',
				type: 'text'
			},

			image_five: {
				name: 'Image 5 ID:',
				defaultvalue: '',
				description: 'Enter the image attachment ID. You can find it in the Media Library.',
				type: 'text'
			},

		};


//Functions
function CustomButtonClick(tag){
			
			var index = tag;
			
				for (var index2 in defaultSettings[index]) {
					if (defaultSettings[index][index2]['clone'] === 'cloned')
						outputOptions += '<tr class="cloned">\n';
					else if (index === 'button' && index2 === 'icon')
						outputOptions += '<tr class="hidden">\n';
					else
						outputOptions += '<tr>\n';
					outputOptions += '<th><label for="ht-' + index2 + '">'+ defaultSettings[index][index2]['name'] +'</label></th>\n';
					outputOptions += '<td>';
					
					if (defaultSettings[index][index2]['type'] === 'select') {
						var optionsArray = defaultSettings[index][index2]['options'].split('|');
						
						outputOptions += '\n<select name="ht-'+index2+'" id="ht-'+index2+'">\n';
						
						for (var index3 in optionsArray) {
							selected = (optionsArray[index3] === defaultSettings[index][index2]['defaultvalue']) ? ' selected="selected"' : '';
							outputOptions += '<option value="'+optionsArray[index3]+'"'+ selected +'>'+optionsArray[index3]+'</option>\n';
						}
						
						outputOptions += '</select>\n';
					}
					
					if (defaultSettings[index][index2]['type'] === 'text') {
						cloned = '';
						if (defaultSettings[index][index2]['clone'] === 'cloned') cloned = "[]";
						outputOptions += '\n<input type="text" name="ht-'+index2+cloned+'" id="ht-'+index2+'" value="'+defaultSettings[index][index2]['defaultvalue']+'" />\n';
					}
					
					if (defaultSettings[index][index2]['type'] === 'textarea') {
						cloned = '';
						if (defaultSettings[index][index2]['clone'] === 'cloned') cloned = "[]";
						outputOptions += '<textarea name="ht-'+index2+cloned+'" id="ht-'+index2+'" cols="40" rows="10">'+defaultSettings[index][index2]['defaultvalue']+'</textarea>';
					}
					
					outputOptions += '\n<br/><small>'+ defaultSettings[index][index2]['description'] +'</small>';
					outputOptions += '\n</td>';
					
				}
			
		
			var width = jQuery(window).width(),
				tbHeight = jQuery(window).height(),
				tbWidth = ( 720 < width ) ? 720 : width;
			
			tbWidth = tbWidth - 80;
			tbHeight = tbHeight - 84;

			var tbOptions = "<div id='ht_shortcodes_div'><form id='ht_shortcodes'><table id='shortcodes_table' class='form-table ht-"+ tag +"'>";
			tbOptions += outputOptions;
			tbOptions += '</table>\n<p class="submit">\n<input type="button" id="shortcodes-submit" class="button-primary" value="Ok" name="submit" /></p>\n</form></div>';
			
			var form = jQuery(tbOptions);
			
			var table = form.find('table');
			form.appendTo('body').hide();

			if (tag === 'tabs') {
				$moreTabs = jQuery('<p><a href="#" id="ht_add_more_tabs">+ Add One More Tab</a></p>').appendTo('form#ht_shortcodes tbody');
				$moreTabsLink = jQuery('a#ht_add_more_tabs');
				
				$moreTabsLink.live('click',function() {
					var clonedElements = jQuery('form#ht_shortcodes .cloned');
										
					newElements = clonedElements.slice(0,2).clone();
								
					var cloneNumber = clonedElements.length,
						labelNum = cloneNumber / 2;
					
					newElements.each(function(index){
						if ( index === 0 ) jQuery(this).css({'border-top':'1px solid #eeeeee'});
						
						var label = jQuery(this).find('label').attr('for'),
							newLabel = label + labelNum;
					
						jQuery(this).find('label').attr('for',newLabel);
						jQuery(this).find('input, textarea').attr('id',newLabel);
					});
					
					newElements.appendTo('form#ht_shortcodes tbody');
					$moreTabs.appendTo('form#ht_shortcodes tbody');
					return false;
				});		
			}
			
			
			form.find('#shortcodes-submit').click(function(){
							
				var shortcode = '['+tag;
								
				for( var index in defaultSettings[tag]) {
					var value = table.find('#ht-' + index).val();
					if (index === 'content') { 
						content = value;
						continue;
					}
					
					if (defaultSettings[tag][index]['clone'] !== undefined) {
						content = 'cloned';
						continue;
					} 
					
					if ( value !== defaultSettings[tag][index]['defaultvalue'] )
						shortcode += ' ' + index + '="' + value + '"';
						
				}
				
				var $ht_slidertype = jQuery('#ht-slidertype').val();
				
				shortcode += '] ' + "\n";
				
				if (content != '') {
					
					if (tag === 'tabs') {
					
						var $ht_form = jQuery('form#ht_shortcodes'),
							tabsOutput = '',
							$ht_slidertype = jQuery('#ht-slidertype').val();
						
						if ($ht_slidertype === 'images') {
							prefix = 'image';
							dimensions = ' width="' + jQuery('#ht-imagewidth').val() + '"'+' height="' + jQuery('#ht-imageheight').val() + '"';
						} else {
							prefix = '';
							dimensions = '';
						}
						
						tabsOutput += '['+prefix+'tabcontainer]\n';
						$ht_form.find("input[name='ht-tabtext[]']").each(function(){
							tabsOutput += '['+prefix+'tabtext]'+jQuery(this).val()+'[/'+prefix+'tabtext]\n';
						});
						tabsOutput += '[/'+prefix+'tabcontainer]\n';						
						
						if ($ht_slidertype === 'simple' || $ht_slidertype === 'images') tabsOutput = '';
						
						if ($ht_slidertype != 'simple' && $ht_slidertype != 'images') tabsOutput += '[tabcontent]\n';
						$ht_form.find("textarea[name='ht-tabcontent[]']").each(function(){
							tabsOutput += '['+prefix+'tab'+dimensions+']'+jQuery(this).val()+'[/'+prefix+'tab]'+"\n";
						});
						
						if ($ht_slidertype != 'simple' && $ht_slidertype != 'images') tabsOutput += '[/tabcontent]\n';
						
						content = tabsOutput;
					}

					shortcode += content;
					shortcode += '[/'+tag+'] ' + "\n";
				}

				tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode + ' ');
				
				tb_remove();
			});
			
			tb_show( 'HT ' + tag + ' Shortcode', '#TB_inline?width=' + tbWidth + '&height=' + tbHeight + '&inlineId=ht_shortcodes_div' );
			jQuery('#ht_shortcodes_div').remove();
			outputOptions = '';
		}
		
</script>
<?php
}

?>