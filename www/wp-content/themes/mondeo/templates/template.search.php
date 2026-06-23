<?php

/*******************************************************************************
 * Template Is For: Search
 * @package HawkTheme
 * @since Mondeo 1.0
 *******************************************************************************/
get_header();
?>
<div id="container">
	<div class="wrap layout-width <?php echo $class; ?>">
		<article id="content">
			<?php
			global $query_string;
			parse_str($query_string, $qstring_array);
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => array('post', 'portfolio-item', 'gallery-item', 'slider-item', 'news-item'),
				'posts_per_page' => 12,
				'paged' => $paged
			);
			$query_args = array_merge($args, $qstring_array);
			query_posts($query_args);
			if (have_posts()) :
			?>
				<div class="blog-lists post-lists">
					<ul class="thumb-preloader thumb-fade thumb-move">
						<?php while (have_posts()) : the_post();  ?>
							<li <?php post_class(); ?>>
								<div class="entry-meta">
									<p><?php _e('By', 'hawktheme'); ?> <?php the_author_posts_link(); ?></p>
									<p><?php _e('On', 'hawktheme'); ?> <?php echo get_the_time(__('F j. Y', 'hawktheme')); ?></p>
									<p><?php _e('With', 'hawktheme'); ?> <?php comments_popup_link(__('No Comment', 'hawktheme'), __('1Comment', 'hawktheme'), __('%Comment', 'hawktheme'), '', __('Comment Off', 'hawktheme')); ?></p>
								</div><!--#end entry meta-->
								<div class="entry-content">
									<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
									<?php
									global $post, $key;
									$data = get_post_meta($post->ID, $key, true);
									$posts_format = isset($data['posts_format']) ? $data['posts_format'] : '';
									$video_link = isset($data['video_link']) ? $data['video_link'] : '';

									if ($posts_format == 'Image') {

										echo '<figure class="type-image">';
										echo '<a href="';
										ht_get_file_thumbnail();
										echo '" class="preloader" rel="tag[Image]" title="';
										the_title_attribute();
										echo '">';
									} elseif ($posts_format == 'Video') {

										echo '<figure class="type-video">';
										echo '<a href="' . $video_link . '?width=640&amp;height=280" class="preloader" rel="tag[iframe]" title="';
										the_title_attribute();
										echo '">';
									} else {

										echo '<figure class="type-more">';
										echo '<a href="' . get_permalink() . '" class="preloader" rel="bookmark" title="';
										the_title_attribute();
										echo '">';
									}
									?>
									<img src="<?php ht_get_thumbnail(160, 420); ?>" alt="<?php the_title(); ?>" title="<?php the_title_attribute(); ?>" />
									<div class="fade-hover hide"></div>
									<div class="overlay"></div>
									<div class="shadow"></div>
									</a>
									</figure>
									<p><?php ht_content_limit(260); ?></p>
									<div class="button-wrap"><a href="<?php the_permalink(); ?>" class="border-shadow-radius-20"><?php _e('Read more', 'hawktheme'); ?></a></div>
									<div class="clear"></div>
								</div><!--#end entry content-->
								<?php
								if ($i % 3 == 0) {
								?>
									<p></p>
									<div style="text-align: right">

									</div>
								<?php } ?>
							</li>
						<?php endwhile; ?>
					</ul>
					<?php ht_pagenavi(); ?>
				</div><!--end lists-->
			<?php else : ?>
				<div class="warning radius-5">
					<p class="radius-5"><?php _e('You do not have any posts to display.', 'hawktheme'); ?></p>
				</div>
			<?php endif; ?>
		</article>
	</div><!--#end content wrap-->
</div><!--# container-->
<?php get_footer(); ?>