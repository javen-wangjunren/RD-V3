<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Solution_Workflow_Widget' ) ) {
	class RD_Solution_Workflow_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-solution-workflow';
		}

		public function get_title() {
			return 'Solution Workflow';
		}

		public function get_icon() {
			return 'eicon-flow';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SOLUTION_WORKFLOW ];
		}

		private function get_step_palette() {
			return [
				[ 'color' => '#FADBD8', 'percent' => '5%' ],
				[ 'color' => '#F5B7B1', 'percent' => '15%' ],
				[ 'color' => '#F08C82', 'percent' => '15%' ],
				[ 'color' => '#EA543F', 'percent' => '30%' ],
				[ 'color' => '#D14839', 'percent' => '17.5%' ],
				[ 'color' => '#B83C2E', 'percent' => '17.5%' ],
			];
		}

		private function get_step_style( $index ) {
			$palette = $this->get_step_palette();
			if ( isset( $palette[ $index ] ) ) {
				return $palette[ $index ];
			}

			$last = end( $palette );
			return [ 'color' => $last['color'], 'percent' => '0%' ];
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
					'default'     => 'JDM One-Stop Service Workflow',
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => 'From product idea to finished device. Each block below reflects its share of a typical full-device development cycle.',
					'label_block' => true,
				]
			);

			$step_repeater = new \Elementor\Repeater();
			$step_repeater->add_control(
				'short_label',
				[
					'label'       => 'Short Label',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'description' => 'Shown inside the workflow bar segment.',
					'label_block' => true,
				]
			);
			$step_repeater->add_control(
				'duration',
				[
					'label'       => 'Duration',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'description' => 'Shown as a pill inside the card.',
					'label_block' => true,
				]
			);
			$step_repeater->add_control(
				'title',
				[
					'label'       => 'Card Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$step_repeater->add_control(
				'description',
				[
					'label'       => 'Card Description',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'label_block' => true,
				]
			);

			$this->add_control(
				'steps',
				[
					'label'       => 'Workflow Steps',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $step_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
					'default'     => [
						[
							'short_label' => 'Requirements',
							'duration'    => '1-2 Days',
							'title'       => 'Requirements & Feasibility',
							'description' => 'Define product concept, specs, application, and process feasibility. Output a tailored JDM proposal.',
						],
						[
							'short_label' => 'Design',
							'duration'    => '3-7 Days',
							'title'       => 'System Design Finalization',
							'description' => 'Lock mechanical housing, PCB architecture, thermal plan, and assembly logic together.',
						],
						[
							'short_label' => 'DFM Review',
							'duration'    => 'DFM Review',
							'title'       => 'Collaborative DFM Optimization',
							'description' => 'Validate PCB electrical performance, machining paths, injection draft, and assembly sequence.',
						],
						[
							'short_label' => 'Prototype',
							'duration'    => '5-10 Days',
							'title'       => 'Prototype Integration & Validation',
							'description' => 'Produce PCBs, machine housings, integrate SMT, assemble, and run functional and reliability tests.',
						],
						[
							'short_label' => 'Iteration',
							'duration'    => 'Iteration',
							'title'       => 'Process Freezing',
							'description' => 'Resolve test findings, refine structure and electronics together, and lock the production standard.',
						],
						[
							'short_label' => 'Delivery',
							'duration'    => 'Delivery',
							'title'       => 'Pilot Run & Product Delivery',
							'description' => 'Validate volume stability, run standardized production, and ship finished devices with full reports.',
						],
					],
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings    = $this->get_settings_for_display();
			$heading     = isset( $settings['heading'] ) ? $settings['heading'] : '';
			$description = isset( $settings['description'] ) ? $settings['description'] : '';
			$steps       = isset( $settings['steps'] ) && is_array( $settings['steps'] ) ? $settings['steps'] : [];
			?>
			<section class="rd-solution-workflow">
				<div class="rd-solution-workflow__container">

					<?php if ( $heading !== '' || $description !== '' ) : ?>
						<div class="rd-solution-workflow__header">
							<?php if ( $heading !== '' ) : ?>
								<h2 class="rd-solution-workflow__title"><?php echo esc_html( $heading ); ?></h2>
							<?php endif; ?>
							<?php if ( $description !== '' ) : ?>
								<div class="rd-solution-workflow__description"><?php echo wp_kses_post( $description ); ?></div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $steps ) ) : ?>
						<div class="rd-solution-workflow__bar">
							<?php foreach ( $steps as $index => $step ) : ?>
								<?php
								$step_number = $index + 1;
								$number_text = sprintf( '%02d', $step_number );
								$style       = $this->get_step_style( $index );
								$short_label = isset( $step['short_label'] ) ? $step['short_label'] : '';
								$bar_style   = sprintf( 'flex: 0 0 %s; background-color: %s;', esc_attr( $style['percent'] ), esc_attr( $style['color'] ) );
								?>
								<div class="rd-solution-workflow__bar-segment" style="<?php echo esc_attr( $bar_style ); ?>">
									<span class="rd-solution-workflow__segment-number"><?php echo esc_html( $number_text ); ?></span>
									<?php if ( $short_label !== '' ) : ?>
										<span class="rd-solution-workflow__segment-label"><?php echo esc_html( $short_label ); ?></span>
									<?php endif; ?>
									<span class="rd-solution-workflow__segment-percent"><?php echo esc_html( $style['percent'] ); ?></span>
								</div>
							<?php endforeach; ?>
						</div>

						<div class="rd-solution-workflow__cards">
							<?php foreach ( $steps as $index => $step ) : ?>
								<?php
								$step_number      = $index + 1;
								$number_text      = sprintf( '%02d', $step_number );
								$style            = $this->get_step_style( $index );
								$duration         = isset( $step['duration'] ) ? $step['duration'] : '';
								$title            = isset( $step['title'] ) ? $step['title'] : '';
								$step_description = isset( $step['description'] ) ? $step['description'] : '';
								?>
								<div class="rd-solution-workflow__card">
									<div class="rd-solution-workflow__card-bar" style="background-color: <?php echo esc_attr( $style['color'] ); ?>"></div>
									<div class="rd-solution-workflow__card-body">
										<div class="rd-solution-workflow__card-meta">
											<span class="rd-solution-workflow__card-number"><?php echo esc_html( $number_text ); ?></span>
											<?php if ( $duration !== '' ) : ?>
												<span class="rd-solution-workflow__card-duration"><?php echo esc_html( $duration ); ?></span>
											<?php endif; ?>
										</div>
										<?php if ( $title !== '' ) : ?>
											<h3 class="rd-solution-workflow__card-title"><?php echo esc_html( $title ); ?></h3>
										<?php endif; ?>
										<?php if ( $step_description !== '' ) : ?>
											<div class="rd-solution-workflow__card-desc"><?php echo wp_kses_post( $step_description ); ?></div>
										<?php endif; ?>
										<div class="rd-solution-workflow__card-percent">~<?php echo esc_html( $style['percent'] ); ?> of cycle</div>
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
