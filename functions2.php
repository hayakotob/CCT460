<?php
function my_custom_post_product() {
  $labels = array(
    'name'               => _x( 'Specials', 'post type general name' ),
    'singular_name'      => _x( 'Specials', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Special' ),
    'edit_item'          => __( 'Edit Special' ),
    'new_item'           => __( 'New Special' ),
    'all_items'          => __( 'All Specials' ),
    'view_item'          => __( 'View Specials' ),
    'search_items'       => __( 'Search Specials' ),
    'not_found'          => __( 'No Specials found' ),
    'not_found_in_trash' => __( 'No Specials found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Specials'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Here we will list our daily special menu items',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'specials', $args ); 
}
add_action( 'init', 'my_custom_post_product' );

add_filter( 'pre_get_posts', 'my_get_posts' );

		function my_get_posts( $query ) {

			if ( ( is_home() && $query->is_main_query() ) || is_feed() )
			$query->set( 'post_type', array( 'post', 'my_articles' ) );

		return $query;
		}

?>
