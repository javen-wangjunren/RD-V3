<?php

/*
	<?php
	?>
*/

class V2_Feature_006  extends MML_Section_Base {
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
			}
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}
			.<?php $this->eid(); ?> .des{
				text-align: right;
				width: 100%;
				margin-bottom: 95px;
			}
			.<?php $this->eid(); ?> .mml-list{
				padding: 75px 65px;
				display: flex;
				flex-wrap: wrap;
				justify-content: space-between;
				align-items: center;
				box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.07);
			}
			.<?php $this->eid(); ?> .mml-list li{
				box-sizing: border-box;
				padding: 20px;
				flex: 1;
				text-align: center;
				white-space: nowrap;
			}
			.<?php $this->eid(); ?> .mml-list  li h3{
				color: #5d6777;
				font-size: 48px;
			}
			.<?php $this->eid(); ?> .mml-list  li p{
				color: #353535;
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
			(function($){
				$(document).ready(function(){
					$('.<?php $this->eid(); ?> .count').each(function(){
						$(this).prop('Counter',0).animate({
							Counter: $(this).text()
						},{
							duration: 1500,
							easing: 'swing',
							step: function (now){
								$(this).text(Math.ceil(now));
							}
						});
					});
				});
			})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start -->
				
				<div class="container">
					<p class="des">Our physical manufacturing force to back you up.</p>
					<ul class="mml-list">
						<li>
							<h3>
								<span class="count">10000</span>
								<span class="unit">pcs</span>
							</h3>
							<p>Output per Day</p>
						</li>
						<li>
							<h3>
								<span class="count">200</span>
								<span class="unit">pcs</span>
							</h3>
							<p>Stylish Products</p>
						</li>
						<li>
							<h3>
								<span class="count">1000</span>
								<span class="unit">+</span>
							</h3>
							<p>Customization Cases</p>
						</li>
					</ul>
				</div>
				
				<!-- insert html end -->
			</div>
		<?php
	}
}
