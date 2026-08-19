<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Solution_Introduction_Widget' ) ) {
	class RD_Solution_Introduction_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-solution-introduction';
		}

		public function get_title() {
			return 'Solution Introduction';
		}

		public function get_icon() {
			return 'eicon-info-box';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SOLUTION_INTRODUCTION ];
		}

		private function render_pill_icon( $index ) {
			switch ( $index % 4 ) {
				case 1:
					// User icon.
					?>
					<svg class="rd-solution-introduction__pill-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
					<?php
					break;
				case 2:
					// Clock icon.
					?>
					<svg class="rd-solution-introduction__pill-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
					<?php
					break;
				case 3:
					// Lock icon.
					?>
					<svg class="rd-solution-introduction__pill-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
					<?php
					break;
				case 0:
				default:
					// Check-circle icon.
					?>
					<svg class="rd-solution-introduction__pill-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
					<?php
					break;
			}
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
				'heading',
				[
					'label'       => 'Heading',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'What Is One-Stop JDM?',
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => 'Joint Development Manufacturing (JDM) is a full-lifecycle co-development service for high-end custom hardware. You lead product definition, core features, and IP ownership. We join early to co-develop structure, electronics, manufacturing, assembly, testing, and delivery — closing the gap between idea and shippable product.',
					'label_block' => true,
				]
			);

			$pill_repeater = new \Elementor\Repeater();
			$pill_repeater->add_control(
				'label',
				[
					'label'       => 'Label',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);

			$this->add_control(
				'pills',
				[
					'label'       => 'Keyword Pills',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $pill_repeater->get_controls(),
					'title_field' => '{{{ label }}}',
					'default'     => [
						[ 'label' => 'Customer-Led' ],
						[ 'label' => 'End-to-End' ],
						[ 'label' => 'IP Ownership' ],
						[ 'label' => 'Full-Loop Closure' ],
					],
				]
			);

			$row_repeater = new \Elementor\Repeater();
			$row_repeater->add_control(
				'tag',
				[
					'label'       => 'Tag',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'JDM vs ODM',
					'label_block' => true,
				]
			);
			$row_repeater->add_control(
				'left_title',
				[
					'label'       => 'Left Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'JDM',
					'label_block' => true,
				]
			);
			$row_repeater->add_control(
				'left_description',
				[
					'label'       => 'Left Description',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => 'Customer leads product strategy and owns all IP. Factory and client co-develop structure, electronics, and process together.',
					'label_block' => true,
				]
			);
			$row_repeater->add_control(
				'right_title',
				[
					'label'       => 'Right Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'ODM',
					'label_block' => true,
				]
			);
			$row_repeater->add_control(
				'right_description',
				[
					'label'       => 'Right Description',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => 'Factory designs and owns the product. The customer only provides requirements and rebrands the finished device.',
					'label_block' => true,
				]
			);

			$this->add_control(
				'comparison_rows',
				[
					'label'       => 'Comparison Rows',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $row_repeater->get_controls(),
					'title_field' => '{{{ tag }}}',
					'default'     => [
						[
							'tag'               => 'JDM vs ODM',
							'left_title'        => 'JDM',
							'left_description'  => 'Customer leads product strategy and owns all IP. Factory and client co-develop structure, electronics, and process together.',
							'right_title'       => 'ODM',
							'right_description' => 'Factory designs and owns the product. The customer only provides requirements and rebrands the finished device.',
						],
						[
							'tag'               => 'JDM vs ADM',
							'left_title'        => 'JDM',
							'left_description'  => 'Engaged from the concept stage through design, prototyping, iteration, and mass production — full lifecycle collaboration.',
							'right_title'       => 'ADM',
							'right_description' => 'Starts after design is complete. Only optimizes existing drawings for manufacturability with no upstream co-development.',
						],
						[
							'tag'               => 'JDM vs OEM',
							'left_title'        => 'JDM',
							'left_description'  => 'Develops new products from scratch, including validation, iteration, process freezing, and production ramp-up.',
							'right_title'       => 'OEM',
							'right_description' => 'Manufactures mature, fixed designs only. No participation in R&D, iteration, or device-level debugging.',
						],
					],
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$heading     = isset( $settings['heading'] ) ? $settings['heading'] : '';
			$description = isset( $settings['description'] ) ? $settings['description'] : '';
			$pills       = isset( $settings['pills'] ) && is_array( $settings['pills'] ) ? $settings['pills'] : [];
			$rows        = isset( $settings['comparison_rows'] ) && is_array( $settings['comparison_rows'] ) ? $settings['comparison_rows'] : [];
			?>
			<section class="rd-solution-introduction">
				<div class="rd-solution-introduction__container">

					<?php if ( $heading !== '' || $description !== '' ) : ?>
						<div class="rd-solution-introduction__header">
							<?php if ( $heading !== '' ) : ?>
								<h2 class="rd-solution-introduction__title"><?php echo esc_html( $heading ); ?></h2>
							<?php endif; ?>

							<?php if ( $description !== '' ) : ?>
								<div class="rd-solution-introduction__description"><?php echo wp_kses_post( $description ); ?></div>
							<?php endif; ?>

							<?php if ( ! empty( $pills ) ) : ?>
								<div class="rd-solution-introduction__pills">
									<?php foreach ( $pills as $i => $pill ) : ?>
										<?php
										$pill_label = isset( $pill['label'] ) ? $pill['label'] : '';
										if ( $pill_label === '' ) {
											continue;
										}
										$pill_index = $i + 1;
										?>
										<span class="rd-solution-introduction__pill">
											<?php $this->render_pill_icon( $pill_index ); ?>
											<?php echo esc_html( $pill_label ); ?>
										</span>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $rows ) ) : ?>
						<div class="rd-solution-introduction__comparison-list">
							<?php foreach ( $rows as $row ) : ?>
								<?php
								$tag               = isset( $row['tag'] ) ? $row['tag'] : '';
								$left_title        = isset( $row['left_title'] ) ? $row['left_title'] : '';
								$left_description  = isset( $row['left_description'] ) ? $row['left_description'] : '';
								$right_title       = isset( $row['right_title'] ) ? $row['right_title'] : '';
								$right_description = isset( $row['right_description'] ) ? $row['right_description'] : '';
								?>
								<div class="rd-solution-introduction__comparison-row">
									<?php if ( $tag !== '' ) : ?>
										<div class="rd-solution-introduction__comparison-tag"><?php echo esc_html( $tag ); ?></div>
									<?php endif; ?>

									<div class="rd-solution-introduction__comparison-sides">
										<div class="rd-solution-introduction__side rd-solution-introduction__side--jdm">
											<?php if ( $left_title !== '' ) : ?>
												<h4 class="rd-solution-introduction__side-title"><?php echo esc_html( $left_title ); ?></h4>
											<?php endif; ?>
											<?php if ( $left_description !== '' ) : ?>
												<div class="rd-solution-introduction__side-desc"><?php echo wp_kses_post( $left_description ); ?></div>
											<?php endif; ?>
										</div>

										<div class="rd-solution-introduction__vs">VS</div>

										<div class="rd-solution-introduction__divider"></div>

										<div class="rd-solution-introduction__side rd-solution-introduction__side--other">
											<?php if ( $right_title !== '' ) : ?>
												<h4 class="rd-solution-introduction__side-title"><?php echo esc_html( $right_title ); ?></h4>
											<?php endif; ?>
											<?php if ( $right_description !== '' ) : ?>
												<div class="rd-solution-introduction__side-desc"><?php echo wp_kses_post( $right_description ); ?></div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

				</div>
			</section>
			<?php
		}
	}
}
