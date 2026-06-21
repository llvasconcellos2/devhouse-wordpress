 <?php
          error_reporting(E_NOTICE);
          
          //require("/home/devhouse/public_html/wp-content/plugins/captcha/captcha.php");
          
          
          
          function valid_email($str)

          {
          return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
		     }
/*		     
if( function_exists( 'cptch_check_custom_form' ) && cptch_check_custom_form() !== true ) echo "Please complete the CAPTCHA.";
else echo "lixo";*/


          if($_POST['name']!='' && $_POST['email']!='' && valid_email($_POST['email'])==TRUE && strlen($_POST['comment'])>1)

          {
             $to = $_POST['receiver'];
              $headers =  'From: '.$_POST['email'].''. "\r\n" .
                'Reply-To: '.$_POST['email'].'' . "\r\n" .
                      'X-Mailer: PHP/' . phpversion();
              $subject = "Contact Form";
              $message = htmlspecialchars($_POST['comment']);
             
        if(mail($to, $subject, $message, $headers))
              {
                  die('1'); //SUCCESS
              }
              else {
                  die('2'); //FAILURE - server failure
              }
          }
          else {
       	      die('3');; //FAILURE - not valid email

          }

      ?>