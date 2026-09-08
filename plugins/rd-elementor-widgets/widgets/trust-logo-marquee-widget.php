<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RD_Trust_Logo_Marquee_Widget' ) ) {
	class RD_Trust_Logo_Marquee_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'rd-trust-logo-marquee';
		}

		public function get_title() {
			return 'Trust Logo Marquee';
		}

		public function get_icon() {
			return 'eicon-logo';
		}

		public function get_categories() {
			return [ 'rapiddirect', 'general' ];
		}

		public function get_style_depends() {
			return [ RD_Elementor_Widgets_Plugin::STYLE_HANDLE_TRUST_LOGO_MARQUEE ];
		}

		public function get_script_depends() {
			return [ RD_Elementor_Widgets_Plugin::SCRIPT_HANDLE_TRUST_LOGO_MARQUEE ];
		}

		protected function register_controls() {
			$this->start_controls_section(
				'section_content',
				[
					'label' => 'Content',
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'logo',
				[
					'label'   => 'Logo',
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [],
				]
			);

			$repeater->add_control(
				'alt',
				[
					'label'   => 'Alt Text',
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => '',
				]
			);

			$this->add_control(
				'logos',
				[
					'label'       => 'Logos',
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $repeater->get_controls(),
					'title_field' => '{{{ alt }}}',
					'default'     => [
						[ 'alt' => 'Partner logo 1' ],
						[ 'alt' => 'Partner logo 2' ],
						[ 'alt' => 'Partner logo 3' ],
						[ 'alt' => 'Partner logo 4' ],
						[ 'alt' => 'Partner logo 5' ],
					],
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();
			$logos    = isset( $settings['logos'] ) && is_array( $settings['logos'] ) ? $settings['logos'] : [];

			$valid_logos = [];
			foreach ( $logos as $logo ) {
				if ( ! empty( $logo['logo']['url'] ) || ! empty( $logo['logo']['id'] ) ) {
					$valid_logos[] = $logo;
				}
			}

			if ( empty( $valid_logos ) ) {
				return;
			}

			$instance_id = 'rd-tlm-' . $this->get_id();
			?>
			<section class="rd-tlm" data-rd-tlm-id="<?php echo esc_attr( $instance_id ); ?>">
				<div class="rd-tlm__container">
					<header class="rd-tlm__heading">
						<h2><em>20,000+</em> Customers<br>Trust RapidDirect</h2>
					</header>
					<span class="rd-tlm__divider" aria-hidden="true"></span>
					<div class="rd-tlm__marquee" aria-label="Partner logos">
						<div class="rd-tlm__track">
							<?php foreach ( $valid_logos as $logo ) : ?>
								<?php $this->render_logo( $logo ); ?>
							<?php endforeach; ?>
							<?php foreach ( $valid_logos as $logo ) : ?>
								<?php $this->render_logo( $logo, true ); ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</section>
			<?php
		}

		private function render_logo( $logo, $duplicated = false ) {
			$alt = isset( $logo['alt'] ) ? trim( (string) $logo['alt'] ) : '';
			if ( $duplicated ) {
				$alt = '';
			}
			?>
			<div class="rd-tlm__logo" <?php echo $duplicated ? 'aria-hidden="true"' : ''; ?>>
				<?php if ( ! empty( $logo['logo']['id'] ) ) : ?>
					<?php
					echo wp_get_attachment_image(
						(int) $logo['logo']['id'],
						'medium',
						false,
						[
							'alt'      => esc_attr( $alt ),
							'loading'  => 'lazy',
							'decoding' => 'async',
						]
					);
					?>
				<?php elseif ( ! empty( $logo['logo']['url'] ) ) : ?>
					<img src="<?php echo esc_url( $logo['logo']['url'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>" loading="lazy" decoding="async">
				<?php endif; ?>
			</div>
			<?php
		}
	}
}
