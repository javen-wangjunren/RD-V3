<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Capability_Showcase_Widget' ) ) {
	class RD_Capability_Showcase_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-capability-showcase';
		}

		public function get_title() {
			return 'Capability Showcase';
		}

		public function get_icon() {
			return 'eicon-image-box';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_CAPABILITY_SHOWCASE ];
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
					'default'     => 'From Mechanical Parts to Full Electromechanical Manufacturing',
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'default'     => 'The same trusted RapidDirect quality, now covering PCB design, PCBA and precision mechanical manufacturing.',
					'rows'        => 3,
					'label_block' => true,
				]
			);

			$image_repeater = new \Elementor\Repeater();

			$image_repeater->add_control(
				'image',
				[
					'label'   => 'Image',
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [],
				]
			);

			$category_repeater = new \Elementor\Repeater();

			$category_repeater->add_control(
				'label',
				[
					'label'       => 'Label',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Mechanical',
					'label_block' => true,
				]
			);

			$category_repeater->add_control(
				'title',
				[
					'label'       => 'Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Precision Equipment',
					'label_block' => true,
				]
			);

			$category_repeater->add_control(
				'gallery_style',
				[
					'label'   => 'Gallery Style',
					'type'    => \Elementor\Controls_Manager::SELECT,
					'default' => '2-3',
					'options' => [
						'2-3' => '2:3',
						'4-3' => '4:3',
					],
				]
			);

			$category_repeater->add_control(
				'images',
				[
					'label'       => 'Images',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $image_repeater->get_controls(),
					'title_field' => 'Image #{{{ _current_item_no }}}',
					'default'     => [
						[],
						[],
						[],
						[],
					],
				]
			);

			$this->add_control(
				'categories',
				[
					'label'       => 'Categories',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $category_repeater->get_controls(),
					'title_field' => '{{{ label }}} — {{{ title }}}',
					'default'     => [
						[
							'label'         => 'Mechanical',
							'title'         => 'Precision Equipment',
							'gallery_style' => '2-3',
						],
						[
							'label'         => 'Electronic',
							'title'         => 'PCB & PCBA',
							'gallery_style' => '4-3',
						],
					],
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings   = $this->get_settings_for_display();
			$heading    = isset( $settings['heading'] ) ? trim( (string) $settings['heading'] ) : '';
			$description = isset( $settings['description'] ) ? trim( (string) $settings['description'] ) : '';
			$categories = isset( $settings['categories'] ) && is_array( $settings['categories'] ) ? $settings['categories'] : [];

			$valid_categories = [];
			foreach ( $categories as $category ) {
				$title = isset( $category['title'] ) ? trim( (string) $category['title'] ) : '';
				if ( $title === '' ) {
					continue;
				}

				$valid_images = [];
				$images       = isset( $category['images'] ) && is_array( $category['images'] ) ? $category['images'] : [];
				foreach ( $images as $image ) {
					if ( ! empty( $image['image']['url'] ) || ! empty( $image['image']['id'] ) ) {
						$valid_images[] = $image;
					}
				}

				if ( ! empty( $valid_images ) ) {
					$category['valid_images'] = $valid_images;
					$valid_categories[]       = $category;
				}
			}

			if ( empty( $valid_categories ) ) {
				return;
			}

			$instance_id = 'rd-cs-' . $this->get_id();
			?>
			<section class="rd-cs" data-rd-cs-id="<?php echo esc_attr( $instance_id ); ?>">
				<div class="rd-cs__container">
					<?php if ( $heading !== '' || $description !== '' ) : ?>
						<header class="rd-cs__header">
							<?php if ( $heading !== '' ) : ?>
								<h2 class="rd-cs__heading"><?php echo esc_html( $heading ); ?></h2>
							<?php endif; ?>
							<?php if ( $description !== '' ) : ?>
								<p class="rd-cs__description"><?php echo esc_html( $description ); ?></p>
							<?php endif; ?>
						</header>
					<?php endif; ?>

					<div class="rd-cs__grid">
						<?php foreach ( $valid_categories as $category ) : ?>
							<?php
							$label        = isset( $category['label'] ) ? trim( (string) $category['label'] ) : '';
							$title        = isset( $category['title'] ) ? trim( (string) $category['title'] ) : '';
							$gallery_style = isset( $category['gallery_style'] ) ? $category['gallery_style'] : '2-3';
							$gallery_class = 'rd-cs__gallery rd-cs__gallery--ratio-' . sanitize_html_class( $gallery_style );
							?>
							<article class="rd-cs__category">
								<div class="rd-cs__category-header">
									<?php if ( $label !== '' ) : ?>
										<span class="rd-cs__category-label"><?php echo esc_html( $label ); ?></span>
									<?php endif; ?>
									<?php if ( $title !== '' ) : ?>
										<h3 class="rd-cs__category-title"><?php echo esc_html( $title ); ?></h3>
									<?php endif; ?>
								</div>
								<div class="<?php echo esc_attr( $gallery_class ); ?>">
									<?php foreach ( $category['valid_images'] as $image ) : ?>
										<div class="rd-cs__item">
											<?php if ( ! empty( $image['image']['id'] ) ) : ?>
												<?php
												echo wp_get_attachment_image(
													(int) $image['image']['id'],
													'large',
													false,
													[
														'loading'  => 'lazy',
														'decoding' => 'async',
													]
												);
												?>
											<?php elseif ( ! empty( $image['image']['url'] ) ) : ?>
												<img src="<?php echo esc_url( $image['image']['url'] ); ?>" alt="" loading="lazy" decoding="async">
											<?php endif; ?>
										</div>
									<?php endforeach; ?>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
			<?php
		}
	}
}
