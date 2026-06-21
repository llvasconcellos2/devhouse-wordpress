<?php
/*******************************************************************************
 *This file sets up the the custom widgets,
 * This widget area is used to store mostview posts section.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~~~Class Widget~~~~~~~~~~~~~
Name: Mostview Posts
Slug: mostview posts
-------------------------------------------------------------*/
class Mostview_Posts_Widget extends WP_Widget{

	/** Construction function**/
	function Mostview_Posts_Widget(){
		global $themename, $shortname;
		$title_ops = __($themename.'&raquo; Mostview Posts','hawktheme');
		$widget_ops = array('classname'=>'widget-mostview-posts','description'=>__('This is a mostview posts list.','hawktheme'));
		$control_ops = array('width'=>450);
		$this->WP_Widget($shortname. '_mostview_posts',$title_ops,$widget_ops,$control_ops);
	}


	/** Function defined form**/
	function form($instance){
		$instance = wp_parse_args((array)$instance,array(
			'title' => __('Mostview Posts','hawktheme'),
			'showposts' => 3,
			'type' => 'blog',
			'terms' => '',
			'thumb' => 'true'
		));

		$title = htmlspecialchars($instance['title']);
		$showposts = htmlspecialchars($instance['showposts']);
		$type = htmlspecialchars($instance['type']);
		$terms = htmlspecialchars($instance['terms']);
		$thumb = htmlspecialchars($instance['thumb']);

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('title').'">'; _e('Title:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap ht-shorttext">';
		echo '<label for="'.$this->get_field_id('showposts').'">'; _e('Showposts:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('showposts').'" name="'.$this->get_field_name('showposts').'" type="text" value="'.$showposts.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('type').'">'; _e('Type:','hawktheme'); echo'</label>';
		echo '<select name="'.$this->get_field_name('type').'">';
		echo '<option value="blog" '; selected('blog', $instance['type']); echo '>'; _e('Blog','hawktheme'); echo '</option>';
		echo '<option value="news" '; selected('news', $instance['type']); echo '>'; _e('News','hawktheme'); echo '</option>';
		echo '<option value="portfolio" '; selected('portfolio', $instance['type']); echo '>'; _e('Portfolio','hawktheme'); echo '</option>';
		echo '<option value="slider" '; selected('slider', $instance['type']); echo '>'; _e('Slider','hawktheme'); echo '</option>';
		echo '<option value="gallery" '; selected('gallery', $instance['type']); echo '>'; _e('Gallery','hawktheme'); echo '</option>';
		echo '</select>';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('terms').'">'; _e('Categories:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('terms').'" name="'.$this->get_field_name('terms').'" type="text" value="'.$terms.'" />';
		echo '<p class="ht-description">';  
		_e('If you display all the categories, leave it blank. If you want to display some category, you can enter the name of category here. And the categories must be in this type. Separate categories with commas. Ex: Answers, News','hawktheme');
		echo '</p>';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';

		echo '<label for="'.$this->get_field_id('thumb').'">'; 
		echo '<input type="checkbox" name="'.$this->get_field_name('thumb').'"'; 
		checked('true', $instance['thumb']); 
		echo 'value="true" />';
		echo '<em>'; _e('Display with thumbnail.','hawktheme'); echo '</em>';
		echo'</label>';

		echo '</div>';

	}


	/** Function defined update**/
	function update($new_instance,$old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['showposts'] = strip_tags($new_instance['showposts']);
		$instance['type'] = strip_tags($new_instance['type']);
		$instance['terms'] = strip_tags($new_instance['terms']);
		$instance['thumb'] = strip_tags($new_instance['thumb']);

		return $instance;
	}


	/** Definition of widget function that displays a web page**/
	function widget($args,$instance){
		extract($args);
		$title = $instance['title'];
		$showposts = $instance['showposts'];
		$type = $instance['type'];
		$terms = $instance['terms'];
		$thumb = $instance['thumb'];
		$post_id = isset( $post->ID ) ? $post->ID: ''; 

		if($type == 'blog') {
			$post_type = 'post'; $tax = 'category_name';
		}elseif($type == 'news') {
			$post_type = 'news-item'; $tax = 'news';
		}elseif($type == 'portfolio') {
			$post_type = 'portfolio-item'; $tax = 'portfolio';
		}elseif($type == 'slider') {
			$post_type = 'slider-item'; $tax = 'slider';
		}elseif($type == 'gallery') {
			$post_type = 'gallery-item'; $tax = 'gallery';
		}

		$posts_args = array( 
				'post_type' => $post_type,
				$tax => $terms,
				'posts_per_page' => $showposts,
				'orderby' => 'comment_count',
				'post_status' => 'publish', 
				'ignore_sticky_posts' => 1, 
				'post__not_in' => array($post_id)
				); 
		$posts_query = new WP_Query( $posts_args );

		echo $before_widget; 
		echo $before_title . $title . $after_title;

		echo '<ul class="thumb-preloader thumb-fade">'."\n";

			while ($posts_query->have_posts()) {
						$posts_query->the_post();

			echo '<li class="fixed">'."\n";

				if($thumb== 'true') {
					echo '<figure class="alignleft">';
					echo '<a href="'; ht_get_file_thumbnail(); echo '" class="preloader" rel="tag" title="'; the_title_attribute(); echo '">'."\n";
					echo '<img src="'; ht_get_thumbnail(50, 50); echo '" alt="'.get_the_title().'" title="'.get_the_title().'" />';
					echo '<div class="fade-hover hide"></div>'."\n";
					echo '<div class="overlay"></div>'."\n";
					echo '<div class="shadow"></div>'."\n";
					echo '</a>'."\n";
					echo '</figure>'."\n";
				}

				echo '<section>'."\n";
				echo '<a href="'.get_permalink().'" rel="bookmark" title="'; the_title_attribute(); echo '">'; echo get_the_title(); echo '</a>'."\n";
				echo '<p>';
				echo '<em>'; the_time('F j. Y'); echo '</em>';
				echo '<em>'; comments_popup_link(__('No Comment','hawktheme'), __('1Comment','hawktheme'), __('%Comment','hawktheme'), '', __('Comment Off','hawktheme')); echo '</em>';
				echo '</p>'."\n";
				echo '</section>'."\n";

			echo '</li>'."\n";

			}//end while

			wp_reset_query();

		echo '</ul>'."\n";

		echo $after_widget; 

	}

}

?>