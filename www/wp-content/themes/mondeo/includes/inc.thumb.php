<?php 
/*******************************************************************************
 * The thumb functions for our theme. *
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~Set featured image Url~~~~~~~~~
-------------------------------------------------------------*/
function ht_featured_thumbnail($size='full') {
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id, $size);
	$image_url = $image_url[0];
	echo $image_url;
}



/*-------------------------------------------------------------
~~~~~~~~Get image attachment ~~~~~~~~~
~~~~~~sizes: thumbnail, medium, full~~~~~~
-------------------------------------------------------------*/
function ht_post_thumbnail($postid=0, $size='full') {
	if ($postid<1) 
	$postid = get_the_ID();
	$thumb = get_post_meta($postid, "thumb", TRUE);

	if ($thumb != null or $thumb != '') {
		echo $thumb; 
	}elseif ($images = get_children(array(
			'post_parent' => $postid,
			'post_type' => 'attachment',
			'numberposts' => '1',
			'post_mime_type' => 'image', )))
			foreach($images as $image) {
				$thumbnail=wp_get_attachment_image_src($image->ID, $size);
				echo $thumbnail[0];
	}else{
		echo Skins_Url. '/images/preview.png';	
	}//endif

}//end ht post thumb


/*-------------------------------------------------------------
~~~~~~~~Set image Url~~~~~~~~~
-------------------------------------------------------------*/
function ht_get_thumbnail($height, $width) {

	echo FrameWork_Url.'/plugins/timthumb.php?src=';

	if ( has_post_thumbnail() ) {

		ht_featured_thumbnail();

	}else{

		ht_post_thumbnail();

	}

	echo '&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1';

}

/*-------------------------------------------------------------
~~~~~~~~Set Image File Url~~~~~~~~~
-------------------------------------------------------------*/
function ht_get_file_thumbnail() {

	if ( has_post_thumbnail() ) {

		ht_featured_thumbnail();

	}else{

		ht_post_thumbnail();

	}

}

?>