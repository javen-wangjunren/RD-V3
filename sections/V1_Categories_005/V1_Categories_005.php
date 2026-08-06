<?php

/*
	<?php
	?>
*/

class V1_Categories_005  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .tab-header {
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> h3 {
				margin: 0 20px 10px 0;
				width: 100%; /* 是否换行 */
				color: #333;
			}
			.<?php $this->eid(); ?> h4 {
				color: #444;
				transition: color .24s;
			}
			.<?php $this->eid(); ?> .navers {
				flex: 1 1 0;
				margin: 0 -10px;
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .navers > a {
				margin: 10px;
				padding: 4px 16px;
				background-color: #f5f5f5;
				border-radius: 6px;
			}
			.<?php $this->eid(); ?> .navers > .mml-active {
				background: #d6efe8;
				color: #004d37;
			}
			.<?php $this->eid(); ?> .tab {
				display: none;
				margin-top: 20px;
			}
			.<?php $this->eid(); ?> .tab > ul > li {
				background: #fff;
				border-radius: 4px;
				box-shadow: 0px 6px 27px 0px rgba(0, 0, 0, 0.06);
				overflow: hidden;
			}
			.<?php $this->eid(); ?> .tab.mml-active {
				display: block;
			}
			.<?php $this->eid(); ?> .tab a:hover img {
				filter: brightness(.5);
			}
			.<?php $this->eid(); ?> .tab a:hover h4 {
				color: #004d37;
			}
			.<?php $this->eid(); ?> .mml-text {
				padding: 20px;
			}
			.<?php $this->eid(); ?> .mml-text b {
				color: #444;
			}
			.<?php $this->eid(); ?> .pagination {
				margin-top: 40px;
				text-align: center;
			}
			.<?php $this->eid(); ?> .mml-page,
			.<?php $this->eid(); ?> .mml-ellipsis{
				margin: 5px;
			}
			.<?php $this->eid(); ?> .mml-page-prev,
			.<?php $this->eid(); ?> .mml-page-next{
				color: #9d9d9d;
			}
			.<?php $this->eid(); ?> .mml-current,
			.<?php $this->eid(); ?> .mml-page:hover{
				color: #03a57b;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .navers > a').on('click', function(){
			if( this.classList.contains('mml-active') ) return;
			var tab = this.dataset.tab - 0;
			$('.<?php $this->eid(); ?> .navers > .mml-active').removeClass('mml-active');
			$('.<?php $this->eid(); ?> .tab.mml-active').removeClass('mml-active');
			this.classList.add('mml-active');
			$('.<?php $this->eid(); ?> .tab')[tab].classList.add('mml-active');
		});

		$('.<?php $this->eid(); ?> .pagination').each(function( index, el ){
			var $el = $(el);
			$el.mmlpage(
				el.dataset.current - 0,
				el.dataset.total - 0,
				{
					prev: '<i class="fas fa-chevron-left"></i>',
					next: '<i class="fas fa-chevron-right"></i>',
					activeClass: 'mml-current',
					click: function( p ){
						$el.mmlpage(p, el.dataset.total);
					}
				}
			);
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<div class="tab-header">
						<h3>Tab Heading</h3>
						<div class="navers">
							<a class="mml-active" data-tab="0">Tab 1</a>
							<a data-tab="1">Tab 2</a>
							<a data-tab="2">Tab 3</a>
							<a data-tab="3">Tab 4</a>
							<a data-tab="4">Tab 5</a>
						</div>
					</div>
					<div class="tabs">
						<div class="tab mml-active">
							<ul class="mml-cols-3">
								<li>
									<a href="javascript:;">
										<div class="mml-image"><img src="https://via.placeholder.com/380x285/585f6b/e9eef4?text=I" alt=""></div>
										<div class="mml-text">
											<h4>Product Name</h4>
											<ul class="features">
												<li>
													<b>Data 1:</b>
													<span>ipsum dolor sit amet</span>
												</li>
												<li>
													<b>Data 2:</b>
													<span>proin gravida dolor sit amet lacus </span>
												</li>
											</ul>
										</div>
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<div class="mml-image"><img src="https://via.placeholder.com/380x285/585f6b/e9eef4?text=I" alt=""></div>
										<div class="mml-text">
											<h4>Product Name</h4>
											<ul class="features">
												<li>
													<b>Data 1:</b>
													<span>ipsum dolor sit amet</span>
												</li>
												<li>
													<b>Data 2:</b>
													<span>proin gravida dolor sit amet lacus </span>
												</li>
											</ul>
										</div>
									</a>
								</li>
							</ul>
							<div class="pagination" data-total="7" data-current="1"></div>
						</div>
						<div class="tab">
							<ul class="mml-cols-3"></ul>
							<div class="pagination" data-total="5" data-current="1"></div>
						</div>
						<div class="tab">
							<ul class="mml-cols-3"></ul>
							<div class="pagination" data-total="3" data-current="1"></div>
						</div>
						<div class="tab">
							<ul class="mml-cols-3"></ul>
							<div class="pagination" data-total="1" data-current="1"></div>
						</div>
						<div class="tab">
							<ul class="mml-cols-3"></ul>
							<div class="pagination" data-total="10" data-current="1"></div>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
