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

/**
 * Bulk set Page Category for selected pages.
 */

function mml_theme_add_bulk_set_page_category_action( $actions ) {
	$actions['set_page_category'] = __( 'Set Page Category', 'mml-theme' );
	return $actions;
}
add_filter( 'bulk_actions-edit-page', 'mml_theme_add_bulk_set_page_category_action' );

function mml_theme_handle_bulk_set_page_category( $redirect_to, $doaction, $post_ids ) {
	if ( $doaction !== 'set_page_category' ) {
		return $redirect_to;
	}

	$args = [ 'page' => 'rd-bulk-set-page-category' ];

	$is_select_all = ! empty( $_REQUEST['_wp_select_all'] );
	if ( $is_select_all ) {
		$args['select_all'] = 1;

		$filter_keys = [ 's', 'rd_page_category', 'post_status', 'm', 'orderby', 'order', 'author' ];
		foreach ( $filter_keys as $key ) {
			if ( isset( $_REQUEST[ $key ] ) && $_REQUEST[ $key ] !== '' ) {
				$args[ $key ] = sanitize_text_field( wp_unslash( $_REQUEST[ $key ] ) );
			}
		}

		return add_query_arg( $args, admin_url( 'edit.php?post_type=page' ) );
	}

	if ( empty( $post_ids ) ) {
		return $redirect_to;
	}

	$args['post_ids'] = implode( ',', array_map( 'intval', $post_ids ) );

	return add_query_arg( $args, admin_url( 'edit.php?post_type=page' ) );
}
add_filter( 'handle_bulk_actions-edit-page', 'mml_theme_handle_bulk_set_page_category', 10, 3 );

function mml_theme_register_bulk_set_page_category_page() {
	add_submenu_page(
		null,
		__( 'Set Page Category', 'mml-theme' ),
		__( 'Set Page Category', 'mml-theme' ),
		'edit_pages',
		'rd-bulk-set-page-category',
		'mml_theme_render_bulk_set_page_category_page'
	);
}
add_action( 'admin_menu', 'mml_theme_register_bulk_set_page_category_page' );

function mml_theme_get_pages_for_bulk_category_action( $request ) {
	$is_select_all = ! empty( $request['select_all'] );

	if ( ! $is_select_all ) {
		$post_ids_param = isset( $request['post_ids'] ) ? sanitize_text_field( wp_unslash( $request['post_ids'] ) ) : '';
		$post_ids       = array_filter( array_map( 'intval', explode( ',', $post_ids_param ) ) );

		if ( empty( $post_ids ) ) {
			return [];
		}

		return get_posts(
			[
				'post_type'      => 'page',
				'post__in'       => $post_ids,
				'posts_per_page' => -1,
				'orderby'        => 'title',
				'order'          => 'ASC',
				'post_status'    => 'any',
			]
		);
	}

	$query_args = [
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
		'post_status'    => 'any',
	];

	if ( ! empty( $request['s'] ) ) {
		$query_args['s'] = sanitize_text_field( wp_unslash( $request['s'] ) );
	}

	if ( ! empty( $request['rd_page_category'] ) ) {
		$query_args['tax_query'] = [
			[
				'taxonomy' => 'rd_page_category',
				'field'    => 'slug',
				'terms'    => sanitize_text_field( wp_unslash( $request['rd_page_category'] ) ),
			],
		];
	}

	if ( ! empty( $request['post_status'] ) && $request['post_status'] !== 'all' ) {
		$query_args['post_status'] = sanitize_text_field( wp_unslash( $request['post_status'] ) );
	}

	if ( ! empty( $request['m'] ) ) {
		$query_args['m'] = intval( $request['m'] );
	}

	if ( ! empty( $request['author'] ) ) {
		$query_args['author'] = intval( $request['author'] );
	}

	$query = new WP_Query( $query_args );
	return $query->posts;
}

function mml_theme_get_bulk_category_filter_keys() {
	return [ 's', 'rd_page_category', 'post_status', 'm', 'orderby', 'order', 'author' ];
}

