<?php
/**
 * Plugin Name: Hari Elementor Addons
 * Description: Hari Elementor Addons custom Elementor elements which we have combined from various work experience.
 * Version:     1.0.0
 * Author:      Ronak Vanpariya
 * Author URI:  https://vanpariyar.in
 * Plugin URI:  https://github.com/vanpariyar/hari-elementor-addon
 */

function hari_elementor_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/widgets-manager.php' );
	// require_once( __DIR__ . '/includes/controls-manager.php' );

}
add_action( 'plugins_loaded', 'hari_elementor_addon' );