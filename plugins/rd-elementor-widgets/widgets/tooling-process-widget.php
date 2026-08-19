<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Tooling_Process_Widget' ) ) {
	class RD_Tooling_Process_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-tooling-process';
		}

		public function get_title() {
			return 'Tooling Process';
		}

		public function get_icon() {
			return 'eicon-time-line';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_TOOLING_PROCESS ];
		}

		public function get_script_depends() {
			return [ RD_Elementor_Widgets_Plugin::SCRIPT_HANDLE_TOOLING_PROCESS ];
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
					'default'     => 'Hard Tooling Process & Workflow',
					'label_block' => true,
				]
			);

			$this->add_control(
				'section_description',
				[
					'label'       => 'Section Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 3,
					'default'     => 'A transparent, highly-controlled manufacturing process to ensure your steel molds deliver millions of defect-free parts.',
					'label_block' => true,
				]
			);

			$steps_repeater = new \Elementor\Repeater();
			$steps_repeater->add_control(
				'step_nav_label',
				[
					'label'       => 'Timeline Label',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$steps_repeater->add_control(
				'step_number_label',
				[
					'label'       => 'Step Number Label',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$steps_repeater->add_control(
				'step_title',
				[
					'label'       => 'Step Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$steps_repeater->add_control(
				'step_description',
				[
					'label'       => 'Step Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 4,
					'label_block' => true,
				]
			);
			$steps_repeater->add_control(
				'step_image',
				[
					'label' => 'Step Image',
					'type'  => \Elementor\Controls_Manager::MEDIA,
				]
			);
			$steps_repeater->add_control(
				'step_image_alt',
				[
					'label'       => 'Step Image Alt',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$steps_repeater->add_control(
				'step_image_caption',
				[
					'label'       => 'Placeholder Text',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => '[ Photo Placeholder ]',
					'label_block' => true,
				]
			);

			$this->add_control(
				'steps',
				[
					'label'       => 'Steps',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $steps_repeater->get_controls(),
					'title_field' => '{{{ step_nav_label }}}',
					'default'     => [
						[
							'step_nav_label'     => 'Requirement Confirmation',
							'step_number_label'  => 'Step 1',
							'step_title'         => 'Requirement Confirmation',
							'step_description'   => 'Confirm product specs, volume and technical requirements to lay a solid foundation for the mold engineering process.',
							'step_image_caption' => '[ Photo: Specs/Docs ]',
						],
						[
							'step_nav_label'     => 'DFM Analysis',
							'step_number_label'  => 'Step 2',
							'step_title'         => 'DFM Analysis',
							'step_description'   => 'Avoid design defects and reduce trial mold risks through rigorous Design for Manufacturability (DFM) checks.',
							'step_image_caption' => '[ Photo: CAD/DFM Analysis ]',
						],
						[
							'step_nav_label'     => 'Mold Design',
							'step_number_label'  => 'Step 3',
							'step_title'         => 'Mold Design',
							'step_description'   => 'Complete professional hard mold structure design, including cooling channels, gating systems, and ejection mechanisms.',
							'step_image_caption' => '[ Photo: 3D Mold Design ]',
						],
						[
							'step_nav_label'     => 'CNC Machining',
							'step_number_label'  => 'Step 4',
							'step_title'         => 'CNC Machining',
							'step_description'   => 'Precision cutting for mold cavity and core parts using advanced 5-axis CNC and EDM machining centers.',
							'step_image_caption' => '[ Photo: CNC Machining Tool Steel ]',
						],
						[
							'step_nav_label'     => 'Heat Treatment & Polishing',
							'step_number_label'  => 'Step 5',
							'step_title'         => 'Heat Treatment & Polishing',
							'step_description'   => 'Improve hardness, durability and surface finish to ensure the mold withstands hundreds of thousands of injection cycles.',
							'step_image_caption' => '[ Photo: Heat Treatment & Polishing ]',
						],
						[
							'step_nav_label'     => 'Trial Mold & Testing',
							'step_number_label'  => 'Step 6',
							'step_title'         => 'Trial Mold & Testing',
							'step_description'   => 'Verify dimension, performance and product quality. We provide T1 samples for your final approval before mass production.',
							'step_image_caption' => '[ Photo: Injection Trial/Testing ]',
						],
						[
							'step_nav_label'     => 'Mass Production Delivery',
							'step_number_label'  => 'Step 7',
							'step_title'         => 'Mass Production Delivery',
							'step_description'   => 'Deliver qualified molds for formal mass production, guaranteeing consistent quality across the entire product lifecycle.',
							'step_image_caption' => '[ Photo: Final Molds Delivery ]',
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
			$steps = isset( $settings['steps'] ) && is_array( $settings['steps'] ) ? array_values( $settings['steps'] ) : [];

			if ( empty( $steps ) ) {
				return;
			}

			$instance_id = $this->get_id();
			?>
			<section class="rd-tooling-process" data-rd-tooling-process="<?php echo esc_attr( $instance_id ); ?>">
				<div class="rd-tooling-process__container">
					<?php if ( $section_title !== '' || $section_description !== '' ) : ?>
						<div class="rd-tooling-process__header">
							<?php if ( $section_title !== '' ) : ?>
								<h2 class="rd-tooling-process__title"><?php echo esc_html( $section_title ); ?></h2>
							<?php endif; ?>
							<?php if ( $section_description !== '' ) : ?>
								<p class="rd-tooling-process__description"><?php echo esc_html( $section_description ); ?></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="rd-tooling-process__layout">
						<div class="rd-tooling-process__timeline" role="tablist" aria-label="<?php echo esc_attr( $section_title !== '' ? $section_title : 'Tooling Process' ); ?>">
							<?php foreach ( $steps as $index => $step ) : ?>
								<?php
								$nav_label = isset( $step['step_nav_label'] ) ? $step['step_nav_label'] : '';
								$nav_label = $nav_label !== '' ? $nav_label : ( isset( $step['step_title'] ) ? $step['step_title'] : '' );
								$tab_id = 'rd-tooling-process-tab-' . $instance_id . '-' . $index;
								$panel_id = 'rd-tooling-process-panel-' . $instance_id . '-' . $index;
								$is_active = $index === 0;
								?>
								<button
									type="button"
									class="rd-tooling-process__step<?php echo $is_active ? ' is-active' : ''; ?>"
									data-step-index="<?php echo esc_attr( (string) $index ); ?>"
									id="<?php echo esc_attr( $tab_id ); ?>"
									role="tab"
									aria-controls="<?php echo esc_attr( $panel_id ); ?>"
									aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
									tabindex="<?php echo $is_active ? '0' : '-1'; ?>"
								>
									<span class="rd-tooling-process__step-dot"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
									<span class="rd-tooling-process__step-label"><?php echo esc_html( $nav_label ); ?></span>
								</button>
							<?php endforeach; ?>
						</div>

						<div class="rd-tooling-process__panel-wrap">
							<?php foreach ( $steps as $index => $step ) : ?>
								<?php
								$is_active = $index === 0;
								$panel_id = 'rd-tooling-process-panel-' . $instance_id . '-' . $index;
								$tab_id = 'rd-tooling-process-tab-' . $instance_id . '-' . $index;
								$step_number_label = isset( $step['step_number_label'] ) ? $step['step_number_label'] : '';
								$step_number_label = $step_number_label !== '' ? $step_number_label : 'Step ' . ( $index + 1 );
								$step_title = isset( $step['step_title'] ) ? $step['step_title'] : '';
								$step_description = isset( $step['step_description'] ) ? $step['step_description'] : '';
								$step_image_id = isset( $step['step_image']['id'] ) ? (int) $step['step_image']['id'] : 0;
								$step_image_alt = isset( $step['step_image_alt'] ) ? $step['step_image_alt'] : '';
								$step_image_caption = isset( $step['step_image_caption'] ) ? $step['step_image_caption'] : '';
								$image_args = [ 'class' => 'rd-tooling-process__image', 'loading' => 'lazy' ];
								if ( $step_image_alt !== '' ) {
									$image_args['alt'] = $step_image_alt;
								}
								?>
								<div
									class="rd-tooling-process__panel<?php echo $is_active ? ' is-active' : ''; ?>"
									data-panel-index="<?php echo esc_attr( (string) $index ); ?>"
									id="<?php echo esc_attr( $panel_id ); ?>"
									role="tabpanel"
									aria-labelledby="<?php echo esc_attr( $tab_id ); ?>"
									<?php echo $is_active ? '' : 'hidden'; ?>
								>
									<div class="rd-tooling-process__image-wrap">
										<?php if ( $step_image_id ) : ?>
											<?php echo wp_get_attachment_image( $step_image_id, 'large', false, $image_args ); ?>
										<?php else : ?>
											<div class="rd-tooling-process__image-placeholder">
												<?php echo esc_html( $step_image_caption !== '' ? $step_image_caption : '[ Photo Placeholder ]' ); ?>
											</div>
										<?php endif; ?>
									</div>
									<div class="rd-tooling-process__panel-text">
										<h3 class="rd-tooling-process__panel-title">
											<span class="rd-tooling-process__step-num"><?php echo esc_html( $step_number_label ); ?></span>
											<span><?php echo esc_html( $step_title ); ?></span>
										</h3>
										<p class="rd-tooling-process__panel-desc"><?php echo esc_html( $step_description ); ?></p>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</section>
			<?php
		}
	}
}
