<?php

/*
	<?php
	?>
*/

class V1_Gallery_001  extends MML_Section_Base {
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
				text-align: center;
			}
			.<?php $this->eid(); ?> h2 {
				color: #000;
			}
			.<?php $this->eid(); ?> .mml-tabs {
				margin: 30px 0 0;
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .naver {
				margin: 10px 15px;
				border-bottom: 3px solid transparent;
				font-size: 20px;
				font-weight: 700;
				color: #000;
			}
			.<?php $this->eid(); ?> .naver.mml-active {
				color: #00a978;
				border-color: #00a978;
			}
			.<?php $this->eid(); ?> .taber {
				order: 2;
				margin: 30px 0 0;
				width: 100%;
				display: none;
				color: #000;
			}
			.<?php $this->eid(); ?> .mml-active + .taber {
				display: block;
			}
			.<?php $this->eid(); ?> .list {
				display: flex;
				flex-wrap: wrap;
				margin: -10px;
			}
			.<?php $this->eid(); ?> .list > li {
				margin: 10px;
				width: calc(33.3333% - 20px);
			}
			.<?php $this->eid(); ?> .btns {
				margin-top: 40px;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .btn{
				background: <?php $this->est('button_bgcolor'); ?>;
				color: <?php $this->est('button_color'); ?>;
				border: 2px solid <?php $this->est('button_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn-reverse{
				background: transparent;
				color: <?php $this->est('button_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn:hover{
				background: <?php $this->est('button_bgcolor_hover'); ?>;
				border-color: transparent;
				color: <?php $this->est('button_color'); ?>;
			}
			@media (max-width: 820px) {
				.<?php $this->eid(); ?> .list > li {
					width: calc(50% - 20px);
				}
			}
			@media (max-width: 540px) {
				.<?php $this->eid(); ?> .naver {
					width: 100%;
					margin: 10px 0;
				}
				.<?php $this->eid(); ?> .taber {
					order: unset;
					margin: 10px 0 40px;
				}
				.<?php $this->eid(); ?> .taber:last-child{
					margin-bottom: 0;
				}
			}
			@media (max-width: 400px) {
				.<?php $this->eid(); ?> .list > li {
					width: 100%;
				}
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
					<h2>Inspiring Gallery</h2>
					<div class="mml-tabs">

						<a class="naver mml-active">Category 1</a>
						<div class="taber">
							<ul class="list">
								<li><img src="https://via.placeholder.com/380x250/ececec/f1f1f1?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/380x250/ececec/f1f1f1?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/380x250/ececec/f1f1f1?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/380x250/ececec/f1f1f1?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/380x250/ececec/f1f1f1?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/380x250/ececec/f1f1f1?text=I" alt=""></li>
							</ul>
						</div>

						<a class="naver">Category 2</a>
						<div class="taber">
							<ul class="list">
								<li><img src="https://via.placeholder.com/380x250/ececec/f1f1f1?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/380x250/ececec/f1f1f1?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/380x250/ececec/f1f1f1?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/380x250/ececec/f1f1f1?text=I" alt=""></li>
							</ul>
						</div>

					</div>
					<div class="btns">
						<a href="javascript:;" class="btn">BUTTON</a>
						<a href="javascript:;" class="btn btn-reverse">BUTTON</a>
					</div>
				</div>
			</div>
		<?php
	}
}
