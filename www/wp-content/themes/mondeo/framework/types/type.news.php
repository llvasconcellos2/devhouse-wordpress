<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * News Item, and associated taxonomy.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_action( 'init', 'ht_news_posttype' );
add_filter("manage_edit-news-item_columns", "ht_news_edit_columns");
add_action("manage_news-item_posts_custom_column",  "ht_news_columns_display", 10, 2);


/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~
-----------------------------------------------------------------------------*/
function ht_news_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type News~~~~~~~~
	-------------------------------------------------------------*/
	$labels_news_item = array(
			'name' => __( 'News', 'hawktheme' ),
			'singular_name' => __( 'News Item', 'hawktheme' ),
			'add_new' => __( 'Add New', 'hawktheme' ),
			'add_new_item' => __( 'Add News Item', 'hawktheme' ),
			'edit_item' => __( 'Edit News Item', 'hawktheme' ),
			'new_item' => __( 'Add News Item', 'hawktheme' ),
			'view_item' => __( 'View News Item', 'hawktheme' ),
			'search_items' => __( 'Search News Item', 'hawktheme' ),
			'not_found' => __( 'No news item found', 'hawktheme' ),
			'not_found_in_trash' => __( 'No news item found in trash', 'hawktheme' )
	); 

	register_post_type( 'news-item', array(
			'labels' => $labels_news_item,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => true, 
			'hierarchical' => false,
			'menu_position' => 5,
			'menu_icon' => FrameWork_Url . '/skins/images/news.png',
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments' )
	));

	/*--------------------------------------------------------------------
	~~~~Register post type News Categories~~~~
	--------------------------------------------------------------------*/
	$labels_news = array(
			'name' => __( 'News Categories', 'hawktheme' ),
			'singular_name' => __( 'News', 'hawktheme' ),
			'search_items' =>  __( 'Search News', 'hawktheme' ),
			'all_items' => __( 'All News' , 'hawktheme' ),
			'parent_item' => __( 'Parent News', 'hawktheme' ),
			'parent_item_colon' => __( 'Parent News:', 'hawktheme' ),
			'edit_item' => __( 'Edit News' , 'hawktheme' ),
			'update_item' => __( 'Update News' , 'hawktheme' ),
			'add_new_item' => __( 'Add News' , 'hawktheme' ),
			'new_item_name' => __( 'News Name' , 'hawktheme' ),
	); 	

	register_taxonomy('news','news-item',array(
			'hierarchical' => true,
			'query_var' => true, 
			'rewrite' => true, 
			'labels' => $labels_news
	));


	/*---------------------------------------------------------------------
	~~~~~~~Register post type News Tags~~~~~~~
	--------------------------------------------------------------------*/

	$labels_news_tags = array(
		'name' => __('News Tags', 'post type general name', 'hawktheme'),
		'all_items' => __('All News Tags', 'all items', 'hawktheme'),
		'add_new_item' => __('Add New Tag', 'adding a new item', 'hawktheme'),
		'new_item_name' => __('New Tag Name', 'adding a new item', 'hawktheme'),
	);

	register_taxonomy( 'news-tag', 'news-item', 
		array( 
			'hierarchical' => false,
			'rewrite' => true,
			'labels' => $labels_news_tags
	));

}

/*----------------------------------------------------------------------------
~~~~~Add Columns to News Edit Screen~~~~~
-----------------------------------------------------------------------------*/
function ht_news_edit_columns($news_columns){
	$news_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => _x('Title', 'column name'),
		"news_thumbnail" => __('Thumbnail', 'hawktheme'),
		"news_category" => __('News', 'hawktheme'),
		"news_tag" => __('Tags', 'hawktheme'),
		"date" => __('Date', 'hawktheme')
	);
	return $news_columns;
}

function ht_news_columns_display($news_columns, $post_id){

	global $post;
	switch ($news_columns){	
		
		case "news_thumbnail":
			echo '<img src="';
			ht_get_thumbnail(80, 180);
			echo '" />';
		break;	

		case "news_category" :
			if ($category_list = get_the_term_list( $post->ID, 'news', '', ', ', '' ) ) {
				echo $category_list;
			} else {
				echo __('None', 'hawktheme');
			}
		break;

		case "news_tag":
			if ($tag_list = get_the_term_list( $post->ID, 'news-tag', '', ', ', '' ) ) {
				echo $tag_list;
			} else {
					echo __('None', 'hawktheme');
			}
		break;			

	}

}

?>