<?php
/*******************************************************************************
 * Hawk Metaboxes FrameWork
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
$key = $themename;

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_meta_box');

/*-------------------------------------------------------------
~~~~~~~~~~Create Meta Box ~~~~~~~~~~~
-------------------------------------------------------------*/
function create_meta_box() {
	global $shortname;

	$seo_post = get_option($shortname.'_seo_post');
	$seo_page = get_option($shortname.'_seo_page');
	$seo_slider = get_option($shortname.'_seo_slider');
	$seo_news = get_option($shortname.'_seo_news');
	$seo_portfolio = get_option($shortname.'_seo_portfolio');
	$seo_gallery = get_option($shortname.'_seo_gallery');

	if( function_exists( 'add_meta_box' ) ) {

		add_meta_box( 'ht_type', 'Slider Url', 'display_meta_box_slider_url', 'slider-item', 'normal', 'high' );

		if($seo_post == 'true') { add_meta_box( 'ht_seo', 'SEO Options', 'display_meta_box_seo', 'post', 'normal', 'high' ); }		
		if($seo_page == 'true') { add_meta_box( 'ht_seo', 'SEO Options', 'display_meta_box_seo', 'page', 'normal', 'high' ); }
		if($seo_slider == 'true') { add_meta_box( 'ht_seo', 'SEO Options', 'display_meta_box_seo', 'slider-item', 'normal', 'high' ); }
		if($seo_portfolio == 'true') { add_meta_box( 'ht_seo', 'SEO Options', 'display_meta_box_seo', 'portfolio-item', 'normal', 'high' ); }
		if($seo_news == 'true') { add_meta_box( 'ht_seo', 'SEO Options', 'display_meta_box_seo', 'news-item', 'normal', 'high' ); }
		if($seo_gallery == 'true') { add_meta_box( 'ht_seo', 'SEO Options', 'display_meta_box_seo', 'gallery-item', 'normal', 'high' ); }

		add_meta_box( 'ht_type', 'Post Format', 'display_meta_box_type', 'post', 'side', 'high' );
		add_meta_box( 'ht_type', 'Post Format', 'display_meta_box_type', 'portfolio-item', 'side', 'high' );
		add_meta_box( 'ht_type', 'Post Format', 'display_meta_box_type', 'news-item', 'side', 'high' );

	}

}



/*-------------------------------------------------------------
~~~~~~~~~Display SEO Meta Box ~~~~~~~~
-------------------------------------------------------------*/
function display_meta_box_seo() {
	global $post, $meta_boxes_seo, $key;
?>
<div class="ht-metabox-wrap">
<?php
	wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );

	foreach($meta_boxes_seo as $meta_box) {
	$data = get_post_meta($post->ID, $key, true);
?>

	<div class="ht-metabox-form-field">

	<label for="<?php echo $meta_box[ 'id' ]; ?>"><?php echo $meta_box[ 'name' ]; ?></label>

	<?php if($meta_box['type']=="text") :?>
	<input type="text" name="<?php echo $meta_box[ 'id' ]; ?>"  value="<?php if (isset($data[$meta_box['id']]) && $data[$meta_box['id']] != "") { echo htmlspecialchars( $data[$meta_box['id']] ); } else { echo $meta_box['std']; } ?>" />
	<?php endif; ?>

	<?php if($meta_box['type']=="textarea") :?>
	<textarea name="<?php echo $meta_box[ 'id' ]; ?>" ><?php if (isset($data[$meta_box['id']]) && $data[$meta_box['id']] != "") { echo htmlspecialchars( $data[$meta_box['id']] ); } else { echo $meta_box['std']; } ?></textarea>
	<?php endif; ?>

	<?php if($meta_box['type'] == "select") : ?>   
	<select name="<?php echo $meta_box['id']; ?>" id="<?php echo $meta_box['id']; ?>" > 
	<?php foreach ($meta_box['options'] as $option) { 

		$select_value = $data[$meta_box['id']];

		$selected = '';
					
		 if($select_value != '') {
			 if ( $select_value == $option) { $selected = ' selected="selected"';} 
		 } else {
			 if ( isset($meta_box['std']) )
				 if ($meta_box['std'] == $option) { $selected = ' selected="selected"'; }
		 }
	?>
		<option <?php echo $selected; ?>><?php echo $option; ?></option>

	<?php } ?>
	</select>
	<?php endif; ?>

	<p class="ht-description"><?php echo $meta_box[ 'desc' ]; ?></p>

	</div>

<?php } ?>

</div>
<?php
}



