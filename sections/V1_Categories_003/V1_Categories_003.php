<?php

/*
	<?php
	?>
*/

class V1_Categories_003  extends MML_Section_Base {
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
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}
			.<?php $this->eid(); ?> .cat-sidebar h4{
				background-color: #096;
            	color: #fff;
			}
			.<?php $this->eid(); ?> .cat-menus{
				color: #b3b3b3;

			}
			
			.<?php $this->eid(); ?> .cat-menus li:hover > a{
				color: #03a57b;

			}
			.<?php $this->eid(); ?> .cat-item.mml-current{
				color: #03a57b;
			}
			.<?php $this->eid(); ?> .cat-main h4{
				color: #333333;
			}
			.<?php $this->eid(); ?> .cat-main p{
				color: #808080;
				margin-bottom:40px;
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .cat-menus').on('click', '.fa-chevron-right', function(e){
			e.stopPropagation();
			e.preventDefault();
			var $li = this.parentNode.parentNode;

			if($(this).parent().siblings('.cat-submenu').length > 0){
				$li.classList.toggle('mml-active');

			}
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<div class="cat-sidebar">
						<h4>Categories</h4>
						<ul class="cat-menus">
							<li>
								<a href="" class="cat-item">
									<span>Category 1</span>
									<i class="fas fa-chevron-right"></i>
								</a>
							</li>
							<li class="mml-active">
								<a href="" class="cat-item">
									<span>Category 2</span>
									<i class="fas fa-chevron-right"></i>
								</a>
								<ul class="cat-submenu">
									<li class="mml-active">
										<a href="" class="cat-item mml-current">
											<span>Category 2-1</span>
										</a>
									</li>
									<li>
										<a href="" class="cat-item">
											<span>Category 2-2</span>
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="" class="cat-item">
									<span>Category 3</span>
									<i class="fas fa-chevron-right"></i>
								</a>
								<ul class="cat-submenu">
									<li>
										<a href="" class="cat-item">
											<span>Category 3-1</span>
										</a>
									</li>
									<li>
										<a href="" class="cat-item">
											<span>Category 3-2</span>
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="" class="cat-item">
									<span>Category 4</span>
									<i class="fas fa-chevron-right"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="cat-main">
						<div class="blk">
							<h4>We Bring Impactful Digital Solutions</h4>
							<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo aut soluta, ipsa vel assumenda officia totam, consequatur voluptatibus facere eligendi maxime cumque tenetur ducimus! Accusamus veniam blanditiis debitis dolor nisi.</p>
							<h4>We Bring Impactful Digital Solutions</h4>
							<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo aut soluta, ipsa vel assumenda officia totam, consequatur voluptatibus facere eligendi maxime cumque tenetur ducimus! Accusamus veniam blanditiis debitis dolor nisi.</p>
							<h4>We Bring Impactful Digital Solutions</h4>
							<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo aut soluta, ipsa vel assumenda officia totam, consequatur voluptatibus facere eligendi maxime cumque tenetur ducimus! Accusamus veniam blanditiis debitis dolor nisi.</p>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
