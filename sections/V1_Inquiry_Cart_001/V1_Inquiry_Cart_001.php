<?php

/*
	<?php
	?>
*/

class V1_Inquiry_Cart_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('class', '');
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
			.<?php $this->eid(); ?> h2{
				color: #212121;
			}
			.<?php $this->eid(); ?> p{
				color: #747474;
			}
			.<?php $this->eid(); ?> .item h4{
				color: #212121;
			}
			.<?php $this->eid(); ?> .item:hover .del{
                background-color: #c63939;
                color:#fff;
            }
			/* insert style end */
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
					<div class="tit">
						<h2>Enquiry Cart</h2>
						<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of.</p>
					</div>
					<div class="mml-box">
						<div class="item">
							<h4>Item Information Main Title</h4>
							<div class="detail">
								<div class="img">
									<img src="https://via.placeholder.com/220x163" alt="">
								</div>
								<div class="form-row">
									<label class="pname">
										<select name="pname" placeholder="Select Option # 1">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
										<div class="triangle"></div>
									</label>
									<label class="pnum">
										<input type="text" name="pnum" placeholder="Qty/Other Info">
									</label>
									<label class="msg">
										<textarea name="msg" placeholder="Please enter your requirements in detail"></textarea>
									</label>
								</div>
								<div class="del">
									<i class="far fa-trash-alt"></i>
								</div>
							</div>
						</div>
						<div class="item">
							<h4>Item Information Main Title</h4>
							<div class="detail">
								<div class="img">
									<img src="https://via.placeholder.com/220x163" alt="">
								</div>
								<div class="form-row">
									<label class="pname">
										<select name="pname" placeholder="Select Option # 1">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
										<div class="triangle"></div>
									</label>
									<label class="pnum">
										<input type="text" name="pnum" placeholder="Qty/Other Info">
									</label>
									<label class="msg">
										<textarea name="msg" placeholder="Please enter your requirements in detail"></textarea>
									</label>
								</div>
								<div class="del">
									<i class="far fa-trash-alt"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
