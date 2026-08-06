<?php

defined( 'ABSPATH' ) || exit;

function mml_theme_fn_post_columns_publish_updated( $columns ) {
    if ( isset( $columns['date'] ) ) {
        $columns['date'] = 'Publish Date';
    }

    $new_columns = [];
    foreach ( $columns as $key => $label ) {
        $new_columns[ $key ] = $label;
        if ( $key === 'author' ) {
            $new_columns['post_writer'] = 'Writer';
        }
        if ( $key === 'date' ) {
            $new_columns['mml_updated_date'] = 'Updated Date';
        }
    }
    if ( ! isset( $new_columns['mml_updated_date'] ) ) {
        $new_columns['mml_updated_date'] = 'Updated Date';
    }

    return $new_columns;
}

function mml_theme_fn_post_columns_custom( $column, $post_id ) {
    if ( $column === 'post_writer' ) {
        $writer = get_post_meta( $post_id, 'post_writer', true );
        $writer_value = $writer ? $writer : '';
        $writer_label = $writer ? $writer : '—';
        echo '<span class="mml-post-writer" data-writer="' . esc_attr( $writer_value ) . '">' . esc_html( $writer_label ) . '</span>';
        return;
    }

    if ( $column !== 'mml_updated_date' ) {
        return;
    }

    $date_format = get_option( 'date_format' );
    $time_format = get_option( 'time_format' );
    $modified = get_post_field( 'post_modified', $post_id );
    if ( ! $modified ) {
        echo '—';
        return;
    }

    $timestamp = mysql2date( 'U', $modified );
    echo esc_html( date_i18n( $date_format . ' ' . $time_format, $timestamp ) );
}

function mml_theme_fn_post_sortable_columns( $columns ) {
    $columns['mml_updated_date'] = 'mml_updated_date';
    return $columns;
}

function mml_theme_fn_post_orderby_updated_date( $query ) {
    if ( ! is_admin() || ! $query->is_main_query() ) {
        return;
    }

    $screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
    if ( ! $screen || $screen->base !== 'edit' || $screen->post_type !== 'post' ) {
        return;
    }

    if ( $query->get( 'orderby' ) === 'mml_updated_date' ) {
        $query->set( 'orderby', 'modified' );
    }
}

if ( is_admin() ) {
    add_filter( 'manage_edit-post_columns', 'mml_theme_fn_post_columns_publish_updated', 20 );
    add_action( 'manage_post_posts_custom_column', 'mml_theme_fn_post_columns_custom', 10, 2 );
    add_filter( 'manage_edit-post_sortable_columns', 'mml_theme_fn_post_sortable_columns' );
    add_action( 'pre_get_posts', 'mml_theme_fn_post_orderby_updated_date' );
}
