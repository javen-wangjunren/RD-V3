<?php

/*
<?php mtf_section('V1_Blog_Box_001', 'blog_box_001', [
	'arrow_color' => '#fff',
	'arrow_bgcolor' => '#cccccc',
	'arrow_bgcolor_hover' => '#03a67b',
	'blog_bgcolor' => '#fff',
	'blog_title_color' => '#262626',
	'blog_time_color' => '#808080',
	'blog_more_color' => '#03a67b',
	'columns' => '3', // 列数
	'class' => '',
	'bg_color' => '#fff',
	'bg_image' => '',
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'title_color' => '#333',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus',
	'items' => [
		[ 'image' => 'http://placehold.it/360x270/', 'alt' => 'alt', 'text' => 'content', 'date' => '2019', 'link' => '#', 'more' => 'Learn More' ],
		[ 'image' => '', 'alt' => 'alt', 'text' => 'content', 'date' => '2019', 'link' => '#', 'more' => 'Learn More' ],
		[ 'image' => '', 'alt' => 'alt', 'text' => 'content', 'date' => '2019', 'link' => '#', 'more' => 'Learn More' ]
	]
]); ?>
*/

class V1_Blog_Box_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('arrow_color', '#fff');
		$this->set_default_style('arrow_bgcolor', '#cccccc');
		$this->set_default_style('arrow_bgcolor_hover', '#03a67b');
		$this->set_default_style('blog_bgcolor', '#fff');
		$this->set_default_style('blog_title_color', '#262626');
		$this->set_default_style('blog_time_color', '#808080');
		$this->set_default_style('blog_more_color', '#03a67b');
		$this->set_style_columns(3); // 默认 3 列。

		$this->set_default_content('title', 'We Bring Impactful Digital Solutions');
		$this->set_default_content('desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['image'])) {
					$this->content['items'][$key]['image'] = 'http://placehold.it/360x270/096/cc3/';
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'Image Alt';
				}
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
				}
				if (!isset($value['date'])) {
					$this->content['items'][$key]['date'] = 'October 22nd, 2019';
				}
				if (!isset($value['link'])) {
					$this->content['items'][$key]['link'] = '/';
				}
				if (!isset($value['more'])) {
					$this->content['items'][$key]['more'] = 'Learn More';
				}
			}
		}
	}

	public function style () {
		?>
.<?php $this->eid(); ?> .mml-blogs .blogs-hd {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  margin-bottom: 40px;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-hd .blogs-hd-info {
  -webkit-box-flex: 1;
  -webkit-flex: 1;
      -ms-flex: 1;
          flex: 1;
  margin-bottom: 20px;
  margin-right: 20px;
  <?php $this->css_attr_color('title_color'); ?>
}

.<?php $this->eid(); ?> .mml-blogs .blogs-hd .blogs-hd-info h2 {
  padding-top: 0;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-hd .blogs-hd-info p {
  max-width: 800px;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-hd .blogs-arror {
  display: none;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-hd .blogs-arror.active {
  display: block;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-hd .blogs-arror .arror-item {
  display: inline-block;
  width: 44px;
  height: 44px;
  line-height: 44px;
  text-align: center;
  cursor: pointer;
  background-color: <?php $this->est('arrow_bgcolor'); ?>;
  -webkit-border-radius: 2px;
          border-radius: 2px;
  color: <?php $this->est('arrow_color'); ?>;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-hd .blogs-arror .arror-item:hover {
  background-color: <?php $this->est('arrow_bgcolor_hover'); ?>;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-hd .blogs-arror .arror-item:first-child {
  margin-right: 5px;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-bd {
  max-height: 500px;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-bd .slick-list {
  width: 100%;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-bd .slick-list .slick-track {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
      -ms-flex-pack: justify;
          justify-content: space-between;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-item {
  padding: 10px;
  margin-right: 14px;
  max-width: 380px;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  background-color: <?php $this->est('blog_bgcolor'); ?>;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-item:last-child {
  margin-right: 0px;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-item:hover img {
  -webkit-transform: scale(1.15);
      -ms-transform: scale(1.15);
          transform: scale(1.15);
}

.<?php $this->eid(); ?> .mml-blogs .blogs-item .blogs-item-pic {
  max-width: 360px;
  max-height: 270px;
  overflow: hidden;
  margin-bottom: 15px;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-item a {
  display: block;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-item img {
  display: block;
  margin: 0;
  max-width: 100%;
  -webkit-transition: all .6s ease;
  -o-transition: all .6s ease;
  transition: all .6s ease;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-item .blog-item-tit {
  margin-bottom: 25px;
  overflow: hidden;
  -o-text-overflow: ellipsis;
     text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  color: <?php $this->est('blog_title_color'); ?>;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-item .blog-item-meta {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
      -ms-flex-pack: justify;
          justify-content: space-between;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-item .blog-item-time {
  color: <?php $this->est('blog_time_color'); ?>;
}

.<?php $this->eid(); ?> .mml-blogs .blogs-item .blog-item-more {
  color: <?php $this->est('blog_more_color'); ?>;
  text-decoration: underline;
}
		<?php
	}

	public function script () {
		?>
;(function($){
		$(document).ready(function() {
			var id = '<?php $this->eid(); ?>';
			// 需要在前面生成一个唯一 class
			var len = $('.' + id + ' .J_blogs').find('.blogs-item').length
			if (len > 3 && $(window).width() > 680) {
				// 需要在前面生成一个唯一 class
				$('.' + id + ' .blogs-arror').addClass('active')
			} else if ($(window).width() < 680 && len > 2) {
				// 需要在前面生成一个唯一 class
				$('.' + id + ' .blogs-arror').addClass('active')
			}
			// 需要在前面生成一个唯一 class
			$('.' + id + ' .J_blogs').slick({
			  infinite: true,
			  slidesToShow: 3,
			  arrows: false,
			  slidesToScroll: 3,
			  responsive: [{
	        breakpoint: 680,
	        settings: {
	          slidesToShow: 2,
			  		slidesToScroll: 2,
	        }
	    	}]
			});
			// 需要在前面生成一个唯一 class
			$('.' + id + ' .blogs-arror').on('click', '.arror-item', function(event) {
				if ($(this).hasClass('slick-next')) {
					// 需要在前面生成一个唯一 class
					$('.' + id + ' .J_blogs').slick('slickNext')
				}
				if ($(this).hasClass('slick-prev')) {
					// 需要在前面生成一个唯一 class
					$('.' + id + ' .J_blogs').slick('slickPrev')
				}
			});

		});
	})(jQuery)
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<section class="mml-blogs">
					<div class="container">
						<div class="blogs-hd">
							<div class="blogs-hd-info">
								<?php if ($this->has_content('title')) { ?>
									<h2><?php $this->eco('title'); ?></h2>
								<?php } ?>
								<?php if ($this->has_content('desc')) { ?>
									<p><?php $this->eco('desc'); ?></p>
								<?php } ?>
							</div>
							<div class="blogs-arror">
								<span class="arror-item slick-prev">
									<i class="fas fa-arrow-left"></i>
								</span>
								<span class="arror-item slick-next">
									<i class="fas fa-arrow-right"></i>
								</span>
							</div>
						</div>
						<div class="blogs-bd">
							<div class="J_blogs <?php $this->echo_columns_class(); ?>">
								<?php foreach ($this->content['items'] as $key => $value) { ?>
									<div class="blogs-item">
										<a href="<?php echo esc_attr_e($value['link']); ?>">
										<div class="blogs-item-pic">
											<?php $this->display_tag_img($value['image'], $value['alt']); ?>
										</div>
											<p class="blog-item-tit" title="<?php echo esc_attr_e($value['text']); ?>"><?php echo esc_html_e($value['text']); ?></p>
											<p class="blog-item-meta">
												<span class="blog-item-time"><?php echo esc_html_e($value['date']); ?></span>
												<span class="blog-item-more"><?php echo esc_html_e($value['more']); ?></span>
											</p>
										</a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</section>
			</div>
		<?php
	}
}
