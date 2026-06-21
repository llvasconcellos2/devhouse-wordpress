<?php
 /*******************************************************************************
 * Template Is For: Portfolio Single
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
get_header();

//Settings
	global $shortname;
	$layout = get_option($shortname.'_portfolio_layout_single');
	$author = get_option($shortname.'_portfolio_post_byline_author') == 'true';
	$date = get_option($shortname.'_portfolio_post_byline_date') == 'true';
	$comments = get_option($shortname.'_portfolio_post_byline_comments') == 'true';
	$categories = get_option($shortname.'_portfolio_post_byline_categories') == 'true';
	$author_info = get_option($shortname.'_portfolio_author_info_display') == 'true';
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
<?php if($layout == 'left side') { ht_sidebar_portfolio(); } ?>
<article id="content">
<?php if (have_posts()) : the_post(); ?>
<div class="post-single" id="post-<?php the_ID(); ?>">

<section class="post-header">
	<h2><?php the_title(); ?></h2>
	<div class="entry-meta">
		<?php if($author): ?><span><?php _e('By','hawktheme'); ?> <?php the_author_posts_link(); ?></span><?php endif; ?>
		<?php if($date): ?><span><?php _e('On','hawktheme'); ?> <?php the_time(__('F j. Y')); ?></span><?php endif; ?>
		<?php if($categories): ?><span><?php _e('In','hawktheme'); ?> <?php echo get_the_term_list( $post->ID, 'portfolio', '', ',', '' ); ?></span><?php endif; ?>
		<?php if($comments): ?><span><?php _e('With','hawktheme'); ?> <?php comments_popup_link(__('No Comment'), __('1Comment'), __('%Comment'), '', __('Comment Off')); ?></span><?php endif; ?>
	</div><!--#end entry meta-->
</section>
<div class="post-text"><?php the_content(); ?></div>
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'hawktheme' ), 'after' => '</div>' ) ); ?><!--end link page-->
<?php echo get_the_term_list( $post->ID, 'portfolio-tag', '<div class="tags">'. __('Tagged with: ','hawktheme'), ' , ', '</div>' ); ?>
<?php ht_the_author($author_info, 'portfolio-item'); ?>
</div><!--end post single-->
<?php comments_template( '', true ); ?>
<?php else : ?>
<div class="warning radius-5"><p class="radius-5"><?php _e('You do not have any posts to display.','hawktheme'); ?></p></div>
<?php endif; ?>
</article>
<?php if($layout == 'right side') { ht_sidebar_portfolio(); } ?>
<div class="clear"></div>
</div><!--#end content wrap-->
</div><!--# container-->
<?php get_footer(); ?>