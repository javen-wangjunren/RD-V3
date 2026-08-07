<?php
/**
 * RD Site Header
 *
 * 全局站点头部（6 个 Mega Menu）。
 * - 数据：wp_options 单一数据源（对齐 设计稿/header.md 字段契约）
 * - 渲染：本类 render()，由 header.php 模板函数调用，或短代码 [rd_site_header]
 * - 编辑：admin/site-header-admin.php
 *
 * @package mml-theme
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Site_Header' ) ) {

	class RD_Site_Header {

		const OPTION_KEY = 'rd_site_header_content';

		const MEGA_TYPES = [ 'capabilities', 'solutions', 'industries', 'platform', 'resources', 'about' ];

		/**
		 * 入口。主题 functions.php 中 require 后调用。
		 */
		public static function init() {
			add_action( 'wp_enqueue_scripts', [ __CLASS__, 'register_assets' ] );
			add_shortcode( 'rd_site_header', [ __CLASS__, 'shortcode' ] );

			// admin 文件被 require 时底部自行 RD_Site_Header_Admin::init()
			require_once __DIR__ . '/admin/site-header-admin.php';
		}

		/* ================================ 资产 ================================ */

		private static function asset_version( $relative ) {
			$file = get_template_directory() . '/inc/site-header/assets/' . $relative;
			if ( is_file( $file ) ) {
				return (string) filemtime( $file );
			}

			return '0.1.0';
		}

		public static function register_assets() {
			wp_register_style(
				'rd-site-header',
				get_template_directory_uri() . '/inc/site-header/assets/site-header.css',
				[],
				self::asset_version( 'site-header.css' )
			);
			wp_register_script(
				'rd-site-header',
				get_template_directory_uri() . '/inc/site-header/assets/site-header.js',
				[],
				self::asset_version( 'site-header.js' ),
				true
			);

			wp_enqueue_style( 'rd-site-header' );
			wp_enqueue_script( 'rd-site-header' );
		}

		/* ================================ 数据 ================================ */

		/**
		 * 设计稿默认数据（header new.html）。
		 * 所有 href 默认 '#'；CTA 文案不含 '→'，渲染端统一追加。
		 */
		public static function defaults() {
			return [
				'logo_url' => '',
			'cta_text' => 'Get instant quote',
			'cta_href' => '#',
			'top_announcement' => 'Accelerate your innovation with RapidDirect\'s new AI capabilities.',
			'top_cta_title' => 'Explore AI Make Studio',
			'top_cta_href' => '#',
				'nav_items' => [
					[
						'label'     => 'Capabilities',
						'mega_type' => 'capabilities',
						'sections'  => [
							[
								'section_label' => 'Mechanical Manufacturing',
								'tabs'          => [
									[
										'tab_label' => 'Machining',
										'is_muted'  => false,
										'cards'     => [
											[ 'label' => 'CNC Machining', 'href' => '#' ],
											[ 'label' => 'CNC Milling', 'href' => '#' ],
											[ 'label' => 'CNC Turning', 'href' => '#' ],
											[ 'label' => 'CNC Routing', 'href' => '#' ],
											[ 'label' => '5 Axis CNC Machining', 'href' => '#' ],
											[ 'label' => 'Precision CNC', 'href' => '#' ],
										],
										'image_url' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=ultra%20realistic%20industrial%20photo%2C%20CNC%20milling%20machine%20cutting%20aluminum%20part%2C%20coolant%20spray%2C%20modern%20factory%20workshop%2C%20dark%20moody%20lighting%2C%20high%20detail%2C%20shallow%20depth%20of%20field&image_size=portrait_16_9',
									],
									[
										'tab_label' => 'Fabrication',
										'is_muted'  => false,
										'cards'     => [
											[ 'label' => 'Sheet Metal Fabrication', 'href' => '#' ],
											[ 'label' => 'Laser Cutting', 'href' => '#' ],
											[ 'label' => 'Metal Bending', 'href' => '#' ],
											[ 'label' => 'Waterjet Cutting', 'href' => '#' ],
											[ 'label' => 'Tube Laser Cutting', 'href' => '#' ],
											[ 'label' => 'Custom Enclosure', 'href' => '#' ],
											[ 'label' => 'Welding Services', 'href' => '#' ],
										],
										'image_url' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=ultra%20realistic%20industrial%20photo%2C%20sheet%20metal%20laser%20cutting%20with%20sparks%2C%20precision%20fabrication%20shop%2C%20dark%20background%2C%20high%20detail&image_size=portrait_16_9',
									],
									[
										'tab_label' => 'Molding',
										'is_muted'  => false,
										'cards'     => [
											[ 'label' => 'Injection Molding', 'href' => '#' ],
											[ 'label' => 'Injection Mold Tooling', 'href' => '#' ],
											[ 'label' => 'Overmolding', 'href' => '#' ],
											[ 'label' => 'Insert Molding', 'href' => '#' ],
											[ 'label' => 'Low Volume Injection Molding', 'href' => '#' ],
										],
										'image_url' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=ultra%20realistic%20industrial%20photo%2C%20injection%20molding%20machine%20producing%20plastic%20parts%2C%20factory%20floor%2C%20high%20detail%2C%20moody%20lighting&image_size=portrait_16_9',
									],
									[
										'tab_label' => '3D Printing',
										'is_muted'  => false,
										'cards'     => [
											[ 'label' => '3D Printing Prototyping', 'href' => '#' ],
											[ 'label' => 'SLA', 'href' => '#' ],
											[ 'label' => 'SLS', 'href' => '#' ],
											[ 'label' => 'SLM', 'href' => '#' ],
											[ 'label' => 'FDM', 'href' => '#' ],
											[ 'label' => 'MJF', 'href' => '#' ],
											[ 'label' => 'DLP', 'href' => '#' ],
											[ 'label' => 'FGF', 'href' => '#' ],
										],
										'image_url' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=ultra%20realistic%20industrial%20photo%2C%20industrial%203d%20printer%20printing%20a%20functional%20prototype%20part%2C%20close-up%2C%20dark%20workshop%2C%20high%20detail&image_size=portrait_16_9',
									],
									[
										'tab_label' => 'Value-Added',
										'is_muted'  => true,
										'cards'     => [
											[ 'label' => '3D Printing', 'href' => '#' ],
											[ 'label' => 'Die Casting', 'href' => '#' ],
											[ 'label' => 'Vacuum Casting', 'href' => '#' ],
											[ 'label' => 'Wire EDM', 'href' => '#' ],
											[ 'label' => 'Aluminum Extrusion', 'href' => '#' ],
										],
										'image_url' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=ultra%20realistic%20industrial%20photo%2C%20aluminum%20die%20casting%20parts%20on%20a%20workbench%2C%20industrial%20factory%2C%20high%20detail%2C%20dark%20neutral%20tones&image_size=portrait_16_9',
									],
								],
							],
							[
								'section_label' => 'Electronics Manufacturing',
								'tabs'          => [
									[
										'tab_label' => 'Core Services',
										'is_muted'  => false,
										'cards'     => [
											[ 'label' => 'EMS', 'href' => '#' ],
											[ 'label' => 'PCB Design', 'href' => '#' ],
											[ 'label' => 'PCB Assembly', 'href' => '#' ],
											[ 'label' => 'PCB Manufacturing', 'href' => '#' ],
											[ 'label' => 'Components Sourcing', 'href' => '#' ],
										],
										'image_url' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=ultra%20realistic%20industrial%20photo%2C%20PCB%20assembly%20line%2C%20pick%20and%20place%20machine%20placing%20components%20on%20circuit%20board%2C%20factory%2C%20high%20detail%2C%20dark%20background&image_size=portrait_16_9',
									],
								],
							],
						],
						'footer'    => [
							'browse_all_href' => '#',
							'get_quote_href'  => '#',
						],
					],
					[
						'label'     => 'Solutions',
						'mega_type' => 'solutions',
						'tabs'      => [
							[
								'tab_label'   => 'NPI Solutions',
								'panel_style' => 'timeline',
								'panel_desc'  => 'A one-stop product innovation service covering design, prototyping, mass production, and packaging.',
								'steps'       => [
									[ 'title' => 'Design & Engineering', 'desc' => 'Turn concepts into precision parts.', 'href' => '#' ],
									[ 'title' => 'Verification Phase', 'desc' => 'Rigorous prototyping validation.', 'href' => '#' ],
									[ 'title' => 'Mass Production', 'desc' => 'Scale into high-volume production.', 'href' => '#' ],
									[ 'title' => 'Packaging Phase', 'desc' => 'Market-ready solutions.', 'href' => '#' ],
									[ 'title' => 'Service Package', 'desc' => 'Choose the ideal NPI package—from feasibility to mass production.', 'href' => '#' ],
								],
								'cards'       => [],
								'cta1_label'  => 'Explore NPI solutions',
								'cta1_href'   => '#',
								'cta2_href'   => '#',
								'image_url'   => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=ultra%20realistic%20industrial%20photo%2C%20engineering%20and%20manufacturing%20workflow%2C%20engineer%20reviewing%20part%20sample%20next%20to%20CAD%20screen%20in%20modern%20factory%2C%20high%20detail%2C%20neutral%20lighting&image_size=portrait_4_3',
							],
							[
								'tab_label'   => 'Manufacturing Solutions',
								'panel_style' => 'card',
								'panel_desc'  => 'A lighter entry point for teams that already know the manufacturing service they need and want to go straight to execution.',
								'steps'       => [],
								'cards'       => [
									[ 'label' => 'Rapid Prototyping', 'href' => '#' ],
									[ 'label' => 'On Demand Manufacturing', 'href' => '#' ],
									[ 'label' => 'Surface Finishing', 'href' => '#' ],
									[ 'label' => 'Assembly', 'href' => '#' ],
									[ 'label' => 'Industrial Automation', 'href' => '#' ],
								],
								'cta1_label'  => 'Browse manufacturing services',
								'cta1_href'   => '#',
								'cta2_href'   => '#',
								'image_url'   => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=ultra%20realistic%20industrial%20photo%2C%20mixed%20manufacturing%20services%20scene%20with%20precision%20metal%20parts%2C%20assembly%20fixtures%2C%20surface%20finished%20components%20in%20modern%20workshop%2C%20high%20detail%2C%20neutral%20lighting&image_size=portrait_4_3',
							],
						],
					],
					[
						'label'                   => 'Industries',
						'mega_type'               => 'industries',
						'industries_header_title' => 'Industries We Serve',
						'industries_browse_href'  => '#',
						'industries'              => [
							[
								'label'    => 'Aerospace',
								'href'     => '#',
								'icon_svg' => '<svg class="industry-icon" viewBox="0 0 24 24"><path d="M13.13 22.19L11.5 18.36C10.07 15.3 8.46 12.35 6.7 9.53L3.13 4.2C2.7 3.56 3.34 2.76 4.04 3.08L9.75 5.67C12.8 7.05 15.63 8.84 18.15 11L21.72 14.12C22.25 14.58 22.06 15.43 21.4 15.62L17.2 16.8M13.13 22.19C12.86 22.82 11.97 22.7 11.87 22M13.13 22.19L17.2 16.8"/></svg>',
							],
							[
								'label'    => 'Medical Devices',
								'href'     => '#',
								'icon_svg' => '<svg class="industry-icon" viewBox="0 0 24 24"><path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM13 17H11V13H7V11H11V7H13V11H17V13H13V17Z"/></svg>',
							],
							[
								'label'    => 'Automotive',
								'href'     => '#',
								'icon_svg' => '<svg class="industry-icon" viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5H6.5C5.84 5 5.28 5.42 5.08 6.01L3 12V20C3 20.55 3.45 21 4 21H5C5.55 21 6 20.55 6 20V19H18V20C18 20.55 18.45 21 19 21H20C20.55 21 21 20.55 21 20V12L18.92 6.01ZM6.85 7H17.14L18.22 10.11H5.77L6.85 7ZM19 17H5V12H19V17ZM7.5 16C8.33 16 9 15.33 9 14.5C9 13.67 8.33 13 7.5 13C6.67 13 6 13.67 6 14.5C6 15.33 6.67 16 7.5 16ZM16.5 16C17.33 16 18 15.33 18 14.5C18 13.67 17.33 13 16.5 13C15.67 13 15 15.33 15 14.5C15 15.33 15.67 16 16.5 16Z"/></svg>',
							],
							[
								'label'    => 'Communication',
								'href'     => '#',
								'icon_svg' => '<svg class="industry-icon" viewBox="0 0 24 24"><path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM20 16H5.17L4 17.17V4H20V16ZM7 9H17V11H7V9Z"/></svg>',
							],
							[
								'label'    => 'Robotics',
								'href'     => '#',
								'icon_svg' => '<svg class="industry-icon" viewBox="0 0 24 24"><path d="M12 2C10.9 2 10 2.9 10 4V6H6C4.9 6 4 6.9 4 8V18C4 19.1 4.9 20 6 20H18C19.1 20 20 19.1 20 18V8C20 6.9 19.1 6 18 6H14V4C14 2.9 13.1 2 12 2ZM7.5 11C8.33 11 9 11.67 9 12.5C9 13.33 8.33 14 7.5 14C6.67 14 6 13.33 6 12.5C6 11.67 6.67 11 7.5 11ZM16.5 11C17.33 11 18 11.67 18 12.5C18 13.33 17.33 14 16.5 14C15.67 14 15 13.33 15 12.5C15 11.67 15.67 11 16.5 11ZM8 16H16V18H8V16Z"/></svg>',
							],
							[
								'label'    => 'Electronics',
								'href'     => '#',
								'icon_svg' => '<svg class="industry-icon" viewBox="0 0 24 24"><path d="M9 14.998L11 15V19H13V15L15 14.998C16.1 14.998 17 14.1 17 13V8C17 6.9 16.1 6 15 6H9C7.9 6 7 6.9 7 8V13C7 14.1 7.9 14.998 9 14.998ZM9 8H15V13H9V8ZM13 2H11V4H13V2ZM19 10H21V12H19V10ZM3 10H5V12H3V10Z"/></svg>',
							],
							[
								'label'    => 'New Energy',
								'href'     => '#',
								'icon_svg' => '<svg class="industry-icon" viewBox="0 0 24 24"><path d="M12 3L2 12H5V20H19V12H22L12 3ZM12 7.7C14.1 7.7 15.8 9.4 15.8 11.5C15.8 13.6 14.1 15.3 12 15.3C9.9 15.3 8.2 13.6 8.2 11.5C8.2 9.4 9.9 7.7 12 7.7Z"/></svg>',
							],
							[
								'label'    => 'Consumer Goods',
								'href'     => '#',
								'icon_svg' => '<svg class="industry-icon" viewBox="0 0 24 24"><path d="M21 16V6C21 4.9 20.1 4 19 4H5C3.9 4 3 4.9 3 6V16C3 17.1 3.9 18 5 18H19C20.1 18 21 17.1 21 16ZM19 16H5V6H19V16ZM8 12L14 8V16L8 12Z"/></svg>',
							],
							[
								'label'    => 'Industrial Machinery',
								'href'     => '#',
								'icon_svg' => '<svg class="industry-icon" viewBox="0 0 24 24"><path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.06-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.73,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.06,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.43-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.49-0.12-0.61L19.14,12.94Z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6Z"/></svg>',
							],
						],
						'case_study'              => [
							'image_url' => 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=ultra%20realistic%20industrial%20photo%2C%20engineers%20reviewing%20precision%20machined%20components%20and%20production%20samples%20in%20a%20clean%20advanced%20factory%2C%20serious%20B2B%20manufacturing%20atmosphere%2C%20high%20detail%2C%20neutral%20lighting&image_size=portrait_4_3',
							'tag'       => 'Case Studies',
							'title'     => 'How We Support Complex Industry Programs',
							'cta_label' => 'See industry case studies',
							'cta_href'  => '#',
						],
					],
					[
						'label'           => 'Our Platform',
						'mega_type'       => 'platform',
						'platform_cards'  => [
							[
								'image_url'   => '',
								'title'       => 'Quote Platform',
								'description' => 'Instant quoting workflows and Teamspace account management for collaborative manufacturing.',
								'links'       => [
									[ 'label' => 'Instant Quote Platform', 'href' => '#' ],
									[ 'label' => 'Teamspace Account', 'href' => '#' ],
								],
								'list_style'  => 'simple',
								'cta_label'   => '',
								'cta_href'    => '#',
							],
							[
								'image_url'   => '',
								'title'       => 'AI Creator Lab',
								'description' => 'Our new AI generative model platform to turn ideas into manufacturable designs—fast.',
								'links'       => [
									[ 'label' => '1. Describe Your Idea', 'href' => '#' ],
									[ 'label' => '2. Generate & Refine', 'href' => '#' ],
									[ 'label' => '3. Export & Produce', 'href' => '#' ],
								],
								'list_style'  => 'timeline',
								'cta_label'   => 'Start Creating',
								'cta_href'    => '#',
							],
						],
					],
					[
						'label'             => 'Resources',
						'mega_type'         => 'resources',
						'resource_sections' => [
							[
								'section_title' => 'Knowledge Base',
								'link_style'    => 'simple',
								'links'         => [
									[ 'label' => 'Blog', 'href' => '#' ],
									[ 'label' => 'News', 'href' => '#' ],
									[ 'label' => 'eBooks & Guides', 'href' => '#' ],
									[ 'label' => 'Case Studies', 'href' => '#' ],
									[ 'label' => 'Help Center', 'href' => '#' ],
								],
								'service_items' => [],
								'footer_label'  => '',
								'footer_href'   => '',
							],
							[
								'section_title' => 'Materials by Service',
								'link_style'    => 'service',
								'links'         => [],
								'service_items' => [
									[ 'title' => 'CNC Machining', 'desc' => 'Precision-machined metal and plastic parts with tight tolerances.', 'href' => '#' ],
									[ 'title' => '3D Printing', 'desc' => 'Rapid prototyping and end-use parts in metals and plastics.', 'href' => '#' ],
									[ 'title' => 'Injection Molding', 'desc' => 'Production-grade molded parts with a wide range of materials.', 'href' => '#' ],
									[ 'title' => 'Sheet Metal Fabrication', 'desc' => 'Formed and cut metal parts for brackets, enclosures, and more.', 'href' => '#' ],
									[ 'title' => 'Urethane Casting', 'desc' => 'Low-volume production parts with silicone mold replicas.', 'href' => '#' ],
								],
								'footer_label'  => 'View all materials by service',
								'footer_href'   => '#',
							],
							[
								'section_title' => 'Surface Finishes',
								'link_style'    => 'simple',
								'links'         => [
									[ 'label' => 'As Machined', 'href' => '#' ],
									[ 'label' => 'Bead Blasting', 'href' => '#' ],
									[ 'label' => 'Anodizing', 'href' => '#' ],
									[ 'label' => 'Powder Coating', 'href' => '#' ],
									[ 'label' => 'Painting', 'href' => '#' ],
									[ 'label' => 'Polishing', 'href' => '#' ],
									[ 'label' => 'Brushing', 'href' => '#' ],
									[ 'label' => 'Black Oxide', 'href' => '#' ],
								],
								'service_items' => [],
								'footer_label'  => 'View all surface finishes',
								'footer_href'   => '#',
							],
						],
					],
					[
						'label'                   => 'About',
						'mega_type'               => 'about',
						'about_banner_image_url'  => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=400',
						'about_banner_title'      => 'About Us',
						'about_banner_desc'       => 'Empowering engineers to build a better world through faster manufacturing.',
						'about_link_groups'       => [
							[
								'group_title' => 'Our Company',
								'links'       => [
									[ 'label' => 'About Us', 'href' => '#' ],
									[ 'label' => 'Quality Assurance', 'href' => '#' ],
									[ 'label' => 'Testimonials', 'href' => '#' ],
								],
							],
							[
								'group_title' => 'Contact & Careers',
								'links'       => [
									[ 'label' => 'Contact Us', 'href' => '#' ],
									[ 'label' => 'Careers', 'href' => '#' ],
									[ 'label' => 'Sponsorship', 'href' => '#' ],
								],
							],
						],
					],
				],
			];
		}

		/**
		 * 读取 + 归一化。单一数据源入口。
		 */
		public static function get_content() {
			$data = get_option( self::OPTION_KEY, [] );
			if ( ! is_array( $data ) ) {
				$data = [];
			}

			return self::normalize( $data );
		}

		/**
		 * 归一化（读时兜底 + 清洗 + 旧值映射）。同时用于后台保存后落库。
		 */
		public static function normalize( $data ) {
			$defaults = self::defaults();

			$out = [
				'logo_url' => self::u( $data, 'logo_url', $defaults['logo_url'] ),
			'cta_text' => self::s( $data, 'cta_text', $defaults['cta_text'] ),
			'cta_href' => self::u( $data, 'cta_href', $defaults['cta_href'] ),
			'top_announcement' => self::s( $data, 'top_announcement', $defaults['top_announcement'] ),
			'top_cta_title' => self::s( $data, 'top_cta_title', $defaults['top_cta_title'] ),
			'top_cta_href' => self::u( $data, 'top_cta_href', $defaults['top_cta_href'] ),
				'nav_items' => [],
			];

			foreach ( self::arr( $data, 'nav_items' ) as $item ) {
				$nav = self::normalize_nav_item( $item );
				if ( $nav !== null ) {
					$out['nav_items'][] = $nav;
				}
			}

			return $out;
		}

		private static function normalize_nav_item( $item ) {
			$defaults = self::defaults();
			$def_item = $defaults['nav_items'][0]; // 仅取默认结构参考

			$mega_type = isset( $item['mega_type'] ) ? $item['mega_type'] : '';
			if ( ! in_array( $mega_type, self::MEGA_TYPES, true ) ) {
				return null;
			}

			$out = [
				'label'     => self::s( $item, 'label', '' ),
				'mega_type' => $mega_type,
			];

			switch ( $mega_type ) {
				case 'capabilities':
					$out = array_merge( $out, self::normalize_capabilities( $item ) );
					break;
				case 'solutions':
					$out = array_merge( $out, self::normalize_solutions( $item ) );
					break;
				case 'industries':
					$out = array_merge( $out, self::normalize_industries( $item ) );
					break;
				case 'platform':
					$out = array_merge( $out, self::normalize_platform( $item ) );
					break;
				case 'resources':
					$out = array_merge( $out, self::normalize_resources( $item ) );
					break;
				case 'about':
					$out = array_merge( $out, self::normalize_about( $item ) );
					break;
			}

			return $out;
		}

		/* -------- 各类型归一化 -------- */

		private static function normalize_capabilities( $item ) {
			$sections = [];
			foreach ( self::arr( $item, 'sections' ) as $sec ) {
				$tabs = [];
				foreach ( self::arr( $sec, 'tabs' ) as $tab ) {
					$tabs[] = [
						'tab_label' => self::s( $tab, 'tab_label', '' ),
						'is_muted'  => ! empty( $tab['is_muted'] ),
						'cards'     => self::normalize_links( $tab, 'cards' ),
						'image_url' => self::u( $tab, 'image_url', '' ),
					];
				}
				$sections[] = [
					'section_label' => self::s( $sec, 'section_label', '' ),
					'tabs'          => $tabs,
				];
			}

			$footer = isset( $item['footer'] ) && is_array( $item['footer'] ) ? $item['footer'] : [];

			return [
				'sections' => $sections,
				'footer'   => [
					'browse_all_href' => self::u( $footer, 'browse_all_href', '#' ),
					'get_quote_href'  => self::u( $footer, 'get_quote_href', '#' ),
				],
			];
		}

		private static function normalize_solutions( $item ) {
			$tabs = [];
			foreach ( self::arr( $item, 'tabs' ) as $tab ) {
				// 旧值兼容：npi→timeline、manufacturing→card
				$panel_style = self::s( $tab, 'panel_style', 'timeline' );
				if ( $panel_style === 'npi' ) {
					$panel_style = 'timeline';
				} elseif ( $panel_style === 'manufacturing' ) {
					$panel_style = 'card';
				}
				if ( ! in_array( $panel_style, [ 'timeline', 'card' ], true ) ) {
					$panel_style = 'timeline';
				}

				$steps = [];
				foreach ( self::arr( $tab, 'steps' ) as $step ) {
					$steps[] = [
						'title' => self::s( $step, 'title', '' ),
						'desc'  => self::txt( $step, 'desc', '' ),
						'href'  => self::u( $step, 'href', '#' ),
					];
				}

				$tabs[] = [
					'tab_label'   => self::s( $tab, 'tab_label', '' ),
					'panel_style' => $panel_style,
					'panel_desc'  => self::txt( $tab, 'panel_desc', '' ),
					'steps'       => $steps,
					'cards'       => self::normalize_links( $tab, 'cards' ),
					'cta1_label'  => self::s( $tab, 'cta1_label', '' ),
					'cta1_href'   => self::u( $tab, 'cta1_href', '#' ),
					'cta2_href'   => self::u( $tab, 'cta2_href', '#' ),
					'image_url'   => self::u( $tab, 'image_url', '' ),
				];
			}

			return [ 'tabs' => $tabs ];
		}

		private static function normalize_industries( $item ) {
			$industries = [];
			foreach ( self::arr( $item, 'industries' ) as $ind ) {
				$industries[] = [
					'label'    => self::s( $ind, 'label', '' ),
					'href'     => self::u( $ind, 'href', '#' ),
					'icon_svg' => isset( $ind['icon_svg'] ) ? (string) $ind['icon_svg'] : '',
				];
			}

			$case = isset( $item['case_study'] ) && is_array( $item['case_study'] ) ? $item['case_study'] : [];

			return [
				'industries_header_title' => self::s( $item, 'industries_header_title', 'Industries We Serve' ),
				'industries_browse_href'  => self::u( $item, 'industries_browse_href', '#' ),
				'industries'              => $industries,
				'case_study'              => [
					'image_url' => self::u( $case, 'image_url', '' ),
					'tag'       => self::s( $case, 'tag', 'Case Studies' ),
					'title'     => self::s( $case, 'title', '' ),
					'cta_label' => self::s( $case, 'cta_label', '' ),
					'cta_href'  => self::u( $case, 'cta_href', '#' ),
				],
			];
		}

		private static function normalize_platform( $item ) {
			$cards = [];
			foreach ( self::arr( $item, 'platform_cards' ) as $card ) {
				$list_style = self::s( $card, 'list_style', 'simple' );
				if ( ! in_array( $list_style, [ 'simple', 'timeline' ], true ) ) {
					$list_style = 'simple';
				}
				$cards[] = [
					'image_url'   => self::u( $card, 'image_url', '' ),
					'title'       => self::s( $card, 'title', '' ),
					'description' => self::txt( $card, 'description', '' ),
					'links'       => self::normalize_links( $card, 'links' ),
					'list_style'  => $list_style,
					'cta_label'   => self::s( $card, 'cta_label', '' ),
					'cta_href'    => self::u( $card, 'cta_href', '#' ),
				];
			}

			return [ 'platform_cards' => $cards ];
		}

		private static function normalize_resources( $item ) {
			$sections = [];
			foreach ( self::arr( $item, 'resource_sections' ) as $sec ) {
				$link_style = self::s( $sec, 'link_style', 'simple' );
				if ( ! in_array( $link_style, [ 'simple', 'service' ], true ) ) {
					$link_style = 'simple';
				}

				$service_items = [];
				foreach ( self::arr( $sec, 'service_items' ) as $svc ) {
					$service_items[] = [
						'title' => self::s( $svc, 'title', '' ),
						'desc'  => self::txt( $svc, 'desc', '' ),
						'href'  => self::u( $svc, 'href', '#' ),
					];
				}

				$sections[] = [
					'section_title' => self::s( $sec, 'section_title', '' ),
					'link_style'    => $link_style,
					'links'         => self::normalize_links( $sec, 'links' ),
					'service_items' => $service_items,
					'footer_label'  => self::s( $sec, 'footer_label', '' ),
					'footer_href'   => self::u( $sec, 'footer_href', '' ),
				];
			}

			return [ 'resource_sections' => $sections ];
		}

		private static function normalize_about( $item ) {
			$groups = [];
			foreach ( self::arr( $item, 'about_link_groups' ) as $group ) {
				$groups[] = [
					'group_title' => self::s( $group, 'group_title', '' ),
					'links'       => self::normalize_links( $group, 'links' ),
				];
			}

			return [
				'about_banner_image_url' => self::u( $item, 'about_banner_image_url', '' ),
				'about_banner_title'     => self::s( $item, 'about_banner_title', '' ),
				'about_banner_desc'      => self::txt( $item, 'about_banner_desc', '' ),
				'about_link_groups'      => $groups,
			];
		}

		/* -------- 归一化小工具 -------- */

		private static function arr( $data, $key ) {
			$value = isset( $data[ $key ] ) ? $data[ $key ] : [];
			return is_array( $value ) ? array_values( $value ) : [];
		}

		private static function s( $data, $key, $default ) {
			return isset( $data[ $key ] ) ? sanitize_text_field( (string) $data[ $key ] ) : $default;
		}

		private static function txt( $data, $key, $default ) {
			return isset( $data[ $key ] ) ? sanitize_textarea_field( (string) $data[ $key ] ) : $default;
		}

		private static function u( $data, $key, $default ) {
			return isset( $data[ $key ] ) ? esc_url_raw( trim( (string) $data[ $key ] ) ) : $default;
		}

		private static function normalize_links( $data, $key ) {
			$links = [];
			foreach ( self::arr( $data, $key ) as $link ) {
				$links[] = [
					'label' => self::s( $link, 'label', '' ),
					'href'  => self::u( $link, 'href', '#' ),
				];
			}

			return $links;
		}

		/* ================================ 渲染 ================================ */

		/**
		 * 前端模板函数入口。
		 */
		public static function render() {
			$content = self::get_content();
			$logo_url = $content['logo_url'] !== '' ? $content['logo_url'] : ( function_exists( 'mtf_get_logo' ) ? mtf_get_logo() : '' );
			$cta_text = $content['cta_text'];
			$cta_href = $content['cta_href'];
			$nav_items = $content['nav_items'];
			$site_name = get_bloginfo( 'name' );

			// 顶部公告条
			$top_announcement = $content['top_announcement'];
			$top_cta_title    = $content['top_cta_title'];
			$top_cta_href     = $content['top_cta_href'];

			// GTranslate 语言列表：插件未激活时不渲染语言选择器
			$lang_list_html = '';
			if ( shortcode_exists( 'gtranslate' ) ) {
				$lang_list_html = do_shortcode( '[gtranslate widget_look="lang_names"]' );
			}
			?>
			<div class="rd-header" data-rd-header>
			<div class="rd-header__top">
				<div class="rd-header__top-banner">
					<div class="rd-header__top-spacer"></div>
					<p class="rd-header__top-text"><?php echo esc_html( $top_announcement ); ?><a href="<?php echo esc_url( $top_cta_href ); ?>"><?php echo esc_html( $top_cta_title ); ?> →</a></p>
					<div class="rd-header__top-utils">
						<?php if ( $lang_list_html !== '' ) : ?>
							<div class="rd-header__lang">
								<button type="button" class="rd-header__lang-btn" aria-haspopup="true" aria-expanded="false">
									<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"></path><path d="M2 12H22"></path><path d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22C9.49872 19.2616 8.07725 15.708 8 12C8.07725 8.29203 9.49872 4.73835 12 2Z"></path></svg>
									<span class="rd-header__lang-current">EN</span>
									<span class="rd-header__lang-caret">▾</span>
								</button>
								<div class="rd-header__lang-menu">
									<?php echo $lang_list_html; // do_shortcode 结果，插件自身输出已转义 ?>
								</div>
							</div>
						<?php endif; ?>
						<a class="rd-header__top-login" href="https://app.rapiddirect.com/" target="_blank" rel="noopener">
							<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21"></path><path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"></path></svg>
							Log in
						</a>
					</div>
				</div>
			</div>
			<nav class="rd-header__navbar">
				<a class="rd-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php if ( $logo_url ) : ?>
						<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $site_name ); ?>">
					<?php endif; ?>
				</a>

				<button class="rd-header__toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
					<svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16M4 12h16m-7 6h7"></path></svg>
				</button>

				<ul class="rd-header__nav">
					<?php foreach ( $nav_items as $item ) : ?>
						<li class="rd-header__item has-dropdown">
							<a class="rd-header__label" href="#" aria-expanded="false"><?php echo esc_html( $item['label'] ); ?></a>
							<div class="rd-header__mega">
								<?php
								switch ( $item['mega_type'] ) {
									case 'capabilities':
										self::render_mega_capabilities( $item );
										break;
									case 'solutions':
										self::render_mega_solutions( $item );
										break;
									case 'industries':
										self::render_mega_industries( $item );
										break;
									case 'platform':
										self::render_mega_platform( $item );
										break;
									case 'resources':
										self::render_mega_resources( $item );
										break;
									case 'about':
										self::render_mega_about( $item );
										break;
								}
								?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="rd-header__actions">
					<a class="rd-header__cta btn-quote" href="<?php echo esc_url( $cta_href ); ?>"><?php echo esc_html( $cta_text ); ?></a>
				</div>
			</nav>
			</div>
			<?php
		}

		public static function shortcode() {
			ob_start();
			self::render();

			return ob_get_clean();
		}

		/* -------- Capabilities -------- */

		private static function render_mega_capabilities( $item ) {
			$sections = $item['sections'];
			$footer = $item['footer'];
			// 展平所有 tab，用于面板与右侧图片
			$all_tabs = [];
			foreach ( $sections as $s_idx => $section ) {
				foreach ( $section['tabs'] as $t_idx => $tab ) {
					$key = $s_idx . '-' . $t_idx;
					$all_tabs[] = [
						'key'      => $key,
						'section'  => $s_idx,
						'tab'      => $t_idx,
						'tab_data' => $tab,
					];
				}
			}
			$first_key = isset( $all_tabs[0]['key'] ) ? $all_tabs[0]['key'] : '';
			?>
			<div class="menu-body menu-body-capabilities">
				<div class="cap-nav" role="tablist" aria-label="Capabilities services">
					<?php foreach ( $sections as $s_idx => $section ) : ?>
						<div class="cap-nav-section">
							<div class="cap-nav-label"><?php echo esc_html( $section['section_label'] ); ?></div>
							<div class="cap-nav-tabs">
								<?php foreach ( $section['tabs'] as $t_idx => $tab ) : ?>
									<?php
									$key = $s_idx . '-' . $t_idx;
									$is_active = ( $key === $first_key );
									?>
									<button
										type="button"
										class="cap-tab<?php echo $is_active ? ' is-active' : ''; ?><?php echo ! empty( $tab['is_muted'] ) ? ' is-muted' : ''; ?>"
										role="tab"
										aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
										data-cap-tab="<?php echo esc_attr( $key ); ?>"
									><?php echo esc_html( $tab['tab_label'] ); ?></button>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="cap-panels">
					<?php foreach ( $all_tabs as $idx => $entry ) : ?>
						<div class="cap-panel<?php echo ( $entry['key'] === $first_key ) ? ' is-active' : ''; ?>" role="tabpanel" data-cap-panel="<?php echo esc_attr( $entry['key'] ); ?>">
							<div class="cap-panel-top">
								<div class="cap-panel-title"><?php echo esc_html( $entry['tab_data']['tab_label'] ); ?></div>
							</div>
							<ul class="cap-card-grid">
								<?php foreach ( $entry['tab_data']['cards'] as $card ) : ?>
									<li><a class="cap-service-card" href="<?php echo esc_url( $card['href'] ); ?>"><?php echo esc_html( $card['label'] ); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endforeach; ?>

					<div class="cap-footer">
						<div class="cap-footer-actions">
							<a class="cap-footer-browse" href="<?php echo esc_url( $footer['browse_all_href'] ); ?>">Browse all capabilities →</a>
							<a class="cap-footer-quote" href="<?php echo esc_url( $footer['get_quote_href'] ); ?>">Get Instant Quote →</a>
						</div>
					</div>
				</div>

				<div class="cap-visual" aria-hidden="true">
					<?php foreach ( $all_tabs as $entry ) : ?>
						<?php if ( $entry['tab_data']['image_url'] !== '' ) : ?>
							<img
								class="cap-visual-img<?php echo ( $entry['key'] === $first_key ) ? ' is-active' : ''; ?>"
								data-cap-visual="<?php echo esc_attr( $entry['key'] ); ?>"
								src="<?php echo esc_url( $entry['tab_data']['image_url'] ); ?>"
								alt=""
								loading="lazy"
							>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
			<?php
		}

		/* -------- Solutions -------- */

		private static function render_mega_solutions( $item ) {
			$tabs = $item['tabs'];
			?>
			<div class="menu-body menu-body-solutions">
				<div class="sol-nav" role="tablist" aria-label="Solutions categories">
					<div class="sol-tabs">
						<?php foreach ( $tabs as $t_idx => $tab ) : ?>
							<button
								type="button"
								class="sol-tab<?php echo ( $t_idx === 0 ) ? ' is-active' : ''; ?>"
								role="tab"
								aria-selected="<?php echo ( $t_idx === 0 ) ? 'true' : 'false'; ?>"
								data-sol-tab="<?php echo esc_attr( (string) $t_idx ); ?>"
							><?php echo esc_html( $tab['tab_label'] ); ?></button>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="sol-panels">
					<?php foreach ( $tabs as $t_idx => $tab ) : ?>
						<div class="sol-panel sol-panel-<?php echo esc_attr( $tab['panel_style'] ); ?><?php echo ( $t_idx === 0 ) ? ' is-active' : ''; ?>" role="tabpanel" data-sol-panel="<?php echo esc_attr( (string) $t_idx ); ?>">
							<div class="sol-panel-top">
								<div class="sol-panel-title"><?php echo esc_html( $tab['tab_label'] ); ?></div>
							</div>
							<?php if ( $tab['panel_desc'] !== '' ) : ?>
								<p class="sol-panel-desc"><?php echo esc_html( $tab['panel_desc'] ); ?></p>
							<?php endif; ?>
							<div class="sol-panel-body">
								<?php if ( $tab['panel_style'] === 'timeline' ) : ?>
									<ul class="sol-stage-list">
										<?php foreach ( $tab['steps'] as $s_idx => $step ) : ?>
											<li>
												<a href="<?php echo esc_url( $step['href'] ); ?>" class="sol-stage-item sol-stage-link">
													<div class="sol-stage-index"><span><?php echo esc_html( (string) ( $s_idx + 1 ) ); ?></span></div>
													<div class="sol-stage-content">
														<div class="sol-stage-title"><?php echo esc_html( $step['title'] ); ?></div>
														<?php if ( $step['desc'] !== '' ) : ?>
															<div class="sol-stage-desc"><?php echo esc_html( $step['desc'] ); ?></div>
														<?php endif; ?>
													</div>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php else : ?>
									<ul class="sol-service-grid">
										<?php foreach ( $tab['cards'] as $card ) : ?>
											<li><a href="<?php echo esc_url( $card['href'] ); ?>" class="sol-service-link"><?php echo esc_html( $card['label'] ); ?></a></li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
							<div class="sol-footer">
								<?php if ( $tab['cta1_label'] !== '' ) : ?>
									<a href="<?php echo esc_url( $tab['cta1_href'] ); ?>" class="sol-footer-primary"><?php echo esc_html( $tab['cta1_label'] ); ?> →</a>
								<?php endif; ?>
								<a href="<?php echo esc_url( $tab['cta2_href'] ); ?>" class="sol-footer-secondary">Get Instant Quote →</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="sol-aside">
					<div class="sol-visual" aria-hidden="true">
						<?php foreach ( $tabs as $t_idx => $tab ) : ?>
							<?php if ( $tab['image_url'] !== '' ) : ?>
								<img
									class="sol-visual-img<?php echo ( $t_idx === 0 ) ? ' is-active' : ''; ?>"
									data-sol-visual="<?php echo esc_attr( (string) $t_idx ); ?>"
									src="<?php echo esc_url( $tab['image_url'] ); ?>"
									alt=""
									loading="lazy"
								>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<?php
		}

		/* -------- Industries -------- */

		private static function render_mega_industries( $item ) {
			$industries = $item['industries'];
			$case = $item['case_study'];
			?>
			<div class="menu-body menu-body-industries">
				<div class="industries-main">
					<div class="industries-header">
						<div class="industries-title"><?php echo esc_html( $item['industries_header_title'] ); ?></div>
						<a href="<?php echo esc_url( $item['industries_browse_href'] ); ?>" class="industries-browse">Browse all industries →</a>
					</div>
					<ul class="industry-grid">
						<?php foreach ( $industries as $ind ) : ?>
							<li>
								<a href="<?php echo esc_url( $ind['href'] ); ?>" class="industry-link">
									<?php if ( $ind['icon_svg'] !== '' ) : ?>
										<?php echo self::svg_kses( $ind['icon_svg'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									<?php endif; ?>
									<span class="industry-link-text"><?php echo esc_html( $ind['label'] ); ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="industries-aside">
					<div class="industries-castudies">
						<?php if ( $case['image_url'] !== '' ) : ?>
							<img class="industries-castudies-img" src="<?php echo esc_url( $case['image_url'] ); ?>" alt="" loading="lazy">
						<?php endif; ?>
						<div class="industries-castudies-overlay">
							<?php if ( $case['tag'] !== '' ) : ?>
								<div class="industries-castudies-label"><?php echo esc_html( $case['tag'] ); ?></div>
							<?php endif; ?>
							<?php if ( $case['title'] !== '' ) : ?>
								<div class="industries-castudies-copy">
									<div class="industries-castudies-title"><?php echo esc_html( $case['title'] ); ?></div>
								</div>
							<?php endif; ?>
							<?php if ( $case['cta_label'] !== '' ) : ?>
								<a href="<?php echo esc_url( $case['cta_href'] ); ?>" class="industries-castudies-cta"><?php echo esc_html( $case['cta_label'] ); ?> →</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php
		}

		/* -------- Platform -------- */

		private static function render_mega_platform( $item ) {
			$cards = $item['platform_cards'];
			?>
			<div class="menu-body menu-body-platform">
				<?php foreach ( $cards as $card ) : ?>
					<div class="platform-card">
						<?php if ( $card['image_url'] !== '' ) : ?>
							<div class="platform-shot" aria-hidden="true">
								<img class="platform-shot-img" src="<?php echo esc_url( $card['image_url'] ); ?>" alt="" loading="lazy">
							</div>
						<?php endif; ?>
						<div class="category-title"><?php echo esc_html( $card['title'] ); ?></div>
						<?php if ( $card['description'] !== '' ) : ?>
							<p class="platform-desc"><?php echo esc_html( $card['description'] ); ?></p>
						<?php endif; ?>
						<?php if ( $card['list_style'] === 'timeline' ) : ?>
							<ul class="timeline-list">
								<?php foreach ( $card['links'] as $link ) : ?>
									<li>
										<a href="<?php echo esc_url( $link['href'] ); ?>">
											<span class="timeline-title"><?php echo esc_html( $link['label'] ); ?></span>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php else : ?>
							<ul class="menu-list platform-links">
								<?php foreach ( $card['links'] as $link ) : ?>
									<li><a href="<?php echo esc_url( $link['href'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<?php if ( $card['list_style'] === 'timeline' && $card['cta_label'] !== '' ) : ?>
							<a href="<?php echo esc_url( $card['cta_href'] ); ?>" class="btn-ai"><?php echo esc_html( $card['cta_label'] ); ?></a>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
			<?php
		}

		/* -------- Resources -------- */

		private static function render_mega_resources( $item ) {
			$sections = $item['resource_sections'];
			?>
			<div class="menu-body menu-body-resources">
				<?php foreach ( $sections as $section ) : ?>
					<div class="resources-section">
						<div class="category-title"><?php echo esc_html( $section['section_title'] ); ?></div>
						<?php if ( $section['link_style'] === 'service' ) : ?>
							<div class="materials-service">
								<?php foreach ( $section['service_items'] as $svc ) : ?>
									<a href="<?php echo esc_url( $svc['href'] ); ?>" class="service-item">
										<span class="service-title"><?php echo esc_html( $svc['title'] ); ?></span>
										<?php if ( $svc['desc'] !== '' ) : ?>
											<span class="service-desc"><?php echo esc_html( $svc['desc'] ); ?></span>
										<?php endif; ?>
									</a>
								<?php endforeach; ?>
							</div>
						<?php else : ?>
							<ul class="menu-list">
								<?php foreach ( $section['links'] as $link ) : ?>
									<li><a href="<?php echo esc_url( $link['href'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<?php if ( $section['footer_label'] !== '' ) : ?>
							<a href="<?php echo esc_url( $section['footer_href'] ); ?>" class="link-explore"><?php echo esc_html( $section['footer_label'] ); ?> →</a>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
			<?php
		}

		/* -------- About -------- */

		private static function render_mega_about( $item ) {
			$groups = $item['about_link_groups'];
			?>
			<div class="menu-banner"<?php echo $item['about_banner_image_url'] !== '' ? ' style="background-image:url(' . esc_url( $item['about_banner_image_url'] ) . ')"' : ''; ?>>
				<div class="menu-banner-content">
					<h2 class="menu-banner-title"><?php echo esc_html( $item['about_banner_title'] ); ?></h2>
					<?php if ( $item['about_banner_desc'] !== '' ) : ?>
						<p class="menu-banner-desc"><?php echo esc_html( $item['about_banner_desc'] ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="menu-body rd-header__about-body">
				<?php foreach ( $groups as $group ) : ?>
					<div>
						<div class="category-title"><?php echo esc_html( $group['group_title'] ); ?></div>
						<ul class="menu-list">
							<?php foreach ( $group['links'] as $link ) : ?>
								<li><a href="<?php echo esc_url( $link['href'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>
			</div>
			<?php
		}

		/* ================================ 安全 ================================ */

		/**
		 * 内联 SVG 白名单过滤（后台管理员输入 icon_svg 用）。
		 */
		public static function svg_kses( $svg ) {
			$allowed = [
				'svg'     => [
					'viewbox' => true, 'xmlns' => true, 'class' => true, 'width' => true, 'height' => true,
					'fill' => true, 'stroke' => true, 'stroke-width' => true,
					'stroke-linecap' => true, 'stroke-linejoin' => true, 'aria-hidden' => true,
				],
				'g'       => [ 'fill' => true, 'stroke' => true, 'transform' => true, 'opacity' => true ],
				'path'    => [
					'd' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true,
					'stroke-linecap' => true, 'stroke-linejoin' => true,
				],
				'circle'  => [ 'cx' => true, 'cy' => true, 'r' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true ],
				'rect'    => [ 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true, 'fill' => true, 'stroke' => true ],
				'line'    => [ 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true, 'stroke' => true, 'stroke-width' => true ],
				'polyline'=> [ 'points' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true ],
				'polygon' => [ 'points' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true ],
				'defs'    => [],
				'use'     => [ 'href' => true, 'xlink:href' => true, 'x' => true, 'y' => true, 'width' => true, 'height' => true ],
			];

			return wp_kses( $svg, $allowed );
		}
	}

	/**
	 * header.php 模板函数入口。
	 */
	function mml_theme_fn_render_site_header() {
		RD_Site_Header::render();
	}

	RD_Site_Header::init();
}
