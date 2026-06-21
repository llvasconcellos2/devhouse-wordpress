<?php

/*******************************************************************************
 * FrameWork Plugin Uploader
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/

function hawktheme_uploader($id,$std,$mod){
    
	$uploader = '';
    $upload = get_option($id);
	
	if($mod != 'min') { 
			$val = $std;
            if ( get_option( $id ) != "") { $val = get_option($id); }
            $uploader .= '<input name="'. $id .'" id="'. $id .'_upload" type="text" value="'. $val .'" />';
	}
	
	$uploader .= '<div class="ht-upload-button"><span class="button image_upload_button" id="'.$id.'">Upload Image</span>';
	
	if(!empty($upload)) {$hide = '';} else { $hide = 'hide';}
	
	$uploader .= '<span class="button image_reset_button '. $hide.'" id="reset_'. $id .'" title="' . $id . '">Remove</span>';
	$uploader .='</div>' . "\n";

	if(!empty($upload)){
    	$uploader .= '<div class="ht-uploaded-image"><a href="'. $upload . '">';
    	$uploader .= '<img id="image_'.$id.'" src="'.$upload.'" alt="" />';
    	$uploader .= '</a></div>';
	}

return $uploader;
}


/* 
@OptionsFramework Ajax Callback
*/
function hawk_ajax_callback() {
	global $wpdb; // this is how you get access to the database
	
		
	$save_type = $_POST['type'];
	//Uploads
	if($save_type == 'upload'){
		
		$clickedID = $_POST['data']; // Acts as the name
		$filename = $_FILES[$clickedID];
       	$filename['name'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', $filename['name']); 
		
		$override['test_form'] = false;
		$override['action'] = 'wp_handle_upload';    
		$uploaded_file = wp_handle_upload($filename,$override);
		 
				$upload_tracking[] = $clickedID;
				update_option( $clickedID , $uploaded_file['url'] );
				
		 if(!empty($uploaded_file['error'])) {echo 'Upload Error: ' . $uploaded_file['error']; }	
		 else { echo $uploaded_file['url']; } // Is the Response
	}
	elseif($save_type == 'image_reset'){
			
			$id = $_POST['data']; // Acts as the name
			global $wpdb;
			$query = "DELETE FROM $wpdb->options WHERE option_name LIKE '$id'";
			$wpdb->query($query);
	
	}	
	elseif ($save_type == 'options' OR $save_type == 'framework') {
		$data = $_POST['data'];
		
		parse_str($data,$output);
		//print_r($output);
		
		//Pull options
			$shortname = 'thunder';
        	$options = get_option($shortname.'_template');
		
		foreach($options as $option_array){

			$id = $option_array['id'];
			$old_value = get_option($id);
			$new_value = '';
			
			if(isset($output[$id])){
				$new_value = $output[$option_array['id']];
			}
	
			if(isset($option_array['id'])) { // Non - Headings...

			
					$type = $option_array['type'];
					
					if ( is_array($type)){
						foreach($type as $array){
							if($array['type'] == 'text'){
								$id = $array['id'];
								$std = $array['std'];
								$new_value = $output[$id];
								if($new_value == ''){ $new_value = $std; }
								update_option( $id, stripslashes($new_value));
							}
						}                 
					}
					elseif($new_value == '' && $type == 'checkbox'){ // Checkbox Save
						
						update_option($id,'false');
					}
					elseif ($new_value == 'true' && $type == 'checkbox'){ // Checkbox Save
						
						update_option($id,'true');
					}
					elseif($type == 'multicheck'){ // Multi Check Save
						
						$option_options = $option_array['options'];
						
						foreach ($option_options as $options_id => $options_value){
							
							$multicheck_id = $id . "_" . $options_id;
							
							if(!isset($output[$multicheck_id])){
							  update_option($multicheck_id,'false');
							}
							else{
							   update_option($multicheck_id,'true'); 
							}
						}
					} 
					elseif($type == 'typography'){
							
						$typography_array = array();	
						
						$typography_array['size'] = $output[$option_array['id'] . '_size'];
							
						$typography_array['face'] = stripslashes($output[$option_array['id'] . '_face']);
							
						$typography_array['style'] = $output[$option_array['id'] . '_style'];
							
						$typography_array['color'] = $output[$option_array['id'] . '_color'];
							
						update_option($id,$typography_array);
							
					}
					elseif($type == 'border'){
							
						$border_array = array();	
						
						$border_array['width'] = $output[$option_array['id'] . '_width'];
							
						$border_array['style'] = $output[$option_array['id'] . '_style'];
							
						$border_array['color'] = $output[$option_array['id'] . '_color'];
							
						update_option($id,$border_array);
							
					}
					elseif($type != 'upload_min'){
					
						update_option($id,stripslashes($new_value));
					}
				}
			}	
	
	}

  die();

}

add_action('wp_ajax_of_ajax_post_action', 'hawk_ajax_callback');



/* 
@Add Uploader JS to Admin
*/
function hawktheme_upload_scripts() {
?>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function(){
	//AJAX Upload
	jQuery('.image_upload_button').each(function(){

	var clickedObject = jQuery(this);
	var clickedID = jQuery(this).attr('id');	
	new AjaxUpload(clickedID, {
		  action: '<?php echo admin_url("admin-ajax.php"); ?>',
		  name: clickedID, // File upload name
		  data: { // Additional data to send
				action: 'of_ajax_post_action',
				type: 'upload',
				data: clickedID },
		  autoSubmit: true, // Submit file after selection
		  responseType: false,
		  onChange: function(file, extension){},
		  onSubmit: function(file, extension){
				clickedObject.text('Uploading'); // change button text, when user selects file	
				this.disable(); // If you want to allow uploading only 1 file at time, you can disable upload button
				interval = window.setInterval(function(){
					var text = clickedObject.text();
					if (text.length < 13){	clickedObject.text(text + '.'); }
					else { clickedObject.text('Uploading'); } 
				}, 200);
		  },
		  onComplete: function(file, response) {
		   
			window.clearInterval(interval);
			clickedObject.text('Upload Image');	
			this.enable(); // enable upload button
			
			// If there was an error
			if(response.search('Upload Error') > -1){
				var buildReturn = '<span class="upload-error">' + response + '</span>';
				jQuery(".upload-error").remove();
				clickedObject.parent().after(buildReturn);
			
			}
			else{
				var buildReturn = '<img class="hide of-option-image" id="image_'+clickedID+'" src="'+response+'" alt="" />';

				jQuery(".upload-error").remove();
				jQuery("#image_" + clickedID).remove();	
				clickedObject.parent().after(buildReturn);
				jQuery('img#image_'+clickedID).fadeIn();
				clickedObject.next('span').fadeIn();
				clickedObject.parent().prev('input').val(response);
			}
		  }
		});

	});

	//AJAX Remove (clear option value)
	jQuery('.image_reset_button').click(function(){

		var clickedObject = jQuery(this);
		var clickedID = jQuery(this).attr('id');
		var theID = jQuery(this).attr('title');	

		var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';

		var data = {
			action: 'of_ajax_post_action',
			type: 'image_reset',
			data: theID
		};
		
		jQuery.post(ajax_url, data, function(response) {
			var image_to_remove = jQuery('#image_' + theID);
			var button_to_hide = jQuery('#reset_' + theID);
			image_to_remove.fadeOut(500,function(){ jQuery(this).remove(); });
			button_to_hide.fadeOut();
			clickedObject.parent().prev('input').val('');
					
		});
		
		return false; 
	});
});
//]]>
</script>
<?php
}

add_action("admin_head",'hawktheme_upload_scripts');

?>