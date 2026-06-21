<?php
/*******************************************************************************
 * The rand functions for our theme. *
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_rand($length){

	srand((double)microtime()*1000000 );
	
	$random_id = "";
	
	$char_list = "abcdefghijklmnopqrstuvwxyz";
	
	for($i = 0; $i < $length; $i++) {
		$random_id .= substr($char_list,(rand()%(strlen($char_list))), 1);
	}
	
	return $random_id;
}
?>