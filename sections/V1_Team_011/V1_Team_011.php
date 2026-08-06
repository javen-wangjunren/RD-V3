<?php

/*
	<?php
	?>
*/

class V1_Team_011  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('class', '');
	}

	public function style () {
		?>
			/* insert style start */
			.<?php $this->eid(); ?> {
				<?php $this->css_margin_top(); ?>
				<?php $this->css_padding_top(); ?>
				<?php $this->css_padding_bottom(); ?>
				<?php $this->css_margin_bottom(); ?>
				<?php $this->css_bg_color(); ?>
				<?php $this->css_bg_image(); ?>
				<?php $this->css_attr_color('desc_color'); ?>
				text-align: center;
			}
			.<?php $this->eid(); ?> .slicker {
				margin: 30px auto 0;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> h2 {
				color: #212121;
			}
			.<?php $this->eid(); ?> h4 {
				margin: 20px auto 0;
				color: #000;
			}
			.<?php $this->eid(); ?> .position {
				color: #aaa;
			}
			.<?php $this->eid(); ?> .slick-dots {
				margin: 30px auto 0;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .slick-active button {
				background: #212121;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			arrows: false,
			dots: true,
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [{
				breakpoint: 800,
				settings: { slidesToShow: 3 }
			}, {
				breakpoint: 600,
				settings: { slidesToShow: 2 }
			}, {
				breakpoint: 360,
				settings: { slidesToShow: 1 }
			}]
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<h2>A Proactive Team</h2>
					<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan </p>
					<ul class="slicker">
						<li>
							<img src="https://via.placeholder.com/221x221/585f6b/e9eef4?text=I" alt="">
							<h4>Seven Xia</h4>
							<span class="position">CEO & Founder</span>
						</li>
						<li>
							<img src="https://via.placeholder.com/221x221/585f6b/e9eef4?text=I" alt="">
							<h4>Seven Xia</h4>
							<span class="position">CEO & Founder</span>
						</li>
						<li>
							<img src="https://via.placeholder.com/221x221/585f6b/e9eef4?text=I" alt="">
							<h4>Seven Xia</h4>
							<span class="position">CEO & Founder</span>
						</li>
						<li>
							<img src="https://via.placeholder.com/221x221/585f6b/e9eef4?text=I" alt="">
							<h4>Seven Xia</h4>
							<span class="position">CEO & Founder</span>
						</li>
						<li>
							<img src="https://via.placeholder.com/221x221/585f6b/e9eef4?text=I" alt="">
							<h4>Seven Xia</h4>
							<span class="position">CEO & Founder</span>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
