<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Service_Process_Comparison_Widget' ) ) {
	class RD_Service_Process_Comparison_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-service-process-comparison';
		}

		public function get_title() {
			return 'Service Process Comparison';
		}

		public function get_icon() {
			return 'eicon-columns';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SERVICE_PROCESS_COMPARISON ];
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
				'eyebrow',
				[
					'label'       => 'Eyebrow',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'FIND THE RIGHT PROCESS',
					'label_block' => true,
				]
			);

			$this->add_control(
				'heading',
				[
					'label'       => 'Heading',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'CNC Milling vs. CNC Turning',
					'label_block' => true,
				]
			);

			$this->add_control(
				'intro',
				[
					'label'       => 'Intro Text',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'default'     => 'Compare the features that matter for your part. Our engineers can help you choose the right approach.',
					'rows'        => 3,
					'label_block' => true,
				]
			);

			$this->add_control(
				'col_a_title',
				[
					'label'   => 'Column A — Title',
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => 'CNC Milling',
				]
			);

			$this->add_control(
				'col_b_title',
				[
					'label'   => 'Column B — Title',
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => 'CNC Turning',
				]
			);

			$row_repeater = new \Elementor\Repeater();
			$row_repeater->add_control(
				'attribute',
				[
					'label'       => 'Attribute',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'placeholder' => 'e.g. Best suited for',
					'label_block' => true,
				]
			);
			$row_repeater->add_control(
				'value_a',
				[
					'label'       => 'Value A',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$row_repeater->add_control(
				'value_b',
				[
					'label'       => 'Value B',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);

			$this->add_control(
				'comparison_rows',
				[
					'label'       => 'Comparison Rows',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $row_repeater->get_controls(),
					'title_field' => '{{{ attribute }}}',
					'default'     => [
						[
							'attribute' => 'Best suited for',
							'value_a'   => 'Flat faces, pockets, slots and shaped contours',
							'value_b'   => 'Cylindrical profiles, bores, grooves and threads',
						],
						[
							'attribute' => 'Primary cutting motion',
							'value_a'   => 'The cutting tool rotates to remove material.',
							'value_b'   => 'The workpiece rotates against a cutting tool.',
						],
						[
							'attribute' => 'Typical parts',
							'value_a'   => 'Housings, brackets, plates and manifolds',
							'value_b'   => 'Shafts, bushings, pins and fittings',
						],
					],
				]
			);

			$this->add_control(
				'col_a_link_text',
				[
					'label'   => 'Column A — Link Text',
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => 'Explore CNC Milling →',
				]
			);

			$this->add_control(
				'col_a_link_url',
				[
					'label'       => 'Column A — Link URL',
					'type'        => \Elementor\Controls_Manager::URL,
					'placeholder' => 'https://',
					'default'     => [ 'url' => '#' ],
				]
			);

			$this->add_control(
				'col_b_link_text',
				[
					'label'   => 'Column B — Link Text',
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => 'Explore CNC Turning →',
				]
			);

			$this->add_control(
				'col_b_link_url',
				[
					'label'       => 'Column B — Link URL',
					'type'        => \Elementor\Controls_Manager::URL,
					'placeholder' => 'https://',
					'default'     => [ 'url' => '#' ],
				]
			);

			$this->add_control(
				'cta_banner_title',
				[
					'label'   => 'CTA Banner — Title',
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => 'Have both turned and milled features?',
				]
			);

			$this->add_control(
				'cta_banner_text',
				[
					'label'       => 'CTA Banner — Text',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'default'     => 'Your part may need a combination of processes. Our engineers can review your drawing and recommend an approach.',
					'rows'        => 2,
					'label_block' => true,
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$eyebrow          = trim( (string) ( $settings['eyebrow'] ?? '' ) );
			$heading          = trim( (string) ( $settings['heading'] ?? '' ) );
			$intro            = trim( (string) ( $settings['intro'] ?? '' ) );
			$col_a_title      = trim( (string) ( $settings['col_a_title'] ?? '' ) );
			$col_b_title      = trim( (string) ( $settings['col_b_title'] ?? '' ) );
			$rows             = ! empty( $settings['comparison_rows'] ) ? $settings['comparison_rows'] : [];
			$col_a_link_text  = trim( (string) ( $settings['col_a_link_text'] ?? '' ) );
			$col_b_link_text  = trim( (string) ( $settings['col_b_link_text'] ?? '' ) );
			$col_a_link_attrs = $this->get_link_attributes( $settings['col_a_link_url'] ?? [] );
			$col_b_link_attrs = $this->get_link_attributes( $settings['col_b_link_url'] ?? [] );
			$cta_banner_title = trim( (string) ( $settings['cta_banner_title'] ?? '' ) );
			$cta_banner_text  = trim( (string) ( $settings['cta_banner_text'] ?? '' ) );

			$instance_id = 'rd-pc-' . $this->get_id();
			?>
			<section class="rd-pc" data-rd-pc-id="<?php echo esc_attr( $instance_id ); ?>" aria-labelledby="<?php echo esc_attr( $instance_id . '-title' ); ?>">
				<div class="rd-pc__container">

					<!-- 头部 -->
					<?php if ( $eyebrow !== '' ) : ?>
						<div class="rd-pc__eyebrow">
							<span></span><?php echo esc_html( $eyebrow ); ?>
						</div>
					<?php endif; ?>

					<?php if ( $heading !== '' ) : ?>
						<h2 class="rd-pc__heading" id="<?php echo esc_attr( $instance_id . '-title' ); ?>">
							<?php echo esc_html( $heading ); ?>
						</h2>
					<?php endif; ?>

					<?php if ( $intro !== '' ) : ?>
						<p class="rd-pc__intro"><?php echo esc_html( $intro ); ?></p>
					<?php endif; ?>

					<!-- 对比卡片 -->
					<div class="rd-pc__table-wrap">
						<div class="rd-pc__table">

							<!-- 表头 -->
							<div class="rd-pc__row rd-pc__row--head">
								<div class="rd-pc__cell rd-pc__cell--label rd-pc__cell--empty">
									Compare by
								</div>
								<div class="rd-pc__cell rd-pc__cell--col-title">
									<?php echo esc_html( $col_a_title ); ?>
								</div>
								<div class="rd-pc__cell rd-pc__cell--col-title">
									<?php echo esc_html( $col_b_title ); ?>
								</div>
							</div>

							<!-- 对比行 -->
							<?php foreach ( $rows as $row ) : ?>
								<?php
								$attr = trim( (string) ( $row['attribute'] ?? '' ) );
								$va   = trim( (string) ( $row['value_a'] ?? '' ) );
								$vb   = trim( (string) ( $row['value_b'] ?? '' ) );
								if ( $attr === '' && $va === '' && $vb === '' ) {
									continue;
								}
								?>
								<div class="rd-pc__row">
									<div class="rd-pc__cell rd-pc__cell--label">
										<?php echo esc_html( $attr ); ?>
									</div>
									<div class="rd-pc__cell">
										<?php echo esc_html( $va ); ?>
									</div>
									<div class="rd-pc__cell">
										<?php echo esc_html( $vb ); ?>
									</div>
								</div>
							<?php endforeach; ?>

							<!-- 表尾链接行 -->
							<?php if ( ( $col_a_link_text !== '' && $col_a_link_attrs !== '' ) || ( $col_b_link_text !== '' && $col_b_link_attrs !== '' ) ) : ?>
								<div class="rd-pc__row rd-pc__row--links">
									<div class="rd-pc__cell rd-pc__cell--label rd-pc__cell--empty"></div>
									<div class="rd-pc__cell">
										<?php if ( $col_a_link_text !== '' && $col_a_link_attrs !== '' ) : ?>
											<a class="rd-pc__link" <?php echo $col_a_link_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $col_a_link_text ); ?></a>
										<?php endif; ?>
									</div>
									<div class="rd-pc__cell">
										<?php if ( $col_b_link_text !== '' && $col_b_link_attrs !== '' ) : ?>
											<a class="rd-pc__link" <?php echo $col_b_link_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $col_b_link_text ); ?></a>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>

						</div>
					</div>

					<!-- 底部 CTA 横幅 -->
					<div class="rd-pc__banner">
						<div class="rd-pc__banner-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
						</div>
						<div class="rd-pc__banner-text">
							<?php if ( $cta_banner_title !== '' ) : ?>
								<strong><?php echo esc_html( $cta_banner_title ); ?></strong>
							<?php endif; ?>
							<?php if ( $cta_banner_text !== '' ) : ?>
								<span><?php echo esc_html( $cta_banner_text ); ?></span>
							<?php endif; ?>
						</div>
						<a class="rd-pc__cta" href="https://app.rapiddirect.com/" target="_blank" rel="noopener">
							Get Instant Quote
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
						</a>
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

			$attrs = [ 'href="' . esc_url( $url ) . '"' ];

			$is_external = ! empty( $link['is_external'] );
			$is_nofollow = ! empty( $link['nofollow'] );

			if ( $is_external ) {
				$attrs[] = 'target="_blank"';
				$attrs[] = 'rel="noopener' . ( $is_nofollow ? ' nofollow' : '' ) . '"';
			} elseif ( $is_nofollow ) {
				$attrs[] = 'rel="nofollow"';
			}

			return implode( ' ', $attrs );
		}
	}
}
