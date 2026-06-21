<?php
/*******************************************************************************
 *This file sets up the the custom widgets,
 * This widget area is used to store feature services section.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~~~Class Widget~~~~~~~~~~~~~
Name:Feature_Services
Slug: feature_service
-------------------------------------------------------------*/
class Feature_Services_Widget extends WP_Widget{

	/** Construction function**/
	function Feature_Services_Widget(){
		global $themename, $shortname;
		$title_ops = __($themename.'&raquo; Feature Services','hawktheme');
		$widget_ops = array('classname'=>'widget-feature-service','description'=>__('This is a feature service section. Just use for feature service widget area.','hawktheme'));
		$control_ops = array('width'=>450);
		$this->WP_Widget($shortname. '_feature_service',$title_ops,$widget_ops,$control_ops);
	}


	/** Function defined form**/
	function form($instance){
		$instance = wp_parse_args((array)$instance,array(
			'title'=> '',
			'link'=> '',
			'description'=> '',
			'icon'=> ''
		));

		$title = htmlspecialchars($instance['title']);
		$link = $instance['link'];
		$description = $instance['description'];
		$icon = $instance['icon'];
		$icon_id = $this->get_field_id('icon');

		echo '<div class="ht-widget-wrap ht-widget-upload">';
		echo '<label for="'.$this->get_field_id('icon').'">'; _e('Icon:','hawktheme'); echo'</label>';
		echo $output = hawktheme_uploader($icon_id,null,null);
		echo '<p class="ht-description">';  
		_e('If you can not upload, please refresh your browser before uploading!','hawktheme');
		echo '</p>';
		echo '</div>';
		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('title').'">'; _e('Title:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" />';
		echo '</div>';
		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('link').'">'; _e('Link:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('link').'" name="'.$this->get_field_name('link').'" type="text" value="'.$link.'" />';
		echo '</div>';
		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('description').'">'; _e('Description:','hawktheme'); echo'</label>';
		echo '<textarea  id="'.$this->get_field_id('description').'" name="'.$this->get_field_name('description').'"  rows="3">'.$description.'</textarea>';
		echo '</div>';

	}


	/** Function defined update**/
	function update($new_instance,$old_instance){

		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['link'] = stripslashes($new_instance['link']);
		$instance['description'] = stripslashes($new_instance['description']);
		$instance['icon'] = stripslashes($new_instance['icon']);

		return $instance;
	}


	/** Definition of widget function that displays a web page**/
	function widget($args,$instance){
		extract($args);
		$title = $instance['title'];
		$link = $instance['link'];
		$description = $instance['description'];
		$icon_id = $this->get_field_id('icon');
		$icon = get_option($icon_id);

		echo $before_widget; 
		echo '<div class="feature-service-info">'."\n";

		if($icon != '') {
			echo '<img src="'.$icon.'" alt="'.$title.'" class="alignleft" />'."\n";
		}

		if($link != '') {
			echo '<h4><a href="'.$link.'">'.$title.'</a></h4>'."\n";
		}else{
			echo '<h4>'.$title.'</h4>'."\n";
		}

		echo '<p>'.$description.'</p>'."\n";
		echo '</div>'."\n";
		echo $after_widget; 

	}

}// end Class

?>