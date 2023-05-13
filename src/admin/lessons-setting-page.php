<?php

class Lessons_Setting_Page {

	public function __construct() {

	}

	public function add_settings_page() {
		add_menu_page(
			'Lessons',
			'Lessons',
			'manage_options',
			'lessons',
			array( $this, 'create_lessons_page' ),
			'dashicons-calendar-alt',
			21
		);
	}

	public function create_lessons_page() {
		?>
		<div id="cb-lessons-settings-page">
		</div>
		<?php
	}
}
