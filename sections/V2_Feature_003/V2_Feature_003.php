<?php

/*
	<?php
	?>
*/

class V2_Feature_003  extends MML_Section_Base {
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
				color: #303030;
				font-size: 36px;
				text-align:center;
        		margin-bottom: 10px;

			}
			.<?php $this->eid(); ?> .navs > a{
				color: #03a679;
			}
			.<?php $this->eid(); ?> .navs > a:hover{
				border-color:#03a679;
			}
			.<?php $this->eid(); ?> .navs > a.active{
				border-color:#03a679;
			}
			.<?php $this->eid(); ?> .list h4{
				color:#303030;
				background-color: rgba(245,245,238,0.6);

			}
			.<?php $this->eid(); ?> .btn{
				border-radius: 26px;
				border: solid 2px #03a679;
				color: #03a679;
				
			}
			.<?php $this->eid(); ?> .btn-reverse{
				background-color: #03a679;
				color: #fff;

			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$(".<?php $this->eid(); ?> .navs > a").click(function(e){
            var i=$(this).index();
            e.preventDefault();
            if(!$(this).is(".active")){
                $(this).addClass("active").siblings().removeClass("active");
            }
            $('.<?php $this->eid(); ?> .list').eq(i).css("display","flex").siblings().hide();

        });

	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<h2>Our Best Colors</h2>
					<div class="navs">
						<a href="javascript:;" class="active">White</a>
						<a href="javascript:;">Grey</a>
						<a href="javascript:;">Black</a>
						<a href="javascript:;">Beige</a>
						<a href="javascript:;">Coffee</a>
					</div>
					<div class="tab-ct">
						<ul class="list mml-cols-3">
							<li>
								<img src="https://via.placeholder.com/380x260" alt="">
								<h4>product title</h4>
							</li>
							<li>
								<img src="https://via.placeholder.com/380x260" alt="">
								<h4>product title</h4>
							</li>
							<li>
								<img src="https://via.placeholder.com/380x260" alt="">
								<h4>product title</h4>
							</li>
						</ul>
						<ul class="list mml-cols-3">
							<li>
								<img src="https://via.placeholder.com/380x260" alt="">
								<h4>product title</h4>
							</li>
							<li>
								<img src="https://via.placeholder.com/380x260" alt="">
								<h4>product title</h4>
							</li>
							<li>
								<img src="https://via.placeholder.com/380x260" alt="">
								<h4>product title</h4>
							</li>
							<li>
								<img src="https://via.placeholder.com/380x260" alt="">
								<h4>product title</h4>
							</li>
						</ul>
					</div>
					<div class="btns">
						<a href="" class="btn">button</a>
						<a href="" class="btn btn-reverse">button</a>
					</div>
				</div>
			</div>
		<?php
	}
}
