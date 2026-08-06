<?php

class MML_Section_01 extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		if (!isset($this->content['title'])) {
			$this->content['title'] = $this->id;
		}
		if (!isset($this->style['class'])) {
			$this->style['class'] = '';
		}
	}

	public function style () {
		echo $this->import_css();
	}

	public function script () {
		?>
			(function ($) {
				var id = '<?php echo $this->id; ?>';
				$(document).ready(function () {
					console.log(id)
				})
			})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div id="<?php echo $this->id; ?>" class="<?php echo $this->id; ?> <?php echo $this->style['class']; ?> mml-section-01">
				<h2><?php echo $this->content['title']; ?></h2>
				<?php $this->display_tag_img($this->content['img_feature'], $this->content['alt']); ?>
			</div>
		<?php
	}

	public function get_style_args () {
		return [
			[ 'key' => 'class', 'type' => 'text', 'desc' => '这是啥？' ]
		];
	}

	public function get_content_args () {
		return [
			[ 'key' => 'title', 'type' => 'text', 'desc' => '' ],
			[ 'key' => 'img_feature', 'type' => 'text', 'desc' => '' ],
			[ 'key' => 'alt', 'type' => 'text', 'desc' => '' ]
		];
	}
}
