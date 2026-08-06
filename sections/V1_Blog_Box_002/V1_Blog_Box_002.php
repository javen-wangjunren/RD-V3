<?php

/*
<?php mtf_section('V1_Blog_Box_002', 'blog_box_002', [
	'blog_title_color' => '#333',
	'blog_title_color_hover' => '#666',
	'blog_date_color' => '#999',
	'blog_desc_color' => '#666',
	'blog_width' => '880px',
	'category_bgcolor' => '#eee',
	'category_title_color' => '#fff',
	'category_title_bgcolor' => '#096',
	'category_link_color' => '#999',
	'category_link_color_active' => '#096',
	'page_color' => '#666',
	'page_color_active' => '#096',
	'class' => '',
	'bg_color' => '#fff',
	'bg_image' => '',
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'custom_css' => '',
], [
	'blogs' => [
		[
			'image' 	=> ['src' => 'https://via.placeholder.com/380x285/096/fff?text=Image', 'alt' => 'Image'],
			'title'		=> 'Blog Title',
			'date'		=> 'October 3rd, 2019',
			'desc'		=> 'Content 1',
			'link'		=> '#'
		],
	],
	'page_total' => '10',
	'page_current' => '2',
	'page_link' => '?page=',
	'category_title' => 'Categories',
	'categories' => [ // 如果不想要显示分类，就把这个设为空数组。
		[
			'text'	=> 'Category Name',
			'link'	=> '#',
			'is_active' => 'y',
		],
	],
]); ?>
*/

class V1_Blog_Box_002  extends MML_Section_Base {
	private $show_categories;

	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style( [
			'blog_title_color'				=> '#333',
			'blog_title_color_hover'		=> '#666',
			'blog_date_color'				=> '#999',
			'blog_desc_color'				=> '#666',
			'blog_width'					=> '880px',
			'category_bgcolor'				=> '#eee',
			'category_title_color'			=> '#fff',
			'category_title_bgcolor'		=> '#096',
			'category_link_color'			=> '#999',
			'category_link_color_active'	=> '#096',
			'page_color'					=> '#666',
			'page_color_active'				=> '#096',
		] );

		$this->init_content( [
			'blogs' => [
				[
					'image' 	=> ['src' => 'https://via.placeholder.com/380x285/096/fff?text=Image', 'alt' => 'Image'],
					'title'		=> 'Blog Title',
					'date'		=> 'October 3rd, 2019',
					'desc'		=> 'Content 1',
					'link'		=> '#'
				],
				[
					'image' 	=> ['src' => 'https://via.placeholder.com/380x285/096/fff?text=Image', 'alt' => 'Image'],
					'title'		=> 'Blog Title',
					'date'		=> 'October 3rd, 2019',
					'desc'		=> 'Content 2',
					'link'		=> '#'
				],
				[
					'image' 	=> ['src' => 'https://via.placeholder.com/380x285/096/fff?text=Image', 'alt' => 'Image'],
					'title'		=> 'Blog Title',
					'date'		=> 'October 3rd, 2019',
					'desc'		=> 'Content 2',
					'link'		=> '#'
				],
			],
			'page_total' => '10',
			'page_current' => '2',
			'page_link' => '?page=',
			'category_title' => 'Categories',
			'categories' => [
				[
					'text'	=> 'Category Name',
					'link'	=> '#',
					'is_active' => 'y',
				],
				[
					'text'	=> 'Category Name',
					'link'	=> '#',
					'is_active' => '',
				]
			],
		] );

