<?php 
 /*******************************************************************************
 * The SEO Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
/*-------------------------------------------------------------
~~~~~~~~Blog~~~~~~~~
-------------------------------------------------------------*/
function ht_sidebar_blog() {

	echo '<aside id="sidebar">'."\n";

	if ( !dynamic_sidebar('blog-widget-area') ) {
	
		echo '<div class="warning radius-5"><p class="radius-5">';
			_e('This is your Blog Sidebar, and no widgets have been placed here yet! Set it form Appearance => Widgets','hawktheme');
		echo '</p></div>'."\n";
	
	}

	echo '</aside>'."\n";

}



/*-------------------------------------------------------------
~~~~~~~~Portfolio~~~~~~~~
-------------------------------------------------------------*/
function ht_sidebar_portfolio() {

	echo '<aside id="sidebar">'."\n";

	if ( !dynamic_sidebar('portfolio-widget-area') ) {
	
		echo '<div class="warning radius-5"><p class="radius-5">';
			_e('This is your Portfolio Sidebar, and no widgets have been placed here yet! Set it form Appearance => Widgets','hawktheme');
		echo '</p></div>'."\n";
	
	}

	echo '</aside>'."\n";

}


/*-------------------------------------------------------------
~~~~~~~~News~~~~~~~~
-------------------------------------------------------------*/
function ht_sidebar_news() {

	echo '<aside id="sidebar">'."\n";

	if ( !dynamic_sidebar('news-widget-area') ) {
	
		echo '<div class="warning radius-5"><p class="radius-5">';
			_e('This is your News Sidebar, and no widgets have been placed here yet! Set it form Appearance => Widgets','hawktheme');
		echo '</p></div>'."\n";
	
	}

	echo '</aside>'."\n";

}

/*-------------------------------------------------------------
~~~~~~~~News~~~~~~~~
-------------------------------------------------------------*/
function ht_sidebar_page() {

	echo '<aside id="sidebar">'."\n";

	if ( !dynamic_sidebar('page-widget-area') ) {
	
		echo '<div class="warning radius-5"><p class="radius-5">';
			_e('This is your Page Sidebar, and no widgets have been placed here yet! Set it form Appearance => Widgets','hawktheme');
		echo '</p></div>'."\n";
	
	}

	echo '</aside>'."\n";

}

/*-------------------------------------------------------------
~~~~~~~~Contact~~~~~~~~
-------------------------------------------------------------*/
function ht_sidebar_contact() {

	echo '<aside id="sidebar">'."\n";

	if ( !dynamic_sidebar('contact-widget-area') ) {
	
		echo '<div class="warning radius-5"><p class="radius-5">';
			_e('This is your Contact Sidebar, and no widgets have been placed here yet! Set it form Appearance => Widgets','hawktheme');
		echo '</p></div>'."\n";
	
	}

	echo '</aside>'."\n";

}


?>
