<?php

namespace CoachIQ\Taxonomies;

class Skills_Tax {
	/**
	 * Create Skills taxonomy for Instructors CPT.
	 *
	 * @return void
	 */
	function skills_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Skills', 'Taxonomy General Name', 'coachiq_booking' ),
			'singular_name'              => _x( 'Skill', 'Taxonomy Singular Name', 'coachiq_booking' ),
			'menu_name'                  => __( 'Skills', 'coachiq_booking' ),
			'all_items'                  => __( 'All Skills', 'coachiq_booking' ),
			'parent_item'                => __( 'Parent Item', 'coachiq_booking' ),
			'parent_item_colon'          => __( 'Parent Item:', 'coachiq_booking' ),
			'new_item_name'              => __( 'New Item Name', 'coachiq_booking' ),
			'add_new_item'               => __( 'Add New Item', 'coachiq_booking' ),
			'edit_item'                  => __( 'Edit Item', 'coachiq_booking' ),
			'update_item'                => __( 'Update Item', 'coachiq_booking' ),
			'view_item'                  => __( 'View Item', 'coachiq_booking' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'coachiq_booking' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'coachiq_booking' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'coachiq_booking' ),
			'popular_items'              => __( 'Popular Items', 'coachiq_booking' ),
			'search_items'               => __( 'Search Items', 'coachiq_booking' ),
			'not_found'                  => __( 'Not Found', 'coachiq_booking' ),
			'no_terms'                   => __( 'No items', 'coachiq_booking' ),
			'items_list'                 => __( 'Items list', 'coachiq_booking' ),
			'items_list_navigation'      => __( 'Items list navigation', 'coachiq_booking' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
		);
		register_taxonomy( 'skills', array( 'instructors' ), $args );

	}
}
