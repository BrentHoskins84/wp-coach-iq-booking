<?php
/**
 * Plugin Name:     CoachIQ Booking
 * Description:     Booking plugin for coachIQ
 * Author:          Brent Hoskins
 * Text Domain:     coachiq_booking
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Coachiq_Booking
 */

namespace CoachIQ;

// If this file is called directly, abort.
use CoachIQ_Deactivate;

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Autoload, via Composer.
 *
 * @link https://getcomposer.org/doc/01-basic-usage.md#autoloading
 */
require_once( 'vendor/autoload.php' );

/**
 * The code that runs during plugin activation.
 * This action is documented in activator.php
 */
register_activation_hook( __FILE__, function() {
	require_once plugin_dir_path( __FILE__ ) . 'src/activator.php';
	CoachIQ_Activator::activate();
} );

register_deactivation_hook( __FILE__, function() {
	require_once plugin_dir_path( __FILE__ ) . 'src/deactivate.php';
	CoachIQ_Deactivate::deactivate();
} );

/**
 * The core plugin class that is used to define
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'src/coachiq-booking-init.php';

function run_plugin() {
	$plugin = new Init();
	$plugin->run();
}

run_plugin();
