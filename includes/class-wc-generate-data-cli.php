<?php

if ( ! class_exists( 'WP_CLI_Command' ) ) {
	return;
}

class WC_Generate_Data_CLI extends WP_CLI_Command {

	/**
	 * Generate Sessions.
	 *
	 * ## OPTIONS
	 *
	 * <count>
	 * : How many sessions you want to create.
	 *
	 * ## EXAMPLES
	 *
	 *    # Generate 10 Sessions
	 *    $ wp generate sessions 10
	 *    Success: generated 10 session.
	 *
	 * @when after_wp_load
	 *
	 * @param int $count
	 */
	public function sessions( $count = 1 ) {
		list( $count ) = $count;
		if ($count){
			for($i = 0; $i < $count; $i++ ):
				WP_CLI::runcommand( 'generate session' );
			endfor;
			WP_CLI::success( "Success: generated {$count} sessions." );
		} else {
			WP_CLI::warning('You must specify how many sessions to create.');
		}
	}

	/**
	 * Generate 1 session.
	 *
	 * ## EXAMPLES
	 *
	 *    # Generate 1 Session
	 *    $ wp generate session
	 *    Success: generated 1 session.
	 *
	 * @when after_wp_load
	 *
	 * @param array $args
	 * @param array $assoc_args
	 */
	public function session( $args = array(), $assoc_args = array() ) {
		$customer_id = WC()->session->generate_customer_id();
		WC()->session->set($customer_id ,wc_rand_hash());
		WC()->session->set_customer_session_cookie(1);
		WC()->session->save_data();
		WP_CLI::success( 'Success: generated session: '. $customer_id );
	}
}