<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * Gallery Item, and associated taxonomy.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_action( 'init', 'ht_gallery_posttype' );
add_filter("manage_edit-gallery-item_columns", "ht_gallery_edit_columns");
add_action("manage_gallery-item_posts_custom_column",  "ht_gallery_columns_display", 10, 2);


/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~
-----------------------------------------------------------------------------*/
function ht_gallery_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type Galleries~~~~~~~~
	-------------------------------------------------------------*/
	$labels_gallery_item = array(
			'name' => __( 'Galleries', 'hawktheme' ),
			'singular_name' => __( 'Gallery Item', 'hawktheme' ),
			'add_new' => __( 'Add New', 'hawktheme' ),
			'add_new_item' => __( 'Add New Gallery Item', 'hawktheme' ),
			'edit_item' => __( 'Edit Gallery Item', 'hawktheme' ),
			'new_item' => __( 'Add New Gallery Item', 'hawktheme' ),
			'view_item' => __( 'View Gallery Item', 'hawktheme' ),
			'search_items' => __( 'Search Gallery Item', 'hawktheme' ),
			'not_found' => __( 'No gallery item found', 'hawktheme' ),
			'not_found_in_trash' => __( 'No gallery item found in trash', 'hawktheme' )
	); 

	register_post_type( 'gallery-item', array(
			'labels' => $labels_gallery_item,
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
			'menu_icon' => FrameWork_Url . '/skins/images/gallery.png',
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments' )
	));

	/*--------------------------------------------------------------------
	~~~~Register post type Portfolio Categories~~~~
	--------------------------------------------------------------------*/
	$labels_gallery = array(
			'name' => __( 'Gallery Categories', 'hawktheme' ),
			'singular_name' => __( 'Gallery', 'hawktheme' ),
			'search_items' =>  __( 'Search Gallery', 'hawktheme' ),
			'all_items' => __( 'All Galleries' , 'hawktheme' ),
			'parent_item' => __( 'Parent Gallery', 'hawktheme' ),
			'parent_item_colon' => __( 'Parent Gallery:', 'hawktheme' ),
			'edit_item' => __( 'Edit Gallery' , 'hawktheme' ),
			'update_item' => __( 'Update Gallery' , 'hawktheme' ),
			'add_new_item' => __( 'Add New Gallery' , 'hawktheme' ),
			'new_item_name' => __( 'New Gallery Name' , 'hawktheme' ),
	); 	

	register_taxonomy('gallery','gallery-item',array(
			'hierarchical' => true,
			'query_var' => true, 
			'rewrite' => true, 
			'labels' => $labels_gallery
	));


	/*---------------------------------------------------------------------
	~~~~~~~Register post type Gallery Tags~~~~~~~
	--------------------------------------------------------------------*/

	$labels_gallery_tags = array(
		'name' => __('Gallery Tags', 'post type general name', 'hawktheme'),
		'all_items' => __('All Gallery Tags', 'all items', 'hawktheme'),
		'add_new_item' => __('Add New Tag', 'adding a new item', 'hawktheme'),
		'new_item_name' => __('New Tag Name', 'adding a new item', 'hawktheme'),
	);

	register_taxonomy( 'gallery-tag', 'gallery-item', 
		array( 
			'hierarchical' => false,
			'rewrite' => true,
			'labels' => $labels_gallery_tags
	));

}

/*----------------------------------------------------------------------------
~~~~~Add Columns to Portfolio Edit Screen~~~~~
-----------------------------------------------------------------------------*/
function ht_gallery_edit_columns($gallery_columns){
	$gallery_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => _x('Title', 'column name'),
		"gallery_thumbnail" => __('Thumbnail', 'hawktheme'),
		"gallery_category" => __('Galleries', 'hawktheme'),
		"gallery_tag" => __('Tags', 'hawktheme'),
		"date" => __('Date', 'hawktheme')
	);
	return $gallery_columns;
}

function ht_gallery_columns_display($gallery_columns, $post_id){

	global $post;
	switch ($gallery_columns){	
		
		case "gallery_thumbnail":
			echo '<img src="';
			ht_get_thumbnail(80, 180);
			echo '" />';
		break;	

		case "gallery_category" :
			if ($category_list = get_the_term_list( $post->ID, 'gallery', '', ', ', '' ) ) {
				echo $category_list;
			} else {
				echo __('None', 'hawktheme');
			}
		break;

		case "gallery_tag":
			if ($tag_list = get_the_term_list( $post->ID, 'gallery-tag', '', ', ', '' ) ) {
				echo $tag_list;
			} else {
					echo __('None', 'hawktheme');
			}
		break;			

	}

}

?>