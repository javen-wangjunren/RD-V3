<?php

/*
<?php mtf_section('V1_Testimonials_004', 'testimonials_004', [
	'item_name_color' => '#333',
	'item_country_color' => '#999',
	'item_project_color' => '#fff',
	'item_project_bgcolor' => '#03a57b',
	'columns' => '3', // 列数
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
], [
	'title' => 'Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'src' => '', 'alt' => '', 'name' => '', 'country' => '', 'desc' => '', 'project' => '' ]
	]
]); ?>
*/

class V1_Testimonials_004  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_name_color', '#333');
		$this->set_default_style('item_country_color', '#999');
		// $this->set_default_style('item_desc_color', '#666');
		$this->set_default_style('item_project_color', '#fff');
		$this->set_default_style('item_project_bgcolor', '#03a57b');
		$this->set_style_columns(3); // 默认 3 列。

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/120x120/03a57b/f1f1f1?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'alt';
				}
				if (!isset($value['name'])) {
					$this->content['items'][$key]['name'] = 'Name ' . $key;
				}
				if (!isset($value['country'])) {
					$this->content['items'][$key]['country'] = 'India ' . $key;
				}
				if (!isset($value['desc'])) {
					$this->content['items'][$key]['desc'] = 'Description ' . $key;
				}
				if (!isset($value['project'])) {
					$this->content['items'][$key]['project'] = 'Project ' . $key;
				}
			}
		}
	}

	public function style () {
		?>
			.<?php $this->eid(); ?> {
				color: <?php $this->est('desc_color'); ?>;
				text-align: center;
			}
			.<?php $this->eid(); ?> h2 {
				color: <?php $this->est('title_color'); ?>;
			}
			.<?php $this->eid(); ?> > .container {
				width: 1140px;
			}
			.<?php $this->eid(); ?> .list {
				margin-top: 10px;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .list > li {
				box-sizing: border-box;
				margin: 25px 10px;
				padding: 30px 20px 0;
				max-width: 340px;
				background: #fff;
				box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.07);
			}
			.<?php $this->eid(); ?> h5 {
				margin-top: 10px;
				color: <?php $this->est('item_name_color'); ?>;
			}
			.<?php $this->eid(); ?> .list p {
				margin: 10px auto;
				max-width: 240px;
			}
			.<?php $this->eid(); ?> .project{
				margin: 40px -20px 0;
				padding: 8px 10px;
				background: <?php $this->est('item_project_bgcolor'); ?>;
				color: <?php $this->est('item_project_color'); ?>;
			}
			.<?php $this->eid(); ?> .country{
				color: <?php $this->est('item_country_color'); ?>;
			}
		<?php
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
						<h2><?php $this->eco('title'); ?></h2>
						<p><?php $this->eco('desc'); ?></p>
					<?php } ?>
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="list <?php $this->echo_columns_class(); ?>">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<?php $this->display_tag_img($value['src'], $value['alt']); ?>
									<h5><?php echo $value['name'] ?></h5>
									<span class="country"><?php echo $value['country'] ?></span>
									<p><?php echo $value['desc'] ?></p>
									<div class="project"><?php echo $value['project'] ?></div>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
