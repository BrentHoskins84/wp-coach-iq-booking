<?php

namespace CoachIQ\CustomPostTypes;

class Instructors {

	/**
	 * Create Instructors Custom Post Type.
	 *
	 * @return void
	 */
	public function instructor_cpt() {

		$labels = array(
			'name'                  => _x( 'Instructors', 'Post Type General Name', 'coachiq_booking' ),
			'singular_name'         => _x( 'Instructor', 'Post Type Singular Name', 'coachiq_booking' ),
			'menu_name'             => __( 'Instructors', 'coachiq_booking' ),
			'name_admin_bar'        => __( 'Instructors', 'coachiq_booking' ),
			'archives'              => __( 'Instructor Archives', 'coachiq_booking' ),
			'attributes'            => __( 'Instructor Attributes', 'coachiq_booking' ),
			'parent_item_colon'     => __( 'Parent Item:', 'coachiq_booking' ),
			'all_items'             => __( 'All Instructor', 'coachiq_booking' ),
			'add_new_item'          => __( 'Add New Instructor', 'coachiq_booking' ),
			'add_new'               => __( 'Add New Instructor', 'coachiq_booking' ),
			'new_item'              => __( 'New Instructor', 'coachiq_booking' ),
			'edit_item'             => __( 'Edit Instructor', 'coachiq_booking' ),
			'update_item'           => __( 'Update Instructor', 'coachiq_booking' ),
			'view_item'             => __( 'View Instructor', 'coachiq_booking' ),
			'view_items'            => __( 'View Instructors', 'coachiq_booking' ),
			'search_items'          => __( 'Search Instructor', 'coachiq_booking' ),
			'not_found'             => __( 'Not found', 'coachiq_booking' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'coachiq_booking' ),
			'featured_image'        => __( 'Featured Image', 'coachiq_booking' ),
			'set_featured_image'    => __( 'Set featured image', 'coachiq_booking' ),
			'remove_featured_image' => __( 'Remove featured image', 'coachiq_booking' ),
			'use_featured_image'    => __( 'Use as featured image', 'coachiq_booking' ),
			'insert_into_item'      => __( 'Insert into Instructor', 'coachiq_booking' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Instructor', 'coachiq_booking' ),
			'items_list'            => __( 'Instructors list', 'coachiq_booking' ),
			'items_list_navigation' => __( 'Instructors list navigation', 'coachiq_booking' ),
			'filter_items_list'     => __( 'Filter Instructors list', 'coachiq_booking' ),
		);
		$args = array(
			'label'                 => __( 'Instructor', 'coachiq_booking' ),
			'description'           => __( 'List of Instructor', 'coachiq_booking' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail', 'revisions' ),
			'taxonomies'            => array( 'skills' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-groups',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'instructors', $args );

	}
}

