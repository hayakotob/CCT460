<?php
add_action('admin_menu', 'hcw_add_options_page');
function hcw_add_options_page () {
	add_submenu_page( 
		'themes.php',
		'Theme Options',
		'My Options',
		'themeoptions',
		'theme_page_options'
	);
}
function theme_page_options (){
	
}

?>