<?php

// Plugin Settings  via API



add_action( 'admin_menu', 'fpw_add_admin_menu' );

add_action( 'admin_init', 'fpw_settings_init' );





function fpw_add_admin_menu(  ) { 



	add_options_page( 'Featured Property Widget', 'Featured Property Widget', 'manage_options', 'featured_property_widget', 'fpw_options_page' );



}





function fpw_settings_init(  ) { 



	register_setting( 'pluginPage', 'fpw_settings' );



//	add_settings_section(
//
//		'fpw_pluginPage_section', 
//
//		__( 'General Settings', 'featured-property' ), 
//
//		'fpw_settings_section_callback', 
//
//		'pluginPage'
//
//	);
//
//
//
//	add_settings_field( 
//
//		'fpw_select_field_0', 
//
//		__( 'Widget Title Wrapper', 'featured-property' ), 
//
//		'fpw_select_field_0_render', 
//
//		'pluginPage', 
//
//		'fpw_pluginPage_section' 
//
//	);
//
//
//
//	add_settings_field( 
//
//		'fpw_text_field_1', 
//
//		__( 'Background Color', 'featured-property' ), 
//
//		'fpw_text_field_1_render', 
//
//		'pluginPage', 
//
//		'fpw_pluginPage_section' 
//
//	);
//
//	
//
//		add_settings_field( 
//
//		'fpw_text_field_2', 
//
//		__( 'Label Color', 'featured-property' ), 
//
//		'fpw_text_field_2_render', 
//
//		'pluginPage', 
//
//		'fpw_pluginPage_section' 
//
//	);

//begin labels
	add_settings_section(

		'fpw_pluginPage_section_labels', 

		__( 'Widget Field Labels', 'featured-property' ), 

		'fpw_settings_section_callback_labels', 

		'pluginPage'

	);
	
	add_settings_field( 

		'fpw_text_field_type', 

		__( 'Type Label', 'featured-property' ), 

		'fpw_text_field_type_render', 

		'pluginPage', 

		'fpw_pluginPage_section_labels' 

	);
	
	add_settings_field( 

		'fpw_text_field_beds', 

		__( 'Beds Label', 'featured-property' ), 

		'fpw_text_field_beds_render', 

		'pluginPage', 

		'fpw_pluginPage_section_labels' 

	);

	add_settings_field( 

		'fpw_text_field_baths', 

		__( 'Baths Label', 'featured-property' ), 

		'fpw_text_field_baths_render', 

		'pluginPage', 

		'fpw_pluginPage_section_labels' 

	);

	add_settings_field( 

		'fpw_text_field_house', 

		__( 'Home Size Label', 'featured-property' ), 

		'fpw_text_field_house_render', 

		'pluginPage', 

		'fpw_pluginPage_section_labels' 

	);

	add_settings_field( 

		'fpw_text_field_lot', 

		__( 'Lot Size Label', 'featured-property' ), 

		'fpw_text_field_lot_render', 

		'pluginPage', 

		'fpw_pluginPage_section_labels' 

	);

	add_settings_field( 

		'fpw_text_field_desc', 

		__( 'Description Label', 'featured-property' ), 

		'fpw_text_field_desc_render', 

		'pluginPage', 

		'fpw_pluginPage_section_labels' 

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


function fpw_text_field_type_render(  ) { 



	$options = get_option( 'fpw_settings', array('fpw_text_field_type' => 'Type') );

	?>

	<input type='text' name='fpw_settings[fpw_text_field_type]' value='<?php echo $options['fpw_text_field_type']; ?>'>

	<?php



}

function fpw_text_field_beds_render(  ) { 



	$options = get_option( 'fpw_settings', array('fpw_text_field_beds' => 'Beds') );

	?>

	<input type='text' name='fpw_settings[fpw_text_field_beds]' value='<?php echo $options['fpw_text_field_beds']; ?>'>

	<?php



}

function fpw_text_field_baths_render(  ) { 



	$options = get_option( 'fpw_settings', array('fpw_text_field_baths' => 'Baths') );

	?>

	<input type='text' name='fpw_settings[fpw_text_field_baths]' value='<?php echo $options['fpw_text_field_baths']; ?>'>

	<?php



}

function fpw_text_field_House_render(  ) { 



	$options = get_option( 'fpw_settings', array('fpw_text_field_house' => 'Home Size') );

	?>

	<input type='text' name='fpw_settings[fpw_text_field_house]' value='<?php echo $options['fpw_text_field_house']; ?>'>

	<?php



}

function fpw_text_field_lot_render(  ) { 



	$options = get_option( 'fpw_settings', array('fpw_text_field_lot' => 'Lot Size') );

	?>

	<input type='text' name='fpw_settings[fpw_text_field_lot]' value='<?php echo $options['fpw_text_field_lot']; ?>'>

	<?php



}

function fpw_text_field_desc_render(  ) { 



	$options = get_option( 'fpw_settings', array('fpw_text_field_desc' => 'Description') );

	?>

<input type='text' name='fpw_settings[fpw_text_field_desc]' value='<?php echo $options['fpw_text_field_desc']; ?>'>

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

function fpw_settings_section_callback_labels(  ) { 



	echo __( 'Use the fields below to update the widget labels to best suit your needs.', 'featured-property' );



}





function fpw_options_page(  ) { 



	?>

	<form action='options.php' method='post'>

		

		<h2>Featured Property Widget Settings</h2>

        <h4>By Colin Vitek, <a href="http://www.cfusionmultimedia.com" target="_blank">C-Fusion Multimedia</a></h4>

        <p>Thank you for downloading my simple featured property widget.  Should you have any questions, need support, or have some enhancements you would like to see in future versions, please visit the plugin page on wordpress.org and leave a comment.  I hope this plugin does the trick for you or your client.</p>

		
		<div style="width: 60%; float:left;">
		<?php

		settings_fields( 'pluginPage' );

		do_settings_sections( 'pluginPage' );

		submit_button();

		?>
        </div>

	</form>
    
        <div style="width: 40%; float: right;">
        <h2>About Featured Property Widget</h2>
        <p><strong>Version</strong>: 1.1.0 - April 23, 2015<br>
          <strong>Developer</strong>: <a href="http://www.cfusionmultimedia.com" target="_blank">Colin Vitek, C-Fusion Multimedia</a><br>
<a href="https://www.facebook.com/cfusionmm" target="_blank">Facebook</a> | <a href="https://twitter.com/cfusionmm" target="_blank">Twitter</a> | <a href="https://wordpress.org/support/plugin/featured-property-widget" target="_blank">Plugin Support & Suggestions</a></p>
        <p>Has this plugin made your life easier? Buy me a beer. :-)</p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="M944TNSBLCKJU">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

        </div>
        <div style="clear:both;"></div>

	<?php



}



?>