function mml_theme_render_bulk_set_page_category_page() {
	if ( ! current_user_can( 'edit_pages' ) ) {
		wp_die( esc_html__( 'You do not have permission to access this page.', 'mml-theme' ) );
	}

	$taxonomy = 'rd_page_category';
	if ( ! taxonomy_exists( $taxonomy ) ) {
		wp_die( esc_html__( 'Page Category taxonomy does not exist.', 'mml-theme' ) );
	}

	$is_select_all = ! empty( $_GET['select_all'] );
	$pages         = mml_theme_get_pages_for_bulk_category_action( $_GET );

	if ( empty( $pages ) ) {
		wp_die( esc_html__( 'No pages selected.', 'mml-theme' ) );
	}

	$terms = get_terms(
		[
			'taxonomy'   => $taxonomy,
			'hide_empty' => false,
			'orderby'    => 'name',
			'order'      => 'ASC',
		]
	);

	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		wp_die( esc_html__( 'No Page Categories available.', 'mml-theme' ) );
	}

	$submit_url = admin_url( 'edit.php?post_type=page&page=rd-bulk-set-page-category' );
	?>
	<div class="wrap">
		<h1><?php echo esc_html__( 'Set Page Category', 'mml-theme' ); ?></h1>

		<p>
			<?php
			echo esc_html(
				sprintf(
					/* translators: %d: number of pages */
					__( 'You are about to set a Page Category for %d pages.', 'mml-theme' ),
					count( $pages )
				)
			);
			?>
		</p>

		<form method="post" action="<?php echo esc_url( $submit_url ); ?>">
			<?php wp_nonce_field( 'mml_theme_bulk_set_page_category', 'mml_theme_bulk_set_page_category_nonce' ); ?>
			<input type="hidden" name="mml_theme_bulk_set_page_category_action" value="save">
			<input type="hidden" name="select_all" value="<?php echo $is_select_all ? 1 : 0; ?>">
			<?php if ( $is_select_all ) : ?>
				<?php foreach ( mml_theme_get_bulk_category_filter_keys() as $key ) : ?>
					<?php if ( isset( $_GET[ $key ] ) && $_GET[ $key ] !== '' ) : ?>
						<input type="hidden" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET[ $key ] ) ) ); ?>">
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else : ?>
				<?php foreach ( $pages as $page ) : ?>
					<input type="hidden" name="post_ids[]" value="<?php echo esc_attr( $page->ID ); ?>">
				<?php endforeach; ?>
			<?php endif; ?>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="rd_page_category">
								<?php echo esc_html__( 'Page Category', 'mml-theme' ); ?>
							</label>
						</th>
						<td>
							<select name="rd_page_category" id="rd_page_category" required>
								<option value=""><?php echo esc_html__( '— Select Category —', 'mml-theme' ); ?></option>
								<?php foreach ( $terms as $term ) : ?>
									<option value="<?php echo esc_attr( $term->term_id ); ?>">
										<?php echo esc_html( $term->name ); ?>
									</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php echo esc_html__( 'Append or Replace', 'mml-theme' ); ?></th>
						<td>
							<label>
								<input type="radio" name="term_mode" value="append" checked>
								<?php echo esc_html__( 'Append to existing categories', 'mml-theme' ); ?>
							</label>
							<br>
							<label>
								<input type="radio" name="term_mode" value="replace">
								<?php echo esc_html__( 'Replace existing categories', 'mml-theme' ); ?>
							</label>
						</td>
					</tr>
				</tbody>
			</table>

			<p class="submit">
				<input type="submit" class="button button-primary" value="<?php echo esc_attr__( 'Apply Category', 'mml-theme' ); ?>">
				<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=page' ) ); ?>" class="button">
					<?php echo esc_html__( 'Cancel', 'mml-theme' ); ?>
				</a>
			</p>
		</form>

		<h2><?php echo esc_html__( 'Selected Pages', 'mml-theme' ); ?></h2>
		<ul>
			<?php foreach ( $pages as $page ) : ?>
				<li>
					<a href="<?php echo esc_url( get_edit_post_link( $page->ID ) ); ?>">
						<?php echo esc_html( $page->post_title ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php
}

