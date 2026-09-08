<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Service_Gallery_Widget' ) ) {
	class RD_Service_Gallery_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-service-gallery';
		}

		public function get_title() {
			return 'Service Gallery';
		}

		public function get_icon() {
			return 'eicon-gallery-grid';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SERVICE_GALLERY ];
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
					'default'     => 'Full-Spectrum Electronic Manufacturing Services',
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'default'     => 'One-stop PCB and electronic supporting solutions to support your hardware electronic design and mass production.',
					'rows'        => 3,
					'label_block' => true,
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'image',
				[
					'label'   => 'Image',
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [],
				]
			);

			$repeater->add_control(
				'title',
				[
					'label'       => 'Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Card Title',
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'default'     => 'Card description goes here.',
					'rows'        => 3,
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'cta_text',
				[
					'label'       => 'CTA Text',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Explore',
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'cta_link',
				[
					'label'       => 'CTA Link',
					'type'        => \Elementor\Controls_Manager::URL,
					'placeholder' => 'https://',
					'default'     => [ 'url' => '#' ],
				]
			);

			$this->add_control(
				'cards',
				[
					'label'       => 'Cards',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $repeater->get_controls(),
					'title_field' => '{{{ title }}}',
					'default'     => [
						[ 'title' => 'PCB Design', 'cta_text' => 'Explore PCB Design' ],
						[ 'title' => 'PCB Manufacturing', 'cta_text' => 'Explore PCB Manufacturing' ],
						[ 'title' => 'PCB Assembly (PCBA)', 'cta_text' => 'Explore PCBA Service' ],
						[ 'title' => 'Component Sourcing', 'cta_text' => 'Explore Component Sourcing' ],
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
				'background_color',
				[
					'label'     => 'Background Color',
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .rd-sg' => '--rd-sg-bg: {{VALUE}};',
					],
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$heading     = isset( $settings['heading'] ) ? trim( (string) $settings['heading'] ) : '';
			$description = isset( $settings['description'] ) ? trim( (string) $settings['description'] ) : '';
			$cards       = isset( $settings['cards'] ) && is_array( $settings['cards'] ) ? $settings['cards'] : [];

			$valid_cards = [];
			foreach ( $cards as $card ) {
				$title = isset( $card['title'] ) ? trim( (string) $card['title'] ) : '';
				if ( $title !== '' ) {
					$valid_cards[] = $card;
				}
			}

			if ( empty( $valid_cards ) ) {
				return;
			}

			$instance_id = 'rd-sg-' . $this->get_id();
			?>
			<section class="rd-sg" data-rd-sg-id="<?php echo esc_attr( $instance_id ); ?>">
				<div class="rd-sg__container">
					<?php if ( $heading !== '' || $description !== '' ) : ?>
						<header class="rd-sg__header">
							<?php if ( $heading !== '' ) : ?>
								<h2 class="rd-sg__heading"><?php echo esc_html( $heading ); ?></h2>
							<?php endif; ?>
							<?php if ( $description !== '' ) : ?>
								<p class="rd-sg__description"><?php echo esc_html( $description ); ?></p>
							<?php endif; ?>
						</header>
					<?php endif; ?>

					<div class="rd-sg__grid">
						<?php foreach ( $valid_cards as $card ) : ?>
							<?php
							$card_title       = isset( $card['title'] ) ? trim( (string) $card['title'] ) : '';
							$card_description = isset( $card['description'] ) ? trim( (string) $card['description'] ) : '';
							$cta_text         = isset( $card['cta_text'] ) ? trim( (string) $card['cta_text'] ) : '';
							$cta_attrs        = $this->get_link_attributes( $card['cta_link'] ?? [] );
							?>
							<article class="rd-sg__card">
								<div class="rd-sg__card-media">
									<?php if ( ! empty( $card['image']['id'] ) ) : ?>
										<?php
										echo wp_get_attachment_image(
											(int) $card['image']['id'],
											'large',
											false,
											[
												'alt'      => esc_attr( $card_title ),
												'loading'  => 'lazy',
												'decoding' => 'async',
											]
										);
										?>
									<?php elseif ( ! empty( $card['image']['url'] ) ) : ?>
										<img src="<?php echo esc_url( $card['image']['url'] ); ?>" alt="<?php echo esc_attr( $card_title ); ?>" loading="lazy" decoding="async">
									<?php else : ?>
										<div class="rd-sg__card-media-placeholder"></div>
									<?php endif; ?>
								</div>
								<div class="rd-sg__card-body">
									<h4 class="rd-sg__card-title"><?php echo esc_html( $card_title ); ?></h4>
									<?php if ( $card_description !== '' ) : ?>
										<p class="rd-sg__card-desc"><?php echo esc_html( $card_description ); ?></p>
									<?php endif; ?>
									<?php if ( $cta_text !== '' && $cta_attrs !== '' ) : ?>
										<a class="rd-sg__card-link" <?php echo $cta_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
											<span><?php echo esc_html( $cta_text ); ?></span>
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
												<path d="M5 12h14"></path>
												<path d="m13 5 7 7-7 7"></path>
											</svg>
										</a>
									<?php endif; ?>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
			<?php
		}

		private function get_link_attributes( array $link ) {
			$url = isset( $link['url'] ) ? trim( (string) $link['url'] ) : '';
			if ( $url === '' ) {
				return '';
			}

			$attrs = [
				'href="' . esc_url( $url ) . '"',
			];

			$is_external  = ! empty( $link['is_external'] );
			$is_nofollow  = ! empty( $link['nofollow'] );
			$custom_attrs = isset( $link['custom_attributes'] ) ? (string) $link['custom_attributes'] : '';

			if ( $is_external ) {
				$attrs[] = 'target="_blank"';
				$attrs[] = 'rel="noopener' . ( $is_nofollow ? ' nofollow' : '' ) . '"';
			} elseif ( $is_nofollow ) {
				$attrs[] = 'rel="nofollow"';
			}

			if ( $custom_attrs !== '' ) {
				$attrs[] = $custom_attrs;
			}

			return implode( ' ', $attrs );
		}
	}
}
