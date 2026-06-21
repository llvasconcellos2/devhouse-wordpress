<?php
 /*******************************************************************************
 * Template Is For: Gallery Single
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
get_header();	 
global $shortname;
$speed = get_option($shortname.'_gallery_single_slider_speed');
$delay = get_option($shortname.'_gallery_single_slider_delay');
?>
<div id="container">
<div class="wrap layout-width fullwidth fixed">
<article id="content">
<?php if (have_posts()) : the_post(); ?>

<div class="post-single<?php if(is_page()) { echo ' post-gallery-page';} ?>" id="post-<?php the_ID(); ?>">

<div id="gallery" class="gallery-wrap">
	<div id="controls" class="controls"></div>
	<div class="slideshow-container">
		<div id="loading" class="loader"></div>
		<div id="slideshow" class="slideshow"><div class="overlay"></div></div>
	</div>
	<div id="caption" class="caption-container">
		<div class="photo-index"></div>
	</div>
</div>

<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function($) {

			// Initially set opacity on thumbs and add
			// additional styling for hover effect on thumbs
			var onMouseOutOpacity = 0.8;
			$('#thumbs ul.thumbs li, .navigation a.pageLink').opacityrollover({
				mouseOutOpacity:   onMouseOutOpacity,
				mouseOverOpacity:  1.0,
				fadeSpeed:         'fast',
				exemptionSelector: '.selected'
			});
			
			// Initialize Advanced Galleriffic Gallery
			var gallery = $('#thumbs').galleriffic({
				delay:                     <?php echo $delay; ?>,
				numThumbs:                 12,
				preloadAhead:              10,
				enableTopPager:            false,
				enableBottomPager:         true,
				maxPagesToShow:            7,
				imageContainerSel:         '#slideshow',
				controlsContainerSel:      '#controls',
				captionContainerSel:       '#caption',
				loadingContainerSel:       '#loading',
				renderSSControls:          true,
				renderNavControls:         true,
				playLinkText:              'Play',
				pauseLinkText:             'Pause',
				prevLinkText:              '&lsaquo; Previous',
				nextLinkText:              'Next &rsaquo;',
				nextPageLinkText:          'Next &rsaquo;',
				prevPageLinkText:          '&lsaquo; Prev',
				enableHistory:             true,
				autoStart:                 false,
				syncTransitions:           true,
				defaultTransitionDuration: <?php echo $speed; ?>,
				onSlideChange:             function(prevIndex, nextIndex) {
					// 'this' refers to the gallery, which is an extension of $('#thumbs')
					this.find('ul.thumbs').children()
						.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
						.eq(nextIndex).fadeTo('fast', 1.0);
					// Update the photo index display
					this.$captionContainer.find('.photo-index')
						.html('Photo '+ (nextIndex+1) +' of '+ this.data.length);
				},
				onPageTransitionOut:       function(callback) {
					this.fadeTo('fast', 0.0, callback);
				},
				onPageTransitionIn:        function() {
					this.fadeTo('fast', 1.0);
				}
			});

			/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

			// PageLoad function
			// This function is called when:
			// 1. after calling $.historyInit();
			// 2. after calling $.historyLoad();
			// 3. after pushing "Go Back" button of a browser
			function pageload(hash) {
				// alert("pageload: " + hash);
				// hash doesn't contain the first # character.
				if(hash) {
					$.galleriffic.gotoImage(hash);
				} else {
					gallery.gotoIndex(0);
				}
			}

			// Initialize history plugin.
			// The callback is called at once by present location.hash. 
			$.historyInit(pageload, "advanced.html");

			// set onlick event for buttons using the jQuery 1.3 live method
			$("a[rel='history']").live('click', function(e) {
				if (e.button != 0) return true;
				
				var hash = this.href;
				hash = hash.replace(/^.*#/, '');

				// moves to a new page. 
				// pageload is called at once. 
				// hash don't contain "#", "?"
				$.historyLoad(hash);

				return false;
			});

});
//]]>
</script>

<div id="thumbs" class="gallery-navigation">
<?php
		$post_id = get_the_ID();
		$thumb = get_post_meta($post_id, "thumb", TRUE); 
		$count = 0;
		$images = get_children(array(
			'post_parent' => $post_id,
			'post_type' => 'attachment',
			'post_mime_type' => 'image'
		));
?>
<ul class="thumbs thumb-preloader">
	<?php 
			foreach($images as $image): 
			$count++; 
			$thumbnail = wp_get_attachment_image_src($image->ID, 'full');
			$image_url = $thumbnail[0];
			//$image->post_title;
			//$image->post_content;
			//$image->post_excerpt;
	?>
		<li class="<?php if ($count % 3 == 0) { echo 'last gallery-thumb-'.$count; } else { echo 'gallery-thumb-'.$count; } ?>"><a class="thumb preloader" href="<?php echo  FrameWork_Url.'/plugins/timthumb.php?src='. $image_url .'&amp;h=410&amp;w=580&amp;zc=1'; ?>"><img src="<?php echo FrameWork_Url.'/plugins/timthumb.php?src='. $image_url .'&amp;h=60&amp;w=60&amp;zc=1'; ?>" alt='<?php echo $image->post_title; ?>' title='<?php echo $image->post_title; ?>' /><div class="overlay"></div></a></li>
	<?php endforeach; ?>
</ul>
</div>
<div class="clear"></div>

<?php 
if(is_singular('gallery-item')) {
	 echo '<section class="post-header"><h2>';  the_title(); echo '</h2></section>'; 
}
?>
<div class="post-text"><?php the_content(); ?></div>
<?php if(is_singular('gallery-item')) { echo get_the_term_list( $post->ID, 'gallery-tag', '<div class="tags">'. __('Tagged with: ','hawktheme'), ' , ', '</div>' ); } ?>
</div><!--end post single-->

<?php 
	if(is_singular('gallery-item')) { 
		comments_template( '', true ); 
	}
?>
<?php else : ?>
<div class="warning radius-5"><p class="radius-5"><?php _e('You do not have any pictures to display.','hawktheme'); ?></p></div>
<?php endif; ?>
</article>
</div><!--#end content wrap-->
</div><!--# container-->
<?php get_footer(); ?>