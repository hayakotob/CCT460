<?php
/* Assignment 2 - Wordpress Theme   Group F: Chrishanthi Kumarasamy, Haya Kotob, Waiz Akhtar*/
// Add a submenu under Appearance that allows the user to  post job openings 	
function cd_add_submenu() {
		add_submenu_page( 'themes.php', 'Career Listings', 'Career Listings', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'cd_add_submenu' );
	
//Here we will register the options page and give the user a description about what it can be used for.
function cd_settings_init() { 
	register_setting( 'theme_options', 'cd_options_settings' );
//describe the functionality that this page will serve
	add_settings_section(
		'cd_options_page_section', 
		'You can list any job openings on this page', 
		'cd_options_page_section_callback', 
		'theme_options'
	);
// set the text that will display under the title of the options page
	function cd_options_page_section_callback() { 
		echo 'Find the exact employee that you are looking for.';
	}
// Describe what the text field can be used for
	add_settings_field( 
		'cd_text_field', 
		'Enter job title', 
		'cd_text_field_render', 
		'theme_options', 
		'cd_options_page_section' 
	);
// Describe what the radio field will be used for
	add_settings_field( 
		'cd_radio_field', 
		'Check position ', 
		'cd_radio_field_render', 
		'theme_options', 
		'cd_options_page_section'  
	);
//Describe what the text area will be used for
	add_settings_field( 
		'cd_textarea_field', 
		'Give a little description about the job position; things you can include: wages, qualifications, hours', 
		'cd_textarea_field_render', 
		'theme_options', 
		'cd_options_page_section'  
	);
// Describe what the select field will be used for 
	add_settings_field( 
		'cd_select_field', 
		'Position ', 
		'cd_select_field_render', 
		'theme_options', 
		'cd_options_page_section'  
	);
// Create Callback function for text field
	function cd_text_field_render() { 
		$options = get_option( 'cd_options_settings' );
		?>
		<input type="text" name="cd_options_settings[cd_text_field]" value="<?php if (isset($options['cd_text_field'])) echo $options['cd_text_field']; ?>" />
		<?php
	}
	
// Create callback function for radio buttons
	function cd_radio_field_render() { 
		$options = get_option( 'cd_options_settings' );
		?>
		<input type="radio" name="cd_options_settings[cd_radio_field]" <?php if (isset($options['cd_radio_field'])) checked( $options['cd_radio_field'], 1 ); ?> value="1" /> <label> Morning </label><br />
		<input type="radio" name="cd_options_settings[cd_radio_field]" <?php if (isset($options['cd_radio_field'])) checked( $options['cd_radio_field'], 2 ); ?> value="2" /> <label> Evening </label><br />
		<input type="radio" name="cd_options_settings[cd_radio_field]" <?php if (isset($options['cd_radio_field'])) checked( $options['cd_radio_field'], 3 ); ?> value="3" /> <label> Overnight</label>
		<?php
	}
// Create callback function for text area
	function cd_textarea_field_render() { 
		$options = get_option( 'cd_options_settings' );
		?>
		<textarea cols="40" rows="5" name="cd_options_settings[cd_textarea_field]"><?php if (isset($options['cd_textarea_field'])) echo $options['cd_textarea_field']; ?></textarea>
		<?php
	}
//Create callback function for select field
	function cd_select_field_render() { 
		$options = get_option( 'cd_options_settings' );
		?>
		<select name="cd_options_settings[cd_select_field]">
			<option value="1" <?php if (isset($options['cd_select_field'])) selected( $options['cd_select_field'], 1 ); ?>>Part Time </option>
			<option value="2" <?php if (isset($options['cd_select_field'])) selected( $options['cd_select_field'], 2 ); ?>>Full Time</option>
		</select>
	<?php
	}
	
	function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>Career Listings</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button('Submit');
			?>
		</form>
		<?php
	}

}

add_action( 'admin_init', 'cd_settings_init' );