function mml_theme_save_bulk_set_page_category() {
	if ( ! is_admin() || ! current_user_can( 'edit_pages' ) ) {
		return;
	}

	if ( ! isset( $_POST['mml_theme_bulk_set_page_category_action'] ) || $_POST['mml_theme_bulk_set_page_category_action'] !== 'save' ) {
		return;
	}

	if ( ! isset( $_POST['mml_theme_bulk_set_page_category_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mml_theme_bulk_set_page_category_nonce'] ) ), 'mml_theme_bulk_set_page_category' ) ) {
		wp_die( esc_html__( 'Security check failed.', 'mml-theme' ) );
	}

	$taxonomy = 'rd_page_category';
	if ( ! taxonomy_exists( $taxonomy ) ) {
		wp_die( esc_html__( 'Page Category taxonomy does not exist.', 'mml-theme' ) );
	}

	$term_id = isset( $_POST['rd_page_category'] ) ? intval( $_POST['rd_page_category'] ) : 0;
	if ( $term_id <= 0 ) {
		wp_die( esc_html__( 'Please select a valid Page Category.', 'mml-theme' ) );
	}

	$term = get_term( $term_id, $taxonomy );
	if ( ! $term instanceof WP_Term ) {
		wp_die( esc_html__( 'Selected category not found.', 'mml-theme' ) );
	}

	$is_select_all = ! empty( $_POST['select_all'] );
	if ( $is_select_all ) {
		$pages = mml_theme_get_pages_for_bulk_category_action( $_POST );
		$post_ids = wp_list_pluck( $pages, 'ID' );
	} else {
		$post_ids = isset( $_POST['post_ids'] ) && is_array( $_POST['post_ids'] )
			? array_filter( array_map( 'intval', $_POST['post_ids'] ) )
			: [];
	}

	if ( empty( $post_ids ) ) {
		wp_die( esc_html__( 'No pages selected.', 'mml-theme' ) );
	}

	$append = ( isset( $_POST['term_mode'] ) && sanitize_text_field( wp_unslash( $_POST['term_mode'] ) ) === 'replace' ) ? false : true;

	$updated = 0;
	foreach ( $post_ids as $post_id ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			continue;
		}

		$result = wp_set_object_terms( $post_id, $term_id, $taxonomy, $append );
		if ( ! is_wp_error( $result ) ) {
			$updated++;
		}
	}

	$redirect_to = add_query_arg(
		[
			'mml_bulk_category_updated' => $updated,
			'mml_bulk_category_term'    => $term->term_id,
		],
		admin_url( 'edit.php?post_type=page' )
	);

	wp_safe_redirect( $redirect_to );
	exit;
}
add_action( 'admin_init', 'mml_theme_save_bulk_set_page_category' );

function mml_theme_show_bulk_set_page_category_notice() {
	$screen = get_current_screen();
	if ( ! $screen || $screen->base !== 'edit' || $screen->post_type !== 'page' ) {
		return;
	}

	if ( ! isset( $_GET['mml_bulk_category_updated'] ) ) {
		return;
	}

	$updated = intval( $_GET['mml_bulk_category_updated'] );
	$term_id = isset( $_GET['mml_bulk_category_term'] ) ? intval( $_GET['mml_bulk_category_term'] ) : 0;
	$term    = $term_id ? get_term( $term_id, 'rd_page_category' ) : null;
	?>
	<div class="notice notice-success is-dismissible">
		<p>
			<?php
			if ( $term instanceof WP_Term ) {
				echo esc_html(
					sprintf(
						/* translators: 1: number of pages, 2: category name */
						__( 'Page Category "%2$s" was set for %1$d pages.', 'mml-theme' ),
						$updated,
						$term->name
					)
				);
			} else {
				echo esc_html(
					sprintf(
						/* translators: %d: number of pages */
						__( 'Page Category was set for %d pages.', 'mml-theme' ),
						$updated
					)
				);
			}
			?>
		</p>
	</div>
	<?php
}
add_action( 'admin_notices', 'mml_theme_show_bulk_set_page_category_notice' );
