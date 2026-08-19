<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Tooling_Equipment_Widget' ) ) {
	class RD_Tooling_Equipment_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-tooling-equipment';
		}

		public function get_title() {
			return 'Tooling Equipment';
		}

		public function get_icon() {
			return 'eicon-slider-push';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_TOOLING_EQUIPMENT ];
		}

		public function get_script_depends() {
			return [ RD_Elementor_Widgets_Plugin::SCRIPT_HANDLE_TOOLING_EQUIPMENT ];
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
					'default'     => 'Our Production & Inspection Equipment',
					'label_block' => true,
				]
			);

			$this->add_control(
				'section_description',
				[
					'label'       => 'Section Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 3,
					'default'     => 'Full-range precision facilities for hard tooling manufacturing and mass production',
					'label_block' => true,
				]
			);

			$equipment_repeater = new \Elementor\Repeater();
			$equipment_repeater->add_control(
				'image',
				[
					'label' => 'Image',
					'type'  => \Elementor\Controls_Manager::MEDIA,
				]
			);
			$equipment_repeater->add_control(
				'equipment_name',
				[
					'label'       => 'Equipment Name',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$equipment_repeater->add_control(
				'equipment_description',
				[
					'label'       => 'Equipment Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 3,
					'label_block' => true,
				]
			);

			$this->add_control(
				'equipments',
				[
					'label'       => 'Equipments',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $equipment_repeater->get_controls(),
					'title_field' => '{{{ equipment_name }}}',
					'default'     => [
						[
							'equipment_name'        => 'CNC Machining Center',
							'equipment_description' => 'High-precision machining for mold cavities & components',
						],
						[
							'equipment_name'        => 'EDM & Wire Cut Machine',
							'equipment_description' => 'Process complex mold structures and fine details',
						],
						[
							'equipment_name'        => 'Precision Grinding Machine',
							'equipment_description' => 'Ensure high assembly accuracy of mold parts',
						],
						[
							'equipment_name'        => 'Injection Molding Machine',
							'equipment_description' => 'Mold testing and high-volume mass production',
						],
						[
							'equipment_name'        => 'Mold Polishing Equipment',
							'equipment_description' => 'Professional polishing for standard SPI surface finishes',
						],
						[
							'equipment_name'        => 'Inspection & Measuring Tools',
							'equipment_description' => 'Strict dimension testing and full quality control',
						],
					],
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();
			$section_title = isset( $settings['section_title'] ) ? $settings['section_title'] : '';
			$section_description = isset( $settings['section_description'] ) ? $settings['section_description'] : '';
			$equipments = isset( $settings['equipments'] ) && is_array( $settings['equipments'] ) ? array_values( $settings['equipments'] ) : [];

			if ( empty( $equipments ) ) {
				return;
			}

			$instance_id = $this->get_id();
			?>
			<section class="rd-tooling-equipment" data-rd-tooling-equipment="<?php echo esc_attr( $instance_id ); ?>">
				<div class="rd-tooling-equipment__container">
					<?php if ( $section_title !== '' || $section_description !== '' ) : ?>
						<div class="rd-tooling-equipment__header">
							<?php if ( $section_title !== '' ) : ?>
								<h2 class="rd-tooling-equipment__title"><?php echo esc_html( $section_title ); ?></h2>
							<?php endif; ?>
							<?php if ( $section_description !== '' ) : ?>
								<p class="rd-tooling-equipment__description"><?php echo esc_html( $section_description ); ?></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="rd-tooling-equipment__slider" data-equipment-slider>
						<button type="button" class="rd-tooling-equipment__nav rd-tooling-equipment__nav--prev" data-equipment-prev aria-label="Previous equipment items">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
								<polyline points="15 18 9 12 15 6"></polyline>
							</svg>
						</button>

						<div class="rd-tooling-equipment__track" data-equipment-track>
							<?php foreach ( $equipments as $equipment ) : ?>
								<?php
								$image_id = isset( $equipment['image']['id'] ) ? (int) $equipment['image']['id'] : 0;
								$equipment_name = isset( $equipment['equipment_name'] ) ? $equipment['equipment_name'] : '';
								$equipment_description = isset( $equipment['equipment_description'] ) ? $equipment['equipment_description'] : '';
								$image_args = [ 'class' => 'rd-tooling-equipment__image', 'loading' => 'lazy' ];
								?>
								<div class="rd-tooling-equipment__card" data-equipment-card>
									<div class="rd-tooling-equipment__image-wrap">
										<?php if ( $image_id ) : ?>
											<?php echo wp_get_attachment_image( $image_id, 'large', false, $image_args ); ?>
										<?php else : ?>
											<div class="rd-tooling-equipment__image-placeholder" aria-hidden="true"></div>
										<?php endif; ?>
									</div>
									<div class="rd-tooling-equipment__content">
										<?php if ( $equipment_name !== '' ) : ?>
											<h3 class="rd-tooling-equipment__card-title"><?php echo esc_html( $equipment_name ); ?></h3>
										<?php endif; ?>
										<?php if ( $equipment_description !== '' ) : ?>
											<p class="rd-tooling-equipment__card-desc"><?php echo esc_html( $equipment_description ); ?></p>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>

						<button type="button" class="rd-tooling-equipment__nav rd-tooling-equipment__nav--next" data-equipment-next aria-label="Next equipment items">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</button>
					</div>
				</div>
			</section>
			<?php
		}
	}
}

