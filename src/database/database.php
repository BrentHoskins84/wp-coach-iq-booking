<?php

namespace CoachIQ;

use CoachIQ\Database\Event_Table;
use CoachIQ\Error\ErrorHandler;


class Database {

	protected Event_Table $event_table;

	protected ErrorHandler $error_handler;

	public function __construct() {
		$this->event_table   = new Event_Table();
		$this->error_handler = new ErrorHandler();
	}

	public function create_table() {
		$error = $this->event_table->create_table();
		if ( $error ) {
			$this->error_handler::write_to_file( $error );
			error_log( $error );
		}
	}

	public function drop_tables() {
		$error = $this->event_table->drop_table();
		if ( $error ) {
			$this->error_handler::write_to_file( $error );
			error_log( $error );
		}
	}
}
