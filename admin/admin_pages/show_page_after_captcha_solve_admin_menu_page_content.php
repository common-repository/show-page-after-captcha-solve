<?php

function spacs_admin_notice_success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e( 'Data Saved successfully', SPACS_RECAPTCHA_TD ); ?></p>
    </div>
    <?php
}

// Save action data
if(  isset( $_POST[SPACS_CAPTCHA_NONCE] ) && wp_verify_nonce($_POST[SPACS_CAPTCHA_NONCE], SPACS_CAPTCHA_NONCE_VERIFY) ){

	// pr($_POST); die();

	$spacs_captcha_public_key = sanitize_text_field( $_POST['captcha_public_key'] );
	$spacs_captcha_private_key = sanitize_text_field( $_POST['captcha_private_key'] );
	$spacs_protected_page_slug = sanitize_text_field( $_POST['protected_page_slug'] );

	update_option( 'spacs_captcha_public_key', $spacs_captcha_public_key );
	// var_dump( get_option( 'spacs_captcha_public_key' ) );

	update_option( 'spacs_captcha_private_key', $spacs_captcha_private_key );
	// var_dump( get_option( 'spacs_captcha_private_key' ) );

	update_option( 'spacs_protected_page_slug', $spacs_protected_page_slug );
	// var_dump( get_option( 'spacs_protected_page_slug' ) );

	spacs_admin_notice_success();

}

# getting options data
$spacs_captcha_public_key = esc_html( get_option( 'spacs_captcha_public_key' ) );
$spacs_captcha_private_key = esc_html( get_option('spacs_captcha_private_key') );
$spacs_protected_page_slug = esc_html( get_option( 'spacs_protected_page_slug' ) );

?>


<div class="containers free_info">
	<h2 style="color: #f368e0;">This is a simple plugin That Show a page only after Solve the Captcha</h2>
	<h2 style="background: #feca57; color: #341f97; font-family: railway; padding: 20px">
		-- If you need any modification <br> -- or you want to add more feature <br> --Or you have any plugin job <br>
		please feel free to contact at <br> <a style='color: #f368e0 !important;' href="mailto:arafat.dml@gmail.com">arafat.dml@gmail.com</a>
		<br>
		<strong>In email: reply will be done within 01 hour</strong>
	</h2>

	<h3 style="color: #feca57;  font-family: railway;">
		Want to use More Free/Premium  plugins ? Visit: <a style='color: #f368e0 !important;' href="https://simplerscript.com/">https://simplerscript.com/</a> <br>or You have an idea to make a plugin 
		I am available to freelance Job for plugin Work.
		Contact me here: <br> <a style='color: #f368e0 !important;' href="mailto:arafat.dml@gmail.com">arafat.dml@gmail.com</a>
	</h3>

	<h2 style="color:#5f27cd;">
		If you like the plugin do not forget to rate it in wordpress.org plugin directory.
		<br>
		<mark>Buy me a cofee if you wish :D ---> <a style='color: #f368e0 !important;' href="https://www.buymeacoffee.com/arafat.cdr" target="_blank">Buy me a cofee link</a></mark>
	</h2>

</div>

<div class="form" style="clear: both; float: left; max-width:  30%;">
	<?php
		echo spacs_form_main_div();
		echo spacs_form_open();
		echo spacs_form_heading( 'h3', __( 'Show page after captcha', SPACS_RECAPTCHA_TD ) );
		wp_nonce_field(SPACS_CAPTCHA_NONCE_VERIFY, SPACS_CAPTCHA_NONCE);

		echo spacs_form_input("captcha_public_key", esc_html( $spacs_captcha_public_key ), true);
		echo spacs_form_input("captcha_private_key", esc_html( $spacs_captcha_private_key ), true);
		echo spacs_form_input("protected_page_slug", esc_html( $spacs_protected_page_slug ), true);

		echo spacs_form_submit('Save');
		echo spacs_form_close();
		echo spacs_form_main_div_end();
	?>
</div>