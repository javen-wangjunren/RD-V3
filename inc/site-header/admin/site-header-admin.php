<?php
/**
 * RD Site Header — 后台编辑页
 *
 * 复刻 设计稿/header.md 的后台编辑器布局逻辑：
 * 折叠卡片 / 计数徽标 / 添加删除 / 排序（仅 Capabilities Section·Tab 与 Solutions Tab）/ 条件渲染。
 * 表单命名 rd_site_header[...]；JS 模板占位符 __i__（提交后由 normalize 的 array_values 压缩索引）。
 *
 * @package mml-theme
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Site_Header_Admin' ) ) {

	class RD_Site_Header_Admin {

		const MENU_SLUG = 'rd-site-header';

		public static function init() {
			add_action( 'admin_menu', [ __CLASS__, 'register_menu' ] );
			add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueue_assets' ] );
		}

		public static function register_menu() {
			add_menu_page(
				'RD Site Header',
				'RD Site Header',
				'manage_options',
				self::MENU_SLUG,
				[ __CLASS__, 'render_page' ],
				'dashicons-menu',
				4
			);
		}

		public static function enqueue_assets( $hook ) {
			if ( 'toplevel_page_' . self::MENU_SLUG !== $hook ) {
				return;
			}
			$file    = get_template_directory() . '/inc/site-header/assets/site-header-admin.js';
			$version = is_file( $file ) ? (string) filemtime( $file ) : '0.1';
			wp_enqueue_script( 'rd-site-header-admin', get_template_directory_uri() . '/inc/site-header/assets/site-header-admin.js', [], $version, true );
		}

		/* ================================ 页面 ================================ */

		public static function render_page() {
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}

			$saved = false;
			$diag  = '';
			if ( isset( $_POST['rd_site_header_submit'] ) && check_admin_referer( 'rd_site_header_save', 'rd_site_header_nonce' ) ) {
				$raw        = isset( $_POST['rd_site_header'] ) && is_array( $_POST['rd_site_header'] ) ? wp_unslash( $_POST['rd_site_header'] ) : [];
				$normalized = RD_Site_Header::normalize( (array) $raw );
				update_option( RD_Site_Header::OPTION_KEY, $normalized );
				$readback = RD_Site_Header::get_content();
				// #region debug-point A/B/C/D:save-digest
				$digest = function ( $data ) {
					$leaves = 0;
					$per    = [];
					$cards_detail = [];
					if ( isset( $data['nav_items'] ) && is_array( $data['nav_items'] ) ) {
						foreach ( $data['nav_items'] as $ni ) {
							$sub  = 0;
							$walk = function ( $d ) use ( &$walk, &$sub ) {
								if ( is_array( $d ) ) {
									foreach ( $d as $v ) {
										$walk( $v );
									}
								} else {
									$sub++;
								}
							};
							$walk( $ni );
							$leaves += $sub;
							$per[]   = 'nav=' . $sub;

							// 按 section → tab 统计 cards 条数
							if ( isset( $ni['sections'] ) && is_array( $ni['sections'] ) ) {
								foreach ( $ni['sections'] as $si => $sec ) {
									$slabel = isset( $sec['section_label'] ) ? substr( $sec['section_label'], 0, 12 ) : 'sec' . $si;
									if ( isset( $sec['tabs'] ) && is_array( $sec['tabs'] ) ) {
										foreach ( $sec['tabs'] as $ti => $tab ) {
											$tlabel = isset( $tab['tab_label'] ) ? substr( $tab['tab_label'], 0, 10 ) : 'tab' . $ti;
											$c = isset( $tab['cards'] ) && is_array( $tab['cards'] ) ? count( $tab['cards'] ) : 0;
											$cards_detail[] = $slabel . '/' . $tlabel . ':' . $c;
										}
									}
								}
							}
						}
					}

					return [ 'leaves' => $leaves, 'per' => $per, 'cards' => $cards_detail ];
				};
				$d_raw  = $digest( $raw );
				$d_norm = $digest( $normalized );
				$d_back = $digest( $readback );
				$diag   = 'RAW leaves=' . $d_raw['leaves'] . ' | NORM leaves=' . $d_norm['leaves'] . ' | READBACK leaves=' . $d_back['leaves']
					. "\nRAW cards: " . implode( ', ', $d_raw['cards'] )
					. "\nNORM cards: " . implode( ', ', $d_norm['cards'] )
					. "\nREADBACK cards: " . implode( ', ', $d_back['cards'] );
				error_log( '[DEBUG header-save-card-loss] ' . str_replace( "\n", ' | ', $diag ) );
				// #endregion
				$saved = true;
			}

			$content   = RD_Site_Header::get_content();
			$nav_items = $content['nav_items'];

			echo '<div class="wrap rd-header-admin">';
			echo '<h1>RD Site Header</h1>';
			echo '<p>内容契约对齐 <code>设计稿/header.md</code>：单 option 存储，前台 <code>rd-header</code> 渲染。</p>';
			if ( $saved ) {
				echo '<div class="notice notice-success is-dismissible"><p>Header 已保存。</p></div>';
			}
			// #region debug-point A/B/C/D:page-digest
			if ( $diag !== '' ) {
				echo '<div class="notice notice-info"><pre style="white-space:pre-wrap;max-height:400px;overflow:auto;">' . esc_html( $diag ) . '</pre></div>';
			}
			// #endregion

			echo '<form method="post" action="">';
			wp_nonce_field( 'rd_site_header_save', 'rd_site_header_nonce' );

			/* ---------- Card 1: Brand & CTA ---------- */
			echo '<div class="rd-card rd-card-open">';
			echo '<div class="rd-card-head"><h2>Brand &amp; CTA</h2></div>';
			echo '<div class="rd-card-body">';
			echo '<div class="rd-fields">';
			self::field( 'Logo URL', self::text_input( 'rd_site_header[logo_url]', $content['logo_url'], '留空则使用主题 Logo' ) );
			self::field( 'CTA 文案', self::text_input( 'rd_site_header[cta_text]', $content['cta_text'] ) );
			self::field( 'CTA 链接', self::text_input( 'rd_site_header[cta_href]', $content['cta_href'] ) );
			echo '</div></div></div>';

			/* ---------- Card 2: Nav Items ---------- */
			echo '<div class="rd-card rd-card-open">';
			echo '<div class="rd-card-head"><h2>Nav Items</h2></div>';
			echo '<div class="rd-card-body">';
			echo '<div class="rd-repeater" data-rd-repeater>';
			echo '<div class="rd-repeater-rows">';
			foreach ( $nav_items as $i => $item ) {
				echo self::nav_item_card_html( (string) $i, $item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			echo '</div>';
			echo '<template data-rd-template>';
			echo self::nav_item_card_html( '__i__', [] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '</template>';
			echo '<p><button type="button" class="button rd-add" data-rd-add>添加 Nav Item</button></p>';
			echo '</div>';
			echo '</div></div>';

			echo '<p class="submit">';
			echo '<button type="submit" class="button button-primary button-large" name="rd_site_header_submit" value="1">保存 Header</button>';
			echo '</p>';
			echo '</form></div>';

			self::admin_styles();
		}

		/* ================================ 表单小工具 ================================ */

		private static function field( $label, $input ) {
			echo '<div class="rd-field"><div class="rd-field-label">' . esc_html( $label ) . '</div><div class="rd-field-input">' . $input . '</div></div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		private static function text_input( $name, $value, $placeholder = '' ) {
			return '<input type="text" class="regular-text" name="' . esc_attr( $name ) . '" value="' . esc_attr( $value ) . '"' . ( $placeholder !== '' ? ' placeholder="' . esc_attr( $placeholder ) . '"' : '' ) . '>';
		}

		private static function textarea_input( $name, $value, $rows = 3 ) {
			return '<textarea class="large-text" rows="' . esc_attr( (string) $rows ) . '" name="' . esc_attr( $name ) . '">' . esc_textarea( $value ) . '</textarea>';
		}

		private static function select_input( $name, $value, $options, $extra = '' ) {
			$html = '<select name="' . esc_attr( $name ) . '"' . ( $extra !== '' ? ' ' . $extra : '' ) . '>';
			foreach ( $options as $val => $label ) {
				$html .= '<option value="' . esc_attr( $val ) . '"' . selected( $value, $val, false ) . '>' . esc_html( $label ) . '</option>';
			}
			$html .= '</select>';

			return $html;
		}

		private static function checkbox_input( $name, $checked, $label ) {
			return '<label class="rd-checkbox"><input type="checkbox" name="' . esc_attr( $name ) . '" value="1"' . checked( $checked, true, false ) . '> ' . esc_html( $label ) . '</label>';
		}

		/* ================================ 折叠卡片 ================================ */

		private static function collapse_open( $title_html, $extra_class = '' ) {
			echo '<div class="rd-collapse' . ( $extra_class !== '' ? ' ' . $extra_class : '' ) . '">';
			echo '<div class="rd-collapse-head" data-rd-collapse-head><span class="rd-collapse-title">' . $title_html . '</span><span class="rd-collapse-arrow">▾</span></div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<div class="rd-collapse-body">';
		}

		private static function collapse_close() {
			echo '</div></div>';
		}

		/* ================================ Repeater ================================ */

		/**
		 * 通用 repeater 组：标题+计数+添加按钮、行容器、模板。
		 */
		private static function repeater( $title, $prefix, $rows, $row_html_cb, $template_cb, $sortable = false, $empty_default = [] ) {
			$count = count( $rows );
			echo '<div class="rd-repeater" data-rd-repeater' . ( $sortable ? ' data-rd-sortable' : '' ) . '>';
			echo '<div class="rd-repeater-head"><span class="rd-repeater-title">' . esc_html( $title ) . ' <span class="rd-count" data-rd-count>' . esc_html( (string) $count ) . '</span></span>';
			echo '<button type="button" class="button rd-add" data-rd-add>添加</button></div>';
			echo '<div class="rd-repeater-rows">';
			foreach ( $rows as $i => $row ) {
				echo call_user_func( $row_html_cb, $prefix . '[' . (string) $i . ']', $row ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			echo '</div>';
			echo '<template data-rd-template>';
			echo call_user_func( $template_cb, $prefix . '[__i__]', $empty_default ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '</template>';
			echo '</div>';
		}

		/**
		 * 一行内部小 repeater（links/cards/steps 等，行本身不折叠）。
		 */
		private static function repeater_plain( $title, $prefix, $rows, $row_html_cb, $empty_default = [] ) {
			self::repeater( $title, $prefix, $rows, $row_html_cb, $row_html_cb, false, $empty_default );
		}

		private static function sort_controls() {
			return '<span class="rd-sort-controls"><button type="button" class="button rd-sort" data-rd-sort="up" title="上移">↑</button><button type="button" class="button rd-sort" data-rd-sort="down" title="下移">↓</button></span>';
		}

		/* ================================ Nav Item 卡片 ================================ */

		private static function nav_item_card_html( $idx, $item ) {
			$label  = isset( $item['label'] ) ? $item['label'] : '';
			$type   = isset( $item['mega_type'] ) ? $item['mega_type'] : 'capabilities';
			$prefix = 'rd_site_header[nav_items][' . $idx . ']';

			$type_names = [
				'capabilities' => 'Capabilities',
				'solutions'    => 'Solutions',
				'industries'   => 'Industries',
				'platform'     => 'Platform',
				'resources'    => 'Resources',
				'about'        => 'About',
			];

			$open = ( $idx === '0' ) ? ' rd-collapse-open' : '';
			ob_start();
			self::collapse_open(
				'<span class="rd-nav-title">' . esc_html( $label !== '' ? $label : '(未命名)' ) . '</span> <span class="rd-nav-type">' . ( isset( $type_names[ $type ] ) ? esc_html( $type_names[ $type ] ) : esc_html( $type ) ) . '</span>',
				$open
			);
			echo '<div class="rd-fields">';
			self::field( 'Label', self::text_input( $prefix . '[label]', $label ) );
			self::field(
				'Mega Type',
				self::select_input(
					$prefix . '[mega_type]',
					$type,
					[
						'capabilities' => 'Capabilities',
						'solutions'    => 'Solutions',
						'industries'   => 'Industries',
						'platform'     => 'Platform',
						'resources'    => 'Resources',
						'about'        => 'About',
					]
				)
			);
			echo '</div>';

			switch ( $type ) {
				case 'capabilities':
					self::render_capabilities( $prefix, $item );
					break;
				case 'solutions':
					self::render_solutions( $prefix, $item );
					break;
				case 'industries':
					self::render_industries( $prefix, $item );
					break;
				case 'platform':
					self::render_platform( $prefix, $item );
					break;
				case 'resources':
					self::render_resources( $prefix, $item );
					break;
				case 'about':
					self::render_about( $prefix, $item );
					break;
			}

			echo '<p class="rd-row-actions"><button type="button" class="button rd-remove" data-rd-remove>删除</button></p>';
			self::collapse_close();

			return ob_get_clean();
		}

		/* ---------- Capabilities ---------- */

		private static function render_capabilities( $prefix, $item ) {
			$sections = isset( $item['sections'] ) && is_array( $item['sections'] ) ? $item['sections'] : [];
			$footer   = isset( $item['footer'] ) && is_array( $item['footer'] ) ? $item['footer'] : [];

			self::repeater(
				'Sections',
				$prefix . '[sections]',
				$sections,
				[ __CLASS__, 'cap_section_card' ],
				[ __CLASS__, 'cap_section_card' ],
				true,
				[]
			);

			echo '<div class="rd-card rd-card-sub">';
			echo '<div class="rd-card-head"><h3>Footer（固定文案：Browse all capabilities / Get Instant Quote）</h3></div>';
			echo '<div class="rd-card-body"><div class="rd-fields">';
			self::field( 'Browse All Href', self::text_input( $prefix . '[footer][browse_all_href]', isset( $footer['browse_all_href'] ) ? $footer['browse_all_href'] : '#' ) );
			self::field( 'Get Quote Href', self::text_input( $prefix . '[footer][get_quote_href]', isset( $footer['get_quote_href'] ) ? $footer['get_quote_href'] : '#' ) );
			echo '</div></div></div>';
		}

		private static function cap_section_card( $sec_prefix, $sec ) {
			$label = isset( $sec['section_label'] ) ? $sec['section_label'] : '';
			$tabs  = isset( $sec['tabs'] ) && is_array( $sec['tabs'] ) ? $sec['tabs'] : [];

			ob_start();
			self::collapse_open( esc_html( $label !== '' ? $label : '(未命名 Section)' ) . ' ' . self::sort_controls(), 'rd-collapse-open' );
			echo '<div class="rd-fields">';
			self::field( 'Section Label', self::text_input( $sec_prefix . '[section_label]', $label ) );
			echo '</div>';

			self::repeater(
				'Tabs',
				$sec_prefix . '[tabs]',
				$tabs,
				[ __CLASS__, 'cap_tab_card' ],
				[ __CLASS__, 'cap_tab_card' ],
				true,
				[]
			);

			self::collapse_close();

			return ob_get_clean();
		}

		private static function cap_tab_card( $tab_prefix, $tab ) {
			$tab_label = isset( $tab['tab_label'] ) ? $tab['tab_label'] : '';
			$image     = isset( $tab['image_url'] ) ? $tab['image_url'] : '';
			$muted     = ! empty( $tab['is_muted'] );
			$cards     = isset( $tab['cards'] ) && is_array( $tab['cards'] ) ? $tab['cards'] : [];

			ob_start();
			self::collapse_open( esc_html( $tab_label !== '' ? $tab_label : '(未命名 Tab)' ) . ' ' . self::sort_controls(), 'rd-collapse-open' );
			echo '<div class="rd-fields">';
			self::field( 'Tab Label', self::text_input( $tab_prefix . '[tab_label]', $tab_label ) );
			self::field( 'Image URL（右侧联动图）', self::text_input( $tab_prefix . '[image_url]', $image ) );
			self::field( '', self::checkbox_input( $tab_prefix . '[is_muted]', $muted, '灰显（is_muted）' ) );
			echo '</div>';

			self::repeater_plain(
				'Cards',
				$tab_prefix . '[cards]',
				$cards,
				[ __CLASS__, 'link_row' ]
			);

			self::collapse_close();

			return ob_get_clean();
		}

		/** 通用 link 行（label + href + 删除）。 */
		private static function link_row( $prefix, $row ) {
			$label = isset( $row['label'] ) ? $row['label'] : '';
			$href  = isset( $row['href'] ) ? $row['href'] : '#';
			$html  = '<div class="rd-repeater-row" data-rd-row><div class="rd-field-inline">';
			$html .= self::text_input( $prefix . '[label]', $label );
			$html .= self::text_input( $prefix . '[href]', $href, '链接' );
			$html .= '<button type="button" class="button rd-remove" data-rd-remove>删除</button>';
			$html .= '</div></div>';

			return $html;
		}

		/* ---------- Solutions ---------- */

		private static function render_solutions( $prefix, $item ) {
			$tabs = isset( $item['tabs'] ) && is_array( $item['tabs'] ) ? $item['tabs'] : [];

			self::repeater(
				'Tabs',
				$prefix . '[tabs]',
				$tabs,
				[ __CLASS__, 'sol_tab_card' ],
				[ __CLASS__, 'sol_tab_card' ],
				true,
				[]
			);
		}

		private static function sol_tab_card( $tab_prefix, $tab ) {
			$tab_label   = isset( $tab['tab_label'] ) ? $tab['tab_label'] : '';
			$panel_style = isset( $tab['panel_style'] ) ? $tab['panel_style'] : 'timeline';
			$panel_desc  = isset( $tab['panel_desc'] ) ? $tab['panel_desc'] : '';
			$steps       = isset( $tab['steps'] ) && is_array( $tab['steps'] ) ? $tab['steps'] : [];
			$cards       = isset( $tab['cards'] ) && is_array( $tab['cards'] ) ? $tab['cards'] : [];

			ob_start();
			self::collapse_open( esc_html( $tab_label !== '' ? $tab_label : '(未命名 Tab)' ) . ' ' . self::sort_controls(), 'rd-collapse-open' );
			echo '<div class="rd-fields">';
			self::field( 'Tab Label', self::text_input( $tab_prefix . '[tab_label]', $tab_label ) );
			self::field(
				'Panel Style',
				self::select_input(
					$tab_prefix . '[panel_style]',
					$panel_style,
					[ 'timeline' => 'Timeline', 'card' => 'Card' ],
					'data-rd-branch="panel_style"'
				)
			);
			self::field( '面板描述', self::textarea_input( $tab_prefix . '[panel_desc]', $panel_desc, 2 ) );
			echo '</div>';

			echo '<div data-rd-branch-block data-rd-branch-value="timeline">';
			self::repeater_plain(
				'Steps（序号按数组顺序自动渲染）',
				$tab_prefix . '[steps]',
				$steps,
				[ __CLASS__, 'step_row' ]
			);
			echo '</div>';

			echo '<div data-rd-branch-block data-rd-branch-value="card">';
			self::repeater_plain(
				'Cards',
				$tab_prefix . '[cards]',
				$cards,
				[ __CLASS__, 'link_row' ]
			);
			echo '</div>';

			echo '<div class="rd-fields">';
			self::field( 'CTA1 文案', self::text_input( $tab_prefix . '[cta1_label]', isset( $tab['cta1_label'] ) ? $tab['cta1_label'] : '' ) );
			self::field( 'CTA1 Href', self::text_input( $tab_prefix . '[cta1_href]', isset( $tab['cta1_href'] ) ? $tab['cta1_href'] : '#' ) );
			self::field( 'CTA2 Href（文案固定 "Get Instant Quote"）', self::text_input( $tab_prefix . '[cta2_href]', isset( $tab['cta2_href'] ) ? $tab['cta2_href'] : '#' ) );
			self::field( 'Image URL（右侧联动图）', self::text_input( $tab_prefix . '[image_url]', isset( $tab['image_url'] ) ? $tab['image_url'] : '' ) );
			echo '</div>';

			self::collapse_close();

			return ob_get_clean();
		}

		private static function step_row( $prefix, $row ) {
			$title = isset( $row['title'] ) ? $row['title'] : '';
			$desc  = isset( $row['desc'] ) ? $row['desc'] : '';
			$href  = isset( $row['href'] ) ? $row['href'] : '#';
			$html  = '<div class="rd-repeater-row" data-rd-row><div class="rd-fields">';
			$html .= self::field( 'Title', self::text_input( $prefix . '[title]', $title ) );
			$html .= self::field( '描述', self::textarea_input( $prefix . '[desc]', $desc, 2 ) );
			$html .= self::field( 'Href', self::text_input( $prefix . '[href]', $href ) );
			$html .= '<p class="rd-row-actions"><button type="button" class="button rd-remove" data-rd-remove>删除</button></p>';
			$html .= '</div></div>';

			return $html;
		}

		/* ---------- Industries ---------- */

		private static function render_industries( $prefix, $item ) {
			$industries = isset( $item['industries'] ) && is_array( $item['industries'] ) ? $item['industries'] : [];
			$case       = isset( $item['case_study'] ) && is_array( $item['case_study'] ) ? $item['case_study'] : [];

			echo '<div class="rd-fields">';
			self::field( '面板标题', self::text_input( $prefix . '[industries_header_title]', isset( $item['industries_header_title'] ) ? $item['industries_header_title'] : '' ) );
			self::field( 'Browse All Href（前缀文案固定）', self::text_input( $prefix . '[industries_browse_href]', isset( $item['industries_browse_href'] ) ? $item['industries_browse_href'] : '#' ) );
			echo '</div>';

			self::repeater_plain(
				'Industries（图标颜色前端固定主题橙）',
				$prefix . '[industries]',
				$industries,
				[ __CLASS__, 'industry_row' ]
			);

			echo '<div class="rd-card rd-card-sub">';
			echo '<div class="rd-card-head"><h3>Case Study（右侧案例卡片）</h3></div>';
			echo '<div class="rd-card-body"><div class="rd-fields">';
			self::field( 'Image URL', self::text_input( $prefix . '[case_study][image_url]', isset( $case['image_url'] ) ? $case['image_url'] : '' ) );
			self::field( 'Tag', self::text_input( $prefix . '[case_study][tag]', isset( $case['tag'] ) ? $case['tag'] : '' ) );
			self::field( 'Title', self::text_input( $prefix . '[case_study][title]', isset( $case['title'] ) ? $case['title'] : '' ) );
			self::field( 'CTA Label', self::text_input( $prefix . '[case_study][cta_label]', isset( $case['cta_label'] ) ? $case['cta_label'] : '' ) );
			self::field( 'CTA Href', self::text_input( $prefix . '[case_study][cta_href]', isset( $case['cta_href'] ) ? $case['cta_href'] : '#' ) );
			echo '</div></div></div>';
		}

		private static function industry_row( $prefix, $row ) {
			$label = isset( $row['label'] ) ? $row['label'] : '';
			$href  = isset( $row['href'] ) ? $row['href'] : '#';
			$svg   = isset( $row['icon_svg'] ) ? $row['icon_svg'] : '';
			$html  = '<div class="rd-repeater-row" data-rd-row><div class="rd-fields">';
			$html .= self::field( 'Name', self::text_input( $prefix . '[label]', $label ) );
			$html .= self::field( 'Href', self::text_input( $prefix . '[href]', $href ) );
			$html .= self::field( 'Icon SVG', self::textarea_input( $prefix . '[icon_svg]', $svg, 2 ) );
			$html .= '<p class="rd-row-actions"><button type="button" class="button rd-remove" data-rd-remove>删除</button></p>';
			$html .= '</div></div>';

			return $html;
		}

		/* ---------- Platform ---------- */

		private static function render_platform( $prefix, $item ) {
			$cards = isset( $item['platform_cards'] ) && is_array( $item['platform_cards'] ) ? $item['platform_cards'] : [];

			self::repeater_plain(
				'Cards',
				$prefix . '[platform_cards]',
				$cards,
				[ __CLASS__, 'platform_card_html' ]
			);
		}

		private static function platform_card_html( $card_prefix, $card ) {
			$title      = isset( $card['title'] ) ? $card['title'] : '';
			$image      = isset( $card['image_url'] ) ? $card['image_url'] : '';
			$desc       = isset( $card['description'] ) ? $card['description'] : '';
			$list_style = isset( $card['list_style'] ) ? $card['list_style'] : 'simple';
			$links      = isset( $card['links'] ) && is_array( $card['links'] ) ? $card['links'] : [];

			ob_start();
			echo '<div class="rd-card rd-card-sub rd-collapse-open">';
			echo '<div class="rd-card-head"><h3>' . esc_html( $title !== '' ? $title : '(未命名 Card)' ) . '</h3></div>';
			echo '<div class="rd-card-body">';
			echo '<div class="rd-fields">';
			self::field( 'Title', self::text_input( $card_prefix . '[title]', $title ) );
			self::field( 'Image URL（顶部截图）', self::text_input( $card_prefix . '[image_url]', $image ) );
			self::field( 'Description', self::textarea_input( $card_prefix . '[description]', $desc, 2 ) );
			self::field(
				'List Style',
				self::select_input(
					$card_prefix . '[list_style]',
					$list_style,
					[ 'simple' => 'Simple', 'timeline' => 'Timeline' ],
					'data-rd-branch="list_style"'
				)
			);
			echo '</div>';

			self::repeater_plain(
				'Links',
				$card_prefix . '[links]',
				$links,
				[ __CLASS__, 'link_row' ]
			);

			echo '<div data-rd-branch-block data-rd-branch-value="timeline"><div class="rd-fields">';
			self::field( 'CTA Label', self::text_input( $card_prefix . '[cta_label]', isset( $card['cta_label'] ) ? $card['cta_label'] : '' ) );
			self::field( 'CTA Href', self::text_input( $card_prefix . '[cta_href]', isset( $card['cta_href'] ) ? $card['cta_href'] : '#' ) );
			echo '</div></div>';

			echo '<p class="rd-row-actions"><button type="button" class="button rd-remove" data-rd-remove>删除</button></p>';
			echo '</div></div>';

			return ob_get_clean();
		}

		/* ---------- Resources ---------- */

		private static function render_resources( $prefix, $item ) {
			$sections = isset( $item['resource_sections'] ) && is_array( $item['resource_sections'] ) ? $item['resource_sections'] : [];

			self::repeater_plain(
				'Sections',
				$prefix . '[resource_sections]',
				$sections,
				[ __CLASS__, 'resource_section_card' ]
			);
		}

		private static function resource_section_card( $sec_prefix, $sec ) {
			$title      = isset( $sec['section_title'] ) ? $sec['section_title'] : '';
			$link_style = isset( $sec['link_style'] ) ? $sec['link_style'] : 'simple';
			$links      = isset( $sec['links'] ) && is_array( $sec['links'] ) ? $sec['links'] : [];
			$services   = isset( $sec['service_items'] ) && is_array( $sec['service_items'] ) ? $sec['service_items'] : [];

			ob_start();
			echo '<div class="rd-card rd-card-sub rd-collapse-open">';
			echo '<div class="rd-card-head"><h3>' . esc_html( $title !== '' ? $title : '(未命名 Section)' ) . '</h3></div>';
			echo '<div class="rd-card-body">';
			echo '<div class="rd-fields">';
			self::field( 'Title', self::text_input( $sec_prefix . '[section_title]', $title ) );
			self::field(
				'Style',
				self::select_input(
					$sec_prefix . '[link_style]',
					$link_style,
					[ 'simple' => 'Simple', 'service' => 'Service' ],
					'data-rd-branch="link_style"'
				)
			);
			echo '</div>';

			echo '<div data-rd-branch-block data-rd-branch-value="simple">';
			self::repeater_plain(
				'Links',
				$sec_prefix . '[links]',
				$links,
				[ __CLASS__, 'link_row' ]
			);
			echo '</div>';

			echo '<div data-rd-branch-block data-rd-branch-value="service">';
			self::repeater_plain(
				'Service Items',
				$sec_prefix . '[service_items]',
				$services,
				[ __CLASS__, 'service_row' ]
			);
			echo '</div>';

			echo '<div class="rd-fields">';
			self::field( 'Footer Label', self::text_input( $sec_prefix . '[footer_label]', isset( $sec['footer_label'] ) ? $sec['footer_label'] : '' ) );
			self::field( 'Footer Href', self::text_input( $sec_prefix . '[footer_href]', isset( $sec['footer_href'] ) ? $sec['footer_href'] : '' ) );
			echo '</div>';

			echo '<p class="rd-row-actions"><button type="button" class="button rd-remove" data-rd-remove>删除</button></p>';
			echo '</div></div>';

			return ob_get_clean();
		}

		private static function service_row( $prefix, $row ) {
			$title = isset( $row['title'] ) ? $row['title'] : '';
			$desc  = isset( $row['desc'] ) ? $row['desc'] : '';
			$href  = isset( $row['href'] ) ? $row['href'] : '#';
			$html  = '<div class="rd-repeater-row" data-rd-row><div class="rd-fields">';
			$html .= self::field( 'Title', self::text_input( $prefix . '[title]', $title ) );
			$html .= self::field( 'Description', self::textarea_input( $prefix . '[desc]', $desc, 2 ) );
			$html .= self::field( 'Href', self::text_input( $prefix . '[href]', $href ) );
			$html .= '<p class="rd-row-actions"><button type="button" class="button rd-remove" data-rd-remove>删除</button></p>';
			$html .= '</div></div>';

			return $html;
		}

		/* ---------- About ---------- */

		private static function render_about( $prefix, $item ) {
			$groups = isset( $item['about_link_groups'] ) && is_array( $item['about_link_groups'] ) ? $item['about_link_groups'] : [];

			echo '<div class="rd-fields">';
			self::field( 'Banner Image URL', self::text_input( $prefix . '[about_banner_image_url]', isset( $item['about_banner_image_url'] ) ? $item['about_banner_image_url'] : '' ) );
			self::field( 'Banner Title', self::text_input( $prefix . '[about_banner_title]', isset( $item['about_banner_title'] ) ? $item['about_banner_title'] : '' ) );
			self::field( 'Banner Description', self::textarea_input( $prefix . '[about_banner_desc]', isset( $item['about_banner_desc'] ) ? $item['about_banner_desc'] : '', 2 ) );
			echo '</div>';

			self::repeater_plain(
				'Link Groups',
				$prefix . '[about_link_groups]',
				$groups,
				[ __CLASS__, 'about_group_card' ]
			);
		}

		private static function about_group_card( $group_prefix, $group ) {
			$title = isset( $group['group_title'] ) ? $group['group_title'] : '';
			$links = isset( $group['links'] ) && is_array( $group['links'] ) ? $group['links'] : [];

			ob_start();
			echo '<div class="rd-card rd-card-sub rd-collapse-open">';
			echo '<div class="rd-card-head"><h3>' . esc_html( $title !== '' ? $title : '(未命名 Group)' ) . '</h3></div>';
			echo '<div class="rd-card-body">';
			echo '<div class="rd-fields">';
			self::field( 'Title', self::text_input( $group_prefix . '[group_title]', $title ) );
			echo '</div>';

			self::repeater_plain(
				'Links',
				$group_prefix . '[links]',
				$links,
				[ __CLASS__, 'link_row' ]
			);

			echo '<p class="rd-row-actions"><button type="button" class="button rd-remove" data-rd-remove>删除</button></p>';
			echo '</div></div>';

			return ob_get_clean();
		}

		/* ================================ 内联样式 ================================ */

		private static function admin_styles() {
			?>
			<style>
				.rd-header-admin .rd-card {
					background: #fff;
					border: 1px solid #dcdcde;
					border-radius: 8px;
					margin: 16px 0;
					box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
				}
				.rd-header-admin .rd-card-head {
					padding: 12px 16px;
					border-bottom: 1px solid #f0f0f1;
				}
				.rd-header-admin .rd-card-head h2,
				.rd-header-admin .rd-card-head h3 {
					margin: 0;
					font-size: 14px;
					font-weight: 600;
				}
				.rd-header-admin .rd-card-body {
					padding: 16px;
				}
				.rd-header-admin .rd-card-sub {
					margin: 12px 0 12px 16px;
					background: #f6f7f7;
					border-color: #e0e1e3;
				}
				.rd-header-admin .rd-fields {
					display: flex;
					flex-direction: column;
					gap: 10px;
					margin: 12px 0;
				}
				.rd-header-admin .rd-field {
					display: grid;
					grid-template-columns: 220px 1fr;
					align-items: center;
					gap: 12px;
				}
				.rd-header-admin .rd-field-label {
					font-weight: 600;
					font-size: 13px;
					color: #3c434a;
				}
				.rd-header-admin .rd-field-input input,
				.rd-header-admin .rd-field-input textarea,
				.rd-header-admin .rd-field-input select {
					width: 100%;
				}
				.rd-header-admin .rd-field-inline {
					display: flex;
					align-items: center;
					gap: 8px;
				}
				.rd-header-admin .rd-field-inline input {
					flex: 1;
					min-width: 0;
				}
				.rd-header-admin .rd-collapse {
					border: 1px solid #dcdcde;
					border-radius: 6px;
					margin: 8px 0;
					background: #fff;
				}
				.rd-header-admin .rd-collapse-head {
					display: flex;
					align-items: center;
					justify-content: space-between;
					gap: 8px;
					padding: 10px 14px;
					cursor: pointer;
					user-select: none;
					background: #fafafa;
				}
				.rd-header-admin .rd-collapse-head:hover {
					background: #f0f6ff;
				}
				.rd-header-admin .rd-collapse-title {
					display: flex;
					align-items: center;
					gap: 8px;
					font-weight: 600;
				}
				.rd-header-admin .rd-collapse-arrow {
					color: #a7aaad;
					transition: transform 0.15s ease;
				}
				.rd-header-admin .rd-collapse-open > .rd-collapse-body {
					display: block;
				}
				.rd-header-admin .rd-collapse-open > .rd-collapse-head .rd-collapse-arrow {
					transform: rotate(180deg);
				}
				.rd-header-admin .rd-collapse-body {
					display: none;
					padding: 8px 14px 14px;
				}
				.rd-header-admin .rd-nav-type {
					background: #ea543f;
					color: #fff;
					font-size: 11px;
					font-weight: 600;
					padding: 2px 8px;
					border-radius: 10px;
				}
				.rd-header-admin .rd-repeater {
					margin: 12px 0;
				}
				.rd-header-admin .rd-repeater-head {
					display: flex;
					align-items: center;
					justify-content: space-between;
					margin-bottom: 8px;
				}
				.rd-header-admin .rd-repeater-title {
					font-weight: 600;
					font-size: 13px;
					color: #2271b1;
				}
				.rd-header-admin .rd-count {
					background: #f0f0f1;
					border-radius: 10px;
					padding: 1px 8px;
					font-size: 12px;
					color: #3c434a;
				}
				.rd-header-admin .rd-repeater-row {
					border: 1px dashed #dcdcde;
					border-radius: 6px;
					padding: 8px 12px;
					margin: 6px 0;
					background: #fbfbfc;
				}
				.rd-header-admin .rd-row-actions {
					margin: 8px 0 0;
				}
				.rd-header-admin .rd-remove.button,
				.rd-header-admin .rd-remove.button-link {
					color: #b32d2e;
				}
				.rd-header-admin .rd-sort-controls {
					display: inline-flex;
					gap: 4px;
				}
				.rd-header-admin .rd-sort.button {
					min-width: 28px;
					height: 28px;
					line-height: 24px;
					padding: 0 4px;
				}
				.rd-header-admin .rd-checkbox {
					display: inline-flex;
					align-items: center;
					gap: 6px;
				}
				@media (max-width: 782px) {
					.rd-header-admin .rd-field {
						grid-template-columns: 1fr;
						gap: 4px;
					}
					.rd-header-admin .rd-field-inline {
						flex-wrap: wrap;
					}
				}
			</style>
			<?php
		}
	}

	RD_Site_Header_Admin::init();
}
