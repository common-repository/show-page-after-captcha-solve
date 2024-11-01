<?php

/**
* Plugin Name:  Show page after captcha Solve
* Plugin URI:   https://simplerscript.com/
* Description:  Show a page only when the captcha is solve
* Author:       Yeasir Arafat (arafat.dml@gmail.com | fiverr.com/web_lover)
* Author URI:   https://www.fiverr.com/web_lover
* Text Domain:  spacs_recaptcha_td
* License:      GPL v2 or later
* License URI:  https://www.gnu.org/licenses/gpl-2.0.html
* Version:      1.0
*/

# NOT ALLOW DIRECT ACCESS
if ( !defined( 'ABSPATH' ) ) {
    die("Direct Access not Allowed");
}

# constant and globals

define( "SPACS_RECAPTCHA_TD", "spacs_recaptcha_td");

define( 'SPACS_RECAPTCHA_PREFIX', 'spacs_recaptcha_');
define( 'SPACS_RECAPTCHA_URL', plugin_dir_url( __FILE__ ) );

define('SPACS_CAPTCHA_NONCE', 'spacs_captcha_nonce_use');
define('SPACS_CAPTCHA_NONCE_VERIFY', 'spacs_captcha_nonce_verify_val');

global $wpdb, $spacs_captcha_menu;

$spacs_captcha_menu = "spacs_captcha_dashboard";

# ------------------------------------------
# Load FIles 
# ------------------------------------------

require(__DIR__."/helpers/form_helpers.php");
require(__DIR__."/helpers/utility_helpers.php");

require(__DIR__."/admin/admin_enqueue_style_script.php");
require(__DIR__."/admin/admin_menu.php");

# ------------------------------------------
# End Load FIles 
# ------------------------------------------

# Hooks

add_action('admin_menu', 'show_page_after_captcha_solve_admin_menu');
add_action( 'admin_enqueue_scripts', 'show_page_after_captcha_solve_load_styles_scripts' );

add_action('parse_request','spacs_google_captcha_check');

function spacs_google_captcha_check() {
   
   global $wp;

   # getting options data
   $spacs_captcha_public_key = esc_html( get_option( 'spacs_captcha_public_key' ) );
   $spacs_captcha_private_key = esc_html( get_option('spacs_captcha_private_key') );
   $spacs_protected_page_slug = esc_html( get_option( 'spacs_protected_page_slug' ) );

   # checking the captcha

   if( isset($_POST['g-recaptcha-response']) ) {

     $response   = isset($_POST["g-recaptcha-response"]) ? sanitize_text_field( $_POST['g-recaptcha-response'] ) : null;

     $privatekey = $spacs_captcha_private_key;

     $http_post_field_list  = array(
         'secret' => $privatekey,
         'response' => $response,
         'remoteip' => rest_is_ip_address( $_SERVER['REMOTE_ADDR'] )
     );

     # curl in wordPress way

     $resp = wp_remote_post( 
        'https://www.google.com/recaptcha/api/siteverify',
         array( 'body' => $http_post_field_list ) 
     );

     $resp  = isset( $resp['body'] ) ? json_decode( $resp['body'], true ) : array();

     // pr( $resp );
     # end curl in wordPress way

  /*   $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
     curl_setopt($ch, CURLOPT_HEADER, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_POST, 1);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($ch, CURLOPT_POSTFIELDS, array(
         'secret' => $privatekey,
         'response' => $response,
         'remoteip' => $_SERVER['REMOTE_ADDR']
     ));

     $resp = json_decode(curl_exec($ch));
     curl_close($ch);*/

     if ( isset( $resp['success'] ) && $resp['success'] ) {
       
       $_SESSION['spacs_captcha_solve'] = true;

       # Captcha Solve Now
       echo "<script>alert('Captcha Solve Properly');</script>";

     } else {
           echo "<script>alert('Captcha Not solve Properly');</script>";
     }

   }

   # end checking the captcha

   $current_page_slug = $wp->request;

   if( $spacs_protected_page_slug === $current_page_slug  ){

   		if( !isset( $_SESSION['spacs_captcha_solve'] ) ||  $_SESSION['spacs_captcha_solve'] === false ){

   			# enqueue script
   				wp_register_script( 'spacs_google_recaptcha_script', 'https://www.google.com/recaptcha/api.js', array('jquery-core'), false, true );
   				wp_enqueue_script( 'spacs_google_recaptcha_script' );
   			# end enqueue script

   				get_header();
   				
   				echo "<div style='margin-top: 20px;'><form action='' method='post'>
   				    <div class='g-recaptcha' data-sitekey='".esc_attr( $spacs_captcha_public_key )."'></div>
   				    <br>
   				    <input type='submit' name='submit' value='Submit'>
   				</form></div>";

   				get_footer();
   				exit();

   		}
   }
 
}