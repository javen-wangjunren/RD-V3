<?php

/*
	<?php
	?>
*/

class V1_Clients_005  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> h2{
				color: #252525;
			}
			.<?php $this->eid(); ?> .container >p{
				color: #808080;
				max-width:780px;
				margin:10px auto;
			}
			.<?php $this->eid(); ?> .list li{
				border-color:#5d6777;
			}
			.<?php $this->eid(); ?> .slicker h4{
				color: #000000;
			}
			.<?php $this->eid(); ?> .slicker p{
				color: #808080;
			}
			.<?php $this->eid(); ?> .slicker .slick-arrow{
				color:#5d6777;
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			infinite:true,
            slidesToShow: 1,
            slidesToScroll: 1,
			dots: false,
			arrows: true,
			prevArrow:'<i class="fas fa-chevron-left btn-l"></i>',
			nextArrow:'<i class="fas fa-chevron-right btn-r"></i>',
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
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
					<div class="box">
						<ul class="slicker">
							<li>
								<h4>Keith Cadwallader, Contracts Manager</h4>
								<p>We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.</p>
							</li>
							<li>
								<h4>Keith Cadwallader, Contracts Manager</h4>
								<p>We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.</p>
							</li>
						</ul>
						<ul class="list mml-cols-3">
							<li>
								<img src="https://via.placeholder.com/180x128" alt="">
							</li>
							<li>
								<img src="https://via.placeholder.com/180x128" alt="">
							</li>
							<li>
								<img src="https://via.placeholder.com/180x128" alt="">
							</li>
							<li>
								<img src="https://via.placeholder.com/180x128" alt="">
							</li>
							<li>
								<img src="https://via.placeholder.com/180x128" alt="">
							</li>
							<li>
								<img src="https://via.placeholder.com/180x128" alt="">
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php
	}
}
