<?php

namespace CoachIQ;

use CoachIQ\Admin\CoachIQ_Booking_Admin;
use CoachIQ\CustomPostTypes\Instructors;
use CoachIQ\Taxonomies\Skills_Tax;
use Lessons_Setting_Page;

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
		 * Load the Admin class.
		 */
		require_once $this->plugin_path . 'src/admin/admin.php';

		/*
		 * Load the lessons setting page
		 */
		require_once $this->plugin_path . 'src/admin/lessons-setting-page.php';

		/*
		 * Initialize the loader.
		 */
		$this->loader = new CoachIQ_Booking_Loader();


	}

	private function define_admin_hooks() {
		/*
		 * Load the Events Table.
		 */
		$this->loader->add_filter( 'theme_page_templates', $this, 'coachiq_booking_add_template' );
		$this->loader->add_filter( 'page_template', $this, 'coachiq_booking_redirect_page_template' );

		/*
		 * Load the Admin class.
		 */
		$plugin_admin = new CoachIQ_Booking_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		/*
		 * Load the Lessons Setting Page.
		 */
		$lessons_setting_page = new Lessons_Setting_Page();
		$this->loader->add_action( 'admin_menu', $lessons_setting_page, 'add_settings_page' );

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
	 * Add page templates.
	 *
	 * @param array $templates  The list of page templates
	 *
	 * @return array  $templates  The modified list of page templates
	 */
	function coachiq_booking_add_template( array $templates ): array {
		$templates[$this->plugin_path . 'src/templates/scheduler.php'] = __( 'Scheduler', 'coachiq_booking' );

		return $templates;
	}

	function coachiq_booking_redirect_page_template ( $template ) {
		if ('template-canvas.php' === basename ( $template ) )
			$template = $this->plugin_path . 'src/templates/scheduler.php';
		return $template;
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
