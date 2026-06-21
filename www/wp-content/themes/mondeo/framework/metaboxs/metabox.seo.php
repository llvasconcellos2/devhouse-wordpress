<?php
/*******************************************************************************
 * Hawk Metaboxes SEO FrameWork
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
$meta_boxes_seo = array(

	 array("id" => "seo_title",
				"name" => "Title Tags",
				"type" => "text",
				"std" => "",
				"desc" => "Enter in the title as you'd like to be displayed. <br /><b>Ex:</b>&lt;title&gt;Your title ends up here&lt;/title&gt;",
			),


	 array("id" => "seo_keywords",
				"name" => "Meta Keywords",
				"type" => "textarea",
				"std" => "",
				"desc" => "Enter a comma-separated list of keywords you'd like to associate with this page.<br /><b>Ex:</b>&lt;meta name='keywords' content='keyword1, keyword2, keyword3' /&gt;",
			),

	 array("id" => "seo_description",
				"name" => "Meta Description",
				"type" => "textarea",
				"std" => "",
				"desc" => "Enter a description you'd like to associate with this page.<br /><b>Ex:</b>&lt;meta name='description' content='This is your SEO description of your site.' /&gt;",
			)

	//array("id" => "posttype",
			 // "name" => "Post type",
			 // "type" => "select",
			 //"options" => array("iPhone", "fullsize"),
			 // "std" => "iPhone",
			 // "desc" => "Featured posts - If using the jQuery slider, choose iPhone for an iPhone post and fullsize for a full image",
			//)
);

?>