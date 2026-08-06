<?php

/*
<?php mtf_section('V1_Faq_002', 'faq_002', [
	'max_width' => '850px',
	'item_question_color' => '#333',
	'item_answer_color' => '#808080',
	'class' => '',
	'bg_color' => '#fff',
	'bg_image' => '',
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'title_color' => '#333',
	'custom_css' => '',
], [
	'title' => 'Title',
	'items' => [
		[ 'question' => '', 'answer' => '' ]
	],
]); ?>
*/

class V1_Faq_002  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('max_width', '850px');
		$this->set_default_style('item_question_color', '#333');
		$this->set_default_style('item_answer_color', '#808080');

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
				<?php $this->css_attr_color('item_answer_color'); ?>
			}
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}
			.<?php $this->eid(); ?> .section-tit {
			  margin-bottom: 25px;
				<?php $this->css_attr_color('title_color'); ?>
			}

			.<?php $this->eid(); ?> .m-faq-item {
			  margin-bottom: 40px;
				<?php $this->css_attr('max-width', 'max_width'); ?>
			}
			.<?php $this->eid(); ?> .m-faq-item:last-child {
			  margin-bottom: 0;
			}
			.<?php $this->eid(); ?> .m-faq-item .m-faq-item-hd {
			  margin-bottom: 5px;
			}

			.<?php $this->eid(); ?> .m-faq-item .m-faq-item-hd .title {
				<?php $this->css_attr_color('item_question_color'); ?>
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
					<?php if ($this->has_content('title')) { ?>
						<h2 class="section-tit"><?php $this->eco('title'); ?></h2>
					<?php } ?>
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
