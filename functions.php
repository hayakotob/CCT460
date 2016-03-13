<?php
function load_google_fonts() {
		wp_register_style('KaushanScripts','https://fonts.googleapis.com/css?family=Kaushan+Script');
            wp_enqueue_style( 'KaushanScripts'); 
}
add_action('wp_print_styles', 'load_google_fonts');

function _smaster_enqueue_scripts(){
	wp_enqueue_style('parent-css',get_template_directory_uri(). '/style.css');}
add_action( 'wp_enqueue_scripts','_smaster_enqueue_scripts');

//Edit header image setting
function _s_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( '_s_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'FFFFFF',
		'width'                  => 2000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => '_s_header_style',
	) ) );
}
add_action( 'after_setup_theme', '_s_custom_header_setup' );

//below code not working 
function smaster_widgets_init() {
register_sidebar( array(
'name'           => ('Sidebar'),
'id'             => 'sidebar_s',
'before_widget'  =>'<aside id="%1$s" class="widget %2$s">',
'after_widget'   => '</aside>',
'before_title'   => '<h1 class="widget-title">',
'after_title'    => '</h1>',
));
}

add_action ('widgets_init','smaster_widgets_init');

register_nav_menus( array(  
  'primary' => __('Primary Navigation','smaster')  
  ));
  
?>
