<?php
/**
 * Plugin Name: RD Elementor Widgets
 * Description: RapidDirect custom Elementor widgets.
 * Version: 0.1.0
 * Author: RapidDirect
 * Text Domain: rd-elementor-widgets
 */

defined( 'ABSPATH' ) || exit;

final class RD_Elementor_Widgets_Plugin {
	const STYLE_HANDLE_DESIGN_GUIDE = 'rd-design-guide';
	const STYLE_HANDLE_AI_CREATOR = 'rd-ai-creator';
	const SCRIPT_HANDLE_AI_CREATOR = 'rd-ai-creator';
	const STYLE_HANDLE_SERVICES_GRID = 'rd-services-grid';
	const STYLE_HANDLE_TOOLING_COMPARISON = 'rd-tooling-comparison';
	const STYLE_HANDLE_TOOLING_PROCESS = 'rd-tooling-process';
	const SCRIPT_HANDLE_TOOLING_PROCESS = 'rd-tooling-process';
	const STYLE_HANDLE_TOOLING_SHOWCASE = 'rd-tooling-showcase';
	const SCRIPT_HANDLE_TOOLING_SHOWCASE = 'rd-tooling-showcase';
	const STYLE_HANDLE_TOOLING_EQUIPMENT = 'rd-tooling-equipment';
	const SCRIPT_HANDLE_TOOLING_EQUIPMENT = 'rd-tooling-equipment';
	const STYLE_HANDLE_MATERIAL_LIBRARY = 'rd-material-library';
	const SCRIPT_HANDLE_MATERIAL_LIBRARY = 'rd-material-library';
	const STYLE_HANDLE_SERVICE_HERO_BANNER = 'rd-service-hero-banner';
	const SCRIPT_HANDLE_SERVICE_HERO_BANNER = 'rd-service-hero-banner';
	const STYLE_HANDLE_SOLUTION_PAIN_POINTS = 'rd-solution-pain-points';
	const STYLE_HANDLE_SOLUTION_INTRODUCTION = 'rd-solution-introduction';
	const STYLE_HANDLE_SOLUTION_WORKFLOW = 'rd-solution-workflow';
	const STYLE_HANDLE_SOLUTION_ADVANTAGES = 'rd-solution-advantages';
	const STYLE_HANDLE_SOLUTION_SERVICE_MATRIX = 'rd-solution-service-matrix';
	const STYLE_HANDLE_SOLUTION_FAQ = 'rd-solution-faq';
	const SCRIPT_HANDLE_SOLUTION_FAQ = 'rd-solution-faq';
	const STYLE_HANDLE_SERVICE_CASE_STUDY = 'rd-service-case-study';
	const SCRIPT_HANDLE_SERVICE_CASE_STUDY = 'rd-service-case-study';
	const STYLE_HANDLE_TRUST_LOGO_MARQUEE = 'rd-trust-logo-marquee';
	const SCRIPT_HANDLE_TRUST_LOGO_MARQUEE = 'rd-trust-logo-marquee';
	const STYLE_HANDLE_SERVICE_GALLERY = 'rd-service-gallery';
	const STYLE_HANDLE_CAPABILITY_SHOWCASE = 'rd-capability-showcase';
	const SCRIPT_HANDLE_CAPABILITY_SHOWCASE = 'rd-capability-showcase';
	const STYLE_HANDLE_COMPLETE_PRODUCT_SHOWCASE = 'rd-complete-product-showcase';

	private static function asset_version( $relative_path ) {
		$file = plugin_dir_path( __FILE__ ) . ltrim( $relative_path, '/' );
		if ( is_file( $file ) ) {
			return (string) filemtime( $file );
		}

		return '0.1.0';
	}

	public static function init() {
		add_action( 'wp_enqueue_scripts', [ self::class, 'register_assets' ] );
		add_action( 'elementor/frontend/after_register_styles', [ self::class, 'register_assets' ] );
		add_action( 'elementor/frontend/after_register_scripts', [ self::class, 'register_assets' ] );
		add_action( 'elementor/elements/categories_registered', [ self::class, 'register_category' ] );
		add_action( 'elementor/widgets/register', [ self::class, 'register_widgets' ] );
	}

