<?php
/*******************************************************************************
 *This file sets up the the custom widgets,
 * This widget area is used to store ads section.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~~~Class Widget~~~~~~~~~~~~~
Name:Ads
Slug: ads
-------------------------------------------------------------*/
class Ads_Widget extends WP_Widget{

	/** Construction function**/
	function Ads_Widget(){
		global $themename, $shortname;
		$title_ops = __($themename.'&raquo; Ads 125*125','hawktheme');
		$widget_ops = array('classname'=>'widget-ads','description'=>__('This widget will display a advertise section.','hawktheme'));
		$control_ops = array('width'=>600);
		$this->WP_Widget($shortname. '_ads_125',$title_ops,$widget_ops,$control_ops);
	}


	/** Function defined form**/
	function form($instance){
		$instance = wp_parse_args((array)$instance,array(
			'title'=> 'Ads',
			'title_1'=> '', 'link_1'=> '', 'image_url_1' => '',
			'title_2'=> '', 'link_2'=> '', 'image_url_2' => '',
			'title_3'=> '', 'link_3'=> '', 'image_url_3' => '',
			'title_4'=> '', 'link_4'=> '', 'image_url_4' => ''
		));
		$title = htmlspecialchars($instance['title']);
		$title_1 = htmlspecialchars($instance['title_1']);
		$link_1 = $instance['link_1'];
		$image_url_1 = $instance['image_url_1'];
		$image_url_id_1 = $this->get_field_id('image_url_1');
		$title_2 = htmlspecialchars($instance['title_2']);
		$link_2 = $instance['link_2'];
		$image_url_2 = $instance['image_url_2'];
		$image_url_id_2 = $this->get_field_id('image_url_2');
		$title_3 = htmlspecialchars($instance['title_3']);
		$link_3 = $instance['link_3'];
		$image_url_3 = $instance['image_url_3'];
		$image_url_id_3 = $this->get_field_id('image_url_3');
		$title_4 = htmlspecialchars($instance['title_4']);
		$link_4 = $instance['link_4'];
		$image_url_4 = $instance['image_url_4'];
		$image_url_id_4 = $this->get_field_id('image_url_4');

		echo '<div class="ht-widget-wrap ht-widget-ads">';
		echo '<label for="'.$this->get_field_id('title').'">'; _e('Title:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" />';
		echo '</div>';

		echo '<div class="ht-ads-title">'; _e('Ads One','hawktheme'); echo '</div>';
		echo '<div class="ht-ads-wrap">';
				echo '<div class="ht-widget-wrap">';
				echo '<label for="'.$this->get_field_id('title_1').'">'; _e('Title:','hawktheme'); echo'</label>';
				echo '<input  id="'.$this->get_field_id('title_1').'" name="'.$this->get_field_name('title_1').'" type="text" value="'.$title_1.'" />';
				echo '</div>';
				echo '<div class="ht-widget-wrap ht-widget-upload">';
				echo '<label for="'.$this->get_field_id('image_url_1').'">'; _e('Image url :','hawktheme'); echo'</label>';
				echo $output = hawktheme_uploader($image_url_id_1,null,null);
				echo '<p class="ht-description">';  
				_e('If you can not upload, please refresh your browser before uploading!','hawktheme');
				echo '</p>';
				echo '</div>';
				echo '<div class="ht-widget-wrap">';
				echo '<label for="'.$this->get_field_id('link_1').'">'; _e('Link:','hawktheme'); echo'</label>';
				echo '<input  id="'.$this->get_field_id('link_1').'" name="'.$this->get_field_name('link_1').'" type="text" value="'.$link_1.'" />';
				echo '</div>';
		echo '</div>';

		echo '<div class="ht-ads-title">'; _e('Ads Two','hawktheme'); echo '</div>';
		echo '<div class="ht-ads-wrap">';
				echo '<div class="ht-widget-wrap">';
				echo '<label for="'.$this->get_field_id('title_2').'">'; _e('Title:','hawktheme'); echo'</label>';
				echo '<input  id="'.$this->get_field_id('title_2').'" name="'.$this->get_field_name('title_2').'" type="text" value="'.$title_2.'" />';
				echo '</div>';
				echo '<div class="ht-widget-wrap ht-widget-upload">';
				echo '<label for="'.$this->get_field_id('image_url_2').'">'; _e('Image url :','hawktheme'); echo'</label>';
				echo $output = hawktheme_uploader($image_url_id_2,null,null);
				echo '<p class="ht-description">';  
				_e('If you can not upload, please refresh your browser before uploading!','hawktheme');
				echo '</p>';
				echo '</div>';
				echo '<div class="ht-widget-wrap">';
				echo '<label for="'.$this->get_field_id('link_2').'">'; _e('Link:','hawktheme'); echo'</label>';
				echo '<input  id="'.$this->get_field_id('link_2').'" name="'.$this->get_field_name('link_2').'" type="text" value="'.$link_2.'" />';
				echo '</div>';
		echo '</div>';

		echo '<div class="ht-ads-title">'; _e('Ads Three','hawktheme'); echo '</div>';
		echo '<div class="ht-ads-wrap">';
				echo '<div class="ht-widget-wrap">';
				echo '<label for="'.$this->get_field_id('title_3').'">'; _e('Title:','hawktheme'); echo'</label>';
				echo '<input  id="'.$this->get_field_id('title_3').'" name="'.$this->get_field_name('title_3').'" type="text" value="'.$title_3.'" />';
				echo '</div>';
				echo '<div class="ht-widget-wrap ht-widget-upload">';
				echo '<label for="'.$this->get_field_id('image_url_3').'">'; _e('Image url :','hawktheme'); echo'</label>';
				echo $output = hawktheme_uploader($image_url_id_3,null,null);
				echo '<p class="ht-description">';  
				_e('If you can not upload, please refresh your browser before uploading!','hawktheme');
				echo '</p>';
				echo '</div>';
				echo '<div class="ht-widget-wrap">';
				echo '<label for="'.$this->get_field_id('link_3').'">'; _e('Link:','hawktheme'); echo'</label>';
				echo '<input  id="'.$this->get_field_id('link_3').'" name="'.$this->get_field_name('link_3').'" type="text" value="'.$link_3.'" />';
				echo '</div>';
		echo '</div>';

		echo '<div class="ht-ads-title">'; _e('Ads Four','hawktheme'); echo '</div>';
		echo '<div class="ht-ads-wrap">';
				echo '<div class="ht-widget-wrap">';
				echo '<label for="'.$this->get_field_id('title_4').'">'; _e('Title:','hawktheme'); echo'</label>';
				echo '<input  id="'.$this->get_field_id('title_4').'" name="'.$this->get_field_name('title_4').'" type="text" value="'.$title_4.'" />';
				echo '</div>';
				echo '<div class="ht-widget-wrap ht-widget-upload">';
				echo '<label for="'.$this->get_field_id('image_url_4').'">'; _e('Image url :','hawktheme'); echo'</label>';
				echo $output = hawktheme_uploader($image_url_id_4,null,null);
				echo '<p class="ht-description">';  
				_e('If you can not upload, please refresh your browser before uploading!','hawktheme');
				echo '</p>';
				echo '</div>';
				echo '<div class="ht-widget-wrap">';
				echo '<label for="'.$this->get_field_id('link_4').'">'; _e('Link:','hawktheme'); echo'</label>';
				echo '<input  id="'.$this->get_field_id('link_4').'" name="'.$this->get_field_name('link_4').'" type="text" value="'.$link_4.'" />';
				echo '</div>';
		echo '</div>';
	}


	/** Function defined update**/
	function update($new_instance,$old_instance){

		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['title_1'] = strip_tags($new_instance['title_1']);
		$instance['title_2'] = strip_tags($new_instance['title_2']);
		$instance['title_3'] = strip_tags($new_instance['title_3']);
		$instance['title_4'] = strip_tags($new_instance['title_4']);
		$instance['link_1'] = strip_tags($new_instance['link_1']);
		$instance['link_2'] = strip_tags($new_instance['link_2']);
		$instance['link_3'] = strip_tags($new_instance['link_3']);
		$instance['link_4'] = strip_tags($new_instance['link_4']);
		$instance['image_url_1'] = strip_tags($new_instance['image_url_1']);
		$instance['image_url_2'] = strip_tags($new_instance['image_url_2']);
		$instance['image_url_3'] = strip_tags($new_instance['image_url_3']);
		$instance['image_url_4'] = strip_tags($new_instance['image_url_4']);
		return $instance;

	}


	/** Definition of widget function that displays a web page**/
	function widget($args,$instance){
		extract($args);

		$title = $instance['title'];
		$title_1 = $instance['title_1'];
		$title_2 = $instance['title_2'];
		$title_3 = $instance['title_3'];
		$title_4 = $instance['title_4'];
		$link_1 = $instance['link_1'];
		$link_2 = $instance['link_2'];
		$link_3 = $instance['link_3'];
		$link_4 = $instance['link_4'];
		$image_url_1_id = $this->get_field_id('image_url_1');
		$image_url_1 = get_option($image_url_1_id);
		$image_url_2_id = $this->get_field_id('image_url_2');
		$image_url_2 = get_option($image_url_2_id);
		$image_url_3_id = $this->get_field_id('image_url_3');
		$image_url_3 = get_option($image_url_3_id);
		$image_url_4_id = $this->get_field_id('image_url_4');
		$image_url_4 = get_option($image_url_4_id);

		echo $before_widget; 
		echo $before_title . $title . $after_title;

		echo '<ul class="fixed">'."\n";

		if($image_url_1) {
			echo '<li><a href="'.$link_1.'" title="'.$title_1.'" alt="'.$title_1.'"><img src="'.$image_url_1.'" alt="'.$title_1.'" /></a></li>';
		}

		if($image_url_2) {
			echo '<li><a href="'.$link_2.'" title="'.$title_2.'" alt="'.$title_2.'"><img src="'.$image_url_2.'" alt="'.$title_2.'" /></a></li>';
		}

		if($image_url_3) {
			echo '<li><a href="'.$link_3.'" title="'.$title_3.'" alt="'.$title_3.'"><img src="'.$image_url_3.'" alt="'.$title_3.'" /></a></li>';
		}

		if($image_url_4) {
			echo '<li><a href="'.$link_4.'" title="'.$title_4.'" alt="'.$title_4.'"><img src="'.$image_url_4.'" alt="'.$title_4.'" /></a></li>';
		}

		echo '</ul>'."\n";

		echo $after_widget; 

	}

}

?>