<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Complete_Product_Showcase_Widget' ) ) {
	class RD_Complete_Product_Showcase_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-complete-product-showcase';
		}

		public function get_title() {
			return 'Complete Product Showcase';
		}

		public function get_icon() {
			return 'eicon-image-rollover';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_COMPLETE_PRODUCT_SHOWCASE ];
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
					'default'     => 'From Electronic & Mechanical Parts to Complete Product',
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'default'     => 'Design, fabricate, source and assemble — all under one partner.',
					'rows'        => 3,
					'label_block' => true,
				]
			);

			$this->add_control(
				'image',
				[
					'label'   => 'Image',
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [],
				]
			);

			$this->add_control(
				'image_alt',
				[
					'label'       => 'Image Alt Text',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Integrated electromechanical manufacturing process from design to final product',
					'label_block' => true,
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings    = $this->get_settings_for_display();
			$heading     = isset( $settings['heading'] ) ? trim( (string) $settings['heading'] ) : '';
			$description = isset( $settings['description'] ) ? trim( (string) $settings['description'] ) : '';
			$image       = isset( $settings['image'] ) ? $settings['image'] : [];
			$image_alt   = isset( $settings['image_alt'] ) ? trim( (string) $settings['image_alt'] ) : '';

			if ( empty( $image['url'] ) && empty( $image['id'] ) ) {
				return;
			}

			$instance_id = 'rd-cps-' . $this->get_id();
			?>
			<section class="rd-cps" data-rd-cps-id="<?php echo esc_attr( $instance_id ); ?>">
				<div class="rd-cps__container">
					<?php if ( $heading !== '' || $description !== '' ) : ?>
						<header class="rd-cps__header">
							<?php if ( $heading !== '' ) : ?>
								<h2 class="rd-cps__heading"><?php echo esc_html( $heading ); ?></h2>
							<?php endif; ?>
							<?php if ( $description !== '' ) : ?>
								<p class="rd-cps__description"><?php echo esc_html( $description ); ?></p>
							<?php endif; ?>
						</header>
					<?php endif; ?>

					<div class="rd-cps__media">
						<?php if ( ! empty( $image['id'] ) ) : ?>
							<?php
							echo wp_get_attachment_image(
								(int) $image['id'],
								'large',
								false,
								[
									'alt'      => esc_attr( $image_alt ),
									'loading'  => 'lazy',
									'decoding' => 'async',
								]
							);
							?>
						<?php elseif ( ! empty( $image['url'] ) ) : ?>
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" loading="lazy" decoding="async">
						<?php endif; ?>
					</div>
				</div>
			</section>
			<?php
		}
	}
}
