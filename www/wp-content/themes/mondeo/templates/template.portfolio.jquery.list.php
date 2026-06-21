<?php
 /*******************************************************************************
 * Template Is For: Portfolio jQuery Lists
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
get_header();

//Settings
	global $shortname;
	$layout = get_option($shortname.'_portfolio_layout_lists');
	$showposts = get_option($shortname.'_portfolio_showposts');
	if($layout == 'two column') {
		$class = 'two-column';
		$width = 430;
		$height = 190;
		$length = 210;
		$num = 2;
		$hgroup = 'h3';
	}elseif($layout == 'three column') {
		$class = 'three-column';
		$width = 270;
		$height = 150;
		$length = 130;
		$num = 3;
		$hgroup = 'h3';
	}elseif($layout == 'four column') {
		$class = 'four-column';
		$width = 190;
		$height = 120;
		$length = 90;
		$num = 4;
		$hgroup = 'h4';
	}
?>
<div id="container">
<div class="wrap layout-width fullwidth fixed">
<article id="content">
<?php
	if(is_page()) {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		$args = array( 
			'post_type' => 'portfolio-item',
			'posts_per_page' => $showposts,
			'paged' => $paged 
		); 
		query_posts($args);
	}

	if (have_posts()) : $count = 0;
?>
<?php
		echo '<div class="terms-menu"><h6>Sort:</h6>'."\n";
		echo '<ul id="filters" class="sortable">'."\n";
			echo '<li><a href="#" data-filter="*">';  _e('All','hawktheme'); echo '</a></li>'."\n";

			$terms = get_terms('portfolio');
			foreach ($terms as $term) {
				echo '<li><a href="#" data-filter=".'.$term->slug.'">'.$term->name.'</a></li>'."\n";
			}

		echo '</ul>'."\n";
		echo '<div class="clear"></div></div>'."\n";
?>
<div id="filter-lists" class="portfolio-lists post-lists">
<ul id="items" class="thumb-fade thumb-move <?php echo $class; ?>">
<?php while (have_posts()) : the_post(); $count++; ?>
<li class="<?php $terms = get_the_terms ($post->ID, 'portfolio'); foreach ($terms as $term) { echo $term->slug.' '; } echo 'portfolio-'.$count; ?>">
		<?php 
			global $post, $key;
			$data = get_post_meta( $post->ID, $key, true );
			$posts_format = isset( $data['posts_format'] ) ? $data['posts_format']: ''; 
			$video_link = isset( $data['video_link'] ) ? $data['video_link']: ''; 

			if($posts_format == 'Image') {

				echo '<figure class="type-image">';
				echo '<a href="'; ht_get_file_thumbnail(); echo '"rel="tag[Image]" title="'; the_title_attribute(); echo '">';

			}elseif($posts_format == 'Video') {
				
				echo '<figure class="type-video">';
				echo '<a href="'.$video_link.'?width=640&amp;height=280"  rel="tag[iframe]" title="';  the_title_attribute(); echo '">';

			}else{
				
				echo '<figure class="type-more">';
				echo '<a href="'.get_permalink().'"  rel="bookmark" title="'; the_title_attribute(); echo '">';

			}
		?>
		<img src="<?php ht_get_thumbnail($height, $width); ?>" alt="<?php the_title(); ?>" title="<?php the_title_attribute(); ?>" />
		<div class="fade-hover hide"></div>
		<div class="overlay"></div>
		<div class="shadow"></div>
		</a>
		</figure>
		<<?php echo $hgroup; ?>><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></<?php echo $hgroup; ?>>
		<p><?php ht_content_limit($length); ?></p>
</li>
<?php endwhile; ?>
<div class="clear"></div>
</ul>
<?php ht_pagenavi(); ?>
</div><!--#end news lists-->
<?php else : ?>
<div class="warning radius-5"><p class="radius-5"><?php _e('You do not have any posts to display.','hawktheme'); ?></p></div>
<?php endif; ?>
</article>
</div><!--#end content wrap-->
</div><!--# container-->
<?php get_footer(); ?>