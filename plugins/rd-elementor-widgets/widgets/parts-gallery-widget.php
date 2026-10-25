<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Parts_Gallery_Widget' ) ) {
	class RD_Parts_Gallery_Widget extends \Elementor\Widget_Base {
		const CTA_URL = 'https://app.rapiddirect.com/';

		public function get_name() {
			return 'rd-parts-gallery';
		}

		public function get_title() {
			return 'Parts Gallery (Marquee)';
		}

		public function get_icon() {
			return 'eicon-gallery-grid';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_PARTS_GALLERY ];
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
					'default'     => 'Parts We Have Machined',
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 3,
					'default'     => 'Every part below was cut and finished in our own shop — from single prototypes to low-volume production runs. Browse by material to see what our five-axis and three-axis centres can hold.',
					'label_block' => true,
				]
			);

			$item_repeater = new \Elementor\Repeater();
			$item_repeater->add_control(
				'image',
				[
					'label'   => 'Image',
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
			$item_repeater->add_control(
				'material',
				[
					'label'       => 'Material Name',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Aluminum 6061',
					'label_block' => true,
				]
			);

			$this->add_control(
				'items',
				[
					'label'       => 'Gallery Items',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $item_repeater->get_controls(),
					'title_field' => '{{{ material }}}',
					'default'     => [
						[
							'image'    => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
							'material' => 'Aluminum 6061',
						],
						[
							'image'    => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
							'material' => 'Aluminum 7075',
						],
						[
							'image'    => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
							'material' => 'Stainless 316L',
						],
						[
							'image'    => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
							'material' => 'Titanium Ti-6Al-4V',
						],
						[
							'image'    => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
							'material' => 'Inconel 718',
						],
						[
							'image'    => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
							'material' => 'Brass C360',
						],
					],
				]
			);

			$this->end_controls_section();
		}

		private function render_card( $item, $is_copy ) {
			$image_url = '';

			if ( isset( $item['image']['url'] ) && $item['image']['url'] !== '' ) {
				$image_url = $item['image']['url'];
			}

			$material = isset( $item['material'] ) ? $item['material'] : '';
			$alt      = $is_copy ? '' : $material;
			?>
			<figure class="rd-spg__card"<?php echo $is_copy ? ' aria-hidden="true"' : ''; ?>>
				<div class="rd-spg__thumb">
					<?php if ( $image_url !== '' ) : ?>
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" loading="lazy" />
					<?php endif; ?>
				</div>
				<?php if ( $material !== '' ) : ?>
					<figcaption>
						<div class="rd-spg__label"><?php echo esc_html( $material ); ?></div>
					</figcaption>
				<?php endif; ?>
			</figure>
			<?php
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$heading     = isset( $settings['heading'] ) ? $settings['heading'] : '';
			$description = isset( $settings['description'] ) ? $settings['description'] : '';
			$items       = isset( $settings['items'] ) && is_array( $settings['items'] ) ? $settings['items'] : [];
			?>
			<section class="rd-spg">

				<?php if ( $heading !== '' || $description !== '' ) : ?>
					<div class="rd-spg__container">
						<span class="rd-spg__overline">Part Showcase</span>
						<?php if ( $heading !== '' ) : ?>
							<h2 class="rd-spg__title"><?php echo esc_html( $heading ); ?></h2>
						<?php endif; ?>
						<?php if ( $description !== '' ) : ?>
							<p class="rd-spg__desc"><?php echo esc_html( $description ); ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $items ) ) : ?>
					<div class="rd-spg__marquee" role="region" aria-label="Gallery of machined parts">
						<div class="rd-spg__row">
							<div class="rd-spg__track">
								<?php
								foreach ( $items as $item ) {
									$this->render_card( $item, false );
								}
								foreach ( $items as $item ) {
									$this->render_card( $item, true );
								}
								?>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<div class="rd-spg__container">
					<div class="rd-spg__cta">
						<div>
							<h3 class="rd-spg__cta-title">Have a similar part?</h3>
							<p class="rd-spg__cta-text">Send us the drawing — we will tell you the process, tolerance and lead time it needs.</p>
						</div>
						<a class="rd-spg__btn" href="<?php echo esc_url( self::CTA_URL ); ?>" target="_blank" rel="noopener">
							Get Instant Quote
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<path d="M5 12h14M13 6l6 6-6 6" />
							</svg>
						</a>
					</div>
				</div>

			</section>
			<?php
		}
	}
}
