<?php
/**
 * 方便前端开发的代码
 */

// ================================ 定义 ================================

// -------------------------------- 自定义 Shortcode

MML_Theme_FrontEnd::$mml_shortcodes = [
	// 例子 'mml-example' => 'example.php',
	// mml-example 是 shortcode ，不需要中括号。规范要求以 "mml-" 开头，用中横线或下划线均可。
	// example.php 是对应的 php 文件。位于 mml-theme/templates/ 文件夹中。 php 文件中可以访问 $args 参数。

	'custom_menu_1' => 'custom-menu-1.php',
	'custom_menu_2' => 'custom-menu-2.php',
	'bread_crumb' => 'bread_crumb.php',
    'social-media'=>'social-media.php',
    'footer-contact'=>'footer-contact.php',
    'copyright'=>'copyright.php',
    'p01-s01-slicker'=>'p01-s01-slicker.php',
	'p01-s01-slicker-2023'=>'p01-s01-slicker-design-2023.php',
    'p05-2-slicker'=>'p05-2-slicker.php',
    'p03-tab'=>'p03-tab.php',
    'p02-x-slicker'=>'p02-x-slicker.php',
    'p04-2-table'=>'p04-2-table.php',
    'p04-2-1-detail-table'=>'p04-2-1-detail-table.php',
    'centered_two-column_table_3'=>'centered_two-column_table_3.php',
    'centered_two-column_table_2'=>'centered_two-column_table_2.php',
    'centered_two-column_table_1'=>'centered_two-column_table_1.php',
    'surface_finishes_table_1'=>'surface_finishes_table_1.php',
    'surface_finishes_table_2'=>'surface_finishes_table_2.php',
    'surface_finishes_table_3'=>'surface_finishes_table_3.php',
    'multi-column_table_1'=>'multi-column_table_1.php',
    'multi-column_table_2'=>'multi-column_table_2.php',
    'multi-column_table_3'=>'multi-column_table_3.php',
    'process_table_1'=>'process_table_1.php',
    'process_table_2'=>'process_table_2.php',
    'process_table_3'=>'process_table_3.php',
    'p04-3-1-info-table'=>'p04-3-1-info-table.php',
    'p04-3-1-subtypes-table'=>'p04-3-1-subtypes-table.php',
    'p04-3-1-resources-table'=>'p04-3-1-resources-table.php',
    'p04-3-tab-table'=>'p04-3-tab-table.php',
    'p05-3-tab'=>'p05-3-tab.php',
    'cases-categories'=>'cases-categories.php',
    'blog-categories'=>'blog-categories.php',
    'knowledge-search'=>'knowledge-search.php',
    'knowledge-base-categories'=>'knowledge-base-categories.php',
    'help-center'=>'help-center.php',
    'help-center-categories'=>'help-center-categories.php',
    'vr-slicker'=>'vr-slicker.php',
    'fixed-header-table-1'=>'fixed-header-table-1.php',
    'fixed-header-table-2'=>'fixed-header-table-2.php',
    'fixed-header-table-3'=>'fixed-header-table-3.php',
    'p02-x-tab'=>'p02-x-tab.php',
    'related-posts-list'=>'related-posts-list.php',
    'cta'=>'cta.php',  
    'tagged'=>'tagged.php',
    'related-cases'=>'related-cases.php',
    'm-table-of-contents'=>'m-table-of-contents.php',
];

// -------------------------------- 自定义 Sidebar

MML_Theme_FrontEnd::$mml_sidebars = [
	// 举例: 'mml-sidebar-menu' => 'Menu Sidebar',
	// mml-sidebar-menu    这个是 id ，全站唯一。 规范要求以 "mml-sidebar-" 开头，全小写，用中横线或下划线均可。
	// Menu Sidebar    这个是显示出来的名称，没其他要求，能从名字看出用途即可。

	// 'mml-sidebar-menu' => 'Menu Sidebar',
];

// -------------------------------- 加入 javascript 文件

