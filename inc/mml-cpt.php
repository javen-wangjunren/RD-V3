<?php
/**
 * Custom post type 预设置
 */

defined('ABSPATH') || die;

class MML_Custom_Post_Type {

	private static $prefix = 'mml_theme_setting_';
	private static $page_slug = 'mml-theme-setting-cpt';
	private static $names = [
		'case' => 'Cases',
		'event' => 'Events',
		'project' => 'Projects',
		'news-and-event' => 'News & Events',
		'news' => 'News',
	];

	public static function init () {
		add_action( 'init', [ self::class, 'register_custom_post_types' ] );
		add_action( 'admin_menu', [ self::class, 'add_cpt_menu' ] );
		add_action( 'admin_init', [ self::class, 'add_cpt_setting_fields' ] );
	}

	public static function register_custom_post_types () {
		foreach (self::$names as $slug => $name) {
			self::enable_cpt($slug);
		}
		// if ( isset( $_POST['mml_theme_setting_cpt_mark'] ) ) {
		// 	flush_rewrite_rules();
		// }
	}

	private static function enable_cpt ($slug) {
		$key = self::$prefix . 'cpt_' . $slug;
		$value = get_option($key);
		if ($value === 'y') {
			self::register_cpt($slug, self::$names[$slug]);
		}
	}

	// ================================================================
	// 后台管理菜单
	// ================================================================

	public static function display_cpt_page () {
		echo '<h1>Custom Post Type</h1><form method="POST" action="options.php">';
		settings_fields( self::$page_slug );
		do_settings_sections( self::$page_slug );
		// do_settings_fields( self::$page_slug );
		echo '<input type="hidden" name="mml_theme_setting_cpt_mark" value="y" />';
		submit_button();
		// echo '<p>要保存两次。</p>';
		echo '</form>';
	}

	public static function display_section_cpt () {
		echo '要启用哪个，就打勾。';
	}

	public static function  display_setting_case () {
		self::display_setting_cpt('case');
	}

	public static function  display_setting_event () {
		self::display_setting_cpt('event');
	}
	public static function  display_setting_project () {
		self::display_setting_cpt('project');
	}
	public static function  display_setting_news () {
		self::display_setting_cpt('news');
	}
	public static function  display_setting_news_and_event () {
		self::display_setting_cpt('news-and-event');
	}

	private static function  display_setting_cpt ($slug) {
		$key = self::$prefix . 'cpt_' . $slug;
		$value = get_option($key);
		?><input type="checkbox" value="y" name="<?php echo $key; ?>" <?php echo $value === 'y' ? 'checked' : ''; ?> /><?php
	}

	public static function add_cpt_menu () {
		// add_options_page('Page Title','Menu Title','manage_options','my_menu_page', 'display_cpt_page');
		$parent_slug = 'mml-theme-setting';
		$capability = 'edit_theme_options';
		add_submenu_page(
			$parent_slug,
			'MML Theme CPT', // Page title
			'Custom Post Type', // menu_title,
			$capability, // capability,
			self::$page_slug, // slug
			[ self::class, 'display_cpt_page' ] // function
		);
	}

	public static function add_cpt_setting_fields () {
		// register_setting( string $option_group, string $option_name, array $args = array() )
		foreach (self::$names as $slug => $name) {
			// register_setting( self::$page_slug, self::$prefix . 'cpt_case' );
			register_setting( self::$page_slug, self::$prefix . 'cpt_' . $slug );
		}

		// add_settings_section( string $id, string $title, callable $callback, string $page )
		add_settings_section('section_cpt','自定义内容类型', [ self::class, 'display_section_cpt' ], self::$page_slug);

		// add_settings_field( string $id, string $title, callable $callback, string $page, string $section = 'default', array $args = array() )
		// add_settings_field( self::$prefix . 'cpt_case', 'Cases', [ self::class, 'display_setting_case' ], self::$page_slug, 'section_cpt');
		// 'general', 'discussion', 'media', 'reading', 'writing', 'misc', 'options', and 'privacy'.
		foreach (self::$names as $slug => $name) {
			add_settings_field(
				self::$prefix . 'cpt_' . $slug,
				$name,
				[ self::class, 'display_setting_' . str_replace('-', '_', $slug) ],
				self::$page_slug,
				'section_cpt'
			);
		}
	}

	// ================================================================
	// 自定义内容
	// ================================================================

	private static function register_cpt($slug, $name) {

		$labels = [
			"name" => __( "$name", "mml-theme" ),
			"singular_name" => __( "$name", "mml-theme" ),
		];

		$args = [
			"label" => __( "$name", "mml-theme" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => [ "slug" => "$slug", "with_front" => true ],
			"query_var" => true,
			"supports" => [ "title", "editor", "thumbnail", 'excerpt', "page-attributes", "excerpt"],
		];

		register_post_type( "$slug", $args );
        register_taxonomy( $slug."-category", array( $slug ), array(
            "label" => __( $name." Category", "mml-theme" ),
            "labels" => array(
                "name" => __( $name." Category", "mml-theme" ),
                "singular_name" => __( $name." Category", "mml-theme" ),
            ),
            'hierarchical' => true,
            "show_in_rest" => true,
            'show_admin_column' => true,
            "rewrite" => array( 'slug' => $slug."-category", 'with_front' => true, ),
        ) );
	}

}

MML_Custom_Post_Type::init();
