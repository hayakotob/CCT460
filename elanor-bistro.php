<?php
/* 
Plugin Name: Elanor Bistro Plugin!
Plugin URI: http://phoenix.sheridanc.on.ca/~ccit3466
Description: Pretty Fabulous Plugin
Author: Group Four
Author URI: http://phoenix.sheridanc.on.ca
Version: 0.1*/
// Assignment Three: Plugin - Group Four: Chrishanthi Kumarasamy, Haya Kotob, Waiz Akhtar
// Below code is take from WordPress Codex but has been altered to represent our own site 

// Creating the widget 
class ElanorWidget extends WP_Widget {
	function  ElanorWidget ()
	{
		
	}
	//this function displays user interface: what the user sees
	function widget ($args, $instance)
	{
		extract ($args, EXTR_SKIP);
		// if there is something in 'instance then use it if not then set Elanor Widget
		$title = ($instance['title'])? $instance['title'] : 'Elanor Widget'
		
	}
	// this function handles update functionality
	function update ()
	{
		
	}
	//this function is used if we have any configuration
	function form ()
	{
		
	}
	
	
	

}

?>