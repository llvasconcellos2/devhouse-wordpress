<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * Slider Item, and associated taxonomy.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_action( 'init', 'ht_slider_posttype' );
add_filter("manage_edit-slider-item_columns", "ht_slider_edit_columns");
add_action("manage_slider-item_posts_custom_column",  "ht_slider_columns_display", 10, 2);


/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~
-----------------------------------------------------------------------------*/
function ht_slider_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type Sliders~~~~~~~~
	-------------------------------------------------------------*/
	$labels_slider_item = array(
			'name' => __( 'Sliders', 'hawktheme' ),
			'singular_name' => __( 'Slider Item', 'hawktheme' ),
			'add_new' => __( 'Add New', 'hawktheme' ),
			'add_new_item' => __( 'Add New Slider Item', 'hawktheme' ),
			'edit_item' => __( 'Edit Slider Item', 'hawktheme' ),
			'new_item' => __( 'Add New Slider Item', 'hawktheme' ),
			'view_item' => __( 'View Slider Item', 'hawktheme' ),
			'search_items' => __( 'Search Slider Item', 'hawktheme' ),
			'not_found' => __( 'No slider item found', 'hawktheme' ),
			'not_found_in_trash' => __( 'No slider item found in trash', 'hawktheme' )
	); 

	register_post_type( 'slider-item', array(
			'labels' => $labels_slider_item,
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
			'menu_icon' => FrameWork_Url . '/skins/images/slider.png',
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments' )
	));

	/*-------------------------------------------------------------
	~~~~Register post type Slide Categories~~~~
	-------------------------------------------------------------*/
	$labels_slider = array(
			'name' => __( 'Slider Categories', 'hawktheme' ),
			'singular_name' => __( 'Slider', 'hawktheme' ),
			'search_items' =>  __( 'Search Slider', 'hawktheme' ),
			'all_items' => __( 'All Sliders' , 'hawktheme' ),
			'parent_item' => __( 'Parent Slider', 'hawktheme' ),
			'parent_item_colon' => __( 'Parent Slider:', 'hawktheme' ),
			'edit_item' => __( 'Edit Slider' , 'hawktheme' ),
			'update_item' => __( 'Update Slider' , 'hawktheme' ),
			'add_new_item' => __( 'Add New Slider' , 'hawktheme' ),
			'new_item_name' => __( 'New Slider Name' , 'hawktheme' ),
	); 	

	register_taxonomy('slider','slider-item',array(
			'hierarchical' => true,
			'query_var' => true, 
			'rewrite' => true, 
			'labels' => $labels_slider
	));

	/*---------------------------------------------------------------------
	~~~~~~~Register post type Slider Tags~~~~~~~
	--------------------------------------------------------------------*/

	$labels_slider_tags = array(
		'name' => __('Slider Tags', 'post type general name', 'hawktheme'),
		'all_items' => __('All Slider Tags', 'all items', 'hawktheme'),
		'add_new_item' => __('Add New Tag', 'adding a new item', 'hawktheme'),
		'new_item_name' => __('New Tag Name', 'adding a new item', 'hawktheme'),
	);

	register_taxonomy( 'slider-tag', 'slider-item', 
		array( 
			'hierarchical' => false,
			'rewrite' => true,
			'labels' => $labels_slider_tags
	));

}


/*----------------------------------------------------------------------------
~~~~~Add Columns to Slider Edit Screen~~~~~
-----------------------------------------------------------------------------*/
function ht_slider_edit_columns($slider_columns){
	$slider_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => _x('Title', 'column name'),
		"slider_thumbnail" => __('Thumbnail', 'hawktheme'),
		"slider_category" => __('Sliders', 'hawktheme'),
		"slider_custom_link" => __('Custom Link', 'hawktheme'),
		"date" => __('Date', 'hawktheme')
	);
	return $slider_columns;
}

function ht_slider_columns_display($slider_columns, $post_id){

	global $post;
	switch ($slider_columns){	
		
		case "slider_thumbnail":
			echo '<img src="';
			ht_get_thumbnail(80, 180);
			echo '" />';
		break;	

		case "slider_category" :
			if ($category_list = get_the_term_list( $post->ID, 'slider', '', ', ', '' ) ) {
				echo $category_list;
			} else {
				echo __('None', 'hawktheme');
			}
		break;

		case "slider_custom_link":

			global $post, $key;
			$data = get_post_meta( $post->ID, $key, true );
			$custom_link = isset( $data['slider_custom_link'] ) ? $data['slider_custom_link']: ''; 

			echo $custom_link;

		break;	

	}

}


?>