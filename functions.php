<?php

function load_google_fonts() {
		wp_register_style('KaushanScripts','https://fonts.googleapis.com/css?family=Kaushan+Script');
            wp_enqueue_style( 'KaushanScripts'); 

    
}
add_action('wp_print_styles', 'load_google_fonts');
?>
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>