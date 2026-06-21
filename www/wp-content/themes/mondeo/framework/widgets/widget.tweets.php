<?php
/*******************************************************************************
 *This file sets up the the custom widgets,
 * This widget area is used to store tweets section.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~~~Class Widget~~~~~~~~~~~~~
Name:Tweets
Slug: tweets
-------------------------------------------------------------*/
class Tweets_Widget extends WP_Widget{

	/** Construction function**/
	function Tweets_Widget(){
		global $themename, $shortname;
		$title_ops = __($themename.'&raquo; Tweets','hawktheme');
		$widget_ops = array('classname'=>'widget-tweets','description'=>__('This widget will display a tweets section.','hawktheme'));
		$control_ops = array('width'=>450);
		$this->WP_Widget($shortname. '_tweets',$title_ops,$widget_ops,$control_ops);
	}


	/** Function defined form**/
	function form($instance){
		$instance = wp_parse_args((array)$instance,array(
			'title'=> __('Twitter','hawktheme'),
			'account' => 'twitter',
			'showposts'=> 2,
			'refresh' => '30',
			'autolinks' => 'true',
			'userlinks' => 'true',
			'date' => 'true'
		));

		$title = htmlspecialchars($instance['title']);
		$account = htmlspecialchars($instance['account']);
		$showposts = htmlspecialchars($instance['showposts']);
		$refresh = htmlspecialchars($instance['refresh']);
		$autolinks = htmlspecialchars($instance['autolinks']);
		$userlinks = htmlspecialchars($instance['userlinks']);
		$date = htmlspecialchars($instance['date']);

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

		echo '<div class="ht-widget-wrap ht-shorttext">';
		echo '<label for="'.$this->get_field_id('refresh').'">'; _e('Refresh:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('refresh').'" name="'.$this->get_field_name('refresh').'" type="text" value="'.$refresh.'" />';
		echo '</div>';

		echo '<div class="ht-widget-wrap">';

		echo '<label for="'.$this->get_field_id('autolinks').'">'; 
		echo '<input type="checkbox" name="'.$this->get_field_name('autolinks').'"'; 
		checked('true', $instance['autolinks']); 
		echo 'value="true" />';
		echo '<em>'; _e('Convert URLs to links','hawktheme'); echo '</em>';
		echo'</label>';

		echo '<label for="'.$this->get_field_id('userlinks').'">'; 
		echo '<input type="checkbox" name="'.$this->get_field_name('userlinks').'"'; 
		checked('true', $instance['userlinks']); 
		echo 'value="true" />';
		echo '<em>'; _e('Convert @users to links','hawktheme'); echo '</em>';
		echo'</label>';

		echo '<label for="'.$this->get_field_id('date').'">'; 
		echo '<input type="checkbox" name="'.$this->get_field_name('date').'"'; 
		checked('true', $instance['date']); 
		echo 'value="true" />';
		echo '<em>'; _e('Show the date/time','hawktheme'); echo '</em>';
		echo'</label>';

		echo '</div>';

	}


	/** Function defined update**/
	function update($new_instance,$old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['account'] = strip_tags($new_instance['account']);
		$instance['showposts'] = strip_tags($new_instance['showposts']);
		$instance['refresh'] = strip_tags($new_instance['refresh']);
		$instance['autolinks'] = strip_tags($new_instance['autolinks']);
		$instance['userlinks'] = strip_tags($new_instance['userlinks']);
		$instance['date'] = strip_tags($new_instance['date']);
		return $instance;
	}


	/** Definition of widget function that displays a web page**/
	function widget($args,$instance){
		extract($args);
		$title = $instance['title'];
		$account = $instance['account'];
		$showposts = $instance['showposts'];
		$refresh = $instance['refresh'];
		$autolinks = $instance['autolinks'] == 'true';
		$userlinks = $instance['userlinks'] == 'true';
		$date = $instance['date'] == 'true';
		$twitterFeed = $this->loadTwitterFeed($instance);
		if (!is_wp_error( $twitterFeed ) ) {
            $maxitems = $twitterFeed->get_item_quantity($instance['showposts']); 
            $rss_items = $twitterFeed->get_items(0, $maxitems); 
            if($maxitems > 0) {

				echo $before_widget; 
				echo $before_title . $title . $after_title;
				echo '<ul>';

						foreach($rss_items as $item) { 

							echo '<li>';
							$output_msg = substr(strstr($item->get_description(),': '), 2, strlen($item->get_description()));
							if ($autolinks) {
								$output_msg = $this->conver_hyperlinks($output_msg);
							}
							if ($userlinks) {
								$output_msg = $this->conver_twitter_users($output_msg);
							}

							if ($date) {
								$time = strtotime($item->get_date());

								if ( ( abs( time() - $time) ) < 86400 ) {
									$human_time = sprintf( __('%s ago', 'themater'), human_time_diff( $time ) );
								} else {
									$human_time = date(__('F j, Y'), $time);
								}

							$output_msg = $output_msg . sprintf( __('%s'),' <a href="'.$item->get_permalink().'" class="tweets-widget-time" title="' . date(__('h:i A F j, Y'), $time) . '" target="_blank">'.$human_time.'</a>' );
							}

							echo $output_msg;
							echo '</li>';

						}//foreach

				echo '</ul>';
				echo $after_widget;

			}

		}//end is_wp_error

	}//function

	/*--------------------------------------------------------------------------End Tweets Loop-------------------------------------------------------------------------------*/

	/*loadTwitterFeed*/
	function loadTwitterFeed($instance) {   
		require_once (ABSPATH . WPINC . '/class-feed.php');
		$url = 'http://twitter.com/statuses/user_timeline/' . $instance['account'] .'.rss';
		$cache_duration = $instance['refresh'] * 60;
		
		$feed = new SimplePie();
		$feed->set_feed_url($url);
		$feed->set_cache_class('WP_Feed_Cache');
		$feed->set_file_class('WP_SimplePie_File');
		$feed->set_cache_duration($cache_duration);
		$feed->init();
		$feed->handle_content_type();

		if ( $feed->error() ) {
			return new WP_Error('simplepie-error', $feed->error());
		}
		return $feed;
	}


	/*conver_hyperlinks*/
	 function conver_hyperlinks($text) {
		$text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
		$text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);    
		$text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
		$text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text);
		return $text;
	}


	 /*conver_twitter_users*/
	function conver_twitter_users($text) {
		$text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
		return $text;
	} 

}

?>