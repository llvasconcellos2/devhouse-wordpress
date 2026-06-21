<?php

/*******************************************************************************
 * FrameWork Plugin IMAGE Select
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function hawktheme_imgselect($id,$std,$options){

		$i = 0;
		$select_value = get_option($id);
				   
		foreach ($options as $key => $option) { 
			$i++;

			$checked = '';
			$selected = '';
			if($select_value != '') {
				if ( $select_value == $key) { $checked = ' checked'; $selected = 'ht-radio-img-selected'; } 
			} else {
				if ($std == $key) { $checked = ' checked'; $selected = 'ht-radio-img-selected'; }
				elseif ($i == 1  && !isset($select_value)) { $checked = ' checked'; $selected = 'ht-radio-img-selected'; }
				elseif ($i == 1  && $std == '') { $checked = ' checked'; $selected = 'ht-radio-img-selected'; }
				else { $checked = ''; }
			}
			
			echo '<input type="radio" id="ht-radio-img-' . $id . $i . '" class="checkbox ht-radio-img-radio" value="'.$key.'" name="'.$id.'" '.$checked.' />';
			echo '<div class="ht-radio-img-label">'. $key .'</div>';
			echo '<img src="'.$option.'" alt="" class="ht-border ht-radio-img-img '. $selected .'" onClick="document.getElementById(\'ht-radio-img-'. $id. $i.'\').checked = true;" />';
				
		}
		
}

?>