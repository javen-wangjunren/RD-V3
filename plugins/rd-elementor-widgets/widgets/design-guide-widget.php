<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Design_Guide_Widget' ) ) {
	class RD_Design_Guide_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-design-guide';
		}

		public function get_title() {
			return 'Design Guide';
		}

		public function get_icon() {
			return 'eicon-info-circle-o';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_DESIGN_GUIDE ];
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
					'default'     => 'Design Guide',
					'label_block' => true,
				]
			);

			$metric_repeater = new \Elementor\Repeater();
			$metric_repeater->add_control(
				'label',
				[
					'label'       => 'Label',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$metric_repeater->add_control(
				'value',
				[
					'label'       => 'Value',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$metric_repeater->add_control(
				'unit',
				[
					'label'       => 'Unit',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);

			$this->add_control(
				'metrics',
				[
					'label'       => 'Metrics (3 items)',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $metric_repeater->get_controls(),
					'default'     => [
						[ 'label' => 'Max Dimension', 'value' => '250×250×400', 'unit' => 'mm' ],
						[ 'label' => 'Layer Thickness', 'value' => '0.5', 'unit' => 'mm' ],
						[ 'label' => 'Tolerances', 'value' => 'ISO 2768-C', 'unit' => '' ],
					],
					'title_field' => '{{{ label }}}',
				]
			);

			$spec_repeater = new \Elementor\Repeater();
			$spec_repeater->add_control(
				'name',
				[
					'label'       => 'Name',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$spec_repeater->add_control(
				'details',
				[
					'label'       => 'Details',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 2,
					'label_block' => true,
				]
			);

			$this->add_control(
				'specs',
				[
					'label'       => 'Specs Table',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $spec_repeater->get_controls(),
					'default'     => [
						[ 'name' => 'Wall Thickness', 'details' => '0.5 mm' ],
						[ 'name' => 'Min Feature Size', 'details' => '0.5 mm' ],
						[ 'name' => 'Surface Finish Options', 'details' => 'Brushed Finish, Satin, Shot Peening, Electropolishing, Polishing, CNC, Anodizing' ],
					],
					'title_field' => '{{{ name }}}',
				]
			);

			$this->add_control(
				'advice_title',
				[
					'label'       => 'Advice Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Design Advice',
					'label_block' => true,
				]
			);

			$advice_repeater = new \Elementor\Repeater();
			$advice_repeater->add_control(
				'title',
				[
					'label'       => 'Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$advice_repeater->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 4,
					'label_block' => true,
				]
			);

			$this->add_control(
				'advice_items',
				[
					'label'       => 'Advice Items',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $advice_repeater->get_controls(),
					'default'     => [
						[
							'title'       => 'Supports as Heat Sinks',
							'description' => 'In SLM, supports act as critical heat sinks to dissipate intense laser heat. Design parts with overhang angles greater than 45° to minimize supports, and ensure thick sections are anchored to the build plate to prevent warping.',
						],
						[
							'title'       => 'Self-Supporting Internal Channels',
							'description' => 'For internal cooling channels or holes larger than 8 mm, use teardrop or diamond shapes instead of circular ones. This geometry allows the feature to be self-supporting, ensuring easy removal of unfused powder.',
						],
						[
							'title'       => 'Minimum Wall Thickness & Fillets',
							'description' => 'Maintain a minimum wall thickness of 0.5 mm for functional features. Avoid sharp internal corners by adding fillets (minimum R 0.5 mm) to distribute stress and prevent cracks caused by rapid heating cycles.',
						],
					],
					'title_field' => '{{{ title }}}',
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$heading = isset( $settings['heading'] ) ? $settings['heading'] : '';
			$metrics = isset( $settings['metrics'] ) && is_array( $settings['metrics'] ) ? $settings['metrics'] : [];
			$specs = isset( $settings['specs'] ) && is_array( $settings['specs'] ) ? $settings['specs'] : [];
			$advice_title = isset( $settings['advice_title'] ) ? $settings['advice_title'] : '';
			$advice_items = isset( $settings['advice_items'] ) && is_array( $settings['advice_items'] ) ? $settings['advice_items'] : [];

			$metrics = array_values( array_slice( $metrics, 0, 3 ) );
			?>
			<section class="rd-design-guide">
				<div class="rd-design-guide__container">
					<div class="rd-design-guide__header">
						<h2 class="rd-design-guide__title"><?php echo esc_html( $heading ); ?></h2>
					</div>

					<?php if ( ! empty( $metrics ) ) : ?>
						<div class="rd-design-guide__metrics">
							<?php foreach ( $metrics as $metric ) : ?>
								<?php
								$label = isset( $metric['label'] ) ? $metric['label'] : '';
								$value = isset( $metric['value'] ) ? $metric['value'] : '';
								$unit = isset( $metric['unit'] ) ? $metric['unit'] : '';
								?>
								<div class="rd-design-guide__metric-card">
									<div class="rd-design-guide__metric-label"><?php echo esc_html( $label ); ?></div>
									<div class="rd-design-guide__metric-value">
										<?php echo esc_html( $value ); ?>
										<?php if ( $unit !== '' ) : ?>
											<span class="rd-design-guide__metric-unit"><?php echo esc_html( $unit ); ?></span>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $specs ) ) : ?>
						<div class="rd-design-guide__specs">
							<?php foreach ( $specs as $spec ) : ?>
								<?php
								$name = isset( $spec['name'] ) ? $spec['name'] : '';
								$details = isset( $spec['details'] ) ? $spec['details'] : '';
								?>
								<div class="rd-design-guide__spec-row">
									<div class="rd-design-guide__spec-name"><?php echo esc_html( $name ); ?></div>
									<div class="rd-design-guide__spec-details"><?php echo esc_html( $details ); ?></div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( $advice_title !== '' || ! empty( $advice_items ) ) : ?>
						<div class="rd-design-guide__advice">
							<div class="rd-design-guide__advice-header">
								<svg class="rd-design-guide__advice-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
									<circle cx="12" cy="12" r="10"></circle>
									<line x1="12" y1="16" x2="12" y2="12"></line>
									<line x1="12" y1="8" x2="12.01" y2="8"></line>
								</svg>
								<h3 class="rd-design-guide__advice-title"><?php echo esc_html( $advice_title ); ?></h3>
							</div>
							<?php if ( ! empty( $advice_items ) ) : ?>
								<ul class="rd-design-guide__advice-list">
									<?php foreach ( $advice_items as $item ) : ?>
										<?php
										$title = isset( $item['title'] ) ? $item['title'] : '';
										$description = isset( $item['description'] ) ? $item['description'] : '';
										?>
										<li class="rd-design-guide__advice-item">
											<?php if ( $title !== '' ) : ?>
												<strong class="rd-design-guide__advice-strong"><?php echo esc_html( $title ); ?>:</strong>
											<?php endif; ?>
											<?php echo esc_html( $description ); ?>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
			<?php
		}
	}
}
