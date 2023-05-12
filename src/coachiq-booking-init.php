<?php

namespace CoachIQ;

use CoachIQ\CustomPostTypes\Instructors;
use CoachIQ\Taxonomies\Skills_Tax;

/**
 * The core plugin class.
 *
 * This is used to define admin-specific hooks, and public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 */
Class Init {
	/**
	 * The unique identifier of this plugin.
	 *
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected string $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected string $version;

	/**
	 * The path to the plugin.
	 *
	 * @access   protected
	 * @var      string    $plugin_path    The path to the plugin.
	 */
	public string $plugin_path;

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      CoachIQ_Booking_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected CoachIQ_Booking_Loader $loader;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 */
	public function __construct() {
		$this->version = '0.1.0';
		$this->plugin_name = 'coachiq-booking';
		$this->plugin_path = plugin_dir_path( dirname( __FILE__ ) );
		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 */
	private function load_dependencies() {

		/*
		 * Load the error handler.
		 */
		require_once $this->plugin_path . 'src/error/error-handler.php';

		/*
		 * Loader for the plugin.
		 */
		require_once $this->plugin_path . 'src/loader.php';

		/*
		 * Load the Skills taxonomy.
		 */
		require_once $this->plugin_path . 'src/taxonomies/skills.php';

		/*
		 * Load the Instructors custom post type.
		 */
		require_once $this->plugin_path . 'src/custom_post_types/instructors.php';

		/*
		 * Load the Events Table.
		 */
		require_once $this->plugin_path . 'src/database/events_table.php';

		/*
		 * Load Database Class.
		 */
		require_once $this->plugin_path . 'src/database/database.php';

		/*
		 * Initialize the loader.
		 */
		$this->loader = new CoachIQ_Booking_Loader();
	}

	private function define_admin_hooks() {

		/*
		 * Load the Skills taxonomy.
		 */
		$skills_tax = new Skills_Tax();
		$this->loader->add_action( 'init', $skills_tax, 'skills_taxonomy', 0 );

		/*
		 * Load the Instructors custom post type.
		 */
		$instructors_cpt = new Instructors();
		$this->loader->add_action( 'init', $instructors_cpt, 'instructor_cpt', 0 );
	}

	/**
	 * Register all the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 */
	private function define_public_hooks() {

	}

	/**
	 * Run the loader to execute all the hooks with WordPress.
	 *
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * Get the Name of the plugin.
	 *
	 * @return string The Name of the plugin.
	 */
	public function get_plugin_name(): string {
		return $this->plugin_name;
	}

	/**
	 * Get the version number of the plugin.
	 *
	 * @return string The version number of the plugin.
	 */
	public function get_version(): string {
		return $this->version;
	}
}
