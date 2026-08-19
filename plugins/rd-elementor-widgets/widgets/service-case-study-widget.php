<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Service_Case_Study_Widget' ) ) {
	class RD_Service_Case_Study_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-service-case-study';
		}

		public function get_title() {
			return 'Service Case Study';
		}

		public function get_icon() {
			return 'eicon-carousel';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SERVICE_CASE_STUDY ];
		}

		public function get_script_depends() {
			return [ RD_Elementor_Widgets_Plugin::SCRIPT_HANDLE_SERVICE_CASE_STUDY ];
		}

		protected function register_controls() {
			$this->start_controls_section(
				'section_header',
				[
					'label' => 'Section Header',
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'section_title',
				[
					'label'       => 'Section Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Customer Success Stories',
					'label_block' => true,
				]
			);

			$this->add_control(
				'section_description',
				[
					'label'       => 'Section Description',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'default'     => 'Real-world CNC machining project cases across aerospace, automotive, medical and more. Browse selected project previews below — click to view full case study details.',
					'rows'        => 3,
					'label_block' => true,
				]
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'section_slides',
				[
					'label' => 'Slides',
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$meta_repeater = new \Elementor\Repeater();
			$meta_repeater->add_control(
				'label',
				[
					'label'       => 'Label',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => false,
				]
			);
			$meta_repeater->add_control(
				'value',
				[
					'label'       => 'Value',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => false,
				]
			);

			$outcome_repeater = new \Elementor\Repeater();
			$outcome_repeater->add_control(
				'text',
				[
					'label'       => 'Outcome',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);

			$slide_repeater = new \Elementor\Repeater();
			$slide_repeater->add_control(
				'image',
				[
					'label' => 'Image',
					'type'  => \Elementor\Controls_Manager::MEDIA,
				]
			);
			$slide_repeater->add_control(
				'industry',
				[
					'label'   => 'Industry Tag',
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => 'Aerospace',
				]
			);
			$slide_repeater->add_control(
				'title',
				[
					'label'       => 'Card Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'LURA: Precision Rocket-Engine CNC-Machined Parts',
					'label_block' => true,
				]
			);
			$slide_repeater->add_control(
				'meta_items',
				[
					'label'       => 'Meta Items',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $meta_repeater->get_controls(),
					'title_field' => '{{{ label }}}',
					'default'     => [
						[ 'label' => 'Material', 'value' => 'Aluminium 6061-T6' ],
						[ 'label' => 'Process', 'value' => '5-Axis CNC & Turn-mill' ],
						[ 'label' => 'Finish', 'value' => 'As-machined' ],
					],
				]
			);
			$slide_repeater->add_control(
				'challenges_text',
				[
					'label'       => 'Challenges Text',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 3,
					'label_block' => true,
				]
			);
			$slide_repeater->add_control(
				'solution_text',
				[
					'label'       => 'Solution Text',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'rows'        => 3,
					'label_block' => true,
				]
			);
			$slide_repeater->add_control(
				'outcomes',
				[
					'label'       => 'Key Outcomes',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $outcome_repeater->get_controls(),
					'title_field' => '{{{ text }}}',
				]
			);
			$slide_repeater->add_control(
				'cta_link',
				[
					'label'       => 'CTA Link',
					'type'        => \Elementor\Controls_Manager::URL,
					'placeholder' => 'https://',
					'default'     => [ 'url' => '#' ],
				]
			);

			$this->add_control(
				'slides',
				[
					'label'       => 'Slides',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $slide_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$section_title       = isset( $settings['section_title'] ) ? $settings['section_title'] : '';
			$section_description = isset( $settings['section_description'] ) ? $settings['section_description'] : '';
			$slides              = isset( $settings['slides'] ) && is_array( $settings['slides'] ) ? $settings['slides'] : [];

			$instance_id = 'rd-scs-' . $this->get_id();
			?>
			<section class="rd-scs" data-rd-scs-id="<?php echo esc_attr( $instance_id ); ?>" aria-labelledby="<?php echo esc_attr( $instance_id . '-title' ); ?>">
				<div class="rd-scs__container">

					<?php if ( $section_title !== '' || $section_description !== '' ) : ?>
						<div class="rd-scs__head">
							<?php if ( $section_title !== '' ) : ?>
								<h2 class="rd-scs__head-title" id="<?php echo esc_attr( $instance_id . '-title' ); ?>">
									<?php echo esc_html( $section_title ); ?>
								</h2>
							<?php endif; ?>
							<?php if ( $section_description !== '' ) : ?>
								<p class="rd-scs__head-desc"><?php echo esc_html( $section_description ); ?></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $slides ) ) : ?>
						<div class="rd-scs__carousel" role="region" aria-label="Customer success stories carousel" tabindex="0">

							<button type="button" class="rd-scs__arrow rd-scs__arrow--prev" aria-label="Previous case study">
								<svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
							</button>
							<button type="button" class="rd-scs__arrow rd-scs__arrow--next" aria-label="Next case study">
								<svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
							</button>

							<div class="rd-scs__track">
								<?php foreach ( $slides as $index => $slide ) : ?>
									<?php
									$industry        = isset( $slide['industry'] ) ? $slide['industry'] : '';
									$title           = isset( $slide['title'] ) ? $slide['title'] : '';
									$image           = isset( $slide['image'] ) ? $slide['image'] : [];
									$meta_items      = isset( $slide['meta_items'] ) && is_array( $slide['meta_items'] ) ? $slide['meta_items'] : [];
									$challenges_text = isset( $slide['challenges_text'] ) ? $slide['challenges_text'] : '';
									$solution_text   = isset( $slide['solution_text'] ) ? $slide['solution_text'] : '';
									$outcomes        = isset( $slide['outcomes'] ) && is_array( $slide['outcomes'] ) ? $slide['outcomes'] : [];
									$cta_link        = isset( $slide['cta_link'] ) ? $slide['cta_link'] : [];

									$cta_attrs = $this->get_link_attributes( $cta_link );
									$is_active = $index === 0 ? ' is-active' : '';
									?>
									<div class="rd-scs__slide<?php echo esc_attr( $is_active ); ?>" data-index="<?php echo esc_attr( (string) $index ); ?>">
										<div class="rd-scs__card">
											<div class="rd-scs__card-media">
												<?php if ( ! empty( $image['id'] ) ) : ?>
													<?php
													echo wp_get_attachment_image(
														(int) $image['id'],
														'large',
														false,
														[
															'class'   => 'rd-scs__card-img',
															'loading' => 'lazy',
														]
													);
													?>
												<?php else : ?>
													<div class="rd-scs__card-placeholder"></div>
												<?php endif; ?>
											</div>

											<div class="rd-scs__card-content">
												<?php if ( $industry !== '' ) : ?>
													<span class="rd-scs__industry"><?php echo esc_html( $industry ); ?></span>
												<?php endif; ?>

												<?php if ( $title !== '' ) : ?>
													<h3 class="rd-scs__card-title"><?php echo esc_html( $title ); ?></h3>
												<?php endif; ?>

												<?php if ( ! empty( $meta_items ) ) : ?>
													<div class="rd-scs__meta">
														<?php foreach ( $meta_items as $meta ) : ?>
															<?php
															$meta_label = isset( $meta['label'] ) ? trim( (string) $meta['label'] ) : '';
															$meta_value = isset( $meta['value'] ) ? trim( (string) $meta['value'] ) : '';
															if ( $meta_label === '' && $meta_value === '' ) {
																continue;
															}
															?>
															<span class="rd-scs__meta-item">
																<?php if ( $meta_label !== '' ) : ?>
																	<span class="rd-scs__meta-label"><?php echo esc_html( $meta_label ); ?>:</span>
																<?php endif; ?>
																<?php if ( $meta_value !== '' ) : ?>
																	<?php echo esc_html( $meta_value ); ?>
																<?php endif; ?>
									
															</span>
														<?php endforeach; ?>
													</div>
												<?php endif; ?>

												<?php if ( $challenges_text !== '' ) : ?>
													<div class="rd-scs__block">
														<div class="rd-scs__block-title">Challenges</div>
														<p class="rd-scs__block-text"><?php echo esc_html( $challenges_text ); ?></p>
													</div>
												<?php endif; ?>

												<?php if ( $solution_text !== '' ) : ?>
													<div class="rd-scs__block">
														<div class="rd-scs__block-title">Our Solution</div>
														<p class="rd-scs__block-text"><?php echo esc_html( $solution_text ); ?></p>
													</div>
												<?php endif; ?>

												<?php if ( ! empty( $outcomes ) ) : ?>
													<div class="rd-scs__block">
														<div class="rd-scs__block-title">Key Outcomes</div>
														<ul class="rd-scs__outcomes">
															<?php foreach ( $outcomes as $outcome ) : ?>
																<?php
																$outcome_text = isset( $outcome['text'] ) ? trim( (string) $outcome['text'] ) : '';
																if ( $outcome_text === '' ) {
																	continue;
																}
																?>
																<li class="rd-scs__outcome"><?php echo esc_html( $outcome_text ); ?></li>
															<?php endforeach; ?>
														</ul>
													</div>
												<?php endif; ?>

												<?php if ( $cta_attrs !== '' ) : ?>
													<div class="rd-scs__cta">
														<a class="rd-scs__btn" <?php echo $cta_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
															Read Full Case Study
															<svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
														</a>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>

							<div class="rd-scs__dots" role="tablist" aria-label="Case study slides">
								<?php foreach ( $slides as $index => $slide ) : ?>
									<button class="rd-scs__dot<?php echo $index === 0 ? ' is-active' : ''; ?>" data-index="<?php echo esc_attr( (string) $index ); ?>" role="tab" aria-label="<?php /* translators: %d is slide number */ echo esc_attr( sprintf( 'Go to slide %d', $index + 1 ) ); ?>" aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>"></button>
								<?php endforeach; ?>
							</div>

						</div>
					<?php endif; ?>

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
