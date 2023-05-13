<?php

namespace CoachIQ\Database;

class Event_Table {

	protected const TABLE_NAME = 'cb_events';

	public const EVENT_TYPE = [
		'1' => 'Class',
		'2' => 'lesson',
		'3' => 'Event',
	];

	/**
	 * Constructor for Event Table Class
	 *
	 * Will Create cb_events table if it does not exist
	 *
	 * @return void
	 */
	public function __construct() {
		$this->create_table();
	}

	/**
	 * @return string
	 */
	public function create_table() {
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();
		$table_name      = self::get_table_name();

		$sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
                id mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT,
                title varchar(255) NOT NULL,
                event_type tinyint(2) NOT NULL,
                instructorID mediumint(9) NOT NULL,
    			event_date DATE NOT NULL,
    			startTime datetime NOT NULL,
    			endTime datetime NOT NULL,
    			googleCalendarEventID varchar(128) NOT NULL,
    			UNIQUE KEY id (id)
            ) " . $charset_collate . ";";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		return $wpdb->last_error;
	}

	/**
	 * Get event type id from event type name
	 *
	 * @param $event_type_name
	 *
	 * @return false|int|string
	 */
	public static function get_event_type_id( $event_type_name ) {
		return array_search( $event_type_name, self::EVENT_TYPE );
	}

	/**
	 * Get event type name from event type id
	 *
	 * @param $event_type_id
	 *
	 * @return string
	 */
	public static function get_event_type_name( $event_type_id ): string {
		return self::EVENT_TYPE[ $event_type_id ];
	}

	/**
	 * Drop the cb_events table.
	 *
	 * @return string
	 */
	public static function drop_table(): string {
		global $wpdb;
		$table_name = self::get_table_name();
		$sql        = "DROP TABLE IF EXISTS $table_name;";
		$wpdb->query( $sql );

		return $wpdb->last_error;
	}

	/**
	 * get full table name using $wpdb->prefix and TABLE_NAME
	 *
	 * @return string table name with prefix.
	 */
	public static function get_table_name(): string {
		global $wpdb;
		return $wpdb->prefix . self::TABLE_NAME;
	}
}
