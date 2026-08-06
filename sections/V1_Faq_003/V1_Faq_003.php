<?php

/*
<?php mtf_section('V1_Faq_003', 'faq_003', [
	'item_bgcolor' => '#fff',
	'question_color' => '#333',
	'question_color_active' => '#0095eb',
	'answer_color' => '#666',
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
	'title' => 'Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'question' => '', 'answer' => '' ]
	],
]); ?>
*/

class V1_Faq_003  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_bgcolor', '#fff');
		$this->set_default_style('question_color', '#333');
		$this->set_default_style('question_color_active', '#0095eb');
		$this->set_default_style('answer_color', '#666');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['question'])) {
					$this->content['items'][$key]['question'] = 'Question';
				}
				if (!isset($value['answer'])) {
					$this->content['items'][$key]['answer'] = 'This is the answer';
				}
			}
		}
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
			.<?php $this->eid(); ?> .m-faq-hd {
			  margin-bottom: 30px;
			}

			.<?php $this->eid(); ?> .section-tit {
				<?php $this->css_attr_color('title_color'); ?>
			}

			.<?php $this->eid(); ?> .m-faq-item {
			  position: relative;
			  margin-bottom: 10px;
				<?php $this->css_attr('background', 'item_bgcolor'); ?>
			  -webkit-box-shadow: 0px 0px 13px 0px rgba(0, 0, 0, 0.09);
			          box-shadow: 0px 0px 13px 0px rgba(0, 0, 0, 0.09);
			  -webkit-border-radius: 6px;
			          border-radius: 6px;
			  <?php $this->css_attr_color('answer_color'); ?>
			}

			.<?php $this->eid(); ?> .m-faq-item.active .m-faq-item-hd {
				<?php $this->css_attr_color('question_color_active'); ?>
			}

			.<?php $this->eid(); ?> .m-faq-item.active .m-faq-item-hd i::before {
			  -webkit-transform: rotate(180deg);
			      -ms-transform: rotate(180deg);
			          transform: rotate(180deg);
			}

			.<?php $this->eid(); ?> .m-faq-item .m-faq-item-hd {
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  padding: 16px 0;
			  cursor: pointer;
			  <?php $this->css_attr_color('question_color'); ?>
			}

			.<?php $this->eid(); ?> .m-faq-item .m-faq-item-hd .title {
			  -webkit-box-flex: 1;
			  -webkit-flex: 1;
			      -ms-flex: 1;
			          flex: 1;
			  padding: 0 20px;
			  font-weight: normal;
			}

			.<?php $this->eid(); ?> .m-faq-item .m-faq-item-hd i {
			  position: absolute;
			  top: 25px;
			  right: 30px;
			  cursor: pointer;
			  /* 变量 */
			  color: #333;
			}

			.<?php $this->eid(); ?> .m-faq-item .m-faq-item-hd i::after {
			  position: absolute;
			  left: 0;
			  display: inline-block;
			  content: '';
			  width: 15px;
			  height: 3px;
			  background-color: currentcolor;
			}

			.<?php $this->eid(); ?> .m-faq-item .m-faq-item-hd i::before {
			  position: absolute;
			  top: 0;
			  display: inline-block;
			  content: '';
			  width: 15px;
			  height: 3px;
			  -webkit-transform: rotate(90deg);
			      -ms-transform: rotate(90deg);
			          transform: rotate(90deg);
			  -webkit-transition: all .6s ease;
			  -o-transition: all .6s ease;
			  transition: all .6s ease;
			  background-color: currentcolor;
			}

			.<?php $this->eid(); ?> .m-faq-item .m-faq-item-bd {
			  display: none;
			  padding: 0 20px 20px;
			}

			.<?php $this->eid(); ?> .m-faq-item .m-faq-item-bd i {
			  display: inline-block;
			  width: 8px;
			  height: 8px;
			  margin-right: 5px;
			  -webkit-border-radius: 100%;
			          border-radius: 100%;
			  /* 变量 */
			  background-color: #03a67b;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
		;(function($, win){
			$(document).ready(function() {
				$('.<?php $this->eid(); ?>').on('click', '.m-faq-item .m-faq-item-hd', function(event) {
					var faqItem = $(this).closest('.m-faq-item');
					var faqParent = faqItem.closest('.<?php $this->eid(); ?>');
					if (faqItem.hasClass('active')) {
						faqItem.removeClass('active')
						faqItem.find('.m-faq-item-bd').slideToggle(100)
					} else {
						faqParent.find('.m-faq-item').each(function(index, el) {
							if ($(el).hasClass('active')) {
								$(el).removeClass('active').find('.m-faq-item-bd').slideToggle(100)
							}
						});
						faqItem.addClass('active')
						faqItem.find('.m-faq-item-bd').slideToggle(100)
					}
				});
				$('.<?php $this->eid(); ?> .m-faq').each(function(index, el) {
					// 在激活第一个item 前清除一遍所有的item的激活状态
					$(el).find('.m-faq-item').removeClass('active').find('.m-faq-item-bd').hide()

					var fristItem = $(el).find('.m-faq-item').eq(0);
					fristItem.addClass('active')
					fristItem.find('.m-faq-item-bd').slideToggle(100)
				});
			});
		})(jQuery, window)
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container m-faq">
					<div class="m-faq-hd">
						<?php if ($this->has_content('title')) { ?>
							<h2 class="section-tit"><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<p><?php $this->eco('desc'); ?></p>
						<?php } ?>
					</div>
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="m-faq-list">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li class="m-faq-item">
									<div class="m-faq-item-hd">
										<h5 class="title"><?php echo $key + 1; ?>. <?php _e($value['question']); ?></h5>
										<i></i>
									</div>
									<div class="m-faq-item-bd">
										<?php _e($value['answer']); ?>
									</div>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
