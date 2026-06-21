<?php
/*******************************************************************************
 *This file sets up the the custom widgets,
 * This widget area is used to store contact form section.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~~~Class Widget~~~~~~~~~~~~~
Name:Contact Form
Slug: contact_form
-------------------------------------------------------------*/
class Contact_Form_Widget extends WP_Widget{

	/** Construction function**/
	function Contact_Form_Widget(){
		global $themename, $shortname;
		$title_ops = __($themename.'&raquo; Contact Form','hawktheme');
		$widget_ops = array('classname'=>'widget-contact-form','description'=>__('This widget will display a contact form section.','hawktheme'));
		$control_ops = array('width'=>450);
		$this->WP_Widget($shortname. '_contact_form',$title_ops,$widget_ops,$control_ops);
	}


	/** Function defined form**/
	function form($instance){
		$instance = wp_parse_args((array)$instance,array(
			'title'=> __('Contact US','hawktheme'),
			'email'=> get_option('admin_email'),
			'form_id' => ''
		));
		$title = htmlspecialchars($instance['title']);
		$email = htmlspecialchars($instance['email']);
		$form_id = htmlspecialchars($instance['form_id']);

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('title').'">'; _e('Title:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('form_id').'">'; _e('Form ID:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('form_id').'" name="'.$this->get_field_name('form_id').'" type="text" value="'.$form_id.'" />';
		echo '<div class="ht-description">'; _e('Such as 1, 2, 3 or other name. This must be different name.','hawktheme'); echo '</div>';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('email').'">'; _e('Email:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('email').'" name="'.$this->get_field_name('email').'" type="text" value="'.$email.'" />';
		echo '</div>';
	}


	/** Function defined update**/
	function update($new_instance,$old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['form_id'] = strip_tags($new_instance['form_id']);
		return $instance;
	}


	/** Definition of widget function that displays a web page**/
	function widget($args,$instance){
		extract($args);
		$title = $instance['title'];
		$email = $instance['email'];
		$form_id = $instance['form_id'];

		echo $before_widget; 
		echo $before_title . $title . $after_title;
		echo $output = ht_contact_form($email, $form_id);
		echo $after_widget;

	}

}

?>