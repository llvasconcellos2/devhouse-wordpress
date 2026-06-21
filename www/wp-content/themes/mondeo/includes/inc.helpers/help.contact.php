<?php 
 /*******************************************************************************
 * The Contact Form Helper For Theme
 * @package HawkTheme
 * @since Mondeo 1.0
*******************************************************************************/
function ht_contact_form($email, $form_id) {

		echo '<div id="success-'.$form_id.'" class="notice radius-5 hide"><p class="radius-5">';
		 _e('Your email has been sent! Thank you!','hawktheme'); 
		echo '</p></div>'."\n";

		echo '<div id="bademail-'.$form_id.'" class="warning radius-5 hide"><p class="radius-5">';
		 _e('Please enter your name, a valid email address and content!','hawktheme'); 
		echo '</p></div>'."\n";

		echo '<div id="badserver-'.$form_id.'" class="warning radius-5 hide"><p class="radius-5">';
		 _e('Your email failed. Try again later.','hawktheme'); 
		echo '</p></div>'."\n";

		echo '<form id="contact-'.$form_id.'" action="'.FrameWork_Url.'/plugins/sendmail.php" method="post">'."\n";
			echo '<label for="name"><input type="text" id="nameinput-'.$form_id.'" class="cleardefault"  name="name" value="Name"/></label>'."\n";
			echo '<label for="email"><input type="text" id="emailinput-'.$form_id.'" class="cleardefault"  name="email" value="Email"/></label>'."\n";
			echo '<textarea  id="commentinput-'.$form_id.'" name="comment"></textarea>'."\n";
			
			if( function_exists( 'cptch_display_captcha_custom' ) ) { 
			    echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />"; 
			    echo cptch_display_captcha_custom();
			} ;
			
			echo '<input type="submit" id="submitinput-'.$form_id.'" class="submit" value="'; _e('sendmail','hawktheme'); echo '"/>'."\n";
			echo '<input type="hidden" id="receiver-'.$form_id.'" name="receiver" value="'.$email.'"/>'."\n";
		echo '</form>	'."\n";

		echo '<script type="text/javascript">'."\n";
		echo '//<![CDATA['."\n";
		echo 'jQuery(document).ready(function(){'."\n";
		echo '		 jQuery("#contact-'.$form_id.'").ajaxForm(function(data) {'."\n";
		echo '		 if (data==1){'."\n";
		echo '			 jQuery("#success-'.$form_id.'").fadeIn("slow");'."\n";
		echo '			 jQuery("#bademail-'.$form_id.'").fadeOut("slow");'."\n";
		echo '			 jQuery("#badserver-'.$form_id.'").fadeOut("slow");'."\n";
		echo '			 jQuery("#contact-'.$form_id.'").resetForm();'."\n";
		echo '		 }else if (data==2){'."\n";
		echo '			 jQuery("#badserver-'.$form_id.'").fadeIn("slow");'."\n";
		echo '		 } else if (data==3){'."\n";
		echo '			 jQuery("#bademail-'.$form_id.'").fadeIn("slow");'."\n";
		echo '		}'."\n";
		echo '		});'."\n";
		echo '});'."\n";
		echo '//]]>'."\n";
		echo '</script>'."\n";

}