/*-------------------------------------------------------------
~~~~~~~~~Display Type Meta Box ~~~~~~~~
-------------------------------------------------------------*/
function display_meta_box_type() {
	global $post, $meta_boxes_type, $key;
?>
<div class="ht-metabox-wrap">
<?php
	wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );

	foreach($meta_boxes_type as $meta_box) {
	$data = get_post_meta($post->ID, $key, true);
?>

	<div class="ht-metabox-form-field">

	<label for="<?php echo $meta_box[ 'id' ]; ?>"><?php echo $meta_box[ 'name' ]; ?></label>

	<?php if($meta_box['type']=="text") :?>
	<input type="text" name="<?php echo $meta_box[ 'id' ]; ?>"  value="<?php if (isset($data[$meta_box['id']]) && $data[$meta_box['id']] != "") { echo htmlspecialchars( $data[$meta_box['id']] ); } else { echo $meta_box['std']; } ?>" />
	<?php endif; ?>

	<?php if($meta_box['type']=="textarea") :?>
	<textarea name="<?php echo $meta_box[ 'id' ]; ?>" ><?php if (isset($data[$meta_box['id']]) && $data[$meta_box['id']] != "") { echo htmlspecialchars( $data[$meta_box['id']] ); } else { echo $meta_box['std']; } ?></textarea>
	<?php endif; ?>

	<?php if($meta_box['type'] == "select") : ?>   
	<select name="<?php echo $meta_box['id']; ?>" id="<?php echo $meta_box['id']; ?>" > 
	<?php foreach ($meta_box['options'] as $option) { 

		$select_value = $data[$meta_box['id']];

		$selected = '';
					
		 if($select_value != '') {
			 if ( $select_value == $option) { $selected = ' selected="selected"';} 
		 } else {
			 if ( isset($meta_box['std']) )
				 if ($meta_box['std'] == $option) { $selected = ' selected="selected"'; }
		 }
	?>
		<option <?php echo $selected; ?>><?php echo $option; ?></option>

	<?php } ?>
	</select>
	<?php endif; ?>

	<p class="ht-description"><?php echo $meta_box[ 'desc' ]; ?></p>

	</div>

<?php } ?>

</div>
<?php
}

/*-------------------------------------------------------------
~~~~~~~~~Display Slider Url Meta Box ~~~~~~~~
-------------------------------------------------------------*/
function display_meta_box_slider_url() {
	global $post, $meta_boxes_slider_url, $key;
?>
<div class="ht-metabox-wrap">
<?php
	wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );

	foreach($meta_boxes_slider_url as $meta_box) {
	$data = get_post_meta($post->ID, $key, true);
?>

	<div class="ht-metabox-form-field">

	<label for="<?php echo $meta_box[ 'id' ]; ?>"><?php echo $meta_box[ 'name' ]; ?></label>

	<?php if($meta_box['type']=="text") :?>
	<input type="text" name="<?php echo $meta_box[ 'id' ]; ?>"  value="<?php if (isset($data[$meta_box['id']]) && $data[$meta_box['id']] != "") { echo htmlspecialchars( $data[$meta_box['id']] ); } else { echo $meta_box['std']; } ?>" />
	<?php endif; ?>

	<p class="ht-description"><?php echo $meta_box[ 'desc' ]; ?></p>

	</div>

<?php } ?>

</div>
<?php
}

/*-------------------------------------------------------------
~~~~~~~~~Save  Meta Box ~~~~~~~~
-------------------------------------------------------------*/
function save_meta_box( $post_id ) {
	global $post, $meta_boxes_seo, $meta_boxes_type, $meta_boxes_slider_url, $key;

//SEO
	foreach( $meta_boxes_seo as $meta_box ) {
		$_post_meta_box = isset($_POST[ $meta_box[ 'id' ] ]) ? $_POST[ $meta_box[ 'id' ] ] : ''; //Fixed Undefined Notice
		$data[ $meta_box[ 'id' ] ] = $_post_meta_box;
	}

//Type
	foreach( $meta_boxes_type as $meta_box ) {
		$_post_meta_box = isset($_POST[ $meta_box[ 'id' ] ]) ? $_POST[ $meta_box[ 'id' ] ] : ''; //Fixed Undefined Notice
		$data[ $meta_box[ 'id' ] ] = $_post_meta_box;
	}

//Slider
	foreach( $meta_boxes_slider_url as $meta_box ) {
		$_post_meta_box = isset($_POST[ $meta_box[ 'id' ] ]) ? $_POST[ $meta_box[ 'id' ] ] : ''; //Fixed Undefined Notice
		$data[ $meta_box[ 'id' ] ] = $_post_meta_box;
	}

	$_post_key = isset($_POST[ $key . '_wpnonce' ]) ? $_POST[ $key . '_wpnonce' ] : ''; 
	if ( !wp_verify_nonce( $_post_key, plugin_basename(__FILE__) ) )
	return $post_id;

	if ( !current_user_can( 'edit_post', $post_id ))
	return $post_id;

	update_post_meta( $post_id, $key, $data );

}

?>