<?php

defined( 'ABSPATH' ) || exit;

function mml_theme_register_post_writer_meta() {
	register_post_meta(
		'post',
		'post_writer',
		[
			'type'              => 'string',
			'single'            => true,
			'show_in_rest'      => true,
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => function () {
				return current_user_can( 'edit_posts' );
			},
		]
	);
}
add_action( 'init', 'mml_theme_register_post_writer_meta' );

function mml_theme_enqueue_post_writer_editor_assets() {
	if ( ! function_exists( 'get_current_screen' ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( ! $screen || $screen->base !== 'post' || $screen->post_type !== 'post' ) {
		return;
	}

	wp_enqueue_script(
		'mml-post-writer-editor',
		get_template_directory_uri() . '/inc/admin-post-writer-editor.js',
		[ 'wp-plugins', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data' ],
		null,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'mml_theme_enqueue_post_writer_editor_assets' );

function mml_theme_enqueue_post_writer_quick_edit_assets() {
	if ( ! function_exists( 'get_current_screen' ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( ! $screen || $screen->base !== 'edit' || $screen->post_type !== 'post' ) {
		return;
	}

	wp_enqueue_script(
		'mml-post-writer-quick-edit',
		get_template_directory_uri() . '/inc/admin-post-writer-quick-edit.js',
		[ 'jquery', 'jquery-inline-edit-post' ],
		null,
		true
	);
}
add_action( 'admin_enqueue_scripts', 'mml_theme_enqueue_post_writer_quick_edit_assets' );

function mml_theme_add_writer_meta_box() {
	if ( function_exists( 'use_block_editor_for_post_type' ) && use_block_editor_for_post_type( 'post' ) ) {
		return;
	}

    add_meta_box(
        'mml_post_writer_box',
        'Writer',
        'mml_theme_render_writer_meta_box',
        'post',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'mml_theme_add_writer_meta_box' );

function mml_theme_render_writer_meta_box( $post ) {
    wp_nonce_field( 'mml_save_post_writer', 'mml_post_writer_nonce' );

    $current_writer = get_post_meta( $post->ID, 'post_writer', true );
    $writers = ['Kevi', 'Javen'];

    echo '<select name="post_writer" id="post_writer" style="width:100%;max-width:100%;box-sizing:border-box;">';
    echo '<option value="">-- Select a Writer --</option>';
    foreach ( $writers as $writer ) {
        $selected = selected( $current_writer, $writer, false );
        echo sprintf( '<option value="%s" %s>%s</option>', esc_attr( $writer ), $selected, esc_html( $writer ) );
    }
    echo '</select>';
}

function mml_theme_save_writer_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

	$has_inline_nonce = isset( $_POST['_inline_edit'] );
	$has_meta_box_nonce = isset( $_POST['mml_post_writer_nonce'] );

	if ( $has_inline_nonce ) {
		if ( ! check_admin_referer( 'inlineeditnonce', '_inline_edit' ) ) {
			return;
		}
	} elseif ( $has_meta_box_nonce ) {
		if ( ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['mml_post_writer_nonce'] ) ), 'mml_save_post_writer' ) ) {
			return;
		}
	} else {
		return;
	}

	if ( ! isset( $_POST['post_writer'] ) ) {
		return;
	}

	$writer = sanitize_text_field( wp_unslash( $_POST['post_writer'] ) );
	if ( $writer === '' ) {
		delete_post_meta( $post_id, 'post_writer' );
		return;
	}

	update_post_meta( $post_id, 'post_writer', $writer );
}
add_action( 'save_post', 'mml_theme_save_writer_meta_box' );

function mml_theme_quick_edit_writer_custom_box( $column_name, $post_type ) {
	if ( $post_type !== 'post' || $column_name !== 'post_writer' ) {
		return;
	}

	echo '<fieldset class="inline-edit-col-right"><div class="inline-edit-col">';
	echo '<label class="alignleft">';
	echo '<span class="title">Writer</span>';
	echo '<select name="post_writer" class="mml-post-writer-select" style="width:100%;max-width:100%;box-sizing:border-box;">';
	echo '<option value=""></option>';
	echo '<option value="Kevi">Kevi</option>';
	echo '<option value="Javen">Javen</option>';
	echo '</select>';
	echo '</label>';
	echo '</div></fieldset>';
}
add_action( 'quick_edit_custom_box', 'mml_theme_quick_edit_writer_custom_box', 10, 2 );

function mml_theme_post_list_writer_filter() {
	if ( ! function_exists( 'get_current_screen' ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( ! $screen || $screen->base !== 'edit' || $screen->post_type !== 'post' ) {
		return;
	}

	$current = '';
	if ( isset( $_GET['mml_post_writer'] ) ) {
		$current = sanitize_text_field( wp_unslash( $_GET['mml_post_writer'] ) );
	}

	echo '<label class="screen-reader-text" for="mml_post_writer">Writer</label>';
	echo '<select name="mml_post_writer" id="mml_post_writer">';
	echo '<option value="">' . esc_html__( 'All Writers', 'mml-theme' ) . '</option>';
	echo '<option value="Kevi"' . selected( $current, 'Kevi', false ) . '>Kevi</option>';
	echo '<option value="Javen"' . selected( $current, 'Javen', false ) . '>Javen</option>';
	echo '<option value="__unassigned__"' . selected( $current, '__unassigned__', false ) . '>' . esc_html__( 'Unassigned', 'mml-theme' ) . '</option>';
	echo '</select>';
}
add_action( 'restrict_manage_posts', 'mml_theme_post_list_writer_filter' );

function mml_theme_filter_posts_by_writer( $query ) {
	if ( ! is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( ! function_exists( 'get_current_screen' ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( ! $screen || $screen->base !== 'edit' || $screen->post_type !== 'post' ) {
		return;
	}

	if ( ! isset( $_GET['mml_post_writer'] ) ) {
		return;
	}

	$selected_writer = sanitize_text_field( wp_unslash( $_GET['mml_post_writer'] ) );
	if ( $selected_writer === '' ) {
		return;
	}

	$meta_query = (array) $query->get( 'meta_query' );

	if ( $selected_writer === '__unassigned__' ) {
		$meta_query[] = [
			'relation' => 'OR',
			[
				'key'     => 'post_writer',
				'compare' => 'NOT EXISTS',
			],
			[
				'key'     => 'post_writer',
				'value'   => '',
				'compare' => '=',
			],
		];
	} else {
		$meta_query[] = [
			'key'     => 'post_writer',
			'value'   => $selected_writer,
			'compare' => '=',
		];
	}

	$query->set( 'meta_query', $meta_query );
}
add_action( 'pre_get_posts', 'mml_theme_filter_posts_by_writer' );
