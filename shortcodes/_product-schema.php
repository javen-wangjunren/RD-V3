<?php
/**
 * 优化后的产品 Schema 生成逻辑
 * 1. 增加防御性判断，解决 PHP Warning 报错
 * 2. 使用 get_post_ancestors 提升查询性能
 * 3. 使用 wp_json_encode 确保数据格式标准安全
 */

function mml_has_parent_page_id($page_id_to_check) {
    global $post;

    // 核心修复：确保 $post 是有效的对象
    if ( ! is_a( $post, 'WP_Post' ) ) {
        return false;
    }

    // 使用 WP 内置函数直接获取所有祖先 ID（通常带缓存，速度极快）
    $ancestors = get_post_ancestors( $post->ID );

    return in_array( $page_id_to_check, $ancestors );
}

function mml_product_schema_json_shortcode() {
    global $post;

    // 1. 安全检查：如果不是有效对象，或不属于指定父级分类，直接返回空
    if ( ! is_a( $post, 'WP_Post' ) || ! mml_has_parent_page_id( 13049 ) ) {
        return '';
    }

    // 2. 准备 JSON 数据（在数组中处理，比直接拼字符串更安全、清晰）
    $description = get_post_meta( $post->ID, '_yoast_wpseo_metadesc', true );
    if ( empty( $description ) ) {
        $description = get_the_excerpt(); // 如果没有 SEO 描述，回退到摘要
    }

    $schema_data = [
        "@context" => "https://schema.org/",
        "@type"    => "Product",
        "name"     => get_the_title() . " Services",
        "image"    => get_the_post_thumbnail_url( $post->ID, 'full' ) ?: '',
        "description" => wp_strip_all_tags( $description ),
        "brand"    => [
            "@type" => "Brand",
            "name"  => "RapidDirect"
        ],
        "url"      => get_permalink(),
        "aggregateRating" => [
            "@type"       => "AggregateRating",
            "ratingValue" => "4.9",
            "bestRating"  => "5",
            "worstRating" => "4",
            "ratingCount" => "270"
        ]
    ];

    // 3. 输出格式化后的 JSON-LD 脚本
    return sprintf(
        '<script type="application/ld+json">%s</script>',
        wp_json_encode( $schema_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
    );
}

// 注册短代码
add_shortcode( 'product-schema', 'mml_product_schema_json_shortcode' );