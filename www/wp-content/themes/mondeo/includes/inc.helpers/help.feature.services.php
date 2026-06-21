<?php
 /*******************************************************************************
 * The Feature Services Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_home_feature_services() {

	echo '<div class="feature-services-wrap">'."\n";
	echo '<div class="feature-services-widgets layout-width">'."\n";
	echo '<div class="one-third">';
	if ( !dynamic_sidebar('home-feature-services-1') );
	echo '</div>'."\n";
	echo '<div class="one-third">';
	if ( !dynamic_sidebar('home-feature-services-2') );
	echo '</div>'."\n";
	echo '<div class="one-third last">';
	if ( !dynamic_sidebar('home-feature-services-3') );
	echo '</div>'."\n";
	echo '<div class="clear"></div>'."\n";
	echo '<div class="topshadow"></div>'."\n";
	echo '</div>'."\n";
	echo '</div>'."\n";

}
?>