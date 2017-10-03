<?php
/**
 * Plugin Name:       WC Data Generator
 * Description:       Sometimes you need to generate WooCommerce data, Sometimes you don't. Generate data, then use neuralyzer to delete it.
 * Author:            Mindsize
 * Author URI:        http://mindsize.me
 * Version:           1.0.0
 * Requires at least: 4.4
 * Tested up to:      4.8
 */

define( 'WC_GENERATE_DATA_VERSION', '1.0.0' );
define( 'WC_GENERATE_DATA_SLUG', 'wc-generate-data' );
define( 'WC_GENERATE_DATA_FILE', __FILE__ );
define( 'WC_GENERATE_DATA_DIR', plugin_dir_path( WC_GENERATE_DATA_FILE ) );
define( 'WC_GENERATE_DATA_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( WC_GENERATE_DATA_FILE ) ), basename( WC_GENERATE_DATA_FILE ) ) ) );

if( file_exists( WC_GENERATE_DATA_DIR . 'vendor/autoload_52.php' ) ) {
	require( WC_GENERATE_DATA_DIR . 'vendor/autoload_52.php' );
}

if( class_exists( 'WC_Generate_Data' )  ) {
	function wc_generate_data() {
		return WC_Generate_Data::get_instance();
	}

	add_action( 'plugins_loaded', 'wc_generate_data' );
}