<?php
// Plugin Settings  via API

add_action( 'admin_menu', 'fpw_add_admin_menu' );
add_action( 'admin_init', 'fpw_settings_init' );


function fpw_add_admin_menu(  ) { 

	add_options_page( 'Featured Property Widget', 'Featured Property Widget', 'manage_options', 'featured_property_widget', 'fpw_options_page' );

}


function fpw_settings_init(  ) { 

	register_setting( 'pluginPage', 'fpw_settings' );

	add_settings_section(
		'fpw_pluginPage_section', 
		__( 'General Settings', 'featured-property' ), 
		'fpw_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'fpw_select_field_0', 
		__( 'Widget Title Wrapper', 'featured-property' ), 
		'fpw_select_field_0_render', 
		'pluginPage', 
		'fpw_pluginPage_section' 
	);

	add_settings_field( 
		'fpw_text_field_1', 
		__( 'Background Color', 'featured-property' ), 
		'fpw_text_field_1_render', 
		'pluginPage', 
		'fpw_pluginPage_section' 
	);
	
		add_settings_field( 
		'fpw_text_field_2', 
		__( 'Label Color', 'featured-property' ), 
		'fpw_text_field_2_render', 
		'pluginPage', 
		'fpw_pluginPage_section' 
	);


}


function fpw_select_field_0_render(  ) { 

	$options = get_option( 'fpw_settings' );
	?>
	<select name='fpw_settings[fpw_select_field_0]'>
		<option value='1' <?php selected( $options['fpw_select_field_0'], 1 ); ?>>H1</option>
		<option value='2' <?php selected( $options['fpw_select_field_0'], 2 ); ?>>H2</option>
        <option value='3' <?php selected( $options['fpw_select_field_0'], 3 ); ?>>H3</option>
        <option value='4' <?php selected( $options['fpw_select_field_0'], 4 ); ?>>H4</option>
        <option value='5' <?php selected( $options['fpw_select_field_0'], 5 ); ?>>H5</option>
        <option value='6' <?php selected( $options['fpw_select_field_0'], 6 ); ?>>H6</option>
	</select>

<?php

}


function fpw_text_field_1_render(  ) { 

	$options = get_option( 'fpw_settings', array('fpw_text_field_1' => '#E3E3E3') );
	?>
	<input type='text' name='fpw_settings[fpw_text_field_1]' value='<?php echo $options['fpw_text_field_1']; ?>'>
	<?php

}

function fpw_text_field_2_render(  ) { 

	$options = get_option( 'fpw_settings' );
	?>
	<input type='text' name='fpw_settings[fpw_text_field_2]' value='<?php echo $options['fpw_text_field_2']; ?>'>
	<?php

}


function fpw_settings_section_callback(  ) { 

	echo __( 'These are just a couple minor options regarding the widget look and feel.', 'featured-property' );

}


function fpw_options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		
		<h2>Featured Property Widget Settings</h2>
        <h4>By Colin Vitek, <a href="http://www.cfusionmultimedia.com" target="_blank">C-Fusion Multimedia</a></h4>
        <p>Thank you for downloading my simple featured property widget.  Should you have any questions, need support, or have some enhancements you would like to see in future versions, please visit the plugin page on wordpress.org and leave a comment.  I hope this plugin does the trick for you or your client.</p>
		
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>
		
	</form>
	<?php

}

?>