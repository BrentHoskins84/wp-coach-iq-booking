<?php

use CoachIQ\Database;

class CoachIQ_Deactivate {

	/**
	 * Function that runs during plugin Deactivation.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		self::drop_database_tables();
	}

	/**
	 * Drops database tables
	 */
	private static function drop_database_tables() {
		$database = new Database();
		$database->drop_tables();
	}
}
