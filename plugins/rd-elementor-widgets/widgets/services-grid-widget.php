<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Services_Grid_Widget' ) ) {
	class RD_Services_Grid_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-services-grid';
		}

		public function get_title() {
			return 'Services Grid';
		}

		public function get_icon() {
			return 'eicon-posts-grid';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SERVICES_GRID ];
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
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => "RapidDirect Manufacturing Services<br>from Prototyping to Production",
					'label_block' => true,
				]
			);

			$this->add_control(
				'intro',
				[
					'label'       => 'Intro',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => 'With our own factory in Shenzhen and a strong network of vetted manufacturers across China, we offer a broad range of manufacturing capabilities — from CNC machining to injection molding, sheet metal, and 3D printing. Whether you need fast-turn prototypes or low- to high-volume production, we’re your trusted partner for complex, custom parts delivered with speed and precision.',
					'label_block' => true,
				]
			);

			$card_repeater = new \Elementor\Repeater();
			$card_repeater->add_control(
				'image',
				[
					'label' => 'Image',
					'type'  => \Elementor\Controls_Manager::MEDIA,
				]
			);
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
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'label_block' => true,
				]
			);
			$card_repeater->add_control(
				'link_url',
				[
					'label'       => 'Link URL',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'input_type'  => 'url',
					'placeholder' => 'https://',
					'label_block' => true,
				]
			);
			$card_repeater->add_control(
				'open_in_new',
				[
					'label'        => 'Open in New Tab',
					'type'         => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default'      => '',
				]
			);

			$this->add_control(
				'cards',
				[
					'label'       => 'Cards',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $card_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
				]
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'section_layout',
				[
					'label' => 'Layout',
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'layout_style',
				[
					'label'   => 'Layout Style',
					'type'    => \Elementor\Controls_Manager::SELECT,
					'default' => 'title_left_text_right',
					'options' => [
						'title_left_text_right' => 'Title Left / Text Right',
					],
				]
			);

			$this->add_control(
				'columns_desktop',
				[
					'label'   => 'Columns (Desktop)',
					'type'    => \Elementor\Controls_Manager::NUMBER,
					'default' => 4,
					'min'     => 1,
					'max'     => 6,
				]
			);
			$this->add_control(
				'columns_tablet',
				[
					'label'   => 'Columns (Tablet)',
					'type'    => \Elementor\Controls_Manager::NUMBER,
					'default' => 2,
					'min'     => 1,
					'max'     => 4,
				]
			);
			$this->add_control(
				'columns_mobile',
				[
					'label'   => 'Columns (Mobile)',
					'type'    => \Elementor\Controls_Manager::NUMBER,
					'default' => 1,
					'min'     => 1,
					'max'     => 2,
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name'     => 'section_background',
					'types'    => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .rd-services-grid',
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
				'hover_shadow_color',
				[
					'label'     => 'Hover Shadow Color',
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => 'rgba(0,0,0,0.12)',
					'selectors' => [
						'{{WRAPPER}} .rd-services-grid' => '--rd-sg-hover-shadow-color: {{VALUE}};',
					],
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$heading = isset( $settings['heading'] ) ? $settings['heading'] : '';
			$intro = isset( $settings['intro'] ) ? $settings['intro'] : '';
			$cards = isset( $settings['cards'] ) && is_array( $settings['cards'] ) ? $settings['cards'] : [];

			$cols_desktop = isset( $settings['columns_desktop'] ) ? (int) $settings['columns_desktop'] : 4;
			$cols_tablet = isset( $settings['columns_tablet'] ) ? (int) $settings['columns_tablet'] : 2;
			$cols_mobile = isset( $settings['columns_mobile'] ) ? (int) $settings['columns_mobile'] : 1;

			if ( $cols_desktop < 1 ) {
				$cols_desktop = 1;
			}
			if ( $cols_tablet < 1 ) {
				$cols_tablet = 1;
			}
			if ( $cols_mobile < 1 ) {
				$cols_mobile = 1;
			}

			$style = sprintf(
				'--rd-sg-cols:%d;--rd-sg-cols-tablet:%d;--rd-sg-cols-mobile:%d;',
				$cols_desktop,
				$cols_tablet,
				$cols_mobile
			);
			?>
			<section class="rd-services-grid" style="<?php echo esc_attr( $style ); ?>">
				<div class="rd-services-grid__container">
					<div class="rd-services-grid__header">
						<div class="rd-services-grid__heading">
							<?php echo wp_kses_post( $heading ); ?>
						</div>
						<div class="rd-services-grid__intro">
							<?php echo wp_kses_post( $intro ); ?>
						</div>
					</div>

					<?php if ( ! empty( $cards ) ) : ?>
						<div class="rd-services-grid__grid">
							<?php foreach ( $cards as $card ) : ?>
								<?php
								$title = isset( $card['title'] ) ? $card['title'] : '';
								$description = isset( $card['description'] ) ? $card['description'] : '';
								$image_id = isset( $card['image']['id'] ) ? (int) $card['image']['id'] : 0;
								$link_url = isset( $card['link_url'] ) ? trim( (string) $card['link_url'] ) : '';
								$open_in_new = isset( $card['open_in_new'] ) && $card['open_in_new'] === 'yes';

								$tag = $link_url !== '' ? 'a' : 'div';
								$attrs = '';
								if ( $tag === 'a' ) {
									$attrs .= ' href="' . esc_url( $link_url ) . '"';
									if ( $open_in_new ) {
										$attrs .= ' target="_blank" rel="noopener"';
									}
								}
								?>
								<<?php echo $tag; ?> class="rd-services-grid__card"<?php echo $attrs; ?>>
									<div class="rd-services-grid__card-image">
										<?php
										if ( $image_id ) {
											echo wp_get_attachment_image( $image_id, 'large', false, [ 'class' => 'rd-services-grid__img', 'loading' => 'lazy' ] );
										} else {
											echo '<div class="rd-services-grid__img-placeholder"></div>';
										}
										?>
									</div>
									<div class="rd-services-grid__card-body">
										<div class="rd-services-grid__card-title"><?php echo esc_html( $title ); ?></div>
										<div class="rd-services-grid__card-desc"><?php echo wp_kses_post( $description ); ?></div>
									</div>
								</<?php echo $tag; ?>>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
			<?php
		}
	}
}
