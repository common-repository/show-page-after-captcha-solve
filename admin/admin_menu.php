<?php

/*add_menu_page( 
	$page_title,
	$menu_title,
	$capability, 
	$menu_slug, 
	$function = '', 
	$icon_url = '', 
	$position = null 
);*/

/* add_submenu_page( 
	string $parent_slug, 
	string $page_title, 
	string $menu_title, 
	string $capability, 
	string $menu_slug, 
	callable $function = '', 
	int $position = null 
);*/

function show_page_after_captcha_solve_admin_menu(){
	global $spacs_captcha_menu;

	add_menu_page( str_replace("_", " ", $spacs_captcha_menu), str_replace("_", " ", 'Show Page after Captcha'), 'edit_pages', $spacs_captcha_menu, 'spacs_show_page_after_captcha_solve_admin_menu_page', 'dashicons-shield' );
}

# plugin dashboard page
function spacs_show_page_after_captcha_solve_admin_menu_page(){
	# load dashboard page
	require(__DIR__."/admin_pages/show_page_after_captcha_solve_admin_menu_page_content.php");
}