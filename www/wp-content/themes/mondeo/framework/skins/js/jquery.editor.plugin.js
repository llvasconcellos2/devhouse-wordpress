(function(){
	tinymce.create('tinymce.plugins.htquicktags', {
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished it's initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {
			ed.addButton('ht_button', {
				title : 'Add Button Shortcode',
				image : url + '/../images/shortcode/ico-button.png',
				onclick : function() {
					CustomButtonClick('button');
				}
			});

			ed.addButton('ht_icon_list', {
				title : 'Add Icon List Shortcode',
				image : url + '/../images/shortcode/ico-iconlist.png',
				onclick : function() {
					CustomButtonClick('icon_list');
				}
			});

			ed.addButton('ht_message_box', {
				title : 'Add Message Box  Shortcode',
				image : url + '/../images/shortcode/ico-messagebox.png',
				onclick : function() {
					CustomButtonClick('message_box');
				}
			});

			ed.addButton('ht_resized_image', {
				title : 'Add A Resized Image  Shortcode',
				image : url + '/../images/shortcode/ico-resized-image.png',
				onclick : function() {
					CustomButtonClick('resized_image');
				}
			});

			ed.addButton('ht_sized_image', {
				title : 'Add A Sized Image  Shortcode',
				image : url + '/../images/shortcode/ico-sized-image.png',
				onclick : function() {
					CustomButtonClick('sized_image');
				}
			});

			ed.addButton('ht_html5_video', {
				title : 'Add A Html5 Video  Shortcode',
				image : url + '/../images/shortcode/ico-video-html5.png',
				onclick : function() {
					CustomButtonClick('html5_video');
				}
			});

			ed.addButton('ht_vimeo_video', {
				title : 'Add A Vimeo Video Shortcode',
				image : url + '/../images/shortcode/ico-video-vimeo.png',
				onclick : function() {
					CustomButtonClick('vimeo_video');
				}
			});

			ed.addButton('ht_youtube_video', {
				title : 'Add A Youtube Video Shortcode',
				image : url + '/../images/shortcode/ico-video-youtube.png',
				onclick : function() {
					CustomButtonClick('youtube_video');
				}
			});

			ed.addButton('ht_flash_video', {
				title : 'Add A Flash Video Shortcode',
				image : url + '/../images/shortcode/ico-video-flash.png',
				onclick : function() {
					CustomButtonClick('flash_video');
				}
			});

			ed.addButton('ht_tabs', {
				title : 'Add A Tabs Shortcode',
				image : url + '/../images/shortcode/ico-tabs.png',
				onclick : function() {
					CustomButtonClick('tabs');
				}
			});

			ed.addButton('ht_toggle', {
				title : 'Add A FAQ Shortcode',
				image : url + '/../images/shortcode/ico-toggles.png',
				onclick : function() {
					CustomButtonClick('toggle');
				}
			});

			ed.addButton('ht_pricing_column', {
				title : 'Add A Pricing Table Shortcode',
				image : url + '/../images/shortcode/ico-pricing.png',
				onclick : function() {
					CustomButtonClick('pricing_column');
				}
			});

			ed.addButton('ht_portfolio', {
				title : 'Add A Portfolio Shortcode',
				image : url + '/../images/shortcode/ico-portfolio.png',
				onclick : function() {
					CustomButtonClick('portfolio');
				}
			});

			ed.addButton('ht_blog', {
				title : 'Add A Blog Shortcode',
				image : url + '/../images/shortcode/ico-blog.png',
				onclick : function() {
					CustomButtonClick('blog');
				}
			});

			ed.addButton('ht_slider', {
				title : 'Add A Slider Shortcode',
				image : url + '/../images/shortcode/ico-slider.png',
				onclick : function() {
					CustomButtonClick('slider');
				}
			});
		},
		/**
		 * Creates control instances based in the incomming name. This method is normally not
		 * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
		 * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
		 * method can be used to create those.
		 *
		 * @param {String} n Name of the control to create.
		 * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
		 * @return {tinymce.ui.Control} New control instance or null if no control was created.
		 */
		createControl : function(n, cm) {
			return null;
		},

		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function() {
			return {
				longname : "HawkTheme Shortcodes",
				author : 'HawkTheme',
				authorurl : 'http://www.hawktheme.com/',
				infourl : 'http://www.hawktheme.com/',
				version : "1.0"
			};
		}
	});
	
	tinymce.PluginManager.add('ht_quicktags', tinymce.plugins.htquicktags);
})()