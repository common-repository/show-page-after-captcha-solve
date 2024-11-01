<?php

function show_page_after_captcha_solve_load_styles_scripts(){

    # Allowed CSS and Js Pages
    $admin_css_page = array(
        'spacs_captcha_dashboard',
    );
    
    if( isset( $_GET['page'] ) && in_array($_GET['page'], $admin_css_page) ){

        // loading css
        wp_register_style( SPACS_RECAPTCHA_PREFIX.'admin_style', SPACS_RECAPTCHA_URL . 'admin/admin_assets/admin_css/admin_css.css', false, '1.0.0' );
            wp_enqueue_style( SPACS_RECAPTCHA_PREFIX.'admin_style' );

        // loading js
        wp_register_script( SPACS_RECAPTCHA_PREFIX.'admin_script', SPACS_RECAPTCHA_URL . 'admin/admin_assets/admin_js/admin_js.js', array('jquery-core'), false, true );
        wp_enqueue_script( SPACS_RECAPTCHA_PREFIX.'admin_script' );
    }

}