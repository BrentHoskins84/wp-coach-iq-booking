<?php

namespace CoachIQ\Error;

class ErrorHandler {

	public static function write_to_file( $error ) {
		$log_file = dirname(__FILE__) . '/error.log'; // path to log file
		$date = date('Y-m-d H:i:s'); // current date and time

		if (!file_exists($log_file)) { // check if log file exists
			touch($log_file); // create log file if it doesn't exist
			chmod($log_file, 0666); // set permissions for log file
		}

		$message = "[$date] - $error\n"; // format error message with timestamp
		file_put_contents($log_file, $message, FILE_APPEND); // write error message to log file
		self::trigger_user_error( 'An error occurred. Please contact the site administrator.' );
	}

	protected static function trigger_user_error( $error_message ) {
		trigger_error( $error_message, E_USER_ERROR );
	}

}
