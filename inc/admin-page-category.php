<?php

defined( 'ABSPATH' ) || exit;

function mml_theme_is_page_list_screen() {
	if ( ! function_exists( 'get_current_screen' ) ) {
		return false;
	}

	$screen = get_current_screen();
	return $screen && $screen->base === 'edit' && $screen->post_type === 'page';
}

function mml_theme_register_page_category_taxonomy() {
	register_taxonomy(
		'rd_page_category',
		[ 'page' ],
		[
			'labels' => [
				'name'          => 'Page Categories',
				'singular_name' => 'Page Category',
			],
			'public'            => false,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'hierarchical'      => true,
			'rewrite'           => false,
			'query_var'         => true,
		]
	);
}
add_action( 'init', 'mml_theme_register_page_category_taxonomy' );

function mml_theme_seed_page_category_terms() {
	$taxonomy = 'rd_page_category';
	if ( ! taxonomy_exists( $taxonomy ) ) {
		return;
	}

	$terms = [
		'CNC'             => 'cnc',
		'3D Printing'     => '3d-printing',
		'Injection Molding' => 'injection-molding',
		'Sheet Metal'     => 'sheet-metal',
		'Surface Finishes' => 'surface-finishes',
	];

	foreach ( $terms as $name => $slug ) {
		$existing = get_term_by( 'slug', $slug, $taxonomy );
		if ( $existing instanceof WP_Term ) {
			continue;
		}
		wp_insert_term(
			$name,
			$taxonomy,
			[
				'slug' => $slug,
			]
		);
	}
}
add_action( 'init', 'mml_theme_seed_page_category_terms', 20 );

function mml_theme_page_list_category_filter() {
	if ( ! mml_theme_is_page_list_screen() ) {
		return;
	}

	$taxonomy = 'rd_page_category';
	if ( ! taxonomy_exists( $taxonomy ) ) {
		return;
	}

	$selected = '';
	if ( isset( $_GET[ $taxonomy ] ) ) {
		$selected = sanitize_text_field( wp_unslash( $_GET[ $taxonomy ] ) );
	}

	wp_dropdown_categories(
		[
			'show_option_all' => 'All Page Categories',
			'option_none_value' => '',
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'value_field'     => 'slug',
			'selected'        => $selected,
			'hierarchical'    => true,
			'hide_empty'      => false,
		]
	);
}
add_action( 'restrict_manage_posts', 'mml_theme_page_list_category_filter' );

function mml_theme_filter_pages_by_page_category( $query ) {
	if ( ! is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( ! mml_theme_is_page_list_screen() ) {
		return;
	}

	$taxonomy = 'rd_page_category';
	if ( ! isset( $_GET[ $taxonomy ] ) ) {
		return;
	}

	$selected = sanitize_text_field( wp_unslash( $_GET[ $taxonomy ] ) );
	if ( $selected === '' || $selected === '0' ) {
		return;
	}

	$tax_query = (array) $query->get( 'tax_query' );
	$tax_query[] = [
		'taxonomy' => $taxonomy,
		'field'    => 'slug',
		'terms'    => [ $selected ],
	];
	$query->set( 'tax_query', $tax_query );
}
add_action( 'pre_get_posts', 'mml_theme_filter_pages_by_page_category' );

function mml_theme_remove_yoast_filters_on_pages() {
	if ( ! mml_theme_is_page_list_screen() ) {
		return;
	}

	global $wpseo_meta_columns;
	if ( ! $wpseo_meta_columns ) {
		return;
	}

	remove_action( 'restrict_manage_posts', [ $wpseo_meta_columns, 'posts_filter_dropdown' ] );
	remove_action( 'restrict_manage_posts', [ $wpseo_meta_columns, 'posts_filter_dropdown_readability' ] );
}
add_action( 'current_screen', 'mml_theme_remove_yoast_filters_on_pages', 20 );

function mml_theme_hide_page_list_extra_filters_css() {
	if ( ! mml_theme_is_page_list_screen() ) {
		return;
	}
	?>
	<style>
		#wpseo-filter,
		#wpseo-readability-filter {
			display: none !important;
		}
		#wpseo-filter + .button,
		#wpseo-readability-filter + .button {
			display: none !important;
		}
	</style>
	<?php
}
add_action( 'admin_head-edit.php', 'mml_theme_hide_page_list_extra_filters_css' );
