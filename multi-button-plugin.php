<?php
/**
 * Plugin Name: Multiple Buttons Module
 * Description: Custom modules for the Beaver Builder Plugin.
 * Version: 1.0
 * Author: V
 * Author URI: http://www.mywebsite.com
 * Text Domain: multi-button-plugin
 *
 * @package Beaver Module.
 */

define( 'MULTI_BUTTON_DIR', plugin_dir_path( __FILE__ ) );
define( 'MULTI_BUTTON_URL', plugins_url( '/', __FILE__ ) );

/**
 * Summary Beaver Builder Custom Module Function.
 *
 * Description The function is for creating the custom module for beaver builder.
 *
 * @since 1.0.0
 *
 * @see Function/method/class relied on
 * @link URL
 * @global type $varname Description.
 * @global type $varname Description.
 */
function load_multi_button_module() {
	if ( class_exists( 'FLBuilder' ) ) {
		require_once 'mb-multi-button/mb-multi-button.php';
	}
}
add_action( 'init', 'load_multi_button_module' );
