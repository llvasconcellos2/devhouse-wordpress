<?php
/*******************************************************************************
 * Hawk Metaboxes TPYE FrameWork
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
$meta_boxes_type = array(
	 
	  array("id" => "posts_format",
				 "name" => "Type",
				 "type" => "select",
				 "options" => array('Normal','Image', 'Video'),
				 "std" => "Normal",
				 "desc" => "Set the article type,this will change the lists thumb link.",
				),

	 array("id" => "video_link",
				"name" => "Video Url",
				"type" => "textarea",
				"std" => "",
				"desc" => "If you set the type of video, you must enter the video url here.",
			)

);

?>