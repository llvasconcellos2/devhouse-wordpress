<?php 

/*******************************************************************************
 * The functions for our theme. *
 * Load the theme framework, includes.
 *
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~Theme Name & Version~~~~~~~
-------------------------------------------------------------*/
$themename = "Mondeo";
$shortname = "mon";
$ver = "2.0.6";



/*-------------------------------------------------------------
~~~~~~~~~~~~Set File Path~~~~~~~~~~~~ 
-------------------------------------------------------------*/
define('FrameWork', get_template_directory(). '/framework');
define('FrameWork_Url', get_template_directory_uri(). '/framework');
define('Includes', get_template_directory(). '/includes');
define('Includes_Url', get_template_directory_uri(). '/includes');
define('Skins_Url', get_template_directory_uri(). '/skins');


/*-------------------------------------------------------------
~~~~~~~~~~Load Framework~~~~~~~~~~~~~
-------------------------------------------------------------*/
/* Load the theme framework functions. */
require_once(get_template_directory(). '/framework/framework.php');


/*-------------------------------------------------------------
~~~~~~~~~~Load Includes~~~~~~~~~~~~~
-------------------------------------------------------------*/
/* Load the includes functions. */
require_once(get_template_directory(). '/includes/includes.php');

?>