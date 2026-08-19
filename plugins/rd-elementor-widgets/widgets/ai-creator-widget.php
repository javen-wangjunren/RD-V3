<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_AI_Creator_Widget' ) ) {
	class RD_AI_Creator_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-ai-creator';
		}

		public function get_title() {
			return 'AI Creator';
		}

		public function get_icon() {
			return 'eicon-slider-push';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_AI_CREATOR ];
		}

		public function get_script_depends() {
			return [ RD_Elementor_Widgets_Plugin::SCRIPT_HANDLE_AI_CREATOR ];
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
					'default'     => 'All-in-One AI for Product Development',
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 3,
					'default'     => 'From idea generation to engineering validation and production readiness—everything you need in a single workflow.',
					'label_block' => true,
				]
			);

			$this->add_control(
				'background_style',
				[
					'label'   => 'Background',
					'type'    => \Elementor\Controls_Manager::SELECT,
					'default' => 'gradient',
					'options' => [
						'gradient' => 'Gradient',
						'none'     => 'None',
					],
				]
			);

			$card_repeater = new \Elementor\Repeater();
			$card_repeater->add_control(
				'title',
				[
					'label'       => 'Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$card_repeater->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 3,
					'label_block' => true,
				]
			);
			$card_repeater->add_control(
				'image',
				[
					'label'   => 'Image',
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => '',
					],
				]
			);
			$card_repeater->add_control(
				'is_new_release',
				[
					'label'        => 'New Release',
					'type'         => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default'      => '',
				]
			);
			$card_repeater->add_control(
				'new_tag_text',
				[
					'label'       => 'New Tag Text',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'New',
					'label_block' => true,
					'condition'   => [
						'is_new_release' => 'yes',
					],
				]
			);

			$this->add_control(
				'cards',
				[
					'label'       => 'Cards',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $card_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
					'default'     => [
						[
							'title'          => 'AI-PRD Generator',
							'description'    => 'AI walks you through product requirements, exports a clear spec sheet – ready to share or refine.',
							'is_new_release' => 'yes',
							'new_tag_text'   => 'New',
						],
						[
							'title'       => '3D Model Gen',
							'description' => 'Turn renders into parametric STEP models. Adjust dimensions online, prep for manufacturing.',
						],
						[
							'title'       => 'DFM Analysis',
							'description' => 'AI checks wall thickness, draft angles, interferences – delivers a preliminary report to catch issues early.',
						],
						[
							'title'       => 'Process & Material',
							'description' => 'Compare CNC, 3D printing, injection molding – costs, lead times, and the best fit for your design.',
						],
					],
				]
			);

			$this->add_control(
				'autoplay_interval_ms',
				[
					'label'   => 'Autoplay Interval (ms)',
					'type'    => \Elementor\Controls_Manager::NUMBER,
					'default' => 2000,
					'min'     => 500,
					'step'    => 100,
				]
			);

			$this->add_control(
				'pause_on_hover',
				[
					'label'        => 'Pause on Hover',
					'type'         => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default'      => 'yes',
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$heading = isset( $settings['heading'] ) ? $settings['heading'] : '';
			$description = isset( $settings['description'] ) ? $settings['description'] : '';
			$background_style = isset( $settings['background_style'] ) ? $settings['background_style'] : 'gradient';
			$cards = isset( $settings['cards'] ) && is_array( $settings['cards'] ) ? $settings['cards'] : [];
			$interval = isset( $settings['autoplay_interval_ms'] ) ? (int) $settings['autoplay_interval_ms'] : 2000;
			$pause_on_hover = isset( $settings['pause_on_hover'] ) && $settings['pause_on_hover'] === 'yes';

			if ( $interval < 500 ) {
				$interval = 500;
			}

			$instance_id = $this->get_id();
			$data_settings = [
				'interval' => $interval,
				'pauseOnHover' => $pause_on_hover ? 1 : 0,
			];
			?>
			<section class="rd-ai-creator<?php echo $background_style === 'gradient' ? ' rd-ai-creator--gradient' : ''; ?>" data-rd-ai-creator="<?php echo esc_attr( $instance_id ); ?>" data-settings="<?php echo esc_attr( wp_json_encode( $data_settings ) ); ?>">
				<div class="rd-ai-creator__inner">
					<div class="rd-ai-creator__text">
						<h2 class="rd-ai-creator__heading"><?php echo esc_html( $heading ); ?></h2>
						<p class="rd-ai-creator__description"><?php echo esc_html( $description ); ?></p>
					</div>

					<div class="rd-ai-creator__carousel" data-carousel>
						<div class="rd-ai-creator__track" data-track>
							<?php foreach ( $cards as $card ) : ?>
								<?php
								$title = isset( $card['title'] ) ? $card['title'] : '';
								$desc = isset( $card['description'] ) ? $card['description'] : '';
								$is_new = isset( $card['is_new_release'] ) && $card['is_new_release'] === 'yes';
								$tag_text = isset( $card['new_tag_text'] ) ? $card['new_tag_text'] : 'New';
								$image_id = isset( $card['image']['id'] ) ? (int) $card['image']['id'] : 0;
								?>
								<div class="rd-ai-creator__card<?php echo $is_new ? ' rd-ai-creator__card--new' : ''; ?>">
									<div class="rd-ai-creator__image">
										<?php
										if ( $image_id ) {
											echo wp_get_attachment_image( $image_id, 'large', false, [ 'class' => 'rd-ai-creator__img', 'loading' => 'lazy' ] );
										} else {
											echo '<div class="rd-ai-creator__img-placeholder"></div>';
										}
										?>
									</div>
									<div class="rd-ai-creator__card-content">
										<div class="rd-ai-creator__card-title-row">
											<span class="rd-ai-creator__card-title"><?php echo esc_html( $title ); ?></span>
											<?php if ( $is_new ) : ?>
												<span class="rd-ai-creator__tag"><?php echo esc_html( $tag_text ); ?></span>
											<?php endif; ?>
										</div>
										<p class="rd-ai-creator__card-desc"><?php echo esc_html( $desc ); ?></p>
									</div>
								</div>
							<?php endforeach; ?>
						</div>

						<div class="rd-ai-creator__dots" data-dots></div>
					</div>
				</div>
			</section>
			<?php
		}
	}
}