		if (count($this->content['categories']) < 1) {
			$this->style['blog_width'] = '1080px';
			$this->show_categories = false;
		} else {
			$this->show_categories = true;
		}
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
				<?php $this->css_attr_color('blog_desc_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-box {
				display: flex;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> .list {
				flex: 1 1 0;
				<?php $this->css_attr('max-width', 'blog_width'); ?>
			}
			.<?php $this->eid(); ?> .list > li {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			.<?php $this->eid(); ?> .list > li + li{
				margin-top: 20px;
			}
			.<?php $this->eid(); ?> .list a{
				<?php $this->css_attr_color('blog_title_color'); ?>
			}
			.<?php $this->eid(); ?> .list a:hover {
				<?php $this->css_attr_color('blog_title_color_hover'); ?>
			}
			.<?php $this->eid(); ?> .blog-time {
				display: block;
				margin: 10px 0;
				<?php $this->css_attr_color('blog_date_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-image {
				width: 45%;
				max-width: 380px;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				padding: 30px 20px;
			}
			.<?php $this->eid(); ?> .blog-sidebar a:hover,
			.<?php $this->eid(); ?> .blog-sidebar a.mml-active {
				<?php $this->css_attr_color('category_link_color_active'); ?>
			}
			.<?php $this->eid(); ?> .list a:hover img {
				filter: brightness(.5);
			}
			<?php if ($this->show_categories) { // 如果没有分类，则隐藏 ?>
				/* Blog_003 删除 .blog-sidebar 相关 */
				.<?php $this->eid(); ?> .blog-sidebar {
					margin: 0 0 auto 20px;
					width: 280px;
					max-width: 100%;
					text-align: center;
					<?php $this->css_attr_color('category_link_color'); ?>
					<?php $this->css_attr('background', 'category_bgcolor'); ?>
				}
				.<?php $this->eid(); ?> .blog-sidebar h4 {
					padding: 10px;
					<?php $this->css_attr('background', 'category_title_bgcolor'); ?>
					<?php $this->css_attr_color('category_title_color'); ?>
				}
				.<?php $this->eid(); ?> .blog-sidebar li {
					margin: 0 10px;
					padding: 10px 0;
				}
				.<?php $this->eid(); ?> .blog-sidebar li + li {
					/* 用样式覆盖来修改边框颜色（分隔线颜色） */
					border-top: 1px solid #e6e6e6;
				}
			<?php } // 如果没有分类，则隐藏 ?>
			.<?php $this->eid(); ?> .pagination {
				margin-top: 70px;
				text-align: center;
			}
			.<?php $this->eid(); ?> .mml-page,
			.<?php $this->eid(); ?> .mml-ellipsis{
				margin: 5px;
				<?php $this->css_attr_color('page_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-page-prev,
			.<?php $this->eid(); ?> .mml-page-next{
				<?php $this->css_attr_color('page_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-current,
			.<?php $this->eid(); ?> .mml-page:hover{
				<?php $this->css_attr_color('page_color_active'); ?>
			}
			@media (max-width: 1080px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .list {
					max-width: unset;
				}
				.<?php $this->eid(); ?> .blog-sidebar{
					margin: 40px auto 0;
				}
			}
			@media (max-width: 767px) {
				.<?php $this->eid(); ?> .list > li {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-image {
					width: unset;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .mml-text {
					padding: 20px 0;
					margin: 0 auto;
					max-width: 540px;
				}
				.<?php $this->eid(); ?> .pagination {
					margin-top: 40px;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		// 页码， 页数， 链接
		?>
(function($){
	$(document).ready(function(){
		var pageTotal = parseInt('<?php echo $this->content['page_total']; ?>') || 1;
		var pageCurrent = parseInt('<?php echo $this->content['page_current']; ?>') || 1;
		$('.<?php $this->eid(); ?> .pagination').mmlpage(pageCurrent, pageTotal, {
			prev: '<i class="fas fa-chevron-left"></i>',
			next: '<i class="fas fa-chevron-right"></i>',
			activeClass: 'mml-current',
			href: '?page='
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<div class="mml-box">
                        <ul class="list">
                            <?php if (count($this->content['blogs']) > 0) { ?>
								<?php foreach ($this->content['blogs'] as $key => $value) { ?>
									<li>
										<div class="mml-image">
											<a href="<?php echo esc_attr($value['link']); ?>">
												<?php $this->display_tag_img(esc_attr($value['image']['src']), __(esc_attr($value['image']['alt']))); ?>
											</a>
										</div>
										<div class="mml-text">
											<h4><a href="<?php echo esc_attr($value['link']); ?>"><?php _e($value['title']); ?></a></h4>
											<time class="blog-time"><?php _e($value['date']); ?></time>
											<p><?php _e($value['desc']); ?></p>
										</div>
									</li>
								<?php } ?>
						    <?php } ?>
                        </ul>

						<?php if (count($this->content['categories']) > 0) { ?>
							<div class="blog-sidebar">
								<h4><?php $this->eco('category_title'); ?></h4>
								<ul>
									<?php foreach ($this->content['categories'] as $key => $value) { ?>
										<li><a href="<?php echo esc_attr($value['link']); ?>" class="<?php echo $value['is_active'] === 'y' ? 'mml-active' : ''; ?>"><?php _e($value['text']); ?></a></li>
									<?php } ?>
								</ul>
							</div>
						<?php } ?>
					</div>

					<div class="pagination"></div>

				</div>
			</div>
		<?php
	}
}
