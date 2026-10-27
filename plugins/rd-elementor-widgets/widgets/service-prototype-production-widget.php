<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Service_Prototype_Production_Widget' ) ) {
	class RD_Service_Prototype_Production_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-service-prototype-production';
		}

		public function get_title() {
			return 'Service Prototype to Production';
		}

		public function get_icon() {
			return 'eicon-exchange';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SERVICE_PROTOTYPE_PRODUCTION ];
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
				'heading_primary',
				[
					'label'       => 'Heading Line 1',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'From Prototype',
					'label_block' => true,
				]
			);

			$this->add_control(
				'heading_secondary',
				[
					'label'       => 'Heading Line 2 (Accent)',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'to Production.',
					'label_block' => true,
				]
			);

			$this->add_control(
				'intro',
				[
					'label'       => 'Intro Text',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'default'     => 'From single prototypes to high-volume orders, get custom turned parts with engineering support at every stage. Same precision, whether you need one part or ten thousand.',
					'rows'        => 3,
					'label_block' => true,
				]
			);

			// --- Stage 1: Prototyping ---
			$this->add_control(
				'prototyping_title',
				[
					'label'   => 'Stage 1 — Title',
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => 'Prototyping',
				]
			);

			$this->add_control(
				'prototyping_image',
				[
					'label'   => 'Stage 1 — Image',
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [],
				]
			);

			$tags_1 = new \Elementor\Repeater();
			$tags_1->add_control(
				'text',
				[
					'label'       => 'Tag',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);

			$this->add_control(
				'prototyping_tags',
				[
					'label'       => 'Stage 1 — Tags',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $tags_1->get_controls(),
					'title_field' => '{{{ text }}}',
					'default'     => [
						[ 'text' => 'Single parts' ],
						[ 'text' => 'DFM review' ],
						[ 'text' => '2–5 day lead time' ],
					],
				]
			);

			// --- Stage 2: Production ---
			$this->add_control(
				'production_title',
				[
					'label'   => 'Stage 2 — Title',
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => 'Production Runs',
				]
			);

			$this->add_control(
				'production_image',
				[
					'label'   => 'Stage 2 — Image',
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [],
				]
			);

			$tags_2 = new \Elementor\Repeater();
			$tags_2->add_control(
				'text',
				[
					'label'       => 'Tag',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);

			$this->add_control(
				'production_tags',
				[
					'label'       => 'Stage 2 — Tags',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $tags_2->get_controls(),
					'title_field' => '{{{ text }}}',
					'default'     => [
						[ 'text' => '10 – 10,000+ pcs' ],
						[ 'text' => 'Repeat orders' ],
						[ 'text' => 'Stable tolerances' ],
					],
				]
			);

			// --- Footer ---
			$this->add_control(
				'footer_strong',
				[
					'label'   => 'Footer — Strong Text',
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => 'One partner, from first part to repeat orders.',
				]
			);

			$this->add_control(
				'footer_secondary',
				[
					'label'       => 'Footer — Secondary Text',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'default'     => 'Upload your design and quantity to get started — no minimum order.',
					'rows'        => 2,
					'label_block' => true,
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$heading_primary   = trim( (string) ( $settings['heading_primary'] ?? '' ) );
			$heading_secondary  = trim( (string) ( $settings['heading_secondary'] ?? '' ) );
			$intro              = trim( (string) ( $settings['intro'] ?? '' ) );
			$prototyping_title  = trim( (string) ( $settings['prototyping_title'] ?? '' ) );
			$production_title   = trim( (string) ( $settings['production_title'] ?? '' ) );
			$prototyping_tags   = ! empty( $settings['prototyping_tags'] ) ? $settings['prototyping_tags'] : [];
			$production_tags    = ! empty( $settings['production_tags'] ) ? $settings['production_tags'] : [];
			$footer_strong      = trim( (string) ( $settings['footer_strong'] ?? '' ) );
			$footer_secondary   = trim( (string) ( $settings['footer_secondary'] ?? '' ) );

			$p_img = $this->resolve_image( $settings['prototyping_image'] ?? [] );
			$x_img = $this->resolve_image( $settings['production_image'] ?? [] );

			$instance_id = 'rd-spp-' . $this->get_id();
			?>
			<section class="rd-spp" data-rd-spp-id="<?php echo esc_attr( $instance_id ); ?>" aria-labelledby="<?php echo esc_attr( $instance_id . '-title' ); ?>">
				<div class="rd-spp__container">
					<div class="rd-spp__card">
						<div class="rd-spp__top">

							<!-- 左栏文案 -->
							<div class="rd-spp__copy">
								<h2 class="rd-spp__title" id="<?php echo esc_attr( $instance_id . '-title' ); ?>">
									<?php if ( $heading_primary !== '' ) : ?>
										<?php echo esc_html( $heading_primary ); ?>
									<?php endif; ?>
									<?php if ( $heading_secondary !== '' ) : ?>
										<span><?php echo esc_html( $heading_secondary ); ?></span>
									<?php endif; ?>
								</h2>
								<?php if ( $intro !== '' ) : ?>
									<p class="rd-spp__intro"><?php echo esc_html( $intro ); ?></p>
								<?php endif; ?>
							</div>

							<!-- 右栏两 stage 图片卡 -->
							<div class="rd-spp__stages">

								<article class="rd-spp__stage">
									<div class="rd-spp__stage-img">
										<?php if ( $p_img !== '' ) : ?>
											<img src="<?php echo esc_url( $p_img ); ?>" alt="<?php echo esc_attr( $prototyping_title ); ?>" loading="lazy">
										<?php endif; ?>
									</div>
									<div class="rd-spp__stage-body">
										<?php if ( $prototyping_title !== '' ) : ?>
											<h3><?php echo esc_html( $prototyping_title ); ?></h3>
										<?php endif; ?>
										<?php if ( ! empty( $prototyping_tags ) ) : ?>
											<div class="rd-spp__tags">
												<?php foreach ( $prototyping_tags as $tag ) : ?>
													<?php $tag_text = trim( (string) ( $tag['text'] ?? '' ) ); ?>
													<?php if ( $tag_text !== '' ) : ?>
														<span><?php echo esc_html( $tag_text ); ?></span>
													<?php endif; ?>
												<?php endforeach; ?>
											</div>
										<?php endif; ?>
									</div>
								</article>

								<article class="rd-spp__stage">
									<div class="rd-spp__stage-img">
										<?php if ( $x_img !== '' ) : ?>
											<img src="<?php echo esc_url( $x_img ); ?>" alt="<?php echo esc_attr( $production_title ); ?>" loading="lazy">
										<?php endif; ?>
									</div>
									<div class="rd-spp__stage-body">
										<?php if ( $production_title !== '' ) : ?>
											<h3><?php echo esc_html( $production_title ); ?></h3>
										<?php endif; ?>
										<?php if ( ! empty( $production_tags ) ) : ?>
											<div class="rd-spp__tags">
												<?php foreach ( $production_tags as $tag ) : ?>
													<?php $tag_text = trim( (string) ( $tag['text'] ?? '' ) ); ?>
													<?php if ( $tag_text !== '' ) : ?>
														<span><?php echo esc_html( $tag_text ); ?></span>
													<?php endif; ?>
												<?php endforeach; ?>
											</div>
										<?php endif; ?>
									</div>
								</article>

							</div>
						</div>

						<!-- 底部 CTA 横幅 -->
						<div class="rd-spp__footer">
							<p class="rd-spp__footer-text">
								<?php if ( $footer_strong !== '' ) : ?>
									<strong><?php echo esc_html( $footer_strong ); ?></strong>
								<?php endif; ?>
								<?php if ( $footer_secondary !== '' ) : ?>
									<?php echo esc_html( $footer_secondary ); ?>
								<?php endif; ?>
							</p>
							<a class="rd-spp__cta" href="https://app.rapiddirect.com/" target="_blank" rel="noopener">
								Get Instant Quote
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
							</a>
						</div>
					</div>
				</div>
			</section>
			<?php
		}

		private function resolve_image( $media ) {
			if ( ! empty( $media['id'] ) ) {
				$url = wp_get_attachment_image_url( (int) $media['id'], 'large' );
				if ( $url ) {
					return $url;
				}
			}
			if ( ! empty( $media['url'] ) ) {
				return (string) $media['url'];
			}
			return '';
		}
	}
}
