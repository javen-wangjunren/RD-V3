<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Tooling_Showcase_Widget' ) ) {
	class RD_Tooling_Showcase_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-tooling-showcase';
		}

		public function get_title() {
			return 'Tooling Showcase';
		}

		public function get_icon() {
			return 'eicon-gallery-grid';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_TOOLING_SHOWCASE ];
		}

		public function get_script_depends() {
			return [ RD_Elementor_Widgets_Plugin::SCRIPT_HANDLE_TOOLING_SHOWCASE ];
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
					'default'     => 'Featured Tooling Project Showcase',
					'label_block' => true,
				]
			);

			$this->add_control(
				'section_description',
				[
					'label'       => 'Section Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 3,
					'default'     => 'Explore real tooling and molded-part projects across industries, proving our capability to deliver reliable hard tooling solutions from prototype validation to mass production.',
					'label_block' => true,
				]
			);

			$case_repeater = new \Elementor\Repeater();
			$case_repeater->add_control(
				'image',
				[
					'label' => 'Image',
					'type'  => \Elementor\Controls_Manager::MEDIA,
				]
			);
			$case_repeater->add_control(
				'image_alt',
				[
					'label'       => 'Image Alt',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$case_repeater->add_control(
				'project_name',
				[
					'label'       => 'Project Name',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$case_repeater->add_control(
				'industry',
				[
					'label'       => 'Industry',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);

			$this->add_control(
				'cases',
				[
					'label'       => 'Cases',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $case_repeater->get_controls(),
					'title_field' => '{{{ project_name }}}',
					'default'     => [
						[
							'project_name' => 'Automotive Bumper Mold',
							'industry'     => 'Automotive',
						],
						[
							'project_name' => 'Home Appliance Housing Mold',
							'industry'     => 'Home Appliance',
						],
						[
							'project_name' => 'Consumer Electronics Structural Part Mold',
							'industry'     => 'Consumer Electronics',
						],
						[
							'project_name' => 'Industrial Equipment Cover Mold',
							'industry'     => 'Industrial Equipment',
						],
						[
							'project_name' => 'Medical Device Plastic Part Mold',
							'industry'     => 'Medical',
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
			$cases = isset( $settings['cases'] ) && is_array( $settings['cases'] ) ? array_values( $settings['cases'] ) : [];

			if ( empty( $cases ) ) {
				return;
			}

			$instance_id = $this->get_id();
			?>
			<section class="rd-tooling-showcase" data-rd-tooling-showcase="<?php echo esc_attr( $instance_id ); ?>">
				<div class="rd-tooling-showcase__container">
					<?php if ( $section_title !== '' || $section_description !== '' ) : ?>
						<div class="rd-tooling-showcase__header">
							<?php if ( $section_title !== '' ) : ?>
								<h2 class="rd-tooling-showcase__title"><?php echo esc_html( $section_title ); ?></h2>
							<?php endif; ?>
							<?php if ( $section_description !== '' ) : ?>
								<p class="rd-tooling-showcase__description"><?php echo esc_html( $section_description ); ?></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="rd-tooling-showcase__viewport" data-showcase-viewport>
						<div class="rd-tooling-showcase__track">
							<?php foreach ( $cases as $case ) : ?>
								<?php
								$image_id = isset( $case['image']['id'] ) ? (int) $case['image']['id'] : 0;
								$image_alt = isset( $case['image_alt'] ) ? $case['image_alt'] : '';
								$project_name = isset( $case['project_name'] ) ? $case['project_name'] : '';
								$industry = isset( $case['industry'] ) ? $case['industry'] : '';
								$image_args = [ 'class' => 'rd-tooling-showcase__image', 'loading' => 'lazy' ];
								if ( $image_alt !== '' ) {
									$image_args['alt'] = $image_alt;
								}
								?>
								<div class="rd-tooling-showcase__card" data-showcase-card>
									<div class="rd-tooling-showcase__image-wrap">
										<?php if ( $image_id ) : ?>
											<?php echo wp_get_attachment_image( $image_id, 'large', false, $image_args ); ?>
										<?php else : ?>
											<div class="rd-tooling-showcase__image-placeholder" aria-hidden="true"></div>
										<?php endif; ?>
									</div>
									<div class="rd-tooling-showcase__meta">
										<?php if ( $project_name !== '' ) : ?>
											<h3 class="rd-tooling-showcase__project-name"><?php echo esc_html( $project_name ); ?></h3>
										<?php endif; ?>
										<?php if ( $industry !== '' ) : ?>
											<p class="rd-tooling-showcase__industry"><?php echo esc_html( $industry ); ?></p>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<div class="rd-tooling-showcase__controls">
						<button type="button" class="rd-tooling-showcase__control" data-showcase-prev aria-label="Previous showcase items">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
								<polyline points="15 18 9 12 15 6"></polyline>
							</svg>
						</button>
						<button type="button" class="rd-tooling-showcase__control" data-showcase-next aria-label="Next showcase items">
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
