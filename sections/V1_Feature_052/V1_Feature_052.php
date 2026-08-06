<?php

/*
	<?php
	?>
*/

class V1_Feature_052  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> {
				<?php $this->css_margin_top(); ?>
				<?php $this->css_padding_top(); ?>
				<?php $this->css_padding_bottom(); ?>
				<?php $this->css_margin_bottom(); ?>
				<?php $this->css_bg_color(); ?>
				<?php $this->css_bg_image(); ?>
				<?php $this->css_attr_color('desc_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-tabs {
				margin: 30px 0 0;
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> h2 {
				color: #212121;
			}
			.<?php $this->eid(); ?> .naver {
				margin: 10px 40px 10px 0;
				border-bottom: 3px solid transparent;
				font-size: 20px;
				font-weight: 600;
				color: #212121;
			}
			.<?php $this->eid(); ?> .naver.mml-active {
				color: #00a978;
				border-color: #00a978;
			}
			.<?php $this->eid(); ?> .taber {
				display: none;
				box-sizing: border-box;
				margin-top: 20px;
				width: 100%;
				order: 2;
			}
			.<?php $this->eid(); ?> .mml-active + .taber {
				display: block;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		var $tabs = $('.<?php $this->eid(); ?> .mml-tabs');
		$tabs.on('click', '.naver', function(){
			if( this.classList.contains('mml-active') ) return;
			$tabs.find('.mml-active').removeClass('mml-active');
			this.classList.add('mml-active');
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<h2>We Bring Impactful Digital Solutions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>
					
					<div class="mml-tabs">
						<a class="naver mml-active">Tab1</a>
						<div class="taber">
							<ul class="mml-cols-4">
								<li><img src="https://via.placeholder.com/280x184/585f6b/e9eef4?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/280x184/585f6b/e9eef4?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/280x184/585f6b/e9eef4?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/280x184/585f6b/e9eef4?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/280x184/585f6b/e9eef4?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/280x184/585f6b/e9eef4?text=I" alt=""></li>
							</ul>
						</div>

						<a class="naver">Tab2</a>
						<div class="taber">
							<ul class="mml-cols-4">
								<li><img src="https://via.placeholder.com/280x184/585f6b/e9eef4?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/280x184/585f6b/e9eef4?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/280x184/585f6b/e9eef4?text=I" alt=""></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		<?php
	}
}
