<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * Portfolio Item, and associated taxonomy.
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
add_action( 'init', 'ht_portfolio_posttype' );
add_filter("manage_edit-portfolio-item_columns", "ht_portfolio_edit_columns");
add_action("manage_portfolio-item_posts_custom_column",  "ht_portfolio_columns_display", 10, 2);


/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~
-----------------------------------------------------------------------------*/
function ht_portfolio_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type Portfolios~~~~~~~~
	-------------------------------------------------------------*/
	$labels_portfolio_item = array(
			'name' => __( 'Portfolios', 'hawktheme' ),
			'singular_name' => __( 'Portfolio Item', 'hawktheme' ),
			'add_new' => __( 'Add New', 'hawktheme' ),
			'add_new_item' => __( 'Add New Portfolio Item', 'hawktheme' ),
			'edit_item' => __( 'Edit Portfolio Item', 'hawktheme' ),
			'new_item' => __( 'Add New Portfolio Item', 'hawktheme' ),
			'view_item' => __( 'View Portfolio Item', 'hawktheme' ),
			'search_items' => __( 'Search Portfolio Item', 'hawktheme' ),
			'not_found' => __( 'No portfolio item found', 'hawktheme' ),
			'not_found_in_trash' => __( 'No portfolio item found in trash', 'hawktheme' )
	); 

	register_post_type( 'portfolio-item', array(
			'labels' => $labels_portfolio_item,
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
			'menu_icon' => FrameWork_Url . '/skins/images/portfolio.png',
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments' )
	));

	/*--------------------------------------------------------------------
	~~~~Register post type Portfolio Categories~~~~
	--------------------------------------------------------------------*/
	$labels_portfolio = array(
			'name' => __( 'Portfolio Categories', 'hawktheme' ),
			'singular_name' => __( 'Portfolio', 'hawktheme' ),
			'search_items' =>  __( 'Search Portfolio', 'hawktheme' ),
			'all_items' => __( 'All Portfolios' , 'hawktheme' ),
			'parent_item' => __( 'Parent Portfolio', 'hawktheme' ),
			'parent_item_colon' => __( 'Parent Portfolio:', 'hawktheme' ),
			'edit_item' => __( 'Edit Portfolio' , 'hawktheme' ),
			'update_item' => __( 'Update Portfolio' , 'hawktheme' ),
			'add_new_item' => __( 'Add New Portfolio' , 'hawktheme' ),
			'new_item_name' => __( 'New Portfolio Name' , 'hawktheme' ),
	); 	

	register_taxonomy('portfolio','portfolio-item',array(
			'hierarchical' => true,
			'query_var' => true, 
			'rewrite' => true, 
			'labels' => $labels_portfolio
	));


	/*---------------------------------------------------------------------
	~~~~~~~Register post type Portfolio Tags~~~~~~~
	--------------------------------------------------------------------*/

	$labels_portfolio_tags = array(
		'name' => __('Portfolio Tags', 'post type general name', 'hawktheme'),
		'all_items' => __('All Portfolio Tags', 'all items', 'hawktheme'),
		'add_new_item' => __('Add New Tag', 'adding a new item', 'hawktheme'),
		'new_item_name' => __('New Tag Name', 'adding a new item', 'hawktheme'),
	);

	register_taxonomy( 'portfolio-tag', 'portfolio-item', 
		array( 
			'hierarchical' => false,
			'rewrite' => true,
			'labels' => $labels_portfolio_tags
	));

}

/*----------------------------------------------------------------------------
~~~~~Add Columns to Portfolio Edit Screen~~~~~
-----------------------------------------------------------------------------*/
function ht_portfolio_edit_columns($portfolio_columns){
	$portfolio_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => _x('Title', 'column name'),
		"portfolio_thumbnail" => __('Thumbnail', 'hawktheme'),
		"portfolio_category" => __('Portfolios', 'hawktheme'),
		"portfolio_tag" => __('Tags', 'hawktheme'),
		"date" => __('Date', 'hawktheme')
	);
	return $portfolio_columns;
}

function ht_portfolio_columns_display($portfolio_columns, $post_id){

	global $post;
	switch ($portfolio_columns){	
		
		case "portfolio_thumbnail":
			echo '<img src="';
			ht_get_thumbnail(80, 180);
			echo '" />';
		break;	

		case "portfolio_category" :
			if ($category_list = get_the_term_list( $post->ID, 'portfolio', '', ', ', '' ) ) {
				echo $category_list;
			} else {
				echo __('None', 'hawktheme');
			}
		break;

		case "portfolio_tag":
			if ($tag_list = get_the_term_list( $post->ID, 'portfolio-tag', '', ', ', '' ) ) {
				echo $tag_list;
			} else {
					echo __('None', 'hawktheme');
			}
		break;			

	}

}

?>