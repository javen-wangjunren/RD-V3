<?php

defined( 'ABSPATH' ) || exit;

/**
 * 在 Posts / Pages 列表页顶部添加 "Export CSV" 按钮。
 * 链接会带上当前列表页的筛选参数（搜索、分类、状态等），
 * 因此导出结果 = 当前筛选出的内容。
 */
function mml_theme_export_csv_button() {
	$screen = get_current_screen();
	if ( ! $screen || $screen->base !== 'edit' || ! in_array( $screen->post_type, [ 'post', 'page' ], true ) ) {
		return;
	}

	$query_args = array_merge(
		$_GET,
		[
			'mml_export_csv' => 1,
			'_wpnonce'       => wp_create_nonce( 'mml_export_csv' ),
		]
	);

	$url = add_query_arg( $query_args, admin_url( 'edit.php' ) );
	echo '<a href="' . esc_url( $url ) . '" class="button">' . esc_html__( 'Export CSV', 'mml-theme' ) . '</a>';
}
add_action( 'restrict_manage_posts', 'mml_theme_export_csv_button' );

/**
 * 处理 CSV 导出请求。
 */
function mml_theme_handle_export_csv() {
	if ( empty( $_GET['mml_export_csv'] ) ) {
		return;
	}

	$post_type = isset( $_GET['post_type'] ) ? sanitize_key( $_GET['post_type'] ) : 'post';
	if ( ! in_array( $post_type, [ 'post', 'page' ], true ) ) {
		return;
	}

	if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'mml_export_csv' ) ) {
		wp_die( 'Security check failed.' );
	}

	$cap = $post_type === 'page' ? 'edit_pages' : 'edit_posts';
	if ( ! current_user_can( $cap ) ) {
		wp_die( 'Permission denied.' );
	}

	// 沿用列表页筛选条件
	$args = [
		'post_type'      => $post_type,
		'posts_per_page' => -1,
		'post_status'    => 'any', // 不含 trash / auto-draft
		'orderby'        => 'title',
		'order'          => 'ASC',
	];

	if ( ! empty( $_GET['s'] ) ) {
		$args['s'] = sanitize_text_field( wp_unslash( $_GET['s'] ) );
	}
	if ( ! empty( $_GET['post_status'] ) && $_GET['post_status'] !== 'all' ) {
		$args['post_status'] = sanitize_key( $_GET['post_status'] );
	}
	if ( ! empty( $_GET['m'] ) ) {
		$args['m'] = intval( $_GET['m'] );
	}
	if ( ! empty( $_GET['author'] ) ) {
		$args['author'] = intval( $_GET['author'] );
	}

	if ( $post_type === 'page' ) {
		$taxonomy = 'rd_page_category';
		// Page 列表的分类筛选参数名是 rd_page_category（值为 slug）
		if ( ! empty( $_GET['rd_page_category'] ) ) {
			$args['tax_query'] = [
				[
					'taxonomy' => $taxonomy,
					'field'    => 'slug',
					'terms'    => sanitize_text_field( wp_unslash( $_GET['rd_page_category'] ) ),
				],
			];
		}
	} else {
		$taxonomy = 'category';
		// Post 列表的分类筛选参数名是 cat（值为 term_id）
		if ( ! empty( $_GET['cat'] ) ) {
			$args['cat'] = intval( $_GET['cat'] );
		}
	}

	$query = new WP_Query( $args );

	$filename = $post_type . '-export-' . gmdate( 'Ymd-His' ) . '.csv';

	header( 'Content-Type: text/csv; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename="' . $filename . '"' );

	$out = fopen( 'php://output', 'w' );
	// UTF-8 BOM，让 Excel 正确识别中文
	fwrite( $out, "\xEF\xBB\xBF" );

	fputcsv( $out, [ 'Title', 'Categories', 'URL' ] );

	foreach ( $query->posts as $p ) {
		$terms     = get_the_terms( $p->ID, $taxonomy );
		$cat_names = ( $terms && ! is_wp_error( $terms ) ) ? implode( ', ', wp_list_pluck( $terms, 'name' ) ) : '';

		fputcsv( $out, [
			html_entity_decode( $p->post_title, ENT_QUOTES, 'UTF-8' ),
			$cat_names,
			get_permalink( $p->ID ),
		] );
	}

	fclose( $out );
	exit;
}
add_action( 'admin_init', 'mml_theme_handle_export_csv' );
