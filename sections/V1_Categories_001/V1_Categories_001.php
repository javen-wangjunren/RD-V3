<?php

/*
<?php mtf_section('V1_Categories_001', 'v1_categories_001', [
	'category_width' => '280px',
	'category_title_color' => '#fff',
	'category_title_bgcolor' => '#096',
	'category_menu_color' => '#666',
	'category_menu_color_active' => '#096',
	'category_menu_bgcolor_active' => '#ccc',
	'product_title_color' => '#333',
	'product_title_color_hover' => '#096',
	'product_text_align' => '',
	'product_desc_color' => '#666',
	'columns' => '3', // 列数
	'class' => '',
	'bg_color' => '',
	'bg_image' => '',
	'background_attachment' => '', // 如果需要视差效果，请赋值 fixed
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'custom_css' => '',
], [
	'current_page' => '2',
	'total_pages' => '5',
	'menu_title' => 'Categories',
	'menus' => [ // 1 级菜单
		[
			'text' => 'Category 1',
			'link' => '#',
			'active' => true, // 是否处于激活状态
			'submenus' => [ // 2 级菜单
				[
					'text' => 'Category 1 - 1',
					'link' => '#',
					'active' => true,
					'submenus' => [ // 3 级菜单
						[ 'text' => 'Category 1-1-1', 'link' => '#', 'active' => true ],
					]
				],
			]
		],
	],
	'items' => [ // 产品
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => 'Dignissimos, consequatur quis debitis sunt, eaque iusto, adipisci id necessitatibus eum maiores mollitia rerum quia excepturi facilis sapiente totam harum tenetur! Laudantium.',
			'link' => '#',
		],
	],
]); ?>
*/

