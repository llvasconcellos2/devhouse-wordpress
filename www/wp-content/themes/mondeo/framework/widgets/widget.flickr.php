<?php
/*******************************************************************************
 *This file sets up the the custom widgets,
 * This widget area is used to store flickr section.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~~~Class Widget~~~~~~~~~~~~~
Name:Flickr
Slug: flickr
-------------------------------------------------------------*/
class Flickr_Widget extends WP_Widget{

	/** Construction function**/
	function Flickr_Widget(){
		global $themename, $shortname;
		$title_ops = __($themename.'&raquo; Flickr','hawktheme');
		$widget_ops = array('classname'=>'widget-flickr','description'=>__('This widget will display a flickr section. The image can be form flickr.','hawktheme'));
		$control_ops = array('width'=>450);
		$this->WP_Widget($shortname. '_flickr',$title_ops,$widget_ops,$control_ops);
	}


	/** Function defined form**/
	function form($instance){
		$instance = wp_parse_args((array)$instance,array(
			'title'=> __('Flickr','hawktheme'),
			'account' => '',
			'showposts'=> 6,
			'display_mode' => 'latest'			
		));

		$title = htmlspecialchars($instance['title']);
		$account = htmlspecialchars($instance['account']);
		$showposts = htmlspecialchars($instance['showposts']);
		$display_mode = htmlspecialchars($instance['display_mode']);

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('title').'">'; _e('Title:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap ht-shorttext">';
		echo '<label for="'.$this->get_field_id('account').'">'; _e('Account:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('account').'" name="'.$this->get_field_name('account').'" type="text" value="'.$account.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap ht-shorttext">';
		echo '<label for="'.$this->get_field_id('showposts').'">'; _e('Showposts:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('showposts').'" name="'.$this->get_field_name('showposts').'" type="text" value="'.$showposts.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('display_mode').'">'; _e('Orderby:','hawktheme'); echo'</label>';
		echo '<select name="'.$this->get_field_name('display_mode').'">';
		echo '<option value="latest" '; selected('latest', $instance['display_mode']); echo '>'; _e('Latest','hawktheme'); echo '</option>';
		echo '<option value="random" '; selected('random', $instance['display_mode']); echo '>'; _e('Random','hawktheme'); echo '</option>';
		echo '</select>';
		echo '</div>';

	}


	/** Function defined update**/
	function update($new_instance,$old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['account'] = strip_tags($new_instance['account']);
		$instance['showposts'] = strip_tags($new_instance['showposts']);
		$instance['display_mode'] = strip_tags($new_instance['display_mode']);
		return $instance;
	}


	/** Definition of widget function that displays a web page**/
	function widget($args,$instance){
		extract($args);
		$title = $instance['title'];
		$account = $instance['account'];
		$showposts = $instance['showposts'];
		$display_mode = $instance['display_mode'];

		echo $before_widget; 
		echo $before_title . $title . $after_title;
		echo '<div id="flickr_badge_wrapper" class="fixed">';
		echo '<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$showposts.'&amp;display='.$display_mode.'&amp;size=s&amp;layout=x&amp;source=user&amp;user='.$account.'"></script>';
		echo '</div>';
		echo $after_widget; 

	}

}

?>