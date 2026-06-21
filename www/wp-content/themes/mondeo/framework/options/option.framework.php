<?php

/*******************************************************************************
 * HawkTheme Options FrameWork
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

function hawktheme_options(){
global $themename, $shortname, $options;
$i=0;
$saved = isset($_REQUEST['saved']) ? $_REQUEST['saved'] : ''; 
$reset = isset($_REQUEST['reset']) ? $_REQUEST['reset'] : ''; 
if ( $saved) echo '<div class="ht-updated"><div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div></div>';
if ( $reset ) echo '<div class="ht-updated"><div id="message" class="updated fade ht-updated"><p><strong>'.$themename.' settings reset.</strong></p></div></div>';
?>
<div class="ht-wrap">
	<div class="ht-header">
	<h2><em><?php echo $themename; ?> <?php _e('Theme Panel','hawktheme'); ?></em></h2>
	<p><a href="<?php echo esc_url( __( 'http://hawktheme.com/', 'hawktheme' ) ); ?>" rel="external"><?php _e('HawkTheme','hawktheme'); ?></a></p>
	</div><!--# ht-header-->
	<form method="post">
	<div class="ht-content">
	<div class="ht-menu fixed">
		<a href="#" class="ht-nav ht-nav-active" id="tab1"><?php _e('Global','hawktheme'); ?></a>
		<a href="#" class="ht-nav" id="tab2"><?php _e('Fonts','hawktheme'); ?></a>
		<a href="#" class="ht-nav" id="tab3"><?php _e('Style','hawktheme'); ?></a>
		<a href="#" class="ht-nav" id="tab4"><?php _e('Header','hawktheme'); ?></a>
		<a href="#" class="ht-nav" id="tab5"><?php _e('Homepage','hawktheme'); ?></a>
		<a href="#" class="ht-nav" id="tab6"><?php _e('Slides','hawktheme'); ?></a>
		<a href="#" class="ht-nav" id="tab7"><?php _e('Portfolio','hawktheme'); ?></a>
		<a href="#" class="ht-nav" id="tab8"><?php _e('Blog','hawktheme'); ?></a>
		<a href="#" class="ht-nav" id="tab9"><?php _e('News','hawktheme'); ?></a>
		<a href="#" class="ht-nav" id="tab10"><?php _e('Gallery','hawktheme'); ?></a>
		<a href="#" class="ht-nav" id="tab11"><?php _e('Footer','hawktheme'); ?></a>
		<a href="#" class="ht-nav" id="tab12"><?php _e('SEO','hawktheme'); ?></a>
	</div><!--# ht-menu-->
	<div class="ht-notice"><p><b>Welcome to <?php echo $themename; ?> settings. </b>This section allows you to customize the form and function of your site. 
	If you'd like more features; please check out <a href="#"><?php echo $themename; ?></a> for tons more templates, options and support.</p></div>
	<div class="ht-tabs">
	<?php foreach ($options as $value) {
		 switch ( $value['type'] ) {
		 case "box":
	?>
	<div class="ht-tab tab<?php echo $value['num']; ?>">

	<?php break; case "info": $i++; //Info?>
	<div class="section-info fixed">
		<div class="ht-section-title">
		<h4><?php echo $value['name']; ?></h4>
		<p><?php echo $value['desc']; ?></p>
		</div>
		<div class="ht-section-button"><input name="save<?php echo $i; ?>" type="submit" class="button" value="Save changes" /></div>
	</div>

	<?php break; case 'text': //Text?>
	<div class="ht-section section-text fixed">
		<div class="ht-section-box <?php echo $value['class']; ?>">
		<h5><?php echo $value['name']; ?></h5>
		<label for="<?php echo $value['id']; ?>"><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" /></label>
		</div>
		<div class="ht-section-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
		</div>
	</div>

	<?php break; case 'textarea': //Textarea?>
	<div class="ht-section section-textarea fixed">
		<div class="ht-section-box">
		<h5><?php echo $value['name']; ?></h5>
		<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
		</div>
		<div class="ht-section-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
		</div>
	</div>

	<?php break; case "color": //Color?>
	<div class="ht-section section-color fixed">
		<div class="ht-section-box ht-section-shorttext">
		<h5><?php echo $value['name']; ?></h5>
		<?php echo $output = hawktheme_colorpicker($value['id'],$value['std']); ?>
		</div>
		<div class="ht-section-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
		</div>
	</div>

	<?php break; case "range": //Range?>
	<div class="ht-section section-range fixed">
		<div class="ht-section-box">
		<h5><?php echo $value['name']; ?></h5>
		<div class="range-input-wrap"><label for="<?php echo $value['id']; ?>"><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="range"  value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" min="<?php echo $value['min']; ?>" max="<?php echo $value['max']; ?>" step="1" /></label><span><?php echo $value['unit']; ?></span></div>
		</div>
		<div class="ht-section-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
		</div>
	</div>

	<?php break; case "upload_min": //Upload min?>
	<div class="ht-section section-upload section-upload-min fixed">
		<div class="ht-section-box">
		<h5><?php echo $value['name']; ?></h5>
		<?php echo $output = hawktheme_uploader($value['id'],$value['std'],'min'); ?>
		</div>
		<div class="ht-section-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
		</div>
	</div>

	<?php break; case "upload": //Upload?>
	<div class="ht-section section-upload fixed">
		<div class="ht-section-box ht-section-longtext">
		<h5><?php echo $value['name']; ?></h5>
		<?php echo $output = hawktheme_uploader($value['id'],$value['std'],null); ?>
		</div>
		<div class="ht-section-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
		</div>
	</div>

	<?php break; case "select": ?>
	<div class="ht-section section-selcet">
		<div class="ht-section-box">
		<h5><?php echo $value['name']; ?></h5>
		<?php hawktheme_options_select($value['id'],$value['std'],$value['options']); ?>
		</div>
		<div class="ht-section-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
		</div>
	</div>

	<?php break; case "select_value": ?>
	<div class="ht-section section-selcet" id="ht_<?php echo $value['id']; ?>_preview">
		<div class="ht-section-box">
		<h5><?php echo $value['name']; ?></h5>
		<?php hawktheme_options_select_value($value['id'],$value['std'],$value['options']); ?>
		</div>
		<div class="ht-section-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
		</div>
		<?php
			//Body Font Preview
			if( isset($value['custom']) && $value['custom'] == 'body_font' ){
				
				//Font stack list from plugin.font
				global $font_stacks;
				$select_value = get_option($value['id']);		 
				
				echo "<div class='ht-font-preview' style='font-family: ".$font_stacks[$select_value]."'>";
				echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
				echo '</div>';
				
			}
			
			//Header Font Preview
			if( isset($value['custom']) && $value['custom'] == 'header_font' ){
				
				//Format font name
				$select_value = get_option($value['id']);
				$header_font_family = $select_value;
				$header_font_family = str_replace('+', ' ', $header_font_family);
				$header_font_family = explode(':', $header_font_family);
				$header_font_family = explode('?', $header_font_family[0]);
				$header_font_family = $header_font_family[0];
				
				echo '<link href="https://fonts.googleapis.com/css?family='.$select_value.'" rel="stylesheet" type="text/css" class="temp-header-font" />';
				
				echo "<div class='ht-font-preview ht-header-font-preview' style='font-family: ".$header_font_family."'>";
				echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.';
				echo '</div>';				
				
			}
		?>
	</div>

	<?php break; case "terms": ?>
	<div class="ht-section section-selcet">
		<div class="ht-section-box">
		<h5><?php echo $value['name']; ?></h5>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<option value="0"><?php _e( '&mdash;SELECT&mdash;','hawktheme' ); ?></option>
		<?php
			$tax = $value['tax'];
			$terms = get_categories(array('taxonomy' => $tax, 'orderby' => 'name', 'hide_empty' => 0));			
			foreach ($terms as $term) { ?>
			<option value="<?php echo $term->name; ?>" <?php if (get_option( $value['id'] ) == $term->name) { echo 'selected="selected"'; } ?>><?php echo $term->name; ?></option><?php } 
		?>
		</select>
		</div>
		<div class="ht-section-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
		</div>
	</div>

	<?php break; case "image_selcet": ?>	
	<div class="ht-section section-image-selcet">
		<div class="ht-section-image-box">
		<h5><?php echo $value['name']; ?></h5>
		<?php hawktheme_imgselect($value['id'],$value['std'],$value['options']); ?>
		</div>
		<div class="ht-section-image-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
		</div>
	</div>

	<?php break; case "editor": ?>	
	<div class="ht-section section-editor">
		<div class="ht-section-editor-box">
		<?php 		
			$value['std'] = stripslashes(get_option($value['id']));		
			echo '<div id="poststuff"><div id="post-body"><div id="post-body-content"><div class="postarea" id="postdivrich">';
			the_editor($value['std'],$value['id']);
			echo '<table id="post-status-info" cellspacing="0">';
			echo '<tbody><tr>';
			echo '<td>&nbsp;</td>';
			echo '<td>&nbsp;</td>';
			echo '</tr></tbody>';
			echo '</table>';
			echo '</div>';
			echo '</div></div></div>';
		?>
		</div>
		<div class="ht-section-editor-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
		</div>
	</div>

	<?php break; case "on_off": 
			$std = $value['std'];  
			$saved_std = get_option($value['id']);
			$checked = '';
			
			if(!empty($saved_std)) {
				if($saved_std == 'true') {
					$checked = 'checked="checked"';
				}else{
					$checked = '';
				}
			}elseif( $std == 'true') {
				$checked = 'checked="checked"';
			}else {
				$checked = '';
			}
	?>
	<div class="ht-section section-on-off fixed">
		<div class="ht-section-box">
		<h5><?php echo $value['name']; ?></h5>
		<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
		</div>
		<div class="ht-section-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
		</div>
	</div>

	<?php break; case "checkbox": 
			$std = $value['std'];  
			$saved_std = get_option($value['id']);
			$checked = '';
			
			if(!empty($saved_std)) {
				if($saved_std == 'true') {
					$checked = 'checked="checked"';
				}else{
					$checked = '';
				}
			}elseif( $std == 'true') {
				$checked = 'checked="checked"';
			}else {
				$checked = '';
			}
	?>

	<div class="ht-checkbox">
		<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	</div>

	<?php break; case "checktop": ?>
	<div class="ht-section section-checkbox fixed">
	<div class="ht-section-box">

	<?php break; case "checkbottom": ?>
	</div>
	<div class="ht-section-description">
		<p><b><?php _e('Notice','hawktheme'); ?></b><?php echo $value['desc']; ?></p>
	</div>
	</div>

	<?php break; case "boxend": // boxend?>
	</div><!--# ht-tab-->

	<?php break;
		}//switch
	}//foreach
	?>
	</div>
	</div><!--# ht-content-->
	<div class="ht-save-all-button"><input name="save-all" type="submit" class="button" value="Save all changes" /></div>
	<input type="hidden" name="action" value="save" />
	</form><!--# form-->
	<div class="ht-footer">
	<form method="post">
	<p class="submit">
	<input name="reset" type="submit" value="Reset Default" />
	<input type="hidden" name="action" value="reset" />
	</p>
	</form>
	</div><!--# ht-footer-->
</div><!--# ht-wrap-->
<?php
}



/*******************************************************************************
 * Add the admin menu to panel
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

add_action('admin_menu', 'hawktheme_add_admin');

function hawktheme_add_admin(){

	global $themename, $shortname, $options;

	//add_menu_page($themename, $themename, 'administrator', 'option.framework.php', 'hawktheme_options', FrameWork_Url . '/skins/images/settings.png', '59.995');

	add_theme_page($themename, $themename, 'administrator', 'option.framework.php', 'hawktheme_options');

	$Get_page = isset($_GET['page']) ? $_GET['page'] : '';

	if ( $Get_page == basename(__FILE__) ) {

		$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

		if ( 'save' == $action ) {

			foreach ($options as $value) {

				$id = isset($value['id']) ? $value['id'] : '';
				$request_id = isset($_REQUEST[ $id ]) ? $_REQUEST[ $id ] : '';
				$type_id = isset($value['type']) ? $value['type'] : '';
				$type = $type_id;
				$old_value = get_option($id);
				$new_value = $request_id;

				if($new_value == '' && $type == 'checkbox'){ // Checkbox Save					
					update_option($id,'false');
				}elseif ($new_value == 'true' && $type == 'checkbox'){ // Checkbox Save						
					update_option($id,'true');
				}elseif($new_value == '' && $type == 'on_off'){ // On Off Save					
					update_option($id,'false');
				}elseif ($new_value == 'true' && $type == 'on_off'){ // On Off Save						
					update_option($id,'true');
				}else{					
					update_option($id,$new_value);
				}

			}//foreach
			 
			header("Location: themes.php?page=option.framework.php&saved=true");
			die;

		} else if( 'reset' == $action ) {
		 
			foreach ($options as $value) {
				$id = isset($value['id']) ? $value['id'] : '';
				delete_option( $id ); 
			}
			 
			header("Location: themes.php?page=option.framework.php&reset=true");
			die;			 
		}//endif Save
	}//endif Get_page

}




/*******************************************************************************
 * Option FrameWork Select
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function hawktheme_options_select($id,$std,$options){

		echo '<select  name="'. $id .'" id="'. $id .'">';
	
		$select_value = get_option($id);		 
		foreach ($options as $option) {
			
			 $selected = '';
			
			 if($select_value != '') {
				 if ( $select_value == $option) { $selected = ' selected="selected"';} 
			 } else {
				 if ( isset($std) )
					 if ($std == $option) { $selected = ' selected="selected"'; }
			 }
			  
			 echo '<option'. $selected .'>';
			 echo $option;
			 echo '</option>';
		 
		 } 

		  echo '</select>';	

}


/*******************************************************************************
 * Option FrameWork Select Value
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function hawktheme_options_select_value($id,$std,$options){

		echo '<select  name="'. $id .'" id="'. $id .'">';
	
		$select_value = get_option($id);		 
		foreach ($options as $option => $entry) {
			
			 $selected = '';
			
			 if($select_value != '') {
				 if ( $select_value == $entry['value']) { $selected = ' selected="selected"';} 
			 } else {
				 if ( isset($std) )
					 if ($std == $entry['value']) { $selected = ' selected="selected"'; }
			 }
			  
			 echo '<option '.$selected.' value="'. $entry['value'] .'">'.$entry['name'].'</option>';
		 
		 } 

		  echo '</select>';	

}


?>
