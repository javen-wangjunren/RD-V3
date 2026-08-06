<?php

/*
	<?php
	?>
*/

class V1_Categories_004  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .cat-menus li:hover > a:before{
				background-color: #03a57b;
			}
			.<?php $this->eid(); ?> .cat-item.mml-current{
				color: #03a57b;
			}
			.<?php $this->eid(); ?> .cat-item.mml-current:before{
				background-color: #03a57b;
			}
			.<?php $this->eid(); ?> .cat-main b{
				color: #262626;
			}
			.<?php $this->eid(); ?> .cat-main p{
				color: #808080;
			}
			.<?php $this->eid(); ?> .cat-main a:hover img{
				filter: brightness(.5);
			}
			.<?php $this->eid(); ?> .cat-main a:hover b{
				color: #03a57b;
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
						<ul class="cat-products mml-cols-3">
							<li>
								<a href="">
									<div class="mml-image">
										<img src="https://via.placeholder.com/280x210" alt="">
									</div>
									<b>Product Name</b>
								</a>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>
							</li>
							<li>
								<a href="">
									<div class="mml-image">
										<img src="https://via.placeholder.com/280x210" alt="">
									</div>
									<b>Product Name</b>
								</a>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>
							</li>
							<li>
								<a href="">
									<div class="mml-image">
										<img src="https://via.placeholder.com/280x210" alt="">
									</div>
									<b>Product Name</b>
								</a>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>
							</li>
							<li>
								<a href="">
									<div class="mml-image">
										<img src="https://via.placeholder.com/280x210" alt="">
									</div>
									<b>Product Name</b>
								</a>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>
							</li>
							<li>
								<a href="">
									<div class="mml-image">
										<img src="https://via.placeholder.com/280x210" alt="">
									</div>
									<b>Product Name</b>
								</a>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>
							</li>
						</ul>
						<div class="pagination" data-totalpages="<?php echo $this->content['total_pages']; ?>" data-currentpage="<?php echo $this->content['current_page']; ?>"></div>
					</div>
				</div>
			</div>
		<?php
	}
}
