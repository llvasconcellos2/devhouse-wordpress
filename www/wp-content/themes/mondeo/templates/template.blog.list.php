<?php
 /*******************************************************************************
 * Template Is For: Blog Lists
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
get_header();

//Settings
	global $shortname;
	$layout = get_option($shortname.'_blog_layout_lists');
	$showposts = get_option($shortname.'_blog_showposts');
	$author = get_option($shortname.'_blog_post_byline_author') == 'true';
	$date = get_option($shortname.'_blog_post_byline_date') == 'true';
	$comments = get_option($shortname.'_blog_post_byline_comments') == 'true';
	$categories = get_option($shortname.'_blog_post_byline_categories') == 'true';
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
<?php if($layout == 'left side') { ht_sidebar_blog(); } ?>
<article id="content">
<?php
	if(is_page()) {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		$args = array( 
			'post_type' => 'post',
			'posts_per_page' => $showposts,
			'paged' => $paged 
		); 
		query_posts($args);
	}

	if (have_posts()) : 
?>
<div class="blog-lists post-lists">
<ul class="thumb-preloader thumb-fade thumb-move">
<?php 
	
	$i = 0;
	while (have_posts()) : the_post();  
	$i++;
	?>
<li <?php post_class(); ?>>
	<div class="entry-meta">
		<?php  /*if($author): ?><p><?php _e('By','hawktheme'); ?> <?php the_author_posts_link(); ?></p><?php endif;*/ ?>
			
		<?php  if($author): ?><p><?php _e('By','hawktheme'); ?> <span class="vcard author"><a href="https://leonardo-vasconcellos.vercel.app/" title="Posts de Leonardo Lima de Vasconcellos" rel="author" class="fn">Leonardo Lima de Vasconcellos</a></span></p><?php endif; ?>
			
		<?php if($date): ?><p class="updated"><?php _e('On','hawktheme'); ?> <?php echo get_the_time(__('F j. Y', 'hawktheme')); ?></p><?php endif; ?>
		<?php if($categories): ?><p><?php _e('In','hawktheme'); ?> <?php the_category(', '); ?></p><?php endif; ?>
		<?php if($comments): ?><p><?php _e('With','hawktheme'); ?> <?php comments_popup_link(__('No Comment', 'hawktheme'), __('1Comment', 'hawktheme'), __('%Comment', 'hawktheme'), '', __('Comment Off', 'hawktheme')); ?></p><?php endif; ?>
	</div><!--#end entry meta-->
	<div class="entry-content">
		<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="entry-title"><?php the_title(); ?></a></h3>
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
		<img src="<?php ht_get_thumbnail(160, 420); ?>" alt="<?php the_title(); ?>" title="<?php the_title_attribute(); ?>" />
		<div class="fade-hover hide"></div>
		<div class="overlay"></div>
		<div class="shadow"></div>
		</a>
		</figure>
		<p><?php ht_content_limit(300); ?></p>
		<div class="button-wrap"><a href="<?php the_permalink(); ?>" class="border-shadow-radius-20"><?php _e('Read more', 'hawktheme'); ?></a></div>
		<div class="clear"></div>
	</div><!--#end entry content-->
	<?php
	if($i%3 == 0){
	?>
	<p></p>
	<div style="text-align: right">

	</div>
	<?php } ?>
</li>
<?php endwhile; ?>
</ul>
<?php ht_pagenavi(); ?>
</div><!--#end blog lists-->
<?php else : ?>
<div class="warning radius-5"><p class="radius-5"><?php _e('You do not have any posts to display.','hawktheme'); ?></p></div>
<?php endif; ?>
</article>
<?php if($layout == 'right side') { ht_sidebar_blog(); } ?>
<div class="clear"></div>
</div><!--#end content wrap-->
</div><!--# container-->
<?php get_footer(); ?>
