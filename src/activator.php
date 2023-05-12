<?php

/**
 * Fired during plugin activation
 *
 * @link       https://three29.com
 * @since      1.0.0
 *
 * @package    Paytronix_Api
 * @subpackage Paytronix_Api/includes
 */

namespace CoachIQ;

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 */
class CoachIQ_Activator {

	/**
	 * Function that runs during plugin activation.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		self::create_database_tables();
	}

	/**
	 * Create database tables
	 */
	private static function create_database_tables() {
		$database = new Database();
		$database->create_table();
	}

}
