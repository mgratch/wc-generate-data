<?php

class WC_Generate_Data {

	protected static $single_instance = null;

	/**
	 * Get a single instance of the plugin.
	 */
	public static function get_instance() {
		if( null === self::$single_instance ) {
			self::$single_instance = new self();
		}

		return self::$single_instance;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		// Register the CLI command if we're running WP_CLI
		if( defined( 'WP_CLI' ) && WP_CLI ) {
			WP_CLI::add_command( 'generate', 'WC_Generate_Data_CLI' );
		}
	}
}