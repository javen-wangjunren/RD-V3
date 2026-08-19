<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Tooling_Comparison_Widget' ) ) {
	class RD_Tooling_Comparison_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-tooling-comparison';
		}

		public function get_title() {
			return 'Tooling Comparison';
		}

		public function get_icon() {
			return 'eicon-info-box';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_TOOLING_COMPARISON ];
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
					'default'     => 'Hard Tooling VS Soft Tooling',
					'label_block' => true,
				]
			);

			$this->add_control(
				'section_description',
				[
					'label'       => 'Section Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 2,
					'default'     => 'Understand the differences and pick the right mold for your project',
					'label_block' => true,
				]
			);

			$this->add_control(
				'footer_note',
				[
					'label'       => 'Footer Note',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 2,
					'default'     => 'Choose hard tooling for long-term mass production, or soft tooling for fast prototyping and cost-saving trials.',
					'label_block' => true,
				]
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'section_left_card',
				[
					'label' => 'Hard Tooling Card',
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'left_card_title',
				[
					'label'       => 'Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Hard Tooling',
					'label_block' => true,
				]
			);

			$this->add_control(
				'left_card_tagline',
				[
					'label'       => 'Tagline',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'For Medium & High Volume Mass Production',
					'label_block' => true,
				]
			);

			$this->add_control(
				'left_card_icon_svg',
				[
					'label'       => 'Icon SVG',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 6,
					'default'     => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>',
					'label_block' => true,
				]
			);

			$left_features = new \Elementor\Repeater();
			$left_features->add_control(
				'label',
				[
					'label'       => 'Label',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$left_features->add_control(
				'value',
				[
					'label'       => 'Value',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 2,
					'label_block' => true,
				]
			);

			$this->add_control(
				'left_card_features',
				[
					'label'       => 'Features',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $left_features->get_controls(),
					'title_field' => '{{{ label }}}',
					'default'     => [
						[ 'label' => 'Material', 'value' => 'Premium Tool Steel (P20, H13, S136 etc.)' ],
						[ 'label' => 'Upfront Cost', 'value' => 'High' ],
						[ 'label' => 'Lead Time', 'value' => '8-12+ weeks' ],
						[ 'label' => 'Mold Lifespan', 'value' => '100,000 - 1,000,000+ shots' ],
						[ 'label' => 'Modification', 'value' => 'Difficult & Costly' ],
						[ 'label' => 'Best For', 'value' => 'Mass production, strict tolerance & complex parts' ],
					],
				]
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'section_right_card',
				[
					'label' => 'Soft Tooling Card',
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'right_card_title',
				[
					'label'       => 'Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Soft Tooling',
					'label_block' => true,
				]
			);

			$this->add_control(
				'right_card_tagline',
				[
					'label'       => 'Tagline',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'For Prototyping & Low-Volume Trial',
					'label_block' => true,
				]
			);

			$this->add_control(
				'right_card_icon_svg',
				[
					'label'       => 'Icon SVG',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 6,
					'default'     => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
					'label_block' => true,
				]
			);

			$right_features = new \Elementor\Repeater();
			$right_features->add_control(
				'label',
				[
					'label'       => 'Label',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$right_features->add_control(
				'value',
				[
					'label'       => 'Value',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 2,
					'label_block' => true,
				]
			);

			$this->add_control(
				'right_card_features',
				[
					'label'       => 'Features',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $right_features->get_controls(),
					'title_field' => '{{{ label }}}',
					'default'     => [
						[ 'label' => 'Material', 'value' => 'Aluminum Alloy (7075, QC-10 etc.)' ],
						[ 'label' => 'Upfront Cost', 'value' => 'Low' ],
						[ 'label' => 'Lead Time', 'value' => '2-4 weeks' ],
						[ 'label' => 'Mold Lifespan', 'value' => '100 - 10,000 shots' ],
						[ 'label' => 'Modification', 'value' => 'Easy & Affordable' ],
						[ 'label' => 'Best For', 'value' => 'NPI, Beta test & bridge production' ],
					],
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$section_title = isset( $settings['section_title'] ) ? $settings['section_title'] : '';
			$section_description = isset( $settings['section_description'] ) ? $settings['section_description'] : '';
			$footer_note = isset( $settings['footer_note'] ) ? $settings['footer_note'] : '';

			$left_card = [
				'title'    => isset( $settings['left_card_title'] ) ? $settings['left_card_title'] : '',
				'tagline'  => isset( $settings['left_card_tagline'] ) ? $settings['left_card_tagline'] : '',
				'icon_svg' => isset( $settings['left_card_icon_svg'] ) ? $settings['left_card_icon_svg'] : '',
				'features' => isset( $settings['left_card_features'] ) && is_array( $settings['left_card_features'] ) ? $settings['left_card_features'] : [],
				'type'     => 'hard',
			];

			$right_card = [
				'title'    => isset( $settings['right_card_title'] ) ? $settings['right_card_title'] : '',
				'tagline'  => isset( $settings['right_card_tagline'] ) ? $settings['right_card_tagline'] : '',
				'icon_svg' => isset( $settings['right_card_icon_svg'] ) ? $settings['right_card_icon_svg'] : '',
				'features' => isset( $settings['right_card_features'] ) && is_array( $settings['right_card_features'] ) ? $settings['right_card_features'] : [],
				'type'     => 'soft',
			];
			?>
			<section class="rd-tooling-comparison">
				<div class="rd-tooling-comparison__container">
					<?php if ( $section_title !== '' || $section_description !== '' ) : ?>
						<div class="rd-tooling-comparison__header">
							<?php if ( $section_title !== '' ) : ?>
								<h2 class="rd-tooling-comparison__title"><?php echo esc_html( $section_title ); ?></h2>
							<?php endif; ?>
							<?php if ( $section_description !== '' ) : ?>
								<p class="rd-tooling-comparison__description"><?php echo esc_html( $section_description ); ?></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="rd-tooling-comparison__grid">
						<?php $this->render_card( $left_card ); ?>
						<?php $this->render_card( $right_card ); ?>
					</div>

					<?php if ( $footer_note !== '' ) : ?>
						<div class="rd-tooling-comparison__footer">
							<p><?php echo esc_html( $footer_note ); ?></p>
						</div>
					<?php endif; ?>
				</div>
			</section>
			<?php
		}

		private function render_card( $card ) {
			$type = isset( $card['type'] ) && $card['type'] === 'soft' ? 'soft' : 'hard';
			$title = isset( $card['title'] ) ? $card['title'] : '';
			$tagline = isset( $card['tagline'] ) ? $card['tagline'] : '';
			$features = isset( $card['features'] ) && is_array( $card['features'] ) ? $card['features'] : [];
			$icon_svg = isset( $card['icon_svg'] ) ? $card['icon_svg'] : '';
			?>
			<div class="rd-tooling-comparison__card rd-tooling-comparison__card--<?php echo esc_attr( $type ); ?>">
				<div class="rd-tooling-comparison__card-header">
					<?php if ( $icon_svg !== '' ) : ?>
						<div class="rd-tooling-comparison__icon-box">
							<?php echo $this->get_sanitized_svg( $icon_svg ); ?>
						</div>
					<?php endif; ?>
					<?php if ( $title !== '' ) : ?>
						<h3 class="rd-tooling-comparison__card-title"><?php echo esc_html( $title ); ?></h3>
					<?php endif; ?>
				</div>

				<?php if ( $tagline !== '' ) : ?>
					<div class="rd-tooling-comparison__tagline"><?php echo esc_html( $tagline ); ?></div>
				<?php endif; ?>

				<?php if ( ! empty( $features ) ) : ?>
					<ul class="rd-tooling-comparison__feature-list">
						<?php foreach ( $features as $feature ) : ?>
							<?php
							$label = isset( $feature['label'] ) ? $feature['label'] : '';
							$value = isset( $feature['value'] ) ? $feature['value'] : '';
							if ( $label === '' && $value === '' ) {
								continue;
							}
							?>
							<li class="rd-tooling-comparison__feature-item">
								<?php if ( $label !== '' ) : ?>
									<span class="rd-tooling-comparison__feature-label"><?php echo esc_html( $label ); ?>:</span>
								<?php endif; ?>
								<?php if ( $value !== '' ) : ?>
									<span class="rd-tooling-comparison__feature-value"><?php echo esc_html( $value ); ?></span>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<?php
		}

		private function get_sanitized_svg( $svg ) {
			$allowed = [
				'svg'      => [
					'xmlns'             => true,
					'width'             => true,
					'height'            => true,
					'viewbox'           => true,
					'fill'              => true,
					'stroke'            => true,
					'stroke-width'      => true,
					'stroke-linecap'    => true,
					'stroke-linejoin'   => true,
					'aria-hidden'       => true,
					'role'              => true,
					'class'             => true,
				],
				'path'     => [
					'd'                 => true,
					'fill'              => true,
					'stroke'            => true,
					'stroke-width'      => true,
					'stroke-linecap'    => true,
					'stroke-linejoin'   => true,
				],
				'polyline' => [
					'points'            => true,
					'fill'              => true,
					'stroke'            => true,
					'stroke-width'      => true,
					'stroke-linecap'    => true,
					'stroke-linejoin'   => true,
				],
				'polygon'  => [
					'points'            => true,
					'fill'              => true,
					'stroke'            => true,
					'stroke-width'      => true,
					'stroke-linecap'    => true,
					'stroke-linejoin'   => true,
				],
				'line'     => [
					'x1'                => true,
					'x2'                => true,
					'y1'                => true,
					'y2'                => true,
					'fill'              => true,
					'stroke'            => true,
					'stroke-width'      => true,
					'stroke-linecap'    => true,
					'stroke-linejoin'   => true,
				],
				'circle'   => [
					'cx'                => true,
					'cy'                => true,
					'r'                 => true,
					'fill'              => true,
					'stroke'            => true,
					'stroke-width'      => true,
				],
			];

			return wp_kses( $svg, $allowed );
		}
	}
}