	public static function register_assets() {
		wp_register_style(
			self::STYLE_HANDLE_DESIGN_GUIDE,
			plugins_url( 'assets/design-guide.css', __FILE__ ),
			[],
			self::asset_version( 'assets/design-guide.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_AI_CREATOR,
			plugins_url( 'assets/ai-creator.css', __FILE__ ),
			[],
			self::asset_version( 'assets/ai-creator.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_SERVICES_GRID,
			plugins_url( 'assets/services-grid.css', __FILE__ ),
			[],
			self::asset_version( 'assets/services-grid.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_TOOLING_COMPARISON,
			plugins_url( 'assets/tooling-comparison.css', __FILE__ ),
			[],
			self::asset_version( 'assets/tooling-comparison.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_TOOLING_PROCESS,
			plugins_url( 'assets/tooling-process.css', __FILE__ ),
			[],
			self::asset_version( 'assets/tooling-process.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_TOOLING_SHOWCASE,
			plugins_url( 'assets/tooling-showcase.css', __FILE__ ),
			[],
			self::asset_version( 'assets/tooling-showcase.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_TOOLING_EQUIPMENT,
			plugins_url( 'assets/tooling-equipment.css', __FILE__ ),
			[],
			self::asset_version( 'assets/tooling-equipment.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_MATERIAL_LIBRARY,
			plugins_url( 'assets/material-library.css', __FILE__ ),
			[],
			self::asset_version( 'assets/material-library.css' )
		);

		wp_register_script(
			self::SCRIPT_HANDLE_AI_CREATOR,
			plugins_url( 'assets/ai-creator.js', __FILE__ ),
			[],
			self::asset_version( 'assets/ai-creator.js' ),
			true
		);

		wp_register_script(
			self::SCRIPT_HANDLE_TOOLING_PROCESS,
			plugins_url( 'assets/tooling-process.js', __FILE__ ),
			[],
			self::asset_version( 'assets/tooling-process.js' ),
			true
		);

		wp_register_script(
			self::SCRIPT_HANDLE_TOOLING_SHOWCASE,
			plugins_url( 'assets/tooling-showcase.js', __FILE__ ),
			[],
			self::asset_version( 'assets/tooling-showcase.js' ),
			true
		);

		wp_register_script(
			self::SCRIPT_HANDLE_TOOLING_EQUIPMENT,
			plugins_url( 'assets/tooling-equipment.js', __FILE__ ),
			[],
			self::asset_version( 'assets/tooling-equipment.js' ),
			true
		);

		wp_register_script(
			self::SCRIPT_HANDLE_MATERIAL_LIBRARY,
			plugins_url( 'assets/material-library.js', __FILE__ ),
			[],
			self::asset_version( 'assets/material-library.js' ),
			true
		);

		wp_register_style(
			self::STYLE_HANDLE_SERVICE_HERO_BANNER,
			plugins_url( 'assets/service-hero-banner.css', __FILE__ ),
			[],
			self::asset_version( 'assets/service-hero-banner.css' )
		);

		wp_register_script(
			self::SCRIPT_HANDLE_SERVICE_HERO_BANNER,
			plugins_url( 'assets/service-hero-banner.js', __FILE__ ),
			[],
			self::asset_version( 'assets/service-hero-banner.js' ),
			true
		);

		wp_register_style(
			self::STYLE_HANDLE_SOLUTION_PAIN_POINTS,
			plugins_url( 'assets/solution-pain-points.css', __FILE__ ),
			[],
			self::asset_version( 'assets/solution-pain-points.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_SOLUTION_INTRODUCTION,
			plugins_url( 'assets/solution-introduction.css', __FILE__ ),
			[],
			self::asset_version( 'assets/solution-introduction.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_SOLUTION_WORKFLOW,
			plugins_url( 'assets/solution-workflow.css', __FILE__ ),
			[],
			self::asset_version( 'assets/solution-workflow.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_SOLUTION_ADVANTAGES,
			plugins_url( 'assets/solution-advantages.css', __FILE__ ),
			[],
			self::asset_version( 'assets/solution-advantages.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_SOLUTION_SERVICE_MATRIX,
			plugins_url( 'assets/solution-service-matrix.css', __FILE__ ),
			[],
			self::asset_version( 'assets/solution-service-matrix.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_SOLUTION_FAQ,
			plugins_url( 'assets/solution-faq.css', __FILE__ ),
			[],
			self::asset_version( 'assets/solution-faq.css' )
		);

		wp_register_script(
			self::SCRIPT_HANDLE_SOLUTION_FAQ,
			plugins_url( 'assets/solution-faq.js', __FILE__ ),
			[],
			self::asset_version( 'assets/solution-faq.js' ),
			true
		);

		wp_register_style(
			self::STYLE_HANDLE_SERVICE_CASE_STUDY,
			plugins_url( 'assets/service-case-study.css', __FILE__ ),
			[],
			self::asset_version( 'assets/service-case-study.css' )
		);

		wp_register_script(
			self::SCRIPT_HANDLE_SERVICE_CASE_STUDY,
			plugins_url( 'assets/service-case-study.js', __FILE__ ),
			[],
			self::asset_version( 'assets/service-case-study.js' ),
			true
		);

		wp_register_style(
			self::STYLE_HANDLE_TRUST_LOGO_MARQUEE,
			plugins_url( 'assets/trust-logo-marquee.css', __FILE__ ),
			[],
			self::asset_version( 'assets/trust-logo-marquee.css' )
		);

		wp_register_script(
			self::SCRIPT_HANDLE_TRUST_LOGO_MARQUEE,
			plugins_url( 'assets/trust-logo-marquee.js', __FILE__ ),
			[ 'jquery' ],
			self::asset_version( 'assets/trust-logo-marquee.js' ),
			true
		);

		wp_register_style(
			self::STYLE_HANDLE_SERVICE_GALLERY,
			plugins_url( 'assets/service-gallery.css', __FILE__ ),
			[],
			self::asset_version( 'assets/service-gallery.css' )
		);

		wp_register_style(
			self::STYLE_HANDLE_CAPABILITY_SHOWCASE,
			plugins_url( 'assets/capability-showcase.css', __FILE__ ),
			[],
			self::asset_version( 'assets/capability-showcase.css' )
		);

		wp_register_script(
			self::SCRIPT_HANDLE_CAPABILITY_SHOWCASE,
			plugins_url( 'assets/capability-showcase.js', __FILE__ ),
			[],
			self::asset_version( 'assets/capability-showcase.js' ),
			true
		);

		wp_register_style(
			self::STYLE_HANDLE_COMPLETE_PRODUCT_SHOWCASE,
			plugins_url( 'assets/complete-product-showcase.css', __FILE__ ),
			[],
			self::asset_version( 'assets/complete-product-showcase.css' )
		);
	}

	public static function register_category( $elements_manager ) {
		if ( ! is_object( $elements_manager ) || ! method_exists( $elements_manager, 'add_category' ) ) {
			return;
		}

		$elements_manager->add_category(
			'rapiddirect',
			[
				'title' => 'RapidDirect',
				'icon'  => 'fa fa-plug',
			]
		);
	}

	private static function include_widgets() {
		require_once __DIR__ . '/widgets/design-guide-widget.php';
		require_once __DIR__ . '/widgets/ai-creator-widget.php';
		require_once __DIR__ . '/widgets/services-grid-widget.php';
		require_once __DIR__ . '/widgets/tooling-comparison-widget.php';
		require_once __DIR__ . '/widgets/tooling-process-widget.php';
		require_once __DIR__ . '/widgets/tooling-showcase-widget.php';
		require_once __DIR__ . '/widgets/tooling-equipment-widget.php';
		require_once __DIR__ . '/widgets/material-library-widget.php';
		require_once __DIR__ . '/widgets/service-hero-banner-widget.php';
		require_once __DIR__ . '/widgets/solution-pain-points-widget.php';
		require_once __DIR__ . '/widgets/solution-introduction-widget.php';
		require_once __DIR__ . '/widgets/solution-workflow-widget.php';
		require_once __DIR__ . '/widgets/solution-advantages-widget.php';
		require_once __DIR__ . '/widgets/solution-service-matrix-widget.php';
		require_once __DIR__ . '/widgets/solution-faq-widget.php';
		require_once __DIR__ . '/widgets/service-case-study-widget.php';
		require_once __DIR__ . '/widgets/trust-logo-marquee-widget.php';
		require_once __DIR__ . '/widgets/service-gallery-widget.php';
		require_once __DIR__ . '/widgets/capability-showcase-widget.php';
		require_once __DIR__ . '/widgets/complete-product-showcase-widget.php';
	}

	public static function register_widgets( $widgets_manager ) {
		if ( ! is_object( $widgets_manager ) || ! method_exists( $widgets_manager, 'register' ) ) {
			return;
		}

		self::include_widgets();

		if ( class_exists( 'RD_Design_Guide_Widget' ) ) {
			$widgets_manager->register( new \RD_Design_Guide_Widget() );
		}

		if ( class_exists( 'RD_AI_Creator_Widget' ) ) {
			$widgets_manager->register( new \RD_AI_Creator_Widget() );
		}

		if ( class_exists( 'RD_Services_Grid_Widget' ) ) {
			$widgets_manager->register( new \RD_Services_Grid_Widget() );
		}

		if ( class_exists( 'RD_Tooling_Comparison_Widget' ) ) {
			$widgets_manager->register( new \RD_Tooling_Comparison_Widget() );
		}

		if ( class_exists( 'RD_Tooling_Process_Widget' ) ) {
			$widgets_manager->register( new \RD_Tooling_Process_Widget() );
		}

		if ( class_exists( 'RD_Tooling_Showcase_Widget' ) ) {
			$widgets_manager->register( new \RD_Tooling_Showcase_Widget() );
		}

		if ( class_exists( 'RD_Tooling_Equipment_Widget' ) ) {
			$widgets_manager->register( new \RD_Tooling_Equipment_Widget() );
		}

		if ( class_exists( 'RD_Material_Library_Widget' ) ) {
			$widgets_manager->register( new \RD_Material_Library_Widget() );
		}

		if ( class_exists( 'RD_Service_Hero_Banner_Widget' ) ) {
			$widgets_manager->register( new \RD_Service_Hero_Banner_Widget() );
		}

		if ( class_exists( 'RD_Solution_Pain_Points_Widget' ) ) {
			$widgets_manager->register( new \RD_Solution_Pain_Points_Widget() );
		}

		if ( class_exists( 'RD_Solution_Introduction_Widget' ) ) {
			$widgets_manager->register( new \RD_Solution_Introduction_Widget() );
		}

		if ( class_exists( 'RD_Solution_Workflow_Widget' ) ) {
			$widgets_manager->register( new \RD_Solution_Workflow_Widget() );
		}

		if ( class_exists( 'RD_Solution_Advantages_Widget' ) ) {
			$widgets_manager->register( new \RD_Solution_Advantages_Widget() );
		}

		if ( class_exists( 'RD_Solution_Service_Matrix_Widget' ) ) {
			$widgets_manager->register( new \RD_Solution_Service_Matrix_Widget() );
		}

		if ( class_exists( 'RD_Solution_FAQ_Widget' ) ) {
			$widgets_manager->register( new \RD_Solution_FAQ_Widget() );
		}

		if ( class_exists( 'RD_Service_Case_Study_Widget' ) ) {
			$widgets_manager->register( new \RD_Service_Case_Study_Widget() );
		}

		if ( class_exists( 'RD_Trust_Logo_Marquee_Widget' ) ) {
			$widgets_manager->register( new \RD_Trust_Logo_Marquee_Widget() );
		}

		if ( class_exists( 'RD_Service_Gallery_Widget' ) ) {
			$widgets_manager->register( new \RD_Service_Gallery_Widget() );
		}

		if ( class_exists( 'RD_Capability_Showcase_Widget' ) ) {
			$widgets_manager->register( new \RD_Capability_Showcase_Widget() );
		}

		if ( class_exists( 'RD_Complete_Product_Showcase_Widget' ) ) {
			$widgets_manager->register( new \RD_Complete_Product_Showcase_Widget() );
		}
	}
}

add_action( 'plugins_loaded', [ 'RD_Elementor_Widgets_Plugin', 'init' ] );
