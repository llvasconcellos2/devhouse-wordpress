<?php 
 /*******************************************************************************
 * The Slider Piecemaker Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_slider_piecemaker() {

	echo '<div class="piecemaker-3d layout-width">'."\n";

			echo '<div id="piecemaker">'."\n";
			echo '<div class="warning radius-5"><p class="radius-5">';
			_e('You need to upgrade your Flash Player to version 10 or newer.','hawktheme');
			echo '</p></div>'."\n";
			echo '<p><a href="'.esc_url( __( 'http://www.adobe.com/go/getflashplayer', 'hawktheme' ) ).'" rel="external"><img src="'.Skins_Url.'/images/get-flash-player.gif" alt="Get Adobe Flash player" /></a></p>'."\n";
			echo '</div>'."\n";

	echo '</div>'."\n";

	echo '<script type="text/javascript">'."\n";
	echo '//<![CDATA['."\n";
	echo '  var flashvars = {};'."\n";
    echo '  flashvars.cssSource = "'.Skins_Url.'/css/slider.piecemaker.css";'."\n";
    echo '  flashvars.xmlSource = "'.get_template_directory_uri().'/piecemakerXML.php";'."\n";
    echo '  var params = {};'."\n";
    echo '  params.play = "true";'."\n";
    echo '  params.menu = "false";'."\n";
    echo '  params.scale = "showall";'."\n";
    echo '  params.wmode = "transparent";'."\n";
    echo '  params.allowfullscreen = "true";'."\n";
    echo '  params.allowscriptaccess = "always";'."\n";
    echo '  params.allownetworking = "all";'."\n";	  
    echo '  swfobject.embedSWF("'.Skins_Url.'/flash/piecemaker.swf", "piecemaker", "930", "450", "10", null, flashvars,'."\n";    
    echo '  params, null);'."\n";
	echo '//]]>'."\n";
	echo '</script>'."\n";

}

?>