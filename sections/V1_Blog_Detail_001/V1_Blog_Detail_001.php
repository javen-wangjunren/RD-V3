<?php

/*
<?php mtf_section('V1_Blog_Detail_001', 'blog_detail_001', [
	'share_color' => '#333',
	'share_color_hover' => '#999',
	'item_bgcolor' => '#fff',
	'item_title_color' => '#333',
	'item_link_color' => '#333',
	'item_link_color_hover' => '#666',
	'class' => '',
	'bg_color' => '#fff',
	'bg_image' => '',
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'custom_css' => '',
], [
	'blog'	=> [
		'title'	=> 'Title',
		'content'	=> 'anything here',
	],
	'item_title' => 'Related Posts',
	'items' => [
		[
			'text'		=> 'Pariatur consectetur ducimus aliquam, enim temporibus error!',
			'link'	=> '#'
		],
		[
			'text'		=> 'Pariatur consectetur ducimus aliquam, enim temporibus error!',
			'link'	=> '#'
		],
	],
]); ?>
*/

class V1_Blog_Detail_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style( [
			'share_color' => '#333',
			'share_color_hover' => '#999',
			'item_bgcolor'					=> '#fff',
			'item_title_color'				=> '#333',
			'item_link_color'				=> '#333',
			'item_link_color_hover'			=> '#666',
		] );

		$this->init_content( [
			'blog'	=> [
				'title'	=> 'Title',
				'content'	=> 'anything here',
			],
			'item_title' => 'Related Posts',
			'items' => [
				[
					'text'		=> 'Pariatur consectetur ducimus aliquam, enim temporibus error!',
					'link'	=> '#'
				],
				[
					'text'		=> 'Lorem ipsum dolor amet locavore ...',
					'link'	=> '#'
				],
			],
            'page_url'=>'page url',
		] );
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
			}
			.<?php $this->eid(); ?> .blog-title{
				margin-bottom: 30px;
				max-width: calc(100% - 320px);
				font-size: 36px;
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-box {
				display: flex;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> .mml-article {
				flex: 1 1 0;
				max-width: 830px;
			}
			.<?php $this->eid(); ?> .mml-shares {
				margin-top: 40px;
				text-align: right;
				color: #999;
			}
			.<?php $this->eid(); ?> .mml-shares a {
				margin-left: 10px;
				<?php $this->css_attr_color('share_color'); ?>
				font-size: 20px;
			}
			.<?php $this->eid(); ?> .mml-shares a:hover{
				<?php $this->css_attr_color('share_color_hover'); ?>
			}
			.<?php $this->eid(); ?> .blog-sidebar {
				box-sizing: border-box;
				margin: 0 0 auto 20px;
				width: 280px;
				<?php $this->css_attr('background', 'item_bgcolor'); ?>
				box-shadow: 0px 0px 30px 0px rgba(84, 87, 93, 0.1);
			}
			.<?php $this->eid(); ?> .blog-sidebar h4 {
				padding: 20px 20px 20px 50px;
				<?php $this->css_attr_color('item_title_color'); ?>
			}
			.<?php $this->eid(); ?> .blog-sidebar li {
				padding: 15px 0;
				margin: 0 30px;
			}
			.<?php $this->eid(); ?> .blog-sidebar li + li {
				border-top: 1px solid #ddd6;
			}
			.<?php $this->eid(); ?> .blog-sidebar a{
				display: flex;
				align-items: baseline;
				<?php $this->css_attr_color('item_link_color'); ?>
			}
			.<?php $this->eid(); ?> .blog-sidebar a:hover {
				<?php $this->css_attr_color('item_link_color_hover'); ?>
			}
			.<?php $this->eid(); ?> .blog-sidebar a:hover .fa-arrow-right {
				opacity: 1;
			}
			.<?php $this->eid(); ?> .blog-sidebar .fa-arrow-right{
				flex: 1 1 0;
				margin-right: 10px;
				opacity: 0;
				transition: opacity .24s;
			}
			@media (max-width: 880px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .blog-title {
					max-width: unset;
				}
				.<?php $this->eid(); ?> .blog-sidebar {
					margin: 40px 0 0 auto;
					width: 540px;
					max-width: 100%;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>

		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<?php if( !empty( $this->content['blog']['title'] ) ) { ?>
						<h1 class="blog-title"><?php esc_html_e($this->content['blog']['title']); ?></h1>
					<?php } ?>
					<div class="mml-box">
						<div class="mml-article">
							<?php echo apply_filters('the_content', $this->content['blog']['content']); ?>

							<div class="mml-shares">
								<b>Awesome! Share to:</b>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $this->content['page_url'] ?>" class="fb-xfbml-parse-ignore" target="_blank"><i class="fab fa-facebook-square"></i></a>
								<a href="https://twitter.com/share?url=<?php echo $this->content['page_url'] ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
								<a href="https://www.pinterest.com/pin/create/button?url=<?php echo $this->content['page_url'] ?>" target="_blank"><i class="fab fa-pinterest-square"></i></a>
								<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $this->content['page_url'] ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
							</div>
						</div>

						<?php if (count($this->content['items']) > 0) { ?>
							<div class="blog-sidebar">
								<h4><?php $this->eco('item_title'); ?></h4>
								<ul>
									<?php foreach ($this->content['items'] as $key => $value) { ?>
										<li>
											<a href="<?php echo esc_attr($value['link']); ?>">
												<i class="fas fa-arrow-right"></i>
												<span><?php _e($value['text']); ?></span>
											</a>
										</li>
									<?php } ?>
								</ul>
							</div>
						<?php } ?>

					</div>
				</div>

				<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_CN/sdk.js#xfbml=1&version=v3.3"></script>
			</div>
		<?php
	}
}
