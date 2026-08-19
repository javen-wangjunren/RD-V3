<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Solution_Advantages_Widget' ) ) {
	class RD_Solution_Advantages_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-solution-advantages';
		}

		public function get_title() {
			return 'Solution Advantages';
		}

		public function get_icon() {
			return 'eicon-thumbnails-right';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_SOLUTION_ADVANTAGES ];
		}

		private function render_guarantee_icon( $index ) {
			switch ( $index % 3 ) {
				case 1:
					// Shield icon.
					?>
					<svg class="rd-solution-advantages__guarantee-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
					<?php
					break;
				case 2:
					// Lock icon.
					?>
					<svg class="rd-solution-advantages__guarantee-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
					<?php
					break;
				case 0:
				default:
					// Activity icon.
					?>
					<svg class="rd-solution-advantages__guarantee-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
					<?php
					break;
			}
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
					'default'     => 'Why Choose Our JDM Service?',
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => 'From concept to mass production, we co-develop your product with full-lifecycle engineering support.',
					'label_block' => true,
				]
			);

			$guarantee_repeater = new \Elementor\Repeater();
			$guarantee_repeater->add_control(
				'title',
				[
					'label'       => 'Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Full-Lifecycle Accountability',
					'label_block' => true,
				]
			);
			$guarantee_repeater->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => 'One team handles mechanical, electrical, assembly, and testing issues from concept to delivery.',
					'label_block' => true,
				]
			);

			$this->add_control(
				'guarantees',
				[
					'label'       => 'Partnership Guarantees',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $guarantee_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
					'default'     => [
						[
							'title'       => 'Full-Lifecycle Accountability',
							'description' => 'One team handles mechanical, electrical, assembly, and testing issues from concept to delivery.',
						],
						[
							'title'       => 'Exclusive IP & NDA Protection',
							'description' => 'All designs, iterations, and product data remain your exclusive property, secured by NDA.',
						],
						[
							'title'       => 'Traceable Quality Support',
							'description' => 'Every iteration is versioned and documented. Quality issues are owned and resolved by us.',
						],
					],
				]
			);

			$advantage_repeater = new \Elementor\Repeater();
			$advantage_repeater->add_control(
				'image',
				[
					'label'   => 'Image',
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
			$advantage_repeater->add_control(
				'title',
				[
					'label'       => 'Title',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => 'Full-Stack System Co-Development',
					'label_block' => true,
				]
			);
			$advantage_repeater->add_control(
				'description',
				[
					'label'       => 'Description',
					'type'        => \Elementor\Controls_Manager::WYSIWYG,
					'default'     => 'We break down mechanical and electrical silos by developing structure, electronics, and thermal design as one integrated system.',
					'label_block' => true,
				]
			);
			$advantage_repeater->add_control(
				'tags',
				[
					'label'       => 'Tags',
					'type'        => \Elementor\Controls_Manager::TEXT,
					'description' => 'Separate tags with commas.',
					'default'     => 'Structure + Electronics, Thermal Design, DFM',
					'label_block' => true,
				]
			);

			$this->add_control(
				'advantages',
				[
					'label'       => 'Advantages',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $advantage_repeater->get_controls(),
					'title_field' => '{{{ title }}}',
					'default'     => [
						[
							'title'       => 'Full-Stack System Co-Development',
							'description' => 'We break down mechanical and electrical silos by developing structure, electronics, and thermal design as one integrated system.',
							'tags'        => 'Structure + Electronics, Thermal Design, DFM',
						],
						[
							'title'       => 'True One-Stop Closed Loop',
							'description' => 'Product definition, design, manufacturing, assembly, testing, and delivery are managed under one engineering team and one point of contact.',
							'tags'        => 'Design, Manufacturing, Assembly, Testing, Delivery',
						],
						[
							'title'       => 'DFM-First Engineering',
							'description' => 'Manufacturing validation is embedded from concept to pilot run, reducing rework, improving yield, and compressing time-to-market.',
							'tags'        => 'DFM, Process Optimization, Cost Control',
						],
						[
							'title'       => 'Full Process Coverage',
							'description' => 'Advanced PCB plus precision CNC, injection molding, sheet metal, and 3D printing are coordinated by one engineering team.',
							'tags'        => 'PCB, CNC, Injection, Sheet Metal, 3D Print',
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
			$guarantees  = isset( $settings['guarantees'] ) && is_array( $settings['guarantees'] ) ? $settings['guarantees'] : [];
			$advantages  = isset( $settings['advantages'] ) && is_array( $settings['advantages'] ) ? $settings['advantages'] : [];
			?>
			<section class="rd-solution-advantages">
				<div class="rd-solution-advantages__container">

					<?php if ( $heading !== '' || $description !== '' ) : ?>
						<div class="rd-solution-advantages__header">
							<?php if ( $heading !== '' ) : ?>
								<h2 class="rd-solution-advantages__title"><?php echo esc_html( $heading ); ?></h2>
							<?php endif; ?>
							<?php if ( $description !== '' ) : ?>
								<div class="rd-solution-advantages__description"><?php echo wp_kses_post( $description ); ?></div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $guarantees ) ) : ?>
						<div class="rd-solution-advantages__guarantees">
							<?php foreach ( $guarantees as $i => $guarantee ) : ?>
								<?php
								$g_title = isset( $guarantee['title'] ) ? $guarantee['title'] : '';
								$g_desc  = isset( $guarantee['description'] ) ? $guarantee['description'] : '';
								if ( $g_title === '' && $g_desc === '' ) {
									continue;
								}
								$g_index = $i + 1;
								?>
								<div class="rd-solution-advantages__guarantee-item">
									<?php $this->render_guarantee_icon( $g_index ); ?>
									<div class="rd-solution-advantages__guarantee-content">
										<?php if ( $g_title !== '' ) : ?>
											<h4 class="rd-solution-advantages__guarantee-title"><?php echo esc_html( $g_title ); ?></h4>
										<?php endif; ?>
										<?php if ( $g_desc !== '' ) : ?>
											<div class="rd-solution-advantages__guarantee-desc"><?php echo wp_kses_post( $g_desc ); ?></div>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $advantages ) ) : ?>
						<div class="rd-solution-advantages__list">
							<?php foreach ( $advantages as $i => $advantage ) : ?>
								<?php
								$image       = isset( $advantage['image'] ) && is_array( $advantage['image'] ) ? $advantage['image'] : [];
								$image_id    = isset( $image['id'] ) ? absint( $image['id'] ) : 0;
								$image_url   = isset( $image['url'] ) ? $image['url'] : '';
								$a_title     = isset( $advantage['title'] ) ? $advantage['title'] : '';
								$a_desc      = isset( $advantage['description'] ) ? $advantage['description'] : '';
								$tags_string = isset( $advantage['tags'] ) ? $advantage['tags'] : '';

								if ( $image_id === 0 && $image_url === '' && $a_title === '' && $a_desc === '' && $tags_string === '' ) {
									continue;
								}

								$a_number = $i + 1;
								$reverse_class = ( $i % 2 === 1 ) ? ' rd-solution-advantages__advantage--reverse' : '';
								$tags = [];
								if ( $tags_string !== '' ) {
									$raw_tags = explode( ',', $tags_string );
									foreach ( $raw_tags as $tag ) {
										$tag = trim( $tag );
										if ( $tag !== '' ) {
											$tags[] = $tag;
										}
									}
								}
								?>
								<div class="rd-solution-advantages__advantage<?php echo esc_attr( $reverse_class ); ?>">
									<div class="rd-solution-advantages__media">
										<?php if ( $image_id > 0 ) : ?>
											<?php echo wp_get_attachment_image( $image_id, 'full', false, [ 'class' => 'rd-solution-advantages__image' ] ); ?>
										<?php elseif ( $image_url !== '' ) : ?>
											<img class="rd-solution-advantages__image" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $a_title ); ?>">
										<?php endif; ?>
									</div>

									<div class="rd-solution-advantages__content">
										<div class="rd-solution-advantages__number"><?php echo sprintf( '%02d', $a_number ); ?></div>

										<?php if ( $a_title !== '' ) : ?>
											<h3 class="rd-solution-advantages__advantage-title"><?php echo esc_html( $a_title ); ?></h3>
										<?php endif; ?>

										<?php if ( $a_desc !== '' ) : ?>
											<div class="rd-solution-advantages__advantage-desc"><?php echo wp_kses_post( $a_desc ); ?></div>
										<?php endif; ?>

										<?php if ( ! empty( $tags ) ) : ?>
											<div class="rd-solution-advantages__tags">
												<?php foreach ( $tags as $tag ) : ?>
													<span class="rd-solution-advantages__tag"><?php echo esc_html( $tag ); ?></span>
												<?php endforeach; ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

				</div>
			</section>
			<?php
		}
	}
}
