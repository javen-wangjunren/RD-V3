<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Solution_FAQ_Widget' ) ) {
	class RD_Solution_FAQ_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-solution-faq';
		}

		public function get_title() {
			return 'Solution FAQ';
		}

		public function get_icon() {
			return 'eicon-accordion';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SOLUTION_FAQ ];
		}

		public function get_script_depends() {
			return [ RD_Elementor_Widgets_Plugin::SCRIPT_HANDLE_SOLUTION_FAQ ];
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
					'default'     => 'RapidDirect FAQs',
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => 'Find quick answers about manufacturability, lead times, materials, finishes, quality documentation, and compliance. Need more support? Start a quote or explore our Help Center.',
					'label_block' => true,
				]
			);

			$faq_repeater = new \Elementor\Repeater();
			$faq_repeater->add_control(
				'question',
				[
					'label'       => 'Question',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Question text',
					'label_block' => true,
				]
			);
			$faq_repeater->add_control(
				'answer',
				[
					'label'       => 'Answer',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => 'Answer text.',
					'label_block' => true,
				]
			);

			$this->add_control(
				'faqs',
				[
					'label'       => 'FAQs',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $faq_repeater->get_controls(),
					'title_field' => '{{{ question }}}',
					'default'     => [
						[
							'question' => 'How do I confirm my design can be manufactured reliably?',
							'answer'   => 'Every successful production starts with a solid manufacturability review. Once you upload your CAD file, RapidDirect’s platform analyzes geometry, wall thickness, overhangs, and tolerance feasibility using built-in DFM algorithms. For complex or high-precision projects, our engineers can provide a manual DFM review with clear suggestions on design adjustments, process routes, or material choices.',
						],
						[
							'question' => 'What makes RapidDirect different from other manufacturing platforms or intermediaries?',
							'answer'   => 'RapidDirect integrates real manufacturing, engineering expertise, and digital automation into one ecosystem. We combine our own facilities with a network of audited partners under unified quality standards, while supporting the full NPI process from design validation and pilot production to inspection and packaging.',
						],
						[
							'question' => 'How fast can RapidDirect deliver?',
							'answer'   => 'Lead time depends on part complexity, quantity, and process. Rapid prototypes made with CNC machining or 3D printing can ship in as little as 3–5 days, while injection molding and low-volume production typically take 2–4 weeks. Upload your drawings, material, and quantity for a project-specific estimate.',
						],
						[
							'question' => 'What surface finishes and colors are available?',
							'answer'   => 'RapidDirect offers anodizing, powder coating, painting, electroplating, brushing, bead blasting, polishing, and more for metal and plastic parts. Custom colors can be matched with RAL or Pantone references, with color consistency and gloss-level controls available for repeat production.',
						],
						[
							'question' => 'Do you offer material certificates or test reports?',
							'answer'   => 'Yes. On request, we can provide mill test certificates, RoHS or REACH compliance reports, and third-party inspection documents. Dimensional inspection data, CMM reports, and FAI documentation can also be included for critical applications.',
						],
						[
							'question' => 'Do your materials and processes comply with RoHS, REACH, or other EU standards?',
							'answer'   => 'Yes. Most commonly used aluminum alloys, stainless steels, and engineering plastics comply with RoHS and REACH directives. Certificates of conformity or third-party test reports can be provided when you specify the required standard during quoting.',
						],
						[
							'question' => 'What if my parts do not meet the required specifications?',
							'answer'   => 'Every project goes through verification, from trial production and inspection to customer confirmation, before shipment. If a nonconformity is identified, our team verifies the issue, investigates the root cause, and works with you on the appropriate corrective action.',
						],
					],
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			$heading     = isset( $settings['heading'] ) ? $settings['heading'] : '';
			$description = isset( $settings['description'] ) ? $settings['description'] : '';
			$faqs        = isset( $settings['faqs'] ) && is_array( $settings['faqs'] ) ? $settings['faqs'] : [];

			$heading_id     = 'rd-solution-faq-title-' . $this->get_id();
			$primary_text   = 'Get Instant Quote';
			$primary_url    = 'https://app.rapiddirect.com/';
			$secondary_text = 'Visit Help Center';
			$secondary_url  = 'https://www.rapiddirect.com/help-center/';
			?>
			<section class="rd-solution-faq" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
				<div class="rd-solution-faq__container">
					<div class="rd-solution-faq__layout">

						<header class="rd-solution-faq__heading">
							<?php if ( $heading !== '' ) : ?>
								<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="rd-solution-faq__title"><?php echo esc_html( $heading ); ?></h2>
							<?php endif; ?>
							<?php if ( $description !== '' ) : ?>
								<div class="rd-solution-faq__copy"><?php echo wp_kses_post( $description ); ?></div>
							<?php endif; ?>
							<div class="rd-solution-faq__actions">
								<a class="rd-solution-faq__cta rd-solution-faq__cta--primary" href="<?php echo esc_url( $primary_url ); ?>" target="_blank" rel="noopener noreferrer">
									<?php echo esc_html( $primary_text ); ?>
								</a>
								<a class="rd-solution-faq__cta rd-solution-faq__cta--secondary" href="<?php echo esc_url( $secondary_url ); ?>">
									<?php echo esc_html( $secondary_text ); ?>
								</a>
							</div>
						</header>

						<?php if ( ! empty( $faqs ) ) : ?>
							<div class="rd-solution-faq__list">
								<?php foreach ( $faqs as $i => $faq ) : ?>
									<?php
									$question = isset( $faq['question'] ) ? $faq['question'] : '';
									$answer   = isset( $faq['answer'] ) ? $faq['answer'] : '';
									if ( $question === '' && $answer === '' ) {
										continue;
									}
									$item_id     = 'rd-solution-faq-item-' . $this->get_id() . '-' . $i;
									$trigger_id  = $item_id . '-trigger';
									$panel_id    = $item_id . '-panel';
									?>
									<article class="rd-solution-faq__item" data-rd-faq-item>
										<h3>
											<button
												class="rd-solution-faq__trigger"
												id="<?php echo esc_attr( $trigger_id ); ?>"
												type="button"
												aria-expanded="false"
												aria-controls="<?php echo esc_attr( $panel_id ); ?>"
											>
												<span class="rd-solution-faq__question"><?php echo esc_html( $question ); ?></span>
												<span class="rd-solution-faq__toggle" aria-hidden="true">
													<svg viewBox="0 0 16 16" fill="none">
														<path d="m3 6 5 5 5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
													</svg>
												</span>
											</button>
										</h3>
										<div
											class="rd-solution-faq__panel"
											id="<?php echo esc_attr( $panel_id ); ?>"
											role="region"
											aria-labelledby="<?php echo esc_attr( $trigger_id ); ?>"
											aria-hidden="true"
										>
											<div class="rd-solution-faq__panel-inner">
												<div class="rd-solution-faq__answer"><?php echo wp_kses_post( $answer ); ?></div>
											</div>
										</div>
									</article>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

					</div>
				</div>
			</section>
			<?php
		}
	}
}
