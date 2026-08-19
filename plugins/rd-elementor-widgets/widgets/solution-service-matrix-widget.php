<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Solution_Service_Matrix_Widget' ) ) {
	class RD_Solution_Service_Matrix_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-solution-service-matrix';
		}

		public function get_title() {
			return 'Solution Service Matrix';
		}

		public function get_icon() {
			return 'eicon-apps';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SOLUTION_SERVICE_MATRIX ];
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
					'default'     => 'Full-Category Service Matrix',
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => 'One engineering team covers every process your device needs — from PCB and mechanical parts to finished-product integration.',
					'label_block' => true,
				]
			);

			$card_repeater = new \Elementor\Repeater();
			$card_repeater->add_control(
				'image',
				[
					'label'   => 'Image',
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
			$card_repeater->add_control(
				'title',
				[
					'label'       => 'Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Service Title',
					'label_block' => true,
				]
			);
			$card_repeater->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => 'Short service description.',
					'label_block' => true,
				]
			);
			$card_repeater->add_control(
				'tags',
				[
					'label'       => 'Tags',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'description' => 'Separate tags with commas.',
					'default'     => 'Tag 1, Tag 2',
					'label_block' => true,
				]
			);
			$card_repeater->add_control(
				'size',
				[
					'label'   => 'Card Size',
					'type'    => \Elementor\Controls_Manager::SELECT,
					'default' => 'small',
					'options' => [
						'small' => 'Small',
						'large' => 'Large',
					],
				]
			);

			$this->add_control(
				'service_cards',
				[
					'label'       => 'Service Cards',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $card_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
					'default'     => [
						[
							'title'       => 'Electronics Hardware Development',
							'description' => 'Full-stack PCB services from multilayer and HDI to metal-core and RF boards — plus SMT integration and electrical testing.',
							'tags'        => 'Multilayer PCB, HDI, Metal Core, RF PCB, SMT, Electrical Test',
							'size'        => 'large',
						],
						[
							'title'       => 'CNC Machining',
							'description' => 'Precision-machined aluminum housings, brackets, and functional structures for high-end devices.',
							'tags'        => 'Aluminum, Complex Geometry',
							'size'        => 'small',
						],
						[
							'title'       => 'Injection Molding',
							'description' => 'Draft-angle optimization, wall-thickness design, mold flow, and volume production of plastic parts.',
							'tags'        => 'Housings, Tooling',
							'size'        => 'small',
						],
						[
							'title'       => 'Sheet Metal Fabrication',
							'description' => 'Industrial chassis, racks, and protective enclosures with precise bends, cutouts, and assembly.',
							'tags'        => 'Chassis, Racks',
							'size'        => 'small',
						],
						[
							'title'       => '3D Printing',
							'description' => 'Rapid concept prototypes, complex geometry validation, and multi-version iteration before tooling.',
							'tags'        => 'Prototypes, Fast Iteration',
							'size'        => 'small',
						],
						[
							'title'       => 'Full-Device Integration',
							'description' => 'SMT placement, final assembly, functional QC, calibration, and finished-goods packaging — turning parts into sellable devices.',
							'tags'        => 'SMT Integration, Assembly, Functional Test, Calibration, Packaging',
							'size'        => 'large',
						],
					],
				]
			);

			$this->add_control(
				'scenarios',
				[
					'label'       => 'Application Scenarios',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'description' => 'Separate scenarios with commas.',
					'default'     => 'Industrial Smart Hardware, Automotive Accessories, Medical Precision Devices, IoT Smart Terminals, Testing & Measurement Instruments',
					'label_block' => true,
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$heading       = isset( $settings['heading'] ) ? $settings['heading'] : '';
			$description   = isset( $settings['description'] ) ? $settings['description'] : '';
			$service_cards = isset( $settings['service_cards'] ) && is_array( $settings['service_cards'] ) ? $settings['service_cards'] : [];
			$scenarios     = isset( $settings['scenarios'] ) ? $settings['scenarios'] : '';
			?>
			<section class="rd-solution-service-matrix">
				<div class="rd-solution-service-matrix__container">

					<?php if ( $heading !== '' || $description !== '' ) : ?>
						<div class="rd-solution-service-matrix__header">
							<?php if ( $heading !== '' ) : ?>
								<h2 class="rd-solution-service-matrix__title"><?php echo esc_html( $heading ); ?></h2>
							<?php endif; ?>
							<?php if ( $description !== '' ) : ?>
								<div class="rd-solution-service-matrix__description"><?php echo wp_kses_post( $description ); ?></div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $service_cards ) ) : ?>
						<div class="rd-solution-service-matrix__bento">
							<?php foreach ( $service_cards as $card ) : ?>
								<?php
								$image       = isset( $card['image'] ) && is_array( $card['image'] ) ? $card['image'] : [];
								$image_id    = isset( $image['id'] ) ? absint( $image['id'] ) : 0;
								$image_url   = isset( $image['url'] ) ? $image['url'] : '';
								$card_title  = isset( $card['title'] ) ? $card['title'] : '';
								$card_desc   = isset( $card['description'] ) ? $card['description'] : '';
								$tags_string = isset( $card['tags'] ) ? $card['tags'] : '';
								$size        = isset( $card['size'] ) ? $card['size'] : 'small';

								if ( $image_id === 0 && $image_url === '' && $card_title === '' && $card_desc === '' && $tags_string === '' ) {
									continue;
								}

								$size_class = ( $size === 'large' ) ? ' rd-solution-service-matrix__card--large' : '';

								$tags = [];
								if ( $tags_string !== '' ) {
									$raw_tags = explode( ',', $tags_string );
									foreach ( $raw_tags as $tag ) {
										$tag = trim( $tag );
										if ( $tag !== '' ) {
											$tags[] = $tag;
										}
									}
								}
								?>
								<div class="rd-solution-service-matrix__card<?php echo esc_attr( $size_class ); ?>">
									<div class="rd-solution-service-matrix__card-media">
										<?php if ( $image_id > 0 ) : ?>
											<?php echo wp_get_attachment_image( $image_id, 'full', false, [ 'class' => 'rd-solution-service-matrix__card-image' ] ); ?>
										<?php elseif ( $image_url !== '' ) : ?>
											<img class="rd-solution-service-matrix__card-image" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $card_title ); ?>">
										<?php endif; ?>
									</div>
									<div class="rd-solution-service-matrix__card-body">
										<?php if ( $card_title !== '' ) : ?>
											<h3 class="rd-solution-service-matrix__card-title"><?php echo esc_html( $card_title ); ?></h3>
										<?php endif; ?>
										<?php if ( $card_desc !== '' ) : ?>
											<div class="rd-solution-service-matrix__card-desc"><?php echo wp_kses_post( $card_desc ); ?></div>
										<?php endif; ?>
										<?php if ( ! empty( $tags ) ) : ?>
											<div class="rd-solution-service-matrix__card-tags">
												<?php foreach ( $tags as $tag ) : ?>
													<span class="rd-solution-service-matrix__card-tag"><?php echo esc_html( $tag ); ?></span>
												<?php endforeach; ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php
					$scenario_items = [];
					if ( $scenarios !== '' ) {
						$raw_scenarios = explode( ',', $scenarios );
						foreach ( $raw_scenarios as $scenario ) {
							$scenario = trim( $scenario );
							if ( $scenario !== '' ) {
								$scenario_items[] = $scenario;
							}
						}
					}
					?>
					<?php if ( ! empty( $scenario_items ) ) : ?>
						<div class="rd-solution-service-matrix__scenarios">
							<h3 class="rd-solution-service-matrix__scenarios-title">Application Scenarios</h3>
							<div class="rd-solution-service-matrix__scenarios-list">
								<?php foreach ( $scenario_items as $scenario ) : ?>
									<span class="rd-solution-service-matrix__scenario-tag">
										<span class="rd-solution-service-matrix__scenario-dot"></span>
										<?php echo esc_html( $scenario ); ?>
									</span>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>

				</div>
			</section>
			<?php
		}
	}
}
