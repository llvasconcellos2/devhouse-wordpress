<?php
 /*******************************************************************************
 * Template Is For: SiteMap
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
	 get_header(); 
?>
<div id="container">
<div class="wrap layout-width fullwidth">
<article id="content">
<div class="post-single-page" id="post-<?php the_ID(); ?>">

<div id="sitemap">
		<div class="one-fourth">
			<div class="sitemap-col">
			<h3><?php _e('Pages','hawktheme'); ?></h3>
			<ul id="sitemap-pages"><?php wp_list_pages('title_li='); ?></ul>
			</div> <!-- end .sitemap-col -->
		</div><!--end one fourth-->
		<div class="one-fourth">
			<div class="sitemap-col">
			<h3><?php _e('Categories','hawktheme'); ?></h3>
			<ul id="sitemap-categories"><?php wp_list_categories('title_li=&hide_empty=0'); ?></ul>
			</div> <!-- end .sitemap-col -->
			<div class="sitemap-col">
			<h3><?php _e('Portfolios','hawktheme'); ?></h3>
			<ul id="sitemap-portfolios"><?php wp_list_categories('title_li=&hide_empty=0&taxonomy=portfolio'); ?></ul>
			</div> <!-- end .sitemap-col -->
			<div class="sitemap-col">
			<h3><?php _e('Galleries','hawktheme'); ?></h3>
			<ul id="sitemap-galleries"><?php wp_list_categories('title_li=&hide_empty=0&taxonomy=gallery'); ?></ul>
			</div> <!-- end .sitemap-col -->
			<div class="sitemap-col">
			<h3><?php _e('News','hawktheme'); ?></h3>
			<ul id="sitemap-news"><?php wp_list_categories('title_li=&hide_empty=0&taxonomy=news'); ?></ul>
			</div> <!-- end .sitemap-col -->
			<div class="sitemap-col">
			<h3><?php _e('Sliders','hawktheme'); ?></h3>
			<ul id="sitemap-slides"><?php wp_list_categories('title_li=&hide_empty=0&taxonomy=slider'); ?></ul>
			</div> <!-- end .sitemap-col -->
		</div><!--end one fourth-->
		<div class="one-fourth">
		<div class="sitemap-col">
		<h3><?php _e('Tags','hawktheme'); ?></h3>
		<ul id="sitemap-tags">
		<?php 
			$tags = get_tags();
			if ($tags) {
				foreach ($tags as $tag) {
					echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li> ';
				}
			} 
		?>
		</ul>
		</div> <!-- end .sitemap-col -->
		    <div class="sitemap-col">
			<h3><?php _e('Portfolio Tags','hawktheme'); ?></h3>
			<ul id="sitemap-portfolio-tags">		
			<?php 
				$terms = get_terms('portfolio-tag');
				if ($terms) {
					foreach ($terms as $term) {
						echo '<li><a href="' . get_term_link( $term->slug, 'portfolio-tag' ) . '">' . $term->name . '</a></li> ';
					}
				}
			?>
			</ul>
		    </div> <!-- end .sitemap-col -->
			<div class="sitemap-col">
			<h3><?php _e('Gallery Tags','hawktheme'); ?></h3>
			<ul id="sitemap-gallery-tags">		
			<?php 
				$terms = get_terms('gallery-tag');
				if ($terms) {
					foreach ($terms as $term) {
						echo '<li><a href="' . get_term_link( $term->slug, 'gallery-tag' ) . '">' . $term->name . '</a></li> ';
					}
				}
			?>
			</ul>
		    </div> <!-- end .sitemap-col -->
			<div class="sitemap-col">
			<h3><?php _e('News Tags','hawktheme'); ?></h3>
			<ul id="sitemap-news-tags">		
			<?php 
				$terms = get_terms('news-tag');
				if ($terms) {
					foreach ($terms as $term) {
						echo '<li><a href="' . get_term_link( $term->slug, 'news-tag' ) . '">' . $term->name . '</a></li> ';
					}
				}
			?>
			</ul>
		    </div> <!-- end .sitemap-col -->
			<div class="sitemap-col">
			<h3><?php _e('Slider Tags','hawktheme'); ?></h3>
			<ul id="sitemap-news-tags">		
			<?php 
				$terms = get_terms('slider-tag');
				if ($terms) {
					foreach ($terms as $term) {
						echo '<li><a href="' . get_term_link( $term->slug, 'slider-tag' ) . '">' . $term->name . '</a></li> ';
					}
				}
			?>
			</ul>
		    </div> <!-- end .sitemap-col -->
		</div><!--end one fourth-->
		<div class="one-fourth last">
			<div class="sitemap-col">
			<h3><?php _e('Authors','hawktheme'); ?></h3>
			<ul id="sitemap-authors" ><?php wp_list_authors('show_fullname=1&optioncount=1&exclude_admin=0'); ?></ul>
			</div> <!-- end .sitemap-col -->
		</div><!--end one fourth-->
		<div class="clear"></div>
</div><!--end sitemap-->

</div><!--end post single-->
</article>
</div><!--#end content wrap-->
</div><!--# container-->
<?php get_footer(); ?>