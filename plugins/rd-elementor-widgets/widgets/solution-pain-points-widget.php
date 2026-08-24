<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Solution_Pain_Points_Widget' ) ) {
	class RD_Solution_Pain_Points_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-solution-pain-points';
		}

		public function get_title() {
			return 'Solution Pain Points';
		}

		public function get_icon() {
			return 'eicon-info-box';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SOLUTION_PAIN_POINTS ];
		}

		private function render_icon( $index ) {
			switch ( $index % 5 ) {
				case 1:
					// Siloed icon.
					?>
					<svg class="rd-solution-pain-points__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
						<circle cx="12" cy="12" r="3"/>
						<path d="M12 6V4M12 20v-2M6 12H4M20 12h-2M7.05 7.05L5.64 5.64M18.36 18.36l-1.41-1.41M7.05 16.95l-1.41 1.41M18.36 5.64l-1.41 1.41"/>
						<line x1="16" y1="12" x2="20" y2="12" stroke-dasharray="2 2"/>
						<rect x="16" y="10" width="4" height="4" rx="1" fill="currentColor" stroke="none" opacity="0.2"/>
					</svg>
					<?php
					break;
				case 2:
					// Fragmented supply chain icon.
					?>
					<svg class="rd-solution-pain-points__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
						<rect x="3" y="3" width="5" height="5" rx="1.5"/>
						<rect x="16" y="3" width="5" height="5" rx="1.5"/>
						<rect x="3" y="16" width="5" height="5" rx="1.5"/>
						<rect x="16" y="16" width="5" height="5" rx="1.5"/>
						<line x1="8" y1="5.5" x2="16" y2="5.5" stroke-dasharray="3 3"/>
						<line x1="5.5" y1="8" x2="5.5" y2="16" stroke-dasharray="3 3"/>
						<line x1="18.5" y1="8" x2="18.5" y2="16" stroke-dasharray="3 3"/>
						<line x1="8" y1="18.5" x2="16" y2="18.5" stroke-dasharray="3 3"/>
					</svg>
					<?php
					break;
				case 3:
					// Design ignores manufacturing icon.
					?>
					<svg class="rd-solution-pain-points__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
						<path d="M4 6h16M4 6v12a2 2 0 002 2h12a2 2 0 002-2V6"/>
						<path d="M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
						<path d="M9 14l6-6M15 14L9 8"/>
						<circle cx="12" cy="11" r="4" stroke-dasharray="2 2"/>
					</svg>
					<?php
					break;
				case 4:
					// High iteration risk icon.
					?>
					<svg class="rd-solution-pain-points__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
						<path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/>
						<path d="M12 8v5M12 16h.01"/>
						<path d="M16.5 7.5l-1.5 1.5M9 15l-1.5 1.5"/>
					</svg>
					<?php
					break;
				case 0:
				default:
					// R&D-to-production gap icon.
					?>
					<svg class="rd-solution-pain-points__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
						<path d="M9 21h6l3-9H6l3 9z"/>
						<path d="M8 12V8a4 4 0 018 0v4"/>
						<path d="M12 3v5M12 8l-2-2M12 8l2-2"/>
						<line x1="12" y1="12" x2="12" y2="15" stroke-dasharray="2 2"/>
					</svg>
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
				'section_title',
				[
					'label'       => 'Section Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'End-to-End Product R&amp;D Pain Points',
					'label_block' => true,
				]
			);

			$this->add_control(
				'section_subtitle',
				[
					'label'       => 'Section Subtitle',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Five bottlenecks that slow down new product development from concept to production.',
					'label_block' => true,
				]
			);

			$card_repeater = new \Elementor\Repeater();
			$card_repeater->add_control(
				'title',
				[
					'label'       => 'Card Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$card_repeater->add_control(
				'description',
				[
					'label'       => 'Card Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
				]
			);

			$this->add_control(
				'pain_points',
				[
					'label'       => 'Pain Points',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $card_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
					'default'     => [
						[
							'title'       => 'Siloed Mechanical &amp; Electrical Design',
							'description' => 'PCB layouts conflict with housings, components interfere, and thermal plans mismatch—forcing endless redesign loops.',
						],
						[
							'title'       => 'Fragmented Supply Chain',
							'description' => 'Design, PCB, machining, SMT, and assembly are split across vendors. Handoffs multiply and accountability blurs.',
						],
						[
							'title'       => 'Design Ignores Manufacturing',
							'description' => 'In-house designs chase function but skip DFM, assembly logic, and reliability checks. Good drawings that can\'t be built.',
						],
						[
							'title'       => 'High Iteration Risk',
							'description' => 'Custom hardware iterations are expensive. Without end-to-end engineering support, concepts stall before production.',
						],
						[
							'title'       => 'R&amp;D-to-Production Gap',
							'description' => 'Teams deliver drawings but lack SMT, final assembly, functional QC, and finished-goods delivery capability.',
						],
					],
				]
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'section_style',
				[
					'label' => 'Style',
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'background_color',
				[
					'label'     => 'Background Color',
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => '#FFFFFF',
					'selectors' => [
						'{{WRAPPER}} .rd-solution-pain-points' => '--rd-spp-bg: {{VALUE}};',
					],
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$title    = isset( $settings['section_title'] ) ? $settings['section_title'] : '';
			$subtitle = isset( $settings['section_subtitle'] ) ? $settings['section_subtitle'] : '';
			$cards    = isset( $settings['pain_points'] ) && is_array( $settings['pain_points'] ) ? $settings['pain_points'] : [];
			?>
			<section class="rd-solution-pain-points">
				<div class="rd-solution-pain-points__container">
					<?php if ( $title !== '' || $subtitle !== '' ) : ?>
						<div class="rd-solution-pain-points__header">
							<?php if ( $title !== '' ) : ?>
								<h2 class="rd-solution-pain-points__title"><?php echo esc_html( $title ); ?></h2>
							<?php endif; ?>
							<?php if ( $subtitle !== '' ) : ?>
								<p class="rd-solution-pain-points__subtitle"><?php echo esc_html( $subtitle ); ?></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $cards ) ) : ?>
						<div class="rd-solution-pain-points__grid">
							<?php foreach ( $cards as $i => $card ) : ?>
								<?php
								$card_title = isset( $card['title'] ) ? $card['title'] : '';
								$card_desc  = isset( $card['description'] ) ? $card['description'] : '';
								if ( $card_title === '' && $card_desc === '' ) {
									continue;
								}
								$icon_index = $i + 1;
								?>
								<div class="rd-solution-pain-points__card">
									<?php $this->render_icon( $icon_index ); ?>
									<?php if ( $card_title !== '' ) : ?>
										<h3 class="rd-solution-pain-points__card-title"><?php echo esc_html( $card_title ); ?></h3>
									<?php endif; ?>
									<?php if ( $card_desc !== '' ) : ?>
										<p class="rd-solution-pain-points__card-desc"><?php echo esc_html( $card_desc ); ?></p>
									<?php endif; ?>
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
