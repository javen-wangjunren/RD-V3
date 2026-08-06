<?php
/**
 * Advanced Custom Fields (ACF) Configuration
 *
 * Handles ACF JSON local JSON save and load points to sync field groups via version control.
 */

/**
 * 网站全栈专家：自定义 ACF JSON 保存路径
 *
 * @param string $path The default save path.
 * @return string The modified save path.
 */
function my_acf_json_save_point( $path ) {
    // 设置路径为当前主题下的 acf-json 文件夹
    $path = get_stylesheet_directory() . '/acf-json';
    
    if ( is_admin() && ! is_dir( $path ) ) {
        if ( function_exists( 'wp_mkdir_p' ) ) {
            wp_mkdir_p( $path );
        } else {
            @mkdir( $path, 0755, true );
        }
    }
    
    return $path;
}
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

/**
 * 网站全栈专家：自定义 ACF JSON 读取路径
 *
 * @param array $paths The default load paths.
 * @return array The modified load paths.
 */
function my_acf_json_load_point( $paths ) {
    // 移除默认路径（可选，根据需求决定是否保留原路径）
    // unset($paths[0]);
    
    // 添加新的读取路径
    $paths[] = get_stylesheet_directory() . '/acf-json';
    
    return $paths;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
