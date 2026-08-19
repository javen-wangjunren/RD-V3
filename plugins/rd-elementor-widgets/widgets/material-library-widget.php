<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Material_Library_Widget' ) ) {
	class RD_Material_Library_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-material-library';
		}

		public function get_title() {
			return 'Material Library';
		}

		public function get_icon() {
			return 'eicon-search';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_MATERIAL_LIBRARY ];
		}

		public function get_script_depends() {
			return [ RD_Elementor_Widgets_Plugin::SCRIPT_HANDLE_MATERIAL_LIBRARY ];
		}

		protected function register_controls() {
			$this->start_controls_section(
				'section_content',
				[
					'label' => 'Content',
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'search_placeholder',
				[
					'label'       => 'Search Placeholder',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Search by name…',
					'label_block' => true,
				]
			);

			$this->add_control(
				'process_label',
				[
					'label'       => 'Process Label',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Process',
					'label_block' => true,
				]
			);

			$this->add_control(
				'enable_type_tabs',
				[
					'label'        => 'Enable Type Tabs',
					'type'         => \Elementor\Controls_Manager::SWITCHER,
					'label_on'     => 'Yes',
					'label_off'    => 'No',
					'return_value' => 'yes',
					'default'      => 'yes',
				]
			);

			$this->add_control(
				'sticky_panel',
				[
					'label'        => 'Sticky Filter Panel (Desktop)',
					'type'         => \Elementor\Controls_Manager::SWITCHER,
					'label_on'     => 'Yes',
					'label_off'    => 'No',
					'return_value' => 'yes',
					'default'      => 'yes',
				]
			);

			$this->end_controls_section();

			$item_repeater = new \Elementor\Repeater();
			$item_repeater->add_control(
				'title',
				[
					'label'       => 'Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$item_repeater->add_control(
				'permalink',
				[
					'label'       => 'Permalink',
					'type'        => \Elementor\Controls_Manager::URL,
					'label_block' => true,
				]
			);
			$item_repeater->add_control(
				'cover_image',
				[
					'label' => 'Cover Image',
					'type'  => \Elementor\Controls_Manager::MEDIA,
				]
			);
			$item_repeater->add_control(
				'processes',
				[
					'label'       => 'Processes',
					'type'        => \Elementor\Controls_Manager::SELECT2,
					'multiple'    => true,
					'label_block' => true,
					'options'     => self::get_process_options(),
				]
			);
			$item_repeater->add_control(
				'aliases',
				[
					'label'       => 'Aliases (for search)',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);

			$this->start_controls_section(
				'section_materials_metals',
				[
					'label' => 'Metals',
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);
			$this->add_control(
				'metals',
				[
					'label'       => 'Metals',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $item_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
				]
			);
			$this->end_controls_section();

			$this->start_controls_section(
				'section_materials_plastics',
				[
					'label' => 'Plastics',
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);
			$this->add_control(
				'plastics',
				[
					'label'       => 'Plastics',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $item_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
				]
			);
			$this->end_controls_section();

			$this->start_controls_section(
				'section_materials_resins',
				[
					'label' => 'Resins',
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);
			$this->add_control(
				'resins',
				[
					'label'       => 'Resins',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $item_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
				]
			);
			$this->end_controls_section();

			$this->start_controls_section(
				'section_materials_elastomers',
				[
					'label' => 'Elastomers',
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);
			$this->add_control(
				'elastomers',
				[
					'label'       => 'Elastomers',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $item_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
				]
			);
			$this->end_controls_section();

			$this->start_controls_section(
				'section_layout',
				[
					'label' => 'Layout',
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'desktop_columns',
				[
					'label'   => 'Desktop Columns',
					'type'    => \Elementor\Controls_Manager::SELECT,
					'default' => '4',
					'options' => [
						'2' => '2',
						'3' => '3',
						'4' => '4',
					],
				]
			);

			$this->add_control(
				'mobile_columns',
				[
					'label'   => 'Mobile Columns',
					'type'    => \Elementor\Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'1' => '1',
						'2' => '2',
					],
				]
			);

			$this->end_controls_section();
		}

		private static function get_process_options() {
			return [
				'sls' => 'SLS',
				'slm' => 'SLM',
				'sla' => 'SLA',
				'dlp' => 'DLP',
				'fgf' => 'FGF',
				'fdm' => 'FDM',
				'mjf' => 'MJF',
			];
		}

		private static function get_type_tabs() {
			return [
				'all'       => 'All',
				'metal'     => 'Metals',
				'plastic'   => 'Plastics',
				'resin'     => 'Resins',
				'elastomers' => 'Elastomers',
			];
		}

		private static function normalize_processes( $processes ) {
			if ( ! is_array( $processes ) ) {
				return [];
			}

			$out = [];
			foreach ( $processes as $process ) {
				$process = is_string( $process ) ? trim( strtolower( $process ) ) : '';
				if ( $process === '' ) {
					continue;
				}
				$out[] = $process;
			}

			return array_values( array_unique( $out ) );
		}

		private static function normalize_text( $value ) {
			return is_string( $value ) ? trim( $value ) : '';
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$materials = [];
			$used_types = [];

			$add_items = function ( $items, $forced_type ) use ( &$materials, &$used_types ) {
				if ( ! is_array( $items ) ) {
					return;
				}

				foreach ( $items as $item ) {
					if ( ! is_array( $item ) ) {
						continue;
					}

					$title = self::normalize_text( isset( $item['title'] ) ? $item['title'] : '' );
					$type = $forced_type;
					$processes = self::normalize_processes( isset( $item['processes'] ) ? $item['processes'] : [] );
					$aliases = self::normalize_text( isset( $item['aliases'] ) ? $item['aliases'] : '' );

					$permalink = '';
					if ( isset( $item['permalink'] ) && is_array( $item['permalink'] ) ) {
						$permalink = isset( $item['permalink']['url'] ) && is_string( $item['permalink']['url'] ) ? trim( $item['permalink']['url'] ) : '';
					}

					$image_id = 0;
					$image_alt = '';
					if ( isset( $item['cover_image'] ) && is_array( $item['cover_image'] ) ) {
						$image_id = isset( $item['cover_image']['id'] ) ? intval( $item['cover_image']['id'] ) : 0;
						$image_alt = isset( $item['cover_image']['alt'] ) && is_string( $item['cover_image']['alt'] ) ? $item['cover_image']['alt'] : '';
					}

					if ( $title === '' ) {
						continue;
					}

					$materials[] = [
						'title'     => $title,
						'type'      => $type,
						'processes'  => $processes,
						'aliases'   => $aliases,
						'permalink' => $permalink,
						'image_id'  => $image_id,
						'image_alt' => $image_alt,
					];

					$used_types[ $type ] = true;
				}
			};

			$add_items( isset( $settings['metals'] ) ? $settings['metals'] : [], 'metal' );
			$add_items( isset( $settings['plastics'] ) ? $settings['plastics'] : [], 'plastic' );
			$add_items( isset( $settings['resins'] ) ? $settings['resins'] : [], 'resin' );
			$add_items( isset( $settings['elastomers'] ) ? $settings['elastomers'] : [], 'elastomers' );

			if ( empty( $materials ) ) {
				return;
			}

			$process_options = self::get_process_options();
			$process_list = array_keys( $process_options );

			$enable_type_tabs = isset( $settings['enable_type_tabs'] ) && $settings['enable_type_tabs'] === 'yes';
			$sticky_panel = isset( $settings['sticky_panel'] ) && $settings['sticky_panel'] === 'yes';

			$tabs = [];
			if ( $enable_type_tabs ) {
				foreach ( self::get_type_tabs() as $type_key => $label ) {
					if ( $type_key === 'all' || isset( $used_types[ $type_key ] ) ) {
						$tabs[ $type_key ] = $label;
					}
				}
			}

			$search_placeholder = self::normalize_text( isset( $settings['search_placeholder'] ) ? $settings['search_placeholder'] : '' );
			$search_placeholder = $search_placeholder !== '' ? $search_placeholder : 'Search by name…';
			$process_label = self::normalize_text( isset( $settings['process_label'] ) ? $settings['process_label'] : '' );
			$process_label = $process_label !== '' ? $process_label : 'Process';

			$desktop_cols = isset( $settings['desktop_columns'] ) ? intval( $settings['desktop_columns'] ) : 4;
			$desktop_cols = in_array( $desktop_cols, [ 2, 3, 4 ], true ) ? $desktop_cols : 4;
			$mobile_cols = isset( $settings['mobile_columns'] ) ? intval( $settings['mobile_columns'] ) : 1;
			$mobile_cols = in_array( $mobile_cols, [ 1, 2 ], true ) ? $mobile_cols : 1;
			$tablet_cols = $desktop_cols > 3 ? 3 : $desktop_cols;
			$tablet_small_cols = $desktop_cols > 2 ? 2 : $desktop_cols;

			$instance_id = $this->get_id();
			$root_classes = 'rd-material-library';
			$root_classes .= $sticky_panel ? ' is-sticky' : '';
			?>
			<section
				class="<?php echo esc_attr( $root_classes ); ?>"
				data-rd-material-library="<?php echo esc_attr( $instance_id ); ?>"
				style="--rd-ml-cols-desktop: <?php echo esc_attr( (string) $desktop_cols ); ?>; --rd-ml-cols-tablet: <?php echo esc_attr( (string) $tablet_cols ); ?>; --rd-ml-cols-tablet-small: <?php echo esc_attr( (string) $tablet_small_cols ); ?>; --rd-ml-cols-mobile: <?php echo esc_attr( (string) $mobile_cols ); ?>;"
			>
				<div class="rd-material-library__container">
					<div class="rd-material-library__shell">
						<aside class="rd-material-library__panel">
							<div class="rd-material-library__panel-title">
								<h3 class="rd-material-library__panel-heading">Material Library</h3>
								<div class="rd-material-library__panel-count" data-rd-ml-total><?php echo esc_html( (string) count( $materials ) ); ?> items</div>
							</div>
							<div class="rd-material-library__search">
								<input
									class="rd-material-library__input"
									data-rd-ml-q
									type="search"
									placeholder="<?php echo esc_attr( $search_placeholder ); ?>"
									autocomplete="off"
								/>
								<div class="rd-material-library__actions">
									<button class="rd-material-library__btn" type="button" data-rd-ml-apply>Apply</button>
									<button class="rd-material-library__btn is-secondary" type="button" data-rd-ml-clear>Clear</button>
								</div>
							</div>
							<div class="rd-material-library__group">
								<div class="rd-material-library__group-label">
									<span class="rd-material-library__group-title"><?php echo esc_html( $process_label ); ?></span>
									<button class="rd-material-library__link-btn" type="button" data-rd-ml-reset-process>Reset</button>
								</div>
								<div class="rd-material-library__checklist" data-rd-ml-processes>
									<?php foreach ( $process_list as $process_key ) : ?>
										<?php
										$process_text = isset( $process_options[ $process_key ] ) ? $process_options[ $process_key ] : strtoupper( $process_key );
										$input_id = 'rd-ml-' . $instance_id . '-process-' . $process_key;
										?>
										<label class="rd-material-library__check" for="<?php echo esc_attr( $input_id ); ?>">
											<input
												id="<?php echo esc_attr( $input_id ); ?>"
												type="checkbox"
												value="<?php echo esc_attr( $process_key ); ?>"
												data-rd-ml-process
											/>
											<span><?php echo esc_html( $process_text ); ?></span>
										</label>
									<?php endforeach; ?>
								</div>
							</div>
						</aside>
						<main class="rd-material-library__main">
							<div class="rd-material-library__bar">
								<?php if ( ! empty( $tabs ) ) : ?>
									<div class="rd-material-library__tabs" role="group" aria-label="Material type" data-rd-ml-types>
										<?php foreach ( $tabs as $type_key => $label ) : ?>
											<button
												type="button"
												class="rd-material-library__tab<?php echo $type_key === 'all' ? ' is-active' : ''; ?>"
												data-rd-ml-type="<?php echo esc_attr( $type_key ); ?>"
												aria-pressed="<?php echo $type_key === 'all' ? 'true' : 'false'; ?>"
											>
												<span class="rd-material-library__tab-label"><?php echo esc_html( $label ); ?></span>
												<span class="rd-material-library__tab-count" data-rd-ml-type-count="<?php echo esc_attr( $type_key ); ?>"></span>
											</button>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
								<div class="rd-material-library__meta">
									<span class="rd-material-library__chip"><strong data-rd-ml-result-count><?php echo esc_html( (string) count( $materials ) ); ?></strong> results</span>
								</div>
							</div>
							<div class="rd-material-library__grid" data-rd-ml-grid>
								<?php foreach ( $materials as $material ) : ?>
									<?php
									$title = $material['title'];
									$type = $material['type'];
									$processes = $material['processes'];
									$aliases = $material['aliases'];
									$link = $material['permalink'];
									$image_id = intval( $material['image_id'] );
									$image_alt = is_string( $material['image_alt'] ) && $material['image_alt'] !== '' ? $material['image_alt'] : $title;
									$data_processes = implode( ',', $processes );
									$tag_items = [];
									foreach ( $processes as $process ) {
										if ( isset( $process_options[ $process ] ) ) {
											$tag_items[] = $process_options[ $process ];
										}
									}
									?>
									<?php if ( $link !== '' ) : ?>
										<a
											class="rd-material-library__card"
											href="<?php echo esc_url( $link ); ?>"
											aria-label="<?php echo esc_attr( 'View material: ' . $title ); ?>"
											data-title="<?php echo esc_attr( strtolower( $title ) ); ?>"
											data-aliases="<?php echo esc_attr( strtolower( $aliases ) ); ?>"
											data-type="<?php echo esc_attr( $type ); ?>"
											data-processes="<?php echo esc_attr( $data_processes ); ?>"
										>
									<?php else : ?>
										<div
											class="rd-material-library__card is-disabled"
											data-title="<?php echo esc_attr( strtolower( $title ) ); ?>"
											data-aliases="<?php echo esc_attr( strtolower( $aliases ) ); ?>"
											data-type="<?php echo esc_attr( $type ); ?>"
											data-processes="<?php echo esc_attr( $data_processes ); ?>"
										>
									<?php endif; ?>
											<div class="rd-material-library__image">
												<?php if ( $image_id > 0 ) : ?>
													<?php echo wp_get_attachment_image( $image_id, 'large', false, [ 'class' => 'rd-material-library__img', 'alt' => $image_alt, 'loading' => 'lazy' ] ); ?>
												<?php else : ?>
													<div class="rd-material-library__img-placeholder">[ Real Photo ]</div>
												<?php endif; ?>
											</div>
											<div class="rd-material-library__card-body">
												<h3 class="rd-material-library__card-title"><?php echo esc_html( $title ); ?></h3>
												<div class="rd-material-library__tags">
													<?php foreach ( $tag_items as $tag_item ) : ?>
														<span class="rd-material-library__tag is-primary"><?php echo esc_html( $tag_item ); ?></span>
													<?php endforeach; ?>
													<span class="rd-material-library__tag"><?php echo esc_html( strtoupper( $type ) ); ?></span>
												</div>
											</div>
									<?php if ( $link !== '' ) : ?>
										</a>
									<?php else : ?>
										</div>
									<?php endif; ?>
								<?php endforeach; ?>
								<div class="rd-material-library__empty" data-rd-ml-empty hidden>
									<div class="rd-material-library__empty-title">No results</div>
									<div class="rd-material-library__empty-desc">Try removing a filter or using a shorter keyword.</div>
								</div>
							</div>
							<div class="rd-material-library__pagination" data-rd-ml-pagination hidden>
								<button class="rd-material-library__page-btn" type="button" data-rd-ml-page-prev>Prev</button>
								<div class="rd-material-library__page-list" data-rd-ml-page-list></div>
								<button class="rd-material-library__page-btn" type="button" data-rd-ml-page-next>Next</button>
								<div class="rd-material-library__page-info" data-rd-ml-page-info></div>
							</div>
						</main>
					</div>
				</div>
			</section>
			<?php
		}
	}
}