class V1_Categories_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('category_width', '280px');
		$this->set_default_style('category_title_color', '#fff');
		$this->set_default_style('category_title_bgcolor', '#096');
		$this->set_default_style('category_menu_color', '#666');
		$this->set_default_style('category_menu_color_active', '#096');
		$this->set_default_style('category_menu_bgcolor_active', '#ccc');
		$this->set_default_style('product_title_color', '#333');
		$this->set_default_style('product_title_color_hover', '#096');
		$this->set_default_style('product_text_align', '');
		$this->set_default_style('product_desc_color', '#666');
		$this->set_style_columns(3); // 默认 3 列。

		$this->init_content([
			'current_page' => '2',
			'total_pages' => '5',
			'menu_title' => 'Categories',
			'menus' => [
				[
					'text' => 'Category 1',
					'link' => '#',
					'active' => true,
					'submenus' => [
						[
							'text' => 'Category 1 - 1',
							'link' => '#',
							'active' => true,
							'submenus' => [
								[ 'text' => 'Category 1-1-1', 'link' => '#', 'active' => true ],
								[ 'text' => 'Category 1-1-2', 'link' => '#', 'active' => false ],
							]
						],
						[
							'text' => 'Category 1 - 2',
							'link' => '#',
							'active' => false,
							'submenus' => [
								[ 'text' => 'Category 1-2-1', 'link' => '#', 'active' => false ],
								[ 'text' => 'Category 1-2-2', 'link' => '#', 'active' => false ],
							]
						],
					]
				],
				[
					'text' => 'Category 2',
					'link' => '#',
					'active' => false,
					'submenus' => [
						[
							'text' => 'Category 2 - 1',
							'link' => '#',
							'active' => false,
							'submenus' => [
								[ 'text' => 'Category 2-1-1', 'link' => '#', 'active' => false ],
								[ 'text' => 'Category 2-1-2', 'link' => '#', 'active' => false ],
							]
						],
						[
							'text' => 'Category 2 - 2',
							'link' => '#',
							'active' => false,
							'submenus' => [
								[ 'text' => 'Category 2-2-1', 'link' => '#', 'active' => false ],
								[ 'text' => 'Category 2-2-2', 'link' => '#', 'active' => false ],
							]
						],
					]
				],
			],
			'items' => [
				[
					'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
					'title' => 'Product Name',
					'desc' => 'Dignissimos, consequatur quis debitis sunt, eaque iusto, adipisci id necessitatibus eum maiores mollitia rerum quia excepturi facilis sapiente totam harum tenetur! Laudantium.',
					'link' => '#',
				],
				[
					'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
					'title' => 'Product Name',
					'desc' => 'Dignissimos, consequatur quis debitis sunt, eaque iusto, adipisci id necessitatibus eum maiores mollitia rerum quia excepturi facilis sapiente totam harum tenetur! Laudantium.',
					'link' => '#',
				],
			],
		]);
	}

	private function display_menu ($menu) {
		//
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
			}
			.<?php $this->eid(); ?> .container {
				display: flex;
			}
			.<?php $this->eid(); ?> .cat-sidebar {
				box-sizing: border-box;
				margin-right: 20px;
				<?php $this->css_attr('width', 'category_width'); ?>
			}
			.<?php $this->eid(); ?> h4 {
				padding: 15px 10px;
				<?php $this->css_attr('background', 'category_title_bgcolor'); ?>
				<?php $this->css_attr_color('category_title_color'); ?>
				text-align: center;
			}
			.<?php $this->eid(); ?> .cat-menus {
				border: 1px solid #d6d6d6;
				border-top: none;
				<?php $this->css_attr_color('category_menu_color'); ?>
				font-weight: 700;
			}
			.<?php $this->eid(); ?> .cat-item {
				padding: 15px 20px;
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			.<?php $this->eid(); ?> .cat-item:hover {
				<?php $this->css_attr_color('category_menu_color_active'); ?>
			}
			.<?php $this->eid(); ?> .cat-menus > .mml-active > .cat-item {
				<?php $this->css_attr('background', 'category_menu_bgcolor_active'); ?>
				<?php $this->css_attr_color('category_menu_color_active'); ?>
			}
			.<?php $this->eid(); ?> .fa-chevron-right {
				transition: all .24s;
			}
			.<?php $this->eid(); ?> .mml-active > .cat-item .fa-chevron-right {
				transform: rotate(90deg);
			}
			.<?php $this->eid(); ?> .cat-submenu {
				padding: 0 0 0 20px;
				height: 0;
				transition: all .24s;
				overflow: hidden;
			}
			.<?php $this->eid(); ?> .mml-active > .cat-submenu {
				height: unset;
				padding: 10px 0 10px 20px;
			}
			.<?php $this->eid(); ?> .cat-submenu .cat-item{
				padding: 4px 20px;
			}
			.<?php $this->eid(); ?> .cat-item.mml-current {
				<?php $this->css_attr_color('category_menu_color_active'); ?>
			}
			.<?php $this->eid(); ?> .cat-main {
				flex: 1 1 0;
			}
			.<?php $this->eid(); ?> .cat-products{
				margin: 0 -10px;
				display: flex;
				flex-wrap: wrap;
				<?php $this->css_attr_color('product_desc_color'); ?>
				<?php $this->css_attr('text-align', 'product_text_align'); ?>

			}
			.<?php $this->eid(); ?> .cat-products > li {
				margin: 0 10px 40px;
			}
			.<?php $this->eid(); ?> .cat-products .mml-image {
				position: relative;
				margin-bottom: 15px;
			}
			.<?php $this->eid(); ?> .cat-products a {
				<?php $this->css_attr_color('product_title_color'); ?>
			}
			.<?php $this->eid(); ?> .cat-products a:hover {
				<?php $this->css_attr_color('product_title_color_hover'); ?>
			}
			.<?php $this->eid(); ?> .cat-products a:hover img {
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
			@media (max-width: 900px) {
				.<?php $this->eid(); ?> .container {
					display: block;
				}
				.<?php $this->eid(); ?> .cat-sidebar {
					width: unset;
					margin: 0 auto 30px;
				}
				.<?php $this->eid(); ?> .cat-item {
					padding: 10px 20px;
				}
				.<?php $this->eid(); ?> .mml-active > .cat-submenu {
					padding: 5px 0 5px 20px;
				}
			}
			@media (max-width: 600px) {
				.<?php $this->eid(); ?> .cat-products > li {
					width: calc(50% - 20px);
				}
				.<?php $this->eid(); ?> .pagination {
					margin-top: 0;
				}
			}
			@media (max-width: 400px) {
				.<?php $this->eid(); ?> .cat-products > li {
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
		$('.<?php $this->eid(); ?> .cat-menus').on('click', '.fa-chevron-right', function(e){
			e.stopPropagation();
			e.preventDefault();
			var $li = this.parentNode.parentNode;
			$li.classList.toggle('mml-active');
		});

		var $pagination = $('.<?php $this->eid(); ?> .pagination');
		$pagination.mmlpage(
			$pagination.data('currentpage'),
			$pagination.data('totalpages'),
			{
			prev: '<i class="fas fa-chevron-left"></i>',
			next: '<i class="fas fa-chevron-right"></i>',
			activeClass: 'mml-current'
		}).on('click', '[data-page]', function(){
			var p = this.dataset.page - 0;
			$pagination.mmlpage(p, $pagination.data('totalpages'));
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
						<h4><?php $this->eco('menu_title'); ?></h4>
						<ul class="cat-menus">
							<?php foreach ($this->content['menus'] as $key1 => $menu1) { ?>
								<li class="<?php echo $menu1['active'] ? 'mml-active' : ''; ?>">
									<a href="<?php echo $menu1['link']; ?>" class="cat-item">
										<span><?php _e($menu1['text']); ?></span>
										<?php if (isset($menu1['submenus']) && count($menu1['submenus']) > 0) { ?>
											<i class="fas fa-chevron-right"></i>
										<?php } ?>
									</a>
									<?php if (isset($menu1['submenus']) && count($menu1['submenus']) > 0) { ?>
										<ul class="cat-submenu">
											<?php foreach ($menu1['submenus'] as $key2 => $menu2) { ?>
												<li class="<?php echo $menu2['active'] ? 'mml-active' : ''; ?>">
													<a href="<?php echo $menu2['link']; ?>" class="cat-item <?php echo $menu2['active'] ? 'mml-current' : ''; ?>">
														<span><?php _e($menu2['text']); ?></span>
														<?php if (isset($menu2['submenus']) && count($menu2['submenus']) > 0) { ?>
															<i class="fas fa-chevron-right"></i>
														<?php } ?>
													</a>
													<?php if (isset($menu2['submenus']) && count($menu2['submenus']) > 0) { ?>
														<ul class="cat-submenu">
															<?php foreach ($menu2['submenus'] as $key3 => $menu3) { ?>
																<li>
																	<a href="<?php echo $menu3['link']; ?>" class="cat-item <?php echo $menu3['active'] ? 'mml-current' : ''; ?>"><span><?php _e($menu3['text']); ?></span></a>
																</li>
															<?php } ?>
														</ul>
													<?php } ?>
												</li>
											<?php } ?>
										</ul>
									<?php } ?>
								</li>
							<?php } ?>
						</ul>
					</div>

					<div class="cat-main">
						<ul class="cat-products  <?php $this->echo_columns_class(); ?>">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<a href="<?php echo $value['link']; ?>">
										<div class="mml-image">
											<?php $this->display_tag_img($value['image']['src'], $value['image']['alt']); ?>
										</div>
										<b><?php _e($value['title']); ?></b>
									</a>
									<p><?php _e($value['desc']); ?></p>
								</li>
							<?php } ?>
						</ul>
						<div class="pagination" data-totalpages="<?php echo $this->content['total_pages']; ?>" data-currentpage="<?php echo $this->content['current_page']; ?>"></div>
					</div>

				</div>
			</div>
		<?php
	}
}
