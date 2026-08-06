<?php

/*
	<?php
	?>
*/

class V1_Feature_082  extends MML_Section_Base {
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
				color: #2a3344;
				text-align:left;
			}
			.<?php $this->eid(); ?> .container > p{
				max-width:780px;
			}
			.<?php $this->eid(); ?> p{
				color: #808080;
				text-align:left;

			}
			.<?php $this->eid(); ?> .naver li{
				color: #808080;
			}
			.<?php $this->eid(); ?> .naver li:hover{
                color: #2d72da;

			}
			.<?php $this->eid(); ?> .naver li:hover::before{
                width: 100%;
			}
			.<?php $this->eid(); ?> .naver li.active{
                color: #2d72da;

			}
			.<?php $this->eid(); ?> .naver li.active::before{
                width: 100%;
			}
			.<?php $this->eid(); ?> .tab-ct .desc h4{
				color: #2a3344;
			}
			.<?php $this->eid(); ?> .btn{
				background-color: #2d72da;
				border-color: #2d72da;
				color: #ffffff;
			}
			.<?php $this->eid(); ?> .btn.btn-reverse{
				background-color: transparent;
				border-color: #2a3344;
				color: #2a3344;
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$(".<?php $this->eid(); ?> .naver li").click(function(){
            var i=$(this).index();
            if(!$(this).is(".active")){
                $(this).addClass("active").siblings().removeClass("active");
            }
            $('.<?php $this->eid(); ?> .tab-ct').eq(i).show().siblings('.<?php $this->eid(); ?> .tab-ct').hide();

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
					<div class="mml-box">
						<ul class="naver">
							<li class="active">Tab Category No.1</li>
							<li>Tab Category No.2</li>
							<li>Tab Category No.3</li>
						</ul>
						<div class="tab-wrap">
							<div class="taber">
								<div class="tab-ct">
									<img src="https://via.placeholder.com/780x340" alt="">
									<div class="desc">
										<h4>Tab Category No.1</h4>
										<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice. Vape lomo jianbing mlkshk prism.</p>
									</div>
								</div>
								<div class="tab-ct">
									<img src="https://via.placeholder.com/780x340" alt="">
									<div class="desc">
										<h4>Tab Category No.2</h4>
										<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice. Vape lomo jianbing mlkshk prism.</p>
									</div>
								</div>
								<div class="tab-ct">
									<img src="https://via.placeholder.com/780x340" alt="">
									<div class="desc">
										<h4>Tab Category No.3</h4>
										<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice. Vape lomo jianbing mlkshk prism.</p>
									</div>
								</div>
							</div>
							<div class="btns">
								<a href="" class="btn">CTA Button</a>
								<a href="" class="btn btn-reverse">CTA Button</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
