<?php
/* 
Plugin Name: Elanor Bistro Plugin!
Plugin URI: http://phoenix.sheridanc.on.ca/~ccit3466
Description: Pretty Fabulous Plugin
Author: Group Four
Author URI: http://phoenix.sheridanc.on.ca
Version: 0.1*/
// Creating the widget 
include 'functions.php';
class ElanorWidget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'ElanorWidget', 

// Widget name will appear in UI
__('Elanor Widget', 'Elanor_Widget'), 

// Widget description
array( 'description' => __( 'This Widget will display posts from our custom post type', 'Elanor_Widget' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
echo __( 'Check this out!', 'Elanor_Widget' );
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
$numberOfItems = esc_attr($instance['numberOfItems']);
}
else {
$title = __( 'New title', 'Elanor_Widget' );
$numberOfItems= __( '', 'Elanor_Widget' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
		<label for="<?php echo $this->get_field_id('numberOfItems'); ?>"><?php _e('Number of Items:', 'Elanor_Widget'); ?></label>
		<select id="<?php echo $this->get_field_id('numberOfItems'); ?>"  name="<?php echo $this->get_field_name('numberOfItems'); ?>">
			<?php for($x=1;$x<=10;$x++): ?>
			<option <?php echo $x == $numberOfItems ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
			<?php endfor;?>
		</select>
		</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class Elanor_Widget ends here

// Register and load the widget
function Elanor_Widget() {
	register_widget( 'ElanorWidget' );
}
add_action( 'widgets_init', 'Elanor_Widget' );

?>
