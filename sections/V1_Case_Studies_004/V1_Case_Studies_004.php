<?php

/*
<?php mtf_section('V1_Case_Studies_004', 'v1_case_studies_004', [
	'tab_nav_color' => '#333',
	'tab_nav_color_active' => '#096',
	'tabitem_heading_color' => '#333',
	'tabitem_heading_color_hover' => '#666',
	'tabitem_content_color' => '#666',
	'columns' => '3', // 列数
	'class' => '',
	'bg_color' => '',
	'bg_image' => '',
	'background_attachment' => '', // 如果需要视差效果，请赋值 fixed
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'title_color' => '#333',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'title' => 'Title',
	'desc' => 'This is the description.',
		'tabs' => [
			[
				'name' => 'a',
				'items' => [
					[
						'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
						'heading' => 'Heading',
						'content' => 'This is the content',
					],
				],
				'total_pages' => 5,
			],
		],
]); ?>
*/

class V1_Case_Studies_004  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style([
			'tab_nav_color' => '#333',
			'tab_nav_color_active' => '#096',
			'tabitem_heading_color' => '#333',
			'tabitem_heading_color_hover' => '#666',
			'tabitem_content_color' => '#666',
		]);
		$this->set_style_columns(3); // 默认 3 列。

		$this->init_content([
			'tabs' => [
				[
					'name' => 'a',
					'items' => [
						[
							'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
							'heading' => 'Heading',
							'content' => 'This is the content',
						],
						[
							'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
							'heading' => 'Heading',
							'content' => 'This is the content',
						],
						[
							'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
							'heading' => 'Heading',
							'content' => 'This is the content',
						],
						[
							'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
							'heading' => 'Heading',
							'content' => 'This is the content',
						],
					],
					'total_pages' => 5,
				],
				[
					'name' => 'b',
					'items' => [
						[
							'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
							'heading' => 'Heading',
							'content' => 'This is the content',
						],
						[
							'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
							'heading' => 'Heading',
							'content' => 'This is the content',
						],
						[
							'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
							'heading' => 'Heading',
							'content' => 'This is the content',
						],
					],
					'total_pages' => 5,
				],
			],
		]);
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
				<?php $this->css_attr_color('title_color'); ?>
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
				cursor: pointer;
				<?php $this->css_attr_color('tab_nav_color'); ?>
			}
			.<?php $this->eid(); ?> .naver.mml-active {
				<?php $this->css_attr_color('tab_nav_color_active'); ?>
				<?php $this->css_attr('border-color', 'tab_nav_color_active'); ?>
			}
			.<?php $this->eid(); ?> .taber {
				order: 2;
				margin: 30px 0 0;
				width: 100%;
				display: none;
				<?php $this->css_attr_color('tabitem_heading_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-active + .taber {
				display: block;
			}
			.<?php $this->eid(); ?> .list > li {
				margin: 10px 10px 20px;
				text-align: left;
				max-width: unset;
			}
			.<?php $this->eid(); ?> .list a {
				<?php $this->css_attr_color('tabitem_heading_color'); ?>
			}
			.<?php $this->eid(); ?> .list a:hover {
				<?php $this->css_attr_color('tabitem_heading_color_hover'); ?>
			}
			.<?php $this->eid(); ?> .list a:hover img {
				filter: brightness(.5);
			}
			.<?php $this->eid(); ?> .pagination {
				margin-top: 40px;
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
			.<?php $this->eid(); ?> h4 {
				margin: 20px 0 0;
			}
			.<?php $this->eid(); ?> .details {
				margin: 10px 0;
				<?php $this->css_attr_color('tabitem_content_color'); ?>
			}
			.<?php $this->eid(); ?> .details li {
				display: flex;
				align-items: flex-start;
				margin: 10px 0;
			}
			.<?php $this->eid(); ?> .details li:before {
				content: '\20';
				flex-shrink: 0;
				margin: 10px 10px 0 0;
				width: 6px; height: 6px;
				border-radius: 6px;
				background: #03a67b;
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

		$('.<?php $this->eid(); ?> .pagination').each(function( i, el ){
			var total = this.dataset.total - 0;
			if( total > 1 ){
				$(el).mmlpage(1, total, {
					prev: '<i class="fas fa-chevron-left"></i>',
					next: '<i class="fas fa-chevron-right"></i>',
					activeClass: 'mml-current'
				}).on('click', '[data-page]', function(){
					var p = this.dataset.page - 0;
					var tab = el.dataset.tab;
					var ul = el.previousElementSibling;
					el.innerHTML = 'Loading Cases ...';
					$.ajax({
						url: '.......',
						success: function( res ){
							console.log(res);

							$(el).mmlpage(p, total);
						}
					})
					
				});
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
					<?php if ($this->has_content('title')) { ?>
						<h2><?php $this->eco('title'); ?></h2>
					<?php } ?>
					<?php if ($this->has_content('desc')) { ?>
						<p><?php $this->eco('desc'); ?></p>
					<?php } ?>
					<?php if (count($this->content['tabs']) > 0) { ?>
						<div class="mml-tabs">
							<?php foreach ($this->content['tabs'] as $tab_key => $tab) { ?>
								<a class="naver <?php echo $tab_key == 0 ? 'mml-active' : ''; ?>"><?php _e($tab['name']); ?></a>
								<div class="taber">
									<?php if (isset($tab['items']) && is_array($tab['items']) && count($tab['items']) > 0) { ?>
										<ul class="list <?php $this->echo_columns_class(); ?>">
											<?php foreach ($tab['items'] as $key => $value) { ?>
												<li>
													<a href="javascript:;">
														<div class="mml-image">
															<?php $this->display_tag_img($value['image']['src'], $value['image']['alt']); ?>
														</div>
														<h4><?php _e($value['heading']); ?></h4>
													</a>
													<div class="details">
														<?php _e($value['content']); ?>
													</div>
												</li>
											<?php } ?>
										</ul>
										<div data-tab="0" class="pagination" data-total="<?php echo $tab['total_pages']; ?>"></div>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
