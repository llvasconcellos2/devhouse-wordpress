<?php
 /*******************************************************************************
 * Template Is For: News Lists
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
get_header();

//Settings
	global $shortname;
	$layout = get_option($shortname.'_news_layout_lists');
	$showposts = get_option($shortname.'_news_showposts');
	if($layout == 'left side') {
		$class = 'left-side';
	}elseif($layout == 'right side') {
		$class = 'right-side';
	}else{
		$class = 'right-side';
	}
?>
<div id="container">
<div class="wrap layout-width <?php echo $class; ?>">
<?php if($layout == 'left side') { ht_sidebar_news(); } ?>
<article id="content">
<?php
	if(is_page()) {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		$args = array( 
			'post_type' => 'news-item',
			'posts_per_page' => $showposts,
			'paged' => $paged 
		); 
		query_posts($args);
	}

	if (have_posts()) : 
?>
<div class="news-lists post-lists">
<ul class="thumb-preloader thumb-fade thumb-move">
<?php while (have_posts()) : the_post();  ?>
<li <?php post_class(); ?>>
	<div class="entry-meta">
		<p><?php the_time(__('F j. Y')); ?></p>
	</div><!--#end entry meta-->
	<div class="entry-content">
		<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<?php 
			global $post, $key;
			$data = get_post_meta( $post->ID, $key, true );
			$posts_format = isset( $data['posts_format'] ) ? $data['posts_format']: ''; 
			$video_link = isset( $data['video_link'] ) ? $data['video_link']: ''; 

			if($posts_format == 'Image') {

				echo '<figure class="type-image">';
				echo '<a href="'; ht_get_file_thumbnail(); echo '" class="preloader" rel="tag[Image]" title="'; the_title_attribute(); echo '">';

			}elseif($posts_format == 'Video') {
				
				echo '<figure class="type-video">';
				echo '<a href="'.$video_link.'?width=640&amp;height=280" class="preloader" rel="tag[iframe]" title="';  the_title_attribute(); echo '">';

			}else{
				
				echo '<figure class="type-more">';
				echo '<a href="'.get_permalink().'" class="preloader" rel="bookmark" title="'; the_title_attribute(); echo '">';

			}
		?>
		<img src="<?php ht_get_thumbnail(80, 120); ?>" alt="<?php the_title(); ?>" title="<?php the_title_attribute(); ?>" />
		<div class="fade-hover hide"></div>
		<div class="overlay"></div>
		<div class="shadow"></div>
		</a>
		</figure>
		<p><?php ht_content_limit(130); ?></p>
		<div class="button-wrap"><a href="<?php the_permalink(); ?>" class="border-shadow-radius-20"><?php _e('Read more', 'hawktheme'); ?></a></div>
		<div class="clear"></div>
	</div><!--#end entry content-->
</li>
<?php endwhile; ?>
</ul>
<?php ht_pagenavi(); ?>
</div><!--#end news lists-->
<?php else : ?>
<div class="warning radius-5"><p class="radius-5"><?php _e('You do not have any posts to display.','hawktheme'); ?></p></div>
<?php endif; ?>
</article>
<?php if($layout == 'right side') { ht_sidebar_news(); } ?>
<div class="clear"></div>
</div><!--#end content wrap-->
</div><!--# container-->
<?php get_footer(); ?>