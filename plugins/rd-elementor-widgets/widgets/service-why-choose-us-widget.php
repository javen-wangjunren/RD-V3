<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Service_Why_Choose_Us_Widget' ) ) {
	class RD_Service_Why_Choose_Us_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-service-why-choose-us';
		}

		public function get_title() {
			return 'Service Why Choose Us';
		}

		public function get_icon() {
			return 'eicon-check-circle';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SERVICE_WHY_CHOOSE_US ];
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
					'default'     => 'Your Trusted Manufacturing Partner in China',
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 3,
					'default'     => 'With over 15 years of experience in precision manufacturing, we combine advanced technology, rigorous quality control, and dedicated customer service to deliver parts you can trust.',
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
					'default'     => 'High Quality Parts',
					'label_block' => true,
				]
			);
			$card_repeater->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 3,
					'default'     => 'Tight tolerances, strict inspections, and certified processes ensure every part meets your specifications.',
					'label_block' => true,
				]
			);

			$this->add_control(
				'cards',
				[
					'label'       => 'Value Cards',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $card_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
					'default'     => [
						[
							'image'       => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
							'title'       => 'High Quality Parts',
							'description' => 'Tight tolerances, strict inspections, and certified processes ensure every part meets your specifications—whether it is a single prototype or a production run.',
						],
						[
							'image'       => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
							'title'       => 'Fast Lead Time',
							'description' => 'Streamlined quoting, in-house capacity, and coordinated production keep your parts moving. Get quotes in hours and parts in days, not weeks.',
						],
						[
							'image'       => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
							'title'       => 'Engineering Support',
							'description' => 'From DFM feedback to material selection, our engineering team works with you to optimize designs for manufacturability, cost, and performance.',
						],
					],
				]
			);

			$stat_repeater = new \Elementor\Repeater();
			$stat_repeater->add_control(
				'value',
				[
					'label'       => 'Value',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => '20,000+',
					'label_block' => true,
				]
			);
			$stat_repeater->add_control(
				'label',
				[
					'label'       => 'Label',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Customers Worldwide Trust.',
					'label_block' => true,
				]
			);

			$this->add_control(
				'stats',
				[
					'label'       => 'Statistics',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $stat_repeater->get_controls(),
					'title_field' => '{{{ value }}} — {{{ label }}}',
					'default'     => [
						[
							'value' => '20,000+',
							'label' => 'Customers Worldwide Trust.',
						],
						[
							'value' => '120+',
							'label' => 'Countries and Regions Served',
						],
						[
							'value' => '700+',
							'label' => 'Machines Set Up',
						],
						[
							'value' => '5000m²',
							'label' => 'Factory in Total',
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
				'accent_color',
				[
					'label'     => 'Accent Color',
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => '#EA543F',
					'selectors' => [
						'{{WRAPPER}} .rd-swcu' => '--rd-swcu-accent: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'background_top_color',
				[
					'label'     => 'Background Top Color',
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => '#F6F6F6',
					'selectors' => [
						'{{WRAPPER}} .rd-swcu' => '--rd-swcu-bg-top: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'background_bottom_color',
				[
					'label'     => 'Background Bottom Color',
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => '#FFFFFF',
					'selectors' => [
						'{{WRAPPER}} .rd-swcu' => '--rd-swcu-bg-bottom: {{VALUE}};',
					],
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$heading     = isset( $settings['heading'] ) ? $settings['heading'] : '';
			$description = isset( $settings['description'] ) ? $settings['description'] : '';
			$cards       = isset( $settings['cards'] ) && is_array( $settings['cards'] ) ? $settings['cards'] : [];
			$stats       = isset( $settings['stats'] ) && is_array( $settings['stats'] ) ? $settings['stats'] : [];
			?>
			<section class="rd-swcu">
				<?php if ( $heading !== '' || $description !== '' || ! empty( $cards ) ) : ?>
					<div class="rd-swcu__value">
						<div class="rd-swcu__container">

							<?php if ( $heading !== '' || $description !== '' ) : ?>
								<div class="rd-swcu__header">
									<?php if ( $heading !== '' ) : ?>
										<h2 class="rd-swcu__heading"><?php echo esc_html( $heading ); ?></h2>
									<?php endif; ?>
									<?php if ( $description !== '' ) : ?>
										<p class="rd-swcu__description"><?php echo esc_html( $description ); ?></p>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $cards ) ) : ?>
								<div class="rd-swcu__grid">
									<?php foreach ( $cards as $card ) : ?>
										<?php
										$image     = isset( $card['image'] ) && is_array( $card['image'] ) ? $card['image'] : [];
										$image_id  = isset( $image['id'] ) ? absint( $image['id'] ) : 0;
										$image_url = isset( $image['url'] ) ? $image['url'] : '';
										$c_title   = isset( $card['title'] ) ? $card['title'] : '';
										$c_desc    = isset( $card['description'] ) ? $card['description'] : '';

										if ( $image_id === 0 && $image_url === '' && $c_title === '' && $c_desc === '' ) {
											continue;
										}
										?>
										<div class="rd-swcu__card">
											<div class="rd-swcu__card-media">
												<?php if ( $image_id > 0 ) : ?>
													<?php echo wp_get_attachment_image( $image_id, 'full', false, [ 'class' => 'rd-swcu__card-img' ] ); ?>
												<?php elseif ( $image_url !== '' ) : ?>
													<img class="rd-swcu__card-img" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $c_title ); ?>">
												<?php endif; ?>
											</div>
											<div class="rd-swcu__card-body">
												<?php if ( $c_title !== '' ) : ?>
													<h3 class="rd-swcu__card-title"><?php echo esc_html( $c_title ); ?></h3>
												<?php endif; ?>
												<?php if ( $c_desc !== '' ) : ?>
													<p class="rd-swcu__card-desc"><?php echo esc_html( $c_desc ); ?></p>
												<?php endif; ?>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

						</div>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $stats ) ) : ?>
					<div class="rd-swcu__stats">
						<div class="rd-swcu__container">
							<div class="rd-swcu__stats-grid">
								<?php foreach ( $stats as $stat ) : ?>
									<?php
									$s_value = isset( $stat['value'] ) ? $stat['value'] : '';
									$s_label = isset( $stat['label'] ) ? $stat['label'] : '';

									if ( $s_value === '' && $s_label === '' ) {
										continue;
									}
									?>
									<div class="rd-swcu__stat">
										<?php if ( $s_value !== '' ) : ?>
											<div class="rd-swcu__stat-value"><?php echo esc_html( $s_value ); ?></div>
										<?php endif; ?>
										<?php if ( $s_label !== '' ) : ?>
											<p class="rd-swcu__stat-label"><?php echo esc_html( $s_label ); ?></p>
										<?php endif; ?>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</section>
			<?php
		}
	}
}
