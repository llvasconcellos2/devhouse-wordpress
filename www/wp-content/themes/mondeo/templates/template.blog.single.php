<?php
 /*******************************************************************************
 * Template Is For: Blog Single
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
get_header();

//Settings
	global $shortname;
	$layout = get_option($shortname.'_blog_layout_single');
	$author = get_option($shortname.'_blog_post_byline_author') == 'true';
	$date = get_option($shortname.'_blog_post_byline_date') == 'true';
	$comments = get_option($shortname.'_blog_post_byline_comments') == 'true';
	$categories = get_option($shortname.'_blog_post_byline_categories') == 'true';
	$author_info = get_option($shortname.'_blog_author_info_display') == 'true';
	$related_display = get_option($shortname.'_related_posts_display') == 'true';
	if($layout == 'left side') {
		$class = 'left-side';
	}elseif($layout == 'right side') {
		$class = 'right-side';
	}elseif($layout == 'fullwidth') {
		$class = 'fullwidth';
	}else{
		$class = 'right-side';
	}	 
?>
<div id="container">
<div class="wrap layout-width <?php echo $class; ?>">
<?php if($layout == 'left side') { ht_sidebar_blog(); } ?>
<article id="content">
<?php if (have_posts()) : the_post(); ?>
<div class="post-single" id="post-<?php the_ID(); ?>">

<section class="post-header">
	<h2><?php the_title(); ?></h2>
	<div class="entry-meta">
		<?php if($author): ?><span><?php _e('By','hawktheme'); ?> <?php the_author_posts_link(); ?></span><?php endif; ?>
		<?php if($date): ?><span><?php _e('On','hawktheme'); ?> <?php echo get_the_time(__('F j. Y', 'hawktheme')); ?></span><?php endif; ?>
		<?php if($categories): ?><span><?php _e('In','hawktheme'); ?> <?php the_category(', '); ?></span><?php endif; ?>
		<?php if($comments): ?><span><?php _e('With','hawktheme'); ?> <?php comments_popup_link(__('No Comment', 'hawktheme'), __('1Comment', 'hawktheme'), __('%Comment', 'hawktheme'), '', __('Comment Off', 'hawktheme')); ?></span><?php endif; ?>
	</div><!--#end entry meta-->
</section>
<div style="width:604px">
<?php 
			echo '<figure class="type-image">'."\n";
			echo '<img src="'; ht_get_thumbnail(227, 600); echo '" alt="'.get_the_title().'" title="'.get_the_title().'" />';
			echo '<div class="fade-hover"></div>';
			echo '<div class="overlay"></div>';
			echo '<div class="shadow"></div>';
			echo '</figure>'."\n";
		?>
</div>
<div class="post-text"><?php the_content(); ?></div>
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'hawktheme' ), 'after' => '</div>' ) ); ?><!--end link page-->
<?php echo get_the_term_list( $post->ID, 'post_tag', '<div class="tags">'. __('Tagged with: ','hawktheme'), ' , ', '</div>' ); ?>
<?php ht_the_author($author_info, 'post'); ?>
<?php
	if($layout == 'fullwidth') {
		$related_class = 'fullwidth';
		$showposts = 4;
		$width = 190;
		$height = 100;
		$length = 60;
	}else{
		$related_class = 'side';
		$showposts = 2;
		$width = 260;
		$height = 120;
		$length = 120;
	}	 

	ht_related_posts($related_display, $showposts, $width, $height, $related_class, $length); //end related posts
?>
</div><!--end post single-->
<?php comments_template( '', true ); ?>
<?php else : ?>
<div class="warning radius-5"><p class="radius-5"><?php _e('You do not have any posts to display.','hawktheme'); ?></p></div>
<?php endif; ?>
</article>
<?php if($layout == 'right side') { ht_sidebar_blog(); } ?>
<div class="clear"></div>

<p></p>

</div><!--#end content wrap-->
</div><!--# container-->
<?php get_footer(); ?>