<?php
 /*******************************************************************************
 * Template Is For: Gallery jQuery Lists
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
get_header();

//Settings
	global $shortname;
	$layout = get_option($shortname.'_gallery_layout_lists');
	$showposts = get_option($shortname.'_gallery_showposts');
	if($layout == 'two column') {
		$class = 'two-column';
		$width = 430;
		$height = 190;
		$num = 2;
	}elseif($layout == 'three column') {
		$class = 'three-column';
		$width = 270;
		$height = 150;
		$num = 3;
	}elseif($layout == 'four column') {
		$class = 'four-column';
		$width = 190;
		$height = 120;
		$num = 4;
	}
?>
<div id="container">
<div class="wrap layout-width fullwidth fixed">
<article id="content">
<?php
	if(is_page()) {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		$args = array( 
			'post_type' => 'gallery-item',
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

			$terms = get_terms('gallery');
			foreach ($terms as $term) {
				echo '<li><a href="#" data-filter=".'.$term->slug.'">'.$term->name.'</a></li>'."\n";
			}

		echo '</ul>'."\n";
		echo '<div class="clear"></div></div>'."\n";
?>
<div  id="filter-lists" class="gallery-lists post-lists">
<ul id="items" class="items thumb-fade thumb-move <?php echo $class; ?>">
<?php while (have_posts()) : the_post(); $count++; ?>
<li  class="<?php $terms = get_the_terms ($post->ID, 'gallery'); foreach ($terms as $term) { echo $term->slug.' '; } echo 'gallery-'.$count; ?>">
		<figure class="type-more">
		<a href="<?php the_permalink(); ?>"  title="<?php the_title_attribute(); ?>" rel="bookmark">
		<img src="<?php ht_get_thumbnail($height, $width); ?>" alt="<?php the_title(); ?>" title="<?php the_title_attribute(); ?>" />
		<div class="fade-hover hide"></div>
		<div class="overlay"></div>
		<div class="shadow"></div>
		</a>
		</figure>
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