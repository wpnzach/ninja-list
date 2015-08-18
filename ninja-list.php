<?php
/**
 * @package ninja_nist
 * @version 0.0
 */
/*
Plugin Name: Ninja List
Plugin URI: http://wordpress.org/plugins/ninja-list/
Description: Create your own version of Craigslist on your WordPress site!
Author: Zach Skaggs
Version: 0.0
Author URI: http://zach.support/
*/
// Plugin Folder Path
if ( ! defined( 'NL_PLUGIN_DIR' ) )
		define( 'NL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Plugin Folder URL
if ( ! defined( 'NL_PLUGIN_URL' ) )
		define( 'NL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

include( NL_PLUGIN_DIR . '/shortcodes.php');

// Register Custom Listing
function ninja_list_register_post_type() {

	$labels = array(
		'name'                => _x( 'Listings', 'Listing', 'ninja_list' ),
		'singular_name'       => _x( 'Listing', 'Listing', 'ninja_list' ),
		'menu_name'           => __( 'Listing', 'ninja_list' ),
		'name_admin_bar'      => __( 'Listing', 'ninja_list' ),
		'parent_item_colon'   => __( 'Parent Listing:', 'ninja_list' ),
		'all_items'           => __( 'All Listings', 'ninja_list' ),
		'add_new_item'        => __( 'Add New Listing', 'ninja_list' ),
		'add_new'             => __( 'Add New', 'ninja_list' ),
		'new_item'            => __( 'New Listing', 'ninja_list' ),
		'edit_item'           => __( 'Edit Listing', 'ninja_list' ),
		'update_item'         => __( 'Update Listing', 'ninja_list' ),
		'view_item'           => __( 'View Listing', 'ninja_list' ),
		'search_items'        => __( 'Search Listings', 'ninja_list' ),
		'not_found'           => __( 'Not found', 'ninja_list' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ninja_list' ),
	);
	$args = array(
		'label'               => __( 'Listing', 'ninja_list' ),
		'description'         => __( 'A ninja listing', 'ninja_list' ),
		'labels'              => $labels,
		'supports'            => array( ),
		'taxonomies'          => array( 'ninja_list_post_type' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-align-right',
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'ninja_list_post_type', $args );

}

function ninja_list_register_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Listing Categories', 'Listing Categories', 'text_domain' ),
		'singular_name'              => _x( 'Listing Category', 'Listing Category', 'text_domain' ),
		'menu_name'                  => __( 'Listing Categories', 'text_domain' ),
		'all_items'                  => __( 'All Listing Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Listing Categories', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Listing Categories:', 'text_domain' ),
		'new_item_name'              => __( 'New Listing Category', 'text_domain' ),
		'add_new_item'               => __( 'Add New Listing Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Listing Category', 'text_domain' ),
		'update_item'                => __( 'Update Listing Category', 'text_domain' ),
		'view_item'                  => __( 'View Listing Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Listing Categories', 'text_domain' ),
		'search_items'               => __( 'Search Listing Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'Listing Category', 'ninja_list_post_type', $args );

}

add_action( 'init', 'ninja_list_register_post_type', 0 );
add_action( 'init', 'ninja_list_register_taxonomy', 0 );
