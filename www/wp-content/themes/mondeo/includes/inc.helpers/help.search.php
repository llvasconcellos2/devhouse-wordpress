<?php 
 /*******************************************************************************
 * The Search Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~Top Search~~~~~~~~~~~
$search_query = get_search_query();
-------------------------------------------------------------*/
function ht_top_search_from() {

		echo '<div id="topsearch">'."\n";
		echo '<form action="'.home_url().'" method="get">'."\n";
		echo '<input type="text" id="topsearch-input" class="cleardefault" name="s" size="24" value="Procurar..."  />';
		echo '<input type="submit"  id="topsearch-button" name="topsearch-button" value="" />'."\n";
		echo '</form>'."\n";
		echo '</div>'."\n";

}

?>