<?php

/**
  Plugin Name: Portare
  Plugin URI: http://wordpress.org/extend/plugins/portare/
  Description: Reach your customers showing their work in a simple but elegant.
  Author: Flávio Ricardo
  Version: 1.0
  Author URI: http://fricardo.com/
 */
add_action('init', 'set_portfolio');
add_action('init', 'set_taxonomies', 0);

if (function_exists('add_theme_support'))
	add_theme_support('post-thumbnails');

function set_options() {
	return array(
		'labels' => array(
			'name' => _('Portfolios'),
			'singular_name' => _('Portfolio'),
			'add_new' => _('Add New'),
			'add_new_item' => __('Add New Portfolio'),
			'edit_item' => __('Edit Portfolio'),
			'new_item' => __('New Portfolio'),
			'view_item' => __('View Portfolio'),
			'search_items' => __('Search Portfolio'),
			'menu_name' => 'Portfolios'
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 100,
		'supports' => array('title', 'editor', 'thumbnail')
	);
}

function set_taxonomies() {
	register_taxonomy('technologies',
			array('portfolio'),
			array(
				'label' => __('Technologies'),
				'labels' => array(
					'name' => __('Technologies'),
					'singular_name' => __('Technology'),
					'search_items' => __('Search Technologies'),
					'all_items' => __('All Technologies'),
					'edit_item' => __('Edit Technology'),
					'update_item' => __('Update Technology'),
					'add_new_item' => __('Add New Technology'),
					'new_item_name' => __('New Technology'),
					'menu_name' => __('Technologies')
				),
				'rewrite' => true,
				'hierarchical' => true,
				'query_var' => false
			)
	);
}

function set_portfolio() {
	register_post_type('portfolio', set_options());
}

?>