MML_Theme_FrontEnd::$mml_scripts = [
	// 举例: 'mml-js-test' => '/dist/js/test.js',
	// mml-js-test    这个是 id ，全站唯一。 规范要求以 "mml-js-" 开头，全小写，用中横线或下划线均可。
	// /dist/js/test.js    这个是文件。相对于 mml-theme 根目录。 要以斜杆（ "/" ）开头。
	// 生成的链接是这样的: http://www.xxx.com/wp-content/themes/mml-theme/dist/js/test.js

	'mml-js-menu' => '/dist/js/mml-menu.js',
	'mml-js-faq' => '/dist/js/mml-faq.js',
	'mml-js-lazysizes' => '/dist/js/libs/lazysizes.min.js',
	'mml-js-page' => '/dist/js/mml-page.js',
	'mml-js-form' => '/dist/js/form.js',
	'mml-js-nav' => '/dist/js/nav.js',
	'mml-js-anchor' => '/dist/js/anchor.js',
	'mml-js-rapiddirect' => '/dist/js/rapiddirect.min.js',
	'mml-js-elementor-tabs' => '/dist/js/mml-elementor-tabs.js',
	'mml-js-rapid-elementor-tabs' => '/dist/js/rapid-elementor-tabs.js',
	'mml-js-slick' => '/dist/js/libs/slick-1.8.1/slick.min.js', // 需要使用时，取消注释即可
	// 'mml-js-swiper' => '/dist/js/libs/swiper-4.5.1/js/swiper.min.js', // 需要使用时，取消注释即可
];

// -------------------------------- 加入 css 文件

MML_Theme_FrontEnd::$mml_styles = [
	// 举例: 'mml-css-main' => '/dist/css/main.css',
	// mml-css-main    这个是 id ，全站唯一。 规范要求以 "mml-css-" 开头，全小写，用中横线或下划线均可。
	// /dist/css/main.css    这个是文件。相对于 mml-theme 根目录。 要以斜杆（ "/" ）开头。
	// 生成的链接是这样的: http://www.xxx.com/wp-content/themes/mml-theme/dist/css/main.css

	'mml-css-main' => '/dist/css/main.min.css',
	'mml-css-zt' => '/dist/css/zt/zt.css',
	'mml-css-fontawesome' => '/dist/css/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css',
	'mml-css-slick' => '/dist/js/libs/slick-1.8.1/slick.css', // 需要使用时，取消注释即可
	// 'mml-css-swiper' => '/dist/js/libs/swiper-4.5.1/css/swiper.min.css', // 需要使用时，取消注释即可
];

// ================================ 定义 END ================================











// ================================ 执行 ================================

MML_Theme_FrontEnd::init();

class MML_Theme_FrontEnd {
	public static $mml_shortcodes = [];
	public static $mml_sidebars = [];
	public static $mml_scripts = [];
	public static $mml_styles = [];

	public static function init () {
		add_action('init', [ self::class, 'add_shortcodes' ]);
		add_action('init', [ self::class, 'register_sidebars' ]);
		add_action( 'wp_enqueue_scripts', [ self::class, 'enqueue_scripts_and_styles' ], 20, 0 );
		add_action( 'wp_enqueue_scripts', function () { wp_enqueue_script( 'jquery' ); }, 8, 0 );
	}

	public static function add_shortcodes () {
		if (count(self::$mml_shortcodes) > 0) {
			foreach (self::$mml_shortcodes as $key => $value) {
				add_shortcode($key, function ($args) use ($key, $value) {
					$file_path = get_stylesheet_directory() . '/templates/' . $value;
					ob_start();
					include($file_path);
					$html = ob_get_clean();
					return $html;
				});
			}
		}
	}

	public static function register_sidebars () {
		if (count(self::$mml_sidebars) > 0) {
			foreach (self::$mml_sidebars as $id => $name) {
				register_sidebar(array('name' => __($name), 'id' => $id));
			}
		}
	}

	public static function enqueue_scripts_and_styles () {
		$version = mml_theme_fn_get_git_hash(8);

		// css
		wp_enqueue_style( 'wp_theme_css', '/wp-includes/css/dist/block-library/theme.css', array(), $version ); // 这个排在前面
		if (count(self::$mml_styles) > 0) {
			foreach (self::$mml_styles as $id => $file) {
				wp_enqueue_style( $id, get_stylesheet_directory_uri() . $file, array(), $version );
			}
		}
		wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', array(), $version ); // 这个放在后面

		// js
		if (count(self::$mml_scripts) > 0) {
			foreach (self::$mml_scripts as $id => $file) {
				wp_enqueue_script( $id, get_stylesheet_directory_uri() . $file, array(), $version );
			}
		}
	}
}

// ================================ 执行 END ================================