<?php
/*******************************************************************************
 *This file sets up the the custom widgets,
 * This widget area is used to store social media section.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~~~Class Widget~~~~~~~~~~~~~
Name:Social Media
Slug: social media
-------------------------------------------------------------*/
class Social_Media_Widget extends WP_Widget{

	/** Construction function**/
	function Social_Media_Widget(){
		global $themename, $shortname;
		$title_ops = __($themename.'&raquo; Social Media','hawktheme');
		$widget_ops = array('classname'=>'widget-social-media','description'=>__('This is a social media section.','hawktheme'));
		$control_ops = array('width'=>450);
		$this->WP_Widget($shortname. '_social_media',$title_ops,$widget_ops,$control_ops);
	}


	/** Function defined form**/
	function form($instance){
		$feed_default = esc_attr( get_bloginfo('rss2_url') );
		$instance = wp_parse_args((array)$instance,array(
			'title' => __('Social Media','hawktheme'),
			'rss' => $feed_default,
			'twitter' => '',
			'linkedin' => '',
			'facebook' => '',
			'digg' => '',
			'flickr' => '',
			'delicious' => '',
			'stumble' => '',
			'youtube' => '',
			'myspace' => ''
		));
		$title = htmlspecialchars($instance['title']);
		$rss = $instance['rss'];
		$twitter = $instance['twitter'];
		$linkedin = $instance['linkedin'];
		$facebook = $instance['facebook'];
		$digg = $instance['digg'];
		$flickr = $instance['flickr'];
		$delicious = $instance['delicious'];
		$stumble = $instance['stumble'];
		$youtube = $instance['youtube'];
		$myspace = $instance['myspace'];

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('title').'">'; _e('Title:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('rss').'">'; _e('Rss:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('rss').'" name="'.$this->get_field_name('rss').'" type="text" value="'.$rss.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('twitter').'">'; _e('Twitter:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('twitter').'" name="'.$this->get_field_name('twitter').'" type="text" value="'.$twitter.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('linkedin').'">'; _e('Iinkedin:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('linkedin').'" name="'.$this->get_field_name('linkedin').'" type="text" value="'.$linkedin.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('facebook').'">'; _e('Facebook:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('facebook').'" name="'.$this->get_field_name('facebook').'" type="text" value="'.$facebook.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('digg').'">'; _e('Digg:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('digg').'" name="'.$this->get_field_name('digg').'" type="text" value="'.$digg.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('flickr').'">'; _e('Flickr:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('flickr').'" name="'.$this->get_field_name('flickr').'" type="text" value="'.$flickr.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('delicious').'">'; _e('Delicious:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('delicious').'" name="'.$this->get_field_name('delicious').'" type="text" value="'.$delicious.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('stumble').'">'; _e('Stumble:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('stumble').'" name="'.$this->get_field_name('stumble').'" type="text" value="'.$stumble.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('youtube').'">'; _e('Youtube:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('youtube').'" name="'.$this->get_field_name('youtube').'" type="text" value="'.$youtube.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('myspace').'">'; _e('Myspace:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('myspace').'" name="'.$this->get_field_name('myspace').'" type="text" value="'.$myspace.'" />';
		echo '</div>';

	}


	/** Function defined update**/
	function update($new_instance,$old_instance){
		$instance = $old_instance;
	    $instance['title'] = strip_tags($new_instance['title']);
		$instance['rss'] = stripslashes($new_instance['rss']);
		$instance['twitter'] = stripslashes($new_instance['twitter']);
		$instance['linkedin'] = stripslashes($new_instance['linkedin']);
		$instance['facebook'] = stripslashes($new_instance['facebook']);
		$instance['digg'] = stripslashes($new_instance['digg']);
		$instance['flickr'] = stripslashes($new_instance['flickr']);
		$instance['delicious'] = stripslashes($new_instance['delicious']);
		$instance['stumble'] = stripslashes($new_instance['stumble']);
		$instance['youtube'] = stripslashes($new_instance['youtube']);
		$instance['myspace'] = stripslashes($new_instance['myspace']);
		return $instance;
	}


	/** Definition of widget function that displays a web page**/
	function widget($args,$instance){
		extract($args);
		$title = $instance['title'];
		$rss = $instance['rss'];
		$twitter = $instance['twitter'];
		$linkedin = $instance['linkedin'];
		$facebook = $instance['facebook'];
		$digg = $instance['digg'];
		$flickr = $instance['flickr'];
		$delicious = $instance['delicious'];
		$stumble = $instance['stumble'];
		$youtube = $instance['youtube'];
		$myspace = $instance['myspace'];

		echo $before_widget; 
		if($title) { echo $before_title . $title . $after_title; }

		echo '<div class="media-box">';

		if($rss) { echo '<a href="'.$rss.'" rel="external" class="rss">'; _e('rss','hawktheme'); echo '</a>'; }
		if($twitter) { echo '<a href="'.$twitter.'" rel="external" class="twitter">'; _e('twitter','hawktheme'); echo '</a>'; }
		if($linkedin) { echo '<a href="'.$linkedin.'" rel="external" class="linkedin">'; _e('linkedin','hawktheme'); echo '</a>'; }
		if($facebook) { echo '<a href="'.$facebook.'" rel="external" class="facebook">'; _e('facebook','hawktheme'); echo '</a>'; }
		if($digg) { echo '<a href="'.$digg.'" rel="external" class="digg">'; _e('digg','hawktheme'); echo '</a>'; }
		if($flickr) { echo '<a href="'.$flickr.'" rel="external" class="flickr">'; _e('flickr','hawktheme'); echo '</a>'; }
		if($delicious) { echo '<a href="'.$delicious.'" rel="external" class="delicious">'; _e('delicious','hawktheme'); echo '</a>'; }
		if($stumble) { echo '<a href="'.$stumble.'" rel="external" class="stumble">'; _e('stumble','hawktheme'); echo '</a>'; }
		if($youtube) { echo '<a href="'.$youtube.'" rel="external" class="youtube">'; _e('youtube','hawktheme'); echo '</a>'; }
		if($myspace) { echo '<a href="'.$myspace.'" rel="external" class="myspace">'; _e('myspace','hawktheme'); echo '</a>'; }

		echo '</div>';

		echo $after_widget; 
	}

}

?>