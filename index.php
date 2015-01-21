<?php
/*
    Plugin Name: Featured Property
    Plugin URI: http://www.cfusionmultimedia.com/projects/featured-property-widget/
    Description: Displays a simple formated Featured Property as a widget.
    Author: Colin Vitek
    Author URI: http://www.cfusionmultimedia.com
    Version: 1.0.0
	License: GPLv2
*/

// Constants

defined( 'FPW_ROOT' ) or define( 'FPW_ROOT', plugin_dir_path( __FILE__ ) );
defined( 'FPW_URL' ) or define( 'FPW_URL', plugin_dir_url( __FILE__ ) );

//include our class
require_once 'featuredproperty.class.php';

//include our general settings page
// @todo - still need to implement this to widget (may be overkill)
//require_once 'inc/settings.php';

// register this widget
function register_featuredproperty_widget(){

	register_widget('featuredproperty');

}
add_action('widgets_init','register_featuredproperty_widget');

// enqueue our stylesheets and js
function fpw_enqueue_scripts() {
	wp_enqueue_style( 'fpw-css', FPW_URL . 'css/style.css', '', '1.0.0', 'screen' );
	wp_enqueue_style( 'bootstrap', FPW_URL . 'css/bootstrap.css', '', '3.3.1', 'screen' );
}
add_action( 'wp_enqueue_scripts', 'fpw_enqueue_scripts' );



?>