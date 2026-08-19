<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Service_Hero_Banner_Widget' ) ) {
	class RD_Service_Hero_Banner_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-service-hero-banner';
		}

		public function get_title() {
			return 'Service Hero Banner';
		}

		public function get_icon() {
			return 'eicon-banner';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SERVICE_HERO_BANNER ];
		}

		public function get_script_depends() {
			return [ RD_Elementor_Widgets_Plugin::SCRIPT_HANDLE_SERVICE_HERO_BANNER ];
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
					'default'     => 'Custom Online CNC Machining Services',
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'default'     => 'Get instant online quotes for metal and plastic machined parts, from rapid prototyping to production. Based in China\'s manufacturing hubs, we ship globally with lead times as fast as 1 day.',
					'rows'        => 4,
					'label_block' => true,
				]
			);

			$list_repeater = new \Elementor\Repeater();
			$list_repeater->add_control(
				'text',
				[
					'label'       => 'Item Text',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);

			$this->add_control(
				'list_items',
				[
					'label'       => 'Feature List',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $list_repeater->get_controls(),
					'title_field' => '{{{ text }}}',
					'default'     => [
						[ 'text' => 'Tolerances as fine as ±0.02 mm' ],
						[ 'text' => 'ISO 9001:2015, ISO 13485, ISO 14001:2015, IATF 16949:2016 certified' ],
						[ 'text' => 'Lead time as fast as 1 day' ],
					],
				]
			);

			$this->add_control(
				'primary_button_text',
				[
					'label'   => 'Primary Button Text',
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => 'Get Instant Quote',
				]
			);

			$this->add_control(
				'primary_button_link',
				[
					'label'       => 'Primary Button Link',
					'type'        => \Elementor\Controls_Manager::URL,
					'placeholder' => 'https://',
					'default'     => [ 'url' => '#' ],
				]
			);

			$this->add_control(
				'secondary_button_text',
				[
					'label'   => 'Secondary Button Text',
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => 'Try with Sample Part',
				]
			);

			$this->add_control(
				'secondary_button_link',
				[
					'label'       => 'Secondary Button Link',
					'type'        => \Elementor\Controls_Manager::URL,
					'placeholder' => 'https://',
					'default'     => [ 'url' => '#' ],
				]
			);

			$this->add_control(
				'media_type',
				[
					'label'   => 'Media Type',
					'type'    => \Elementor\Controls_Manager::SELECT,
					'default' => 'image',
					'options' => [
						'image' => 'Image',
						'video' => 'Video',
					],
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
				'video_url',
				[
					'label'       => 'Video URL',
					'type'        => \Elementor\Controls_Manager::URL,
					'placeholder' => 'https://',
					'description' => 'YouTube, Vimeo, or direct MP4/WebM URL.',
					'condition'   => [
						'media_type' => 'video',
					],
				]
			);

			$this->add_control(
				'video_play_label',
				[
					'label'     => 'Play Button Label',
					'type'      => \Elementor\Controls_Manager::TEXT,
					'default'   => 'Play video',
					'condition' => [
						'media_type' => 'video',
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
				'accent_color',
				[
					'label'     => 'Accent Color',
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => '#ea543f',
					'selectors' => [
						'{{WRAPPER}} .rd-shb' => '--rd-shb-accent: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'heading_color',
				[
					'label'     => 'Heading Color',
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => '#000000',
					'selectors' => [
						'{{WRAPPER}} .rd-shb' => '--rd-shb-heading-color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'text_color',
				[
					'label'     => 'Text Color',
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => 'rgba(0, 0, 0, 0.68)',
					'selectors' => [
						'{{WRAPPER}} .rd-shb' => '--rd-shb-text-color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'media_radius',
				[
					'label'      => 'Media Border Radius',
					'type'       => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 48,
							'step' => 1,
						],
					],
					'default'    => [
						'unit' => 'px',
						'size' => 16,
					],
					'selectors'  => [
						'{{WRAPPER}} .rd-shb__media' => 'border-radius: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'media_aspect_ratio',
				[
					'label'   => 'Media Aspect Ratio',
					'type'    => \Elementor\Controls_Manager::SELECT,
					'default' => '4-3',
					'options' => [
						'4-3'  => '4:3',
						'16-9' => '16:9',
						'3-2'  => '3:2',
					],
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$heading              = isset( $settings['heading'] ) ? $settings['heading'] : '';
			$description          = isset( $settings['description'] ) ? $settings['description'] : '';
			$list_items           = isset( $settings['list_items'] ) && is_array( $settings['list_items'] ) ? $settings['list_items'] : [];
			$primary_button_text  = isset( $settings['primary_button_text'] ) ? $settings['primary_button_text'] : '';
			$secondary_button_text = isset( $settings['secondary_button_text'] ) ? $settings['secondary_button_text'] : '';
			$media_type           = isset( $settings['media_type'] ) ? $settings['media_type'] : 'image';
			$image                = isset( $settings['image'] ) ? $settings['image'] : [];
			$video_url            = isset( $settings['video_url']['url'] ) ? trim( (string) $settings['video_url']['url'] ) : '';
			$video_play_label     = isset( $settings['video_play_label'] ) ? $settings['video_play_label'] : 'Play video';
			$aspect_ratio         = isset( $settings['media_aspect_ratio'] ) ? $settings['media_aspect_ratio'] : '4-3';

			$aspect_map = [
				'4-3'  => '4 / 3',
				'16-9' => '16 / 9',
				'3-2'  => '3 / 2',
			];
			$aspect_value = isset( $aspect_map[ $aspect_ratio ] ) ? $aspect_map[ $aspect_ratio ] : '4 / 3';

			$primary_button_attrs = $this->get_link_attributes( $settings['primary_button_link'] ?? [] );
			$secondary_button_attrs = $this->get_link_attributes( $settings['secondary_button_link'] ?? [] );

			$instance_id = 'rd-shb-' . $this->get_id();
			?>
			<section class="rd-shb" data-rd-shb-id="<?php echo esc_attr( $instance_id ); ?>" aria-labelledby="<?php echo esc_attr( $instance_id . '-title' ); ?>">
				<div class="rd-shb__container">
					<div class="rd-shb__content">
						<?php if ( $heading !== '' ) : ?>
							<h1 class="rd-shb__heading" id="<?php echo esc_attr( $instance_id . '-title' ); ?>">
								<?php echo esc_html( $heading ); ?>
							</h1>
						<?php endif; ?>

						<?php if ( $description !== '' ) : ?>
							<p class="rd-shb__description">
								<?php echo esc_html( $description ); ?>
							</p>
						<?php endif; ?>

						<?php if ( ! empty( $list_items ) ) : ?>
							<ul class="rd-shb__list">
								<?php foreach ( $list_items as $item ) : ?>
									<?php
									$text = isset( $item['text'] ) ? trim( (string) $item['text'] ) : '';
									if ( $text === '' ) {
										continue;
									}
									?>
									<li class="rd-shb__list-item">
										<span class="rd-shb__list-check" aria-hidden="true">
											<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
										</span>
										<?php echo esc_html( $text ); ?>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<?php if ( $primary_button_text !== '' || $secondary_button_text !== '' ) : ?>
							<div class="rd-shb__actions">
								<?php if ( $primary_button_text !== '' ) : ?>
									<a class="rd-shb__btn rd-shb__btn--primary" <?php echo $primary_button_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
										<?php echo esc_html( $primary_button_text ); ?>
									</a>
								<?php endif; ?>
								<?php if ( $secondary_button_text !== '' ) : ?>
									<a class="rd-shb__btn rd-shb__btn--secondary" <?php echo $secondary_button_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
										<?php echo esc_html( $secondary_button_text ); ?>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="rd-shb__media" style="--rd-shb-media-aspect: <?php echo esc_attr( $aspect_value ); ?>;">
						<?php if ( $media_type === 'image' ) : ?>
							<?php if ( ! empty( $image['id'] ) ) : ?>
								<?php
								echo wp_get_attachment_image(
									(int) $image['id'],
									'large',
									false,
									[
										'class'        => 'rd-shb__media-img',
										'loading'      => 'eager',
										'fetchpriority' => 'high',
										'decoding'     => 'async',
									]
								);
								?>
							<?php else : ?>
								<div class="rd-shb__media-placeholder"></div>
							<?php endif; ?>
						<?php elseif ( $media_type === 'video' ) : ?>
							<div class="rd-shb__media-video" data-video-url="<?php echo esc_url( $video_url ); ?>">
								<button class="rd-shb__media-play" type="button" aria-label="<?php echo esc_attr( $video_play_label ); ?>">
									<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 6.6v10.8L18 12 9 6.6Z"/></svg>
								</button>
							</div>
						<?php endif; ?>
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
