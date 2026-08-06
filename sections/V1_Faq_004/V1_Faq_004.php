<?php

/*
<?php mtf_section('V1_Faq_004', 'faq_004', [
	'question_color' => '#03a57c',
	'question_align' => 'center',
	'left_link_color' => '#03a57c',
	'item_text_color' => '#03a57c',
	'item_icon_color' => '#03a57c',
	'item_icon_bgcolor' => '#fff',
	'class' => '',
	'bg_color' => '#fff',
	'bg_image' => '',
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'title_color' => '#333',
	'subtitle_color' => '#666',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'link_text' => 'Check All Q&A',
	'link_url' => '#',
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'questions' => [
		[ 'question' => '' ]
	],
	'items' => [
		[ 'icon' => '', 'text' => '' ]
	],
]); ?>
*/

class V1_Faq_004  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('question_color', '#03a57c');
		$this->set_default_style('question_align', 'center');
		$this->set_default_style('left_link_color', '#03a57c');
		$this->set_default_style('item_text_color', '#03a57c');
		$this->set_default_style('item_icon_color', '#03a57c');
		$this->set_default_style('item_icon_bgcolor', '#fff');

		$this->set_default_content('link_text', 'Check All Q&A');
		$this->set_default_content('link_url', '#');

		if (!isset($this->content['questions'])) {
			$this->content['questions'] = [ [], [], [] ];
		}
		if (count($this->content['questions']) > 0) {
			foreach ($this->content['questions'] as $key => $value) {
				if (!isset($value['question'])) {
					$this->content['questions'][$key]['question'] = 'Question';
				}
			}
		}

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['icon'])) {
					$this->content['items'][$key]['icon'] = '<i class="fas fa-check-circle"></i>';
				}
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'Support Offer';
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
			.<?php $this->eid(); ?> .section-tit {
			  margin-bottom: 5px;
				<?php $this->css_attr_color('title_color'); ?>
			}

			.<?php $this->eid(); ?> .section-min-tit {
				<?php $this->css_attr_color('subtitle_color'); ?>
			}

			.<?php $this->eid(); ?> .faq-bd {
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  -webkit-box-pack: justify;
			  -webkit-justify-content: space-between;
			      -ms-flex-pack: justify;
			          justify-content: space-between;
			}

			.<?php $this->eid(); ?> .faq-l {
			  -webkit-box-flex: 1;
			  -webkit-flex: 1;
			      -ms-flex: 1;
			          flex: 1;
			  max-width: 680px;
			  margin-right: 20px;
			}

			.<?php $this->eid(); ?> .faq-list {
			  margin-top: 40px;
			}

			.<?php $this->eid(); ?> .faq-list .faq-item {
			  padding: 10px 20px;
			  margin-bottom: 10px;
			  -webkit-border-radius: 31px;
			          border-radius: 31px;
			  border: solid 2px currentcolor;
				<?php $this->css_attr_color('question_color'); ?>
				<?php $this->css_attr('text-align', 'question_align'); ?>
			}

			.<?php $this->eid(); ?> .faq-list .faq-item h4 {
			  font-weight: normal;
			}

			.<?php $this->eid(); ?> .faq-l-ft {
			  text-align: center;
				<?php $this->css_attr_color('left_link_color'); ?>
			}

			.<?php $this->eid(); ?> .faq-l-ft a {
			  text-decoration: underline;
			}

			.<?php $this->eid(); ?> .faq-r {
			  -webkit-box-flex: 1;
			  -webkit-flex: 1;
			      -ms-flex: 1;
			          flex: 1;
			  max-width: 380px;
			}

			.<?php $this->eid(); ?> .faq-icons {
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  -webkit-flex-wrap: wrap;
			      -ms-flex-wrap: wrap;
			          flex-wrap: wrap;
			}

			.<?php $this->eid(); ?> .faq-icons .faq-icon-item {
			  text-align: center;
			  width: calc(50% - 10px);
			  margin-right: 20px;
			  margin-bottom: 20px;
			  padding: 30px;
			  -webkit-box-sizing: border-box;
			          box-sizing: border-box;
				<?php $this->css_attr('background-color', 'item_icon_bgcolor'); ?>
			  -webkit-box-shadow: 0px 0px 13px 0px rgba(0, 0, 0, 0.09);
			          box-shadow: 0px 0px 13px 0px rgba(0, 0, 0, 0.09);
			  -webkit-border-radius: 5px;
			          border-radius: 5px;
				<?php $this->css_attr_color('item_text_color'); ?>
			}

			.<?php $this->eid(); ?> .faq-icons .faq-icon-item:nth-child(2n) {
			  margin-right: 0;
			}

			.<?php $this->eid(); ?> .faq-icons .faq-icon-item i {
			  display: block;
			  margin-bottom: 10px;
			  font-size: 85px;
				<?php $this->css_attr_color('item_icon_color'); ?>
			}

			@media only screen and (max-width: 680px) {
			  .<?php $this->eid(); ?> .faq-bd {
			    -webkit-flex-wrap: wrap;
			        -ms-flex-wrap: wrap;
			            flex-wrap: wrap;
			  }
			  .<?php $this->eid(); ?> .faq-l, .<?php $this->eid(); ?> .faq-r {
			    -webkit-box-flex: 0;
			    -webkit-flex: none;
			        -ms-flex: none;
			            flex: none;
			    max-width: 100%;
			    margin-right: 0;
			  }
			  .<?php $this->eid(); ?> .faq-r {
			    margin-top: 40px;
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
					<?php if ($this->has_content('title')) { ?>
						<h2 class="section-tit"><?php $this->eco('title'); ?></h2>
					<?php } ?>
					<div class="faq-bd">
						<div class="faq-l">
							<?php if ($this->has_content('subtitle')) { ?>
								<h4 class="section-min-tit"><?php $this->eco('subtitle'); ?></h4>
							<?php } ?>
							<?php if ($this->has_content('desc')) { ?>
								<p><?php $this->eco('desc'); ?></p>
							<?php } ?>
							<?php if (count($this->content['questions']) > 0) { ?>
								<ul class="faq-list">
									<?php foreach ($this->content['questions'] as $key => $value) { ?>
										<li class="faq-item"><h4><?php _e($value['question']); ?></h4></li>
									<?php } ?>
								</ul>
							<?php } ?>
							<div class="faq-l-ft">
								<p>...</p>
								<a href="<?php $this->eco('link_url'); ?>"><?php $this->eco('link_text'); ?></a>
							</div>
						</div>
						<div class="faq-r">
							<?php if (count($this->content['items']) > 0) { ?>
								<div class="faq-icons">
									<?php foreach ($this->content['items'] as $key => $value) { ?>
										<div class="faq-icon-item">
											<?php _e($value['icon']); ?>
											<span><?php _e($value['text']); ?></span>
										</div>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
